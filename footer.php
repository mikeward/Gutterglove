			<?
$homepage = "/";
$currentpage = $_SERVER['REQUEST_URI'];
if($homepage==$currentpage) {
echo " ";
} else { echo "</div><!-- .columns -->"; }
?>
		</div> <!-- #main --> 
	</div><!-- .content-pad -->

<div class="clear"></div>
<?php wp_footer(); ?>       

<div id="footer-wrap">
	<div id="footer-container">
		<div id="footer">
			<div class="footer-case"> 
				<h2>Gutterglove Products</h2> 
					<ul> 
						<li><a title="Gutterglove Products" href="<?php get_site_url(); ?>/gutter-guards">Gutterglove Products</a></li> 
						<li><a title="Product Photo Gallery" href="<?php get_site_url(); ?>/media">Product Photo Gallery</a></li> 
						<li><a title="News" href="<?php get_site_url(); ?>/news">News</a></li> 
						<li><a title="Rain Harvesting System" href="<?php get_site_url(); ?>/rain-harvesting-systems">Rain Harvesting System</a></li> 
						<li><a title="Features &amp; Benefits" href="<?php get_site_url(); ?>/features-and-benefits">Features &amp; Benefits</a></li> 
						<li><a title="Testimonials" href="<?php get_site_url(); ?>/testimonials">Testimonials</a></li> 
					</ul> 
			</div><!-- footer-case --> 
		 
			<div class="footer-case"> 
			<h2>Gutterglove Business</h2> 
				<ul> 
					<li><a title="Become A Dealer" href="<?php get_site_url(); ?>/become-a-dealer">Become A Dealer</a></li> 
					<li><a title="CAD Drawings" href="<?php get_site_url(); ?>/dealer-dashboard#downloads">CAD Drawings</a></li> 
					<li><a title="Literature Downloads" href="<?php get_site_url(); ?>/dealer-dashboard#downloads">Literature Downloads</a></li> 
					<li><a title="Product Warranty" href="<?php get_site_url(); ?>/dealer-dashboard#downloads">Product Warranty</a></li> 
					<li><a title="Dealer Dashboard" href="<?php get_site_url(); ?>/dealer-dashboard">Dealer Dashboard</a></li> 
				</ul> 
			</div><!-- footer-case --> 
		 
			<div class="footer-case"> 
			<h2>Our Services</h2> 
				<ul> 
					<li><a title="About Us" href="about">About Us</a></li> 
					<li><a title="Watch Performance Video" onclick="window.open(this.href,'PerformanceVideo','resizable=no,location=no,menubar=no,scrollbars=no,status=no,toolbar=no,fullscreen=no,dependent=no,width=450,height=375,status'); return false" href="http://www.gutterglove.com/gutterguards/video_youtube_performance.html">Watch Performance Video</a></li> 
					<li><a title="Watch The Gutterguard Show" href="<?php get_site_url(); ?>/the-gutterguard-show">Watch The Gutterguard Show</a></li> 
					<li><a title="Gutterguard Installation" href="contact-us">Gutterguard Installation</a></li> 
				</ul> 
			</div><!-- footer-case --> 
		 
			<div class="footer-case"> 
			<h2>Contact Us</h2> 
				<ul> 
					<li><a title="Contact Us Online" href="<?php get_site_url(); ?>/contact-us">Contact Us Online</a></li>
					<li><a title="Support Center" href="<?php get_site_url(); ?>/support">Support Center</a></li> 			
					<li><a title="Request A Quote" href="<?php get_site_url(); ?>/contact-us">Request A Quote</a></li> 
					<li><a title="Terms of Use" href="<?php get_site_url(); ?>/terms-of-use">Terms Of Use</a> | <a title="Privacy Policy" href="<?php get_site_url(); ?>/terms-of-use#privacy-policy">Privacy Policy</a></li> 
					<li><a title="Find A Dealer" href="<?php get_site_url(); ?>/find-a-dealer">Find A Dealer</a></li> 
					</ul>
					<ul class="childcase">
					<li>Copyright 2011 Gutterglove.</li> 
					<li>All Rights Reserved.</li> 
					</ul>
					<ul class="childcase">
					<li><a title="Follow us on Twitter" class="twitter-l" href="http://twitter.com/sacgutterglove">Twitter</a> | <a title="Like us on Facebook" class="facebook-l" href="http://www.facebook.com/pages/Gutterglove/238263679566369">Facebook</a></li> 
				</ul><br />
						<a target="_blank" title="Click for the Business Review of Gutterglove, Inc., a Gutters & Downspouts in Rocklin CA" href="http://www.bbb.org/northeast-california/business-reviews/gutters-and-downspouts/gutterglove-in-rocklin-ca-40001285#sealclick"><img alt="Click for the BBB Business Review of this Gutters & Downspouts in Rocklin CA" style="border: 0;" src="http://seal-Necal.bbb.org/seals/blue-seal-200-42-whitetxt-guttergloveinc-40001285.png" /></a>
			</div><!-- footer-case --> 
		</div><!-- footer -->
	</div><!-- footer-container -->
</div><!-- footer-wrap -->

	<script>
	jQuery(document).ready(function($) {

		$(".scroll").click(function(event){		
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
		});
	});
	</script>
	
<div id="action-case">
	<div id="action-strip">
		<div id="twitter">
		
			<div class="tweetcase">
				<a href="https://twitter.com/sacgutterglove" class="twitter-follow-button tweet" data-show-count="false" data-show-screen-name="false">Follow @sacgutterglove</a>
				<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

				<div class="fb-like" data-href="http://www.facebook.com/pages/Gutterglove/238263679566369" data-send="false" data-layout="button_count" data-width="100" data-show-faces="true"></div>
			</div><!-- .tweetcase -->
				<ul id="twitter_update_list"><li></li></ul>	
				<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
				<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/sacgutterglove.json?callback=twitterCallback2&amp;count=1"></script>
		</div><!-- #twitter -->
		
		<div id="quote-action"><span class="fad">Find A Local Dealer</span><a class="locate" href="<?php echo get_site_url(); ?>/find-a-dealer">Locate</a></div>
		
	</div><!-- action-strip -->
</div><!-- action-case -->

<?php $t_tracking = t_get_option( "t_tracking" );
if ($t_tracking != ""){
	echo stripslashes(stripslashes($t_tracking));
	}
?>

</body>
</html>