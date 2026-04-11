import Image from 'next/image'

export default function SignatureCard({ dark = false }: { dark?: boolean }) {
  return (
    <div className={`flex items-center gap-4 p-4 backdrop-blur-sm border rounded-2xl shadow-sm max-w-sm mx-auto md:mx-0 ${
      dark 
        ? 'bg-white/5 border-white/10 text-white' 
        : 'bg-white/50 border-white/20 text-[#161616]'
    }`}>
      <div className={`w-16 h-16 rounded-full overflow-hidden border-2 flex-shrink-0 ${
        dark ? 'border-white/10' : 'border-[#70309e]/10'
      }`}>
        <Image
          src="/signature.png"
          alt="Dra. Frederica Passos"
          width={200}
          height={200}
          className="w-full h-full object-cover"
        />
      </div>
      <div className="flex flex-col text-left">
        <span className={`font-jh-caudemars text-lg ${dark ? 'text-white' : 'text-[#161616]'}`}>Dra. Frederica Passos</span>
        <span className={`text-xs font-nord uppercase tracking-widest ${dark ? 'text-white/40' : 'text-[#161616]/60'}`}>Psiquiatra • OM 70932</span>
      </div>
    </div>
  )
}
