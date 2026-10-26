<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sending($to,$subject,$body,$headers)
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
    $mail->Username = $config['smtp_username'];                    //SMTP username
    $mail->Password = $config['smtp_password'];                     //SMTP password
    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom($config['smtp_username'], 'Amorgos Rooms');
    $mail->addAddress($to);

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


$firstname = strip_tags($_POST['fname']);
$lastname = strip_tags($_POST['lname']);
$email = strip_tags($_POST['email']);
$phonenumber = strip_tags($_POST['pnumber']);
$companyname = strip_tags($_POST['cname']);
$username = strip_tags($_POST['usr']);
$password = strip_tags($_POST['psw']);
$repeatpassword = strip_tags($_POST['cpsw']);
$date = date("Y-m-d");

$connect = mysqli_connect("localhost","root","") or die("Couldn't connect!");

if($sub)
{
    if($firstname&&$lastname&&$email&&$phonenumber&&$companyname&&$username&&$password&&$repeatpassword)
    { 
        if($password==$repeatpassword)
        {
            if(strlen($phonenumber) != 10)
            {
                echo "Phone number must be exact 10 numbers";
            }
            else if(strlen($phonenumber) == 10)
            {
                // Prepare a select statement
                $stmt = $connect->prepare("SELECT id FROM users WHERE usr = ?");
                $stmt->bind_param("s", $username);

                // Execute the statement
                $stmt->execute();

                // Store the result
                $stmt->store_result();

                // Check if username exists
                if ($stmt->num_rows > 0) {
                    echo "Username is already taken.";
                } else {
                    echo "Username is available.";
                }

                // Close statement
                $stmt->close();
            }
            else if(filter_var($email, FILTER_VALIDATE_EMAIL) == TRUE){
                echo "Email is valid.";
            }
            else if(filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
                echo "Email is not valid.";
            }
            else
            {
                if(strlen($password) < 8 )
                {
                    echo "Password must be at least 8 characters with 1 digit inside it";
                }
                else
                {
                    $password = md5($password);
                    $repeatpassword = md5($repeatpassword);
                    $random = rand(23456789,98765432); 
                    $connect = mysqli_connect("localhost","root","");
                    mysqli_select_db($connect,"amorgos_rooms_db");
                    $result = $connect -> query("INSERT INTO users VALUES ('','$firstname','$lastname','$email','$phonenumber','$companyname','$username','$password','$date','0','$random')");
                    $lastid = $connect -> insert_id;
                    $to = $email;
                    $subject = "Activate your account!";
                    $headers = "From: admin@amorgos-rooms.com";

                    $configPath = __DIR__ . '/config.local.php';

                    $appConfig = require (
                        is_file($configPath)
                            ? $configPath
                            : __DIR__ . '/config.example.php'
                    );

                    $activationUrl = rtrim($appConfig['base_url'], '/')
                        . '/activate.php?id=' . urlencode((string) $lastid)
                        . '&code=' . urlencode((string) $random);

                    $body = "
                    Hello $firstname, <br><br>

                    You need to activate your account with the link below:<br>
                    $activationUrl <br><br>

                    Thanks!

                    ";

                    sending("$to","$subject","$body","$headers");

                    die("You have been registered! Check your email to activate your account!<a href='sign-up.php'> Return to login page</a>");
                }
            }
        }
        else
        {
            echo "Your passwords do not match!";
        }
    }
    else
    {
        echo "Please fill in <b>all</b> fields!";
    }
}

?>

