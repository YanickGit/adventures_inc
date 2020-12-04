<?php    
    //local_db 
    $host = '127.0.0.1';
    $db = 'adventures_db';
    $username = 'root';
    $password = '';
    $charset = 'utf8mb4';

    //remote_db 
    $_host = 'db4free.net:3306';
    $_db = 'yl_adventures_db';
    $_username = 'yl_root_db2';
    $_password = 'yl_root_db.92';
    $_charset = 'utf8mb4';

    $dsn = "mysql:host=$host; dbname=$db; charset=$charset";
    //$_dsn = "mysql:host=$_host; dbname=$_db; charset=$_charset";

    try {
        $pdo = new PDO($dsn, $username, $password);
        //$pdo = new PDO($_dsn, $_username, $_password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
   require_once 'client-crud.php';
   require_once 'user-crud.php';
   $client_crud = new client_crud($pdo);
   $user_crud = new user_crud($pdo);

   $user_crud->insertUser ("admin","@dministrat0r");
?>