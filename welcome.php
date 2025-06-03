<?php

session_start();

if(empty($_SESSION['usuario'])){
    header('Location:loginTry.php');
    exit();
}

$usuario = $_SESSION['usuario'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="styles/welcome.css" rel="stylesheet"/>
</head>
<body style="background-color:grey">
<header>
    <div class="container">
        <div class="header">
            <h1 class="welcome-h1"> Bem vindo <?= htmlspecialchars($usuario) ?></h1>
        </div>
        <div class="header-2">
            <a href="logout.php" class="welcome-href">Sair da conta</a>
        </div>
    </div>
</header>
</body>
</html>