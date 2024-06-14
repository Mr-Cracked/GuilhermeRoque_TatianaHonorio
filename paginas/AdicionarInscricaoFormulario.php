<!DOCTYPE html>
<?php include 'cabecalho.php'?>
<?php if (isset($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] >= 2) : ?>  
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
                <h4 class="card-title text-center">Criar Inscrição</h4>
                <form id="form1" name="form1" method="post" action="inscricao.php">
                    <div class="form-group">
                        <label for="nome">Curso:</label>
                        <select class="form-control" name="curso" required>
                            <option value="" disabled selected>Selecione um curso</option>
                            <?php
                            // Consultar o banco de dados para obter os cursos
                            include '../basedados/basedados.h';
                            $queryCursos = "SELECT id_curso, nome FROM curso";
                            $resultCursos = mysqli_query($conn, $queryCursos);
                            while ($row = mysqli_fetch_assoc($resultCursos)) {
                                echo "<option value='{$row['id_curso']}'>{$row['nome']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="aluno">Aluno:</label>
                        <select class="form-control" name="aluno" required>
                            <option value="" disabled selected>Selecione um aluno</option>
                            <?php
                            
                            $sqlAlunos = "SELECT id_utilizador, nome FROM utilizador WHERE tipo_utilizador = 1";
                            $resultAlunos = mysqli_query($conn, $sqlAlunos);
                            while ($row = mysqli_fetch_assoc($resultAlunos)) {
                                echo "<option value='{$row['id_utilizador']}'>{$row['nome']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <input type="text" class="form-control" name="descricao" placeholder="Insira uma descrição" required>
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
