<?php 
var_dump($_REQUEST);
require_once('../../includes/config.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

if(isset($_REQUEST['valider'])){
    $id_commande = $_REQUEST['id_commande'] ?? '';
    $email_responsable = $_REQUEST['email'] ?? '';
    $message = $_REQUEST['message'] ?? '';
    
    $responsable = $_REQUEST['responsable'] ?? '';
    
    
    
    $mail = new PHPMailer(true);
    
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'yasmineselm@gmail.com';                 // SMTP username
    $mail->Password = 'github@evvamode2019';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
    
    $mail->From = 'yasmineselm@gmail.com';
    $mail->FromName = 'Evvamode';
    $mail->addAddress($email_responsable, $responsable);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    
    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    //$mail->isHTML(true);                                  // Set email format to HTML
    
    $mail->Subject = 'Commande N°' . $id_commande;
    $mail->Body    = $message . "veuillez confirmer notre email. Cordiallement";
    $mail->AltBody = 'lazrag s3ani';
    
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
        //hna update ta3 commande => validé
        //dirouha 
    }
    
    
}
?>