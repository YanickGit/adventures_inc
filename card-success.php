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
        <div class="card text-center text-white bg-dark mb-3 mx-auto" style="width: 20rem">
          <img class="card-img-top" src="'.$imgpath.'" alt="Adventurer Picture">
          <div class="card-body">
            <h3 class="card-title">'.strtoupper($firstname).' '.strtoupper($lastname).'</h3>
            ';
            ?>
            <?php while($row = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <?php 
                    if ($row['adventures_id'] == $adventures) 
                    echo '<h4>'.$row['adventures_name'].'</h><br>';
                ?>
            <?php } ?>
            <?php
            echo'     
              <p>
              <b>Date of Birth</b><br>
              '.$dob.' <br>
              <b>Email Address</b><br>
              '.$email.' <br>
              ';
              if(empty($contact_num)){
                echo'<br>';
              }else {
                echo'
                <p>
                <b>Contact Number</b><br>
                '.$contact_num.'<br><br>
                </p>
                ';
             }
              ?>
            <p>
            <a href ="index.php" class ="btn btn-success " >Home</a>
            <a href ="view-all-clients.php" class ="btn btn-info " >View All Clients</a>
          </p> 
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