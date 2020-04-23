<?php
session_start();
require_once("functions/alert.php");
require_once("functions/redirect.php");
require_once("functions/users.php");
require_once("functions/token.php");
require_once("functions/email.php");


$errorCount = 0;

$email = $_POST["email"] != "" ? $_POST["email"] : $errorCount++;
$password = $_POST["password"];


$_SESSION['email'] = $email;
$_SESSION['password'] = password_hash($password, PASSWORD_DEFAULT);

if ($errorCount > 0) {
    //errormessage
    $_SESSION['error'] = "email or password incorrect";
    header("Location: login.php");
} else {

    $userObjects = find_user($email);

    //collect password form user and DB
    if ($userObjects) {
        $passwordFromDB = $userObjects->password;
        $passwordFromUser = password_verify($password, $passwordFromDB);

        //compare passwords and redirect to dashboard
        if ($passwordFromDB == $passwordFromUser) {
            $_SESSION['loggedin'] = $userObjects->id;
            $_SESSION['email'] = $userObjects->email;
            $_SESSION['fullname'] = $userObjects->first_name . " " . $userObjects->last_name;
            $_SESSION['designation'] = $userObjects->designation;
            $_SESSION['department'] = $userObjects->department;
            $_SESSION['register_date'] = $userObjects->register_date;
            $_SESSION['last_login'] = date("H:i, d.M.Y");
            if (($_SESSION['loggedin'] == 1) && ($_SESSION['designation'] == "MD")) {
                redirect_to("mdDashboard.php");
            } else if (($_SESSION['designation'] == "Medical Team")){
                redirect_to("medicalTeamDashboard.php");
            } else{
                redirect_to("patientDashboard.php");
            }
            die();
        }
    }
    //errormessage if password fails
    set_alert("error", "email or password incorrect");
    redirect_to("login.php");
}
