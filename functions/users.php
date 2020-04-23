<?php
include_once("alert.php");

//Function to check if user is looged in
function is_user_loggedIn()
{
    if (isset($_SESSION['loggedin']) && (!empty($_SESSION['loggedin']))) {
        return true;
    }
    return false;
}

//Function to check if user is a patient
function is_patient()
{
    if ($_SESSION['designation'] == "Patient") {
        return true;
    }
    return false;
}

function is_patient_args($designation ="")
{
    if ($designation == "Patient") {
        return true;
    }
    return false;
}


//Function to set the ID ofthe user
function set_user_id($designation = "")
{
    if ($designation == "Patient") {

        $allStaff = scandir("db/users/patients/");
        $countAllStaff = count($allStaff);
        $newStaffId = $countAllStaff - 1;

        return "SNHP" . $newStaffId;
    } else if ($designation == "Medical Team") {

        $allStaff = scandir("db/users/staff/");
        $countAllStaff = count($allStaff);
        $newStaffId = $countAllStaff - 1;

        return "SNHS" . $newStaffId;
    }
}


//Function to find users
function find_user($email = "")
{
    if (!isset($email)) {
        set_alert("error", "User email is not set");
    }


    $allStaff = scandir("db/users/staff/");
    $countAllStaff = count($allStaff);


    for ($counter = 0; $counter < $countAllStaff; $counter++) {

        $currentUser = $allStaff[$counter];

        //collect password form user and DB
        if ($currentUser == $email . ".json") {

            $userObjects = json_decode(file_get_contents("db/users/staff/" . $currentUser));
            return $userObjects;
        }
    }

    $allPatients = scandir("db/users/patients/");
    $countAllPatients = count($allPatients);


    for ($counter = 0; $counter < $countAllPatients; $counter++) {

        $currentUser = $allPatients[$counter];

        //collect password form user and DB
        if ($currentUser == $email . ".json") {

            $userObjects = json_decode(file_get_contents("db/users/patients/" . $currentUser));
            return $userObjects;
        }
    }

    return false;
}


//Function to check if Medical Director Exists
function md_exists()
{
    $allStaff = scandir("db/users/staff/");
    $countAllStaff = count($allStaff);

    if ($countAllStaff > 0) {
        return true;
    }
    return false;
}


//Function to save staff to db
function save_staff($userObject = "")
{
    $Objectemail = $_SESSION['email'];
    file_put_contents("db/users/staff/" . $Objectemail. ".json", json_encode($userObject));
}


//Function to save patient to db
function save_patients($userObject = "")
{
    $Objectemail = $_SESSION['email'];
    file_put_contents("db/users/patients/" . $Objectemail . ".json", json_encode($userObject));
}


//Function to list all staff
function list_all_staff()
{
    $allStaff = scandir("db/users/staff/");
    $countAllStaff = count($allStaff);

    
    print "<div>";
    print "<table style='width:50%' class='text-center'>";
    print "<tr> <th>Patient ID</th> <th>Patient Name</th></tr>";
    for ($counter = 2; $counter < $countAllStaff; $counter++) {

        $currentUser = $allStaff[$counter];

        $userObjects = json_decode(file_get_contents("db/users/staff/" . $currentUser));

        print "<tr><td>" . $userObjects->id . "</td><td>" . $userObjects->first_name . " " . $userObjects->last_name . "</td></tr>";
    }
    print "</table>";
    print "</div>";
}


//Function to list all patients
function list_all_patients()
{

    $allPatients = scandir("db/users/patients/");
    $countAllPatients = count($allPatients);


    print "<div>";
    print "<table style='width:50%' class='text-center'>";
    print "<tr> <th>Patient ID</th> <th>Patient Name</th></tr>";
    for ($counter = 2; $counter < $countAllPatients; $counter++) {

        $currentUser = $allPatients[$counter];

        $userObjects = json_decode(file_get_contents("db/users/patients/" . $currentUser));

        print "<tr><td>" . $userObjects->id . "</td><td>" . $userObjects->first_name . " " . $userObjects->last_name . "</td></tr>";
    }
    print "</table>";
    print "</div>";
}
