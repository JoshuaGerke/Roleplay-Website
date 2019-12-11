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
    $mail->Host = ""; // z.B. smtp.1und1.de

    $mail->IsHTML(true);
    $mail->SMTPAuth = true;

    // Login und Passwort der Empfänger-Mail
    $mail->Username = ""; // z.B. info@techkings.de
    $mail->Password = ""; // Passwort für Email

    // Verschlüsselungsprotokoll
    $mail->SMTPSecure = "tls";
    $mail->Port = 25; // Port für SMTP

    $mail->Subject = "Anfrage über Website";
    $mail->Body = $message;
    $mail->setFrom("info@techkings.de", $username); // Zusteller Email
    $mail->addAddress('CommanderDonkey@gmail.com'); // Email Empfänger



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