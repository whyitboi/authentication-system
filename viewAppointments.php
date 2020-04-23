<?php
include_once("lib/header.php");
require_once("functions/users.php");
require_once("functions/booking.php");

if (!is_user_loggedIn()) {
    header("Location: login.php");
}
?>

<h3>View your appointments</h3>
<p>
            <?php print_error(); 
            print_message();
            ?>
</p>


<?php


   find_appointments($_SESSION["department"]);
?>



<?php 
include_once("lib/footer.php"); ?>