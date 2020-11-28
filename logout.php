<?php 
    require_once 'includes/auth_check.php';
    require_once 'includes/session.php';
    session_destroy();
    header('Location: index.php');
?>