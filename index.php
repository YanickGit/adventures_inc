<?php
    $title = 'Home';
    require_once 'includes/header.php';
    require_once 'db/db_connect.php';
?>

<br>
<h2><?php echo $title;?></h2>
<p>Join The Adventure</p>

<?php
    require_once 'includes/slider.php';
?>

<?php
    require_once 'includes/footer.php';
?>