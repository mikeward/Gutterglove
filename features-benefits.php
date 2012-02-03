<?php
/**
 * The Template for displaying all single posts.
 *Template name: Features and Benefits
 */
include (TEMPLATEPATH . '/header-products.php'); ?>

<div id="main-subpage">
	<div class="columns">
	
	<h1 class="page">Features and Benefits</h1>

	<div id="site-breadcrumbs">
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
	
	<div class="fab-feature-container"><span id="eliminates-sec"></span>
		<div class="fab-img-left"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/benefit_1_lg.png" alt="Eliminates Gutter Cleaning Forever" /></div>
		<div class="fab-content-right"><h3>Eliminates Gutter Cleaning Forever</h3>
			<p>Sed hendrerit velit ut felis consequat quis dictum sapien blandit. Donec in magna leo. Nam nunc felis, tempor sed feugiat a, porta ac urna. Morbi vitae nisl sed mauris egestas egestas. Vivamus vestibulum metus non neque dignissim a tincidunt justo ornare. Vivamus eget odio mi. Phasellus rhoncus varius eleifend. Fusce dignissim dignissim mi, vitae fermentum enim convallis non. Mauris semper massa a massa pellentesque ut ultricies ante luctus. Sed elementum aliquet erat in gravida.</p>

			<p>Integer gravida tellus ut nunc egestas adipiscing ac et nisl. Vivamus nec erat neque. Cras ultrices gravida adipiscing. Nunc tempor risus quis eros venenatis molestie. Quisque ornare lobortis neque non viverra. Curabitur nec lectus vel dolor egestas fermentum sagittis quis lorem. Integer ac lacus id leo gravida euismod et quis massa.</p>
		</div><!--fab-content-right -->
	</div><!-- fab-feature-container -->


	<div class="fab-feature-container"><a class="up" href="#top"><span>Top of Page</span></a><span id="filters-sec"></span>
		<div class="fab-img-right"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/benefit_2_lg.png" alt="Filters Out All Debris" /></div>
		<div class="fab-content-left"><h3>Filters Out All Debris</h3>
			<p>Sed hendrerit velit ut felis consequat quis dictum sapien blandit. Donec in magna leo. Nam nunc felis, tempor sed feugiat a, porta ac urna. Morbi vitae nisl sed mauris egestas egestas. Vivamus vestibulum metus non neque dignissim a tincidunt justo ornare. Vivamus eget odio mi. Phasellus rhoncus varius eleifend. Fusce dignissim dignissim mi, vitae fermentum enim convallis non. Mauris semper massa a massa pellentesque ut ultricies ante luctus. Sed elementum aliquet erat in gravida.</p>

			<h4>What Gutterglove Keeps Out</h4>
			<ul>
				<li>Leaves & Cones</li>
				<li>Pine needles</li>
				<li>Micro roof sand grit</li>
				<li>Tree branches and stems</li>
				<li>Insects and rodents</li>
				<li>Birds and nests</li>
			</ul>
		</div><!--fab-content-left -->
	</div><!-- fab-feature-container -->
	
	
	<div class="fab-feature-container"><a class="up-rt scroll" href="#top"><span>Top of Page</span></a><span id="noclog-sec"></span>
		<div class="fab-img-left"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/benefit_3_lg.png" alt="Virtually No Clogging" /></div>
		<div class="fab-content-right"><h3>Virtually No Clogging</h3>
			<p>Sed hendrerit velit ut felis consequat quis dictum sapien blandit. Donec in magna leo. Nam nunc felis, tempor sed feugiat a, porta ac urna. Morbi vitae nisl sed mauris egestas egestas. Vivamus vestibulum metus non neque dignissim a tincidunt justo ornare. Vivamus eget odio mi. Vitae fermentum enim convallis non. Mauris semper massa a massa pellentesque ut ultricies ante luctus. Sed elementum aliquet erat in gravida.</p>
		</div><!--fab-content-right -->
	</div><!-- fab-feature-container -->
	
	
	<div class="fab-feature-container"><a class="up scroll" href="#top"><span>Top of Page</span></a><span id="fit-sec"></span>
		<div class="fab-img-right"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/benefit_4_lg.png" alt="Fits on Any Gutter Type and Size" /></div>
		<div class="fab-content-left"><h3>Fits on Any Gutter Type & Size</h3>
			<p>Sed hendrerit velit ut felis consequat quis dictum sapien blandit. Donec in magna leo. Nam nunc felis, tempor sed feugiat a, porta ac urna. Morbi vitae nisl sed mauris egestas egestas. Vivamus vestibulum metus non neque dignissim a tincidunt justo ornare. Vivamus eget odio mi. Phasellus rhoncus varius eleifend. Fusce dignissim dignissim mi, vitae fermentum enim convallis non. Mauris semper massa a massa pellentesque ut ultricies ante luctus. Sed elementum aliquet erat in gravida.</p>

			<p>Integer gravida tellus ut nunc egestas adipiscing ac et nisl. Vivamus nec erat neque. Cras ultrices gravida adipiscing. Nunc tempor risus quis eros venenatis molestie. Quisque ornare lobortis neque non viverra. Curabitur nec lectus vel dolor egestas fermentum sagittis quis lorem. Integer ac lacus id leo gravida euismod et quis massa.</p>
		</div><!--fab-content-left -->
	</div><!-- fab-feature-container -->

	
	<div class="fab-feature-container"><a class="up-rt scroll" href="#top"><span>Top of Page</span></a><span id="aluminum-sec"></span>
		<div class="fab-img-left"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/benefit_5_lg.png" alt="Anodized Aluminum Channel Frame Makes Most Durable Gutter Guard" /></div>
		<div class="fab-content-right"><h3>Anodized Aluminum Channel Frame Makes Most Durable Gutter Guard</h3>
			<p>Sed hendrerit velit ut felis consequat quis dictum sapien blandit. Donec in magna leo. Nam nunc felis, tempor sed feugiat a, porta ac urna. Morbi vitae nisl sed mauris egestas egestas. Vivamus vestibulum metus non neque dignissim a tincidunt justo ornare. Vivamus eget odio mi. Phasellus rhoncus varius eleifend. Fusce dignissim dignissim mi, vitae fermentum enim convallis non. Mauris semper massa a massa pellentesque ut ultricies ante luctus. Sed elementum aliquet erat in gravida.</p>

			<p>Integer gravida tellus ut nunc egestas adipiscing ac et nisl. Vivamus nec erat neque. Cras ultrices gravida adipiscing. Nunc tempor risus quis eros venenatis molestie. Quisque ornare lobortis neque non viverra. Curabitur nec lectus vel dolor egestas fermentum sagittis quis lorem. Integer ac lacus id leo gravida euismod et quis massa.</p>
		</div><!--fab-content-right -->
	</div><!-- fab-feature-container -->
	
	
	<div class="fab-feature-container"><a class="up scroll" href="#top"><span>Top of Page</span></a><span id="stainlesssteel-sec"></span>
		<div class="fab-img-right"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/benefit_6_lg.png" alt="Stainless Steel Mesh" /></div>
		<div class="fab-content-left"><h3>Stainless Steel Mesh</h3>
			<p>Sed hendrerit velit ut felis consequat quis dictum sapien blandit. Donec in magna leo. Nam nunc felis, tempor sed feugiat a, porta ac urna. Morbi vitae nisl sed mauris egestas egestas. Vivamus vestibulum metus non neque dignissim a tincidunt justo ornare. Vivamus eget odio mi. Phasellus rhoncus varius eleifend. Fusce dignissim dignissim mi, vitae fermentum enim convallis non. Mauris semper massa a massa pellentesque ut ultricies ante luctus. Sed elementum aliquet erat in gravida.</p>

			<p>Integer gravida tellus ut nunc egestas adipiscing ac et nisl. Vivamus nec erat neque. Cras ultrices gravida adipiscing. Nunc tempor risus quis eros venenatis molestie. Quisque ornare lobortis neque non viverra. Curabitur nec lectus vel dolor egestas fermentum sagittis quis lorem. Integer ac lacus id leo gravida euismod et quis massa.</p>
		</div><!--fab-content-left -->
	</div><!-- fab-feature-container -->
	
<a class="viewgg" href="gutter-guards">View All Gutter Guards &#187;</a>
	
<div class="clear"></div>

    
    <?php get_footer(); ?> 