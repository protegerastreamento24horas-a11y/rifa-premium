<?php
// Health check para Railway
header('Content-Type: application/json');

$response = [
    'status' => 'OK',
    'timestamp' => date('Y-m-d H:i:s'),
    'php_version' => phpversion(),
    'ioncube_loaded' => extension_loaded('ionCube Loader'),
    'env_vars' => [
        'MYSQLHOST' => getenv('MYSQLHOST') ?: 'NÃO DEFINIDO',
        'MYSQLPORT' => getenv('MYSQLPORT') ?: 'NÃO DEFINIDO',
        'MYSQLUSER' => getenv('MYSQLUSER') ? 'DEFINIDO' : 'NÃO DEFINIDO',
        'MYSQLPASSWORD' => getenv('MYSQLPASSWORD') ? 'DEFINIDO' : 'NÃO DEFINIDO',
        'MYSQLDATABASE' => getenv('MYSQLDATABASE') ?: 'NÃO DEFINIDO',
        'RAILWAY_STATIC_URL' => getenv('RAILWAY_STATIC_URL') ?: 'NÃO DEFINIDO',
        'BASE_URL' => getenv('BASE_URL') ?: 'NÃO DEFINIDO',
    ]
];

// Teste de conexão com banco de dados
try {
    require_once 'initialize.php';
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
    if ($conn->connect_error) {
        $response['database'] = 'ERRO: ' . $conn->connect_error;
    } else {
        $response['database'] = 'CONECTADO';
        $conn->close();
    }
} catch (Exception $e) {
    $response['database'] = 'EXCEÇÃO: ' . $e->getMessage();
}

echo json_encode($response, JSON_PRETTY_PRINT);
