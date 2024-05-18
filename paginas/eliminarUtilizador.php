<?php session_start(); 
    if (isset($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] == 3) : ?>  
<?php
include '../basedados/basedados.h';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "UPDATE utilizador SET tipo_utilizador = -1 WHERE id_utilizador = '$id'";
        
        $result = mysqli_query($conn, $sql);
        if($result){
            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Alerta!</strong> <a href="utilizadores.php" class="alert-link">Sucesso!!!</a></div>';
        }else{
            echo '<link rel="stylesheet" href="bootstrap.css">
                <div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong></strong> <a href="utilizadores.php" class="alert-link">Erro ao dar Delete!!!</div>';
        }
    }
?>
<?php else: 
    header("Location:Erro.php");
?>
<?php endif ?>