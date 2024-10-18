<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['nome'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Stock</title>
    <link rel="icon" href="logo.png" type="image/png">
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

<header>
    <nav class="barra_navegacao">
        <div class="container">
            <div class="logo">
                <img src="logo.png" alt="Logo Smart Stock" class="logo-img">
                <h1><a href="index.php">Smart Stock</a></h1>
            </div>
            <ul class="navegar_links">
                <li><a href="index.php">INÍCIO</a></li>
                <li><a href="#sobre">SOBRE</a></li>
                <li><a href="#funcionamento">FUNCIONAMENTO</a></li>
                <li><a href="estoque.php">GERENCIAR DISPENSA</a></li>
                <li>
                    <a href="clone.php">Olá, <?php echo htmlspecialchars($_SESSION['nome']); ?></a>
                </li>
                <li>
                <a href="logout.php">
                    <img src="logoutt.png" alt="Sair" style="width: 25px; height: 25px;">
                </a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<section class="hero">
    <div class="container">
        <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</h1>
        <p>Gerencie sua dispensa com praticidade.</p>
    </div>
</section>


<section id="gerenciar-dispensa">
    <div class="container gerenciar-container">
        <div class="gerenciar-texto">
            <h2>Gerencie sua dispensa, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</h2>
            <p>Adicione novos produtos, atualize quantidades e monitore as datas de validade com facilidade. Receba alertas para evitar desperdícios e tenha sempre uma visão clara do que precisa ser usado ou reposto.</p>
            <a href="estoque.php" class="btn">Acessar Dispensa</a>
        </div>
        <div class="gerenciar-imagem">
            <img src="lista.webp" alt="Dispensa">
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <p>&copy; 2024 Smart Stock. Todos os direitos reservados.</p>
        <ul>
            <li><a href="index.php">Início</a></li>
            <li><a href="sobre.php">Sobre</a></li>
            <li><a href="funcionamento.php">Funcionamento</a></li>
            <li><a href="contato.php">Contato</a></li>
        </ul>
        <p>Email: <a href="mailto:contato@smartstock.com">contato@smartstock.com</a></p>
        <ul>
            <li><a href="politica-privacidade.php">Política de Privacidade</a></li>
            <li><a href="termos-uso.php">Termos de Uso</a></li>
        </ul>
        <div class="social-links">
            <p>Siga-nos nas redes sociais:</p>
            <a href="https://facebook.com" target="_blank">Facebook</a> |
            <a href="https://instagram.com" target="_blank">Instagram</a>
        </div>
    </div>
</footer>

</body>
</html>
