<?php session_start(); 
    if (isset($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] >= 1) : ?>  
<?php
include '../basedados/basedados.h';

    if (isset($_GET['id_curso'])) {
        if($_SESSION['tipo_utilizador'] == 1){
            $id_utilizador = $_SESSION['id_utilizador'];
        }else{
            $id_utilizador = $_GET['id'];
        }
       
        $idCurso = $_GET['id_curso'];

        $sql = "SELECT estado FROM inscricao WHERE id_utilizador = '$id_utilizador' AND id_curso = '$idCurso'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if($row['estado'] == 1){
            $sql = "DELETE FROM inscricao WHERE id_utilizador = '$id_utilizador' AND id_curso = '$idCurso'";
            $result = mysqli_query($conn, $sql);

            $sql = "UPDATE curso SET vagas_preenchidas = vagas_preenchidas -1 WHERE id_curso = '$idCurso'";
            $result = mysqli_query($conn, $sql);

            if($result){
                echo '<link rel="stylesheet" href="bootstrap.css">
                    <div class="alert alert-dismissible alert-success">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Alerta!</strong> <a href="cursos.php" class="alert-link">Sucesso!!!</a></div>';
            }else{
                echo '<link rel="stylesheet" href="bootstrap.css">
                    <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong></strong> <a href="cursos.php" class="alert-link">Erro ao dar Delete!!!</div>';
            }
        }else{
            $sql = "DELETE FROM inscricao WHERE id_utilizador = '$id_utilizador' AND id_curso = '$idCurso'";
            $result = mysqli_query($conn, $sql);

            if($result){
                echo '<link rel="stylesheet" href="bootstrap.css">
                    <div class="alert alert-dismissible alert-success">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Alerta!</strong> <a href="cursos.php" class="alert-link">Sucesso!!!</a></div>';
            }else{
                echo '<link rel="stylesheet" href="bootstrap.css">
                    <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong></strong> <a href="cursos.php" class="alert-link">Erro ao dar Delete!!!</div>';
            }
        }
        
    }
?>
<?php else: 
    header("Location:Erro.php");
?>
<?php endif ?>
