<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../style/style.css">
    <title>Project01</title>
</head>

<body>

    <?php require_once __DIR__ . "/../components/menu.component.php" ?>
    <form action="./../controller/login.controller.php" method="POST">
        <input type="text" name="email" id="email" placeholder="email" required>
        <input type="password" name="password" id="password" placeholder="password" required>
        <input type="submit" name="submit" value="login">
        <a href="/project/01/layout/signin.template.php">Registrati</a>
    </form>
    <?php if (strlen($msg) > 0) { ?>
        <div><?= $msg ?></div>
    <?php } ?>

</body>

</html>