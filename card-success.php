<?php
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/db_connect.php';
    
    require_once 'action-send-email.php';

    if(isset($_POST['submit'])){
      //extract values from the $_POST array
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $address_c = $_POST['address_c'];
      $gender = $_POST['gender'];
      $dob = $_POST['dob'];
      $adventures = $_POST['adventures'];
      $email = $_POST['email'];
      $contact_num = $_POST['contact_num'];

      require_once 'includes/upload-image.php';

      if (empty($imgpath)) {
       $imgpath = "images/profile/__defaultCrop.jpg";
     } 

      //call function to insert and track if success or not
      $isSuccess = $client_crud->insertClients (trim(strtolower($firstname)), trim(strtolower($lastname)), trim(strtolower($address_c)), strtolower($imgpath), $gender, $dob, $adventures, trim(strtolower($email)), $contact_num);
     
       
      //get all adventures
      $adventure_results = $client_crud->getAdventures();

       //get all gender
       $gender_results = $client_crud->getGender();

      if ($isSuccess) {
        require_once 'email-registration.php';

        echo'
        <br>
        <h2 class="text-center">Thank You for Registering with Adventures Inc.</h2>
        <br>
        <h3 class ="text-center"> ';
        ?>
        <?php
        if ($gender == "1"){
          echo'Mr.'; 
        } elseif ($gender == "2") {
          echo 'Miss';
        } else {
          
        }
        ?>

        <?php
        echo'
        '.ucfirst($firstname).' '.ucfirst($lastname).'\'s Registration Details</h3>
        
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
            <?php while($adventure_row = $adventure_results->fetch(PDO::FETCH_ASSOC)) { ?>
              <?php 
                  if ($adventure_row['adventures_id'] == $adventures) 
                  echo '<h5>'.$adventure_row['adventures_name'].'</h5>';
              ?>
          <?php } ?>
          <?php
          echo'
            <p>
            <b>Address</b><br>
            '.$address_c.' <br>
            <b>Date of Birth</b><br>
            '.$dob.' 
            <br>
          
        
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-body">
            <b>Gender</b><br>
            ';
            ?>
            <?php while($gender_row = $gender_results->fetch(PDO::FETCH_ASSOC)) { ?>
              <?php 
                  if ($gender_row['gender_id'] == $gender) 
                  echo''.$gender_row['gender_name'].'';
              ?>
          <?php } ?>
          <?php 
          echo'   
            <br>
            <b>Email Address</b><br>
            '.$email.'
            <br>
            ';
            if(empty($contact_num)){

            } else {
                echo'
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
        include 'includes/error_message_email.php';
      }
    }
    else {
      //header("Location: index.php");
?>
      <script>
      location.replace("index.php")
      </script>
<?php
    }
  ?>

<?php
    require_once 'includes/footer.php';
?>