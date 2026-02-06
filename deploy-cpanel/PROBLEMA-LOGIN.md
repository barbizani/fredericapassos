# 🔐 Problema: wp-login.php não carrega

## 🔍 Diagnóstico

Se ao acessar `https://fredericapassos.pt/cpanel/wp-login.php` você vê a página inicial ao invés da tela de login, isso geralmente é causado por:

1. Redirecionamento no .htaccess
2. URLs incorretas no wp-config.php
3. Plugin de segurança bloqueando
4. Problema com permissões

---

## ✅ Soluções

### Solução 1: Verificar wp-config.php

1. No **File Manager**, edite `wp-config.php`
2. Verifique se estas linhas estão corretas:

```php
define('WP_HOME', 'https://fredericapassos.pt/cpanel');
define('WP_SITEURL', 'https://fredericapassos.pt/cpanel');
```

3. Se não existirem, **ADICIONE** antes da linha `/* That's all, stop editing! */`:

```php
define('WP_HOME', 'https://fredericapassos.pt/cpanel');
define('WP_SITEURL', 'https://fredericapassos.pt/cpanel');

/* That's all, stop editing! Happy publishing. */
```

4. **Salve** o arquivo

### Solução 2: Verificar .htaccess

1. No **File Manager**, verifique o arquivo `.htaccess` em `public_html/cpanel/`
2. O conteúdo deve ser algo como:

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
```

⚠️ **IMPORTANTE:** Note o `RewriteBase /cpanel/` e `/cpanel/index.php` - isso é necessário porque o WordPress está em uma subpasta!

3. Se o `.htaccess` não tiver `/cpanel/` nas regras, **SUBSTITUA** por:

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

### Solução 3: Atualizar URLs no Banco de Dados (Novamente)

Execute estes comandos SQL no phpMyAdmin:

```sql
UPDATE wp_options SET option_value = 'https://fredericapassos.pt/cpanel' WHERE option_name = 'home';
UPDATE wp_options SET option_value = 'https://fredericapassos.pt/cpanel' WHERE option_name = 'siteurl';
```

### Solução 4: Acessar Diretamente via URL Completa

Tente acessar:

```
https://fredericapassos.pt/cpanel/wp-login.php?redirect_to=https://fredericapassos.pt/cpanel/wp-admin/
```

Ou:

```
https://fredericapassos.pt/cpanel/wp-admin/
```

### Solução 5: Limpar Cache

1. No cPanel, procure por **"Cache"** ou plugins de cache
2. Limpe todo o cache
3. Limpe o cache do navegador (Ctrl+F5 ou Cmd+Shift+R)

### Solução 6: Verificar Permissões

1. No **File Manager**, verifique permissões:
   - `wp-login.php` → **644**
   - `.htaccess` → **644**
   - `wp-config.php` → **644**

---

## 🔧 Solução Rápida (Forçar Login)

Se nada funcionar, você pode criar um arquivo temporário para forçar o login:

1. No **File Manager**, crie um arquivo `login.php` em `public_html/cpanel/`
2. Cole este código:

```php
<?php
require_once('wp-load.php');
wp_redirect(wp_login_url());
exit;
?>
```

3. Acesse: `https://fredericapassos.pt/cpanel/login.php`
4. Isso deve redirecionar para o login correto

---

## ✅ Verificação Final

Após aplicar as soluções:

1. **Acesse:** `https://fredericapassos.pt/cpanel/wp-login.php`
2. Você deve ver a tela de login do WordPress
3. Faça login com:
   - **Usuário:** `admin`
   - **Senha:** `admin123`

---

## 🆘 Se Ainda Não Funcionar

1. **Ative o modo debug** temporariamente no `wp-config.php`:

```php
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
```

2. **Verifique os logs** em `wp-content/debug.log`
3. **Desative plugins** renomeando a pasta `wp-content/plugins` para `wp-content/plugins-disabled`
4. **Teste novamente**

---

## 📝 Checklist

- [ ] wp-config.php tem WP_HOME e WP_SITEURL corretos
- [ ] .htaccess tem RewriteBase /cpanel/
- [ ] URLs no banco de dados estão corretas
- [ ] Permissões dos arquivos estão corretas
- [ ] Cache foi limpo
- [ ] Testou acessar wp-login.php diretamente
