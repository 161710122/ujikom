<div id="colorlib-subscribe">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
          
				</div>
			</div>
		</div>

		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 colorlib-widget">
						<h4>About Store</h4>
						<p>Toko Suku Cadang Otomotif yang menyediakan berbagai barang khususnya bagi pengendara matic menerima eceran maupun grosir</p>
						
					</div>

					<div class="col-md-2">
						<h4>News</h4>
						<ul class="colorlib-footer-links">
							<li><a href="blog.html">Blog</a></li>
						</ul>
					</div>

					<div class="col-md-3">
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li>Komplek Batununggal Indah 5 <br> No.118, Bandung 40235</li>
							<li><a href="#">087822899576</a></li>
							<li><a href="#">Line : garage20maticshop</a></li>
							
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="row">
					<div class="col-md-12 text-center">
						<p>
							
							<span class="block"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Created by Garage20 
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span> 
							
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="/assets2/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="/assets2/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="/assets2/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="/assets2/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="/assets2/js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="/assets2/js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="/assets2/js/jquery.magnific-popup.min.js"></script>
	<script src="/assets2/js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="/assets2/js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="/assets2/js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="/assets2/js/main.js"></script>
    <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
	</body>
</html>

