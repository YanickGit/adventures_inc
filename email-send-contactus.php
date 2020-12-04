<?php
    $title = 'Action';
    require_once 'includes/header.php';
    require_once 'db/db_connect.php';

    if(isset($_POST['submit'])){
        //extract values from the $_POST array
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

    //call function to insert and track if success or not
    $isSuccess = $user_crud->insertContactUs (trim(strtolower($name)), trim(strtolower($email)), trim(strtolower($subject)), trim(strtolower($message)));

    if ($isSuccess) {
        $email_system = "yanickbiz2k4@hotmail.com";

        require_once 'action-send-email.php';
        require_once 'email-contactus-client.php';
        require_once 'email-contactus-system.php';
        include 'includes/success_message.php';

    } else {
        include 'includes/error_message.php';
    }
    } else {
        include 'includes/error_message.php';   
}
echo"<?php ?>";
?>

<?php
    require_once 'includes/footer.php';
?>