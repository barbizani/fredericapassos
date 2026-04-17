/** @type {import('next').NextConfig} */

// ============================================================
// SEGURANÇA: Headers HTTP de proteção ativados em todas as rotas
// ============================================================
const securityHeaders = [
  // Previne clickjacking: só permite iframes do próprio domínio
  { key: 'X-Frame-Options', value: 'SAMEORIGIN' },
  // Previne MIME sniffing — o browser respeita o Content-Type declarado
  { key: 'X-Content-Type-Options', value: 'nosniff' },
  // Activa protecção XSS no browser (legacy, mas útil)
  { key: 'X-XSS-Protection', value: '1; mode=block' },
  // Controla informações de referência enviadas a outros sites
  { key: 'Referrer-Policy', value: 'strict-origin-when-cross-origin' },
  // Permissões de browser: desactiva câmara, microfone e geolocalização
  {
    key: 'Permissions-Policy',
    value: 'camera=(), microphone=(), geolocation=()',
  },
  // HSTS: força HTTPS por 1 ano (ativar após garantir HTTPS em produção)
  {
    key: 'Strict-Transport-Security',
    value: 'max-age=31536000; includeSubDomains',
  },
  // Content Security Policy: permite conteúdo apenas de fontes confiáveis
  {
    key: 'Content-Security-Policy',
    value: [
      "default-src 'self'",
      "script-src 'self' 'unsafe-inline' 'unsafe-eval'",
      "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com",
      "font-src 'self' https://fonts.gstatic.com",
      "img-src 'self' data: blob: https://images.unsplash.com",
      "connect-src 'self' https://wa.me",
      "frame-ancestors 'self'",
    ].join('; '),
  },
]

const nextConfig = {
  reactStrictMode: true,
  images: {
    remotePatterns: [
      {
        protocol: 'https',
        hostname: 'images.unsplash.com',
      },
    ],
  },
  async headers() {
    return [
      {
        // Aplica os headers de segurança a todas as rotas
        source: '/(.*)',
        headers: securityHeaders,
      },
    ]
  },
}

module.exports = nextConfig



