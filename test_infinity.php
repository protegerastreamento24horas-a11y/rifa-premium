<?php
/**
 * Script de teste para InfinityFree
 * Use este arquivo para verificar se IonCube e MySQL estão funcionando
 */

header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Teste - Rifa Premium</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
        .container { max-width: 800px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #333; border-bottom: 3px solid #4CAF50; padding-bottom: 10px; }
        .success { background: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin: 10px 0; }
        .error { background: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin: 10px 0; }
        .warning { background: #fff3cd; color: #856404; padding: 15px; border-radius: 5px; margin: 10px 0; }
        .info { background: #d1ecf1; color: #0c5460; padding: 15px; border-radius: 5px; margin: 10px 0; }
        code { background: #f4f4f4; padding: 2px 6px; border-radius: 3px; font-family: monospace; }
        .section { margin: 20px 0; }
        table { width: 100%; border-collapse: collapse; margin: 15px 0; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #4CAF50; color: white; }
        .button { display: inline-block; padding: 10px 20px; background: #4CAF50; color: white; text-decoration: none; border-radius: 5px; margin: 10px 5px; }
        .button:hover { background: #45a049; }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 Teste de Instalação - Rifa Premium</h1>
        
        <div class="section">
            <h2>1. Informações do Servidor</h2>
            <table>
                <tr><th>Item</th><th>Valor</th></tr>
                <tr><td>PHP Version</td><td><?php echo phpversion(); ?></td></tr>
                <tr><td>Server Software</td><td><?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'N/A'; ?></td></tr>
                <tr><td>Document Root</td><td><?php echo $_SERVER['DOCUMENT_ROOT'] ?? 'N/A'; ?></td></tr>
                <tr><td>Server Name</td><td><?php echo $_SERVER['SERVER_NAME'] ?? 'N/A'; ?></td></tr>
            </table>
        </div>

        <div class="section">
            <h2>2. Teste IonCube Loader</h2>
            <?php
            if (extension_loaded('ionCube Loader')) {
                echo '<div class="success">✅ IonCube Loader está instalado e ativo!</div>';
                $ioncube_version = ioncube_loader_version();
                echo '<div class="info">Versão do IonCube: ' . $ioncube_version . '</div>';
            } else {
                echo '<div class="error">❌ IonCube Loader NÃO está instalado!</div>';
                echo '<div class="warning">⚠️ O sistema de rifa requer IonCube Loader para funcionar.</div>';
                echo '<div class="info">No cPanel, procure "Select PHP Version" e ative a extensão "ioncube_loader"</div>';
            }
            ?>
        </div>

        <div class="section">
            <h2>3. Teste de Conexão MySQL</h2>
            <?php
            // Verificar se initialize.php existe
            if (!file_exists('initialize.php')) {
                echo '<div class="error">❌ Arquivo initialize.php não encontrado!</div>';
            } else {
                require_once 'initialize.php';
                
                echo '<div class="info">Tentando conectar com:</div>';
                echo '<table>';
                echo '<tr><td>Servidor</td><td><code>' . DB_SERVER . '</code></td></tr>';
                echo '<tr><td>Porta</td><td><code>' . DB_PORT . '</code></td></tr>';
                echo '<tr><td>Usuário</td><td><code>' . DB_USERNAME . '</code></td></tr>';
                echo '<tr><td>Banco</td><td><code>' . DB_NAME . '</code></td></tr>';
                echo '</table>';
                
                $conn = @new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);
                
                if ($conn->connect_error) {
                    echo '<div class="error">❌ Erro de conexão: ' . $conn->connect_error . '</div>';
                    echo '<div class="warning">Dicas:<br>';
                    echo '1. Verifique se o hostname MySQL está correto (ex: sqlXXX.epizy.com)<br>';
                    echo '2. Confirme usuário e senha no cPanel → MySQL Databases<br>';
                    echo '3. Tente usar "localhost" em vez do hostname remoto<br>';
                    echo '4. Verifique se o banco de dados foi criado</div>';
                } else {
                    echo '<div class="success">✅ Conexão com MySQL bem-sucedida!</div>';
                    
                    // Testar tabelas
                    $result = $conn->query("SHOW TABLES");
                    echo '<div class="info">Tabelas no banco: ' . $result->num_rows . '</div>';
                    
                    if ($result->num_rows > 0) {
                        echo '<table>';
                        echo '<tr><th>#</th><th>Nome da Tabela</th></tr>';
                        $count = 1;
                        while ($row = $result->fetch_array()) {
                            echo '<tr><td>' . $count++ . '</td><td>' . $row[0] . '</td></tr>';
                        }
                        echo '</table>';
                    } else {
                        echo '<div class="warning">⚠️ Nenhuma tabela encontrada. Importe o SQL em phpMyAdmin!</div>';
                    }
                    
                    $conn->close();
                }
            }
            ?>
        </div>

        <div class="section">
            <h2>4. Próximos Passos</h2>
            <?php if (extension_loaded('ionCube Loader')): ?>
                <div class="success">✅ Tudo certo! Você pode:</div>
                <a href="index.php" class="button">Acessar o Site</a>
                <a href="admin/" class="button">Painel Admin</a>
            <?php else: ?>
                <div class="error">❌ Corrija o IonCube antes de continuar</div>
                <div class="info">
                    <strong>Como ativar IonCube no InfinityFree:</strong><br>
                    1. Acesse o cPanel<br>
                    2. Procure "Select PHP Version"<br>
                    3. Selecione PHP 7.4, 8.0 ou 8.1<br>
                    4. Marque a extensão "ioncube_loader"<br>
                    5. Clique em "Save"
                </div>
            <?php endif; ?>
        </div>

        <div class="section" style="margin-top: 30px; padding-top: 20px; border-top: 2px solid #eee;">
            <p style="color: #666; font-size: 12px;">
                🗑️ <strong>Importante:</strong> Delete este arquivo (test_infinity.php) após a instalação!
            </p>
        </div>
    </div>
</body>
</html>
