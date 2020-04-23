


<?php
include_once("lib/header.php");
require_once("functions/alert.php");
require_once("functions/users.php");
require_once("functions/redirect.php");


if (is_user_loggedIn()) {
    redirect_to("patientDashboard.php");
}
?>


<div class="container">

    <div class="py-5 text-center ">
        <h2 class="display-4">Book Appointment</h2>
        <p class="lead">Fill the form to book an appointment.</p>
        <p>
            <?php //print_alert(); ?>
        </p>
    </div>

    <form method="POST" action="processingAppointment.php">

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Select a Date:</label><br />

                <input <?php

                        if (isset($_SESSION['appointment_date'])) {
                            print "value =" . $_SESSION['appointment_date'];
                        }

                        ?> type="date" class="form-control" name="appointment_date" />
                <div class="invalid-feedback">
                    Valid date is required.
                </div>
            </div>


            <div class="col-md-6 mb-3">
                <label>Select a Time:</label><br />
                <input <?php
                        if (isset($_SESSION['appointment_time'])) {
                            print "value =" . $_SESSION['appointment_time'];
                        }

                        ?> type="time" class="form-control" name="appointment_time" />
                <div class="invalid-feedback">
                    Valid last name is required.
                </div>
            </div>
        </div><br>

        <div class="mb-3">
            <br>

            <div class="row">
                <div class="col-md-4 mb-3">

                    <label>Nature of Appointment</label><br />
                    <select name="appointment_nature" class="custom-select d-block w-100">
                        <option value="">Select One</option>
                        <option <?php
                                if (isset($_SESSION['appointment_nature']) && $_SESSION['appointment_nature'] == 'Personal') {
                                    print "selected";
                                }

                                ?>>Personal</option>
                        <option <?php
                                if (isset($_SESSION['appointment_nature']) && $_SESSION['appointment_nature'] == 'Official') {
                                    print "selected";
                                }

                                ?>>Official</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid gender.
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
            </div>


            <div class="mb-3">
                <label>Initial Complaint</label><br />
                <textarea <?php
                            if (isset($_SESSION['initial_complaint'])) {
                                print "value =" . $_SESSION['initial_complaint'];
                            }

                            ?> rows="5" cols="50" class="form-control" name="initial_complaint" placeholder="Enter a short description of your complaint"></textarea>
            </div>

            <br>

            <div class="text-center"> <button type="submit" class="btn btn-primary btn-lg ">Book</button></div>

            </p>

    </form>
</div>
<?php

include_once("lib/footer.php");

?>