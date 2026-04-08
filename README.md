# Sistema de Rifa Premium

Sistema completo de rifa online com painel administrativo, gateway de pagamento PIX e gestão de campanhas.

## 🚀 Funcionalidades

- **Campanhas de Rifa**: Crie e gerencie múltiplas campanhas
- **Números Automáticos**: Distribuição automática de números aos participantes
- **Gateway PIX**: Integração com pagamentos via PIX
- **Painel Administrativo**: Controle total das campanhas, participantes e pagamentos
- **Sistema de Afiliados**: Programa de afiliados com comissões
- **Relatórios**: Estatísticas e relatórios de vendas
- **Sorteio Automático**: Realização de sorteios com aleatoriedade

---

## 🆓 Hospedagem Gratuita - InfinityFree

Este projeto está configurado para rodar no **InfinityFree** (hospedagem gratuita).

### ✅ Requisitos do InfinityFree

- PHP 7.4, 8.0 ou 8.1
- MySQL 5.7+
- ionCube Loader (disponível na maioria dos servidores)
- 5GB espaço em disco

---

## � Guia de Instalação

### Passo 1: Criar Conta no InfinityFree

1. Acesse: [infinityfree.net](https://infinityfree.net)
2. Clique em **"Sign Up"** e registre-se
3. Crie um novo site com subdomínio gratuito (`seusite.epizy.com`)

### Passo 2: Configurar Banco de Dados

1. No cPanel, clique em **"MySQL Databases"**
2. Crie um banco de dados (ex: `rifa_db`)
3. Crie um usuário e adicione ao banco com todas as permissões
4. Anote: hostname, usuário, senha e nome do banco

### Passo 3: Importar SQL

1. No cPanel, abra **"phpMyAdmin"**
2. Selecione seu banco de dados
3. Clique em **"Import"** → selecione `database/catalog4_rifa821.sql`
4. Clique em **"Go"**

### Passo 4: Configurar initialize.php

Edite o arquivo `initialize.php` com seus dados:

```php
define('BASE_URL', 'https://seusite.epizy.com/');
define('DB_SERVER', 'sql123.epizy.com');     // Hostname do MySQL
define('DB_USERNAME', 'epiz_12345678_user'); // Usuário MySQL
define('DB_PASSWORD', 'sua_senha_aqui');      // Senha MySQL
define('DB_NAME', 'epiz_12345678_rifadb');   // Nome do banco
```

### Passo 5: Upload dos Arquivos

**Opção 1 - cPanel File Manager:**
1. cPanel → File Manager → `htdocs/`
2. Upload → selecione todos os arquivos ZIP
3. Extraia o ZIP na pasta

**Opção 2 - FTP (FileZilla):**
- Host: `ftpupload.net`
- Usuário: (seu usuário FTP do cPanel)
- Senha: (sua senha FTP)
- Porta: 21
- Envie para `/htdocs/`

### Passo 6: Testar

1. Acesse: `https://seusite.epizy.com/`
2. Para testar ionCube + MySQL, acesse: `test_infinity.php`

---

## 🔧 Arquivos do Projeto

```
├── admin/              # Painel administrativo
├── assets/             # CSS, JS, imagens
├── classes/            # Classes PHP (com ionCube)
├── database/           # SQL para importação
├── gateway/            # Pagamentos PIX
├── pages/              # Páginas do site
├── uploads/            # Uploads de arquivos
├── .htaccess           # Configuração Apache
├── config.php          # Configurações do sistema
├── index.php           # Página inicial
├── initialize.php      # ← CONFIGURAR AQUI
├── INFINITY_DEPLOY.md # Guia detalhado
└── webhook.php         # Webhook pagamentos
```

---

## ⚠️ Importante

- **ionCube Loader**: O sistema usa ionCube. Se der erro, ative no cPanel → "Select PHP Version"
- **Segurança**: Delete `test_infinity.php` após a instalação
- **SQL**: Não deixe o arquivo `.sql` acessível publicamente

---

## 🆘 Suporte

- [Fórum InfinityFree](https://forum.infinityfree.net)
- Guia completo: veja `INFINITY_DEPLOY.md`
