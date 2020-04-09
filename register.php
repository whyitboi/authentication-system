<?php
include_once("lib/header.php");
if(isset($_SESSION['loggedin']) && $_SESSION['role'] != "superUser"){
   header("Location: dashboard.php");
}
 ?>
<script language="JavaScript" src="regEx.js"></script>

<p><strong>Welcome Please Register</strong></p>
<p>All fields are <strong>REQURED</strong></p>

<form method="POST" action="processingRegister.php">
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
          <label>First Name</label><br />
          
          <input 
               <?php
               
                    if(isset($_SESSION['first_name'])){
                         print "value =" . $_SESSION['first_name'];
                    }

               ?>
                type="text" name="first_name" placeholder="First Name" pattern="(^[A-Za-z].{2,30})$" title="Name cannot be blank or conatin numbers
                 and must be at least 2 or more characters" required/>
     </p>

     <p>
          <label>Last Name</label><br />
          <input
          <?php
                    if(isset($_SESSION['last_name'])){
                         print "value =".$_SESSION['last_name'];
                    }

               ?>
                type="text" name="last_name" placeholder="Last Name" pattern="(^[A-Za-z].{2,30})$" title="Name cannot be blank or conatin numbers
                 and must be at least 2 or more characters" required />
     </p>

     <p>
          <label>Email</label><br />
          <input 
          <?php
                    if(isset($_SESSION['email'])){
                         print "value =".$_SESSION['email'];
                    }

               ?>
               type="text" name="email" placeholder="Email" pattern="([a-z0-9._%+-]{5,})+@[a-z0-9.-]+\.[a-z]{2,}$" title="must be valid email, must not be empty,
               must have @ and . in it and must be at least 5 or more characters" required  />
     </p>

     <p>
          <label>Password</label><br />
          <input type="password" name="password" placeholder="Password" /> <!-- pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" -->
     </p>

     <p>
          <label>Gender</label><br />
          <select name="gender" >
               <option value="">Select One</option>
               <option 
               <?php
                    if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Male'){
                         print "selected";
                    }

               ?>
               >Male</option>
               <option 
               <?php
                    if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'Female'){
                         print "selected";
                    }

               ?>
               >Female</option>
          </select>
     </p>

     <p>
          <label>Designation</label><br />
          <select name="designation" >
               <option value="">Select One</option>
               <option <?php
                    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Medical Team'){
                         print "selected";
                    }

               ?>
               >Medical Team</option>
               <option <?php
                    if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patient'){
                         print "selected";
                    }

               ?>
               >Patient</option>
          </select>
     </p>
     <p>
          <label>Department</label><br />
          <input
          <?php
                    if(isset($_SESSION['department'])){
                         print "value =".$_SESSION['department'];
                    }

               ?>
                type="text" name="department" placeholder="Department" required/>
     </p>


     <p>
          <button type="submit" id= "" onclick="">Register</button>
     </p>

</form>

<?php
 include_once("lib/menu.php");
include_once("lib/footer.php");

?>