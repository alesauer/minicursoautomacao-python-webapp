<?php
 include('sessao.php');
  // Conexão com o banco de dados
  $servername = "127.0.0.1"; // Endereço do servidor MySQL
  $username = "root"; // Nome de usuário do MySQL
  $password = "root"; // Senha do MySQL
  $dbname = "simplifica_python_db"; // Nome do banco de dados


   // Cria a conexão
   $conn = new mysqli($servername, $username, $password, $dbname);


    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

  

  // Consulta SQL para verificar as credenciais
  $sql = "delete FROM alunos";
  $result = $conn->query($sql);
header("Location:principal.php");
exit;

?>