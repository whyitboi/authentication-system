<?php
session_start();

//collecting & validating data
$errorCount = 0;
$first_name =$_POST["first_name"] != "" ? $_POST["first_name"] : $errorCount++;
$last_name =$_POST["last_name"] != "" ? $_POST["last_name"] : $errorCount++;
$email =$_POST["email"] != "" ? $_POST["email"] : $errorCount++;
$designation =$_POST["designation"] != "" ? $_POST["designation"] : $errorCount++;
$gender =$_POST["gender"] != "" ? $_POST["gender"] : $errorCount++;
$department =$_POST["department"] != "" ? $_POST["department"] : $errorCount++;
$password = $_POST["password"];

$_SESSION["first_name"] = $first_name;
$_SESSION["last_name"] = $last_name;
$_SESSION["email"] = $email;
$_SESSION["designation"] = $designation;
$_SESSION["gender"] = $gender;
$_SESSION["department"] = $department;

if($errorCount > 0){
    //errormessage
    $_SESSION['error'] = "You have ".$errorCount." error(s) in your form";
    header("Location: register.php");
}
else{


    //continue to program
    //count all users
    $allusers = scandir("db/users/staff/");
    $countAllUsers = count($allusers);
 
    $newUserId = $countAllUsers-1;

    //creating super user
    if($newUserId == 1){
        $userObject = [
            "id" => $newUserId,
            "first_name" => $first_name,
            "last_name"=> $last_name,
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT), //password hashing
            "gender" => $gender,
            "designation" => "superUser",
            "department" => $department,
            "registerDate" => date("d.M.Y")
    
        ];

    }else{
        $userObject = [
            "id" => $newUserId,
            "first_name" => $first_name,
            "last_name"=> $last_name,
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT), //password hashing
            "gender" => $gender,
            "designation" => $designation,
            "department" => $department,
            "registerDate" => date("d.M.Y")
    
        ];
    }



    //check if user exists
    for($counter = 0; $counter <= $countAllUsers; $counter++){
        
        $currentUser = $allusers[$counter];

        if($currentUser == $email.".json"){
            $_SESSION['error'] = "Registeration failed, User already exists";
            header("Location: register.php");
            die();
        }
    }


    file_put_contents("db/users/staff/".$email.".json", json_encode($userObject));
   // print "<script type='text/javascript'>alert('Registeration Succesful')</script>";
   // session_unset();

    $_SESSION['message'] = "You can login in now as ". $first_name;

    if($_SESSION['role'] == 'superUser'){
        header("Location: dashboard.php");
    }
    else{
        header("Location: login.php");

    }
    
}

//Saving data to file

//Return back to home with staus message
?>