# 🎨 Corrigir Assets na Raiz (public_html)

## ✅ Situação

O site está em `public_html/` (raiz), então a URL é `https://fredericapassos.pt` (sem `/cpanel`).

## 🔧 Soluções

### Passo 1: Atualizar URLs no Banco de Dados

Execute estes comandos SQL no phpMyAdmin:

```sql
UPDATE wp_options SET option_value = 'https://fredericapassos.pt' WHERE option_name = 'home';
UPDATE wp_options SET option_value = 'https://fredericapassos.pt' WHERE option_name = 'siteurl';

UPDATE wp_options SET option_value = REPLACE(option_value, 'http://localhost:8000', 'https://fredericapassos.pt') WHERE option_value LIKE '%localhost%';
UPDATE wp_options SET option_value = REPLACE(option_value, 'http://localhost', 'https://fredericapassos.pt') WHERE option_value LIKE '%localhost%';

UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://localhost:8000', 'https://fredericapassos.pt');
UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://localhost', 'https://fredericapassos.pt');
UPDATE wp_posts SET guid = REPLACE(guid, 'http://localhost:8000', 'https://fredericapassos.pt');
UPDATE wp_posts SET guid = REPLACE(guid, 'http://localhost', 'https://fredericapassos.pt');

UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, 'http://localhost:8000', 'https://fredericapassos.pt');
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, 'http://localhost', 'https://fredericapassos.pt');

UPDATE wp_comments SET comment_content = REPLACE(comment_content, 'http://localhost:8000', 'https://fredericapassos.pt');

UPDATE wp_usermeta SET meta_value = REPLACE(meta_value, 'http://localhost:8000', 'https://fredericapassos.pt');
```

**OU** importe o arquivo `update-urls-raiz.sql` diretamente no phpMyAdmin.

### Passo 2: Verificar wp-config.php

No **File Manager**, edite `public_html/wp-config.php` e certifique-se de que tem estas linhas **ANTES** de `/* That's all, stop editing! */`:

```php
define('WP_HOME', 'https://fredericapassos.pt');
define('WP_SITEURL', 'https://fredericapassos.pt');
```

Se não tiver, **ADICIONE** essas linhas.

### Passo 3: Verificar .htaccess

O arquivo `.htaccess` em `public_html/` deve estar assim:

```apache
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress

# Forçar HTTPS
<IfModule mod_rewrite.c>
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
</IfModule>
```

### Passo 4: Verificar Permissões dos Arquivos

No **File Manager**, verifique permissões:

- `wp-content/` → **755**
- `wp-content/themes/` → **755**
- `wp-content/plugins/` → **755**
- `wp-content/uploads/` → **755**
- `wp-admin/` → **755**
- Arquivos `.css` e `.js` → **644**

### Passo 5: Limpar Cache

1. Limpe o cache do navegador (Ctrl+F5 ou Cmd+Shift+R)
2. Tente em modo anônimo/privado
3. Se houver plugin de cache no WordPress, limpe-o também

### Passo 6: Verificar se Arquivos Existem

No **File Manager**, verifique se estas pastas/arquivos existem:

- `wp-admin/css/login.css`
- `wp-admin/css/forms.css`
- `wp-content/themes/` (deve ter o tema)
- `wp-content/plugins/` (deve ter os plugins)
- `wp-content/uploads/` (imagens e mídia)

Se alguma pasta estiver faltando, você precisa fazer upload novamente.

---

## 🔍 Verificação

Após executar os comandos SQL:

1. **No navegador:**
   - Acesse: `https://fredericapassos.pt/wp-login.php`
   - O CSS deve carregar
   - Faça login e verifique o site

2. **Inspecionar elementos:**
   - Pressione F12 no navegador
   - Vá na aba "Network" ou "Rede"
   - Recarregue a página
   - Verifique se há arquivos CSS/JS com erro 404
   - Se houver, anote quais são e verifique se existem no servidor

---

## 🆘 Problemas Comuns

### "Ainda vejo assets faltando"

1. Verifique o código-fonte da página (Ctrl+U)
2. Procure por links que começam com `http://localhost`
3. Execute novamente os comandos SQL
4. Verifique se os arquivos realmente existem no servidor

### "CSS do admin não carrega"

1. Verifique se `wp-admin/css/` existe e tem arquivos
2. Verifique permissões (deve ser 755 para pastas, 644 para arquivos)
3. Limpe cache do navegador

### "Imagens não aparecem"

1. Verifique se `wp-content/uploads/` existe
2. Verifique permissões da pasta uploads (755)
3. Execute os comandos SQL novamente para atualizar URLs das imagens

---

## ✅ Checklist

- [ ] URLs atualizadas no banco de dados (sem /cpanel)
- [ ] wp-config.php tem WP_HOME e WP_SITEURL = 'https://fredericapassos.pt'
- [ ] .htaccess está correto (RewriteBase /)
- [ ] Permissões dos arquivos estão corretas
- [ ] Arquivos CSS/JS existem no servidor
- [ ] Cache limpo
- [ ] Testado em modo anônimo

---

## 📝 Resumo

Como o site está na raiz (`public_html/`):
- URL: `https://fredericapassos.pt` (sem `/cpanel`)
- wp-config.php: `WP_HOME` e `WP_SITEURL` = `'https://fredericapassos.pt'`
- .htaccess: `RewriteBase /`
- Comandos SQL: usar `https://fredericapassos.pt` (sem `/cpanel`)
