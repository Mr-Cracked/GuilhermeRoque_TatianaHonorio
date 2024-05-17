<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">Menu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav  nav nav-pills" >
                    <?php 
                    session_start();
                    if (isset($_SESSION['tipo_utilizador']) && $_SESSION['tipo_utilizador'] > 0){
                        switch ($_SESSION['tipo_utilizador']){
                            case '1':
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="perfil.php">Perfil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="cursos.php">Cursos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="inscricoes.php">Inscrições</a>
                                </li>
                                <?php
                                break;
                            case '2':
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="cursos.php">Curso</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="perfil.php">Perfil</a>
                                </li>
                                <?php
                                break;
                            case '3':
                                ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="perfil.php">Perfil</a>
                                </li>
                                  <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" 
                                    aria-haspopup="true" aria-expanded="false">Gerir</a>
                                      <div class="dropdown-menu">
                                          <a class="dropdown-item" href="cursos.php">Cursos</a>
                                          <a class="dropdown-item" href="utilizadores.php">Utilizadores</a>
                                      </div>
                                  </li>
                                <?php
                                break;
                        }
                    }
                    else{
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="cursos.php">Cursos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="informacoes.php">Informações</a>
                        </li>
                        <?php 
                    }
                    ?>
                </ul>
                <ul class="navbar-nav">
                    <?php 
                    if (!isset($_SESSION['tipo_utilizador'])): 
                    ?>
                        <li class="nav-item">
                            <a class="btn btn-secondary my-0 my-sm-0" href="registarformulario.php">Registar</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-secondary my-0 my-sm-0" href="loginformulario.php">Login</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="btn btn-secondary my-0 my-sm-0" href="sair.php">Sair</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
