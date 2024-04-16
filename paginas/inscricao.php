<?php
include '../basedados/basedados.h';
// Obter os dados do formulário

$id = $_POST['id_curso'];
$nome = $_POST['nomealuno'];
$descricao = $_POST['descricao'];

        //Inserir inscrição
        $sql = "INSERT INTO inscricao (id_curso, nome, descricao) VALUES ('$id', '$nome', '$descricao')";
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
            <strong></strong> <a href="inscricaoformulario.php" class="alert-link">Erro ao editar!!!</div>';
        }
?>
