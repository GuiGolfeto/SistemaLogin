<?php
include('server/conexao.php');

if (isset($_POST['emailUser']) || isset($_POST['senhaUser'])) {
    
    if (strlen($_POST['emailUser']) == 0) {
        echo "<script>alert('Preencha seu email!');</script>";
    }else if (strlen($_POST['senhaUser']) == 0) {
        echo "<script>alert('Preencha sua senha!');</script>";
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
            echo "<script>alert('Falha ao logar! Email ou Senha incorretos');</script>";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css" />
    <title>Login</title>
</head>
<body>
    <form action="" method="post" name="formLogin" id="formLogin" enctype="multipart/form-data">
        <div class="container">
            <div class="section-one">
            <div class="social-links">
                <div class="facebook">
                <span>Entrar com o facebook</span>
                <div class="icon">
                    <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><img src="./assets/facebookLogo.svg" alt="Facebook Logo" /></a>
                </div>
                </div>
                <div class="twitter">
                <div class="icon">
                    <a href="https://www.linkedin.com/" target="_blank" rel="noopener noreferrer"><img src="./assets/linkedinLogo.svg" alt="Twitter Logo" /></a>
                </div>
                <span>Entrar com Linkedin</span>
                </div>
            </div>
            <div class="main-form">
                <input type="email" name="emailUser" id="emailUser" placeholder="Email" required/>
                <input type="password" name="senhaUser" id="senhaUser" placeholder="Password" required/>
                <a href="#">Esqueci a minha senha?</a>
                <button type="submit">Login</button>
            </div>
            </div>
            <div class="section-two">
            <div class="new-account">
                <a href="pags/cadastro.php"><input type="button" value="Registrar-se"></a>
            </div>
            </div>
        </div>
    </form>
    
</body>
</html>