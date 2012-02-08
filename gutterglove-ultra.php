<?php
/**
 * The Template for displaying all single posts.
 *Template name: Gutterglove Ultra
 */
include (TEMPLATEPATH . '/header-product-page.php'); ?>

<div id="main-products">		
	<div class="columns">


<div id="product-pg-case">


	<div id="topproduct-header">
	<h2>Gutterglove Ultra</h2>
	<h3 class="description">Gutterglove Pro is a hi-grade gutter protection system. Rated best score by North America’s leading consumer reporting magazine for their September 2010 and May 2011 magazine issues.</h3>
			<div class="product-step">
				<ul>
					<li><a class="scroll" href="#photos">Product Photos</a></li>
					<li><a href="#">Watch Performance Video</a></li>
					<li><a href="#">Request a Quote</a></li>
				</ul>
			</div>
			
	<div class="gg-products-spacing" id="site-breadcrumbs">
	<?php
if(class_exists('bcn_breadcrumb_trail'))
{
	//Make new breadcrumb object
	$breadcrumb_trail = new bcn_breadcrumb_trail;
	//Setup our options
	//Set the home_title to Blog
	$breadcrumb_trail->opt['home_title'] = "Home";
	//Set the current item to be surrounded by a span element, start with the prefix
	$breadcrumb_trail->opt['current_item_prefix'] = '<span class="current">';
	//Set the suffix to close the span tag
	$breadcrumb_trail->opt['current_item_suffix'] = '</span>';
	//Fill the breadcrumb trail
	$breadcrumb_trail->fill();
	//Display the trail
	$breadcrumb_trail->display();
}
	?>
	</div><!-- #site-breadcrumbs -->	

		<div id="scroller-anchor"></div> <div id="scroller">

<div id="product-action">

	<table>
	
		<td><span class="selected"><a class="cfinclude" href="gutterglove-ultra">Gutterglove Ultra</a></span></td>
	
		<td><span><a class="cfinclude" href="gutterglove-pro">Gutterglove Pro</a></span></td>

		<td><span><a class="cfinclude" href="gutterglove-icebreaker">Gutterglove IceBreaker</a></span></td>

	</table>

</div><!-- product-action -->

</div><!-- scroller -->
	
	</div>
	
	<div class="right-fill-case">
	<img class="product-logo" src="<?php echo get_template_directory_uri(); ?>/images/Logo_Gutterglove_Ultra.png" alt="Gutterglove Ultra" />
		<h2 class="benefits">Key Benefits</h2>
		
		<ul id="benefits">
			<li>Eliminates gutter cleaning forever</li>
			<li>Filters out all debris from your gutter</li>
			<li>First Stage filter in rain harvesting systems</li>
			<li>Barely visible from the ground</li>
			<li>No rain gutter clogs ever</li>
			<li>Fits on any gutter type</li>
			<li>Fits on any roof type</li>
			<li>Filters over 150 inches of hourly rain</li>
		</ul>
	</div>

			<span class="ggproduct-features"><a href="features-and-benefits">View Product Features & Benefits</a></span>
	
		<div class="left-fill-case">
		
		<h3>Product Sizes</h3>

<table class="product-details-sub">
	<tr class="lgrey">
			<td>2" to 3.5" gutters <span class="size">Junior Size</span></td>
	</tr>
	<tr class="grey">
		<td>2" to 3.5" gutters <span class="size">Standard Size</span></td>
	</tr>
	<tr class="red">
		<td>2" to 3.5" gutters <span class="size">Super Size</span></td>
	</tr>
</table>

		<h3>Stainless Steel Mesh</h3>
		<p>The Gutterglove Pro features a stainless steel 90 mesh face that is turns to be 8100 mesh per inch. Aenean eu leo urna, vel convallis diam.</p>

		<h3>Aluminum Channel Frame</h3>
		<p>Nam placerat nibh eget augue ultricies eu venenatis sem dignissim. Pellentesque sollicitudin feugiat tempor. Fusce eu nunc erat. Aliquam et libero quam. </p>

		<h3>Construction</h3>
		<p> Aliquam et libero quam. Aenean eu leo urna, vel convallis diam. Etiam at diam velit. </p>
		
		<h3>How It Works</h3>
		<div id="containing-outbox">

			<span class="toggle-image"></span>

        <div id="product-specs">
        
            <ol id="bullet-specs">
            <li><span>A.</span>Fine stainless steel mesh filters out leaves, pine needles, seed pods and roof sand grit.</li>
            <li><span>B.</span>Gutterglove installs on a variety or roof types.</li>
            <li><span>C.</span>Anodized aluminum frame supports the mesh and channels rain water to the gutter.</li>
            <li><span>D.</span>Gutterglove installs on your existing gutters.</li>
            </ol><!-- #bullet-specs -->
            
            
            <ol id="bullet-specs-toggle">
            <li><span>A.</span>Leaves, pine needles and roof sand grit roll off your gutter and to the ground.</li>
            <li><span>B.</span>Nothing but rainwater filters through to your gutter.</li>
            <li><span>C.</span>Thickest and most durable support frame of any gutter guard.</li>
            <li><span>D.</span>Filters over 150 inches of hourly rain-fall.</li>
            </ol><!-- #bullet-specs -->
        
        </div><!-- #product-specs -->

</div><!-- #containing-outbox -->
	</div>

	<div class="right-fill-case">
		<h2 class="info">Product Description</h2>
		<p>The Gutterglove Pro features a stainless steel 90 mesh face that is turns to be 8100 mesh per inch. Nam placerat nibh eget augue ultricies eu venenatis sem dignissim. Pellentesque sollicitudin feugiat tempor. Aenean eu leo urna, vel convallis diam. Etiam at diam velit. Fusce eu nunc erat. Aliquam et libero quam. </p>
		
		<p>Nam placerat nibh eget augue ultricies eu venenatis sem dignissim. Pellentesque sollicitudin feugiat tempor. Aenean eu leo urna, vel convallis diam. Etiam at diam velit. Fusce eu nunc erat. Aliquam et libero quam. </p>
		
		<h2 class="options">Options</h2>
		<p>The Gutterglove Pro features a stainless steel 90 mesh face that is turns to be 8100 mesh per inch. Nam placerat nibh eget augue ultricies eu venenatis sem dignissim. Pellentesque sollicitudin feugiat tempor. Aenean eu leo urna, vel convallis diam. Etiam at diam velit. Fusce eu nunc erat. Aliquam et libero quam. </p>
</div>
		
	<div class="right-fill-case" id="photos">
	<h2 class="photos">Gutterglove Ultra Photos</h2>
		<a class="gallerypic" href="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_ultra/images/1.jpg" rel="lightbox[ggpro]"><img src="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_ultra/thumbnails/1.jpg" width="60" height="60" alt="" class="pic" />
		<span class="zoom-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_cover.png" width="60" height="60" alt="Zoom"></span>
		</a>
		
		<a class="gallerypic" href="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_ultra/images/2.jpg" rel="lightbox[ggpro]"><img src="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_ultra/thumbnails/2.jpg" width="60" height="60" alt="" class="pic" />
		<span class="zoom-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_cover.png" width="60" height="60" alt="Zoom"></span>
		</a>

		<a class="gallerypic" href="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_ultra/images/3.jpg" rel="lightbox[ggpro]"><img src="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_ultra/thumbnails/3.jpg" width="60" height="60" alt="" class="pic" />
		<span class="zoom-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_cover.png" width="60" height="60" alt="Zoom"></span>
		</a>
		
		<a class="gallerypic" href="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_ultra/images/4.jpg" rel="lightbox[ggpro]"><img src="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_ultra/thumbnails/4.jpg" width="60" height="60" alt="" class="pic" />
		<span class="zoom-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_cover.png" width="60" height="60" alt="Zoom"></span>
		</a>
		
		<a class="gallerypic" href="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_ultra/images/5.jpg" rel="lightbox[ggpro]"><img src="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_ultra/thumbnails/5.jpg" width="60" height="60" alt="" class="pic" />
		<span class="zoom-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_cover.png" width="60" height="60" alt="Zoom"></span>
		</a>
		
		<a class="gallerypic" href="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_ultra/images/6.jpg" rel="lightbox[ggpro]"><img src="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_ultra/thumbnails/6.jpg" width="60" height="60" alt="" class="pic" />
		<span class="zoom-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_cover.png" width="60" height="60" alt="Zoom"></span>
		</a>
		
		<a class="gallerypic" href="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_ultra/images/7.jpg" rel="lightbox[ggpro]"><img src="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_ultra/thumbnails/7.jpg" width="60" height="60" alt="" class="pic" />
		<span class="zoom-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_cover.png" width="60" height="60" alt="Zoom"></span>
		</a>
		
		<a class="gallerypic" href="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_ultra/images/8.jpg" rel="lightbox[ggpro]"><img src="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_ultra/thumbnails/8.jpg" width="60" height="60" alt="" class="pic" />
		<span class="zoom-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_cover.png" width="60" height="60" alt="Zoom"></span>
		</a>
		
		<a class="gallerypic" href="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_ultra/images/9.jpg" rel="lightbox[ggpro]"><img src="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_ultra/thumbnails/9.jpg" width="60" height="60" alt="" class="pic" />
		<span class="zoom-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_cover.png" width="60" height="60" alt="Zoom"></span>
		</a>
		
		<a class="gallerypic" href="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_ultra/images/10.jpg" rel="lightbox[ggpro]"><img src="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_ultra/thumbnails/10.jpg" width="60" height="60" alt="" class="pic" />
		<span class="zoom-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_cover.png" width="60" height="60" alt="Zoom"></span>
		</a>
		
	</div>
	
</div>






</div><!-- product-pg-case -->

<div class="clear"></div>
	
    <?php get_footer(); ?> 