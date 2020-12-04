    <br>
        <div id="footer">
            <?php
                date_default_timezone_set("America/Bogota");
                $jm_date_time = date("yy/m/d, g:i a", time());
                $year = date("y");
                echo'
                <br><hr/>
                <p class = "text-center">Copyright &copy; 2019-'.$year.' | Yanick Levy | 1500174645 | Module #3 - Assignment #1 | Current Date & Time: '.$jm_date_time.'</p>
            ;'?>
        </div>
	</div>
	
<!--============================================================================================================-->

<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	
<!--============================================================================================================-->

    <!--Contact Form Maps-->
  <script src="https://maps.googleapis.com/maps/api/js"></script>
  <script type="text/javascript">
      jQuery(function ($) {
          // Google Maps setup
          var googlemap = new google.maps.Map(
              document.getElementById('googlemap'),
              {
                  center: new google.maps.LatLng(44.5403, -78.5463),
                  zoom: 8,
                  mapTypeId: google.maps.MapTypeId.ROADMAP
              }
          );
      });
  </script>

<!--============================================================================================================-->

   <!--Picture Slider-->
   <script src="scripts/jquery-1.4.2.min.js"></script>

   

<!--============================================================================================================-->
<!-- Image Slider #2 -->

<script>
$(document).ready(function(){
  $('.slider').slider();
});
</script>


<!--============================================================================================================-->

    <!-- Preview Image -->

<script>
    function previewImage(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#signup-img").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
</script>

<!--============================================================================================================-->

    <!-- jQuery UI DatePicker -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
        $( "#dob" ).datepicker({ 
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            defaultDate: '-16y',
            yearRange: '-100:-16'});
        } );
    </script>

  </body>
</html>