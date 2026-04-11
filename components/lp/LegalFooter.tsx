import Link from 'next/link'

export default function LegalFooter({ dark = false }: { dark?: boolean }) {
  return (
    <footer className={`py-12 border-t border-black/5 ${dark ? 'bg-[#1a1a1a] text-white/40' : 'bg-[#f8f9fa] text-[#161616]/40'}`}>
      <div className="max-w-7xl mx-auto px-6 flex flex-col items-center gap-6">
        <div className="text-sm font-nord text-center">
            © 2026 Dra Frederica Passos - Mentes Modernas. Todos os direitos reservados.®
        </div>
        <div className="flex gap-8 text-xs font-nord uppercase tracking-widest">
          <Link href="#" className="hover:text-[#f56428] transition-colors">Termos & Condições</Link>
          <Link href="#" className="hover:text-[#f56428] transition-colors">Política de Privacidade</Link>
        </div>
      </div>
    </footer>
  )
}
