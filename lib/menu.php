
<p>
    <?php
    if (!isset($_SESSION['loggedin'])) {
    ?>
        <a href="index.php">Home</a> |
        <a href="login.php">Login</a> |
        <a href="register.php">Register</a> |
        <a href="forgot.php">Forgot Password</a> |

    <?php } else if ((isset($_SESSION['loggedin'])) && ($_SESSION['role'] == "superUser")){ ?>
        
        <a href="dashboard.php">Dashboard</a> |        
        <a href="register.php">Add New User</a> |
        <a href="forgot.php">Change Password</a> |
        <a href="logout.php">Logout</a> |

    <?php } else { ?>

<a href="logout.php">Logout</a> |
<a href="forgot.php">Change Password</a> |
<?php } ?>
    

</p>