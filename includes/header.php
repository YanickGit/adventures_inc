<?php
  //require_once 'includes/session.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!--===========================================================-->

    <!-- Website Icon -->
<link rel="apple-touch-icon" sizes="57x57" href="icons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="iconsapple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="icons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="icons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
<link rel="manifest" href="icons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="icons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

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
          <a class="<?php if ($title == 'About Us'){echo 'nav-link active';} else {echo 'nav-link';}?>" href="about-us.php">About Us</a>
          <a class="<?php if ($title == 'The Adventures'){echo 'nav-link active';} else {echo 'nav-link';}?>" href="the-adventures.php">The Adventures</a>
          <a class="<?php if ($title == 'Join The Adventure'){echo 'nav-link active';} else {echo 'nav-link';}?>" href="sign-up.php">Join The Adventure</a>
          <a class="<?php if ($title == 'The Team'){echo 'nav-link active';} else {echo 'nav-link';}?>" href="the-team.php">The Team</a>
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
