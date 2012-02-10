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
	lol
	</div><!-- #dealerinfo-case -->
	
	<?php
    wp_get_current_user();
    /**
     * @example Safe usage: $current_user = wp_get_current_user();
     * if ( !($current_user instanceof WP_User) )
     *     return;
     */
    echo 'Username: ' . $current_user->user_login . '<br />';
    echo 'User email: ' . $current_user->user_email . '<br />';
    echo 'User first name: ' . $current_user->user_firstname . '<br />';
    echo 'User last name: ' . $current_user->user_lastname . '<br />';
    echo 'User display name: ' . $current_user->display_name . '<br />';
    echo 'User ID: ' . $current_user->ID . '<br />';
    echo get_current_user_role();
?>

<h3 class="finclude-b <?php echo get_user_role(); ?>"><?php echo get_current_user_role(); ?></h3>

<div id="dash-wrap">

</div><!-- #dash-wrap -->

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
    
    <h2>Download Materials</h2>

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
    </div>    


<div class="clear"></div>
<?php get_footer(); ?> 