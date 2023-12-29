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
   
    <?php require_once __DIR__ ."/../components/menu.component.php" ?>
<form action="./../controller/login.controller.php" method="POST" required>
    <input type="text" name="nome" id="nome" placeholder="nome" required>
    <input type="text" name="cognome" id="cognome" placeholder="cognome" required>
    <input type="date" name="dataN" id="dataN" placeholder="data di nascita" required>
    <input type="tel" name="telefono" id="telefono" placeholder="telefono" required>
    <input type="email" name="email" id="email" placeholder="email" required>
    <input type="password" name="password" id="password" placeholder="password" required>
    <input type="submit" name="submit" value="signin">
</form>

</body>
</html>