<?php
include '../basedados/basedados.h';
session_start();
// Obter os dados do formulário
if (isset($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] >= 1){
    
    $id_curso = $_POST['id_curso'];
    $descricao = $_POST['descricao'];
    $id_utilizador = $_POST['id_utilizador'];

    $sql = "UPDATE inscricao SET descricao = '$descricao' WHERE id_utilizador = '$id_utilizador' AND id_curso = '$id_curso'";
    $result = mysqli_query($conn, $sql);

    if($_SESSION['tipo_utilizador'] >= 2){
        if ($result) {
            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong></strong> <a href="geririnscricoes.php" class="alert-link">Sucesso!!!</div>';
        } else {
            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong></strong> <a href="geririnscricoes.php" class="alert-link">Erro ao editar!!!</div>';
        }
    }
    else{
        if ($result) {
            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong></strong> <a href="inscricoes.php" class="alert-link">Sucesso!!!</div>';
        } else {
            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong></strong> <a href="inscricoes.php" class="alert-link">Erro ao editar!!!</div>';
        }
    }
    

}else{
    header("Location: Erro.php");
}
?>
