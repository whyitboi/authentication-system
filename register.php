          <?php
          include_once("lib/header.php");
          require_once("functions/alert.php");
          require_once("functions/users.php");
          require_once("functions/redirect.php");
          
          
          ?>
     
          <div class="container">

               <div class="py-5 text-center ">
                    <h2 class="display-4">Registration Form</h2>
                    <p class="lead">All fields are <strong>REQUIRED</strong>.</p>
               </div>

               <form method="POST" action="processingRegister.php">
                    <p>
                         <?php print_error(); 
                         print_message();?>
                    </p>
                    <div class="row">
                         <div class="col-md-6 mb-3">
                              <label>First Name</label><br />

                              <input <?php

                                        if (isset($_SESSION['first_name'])) {
                                             print "value =" . $_SESSION['first_name'];
                                        }

                                        ?> type="text" class="form-control" name="first_name" placeholder="First Name" />
                              <div class="invalid-feedback">
                                   Valid first name is required.
                              </div>
                         </div>


                         <div class="col-md-6 mb-3">
                              <label>Last Name</label><br />
                              <input <?php
                                        if (isset($_SESSION['last_name'])) {
                                             print "value =" . $_SESSION['last_name'];
                                        }

                                        ?> type="text" class="form-control" name="last_name" placeholder="Last Name" />
                              <div class="invalid-feedback">
                                   Valid last name is required.
                              </div>
                         </div>
                    </div>




                    <div class="mb-3">
                         <label>Email</label><br />
                         <input <?php
                                   if (isset($_SESSION['email'])) {
                                        print "value =" . $_SESSION['email'];
                                   }

                                   ?> type="text" class="form-control" name="email" placeholder="Email" />
                         <div class="invalid-feedback" style="width: 100%;">
                              Your email is required.
                         </div>
                    </div>

                    <div class="mb-3">
                         <label>Password</label><br />
                         <input type="password" class="form-control" name="password" placeholder="Password" />
                         <div class="invalid-feedback" style="width: 100%;">
                              Your email is required.
                         </div><br>

                         <div class="row">
                              <div class="col-md-3 mb-3">

                                   <label>Gender</label><br />
                                   <select name="gender" class="custom-select d-block w-100">
                                        <option value="">Select One</option>
                                        <option <?php
                                                  if (isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male') {
                                                       print "selected";
                                                  }

                                                  ?>>Male</option>
                                        <option <?php
                                                  if (isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female') {
                                                       print "selected";
                                                  }

                                                  ?>>Female</option>
                                   </select>
                                   <div class="invalid-feedback">
                                        Please select a valid gender.
                                   </div>
                              </div>

                              <div class="col-md-4 mb-3">
                                   <label>Designation</label><br />
                                   <select name="designation" class="custom-select d-block w-100">
                                        <option value="">Select One</option>
                                        <option <?php
                                                   if (md_exists()) {
                                                       print "disabled";
                                                  } else if (isset($_SESSION['designation']) && $_SESSION['designation'] == 'MD') {
                                                       print "selected";
                                                  }

                                                  ?>>Medical Director</option>
                                        <option <?php
                                        if (!md_exists()) {
                                             print "disabled";
                                        } else if (isset($_SESSION['designation']) && $_SESSION['designation'] == 'Medical Team') {
                                                       print "selected";
                                                  }

                                                  ?>>Medical Team</option>
                                        <option <?php if (!md_exists()) {
                                                       print "disabled";
                                                  } else  if (isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patient') {
                                                       print "selected";
                                                  }

                                                  ?>>Patient</option>
                                   </select>
                                   <div class="invalid-feedback">
                                        Please select a valid designation.
                                   </div>
                              </div>

                              <div class="col-md-3 mb-3">
                                   <label>Department</label><br />
                                   <input <?php
                                             if (isset($_SESSION['department'])) {
                                                  print "value =" . $_SESSION['department'];
                                             }

                                             ?> type="text" class="form-control" name="department" placeholder="Department" />
                                   <div class="invalid-feedback">
                                        Valid department is required.
                                   </div>
                              </div>
                         </div><br>

                         <div class="text-center"> <button type="submit" class="btn btn-primary btn-lg ">Register</button></div>

                         </p>

               </form>
          </div>
          <?php
          
          include_once("lib/footer.php");

          ?>