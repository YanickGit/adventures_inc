<?php 
$title = 'Action';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/db_connect.php';

if (!$_GET['client_id']){
    include 'includes/error_message.php';
}else {
    //Get ID Values
    $client_id = $_GET['client_id'];
    $client_status = $_GET['status_name'];

    //Call Restore Function
    $restore_result = $client_crud->restoreDeletedClients($client_id);

    //Redirect to ViewRecords
    if ($restore_result){
        ////////Check Status FK
        if($client_status == "REGISTERED"){
            //header("Location: view-all-current-clients.php");
?>
            <script>
            location.replace("view-all-current-clients.php")
            </script>
<?php   
        }else {
            //header("Location: view-all-past-clients.php");
?>
            <script>
            location.replace("view-all-past-clients.php")
            </script>
<?php
        }    
    } else{
        require_once 'includes/error_message.php';
    }
}

require_once 'includes/footer.php'
?> 