<?php
  //require_once 'includes/session.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <link rel="stylesheet" type="text/css" href="css/site.css">

    <!-- meet The Team-->
    <style>
html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}
</style>

    
     <title>Adventures Inc - <?php echo $title ?></title>
  </head>
  <body>
    <div class="container">

    

  <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Adventures Inc</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav mr-auto">
          <a class="nav-link active" href="index.php">Home<span class="sr-only">(current)</span></a>
          <a class="nav-link" href="the-adventures.php">The Adventures</a>
          <a class="nav-link" href="sign-up.php">Join The Adventure</a>
          <a class="nav-link" href="the-team.php">The Team</a>
          <a class="nav-link" href="about-us.php">About Us</a>
          <a class="nav-link" href="contact-us.php">Contact Us</a>
        </div>
        <div class="navbar-nav ml-auto">
            <?php 
              if(!isset($_SESSION['user_id'])){
            ?>
            <a class="nav-link" href="login.php">Login<span class="sr-only">(current)</span></a>
            <?php } else {?>
              <a class="nav-link" href=#>Hello <?php echo ucfirst($_SESSION['username']); ?>! <span class="sr-only"></span></a>
              <a class="nav-link" href="logout.php">Log out<span class="sr-only">(current)</span></a>
            <?php } ?>      
        </div>
      </div>
    </nav>
