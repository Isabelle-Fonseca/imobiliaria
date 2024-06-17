<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Processando formulário...<br>";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "imobiliaria";

    // Estabelecendo a conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificando a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    echo "Conexão bem-sucedida!<br>";

    // Capturando os dados do formulário
    $tipo = $_POST["tipo"];
    $transacao = $_POST["transacao"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];

    // Inserindo os dados no banco de dados
    $sql = "INSERT INTO imoveis (tipo, transacao, descricao, preco) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssd", $tipo, $transacao, $descricao, $preco);

    if ($stmt->execute()) {
        // Cadastro bem-sucedido, redirecione ou atualize a página aqui
        echo "Imóvel cadastrado com sucesso!<br>";
        // header("Location: " . $_SERVER["HTTP_REFERER"]);
        // exit();
    } else {
        // Se ocorrer um erro durante a execução do SQL
        echo 'Erro ao cadastrar o imóvel: ' . $conn->error;
    }

    $stmt->close();
    $conn->close();
}

?>

