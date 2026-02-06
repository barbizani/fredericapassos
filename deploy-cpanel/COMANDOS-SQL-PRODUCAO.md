# 📝 Comandos SQL para Produção

## 🎯 Informações do Seu Banco

Baseado no seu `wp-config.php`:
- **Banco de Dados:** `updklnwsqf6clv_fredericapassos`
- **Usuário:** `updklnwsqf6clv_fredericapassos`
- **Host:** `localhost`
- **Prefix das Tabelas:** `wp_`

---

## 📋 Comandos SQL para Executar

Copie e cole **TODOS** estes comandos no phpMyAdmin (aba SQL):

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

---

## 📋 Passo a Passo

1. **Acesse phpMyAdmin** no cPanel
2. **Selecione o banco:** `updklnwsqf6clv_fredericapassos`
3. **Clique na aba "SQL"** no topo
4. **Cole TODOS os comandos acima** no campo SQL
5. **Clique em "Go"** ou **"Executar"**
6. Você deve ver mensagens de sucesso para cada comando

---

## ✅ Verificação

Após executar, verifique:

1. **No phpMyAdmin:**
   - Tabela `wp_options`
   - Procure `option_name = 'home'` → deve ser `https://fredericapassos.pt/cpanel`
   - Procure `option_name = 'siteurl'` → deve ser `https://fredericapassos.pt/cpanel`

2. **No navegador:**
   - Acesse: https://fredericapassos.pt/cpanel
   - O site deve carregar normalmente
   - As imagens e links devem funcionar

---

## 🔄 Alternativa: Importar Arquivo

Se preferir, você pode:

1. Baixar o arquivo `update-urls-producao.sql` desta pasta
2. No phpMyAdmin, aba "Import"
3. Selecione o arquivo
4. Clique em "Go"

---

## ⚠️ IMPORTANTE

- Execute estes comandos **APENAS UMA VEZ**
- Certifique-se de que está no banco correto: `updklnwsqf6clv_fredericapassos`
- Faça backup antes se tiver dúvidas
