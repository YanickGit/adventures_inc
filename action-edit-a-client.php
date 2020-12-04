<?php 
    $title = 'Action';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/db_connect.php';

    //Get Values from Post Action
    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $client_id = $_POST['client_id'];
        $client_status = $_POST['client_status'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address_c = $_POST['address_c'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $adventures = $_POST['adventures'];
        $contact_num = $_POST['contact_num'];
        

        //Call CRUD Function
        $result = $client_crud->editClients($client_id, $client_status, trim(strtolower($firstname)), trim(strtolower($lastname)), (strtolower($address_c)), $gender, $dob, $adventures, $contact_num);

        //Redirect to ViewRecords
        if ($result){
            //header("Location: view-all-current-clients.php");
?>
            <script>
            location.replace("view-all-current-clients.php")
            </script>
<?php
    }
    else { 
        include 'includes/error_message.php';
    }
    }
    else {
        include 'includes/error_message.php';
    }

    require_once 'includes/footer.php'

?> 