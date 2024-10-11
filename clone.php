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
    <title>Painel do Usuário</title>
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
            </ul>
        </div>
    </nav>
</header>

<section class="hero">
    <div class="container">
        <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</h1>
        <p>Aqui estão suas informações:</p>
        
        <h2>Informações do Usuário</h2>
        <p><strong>Nome de Usuário:</strong> <?php echo htmlspecialchars($_SESSION['nome']); ?></p>
        <!-- Adicione mais informações aqui, como email, etc. -->
        
        <a href="logout.php" class="btn">Sair</a>
    </div>
</section>

<footer>
    <div class="container">
        <p>&copy; 2024 Smart Stock. Todos os direitos reservados.</p>
    </div>
</footer>

</body>
</html>
