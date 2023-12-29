<?php session_start() ?>
<menu class="container-menu">
    <!--Verifica la presenza all'interno dell'url della stringa updateTodo.template.php-->
    <?php if (!strpos($_SERVER['REQUEST_URI'], 'updateTodo.template.php')) {
    ?>
        <ul>
            <li><a href="/project/01/">Home</a></li>
            <li><a href="/project/01/layout/bio.template.php">Bio</a></li>
            <li><a href="/project/01/layout/portfolio.template.php">Portfolio</a></li>
            <li><a href="/project/01/layout/contacts.template.php">Contacts</a></li>

            <?php if (isset($_SESSION['user'])) { ?>

                <li><a href="/project/01/layout/todo.template.php">Todo</a></li>
                <li><a href="/project/01/controller/menu.controller.php">Logout</a></li>

            <?php } else { ?>

                <li><a href="/project/01/layout/login.template.php">Login</a></li>

            <?php } ?>
        </ul>
    <?php } else { ?>
        <ul>
            <li><a href="/project/01/layout/todo.template.php">Torna indietro</a></li>
        </ul>
    <?php } ?>
</menu>