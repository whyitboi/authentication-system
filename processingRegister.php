<?php
session_start();
require_once("functions/users.php");
require_once("functions/redirect.php");

//collecting & validating data
$errorCount = 0;
$first_name =$_POST["first_name"] != "" ? $_POST["first_name"] : $errorCount++;
$last_name =$_POST["last_name"] != "" ? $_POST["last_name"] : $errorCount++;
$email =$_POST["email"] != "" ? $_POST["email"] : $errorCount++;
$designation =$_POST["designation"] != "" ? $_POST["designation"] : $errorCount++;
$gender =$_POST["gender"] != "" ? $_POST["gender"] : $errorCount++;
$department =$_POST["department"] != "" ? $_POST["department"] : $errorCount++;
$password = $_POST["password"] != "" ? $_POST["password"] : $errorCount++;

$_SESSION["first_name"] = $first_name;
$_SESSION["last_name"] = $last_name;
$_SESSION["email"] = $email;
$_SESSION["designation"] = $designation;
$_SESSION["gender"] = $gender;
$_SESSION["department"] = $department;

if($errorCount > 0){
    //errormessage
    set_alert("error", "You have ".$errorCount." error(s) in your form");
    redirect_to("register.php");
}else{

    $userObject = [
        "id" => set_user_id($designation),
        "first_name" => $first_name,
        "last_name"=> $last_name,
        "email" => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT), //password hashing
        "gender" => $gender,
        "designation" => $designation,
        "department" => $department,
        "register_date" => date("d.M.Y")

    ];

    //check if user exists
    
        if(find_user($email)){
            set_alert("error", "Registeration failed, User already exists");
            redirect_to("register.php");
            die();
        }


        //save user to db
        if(is_patient()){
            save_patients($userObject);
        }else{
            save_staff($userObject);            
        }


        set_alert("message", "You can login in now as ". $first_name);

        if(!is_user_loggedIn()){
            redirect_to("login.php");
        }else{
            if ( ($_SESSION['designation'] == "MD")) {
                redirect_to("mdDashboard.php");
            } else if (($_SESSION['designation'] == "Medical Team")){
                redirect_to("medicalTeamDashboard.php");
            } else{
                redirect_to("patientDashboard.php");
            }
        }
        
}

?>