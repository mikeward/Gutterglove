<?php
/**
 * The Template for displaying all single posts.
 *Template name: Gutterglove Pro
 */
include (TEMPLATEPATH . '/header-product-page.php'); ?>

<div class="content-pad">

<div class="clear"></div>

<div id="main-products">		
	<div class="columns">




<div id="product-pg-case">


	<div id="topproduct-header">
	<h2>Gutterglove Pro</h2>
	<h3 class="description">Gutterglove Pro is a hi-grade gutter protection system. Rated best score by North America�s leading consumer reporting magazine for their September 2010 and May 2011 magazine issues.</h3>
			<div class="product-step">
				<ul>
					<li><a class="scroll" href="#photos">Product Photos</a></li>
					<li><a onclick="window.open(this.href,'PerformanceVideo','resizable=no,location=no,menubar=no,scrollbars=no,status=no,toolbar=no,fullscreen=no,dependent=no,width=450,height=375,status'); return false" href="http://www.gutterglove.com/gutterguards/video_youtube_performance.html">Watch Performance Video</a></li>
					<li><a href="<?php get_site_url(); ?>/find-a-dealer">Request a Quote</a></li>
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
		<td><span><a class="cfinclude" href="gutterglove-ultra">View Gutterglove Ultra</a></span></td>
	
		<td><span class="selected"><a class="cfinclude" href="gutterglove-pro">View Gutterglove Pro</a></span></td>

		<td><span><a class="cfinclude" href="gutterglove-icebreaker">View Gutterglove IceBreaker</a></span></td>

	</table>

</div><!-- product-action -->

</div><!-- scroller -->

	</div>
	
	<div class="right-fill-case">
	<img class="product-logo" src="<?php echo get_template_directory_uri(); ?>/images/Logo_Gutterglove_Pro.png" alt="Gutterglove Pro" />
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
			<td class="juniorsize">2" to 3.5" gutters <span class="size">Junior Size</span></td>
	</tr>
	<tr class="grey">
		<td class="standardsize">4" to 5.5" gutters <span class="size">Std Size</span></td>
	</tr>
	<tr class="red">
		<td class="supersize">5" to 7.5" gutters <span class="size">Super Size</span></td>
	</tr>
</table>

		<h3>Stainless Steel Mesh</h3>
		<p>The Gutterglove Pro features a woven 316 stainless steel 30 or 90 mesh resulting in 900 or 8100 holes per square inch.</p>

		<h3>Aluminum Channel Frame</h3>
		<p>The Gutterglove Pro is supported by a 6063 Extruded Aluminum frame. The frame is also anodized for added protection from mixed metals and the elements.</p>
		
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
		<p>The Gutterglove Pro is comprised of an extruded Aluminum frame complimented by a 316 stainless steel mesh. The Gutterglove Pro is the single most effective gutterguard on the market today!  By utilizing the strength of the frame and filtering ability of the mesh, the Pro filters debris from entering the gutter while standing up to heavy snow and debris loads. It is easily installed on any roof or gutter type and has a very low profile design making it attractive for homeowners concerned with aesthetics. The Pro was our orginal design and has since been copied not only by us (with the introduction of our Gutterglove Ultra line) but also by many competitors.</p>
		

		<h2 class="options">Options</h2>
		<p><strong>The Gutterglove Pro is available in (6) different configurations:</strong></p>
		<ol class="options">
			<li>Pro Junior 90 mesh (up to 3.5" inch gutters, fine mesh)</li>
			<li>Pro Junior 30 mesh (up to 3.5" inch gutters, larger mesh)</li>
			<li>Pro Standard 90 mesh (up to 5.5" inch gutters, fine mesh)</li>
			<li>Pro Standard 30 mesh (up to 5.5" inch gutters, larger mesh)</li>
			<li>Pro Super 90 mesh (up to 7.5" gutters, finer mesh)</li>
			<li>Pro Super 30 mesh (up to 7.5" gutters, larger mesh)</li>
		</ol>
</div>
		
	<div class="right-fill-case" id="photos">
		<h2 class="photos">Gutterglove Pro Photos</h2>
		<a class="gallerypic" href="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_pro/images/1.jpg" rel="lightbox[ggpro]"><img src="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_pro/thumbnails/1.jpg" width="60" height="60" alt="" class="pic" />
		<span class="zoom-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_cover.png" width="60" height="60" alt="Zoom"></span>
		</a>
		
		<a class="gallerypic" href="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_pro/images/2.jpg" rel="lightbox[ggpro]"><img src="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_pro/thumbnails/2.jpg" width="60" height="60" alt="" class="pic" />
		<span class="zoom-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_cover.png" width="60" height="60" alt="Zoom"></span>
		</a>

		<a class="gallerypic" href="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_pro/images/3.jpg" rel="lightbox[ggpro]"><img src="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_pro/thumbnails/3.jpg" width="60" height="60" alt="" class="pic" />
		<span class="zoom-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_cover.png" width="60" height="60" alt="Zoom"></span>
		</a>
		
		<a class="gallerypic" href="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_pro/images/4.jpg" rel="lightbox[ggpro]"><img src="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_pro/thumbnails/4.jpg" width="60" height="60" alt="" class="pic" />
		<span class="zoom-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_cover.png" width="60" height="60" alt="Zoom"></span>
		</a>
		
		<a class="gallerypic" href="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_pro/images/5.jpg" rel="lightbox[ggpro]"><img src="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_pro/thumbnails/5.jpg" width="60" height="60" alt="" class="pic" />
		<span class="zoom-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_cover.png" width="60" height="60" alt="Zoom"></span>
		</a>
		
		<a class="gallerypic" href="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_pro/images/6.jpg" rel="lightbox[ggpro]"><img src="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_pro/thumbnails/6.jpg" width="60" height="60" alt="" class="pic" />
		<span class="zoom-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_cover.png" width="60" height="60" alt="Zoom"></span>
		</a>
		
		<a class="gallerypic" href="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_pro/images/7.jpg" rel="lightbox[ggpro]"><img src="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_pro/thumbnails/7.jpg" width="60" height="60" alt="" class="pic" />
		<span class="zoom-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_cover.png" width="60" height="60" alt="Zoom"></span>
		</a>
		
		<a class="gallerypic" href="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_pro/images/8.jpg" rel="lightbox[ggpro]"><img src="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_pro/thumbnails/8.jpg" width="60" height="60" alt="" class="pic" />
		<span class="zoom-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_cover.png" width="60" height="60" alt="Zoom"></span>
		</a>
		
		<a class="gallerypic" href="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_pro/images/9.jpg" rel="lightbox[ggpro]"><img src="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_pro/thumbnails/9.jpg" width="60" height="60" alt="" class="pic" />
		<span class="zoom-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_cover.png" width="60" height="60" alt="Zoom"></span>
		</a>
		
		<a class="gallerypic" href="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_pro/images/10.jpg" rel="lightbox[ggpro]"><img src="<?php echo get_template_directory_uri(); ?>/images/photo_galleries/gutterglove_pro/thumbnails/10.jpg" width="60" height="60" alt="" class="pic" />
		<span class="zoom-icon"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom_cover.png" width="60" height="60" alt="Zoom"></span>
		</a>
		
	</div>
	
</div>

</div><!-- product-pg-case -->

<div class="clear"></div>

	
    <?php get_footer(); ?> 