# 🗄️ Como Criar o Banco de Dados no cPanel

## ⚠️ IMPORTANTE: Onde Criar o Banco

O banco de dados **NÃO** é criado no phpMyAdmin!
O banco é criado em: **cPanel → MySQL Databases**

O phpMyAdmin é usado apenas para **IMPORTAR** o banco depois que ele já foi criado.

---

## 📋 Passo a Passo Detalhado

### Passo 1: Acessar MySQL Databases no cPanel

1. Faça login no cPanel: https://fredericapassos.pt/cpanel
2. Procure a seção **"Databases"** ou **"Bancos de Dados"**
3. Clique em **"MySQL Databases"** ou **"MySQL Databases"**

### Passo 2: Criar o Banco de Dados

1. Na seção **"Create New Database"** ou **"Criar Novo Banco de Dados"**
2. Digite o nome do banco (ex: `fredericapassos_wp`)
3. Clique em **"Create Database"** ou **"Criar Banco de Dados"**
4. ⚠️ **ANOTE O NOME COMPLETO** do banco (geralmente vem com prefixo do usuário, ex: `usuario_fredericapassos_wp`)

### Passo 3: Criar o Usuário MySQL

1. Role a página até a seção **"MySQL Users"** ou **"Usuários MySQL"**
2. Na seção **"Add New User"** ou **"Adicionar Novo Usuário"**
3. Digite:
   - **Username:** (ex: `fredericapassos_user`)
   - **Password:** (crie uma senha forte)
4. Clique em **"Create User"** ou **"Criar Usuário"**
5. ⚠️ **ANOTE O NOME COMPLETO DO USUÁRIO** (geralmente vem com prefixo, ex: `usuario_fredericapassos_user`)
6. ⚠️ **ANOTE A SENHA**

### Passo 4: Adicionar Usuário ao Banco de Dados

1. Role até a seção **"Add User To Database"** ou **"Adicionar Usuário ao Banco"**
2. Selecione o **usuário** que você criou
3. Selecione o **banco de dados** que você criou
4. Clique em **"Add"** ou **"Adicionar"**
5. Na próxima tela, marque **"ALL PRIVILEGES"** ou **"TODOS OS PRIVILEGIOS"**
6. Clique em **"Make Changes"** ou **"Fazer Alterações"**

### Passo 5: Anotar as Informações

⚠️ **IMPORTANTE:** Anote essas informações (você precisará no wp-config.php):

```
DB_NAME: usuario_fredericapassos_wp
DB_USER: usuario_fredericapassos_user
DB_PASSWORD: [a senha que você criou]
DB_HOST: localhost
```

---

## 📥 Depois de Criar o Banco: Importar no phpMyAdmin

### Passo 1: Acessar phpMyAdmin

1. No cPanel, procure **"phpMyAdmin"** na seção Databases
2. Clique para abrir

### Passo 2: Selecionar o Banco

1. No painel esquerdo, você verá uma lista de bancos de dados
2. Clique no banco que você criou (ex: `usuario_fredericapassos_wp`)

### Passo 3: Importar o Arquivo

1. Com o banco selecionado, clique na aba **"Import"** ou **"Importar"** no topo
2. Clique em **"Choose File"** ou **"Escolher Arquivo"**
3. Selecione o arquivo `database.sql` que está na pasta deploy-cpanel
4. Role até o final da página
5. Clique em **"Go"** ou **"Executar"** no canto inferior direito
6. Aguarde a importação (pode levar alguns minutos)

### Passo 4: Verificar Importação

1. Após a importação, você verá uma mensagem de sucesso
2. No painel esquerdo, clique no banco novamente
3. Você deve ver várias tabelas começando com `wp_` (ex: `wp_posts`, `wp_options`, etc.)

---

## ✅ Checklist

- [ ] Banco de dados criado no cPanel → MySQL Databases
- [ ] Usuário MySQL criado
- [ ] Usuário adicionado ao banco com privilégios totais
- [ ] Informações anotadas (DB_NAME, DB_USER, DB_PASSWORD)
- [ ] Banco importado via phpMyAdmin
- [ ] Tabelas visíveis no phpMyAdmin após importação

---

## 🆘 Problemas Comuns

### "Não vejo a opção MySQL Databases"
- Procure por "Databases" ou "Bancos de Dados" no cPanel
- Pode estar em uma seção diferente dependendo do tema do cPanel
- Use a busca do cPanel digitando "MySQL"

### "O nome do banco tem um prefixo estranho"
- Isso é normal! O cPanel adiciona o prefixo do seu usuário
- Use o nome COMPLETO (com prefixo) no wp-config.php

### "Erro ao importar o banco"
- Verifique se o arquivo database.sql não está corrompido
- Verifique o tamanho máximo de upload no phpMyAdmin
- Se o arquivo for muito grande, pode precisar aumentar o limite ou usar linha de comando

### "Não consigo fazer login no phpMyAdmin"
- Use as mesmas credenciais do cPanel
- Ou use as credenciais do usuário MySQL que você criou

---

## 📝 Próximo Passo

Depois de criar e importar o banco, configure o `wp-config.php` com as informações que você anotou!
