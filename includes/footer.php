    <br><br>
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
	
<!--===========================================================-->

<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	
<!--===========================================================-->	

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

<!--===========================================================-->  

   <!--Picture Slider-->
   <script src="scripts/jquery-1.4.2.min.js"></script>

   <script>
$(window).load(function(){
		var pages = $('#slider li'), current=0;
		var currentPage,nextPage;
		var timeoutID;
		var buttonClicked=0;

		var handler1=function(){
			buttonClicked=1;
			$('#slider .button').unbind('click');
			currentPage= pages.eq(current);
			if($(this).hasClass('prevButton'))
			{
				if (current <= 0)
					current=pages.length-1;
				else
					current=current-1;
				nextPage = pages.eq(current);	

				nextPage.css("marginLeft",-604);
				nextPage.show();
				nextPage.animate({ marginLeft: 0 }, 800,function(){
					currentPage.hide();
				});
				currentPage.animate({ marginLeft: 604 }, 800,function(){
					$('#slider .button').bind('click',handler1);
				});
			}
			else
			{

				if (current >= pages.length-1)
					current=0;
				else
					current=current+1;
				nextPage = pages.eq(current);	

				nextPage.css("marginLeft",604);
				nextPage.show();
				nextPage.animate({ marginLeft: 0 }, 800,function(){
				});
				currentPage.animate({ marginLeft: -604 }, 800,function(){
					currentPage.hide();
					$('#slider .button').bind('click',handler1);
				});
			}		
		}

		var handler2=function(){
			if (buttonClicked==0)
			{
			$('#slider .button').unbind('click');
			currentPage= pages.eq(current);
			if (current >= pages.length-1)
				current=0;
			else
				current=current+1;
			nextPage = pages.eq(current);	
			nextPage.css("marginLeft",604);
			nextPage.show();
			nextPage.animate({ marginLeft: 0 }, 800,function(){
			});
			currentPage.animate({ marginLeft: -604 }, 800,function(){
				currentPage.hide();
				$('#slider .button').bind('click',handler1);
			});
			timeoutID=setTimeout(function(){
				handler2();	
			}, 4000);
			}
		}

		$('#slider .button').click(function(){
			clearTimeout(timeoutID);
			handler1();
		});

		timeoutID=setTimeout(function(){
			handler2();	
			}, 4000);
		
});

</script>

<!--===========================================================-->

    <!-- Preview Image 
	<script>
	function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#previewImg + img').remove();
            $('#sign-up-form').after('<img src="'+e.target.result+'" width="450" height="300"/>');
            //$('#sign-up-form + embed').remove();
            //$('#sign-up-form').after('<embed src="'+e.target.result+'" width="450" height="300">');
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#image").change(function () {
    filePreview(this);
});

</script> -->

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

<!--===========================================================-->

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