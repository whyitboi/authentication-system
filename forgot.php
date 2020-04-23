<?php include_once("lib/header.php");
require_once("functions/alert.php");
?>

<div class="col-md-5 text-center px-3 py-3 mx-auto">

    <div class="py-5 text-center ">
        <p class="lead">Forgot Password</p>
    </div>
    <p>
        <?php print_alert(); ?>
    </p>

    <h3></h3>
    Provide the email associated with your account

    <form method="POST" action="processingForgot.php">
        <p>
            <input type="text" class="form-control" name="email" placeholder="Email" />
        </p>
        <p>
            <div class="text-center"> <button type="submit" class="btn btn-primary btn-lg ">Reset Password</button></div>
        </p>
    </form>
</div>
<?php
include_once("lib/footer.php");

?>