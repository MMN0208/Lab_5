<?php 
include './processing/config.php';
include './processing/password_validation.php';

session_start(); 

if(isset($_POST["submit"])) { 
    $check_pass = $_POST['pass'];


    if(strongPassword($check_pass)) {
        $user = mysqli_real_escape_string($conn, $_POST['user']);  
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);  
        $query = mysqli_query($conn, "SELECT * FROM login WHERE username = '$user' and password = '$pass'");  
        $numrows = mysqli_num_rows($query);

        if($numrows == 1) {
            $row = mysqli_fetch_assoc($query);  
            $dbusername = $row['username'];
            $dbpassword = $row['password'];
    
            if($user == $dbusername && $pass == $dbpassword) {
                $_SESSION['sess_user']= $user;
        
                /* Redirect browser */  
                header("Location: index.php?page=welcome");
            }
        } else {  
            echo "Invalid username or password!";  
        }
    }
    else {
        echo "Weak password!";
    }
}
?>  