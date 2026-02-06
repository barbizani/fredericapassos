# 📦 Deploy para fredericapassos.pt/cpanel

## ✅ Arquivos Preparados

Todos os arquivos necessários estão nesta pasta, prontos para upload no cPanel.

## 📋 Checklist de Instalação

### ✅ Passo 1: Preparação no cPanel
- [ ] Criar banco de dados MySQL
- [ ] Criar usuário MySQL
- [ ] Adicionar usuário ao banco com privilégios totais
- [ ] Anotar: Nome do banco, Usuário, Senha

### ✅ Passo 2: Upload dos Arquivos
- [ ] Acessar File Manager do cPanel
- [ ] Navegar até `public_html/cpanel/`
- [ ] Fazer upload de TODOS os arquivos desta pasta
- [ ] Verificar se todos os arquivos foram enviados

### ✅ Passo 3: Configurar wp-config.php
- [ ] Renomear `wp-config-production.php` para `wp-config.php`
- [ ] Editar e preencher:
  - DB_NAME: nome do banco criado
  - DB_USER: usuário MySQL
  - DB_PASSWORD: senha do usuário MySQL
  - DB_HOST: geralmente `localhost`
- [ ] Gerar chaves de segurança em: https://api.wordpress.org/secret-key/1.1/salt/
- [ ] Substituir as chaves no wp-config.php

### ✅ Passo 4: Importar Banco de Dados
- [ ] Acessar phpMyAdmin no cPanel
- [ ] Selecionar o banco de dados criado
- [ ] Importar arquivo `database.sql`
- [ ] Verificar se importação foi bem-sucedida

### ✅ Passo 5: Atualizar URLs
- [ ] No phpMyAdmin, executar arquivo `update-urls.sql`
- [ ] Ou executar manualmente os comandos SQL do arquivo

### ✅ Passo 6: Configurar Permissões
- [ ] Via File Manager: clicar com botão direito → Change Permissions
- [ ] wp-config.php: 644
- [ ] wp-content/: 755
- [ ] wp-content/themes/: 755
- [ ] wp-content/plugins/: 755
- [ ] wp-content/uploads/: 755

### ✅ Passo 7: Acessar o Site
- [ ] Acessar: https://fredericapassos.pt/cpanel
- [ ] Fazer login: https://fredericapassos.pt/cpanel/wp-admin
- [ ] Usuário: admin
- [ ] Senha: admin123 (ALTERAR IMEDIATAMENTE!)

### ✅ Passo 8: Verificar e Ativar
- [ ] Ativar tema: Aparência → Temas → Frederica Passos
- [ ] Verificar Elementor: Plugins → Instalar Elementor se necessário
- [ ] Editar página Home: Páginas → Home → Editar com Elementor
- [ ] Verificar se o conteúdo está correto

### ✅ Passo 9: Segurança
- [ ] Alterar senha do admin
- [ ] Ativar SSL/HTTPS no cPanel
- [ ] Configurar backups automáticos
- [ ] Atualizar WordPress, temas e plugins

## 📁 Arquivos Importantes

- `database.sql` - Banco de dados completo
- `update-urls.sql` - Script para atualizar URLs
- `wp-config-production.php` - Template de configuração
- `.htaccess` - Configurações do Apache
- `QUICK-START.md` - Guia rápido
- `INSTRUCOES-INSTALACAO-CPANEL.md` - Instruções detalhadas

## 🔗 URLs Finais

- **Site:** https://fredericapassos.pt/cpanel
- **Admin:** https://fredericapassos.pt/cpanel/wp-admin
- **Login padrão:** admin / admin123

## ⚠️ IMPORTANTE

1. **Altere a senha do admin** imediatamente após primeiro login
2. **Ative SSL/HTTPS** antes de colocar em produção
3. **Configure backups** regulares no cPanel
4. **Mantenha WordPress atualizado** para segurança

## 🆘 Suporte

Se encontrar problemas:
1. Verifique os logs de erro no cPanel
2. Verifique permissões dos arquivos
3. Verifique se wp-config.php está correto
4. Verifique se o banco de dados foi importado corretamente
