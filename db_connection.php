<?php
$servername = "Kiros";
$username = "root";
$password = "root";
$dbname = "codigos_compartilhados";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}
?>
