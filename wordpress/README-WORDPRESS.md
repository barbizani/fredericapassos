# 🌟 Frederica Passos - WordPress Theme

Versão WordPress idêntica do site original em React/Next.js, pronta para edição e personalização.

## 📋 Visão Geral

Este é um tema WordPress personalizado que replica 100% o design e funcionalidades do site original da Frederica Passos, psicóloga especializada em Psiquiatria Perinatal e Sexualidade Humana.

### ✨ Características

- **Design Idêntico**: Reprodução perfeita do layout original
- **Totalmente Responsivo**: Funciona perfeitamente em desktop, tablet e mobile
- **SEO Otimizado**: Estrutura preparada para motores de busca
- **Performance**: Otimizado para carregamento rápido
- **Acessibilidade**: Cumpre padrões de acessibilidade WCAG
- **Plugins Integrados**: ACF, Contact Form 7, Yoast SEO

## 🚀 Instalação Rápida

### Opção 1: Docker (Recomendado)

```bash
# 1. Navegue até a pasta do projeto
cd /Users/lucaskordi/gitstuff/fredericapassos

# 2. Inicie os containers
docker-compose up -d

# 3. Aguarde a instalação automática (pode levar alguns minutos)
# O WordPress será instalado automaticamente com o tema ativo

# 4. Acesse o site
open http://localhost:8000

# 5. Execute o script de configuração final
open http://localhost:8000/install.php
```

### Opção 2: Instalação Manual

```bash
# 1. Copie a pasta wordpress para seu servidor
cp -r wordpress /var/www/html/fredericapassos

# 2. Configure as permissões
chmod -R 755 /var/www/html/fredericapassos
chown -R www-data:www-data /var/www/html/fredericapassos

# 3. Crie o banco de dados MySQL
mysql -u root -p
CREATE DATABASE fredericapassos;
GRANT ALL PRIVILEGES ON fredericapassos.* TO 'wordpress'@'localhost' IDENTIFIED BY 'wordpress';
FLUSH PRIVILEGES;
EXIT;

# 4. Configure o wp-config.php (se necessário)
# Edite as constantes DB_HOST, DB_USER, DB_PASSWORD conforme seu ambiente

# 5. Execute a instalação via navegador
open http://localhost/fredericapassos/install.php
```

## 🔧 Configuração

### Primeiro Acesso

Após a instalação, acesse:
- **Site**: http://localhost:8000 (ou seu domínio)
- **Admin**: http://localhost:8000/wp-admin
- **Usuário**: admin
- **Senha**: admin123

### ⚠️ Segurança - Mude a senha imediatamente!

1. Faça login no admin
2. Vá em **Usuários → Perfil**
3. Altere a senha para algo seguro

## 🎨 Personalização

### Conteúdo

- **Página Inicial**: Páginas → Home
- **Sobre**: Páginas → Sobre
- **Contato**: Páginas → Contato
- **Formações**: Posts → Formações (Custom Post Type)

### Aparência

- **Personalizar**: Aparência → Personalizar
- **Menus**: Aparência → Menus
- **Widgets**: Aparência → Widgets

### Plugins

#### Advanced Custom Fields (ACF)
- Gerencia campos personalizados
- Edite grupos de campos em **Custom Fields → Field Groups**

#### Contact Form 7
- Gerencia formulários de contato
- Edite formulários em **Contact → Contact Forms**

#### Yoast SEO
- Otimização para motores de busca
- Configure SEO por página/post

## 📁 Estrutura do Tema

```
frederica-passos/
├── assets/
│   ├── css/
│   │   ├── main.css          # Estilos principais
│   │   └── animations.css    # Animações
│   ├── js/
│   │   └── main.js           # JavaScript principal
│   └── images/               # Todas as imagens e mídias
├── inc/
│   └── setup-plugins.php     # Configuração automática
├── template-parts/
│   ├── header.php            # Cabeçalho
│   ├── main-content.php      # Conteúdo principal
│   └── footer.php            # Rodapé
├── functions.php             # Funções do tema
├── index.php                 # Template principal
└── style.css                 # Estilos do tema (obrigatório)
```

## 🔄 Funcionalidades Migradas

### Do React/Next.js para WordPress

- ✅ **Carrossel Hero**: 3 slides com animações
- ✅ **Typewriter Effect**: Texto animado
- ✅ **Animações de Scroll**: Fade-in e parallax
- ✅ **Formulário de Contato**: AJAX completo
- ✅ **Menu Mobile**: Animação hamburger
- ✅ **Scroll to Top**: Botão animado
- ✅ **Cards Hover**: Efeitos visuais
- ✅ **Contadores Animados**: Estatísticas
- ✅ **FAQ Accordion**: Perguntas frequentes

### Plugins e Integrações

- ✅ **ACF**: Campos personalizados
- ✅ **Contact Form 7**: Formulários
- ✅ **Yoast SEO**: SEO
- ✅ **WP Super Cache**: Performance

## 🚀 Deploy em Produção

### 1. Servidor LAMP/LEMP

```bash
# Exemplo com Apache
sudo apt update
sudo apt install apache2 mysql-server php libapache2-mod-php php-mysql
sudo systemctl enable apache2
sudo systemctl enable mysql
```

### 2. Upload dos Arquivos

```bash
# Via FTP ou SCP
scp -r wordpress/* user@server:/var/www/html/
```

### 3. Configuração do Banco

```sql
CREATE DATABASE fredericapassos_prod;
CREATE USER 'wp_user'@'localhost' IDENTIFIED BY 'secure_password';
GRANT ALL PRIVILEGES ON fredericapassos_prod.* TO 'wp_user'@'localhost';
FLUSH PRIVILEGES;
```

### 4. Configurações Finais

1. Atualize `wp-config.php` com dados de produção
2. Execute `http://seudominio.com/install.php`
3. Configure HTTPS (Let's Encrypt recomendado)
4. Configure backups automáticos

## 🔧 Manutenção

### Atualizações

```bash
# Atualizar WordPress
wp core update

# Atualizar plugins
wp plugin update --all

# Atualizar tema
wp theme update frederica-passos
```

### Backup

```bash
# Backup do banco
mysqldump -u username -p fredericapassos > backup.sql

# Backup dos arquivos
tar -czf backup-files.tar.gz wordpress/
```

### Performance

- Ative o WP Super Cache
- Otimize imagens com plugins como Smush
- Use CDN para assets estáticos
- Configure minificação de CSS/JS

## 🐛 Troubleshooting

### Problema: Plugins não instalam
```bash
# Verifique permissões
chmod -R 755 wp-content/
chown -R www-data:www-data wp-content/
```

### Problema: Tema não ativa
```php
// Adicione ao wp-config.php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
```

### Problema: Formulário não funciona
1. Verifique se Contact Form 7 está ativo
2. Vá em Contact → Integration
3. Configure o método de envio (Mail)

## 📞 Suporte

Para suporte técnico ou customizações:

- **Email**: suporte@fredericapassos.pt
- **Documentação**: Este README
- **Issues**: GitHub Issues (se aplicável)

## 📝 Changelog

### v1.0.0
- ✅ Migração completa do React/Next.js
- ✅ Tema WordPress funcional
- ✅ Plugins integrados
- ✅ Instalação automática
- ✅ Design 100% idêntico

---

## 🎉 Pronto para usar!

Seu site WordPress está agora 100% idêntico ao original e pronto para edição. Todas as funcionalidades foram migradas e o tema está otimizado para performance e SEO.

**Aproveite e personalize conforme suas necessidades!** 🚀