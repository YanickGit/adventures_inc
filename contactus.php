<?php
    $title = 'Contact Us';
    require_once 'includes/header.php';
    require_once 'db/db_connect.php';
?>

<br/>
<h2><?php echo $title;?></h2>
<p>Have a question or suggestions?</br></p>

<p><b>The Adventure Building, 3rd Floor, 1077 Earth Boulvard</b>,</br>
Kingston 20, </br>
P.O. Box 674,</br>
Jamaica, West Indies,</br>
876.999.1000-10,</br>
wecare@adventures.inc</br></p>

    <div class="row">
        <div class="col-md-6">
            <div id="googlemap" style="width:100%; height:350px;"></div>
        </div>
        <br />
        <div class="col-md-6">
            <form method="post" action="email-send-contactus.php" class="my-form" autocomplete="off">
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    <small id="help" class="form-text text-muted">Type your full name.</small>
                </div>
                <div class="form-group"> 
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                    <small id="help" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                    <small id="help" class="form-text text-muted">Type the subject of your message.</small>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="message" name="message" placeholder="Message" required></textarea>
                    <small id="help" class="form-text text-muted">Type your message.</small>
                </div>
                <button class="btn btn-secondary" type="submit" name="submit">Contact Us</button>                
            </form>
        </div>
    </div>
</div>

<?php
    require_once 'includes/footer.php';
?>