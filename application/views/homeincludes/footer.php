<!---->
		<footer id="pagefooter" class="copy">
            <p>&copy; 2017 QR Solutions. All Rights Reserved | Powered by <a href="http://qrsolutions.com.au/" target="_blank">QR Solutions</a> </p>
	    </footer>
	</body>
</html>

	<!---->
	<!-- <script src="<?php// echo WEB_DIR;?>assets/js/jquery.min.js"> </script>	 -->
	<script src="<?php echo WEB_DIR;?>/assets/js/jquery-2.1.4.min.js"></script>	
	<!--//scrolling js-->
	<script src="<?php echo WEB_DIR;?>assets/js/bootstrap.min.js"> </script>
	
	
<!-- Mainly scripts -->
<script src="<?php echo WEB_DIR;?>assets/js/jquery.metisMenu.js"></script>
<script src="<?php echo WEB_DIR;?>assets/js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->

<script src="<?php echo WEB_DIR;?>assets/js/custom.js"></script>
<script src="<?php echo WEB_DIR;?>assets/js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			

			
		});
		</script>

<!----->

<!--pie-chart--->
<script src="<?php echo WEB_DIR;?>assets/js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });
		
		
  $(window).scroll(function () {
 if ($(this).scrollTop() > 500) {
        $('#messagewindow').animate({scrollTop: $('#messagewindow')[0].scrollHeight}, 30000);
		
		
		}
		
		
		var page = $("html, body");

$( "#messagewindow" ).click(function(e) {

   $( "#messagewindow" ).on("scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove", function(){
       $( "#messagewindow" ).stop();
   });

   $( "#messagewindow" ).animate({ scrollTop: $(this).position().top }, 'slow', function(){
      $( "#messagewindow" ).off("scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove");
   });

   return false; 
});
    });
    </script>
	
	<script src="<?php echo WEB_DIR;?>assets/js/owlcarousel/owl.carousel.min.js"></script>
<script>

$('.owl-carousel').owlCarousel({
   loop:true,
   margin:10,
   nav:false,
   autoplay:true,
   autoplayTimeout:8000,
   responsive:{
       0:{
           items:1
       },
       600:{
           items:3
       },
       1000:{
           items:4
       }
   }
});


</script>
<!--skycons-icons-->
<script src="<?php echo WEB_DIR;?>assets/js/skycons.js"></script>
<!--//skycons-icons-->
<!--scrolling js-->
	<script src="<?php echo WEB_DIR;?>assets/js/jquery.nicescroll.js"></script>
	<script src="<?php echo WEB_DIR;?>assets/js/scripts.js"></script>
	<!-- <script src="<?php echo WEB_DIR;?>assets/js/fixedonscroll.js"></script>  -->