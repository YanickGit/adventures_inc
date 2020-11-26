
    <?php
        $title = 'Edit Records';
        require_once 'includes/header.php';
        require_once 'includes/auth_check.php';
        require_once 'db/db_connect.php';

        //get all adventures
        $adventures_results = $client_crud->getAdventures();

        //get all Status
        $status_results = $client_crud->getStatus();

        //get all gender
        $gender_results = $client_crud->getGender();
        

        if (!isset($_GET['client_id'])) {
            //echo '<h1 class = "text-center text-danger">Please check details and try again.</h1>';
            include 'includes/error_message.php';
        } else {
            $client_id = $_GET['client_id'];
            $client = $client_crud->getClientDetails($client_id);
    ?>
    
    <br>
    <h2 class ="text-center"><?php echo $title;?></h2>

    <style type="text/css">
    form{float: left;width: 100%;}
    img, embed{margin-top: 20px;}
    </style>

    <form method="post" action="editpost.php" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" id="id" name="id" value="<?php echo $attendee['attendee_id'] ?>" />
        <input type="hidden" id="registration_time" name="registration_time" value="<?php echo $attendee['registration_time'] ?>" />

        <div class="row">
            <div class="col text-center">
            <img id="signup-img" src="images/team/__blank.jpg" alt="Placeholder">
            <small id="help" class="form-text text-muted">Preview</small>
            </div>
        </div>
        <br>
  
        <div class="row">
            <div class="col">
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
            </div>
            <br>
            
            <div class="row">
            <div class="col">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstname" name="firstname" aria-describedby="firstname"  required>
            </div>
            <div class="col">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastname" name="lastname" aria-describedby="lastname"  required>
            </div>
            </div>
            <br>

            <div class="row">
            <div class="col">
            <textarea class="form-control" id="address_c" placeholder="Type Your address" name="address_c" required></textarea>
                <small id="addressHelp" class="form-text text-muted">Type your address.</small>
            </div>
            <div class="col">
            <select class="form-control" id="gender" name="gender" required>
                        
                        <?php while($gender_row = $gender_results->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $gender_row['gender_id'] ?>"><?php echo $gender_row['gender_name'] ?></option>
                        <?php } ?>
                    
                    </select>
                <small id="help" class="form-text text-muted">Select your gender.</small>
            </div>
            </div>
            <br>
            
            <div class="row">
            <div class="col">
                <select class="form-control" id="adventures" name="adventures" required>
                
                            <?php while($adventures_row = $adventures_results->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $adventures_row['adventures_id'] ?>"><?php echo $adventures_row['adventures_name'] ?></option>
                            <?php } ?>
                        
                        </select>
                    <small id="help" class="form-text text-muted">Select your adventure.</small>
                    
            </div>
            <div class="col">
            <label for="dob">Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $attendee['dob'] ?>" id="dob" name="dob" aria-describedby="dob" required readonly>
            <small id="dobHelp" class="form-text text-muted">The minimum age is 16 years old.</small>
            </div>
            </div>
            <br>
            
                <div class="row">
            <div class="col">
            <label for="email">Email address</label>
            <input type="email" class="form-control" value="<?php echo $attendee['email'] ?>" id="email" name="email" aria-describedby="emailHelp"  readonly required>
            </div>
            <div class="col">
            <label for="contact_num">Contact Number</label>
            <input type="tel" class="form-control" value="<?php echo $attendee['contact_num'] ?>" id="contact_num" name="contact_num" aria-describedby="contact_numHelp" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" >
            <small id="contact_numHelp" class="form-text text-muted">We'll never share your contact number with anyone else. (format: 123-456-7890)</small>
        </div>
            </div>
            </div>
            <br>
            
            <div class="row">
            <div class="col">
            <button type="submit" name="submit" class="btn btn-info btn-block">View List</button>
            </div>
            <div class="col">
            <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
            </div>
            </div>
            <br><br>
  </form>
        
    <?php } ?>
   
    <?php
        require_once 'includes/footer.php';
    ?>