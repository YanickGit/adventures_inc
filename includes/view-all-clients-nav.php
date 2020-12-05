<div class="row">
      <div class="col">
      <a href="view-all-current-clients.php" class="<?php if ($title == 'Manage Current Clients'){echo 'btn btn-success btn-block';} else {echo 'btn btn-outline-success btn-block';}?>">CURRENT</a>
      </div>
      <div class="col">
      <a href="view-all-past-clients.php" class="<?php if ($title == 'Manage Past Clients'){echo 'btn btn-warning btn-block';} else {echo 'btn btn-outline-warning btn-block';}?>">PAST</a>
      </div>
      <div class="col">
      <a href="view-all-deleted-clients.php" class="<?php if ($title == 'Manage Deleted Clients'){echo 'btn btn-danger btn-block';} else {echo 'btn btn-outline-danger btn-block';}?>">DELETED</a>
      </div>
    </div>