<?php
include_once("lib/header.php");
require_once("functions/users.php");
if (!is_user_loggedIn()) {
    header("Location: login.php");
}
?>


<div class="container">


    <div class='pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center'>
        <p class='lead'>Dashboard</p>

        <p>
            <?php print_error();
            print_message();
            ?>
        </p>

        <p> Welcome, <?php print $_SESSION['fullname']; ?>, You are logged in as <?php print $_SESSION['designation']; ?>
            <br>Your Department is <?php print $_SESSION["department"]; ?></p><br>

        <a class="btn btn-bg btn-outline-secondary" href="payBill.php">Pay Bill</a>
        <a class="btn btn-bg btn-outline-primary" href="bookAppointment.php">Book Appointment</a>


    </div>
</div>



<?php
include_once("lib/footer.php"); ?>