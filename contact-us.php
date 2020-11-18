<?php
    $title = 'Contact Us';
    require_once 'includes/header.php';
    //require_once 'includes/slider.php';
    require_once 'db/db_connect.php';
?>

<br/>
<h2><?php echo $title;?></h2>
<p>Have a question or suggestions?</br></p>

<h3>Adventures Inc</h3>

<p><b>Join The Adventures</b></br>
Street Address</br>
Contact #</br>
Email Address</br></p>

   <br />
    <div class="row">
        <div class="col-md-6">
            <div id="googlemap" style="width:100%; height:350px;"></div>
        </div>
        <br />
        <div class="col-md-6">
            <form class="my-form">
                <div class="form-group">
                    <label for="form-name">Name</label>
                    <input type="email" class="form-control" id="form-name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="form-email">Email Address</label>
                    <input type="email" class="form-control" id="form-email" placeholder="Email Address">
                </div>
                <div class="form-group">
                    <label for="form-subject">Subject</label>
                    <input type="text" class="form-control" id="form-subject" placeholder="Subject">
                </div>
                <div class="form-group">
                    <label for="form-message">Email your Message</label>
                    <textarea class="form-control" id="form-message" placeholder="Message"></textarea>
                </div>
                <button class="btn btn-secondary" type="submit">Contact Us</button>                
            </form>
        </div>
    </div>
</div>

<?php
    require_once 'includes/footer.php';
?>