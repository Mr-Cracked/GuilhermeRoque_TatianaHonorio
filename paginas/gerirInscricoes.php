<!DOCTYPE html>
<?php 
    include 'cabecalho.php'; 
    include '../basedados/basedados.h';
?>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="margin-top: 20px;">
            <div class="card-body">
                <?php if (!empty($_SESSION['tipo_utilizador']) && ($_SESSION['tipo_utilizador'] == 1 || $_SESSION['tipo_utilizador'] == 3)) : ?>  
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome do Aluno</th>
                                <th scope="col">ID Curso</th>
                                <th scope="col">Nome do Curso</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Estado</th>
                                <th scope="col"></th>
                                <?php if ($_SESSION['tipo_utilizador'] == 3) : ?>   
                                    <th scope="col">Aceitar</th>
                                    <th scope="col">Eliminar</th>
                                    <th scope="col">Visualizar</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT i.id_utilizador, u.nome AS nome_aluno, c.id_curso, c.nome AS nome_curso, c.descricao, i.estado 
                                    FROM inscricao i
                                    INNER JOIN utilizador u ON i.id_utilizador = u.id_utilizador
                                    INNER JOIN curso c ON i.id_curso = c.id_curso";

                            $result = mysqli_query($conn, $sql);
                            if (!$result) {
                                echo "Error: " . mysqli_error($conn);
                            } else {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                <tr class="table-active">
                                    <th scope="row"><?php echo $row['id_utilizador']; ?></th>
                                    <td><?php echo $row['nome_aluno']; ?></td>
                                    <td><?php echo $row['id_curso']; ?></td>
                                    <td><?php echo $row['nome_curso']; ?></td>
                                    <td><?php echo $row['descricao']; ?></td>
                                    <td><?php echo $row['estado']; ?></td>
                                    
                                    <?php if ($_SESSION['tipo_utilizador'] == 3) : ?>
                                        <td><a href="aceitarInscricao.php?id=<?php echo $row['id_utilizador']; ?>">Aceitar</a></td>
                                        <td><a href="eliminarInscricao.php?id=<?php echo $row['id_utilizador']; ?>">Eliminar</a></td>
                                        <td><a href="visualizarInscricao.php?id=<?php echo $row['id_utilizador']; ?>">Visualizar</a></td>
                                    <?php endif; ?>
                                </tr>
                                <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php if ($_SESSION['tipo_utilizador'] == 3) : ?>        
                        <a type="button" class="btn btn-primary" href="adicionarCursoformulario.php">Adicionar</a>
                    <?php endif; ?>
                <?php else : ?>
                    <p>Acesso negado. Por favor, faça login para ver esta página.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
