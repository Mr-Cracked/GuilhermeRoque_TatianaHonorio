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
        <div class="card shadow-lg p-3 mb-5 bg-white rounded w-75 align-items-center ">
            <div class="card-body w-100 ">
                <h4 class="card-title text-center">Criar Curso</h4>
                <p>Insira as informações do Curso</p>
                <form id="form1" name="form1" method="post" action="adicionarCurso.php">
                    <div class="form-group">
                        <label for="nome">Nome de Curso:</label>
                        <input type="text" class="form-control" name="nome" placeholder="Insira o nome" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="vagas">Vagas:</label>
                        <input type="number" class="form-control" name="vagas" placeholder="Insira as vagas" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <input type="text" class="form-control" name="descricao" placeholder="Insira a descricao" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="datainic">Data de Inicio:</label>
                        <input type="date" class="form-control" name="datainic" placeholder="Insira data de Inicio" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="datafim">Data de Finalização:</label>
                        <input type="date" class="form-control" name="datafim" placeholder="Insira data de Termino" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="metodo">Método de Seleção:</label>
                        <input type="text" class="form-control" name="metodo" placeholder="Insira o método de seleção" required>
                    </div>
                    <br>
                    <div id="docentesSelectContainer">
                        <?php
                        // Consultar o banco de dados para obter os docentes
                        include '../basedados/basedados.h';
                        $query = "SELECT id_utilizador, nome FROM utilizador WHERE tipo_utilizador = 2";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class='form-check'>";
                            echo "<input class='form-check-input' type='checkbox' name='docentes[]' value='{$row['id_utilizador']}' id='docente{$row['id_utilizador']}'>";
                            echo "<label class='form-check-label' for='docente{$row['id_utilizador']}'>{$row['nome']}</label>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                    <br>
                    <input type="submit" name="Submit" value="Registar" class="btn btn-primary"/><br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php else: 
    header("Location:Erro.php");
?>
<?php endif ?>