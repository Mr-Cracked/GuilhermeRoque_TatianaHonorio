<?php
include '../basedados/basedados.h';
session_start();
if (!empty($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] > 0){ 
// Obter os dados do formulário

$existepass = false;
if (!empty($_POST['password'])){
    $existepass = true;
    $senha_encriptada = md5($password = $_POST['password']);
}
$email = $_POST['email'];
$telemovel = $_POST['telemovel'];
$morada = $_POST['morada'];

    if($existepass){
        // Atualizar utilizador 
        $sql = "UPDATE utilizador SET password='$senha_encriptada', email='$email', telemovel='$telemovel', morada='$morada' WHERE nome='$_SESSION[nome]'";
        $result = mysqli_query($conn, $sql);

        // Verificar se a atualização foi bem-sucedida
        if ($result) {
            $_SESSION['email']= $email;
            $_SESSION['telemovel']= $telemovel;
            $_SESSION['morada']= $morada;
            $_SESSION['password']= $senha_encriptada;
            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong></strong> <a href="editarPerfilformulario.php" class="alert-link">Sucesso!!!</div>';
        } else {
            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong></strong> <a href="editarPerfilformulario.php" class="alert-link">Erro ao editar!!!</div>';
        }
    } else {
        // Atualizar utilizador 
        $sql = "UPDATE utilizador SET email='$email', telemovel='$telemovel', morada='$morada' WHERE nome='$_SESSION[nome]'";
        $result = mysqli_query($conn, $sql);

        // Verificar se a atualização foi bem-sucedida
        if ($result) {
            $_SESSION['email']= $email;
            $_SESSION['telemovel']= $telemovel;
            $_SESSION['morada']= $morada;
            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Erro!</strong> <a href="editarPerfilformulario.php" class="alert-link">Sucesso!!!</div>';
        } else {
            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Erro!</strong> <a href="editarPerfilformulario.php" class="alert-link">Erro ao editar!!!</div>';
        }
    }
}
else{
    header("Location:Erro.php");
}
?>
