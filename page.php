<?php get_header(); ?> 

<div class="content-pad">

<div class="clear"></div>

<div id="main-subpage">		
	<div class="columns">      
    <div class="narrowcolumn-bare singlepage">
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
	</div> <!-- END Narrowcolumn -->
   
<div class="clear"></div>
<?php get_footer(); ?> 