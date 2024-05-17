<!DOCTYPE html>
<?php include 'cabecalho.php'; ?>
<?php if (!empty($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] > 0) : ?>           
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrição</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded w-75">
            <div class="card-body">
                <h4 class="card-title text-center">Inscrição</h4>

                <br>
                <form id="form1" name="form1" method="post" action="visualizarInscricao.php">
                    <div class="form-group">
                        <label for="username">Curso:</label>
                        <input type="text" class="form-control" name="username" value="<?php echo isset($_SESSION['nome']) ? $_SESSION['nome'] : ''; ?>" readonly disabled>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="username">Nome de Utilizador:</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $_SESSION['nome']; ?>" readonly disabled>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <input type="text" class="form-control" name="descricao" value="<?php echo $_SESSION['descricao']; ?>" readonly disabled>
                    </div>

                    <br>
            
                    <input type="submit" name="Submit" value="Aceitar" class="btn btn-primary"/>
                    <a type="button" class="btn btn-danger" href="perfil.php">Eliminar</button></a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php else: header("Location:Erro.php");?>
    
<?php endif ?>
