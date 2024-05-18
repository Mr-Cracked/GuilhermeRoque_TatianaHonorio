<?php
include '../basedados/basedados.h';
session_start();
    // Obter os dados do formulário
    if (empty($_POST['nivelacesso'])) {
        $nivel = null;
    } else {
        $nivel = $_POST['nivelacesso'];
    }
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
        if ($_SESSION['tipo_utilizador'] == 3) {
            echo '<link rel="stylesheet" href="bootstrap.css">';
            echo '<div class="alert alert-dismissible alert-danger">';
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
            echo '<strong>Erro!</strong> <a href="adicionarUtilizadorformulario.php" class="alert-link">Utilizador já existe</a></div>';
        } else {
            echo '<link rel="stylesheet" href="bootstrap.css">';
            echo '<div class="alert alert-dismissible alert-danger">';
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
            echo '<strong>Erro!</strong> <a href="registarformulario.php" class="alert-link">Utilizador já existe</a></div>';
        }
    } else {
        if (empty($nivel)) {
            // Inserir novo utilizador se não existir
            $sql = "INSERT INTO utilizador (nome, password, email, telemovel, morada) VALUES ('$nome', '$senha_encriptada', '$email', '$telemovel', '$morada')";
            $result = mysqli_query($conn, $sql);

            // Verificar se a inserção foi bem-sucedida
            if ($result) {
                echo '<link rel="stylesheet" href="bootstrap.css">';
                echo '<div class="alert alert-dismissible alert-success">';
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
                echo '<strong>Alerta!</strong> <a href="index.php" class="alert-link">Sucesso!!!</a></div>';
            } else {
                echo '<link rel="stylesheet" href="bootstrap.css">';
                echo '<div class="alert alert-dismissible alert-danger">';
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
                echo '<strong>Alerta!</strong> <a href="registarformulario.php" class="alert-link">ERRO!</a></div>';
            }
        } else {
            // Inserir novo utilizador se não existir
            $sql = "INSERT INTO utilizador (tipo_utilizador,nome, password, email, telemovel, morada) VALUES ('$nivel','$nome', '$senha_encriptada', '$email', '$telemovel', '$morada')";
            $result = mysqli_query($conn, $sql);

            // Verificar se a inserção foi bem-sucedida
            if ($result) {
                echo '<link rel="stylesheet" href="bootstrap.css">';
                echo '<div class="alert alert-dismissible alert-success">';
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
                echo '<strong>Alerta!</strong> <a href="utilizadores.php" class="alert-link">Sucesso!!!</a></div>';
            } else {
                echo '<link rel="stylesheet" href="bootstrap.css">';
                echo '<div class="alert alert-dismissible alert-danger">';
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
                echo '<strong>Alerta!</strong> <a href="registarformulario.php" class="alert-link">ERRO!</a></div>';
            }
        }
    }
?>
