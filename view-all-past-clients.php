<?php
    $title = 'Manage Past Clients';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/db_connect.php';

    //get all clients
    $results = $client_crud->getAllPastClients();
?>

<br>
<h2 class = "text-center">Past Adventurers</h2>
<br>

<?php include 'includes/view-all-clients-nav.php'; ?>
<br>

<table class="table table-striped" id="dtBasicExample">
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
         <a href ="view-a-client.php?client_id=<?php echo $row['client_id'] ?>" class ="btn btn-primary">View</a>
         <a onclick="return confirm('NOTICE: You are about to change <?php echo ucfirst($row['firstname'])?> <?php echo ucfirst($row['lastname']) ?> status, are you sure?');" href ="action-make-client-current.php?client_id=<?php echo $row['client_id'] ?>" class ="btn btn-warning">Make Current</a>
        <a href ="view-delete-a-client.php?client_id=<?php echo $row['client_id'] ?>" class ="btn btn-danger">Delete...</a>
      </td>
    </tr>
    <?php } ?>
  </tbody> 
</table>
<br>

<?php
    require_once 'includes/footer.php';
?>