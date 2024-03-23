<?php
// Conectar ao banco de dados
$conexao = mysqli_connect("localhost", "root", "", "codigos_compartilhados");

// Verificar a conexão
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Verifica se o código foi enviado
if (isset($_POST['code'])) {
    $codigo = mysqli_real_escape_string($conexao, $_POST['code']);

    // Insere o código no banco de dados
    $query = "INSERT INTO codigos (codigo) VALUES ('$codigo')";
    if (mysqli_query($conexao, $query)) {
        echo "Código adicionado com sucesso!";
    } else {
        echo "Erro ao adicionar o código: " . mysqli_error($conexao);
    }
} else {
    echo "Código não enviado.";
}

// Fecha a conexão
mysqli_close($conexao);
?>
