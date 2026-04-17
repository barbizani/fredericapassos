/**
 * API Route: /api/contact
 *
 * SEGURANÇA: Esta rota faz o proxy para o Google Apps Script.
 * A URL do script fica APENAS no servidor (variável de ambiente),
 * nunca exposta no código JavaScript do browser.
 *
 * Para funcionar:
 * - Local: crie .env.local com GOOGLE_SCRIPT_URL=<sua_url>
 * - Vercel: adicione GOOGLE_SCRIPT_URL em Settings > Environment Variables
 */

import { NextRequest, NextResponse } from 'next/server'

// Rate limiting simples por IP (em memória - para produção, use Redis/Upstash)
const ipRequestMap = new Map<string, { count: number; resetAt: number }>()
const RATE_LIMIT = 5       // máx. 5 submissões
const RATE_WINDOW = 60_000 // por janela de 60 segundos

function isRateLimited(ip: string): boolean {
  const now = Date.now()
  const entry = ipRequestMap.get(ip)

  if (!entry || now > entry.resetAt) {
    ipRequestMap.set(ip, { count: 1, resetAt: now + RATE_WINDOW })
    return false
  }

  if (entry.count >= RATE_LIMIT) return true

  entry.count++
  return false
}

// Sanitização básica - remove tags HTML e scripts
function sanitize(value: unknown): string {
  if (typeof value !== 'string') return ''
  return value
    .replace(/<[^>]*>/g, '')          // remove tags HTML
    .replace(/javascript:/gi, '')     // remove protocolos perigosos
    .replace(/on\w+\s*=/gi, '')       // remove event handlers
    .trim()
    .slice(0, 2000)                   // limita tamanho do campo
}

export async function POST(request: NextRequest) {
  try {
    // Rate limiting por IP
    const ip =
      request.headers.get('x-forwarded-for')?.split(',')[0]?.trim() ?? 'unknown'

    if (isRateLimited(ip)) {
      return NextResponse.json(
        { error: 'Demasiadas tentativas. Aguarde 1 minuto e tente novamente.' },
        { status: 429 }
      )
    }

    // Validação do Content-Type
    const contentType = request.headers.get('content-type') ?? ''
    if (!contentType.includes('application/json')) {
      return NextResponse.json({ error: 'Formato inválido.' }, { status: 400 })
    }

    const body = await request.json()

    // Sanitização e validação dos campos
    const nome = sanitize(body.nome)
    const email = sanitize(body.email)
    const telefone = sanitize(body.telefone)
    const tipoConsulta = sanitize(body.tipoConsulta)
    const mensagem = sanitize(body.mensagem)

    // Validações obrigatórias
    if (!nome || !email || !telefone || !tipoConsulta || !mensagem) {
      return NextResponse.json({ error: 'Campos obrigatórios em falta.' }, { status: 400 })
    }

    // Validação de email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    if (!emailRegex.test(email)) {
      return NextResponse.json({ error: 'E-mail inválido.' }, { status: 400 })
    }

    // URL do Google Apps Script - APENAS no servidor, nunca no browser
    const GOOGLE_SCRIPT_URL = process.env.GOOGLE_SCRIPT_URL
    if (!GOOGLE_SCRIPT_URL) {
      console.error('[SECURITY] GOOGLE_SCRIPT_URL não configurada no ambiente')
      return NextResponse.json(
        { error: 'Serviço temporariamente indisponível.' },
        { status: 503 }
      )
    }

    // Envio para o Google Apps Script
    await fetch(GOOGLE_SCRIPT_URL, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ nome, email, telefone, tipoConsulta, mensagem }),
    })

    return NextResponse.json({ success: true }, { status: 200 })
  } catch (error) {
    // SEGURANÇA: nunca expor detalhes do erro ao cliente
    console.error('[API/contact] Erro interno:', error)
    return NextResponse.json(
      { error: 'Erro interno. Por favor tente novamente.' },
      { status: 500 }
    )
  }
}

// Rejeita qualquer método que não seja POST
export async function GET() {
  return NextResponse.json({ error: 'Método não permitido.' }, { status: 405 })
}
