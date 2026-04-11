'use client'

import Image from 'next/image'
import { motion } from 'framer-motion'
import WhatsAppButton from '../../../components/lp/WhatsAppButton'
import LegalFooter from '../../../components/lp/LegalFooter'
import SignatureCard from '../../../components/lp/SignatureCard'

export default function PortoLandingPage() {
  const symptoms = [
    'Ansiedade e Depressão',
    'Esgotamento',
    'PHDA Adulto',
    'Psiquiatria da Mulher',
    'Psiquiatria Perinatal',
    'Sexualidade Humana'
  ]

  return (
    <main className="min-h-screen bg-[#f8f9fa] text-[#161616] font-neue-montreal">
      {/* Top Banner - Subtle Urgency */}
      <div className="w-full bg-[#70309e] py-2 text-center text-white text-sm font-nord font-light tracking-wide uppercase">
        disponibilidade especial para este canal
      </div>

      {/* Hero Section */}
      <section className="max-w-7xl mx-auto px-6 py-12 md:py-24 flex flex-col md:flex-row items-center gap-12">
        <div className="flex-1 space-y-8 order-2 md:order-1">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6 }}
          >
            <h1 className="text-4xl md:text-6xl font-jh-caudemars leading-tight mb-4">
              Apoio especializado no <span className="text-[#f56428]">seu tempo.</span>
            </h1>
            <p className="text-xl text-[#161616]/70 leading-relaxed max-w-xl">
              Abri novos horários de teleconsulta para ajudar quem não consegue vaga nas clínicas presenciais. 
              Cuidado psiquiátrico contemporâneo, no conforto do seu próprio espaço.
            </p>
          </motion.div>

          <div className="pt-4">
            <WhatsAppButton 
              number="+351963564444" 
              message="Olá Dra. Frederica, gostaria de agendar uma CONSULTA EXTRA."
            />
            <p className="mt-4 text-sm text-[#161616]/50">
              * Resposta rápida via WhatsApp. Agende agora para garantir sua vaga.
            </p>
          </div>
        </div>

        <motion.div 
          className="flex-1 order-1 md:order-2"
          initial={{ opacity: 0, scale: 0.95 }}
          animate={{ opacity: 1, scale: 1 }}
          transition={{ duration: 0.8 }}
        >
          <div className="relative rounded-3xl overflow-hidden shadow-2xl">
            <Image
              src="/Foto_atendimento.jpeg"
              alt="Dra. Frederica Passos"
              width={600}
              height={800}
              className="w-full h-auto object-cover"
              priority
            />
          </div>
        </motion.div>
      </section>

      {/* Symptoms Section */}
      <section className="bg-white py-20 px-6">
        <div className="max-w-4xl mx-auto text-center">
            <h2 className="text-3xl font-jh-caudemars mb-12">Como posso te ajudar hoje?</h2>
            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
              {symptoms.map((symptom, i) => (
                <motion.div
                  key={symptom}
                  initial={{ opacity: 0, x: -10 }}
                  whileInView={{ opacity: 1, x: 0 }}
                  transition={{ delay: i * 0.1 }}
                  className="p-6 bg-[#f8f9fa] rounded-2xl flex items-center gap-4 text-lg font-medium"
                >
                  <div className="w-2 h-2 rounded-full bg-[#f56428]" />
                  {symptom}
                </motion.div>
              ))}
            </div>
        </div>
      </section>

      {/* Bio Section */}
      <section className="max-w-5xl mx-auto py-24 px-6 flex flex-col md:flex-row gap-12 items-center">
        <div className="flex-1 space-y-6">
          <h2 className="text-3xl font-jh-caudemars">Mentes que não cabem em rótulos.</h2>
          <p className="text-lg text-[#161616]/70 leading-relaxed">
            Sou a <strong>Dra. Frederica Passos</strong>, médica psiquiatra dedicada a uma abordagem contemporânea e humana. 
            Acredito que a saúde mental deve ser acessível e adaptada à rotina de quem busca equilíbrio, sem estigmas.
          </p>
          <p className="text-lg text-[#161616]/70 leading-relaxed">
            Minha agenda presencial está frequentemente lotada, por isso priorizo a teleconsulta para oferecer agilidade e a mesma qualidade de acolhimento.
          </p>
        </div>
        <div className="w-full md:w-auto mt-4">
           <SignatureCard />
        </div>
      </section>

      <div className="py-12 text-center">
         <WhatsAppButton 
              number="+351963564444" 
              message="Olá Dra. Frederica, gostaria de agendar uma CONSULTA EXTRA."
              variant="glow"
            />
      </div>

      <LegalFooter />
    </main>
  )
}
