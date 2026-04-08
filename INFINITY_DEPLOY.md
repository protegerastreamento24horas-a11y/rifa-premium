# 🚀 Deploy no InfinityFree (Hospedagem Gratuita)

## 📋 Resumo

InfinityFree é uma hospedagem gratuita com:
- ✅ PHP 7.4/8.0/8.1
- ✅ MySQL ilimitado
- ✅ 5GB espaço em disco
- ✅ Banda ilimitada
- ✅ cPanel completo
- ✅ Suporte a IonCube Loader (na maioria dos servidores)

---

## 📝 Passo a Passo

### 1. Criar Conta no InfinityFree

1. Acesse: [infinityfree.net](https://infinityfree.net)
2. Clique em **"Sign Up"** ou **"Register"**
3. Preencha:
   - Username
   - Email
   - Password
4. Confirme seu email
5. Clique em **"Create New Account"** no dashboard

### 2. Escolher Subdomínio

InfinityFree oferece domínios gratuitos:
- `seusite.epizy.com`
- `seusite.rf.gd`
- Ou use seu próprio domínio (compra separada)

### 3. Acessar cPanel

Após criar a conta:
1. No dashboard, clique em **"Manage"**
2. Clique em **"Control Panel"** ou acesse diretamente o cPanel
3. Anote as credenciais FTP e MySQL

---

## 🗄️ Configurar Banco de Dados MySQL

### Criar Banco e Usuário

1. No cPanel, procure **"MySQL Databases"** ou **"Bancos de Dados MySQL"**
2. Em **"Create New Database"**:
   - Database Name: `rifa_premium`
   - Clique em **"Create Database"**
3. Em **"Add New User"**:
   - Username: `rifa_user`
   - Password: (escolha uma senha forte)
   - Clique em **"Create User"**
4. Em **"Add User To Database"**:
   - Selecione o usuário criado
   - Selecione o banco criado
   - Clique em **"Add"**
   - Marque **"ALL PRIVILEGES"**
   - Clique em **"Make Changes"**

### Importar Dados SQL

1. No cPanel, procure **"phpMyAdmin"**
2. Clique para abrir
3. Selecione seu banco de dados (ex: `epiz_12345678_rifa_premium`)
4. Clique na aba **"Import"**
5. Clique em **"Choose File"**
6. Selecione o arquivo `database/catalog4_rifa821.sql`
7. Clique em **"Go"** ou **"Import"**

---

## 📤 Fazer Upload dos Arquivos

### Opção A: Via cPanel File Manager (Mais fácil)

1. No cPanel, clique em **"File Manager"**
2. Navegue para `htdocs/` (pasta raiz pública)
3. Clique em **"Upload"**
4. Selecione todos os arquivos do projeto (compactados em ZIP é mais rápido)
5. Se usou ZIP, clique com direito no arquivo → **"Extract"**

### Opção B: Via FTP (Recomendado para arquivos grandes)

1. Baixe o FileZilla: [filezilla-project.org](https://filezilla-project.org)
2. Obtenha credenciais FTP no cPanel (seção "FTP Accounts")
3. Configure FileZilla:
   - Host: `ftpupload.net` ou servidor mostrado no cPanel
   - Username: (seu usuário FTP)
   - Password: (sua senha FTP)
   - Port: 21
4. Conecte e navegue para `/htdocs/`
5. Arraste todos os arquivos do projeto para a pasta

---

## ⚙️ Configurar Arquivos do Projeto

### 1. Editar initialize.php

No File Manager ou FTP, edite `initialize.php`:

```php
<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

// URL do seu site no InfinityFree
if(!defined('BASE_URL')) define('BASE_URL', 'https://seusite.epizy.com/');
if(!defined('BASE_APP')) define('BASE_APP', str_replace('\\','/',__DIR__).'/' );

// Dados do banco MySQL (altere conforme criado no cPanel)
if(!defined('DB_SERVER')) define('DB_SERVER','sqlXXX.epizy.com');  // Hostname do MySQL
if(!defined('DB_USERNAME')) define('DB_USERNAME','epiz_12345678_rifa_user');  // Usuário MySQL
if(!defined('DB_PASSWORD')) define('DB_PASSWORD','SUA_SENHA_AQUI');  // Senha MySQL
if(!defined('DB_NAME')) define('DB_NAME','epiz_12345678_rifa_premium');  // Nome do banco
if(!defined('DB_PORT')) define('DB_PORT','3306');
?>
```

⚠️ **IMPORTANTE**: Substitua os valores pelos seus dados reais do cPanel!

---

## 🔒 Arquivo .htaccess (Otimizado para InfinityFree)

Crie/edição o arquivo `.htaccess` na pasta raiz:

```apache
# Proteger arquivos sensíveis
<FilesMatch "^\.">
    Order allow,deny
    Deny from all
</FilesMatch>

# Desabilitar listagem de diretórios
Options -Indexes

# Proteger arquivos de configuração
<FilesMatch "\.(ini|log|sh|sql)$">
    Order allow,deny
    Deny from all
</FilesMatch>

# Configurar PHP (ajustar conforme necessário)
php_value upload_max_filesize 64M
php_value post_max_size 64M
php_value max_execution_time 300
php_value max_input_time 300

# Compressão GZIP
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript application/javascript application/x-javascript
</IfModule>

# Cache de navegador
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/gif "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/pdf "access plus 1 month"
    ExpiresByType text/x-javascript "access plus 1 month"
    ExpiresByType application/x-shockwave-flash "access plus 1 month"
    ExpiresByType image/x-icon "access plus 1 year"
    ExpiresDefault "access plus 2 days"
</IfModule>

# URL amigável (se necessário)
RewriteEngine On
RewriteBase /

# Redirecionar www para non-www (opcional)
# RewriteCond %{HTTP_HOST} ^www\.(.+)$ [NC]
# RewriteRule ^(.*)$ http://%1/$1 [R=301,L]
```

---

## ✅ Testar Instalação

### 1. Testar IonCube Loader

Crie `test_ioncube.php`:

```php
<?php
phpinfo();
?>
```

Acesse: `https://seusite.epizy.com/test_ioncube.php`

Procure por "ionCube" na página. Se aparecer, está funcionando!

### 2. Testar Conexão com Banco

Crie `test_db.php`:

```php
<?php
require_once 'initialize.php';

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

echo "✅ Conexão com MySQL bem-sucedida!<br>";
echo "Servidor: " . DB_SERVER . "<br>";
echo "Banco: " . DB_NAME . "<br>";

// Testar se tabelas existem
$result = $conn->query("SHOW TABLES");
echo "<br>Tabelas encontradas: " . $result->num_rows . "<br>";

while ($row = $result->fetch_array()) {
    echo "- " . $row[0] . "<br>";
}

$conn->close();
?>
```

Acesse: `https://seusite.epizy.com/test_db.php`

### 3. Testar Site Principal

Acesse: `https://seusite.epizy.com/`

---

## 🆘 Solução de Problemas

### Erro "IonCube Loader não encontrado"

1. No cPanel, procure **"Select PHP Version"**
2. Certifique-se de que está usando PHP 7.4, 8.0 ou 8.1
3. Procure extensão "ioncube_loader" na lista e ative se disponível
4. Se não estiver disponível, tente outro servidor no InfinityFree ou considere usar outra hospedagem

### Erro 500 (Internal Server Error)

1. Verifique permissões de arquivos (755 para pastas, 644 para arquivos)
2. Confira se o `.htaccess` não tem erros
3. Veja os logs em cPanel → "Error Logs"

### Erro de Conexão MySQL

1. Verifique se o hostname está correto (geralmente `sqlXXX.epizy.com`)
2. Confirme usuário, senha e nome do banco
3. Verifique se o usuário tem permissões no banco
4. Tente usar `localhost` em vez do hostname remoto

### Site fica em branco

1. Ative display_errors temporariamente no `initialize.php`:
   ```php
   ini_set('display_errors', 1);
   ini_set('display_startup_errors', 1);
   ```
2. Verifique os logs de erro no cPanel
3. Confirme que todos os arquivos foram enviados

---

## 📁 Estrutura de Arquivos Final

```
htdocs/
├── .htaccess
├── index.php
├── initialize.php          ← Configurado com dados InfinityFree
├── config.php
├── test_ioncube.php      ← (pode remover depois)
├── test_db.php           ← (pode remover depois)
├── database/             ← (não subir na web, só referência)
│   └── catalog4_rifa821.sql
├── assets/
├── pages/
├── classes/
└── (demais arquivos do projeto)
```

---

## 🔐 Segurança Importante

### Após configurar:

1. **Remova arquivos de teste**:
   - `test_ioncube.php`
   - `test_db.php`
   - `health.php`

2. **Proteja a pasta database**:
   - Não deixe o arquivo `.sql` acessível publicamente
   - Ou remova após importar

3. **Altere senhas padrão**:
   - Admin do sistema
   - Banco de dados

---

## ✅ Checklist Final

- [ ] Conta InfinityFree criada
- [ ] Banco de dados MySQL criado
- [ ] Usuário MySQL configurado com permissões
- [ ] SQL importado via phpMyAdmin
- [ ] Arquivos enviados via FTP/File Manager
- [ ] `initialize.php` configurado com dados corretos
- [ ] `.htaccess` criado
- [ ] IonCube testado e funcionando
- [ ] Conexão com banco testada
- [ ] Site principal acessível
- [ ] Arquivos de teste removidos

---

## 📞 Suporte

Se tiver problemas:
- [Fórum InfinityFree](https://forum.infinityfree.net)
- [Base de Conhecimento](https://infinityfree.net/support/)

---

**🎉 Pronto! Seu site de rifa está no ar gratuitamente!**
