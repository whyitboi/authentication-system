<?php 
include_once("lib/header.php");
if(isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])){
     header("Location: dashboard.php");
  }

  ?>
 <h3> Login</h3>
 <p>
  <?php
     if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
          print "<span style='color:red'>" . $_SESSION['message'] . "</span>";
           session_unset();
          session_destroy(); 
          
     }
     ?>
 </p>

<form method="POST" action="processingLogin.php">
     <p>
          <?php
          if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
               print "<span style='color:red'>" . $_SESSION['error'] . "</span>";
               //session_unset();
               session_destroy(); 
          }
          ?>
          
     </p>


     <p>
          <label>Email</label><br />
          <input 
          <?php
                    if(isset($_SESSION['email'])){
                         print "value =".$_SESSION['email'];
                    }

               ?>
               type="text" name="email" placeholder="Email"  />
     </p>

     <p>
          <label>Password</label><br />
          <input type="password" name="password" placeholder="Password" />
     </p>

     <p>
          <button type="submit">Login</button>
     </p>

</form>
<?php
     include_once("lib/menu.php");

     include_once("lib/footer.php");

?>