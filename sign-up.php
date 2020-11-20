
    <?php
        $title = 'Join The Adventure';
        require_once 'includes/header.php';
        require_once 'db/db_connect.php';

        //get all adventures
        $results = $client_crud->getAdventures();
    ?>
    
    <br>
    <h2><?php echo $title;?></h2>

    <style type="text/css">
form{float: left;width: 100%;}
img, embed{margin-top: 20px;}
</style>
     
    <form method="post" action="card-success.php" enctype="multipart/form-data" autocomplete="off">
    
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
		<small id="help" class="form-text text-muted">Upload your picture.</small>
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
   
    <?php
        require_once 'includes/footer.php';
    ?>