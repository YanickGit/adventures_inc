<?php
    $title = 'Contact Us';
    require_once 'includes/header.php';
    //require_once 'includes/slider.php';
    require_once 'db/db_connect.php';
?>

<br/>
<h2><?php echo $title;?></h2>
<p>Have a question or suggestions?</br></p>

<p><b>The Adventure Building, 3rd Floor, 1077 Earth Boulvard</b>,</br>
Jamaica, West Indies,</br>
P.O. Box 674</br>
876.999.1000-10</br>
wecare@adventures.inc</br></p>

    <div class="row">
        <div class="col-md-6">
            <div id="googlemap" style="width:100%; height:350px;"></div>
        </div>
        <br />
        <div class="col-md-6">
            <form class="my-form">
                <div class="form-group">
                    <input type="text" class="form-control" id="form-name" placeholder="Name">
                    <small id="help" class="form-text text-muted">Type your full name.</small>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="form-email" placeholder="Email Address">
                    <small id="help" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="form-subject" placeholder="Subject">
                    <small id="help" class="form-text text-muted">Type the subject of your message.</small>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="form-message" placeholder="Message"></textarea>
                    <small id="help" class="form-text text-muted">Type your message.</small>
                </div>
                <button class="btn btn-secondary" type="submit">Contact Us</button>                
            </form>
        </div>
    </div>
</div>

<?php
    require_once 'includes/footer.php';
?>