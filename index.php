<?php
include('server/conexao.php');

if (isset($_POST['emailUser']) || isset($_POST['senhaUser'])) {
    
    if (strlen($_POST['emailUser']) == 0) {
        echo "Preencha seu email";
    }else if (strlen($_POST['senhaUser']) == 0) {
        echo "Preencha sua senha";
    }else {

        $emailUser = $mysqli->real_escape_string($_POST['emailUser']);
        $senhaUser = $mysqli->real_escape_string($_POST['senhaUser']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$emailUser' AND senha = '$senhaUser'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do codigo SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("location: pags/painel.php");

        }else {
            echo "Falha ao logar! Email ou Senha incorretos";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Entre em sua conta</h1>
    <form action="" method="POST">
        <p>
            <label for="emailUser">Email</label>
            <input type="email" name="emailUser" id="emailUser" placeholder="xxxxxxx@mail.com">
        </p>

        <p>
            <label for="senhaUser">Senha</label>
            <input type="password" name="senhaUser" id="senhaUser">
        </p>        

        <p>
            <button type="submit">login</button>
        </p>

        <p>
            <a href="pags/cadastro.php">Cadastrar</a>
        </p>
    </form>
    
</body>
</html>