<?php
include_once("lib/header.php");
require_once("functions/alert.php");
require_once("functions/users.php");
if (!is_user_loggedIn()) {
    header("Location: login.php");
}
?>

<h3>Dashboard Medical Team</h3>

<p>
            <?php print_error(); 
            print_message();
            ?>
</p>

Welcome, <?php print $_SESSION['fullname']; ?>, You are logged in as <?php print $_SESSION['designation']; ?> 
<br>Your Department is  <?php print $_SESSION["department"]; ?> <br>

This user was registered on <?php print $_SESSION['register_date']; ?> <br>
with last login on <?php print $_SESSION['last_login']; ?><br>

<a class="btn btn-bg btn-outline-primary" href="viewAppointments.php" >View Appointments</a>



<?php 
include_once("lib/footer.php"); ?>