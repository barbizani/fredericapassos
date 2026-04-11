'use client'

import Image from 'next/image'
import { motion } from 'framer-motion'
import WhatsAppButton from '../../../components/lp/WhatsAppButton'
import LegalFooter from '../../../components/lp/LegalFooter'
import SignatureCard from '../../../components/lp/SignatureCard'

export default function AlgarveLandingPage() {
  return (
    <main className="min-h-screen bg-white text-[#161616] font-neue-montreal">
      {/* Dynamic Header */}
      <nav className="w-full py-6 px-8 flex justify-between items-center border-b border-[#f1f1f1]">
        <div className="text-xl font-nord font-bold tracking-tighter">DRA. FREDERICA PASSOS</div>
        <div className="hidden md:block text-sm font-nord text-[#f56428]">AGENDAMENTO PRIORITÁRIO</div>
      </nav>

      {/* Main Container */}
      <div className="max-w-4xl mx-auto px-6 py-12 md:py-24">
        {/* Compact Hero */}
        <div className="flex flex-col md:flex-row items-center gap-10 mb-20 bg-[#f8f9fa] rounded-[3rem] p-8 md:p-12 shadow-sm">
           <div className="w-40 h-40 md:w-56 md:h-56 flex-shrink-0 rounded-2xl overflow-hidden shadow-lg border-4 border-white rotate-2">
            <Image
              src="/Foto_atendimento.jpeg"
              alt="Dra. Frederica Passos"
              width={300}
              height={300}
              className="w-full h-full object-cover"
              priority
            />
          </div>
          <div className="space-y-6">
             <h1 className="text-4xl md:text-5xl font-jh-caudemars tracking-tight leading-none">
              Abertura de vagas para <br/>
              <span className="text-[#70309e]">Primeiras Consultas.</span>
             </h1>
             <p className="text-lg text-[#161616]/60 leading-snug">
              Sem espera. Sem deslocação. Cuidado psiquiátrico de alta performance agora disponível.
             </p>
             <div className="flex items-center gap-2">
                <div className="w-3 h-3 bg-green-500 rounded-full animate-pulse" />
                <span className="text-sm font-nord font-medium text-green-600 uppercase">Horários exclusivos para este canal</span>
             </div>
          </div>
        </div>

        {/* The Action Card */}
        <section className="bg-[#70309e] text-white rounded-[3rem] p-10 md:p-16 text-center space-y-10 shadow-2xl relative overflow-hidden">
           {/* Decorative circle */}
           <div className="absolute top-[-50px] right-[-50px] w-64 h-64 bg-[#f56428] opacity-20 rounded-full blur-3xl" />
           
           <h2 className="text-3xl md:text-4xl font-jh-caudemars">Agende seu horário de forma prática</h2>
           
           <div className="flex flex-col md:flex-row justify-center gap-8 text-left mb-8">
              <div className="flex gap-4">
                 <div className="bg-white/10 w-12 h-12 rounded-full flex items-center justify-center font-bold">1</div>
                 <div>
                    <h4 className="font-bold">Clique no botão</h4>
                    <p className="text-sm text-white/60">Agende via WhatsApp</p>
                 </div>
              </div>
              <div className="flex gap-4">
                 <div className="bg-white/10 w-12 h-12 rounded-full flex items-center justify-center font-bold">2</div>
                 <div>
                    <h4 className="font-bold">Valide sua vaga</h4>
                    <p className="text-sm text-white/60">Resposta em minutos</p>
                 </div>
              </div>
              <div className="flex gap-4">
                 <div className="bg-white/10 w-12 h-12 rounded-full flex items-center justify-center font-bold">3</div>
                 <div>
                    <h4 className="font-bold">Atendimento</h4>
                    <p className="text-sm text-white/60">Videochamada segura</p>
                 </div>
              </div>
           </div>

           <div className="transform scale-125">
             <WhatsAppButton 
                number="+351963564444" 
                variant="standard"
                message="Olá Dra. Frederica, gostaria de agendar uma CONSULTA EXTRA."
              />
           </div>
        </section>

        {/* Minimal Symptoms Checklist */}
        <section className="mt-24 text-center">
            <p className="text-sm font-nord text-[#161616]/40 uppercase tracking-widest mb-10">Especialidades do atendimento</p>
            <div className="flex flex-wrap justify-center gap-4">
              {['Ansiedade e Depressão', 'Esgotamento', 'PHDA Adulto', 'Psiquiatria da Mulher', 'Psiquiatria Perinatal', 'Sexualidade Humana'].map((tag) => (
                <span key={tag} className="px-6 py-2 border border-[#f1f1f1] rounded-full text-sm font-medium hover:border-[#f56428] transition-colors">
                  {tag}
                </span>
              ))}
            </div>
        </section>

        <div className="mt-16 flex justify-center">
            <SignatureCard />
        </div>
      </div>

      <div className="mt-20">
        <LegalFooter />
      </div>
    </main>
  )
}
