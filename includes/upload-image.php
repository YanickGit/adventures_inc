<?php
if(isset($_POST['submit']) && !empty($_FILES['image']['name'])){
    if(move_uploaded_file($_FILES['image']['tmp_name'],"images/profile/".$_FILES['image']['name'])){
        $imgpath = "images/profile/".$_FILES['image']['name'];
        //echo 'File has uploaded successfully.';
    }else{
       // echo 'Some problem occurred, please try again.';
   }
}
?>