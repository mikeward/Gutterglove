<?php
/**
 * The Template for displaying all single posts.
 *Template name: Dealer Dashboard
 */
include (TEMPLATEPATH . '/header-products.php'); ?>

<div class="content-pad">

<div class="clear"></div>

<div id="main-subpage">		
	<div class="columns div-slice">      
	<h1 class="page"><?php the_title(); ?></h1>
	
	<div class="dealer-controls">
	<a class="order" href="#">Order Products</a>
	<a class="signstatus" href="<?php bloginfo('url'); ?>/wp-login.php?action=logout">Signout</a>
	</div><!-- .dealer-controls -->
	
	<div id="dealerinfo-case"> 
		<a class="editprofile" href="<?php echo get_site_url(); ?>/wp-admin/profile.php">Edit Profile</a>
		<?php
			wp_get_current_user();
			echo '<span class="current-user">Welcome Back, ' . $current_user->company_name . '!<br />';
			echo 'Email: ' . $current_user->user_email . '<br /></span>';
			echo $current_user->company_name . '<br />';
			echo $current_user->address . '<br />';
			echo $current_user->city . '&nbsp;';
			echo $current_user->state . '&nbsp;';
			echo $current_user->zip . '<br />';
		?>
		<span class="<?php echo get_user_role(); ?>"><?php echo get_current_user_role(); ?></span><br />

	</div><!-- #dealerinfo-case -->

		<div id="usermessage-update">
	<h2 class="cc-white leftpos">Announcement:</h2>

	     <?php if (have_posts()) : ?>
     <?php while (have_posts()) : the_post(); ?>							
					
				<h2 class="cc-lblue rightpos"><?php the_date(); ?></h2>
     			<div class="post">
				<div class="entry">
					 <?php the_content(); ?> 	 
                    <div class="clear"></div>
                </div>                   <?php edit_post_link(__('Edit','nattywp'), '<p>', '</p>'); ?>	                 
			</div>	    

	</div><!-- #usermessage-update -->
	
<div id="dash-wrap">
<img src="<?php echo get_template_directory_uri(); ?>/images/dd-bannerad.jpg" alt="" />
<div class="rightpos cert-center">
<h2 class="cert-title">Certification Center</h2>
<span class="clear"></span>
<span class="cfinclude status ds-certified">Certified</span>
<span class="cert-message">You are currently a certified Gutterglove Installer.</span>
<a class="download" href="#" title="Download Certificate">Download Certificate</a>
</div><!-- .cert-center -->
</div><!-- #dash-wrap -->

<div class="narrowcolumn-bare">
<h2 class="cc-blue">This Week's Tech Tip</h2>
<h3 class="nospace">Video Trainnig</h3>

<h2 class="sbig cc-grey">5 Tips to More Leads Leads Quickly</h2>

<iframe width="560" height="315" src="http://www.youtube.com/embed/aehI10gAp04?rel=0" frameborder="0" allowfullscreen></iframe>

<div id="videodesc-left">
<script type="text/javascript">
  function youtubeFeedCallback( data )
  {

    document.writeln( '<b>Title:</b> ' + data.entry[ "title" ].$t + '<br/>' );
    document.writeln( '<b>Published:</b> ' + new Date( data.entry[ "published" ].$t.substr( 0, 4 ), data.entry[ "published" ].$t.substr( 5, 2 ) - 1, data.entry[ "published" ].$t.substr( 8, 2 ) ).toLocaleDateString( ) + '<br/>' );
    document.writeln( '<br/>' + data.entry[ "media$group" ][ "media$description" ].$t.replace( /\n/g, '<br/>' ) + '<br/>' );
  }
</script>
<script type="text/javascript" src="http://gdata.youtube.com/feeds/api/videos/aehI10gAp04?v=2&amp;alt=json-in-script&amp;callback=youtubeFeedCallback"></script>
</div>

<div id="video-detail">
<span class="runtime-title cfinclude">Duration</span>
<span class="runtime cfinclude">
<script type="text/javascript">
  function youtubeFeedCallback( data )
  {   
   document.writeln( '' + Math.floor( data.entry[ "media$group" ][ "yt$duration" ].seconds / 60 ) + ' minutes<br/>' );
  }
</script>
<script type="text/javascript" src="http://gdata.youtube.com/feeds/api/videos/aehI10gAp04?v=2&amp;alt=json-in-script&amp;callback=youtubeFeedCallback"></script>
</div>

			<?php comments_template( '', true ); ?>      	
	<?php endwhile; ?>		
    <?php endif; ?>	
</div><!-- .narrowcolumn-bare -->
<span id="downloads"></span>
  <div id="sidebar" class="profile">       
    
    <h2>Download Materials</h2>

<ul class="download-mat">
<li><a href="#">CAD Files <span>(18mb)</span></a></li>
<li><a href="#">Dealer Agreement <span>(122kb)</span></a></li>
<li><a href="#">Standard Install Contract <span>(210kb)</span></a></li>
<li><a href="#">Pricing List <span>(150kb)</span></a></li>
<li><a href="#">Asset Disc Files <span>(3.4gb)</span></a></li>
<li><a href="#">Install Guides (All Roofs Types) <span>(5.6mb)</span></a></li>
<li><a href="#">Product Warranty <span>(211kb)</span></a></li>
</ul>
    </div>    


<div class="clear"></div>
<?php get_footer(); ?> 