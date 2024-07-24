<?php
require __DIR__ . "/vendor/autoload.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cadastro NKN Bank</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
<div class="logo">
    <span>NKN</span> BANK
</div>
<div class="form-box">
    <form method="post">
        <h1>Obrigado!</h1>
        <div class="hasErrors">Você será redirecionado ao site</div>
    </form>
</div>
</body>
</html>
<script>
    setTimeout(() => {
        window.location.href= 'https://www.nknbank.com.br/';
    },3000);
</script>