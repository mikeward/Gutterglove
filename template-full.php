<?php
/*
Template Name: Full Width
*/
?>

<?php get_header(); ?> 
 <div class="inner-pad"></div>
<div id="main">		
	<div class="columns">    
    <div class="narrowcolumn singlepage fullwidth">
     <?php if (have_posts()) : ?>
     <?php while (have_posts()) : the_post(); ?>							
			<div class="post">            	
                <div class="title"><h2><?php the_title(); ?></h2></div>                
				<div class="entry">
                     <?php t_show_video($post->ID); ?>
                     <?php the_content(); ?>    
                    <div class="clear"></div>
                </div>                  
			</div>	          	
	<?php endwhile; ?>		
    <?php endif; ?>				
	</div> <!-- END Narrowcolumn -->

<div class="clear"></div>
<?php get_footer(); ?> 
   