<?php
include_once("lib/header.php");
require_once("functions/users.php");
require_once("functions/booking.php");
require_once("functions/redirect.php");

if (!is_user_loggedIn()) {
    redirect_to("login.php");
}
?>
<p>
            <?php print_error(); 
            print_message();
            ?>
</p>

<div class='pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center'>
    <p class='lead'>Appointments</p>

    <?php
   find_appointments($_SESSION["department"]);
?>

</div>


<?php 
include_once("lib/footer.php"); ?>