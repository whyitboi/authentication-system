<?php
session_start();

$errorCount = 0;

$email =$_POST["email"] != "" ? $_POST["email"] : $errorCount++;
$password = $_POST["password"];

$_SESSION['email'] = $email;
$_SESSION['password'] = password_hash($password, PASSWORD_DEFAULT);

if($errorCount > 0){
        //errormessage
        $_SESSION['error'] = "email or password incorrect";
        header("Location: login.php");
}
 else{
    $allusers = scandir("db/users/staff/");
    $countAllUsers = count($allusers);

    for($counter = 0; $counter < $countAllUsers; $counter++){
         $currentUser = $allusers[$counter];

         //collect password form user and DB
         if($currentUser == $email.".json"){
           $userObjects = json_decode(file_get_contents("db/users/staff/". $currentUser));
           $passwordFromDB = $userObjects->password; 
           $passwordFromUser =  password_verify($password, $passwordFromDB);
           
           //compare passwords and redirect to dashboard
           if($passwordFromDB == $passwordFromUser){
               $_SESSION['loggedin'] = $userObjects->id;
               $_SESSION['fullname'] = $userObjects->first_name." ".$userObjects->last_name;
               $_SESSION['role'] = $userObjects->designation;
               $_SESSION['department'] = $userObjects->department;
               $_SESSION['registerDate'] = $userObjects->registerDate;
               $_SESSION['lastlogin'] = date("H:i, d.M.Y");
               if($_SESSION['role'] == "superUser"){
                header("Location: dashboard.php"); 
               }else{
                header("Location: dashboardUser.php");
               }
                die();
           }
        }

    }
       //errormessage if password fails
       $_SESSION['error'] = "email or password incorrect";
        header("Location: login.php"); 
 }

?>