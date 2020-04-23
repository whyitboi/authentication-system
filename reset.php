<?php include_once("lib/header.php");
require_once("functions/alert.php");
require_once("functions/users.php");
require_once("functions/token.php");
require_once("functions/redirect.php");


if ((!is_user_loggedIn()) && (!is_token_set())) {
    $_SESSION['error'] = "You're not authorised to view this page";
   redirect_to("login.php");
}



?>
<h3>Reset</h3>
Provide the email associated with your account

<form method="POST" action="processingReset.php">
    <p>
         <?php print_alert(); ?>
    </p>

    <?php
    if (!is_user_loggedIn()) {
    ?>

        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">

    <?php
    }
    ?>


    <p>
        <input value="email" type="text" name="email" placeholder="Email" />


    </p>

    <p>
        <label>Enter New Password</label><br />
        <input type="password" name="password" placeholder="Password" />
    </p>

    <p>
        <button type="submit">Reset Password</button>
    </p>
</form>

<?php
include_once("lib/menu.php");
include_once("lib/footer.php");

?>