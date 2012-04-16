<?php
/**
 * This template is for the Gutterglove Show Videos
 *Template name: Gutterglove Show
 */
 get_header(); ?> 
 
<div id="main-ggshow">		
           	<h1 class="page"><?php the_title(); ?></h1>
	<div class="columns div-slice">      
    <div class="narrowcolumn-bare singlepage">
	

     <?php if (have_posts()) : ?>
     <?php while (have_posts()) : the_post(); ?>	
	
				
                <div class="post">
				<div class="entry">

                     <?php t_show_video($post->ID); ?>
                     <?php the_content(); ?>    
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
	
	

	</div> <!-- END Narrowcolumn -->
    <div id="sidebar" class="profile">       
	<h2>About The Show</h2>
        <div class="c-wrap">
        
        <p>Robert Lenney, founder of Gutterglove, have created an exciting and aesthetically eye-opening, Hollywood-style educational video depicting the world's first true gutter guard.</p>
		<p>Including side-by-side comparisons with other competing gutter guards, Gutterglove is shown to out-perform, out-last and out-smart these "out dated" gutter guards. Packed with revealing and compelling factual evidence through visually captivating demonstrations, Gutterglove is proven to be your only choice in gutter guard protection on your home.</p>
       
        </div>
        <div class="c-wrap phone-case">
    <h2>Buy the DVD</h2>
    <p>Toll Free: 877-662-5644<br />USA Work: 916-624-5000</p>
        </div>
    </div><!-- #sidebar -->    
<div class="clear"></div>
<?php get_footer(); ?> 