
<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Suporte a variáveis de ambiente do Railway
if(!defined('BASE_URL')) {
    $baseUrl = getenv('BASE_URL') ?: (getenv('RAILWAY_STATIC_URL') ? 'https://' . getenv('RAILWAY_STATIC_URL') . '/' : 'https://rifaphp.catalogodgplwdesign.com/');
    define('BASE_URL', $baseUrl);
}
if(!defined('BASE_APP')) define('BASE_APP', str_replace('\\','/',__DIR__).'/' );

// Database - suporta variáveis Railway MySQL ou env vars personalizadas
if(!defined('DB_SERVER')) {
    $dbHost = getenv('MYSQLHOST') ?: getenv('DB_SERVER') ?: 'localhost';
    define('DB_SERVER', $dbHost);
}
if(!defined('DB_USERNAME')) {
    $dbUser = getenv('MYSQLUSER') ?: getenv('DB_USERNAME') ?: 'catalog4_rifa821';
    define('DB_USERNAME', $dbUser);
}
if(!defined('DB_PASSWORD')) {
    $dbPass = getenv('MYSQLPASSWORD') ?: getenv('DB_PASSWORD') ?: '#H42(xJ7]]I_';
    define('DB_PASSWORD', $dbPass);
}
if(!defined('DB_NAME')) {
    $dbName = getenv('MYSQLDATABASE') ?: getenv('DB_NAME') ?: 'catalog4_rifa821';
    define('DB_NAME', $dbName);
}
if(!defined('DB_PORT')) {
    $dbPort = getenv('MYSQLPORT') ?: '3306';
    define('DB_PORT', $dbPort);
}
?>