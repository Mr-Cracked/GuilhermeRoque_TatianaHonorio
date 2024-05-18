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
            <form method="GET" action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="search" placeholder="Pesquisar Inscrições" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Pesquisar</button>
                        </div>
                    </div>
                </form>
                <?php if (!empty($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] >= 2) : ?>  
                    
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome do Aluno</th>
                                <th scope="col">ID Curso</th>
                                <th scope="col">Nome do Curso</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Aceitar</th>
                                <th scope="col">Eliminar</th>
                                <th scope="col">Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            $search = isset($_GET['search']) ? $_GET['search'] : '';
                            $searchQuery = $search ? "WHERE c.nome LIKE '%$search%'" : '';
                            if(isset($_GET['id'])){
                                $sql = "SELECT i.id_utilizador, u.nome AS nome_aluno, c.id_curso, c.nome AS nome_curso, c.descricao, i.estado 
                                    FROM inscricao i
                                    INNER JOIN utilizador u ON i.id_utilizador = u.id_utilizador
                                    INNER JOIN curso c ON i.id_curso = c.id_curso
                                    WHERE i.id_curso = '{$_GET['id']}'
                                    $searchQuery";
                            }else{
                                $sql = "SELECT i.id_utilizador, u.nome AS nome_aluno, c.id_curso, c.nome AS nome_curso, c.descricao, i.estado 
                                    FROM inscricao i
                                    INNER JOIN utilizador u ON i.id_utilizador = u.id_utilizador
                                    INNER JOIN curso c ON i.id_curso = c.id_curso
                                    $searchQuery";
                            }
                            

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
                                    <td><a href="aceitarInscricao.php?id=<?php echo $row['id_utilizador'] ?>&id_curso=<?php echo $row['id_curso'] ?>">Aceitar</a></td>
                                    <td><a href="eliminarInscricao.php?id=<?php echo $row['id_utilizador'] ?>&id_curso=<?php echo $row['id_curso'] ?>">Eliminar</a></td>
                                    <td><a href="visualizarInscricao.php?id=<?php echo $row['id_utilizador'] ?>&id_curso=<?php echo $row['id_curso'] ?>">Visualizar</a></td>
                                </tr>
                                <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                <?php else : header("Erro.php");?>
                    
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>