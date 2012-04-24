<?php
/**
 * This template is for the Rainharvesting
 *Template name: Rain Harvesting
 */
 get_header(); ?> 
 
<div class="content-pad">

<div class="clear"></div>

<div id="main-rainh">		
           	
	<div class="columns div-slice">      
    <div class="narrowcolumn-bare singlepage">
	
     <?php if (have_posts()) : ?>
     <?php while (have_posts()) : the_post(); ?>	
	
				
                <div class="post">
				<div class="entry">

				<h1 class="page"><?php the_title(); ?> with Gutterglove</h1>
<p>Gutterglove Gutterguard is installed on hundreds of rain harvesting systems because of it's ability to filter out small grains of sand out of a gutter and a rain collection tank. Below are several featured TV news stories of rain collection systems that are using the Gutterglove Gutter guard filter system as their First Stage Filter.</p>

<h2>What is Rain Harvesting</h2>
<p>Rain harvesting is the art of collecting rain, storing it, and then using it for various watering needs you have. Because of increasing droughts in many states across the country, and because of the increase in human interest for being sustainable and environmentally responsible, rain harvesting is becoming more and more popular.</p>

<p>Gutterglove Gutterguard is one of the main components in a rain collection system because of it's unique filtering ability to keep out leaves, pine needles and sand out of the gutter and rain collection tank. Gutterglove IceBreaker is equally important because it allows you to harvest the snow through your gutter, melt it, and channel it to your rainwater storage tanks in the winter time.</p>

<h2>Benefits of Rain Harvesting</h2>
<p>Rainwater harvesting in urban areas can have manifold reasons. To provide supplemental water for the city's requirement,it increase soil moisture levels for urban greenery, to increase the ground water table through artificial recharge, to mitigate urban flooding and to improve the quality of groundwater are some of the reasons why rainwater harvesting can be adopted in cities. In urban areas of the developed world, at a household level, harvested rainwater can be used for flushing toilets and washing laundry. Indeed in hard water areas it is superior to mains water for this. It can also be used for showering or bathing.</p>
	

<h2>How a Rain Harvesting System Works</h2>

<div id="rhs-diagram-case">

	<div class="diagram">
	<iframe width="300" height="195" src="http://www.youtube.com/embed/U2H0i9Vq7_U?rel=0" frameborder="0" allowfullscreen></iframe>	
	<img src="<?php echo get_template_directory_uri(); ?>/images/rhsdiagram.jpg" alt="RHS Diagram" />
	<h3>Download Rain Harvesting Diagram</h3>
	<a class="btn-action" href="<?php get_site_url(); ?>/resources/images/rainharvestingsystems/2d House RHS Diagram copy.pdf">Hi-res (Print)</a>
	<a class="btn-action" href="<?php get_site_url(); ?>/resources/images/rainharvestingsystems/rhsdiagram-lowres.zip">Low-res (Viewing)</a>
	</div>
	
	<div class="diagram-list">
	<ul>
	<li>1 Rain Catchment Area: The roof is used as a collection point for all rainwater.</li>

	<li>2 Gutterglove Filter: The Gutterglove filter system (Also known as a 'First Stage Filter') keeps all the leaves, pine needles and roof sand grit out of the gutter and rainwater storage tank.</li>

	<li>3 Catchment Tube: Made from pvc pipe, this tube is connected to the bottom of the gutter and channels the rainwater to the roof washer (known as the 'First Flush').</li>

	<li>4 Roof Washer: This oversized pvc tube collects the first several gallons of dirtier rainwater from the beginning of each rain event and
	diverts it away from the rain tank.</li>

	<li>5 Water Intake: Rainwater enters tank from here.</li>

	<li>6 Rainwater Collection Tank: Water stored here.</li>

	<li>7 Air Gap: This allows for the exchange of air in and out of the rain tank so the tank doesn't collapse when the rainwater is used up.</li>

	<li>8 Overflow: When the rain tank fills up with rainwater, the excess rainwater will exit here.</li>

	<li>9 Pump: This unit will pump the rainwater out so it can be used for outdoor watering needs. A pump is not always needed because natural gravity flow will be sufficient most of the time on level ground.</li>

	<li>10 Water Level Indicator: This vinyl see-through tube allows you to see how much rainwater is left in the tank.</li>

	<li>11 Fire Hydrant: Rain harvesting systems that are generally over 2,500 gallons in size can consider having a fire hydrant installed to use rainwater for helping put out fires.</li>
	</ul>
	</div>

</div><!-- #rhs-diagram-case -->
		
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
	<h2>The Difference</h2>
	<h3 class="cc-green">Which Would You Choose?</h3>
        <div class="c-wrap">
        <img class="rtcol-marg" src="<?php echo get_template_directory_uri(); ?>/images/glass-choice.png" alt="Clean Glass" />
		<ul id="filteredwater">
		<li><span class="list-ind selected cfinclude">A</span> Filtered with Gutterglove.</li>
		<li><span class="list-ind other cfinclude">B</span> Rainwater filtered with other gutter guards.</li>
		<li><span class="list-ind other cfinclude">C</span> Rainwater filtered with no gutter guard.</li>
		</ul>
       
        </div>
        <div class="c-wrap phone-case">
    <h2>Interested in Rain Harvesting?</h2>
    <p>Call Us toll free at 877-662-5644 or <a href="<?php get_site_url(); ?>/test/contact-us">contact us</a>.</p>
        </div><br />
    <h2>Rain Harvesting News</h2>
		<?php readfile('http://output17.rssinclude.com/output?type=php&id=431399&hash=51003fbe5098a7c2572a08c245afdf52')?>
	
    </div><!-- #sidebar -->    
<div class="clear"></div>
<?php get_footer(); ?> 