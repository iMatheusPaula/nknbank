<?php
require __DIR__ . "/vendor/autoload.php";

$mysql = new \Source\MySQL();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formHandler = new \Source\FormHandler();
    $res = $formHandler->getForm();
    if($res[0] === true) exit(header('Location: /thanks.php'));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro NKN Bank</title>
    <link rel="stylesheet" href="/assets/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="logo">
        <span>NKN</span> BANK
    </div>
    <div class="form-box">
        <form method="post">
            <h1>Cadastro</h1>
            <div class="input-box">
                <input type="text" name="name" placeholder="Nome completo" required>
            </div>
            <div class="input-box">
                <input type="date" name="birthday" required>
            </div>
            <div class="input-box">
                <input type="email" name="email" placeholder="E-mail" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Senha" required>
            </div>
            <div class="input-box">
                <input type="password" name="confirmPassword" placeholder="Confirmação da senha" required>
            </div>
            <div class="input-box">
                <input type="text" name="whatsapp" id="whatsapp" placeholder="Whatsapp" maxlength="15">
            </div>
            <button type="submit" class="btnSubmit">Cadastrar</button>
            <?php if($res[0] === false) { ?>
                <div class="hasErrors">Erro: <?= $res[1] ?></div>
            <?php } ?>
        </form>
    </div>
</body>
</html>
<script src="assets/script.js"></script>