<!DOCTYPE html>
<?php include 'cabecalho.php'; include '../basedados/basedados.h';?>
<?php  $sql = "SELECT i.nome, c.nome, i.descricao, i.id_curso
                FROM inscricao i INNER JOIN curso c
                ON i.id_curso = c.id_curso
                WHERE i.nome = '{$_SESSION['nome']}'";
        $result = mysqli_query($conn, $sql);?>
<?php if (!empty($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] == 1) : ?>           
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
            <div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nome do curso</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Iterar sobre os resultados da consulta e exibir os cursos na tabela
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr class="table-active">
                                <th scope="row"><?php echo $row['nome']; ?></th>
                                <td><?php echo $row['descricao']; ?></td>
                                <td> <a href="editarInscricaoformulario.php?id=<?php echo $row['id_curso']; ?>">Editar</a></td>
                                <td> <a href="eliminarInscricaoformulario.php?id=<?php echo $row['id_curso']; ?>">Eliminar</a></td>

                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </body>
</html>
<?php else: header("Location:Erro.php");?>
    
<?php endif ?>
