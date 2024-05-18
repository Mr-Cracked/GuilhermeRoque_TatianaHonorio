<!DOCTYPE html>
<?php include 'cabecalho.php'; ?>
<?php if (isset($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] >= 2) : ?>         
<?php include '../basedados/basedados.h';?>  
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrição</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    <?php
        $sql = "SELECT c.nome AS nomeUti, u.nome AS nomeCurso, u.id_utilizador, c.id_curso, i.descricao AS descricao
        FROM inscricao i 
        INNER JOIN utilizador u ON u.id_utilizador=i.id_utilizador 
        INNER JOIN curso c ON c.id_curso = i.id_curso";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    ?>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded w-75">
            <div class="card-body">
                <h4 class="card-title text-center">Inscrição</h4>

                <br>
                <form id="form1" name="form1" method="post" action="aceitarInscricao.php">
                    <div class="form-group">
                        <label for="username">Curso:</label>
                        <input type="text" class="form-control" name="curso" value="<?php echo $row['nomeCurso']; ?>" readonly disabled>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="username">Nome de Utilizador:</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $row['nomeUti']; ?>" readonly disabled>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <input type="text" class="form-control" name="descricao" value="<?php echo $row['descricao']; ?>" readonly disabled>
                    </div>

                    <br>
            
                    <input type="submit" name="Submit" value="Aceitar" class="btn btn-primary"/>
                    <a type="button" class="btn btn-danger" href="eliminarInscricao.php">Eliminar</button></a>
                    <a type="button" class="btn btn-secondary" href="gerirInscricoes.php">Voltar</button></a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php else: 
    header("Location:Erro.php");?>
<?php endif ?>
