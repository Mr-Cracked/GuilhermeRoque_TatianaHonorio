<?php
include '../basedados/basedados.h';

// Obter os dados do formulário
$nome = $_POST['username'];
$password = $_POST['password']; // A senha ainda não está encriptada
$email = $_POST['email'];
$telemovel = $_POST['telemovel'];
$morada = $_POST['morada'];

// Encriptar a senha
$senha_encriptada = md5($password);

// Consultar se o utilizador já existe
$sql = "SELECT * FROM utilizador WHERE nome='$nome'";
$result = mysqli_query($conn, $sql);

// Verificar se a consulta foi bem-sucedida e se já existe um utilizador com o mesmo nome
if (mysqli_num_rows($result) > 0) {
    echo '<link rel="stylesheet" href="bootstrap.css">
    <div class="alert alert-dismissible alert-danger">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Erro!</strong> <a href="registarformulario.php" class="alert-link">Utilizador já existe</div>';
} else {
    // Inserir novo utilizador se não existir
    $sql = "INSERT INTO utilizador (nome, password, email, telemovel, morada) VALUES ('$nome', '$senha_encriptada', '$email', '$telemovel', '$morada')";
    $result = mysqli_query($conn, $sql);

    // Verificar se a inserção foi bem-sucedida
    if ($result) {
        echo '<font color="green">Utilizador inserido com sucesso!</font>';
    } else {
        echo '<font color="red">Falha ao inserir utilizador!</font>';
    }
}
?>
