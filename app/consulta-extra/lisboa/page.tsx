import type { Metadata } from 'next'
import LisboaLPClient from './LisboaLPClient'

export const metadata: Metadata = {
  title: 'Psiquiatra em Lisboa | Teleconsulta Dra. Frederica Passos',
  description: 'Espaço seguro para sua saúde mental em Lisboa. Apoio especializado em Ansiedade, Burnout e Saúde Mental Perinatal. Agende via WhatsApp.',
  keywords: ['psiquiatria lisboa', 'psiquiatra lisboa', 'teleconsulta lisboa', 'saúde mental lisboa', 'burnout', 'psiquiatria perinatal'],
  openGraph: {
    title: 'Psiquiatra em Lisboa | Dra. Frederica Passos',
    description: 'Acolhimento e segurança para sua vida emocional.',
    images: ['/Foto_atendimento.jpeg'],
  }
}

export default function Page() {
  return <LisboaLPClient />
}
