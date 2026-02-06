# 📦 Instalação no cPanel - fredericapassos.pt

## Passo 1: Criar Banco de Dados no cPanel

⚠️ **IMPORTANTE:** O banco de dados é criado em **cPanel → MySQL Databases**, NÃO no phpMyAdmin!

1. Acesse cPanel → MySQL Databases (procure na seção "Databases" ou "Bancos de Dados")
2. Na seção "Create New Database", crie um novo banco de dados (ex: `fredericapassos_wp`)
3. Na seção "MySQL Users", crie um novo usuário MySQL com senha forte
4. Na seção "Add User To Database", adicione o usuário ao banco com privilégios totais (ALL PRIVILEGES)
5. ⚠️ **ANOTE:** Nome completo do banco (com prefixo do usuário), Usuário completo, Senha
6. 📖 **Para instruções detalhadas com screenshots, veja:** `COMO-CRIAR-BANCO-DADOS.md`

## Passo 2: Upload dos Arquivos

📖 **Para instruções detalhadas, veja:** `COMO-FAZER-UPLOAD.md`

### Via File Manager do cPanel (Recomendado):
1. Acesse cPanel → File Manager
2. Navegue até `public_html/cpanel` (crie a pasta se não existir)
3. **Opção A - ZIP (Mais Rápido):**
   - Compacte a pasta `deploy-cpanel` em ZIP no seu computador
   - Faça upload do ZIP
   - Extraia o ZIP no File Manager
   - Delete o arquivo ZIP após extração
4. **Opção B - Upload Direto:**
   - Faça upload de TODOS os arquivos desta pasta
   - Mantenha a estrutura de pastas intacta

### Via FTP:
```bash
# Use um cliente FTP como FileZilla
# Servidor: ftp.fredericapassos.pt
# Usuário: seu_usuario_cpanel
# Senha: sua_senha_cpanel
# Pasta: public_html/cpanel
```

## Passo 3: Configurar wp-config.php

1. Renomeie `wp-config-production.php` para `wp-config.php`
2. Edite e preencha:
   - DB_NAME: nome do banco criado
   - DB_USER: usuário MySQL criado
   - DB_PASSWORD: senha do usuário MySQL
   - DB_HOST: geralmente `localhost`
3. Gere chaves de segurança em: https://api.wordpress.org/secret-key/1.1/salt/
4. Substitua as chaves AUTH_KEY, SECURE_AUTH_KEY, etc.

## Passo 4: Importar Banco de Dados

1. Acesse cPanel → phpMyAdmin
2. Selecione o banco de dados criado
3. Clique em "Importar"
4. Selecione o arquivo `database.sql`
5. Clique em "Executar"

## Passo 5: Atualizar URLs no Banco de Dados

Após importar, execute no phpMyAdmin:

```sql
UPDATE wp_options SET option_value = 'https://fredericapassos.pt/cpanel' WHERE option_name = 'home';
UPDATE wp_options SET option_value = 'https://fredericapassos.pt/cpanel' WHERE option_name = 'siteurl';
UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
UPDATE wp_posts SET guid = REPLACE(guid, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
```

## Passo 6: Configurar Permissões

Via File Manager ou SSH:
```bash
chmod 644 wp-config.php
chmod 755 wp-content/
chmod -R 755 wp-content/themes/
chmod -R 755 wp-content/plugins/
chmod -R 755 wp-content/uploads/
```

## Passo 7: Acessar o Site

1. Acesse: https://fredericapassos.pt/cpanel
2. Faça login no WordPress Admin:
   - URL: https://fredericapassos.pt/cpanel/wp-admin
   - Usuário: admin (ou o que você configurou)
   - Senha: admin123 (ou a que você configurou)

## Passo 8: Atualizar Elementor

1. Após login, vá em Páginas → Home → Editar com Elementor
2. O conteúdo já deve estar carregado
3. Salve a página

## Passo 9: Verificar Tema e Plugins

1. Aparência → Temas → Ativar "Frederica Passos"
2. Plugins → Verificar se Elementor está ativo
3. Se necessário, instale Elementor via Plugins → Adicionar Novo

## ⚠️ IMPORTANTE

- Certifique-se de que o PHP está na versão 7.4 ou superior
- Ative SSL/HTTPS no cPanel
- Configure backups regulares
- Mantenha WordPress, temas e plugins atualizados

## 🔧 Troubleshooting

### Erro 500:
- Verifique permissões dos arquivos
- Verifique logs de erro em cPanel → Errors
- Verifique se wp-config.php está correto

### Página em branco:
- Ative WP_DEBUG no wp-config.php temporariamente
- Verifique se todos os arquivos foram enviados

### Imagens não aparecem:
- Verifique permissões da pasta wp-content/uploads/
- Verifique se os caminhos das imagens estão corretos
