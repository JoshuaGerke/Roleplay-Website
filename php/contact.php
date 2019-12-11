<?php
if(isset($_POST['submit'])) {

    $username = $_POST['username'];
    $firma = $_POST['subject'];
    $emailAddress = $_POST['email'];

    $message = "Name: " . $_POST['username'] . "Email : " . $_POST['email'] . "<br><br> Betreff: " . $_POST['subject'] . "<br><br>Nachricht : <br>" . $_POST['body'];

    require '../phpmailer/PHPMailerAutoload.php';

    $mail = new PHPMailer();
    $mail->isSMTP();

    // SMTP-Postausgang eintragen:
    $mail->Host = "in-v3.mailjet.com"; // z.B. smtp.1und1.de

    $mail->IsHTML(true);
    $mail->SMTPAuth = true;

    // Login und Passwort der Empfänger-Mail
    $mail->Username = "c35dfcd8c9d2d11a151ba3e91af34c78";
    $mail->Password = "0edb7ef0e68f80056cc5c2f7e6246d34";

    // Verschlüsselungsprotokoll
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;  //oder 587

    $mail->Subject = "Anfrage über Website";
    $mail->Body = $message;
    $mail->setFrom("contact@servername.de", $username);
    $mail->addAddress('bewerben@servername.de');



    try{
        if($mail->send()){
            header("Location: ../succeed.html");
            exit();
        } else {
            header("Location: ..&error.html");
        }
    } catch(Exception $e){
        echo $e->getMessage();
    }
}