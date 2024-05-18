<?php 
include '../basedados/basedados.h';
session_start();  
if (isset($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] >= 2){

    if (isset($_GET['id']) && isset($_GET['id_curso'])) {
        $id = $_GET['id'];
        $idCurso = $_GET['id_curso'];
        $sql = "UPDATE inscricao SET estado = 1 WHERE id_utilizador = '$id' AND id_curso = '$idCurso'";
        $result = mysqli_query($conn, $sql);
        if($result){

            $sql = "UPDATE curso SET vagas_preenchidas = vagas_preenchidas + 1 WHERE id_curso = '$idCurso'";
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
                <strong></strong> <a href="cursos.php" class="alert-link">Erro ao dar Aceitar!!!</div>';
            }
        }else{
            echo '<link rel="stylesheet" href="bootstrap.css">
                <div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong></strong> <a href="cursos.php" class="alert-link">Erro ao dar Aceitar!!!</div>';
        }
    }else{
        echo '<link rel="stylesheet" href="bootstrap.css">
                <div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong></strong> <a href="cursos.php" class="alert-link">Erro ao dar Aceitar!!!</div>';
    }
?>
<?php }else{
    header("Location:Erro.php");
    }
?>

