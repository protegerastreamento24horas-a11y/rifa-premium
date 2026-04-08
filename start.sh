#!/bin/bash
# Script de inicialização para Railway

echo "=========================================="
echo "Iniciando Rifa Premium..."
echo "=========================================="

# Verificar variáveis de ambiente
echo "Verificando variáveis de ambiente..."

# Se não houver BASE_URL, usa RAILWAY_STATIC_URL
if [ -z "$BASE_URL" ] && [ -n "$RAILWAY_STATIC_URL" ]; then
    export BASE_URL="https://$RAILWAY_STATIC_URL/"
    echo "BASE_URL definido: $BASE_URL"
fi

# Configurar variáveis do banco de dados para compatibilidade
if [ -n "$MYSQLHOST" ]; then
    export DB_SERVER="$MYSQLHOST"
    echo "DB_SERVER: $DB_SERVER"
fi

if [ -n "$MYSQLPORT" ]; then
    export DB_PORT="$MYSQLPORT"
    echo "DB_PORT: $DB_PORT"
fi

if [ -n "$MYSQLUSER" ]; then
    export DB_USERNAME="$MYSQLUSER"
    echo "DB_USERNAME: $DB_USERNAME"
fi

if [ -n "$MYSQLPASSWORD" ]; then
    export DB_PASSWORD="$MYSQLPASSWORD"
    echo "DB_PASSWORD: [DEFINIDO]"
fi

if [ -n "$MYSQLDATABASE" ]; then
    export DB_NAME="$MYSQLDATABASE"
    echo "DB_NAME: $DB_NAME"
fi

echo "=========================================="
echo "Iniciando Apache..."
echo "=========================================="

# Iniciar Apache em primeiro plano
apache2-foreground
