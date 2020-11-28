<?php 
$title = 'Action';
require_once 'includes/header.php';
require_once 'includes/auth_check.php';
require_once 'db/db_connect.php';

if (!$_GET['contact_id']){
    include 'includes/error_message.php';
}else {
    //Get ID Values
    $contact_id = $_GET['contact_id'];

    //Call Delete Function
    $delete_result = $user_crud->deleteEntryContactUs($contact_id);

    //Redirect to ViewRecords
    if ($delete_result){
        header("Location: #.php");
    } else{
        require_once 'includes/error_message.php';
    }
}
?> 

<?php
    require_once 'includes/footer.php';
?>