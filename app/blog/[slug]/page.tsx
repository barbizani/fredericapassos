'use client'

import { motion, useScroll, useTransform } from 'framer-motion'
import { useState, useEffect, useRef } from 'react'
import Image from 'next/image'
import { useRouter } from 'next/navigation'
import { blogPosts, BlogPost } from '../../../data/blog-data'
import { useParams } from 'next/navigation'

export default function BlogPostDetail() {
    const router = useRouter()
    const { slug } = useParams()
    const post = blogPosts.find(p => p.slug === slug)

    const [isHeaderVisible, setIsHeaderVisible] = useState(true)
    const [lastScrollY, setLastScrollY] = useState(0)
    const [isAgendeHovered, setIsAgendeHovered] = useState(false)
    const [hoveredItem, setHoveredItem] = useState<string | null>(null)
    const [smoothPosition, setSmoothPosition] = useState({ x: 50, y: 50 })
    const [mousePosition, setMousePosition] = useState({ x: 50, y: 50 })

    const footerRef = useRef<HTMLElement>(null)
    const containerRef = useRef<HTMLDivElement>(null)
    const { scrollYProgress } = useScroll({
        target: containerRef,
        offset: ["start start", "end end"]
    })

    const scaleX = useTransform(scrollYProgress, [0, 1], [0, 1])

    const menuItems = [
        'Início',
        'Sobre',
        'Áreas de Atuação',
        'Serviços',
        'Blog',
        'Contato'
    ]

    useEffect(() => {
        const handleScroll = () => {
            const currentScrollY = window.scrollY
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

    const navigateTo = (path: string) => {
        if (path === 'Blog') {
            router.push('/blog')
            return
        }
        if (path === 'Início') {
            router.push('/inicio')
            return
        }
        router.push(`/inicio#${path}`)
    }

    if (!post) {
        return (
            <div className="min-h-screen bg-[#f2ede7] flex items-center justify-center">
                <div className="text-center">
                    <h1 className="font-jh-caudemars text-4xl text-[#70309e] mb-4">Post não encontrado</h1>
                    <button onClick={() => router.push('/blog')} className="text-[#f56428] font-bold font-neue-montreal">
                        Voltar para o Blog
                    </button>
                </div>
            </div>
        )
    }

    return (
        <div ref={containerRef} className="min-h-screen bg-[#f2ede7]">
            {/* Reading Progress Bar */}
            <motion.div
                className="fixed top-0 left-0 right-0 h-1 bg-[#f56428] z-[60] origin-left"
                style={{ scaleX }}
            />

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
                            {menuItems.map((item) => (
                                <button
                                    key={item}
                                    className="font-neue-montreal text-sm lg:text-base relative px-2 py-1 transition-all duration-200 text-center"
                                    style={{
                                        color: hoveredItem === item || (item === 'Blog') ? '#70309e' : '#6b7280',
                                        fontWeight: item === 'Blog' ? 600 : 400,
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
                                        animate={{ width: (item === 'Blog' || hoveredItem === item) ? '100%' : 0, x: '-50%' }}
                                        transition={{ duration: 0.3, ease: 'easeInOut' }}
                                    />
                                </button>
                            ))}
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
                    </div>
                </div>
            </motion.header>

            {/* Hero Section */}
            <section className="relative h-[60vh] md:h-[70vh] w-full overflow-hidden pt-16 md:pt-20">
                <Image
                    src={post.image}
                    alt={post.title}
                    fill
                    className="object-cover object-top"
                    priority
                />
                <div className="absolute inset-0 bg-black/40 flex items-end">
                    <div className="max-w-4xl mx-auto px-4 pb-12 w-full text-white">
                        <motion.span
                            className="bg-[#f56428] text-white text-xs md:text-sm font-bold px-4 py-1.5 rounded-full uppercase mb-4 inline-block"
                            initial={{ opacity: 0, y: 20 }}
                            animate={{ opacity: 1, y: 0 }}
                        >
                            {post.category}
                        </motion.span>
                        <motion.h1
                            className="font-jh-caudemars text-4xl md:text-6xl lg:text-7xl leading-tight mb-4"
                            initial={{ opacity: 0, y: 20 }}
                            animate={{ opacity: 1, y: 0 }}
                            transition={{ delay: 0.1 }}
                        >
                            {post.title}
                        </motion.h1>
                        <motion.div
                            className="flex items-center gap-4 text-sm md:text-base opacity-80"
                            initial={{ opacity: 0 }}
                            animate={{ opacity: 1 }}
                            transition={{ delay: 0.2 }}
                        >
                            <span>{post.date}</span>
                            <span className="w-1 h-1 bg-white rounded-full"></span>
                            <span>Tempo de leitura estimado: 5 min</span>
                        </motion.div>
                    </div>
                </div>
            </section>

            {/* Content Section */}
            <section className="py-16 md:py-24 max-w-3xl mx-auto px-4">
                <nav className="flex gap-2 text-sm text-gray-500 mb-12 font-neue-montreal">
                    <button onClick={() => router.push('/inicio')} className="hover:text-[#70309e]">Início</button>
                    <span>/</span>
                    <button onClick={() => router.push('/blog')} className="hover:text-[#70309e]">Blog</button>
                    <span>/</span>
                    <span className="text-[#70309e] font-medium truncate">{post.title}</span>
                </nav>

                <div
                    className="prose prose-lg md:prose-xl font-neue-montreal text-gray-800 
                               prose-headings:font-jh-caudemars prose-headings:text-[#70309e]
                               prose-p:leading-relaxed prose-li:leading-relaxed
                               prose-strong:text-[#70309e] prose-strong:font-bold
                               max-w-none"
                    dangerouslySetInnerHTML={{ __html: post.content }}
                />

                <div className="mt-16 pt-8 border-t border-gray-200">
                    <h4 className="font-jh-caudemars text-2xl text-[#70309e] mb-6">Partilhar este artigo</h4>
                    <div className="flex gap-4">
                        {['WhatsApp', 'LinkedIn', 'Facebook', 'E-mail'].map((social) => (
                            <button key={social} className="px-5 py-2.5 bg-[#70309e] text-white rounded-full text-sm font-medium hover:bg-[#5a2680] transition-colors duration-300 shadow-sm">
                                {social}
                            </button>
                        ))}
                    </div>
                </div>
            </section>

            {/* Footer */}
            <footer ref={footerRef} className="relative w-full bg-[#70309e] py-12 sm:py-16 md:py-20 overflow-hidden text-center">
                <div className="absolute inset-0" style={{ backgroundImage: 'url(/patternrosa.svg)', backgroundSize: '800%', backgroundRepeat: 'no-repeat', backgroundPosition: `${50 + (smoothPosition.x - 50) * 0.1}% ${50 + (smoothPosition.y - 50) * 0.1}%`, opacity: 0.3 }} />
                <div className="relative z-10 max-w-7xl mx-auto px-4">
                    <Image src="/logoclara.svg" alt="Logo" width={250} height={70} className="mx-auto h-16 md:h-24 w-auto object-contain mb-10" />
                    <div className="flex justify-center flex-wrap gap-6 mb-10">
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
        </div>
    )
}
