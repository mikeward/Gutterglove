<?php /**
 * This template is for the News Page
 *Template name: Media
 */
 get_header( "gallery" ); ?> 
<div id="main-subpage">		
	<div class="columns">      
    <div class="widecolumn-bare singlepage">
    
     <?php if (have_posts()) : ?>
     <?php while (have_posts()) : the_post(); ?>							
					
	<h1 class="page"><?php the_title(); ?></h1>
     			<div class="post">
				<div class="entry">
                     <?php t_show_video($post->ID); ?>
                     <?php the_content(); ?>    
                    <div class="clear"></div>
                </div>   
           
			</div>	    
			<?php comments_template( '', true ); ?>      	
	<?php endwhile; ?>		
    <?php endif; ?>				
	</div> <!-- END widecolumn -->
   
<div class="clear"></div>
<?php get_footer(); ?> 