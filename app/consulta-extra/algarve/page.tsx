import type { Metadata } from 'next'
import AlgarveLPClient from './AlgarveLPClient'

export const metadata: Metadata = {
  title: 'Consulta de Psiquiatria Online Algarve | Dra Frederica Passos',
  description: 'Atendimento prioritário de psiquiatria para o Algarve. Agende a sua teleconsulta hoje mesmo e recupere o seu equilíbrio.',
  keywords: ['psiquiatria algarve', 'teleconsulta algarve', 'consulta online algarve', 'ansiedade', 'depressão', 'tdah adulto', 'saúde sexual'],
  openGraph: {
    title: 'Psiquiatria Online Algarve | Dra Frederica Passos',
    description: 'Vagas de teleconsulta liberadas para hoje no Algarve.',
    images: ['/Foto_atendimento.jpeg'],
  }
}

export default function Page() {
  return <AlgarveLPClient />
}
