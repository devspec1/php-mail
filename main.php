<?php
session_start();
if(!isset($_SESSION['user'])){
    session_unset();
    session_destroy();
    header("Location: http://localhost/phpmail");
    exit();
}

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'fortester73@gmail.com';                     // SMTP username
    $mail->Password   = 'fortester12!';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('fortester73@gmail.com', 'Mailer');
    $mail->addAddress('wonderful0web@gmail.com', 'Joe User');     // Add a recipient

    // Attachments
    $mail->addAttachment('file/suket_sehat.pdf');         // Add attachments
       
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $bodytext = 'This is the HTML message body <b>in bold!</b>';
    $mail->Body    = $bodytext;
    $mail->AltBody = $bodytext;

    $mail->send();
    echo 'Message has been sent';
    exit();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    die();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SEND EMAIL</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <div class="row pt-2">
        <div class="col-lg-6">
            <div class="container">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>EMAIL</th>
                            <th>PDF</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i = 1; $i < 100; $i++){ ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td>me@example.com</td>
                                <td>PDF.file</td>
                                <td>OK!</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="container">
                <table id="example2" class="table table-dark table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>EMAIL</th>
                            <th>PDF</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for($i = 1; $i < 100; $i++){ ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td>me@example.com</td>
                                <td>PDF.file</td>
                                <td>OK!</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                            <th colspan="4">

                                <button class="btn btn-primary btn-lg btn-block">Resend Email</button>

                            </th>

                        </tr>
                    </tfoot>
                   
                </table>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
        $(document).ready(function() {
            $('#example2').DataTable();
        });
    </script>
</body>
</html>