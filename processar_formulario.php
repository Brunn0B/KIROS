<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "codigos_compartilhados";

// Conectar ao banco de dados usando PDO
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configurar PDO para lançar exceções em caso de erros
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexão falhou: " . $e->getMessage());
}

// Processar dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST["code"];

    // Validar o código
    if (empty($code) || strlen($code) > 255) {
        echo "Código inválido.";
    } else {
        // Inserir dados no banco de dados usando instrução preparada
        $stmt = $conn->prepare("INSERT INTO codigos (code) VALUES (:code)");
        $stmt->bindParam(':code', $code);

        try {
            $stmt->execute();
            echo "Código adicionado com sucesso.";
        } catch (PDOException $e) {
            echo "Erro ao adicionar código: " . $e->getMessage();
        }
    }
}
?>
