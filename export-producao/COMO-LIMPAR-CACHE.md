# 🧹 Como Limpar Cache do Elementor

Se não tem a opção "Regenerate CSS" no Elementor, use um destes métodos:

---

## ✅ MÉTODO 1: Script PHP (Mais Fácil)

1. **Faça upload do arquivo:**
   - `limpar-cache.php` → para: `public_html/cpanel/`

2. **Acesse no navegador:**
   ```
   https://fredericapassos.pt/cpanel/limpar-cache.php
   ```

3. **Faça login no WordPress** (se pedir)

4. **O script limpa automaticamente!**

5. **Depois:**
   - Limpe o cache do navegador (Ctrl+F5)
   - Acesse o site e verifique

---

## ✅ MÉTODO 2: Via phpMyAdmin

1. Acesse **phpMyAdmin**
2. Selecione o banco de dados
3. Aba **SQL**
4. Execute estes comandos:

```sql
DELETE FROM wp_options WHERE option_name LIKE '_transient_elementor%';
DELETE FROM wp_options WHERE option_name LIKE '_transient_timeout_elementor%';
DELETE FROM wp_options WHERE option_name LIKE '_elementor_css%';
DELETE FROM wp_postmeta WHERE meta_key LIKE '_elementor_css%';
```

5. Clique em **"Go"** ou **"Executar"**

---

## ✅ MÉTODO 3: Via File Manager (Deletar Arquivos)

1. Acesse **File Manager** no cPanel
2. Navegue até: `public_html/cpanel/wp-content/uploads/elementor/css/`
3. **Delete todos os arquivos** dessa pasta
4. (O Elementor vai recriar quando necessário)

---

## ✅ MÉTODO 4: Via WordPress Admin

1. Acesse: WordPress Admin → **Plugins**
2. **Desative** plugins de cache (se tiver):
   - WP Super Cache
   - W3 Total Cache
   - WP Rocket
   - etc.
3. **Reative** os plugins depois

---

## 🔄 Após Limpar Cache

1. **Limpe o cache do navegador:**
   - Chrome/Edge: Ctrl+Shift+Delete → Limpar cache
   - Ou: Ctrl+F5 (hard refresh)

2. **Acesse o site:**
   - `https://fredericapassos.pt/cpanel`
   - Verifique se as alterações aparecem

3. **Se não aparecer:**
   - Aguarde 2-3 minutos
   - Tente novamente
   - Verifique se o JSON foi importado corretamente

---

## 📝 Nota

O cache do Elementor é armazenado em:
- Banco de dados: Tabela `wp_options` (transients)
- Arquivos: `wp-content/uploads/elementor/css/`

Limpar ambos garante que as alterações apareçam.
