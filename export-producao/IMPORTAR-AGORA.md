# 🚀 IMPORTAR ALTERAÇÕES - PASSO A PASSO

## ✅ O que está no JSON atualizado:

- ✅ Menu mobile ocupa tela inteira (100vw x 100vh, z-index:99999)
- ✅ Hero com imagens mobile (banner01mob.jpg, banner02mob.jpg)
- ✅ Seção Sobre com imagem (fotofrederica.webp)
- ✅ Faixa laranja com fundo roxo (patternroxo.svg)
- ✅ Scroll suave para seções
- ✅ Botão scrollToTop funcional

---

## 📥 MÉTODO RECOMENDADO: Script PHP v2

### Passo 1: Fazer Upload

Via **File Manager** ou **FTP**:

1. Faça upload de `importar-via-php-v2.php` → para: `public_html/cpanel/`
2. Faça upload de `elementor-data.json` → para: `public_html/cpanel/` (mesma pasta)

### Passo 2: Executar

1. **Faça login no WordPress Admin primeiro:**
   - Acesse: `https://fredericapassos.pt/cpanel/wp-admin`
   - Faça login

2. **Em outra aba, acesse:**
   ```
   https://fredericapassos.pt/cpanel/importar-via-php-v2.php
   ```

3. **O script vai:**
   - ✅ Verificar se você está logado
   - ✅ Carregar o WordPress
   - ✅ Importar o JSON
   - ✅ Limpar todo o cache
   - ✅ Mostrar mensagem de sucesso

### Passo 3: Finalizar

1. **Clique no link** que aparece na mensagem de sucesso: "Editar com Elementor"
2. **No Elementor, clique em "Atualizar"** ou "Update"
3. **Limpe o cache usando o script:**
   - Acesse: `https://fredericapassos.pt/cpanel/limpar-cache.php`
   - Ou manualmente via phpMyAdmin (veja abaixo)
4. **Limpe o cache do navegador** (Ctrl+F5
6. **DELETE o arquivo PHP** por segurança

---

## 🔄 Se o Script PHP Não Funcionar

### Método Alternativo: Via phpMyAdmin (Manual)

⚠️ **CUIDADO:** Faça backup do banco antes!

1. Acesse **phpMyAdmin**
2. Selecione o banco de dados
3. Tabela: `wp_postmeta`
4. Encontre: `post_id = 11` e `meta_key = '_elementor_data'`
5. Clique em **"Editar"**
6. No campo `meta_value`:
   - **Delete todo o conteúdo atual**
   - Abra o arquivo `elementor-data.json` no seu computador
   - Copie **TODO o conteúdo** (é um JSON muito longo)
   - Cole no campo `meta_value`
   - **IMPORTANTE:** Se houver aspas simples (`'`) no JSON, você precisa duplicá-las (`''`) OU usar a função "Escape" do phpMyAdmin
7. Clique em **"Go"** ou **"Executar"**
8. Limpe o cache:
   ```sql
   DELETE FROM wp_options WHERE option_name LIKE '_transient_elementor%';
   DELETE FROM wp_options WHERE option_name LIKE '_transient_timeout_elementor%';
   ```

---

## ✅ Verificação

Após importar, verifique:

1. Acesse: `https://fredericapassos.pt/cpanel`
2. **Menu mobile:**
   - Clique no hamburger
   - Deve ocupar a tela inteira
   - Deve estar acima de tudo

3. **Hero mobile:**
   - Em mobile, deve mostrar `banner01mob.jpg` e `banner02mob.jpg`
   - Em desktop, deve mostrar `banner01.jpg` e `banner02.jpg`

4. **Seção Sobre:**
   - Deve ter a imagem `fotofrederica.webp`

5. **Faixa laranja:**
   - Deve ter o padrão roxo (`patternroxo.svg`) com efeito parallax

---

## 🆘 Problemas Comuns

### "Página em branco ao acessar o script PHP"
- Verifique se o PHP está habilitado
- Verifique permissões do arquivo (644)
- Veja os logs de erro no cPanel

### "JSON não importou"
- Verifique se o arquivo `elementor-data.json` está na mesma pasta
- Verifique se você está logado no WordPress
- Tente o método manual via phpMyAdmin

### "Alterações não aparecem"
- Limpe o cache: Elementor → Tools → Regenerate CSS
- Limpe cache do navegador (Ctrl+F5)
- Desative plugins de cache temporariamente

---

## 📁 Arquivos Necessários

- ✅ `importar-via-php-v2.php` - Script PHP melhorado
- ✅ `elementor-data.json` - JSON atualizado (68KB)
- ✅ `footer.php` - Footer com scrollToTop

Todos devem estar na pasta `export-producao/`
