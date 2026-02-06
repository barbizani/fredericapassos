# ⚠️ SOLUÇÃO SEGURA - Importar Elementor SEM SQL

O método SQL pode causar problemas. Use esta solução mais segura:

## 🔄 PASSO 1: Restaurar o Site (Se necessário)

1. Acesse **phpMyAdmin** no cPanel
2. Selecione o banco de dados
3. Aba **SQL**
4. Execute o arquivo: `RESTAURAR-SITE.sql`
5. Isso vai limpar o JSON corrompido

## ✅ PASSO 2: Importar via WordPress Admin (MÉTODO SEGURO)

### Opção A: Via Elementor (Recomendado)

1. Acesse: `https://fredericapassos.pt/cpanel/wp-admin`
2. Faça login
3. Vá em **Páginas → Home**
4. Clique em **"Editar com Elementor"**
5. No Elementor, clique no menu **☰ (hamburger)** no canto superior esquerdo
6. Clique em **"Importar Template"** ou **"Import Template"**
7. Selecione o arquivo: `elementor-data.json`
8. Clique em **"Importar"**
9. Aguarde o carregamento
10. Clique em **"Atualizar"** (Update) para salvar

### Opção B: Via Code Editor do Elementor

1. Acesse: **Páginas → Home → Editar com Elementor**
2. Clique no menu **☰ (hamburger)**
3. Vá em **Tools → Import / Export** ou **Ferramentas → Importar/Exportar**
4. Clique em **"Import Template"**
5. Selecione: `elementor-data.json`
6. Clique em **"Import"**
7. Clique em **"Update"** para salvar

### Opção C: Via WordPress Editor (Se Elementor não tiver opção de importar)

1. Acesse: **Páginas → Home**
2. Clique em **"Editar"** (não "Editar com Elementor")
3. No editor, procure por um botão **"Elementor"** ou **"Edit with Elementor"**
4. Se não aparecer, tente:
   - Desativar e reativar o plugin Elementor
   - Ou use a Opção D abaixo

### Opção D: Via FTP + Manual (Último recurso)

1. Faça backup do banco de dados atual
2. Acesse via FTP: `wp-content/uploads/elementor/css/`
3. Delete os arquivos de cache CSS
4. No WordPress Admin:
   - Vá em **Elementor → Tools → Regenerate CSS**
   - Clique em **"Regenerate Files & Data"**
5. Depois tente importar novamente via Elementor

## 🔧 PASSO 3: Verificar se Funcionou

1. Acesse: `https://fredericapassos.pt/cpanel`
2. Verifique se:
   - ✅ O site carrega normalmente
   - ✅ Todas as seções aparecem
   - ✅ O menu funciona
   - ✅ O botão scrollToTop aparece

## 🆘 Se Ainda Não Funcionar

1. **Limpe todos os caches:**
   - WordPress Admin → Elementor → Tools → Regenerate CSS
   - Limpe cache do navegador (Ctrl+F5)
   - Se tiver plugin de cache, limpe também

2. **Verifique permissões:**
   - File Manager → `wp-content/uploads/` → Permissões: 755
   - File Manager → `wp-content/uploads/elementor/` → Permissões: 755

3. **Desative plugins de cache temporariamente:**
   - Plugins → Desative plugins como WP Super Cache, W3 Total Cache, etc.
   - Tente importar novamente
   - Reative os plugins depois

## 📝 NOTA IMPORTANTE

**NÃO use SQL diretamente para importar JSON do Elementor!**

O método seguro é sempre via WordPress Admin → Elementor → Import Template.

O arquivo SQL foi criado apenas como último recurso, mas pode causar problemas se:
- O JSON tiver caracteres especiais não escapados
- O banco tiver configurações diferentes
- O ID da página for diferente de 11
