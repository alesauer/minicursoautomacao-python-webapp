<?php
// Configurações do banco de dados
$servername = "127.0.0.1"; // Endereço do servidor MySQL
$username = "root"; // Nome de usuário do MySQL
$password = "GxgLTr2010"; // Senha do MySQL
$dbname = "simplifica_python_db"; // Nome do banco de dados


// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos necessários estão preenchidos
    if (isset($_POST["text"]) && isset($_POST["email"]) && isset($_POST["endereco"]) && isset($_POST["telefone"])) {
        // Recupera os valores dos campos do formulário
        $nome = $_POST["text"];
        $email = $_POST["email"];
        $endereco = $_POST["endereco"];
        $telefone = $_POST["telefone"];
        
        // Conecta ao banco de dados
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Verifica se a conexão foi bem sucedida
        if ($conn->connect_error) {
            die("Falha na conexão com o banco de dados: " . $conn->connect_error);
        }
        
        // Prepara a consulta SQL para inserir os dados na tabela alunos
        $sql = "INSERT INTO alunos (nome, email, endereco, telefone) VALUES ('$nome', '$email', '$endereco', '$telefone')";
        
        // Executa a consulta e verifica se foi bem sucedida
        if ($conn->query($sql) === TRUE) {
         header("Location:principal.php");
        } else {
            echo "Erro ao cadastrar os dados: " . $conn->error;
        }
        
        // Fecha a conexão com o banco de dados
        $conn->close();
    } else {
        echo "<p>Por favor, preencha todos os campos do formulário.</p>";
    }
}
?>
