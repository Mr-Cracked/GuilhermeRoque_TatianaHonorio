<?php
include '../basedados/basedados.h';
session_start();
if(empty($_SESSION['tipo_utilizador'])){

    // Obter os dados do formulário
    $nome = $_POST['username'];
    $pass = $_POST['pass']; // A senha ainda não está encriptada

    // Encriptar a senha
    $senha_encriptada = md5($pass);

    // Consultar se o utilizador existe
    $sql = "SELECT * FROM utilizador WHERE nome='$nome' AND pass='$senha_encriptada'";
    $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        if(empty($row['nome'])){
            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Erro!</strong> <a href="loginformulario.php" class="alert-link">Utilizador não existe</div>';
        }else{
        // Verificar se a autenticação foi bem-sucedida
        if ($row['tipo_utilizador'] > 0) {
            $_SESSION['tipo_utilizador']= $row['tipo_utilizador'];
            $_SESSION['id_utilizador']= $row['id_utilizador'];
            $_SESSION['nome']= $row['nome'];
            $_SESSION['email']= $row['email'];
            $_SESSION['telemovel']= $row['telemovel'];
            $_SESSION['morada']= $row['morada'];
            $_SESSION['pass']= $row['pass'];
            header("Location: perfil.php");
            exit();
        } elseif ($row['tipo_utilizador'] <= 0) {
            echo '<link rel="stylesheet" href="bootstrap.css">
                <div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Erro!</strong> <a href="loginformulario.php" class="alert-link">Utilizador inválido
            </div>';
        } else {
            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Erro!</strong> <a href="loginformulario.php" class="alert-link">Credenciais incorretas</div>';
        }
    }
}else{
    header("Location: Erro.php");
}
?>
