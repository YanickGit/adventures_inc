
    <?php
        $title = 'Modify Records';
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
            include 'includes/error_message.php';
        } else {
            $client_id = $_GET['client_id'];
            $client_result = $client_crud->getClientDetails($client_id);
    ?>
    
    <br>
    <h2 class ="text-center"><?php echo 'Modify ' .ucfirst($client_result['firstname']).'\'s Record'; ?></h2>

    <style type="text/css">
    form{float: left;width: 100%;}
    img, embed{margin-top: 20px;}
    </style>

    <div class = "text-center">
    <img id="signup-img" src="<?php echo $client_result['imgpath'] ?>" alt="Client Image"> 
    </div>

    <form method="post" action="action-edit-a-client.php" enctype="multipart/form-data" autocomplete="off">
        <input type="hidden" id="client_id" name="client_id" value="<?php echo $client_result['client_id'] ?>" />
        <input type="hidden" id="registered_on" name="registered_on" value="<?php echo $client_result['registered_on'] ?>" />

        <div class="row">
            <div class="col">
            <label for="client_status">Status</label>
                <select class="form-control" value="<?php echo $client_result['status_id'] ?>" id="client_status" name="client_status" required>
                   
                    <?php while($status_row = $status_results->fetch(PDO::FETCH_ASSOC)) { ?>
                        <option value="<?php echo $status_row['status_id'] ?>"
                            <?php 
                                if ($status_row['status_id'] == $client_result['client_status_fk']) echo 'selected'
                            ?>>
                            <?php echo $status_row['status_name'] ?>
                        </option>
                    <?php } ?>
                
                </select>
            </div>
            </div>
            <br>
            
            <div class="row">
            <div class="col">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" value="<?php echo $client_result['firstname'] ?>" id="firstname" name="firstname" aria-describedby="firstname"  readonly  required>
            </div>
            <div class="col">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" value="<?php echo $client_result['lastname'] ?>" id="lastname" name="lastname" aria-describedby="lastname"  readonly required>
            </div>
            </div>
            <br>

            <div class="row">
            <div class="col">
            <label for="address">Address</label>
            <textarea class="form-control" id="address_c" placeholder="Type Your address" name="address_c" readonly  required><?php echo $client_result['address'] ?></textarea>
            </div>
            <div class="col">
            <label for="gender">Gender</label>
                <input type="text" class="form-control" value="<?php echo $client_result['gender_fk'] ?>" id="gender" name="gender" aria-describedby="gender"  readonly required>
            </div>
            </div>
            <br>
            
            <div class="row">
            <div class="col">
            <label for="adventures">Adventures</label>
                <select class="form-control" id="adventures" name="adventures" disabled="disabled" readonly required>
                
                            <?php while($adventures_row = $adventures_results->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?php echo $adventures_row['adventures_id'] ?>"><?php echo $adventures_row['adventures_name'] ?></option>
                            <?php } ?>
                
                        </select>
                    
            </div>
            <div class="col">
            <label for="dob">Date of Birth</label>
            <input type="text" class="form-control" value="<?php echo $client_result['dob'] ?>" id="dob" name="dob" aria-describedby="dob" required readonly>
            </div>
            </div>
            <br>
            
                <div class="row">
            <div class="col">
            <label for="email">Email address</label>
            <input type="email" class="form-control" value="<?php echo $client_result['email'] ?>" id="email" name="email" aria-describedby="emailHelp"  readonly required>
            </div>
            <div class="col">
            <label for="contact_num">Contact Number</label>
            <input type="tel" class="form-control" value="<?php echo $client_result['contact_num'] ?>" id="contact_num" name="contact_num" aria-describedby="contact_numHelp" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" readonly >
            <small id="contact_numHelp" class="form-text text-muted">(format: 123-456-7890)</small>
        </div>
            </div>
            <br>
            
            <div class="row">
            <div class="col">
            <a href ="view-all-current-clients.php" class ="btn btn-info btn-block" >View Client List</a>
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