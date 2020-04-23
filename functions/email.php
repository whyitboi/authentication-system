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
        return true;
    } else {
        return false;
    }
}



function is_email_set(){
    if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
        return true;
    }
    return false;
}

?>