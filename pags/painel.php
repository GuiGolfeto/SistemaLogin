<?php
include('../server/protect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>
<body>
    <h1>Bem Vindo ao Painel! <?php echo $_SESSION['nome']; ?></h1> 

    <p>
        <a href="../server/logout.php">Sair</a>
    </p>
</body>
</html>