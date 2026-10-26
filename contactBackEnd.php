<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sending($to,$subject,$body)
{

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {

    $configPath = __DIR__ . '/config.local.php';

    $config = require (
        is_file($configPath)
            ? $configPath
            : __DIR__ . '/config.example.php'
    );

    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = "smtp.gmail.com";                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username = $config['smtp_username'];                     //SMTP username
    $mail->Password = $config['smtp_password'];                               //SMTP password
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($config['smtp_username'], 'Amorgos Rooms');
    $mail->addAddress($to);    //Add a recipient το #to γινεται παραληπτης το μειλ που περναει ο υπολοιπος κωδικας

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;

    $mail->send();
    echo 'Message has been sent';
    } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

$sub = $_POST['sub'];

$firstname = strip_tags($_POST['firstname']);
$lastname = strip_tags($_POST['lastname']);
$email = strip_tags($_POST['email']);
$phonenumber = strip_tags($_POST['phonenumber']);
$numberad = strip_tags($_POST['numa']);
$numberkids = strip_tags($_POST['numk']);
$arrivaldate = strip_tags($_POST['ardate']);
$departuredate = strip_tags($_POST['depdate']);
$pet = strip_tags($_POST['pet']);
$comments = strip_tags($_POST['comments']);
 


$connect = mysqli_connect("localhost","root","");
mysqli_select_db($connect,"amorgos_rooms_db");
$result = $connect -> query("INSERT INTO reservation VALUES ('','$firstname','$lastname','$email','$phonenumber','$numberad','$numberkids','$arrivaldate','$departuredate','$pet','$comments')");


if($sub)
{
    if($firstname&&$lastname&&$email&&$phonenumber&&$numberad&&$arrivaldate&&$departuredate&&$pet)
    { 
        $connect = mysqli_connect("localhost","root","");
        mysqli_select_db($connect,"amorgos_rooms_db");
        $result = $connect -> query("INSERT INTO reservation VALUES ('','$firstname','$lastname','$email','$phonenumber','$numberad','$numberkids','$arrivaldate','$departuredate','$pet','$comments')");
        $to = $email;
        $subject = "You have contacted us!";
        $body = "
            Hello $firstname $lastname, <br><br>

            Firstname: $firstname<br>
            Lastname: $lastname<br>
            Email: $email<br>
            Phone number: $phonenumber<br>
            Number of adults: $numberad<br>
            Number of kids: $numberkids<br>
            Arrival date: $arrivaldate<br>
            Departure date: $departuredate<br>
            Pets: $pet<br>
            Comments: $comments<br>
            <br><br>

            Thanks!

            ";

        sending("$to","$subject","$body");
        header('location:index.html');
    }
    else
    {
        echo "Please fill in <b>all</b> fields!";
    }
}
?>