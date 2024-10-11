<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Stock</title>
    <link rel="icon" href="logo.png" type="image/png">
    <link rel="icon" href="logo.png" type="image/png">
    <!-- colocar o link do css aq :) -->
    <link rel="stylesheet" href="estilo.css">
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
                    <?php if (isset($_SESSION['cusuario'])): ?>
                        <a href="dashboard.php">Olá, <?php echo $_SESSION['cusuario']; ?></a>
                    <?php else: ?>
                        <a href="login.php">LOGIN/CADASTRE-SE</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </nav>
</header>

    <!-- a parte do inicio, q vai colocar alguma img so pra dar uma ideia, nao é ainda o sobre-->
    <!-- a parte do inicio, q vai colocar alguma img so pra dar uma ideia, nao é ainda o sobre-->

    <section class="hero">
        <div class="container">
            <h1>Bem-vindo ao Smart Stock!</h1>
            <p>Gerencie sua dispensa de forma simples e eficaz. Com nosso sistema, você poderá controlar seu estoque de
                produtos, acompanhar datas de validade e evitar desperdícios. Tudo isso com uma interface intuitiva e
                fácil de usar. </p>
            <a href="login.php" class="btn">Acessar Sistema</a>
        </div>
    </section>

    <!-- a parte do Sobre -->
    <section id="sobre">
        <div class="container sobre-container">
            <!-- img, alinhar a esq ou dir-->
            <div class="sobre-imagem">
                <img src="lista2.jpg" alt="Imagem sobre o sistema">
            </div>
            <div class="sobre-texto">
                <h2>Sobre o Sistema</h2>
                <p>O Smart Stock é uma solução para o gerenciamento de despensas. Criado com o objetivo de
                    evitar aqueles esquecimentos comuns na hora de ir ao mercado, nosso sistema permite que você acesse
                    seu estoque de produtos a qualquer momento, diretamente da internet.</p>
                <p>Com uma interface intuitiva e fácil de usar, você pode cadastrar produtos, acompanhar
                    suas datas de validade e receber notificações para que nada fique para trás. O Smart Stock
                    transforma a forma como você organiza sua dispensa, tornando o dia a dia mais prático e eficiente.
                </p>
            </div>
        </div>
    </section>
    <!-- parte pra explicar o funcionamento-->
    <section id="funcionamento">
        <div class="container funcionamento-container">
            <h2>Como funciona:</h2>
            <div class="baloes">
                <div class="balao">
                    <h3>Cadastro de Produtos</h3>
                    <p> Organize sua dispensa de forma eficiente com o cadastro de produtos. Ao inserir itens novos,
                        você pode especificar o nome, categoria, quantidade e data de validade. Assim, fica mais fácil
                        controlar o que entra e o que sai, evitando desperdícios e garantindo que você sempre saiba o
                        que tem disponível em casa.</p>
                </div>
                <div class="balao">
                    <h3>Controle da Validade</h3>
                    <p>Nunca mais deixe produtos vencerem sem perceber. Nosso sistema de controle de validade avisa
                        quando itens estão prestes a expirar. Com essa funcionalidade, você otimiza o uso dos produtos,
                        priorizando aqueles que têm menor prazo de validade e reduzindo o desperdício de alimentos.</p>
                    <br>
                </div>
                <div class="balao">
                    <h3>Atualização de quantidade</h3>
                    <p>Mantenha-se informado com relatórios detalhados sobre o consumo da sua dispensa. Veja o histórico
                        de uso dos itens, identifique quais produtos têm mais rotatividade e tenha uma visão clara do
                        seu estoque. Assim, você pode planejar melhor suas compras e evitar a falta de itens essenciais.
                    </p> <br>
                </div>
            </div>
        </div>
    </section>

    <!-- parte do gerenciamento -->

    <section id="gerenciar-dispensa">
        <div class="container gerenciar-container">
            <div class="gerenciar-texto">
                <h2>Gerenciar dispensa</h2>
                <p>Com nossa ferramenta, você tem controle total da sua despensa. Adicione novos produtos, atualize
                    quantidades e monitore as datas de validade com facilidade. Receba alertas para evitar desperdícios
                    e tenha sempre uma visão clara do que precisa ser usado ou reposto.</p>
                <a href="estoque.php" class="btn">Acessa Dispensa</a>
            </div>
            <div class="gerenciar-imagem">
                <img src="lista.webp" alt="Dispensa">
            </div>
        </div>
    </section>

    <!--parte de baixo da pag-->
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