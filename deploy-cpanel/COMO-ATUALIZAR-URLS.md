# 🔄 Como Atualizar URLs no Banco de Dados

## 📋 Passo a Passo no phpMyAdmin

### Passo 1: Acessar phpMyAdmin

1. No cPanel, procure a seção **"Databases"** ou **"Bancos de Dados"**
2. Clique em **"phpMyAdmin"**
3. Faça login (geralmente usa as mesmas credenciais do cPanel)

### Passo 2: Selecionar o Banco de Dados

1. No painel esquerdo, você verá uma lista de bancos de dados
2. Clique no banco que você criou (ex: `updklnwsqf6clv_fredericawordpress`)
3. O banco será selecionado e você verá as tabelas no painel direito

### Passo 3: Abrir a Aba SQL

1. No topo da página, clique na aba **"SQL"**
2. Você verá um campo de texto grande onde pode digitar comandos SQL

### Passo 4: Executar os Comandos SQL

**Opção A: Copiar e Colar os Comandos**

Copie e cole TODOS estes comandos no campo SQL:

```sql
UPDATE wp_options SET option_value = 'https://fredericapassos.pt/cpanel' WHERE option_name = 'home';
UPDATE wp_options SET option_value = 'https://fredericapassos.pt/cpanel' WHERE option_name = 'siteurl';
UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://localhost', 'https://fredericapassos.pt/cpanel');
UPDATE wp_posts SET guid = REPLACE(guid, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
UPDATE wp_posts SET guid = REPLACE(guid, 'http://localhost', 'https://fredericapassos.pt/cpanel');
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, 'http://localhost', 'https://fredericapassos.pt/cpanel');
UPDATE wp_comments SET comment_content = REPLACE(comment_content, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
UPDATE wp_usermeta SET meta_value = REPLACE(meta_value, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
```

**Opção B: Importar o Arquivo SQL**

1. No campo SQL, clique no botão **"Choose File"** ou **"Escolher Arquivo"**
2. Selecione o arquivo `update-urls.sql` da pasta deploy-cpanel
3. O conteúdo será carregado automaticamente

### Passo 5: Executar

1. Role até o final da página
2. Clique no botão **"Go"** ou **"Executar"** (geralmente no canto inferior direito)
3. Aguarde alguns segundos

### Passo 6: Verificar Resultado

Você deve ver mensagens de sucesso como:

```
11 rows affected. (Query took 0.0123 seconds.)
```

Ou algo similar para cada comando UPDATE executado.

---

## ✅ Verificação

Após executar os comandos:

1. **Verifique as URLs principais:**
   - No phpMyAdmin, clique na tabela `wp_options`
   - Procure por `option_name = 'home'` e `option_name = 'siteurl'`
   - Ambos devem ter `option_value = 'https://fredericapassos.pt/cpanel'`

2. **Teste o site:**
   - Acesse: https://fredericapassos.pt/cpanel
   - O site deve carregar normalmente
   - As imagens e links devem funcionar corretamente

---

## 🆘 Problemas Comuns

### "Nenhuma linha afetada"
- Isso pode ser normal se não houver URLs antigas para substituir
- Verifique se o site está funcionando mesmo assim

### "Erro de sintaxe SQL"
- Verifique se copiou TODOS os comandos
- Certifique-se de que cada comando termina com `;`
- Não copie linhas em branco extras

### "Tabela não existe"
- Verifique se você selecionou o banco de dados correto
- Verifique se o prefixo das tabelas é `wp_` (pode ser diferente)

### "Ainda vejo URLs antigas"
- Limpe o cache do navegador (Ctrl+F5 ou Cmd+Shift+R)
- Verifique se executou TODOS os comandos
- Execute novamente os comandos UPDATE

---

## 📝 Comandos Individuais (Se Precisar)

Se preferir executar um por vez, aqui estão os comandos separados:

**1. Atualizar URLs principais:**
```sql
UPDATE wp_options SET option_value = 'https://fredericapassos.pt/cpanel' WHERE option_name = 'home';
UPDATE wp_options SET option_value = 'https://fredericapassos.pt/cpanel' WHERE option_name = 'siteurl';
```

**2. Atualizar conteúdo dos posts:**
```sql
UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
UPDATE wp_posts SET post_content = REPLACE(post_content, 'http://localhost', 'https://fredericapassos.pt/cpanel');
```

**3. Atualizar GUIDs dos posts:**
```sql
UPDATE wp_posts SET guid = REPLACE(guid, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
UPDATE wp_posts SET guid = REPLACE(guid, 'http://localhost', 'https://fredericapassos.pt/cpanel');
```

**4. Atualizar metadados:**
```sql
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
UPDATE wp_postmeta SET meta_value = REPLACE(meta_value, 'http://localhost', 'https://fredericapassos.pt/cpanel');
```

**5. Atualizar comentários:**
```sql
UPDATE wp_comments SET comment_content = REPLACE(comment_content, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
```

**6. Atualizar metadados de usuários:**
```sql
UPDATE wp_usermeta SET meta_value = REPLACE(meta_value, 'http://localhost:8000', 'https://fredericapassos.pt/cpanel');
```

---

## ✅ Próximo Passo

Após atualizar as URLs:
1. Acesse o site: https://fredericapassos.pt/cpanel
2. Faça login: https://fredericapassos.pt/cpanel/wp-admin
3. Verifique se tudo está funcionando corretamente
