<?php
include '../basedados/basedados.h';

// Obter os dados do formulário

$id = $_GET['id_curso'];
$nome = $_GET['nome'];
$descricao = $_GET['descricao'];
$vagas = $_GET['vagas'];
$data_inic = $_GET['data_inic'];
$data_fim = $_GET['data_fim'];

        // Atualizar Curso 
        $sql = "UPDATE curso SET nome='$nome', descricao='$descricao', vagas='$vagas', data_inicio='$data_inic', data_fim='$data_fim' WHERE id_curso='$id'";
        $result = mysqli_query($conn, $sql);

        // Verificar se a atualização foi bem-sucedida
        if ($result) {
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
?>
