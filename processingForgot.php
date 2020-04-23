<?php
session_start();
require_once("functions/alert.php");
require_once("functions/users.php");
require_once("functions/email.php");
require_once("functions/token.php");

$errorCount = 0;
$email = $_POST["email"] != "" ? $_POST["email"] : $errorCount++;
$_SESSION["email"] = $email;


if ($errorCount > 0) {
    //errormessage
    set_alert("error", "You have " . $errorCount . " error(s) in your form");
    redirect_to("forgot.php");
} else {

    if (!find_user($email)) {

        //error message if email isnt associated with any account
        set_alert("error", "The email " . $email . ", is not associated with any account");
        redirect_to("forgot.php");
        die();
    }


    //Random Token Generator
    $token = token_generator();


    $subject = "Password Reset Link";
    $txt = "A password reset has been initiated on your account, If you did not 
            request this reset, please ignore this message, otherwise visit http://localhost/Authentication System/reset.php?token=" . $token;

    ini_set("SMTP", "smtp.mailtrap.io");
    ini_set("sendmail_from", " no-reply@snh.org");
    ini_set("smtp_port", "2525");

    file_put_contents("db/token/" . $email . ".json", json_encode(["token" => $token]));

    if (send_email($subject, $txt, $email)) {

        //success message
        set_alert("message", "The password reset link was sent");
    }

    redirect_to("login.php");
    die();
}
