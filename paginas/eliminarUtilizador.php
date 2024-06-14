<?php
session_start();
if (isset($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] == 3) {
    include '../basedados/basedados.h';



    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $sql_curso = "SELECT id_curso, COUNT(id_curso) as inscricoes FROM inscricao WHERE id_utilizador = '$id' AND estado = 1 GROUP BY id_curso";
        $result_curso = mysqli_query($conn, $sql_curso);

        $sql = "DELETE FROM utilizador WHERE id_utilizador = '$id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            

            if ($result) {

                while ($row = mysqli_fetch_assoc($result_curso)) {
                    $id_curso = $row['id_curso'];
                    $inscricoes = $row['inscricoes'] == 0 ? 0: $row['inscricoes'];

                    $sql = "UPDATE curso SET vagas_preenchidas = vagas_preenchidas - '$inscricoes' WHERE id_curso = '$id_curso'";
                    $result = mysqli_query($conn, $sql);
                }

                if ($result) {
                    echo '<link rel="stylesheet" href="bootstrap.css">
                    <div class="alert alert-dismissible alert-success">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Alerta!</strong> <a href="utilizadores.php" class="alert-link">Sucesso!!!</a></div>';
                } else {
                    echo '<link rel="stylesheet" href="bootstrap.css">
                    <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Erro!</strong> <a href="utilizadores.php" class="alert-link">Erro Parcial ao atualizar as vagas preenchidas!!!</a></div>';
                }
            } else {
                echo '<link rel="stylesheet" href="bootstrap.css">
                <div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Erro!</strong> <a href="utilizadores.php" class="alert-link">Erro ao obter as inscrições!!!</a></div>';
            }
        } else {
            echo '<link rel="stylesheet" href="bootstrap.css">
            <div class="alert alert-dismissible alert-danger">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Erro!</strong> <a href="utilizadores.php" class="alert-link">Erro ao deletar o utilizador!!!</a></div>';
        }
    } else {
        header("Location: Erro.php");
        exit();
    }
} else {
    header("Location: Erro.php");
    exit();
}
?>
