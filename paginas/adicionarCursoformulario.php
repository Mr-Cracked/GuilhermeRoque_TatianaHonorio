<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Registo</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
    <?php include 'cabecalho.php'; ?>
    <div class="container mt-5">
        <div class="card shadow-lg p-3 mb-5 bg-white rounded" style="max-width: 400px;">
            <div class="card-body">
                <h4 class="card-title text-center">Criar Curso</h4>
                <p>Insira as informações do Curso</p>
                <form id="form1" name="form1" method="post" action="registar.php">
                    <div class="form-group">
                        <label for="docente">Selecione o(s) Docente(s):</label>
                        <select class="form-control" name="docente" id="docenteSelect" multiple>
                            <?php
                            include '../basedados/basedados.h';

                            // Query para selecionar todos os utilizadores com tipo de utilizador = 2 (docentes)
                            $query = "SELECT id_utilizador, nome FROM utilizador WHERE tipo_utilizador = 2";
                            $result = mysqli_query($conn, $query);

                            // Itera sobre os resultados e cria as opções da dropdown
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value=\"{$row['id_utilizador']}\">{$row['nome']}</option>";
                            }

                            // Fecha a conexão com o banco de dados
                            mysqli_close($conn);
                            ?>
                        </select>
                    </div>

                    <div id="docentesSelecionados" class="form-group">
                        <label for="docentesSelecionados">Docentes Selecionados:</label>
                        <ul id="listaDocentes" class="list-group">
                            <!-- Aqui serão adicionados os docentes selecionados -->
                        </ul>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-primary" id="btnAdicionarDocente">Adicionar Docente</button>
                    </div>

                    <div class="form-group">
                        <label for="nome">Nome de Curso:</label>
                        <input type="text" class="form-control" name="nome" placeholder="Insira o nome" required>
                    </div>

                    <div class="form-group">
                        <label for="vagas">Vagas:</label>
                        <input type="number" class="form-control" name="vagas" placeholder="Insira as vagas" required>
                    </div>

                    <div class="form-group">
                        <label for="descricao">Descrição:</label>
                        <input type="text" class="form-control" name="descricao" placeholder="Insira a descricao" required>
                    </div>

                    <div class="form-group">
                        <label for="datainic">Data de Inicio:</label>
                        <input type="date" class="form-control" name="datainic" placeholder="Insira data de Inicio" required>
                    </div>

                    <div class="form-group">
                        <label for="datafim">Data de Finalização:</label>
                        <input type="date" class="form-control" name="datafim" placeholder="Insira data de Termino" required>
                    </div>

                    <div class="form-group">
                        <label for="metodo">Método de Seleção:</label>
                        <input type="text" class="form-control" name="metodo" placeholder="Insira o método de seleção" required>
                    </div>

                    <input type="submit" name="Submit" value="Registar" class="btn btn-primary"/><br>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Adiciona um docente à lista de docentes selecionados
        function adicionarDocente() {
            var select = document.getElementById('docenteSelect');
            var selectedOptions = select.selectedOptions;

            var listaDocentes = document.getElementById('listaDocentes');

            for (var i = 0; i < selectedOptions.length; i++) {
                var option = selectedOptions[i];

                var listItem = document.createElement('li');
                listItem.className = 'list-group-item';
                listItem.textContent = "Nome: " + option.text + " (ID: " + option.value + ")";

                listaDocentes.appendChild(listItem);
            }
        }

        // Event listener para o botão "Adicionar Docente"
        document.getElementById('btnAdicionarDocente').addEventListener('click', function() {
            adicionarDocente();
        });
    </script>
</body>
</html>
