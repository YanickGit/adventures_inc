<?php
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/db_connect.php';
    
    //require_once 'send-email.php';

    if(isset($_POST['submit'])){
      //extract values from the $_POST array
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $dob = $_POST['dob'];
      $email = $_POST['email'];
      $adventures = $_POST['adventures'];
      $contact_num = $_POST['contact_num'];
      //$imgpath = "images/profile/".$_FILES['image']['name'];

      require_once 'includes/upload-image.php';

      if (empty($imgpath)) {
       $imgpath = "images/profile/__defaultCrop.jpg";
       //echo $imgpath;
     } 

      //call function to insert and track if success or not
      $isSuccess = $client_crud->insertClients (trim(strtolower($firstname)), trim(strtolower($lastname)), strtolower($imgpath), $dob, $adventures, trim(strtolower($email)), $contact_num);
      //echo '<br>'.$imgpath;
       
      //get all adventures
      $results = $client_crud->getAdventures();

      
      if ($isSuccess) {
        //require_once 'email-registration.php';

        echo'
        <br>
        <h2 class="text-center">Adventure Registered and Loading.....</h2>
        
        <div class="card text-white bg-dark mb-3 mx-auto" style="width: 960px">
        <div class="row no-gutters">
    <div class="col-md-4">
        <img src="'.$imgpath.'" class="card-img" alt="Adventurer Picture">
    </div>

    <div class="col-md-5">
        <div class="card-body">
            <h3 class="card-title">'.strtoupper($firstname).' '.strtoupper($lastname).'</h3>
            ';
            ?>
            <?php while($row = $results->fetch(PDO::FETCH_ASSOC)) { ?>
              <?php 
                  if ($row['adventures_id'] == $adventures) 
                  echo '<h5>'.$row['adventures_name'].'</h5>';
              ?>
          <?php } ?>
          <?php
          echo'
            <p>
            <b>Address</b><br>
            '.$dob.' <br>
            <b>Date of Birth</b><br>
            '.$dob.' <br>
            </p>
            ';
            echo'
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-body">
            <p>
            <b>Gender</b><br>
            '.$dob.'<br>
            <b>Email Address</b><br>
            '.$email.'<br>
            </p>
            ';
            if(empty($contact_num)){

            } else {
                echo'
                <p>
                <b>Contact Number</b><br>
                '.$contact_num.'<br><br>
                </p>
                ';
            }
           echo'
        </div>
    </div>
                ';
                ?>
   
          </div>
      </div>
        </div>
    <?php
      } else {
        include 'includes/error_message.php';
      }
    }
    else {
      header("Location: index.php");
    }
  ?>

<?php
    require_once 'includes/footer.php';
?>