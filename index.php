<?php
    $getPage = $_GET['page'];
    $getProduct = $_GET['id'];
    if($getPage == "login" or empty($getPage)) {
        header("Location: login.php");
    } elseif($getPage == "welcome") {
        header("Location: welcome.php");
    } elseif($getPage == "logout") {
        header("Location: logout.php");
    }
?>