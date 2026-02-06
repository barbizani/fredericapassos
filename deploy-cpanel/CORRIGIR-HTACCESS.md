# 🔧 Corrigir .htaccess para Subpasta

## ⚠️ Problema Identificado

O `.htaccess` estava configurado para a raiz (`/`), mas o WordPress está em `/cpanel/`.

## ✅ Solução

O arquivo `.htaccess` na pasta `deploy-cpanel/` já foi corrigido. 

**Agora você precisa:**

1. No **File Manager** do cPanel, vá até `public_html/cpanel/`
2. Edite o arquivo `.htaccess`
3. Substitua o conteúdo por:

```apache
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /cpanel/
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /cpanel/index.php [L]
</IfModule>
# END WordPress

# Forçar HTTPS
<IfModule mod_rewrite.c>
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
</IfModule>

# Segurança
<Files wp-config.php>
order allow,deny
deny from all
</Files>
```

4. **Salve** o arquivo

## ✅ Depois de Corrigir

1. Acesse: `https://fredericapassos.pt/cpanel/wp-login.php`
2. Deve carregar a tela de login corretamente
3. Faça login com:
   - **Usuário:** `admin`
   - **Senha:** `admin123`

## 🔍 Verificação

As mudanças importantes são:
- `RewriteBase /cpanel/` (ao invés de `/`)
- `RewriteRule . /cpanel/index.php [L]` (ao invés de `/index.php`)

Isso faz o WordPress entender que está em uma subpasta.
