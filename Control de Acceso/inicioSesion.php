<?php
    session_start();

    if(isset($_REQUEST['user']) and isset($_REQUEST['pass'])) {
        if ($_REQUEST['user'] === 'admin' and $_REQUEST['pass'] === '000') {
            $_SESSION['id'] = session_id();
            header('Location: /TeamRocket/principal.php');
        } else {
            // Deslogeo.
            setcookie(session_name(), "", time()-42000);
            session_unset();
            session_destroy();
            header('Location: /TeamRocket/formulario.php');
        }
    }

    exit;
?>
