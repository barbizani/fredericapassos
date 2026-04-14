'use client'

import Image from 'next/image'
import { motion } from 'framer-motion'
import WhatsAppButton from '../../../components/lp/WhatsAppButton'
import LegalFooter from '../../../components/lp/LegalFooter'
import SignatureCard from '../../../components/lp/SignatureCard'

export default function LisboaLandingPage() {
  return (
    <main className="min-h-screen bg-[#161616] text-white font-neue-montreal overflow-hidden">
      {/* Dynamic Header */}
      <nav className="relative z-50 w-full py-6 px-8 flex justify-between items-center bg-transparent">
        <div className="relative w-48 h-8">
          <Image
            src="/logos/logo-branco-laranja.svg"
            alt="Dra Frederica Passos"
            fill
            className="object-contain object-left"
          />
        </div>
        <div className="hidden md:block text-xs font-nord text-white/40 tracking-[0.2em] uppercase">
          Portugal • Internacional
        </div>
      </nav>

      {/* Background Glow Pattern */}
      <div className="absolute inset-0 pointer-events-none overflow-hidden">
        <div className="absolute top-[-10%] right-[-10%] w-[600px] h-[600px] bg-[#70309e] blur-[150px] opacity-20 rounded-full" />
        <div className="absolute bottom-[-10%] left-[-10%] w-[600px] h-[600px] bg-[#f56428] blur-[150px] opacity-10 rounded-full" />
      </div>

      {/* Hero Section */}
      <section className="relative max-w-7xl mx-auto px-6 pt-12 md:pt-24 pb-12 flex flex-col items-center text-center">
        <motion.div
          initial={{ opacity: 0, scale: 0.9 }}
          animate={{ opacity: 1, scale: 1 }}
          transition={{ duration: 0.8 }}
          className="relative w-48 h-48 md:w-64 md:h-64 mb-12 rounded-full overflow-hidden border-2 border-white/10 p-2"
        >
          <Image
            src="/Foto_atendimento.jpeg"
            alt="Dra Frederica Passos"
            width={400}
            height={400}
            className="w-full h-full object-cover rounded-full"
            priority
          />
        </motion.div>

        <motion.div
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.6, delay: 0.2 }}
          className="max-w-3xl space-y-6"
        >
          <div className="inline-block px-4 py-1 rounded-full bg-white/5 border border-white/10 text-[#f56428] text-sm font-nord uppercase tracking-widest">
            Acolhimento & Segurança
          </div>
          <h1 className="text-5xl md:text-7xl font-jh-caudemars leading-tight">
            Um espaço seguro para a sua <span className="text-[#f56428]">mente.</span>
          </h1>
          <p className="text-xl md:text-2xl text-white/60 leading-relaxed font-light">
            A sua jornada para o equilíbrio não precisa esperar por agendas lotadas. 
            Novos horários abertos para teleconsulta exclusiva.
          </p>
          
          <div className="pt-8 scale-110">
            <WhatsAppButton 
              number="+351963564444" 
              variant="glow"
              message="Olá Dra Frederica, gostaria de agendar uma CONSULTA EXTRA."
            />
          </div>
          <p className="text-sm text-white/30 tracking-wide pt-4">NÃO DEIXE PARA DEPOIS O QUE PODE SER RESOLVIDO HOJE.</p>
        </motion.div>
      </section>

      {/* Symptoms / Issues Section */}
      <section className="relative py-24 px-6">
        <div className="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
            {[
              { title: 'Ansiedade', desc: 'Espaço seguro para gerir preocupações e encontrar calma.' },
              { title: 'Depressão', desc: 'Apoio especializado para recuperar a energia e o equilíbrio emocional.' },
              { title: 'PHDA Adulto', desc: 'Foco e organização para mentes contemporâneas.' },
              { title: 'Psiquiatria da Mulher', desc: 'Apoio nas diversas fases da vida feminina.' },
              { title: 'Psiquiatria Perinatal', desc: 'Saúde mental na pré-conceção, gravidez e pós-parto.' },
              { title: 'Sexualidade Humana', desc: 'Uma abordagem clínica e empática à saúde sexual.' }
            ].map((item, i) => (
              <motion.div
                key={item.title}
                initial={{ opacity: 0, y: 20 }}
                whileInView={{ opacity: 1, y: 0 }}
                transition={{ delay: i * 0.2 }}
                className="group p-8 bg-white/5 border border-white/10 rounded-[2rem] hover:bg-white/10 transition-all duration-500"
              >
                <h3 className="text-2xl font-jh-caudemars text-[#f56428] mb-4">{item.title}</h3>
                <p className="text-white/60 text-lg leading-relaxed">{item.desc}</p>
              </motion.div>
            ))}
        </div>
      </section>

      {/* Authority Block */}
      <section className="bg-white/[0.02] py-24 px-6 border-y border-white/5">
        <div className="max-w-4xl mx-auto flex flex-col md:flex-row items-center gap-12">
          <div className="flex-1 space-y-6">
            <h2 className="text-3xl font-jh-caudemars">Por que Teleconsulta?</h2>
            <p className="text-lg text-white/50 leading-relaxed">
              Num mundo acelerado, a flexibilidade é essencial. A teleconsulta mantém toda a profundidade técnica do atendimento presencial, mas elimina as barreiras de deslocação e tempo.
            </p>
            <p className="text-lg text-white/50 leading-relaxed font-bold">
              Psiquiatria Contemporânea: No centro da cidade ou em qualquer parte do mundo.
            </p>
          </div>
          <div className="w-full md:w-auto mt-4">
             <SignatureCard dark />
          </div>
        </div>
      </section>

      <div className="py-24 text-center">
        <h2 className="text-2xl font-jh-caudemars mb-8 opacity-70 italic font-light">Vamos dar o primeiro passo?</h2>
        <WhatsAppButton 
              number="+351963564444" 
              message="Olá Dra Frederica, gostaria de agendar uma CONSULTA EXTRA."
            />
      </div>

      <LegalFooter />
    </main>
  )
}
