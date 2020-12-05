<?php
    $title = 'Manage Deleted Clients';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/db_connect.php';

    //get all clients
    $results = $client_crud->getAllDeletedClients();
?>

<br>
<h2 class = "text-center">Deleted Adventurers</h2>
<br>

<?php include 'includes/view-all-clients-nav.php'; ?>
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
      <td><?php echo ucfirst($row['firstname']) ?></td>
      <td><?php echo ucfirst($row['lastname']) ?></td>
      <td><?php echo $row['adventures_name'] ?></td>
      <td><?php echo $row['status_name'] ?></td>
      <td>
        <a href ="view-deleted-client.php?client_id=<?php echo $row['client_id'] ?>" class ="btn btn-primary">View</a>
        <a href ="view-restore-a-client.php?client_id=<?php echo $row['client_id']?>" class ="btn btn-info">Restore...</a>
        <a onclick="return confirm('NOTICE: You are about to PERMANENTLY DELETE <?php echo strtoupper($row['firstname'])?> <?php echo strtoupper($row['lastname']) ?> RECORD, are you sure?');" href ="action-delete-a-client-hard.php?client_id=<?php echo $row['client_id'] ?>" class ="btn btn-dark">Purge...</a>
      </td>
    </tr>
    <?php } ?>
  </tbody> 
</table>
<br>

<?php
    require_once 'includes/footer.php';
?>