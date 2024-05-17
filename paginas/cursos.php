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
<?php if (!empty($_SESSION['tipo_utilizador']) && ($_SESSION['tipo_utilizador'] == 1 || $_SESSION['tipo_utilizador'] == 3)) : ?>  

<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded " style="margin-top: 20px;">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome do curso</th>
                            <th scope="col">Vagas</th>
                            <th scope="col">Vagas Preenchidas</th>
                            <th scope="col">Data de Início</th>
                            <th scope="col">Data de Conclusão</th>
                            <?php
                            if($_SESSION['tipo_utilizador'] == 3){
                                ?>   
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                                <th scope="col">Inscrições</th>
                                <?php      
                            } else {
                                ?>
                                <th scope="col">Inscrição</th>
                                <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($_SESSION['tipo_utilizador'] == 3){
                            $sql = "SELECT * FROM curso";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr class="table-active">
                                    <th scope="row"><?php echo $row['id_curso']; ?></th>
                                    <td><?php echo $row['nome']; ?></td>
                                    <td><?php echo $row['vagas']; ?></td>
                                    <td><?php echo $row['vagas_preenchidas']; ?></td>
                                    <td><?php echo $row['data_inicio']; ?></td>
                                    <td><?php echo $row['data_fim']; ?></td>
                                    <td><a href="editarCursoformulario.php?id=<?php echo $row['id_curso']; ?>">Editar</a></td>
                                    <td><a href="eliminarCursoformulario.php?id=<?php echo $row['id_curso']; ?>">Eliminar</a></td>
                                    <td><a href="gerirInscricoes.php?id=<?php echo $row['id_curso']; ?>">Inscrições</a></td>
                                </tr>
                                <?php
                            }
                        } else if($_SESSION['tipo_utilizador'] == 1){
                            $sql = "SELECT c.*
                                FROM curso c
                                WHERE NOT EXISTS (
                                    SELECT 1
                                    FROM inscricao i
                                    WHERE i.id_curso = c.id_curso
                                    AND i.id_utilizador = '{$_SESSION['id_utilizador']}') 
                                    AND c.vagas_preenchidas < c.vagas";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr class="table-active">
                                    <th scope="row"><?php echo $row['id_curso']; ?></th>
                                    <td><?php echo $row['nome']; ?></td>
                                    <td><?php echo $row['vagas']; ?></td>
                                    <td><?php echo $row['vagas_preenchidas']; ?></td>
                                    <td><?php echo $row['data_inicio']; ?></td>
                                    <td><?php echo $row['data_fim']; ?></td>
                                    <td><a href="inscricaoformulario.php?id=<?php echo $row['id_curso']; ?>">Inscrever-se</a></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                if($_SESSION['tipo_utilizador'] == 3){
                    ?>        
                    <a type="button" class="btn btn-primary" href="adicionarCursoformulario.php">Adicionar</a>
                    <?php             
                }?>
        
            </div>
        </div>
    </div>
</body>

<?php else: ?>
    <body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded " style="margin-top: 20px;">
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome do curso</th>
                            <th scope="col">Vagas</th>
                            <th scope="col">Vagas Preenchidas</th>
                            <th scope="col">Data de Início</th>
                            <th scope="col">Data de Conclusão</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                            $sql = "SELECT *
                                FROM curso ";
                                
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr class="table-active">
                                    <th scope="row"><?php echo $row['id_curso']; ?></th>
                                    <td><?php echo $row['nome']; ?></td>
                                    <td><?php echo $row['vagas']; ?></td>
                                    <td><?php echo $row['vagas_preenchidas']; ?></td>
                                    <td><?php echo $row['data_inicio']; ?></td>
                                    <td><?php echo $row['data_fim']; ?></td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<?php endif ?>
</html>