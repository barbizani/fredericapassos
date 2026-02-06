# 📥 Como Importar as Alterações no Site Hospedado

## 📋 Arquivos Exportados

- `elementor-data.json` - Conteúdo da página Home no Elementor
- `footer.php` - Footer atualizado com botão scrollToTop
- `import-elementor.sql` - Script SQL para importar (precisa ser editado)

---

## 🔄 Passo 1: Atualizar o Footer

### Via File Manager do cPanel:

1. Acesse o **File Manager** no cPanel
2. Navegue até: `public_html/cpanel/wp-content/themes/frederica-passos/`
3. **Faça backup** do `footer.php` atual (renomeie para `footer.php.backup`)
4. Faça upload do novo `footer.php` (substitua o arquivo)
5. Verifique as permissões: deve ser **644**

### Via FTP:

1. Conecte-se via FTP ao servidor
2. Navegue até: `/public_html/cpanel/wp-content/themes/frederica-passos/`
3. Faça backup do `footer.php` atual
4. Faça upload do novo `footer.php`

---

## 🔄 Passo 2: Importar JSON do Elementor

### Opção A: Via phpMyAdmin (Recomendado)

1. Acesse **phpMyAdmin** no cPanel
2. Selecione o banco de dados do WordPress
3. Clique na aba **SQL**
4. Abra o arquivo `elementor-data.json` exportado
5. **Copie TODO o conteúdo** do JSON
6. Execute este comando SQL (substitua `SEU_JSON_AQUI` pelo conteúdo copiado):

```sql
UPDATE wp_postmeta 
SET meta_value = 'SEU_JSON_AQUI' 
WHERE post_id = 11 AND meta_key = '_elementor_data';
```

**⚠️ IMPORTANTE:** 
- O JSON pode ser muito grande, então copie com cuidado
- Se der erro, tente escapar as aspas simples no JSON
- Ou use a Opção B abaixo

### Opção B: Via WordPress Admin (Mais Fácil)

1. Acesse: `https://fredericapassos.pt/cpanel/wp-admin`
2. Vá em **Páginas → Home**
3. Clique em **"Editar com Elementor"**
4. No Elementor, clique no menu **☰ (hamburger)** no canto superior esquerdo
5. Clique em **"Importar Template"**
6. Selecione o arquivo `elementor-data.json`
7. Clique em **"Importar"**
8. Clique em **"Atualizar"** para salvar

**⚠️ NOTA:** Se o Elementor não tiver opção de importar JSON diretamente, use a Opção A.

---

## 🔄 Passo 3: Limpar Cache

1. No WordPress Admin, vá em **Elementor → Tools → Regenerate CSS**
2. Clique em **"Regenerate Files & Data"**
3. Aguarde a conclusão
4. Limpe o cache do navegador (Ctrl+F5)

---

## ✅ Verificação

Após importar:

1. Acesse: `https://fredericapassos.pt/cpanel`
2. Verifique se:
   - ✅ O botão scrollToTop aparece e funciona
   - ✅ O menu mobile ocupa a tela inteira
   - ✅ Os links do menu rolam para as seções corretas
   - ✅ Todas as seções estão visíveis

---

## 🆘 Problemas Comuns

### "Erro ao importar JSON"
- Verifique se copiou TODO o conteúdo do JSON
- Tente escapar aspas simples: `\'` 
- Use a Opção B (via WordPress Admin)

### "Footer não atualizado"
- Verifique se fez upload do arquivo correto
- Verifique permissões (644)
- Limpe o cache do navegador

### "Menu não funciona"
- Verifique se o JavaScript está carregando
- Abra o Console do navegador (F12) e veja se há erros
- Verifique se o footer.php foi atualizado corretamente
