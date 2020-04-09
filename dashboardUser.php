<?php
include_once("lib/header.php");
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
}
?>

<h3>Dashboard User</h3>
Welcome, <?php print $_SESSION['fullname']; ?>, You are logged in as <?php print $_SESSION['role']; ?> 
<br>Your Department is  <?php print $_SESSION["department"]; ?> <br>

This user was registered on <?php print $_SESSION['registerDate']; ?> <br>
with last login on <?php print $_SESSION['lastlogin']; ?>
<?php include_once("lib/menu.php");
include_once("lib/footer.php"); ?>