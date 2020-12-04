<?php
if(isset($_POST['submit']) && !empty($_FILES['image']['name'])){
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_ext = strtolower(end(explode('.',$_FILES['image']['name'])));
    
    //Create Hashed File Name
    $md5_file_name = md5($file_name);
    $new_file_name = $firstname.$lastname.'-'.$md5_file_name.'.'.$file_ext;

    //Image Path
    $imgpath = "../images/profile/".$new_file_name;

    //Check File Size
    if($file_size > 2097152){
        include 'includes/error_message.php';
        require_once 'includes/footer.php';
        exit();
     }else {
        (move_uploaded_file($file_tmp,$imgpath));
     }
}
?>