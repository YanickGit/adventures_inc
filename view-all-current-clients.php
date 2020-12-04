<?php
    $title = 'Manage Current Clients';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/db_connect.php';

    //get all clients
    $results = $client_crud->getAllCurrentClients();
?>

<br>
<h2 class = "text-center">Current Adventurers</h2>
<br>

<?php include 'includes/view-all-clients-nav.php'; ?>
<br>

<table class="table table-striped table-responsive" id="dtBasicExample">
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
      <td><?php echo ucfirst($row['firstname']) ?></td>
      <td><?php echo ucfirst($row['lastname']) ?></td>
      <td><?php echo $row['adventures_name'] ?></td>
      <td><?php echo $row['status_name'] ?></td>
      <td>
        <a onclick="return confirm('NOTICE: You are about to resent a registration email to <?php echo ucfirst($row['firstname'])?> <?php echo ucfirst($row['lastname']) ?>, are you sure?');" href ="email-resend-registration.php?email=<?php echo $row['email']?>&firstname=<?php echo $row['firstname']?>&lastname=<?php echo $row['lastname']?>" class ="btn btn-info">Email</a>
        <a href ="view-a-client.php?client_id=<?php echo $row['client_id'] ?>" class ="btn btn-primary">View</a>
        <a href ="edit-a-current-client.php?client_id=<?php echo $row['client_id'] ?>" class ="btn btn-warning">Edit</a>
        <a href ="view-delete-a-client.php?client_id=<?php echo $row['client_id'] ?>" class ="btn btn-danger">Delete</a>
      </td>
    </tr>
    <?php } ?>
  </tbody> 
</table>
<br>

<?php
    require_once 'includes/footer.php';
?>