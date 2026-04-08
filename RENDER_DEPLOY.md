# 🚀 Deploy no Render.com

## Opção 1: Deploy Automático (Blueprint)

### 1. Criar Blueprint no Render
1. Acesse [dashboard.render.com/blueprints](https://dashboard.render.com/blueprints)
2. Clique em **"New Blueprint Instance"**
3. Conecte seu repositório GitHub
4. Selecione `protegerastreamento24horas-a11y/rifa-premium`
5. Clique em **"Apply Blueprint"**

O Render vai criar automaticamente:
- ✅ Serviço Web (PHP + Apache + IonCube)
- ✅ Banco de dados MySQL
- ✅ Configuração de variáveis de ambiente

---

## Opção 2: Deploy Manual

### Passo 1: Banco de Dados
1. No Dashboard Render, clique em **"New"** → **"PostgreSQL"** ou **"MySQL"**
2. Selecione **MySQL**
3. Nome: `rifa-premium-db`
4. Clique em **"Create Database"**

### Passo 2: Serviço Web
1. Clique em **"New"** → **"Web Service"**
2. Conecte seu repositório GitHub
3. Selecione `rifa-premium`
4. Configure:
   - **Name**: `rifa-premium`
   - **Environment**: `Docker`
   - **Plan**: `Standard` (ou Free para testes)
   - **Dockerfile Path**: `./Dockerfile`

### Passo 3: Variáveis de Ambiente
Adicione em **Environment**:
```
DB_SERVER = (hostname do MySQL - veja em Connect)
DB_PORT = 3306
DB_USERNAME = (username do MySQL)
DB_PASSWORD = (password do MySQL)
DB_NAME = (database name)
BASE_URL = (URL que o Render fornecer)
```

---

## 🔧 Configurações Importantes

### IonCube Loader
O Dockerfile já inclui IonCube Loader. O Render suporta isso nativamente via Docker.

### Health Check
Acesse `/health.php` no seu domínio para verificar:
- PHP funcionando
- IonCube carregado
- Conexão com banco de dados

---

## 📋 Comandos Úteis

### Importar Banco de Dados
```bash
# Baixe o arquivo SQL do seu repositório
# Use a aba "Shell" no Render para executar:
mysql -h $DB_SERVER -u $DB_USERNAME -p$DB_PASSWORD $DB_NAME < database/catalog4_rifa821.sql
```

Ou use MySQL Workbench com as credenciais externas do Render.

---

## ⚠️ Diferenças Railway vs Render

| Recurso | Railway | Render |
|---------|---------|--------|
| Rede Privada | Automática | Manual |
| IonCube | Via Dockerfile | Via Dockerfile ✅ |
| Preço | $5/mês créditos | Grátis + $7/mês |
| Deploy | Automático | Manual ou Blueprint |

---

## 🆘 Solução de Problemas

### Erro de Conexão MySQL
- Verifique se o MySQL está em `Ohio` ou mesma região do Web Service
- Use hostname externo se a rede privada falhar
- Adicione `DB_PORT=3306` explicitamente

### Erro IonCube
- Verifique em `/health.php` se IonCube está carregado
- Se não estiver, o Dockerfile precisa ser reconstruído

### Site não carrega
- Verifique logs em **Logs** no dashboard
- Confirme que a porta 80 está exposta no Dockerfile

---

## ✅ Checklist

- [ ] Repositório conectado ao Render
- [ ] MySQL criado e rodando
- [ ] Web Service criado com Dockerfile
- [ ] Variáveis de ambiente configuradas
- [ ] Banco de dados importado
- [ ] Health check passando
- [ ] Site acessível na URL do Render

---

**Deploy mais fácil:** Use a **Opção 1 (Blueprint)** - é automático!
