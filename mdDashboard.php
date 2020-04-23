<?php
include_once("lib/header.php");
require_once("functions/alert.php");
require_once("functions/users.php");
require_once("functions/redirect.php");

if (!is_user_loggedIn()) {
    redirect_to("login.php");
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
            <br>Your Department is <?php print $_SESSION["department"]; ?>

            This user was registered on <?php print $_SESSION['register_date']; ?> <br>
            with last login on <?php print $_SESSION['last_login']; ?></p><br>

        <a class="btn btn-bg btn-outline-secondary" href="viewAllStaff.php">Viiew all staff</a>
        <a class="btn btn-bg btn-outline-secondary" href="viewAllPatients.php">View all patient</a>
        <a class="btn btn-bg btn-outline-primary" href="register.php">Add new user</a>

    </div>
</div>

<?php
include_once("lib/footer.php"); ?>