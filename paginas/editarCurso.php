<?php
include '../basedados/basedados.h';
session_start();
if (isset($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] == 3){
    $id = $_POST['id_curso'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $vagas = $_POST['vagas'];
    $data_inic = $_POST['data_inic'];
    $data_fim = $_POST['data_fim'];
    $metodo = $_POST['metodo'];

   

    if(empty($_POST['docentes'])){

        echo '<link rel="stylesheet" href="bootstrap.css">
        <div class="alert alert-dismissible alert-danger">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong></strong> <a href="cursos.php" class="alert-link">Insira docentes!!!</div>';
        
    }
    else if($data_fim <= $data_inic) {
        echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-danger ">
            <button type="button" class="btn-close " data-bs-dismiss="alert"></button>
            <strong>Erro!</strong> <a href="cursos.php" class="alert-link">As datas têm de ser válidas!!!</div>';
    }
    else{

        $sql = "SELECT * FROM curso WHERE nome = '$nome'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)>0){

            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Erro!</strong> <a href="cursos.php" class="alert-link">Curso já existe!!!</div>';

        }else{
            $docentes = $_POST['docentes'];
            $sql = "UPDATE curso SET nome='$nome', descricao='$descricao', vagas='$vagas', data_inicio='$data_inic', data_fim='$data_fim',metodo_selecao='$metodo' WHERE id_curso='$id'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $sql = "DELETE FROM leciona WHERE id_curso = '$id'";
                $result = mysqli_query($conn, $sql);
                for($i = 0; $i < count($docentes) ;$i++){
                    $sql = "INSERT INTO leciona(id_utilizador, id_curso) VALUES('$docentes[$i]','$id')";
                    $result = mysqli_query($conn, $sql);
                }
                echo '<link rel="stylesheet" href="bootstrap.css">
                <div class="alert alert-dismissible alert-success">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong></strong> <a href="cursos.php" class="alert-link">Sucesso!!!</div>';
            } else {
                echo '<link rel="stylesheet" href="bootstrap.css">
                <div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong></strong> <a href="cursos.php" class="alert-link">Erro ao editar!!!</div>';
            }
        }

        
    }
    }else{
        header("Location: Erro.php");
    }
?>
