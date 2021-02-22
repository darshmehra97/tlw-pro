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
$interested = $_POST['interested'];
$call_time = $_POST['call_time'];
$p_dsc = $_POST['p_dsc'];

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
    $mail->setFrom('info@techlabwork.com', 'Quote Contact - Techlabwork.com ');
    $mail->addAddress('darshpreet.aim@gmail.com', 'Admin');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
    
    //print_r($_FILES['attachment']['type']); exit;

    //Attachments
    $docxType = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
    $pdfType = 'application/pdf';

    // if ($_FILES['attachment']['type'] == $docxType || $_FILES['attachment']['type'] == $pdfType) { 

    //     $mail->addAttachment($_FILES['attachment']['tmp_name'], $_FILES['attachment']['name']);
    // }
    // else {
    //     die("You may only upload PDF and Microsoft Word documents through this form.");
    // }
    
     //Add attachments
    //$mail->addAttachment('./tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Quote - Techlabwork.com';
    $mail->Body    = '
                        <h2><b>Name: </b>' . $name .'</h2> <br> 
                        <h2><b>Email:</b> ' . $email .' </h2><br> 
                        <h2><b>Work Phone:</b> ' . $work_phone .'</h2> <br> 
                        <h2><b>Company:</b> ' . $company .' </h2><br> 
                        <h2><b>I am interested in:</b> ' . $interested .'</h2> <br> 
                        <h2><b>Best time to call:</b> ' . $call_time .' </h2><br> 
                        <h3><b>Project Description:</b> ' . $p_dsc .' </h3><br> ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
    $mailSent = true;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;900&display=swap">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/css/globals.css">
    <link rel="stylesheet" href="../../assets/css/custom.css">
    <link rel="stylesheet" href="../../assets/css/loader.css">
    <link rel="stylesheet" href="../../assets/css/animate.min.css">

    <title>Thanks you - Form has been successfully submitted</title>
    <style>
        .title {
            color: #2870db;
            text-align: center;
            display: block;
        }

        p {
            text-align: center;
            font-size: 17px;
            margin: 23px 0;
        }

        #formSubmitted {
            background: #fff;
            padding: 3rem;
            margin: 5rem;
            border-top: 14px solid #2870db;
            box-shadow: 0px 0 32px 0 #0000001a;
            border-radius: 28px;
        }

        .formSubmitted__image img {
            width: 500px;
            margin: 4rem auto;
            display: block;
        }

        .button.formSubmitted__button {
            margin: auto;
            display: block;
        }
    </style>
</head>

<body>

    <section id="formSubmitted">
        <h1 class="title">Thanks You!</h1>
        <p>Form has been successfully submitted.</p>
        <div class="formSubmitted__image">
            <img class=" wow fadeInRight" data-wow-delay=".2s" src="../../assets/images/vector/contact-us.svg" alt="">
        </div>
        <button class="button formSubmitted__button"><a href="/contact.html">Back to page</a></button>
    </section>


    <script src="../../assets/js/custom.js" crossorigin="anonymous"></script>
</body>
<?php header('Refresh:6;URL=https://techlabwork.com/contact'); ?>

</html>