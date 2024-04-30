<!DOCTYPE html>
<?php include 'cabecalho.php'; ?>
<?php if (!empty($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] > 0) : ?>           
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded w-75">
            <div class="card-body">
                <h4 class="card-title text-center">Perfil</h4>
                As suas informações
                <br>
                <form id="form1" name="form1" method="post" action="editarPerfilformulario.php">
                    <div class="form-group">
                        <label for="username">ID de Utilizador:</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $_SESSION['id_utilizador']; ?>" readonly disabled>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="username">Nome de Utilizador:</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $_SESSION['nome']; ?>" readonly disabled>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" name="password" value="" readonly disabled>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="morada">Morada:</label>
                        <input type="text" class="form-control" name="morada" value="<?php echo $_SESSION['morada']; ?>" readonly disabled>
                    </div>
                    <br>
                    
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['email']; ?>" readonly disabled>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="telemovel">Telemóvel:</label>
                        <input type="tel" class="form-control" name="telemovel" value="<?php echo $_SESSION['telemovel']; ?>" readonly disabled>
                    </div>
                    <br>
                    <input type="submit" name="Submit" value="Editar" class="btn btn-primary"/><br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php else: header("Location:Erro.php");?>
    
<?php endif ?>
