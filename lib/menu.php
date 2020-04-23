    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm ">
        <h5 class="my-0 mr-md-auto font-weight-normal">StartNG Hospital</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <?php
            if (!isset($_SESSION['loggedin'])) {
            ?>
                <a class="p-2 text-dark" href="index.php">Home</a>

            <?php }

            if (!isset($_SESSION['loggedin'])) {
            ?>

                <a class="p-2 text-dark" href="login.php">Login</a>
            <?php } else { ?>
                <a class="p-2 text-dark" href="logout.php">Logout</a>
                <a class="p-2 text-dark" href="reset.php">Change Password</a>
            <?php }
            if (!isset($_SESSION['loggedin']) && ucfirst(pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME)) == "Register") {
            ?>
                <a class="p-2 text-dark" href="forgot.php">Forgot Password</a>
            <?php }
            ?>
        </nav>
        <?php
        if (!isset($_SESSION['loggedin'])) {
        ?>
            <a class="btn btn-outline-primary" href="register.php">Sign up</a>
        <?php } ?>
    </div>