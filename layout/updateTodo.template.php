<?php session_start() ?>
<?php require_once __DIR__ . "/../components/header.component.php"; ?>

<body>
    <?php require_once __DIR__ . "/../components/menu.component.php"; ?>
    
    <form action="./../controller/todo.controller.php" method="POST">

        <input type="text" name="descrizione">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <button type="submit" name="action" value="update">Modifica</button>
    </form>
</body>

</html>