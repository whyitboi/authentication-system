<?php
session_start();
require_once("functions/alert.php");
require_once("functions/redirect.php");
require_once("functions/users.php");
require_once("functions/token.php");
require_once("functions/email.php");


//collecting & validating data
$errorCount = 0;

if (!is_user_loggedIn()) {
    $token = $_POST["token"] != "" ? $_POST["token"] : $errorCount++;
    $_SESSION["token"] = $token;
}

$email = $_POST["email"] != "" ? $_POST["email"] : $errorCount++;
$password = $_POST["password"] != "" ? $_POST["password"] : $errorCount++;

$_SESSION["email"] = $email;


if ($errorCount > 0) {
    //errormessage
    set_alert("error", "You have " . $errorCount . " error(s) in your form");
    redirect_to("reset.php");
} else {

    $checkToken = is_user_loggedIn() ? true : find_token();

            if ($checkToken) {

                    //collect password form user and DB
                    if (find_user($email)) {

                        $userObjects = find_user($email);
                        $userObjects->password =  password_hash($password, PASSWORD_DEFAULT);


                        //User data deleted
                        unlink("db/users/staff/" . $currentUser);
                        unlink("db/tokens/" . $currentUser);

                        //user data recreated
                        if(is_not_staff()){
                            save_patients($userObject);
                        }else{
                            save_staff($userObject);            
                        }


                        //success message
                        set_alert("message", "Password Reset successful");

                        //inform usser of password reset
                        $subject = "Password Reset Succesful";
                        $txt = "Your account on SNH has just been updated. If you did not initiate a password change, please
                        visit SNH and resetyour password http://localhost/startngPHP/";

                        ini_set("SMTP", "smtp.mailtrap.io");
                        ini_set("sendmail_from", " no-reply@snh.org");
                        ini_set("smtp_port", "2525");

                        send_email($subject, $txt, $email);

                        if (isset($_SESSION['loggedin'])) {
                            $_SESSION['loggedin'] = $userObjects->id;
                            $_SESSION['fullname'] = $userObjects->first_name . " " . $userObjects->last_name;
                            $_SESSION['role'] = $userObjects->designation;
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
    //errormessage
    set_alert("error", "The password reset failed, Token/Email expired");
    redirect_to("login.php");
}
