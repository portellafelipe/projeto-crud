<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoa</title>
    <link rel="stylesheet" href="estiloLogin.css">
</head>
<body>
    <header>
        <nav class="barra_navegacao">
            <div class="container">
                <div class="logo">
                    <h1><a href="index.php">Smart Stock</a></h1>
                </div>
                <ul class="navegar_links">
                    <li><a href="">INÍCIO</a></li>
                    <li><a href="">SOBRE</a></li>
                    <li><a href="">FUNCIONAMENTO</a></li>
                    <li><a href="">GERENCIAR DISPENSA</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <!-- aq vai o login -->
         <div class="form-container">
            <h2>Login</h2>
            <form action="gravaLogin.php" method="post"> 
                <!-- email -->
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
                <!-- senha -->
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
                <div class="button">
                    <button type="submit">Login</button>

                </div>
            </form>
         </div>
        <div class="form-container">
            <h2>Cadastro</h2>
            <form action="gravaLogin.php" method="post"> 
                <!-- usuario-->
                <label for="cusuario">Usuário</label>
                <input type="text" id="cusuario" name="cusuario" required>
                <!-- email -->
                <label for="cemail">Email</label>
                <input type="email" id="cemail" name="cemail" required>
                <!-- senha -->
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="csenha" required>
                <div class="button">
                    <button type="submit">Cadastrar</button> <!-- Botão de cadastro -->
                </div>
                </form>
                
        </div>
    <?php 
    if (isset($_GET['msg'])) {
        echo "<div class='alert'>" . htmlspecialchars($_GET['msg']) . "</div>";
    }
    ?>
</body>