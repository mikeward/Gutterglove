    </div> <!-- END Columns --> 
    
   
</div><!-- END main -->
</div><!-- #content-pad -->
<div class="clear"></div>
<?php wp_footer(); ?>       
<div id="footer-wrap">
<div id="footer-container">

<div id="footer">



<div class="footer-case"> 
	<h2>Gutterglove Products</h2> 
		<ul> 
			<li><a href="<?php get_site_url(); ?>/test/gutter-guards">Gutterglove Products</a></li> 
			<li><a href="<?php get_site_url(); ?>/test/media">Product Photo Gallery</a></li> 
			<li><a href="<?php get_site_url(); ?>/test/news">News</a></li> 
			<li><a href="<?php get_site_url(); ?>/test/rain-harvesting-systems">Rain Harvesting System</a></li> 
			<li><a href="<?php get_site_url(); ?>/test/features-and-benefits">Features & Benefits</a></li> 
			<li><a href="<?php get_site_url(); ?>/test/testimonials">Testimonials</a></li> 
		</ul> 
</div><!-- footer-case --> 
 
	<div class="footer-case"> 
	<h2>Gutterglove Business</h2> 
		<ul> 
			<li><a href="<?php get_site_url(); ?>/test/become-a-dealer">Become A Dealer</a></li> 
			<li><a href="<?php get_site_url(); ?>/test/dealer-dashboard#downloads">CAD Drawings</a></li> 
			<li><a href="<?php get_site_url(); ?>/test/dealer-dashboard#downloads">Literature Downloads</a></li> 
			<li><a href="<?php get_site_url(); ?>/test/dealer-dashboard#downloads">Product Warranty</a></li> 
			<li><a href="<?php get_site_url(); ?>/test/dealer-dashboard">Dealer Dashboard</a></li> 
		</ul> 
	</div><!-- footer-case --> 
 
	<div class="footer-case"> 
	<h2>Our Services</h2> 
		<ul> 
			<li><a href="about">About Us</a></li> 
			<li><a onclick="window.open(this.href,'PerformanceVideo','resizable=no,location=no,menubar=no,scrollbars=no,status=no,toolbar=no,fullscreen=no,dependent=no,width=450,height=375,status'); return false" href="http://www.gutterglove.com/gutterguards/video_youtube_performance.html">Watch Performance Video</a></li> 
			<li><a href="<?php get_site_url(); ?>/test/the-gutterguard-show">Watch The Gutterguard Show</a></li> 
			<li><a href="contact-us">Gutterguard Installation</a></li> 
		</ul> 
	</div><!-- footer-case --> 
 
	<div class="footer-case"> 
	<h2>Contact Us</h2> 
		<ul> 
			<li><a href="<?php get_site_url(); ?>/test/contact-us">Contact Us Online</a></li>
			<li><a href="<?php get_site_url(); ?>/test/support">Support Center</a></li> 			
			<li><a href="<?php get_site_url(); ?>/test/contact-us">Request A Quote</a></li> 
			<li><a href="<?php get_site_url(); ?>/test/terms-of-use">Terms Of Use</a> | <a href="<?php get_site_url(); ?>/test/terms-of-use#privacy-policy">Privacy Policy</a></li> 
			<li><a href="<?php get_site_url(); ?>/test/find-a-dealer">Find A Dealer</a></li> 
			<br /> 
			<li>Copyright 2011 Gutterglove.</li> 
			<li>All Rights Reserved.</li> 
			<br /> 
			<li><a class="twitter-l" href="http://twitter.com/sacgutterglove">Twitter</a> | <a class="facebook-l" href="http://www.facebook.com/pages/Gutterglove/238263679566369">Facebook</a></li> 
		</ul><br />
				<a target="_blank" title="Click for the Business Review of Gutterglove, Inc., a Gutters & Downspouts in Rocklin CA" href="http://www.bbb.org/northeast-california/business-reviews/gutters-and-downspouts/gutterglove-in-rocklin-ca-40001285#sealclick"><img alt="Click for the BBB Business Review of this Gutters & Downspouts in Rocklin CA" style="border: 0;" src="http://seal-Necal.bbb.org/seals/blue-seal-200-42-whitetxt-guttergloveinc-40001285.png" /></a>


	</div><!-- footer-case --> 
		
</div><!-- footer -->

	    <script>
jQuery(document).ready(function($) {
 
	$(".scroll").click(function(event){		
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
	});
});
    </script>
    
</div><!-- footer-container -->
</div><!-- footer-wrap -->
<div id="action-case">
<div id="action-strip">
		<div id="twitter">


<a target="_blank" href="http://www.twitter.com/sacgutterglove/" class="tweet">@SacGutterglove | </a>
		<ul id="twitter_update_list"><li></li></ul>	
		<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
		<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/sacgutterglove.json?callback=twitterCallback2&amp;count=1"></script>
		</div>

	
	<div id="quote-action"><span class="fad">Find A Local Dealer</span><a class="locate" href="<?php echo get_site_url(); ?>/find-a-dealer">Locate</a></div>
		
</div><!-- action-strip -->
</div><!-- actop-case -->

<?php $t_tracking = t_get_option( "t_tracking" );
if ($t_tracking != ""){
	echo stripslashes(stripslashes($t_tracking));
	}
?>

</body>
</html>