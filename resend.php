<?php
    // read CSV
    $file = fopen("emailpdfmap.csv","r");
    $data = array();
    $head = fgetcsv($file,null,';');
    $all_row = array();
        while (!feof($file)) {
            $data[] = fgetcsv($file,null,';');
        }
    
    fclose($file);
?>
<?php 


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

    //Server settings
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'fortester73@gmail.com';                // SMTP username
    $mail->Password   = 'fortester12!';                         // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to
    $mail->setFrom('fortester73@gmail.com');

    
    
       
    // Content
    $mail->Subject = 'JUDUL BARU';
    $bodytext      = 'This is the HTML message body tanpa html';
    $mail->Body    = $bodytext;
    $data_status = array();

    //Recipients
    foreach($data as $result){
            $result[2] = "OK!";
            array_push($data_status, $result);
    }
    foreach($_POST as $email){
        foreach($data_status as $result){
            if($email == $result[0]){
                $mail->addAddress($result[0]); 
                $mail->addAttachment('file/'.$result[1]);
                if($mail->send()){
                    $result[2] = "OK!";
                }
            }
        }
        
    }

    

?>
<script>
    localStorage.clear();
    var a = <?php echo json_encode($data_status, JSON_FORCE_OBJECT) ?>;
    localStorage.setItem('data',  JSON.stringify(a));
    window.location.href = "http://localhost/phpmail/main.php";
</script>