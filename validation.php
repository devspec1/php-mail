<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pass = $_POST['password'];
    if ($pass == 'emailzone') {
        session_start();
        $_SESSION['user'] = 'user';
        header("Location: http://localhost/phpmail/read.php");
    } 
    else {
        header("Location: http://localhost/phpmail?msg=failed");
        exit();
    }
}else {
    header("Location: http://localhost/phpmail");
    exit();
}








