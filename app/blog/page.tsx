'use client'

import { motion, useScroll, useTransform, AnimatePresence } from 'framer-motion'
import { useState, useRef, useEffect } from 'react'
import Image from 'next/image'
import { useRouter } from 'next/navigation'
import { blogPosts, BlogPost } from '../../data/blog-data'

export default function BlogPage() {
    const router = useRouter()
    const [activeSection, setActiveSection] = useState('Blog')
    const [hoveredItem, setHoveredItem] = useState<string | null>(null)
    const [isHeaderVisible, setIsHeaderVisible] = useState(true)
    const [lastScrollY, setLastScrollY] = useState(0)
    const [showScrollTop, setShowScrollTop] = useState(false)
    const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false)
    const [isMobile, setIsMobile] = useState(false)
    const [selectedCategory, setSelectedCategory] = useState<string>('Todos')
    const [mousePosition, setMousePosition] = useState({ x: 50, y: 50 })
    const [smoothPosition, setSmoothPosition] = useState({ x: 50, y: 50 })
    const [isAgendeHovered, setIsAgendeHovered] = useState(false)
    const [hoveredSocial, setHoveredSocial] = useState<string | null>(null)
    const [hoveredFooterItem, setHoveredFooterItem] = useState<string | null>(null)

    const footerRef = useRef<HTMLElement>(null)

    const categories = ['Todos', 'Psiquiatria Perinatal', 'Saúde Mental da Mulher', 'Orientação Parental', 'Sexualidade Humana', 'Geral']

    const filteredPosts = selectedCategory === 'Todos'
        ? blogPosts
        : blogPosts.filter(post => post.category === selectedCategory)

    const menuItems = [
        'Início',
        'Sobre',
        'Áreas de Atuação',
        'Serviços',
        'Blog',
        'Contato'
    ]

    useEffect(() => {
        setIsMobile(window.innerWidth < 640)
        const handleResize = () => setIsMobile(window.innerWidth < 640)
        window.addEventListener('resize', handleResize)
        return () => window.removeEventListener('resize', handleResize)
    }, [])

    useEffect(() => {
        const handleScroll = () => {
            const currentScrollY = window.scrollY
            setShowScrollTop(currentScrollY > 300)
            if (currentScrollY < 100) {
                setIsHeaderVisible(true)
            } else if (currentScrollY > lastScrollY && currentScrollY > 100) {
                setIsHeaderVisible(false)
            } else if (currentScrollY < lastScrollY) {
                setIsHeaderVisible(true)
            }
            setLastScrollY(currentScrollY)
        }
        window.addEventListener('scroll', handleScroll, { passive: true })
        return () => window.removeEventListener('scroll', handleScroll)
    }, [lastScrollY])

    useEffect(() => {
        let rafId: number | null = null
        const handleMouseMove = (e: MouseEvent) => {
            if (rafId) return
            rafId = requestAnimationFrame(() => {
                if (footerRef.current) {
                    const rect = footerRef.current.getBoundingClientRect()
                    const x = ((e.clientX - rect.left) / rect.width) * 100
                    const y = ((e.clientY - rect.top) / rect.height) * 100
                    setMousePosition({ x, y })
                }
                rafId = null
            })
        }
        const footer = footerRef.current
        if (footer) {
            footer.addEventListener('mousemove', handleMouseMove, { passive: true })
            return () => {
                footer.removeEventListener('mousemove', handleMouseMove)
                if (rafId) cancelAnimationFrame(rafId)
            }
        }
    }, [])

    useEffect(() => {
        const lerp = (start: number, end: number, factor: number) => start + (end - start) * factor
        let animationId: number | null = null
        const animate = () => {
            setSmoothPosition(prev => ({
                x: lerp(prev.x, mousePosition.x, 0.08),
                y: lerp(prev.y, mousePosition.y, 0.08),
            }))
            animationId = requestAnimationFrame(animate)
        }
        animationId = requestAnimationFrame(animate)
        return () => { if (animationId) cancelAnimationFrame(animationId) }
    }, [mousePosition])

    const scrollToTop = () => window.scrollTo({ top: 0, behavior: 'smooth' })

    const navigateTo = (path: string) => {
        if (path === 'Blog') return;
        if (path === 'Início') {
            router.push('/inicio')
            return;
        }
        router.push(`/inicio#${path}`)
    }

    return (
        <div className="min-h-screen bg-[#f2ede7] pt-16 md:pt-20">
            {/* Header */}
            <motion.header
                className="bg-[#f2ede7] w-full shadow-sm fixed top-0 left-0 right-0 z-50"
                initial={{ y: 0 }}
                animate={{ y: isHeaderVisible ? 0 : -100 }}
                transition={{ duration: 0.3, ease: 'easeInOut' }}
            >
                <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div className="flex items-center justify-between h-16 md:h-20 relative">
                        <div className="flex-shrink-0 z-10 cursor-pointer" onClick={() => router.push('/inicio')}>
                            <Image
                                src="/logohoriz.svg"
                                alt="Logo Dra. Frederica Passos"
                                width={200}
                                height={60}
                                className="h-10 md:h-12 w-auto object-contain"
                                priority
                            />
                        </div>

                        <nav className="hidden md:flex items-center justify-center absolute left-1/2 transform -translate-x-1/2 space-x-6 lg:space-x-8">
                            {menuItems.map((item) => {
                                const isActive = activeSection === item
                                const isHovered = hoveredItem === item
                                const showLine = isActive || isHovered
                                return (
                                    <button
                                        key={item}
                                        className="font-neue-montreal text-sm lg:text-base relative px-2 py-1 transition-all duration-200 text-center"
                                        style={{
                                            color: isActive || isHovered ? '#70309e' : '#6b7280',
                                            fontWeight: isActive ? 600 : 400,
                                        }}
                                        onMouseEnter={() => setHoveredItem(item)}
                                        onMouseLeave={() => setHoveredItem(null)}
                                        onClick={() => navigateTo(item)}
                                    >
                                        {item}
                                        <motion.div
                                            className="absolute bottom-0 left-1/2 h-0.5"
                                            style={{ backgroundColor: '#f56428', transformOrigin: 'center' }}
                                            initial={{ width: 0, x: '-50%' }}
                                            animate={{ width: showLine ? '100%' : 0, x: '-50%' }}
                                            transition={{ duration: 0.3, ease: 'easeInOut' }}
                                        />
                                    </button>
                                )
                            })}
                        </nav>

                        <div className="flex-shrink-0 z-10 hidden sm:block">
                            <motion.button
                                className="font-neue-montreal text-white px-4 md:px-6 py-2 md:py-3 rounded-lg text-xs sm:text-sm md:text-base font-medium relative overflow-hidden"
                                style={{ backgroundColor: '#f56428' }}
                                onHoverStart={() => setIsAgendeHovered(true)}
                                onHoverEnd={() => setIsAgendeHovered(false)}
                                whileHover={{ scale: 1.05 }}
                            >
                                <motion.div
                                    className="absolute inset-0 rounded-lg"
                                    style={{ background: `linear-gradient(135deg, #f56428 0%, #70309e 100%)` }}
                                    initial={{ opacity: 0 }}
                                    animate={{ opacity: isAgendeHovered ? 1 : 0 }}
                                />
                                <span className="relative z-10">Agende Agora</span>
                            </motion.button>
                        </div>

                        <button onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)} className="md:hidden z-50 relative w-8 h-8 flex items-center justify-center">
                            <motion.div className="absolute w-6 h-6 flex flex-col justify-center items-center" animate={isMobileMenuOpen ? 'open' : 'closed'}>
                                <motion.span className="block w-6 h-0.5 bg-[#70309e] rounded-full mb-1.5" variants={{ closed: { rotate: 0, y: 0 }, open: { rotate: 45, y: 8 } }} />
                                <motion.span className="block w-6 h-0.5 bg-[#70309e] rounded-full mb-1.5" variants={{ closed: { opacity: 1 }, open: { opacity: 0 } }} />
                                <motion.span className="block w-6 h-0.5 bg-[#70309e] rounded-full" variants={{ closed: { rotate: 0, y: 0 }, open: { rotate: -45, y: -8 } }} />
                            </motion.div>
                        </button>
                    </div>
                </div>
            </motion.header>

            {/* Hero Section Blog */}
            <section className="bg-[#70309e] py-20 px-4">
                <div className="max-w-7xl mx-auto text-center">
                    <motion.h1
                        className="font-jh-caudemars text-5xl md:text-7xl lg:text-8xl text-white mb-6"
                        initial={{ opacity: 0, y: 20 }}
                        animate={{ opacity: 1, y: 0 }}
                    >
                        Blog
                    </motion.h1>
                    <motion.p
                        className="font-neue-montreal text-lg text-white/80 max-w-2xl mx-auto"
                        initial={{ opacity: 0, y: 20 }}
                        animate={{ opacity: 1, y: 0 }}
                        transition={{ delay: 0.1 }}
                    >
                        Espaço dedicado ao conhecimento, acolhimento e reflexões sobre saúde mental contemporânea.
                    </motion.p>
                </div>
            </section>

            {/* Categories */}
            <section className="py-12 border-b border-[#70309e]/10">
                <div className="max-w-7xl mx-auto px-4 overflow-x-auto">
                    <div className="flex justify-center flex-nowrap sm:flex-wrap gap-4 min-w-max sm:min-w-0 pb-4 sm:pb-0">
                        {categories.map((cat) => (
                            <button
                                key={cat}
                                onClick={() => setSelectedCategory(cat)}
                                className={`font-neue-montreal px-6 py-2 rounded-full border-2 transition-all duration-300 ${selectedCategory === cat
                                    ? 'bg-[#70309e] border-[#70309e] text-white'
                                    : 'border-[#70309e]/30 text-[#70309e] hover:border-[#70309e]'
                                    }`}
                            >
                                {cat}
                            </button>
                        ))}
                    </div>
                </div>
            </section>

            {/* Posts Grid */}
            <section className="py-16 md:py-24 max-w-7xl mx-auto px-4">
                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <AnimatePresence mode='popLayout'>
                        {filteredPosts.map((post) => (
                            <motion.div
                                key={post.id}
                                layout
                                initial={{ opacity: 0, scale: 0.9 }}
                                animate={{ opacity: 1, scale: 1 }}
                                exit={{ opacity: 0, scale: 0.9 }}
                                whileHover={{ y: -10 }}
                                onClick={() => router.push(`/blog/${post.slug}`)}
                                className="bg-white rounded-2xl overflow-hidden shadow-lg border border-[#70309e]/5 cursor-pointer group"
                            >
                                <div className="relative h-64 w-full overflow-hidden">
                                    <Image
                                        src={post.image}
                                        alt={post.title}
                                        fill
                                        className="object-cover transition-transform duration-500 group-hover:scale-105"
                                    />
                                    <div className="absolute top-4 left-4">
                                        <span className="bg-[#f56428] text-white text-xs font-bold px-3 py-1 rounded-full uppercase">
                                            {post.category}
                                        </span>
                                    </div>
                                </div>
                                <div className="p-6">
                                    <span className="text-gray-400 text-sm font-neue-montreal mb-2 block">{post.date}</span>
                                    <h3 className="font-jh-caudemars text-2xl text-[#70309e] mb-4 line-clamp-2 leading-tight group-hover:text-[#f56428] transition-colors">
                                        {post.title}
                                    </h3>
                                    <p className="font-neue-montreal text-gray-600 mb-6 line-clamp-3">
                                        {post.excerpt}
                                    </p>
                                    <button className="text-[#f56428] font-bold font-neue-montreal flex items-center gap-2 group/btn">
                                        Ler mais
                                        <svg className="w-4 h-4 transition-transform group-hover/btn:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </button>
                                </div>
                            </motion.div>
                        ))}
                    </AnimatePresence>
                </div>
            </section>

            {/* Faixa preta com texto rolando */}
            <div className="w-full bg-[#161616] py-2 sm:py-3 md:py-4 overflow-hidden">
                <div className="flex whitespace-nowrap">
                    <motion.div
                        className="flex font-jh-caudemars text-white text-sm sm:text-base md:text-xl lg:text-2xl"
                        animate={{ x: ['0%', '-50%'] }}
                        transition={{ x: { repeat: Infinity, repeatType: 'loop', duration: 120, ease: 'linear' } }}
                    >
                        {Array.from({ length: 20 }).map((_, i) => (
                            <span key={`footer-text-1-${i}`} className="mr-2 sm:mr-3 md:mr-4">
                                Psiquiatria Contemporânea para Mentes que não cabem em Rótulos.
                            </span>
                        ))}
                    </motion.div>
                </div>
            </div>

            {/* Footer */}
            <footer ref={footerRef} className="relative w-full bg-[#70309e] py-12 sm:py-16 md:py-20 overflow-hidden text-center">
                <div className="absolute inset-0" style={{ backgroundImage: 'url(/patternrosa.svg)', backgroundSize: '800%', backgroundRepeat: 'no-repeat', backgroundPosition: `${50 + (smoothPosition.x - 50) * 0.1}% ${50 + (smoothPosition.y - 50) * 0.1}%`, opacity: 0.3 }} />
                <div className="relative z-10 max-w-7xl mx-auto px-4">
                    <Image src="/logoclara.svg" alt="Logo" width={250} height={70} className="mx-auto h-16 md:h-24 w-auto object-contain mb-10" />
                    <div className="flex justify-center gap-6 mb-10">
                        {menuItems.map((item) => (
                            <button
                                key={item}
                                onClick={() => navigateTo(item)}
                                className="text-white/80 hover:text-white font-neue-montreal text-sm md:text-base"
                            >
                                {item}
                            </button>
                        ))}
                    </div>
                    <div className="flex justify-center gap-6">
                        <Image src="/LINKEDIN.svg" alt="LinkedIn" width={24} height={24} className="cursor-pointer" />
                        <Image src="/INSTAGRAM.svg" alt="Instagram" width={24} height={24} className="cursor-pointer" />
                    </div>
                </div>
            </footer>

            {/* Botão Scroll to Top */}
            <motion.button
                onClick={scrollToTop}
                className="fixed bottom-4 right-4 sm:bottom-8 sm:right-8 bg-[#f56428] text-white rounded-full p-4 shadow-lg z-50"
                initial={{ opacity: 0, scale: 0 }}
                animate={{ opacity: showScrollTop ? 1 : 0, scale: showScrollTop ? 1 : 0 }}
            >
                <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M5 10l7-7m0 0l7 7m-7-7v18" />
                </svg>
            </motion.button>
        </div>
    )
}
