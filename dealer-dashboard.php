<?php
/**
 * The Template for displaying all single posts.
 *Template name: Dealer Dashboard
 */
include (TEMPLATEPATH . '/header-products.php'); ?>
<div id="main-subpage">		
	<div class="columns div-slice">      
	<h1 class="page"><?php the_title(); ?></h1>
	
	<div class="dealer-controls">
	<a class="order" href="#">Order Products</a>
	<a class="signstatus" href="#">Signout</a>
	</div><!-- .dealer-controls -->
	
	<div id="dealerinfo-case"> 

		<?php
			wp_get_current_user();
			echo '<span class="current-user">Welcome Back, ' . $current_user->company_name . '!<br />';
			echo 'Email: ' . $current_user->user_email . '<br /></span>';
			echo $current_user->company_name . '<br />';
			echo $current_user->address . '<br />';
			echo $current_user->city . '&nbsp;';
			echo $current_user->state . '&nbsp;';
			echo $current_user->zip . '<br />';
		?>
		<span class="<?php echo get_user_role(); ?>"><?php echo get_current_user_role(); ?></span>
	</div><!-- #dealerinfo-case -->

		<div id="usermessage-update">
	<h2 class="cc-white leftpos">Announcement:</h2>

	     <?php if (have_posts()) : ?>
     <?php while (have_posts()) : the_post(); ?>							
					
				<h2 class="cc-lblue rightpos"><?php the_date(); ?></h2>
     			<div class="post">
				<div class="entry">
					 <?php the_content(); ?> 	 
                    <div class="clear"></div>
                </div>                   <?php edit_post_link(__('Edit','nattywp'), '<p>', '</p>'); ?>	                 
			</div>	    

	</div><!-- #usermessage-update -->
	
<div id="dash-wrap">
<img src="<?php echo get_template_directory_uri(); ?>/images/dd-bannerad.jpg" alt="" />

<div class="rightpos cert-center">
<h2 class="cert-title">Certification Center</h2>
<span class="clear"></span>
<span class="cfinclude status ds-certified">Certified</span>
<span class="cert-message">You are currently a certified Gutterglove Installer.</span>
<a class="download" href="#" title="Download Certificate">Download Certificate</a>
</div><!-- .cert-center -->
</div><!-- #dash-wrap -->

<div class="narrowcolumn-bare">


			<?php comments_template( '', true ); ?>      	
	<?php endwhile; ?>		
    <?php endif; ?>	
</div><!-- .narrowcolumn-bare -->



  <div id="sidebar" class="profile">       
    
    <h2>Download Materials</h2>

<ul class="where-about">
<li>CAD Files</li>
<li>Dealer Agreement</li>
<li>Standard Install Client Contract</li>
<li>DIY Show "Cool Tools"</li>
<li>DIY Show "This New House"</li>
<li>Discovery Channel "Renovation Nation"</li>
<li>Popular Mechanics Magazine</li>
<li>The Washington Post</li>
<li>Los Angeles Times</li>
<li>San Francisco Chronicle</li>
</ul>
    </div>    


<div class="clear"></div>
<?php get_footer(); ?> 