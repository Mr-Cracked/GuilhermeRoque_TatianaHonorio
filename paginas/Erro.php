<!DOCTYPE html>
<?php include 'cabecalho.php'; ?>        
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
                <h4 class="card-title text-center">Erro</h4>
                Ups!
                <br>
                <label for="Erro">Parece que houve um erro :( </label> <br> 
                <label for="Erro">Por favor volte à página inicial</label> <br> 
                <?php
                if(isset($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] > 0){
                    ?>
                    <a type="button" class="btn btn-primary" href="perfil.php">Voltar</button></a>
                    <?php
                }else{
                    ?>
                    <a type="button" class="btn btn-primary" href="index.php">Voltar</button></a>
                    <?php
                }
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>
