<?php
include '../basedados/basedados.h';

// Obter os dados do formulário
session_start();
$existepass = false;
if (!empty($_POST['password'])){
    $existepass = true;
    $senha_encriptada = md5($password = $_POST['password']);
}
$nivel = $_POST['nivelacesso'];
$email = $_POST['email'];
$telemovel = $_POST['telemovel'];
$morada = $_POST['morada'];
$nome = $_POST['nome'];
$id_utilizador = $_POST['id_utilizador'];

    if($existepass){
        // Atualizar utilizador 
        $sql = "UPDATE utilizador SET nome='$nome', password='$senha_encriptada', email='$email', telemovel='$telemovel', morada='$morada', tipo_utilizador='$nivel' WHERE id_utilizador='$id_utilizador'";
        $result = mysqli_query($conn, $sql);

        // Verificar se a atualização foi bem-sucedida
        if ($result) {
            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong></strong> <a href="utilizadores.php" class="alert-link">Sucesso!!!</div>';
        } else {
            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong></strong> <a href="editarUtilizadorformulario.php" class="alert-link">Erro ao editar!!!</div>';
        }
    } else {
        // Atualizar utilizador 
        $sql = "UPDATE utilizador SET nome='$nome', email='$email', telemovel='$telemovel', morada='$morada', tipo_utilizador='$nivel' WHERE id_utilizador='$id_utilizador'";
        $result = mysqli_query($conn, $sql);

        // Verificar se a atualização foi bem-sucedida
        if ($result) {
            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong></strong> <a href="utilizadores.php" class="alert-link">Sucesso!!!</div>';
        } else {
            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Erro!</strong> <a href="editarUtilizadorformulario.php" class="alert-link">Erro ao editar!!!</div>';
        }
    }
?>
