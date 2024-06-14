<?php
include '../basedados/basedados.h';
// Obter os dados do formulário
session_start();
if (isset($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] >= 1){
    if( $_SESSION['tipo_utilizador'] == 1){
        $id_curso = $_POST['id_curso'];
        $id_utilizador = $_SESSION['id_utilizador'];
        $descricao = $_POST['descricao'];

        //Inserir inscrição
        $sql = "INSERT INTO inscricao (id_curso, id_utilizador, descricao) VALUES ('$id_curso', '$id_utilizador', '$descricao')";
        $result = mysqli_query($conn, $sql);

        // Verificar se a Inserção foi bem-sucedida
        if ($result) {
            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong></strong> <a href="inscricoes.php" class="alert-link">Sucesso!!!</div>';
        } else {
            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong></strong> <a href="inscricaoformulario.php" class="alert-link">Erro!!!</div>';
        }
    }else{
        $id_curso = $_POST['curso'];
        $id_utilizador = $_POST['aluno'];
        $descricao = $_POST['descricao'];

         
        $sql = "SELECT * FROM inscricao WHERE id_curso = '$id_curso' AND id_utilizador = '$id_utilizador'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong></strong> <a href="AdicionarInscricaoFormulario.php" class="alert-link">JÁ EXISTE ESTA INSCRIÇÃO</div>';    
        }else{

            $sql = "INSERT INTO inscricao (id_curso, id_utilizador, descricao) VALUES ('$id_curso', '$id_utilizador', '$descricao')";
            $result = mysqli_query($conn, $sql);

            
            if ($result) {
                echo '<link rel="stylesheet" href="bootstrap.css">
                <div class="alert alert-dismissible alert-success">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong></strong> <a href="geririnscricoes.php" class="alert-link">Sucesso!!!</div>';
            } else {
                echo '<link rel="stylesheet" href="bootstrap.css">
                <div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong></strong> <a href="AdicionarInscricaoFormulario.php" class="alert-link">Erro!!!</div>';
            }
                    
        }
    }

    }else{
        header("Erro.jsp");
    }
?>
