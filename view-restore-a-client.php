<?php
    $title = 'Restore Client Confirmation';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/db_connect.php';

    //get attendee by id
    if (!isset($_GET['client_id'])){
        include 'includes/error_message.php';
    }
    else{
        $client_id = $_GET['client_id'];
        $result = $client_crud->getClientDetails($client_id);
 
        echo'
        <br>
        <h2 class ="text-center">Restore '.ucfirst($result['firstname']).' '.ucfirst($result['lastname']).'\'s Record?</h2>
        
        <div class="card text-black bg-warning mb-3 mx-auto" style="width:100%">
        <div class="row no-gutters">
    <div class="col-md-4">
        <img src="'.$result['imgpath'].'." class="card-img img-responsive" alt="Adventurer Picture">
    </div>

    <div class="col-md-4">
        <div class="card-body">
            <h3 class="card-title">'.strtoupper($result['firstname']).' '.strtoupper($result['lastname']).'</h3>
            <h5>'.$result['adventures_name'].'</h5>
            <p>
            <b>Status</b><br>
            '.$result['status_name'].' <br>
            <b>Address</b><br>
            '.$result['address'].' <br>
            </p>
            ';
            echo'
        </div>
    </div>

    <div class="col-md-4">
        <div class="card-body">
            <p>
            <b>Date of Birth</b><br>
            '.$result['dob'].' <br>
            <b>Gender</b><br>
            '.$result['gender_name'].' <br>
            <b>Email Address</b><br>
            '.$result['email'].'
            <br>
            ';
            if(empty($result['contact_num'])){

            } else {
                echo'
                
                <b>Contact Number</b><br>
                '.$result['contact_num'].'
                <br>
                ';
            }
            echo'
            <b>Date Registered</b><br>
            '.$result['registered_on'].' 
            <br>
            ';
    if(empty($result['updated_on'])){
  
    } else {
        echo'
        <b>Date Updated</b><br>
        '.$result['updated_on'].' <br>
        </p>
        ';
    } 
        echo'

        </div>
    </div>
    ';
                
?>
        </div>
    </div>
    <p class="text-center">
        <a href ="view-all-current-clients.php" class ="btn btn-info " >View All Clients</a>
        <a href ="action-restore-a-client.php?client_id=<?php echo $result['client_id'] ?>&status_name=<?php echo $result['status_name'] ?>" class ="btn btn-warning ">Continue...</a>
    </p> 
    </div>
    </div>
    </div>

<?php }  ?>

<?php
    require_once 'includes/footer.php';
?>