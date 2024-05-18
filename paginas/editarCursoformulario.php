<!DOCTYPE html>
<?php include 'cabecalho.php'?>
<?php if (isset($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] == 3) : ?>           
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
    $id_curso = $row['id_curso'];
    ?>

    <div class="container d-flex justify-content-center align-items-center mt-5" style="height: 110vh;">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded w-75 align-items-center ">
            <div class="card-body w-100">
                <h4 class="card-title text-center">Editar Curso</h4>
                <br>
                <form id="form1" name="form1" method="post" action="editarCurso.php">
                    <div class="form-group">
                        <label for="id_curso">ID:</label>
                        <input type="text" class="form-control" name="id_curso" value="<?php echo $row['id_curso'] ?>" required readonly>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $row['nome'] ?>" required>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="vagas">Vagas:</label>
                        <input type="number" class="form-control" name="vagas" value="<?php echo $row['vagas']?>" required>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <input type="text" class="form-control" name="descricao" value="<?php echo $row['descricao'] ?>" required>
                    </div>
                    <br>
                    
                    <div class="form-group">
                        <label for="data_inic">Data de ínicio:</label>
                        <input type="date" class="form-control" name="data_inic" value="<?php echo $row['data_inicio'] ?>" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="data_inic">Data de fim:</label>
                        <input type="date" class="form-control" name="data_fim" value="<?php echo $row['data_fim'] ?>" required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="metodo">Método de Seleção</label>
                        <input type="text" class="form-control" name="metodo" value="<?php echo $row['metodo_selecao'] ?>" required>
                    </div>
                    <br>
                    <div id="docentesSelectContainer">
                        <?php
                        // Consultar o banco de dados para obter os docentes
                        include '../basedados/basedados.h';
                        $sql = "SELECT u.id_utilizador, u.nome 
                            FROM utilizador u 
                            INNER JOIN leciona l ON u.id_utilizador = l.id_utilizador 
                            WHERE l.id_curso = '$id_curso'";

                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class='form-check'>";
                            echo "<input class='form-check-input' type='checkbox' name='docentes[]' value='{$row['id_utilizador']}' id='docente{$row['id_utilizador']}' checked=''>";
                            echo "<label class='form-check-label' for='docente{$row['id_utilizador']}'>{$row['nome']}</label>";
                            echo "</div>";
                        }
                        $sql = "SELECT u.id_utilizador, u.nome 
                            FROM utilizador u 
                            WHERE NOT EXISTS (
                                SELECT 1 FROM leciona l
                                WHERE l.id_curso = '$id_curso' AND u.id_utilizador = l.id_utilizador  
                            ) AND u.tipo_utilizador = 2";

                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class='form-check'>";
                            echo "<input class='form-check-input' type='checkbox' name='docentes[]' value='{$row['id_utilizador']}' id='docente{$row['id_utilizador']}'>";
                            echo "<label class='form-check-label' for='docente{$row['id_utilizador']}'>{$row['nome']}</label>";
                            echo "</div>";
                        }
                        ?>
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
