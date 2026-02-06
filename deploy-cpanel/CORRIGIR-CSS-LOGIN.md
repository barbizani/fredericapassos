# 🎨 Corrigir CSS da Página de Login

## 🔍 Problema

A página de login não tem CSS porque os caminhos dos arquivos estão incorretos.

## ✅ Soluções

### Solução 1: Atualizar URLs no Banco de Dados (Mais Importante)

Execute estes comandos SQL adicionais no phpMyAdmin:

```sql
UPDATE wp_options SET option_value = 'https://fredericapassos.pt/cpanel' WHERE option_name = 'home';
UPDATE wp_options SET option_value = 'https://fredericapassos.pt/cpanel' WHERE option_name = 'siteurl';

UPDATE wp_options SET option_value = REPLACE(option_value, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel') WHERE option_value LIKE '%localhost%';
UPDATE wp_options SET option_value = REPLACE(option_value, 'http://localhost', 'https://fredericapassos.pt/cpanel') WHERE option_value LIKE '%localhost%';
```

### Solução 2: Verificar wp-config.php

Certifique-se de que o `wp-config.php` tem estas linhas **ANTES** de `/* That's all, stop editing! */`:

```php
define('WP_HOME', 'https://fredericapassos.pt/cpanel');
define('WP_SITEURL', 'https://fredericapassos.pt/cpanel');
```

### Solução 3: Forçar URLs Corretas via wp-config.php

Adicione estas linhas no `wp-config.php` (antes de `/* That's all, stop editing! */`):

```php
define('WP_HOME', 'https://fredericapassos.pt/cpanel');
define('WP_SITEURL', 'https://fredericapassos.pt/cpanel');

if (isset($_SERVER['HTTP_HOST'])) {
    define('WP_CONTENT_URL', 'https://fredericapassos.pt/cpanel/wp-content');
}
```

### Solução 4: Verificar Arquivos CSS

1. No **File Manager**, verifique se os arquivos CSS existem:
   - `wp-admin/css/login.css`
   - `wp-admin/css/forms.css`
   - `wp-admin/css/l10n.css`

2. Se não existirem, você pode precisar fazer upload novamente da pasta `wp-admin/`

### Solução 5: Limpar Cache e Testar

1. Limpe o cache do navegador (Ctrl+F5 ou Cmd+Shift+R)
2. Tente em modo anônimo/privado
3. Limpe cache do WordPress se houver plugin de cache

### Solução 6: Verificar Permissões

No **File Manager**, verifique permissões:
- `wp-admin/` → **755**
- `wp-admin/css/` → **755**
- Arquivos `.css` → **644**

---

## 🔧 Solução Rápida (Temporária)

Se nada funcionar, você pode adicionar CSS inline temporariamente:

1. Edite `wp-login.php` (NÃO RECOMENDADO, mas funciona)
2. Ou adicione no `wp-config.php`:

```php
function fix_login_css() {
    echo '<style>
        body { background: #f0f0f1; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif; }
        .login { width: 320px; padding: 8% 0 0; margin: auto; }
        .login form { margin-top: 20px; padding: 26px 24px 34px; background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,.13); }
        .login h1 a { width: 84px; height: 84px; background-size: 84px 84px; }
        .login input[type="text"], .login input[type="password"] { width: 100%; padding: 8px; margin: 2px 6px 16px 0; font-size: 14px; }
        .login .button-primary { width: 100%; padding: 8px; font-size: 14px; }
    </style>';
}
add_action('login_head', 'fix_login_css');
```

Mas isso é apenas temporário. O ideal é corrigir as URLs.

---

## ✅ Checklist

- [ ] URLs atualizadas no banco de dados
- [ ] wp-config.php tem WP_HOME e WP_SITEURL corretos
- [ ] Arquivos CSS existem em wp-admin/css/
- [ ] Permissões dos arquivos estão corretas
- [ ] Cache limpo
- [ ] Testado em modo anônimo

---

## 🆘 Se Ainda Não Funcionar

1. Verifique o código-fonte da página (Ctrl+U)
2. Procure por links CSS que começam com `http://localhost`
3. Execute mais comandos SQL para substituir essas URLs:

```sql
UPDATE wp_options SET option_value = REPLACE(option_value, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
UPDATE wp_options SET option_value = REPLACE(option_value, 'http://localhost', 'https://fredericapassos.pt/cpanel');
```
