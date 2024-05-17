<?php
include '../basedados/basedados.h';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE inscricao SET estado = -1 WHERE id_utilizador = ?";
    
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            header("Location: gerirInscricoes.php");
            exit();
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
