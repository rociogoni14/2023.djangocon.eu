<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';

    if ( ( (count($_GET) > 0) && isset($_GET['pass']))  && ($_GET['pass'] == "pomelo") ) {
        echo "<h1>Mail test</h1>";
    }else{
        header('HTTP/1.0 403 Forbidden');
        die();
    }

    $to = "pafmon@gmail.com";

    if ( ( isset($_GET['to']))  && ($_GET['to'] != "") ) {
        $to = $_GET['to'];
    }

    echo "Sending email to '".$to."'...<br>";

    $mail = new PHPMailer(TRUE);

    try {
        $mail->isSMTP();
        $mail->Host = 'mail.us.es';
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = 'tls';
        $mail->Username = 'icsoc2022@us.es';
        $mail->Password = '[0ngr3s01CS0C';
        $mail->Port = 587;
    
        /* Set the mail sender. */
        $mail->setFrom('icsoc2022@us.es');
        /* Add a recipient. */
        $mail->addAddress($to);
        $mail->addBCC('pablofm@us.es');
        /* Set the subject. */
        $mail->Subject = 'ICSOC 2022 Registration Mail Test';
        /* Set the mail message body. */
        $mail->Body = 'Dear Tester,
    
       This is an email test from the registration system.

       The ICSOC 2022 Organization Team ';
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        /* Finally send the mail. */
        $mail->send();
        echo "Email sent successfully";

     }
     catch (Exception $e)
     {
        /* PHPMailer exception. */
        echo $e->errorMessage();
     }
     catch (\Exception $e)
     {
        /* PHP exception (note the backslash to select the global namespace Exception class). */
        echo $e->getMessage();
     }
?>