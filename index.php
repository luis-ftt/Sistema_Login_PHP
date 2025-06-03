<?php
session_start();

$users = require_once('users.php');
$logado = false;
$msg = "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(empty($_POST['usuario']) || (empty($_POST['senha']))){
    $msg = 'Preencha os campos';
    }
}
if(!empty($_POST['usuario']) && (!empty($_POST['senha']))){
    $usuario = htmlspecialchars($_POST['usuario']);
    $senha = htmlspecialchars($_POST['senha']);
    $logado = false;

    foreach($users as $user){
        if($user['usuario'] === $usuario && $user['senha'] === $senha){
            $_SESSION['usuario'] = $usuario;
            header('Location:welcome.php');
            exit;
            $logado = true;
        }
    }
    if(!$logado){
        $msg = "Usuário Não autenticado";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="styles/style.css" rel="stylesheet"/>
</head>
<body>
    <form method="POST">
        <div class="container">
            <h1 style="color: red;font-size:30px;letter-spacing:2px;"> <?= $msg?> </h1>
            <div class="display">
            <label for="usuario">Usuario</label>
            <input type="usuario" name="usuario"> <br>
            <label for="senha">Senha</label>
            <input type="password" name="senha"><br>
            <input type="submit" value="Enviar">
            </div>
        </div>
    </form>
</body>
</html>