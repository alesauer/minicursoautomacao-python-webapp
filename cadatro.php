<?php
// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos necessários estão preenchidos
    if (isset($_POST["text"]) && isset($_POST["email"]) && isset($_POST["endereco"]) && isset($_POST["telefone"])) {
        // Recupera os valores dos campos do formulário
        $nome = $_POST["text"];
        $email = $_POST["email"];
        $endereco = $_POST["endereco"];
        $telefone = $_POST["telefone"];
        
        // Aqui você pode realizar as operações de cadastro no banco de dados, envio de e-mail, etc.
        
        // Exemplo de exibição dos dados cadastrados
        echo "<h2>Dados Cadastrados:</h2>";
        echo "<p><strong>Nome:</strong> $nome</p>";
        echo "<p><strong>E-mail:</strong> $email</p>";
        echo "<p><strong>Endereço:</strong> $endereco</p>";
        echo "<p><strong>Telefone:</strong> $telefone</p>";
    } else {
        echo "<p>Por favor, preencha todos os campos do formulário.</p>";
    }
}
?>
