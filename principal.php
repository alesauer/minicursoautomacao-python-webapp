<?php
// include('sessao.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Simplifica Python</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .custom-form {
            max-width: 500px; /* Set the maximum width for the form */
            margin: 0 auto; /* Center the form horizontally */
        }

        .centered-image {
            display: block;
            margin: 0 auto;
            width: 8%; /* Set the width of the image */
        }


    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Simplifica</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="principal.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="del.php">Apagar Base</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sair.php">Sair</a>
      </li>
    </ul>
  </div>
</nav>
















    <h1 style="text-align: center;">Cadastro de Alunos no Curso Simplifica Python</h1>
    
    <img src="simplifica.jpg" class="centered-image" alt="Logo Simplifica Python" style="width: 100px; height: auto;">

    <form action="cadastro.php" method="post" class="custom-form">    
        <div class="form-group">
            <label for="text">Nome do Cliente:</label> 
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-address-book"></i>
                    </div>
                </div> 
                <input id="text" name="text" placeholder="Digite o nome do Cliente" type="text" required="required" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label> 
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-send"></i>
                    </div>
                </div> 
                <input id="email" name="email" placeholder="Endereço de e-mail" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="endereco">Endereço:</label> 
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fa fa-home"></i>
                    </div>
                </div> 
                <input id="endereco" name="endereco" placeholder="Endereço" type="text" class="form-control">
            </div>
        </div>
      <div class="form-group">
        <label for="telefone">Telefone:</label> 
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-phone"></i>
            </div>
          </div> 
          <input id="telefone" name="telefone" placeholder="Telefone de contato" type="text" class="form-control">
        </div>
      </div> 
      <div class="form-group">
        <button name="submit" type="submit" class="btn btn-primary">Cadastrar</button>
      </div>
    </form>


    <div class="container">
        <h2>Dados dos Alunos Cadastrados</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexão com o banco de dados
                $servername = "127.0.0.1";
                $username = "root";
                $password = "GxgLTr2010";
                $dbname = "simplifica_python_db";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
                }

                // Consulta SQL para selecionar todos os alunos
                $sql = "SELECT nome, email, endereco, telefone FROM alunos ORDER BY id desc";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Exibe os dados em cada linha da tabela
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["nome"]. "</td><td>" . $row["email"]. "</td><td>" . $row["endereco"]. "</td><td>" . $row["telefone"]. "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nenhum aluno cadastrado</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>






  </body>
</html>
