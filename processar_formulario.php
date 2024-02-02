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

    // Inserir dados no banco de dados
    $sql = "INSERT INTO codigos (code) VALUES ('$code')";

    if ($conn->query($sql) === TRUE) {
        echo "Código adicionado com sucesso.";
    } else {
        echo "Erro ao adicionar código: " . $conn->error;
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
