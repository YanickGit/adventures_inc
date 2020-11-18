<?php
    $title = 'The Adventures';
    require_once 'includes/header.php';
    require_once 'db/db_connect.php';
?>

<br>
<h2><?php echo $title;?></h2>
<br>

<div class="card">
  <h5 class="card-header">Adventure #1</h5>
  <div class="card-body">
    <img src="images/team/__defaultCrop.jpg" class="rounded float-left" alt="..." width ="200px" height ="200px">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="sign-up.php" class="btn btn-primary">Join The Adventure</a>
  </div>
</div>
<br>


<?php
    require_once 'includes/footer.php';
?>