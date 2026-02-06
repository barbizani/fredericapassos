# 🔄 Como Substituir o Banco de Dados Antigo pelo Novo

## ⚠️ IMPORTANTE: Faça Backup Primeiro!

Antes de substituir, **SEMPRE** faça backup do banco antigo!

---

## 📋 Opção 1: Substituir o Banco de Dados (Recomendado)

### Passo 1: Fazer Backup do Banco Antigo

1. Acesse **phpMyAdmin** no cPanel
2. No painel esquerdo, clique no **banco de dados antigo**
3. Clique na aba **"Export"** ou **"Exportar"** no topo
4. Selecione **"Quick"** ou **"Rápido"**
5. Formato: **SQL**
6. Clique em **"Go"** ou **"Executar"**
7. O arquivo será baixado (ex: `banco_antigo.sql`)
8. ⚠️ **GUARDE ESTE ARQUIVO** em local seguro!

### Passo 2: Limpar o Banco Antigo

1. Ainda no phpMyAdmin, com o banco antigo selecionado
2. Clique na aba **"SQL"** no topo
3. Execute este comando (substitua `nome_banco_antigo` pelo nome real):

```sql
DROP DATABASE nome_banco_antigo;
CREATE DATABASE nome_banco_antigo;
```

**OU** (mais seguro - apenas limpa as tabelas):

1. Selecione o banco antigo
2. Marque **TODAS as tabelas** (use "Check All" ou marque manualmente)
3. No menu dropdown abaixo, selecione **"Drop"** ou **"Eliminar"**
4. Confirme a exclusão
5. Todas as tabelas serão removidas, mas o banco continua existindo

### Passo 3: Importar o Novo Banco

1. Com o banco antigo selecionado (agora vazio)
2. Clique na aba **"Import"** ou **"Importar"**
3. Clique em **"Choose File"** ou **"Escolher Arquivo"**
4. Selecione o arquivo `database.sql` (o novo banco)
5. Clique em **"Go"** ou **"Executar"**
6. Aguarde a importação

### Passo 4: Atualizar wp-config.php

1. No **File Manager**, edite `wp-config.php`
2. Altere o `DB_NAME` para o nome do banco antigo (que agora tem o conteúdo novo):

```php
define('DB_NAME', 'nome_do_banco_antigo');  // Use o nome do banco antigo
```

3. Salve o arquivo

### Passo 5: Atualizar URLs

1. No phpMyAdmin, selecione o banco (agora com conteúdo novo)
2. Execute os comandos SQL de atualização de URLs (veja `COMO-ATUALIZAR-URLS.md`)

---

## 📋 Opção 2: Usar o Banco Novo e Atualizar wp-config.php

Se você já importou o banco novo em um banco diferente:

### Passo 1: Identificar os Bancos

- **Banco antigo:** `updklnwsqf6clv_site_antigo` (exemplo)
- **Banco novo:** `updklnwsqf6clv_fredericawordpress` (exemplo)

### Passo 2: Atualizar wp-config.php

1. No **File Manager**, edite `wp-config.php`
2. Altere o `DB_NAME` para o nome do banco NOVO:

```php
define('DB_NAME', 'updklnwsqf6clv_fredericawordpress');  // Banco novo
define('DB_USER', 'seu_usuario');                         // Mesmo usuário
define('DB_PASSWORD', 'sua_senha');                      // Mesma senha
define('DB_HOST', 'localhost');
```

3. Salve o arquivo

### Passo 3: Verificar Permissões do Usuário

1. No cPanel, vá em **MySQL Databases**
2. Verifique se o usuário MySQL tem acesso ao banco novo
3. Se não tiver, adicione o usuário ao banco novo

### Passo 4: Atualizar URLs

1. No phpMyAdmin, selecione o banco NOVO
2. Execute os comandos SQL de atualização de URLs

---

## 📋 Opção 3: Mesclar Conteúdo (Avançado - Não Recomendado)

Se você quiser manter dados do banco antigo e adicionar o novo:

⚠️ **Isso é complexo e pode causar conflitos. Recomendamos usar Opção 1 ou 2.**

---

## ✅ Checklist de Substituição

- [ ] Backup do banco antigo feito e guardado
- [ ] Banco antigo limpo (tabelas removidas)
- [ ] Novo banco importado no banco antigo
- [ ] wp-config.php atualizado com nome do banco correto
- [ ] URLs atualizadas no banco
- [ ] Site testado e funcionando

---

## 🆘 Problemas Comuns

### "Erro ao conectar ao banco"
- Verifique se o nome do banco no wp-config.php está correto
- Verifique se o usuário MySQL tem permissões no banco
- Verifique se o banco existe no phpMyAdmin

### "Tabelas antigas ainda aparecem"
- Certifique-se de que deletou TODAS as tabelas antes de importar
- Ou use DROP DATABASE e CREATE DATABASE

### "Site não carrega após substituição"
- Verifique se as URLs foram atualizadas
- Verifique se o wp-config.php está correto
- Limpe o cache do navegador

### "Perdi dados importantes"
- ⚠️ **SEMPRE faça backup antes!**
- Restaure o backup do banco antigo se necessário

---

## 🔄 Resumo Rápido

**Para substituir completamente:**

1. ✅ Backup do banco antigo
2. ✅ Limpar banco antigo (deletar tabelas)
3. ✅ Importar `database.sql` no banco antigo
4. ✅ Atualizar wp-config.php (usar nome do banco antigo)
5. ✅ Atualizar URLs no banco
6. ✅ Testar o site

**OU**

1. ✅ Usar banco novo já importado
2. ✅ Atualizar wp-config.php (usar nome do banco novo)
3. ✅ Verificar permissões do usuário no banco novo
4. ✅ Atualizar URLs no banco
5. ✅ Testar o site

---

## 💡 Recomendação

**Use a Opção 1** se você quer manter o mesmo nome de banco e substituir completamente o conteúdo.

**Use a Opção 2** se você já importou em um banco novo e quer usar esse banco novo.
