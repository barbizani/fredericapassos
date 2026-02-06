# ⚙️ Como Editar o wp-config.php

## ⚠️ IMPORTANTE: Onde Editar

O `wp-config.php` é um arquivo **PHP**, não SQL!
- ✅ **Edite no File Manager do cPanel** (editor de texto)
- ❌ **NÃO execute no phpMyAdmin** (phpMyAdmin é só para SQL)

---

## 📋 Passo a Passo Correto

### Passo 1: Acessar File Manager

1. No cPanel, procure **"Files"** ou **"Arquivos"**
2. Clique em **"File Manager"** ou **"Gerenciador de Arquivos"**

### Passo 2: Navegar até o Arquivo

1. Navegue até: `public_html/cpanel/`
2. Localize o arquivo `wp-config.php`
   - Se não existir, renomeie `wp-config-production.php` para `wp-config.php`

### Passo 3: Editar o Arquivo

1. **Clique com botão direito** no arquivo `wp-config.php`
2. Selecione **"Edit"** ou **"Editar"** ou **"Code Edit"**
3. O editor de texto abrirá

### Passo 4: Preencher as Informações

Encontre estas linhas e substitua pelos seus valores:

```php
define('DB_NAME', 'updklnwsqf6clv_fredericawordpress');  // ← Seu nome de banco
define('DB_USER', 'updklnwsqf6clv_seu_usuario');         // ← Seu usuário MySQL
define('DB_PASSWORD', 'sua_senha_aqui');                  // ← Sua senha
define('DB_HOST', 'localhost');                          // ← Geralmente é localhost
```

**Exemplo com seus dados:**
```php
define('DB_NAME', 'updklnwsqf6clv_fredericawordpress');
define('DB_USER', 'updklnwsqf6clv_seu_usuario_mysql');
define('DB_PASSWORD', 'sua_senha_secreta');
define('DB_HOST', 'localhost');
```

### Passo 5: Gerar Chaves de Segurança

1. Acesse: **https://api.wordpress.org/secret-key/1.1/salt/**
2. Você verá um código como este:

```php
define('AUTH_KEY',         'put your unique phrase here');
define('SECURE_AUTH_KEY',  'put your unique phrase here');
define('LOGGED_IN_KEY',    'put your unique phrase here');
define('NONCE_KEY',        'put your unique phrase here');
define('AUTH_SALT',        'put your unique phrase here');
define('SECURE_AUTH_SALT', 'put your unique phrase here');
define('LOGGED_IN_SALT',   'put your unique phrase here');
define('NONCE_SALT',       'put your unique phrase here');
```

3. **Copie TODO esse código**
4. No editor do wp-config.php, **localize as linhas** que começam com `define('AUTH_KEY'...` até `define('NONCE_SALT'...`
5. **Selecione e delete** essas linhas antigas
6. **Cole** o código novo que você copiou
7. **Salve** o arquivo

### Passo 6: Salvar

1. Clique em **"Save Changes"** ou **"Salvar Alterações"**
2. Feche o editor

---

## ✅ Verificação

Após salvar, acesse: **https://fredericapassos.pt/cpanel**

- ✅ Se o site carregar normalmente = wp-config.php está correto!
- ❌ Se aparecer erro de conexão ao banco = verifique DB_NAME, DB_USER, DB_PASSWORD

---

## 🆘 Erros Comuns

### "Erro ao conectar ao banco de dados"
- Verifique se o nome do banco está COMPLETO (com prefixo)
- Verifique se o nome do usuário está COMPLETO (com prefixo)
- Verifique se a senha está correta
- Verifique se DB_HOST é `localhost`

### "Não consigo editar o arquivo"
- Verifique permissões do arquivo (deve ser 644)
- Tente usar "Code Edit" ao invés de "Edit"

### "Arquivo não existe"
- Verifique se você renomeou `wp-config-production.php` para `wp-config.php`
- Verifique se está na pasta correta: `public_html/cpanel/`

---

## 📝 Resumo

1. ✅ File Manager → `public_html/cpanel/wp-config.php`
2. ✅ Editar (não executar!)
3. ✅ Preencher: DB_NAME, DB_USER, DB_PASSWORD, DB_HOST
4. ✅ Gerar chaves em https://api.wordpress.org/secret-key/1.1/salt/
5. ✅ Substituir as chaves antigas pelas novas
6. ✅ Salvar
7. ✅ Testar acessando o site

---

## ❌ O que NÃO fazer

- ❌ NÃO executar wp-config.php no phpMyAdmin
- ❌ NÃO copiar código PHP para o SQL do phpMyAdmin
- ❌ phpMyAdmin é APENAS para comandos SQL (UPDATE, SELECT, etc.)
