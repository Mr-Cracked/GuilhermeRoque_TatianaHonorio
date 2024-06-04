<?php
include '../basedados/basedados.h';
session_start();

if(empty($_SESSION['tipo_utilizador']) || $_SESSION['tipo_utilizador'] == 3){
    

    if (empty($_POST['nivelacesso'])) {
        $nivel = null;
    } else {
        $nivel = $_POST['nivelacesso'];
    }

    if(empty($_POST['username'])){
        echo '<link rel="stylesheet" href="bootstrap.css">';
                echo '<div class="alert alert-dismissible alert-danger">';
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
                echo '<strong>Erro!</strong> <a href="index.php" class="alert-link">Não há dados suficientes</a></div>';
    }else{
        $nome = $_POST['username'];
        $pass = $_POST['pass']; // A senha ainda não está encriptada
        $email = $_POST['email'];
        $telemovel = $_POST['telemovel'];
        $morada = $_POST['morada'];

        // Encriptar a senha
        $senha_encriptada = md5($pass);

        
        $sql = "SELECT * FROM utilizador WHERE nome='$nome'";
        $result = mysqli_query($conn, $sql);

        
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
                
                $sql = "INSERT INTO utilizador (nome, pass, email, telemovel, morada) VALUES ('$nome', '$senha_encriptada', '$email', '$telemovel', '$morada')";
                $result = mysqli_query($conn, $sql);

                
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
                
                $sql = "INSERT INTO utilizador (tipo_utilizador,nome, pass, email, telemovel, morada) VALUES ('$nivel','$nome', '$senha_encriptada', '$email', '$telemovel', '$morada')";
                $result = mysqli_query($conn, $sql);

                
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
    }

    
}else{
    header("Erro.jsp");
}
?>
