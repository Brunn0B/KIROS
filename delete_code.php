<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codeId = $_POST['codeId'];

    $sql = "DELETE FROM codigos WHERE id = $codeId";

    if ($conn->query($sql) === TRUE) {
        echo "Código excluído com sucesso";
    } else {
        echo "Erro ao excluir código: " . $conn->error;
    }

    $conn->close();
}
?>
