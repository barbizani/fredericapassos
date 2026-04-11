import type { Metadata } from 'next'
import PortoLPClient from './PortoLPClient'

export const metadata: Metadata = {
  title: 'Teleconsulta Psiquiatria Porto | Dra Frederica Passos',
  description: 'Novos horários de teleconsulta disponíveis para o Porto. Especialista em Ansiedade, Depressão, PHDA Adulto e Saúde Mental. Agende agora via WhatsApp.',
  keywords: ['psiquiatria porto', 'teleconsulta porto', 'dra frederica passos', 'ansiedade', 'depressão', 'phda adulto', 'psiquiatria da mulher'],
  openGraph: {
    title: 'Teleconsulta Psiquiatria Porto | Dra Frederica Passos',
    description: 'Atendimento especializado online para o Porto.',
    images: ['/Foto_atendimento.jpeg'],
  }
}

export default function Page() {
  return <PortoLPClient />
}
