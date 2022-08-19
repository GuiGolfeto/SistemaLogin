<?php
include('../server/conexao.php');


if (isset($_POST['emailUser']) || isset($_POST['senhaUser'])) {
    
    $nameUser = $_POST['nameUser'];
    $senhaUser = $_POST['senhaUser'];
    $emailUser = $_POST['emailUser'];

    if (strlen($_POST['emailUser']) == 0) {
        echo "Preencha seu email";
    }else if (strlen($_POST['senhaUser']) == 0) {
        echo "Preencha sua senha";
    }else if (strlen($_POST['nameUser']) == 0) {
        echo "Preencha seu nome";
    }else {
        $sql_insert = "INSERT INTO usuarios(nome, email, senha) VALUES ('$nameUser', '$emailUser', '$senhaUser')";
        $sql_query = $mysqli->query($sql_insert) or die("Falha na execução do codigo SQL: " . $mysqli->error);
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/index.css">
    <title>Cadastro</title>
</head>
<body>
    <form method="POST" action="">
        <div class="container">
            <div class="section-one">
            <div class="social-links">
                <div class="facebook">
                <span>Registrar com o facebook</span>
                <div class="icon">
                    <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><img src="../assets/facebookLogo.svg" alt="Facebook Logo" /></a>
                </div>
                </div>
                <div class="twitter">
                <div class="icon">
                    <a href="https://www.linkedin.com/" target="_blank" rel="noopener noreferrer"><img src="../assets/linkedinLogo.svg" alt="Twitter Logo" /></a>
                </div>
                <span>Registrar com Linkedin</span>
                </div>
            </div>
            <div class="main-form">
                <input type="text" name="nameUser" id="nameUser" placeholder="Nome Completo" required>
                <input type="email" name="emailUser" id="emailUser" placeholder="Email" required />
                <input type="password" name="senhaUser" id="senhaUser" placeholder="Senha" required />
            </div>
            </div>
            <div class="section-two">
                <a href="#"><button type="submit">Criar Nova Conta</button></a>
                <a href="../index.php" class="voltarLogin"><span>Voltar para Login</span></a>
            </div>
        </div>
    </form>
</body>
</html>