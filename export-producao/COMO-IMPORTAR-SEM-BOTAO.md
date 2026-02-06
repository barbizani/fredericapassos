# 📥 Como Importar Elementor SEM Botão de Importar

Se o Elementor não tem botão "Importar Template", use um destes métodos:

---

## ✅ MÉTODO 1: Via Script PHP (Mais Fácil)

1. **Faça upload via FTP/File Manager:**
   - `importar-via-php.php` → para: `public_html/cpanel/`
   - `elementor-data.json` → para: `public_html/cpanel/` (mesma pasta)

2. **Acesse no navegador:**
   ```
   https://fredericapassos.pt/cpanel/importar-via-php.php
   ```

3. **Faça login no WordPress** (se pedir)

4. **O script vai importar automaticamente!**

5. **Depois de importar:**
   - Delete o arquivo `importar-via-php.php` por segurança
   - Acesse: WordPress Admin → Páginas → Home → Editar com Elementor
   - Clique em "Atualizar" para salvar
   - Vá em: Elementor → Tools → Regenerate CSS

---

## ✅ MÉTODO 2: Via Code Editor do Elementor

1. **Acesse:** WordPress Admin → Páginas → Home → Editar com Elementor

2. **No Elementor:**
   - Clique no menu **☰** (hamburger, canto superior esquerdo)
   - Procure por **"Code Editor"** ou **"Editor de Código"**
   - Ou vá em **Settings → Advanced → Code Editor**

3. **Cole o JSON:**
   - Abra o arquivo `elementor-data.json` no seu computador
   - Copie TODO o conteúdo
   - Cole no Code Editor do Elementor
   - Clique em **"Save"** ou **"Salvar"**

4. **Atualize a página:**
   - Clique em **"Update"** ou **"Atualizar"**

---

## ✅ MÉTODO 3: Via WordPress Admin (Editor de Texto)

1. **Acesse:** WordPress Admin → Páginas → Home → Editar

2. **No editor de texto:**
   - Se houver um campo "Elementor Data" ou similar, cole o JSON lá
   - Ou use o método 4 abaixo

---

## ✅ MÉTODO 4: Via phpMyAdmin (Último Recurso - CUIDADO!)

⚠️ **ATENÇÃO:** Este método pode causar problemas se não for feito corretamente!

1. **Faça BACKUP do banco de dados primeiro!**

2. **Acesse phpMyAdmin**

3. **Selecione o banco de dados**

4. **Vá na tabela:** `wp_postmeta`

5. **Encontre a linha:**
   - `post_id` = 11
   - `meta_key` = `_elementor_data`

6. **Clique em "Editar"**

7. **No campo `meta_value`:**
   - Abra o arquivo `elementor-data.json` no seu computador
   - Copie TODO o conteúdo
   - Cole no campo `meta_value`
   - **IMPORTANTE:** Se houver aspas simples (`'`) no JSON, você precisa duplicá-las (`''`)
   - Ou use a função "Escape" do phpMyAdmin

8. **Clique em "Go" ou "Executar"**

9. **Limpe o cache:**
   ```sql
   DELETE FROM wp_options WHERE option_name LIKE '_transient_elementor%';
   ```

---

## 🎯 RECOMENDAÇÃO

**Use o MÉTODO 1 (Script PHP)** - É o mais seguro e fácil!

---

## 🆘 Se Nada Funcionar

1. **Verifique se o Elementor está atualizado:**
   - Plugins → Elementor → Verificar atualizações

2. **Tente reinstalar o Elementor:**
   - Desative o plugin
   - Delete o plugin
   - Reinstale o Elementor
   - Reative

3. **Verifique permissões:**
   - File Manager → `wp-content/uploads/` → Permissões: 755
   - File Manager → `wp-content/uploads/elementor/` → Permissões: 755

---

## 📝 Arquivos Necessários

- `importar-via-php.php` - Script PHP para importar
- `elementor-data.json` - JSON do Elementor
- Ambos devem estar na mesma pasta no servidor
