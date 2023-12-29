<?php require_once './../model/User.class.php'; ?>
<?php require_once './../environment/env.php'; ?>
<?php require_once './../model/Todo.class.php'; ?>
<?php require_once './../services/todo.service.php'; ?>
<?php require_once './../controller/db.controller.php'; ?>
<? session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../style/style.css">
    <title>Project01</title>
</head>

<body>
    <?php require_once './../components/menu.component.php'; ?>

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
                    <form method="POST" action="<?=$_ENV['url'] ?>/project/01/controller/todo.controller.php?id=<?php echo $todo->getIdTodo() ?>&stato=<?php echo $todo->getStato() ?>"><button name="action" value="updateStato"><?php if ($todo->getStato()) { ?> Completato <?php } else { ?> Da Completare<?php } ?></button></form>
                </td>
                <td>
                    <form method="POST" action="<?=$_ENV['url'] ?>/project/01/controller/todo.controller.php?id=<?= $todo->getIdTodo() ?>"> <button name="action" value="delete">Elimina</button></form>

                    <form method="GET" action="<?=$_ENV['url'] ?>/project/01/layout/updateTodo.template.php">
                        <input type="hidden" name="id" value="<?= $todo->getIdTodo() ?>">
                        <button type="submit" <?php if ($todo->getStato()) { ?> disabled <?php } ?>>Modifica</button>
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>