<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = '';
$dbname = "folha_inscricao";

// Dados do formulário
$name = $_POST['nome'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$interest = $_POST['interesse'];

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Insere os dados no banco de dados
$sql = "INSERT INTO candidatos (nome, email, phone, interesse) VALUES ('$name', '$email', '$phone', '$interest')";

if ($conn->query($sql) === TRUE) {
    echo "Dados do formulário salvos com sucesso!";
} else {
    echo "Erro ao salvar os dados do formulário: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
