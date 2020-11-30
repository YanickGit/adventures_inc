<?php SendEmail::SendMail($email, 'Contact Us Response','

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Adventures Inc - Contact Us Response</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--============================================================================================================-->

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!--============================================================================================================-->

    <style>
      body {
      background-color: #6dcfcf
      }
    </style>

</head>
<body>
  <div class="container">   
  <br>

  <div class="card  mx-auto" style="width: 40rem;">
    <div class="card-header text-center">
      <h4>Thank You For Contacting Adventures Inc.</h4>
    </div>
    <div class="card-body">
      <p>Dear <b>'.$name.'</b>,<br>
          We are in receipt of your message, contact us at anytime, we value your thoughts.<br><br>
          Kindly view the details of your submission.<br>
          <b>Subject:</b><br>
          '.$subject.'<br><br>
          
          <b>Message:</b><br>
          '.$message.'
    </p>
    <br>
      <a href="https://www.iso.org/member/1663.html" class="btn btn-primary">Visit Us</a>
    </div>
  </div>
</div>

</body>
</html>

') ?>