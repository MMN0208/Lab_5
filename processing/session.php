<?php
    include "./processing/config.php";

    session_start();

    $user_check = $_SESSION['sess_user'];

    $ses_sql = mysqli_query($conn, "SELECT username FROM login WHERE username = '$user_check'");
    $row = mysqli_fetch_assoc($ses_sql);

    $login_session = $row['username'];

    
    if(!isset($_SESSION['sess_user'])) {
        header("Location: index.php?page=login");
        die();
    }

    $cookie_name = "user";
    $cookie_value = $login_session;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

?>