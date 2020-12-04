<?php
    $email = $_GET['email'];
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    require_once 'action-send-email.php';
    require_once 'email-registration.php';
    //header("Location: view-all-current-clients.php");
?>
    <script>
    location.replace("view-all-current-clients.php")
    </script>
