<?php
session_start();
require_once("functions/alert.php");
require_once("functions/users.php");
require_once("functions/email.php");

$errorCount = 0;
$email = $_POST["email"] != "" ? $_POST["email"] : $errorCount++;
$_SESSION["email"] = $email;

if ($errorCount > 0) {
    //errormessage
    set_alert("error", "You have " . $errorCount . " error(s) in your form");
    redirect_to("forgot.php");
} else {
    $allusers = scandir("db/users/staff/");
    $countAllUsers = count($allusers);

    for ($counter = 0; $counter < $countAllUsers; $counter++) {
        $currentUser = $allusers[$counter];

        //send reset link to user
        if ($currentUser == $email . ".json") {


            //Random Token Generator
            $token = token_generator();


            $subject = "Password Reset Link";
            $txt = "A password reset has been initiated on your account, If you did not 
            request this reset, please ignore this message, otherwise visit http://localhost/startngPHP/reset.php?token=" . $token;

            ini_set("SMTP", "smtp.mailtrap.io");
            ini_set("sendmail_from", " no-reply@snh.org");
            ini_set("smtp_port", "2525");

            file_put_contents("db/token/" . $email . ".json", json_encode(["token" => $token]));

            send_email($subject, $txt, $email);

            die();
        }
    }
    //errormessage if email doesn't exist
    set_alert("error", "The email ".$email.", is not associated with any account");
    redirect_to("forgot.php");
}
