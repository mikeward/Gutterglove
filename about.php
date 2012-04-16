<?php
/**
 * The Template for displaying all single posts.
 *Template name: About
 */
include (TEMPLATEPATH . '/header-products.php'); ?>
<div id="main-subpage">		
	<div class="columns div-slice">      
	<h1 class="page"><?php the_title(); ?></h1>

	<div id="timeline">
		<ul id="dates">
			<li><a href="#1900">1996</a></li>
			<li><a href="#1930">2000</a></li>
			<li><a href="#1950">2003</a></li>
			<li><a href="#1977">2007</a></li>
			<li><a href="#2010">2010</a></li>
			<li><a href="#1999">2011</a></li>
			<li><a href="#2001">2012</a></li>
		</ul>
		<ul id="issues">
			<li id="1996">
				<img src="<?php echo get_template_directory_uri(); ?>/images/about-timeline/rob-1996.jpg" width="256" height="256" />
				<h1>1996</h1>
				<h2>Commercial Gutter was founded</h2>
				<p>Commercial Gutter was founded in 1996 offering gutter cleaning and repair services.</p>
			</li>
			<li id="2000">
				<img src="<?php echo get_template_directory_uri(); ?>/images/about-timeline/gutterglovegutterguard-2000.jpg" width="256" height="256" />
				<h1>2000</h1>
				<h2>The Gutterglove Gutterguard was Invented</h2>
				<p>The Gutterglove Gutterguard was Invented. The Groundbreaking product that changed gutter protection.</p>
			</li>
			<li id="2003">
				<img src="<?php echo get_template_directory_uri(); ?>/images/about-timeline/gutterglovepro-2003.jpg" width="256" height="256" />
				<h1>2003</h1>
				<h2>Gutterglove Pro was Introduced</h2>
				<p>Donec semper quam scelerisque tortor dictum gravida. In hac habitasse platea dictumst. Nam pulvinar, odio sed rhoncus suscipit, sem diam ultrices mauris, eu consequat purus metus eu velit. Proin metus odio, aliquam eget molestie nec, gravida ut sapien. Phasellus quis est sed turpis sollicitudin venenatis sed eu odio. Praesent eget neque eu eros interdum malesuada non vel leo. Sed fringilla porta ligula.</p>
			</li>
			<li id="2007">
				<img src="<?php echo get_template_directory_uri(); ?>/images/about-timeline/uspo-logo.jpg" width="256" height="256" />
				<h1>2007</h1>
				<h2>The United States Patent Office Issued Patent</h2>
				<p>Donec semper quam scelerisque tortor dictum gravida. In hac habitasse platea dictumst. Nam pulvinar, odio sed rhoncus suscipit, sem diam ultrices mauris, eu consequat purus metus eu velit. Proin metus odio, aliquam eget molestie nec, gravida ut sapien. Phasellus quis est sed turpis sollicitudin venenatis sed eu odio. Praesent eget neque eu eros interdum malesuada non vel leo. Sed fringilla porta ligula.</p>
			</li>
			<li id="2010">
				<img src="<?php echo get_template_directory_uri(); ?>/images/about-timeline/uspo-logo.jpg" width="256" height="256" />
				<h1>2010</h1>
				<h2>Highest Rated by Consumer Magazine!</h2>
				<p>Donec semper quam scelerisque tortor dictum gravida. In hac habitasse platea dictumst. Nam pulvinar, odio sed rhoncus suscipit, sem diam ultrices mauris, eu consequat purus metus eu velit. Proin metus odio, aliquam eget molestie nec, gravida ut sapien.</p>
			</li>
			<li id="2011">
				<img src="<?php echo get_template_directory_uri(); ?>/images/about-timeline/uspo-logo.jpg" width="256" height="256" />
				<h1>2011</h1>
				<h2>2nd US Patent Issued by USPO</h2>
				<p>Donec semper quam scelerisque tortor dictum gravida. In hac habitasse platea dictumst. Nam pulvinar, odio sed rhoncus suscipit, sem diam ultrices mauris, eu consequat purus metus eu velit. Proin metus odio, aliquam eget molestie nec, gravida ut sapien. Phasellus quis est sed turpis sollicitudin venenatis sed eu odio. Praesent eget neque eu eros interdum malesuada non vel leo. Sed fringilla porta ligula.</p>
			</li>
			<li id="2012">
				<img src="<?php echo get_template_directory_uri(); ?>/images/about-timeline/9.png" width="256" height="256" />
				<h1>2012</h1>
				<p>Donec semper quam scelerisque tortor dictum gravida. In hac habitasse platea dictumst. Nam pulvinar, odio sed rhoncus suscipit, sem diam ultrices mauris, eu consequat purus metus eu velit. Proin metus odio, aliquam eget molestie nec, gravida ut sapien. Phasellus quis est sed turpis sollicitudin venenatis sed eu odio. Praesent eget neque eu eros interdum malesuada non vel leo. Sed fringilla porta ligula.</p>
			</li>
		</ul>
		<div id="grad_left"></div>
		<div id="grad_right"></div>
		<a href="#" id="next">+</a>
		<a href="#" id="prev">-</a>
	</div>

<div class="narrowcolumn-bare">

     <?php if (have_posts()) : ?>
     <?php while (have_posts()) : the_post(); ?>							
					

     			<div class="post">
				<div class="entry">
                     <?php t_show_video($post->ID); ?>
                     <?php the_content(); ?>    
                    <div class="clear"></div>
                </div>                   <?php edit_post_link(__('Edit','nattywp'), '<p>', '</p>'); ?>	                 
			</div>	    
			<?php comments_template( '', true ); ?>      	
	<?php endwhile; ?>		
    <?php endif; ?>	
</div><!-- .narrowcolumn-bare -->



  <div id="sidebar" class="profile">       
    <h2>Where We've Been</h2>

<ul class="where-about">
<li>ABC News</li>
<li>CBS News including "The Early Show"</li>
<li>NBC News</li>
<li>DIY Show "Cool Tools"</li>
<li>DIY Show "This New House"</li>
<li>Discovery Channel "Renovation Nation"</li>
<li>Popular Mechanics Magazine</li>
<li>The Washington Post</li>
<li>Los Angeles Times</li>
<li>San Francisco Chronicle</li>
</ul>
    <br />

       <div class="client-reviews cr-s">
   <h3>Client Reviews</h3><img src="<?php echo get_template_directory_uri(); ?>/images/JerryLRoss-NASA.jpg" /><a class="continue" href="#">Continue Reading</a>
   <p>I've been involved in the NASA Apollo Program for about 10 or 11 years from 1959 through the summer of 1971. I was a quality control representative for NASA. And I had the primary responsibility to oversee the development, and the manufacturing, the assembly, and the testing, of the lunar excursion modular descent engine. And I put my stamp of approval on it that it meets all of NASA's requirements, for a reliable engine...<span class="customer">Leonard Taylor - Retired QCR for NASA</span></p>
   </div><!-- #client-reviews -->

    </div>    


<div class="clear"></div>
<?php get_footer(); ?> 