<?php
    session_start();
    if (isset($_GET['logout'])) {
        session_destroy();
        $_SESSION['errors'] = null;
        
        header("Location: index.php");
    }
?>
