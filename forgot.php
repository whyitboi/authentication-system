<?php include_once("lib/header.php");
require_once("functions/alert.php");
?>
<h3>Forgot</h3>
Provide the email associated with your account

<form method="POST" action="processingForgot.php">
    <p>
    <?php print_alert(); ?>
    </p>
    <p>
        <input type="text" name="email" placeholder="Email" />
    </p>
    <p>
        <button type="submit">Reset Password</button>
    </p>
</form>
<?php include_once("lib/menu.php");
include_once("lib/footer.php");

?>