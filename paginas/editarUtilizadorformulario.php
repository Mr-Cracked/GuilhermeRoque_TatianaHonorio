<!DOCTYPE html>

<?php include 'cabecalho.php'; ?>
<?php if (!empty($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] == 3) : ?>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Utilizador</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    <?php
    include '../basedados/basedados.h';
    $sql = "SELECT * FROM utilizador WHERE nome=\"$_GET[nome]\"";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    ?>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded w-75">
            <div class="card-body">
                <h4 class="card-title text-center">Curso</h4>
                <br>
                <form id="form1" name="form1" method="post" action="editarUtilizador.php">
                    <div class="form-group">
                        <label for="nivelacesso">Nível de Acesso:</label>
                        <select class="form-control" name="nivelacesso">
                            <?php
                            // Opções do nível de acesso
                            $opcoesNivelAcesso = array(
                                "-1" => "Nível -1",
                                "0" => "Nível 0",
                                "1" => "Nível 1",
                                "2" => "Nível 2",
                                "3" => "Nível 3"
                            );

                            // Obtém o valor atual do nível de acesso
                            $nivelAcessoAtual = $row['tipo_utilizador'];

                            // Itera sobre as opções e as exibe
                            foreach ($opcoesNivelAcesso as $valor => $descricao) {
                                $selected = ($valor == $nivelAcessoAtual) ? "selected" : "";
                                echo "<option value=\"$valor\" $selected>$descricao</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="nome">Nome de Utilizador:</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $row['nome']; ?>" readonly>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="text" class="form-control" name="password" value="">
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="morada">Morada:</label>
                        <input type="text" class="form-control" name="morada" value="<?php echo $row['morada']; ?>" required>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="telemovel">Telemóvel:</label>
                        <input type="tel" class="form-control" name="telemovel" value="<?php echo $row['telemovel']; ?>" required>
                    </div>
                    <br>
                    <input type="submit" name="Submit" value="Guardar" class="btn btn-primary"/>
                    <a type="button" class="btn btn-danger" href="utilizadores.php">Cancelar</a>
                    <br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php else: header("Location:Erro.php");?>

<?php endif ?>
