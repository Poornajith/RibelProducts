<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        include 'PHPMailer/src/PHPMailer.php';
        $mail = new PHPMailer();

        // Settings
        $mail->IsSMTP();
        $mail->CharSet = 'UTF-8';

        $mail->Host       = "poornajithpubg@gmail.com";    // SMTP server example
        $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth   = true;                  // enable SMTP authentication
        $mail->Port       = 25;                    // set the SMTP port for the GMAIL server
        $mail->Username   = "Poornajith Pubg";            // SMTP account username example
        $mail->Password   = "my pubg password";            // SMTP account password example

        // Content
        $mail->isHTML(true);                       // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
    ?>
</head>
<body>
    
</body>
</html>