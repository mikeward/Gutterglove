<?php /**
 * This template is for the News Page
 *Template name: Media
 */
 get_header( "gallery" ); ?> 

<div class="content-pad">

<div class="clear"></div> 
 
<div id="main-subpage">		
	<div class="columns div-slice">      
    <div class="narrowcolumn-bare singlepage">
    
     <?php if (have_posts()) : ?>
     <?php while (have_posts()) : the_post(); ?>							
					
	<h1 class="page"><?php the_title(); ?></h1>
	
	<br />
    <h2>Product Photo Gallery</h2>
    
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
    <div id="sidebar" class="profile">   

	<span class="social-block sb-facebook">Like on Facebook</span>
	<span class="social-block sb-twitter">Share on Twitter</span>
    
<h2>Download Free Wallpapers</h2>

<span class="wallpaper-wrap">
	<span class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/download-wallpaper1.jpg" alt="Download Wallpaper" /></span>
	<p>Download Standard | Download Widesreen</p>
</span>

<span class="wallpaper-wrap">
	<span class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/download-wallpaper2.jpg" alt="Download Wallpaper" /></span>
	<p>Download Standard | Download Widesreen</p>
</span>

<span class="wallpaper-wrap">
	<span class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/download-wallpaper3.jpg" alt="Download Wallpaper" /></span>
	<p>Download Standard | Download Widesreen</p>
</span>

<span class="wallpaper-wrap">
	<span class="img"><img src="<?php echo get_template_directory_uri(); ?>/images/download-wallpaper2.jpg" alt="Download Wallpaper" /></span>
	<p>Download Standard | Download Widesreen</p>
</span>

    </div>    
<div class="clear"></div>
<?php get_footer(); ?> 