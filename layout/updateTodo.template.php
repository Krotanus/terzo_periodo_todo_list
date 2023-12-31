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
 <?php require_once __DIR__ ."/../components/menu.component.php";
     if(isset($_SESSION["user"])) { ?>

  <form action="./../controller/todo.controller.php" method="POST">

        <input type="text" name="descrizione" value="<?=$_GET['descrizione']?>">
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <button type="submit" name="action" value="update">Modifica</button>
    </form>
<?php }else{header("Location:https://www.sliptstream.it/project/01/");}?>
</body>
</html>
