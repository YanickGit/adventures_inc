
    <?php
        $title = 'Edit Records';
        require_once 'includes/header.php';
        require_once 'includes/auth_check.php';
        require_once 'db/db_connect.php';

        //get all specialization
        $results = $crud->getSpecialization();

        //get all Status
        $resultsStatus = $crud->getStatus();
        

        if (!isset($_GET['id'])) {
            //echo '<h1 class = "text-center text-danger">Please check details and try again.</h1>';
            include 'includes/error_message.php';
        } else {
            $id = $_GET['id'];
            $attendee = $crud->getAttendeeDetails($id);
    ?>
    
    

    <form method="post" action="editpost.php" enctype="multipart/form-data" autocomplete="off">
        


        
        <div class="form-group">    
            <label for="status">Status</label>
                <select class="form-control" value="<?php echo $attendee['status_id'] ?>" id="status1" name="status1" required>
                   
                    <?php while($row = $resultsStatus->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $row['status_id'] ?>"
                            <?php 
                                if ($row['status_id'] == $attendee['status_fk']) echo 'selected'
                            ?>>
                            <?php echo $row['status1'] ?>
                        </option>
                    <?php } ?>
                
                </select>
        </div>

        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstname" name="firstname" aria-describedby="firstname"  required>
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastname" name="lastname" aria-describedby="lastname"  required>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $attendee['dob'] ?>" id="dob" name="dob" aria-describedby="dob" required readonly>
            <small id="dobHelp" class="form-text text-muted">The minimum age is 16 years old.</small>
        </div>
        <!-- Pull List From Database -->
        <div class="form-group">    
            <label for="specialization">Specialization</label>
                <select class="form-control" value="<?php echo $attendee['specialization_id'] ?>" id="specialization" name="specialization" required>
                   
                    <?php while($row = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $row['specialization_id'] ?>"
                            <?php 
                                if ($row['specialization_id'] == $attendee['specialization_id']) echo 'selected'
                            ?>>
                            <?php echo $row['name'] ?>
                        </option>
                    <?php } ?>
                
                </select>
            <small id="specializationHelp" class="form-text text-muted">Select your specialization/s.</small>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" value="<?php echo $attendee['email'] ?>" id="email" name="email" aria-describedby="emailHelp"  required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="contact_num">Contact Number</label>
            <input type="tel" class="form-control" value="<?php echo $attendee['contact_num'] ?>" id="contact_num" name="contact_num" aria-describedby="contact_numHelp" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" >
            <small id="contact_numHelp" class="form-text text-muted">We'll never share your contact number with anyone else. (format: 123-456-7890)</small>
        </div>
        <button type="submit" name="submit" class="btn btn-info btn-block">View List</button>
        <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
    </form>

    <!--============================================================================================================-->

    <h2 class = "text-center">Modify Adventurer Details</h2>
    <input type="hidden" id="" name="client_id" value="<?php echo $attendee['client_id'] ?>" />
    <input type="hidden" id="" name="registered_on" value="<?php echo $attendee['registered_on'] ?>" />


    <form method="post" action="edit-a-client-action.php" enctype="multipart/form-data" autocomplete="off">
    
    <div class="row">
    <div class="col">
    <img id="signup-img" src="images/team/__blank.jpg" alt="Placeholder">
    <small id="help" class="form-text text-muted">Preview</small>
      </div>
    </div>
  <br>
  
  <div class="row">
    <div class="col">
    <input type="file" class="form-control-file" id="image" accept="image/*" onchange="previewImage(this);" placeholder="Upload Your Picture " name="image" >
		<small id="help" class="form-text text-muted">Upload your picture, maximum size 2MB.</small>
      </div>
    </div>
	<br>
	
	<div class="row">
      <div class="col">
		<input type="text" class="form-control" id="firstname" placeholder="Type Your Firstname" name="firstname" required>
		<small id="firstnameHelp" class="form-text text-muted">Type your firstname.</small>
      </div>
      <div class="col">
        <input type="text" class="form-control" id="lastname" placeholder="Type Your Lastname" name="lastname" required>
		<small id="help" class="form-text text-muted">Type your lastname.</small>
      </div>
    </div>
    <br>
	
	<div class="row">
      <div class="col">
		<select class="form-control" id="adventures" name="adventures" required>
                   
                    <?php while($row = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $row['adventures_id'] ?>"><?php echo $row['adventures_name'] ?></option>
                    <?php } ?>
                
                </select>
            <small id="help" class="form-text text-muted">Select your adventure.</small>
      </div>
      <div class="col">
		<input type="text" class="form-control" id="dob" name="dob" placeholder="Select Your Date of Birth" required readonly>
            <small id="help" class="form-text text-muted">The minimum age is 16 years old.</small>
      </div>
    </div>
    <br>
	
		<div class="row">
      <div class="col">
		<input type="email" class="form-control" id="email" name="email" placeholder="Type Your Email"  required>
            <small id="help" class="form-text text-muted">Type your email, we'll never share your email with anyone else.</small>
      </div>
      <div class="col">
		<input type="tel" class="form-control" id="contact_num" name="contact_num" aria-describedby="contact_numHelp" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" >
            <small id="help" class="form-text text-muted">Type your phone number, we'll never share your contact number with anyone else. (format: 123-456-7890)</small>
      </div>
    </div>
    <br>
	
	<div class="row">
      <div class="col">
		<button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
      </div>
      <div class="col">
        <button type="reset" name="reset" class="btn btn-warning btn-block">Reset</button>
      </div>
    </div>
	<br><br>
  </form>
    






    <?php } ?>
   
    <?php
        require_once 'includes/footer.php';
    ?>