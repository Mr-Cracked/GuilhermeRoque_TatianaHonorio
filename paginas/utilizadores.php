<!DOCTYPE html>
<?php include 'cabecalho.php'; include '../basedados/basedados.h';?>
<?php  $sql = "SELECT * FROM utilizador";
        $result = mysqli_query($conn, $sql);?>
<?php if (!empty($_SESSION['tipo_utilizador']) &&  $_SESSION['tipo_utilizador'] == 3) : ?>           
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="bootstrap.css">
    

</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded " style="margin-top: 20px;">
            <div class="card-body">
            
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nível de Acesso</th> 
                            <th scope="col">Nome</th>
                            <th scope="col">Password</th>
                            <th scope="col">Morada</th>
                            <th scope="col">Email</th>
                            <th scope="col">Telemóvel</th> 
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Iterar sobre os resultados da consulta e exibir os cursos na tabela
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr class="table-active">
                                <th scope="row"><?php echo $row['tipo_utilizador']; ?></th>
                                <td><?php echo $row['nome']; ?></td>
                                <td><?php echo $row['password']; ?></td>
                                <td><?php echo $row['morada']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['telemovel']; ?></td>
                                <?php
                                echo "<td><a href=\"editarUtilizadorformulario.php?nome=". $row['nome']."\">Editar</a></td>";
                                echo "<td><a href=\"eliminarUtilizadorformulario.php?nome=". $row['nome']."\">Eliminar</a></td> ";
                                ?>
                                
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                    
                </table>
            
                <div style="display: flex; justify-content: center;"><a type="button" class="btn btn-primary" href="adicionarUtilizadorformulario.php">Adicionar</button></a> </div>
            </div>
        </div>
    </div>
        </body>
</html>
<?php else: header("Location:Erro.php");?>
    
<?php endif ?>
