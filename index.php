<?php
require __DIR__ . "/vendor/autoload.php";
$mysql = new \Source\MySQL();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $handler = new \Source\FormHandler();
    $handler->getForm();
    //header('');
    //die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NKN Bank</title>
</head>
<body>
    <form method="post">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name">

        <label for="birthday">Data de nascimento:</label>
        <input type="date" id="birthday" name="birthday">

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" >

        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" >

        <label for="confirmPassword">Confirmação de senha:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" >

        <label for="whatsapp">Whatsapp:</label>
        <input type="tel" id="whatsapp" name="whatsapp">

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>