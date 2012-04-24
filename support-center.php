<?php
/**
 * This template is for the News Page
 *Template name: Support Center
 */
 get_header(); ?> 

<div class="content-pad">

<div class="clear"></div> 

<div id="main-subpage">		
	<div class="columns div-slice">      
    <div class="narrowcolumn-bare singlepage">
	

     <?php if (have_posts()) : ?>
     <?php while (have_posts()) : the_post(); ?>	
           	<h1 class="page">Gutterglove <?php the_title(); ?></h1>
     			
                <div id="lg-search-ss"><h2>How may we help you?</h2>
			                        <form method="get" id="searchforma" class="search" action="<?php echo home_url(); ?>/">	
                             <input type="text" class="search-input png_crop" title="search and hit enter" value="<?php _e('Search here & hit enter','nattywp'); ?>" onblur="if (!value)value='<?php _e('Search here & hit enter','nattywp'); ?>'" onclick="value=''" id="edit-search-theme-form-keys" name="s" />
                          
                        </form>						
<div style="clear:both;"></div>
				</div>               					
				
                <div class="post">
				<div class="entry">
                <h3 class="cc-greyrounded">Top FAQ Questions</h3>
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
	<h2>Additional Support</h2>
        <div class="c-wrap">
        
        <p>Need support with a question not listed in our <br />Support Center? Message us here for additional support.</p>

<form id="ajaxForm" method="POST" action="https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" name="FrontPage_Form1" onSubmit="return FrontPage_Form1_Validator(this)">		
<input type=hidden name="oid" value="00DE0000000IyKu">
<input type=hidden name="00NE0000000IE0M" value="1">
<input type=hidden name="lead_source" value="Gutterglove Support">
<input type=hidden name="retURL" value="http://gutterglove.com/thank-you">

<input id="fname" type="text" class="fad-name" name="first_name" value="<?php _e('Name','nattywp'); ?>" onblur="if (!value)value='<?php _e('Name','nattywp'); ?>'" onclick="value=''" />
<input type="text" class="fad-email" name="email" value="<?php _e('Email','nattywp'); ?>" onblur="if (!value)value='<?php _e('Email','nattywp'); ?>'" onclick="value=''" type="text" />
<input type="text" class="fad-phone" name="phone" value="<?php _e('Phone','nattywp'); ?>" onblur="if (!value)value='<?php _e('Phone','nattywp'); ?>'" onclick="value=''" />
<textarea name="00NE0000000IBjw" value="<?php _e('Message','nattywp'); ?>" onblur="if (!value)value='<?php _e('Message','nattywp'); ?>'" onclick="value=''">Message</textarea>
<input id="submit_button" class="submit-std blk-pattern action-blue cu-place" value="Send Question" type="submit" onClick="submit_me();" />
</form>

        </div>
        <div class="c-wrap phone-case">
    <h2>Phone Support</h2>
    <p>Toll Free: 877-662-5644<br />USA Work: 916-624-5000</p>
        </div>
    </div><!-- #sidebar -->    
<div class="clear"></div>
<?php get_footer(); ?> 