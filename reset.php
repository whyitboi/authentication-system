<?php
include_once("lib/header.php");
require_once("functions/alert.php");
require_once("functions/users.php");
require_once("functions/token.php");
require_once("functions/redirect.php");


if ((!is_user_loggedIn()) && (!is_token_set())) {
    $_SESSION['error'] = "You're not authorised to view this page";
    redirect_to("login.php");
}
?>
<p>
    <?php print_error();
    print_message();
    ?>
</p>

<p>


    <div class='col-md-5 text-center px-3 py-3 mx-auto'>

        <form method="POST" action="processingReset.php">
            <?php
            if (!is_user_loggedIn()) {
            ?>
                <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
            <?php
            }
            ?>


            <p>
                <input value="email" class="form-control" type="text" name="email" placeholder="Email" />


            </p>

            <p>
                <label>Enter New Password</label><br />
                <input type="password" class="form-control" name="password" placeholder="Password" />
            </p>

            <p>
                <button type="submit">Reset Password</button>
            </p>
        </form>


    </div>

    <?php
    include_once("lib/footer.php"); ?>