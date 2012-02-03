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

<?php 
$t_show_post = t_get_option ("t_show_post");	
?>    

<div id="main">		
	<div class="columns">      

	
	
        <div class="narrowcolumn">
     	<h2 class="title">Our Stainless Steel Mesh Gutter Guards</h2>
   <div id="features-case">
   <ul id="home-features">
		<li class="even"><a href="features-and-benefits#eliminates-sec"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/benefit_1.png" alt="Eliminates gutter cleaning altogether" /><span class="title">Eliminates gutter cleaning altogether</span>
		</a>
		</li>
		<li class="odd"><a href="features-and-benefits#filter-sec"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/benefit_2.png" alt="Keeps out leaves and debris" /><span class="title">Keeps out leaves and debris</span></a></li>
		<li class="even trans"><a href="features-and-benefits#noclog-sec"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/benefit_3.png" alt="No Cloggs" /><span class="title">Virtually No Clogging</span></a></li>
   </ul>
   
   <ul id="home-features-second">
		<li class="even"><a href="features-and-benefits#fit-sec"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/benefit_4.png" alt="Fits on any gutter and roof type" /><span class="title">Fits on any gutter and roof type</span></a></li>
		<li class="odd"><a href="features-and-benefits#aluminum-sec"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/benefit_5.png" alt="Anodized aluminum channel frame keeps guard strong" /><span class="title">Anodized aluminum channel frame keeps guard strong</span></a></li>
		<li class="even trans"><a href="features-and-benefits#stainlesssteel-sec"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/benefit_6.png" alt="316 surgical-grade stainless steel mesh can handle any debris from entrance." /><span class="title">316 surgical-grade stainless steel mesh</span></a></li>
   </ul>
  
			<span class="ggproduct-features"><a href="features-and-benefits">View Product Features & Benefits</a></span>
  </div><!-- #features-case -->
  
   </div> <!-- END Narrowcolumn -->
   <div id="sidebar" class="profile">
      <h2 class="title why">Why Gutterglove</h2>
	  <div id="reasons-container">
			<ul id="reasons-case">
				<li>25 Year Product Warranty</li>
				<li>The only anodized stainless steel gutterguard on the market</li>
				<li>Hi-grade 316 mesh surgical stainless steel mesh</li>
				<li>Highest rated gutter guard product by leading consumer magazine</li>
				<li>Millions of feet of happy customers</li>
				<li>Peace of mind to no more gutter cleaning</li>
				<li>Local representation by local Gutterglove dealer</li>
			</ul>
   <a class="contact-us-action" href="contact-us">Receive More Information</a>
   </div><!-- #reasons-container -->
      </div><!-- #client-reviews -->

   </div>
   
   
	
     <div class="narrowcolumn">
	<div class="news-container">
     	<h2 class="title">In the News</h2>
     <?php if (have_posts()) :  query_posts( 'posts_per_page=3' );  ?>
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
                    the_advanced_excerpt('length=40&exclude_tags=img,a&read_more=Read More');   ?>  
                                     <?php edit_post_link(__('Edit','nattywp'), ' | ', ''); ?>
                <div id="morepage-list"><?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?></div>                       
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
   <h3>Client Reviews</h3><img src="<?php echo get_template_directory_uri(); ?>/images/JerryLRoss-NASA.jpg" /><a class="continue" href="#">Continue Reading</a>
   <p>I've been involved in the NASA Apollo Program for about 10 or 11 years from 1959 through the summer of 1971. I was a quality control representative for NASA. And I had the primary responsibility to oversee the development, and the manufacturing, the assembly, and the testing, of the lunar excursion modular descent engine. And I put my stamp of approval on it that it meets all of NASA's requirements, for a reliable engine...<span class="customer">Leonard Taylor - Retired QCR for NASA</span></p>
   </div><!-- #client-reviews -->

   </div>     
   
<div class="clear"></div>    

<div id="mid-case-action">
		
        <div class="mid-case review-case">
            <span class="block-case"><h2><a href="#">Gutterglove's Review!</a></h2><a title="Check out our Gutterglove Review" class="img-action gg-review" href="#"><span class="link">Check out our Gutterglove Review</span></a><p>Gutterglove Gutterguard is a 
            highly advanced gutter protection 
            system offering
            amazing functions. It Advances and offers gutter protection 
            system offering also.
			</p>
            </span>
		</div>

        <div class="mid-case show-case">
            <span class="block-case"><h2><a href="#">The Gutterguard Show</a></h2><a class="img-action gg-show" title="Watch our Gutterguard Show Online" href="#"><span class="link">Watch our Gutterguard Show Online</span></a><p>Donec velit risus, volutpat at viverra ut, malesuada non magna. Nullam ornare sem turpis, a convallis nibh.</p>
            </span>
		</div>

        <div class="mid-case performance-case">
            <span class="block-case"><h2><a href="#">Performance Video</a></h2><a class="img-action gg-performance" title="Watch Gutterglove's Performance Video" href="#"><span class="link">Watch Gutterglove's Performance Video</span></a><p>Facilisis interdum quis quis nunc. Curabitur malesuada massa quam. Donec eu aliquet diam. Nunc at risus eu nisi ultrices viverra.</p>
            </span>
		</div>

</div><!-- #mid-case-action -->


<?php get_footer(); ?> 