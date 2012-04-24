<?php get_header(); ?>
<div class="content-pad">

<div class="clear"></div>
<div id="main-subpage">		
	<div class="columns div-slice">
		<div class="narrowcolumn-bare singlepage">
	
			<h1 class="page spacer">Gutterglove News Center</h1>
				
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>							
				<div class="post">
								
					<span class="support-question">Support Center FAQ</span>
					<div class="title">
					<article>
						<h2><?php the_title(); ?></h2>
										
						<span class="metacase">

							<small><?php _e('Posted on','nattywp'); ?> <?php the_time('M jS, Y') ?> <?php _e('in','nattywp'); ?> <?php the_category(' | ');?> <?php edit_post_link(__('Edit','nattywp'), ' | ', ''); ?></small> 
							<small class="cc"> |<?php
							$commentscount = get_comments_number();
							if($commentscount == 1): $commenttext = 'comment'; endif;
							if($commentscount > 1 || $commentscount == 0): $commenttext = 'Comments'; endif;
							echo ' '.$commentscount.' '.$commenttext.'';
							?></small>

							<!-- AddThis Button BEGIN -->
							<div class="addthis_toolbox addthis_default_style ">
							<a class="addthis_button_preferred_1"></a>
							<a class="addthis_button_preferred_2"></a>
							<a class="addthis_button_preferred_3"></a>
							<a class="addthis_button_preferred_4"></a>
							<a class="addthis_button_compact"></a>
							<a class="addthis_counter addthis_bubble_style"></a>
							</div>
							<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4e71122f3c872a5e"></script>
							<!-- AddThis Button END -->

						</span><!-- .metacase -->
						</article>
						</div><!-- .title -->
					<div class="entry">
						 <?php t_show_video($post->ID); ?>
						 <?php the_content(); ?>    
						<div class="clear"></div>
					</div>              
									

							
					<p><small><?php _e('You can follow any responses to this entry through the','nattywp'); ?> <?php post_comments_feed_link('RSS 2.0'); ?>
						<?php if ( comments_open() && pings_open() ) {
							// Both Comments and Pings are open ?>
							<?php _e('You can <a href="#respond">leave a response</a>, or','nattywp'); ?> <a href="<?php trackback_url(); ?>" rel="trackback"><?php _e('trackback','nattywp'); ?></a>.
						<?php } elseif ( !comments_open() && pings_open() ) {
							// Only Pings are Open ?>
							<?php _e('Responses are currently closed, but you can','nattywp'); ?> <a href="<?php trackback_url(); ?> " rel="trackback"><?php _e('trackback','nattywp'); ?></a>.
						<?php } elseif ( comments_open() && !pings_open() ) {
							// Comments are open, Pings are not ?>							
							<?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.','nattywp'); ?>
						<?php } elseif ( !comments_open() && !pings_open() ) {
							// Neither Comments, nor Pings are open ?>
							<?php _e('Both comments and pings are currently closed.','nattywp'); ?>							
						<?php }  ?>
					</small></p>	
								
				</div><!-- .post -->
							
					<?php endwhile; ?>	
					<?php else : ?>
						<div class="post">
						<h2><?php _e('Not Found','nattywp'); ?></h2>
							<div class="entry"><p><?php _e('Sorry, but you are looking for something that isn\'t here.','nattywp'); ?></p>
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