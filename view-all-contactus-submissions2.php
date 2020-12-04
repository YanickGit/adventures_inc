<?php
    $title = 'Manage Contact Us Submissions';
    require_once 'includes/auth_check.php';
    require_once 'db/db_connect.php';

    //get all clients
    $user_results = $user_crud->getAllContactUs();
?>

<br>
<h2 class = "text-center">Contact Us Submissions</h2>
<br>

<br>

<table class="table table-striped" id="dtBasicExample">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Subject</th>
      <th scope="col">Message</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $user_results->fetch(PDO::FETCH_ASSOC)) { ?>
    
    <tr>
      <th scope="row"><?php echo $row['contact_id'] ?></th>
      <td><?php echo ucfirst($row['name']) ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['subject'] ?></td>
      <td><?php echo $row['message'] ?></td>
      <td>
        <a onclick="return confirm('NOTICE: You are about to delete a submission from <?php echo ucfirst($row['name'])?>, are you sure?');" href ="delete-contactus.php?contact_id=<?php echo $row['contact_id'] ?>" class ="btn btn-danger">Delete</a>
      </td>
    </tr>
    <?php } ?>
  </tbody> 
</table>
<br>
