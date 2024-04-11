<!DOCTYPE html>
<?php include 'cabecalho.php'; include '../basedados/basedados.h';?>
<?php  $sql = "SELECT c.*
            FROM curso c
            WHERE NOT EXISTS (
                SELECT 1
                FROM inscricao i
                WHERE i.id_curso = c.id_curso
                AND i.nome = '{$_SESSION['nome']}'
            )";
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
                            <th scope="col">Vagas</th>
                            <th scope="col">Data de Início</th>
                            <th scope="col">Data de Conclusão</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Iterar sobre os resultados da consulta e exibir os cursos na tabela
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr class="table-active">
                                <th scope="row"><?php echo $row['nome']; ?></th>
                                <td><?php echo $row['vagas']; ?></td>
                                <td><?php echo $row['data_inicio']; ?></td>
                                <td><?php echo $row['data_fim']; ?></td>
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
