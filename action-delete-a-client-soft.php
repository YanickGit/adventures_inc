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

    //Call Delete Function
    $delete_result = $client_crud->deleteSoftClients($client_id);

    //Redirect to ViewRecords
    if ($delete_result){
        header("Location: view-all-deleted-clients.php");
    } else{
        require_once 'includes/error_message.php';
    }
}

require_once 'includes/footer.php'
?> 