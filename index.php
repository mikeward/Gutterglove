<?php 

function mobileDevice()
{
$type = $_SERVER['HTTP_USER_AGENT'];
if(strpos((string)$type, "Windows Phone") != false || strpos((string)$type, "iPhone") != false || strpos((string)$type, "Android") != false)
return true;
else
return false;
}
if(mobileDevice() == true)
header('Location: mobile.php');

?>
<?php get_header();?> 

<div id="banner-wrap">   
	<div class="head-img">
	  
	  <?php $t_custom_background = get_option( "nattywp_custom_header" ); 
		if ($t_custom_background != '') { ?>
		<img src="<?php echo $t_custom_background; ?>" alt="Header image" border="0" />  
	   <?php } elseif (!isset($t_main_img) || $t_main_img == 'no' || $t_main_img == 'header2.jpg' ) {  ?>
		<?php if (function_exists('simple_nivo_slider')) simple_nivo_slider(); ?>
	   <?php } else { ?>  
		<img src="<?php echo get_template_directory_uri(); ?>/images/header/<?php echo t_get_option( "t_main_img" ); ?>" alt="Header image" border="0" />  
	  <?php } ?>
	</div>
	<!-- END Header -->
</div><!-- #banner-wrap -->

<?php 
$t_show_post = t_get_option ("t_show_post");	
?>    

<div class="content-pad">

<div id="main">		

<div id="promo-container">
	<div class="promo-case">
		<h3>Features & Benefits</h3>
		<img src="<?php echo get_template_directory_uri(); ?>/images/benefitsfeatures-snippet.jpg" alt="Features and Benefits" />
		<p>Learn why Gutterglove gutter guard is the cream of the crop.</p>
		<a href="features-and-benefits"><span class="stbttn cu-place">Explore Features</span></a>
	</div><!-- .promo-case -->

	<div class="promo-case">
		<h3>Gutterglove for Your Home</h3>
		<img src="<?php echo get_template_directory_uri(); ?>/images/whyyourhome-snippet.jpg" alt="Features and Benefits" />
		<p>Discover why installing Gutterglove on your home gives you peace of mind and a lot advantages.</p>
		<a href="#"><span class="stbttn cu-place">Learn More</span></a>
	</div><!-- .promo-case -->
	
	<div class="promo-case promocase-rpad">
		<h3>Become A Gutterglove Installer</h3>
		<img src="<?php echo get_template_directory_uri(); ?>/images/becomeadealer-snippet.jpg" alt="Become A Dealer" />
		<p>Become a Certified Gutterglove Dealer and install our amazing industry flagship product in your area.</p>
		<a href="become-a-dealer"><span class="stbttn cu-place">What's Included</span></a>
	</div><!-- .promo-case -->
</div><!-- #promo-container -->

<!-- placeholder for previous content --> 
<div class="centerpod-wrap"> 
        <div class="narrowcolumn">
	<div class="news-container">
     	<h2 class="title">In the News</h2>
     <?php if (have_posts()) :  query_posts( 'posts_per_page=4' );  ?>
     <?php while (have_posts()) : the_post(); ?>							
			<div <?php post_class();?>>
            	
                <div class="news-case">
                <div class="timeblock"><span class="tmonth"><?php the_time('M'); ?></span><span class="tdate"><?php the_time('j'); ?></span> </div> 
                <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                </div>                
				<div class="entry">
            <?php    
                if ($t_show_post == 'no') {//excerpt  
                    get_thumb('Image','130','85','small-image', '<div class="thumb">', '</div>' );                   
                    the_advanced_excerpt('length=2&exclude_tags=img&read_more=Read More');  
                } else { //fullpost 
                    t_show_video($post->ID);
                      ?>  
                                  
                <div class="morepage-list"><?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?></div>                       
            <?php } ?>
            <div class="clear"></div>
       </div>              
            
			</div>		
	<?php endwhile; ?>	

    <?php else : 
		echo '<div class="post">';
		if ( is_category() ) { // If this is a category archive
			printf(__('<h2 class=\'center\'>Sorry, but there aren\'t any posts in the %s category yet.</h2>','nattywp'), single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			_e('<h2>Sorry, but there aren\'t any posts with this date.</h2>','nattywp');
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf(__('<h2 class=\'center\'>Sorry, but there aren\'t any posts by %s yet.</h2>','nattywp'), $userdata->display_name);
		} else {
        _e('<h2 class=\'center\'>No posts found.</h2>','nattywp');
		}
		get_search_form();	
		echo '</div>';		
	endif; ?>
	
	</div><!-- .news-container -->
	
 </div> <!-- END Narrowcolumn -->
   <div id="sidebar" class="profile">
	   <div class="client-reviews cr-w">
	    <h3>Client Reviews</h3><img src="<?php echo get_template_directory_uri(); ?>/images/Leonard-Taylor.jpg" alt="Leonard Taylor, Retired QCR for NASA" /><a class="continue" href="<?php get_site_url(); ?>/testimonials">Continue Reading</a>
	   <p>I've been involved in the NASA Apollo Program for about 10 or 11 years from 1959 through the summer of 1971. I was a quality control representative for NASA. And I had the primary responsibility to oversee the development, and the manufacturing, the assembly, and the testing, of the lunar excursion modular descent engine. And I put my stamp of approval on it that it meets all of NASA's requirements, for a reliable engine...<span class="customer">Leonard Taylor - Retired QCR for NASA</span></p>
	   </div><!-- #client-reviews -->
   </div><!-- .sidebar -->   

</div><!-- centerpod-wrap -->
<!-- End of removal of content -->
   
<div class="clear"></div>    

<div id="mid-case-action">
		
        <div class="mid-case review-case">
            <div class="block-case"><h2><a href="#">Gutterglove's Review!</a></h2><a title="Check out our Gutterglove Review" class="img-action gg-review" href="#"><span class="link">Check out our Gutterglove Review</span></a><p>Gutterglove Gutterguard is a 
            highly advanced gutter protection 
            system offering
            amazing functions. It Advances and offers gutter protection 
            system offering also.
			</p>
            </div>
		</div>

        <div class="mid-case show-case">
            <div class="block-case"><h2><a href="<?php get_site_url(); ?>/test/the-gutterguard-show">The Gutterguard Show</a></h2><a class="img-action gg-show" title="Watch our Gutterguard Show Online" href="<?php get_site_url(); ?>/test/the-gutterguard-show"><span class="link">Watch our Gutterguard Show Online</span></a><p>Donec velit risus, volutpat at viverra ut, malesuada non magna. Nullam ornare sem turpis, a convallis nibh.</p>
            </div>
		</div>

        <div class="mid-case performance-case">
            <div class="block-case"><h2><a href="#">Performance Video</a></h2><a class="img-action gg-performance" title="Watch Gutterglove's Performance Video" href="#"><span class="link">Watch Gutterglove's Performance Video</span></a><p>Facilisis interdum quis quis nunc. Curabitur malesuada massa quam. Donec eu aliquet diam. Nunc at risus eu nisi ultrices viverra.</p>
            </div>
		</div>

</div><!-- #mid-case-action -->


<?php get_footer(); ?> 