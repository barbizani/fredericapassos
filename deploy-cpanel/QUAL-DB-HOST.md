# 🗄️ Qual é o DB_HOST no cPanel?

## ✅ Resposta Rápida

Na maioria dos casos no cPanel, o `DB_HOST` é:

```php
define('DB_HOST', 'localhost');
```

---

## 🔍 Como Confirmar no cPanel

### Método 1: Verificar na Página MySQL Databases

1. Acesse **cPanel → MySQL Databases**
2. Role até a seção **"Current Databases"** ou **"Bancos de Dados Atuais"**
3. Procure por informações sobre o host do banco
4. Geralmente mostra: `localhost` ou `127.0.0.1`

### Método 2: Verificar no phpMyAdmin

1. Acesse **phpMyAdmin** no cPanel
2. No topo da página, você verá informações de conexão
3. O host geralmente aparece como `localhost` ou `127.0.0.1`

### Método 3: Verificar em Outros Sites WordPress

Se você já tem outros sites WordPress no mesmo cPanel:
1. Acesse o File Manager
2. Abra o `wp-config.php` de outro site
3. Veja qual `DB_HOST` está sendo usado

---

## 📋 Valores Comuns de DB_HOST

### Para cPanel (mais comum):
```php
define('DB_HOST', 'localhost');
```

### Alternativas possíveis:
```php
define('DB_HOST', '127.0.0.1');        // IP local
define('DB_HOST', 'mysql');            // Alguns servidores
define('DB_HOST', 'localhost:3306');   // Com porta específica
```

---

## ⚠️ IMPORTANTE

- **99% dos casos no cPanel:** Use `localhost`
- Se `localhost` não funcionar, tente `127.0.0.1`
- **NÃO** use o nome do servidor ou IP externo
- **NÃO** adicione porta a menos que especificado pelo suporte

---

## 🧪 Como Testar

Após configurar o wp-config.php:

1. Acesse: https://fredericapassos.pt/cpanel
2. Se aparecer erro de conexão ao banco:
   - Tente mudar para `127.0.0.1`
   - Ou entre em contato com o suporte do hosting

---

## ✅ Configuração Final Recomendada

```php
define('DB_NAME', 'usuario_fredericapassos_wp');  // Nome completo do banco
define('DB_USER', 'usuario_fredericapassos_user'); // Nome completo do usuário
define('DB_PASSWORD', 'sua_senha');                // Senha do usuário
define('DB_HOST', 'localhost');                    // ← Geralmente é isso!
```

---

## 🆘 Se Não Funcionar

Se `localhost` não funcionar:

1. **Tente:** `127.0.0.1`
2. **Verifique** se o banco foi criado corretamente
3. **Verifique** se o usuário tem permissões no banco
4. **Entre em contato** com o suporte do hosting e pergunte qual é o DB_HOST correto
