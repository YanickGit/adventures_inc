    <br><br><br>
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

<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    
   <!-- Slider jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

  <!-- Slider FlexSlider -->
  <script defer src="scripts/slider/jquery.flexslider.js"></script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>


  <!-- Slider Syntax Highlighter -->
  <script type="text/javascript" src="scripts/slider/shCore.js"></script>
  <script type="text/javascript" src="scripts/slider/shBrushXml.js"></script>
  <script type="text/javascript" src="scripts/slider/shBrushJScript.js"></script>

  <!-- Slider Optional FlexSlider Additions -->
  <script src="scripts/slider/jquery.easing.js"></script>
  <script src="scripts/slider/jquery.mousewheel.js"></script>
  <script defer src="scripts/slider/demo.js"></script>

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