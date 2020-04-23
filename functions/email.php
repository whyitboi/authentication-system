<?php
require_once("alert.php");
require_once("redirect.php");

function send_email(
    $subject = "",
    $txt = "",
    $email
    ){
    $headers = "From: no-reply@snh.org";


    $passwordReset = mail($email, $subject, $txt, $headers);


    if ($passwordReset) {
        set_alert("message", "The password reset link has been sent to ".$email);
        redirect_to("login.php");
    } else {
        set_alert("message", "Something went wrong could not send reset link to ".$email);
        redirect_to("forgot.php");
    }
}
function is_email_set(){
    if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
        return true;
    }
    return false;
}

?>