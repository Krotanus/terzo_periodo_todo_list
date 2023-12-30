<?php session_start() ?>
<?php require_once __DIR__ . "/../components/header.component.php"; ?>

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