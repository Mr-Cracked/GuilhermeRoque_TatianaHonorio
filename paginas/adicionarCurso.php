<?php
include '../basedados/basedados.h';
session_start();
if (isset($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] == 3){
    
    //feito para saber quantos docentes foram inseridos ao todo
    $docentes = $_POST['docentes'];

    $nome = $_POST['nome'];
    $vagas = $_POST['vagas'];
    $descricao = $_POST['descricao'];
    $datainic = $_POST['datainic'];
    $datafim = $_POST['datafim'];
    $metodo = $_POST['metodo'];

    if($datafim <= $datainic) {
        echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-danger ">
            <button type="button" class="btn-close " data-bs-dismiss="alert"></button>
            <strong>Erro!</strong> <a href="adicionarCursoformulario.php" class="alert-link">As datas têm de ser válidas!!!</div>';
    }

    else if(count($docentes) <= 0 || empty($docentes)){

        echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-danger ">
            <button type="button" class="btn-close " data-bs-dismiss="alert"></button>
            <strong>Erro!</strong> <a href="adicionarCursoformulario.php" class="alert-link">Insira docente(s)!!!</div>';

    }else{

        $sql = "SELECT * FROM curso WHERE nome = '$nome'";
        $result = mysqli_query($conn, $sql);

        if(!$result){

            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Erro!</strong> <a href="adicionarCursoformulario.php" class="alert-link">Curso já existe!!!</div>';

        }else{

            $sql = "INSERT INTO curso (nome,descricao,vagas,data_inicio,data_fim,metodo_selecao) VALUES('$nome', '$descricao','$vagas','$datainic','$datafim','$metodo')";
            $result = mysqli_query($conn, $sql);

            if($result){
                $sql = "SELECT * FROM curso WHERE nome = '$nome'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result); 
                for($i = 0; $i < count($docentes) ;$i++){
                    $sql2 = "INSERT INTO leciona(id_utilizador, id_curso) VALUES('$docentes[$i]','". $row['id_curso'] ."')";
                    $result2 = mysqli_query($conn, $sql2);
                }

                echo '<link rel="stylesheet" href="bootstrap.css">';
                echo '<div class="alert alert-dismissible alert-success">';
                echo '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>';
                echo '<strong>Alerta!</strong> <a href="cursos.php" class="alert-link">Sucesso!!!</a></div>';
                
            }else{
                echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong></strong> <a href="adicionarCursoformulario.php" class="alert-link">Erro ao inserir!!!</div>';
                
            }
            
        }
        
    }
}else{
    header("Location: Erro.php");
}
?>
