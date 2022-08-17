<?php
include('../server/conexao.php');

$nameUser = $_POST['nameUser'];
$senhaUser = $_POST['senhaUser'];
$emailUser = $_POST['emailUser'];

if (isset($_POST['emailUser']) || isset($_POST['senhaUser'])) {

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h1>Faça seu cadastro</h1>
    <form method="POST" action="">
        <p>
            <label>Nome:</label>
            <input type="text" name="nameUser" id="nameUser">
        </p>

        <p>
            <label>Email:</label>
            <input type="email" name="emailUser" id="emailUser" placeholder="xxxxxxx@mail.com">
        </p>
        
        <p>
            <label>Senha:</label>
            <input type="password" name="senhaUser" id="senhaUser">
        </p>

        <input type="submit" value="Cadastrar" id="cadastrar" name="cadastrar">

        <p>
            <a href="../index.php">Login</a>
        </p>
    </form>
</body>
</html>