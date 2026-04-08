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

## 📋 Requisitos

- PHP 7.4 ou superior
- MySQL 5.7 ou superior
- ionCube Loader instalado
- Servidor Apache com mod_rewrite

## 🛠️ Instalação

### 1. Clone o repositório
```bash
git clone https://github.com/seu-usuario/rifa-premium.git
cd rifa-premium
```

### 2. Configure o banco de dados
- Importe o arquivo `database/catalog4_rifa821.sql`
- Configure as credenciais em `initialize.php`

### 3. Configure o ionCube Loader
Verifique se o ionCube Loader está instalado no seu servidor PHP.

### 4. Permissões
```bash
chmod 755 -R .
chmod 777 -R uploads/  # Se houver pasta de uploads
```

## ⚙️ Configuração

Edite o arquivo `initialize.php` com suas credenciais:

```php
define('BASE_URL', 'https://seu-dominio.com/');
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'seu_usuario');
define('DB_PASSWORD', 'sua_senha');
define('DB_NAME', 'seu_banco');
```

## 🌐 Deploy no Railway

[![Deploy on Railway](https://railway.app/button.svg)](https://railway.app/template)

1. Clique no botão acima ou acesse [Railway.app](https://railway.app)
2. Conecte seu repositório GitHub
3. Adicione um banco de dados MySQL
4. Configure as variáveis de ambiente
5. Deploy automático!

## 🔧 Estrutura de Pastas

```
rifaphp/
├── admin/              # Painel administrativo
├── classes/           # Classes PHP
├── database/          # Arquivos SQL
├── gateway/          # Integração pagamentos
├── pages/            # Páginas públicas
├── uploads/          # Arquivos enviados
├── config.php        # Configurações
└── index.php         # Página inicial
```

## 📝 Licença

Este projeto está sob licença proprietária.

## 👤 Autor

Desenvolvido por [Seu Nome]

---

⚠️ **Importante**: Este sistema requer ionCube Loader para funcionar corretamente.
