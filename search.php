<?php get_header();?>      

<?php 
$t_show_post = t_get_option( "t_show_post" );		
?>    
<div id="main-subpage">		
	<div class="columns">      
    <div class="narrowcolumn-bare singlepage">
    
    	
		<h1 class="page spacer">Gutterglove News Center <span class="cc-grey">| Search</span></h1>
        
     <?php if (have_posts()) : ?>
     <?php while (have_posts()) : the_post(); ?>							
			<div <?php post_class();?>>
<div class="post">
                <div class="news-case">
                <div class="timeblock"><span class="tmonth"><?php the_time('M'); ?></span><span class="tdate"><?php the_time('j'); ?></span> </div> 
                <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                
                <span class="metacase">
                                <small><?php _e('Posted on','nattywp'); ?> <?php the_time('M jS, Y') ?> <?php _e('in','nattywp'); ?> <?php the_category(' | ');?> <?php edit_post_link(__('Edit','nattywp'), ' | ', ''); ?></small> 
			<small class="cc"> |<?php
$commentscount = get_comments_number();
if($commentscount == 1): $commenttext = 'comment'; endif;
if($commentscount > 1 || $commentscount == 0): $commenttext = 'Comments'; endif;
echo ' '.$commentscount.' '.$commenttext.'';
?></small>
</span><!-- .metacase -->
    </div><!-- .post -->            
                </div>              
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
    		
		<div id="navigation">
      <?php natty_pagenavi(); ?>
		</div>    
        
    <?php else : ?>
		<div class="post">
		<h2><?php _e('Not Found','nattywp'); ?></h2>
            <div class="entry"><p><?php _e('Sorry, but you are looking for something that isn\'t here.','nattywp'); ?></p>
            <?php get_search_form(); ?>
            </div>
        </div>
	<?php endif; ?>	
    
	</div> <!-- END Narrowcolumn -->
   <div id="sidebar" class="profile">
     <?php get_sidebar();?>
   </div>    
<div class="clear"></div>    
<?php get_footer(); ?> 