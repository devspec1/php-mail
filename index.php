<?php
session_start();
if(isset($_SESSION['user'])){
    session_unset();
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
</head>
<body>
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center bg-info" style="height: 100vh">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <form action="send_email.php" method="post">
                    <div class="form-group">
                        <input type="password" class="form-control mb-3" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Password" name="password" required>
                        <button type="submit" class="btn btn-primary btn-md btn-block">Send Email</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
        if (isset($_GET["msg"]) && $_GET["msg"] == 'failed'){
            echo "<script>alert('Wrong Password')</script>";
        }
    ?>
    
</body>
</html>