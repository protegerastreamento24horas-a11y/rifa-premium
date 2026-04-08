
<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

/*
 * =====================================================
 * CONFIGURAÇÃO PARA INFINITYFREE
 * =====================================================
 * Preencha os dados abaixo com as informações do seu
 * banco de dados MySQL (cPanel → MySQL Databases)
 */

// URL do seu site no InfinityFree (ex: https://seusite.epizy.com/)
if(!defined('BASE_URL')) define('BASE_URL', 'https://seusite.epizy.com/');

if(!defined('BASE_APP')) define('BASE_APP', str_replace('\\','/',__DIR__).'/' );

// DADOS DO BANCO DE DADOS - ALTERE AQUI:
// Hostname MySQL (ex: sql123.epizy.com ou localhost)
if(!defined('DB_SERVER')) define('DB_SERVER', 'sql123.epizy.com');

// Usuário MySQL (ex: epiz_12345678_rifauser)
if(!defined('DB_USERNAME')) define('DB_USERNAME', 'epiz_12345678_rifauser');

// Senha MySQL (a senha que você criou no cPanel)
if(!defined('DB_PASSWORD')) define('DB_PASSWORD', 'SUA_SENHA_AQUI');

// Nome do banco (ex: epiz_12345678_rifadb)
if(!defined('DB_NAME')) define('DB_NAME', 'epiz_12345678_rifadb');

// Porta MySQL (geralmente 3306)
if(!defined('DB_PORT')) define('DB_PORT', '3306');
?>