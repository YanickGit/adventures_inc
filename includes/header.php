<?php
  //require_once 'includes/session.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" type="image/jpg" href="/favicon.jpg"/>

<!--===========================================================-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <link rel="stylesheet" type="text/css" href="css/site.css">

     <title>Adventures Inc - <?php echo $title ?></title>
  </head>
  <body>
    <div class="container">

<!--===========================================================-->

  <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-primary">
      <a class="navbar-brand" href="index.php">Adventures Inc</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mr-auto">
          <a class="<?php if ($title == 'Home'){echo 'nav-link active';} else {echo 'nav-link';}?>" href="index.php">Home<span class="sr-only">(current)</span></a>
          <a class="<?php if ($title == 'The Adventures'){echo 'nav-link active';} else {echo 'nav-link';}?>" href="the-adventures.php">The Adventures</a>
          <a class="<?php if ($title == 'Join The Adventure'){echo 'nav-link active';} else {echo 'nav-link';}?>" href="sign-up.php">Join The Adventure</a>
          <a class="<?php if ($title == 'The Team'){echo 'nav-link active';} else {echo 'nav-link';}?>" href="the-team.php">The Team</a>
          <a class="<?php if ($title == 'About Us'){echo 'nav-link active';} else {echo 'nav-link';}?>" href="about-us.php">About Us</a>
          <a class="<?php if ($title == 'Contact Us'){echo 'nav-link active';} else {echo 'nav-link';}?>" href="contact-us.php">Contact Us</a>
        </div>
        <div class="navbar-nav ml-auto">
            <?php 
              if(!isset($_SESSION['user_id'])){
            ?>
            <a class="<?php if ($title == 'Login'){echo 'nav-link active';} else {echo 'nav-link';}?>" href="login.php">Login<span class="sr-only">(current)</span></a>
            <?php } else {?>
              <a class="nav-link active" href=#>Hello <?php echo ucfirst($_SESSION['username']); ?>! <span class="sr-only"></span></a>
              <a class="nav-link" href="logout.php">Log out<span class="sr-only">(current)</span></a>
            <?php } ?>      
        </div>
      </div>
    </nav>
