<?php
    session_start();
    if(isset($_SESSION['id'])){
        setcookie(session_name(), "", time()-42000);
        session_unset();
        session_destroy();
    }
    header('Location: /TeamRocket/principal.php');
    exit;
?>
