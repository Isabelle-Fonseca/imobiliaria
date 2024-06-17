<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Imobiliária Alpha</title>
</head>
<body>
<section class="bg">
    <div class="container-txt">
        <div class="titulo">
            <h1>Imobiliária Alpha <br> <span>Seu Sonho, Nosso Compromisso!</span></h1>
        </div>
        <div class="txt">
            <p>Somos a <span class="color">Imobiliária Alpha</span>, uma imobiliária dedicada a encontrar o imóvel perfeito para você. Trabalhamos com casas, apartamentos, terrenos para venda e aluguel. Nossa missão é ajudar nossos clientes a realizar seus sonhos, seja na compra ou no aluguel de um imóvel.</p>
        </div>
    </div>
    <div class="container">
        <section class="header">
            <h2>Cadastro de Imóveis</h2>
        </section>
        <form method="POST" enctype="multipart/form-data" id="form" class="form" action="processa_cadastro.php">
            <div class="form-content">
                <label for="tipo">Tipo de Imóvel</label>
                <select id="tipo" name="tipo" required>
                    <option value="">Selecionar Categoria</option>
                    <option value="casa">Casa</option>
                    <option value="apartamento">Apartamento</option>
                    <option value="terreno">Terreno</option>
                    <option value="outros">Outros</option>
                </select>
                <span id="tipo-error">Aqui vai a mensagem de erro...</span>
            </div>
            <div class="form-content">
                <label for="transacao">Tipo de Transação</label>
                <select id="transacao" name="transacao" required>
                    <option value="">Selecionar Transação</option>
                    <option value="venda">Venda</option>
                    <option value="aluguel">Aluguel</option>
                </select>
                <span id="transacao-error">Aqui vai a mensagem de erro...</span>
            </div>
            <div class="form-content c-flex">
                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao" rows="4" placeholder="Descreva o imóvel..." required></textarea>
                <span id="descricao-error">Aqui vai a mensagem de erro...</span>
            </div>
            <div class="form-content">
                <label for="preco">Preço</label>
                <input type="number" id="preco" name="preco" step="0.01" placeholder="Digite o preço..." required>
                <span id="preco-error">Aqui vai a mensagem de erro...</span>
            </div>
            <button type="submit" id="btn-cadastrar">Cadastrar Imóvel</button>
        </form>
    </div>
</section>
<div id="link-container" style="display: none;" >
    <a href="listar.php" id="link-listar">Ver lista de imóveis cadastrados</a>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var btnCadastrar = document.getElementById('btn-cadastrar');

        btnCadastrar.addEventListener('click', function(event) {
            event.preventDefault();
            var linkContainer = document.getElementById('link-container');
            linkContainer.style.display = 'block'; // Exibir a âncora
        });
    });

    document.getElementById('form').addEventListener('submit', function(event) {
    event.preventDefault();
    var form = event.target;
    var formData = new FormData(form);

    fetch('processa_cadastro.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(responseText => {
        if (responseText === 'success') {
            // Cadastro bem-sucedido, exiba o botão para visualizar a lista de imóveis cadastrados
            document.getElementById('link-listar').style.display = 'block';
        } else {
            alert('Erro ao cadastrar o imóvel.');
        }
    })
    .catch(error => {
        console.error('Erro:', error);
    });
});
</script>
<!-- <script src="js/script.js"></script> -->
</body>
</html>
