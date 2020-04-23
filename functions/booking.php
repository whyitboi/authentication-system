<?php
require_once("functions/alert.php");
require_once("functions/redirect.php");

function set_appointment_id(){

    $allBooking = scandir("db/booking/");
    $countAllBooking = count($allBooking);
    $newBookingId = $countAllBooking - 1;

    return $newBookingId;

}

function save_booking($appointmentObject = ""){

   if(file_put_contents("db/booking/" . $appointmentObject['id']. $appointmentObject['aurthor'] .".json", json_encode($appointmentObject))){
       return true;
   }
   return false;
}


function find_appointments($department = "")
{
    if (!isset($department)) {
        set_alert("error", "User email is not set");
        die();
    }

    $dir  = scandir("db/booking/");
    $countAllBooking = count($dir);


    if($countAllBooking <= 2){
        set_alert("message",  "You have no Pending Bookings");
        redirect_to("medicalTeamDashboard.php");
        die();

    }else{
        
        print "<div>";
        print "<table style='width:100%' class='text-center'>";
        print "<tr> <th>Patient Name</th> <th>Date of Appointment</th> <th>Nature of Appointment</th> <th>Initial Complaint</th></tr>";
        for ($counter = 2; $counter < $countAllBooking; $counter++) {

            $currentUser = $dir[$counter];
    
          $userObjects = json_decode(file_get_contents("db/booking/".$currentUser));
    
          if($department == $userObjects->department ){
              
            print "<tr><td>".$userObjects->aurthor."</td><td>".$userObjects->appointment_date."</td><td>".$userObjects->appointment_nature."</td><td>".$userObjects->initial_complaint. "</td></tr>";
    
          }
        }
        print "</table>";
        print "</div>";
    }
}


?>