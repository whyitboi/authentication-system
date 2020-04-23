<?php
session_start();
require_once("functions/alert.php");
require_once("functions/users.php");
require_once("functions/booking.php");
require_once("functions/redirect.php");

//collecting & validating data
$errorCount = 0;
$appointment_date =$_POST["appointment_date"] != "" ? $_POST["appointment_date"] : $errorCount++;
$appointment_time =$_POST["appointment_time"] != "" ? $_POST["appointment_time"] : $errorCount++;
$appointment_nature =$_POST["appointment_nature"] != "" ? $_POST["appointment_nature"] : $errorCount++;
$department =$_POST["department"] != "" ? $_POST["department"] : $errorCount++;
$initial_complaint =$_POST["initial_complaint"] != "" ? $_POST["initial_complaint"] : $errorCount++;


$_SESSION["appointment_date"] = $appointment_date;
$_SESSION["appointment_time"] = $appointment_time;
$_SESSION["appointment_nature"] = $appointment_nature;
$_SESSION["department"] = $department;
$_SESSION["initial_complaint"] = $initial_complaint;



if($errorCount > 0){
    //errormessage
    set_alert("error", "You have ".$errorCount." error(s) in your form");
    redirect_to("bookAppointment.php");
}else{

    $appointmentObject = [
        "id" => set_appointment_id(),
        "aurthor_id" => $_SESSION['loggedin'],
        "aurthor" => $_SESSION['fullname'],
        "appointment_date" => $appointment_date,
        "appointment_time"=> $appointment_time,
        "appointment_nature" => $appointment_nature,
        "department" => $department,
        "initial_complaint" => $initial_complaint

    ];


        //save user to db
          if(save_booking($appointmentObject)){
            set_alert("message", "Your booking has been submitted");
            redirect_to("patientDashboard.php");
          }else{
            set_alert("error", "Your booking has NOT been submitted");
            redirect_to("bookAppointment.php");
          }
        
}

?>