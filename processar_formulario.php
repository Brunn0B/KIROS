<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "codigos_compartilhados";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Processar dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST["code"];

    // Validar o código (exemplo: garantir que não seja vazio e tem no máximo 255 caracteres)
    if (empty($code) || strlen($code) > 255) {
        echo "Código inválido.";
    } else {
        // Inserir dados no banco de dados usando instrução preparada
        $sql = "INSERT INTO codigos (code) VALUES (?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $code);
            if ($stmt->execute()) {
                echo "Código adicionado com sucesso.";
            } else {
                echo "Erro ao adicionar código: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao preparar a declaração: " . $conn->error;
        }
    }
}
