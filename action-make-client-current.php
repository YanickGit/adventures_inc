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
    $makecurrent_result = $client_crud->makeCurrenClients($client_id);

    //Redirect to ViewRecords
    if ($makecurrent_result){
        header("Location: view-all-current-clients.php");
    } else{
        require_once 'includes/error_message.php';
    }
}

require_once 'includes/footer.php'
?> 