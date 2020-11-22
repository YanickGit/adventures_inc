<?php
    $title = 'View Record';
    require_once 'includes/header.php';
    //require_once 'includes/auth_check.php';
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
        <div class="card text-center text-white bg-dark mb-3 mx-auto" style="width: 20rem">
        <img class="card-img-top" src="'.$result['imgpath'].'" alt="Adventurer Picture">
        <div class="card-body">
        <h3 class="card-title">'.strtoupper($result['firstname']).' '.strtoupper($result['lastname']).'</h3>

        <h4>'.$result['adventures_name'].'</h4><br>     
        
        <p>
        Status <br>
        '.$result['status1'].' <br>
        Date Registered <br>
        '.$result['registration_time'].' <br>
        </p>
        ';

        if(empty($result['update_time'])){
  
        }else {
            echo'
            <p>
            Date Updated <br>
            '.$result['update_time'].' <br>
            </p>
            ';
        }

        echo'
        <p>
        <b>Date of Birth</b><br>
        '.$result['dob'].' <br>
        <b>Email Address</b><br>
        '.$result['email'].'<br>
        </p>
        ';

        if(empty($result['contact_num'])){
            echo'<br>';
        }else {
            echo'
            <p>
            <b>Contact Number</b><br>
            '.$result['contact_num'].'<br><br>
            </p>
            ';
            }
?>
<p>
<a href ="view-all-clients.php" class ="btn btn-info " >View All Clients</a>
<a href ="edit.php?id=<?php echo $result['attendee_id'] ?>" class ="btn btn-warning ">Edit</a>
<a href ="viewdelete.php?id=<?php echo $result['attendee_id'] ?>" class ="btn btn-danger ">Delete</a>
</p> 
</div>
</div>

</div>

<?php }  ?>

<?php
    require_once 'includes/footer.php';
?>