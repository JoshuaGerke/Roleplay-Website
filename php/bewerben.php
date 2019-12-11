<?php
if(isset($_POST['submit'])) {

    $username = $_POST['username'];
    $firma = $_POST['subject'];
    $emailAddress = $_POST['email'];

    $message = "
    Name: " . $_POST['username'] . 
    "Email : " . $_POST['email'] .
    "<br><br>Rang : <br>" . $_POST['subject'] .
    "<br><br>Nachricht : <br>" . $_POST['body'];
    switch($_POST['subject']){
        case 'Entwickler':
            $message .= "<br><br>Falls Dev : <br>" .
            "<br><br>Welche Scriptsprachen kannst du gut? : <br>" . $_POST['dev-scriptsprache'] .
            "<br><br>In Welcher Sprache möchtest du gerne Arbeiten? : <br>" . $_POST['dev-vorstellung'] .
            "<br><br>Seit wievielen Jahren Entwickelst du schon? : <br>" . $_POST['dev-since'] .
            "<br><br>In Welchen Netzwerken warst du bereits (Name & Spiel)? : <br>" . $_POST['dev-network'] .
            "<br><br>Wie sieht deine Online-Zeit aus? : <br>" . $_POST['dev-time'];
            break;
        case 'Supporter':
            $message .= "<br><br>Falls Supporter : <br>" .
            "<br><br>Welche Aufgabenbereiche hat der Support deiner Meinung nach? : <br>" . $_POST['sup-aufgabe'] .
            "<br><br>Wo/Wann fängt Support an und wo hört er auf? : <br>" . $_POST['sup-start'] .
            "<br><br>Wofür steht der Begriff 'Support' für mich? : <br>" . $_POST['sup-begriff'] .
            "<br><br>Wie viel Zeit habe ich für meine Supporttätigkeiten? (Circa) : <br>" . $_POST['sup-time'] .
            "<br><br>Habe ich besondere Rechte als Spieler, wenn ich auch im Support tätig bin? : <br>" . $_POST['sup-right'] .
            "<br><br>Wie sehen deine Online-Zeiten aus? : <br>" . $_POST['sup-online'];
            break;
        case 'Konzepter':
            $message .= "<br><br>Falls Konzepter : <br>" .
            "<br><br>Mit welchen Tools bist du für Konzepte vertraut? : <br>" . $_POST['kon-tools'] .
            "<br><br>Was macht für dich ein Fertiges Konzept aus? : <br>" . $_POST['kon-fertig'] .
            "<br><br>Worauf achtest du bei einem Konzept? : <br>" . $_POST['kon-worauf'] .
            "<br><br>Welches Zeit-Limit setzt du dir, beim bearbeiten eines Konzeptes? : <br>" . $_POST['kon-limit'] .
            "<br><br>Was ist deine Einstellung zum Arbeiten im Team? : <br>" . $_POST['kon-setting'] .
            "<br><br>Wie sehen deine Online-Zeiten aus? : <br>" . $_POST['kon-online'];
            break;
        case 'Sonstiges':
            $message .= "<br><br>Falls Sonstiges : <br>" .
            "<br><br>Beschreibe deinen Rang? : <br>" . $_POST['son-beschreibung'] .
            "<br><br>Was ist der Aufgabenbereich von dem Rang? : <br>" . $_POST['son-aufgaben'] .
            "<br><br>Hast du Vorerfahrungen in diesem Bereich? : <br>" . $_POST['son-erfahrung'] .
            "<br><br>Wieviel Zeit wird die Tätigkeiten kosten? : <br>" . $_POST['son-time'] .
            "<br><br>Was ist deine Einstellung zum Arbeiten im Team? : <br>" . $_POST['son-setting'] .
            "<br><br>Wie sehen deine Online-Zeiten aus? : <br>" . $_POST['son-online'];
            break;
    }
    

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
            header("Location: ../error.html");
        }
    } catch(Exception $e){
        echo $e->getMessage();
    }
}