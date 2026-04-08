# 🚀 Guia de Deploy - Rifa Premium

## 📋 Resumo

Seu projeto está pronto para deploy! Siga os passos abaixo para subir no GitHub e Railway.

---

## 1️⃣ Criar Repositório no GitHub

### Acesse GitHub
1. Vá para [github.com](https://github.com)
2. Faça login na sua conta
3. Clique no botão **"+"** (topo direito) → **"New repository"**

### Configure o Repositório
- **Repository name**: `rifa-premium` (ou nome de sua preferência)
- **Description**: `Sistema de rifa online com PHP`
- **Visibility**: Escolha `Public` (grátis) ou `Private`
- **Initialize**: NÃO marque nenhuma opção (já temos os arquivos)
- Clique em **"Create repository"**

---

## 2️⃣ Push para o GitHub

Após criar o repositório, execute no terminal (na pasta do projeto):

```bash
# Adicionar remote
git remote add origin https://github.com/SEU-USUARIO/rifa-premium.git

# Push do código
git branch -M main
git push -u origin main
```

Substitua `SEU-USUARIO` pelo seu usuário do GitHub.

---

## 3️⃣ Deploy no Railway

### Acesse Railway
1. Vá para [railway.app](https://railway.app)
2. Faça login (pode usar conta GitHub)

### Criar Novo Projeto
1. Clique em **"New Project"**
2. Escolha **"Deploy from GitHub repo"**
3. Selecione seu repositório `rifa-premium`
4. Clique em **"Add Variables"** para configurar

### Adicionar Banco de Dados MySQL
1. Clique em **"New"** → **"Database"** → **"Add MySQL"**
2. Aguarde a criação (será automática)

### Configurar Variáveis de Ambiente

No painel do Railway, adicione estas variáveis:

```
DB_SERVER = ${{MySQL.MYSQLHOST}}
DB_USERNAME = ${{MySQL.MYSQLUSER}}
DB_PASSWORD = ${{MySQL.MYSQLPASSWORD}}
DB_NAME = ${{MySQL.MYSQLDATABASE}}
BASE_URL = (deixe em branco, Railway configura automaticamente)
```

### Importar Banco de Dados

1. No painel MySQL do Railway, clique em **"Connect"**
2. Use as credenciais para conectar via MySQL Workbench ou terminal
3. Importe o arquivo `database/catalog4_rifa821.sql`

Ou use a linha de comando:
```bash
mysql -h SEU_HOST -u SEU_USUARIO -p SEU_BANCO < database/catalog4_rifa821.sql
```

### Deploy Automático

O Railway fará deploy automático quando você fizer push no GitHub!

---

## ⚠️ Importante: IonCube Loader

Este sistema usa **ionCube Loader** para proteger o código PHP.

### No Railway:
- O ionCube Loader pode não estar disponível por padrão
- Você pode precisar usar **Docker** ou outra plataforma que suporte ionCube

### Alternativas:
1. **Hostinger** - Suporta ionCube nativamente
2. **Locaweb** - Hospedagem brasileira com suporte
3. **Servidor VPS** - Instale ionCube manualmente

---

## 🔧 Solução de Problemas

### Erro 500 (Internal Server Error)
- Verifique se o ionCube Loader está instalado
- Confira as permissões de pastas (755 para diretórios, 644 para arquivos)
- Verifique logs no Railway Dashboard

### Erro de Conexão com Banco
- Confira as variáveis de ambiente DB_* no Railway
- Verifique se o banco de dados foi importado corretamente

### Página Branca
- Verifique se o PHP está configurado corretamente
- Confira os logs de erro do Apache/PHP

---

## 📞 Suporte

Para ajuda com deploy, consulte:
- [Documentação Railway](https://docs.railway.app)
- [IonCube Loader](https://www.ioncube.com/loaders.php)

---

## ✅ Checklist Final

- [ ] Repositório criado no GitHub
- [ ] Código pushado para GitHub
- [ ] Projeto criado no Railway
- [ ] MySQL adicionado ao Railway
- [ ] Variáveis de ambiente configuradas
- [ ] Banco de dados importado
- [ ] Site acessível no domínio Railway

🎉 **Pronto! Seu sistema de rifa está online!**
