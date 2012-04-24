<?php
/**
 * This template is for the Gutterglove Customer Reviews
 *Template name: Customer Reviews
 */
 get_header(); ?> 
 
<div class="content-pad">

<div class="clear"></div>
 
<div id="main-testimonials">		
           	<h1 class="page maxwidth"><?php the_title(); ?></h1>
	<div class="columns div-slice">      
    <div class="narrowcolumn-bare singlepage">
	

     <?php if (have_posts()) : ?>
     <?php while (have_posts()) : the_post(); ?>	
	
				
                <div class="post">
				<div class="entry">

                     <?php t_show_video($post->ID); ?>
                     <?php the_content(); ?>  

					 
                    <div class="clear"></div>
					 	<h2>Written Testimonials</h2>
						<p><strong>Hal Hicks</strong><br />I've had Gutterglove 5 years now and it's going to be durable and last a long time. I will never have to get on my roof again to clean my gutters! I recommend Gutterglove because there is no reason to have to get up on the roof to worry about whether your gutters are getting clogged or not.</p>
						
						<p><strong>Pat Smith</strong><br />I thought it was awesome. The fact that you can't see it from the street. And it fits on the existing gutter that we have, we don't have to replace our gutter. I was very impressed with the fact that it doesn't show from the street. It's so streamline looking. I think it's worth its weight in gold! I thought it was awesome.</p>
						
						<p><strong>Dale Powers</strong><br />Gutterglove Gutterguard has been an excellent product for me.</p>
						
						<p><strong>Tim Reed</strong><br />Well the first time I saw this product [Gutterglove] was about 3 or 4 months ago at the same show and I was doing research on this type of system [mesh filter type gutter guard systems]. I just thought it was the best quality product I've seen and I also like the cosmetics features of it, you really don't see it on your roof line. So I thought it was the product I wanted to go with, I went with it. I am very pleased. In fact, I'm here today [at a home and garden show], to recommend it to my parents and get more literature for my parents. It just looks like the pure science of design and materials that intrigued me the most about this product. I'm very happy with this product.</p>
						
						<p><strong>Brian Wipperman, M.D.</strong><br />I can see that this is really a product that is going to last. I would recommend Gutterglove to anybody. It's certainly an investment, I think it's a good investment. I'm really happy with the work that was done and the product itself.</p>
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
	<h2>Featured Testimonial</h2>
        <div class="c-wrap">
        
<h3>Leonard Taylor – Retired QCR for NASA</h3><br />
 
<p>The Apollo Achievement Award, NASA presented that award to me because they expected me to assure that the quality and realiability of that engine was acceptable to NASA.</p>
 
<p><strong>Question:  And how was your experience with NASA to lead you to believe that Gutterglove is a quality gutter guard?</strong></p>
 
<p><i>Answer:</i>  The way Gutterglove is constructed. It's got an anodized aluminum support with a stainless steel mesh and the way it's attached to the gutter, from the roof to the gutter, it covers the gutter opening, and therefore it doesn't allow any debris to enter the gutter, strictly only water can get into the gutter and down the drain. Based on all my findings, I found that the Gutterglove is the best one that is designed and allowed just the water to flow into the gutter. And I'm really happy with it. I have it about 5 years now, this is the 5th season right now, and it's still clean, so I don't have to worry about getting up there and cleaning the gutter out anymore. I'm really happy.</p>
        </div>
        <div class="c-wrap phone-case">
    <h2>Compare Products</h2>
    <p><a href="#" class="btn-action-l">View Products</a></p>
        </div>
    </div><!-- #sidebar -->    
<div class="clear"></div>
<?php get_footer(); ?> 