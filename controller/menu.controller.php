<?php 
session_start();
function end_session(){
    session_destroy();
    $_SESSION['user'] = null;
    header('Location: ' . $_ENV['url'] . '/project/01/');
}

end_session();


?>