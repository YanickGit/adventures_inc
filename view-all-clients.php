<?php
    $title = 'Manage Clients';
    require_once 'includes/header.php';
    //require_once 'includes/auth_check.php';
    require_once 'db/db_connect.php';

    //get all clients
    $results = $client_crud->getAllClients();
?>

<h1 class = "text-center">Registered Adventurers</h1>
<br>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Adventures</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $results->fetch(PDO::FETCH_ASSOC)) { ?>
    
    <tr>
      <th scope="row"><?php echo $row['client_id'] ?></th>
      <td><?php echo $row['firstname'] ?></td>
      <td><?php echo $row['lastname'] ?></td>
      <td><?php echo $row['adventures_name'] ?></td>
      <td><?php echo $row['status1'] ?></td>
      <td>
        <a href ="email-resend-registration.php?id=<?php echo $row['client_id'] ?>" class ="btn btn-info">Email</a>
        <a href ="view-a-client.php?id=<?php echo $row['client_id'] ?>" class ="btn btn-primary">View</a>
        <a href ="edit-a-client.php?id=<?php echo $row['client_id'] ?>" class ="btn btn-warning">Edit</a>
        <a href ="view-delete-a-client.php?id=<?php echo $row['client_id'] ?>" class ="btn btn-danger">Delete</a>
      </td>
    </tr>
    
    <?php } ?>
  </tbody> 
</table>
<br>
<a href ="viewdeletedrecords.php" class ="btn btn-warning btn-block">View Deleted</a>
<?php
    require_once 'includes/footer.php';
?>