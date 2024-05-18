<!DOCTYPE html>
<?php include 'cabecalho.php'?>
<?php if (isset($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] == 3) : ?>  
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Registo</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
   
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="max-width: 400px;">
            <div class="card-body">
                <h4 class="card-title text-center">Criar Utilizador</h4>
                Insira as suas informações
                <br>
                <form id="form1" name="form1" method="post" action="registar.php">
                <div class="form-group">
                        <label for="nivelacesso">Nível de Acesso:</label>
                        <select class="form-control" name="nivelacesso">
                            <?php
                            // Opções do nível de acesso
                            $opcoesNivelAcesso = array(
                                "-1" => "Eliminado",
                                "0" => "Por aceitar",
                                "1" => "Aluno",
                                "2" => "Docente",
                                "3" => "Administrador"
                            );

                            // Itera sobre as opções e as exibe
                            foreach ($opcoesNivelAcesso as $valor => $descricao) {
                                $selected = ($valor == 0) ? "selected" : "";
                                echo "<option value=\"$valor\" $selected>$descricao</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <br>  

                    <div class="form-group">
                        <label for="username">Nome de Utilizador:</label>
                        <input type="text" class="form-control" name="username" placeholder="Insira o seu utilizador" required>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Insira a sua password" required>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="username">Morada:</label>
                        <input type="text" class="form-control" name="morada" placeholder="Insira a sua morada" required>
                    </div>
                    <br>
                    
                    <div class="form-group">
                        <label for="username">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Insira o seu Email" required>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="username">Telemóvel:</label>
                        <input type="number" class="form-control" name="telemovel" placeholder="Insira o nº de telemóvel" required>
                    </div>
                    <br>
                    <input type="submit" name="Submit" value="registar" class="btn btn-primary"/><br>
                </form>
            </div>
        </div>
    </div>
</form>
</body>
</html>
<?php else: 
    header("Location:Erro.php");
?>
<?php endif ?>
