<?php
include_once("lib/header.php");
require_once("functions/alert.php");
require_once("functions/users.php");
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
}
?>

<h3>List of all Medical Staff</h3>
<br>


<?php 

list_all_staff();




?>

<?php 
include_once("lib/footer.php"); ?>