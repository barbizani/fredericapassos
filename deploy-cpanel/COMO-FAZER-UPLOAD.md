# 📤 Como Fazer Upload dos Arquivos no cPanel

## 🎯 Onde Fazer Upload

Os arquivos devem ser enviados para: **`public_html/cpanel/`**

---

## 📋 Método 1: File Manager do cPanel (Recomendado)

### Passo 1: Acessar File Manager

1. Faça login no cPanel: https://fredericapassos.pt/cpanel
2. Procure a seção **"Files"** ou **"Arquivos"**
3. Clique em **"File Manager"** ou **"Gerenciador de Arquivos"**

### Passo 2: Navegar até a Pasta Correta

1. No File Manager, você verá a estrutura de pastas
2. Clique em **`public_html`** para abrir essa pasta
3. Dentro de `public_html`, verifique se existe a pasta **`cpanel`**
   - **Se NÃO existir:** Clique em **"New Folder"** ou **"Nova Pasta"** e crie a pasta `cpanel`
   - **Se já existir:** Clique para abrir a pasta `cpanel`

### Passo 3: Fazer Upload dos Arquivos

**Opção A: Upload Individual (para poucos arquivos)**

1. Dentro da pasta `cpanel`, clique em **"Upload"** no topo
2. Clique em **"Select File"** ou **"Selecionar Arquivo"**
3. Selecione os arquivos que deseja enviar
4. Aguarde o upload completar

**Opção B: Upload em Lote (Recomendado - para muitos arquivos)**

1. Dentro da pasta `cpanel`, clique em **"Upload"** no topo
2. Arraste e solte TODOS os arquivos da pasta `deploy-cpanel` para a área de upload
3. Ou clique em **"Select File"** e selecione múltiplos arquivos (Ctrl+Click ou Cmd+Click)
4. Aguarde o upload completar (pode levar vários minutos para 253MB)

**Opção C: Upload via ZIP (Mais Rápido - Recomendado)**

1. No seu computador, compacte a pasta `deploy-cpanel` em um arquivo ZIP
2. No File Manager, dentro de `public_html/cpanel`, clique em **"Upload"**
3. Faça upload do arquivo ZIP
4. Após o upload, clique com botão direito no arquivo ZIP
5. Selecione **"Extract"** ou **"Extrair"**
6. Aguarde a extração
7. Delete o arquivo ZIP após a extração

### Passo 4: Verificar Upload

1. Verifique se TODOS os arquivos foram enviados:
   - Deve ter pasta `wp-admin/`
   - Deve ter pasta `wp-content/`
   - Deve ter pasta `wp-includes/`
   - Deve ter arquivos como `index.php`, `wp-config-production.php`, `database.sql`, etc.

---

## 📋 Método 2: Via FTP (Alternativa)

Se preferir usar FTP (FileZilla, Cyberduck, etc.):

### Configurações FTP

```
Servidor/Host: ftp.fredericapassos.pt (ou o IP do servidor)
Porta: 21 (ou 22 para SFTP)
Usuário: seu_usuario_cpanel
Senha: sua_senha_cpanel
Tipo: FTP ou SFTP
```

### Passo a Passo

1. Conecte ao servidor FTP
2. Navegue até `/public_html/cpanel/`
3. Faça upload de TODOS os arquivos da pasta `deploy-cpanel`
4. Mantenha a estrutura de pastas intacta

---

## ⚠️ IMPORTANTE

### O que Fazer:

✅ Fazer upload de **TODOS** os arquivos da pasta `deploy-cpanel`
✅ Manter a estrutura de pastas (não alterar hierarquia)
✅ Verificar se todos os arquivos foram enviados
✅ Usar ZIP se o upload individual for muito lento

### O que NÃO Fazer:

❌ Não enviar apenas alguns arquivos - precisa de TODOS
❌ Não alterar nomes de pastas ou arquivos
❌ Não enviar para outra pasta que não seja `public_html/cpanel/`
❌ Não esquecer de extrair o ZIP se usar esse método

---

## 📁 Estrutura Final Esperada

Após o upload, a estrutura deve ser:

```
public_html/
  └── cpanel/
      ├── wp-admin/
      ├── wp-content/
      ├── wp-includes/
      ├── index.php
      ├── wp-config-production.php
      ├── database.sql
      ├── .htaccess
      ├── update-urls.sql
      └── ... (todos os outros arquivos)
```

---

## 🔍 Verificação Rápida

Após o upload, verifique se existem:

- [ ] Pasta `wp-admin/` (deve ter centenas de arquivos)
- [ ] Pasta `wp-content/` (deve ter pastas `themes/`, `plugins/`, `uploads/`)
- [ ] Pasta `wp-includes/` (deve ter muitos arquivos PHP)
- [ ] Arquivo `index.php` na raiz
- [ ] Arquivo `wp-config-production.php`
- [ ] Arquivo `database.sql`
- [ ] Arquivo `.htaccess`

---

## ⏱️ Tempo Estimado

- **Upload via ZIP:** 5-15 minutos (dependendo da conexão)
- **Upload individual:** 30-60 minutos (não recomendado)
- **Extração do ZIP:** 2-5 minutos

---

## 🆘 Problemas Comuns

### "Upload muito lento"
- Use o método ZIP (compacte antes de enviar)
- Verifique sua conexão de internet
- Tente em horários de menor tráfego

### "Erro de permissão"
- Verifique se você tem permissão para escrever na pasta
- Entre em contato com o suporte do hosting se necessário

### "Arquivo muito grande"
- Use o método ZIP
- Ou aumente o limite de upload no cPanel (se possível)

### "Não consigo ver a pasta cpanel"
- Crie a pasta manualmente no File Manager
- Ou use FTP para criar a pasta

---

## ✅ Próximo Passo

Após fazer upload de TODOS os arquivos:
1. Configure o `wp-config.php` (renomeie `wp-config-production.php`)
2. Importe o banco de dados via phpMyAdmin
3. Execute o script `update-urls.sql`
