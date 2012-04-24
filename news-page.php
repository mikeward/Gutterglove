<?php
/**
 * This template is for the News Page
 *Template name: Gutterglove News Page
 */
 get_header(); ?> 
 
<div class="content-pad">

<div class="clear"></div>
 
<div id="main-subpage">		
	<div class="columns div-slice">      
    <div class="narrowcolumn-bare singlepage">
	
	
		<h1 class="page spacer">Gutterglove News Center</h1>
		
	     <?php if (have_posts()) :  query_posts( 'cat=-1,-8&posts_per_page=5' );  ?>
     <?php while (have_posts()) : the_post(); ?>							
			<div <?php post_class();?>>
            	
                <div class="news-case">
                <div class="timeblock"><span class="tmonth"><?php the_time('M'); ?></span><span class="tdate"><?php the_time('j'); ?></span> </div> 
				
                <span class="metacase">
                                <small><?php _e('Posted on','nattywp'); ?> <?php the_time('M jS, Y') ?> <?php _e('in','nattywp'); ?> <?php the_category(' | ');?> <?php edit_post_link(__('Edit','nattywp'), ' | ', ''); ?></small> 
			<small class="cc"> |<?php
$commentscount = get_comments_number();
if($commentscount == 1): $commenttext = 'comment'; endif;
if($commentscount > 1 || $commentscount == 0): $commenttext = 'Comments'; endif;
echo ' '.$commentscount.' '.$commenttext.'';
?></small>
</span><!-- .metacase -->
                <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                

                
                </div><div class="clearspace"></div>                
				<div class="entry">
            <?php                 if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                      the_post_thumbnail('thumbnail');} 
                if ($t_show_post == 'no') {//excerpt  
                    get_thumb('Image','130','85','small-image', '<div class="thumb">', '</div>' );                   

                } else { //fullpost 
                    t_show_video($post->ID);
                                        the_advanced_excerpt('length=350&use_words=0&finish_sentence=1&no_custom=1&add_link=0&ellipsis=%26hellip;&allowed_tags=iframe&exclude_tags=img,p,strong');  ?>  
                                    
                <div id="morepage-list"><?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?></div>                       
            <?php } ?>
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