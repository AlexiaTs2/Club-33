<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPmailer/src/PHPMailer.php';
require '../PHPmailer/src/SMTP.php';
require '../PHPmailer/src/Exception.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];

    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();                       
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = '19202@uktc-bg.com';                 
        $mail->Password   = 'btqyrntawptqhvgj';                        
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
        $mail->Port       = 587;                                   
    
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
    
        $mail->setFrom('from@example.com', 'DjanamSkyClub');
     
        $mail->addAddress('19202@uktc-bg.com');

        $mail->isHTML(true);
        $mail->Subject = 'Subject:'.$subject;
        $mail->Body    = '<p>Име: '.$name.'</p><br>Имейл: '.$email.'<br>Телефон: '.$phone.'<br>Съобщение: '.$message.'<br>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo '<script>alert("You have successfully sent your inquiry")</script>';
        header("Location: http://localhost/Djanam-Sky-Club/IndexPage/index.php");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo '<script>alert("Error...Try again!")</script>';
    }
}
?>
