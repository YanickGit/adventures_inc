<?php 
$title = "Contact Us Response";
SendEmail::SendMail($email, 'Thank You for Registering','

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--============================================================================================================-->

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!--============================================================================================================-->

    <title>Adventures Inc - <?php echo $title ?></title>

    <style>
      body {
      background-color: #6dcfcf
      }
</style>

</head>
<body>
  <div class="container">   
  <br><br>

    <div class="card  mx-auto" style="width: 40rem;">
    <div class="card-header text-center">
      <h4>Thank You For Contacting Adventures Inc.</h4>
    </div>
    <div class="card-body">
      <p>Dear <b>#NAME#</b>,<br>
          We are in receipt of your message, contact us at anytime, we value your thoughts.<br><br>
          <b>Subject:</b><br>
          #SUBJECT#<br><br>
          
          <b>Message:</b><br>
          #MESSAGE#
    </p>
    <br>
      <a href="#" class="btn btn-primary">Visit Us</a>
    </div>
     </div>

</div>

<!--============================================================================================================-->

<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	
<!--============================================================================================================-->

</body>
</html>

') ?>