<?php
    session_start();

    $cookie_name = "user";

    if(session_destroy()) {
        setcookie($cookie_name, "", time() - 3600);
        header("Location: index.php?page=login");
    }
?>