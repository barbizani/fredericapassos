# 🔧 Como Testar o Script PHP

Se o script não está fazendo nada, siga estes passos:

## 1️⃣ Verificar se o arquivo está no lugar certo

**Via File Manager do cPanel:**

1. Acesse File Manager
2. Navegue até: `public_html/cpanel/`
3. Verifique se existem:
   - ✅ `importar-via-php.php`
   - ✅ `elementor-data.json`

**Ambos devem estar na mesma pasta!**

## 2️⃣ Verificar permissões

1. No File Manager, clique com botão direito em `importar-via-php.php`
2. Clique em "Change Permissions" ou "Alterar Permissões"
3. Marque: **644** (ou Read/Write para Owner, Read para Group e Others)
4. Clique em "Change Permissions"

## 3️⃣ Verificar se o WordPress está carregando

Se ao acessar `https://fredericapassos.pt/cpanel/importar-via-php.php` você vê:
- Código PHP aparecendo como texto → O PHP não está sendo executado
- Página em branco → Pode haver erro (veja passo 4)
- Mensagem de erro → Veja o erro e corrija

## 4️⃣ Ativar exibição de erros (temporariamente)

Se você vê página em branco, adicione no início do arquivo `importar-via-php.php`:

```php
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
```

(Isso já está no script atualizado)

## 5️⃣ Verificar caminho do wp-load.php

O script procura o `wp-load.php` em vários lugares. Se não encontrar, você verá uma mensagem de erro mostrando onde procurou.

**Se o erro aparecer:**
- Verifique onde está o `wp-load.php` do WordPress
- O caminho típico é: `public_html/cpanel/wp-load.php`
- Se estiver em outro lugar, edite o script e ajuste o caminho

## 6️⃣ Fazer login no WordPress primeiro

O script precisa que você esteja logado no WordPress Admin. 

1. Abra uma nova aba
2. Acesse: `https://fredericapassos.pt/cpanel/wp-admin`
3. Faça login
4. Mantenha essa aba aberta
5. Na outra aba, acesse: `https://fredericapassos.pt/cpanel/importar-via-php.php`

## 7️⃣ Alternativa: Executar via linha de comando (SSH)

Se você tem acesso SSH:

```bash
cd /home/usuario/public_html/cpanel
php importar-via-php.php
```

## 🆘 Se Nada Funcionar

Use o método manual via phpMyAdmin (veja COMO-IMPORTAR-SEM-BOTAO.md, Método 4)
