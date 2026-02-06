# 🚀 Guia Rápido - Instalação no cPanel

## ⚡ Passos Rápidos

### 1. Upload dos Arquivos
- **Onde:** cPanel → File Manager → `public_html/cpanel/`
- **Como:** Faça upload de TODOS os arquivos desta pasta
- **Dica:** Compacte em ZIP primeiro para upload mais rápido
- 📖 **Guia detalhado:** `COMO-FAZER-UPLOAD.md`

### 2. Criar Banco de Dados
- ⚠️ **IMPORTANTE:** Crie no cPanel → MySQL Databases (NÃO no phpMyAdmin!)
- Crie banco: `fredericapassos_wp`
- Crie usuário e senha
- Adicione usuário ao banco com privilégios totais
- ⚠️ **ANOTE:** Nome completo do banco, usuário e senha (com prefixos!)
- 📖 **Veja guia detalhado:** `COMO-CRIAR-BANCO-DADOS.md`

### 3. Configurar wp-config.php
- Renomeie `wp-config-production.php` → `wp-config.php`
- Edite e preencha: DB_NAME, DB_USER, DB_PASSWORD
- Gere chaves em: https://api.wordpress.org/secret-key/1.1/salt/

### 4. Importar Banco
- cPanel → phpMyAdmin
- Selecione o banco criado
- Importe: `database.sql`

### 5. Atualizar URLs
- No phpMyAdmin, execute o arquivo: `update-urls.sql`
- Ou execute manualmente os comandos SQL

### 6. Acessar
- Site: https://fredericapassos.pt/cpanel
- Admin: https://fredericapassos.pt/cpanel/wp-admin
- Login: admin / admin123 (altere após primeiro login!)

### 7. Verificar
- Ativar tema: Aparência → Temas → Frederica Passos
- Verificar Elementor: Plugins → Elementor (instalar se necessário)
- Editar página Home: Páginas → Home → Editar com Elementor

## ⚠️ IMPORTANTE

1. **Altere a senha do admin** após primeiro login!
2. **Ative SSL/HTTPS** no cPanel
3. **Configure backups** regulares
4. **Atualize WordPress** e plugins regularmente

## 🔧 Problemas Comuns

**Erro 500:**
- Verifique permissões: `chmod 644 wp-config.php`
- Verifique logs em cPanel → Errors

**Página em branco:**
- Verifique se todos os arquivos foram enviados
- Verifique se wp-config.php está correto

**Imagens não aparecem:**
- Verifique permissões: `chmod -R 755 wp-content/uploads/`
- Execute novamente o update-urls.sql
