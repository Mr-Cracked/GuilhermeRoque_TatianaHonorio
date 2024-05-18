<!DOCTYPE html>

<?php include 'cabecalho.php'; ?>
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
    $sql = "SELECT * FROM curso WHERE id_curso=\"$_GET[id]\"";
    $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    ?>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded w-75">
            <div class="card-body">
                <h4 class="card-title text-center">Inscrição</h4>
                <br>
                <form id="form1" name="form1" method="post" action="inscricao.php">
                    <div class="form-group">
                        <label for="id_curso">ID de curso:</label>
                        <input type="text" class="form-control" name="id_curso" value="<?php echo $row['id_curso'] ?>" required readonly>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="nome">Nome do curso:</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $row['nome'] ?>" required readonly>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="nomealuno">Nome:</label>
                        <input type="text" class="form-control" name="nomealuno" value="<?php echo $_SESSION['nome']; ?>" required readonly>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <textarea type="text" class="form-control" name="descricao" required></textarea>
                    </div>
                    <br>
                    <input type="submit" name="Submit" value="Guardar" class="btn btn-primary"/>
                    <a type="button" class="btn btn-danger" href="cursos.php">Cancelar</button></a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php else: header("Location:Erro.php");?>
    
<?php endif ?>
