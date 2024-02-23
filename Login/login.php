<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>Tela de login</title>
  <script defer src="app.js"></script>
  <script>
            fetch('navbar.html')
                .then(response => response.text())
                .then(navbarHTML => {
                    document.querySelector('header').innerHTML = navbarHTML;
                });
        </script>
</head>
<body>
  <header class="header">
    <nav class="nav">
      <a href="/" class="logo">M R Telles</a>
      <button class="hamburger"></button>
      <ul class="nav-list">
        <li><a href="../inicio/inicio.php">Início</a></li>
        <li><a href="#">Sobre</a></li>
        <li><a href="#">Serviços</a></li>
        <li><a href="#">Contato</a></li>
        <li><a href="../formulario-cadastro-cliente/formulario.php">Agende um horário</a></li>      
      </ul>
    </nav>
  </header>
  
  <!-- Botão de Login -->
  <button id="loginBtn">Login</button>
  
  <!-- Div de Login (inicialmente oculta) -->
  <div id="loginDiv">
    <button id="closeBtn">X</button> <!-- Botão "X" para fechar a div -->
    <h1>Login</h1> 
    <input type="text" placeholder="Digite seu nome de usuário">
    <br><br>
    <input type="password" name="senha" placeholder="Digite sua senha">
    <br><br>
    <button>Enviar</button>
  </div>

</body>
</html>
