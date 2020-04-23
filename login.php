<?php
include_once("lib/header.php");
require_once("functions/alert.php");
require_once("functions/email.php");

if (isset($_SESSION['loggedin']) && !empty($_SESSION['loggedin'])) {
     header("Location: dashboard.php");
}

?>
<div class="container">
     <div class="py-5 text-center ">
          <h3 class="display-4">Login</h3>
     </div>
     <p>
          <?php print_alert() ?>
     </p>

     <form method="POST" action="processingLogin.php">
     <div class="row">   
          <div class="col-md-6 mb-3">
               <label>Email</label><br />
               <input <?php
                         if (is_email_set()) {
                              print "value =" . $_SESSION['email'];
                         }

                         ?> type="text" class="form-control" name="email" placeholder="Email" />
               <div class="invalid-feedback">
                    Valid email name is required.
               </div>
          </div>

          <div class="col-md-6 mb-3">
               <label>Password</label><br />
               <input type="password" class="form-control" name="password" placeholder="Password" />
          </div>
     </div><br>


          <div class="text-center"> <button type="submit" class="btn btn-primary btn-lg ">Login</button></div>


     </form>
</div>

<?php


include_once("lib/footer.php");

?>