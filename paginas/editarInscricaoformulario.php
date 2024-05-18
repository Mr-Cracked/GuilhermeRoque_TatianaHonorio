<!DOCTYPE html>
<?php include 'cabecalho.php'?>
<?php if (isset($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] == 1) : ?>           
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    <?php
    include '../basedados/basedados.h';
    $sql = "SELECT c.nome AS nome_curso, i.descricao AS descricao, i.id_curso, i.id_utilizador 
                FROM inscricao i INNER JOIN curso c
                ON i.id_curso = c.id_curso
                WHERE i.id_utilizador = '{$_SESSION['id_utilizador']}'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);
    ?>

    <div class="container d-flex justify-content-center align-items-center mt-5" style="height: 80vh;">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded w-75 align-items-center ">
            <div class="card-body w-100">
                <h4 class="card-title text-center">Editar Inscrição</h4>
                <br>
                <form id="form1" name="form1" method="post" action="editarinscricao.php">
                    <div class="form-group">
                        <label for="id_curso">ID:</label>
                        <input type="text" class="form-control" name="id_curso" value="<?php echo $row['id_curso'] ?>" required readonly>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="nome">Nome do Curso:</label>
                        <input type="text" class="form-control" name="nome_curso" value="<?php echo $row['nome_curso'] ?>" required readonly>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="vagas">Id do Utilizador:</label>
                        <input type="text" class="form-control" name="id_utilizador" value="<?php echo $_SESSION['id_utilizador']; ?>" required readonly>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="vagas">Nome do utilizador:</label>
                        <input type="text" class="form-control" name="nome_utilizador" value="<?php echo $_SESSION['nome']; ?>" required readonly>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <textarea type="text" class="form-control" name="descricao" required><?php echo $row['descricao'] ?></textarea>
                    </div>
                    <br>
                    <input type="submit" name="Submit" value="Guardar" class="btn btn-primary"/>
                    <a type="button" class="btn btn-danger" href="inscricoes.php">Cancelar</button></a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php else: 
    header("Location:Erro.php");?>
<?php endif ?>