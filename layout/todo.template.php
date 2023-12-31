<?php require_once './../model/User.class.php'; ?>
<?php require_once './../environment/env.php'; ?>
<?php require_once './../model/Todo.class.php'; ?>
<?php require_once './../services/todo.service.php'; ?>
<?php require_once './../controller/db.controller.php'; ?>
<? session_start(); ?>
<?php require_once __DIR__ . "/../components/header.component.php"; ?>

<body>
    <?php require_once './../components/menu.component.php'; 
    if(isset($_SESSION['user'])){
    ?>
    <h2>Ciao, <?= $_SESSION['user']->getNome() ?></h2>
    <form action="./../controller/todo.controller.php" method="POST">
        <input type="text" name="descrizione" placeholder="descrizione">
        <button name="action" value="create">Aggiungi</button>
    </form>
    <table>

        <tr>
            <td>Descrizione</td>
            <td>Data inserimento</td>
            <td>Stato</td>
            <td>Azioni</td>
        </tr>
        <?php
        foreach (getToDos($db) as $todo) {
        ?>

            <tr>
                <td><?= $todo->getDescrizione() ?></td>
                <td><?= $todo->getDateCreate() ?></td>
                <td>
                    <form method="POST" action="<?= $_ENV['url'] ?>/project/01/controller/todo.controller.php?id=<?php echo $todo->getIdTodo() ?>&stato=<?php echo $todo->getStato() ?>"><button name="action" value="updateStato"><?php if ($todo->getStato()) { ?> Completato <?php } else { ?> Da Completare<?php } ?></button></form>
                </td>
                <td>
                    <form method="POST" action="<?= $_ENV['url'] ?>/project/01/controller/todo.controller.php?id=<?= $todo->getIdTodo() ?>"> <button name="action" value="delete">Elimina</button></form>

                    <form method="GET" action="<?= $_ENV['url'] ?>/project/01/layout/updateTodo.template.php">
                        <input type="hidden" name="id" value="<?= $todo->getIdTodo() ?>">
			            <input type="hidden" name="descrizione" value="<?= $todo->getDescrizione() ?>">
                        <button type="submit" <?php if ($todo->getStato()) { ?> disabled <?php } ?>>Modifica</button>
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
        <?php }else{header("Location:https://www.sliptstream.it/project/01/layout/login.template.php");} ?>
</body>

</html>
