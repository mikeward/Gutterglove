<?php get_header(); ?>

<div class="content-pad">

<div class="clear"></div>

<div id="main-subpage">		
	<div class="columns div-slice">
		<div class="narrowcolumn-bare singlepage">
	
			<h1 class="page spacer">Uh Oh! 404 Error</h1>
				
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>							
							
					<?php endwhile; ?>	
					<?php else : ?>
						<div class="post">
						
										
							<div class="entry">
							<h2>Hmmm...</h2>
							<p><?php _e('Sorry, but you are looking for something that isn\'t here. It appears you\'ve missed you\'re intended destination, either through a bad or outdated link, or a typo in the page you were hoping to reach.','nattywp'); ?></p>
							<?php get_search_form(); ?>
							</div>
						</div>
					<?php endif; ?>				
			
		</div><!-- END Narrowcolumn -->
				<div id="sidebar" class="profile">
				   <?php if (!function_exists('dynamic_sidebar') || (!is_active_sidebar(2))) {
						get_sidebar(); 
					  } else {
						echo '<ul>';
						dynamic_sidebar('sidebar-2');
						echo '</ul>';
					  } ?>
				</div>    
				<div class="clear"></div>

    
    <?php get_footer(); ?> 