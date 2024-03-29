<?php

     if(isset($_POST['submit']))
     {
    //     print_r('Nome:' . $_POST['nome']);
    //     print_r('<br>');
    //     print_r('Email:' . $_POST['email']);
    //     print_r('<br>');
    //     print_r('telefone' . $_POST['telefone']);
    //     print_r('<br>');
    //     print_r('Sexo:' . $_POST['genero']);
    //     print_r('<br>');
    //     print_r('Data de nascimento:' . $_POST['data_nascimento']);
    //     print_r('<br>');
    //     print_r('Cidade' . $_POST['cidade']);
    //     print_r('<br>');
    //     print_r('Estado' . $_POST['estado']);
    //     print_r('<br>');
    //     print_r('Endereço' . $_POST['endereco']);
        
        include_once('config.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $sexo = $_POST['genero'];
        $data_nasc =  $_POST['data_nascimento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,telefone,sexo,data_nasc,cidade,estado,endereco)
        VALUES ('$nome','$email','$telefone','$sexo','$data_nasc','$cidade','$estado','$endereco')");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fórmulário de cadastro</title>
    <link rel="stylesheet" href="formulario.css">
    <link rel="stylesheet" href="../navbar/nav.css">
    <script src="../navbar/nav.js" defer></script>
</head>
<body>
<?php include '../navbar/nav.html'; ?>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Fórmulário de cadastro de clientes</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div>
                <!-- Campos de entrada para email, telefone, sexo, data de nascimento, cidade, estado e endereço -->
                <!-- Os campos são obrigatórios com o atributo 'required' -->
                <div class="inputBox">
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="nome" class="labelInput">Telefone</label>
                </div>
                <br>
                <p>Sexo</p>
                <!-- Opções de seleção de gênero -->
                <!-- Cada opção está vinculada a um ID -->
                <input type="radio" name="genero" id="feminino" value="feminino" required>
                <label for="feminino">Feminino</label>
                <br>
                <input type="radio" name="genero" id="masculino" value="masculino" required>
                <label for="masculino">Masculino</label>
                <br>
                <input type="radio" name="genero" id="outro" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>
                    <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                    <input type="date" name="data_nascimento" id="data_nascimento"  required>               
                <br><br>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelInput">Endereço</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>
