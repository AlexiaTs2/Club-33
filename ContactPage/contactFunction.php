<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPmailer/src/PHPMailer.php';
require '../PHPmailer/src/SMTP.php';
require '../PHPmailer/src/Exception.php';

if(isset($_POST['submit'])){
    // Подготвяме променливи със стойности от формата
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();                       
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = '19202@uktc-bg.com';  // Променете със своя имейл адрес                 
        $mail->Password   = 'wmgwitvipslyxtnm'; // Променете със своя парола                           
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
        $mail->Port       = 587;                                   
    
        // Пропускане на верификацията на SSL сертификата
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
    
        $mail->setFrom('from@example.com', 'Mailer');
     
        $mail->addAddress('19202@uktc-bg.com');

        $mail->isHTML(true);
        $mail->Subject = 'Inquiry from-'.$name;
        // Генерираме тялото на имейла със стойностите от формата
        $mail->Body    = '<p>About sender: '.$name.'</p><br>Email: '.$email.'<br>Phone: '.$phone.'<br>About: '.$message.'<br>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo '<script>alert("You have successfully sent your inquiry")</script>';
        header("Location: http://localhost/FinalProject/IndexPage/index.php");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo '<script>alert("Error...Try again!")</script>';
    }
}
?>
