<!-- Page: Contact -->

<?php
//Import PHPMailer classes into the global namespace
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require './autoload.php';

$name = $_POST['fname'];
$email = $_POST['email'];
$work_phone = $_POST['work_phone'];
$company = $_POST['company'];

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'inbox2darsh@gmail.com';                     //SMTP username
    $mail->Password   = 'VW2CQJNj3ev5Zmf';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('info@techlabwork.com', 'Title');
    $mail->addAddress('darshpreet.aim@gmail.com', 'Darsh');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
    
    //print_r($_FILES['attachment']['type']); exit;

    //Attachments
    $docxType = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
    $pdfType = 'application/pdf';

    if ($_FILES['attachment']['type'] == $docxType || $_FILES['attachment']['type'] == $pdfType) { 

        $mail->addAttachment($_FILES['attachment']['tmp_name'], $_FILES['attachment']['name']);
    }
    else {
        die("You may only upload PDF and Microsoft Word documents through this form.");
    }
    
     //Add attachments
    //$mail->addAttachment('./tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = '
                        <b>Name: </b>' . $name .' <br> 
                        <b>Email:</b> ' . $email .' <br> 
                        <b>Work Phone:</b> ' . $work_phone .' <br> 
                        <b>Company:</b> ' . $company .' <br> 
                        <b>File Name:</b> ' . $file_name .' <br> 
                        <b>File Type:</b> ' . $file_type .' <br>  
                        This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}