<?php
/**
 * The Template for displaying all single posts.
 *Template name: About
 */
include (TEMPLATEPATH . '/header-products.php'); ?>
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
                </div>                   <?php edit_post_link(__('Edit','nattywp'), '<p>', '</p>'); ?>	                 
			</div>	    
			<?php comments_template( '', true ); ?>      	
	<?php endwhile; ?>		
    <?php endif; ?>				
	</div> <!-- END Narrowcolumn -->
    <div id="sidebar" class="profile">
    
    <div id="co-timeline">
    <ul>
    <li>
    	<span class="digit-title"><span class="ninety-six"></span></span>
        <span class="subtitle">Robert Lenney and John Lewis co-founded<br />Commercial Gutter</span>
        <span class="time-data">Offering gutter cleaning and repair services.</span>
        
    </li>
    
    <li>
    	<span class="digit-title"><span class="late-nineties"></span></span>
        <span class="subtitle">The Gutterglove Gutterguard was Invented</span>
        <span class="time-data">The Groundbreaking product that changed gutter protection.</span>
    </li>
    
    <li>
    	<span class="digit-title"><span class="d2003"></span></span>
        <span class="subtitle">Gutterglove Pro was Introduced</span>
        <span class="time-data">Filters Leaves Debris and roof grit.</span>
    </li>
    
    <li>
    	<span class="digit-title"><span class="d2007"></span></span>
        <span class="subtitle">The United States Patent Office Issued Patent</span>
        <span class="time-data">They too felt the technology was unique enough 
that it deserved protection by the US government</span>
    </li>
    <li>
    	<span class="digit-title"><span class="d2011"></span></span>
        <span class="subtitle">2nd US Patent Issued by USPO</span>
        <span class="time-data">Second Patent was issued to 
unique design of Gutterglove Pro.</span>
    </li>
    </ul>
    </div><!-- #co-timeline -->
   
           

    </div>    
<div class="clear"></div>
<?php get_footer(); ?> 