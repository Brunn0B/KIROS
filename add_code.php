<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = $_POST['code'];
    $currentDate = date('Y-m-d');

    $sql = "INSERT INTO codigos (data, codigo) VALUES ('$currentDate', '$code')";

    if ($conn->query($sql) === TRUE) {
        echo "Código adicionado com sucesso";
    } else {
        echo "Erro ao adicionar código: " . $conn->error;
    }

    $conn->close();
}
?>
