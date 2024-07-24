<?php
require __DIR__ . "/vendor/autoload.php";
$mysql = new \Source\MySQL();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $handler = new \Source\FormHandler();
    echo $handler->getForm();
}
//exit(header('Location: https://www.nknbank.com.br/'));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadstro NKN Bank</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <div class="form-box">
        <form method="post">
            <h1>Cadastro</h1>
            <div class="input-box">
                <input type="text" placeholder="Nome" required>
            </div>
            <div class="input-box">
                <input type="date" name="birthday" >
            </div>
            <div class="input-box">
                <input type="text" name="email" placeholder="E-mail" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Senha" required>
            </div>
            <div class="input-box">
                <input type="password" name="confirmPassword" placeholder="Confirmação da senha" required>
            </div>
            <div class="input-box">
                <input type="text" name="whatsapp" placeholder="Whatsapp">
            </div>
            <div class="hasErrors">
<!--                --><?php //if(){ ?>
<!--                <span>print_r </span>-->
<!--                --><?php //} ?>
            </div>
            <button type="submit" class="btnSubmit">Cadastrar</button>
        </form>
    </div>
</body>
</html>