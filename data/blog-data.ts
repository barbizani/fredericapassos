export interface BlogPost {
    id: string;
    title: string;
    excerpt: string;
    date: string;
    category: 'Psiquiatria Perinatal' | 'Saúde Mental da Mulher' | 'Orientação Parental' | 'Sexualidade Humana' | 'Geral';
    image: string;
    slug: string;
    content: string;
}

export const blogPosts: BlogPost[] = [
    {
        id: '1',
        title: 'O que é a Psiquiatria Perinatal e porque é que ela é fundamental?',
        excerpt: 'Entenda como o cuidado especializado durante a gestação e o pós-parto pode transformar a saúde mental da mãe e do bebé.',
        date: '06 Fev 2026',
        category: 'Psiquiatria Perinatal',
        image: '/vertical/perinatal.webp',
        slug: 'psiquiatria-perinatal-importancia',
        content: `
            <p>A Psiquiatria Perinatal é uma subespecialidade dedicada à saúde mental da mulher no período que engloba a conceção, a gravidez e o primeiro ano após o parto (puerpério). Frequentemente subestimada, esta fase representa uma das transições biológicas, psicológicas e sociais mais intensas na vida de uma mulher.</p>

            <h3>Porque é que o cuidado integral é essencial?</h3>
            <p>Diferente da psiquiatria geral, a abordagem perinatal considera o binómio mãe-bebé. O tratamento não visa apenas a remissão de sintomas maternos, mas a preservação do vínculo afetivo e o desenvolvimento saudável da criança. Estudos demonstram que a saúde mental materna não tratada pode ter impactos a longo prazo no desenvolvimento cognitivo e emocional do bebé.</p>

            <h3>SEO & AEO: O que as mães procuram?</h3>
            <ul>
                <li><strong>A depressão na gravidez é comum?</strong> Sim, e requer suporte especializado.</li>
                <li><strong>Posso tomar medicação psiquiátrica durante a amamentação?</strong> Na maioria dos casos, sim, sob acompanhamento rigoroso.</li>
                <li><strong>O que é o "Baby Blues"?</strong> Uma instabilidade emocional leve e transitória, distinta da depressão pós-parto.</li>
            </ul>

            <p>Na nossa prática clínica, focamo-nos numa abordagem integral que vai além do consultório, integrando nutrição, sono e suporte social para uma maternidade mais serena e equilibrada.</p>
        `
    },
    {
        id: '2',
        title: 'Depressão Pós-Parto: Sinais de Alerta e Como Procurar Ajuda',
        excerpt: 'Identificar os primeiros sintomas é o primeiro passo para uma recuperação segura e humana.',
        date: '05 Fev 2026',
        category: 'Psiquiatria Perinatal',
        image: '/vertical/mulher.webp',
        slug: 'depressao-pos-parto-sinais',
        content: `
            <p>A depressão pós-parto (DPP) afeta cerca de uma em cada quatro mulheres. No entanto, o estigma ainda impede que muitas procurem ajuda. Diferente do "baby blues", a DPP é mais persistente e severa, exigindo intervenção profissional.</p>

            <h3>Sinais de alerta importantes:</h3>
            <ul>
                <li>Tristeza profunda ou desesperança persistente.</li>
                <li>Dificuldade em criar vínculo com o bebé.</li>
                <li>Anedonia (perda de prazer em atividades anteriormente gratificantes).</li>
                <li>Alterações graves do sono (insónia mesmo quando o bebé dorme).</li>
                <li>Pensamentos intrusivos ou receio excessivo de magoar o bebé ou a si própria.</li>
            </ul>

            <p>O tratamento integral envolve psicoterapia, ajustes no estilo de vida e, quando necessário, farmacoterapia com perfil de segurança para a amamentação. Recorde-se: pedir ajuda não é um sinal de fraqueza, mas um ato de cuidado consigo e com o seu filho.</p>
        `
    },
    {
        id: '3',
        title: 'O Impacto Hormonal na Saúde Mental Feminina',
        excerpt: 'Das oscilações do ciclo menstrual à menopausa, entenda como as hormonas influenciam as emoções.',
        date: '04 Fev 2026',
        category: 'Saúde Mental da Mulher',
        image: '/blog/impacto-hormonal.jpg',
        slug: 'impacto-hormonal-saude-mental',
        content: `
            <p>A saúde mental da mulher está intrinsecamente ligada às flutuações hormonais ao longo da vida. Desde a menarca até à pós-menopausa, o estrogénio e a progesterona desempenham papéis cruciais como mensageiros químicos no cérebro.</p>

            <h3>Ciclos e Emoções</h3>
            <p>O Transtorno Disfórico Pré-Menstrual (TDPM) é um exemplo claro de como a sensibilidade cerebral às hormonas pode causar sofrimento psíquico intenso. Não é apenas "TPM"; é uma condição clínica que impacta o trabalho, os relacionamentos e a qualidade de vida.</p>

            <h3>A Transição para a Menopausa</h3>
            <p>O climatério é outra fase crítica, onde a queda hormonal pode desencadear sintomas depressivos e ansiosos. Uma abordagem integral, que une psiquiatria, ginecologia e medicina do estilo de vida, é fundamental para navegar estas transições com saúde e dignidade.</p>
        `
    },
    {
        id: '4',
        title: 'Orientação Parental: Criar Ligações Reais com os Filhos',
        excerpt: 'Como a comunicação não-violenta e o estabelecimento de limites saudáveis fortalecem os laços familiares.',
        date: '03 Fev 2026',
        category: 'Orientação Parental',
        image: '/vertical/parental.webp',
        slug: 'orientacao-parental-conexoes',
        content: `
            <p>Educar os filhos na contemporaneidade é um desafio sem precedentes. A orientação parental não se resume a dar "dicas de comportamento", mas a reestruturar a dinâmica familiar para que o desenvolvimento emocional da criança seja uma prioridade.</p>

            <h3>Pilares da Orientação Parental Moderna:</h3>
            <ol>
                <li><strong>Comunicação Não-Violenta:</strong> Validar sentimentos antes de corrigir comportamentos.</li>
                <li><strong>Limites com Acolhimento:</strong> A firmeza é necessária para a segurança da criança, mas nunca deve ser punitiva ou humilhante.</li>
                <li><strong>Autorregulação dos Pais:</strong> Pais equilibrados promovem filhos resilientes.</li>
            </ol>

            <p>Ao trabalhar a saúde mental da família como um todo, promovemos uma base sólida para que a criança cresça com autoestima e inteligência emocional.</p>
        `
    },
    {
        id: '5',
        title: 'Disfunções Sexuais e Saúde Mental: Quebrar Tabus',
        excerpt: 'A sexualidade é parte integrante da saúde. Entenda como o tratamento psiquiátrico pode ajudar.',
        date: '02 Fev 2026',
        category: 'Sexualidade Humana',
        image: '/vertical/sexhuman.webp',
        slug: 'sexualidade-humana-saude-mental',
        content: `
            <p>A sexualidade é um dos pilares da qualidade de vida, mas ainda é pouco abordada nos consultórios médicos. Muitos transtornos mentais, como a ansiedade e a depressão, têm reflexos diretos na libido e na resposta sexual.</p>

            <h3>A Relação entre Mente e Sexualidade</h3>
            <p>Disfunções sexuais podem ser a causa ou a consequência de sofrimento psíquico. Além disso, o uso de certas medicações pode impactar a vida sexual, o que exige um manejo cuidadoso por parte do especialista para garantir o bem-estar global do paciente.</p>

            <p>Tratar a sexualidade humana exige uma escuta sensível, livre de julgamentos, focada na integração entre o corpo e a mente.</p>
        `
    },
    {
        id: '6',
        title: 'Mentes que não cabem em Rótulos: Uma Abordagem Contemporânea',
        excerpt: 'Porque o diagnóstico deve ser apenas o início de um olhar mais profundo sobre o ser humano.',
        date: '01 Fev 2026',
        category: 'Geral',
        image: '/heroinit.webp',
        slug: 'mentes-sem-rotulos',
        content: `
            <p>Na psiquiatria contemporânea, corremos o risco de focar excessivamente em códigos e check-lists de sintomas, esquecendo que por trás de cada diagnóstico existe uma biografia única.</p>

            <h3>Para além do diagnóstico</h3>
            <p>Ter um diagnóstico ajuda a guiar o tratamento, mas não define quem a pessoa é. A abordagem integral procura compreender os fatores genéticos, biológicos, ambientais e espirituais que compõem o quadro clínico.</p>

            <p>O nosso objetivo é promover a autonomia e o florescimento humano, permitindo que a pessoa viva para além das limitações de um transtorno mental.</p>
        `
    },
    {
        id: '7',
        title: 'Ansiedade na Gestação: Como Gerir o Medo do Desconhecido',
        excerpt: 'Estratégias práticas e suporte clínico para uma gravidez mais tranquila e equilibrada.',
        date: '30 Jan 2026',
        category: 'Psiquiatria Perinatal',
        image: '/vertical/perinatal.webp',
        slug: 'ansiedade-gestacao',
        content: `
            <p>Sentir alguma ansiedade perante a chegada de um filho é natural, mas quando a preocupação se torna paralisante e constante, estamos perante um quadro que requer atenção profissional.</p>

            <h3>Impactos da Ansiedade na Gravidez</h3>
            <p>Níveis elevados de cortisol podem afetar o ambiente intrauterino. Por isso, gerir a ansiedade não é um "luxo", mas uma medida de saúde fundamental para a mãe e para o feto.</p>

            <h3>Abordagens de Tratamento</h3>
            <p>Técnicas de relaxamento, higiene do sono e psicoterapia são as primeiras linhas de cuidado. Em casos moderados a graves, a medicação segura pode ser a chave para estabilizar a paciente e prevenir complicações no pós-parto.</p>
        `
    },
    {
        id: '8',
        title: 'Autocuidado para Mães: Muito mais do que um Banho Demorado',
        excerpt: 'A importância de preservar a identidade individual perante os desafios da maternidade.',
        date: '28 Jan 2026',
        category: 'Saúde Mental da Mulher',
        image: '/vertical/mulher.webp',
        slug: 'autocuidado-materno',
        content: `
            <p>O conceito de autocuidado foi banalizado por campanhas de cosméticos. Para uma mãe, o autocuidado real significa estabelecer limites, gerir a carga mental e reconectar-se com a sua identidade para além da maternidade.</p>

            <h3>O Esgotamento Materno</h3>
            <p>Viver em função constante das necessidades de terceiros leva, inevitavelmente, ao esgotamento físico e emocional. O autocuidado é, portanto, um ato de preservação da saúde mental.</p>

            <p>Como psiquiatra, incentivo as minhas pacientes a construírem redes de apoio reais e a reservarem espaços de silêncio e prazer individual nas suas rotinas.</p>
        `
    },
    {
        id: '9',
        title: 'O Papel do Parceiro na Saúde Mental Perinatal',
        excerpt: 'Como a rede de apoio pode e deve envolver-se no cuidado emocional da família.',
        date: '25 Jan 2026',
        category: 'Orientação Parental',
        image: '/vertical/parental.webp',
        slug: 'papel-do-parceiro-perinatal',
        content: `
            <p>A saúde mental da mulher na perinatalidade é sustentada por uma rede de apoio, e o parceiro ou parceira ocupa o lugar central desta rede. O envolvimento ativo não deve ser visto como "ajuda", mas como coparentalidade.</p>

            <h3>Como pode o acompanhante ajudar?</h3>
            <ol>
                <li><strong>Proteção do Sono:</strong> Garantir janelas de descanso para a mãe.</li>
                <li><strong>Gestão de Visitas:</strong> Filtrar as exigências externas para preservar a intimidade da família.</li>
                <li><strong>Apoio Emocional:</strong> Escuta ativa e sem julgamento perante as oscilações de humor.</li>
            </ol>

            <p>O parceiro também está sujeito a stress e alterações emocionais, devendo o cuidado estender-se a ele para garantir um ambiente familiar saudável.</p>
        `
    },
    {
        id: '10',
        title: 'Burnout Parental: Quando o Cansaço excede o Limite',
        excerpt: 'Reconhecer o esgotamento físico e mental decorrente das pressões da educação dos filhos.',
        date: '20 Jan 2026',
        category: 'Orientação Parental',
        image: '/vertical/parental.webp',
        slug: 'burnout-parental',
        content: `
            <p>O Burnout Parental é uma síndrome de exaustão, distanciamento emocional e perda do sentido de realização na paternidade ou maternidade. Resulta de um stress parental prolongado sem recursos de enfrentamento suficientes.</p>

            <h3>Sinais de Burnout Parental:</h3>
            <ul>
                <li>Exaustão física e emocional extrema.</li>
                <li>Irritabilidade constante com os filhos.</li>
                <li>Sensação de incompetência ou de ser um "mau pai/mãe".</li>
            </ul>

            <p>O diagnóstico correto e a intervenção precoce podem evitar a progressão para quadros depressivos graves e melhorar significativamente a dinâmica familiar.</p>
        `
    }
];
