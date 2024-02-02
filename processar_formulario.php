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
        echo json_encode(array("status" => "error", "message" => "Código inválido."));
    } else {
        // Inserir dados no banco de dados usando instrução preparada
        $stmt = $conn->prepare("INSERT INTO codigos (code) VALUES (:code)");
        $stmt->bindParam(':code', $code);

        try {
            $stmt->execute();
            echo json_encode(array("status" => "success", "message" => "Código adicionado com sucesso."));
        } catch (PDOException $e) {
            echo json_encode(array("status" => "error", "message" => "Erro ao adicionar código: " . $e->getMessage()));
        }
    }
} else {
    // Se não for uma solicitação POST, recuperar os dados do banco de dados
    $result = $conn->query("SELECT * FROM codigos ORDER BY data_insercao DESC");
    $codes = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($codes);
}
?>
