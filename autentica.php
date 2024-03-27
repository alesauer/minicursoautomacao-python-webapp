<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validação dos dados do formulário
    $login = $_POST['login'];
    $senha = $_POST['senha'];

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
    $sql = "SELECT * FROM autentica WHERE login = '$login' AND senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
         session_name("alunos"); //Nome da secao que sera iniciada
         session_start(); //Inicializa a sess�o
         $_SESSION["login"] =  $login;
//         session_register("login");



        // Credenciais válidas, redireciona para a página de sucesso
        header("Location: principal.php");
        exit();
    } else {
        // Credenciais inválidas, redireciona de volta para a página de login
        header("Location: login.html");
        exit();
    }

    // Fecha a conexão
    $conn->close();
} else {
    // Se o formulário não foi submetido, redireciona para a página de login
    header("Location: login.html");
    exit();
}
?>
