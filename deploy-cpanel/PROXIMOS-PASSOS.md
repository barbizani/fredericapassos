# ✅ Próximos Passos - Você Já Fez:

- [x] Upload e extração dos arquivos
- [x] Criação do banco de dados
- [x] Import do banco de dados
- [x] Criação do usuário do banco

---

## 📋 Agora Faça:

### Passo 1: Configurar wp-config.php

⚠️ **IMPORTANTE:** O wp-config.php é um arquivo PHP que deve ser **EDITADO no File Manager**, NÃO executado no phpMyAdmin!

📖 **Guia detalhado:** `COMO-EDITAR-WP-CONFIG.md`

1. No **File Manager** do cPanel, navegue até `public_html/cpanel/`
2. Localize o arquivo `wp-config-production.php`
3. **Renomeie** para `wp-config.php` (clique com botão direito → Rename)
4. Clique com botão direito em `wp-config.php` → **Edit** ou **Code Edit**
5. Preencha as seguintes linhas com as informações do banco que você criou:

```php
define('DB_NAME', 'usuario_fredericapassos_wp');  // Nome COMPLETO do banco (com prefixo)
define('DB_USER', 'usuario_fredericapassos_user'); // Nome COMPLETO do usuário (com prefixo)
define('DB_PASSWORD', 'sua_senha_aqui');          // Senha do usuário MySQL
define('DB_HOST', 'localhost');
```

6. **Gere as chaves de segurança:**
   - Acesse: https://api.wordpress.org/secret-key/1.1/salt/
   - Copie TODO o código gerado
   - No wp-config.php, substitua as linhas que começam com `define('AUTH_KEY'...` até `define('NONCE_SALT'...`
   - Cole o código gerado no lugar

7. **Salve** o arquivo

⚠️ **IMPORTANTE:** Use os nomes COMPLETOS (com prefixo do usuário do cPanel)!

---

### Passo 2: Atualizar URLs no Banco de Dados

📖 **Guia detalhado:** `COMO-ATUALIZAR-URLS.md`

1. Acesse **phpMyAdmin** no cPanel
2. No painel esquerdo, clique no banco de dados que você criou
3. Clique na aba **"SQL"** no topo
4. Abra o arquivo `update-urls.sql` (está na pasta deploy-cpanel no seu computador)
5. **Copie TODO o conteúdo** do arquivo
6. **Cole** no campo SQL do phpMyAdmin
7. Clique em **"Go"** ou **"Executar"**
8. Você deve ver mensagens de sucesso para cada comando UPDATE

⚠️ **Se você tem um banco antigo e quer substituir:** Veja `COMO-SUBSTITUIR-BANCO-DADOS.md`

**OU** execute manualmente estes comandos SQL:

```sql
UPDATE wp_options SET option_value = 'https://fredericapassos.pt/cpanel' WHERE option_name = 'home';
UPDATE wp_options SET option_value = 'https://fredericapassos.pt/cpanel' WHERE option_name = 'siteurl';
UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://localhost', 'https://fredericapassos.pt/cpanel');
UPDATE wp_posts SET guid = REPLACE(guid, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
UPDATE wp_posts SET guid = REPLACE(guid, 'http://localhost', 'https://fredericapassos.pt/cpanel');
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, 'http://localhost', 'https://fredericapassos.pt/cpanel');
```

---

### Passo 3: Configurar Permissões (Opcional mas Recomendado)

No File Manager do cPanel:

1. Clique com botão direito em `wp-config.php` → **Change Permissions** ou **Alterar Permissões**
   - Marque: **644** (ou: Read/Write para Owner, Read para Group e Others)
   - Clique em **Change Permissions**

2. Clique com botão direito na pasta `wp-content/` → **Change Permissions**
   - Marque: **755** (ou: Read/Write/Execute para Owner, Read/Execute para Group e Others)

3. Para as subpastas dentro de `wp-content/`:
   - `wp-content/themes/` → **755**
   - `wp-content/plugins/` → **755**
   - `wp-content/uploads/` → **755**

---

### Passo 4: Acessar o Site

1. Abra seu navegador
2. Acesse: **https://fredericapassos.pt/cpanel**
3. O site deve carregar!

---

### Passo 5: Fazer Login no WordPress Admin

1. Acesse: **https://fredericapassos.pt/cpanel/wp-admin**
2. Faça login com:
   - **Usuário:** `admin`
   - **Senha:** `admin123`
3. ⚠️ **IMPORTANTE:** Altere a senha imediatamente após o primeiro login!

---

### Passo 6: Verificar e Ativar Tema/Plugins

1. **Ativar o tema:**
   - Vá em **Aparência → Temas**
   - Ative o tema **"Frederica Passos"**

2. **Verificar Elementor:**
   - Vá em **Plugins**
   - Verifique se o **Elementor** está instalado e ativo
   - Se não estiver, instale via **Plugins → Adicionar Novo → Buscar "Elementor"**

3. **Verificar a página Home:**
   - Vá em **Páginas → Home**
   - Clique em **"Editar com Elementor"**
   - O conteúdo já deve estar carregado
   - Clique em **"Atualizar"** para salvar

---

## ✅ Checklist Final

- [ ] wp-config.php configurado com credenciais corretas
- [ ] Chaves de segurança geradas e inseridas
- [ ] URLs atualizadas no banco de dados
- [ ] Permissões configuradas (opcional)
- [ ] Site acessível em https://fredericapassos.pt/cpanel
- [ ] Login no WordPress Admin funcionando
- [ ] Tema "Frederica Passos" ativado
- [ ] Elementor instalado e ativo
- [ ] Página Home editada e salva no Elementor
- [ ] Senha do admin alterada

---

## 🆘 Problemas Comuns

### "Erro ao conectar ao banco de dados"
- Verifique se o nome do banco e usuário estão COMPLETOS (com prefixo)
- Verifique se a senha está correta
- Verifique se o usuário tem permissões no banco

### "Site mostra erro 500"
- Verifique se wp-config.php está correto
- Verifique permissões dos arquivos
- Veja os logs de erro no cPanel → Errors

### "Página em branco"
- Verifique se todos os arquivos foram enviados
- Verifique se o banco foi importado corretamente
- Ative WP_DEBUG temporariamente no wp-config.php para ver erros

### "Não consigo fazer login"
- Verifique se o banco foi importado corretamente
- Tente resetar a senha via phpMyAdmin se necessário

---

## 🎉 Pronto!

Se tudo estiver funcionando, seu site está no ar em:
**https://fredericapassos.pt/cpanel**
