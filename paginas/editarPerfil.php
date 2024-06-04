<?php
include '../basedados/basedados.h';
session_start();
if (isset($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] > 0){ 
// Obter os dados do formulário


if (!empty($_POST['pass'])){
    $existepass = true;
    $senha_encriptada = md5($pass = $_POST['pass']);
}else{
    $existepass = false;
}
$nome = $_POST['username'];
$email = $_POST['email'];
$telemovel = $_POST['telemovel'];
$morada = $_POST['morada'];

    if($existepass){
        // Atualizar utilizador 
        $sql = "UPDATE utilizador SET nome='$nome',pass='$senha_encriptada', email='$email', telemovel='$telemovel', morada='$morada' WHERE id_utilizador='$_SESSION[id_utilizador]'";
        $result = mysqli_query($conn, $sql);

        // Verificar se a atualização foi bem-sucedida
        if ($result) {
            $_SESSION['nome']= $nome;
            $_SESSION['email']= $email;
            $_SESSION['telemovel']= $telemovel;
            $_SESSION['morada']= $morada;
            $_SESSION['pass']= $senha_encriptada;
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
        $sql = "UPDATE utilizador SET nome='$nome',email='$email', telemovel='$telemovel', morada='$morada' WHERE id_utilizador='$_SESSION[id_utilizador]'";
        $result = mysqli_query($conn, $sql);

        // Verificar se a atualização foi bem-sucedida
        if ($result) {
            $_SESSION['nome']= $nome;
            $_SESSION['email']= $email;
            $_SESSION['telemovel']= $telemovel;
            $_SESSION['morada']= $morada;
            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong></strong> <a href="perfil.php" class="alert-link">Sucesso!!!</div>';
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
