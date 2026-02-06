export interface BlogPost {
    id: string;
    title: string;
    excerpt: string;
    date: string;
    category: 'Psiquiatria Perinatal' | 'Saúde Mental da Mulher' | 'Orientação Parental' | 'Sexualidade Humana' | 'Geral';
    image: string;
    slug: string;
}

export const blogPosts: BlogPost[] = [
    {
        id: '1',
        title: 'O que é a Psiquiatria Perinatal e por que ela é fundamental?',
        excerpt: 'Entenda como o cuidado especializado durante a gestação e o pós-parto pode transformar a saúde mental da mãe e do bebê.',
        date: '06 Fev 2026',
        category: 'Psiquiatria Perinatal',
        image: '/vertical/perinatal.webp',
        slug: 'psiquiatria-perinatal-importancia'
    },
    {
        id: '2',
        title: 'Depressão Pós-Parto: Sinais de Alerta e Como Buscar Ajuda',
        excerpt: 'Identificar os primeiros sintomas é o primeiro passo para uma recuperação segura e humana.',
        date: '05 Fev 2026',
        category: 'Psiquiatria Perinatal',
        image: '/vertical/mulher.webp',
        slug: 'depressao-pos-parto-sinais'
    },
    {
        id: '3',
        title: 'O Impacto Hormonal na Saúde Mental Feminina',
        excerpt: 'Das oscilações do ciclo menstrual à menopausa, entenda como nossos hormônios influenciam nossas emoções.',
        date: '04 Fev 2026',
        category: 'Saúde Mental da Mulher',
        image: '/vertical/mulher.webp',
        slug: 'impacto-hormonal-saude-mental'
    },
    {
        id: '4',
        title: 'Orientação Parental: Criando Conexões Reais com os Filhos',
        excerpt: 'Como a comunicação não-violenta e o estabelecimento de limites saudáveis fortalecem os laços familiares.',
        date: '03 Fev 2026',
        category: 'Orientação Parental',
        image: '/vertical/parental.webp',
        slug: 'orientacao-parental-conexoes'
    },
    {
        id: '5',
        title: 'Disfunções Sexuais e Saúde Mental: Quebrando Tabus',
        excerpt: 'A sexualidade é parte integrante da saúde. Entenda como o tratamento psiquiátrico pode ajudar.',
        date: '02 Fev 2026',
        category: 'Sexualidade Humana',
        image: '/vertical/sexhuman.webp',
        slug: 'sexualidade-humana-saude-mental'
    },
    {
        id: '6',
        title: 'Mentes que não cabem em Rótulos: Uma Abordagem Contemporânea',
        excerpt: 'Por que o diagnóstico deve ser apenas o início de um olhar mais profundo sobre o ser humano.',
        date: '01 Fev 2026',
        category: 'Geral',
        image: '/heroinit.webp',
        slug: 'mentes-sem-rotulos'
    },
    {
        id: '7',
        title: 'Ansiedade na Gestação: Como Manejar o Medo do Desconhecido',
        excerpt: 'Estratégias práticas e suporte clínico para uma gravidez mais tranquila e equilibrada.',
        date: '30 Jan 2026',
        category: 'Psiquiatria Perinatal',
        image: '/vertical/perinatal.webp',
        slug: 'ansiedade-gestacao'
    },
    {
        id: '8',
        title: 'Autocuidado para Mães: Muito Além de um Banho Demorado',
        excerpt: 'A importância de preservar a identidade individual em meio aos desafios da maternidade.',
        date: '28 Jan 2026',
        category: 'Saúde Mental da Mulher',
        image: '/vertical/mulher.webp',
        slug: 'autocuidado-materno'
    },
    {
        id: '9',
        title: 'O Papel do Parceiro na Saúde Mental Perinatal',
        excerpt: 'Como a rede de apoio pode e deve se envolver no cuidado emocional da família.',
        date: '25 Jan 2026',
        category: 'Orientação Parental',
        image: '/vertical/parental.webp',
        slug: 'papel-do-parceiro-perinatal'
    },
    {
        id: '10',
        title: 'Burnout Parental: Quando o Cansar excede o Limite',
        excerpt: 'Reconhecendo o esgotamento físico e mental decorrente das pressões da criação dos filhos.',
        date: '20 Jan 2026',
        category: 'Orientação Parental',
        image: '/vertical/parental.webp',
        slug: 'burnout-parental'
    }
];
