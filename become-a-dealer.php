<?php /**
 * This template is for the News Page
 *Template name: Become A Dealer
 */
 get_header( "gallery" ); ?> 
<div id="main-subpage">		
	<div class="columns">      
    <div class="widecolumn-bare singlepage">
    
     <?php if (have_posts()) : ?>
     <?php while (have_posts()) : the_post(); ?>							
					
	<h1 class="page"><?php the_title(); ?></h1>
	
     			<div class="post">
				<div class="entry">

				<span class="businessheader"></span>
				
<h2>Reasons to Become A Dealer</h2>	

<div id="reason-wrap">
<div class="reason-cube rs-inventory">
<h3>No Inventory to Stock</h3>
<p>All Gutterglove Products you order are shipped directly from our sunny Corporate office in California. </p>
</div>

<div class="reason-cube rs-minimum">
<h3>No Minimum Orders</h3>
<p>Ordering for one customer? No worries, there's no minimum order requirements. Just order what you need when you need it.</p>
</div>

<div class="reason-cube rs-pricing right">
<h3>Rock Bottom Pricing</h3>
<p>With rock bottom dealership pricing available, there's no high start-up costs!
</div>


<div class="reason-cube rs-multiple">
<h3>Sell Other Guards with Ours</h3>
<p>We're not selfish. You can install our Gutterglove gutter guard along with others you're already selling.</p> 
</div>

<div class="reason-cube rs-dealerkit">
<h3>Includes Dealer Kit</h3>
<p>The dealer kit is precisely arranged to provide useful materials you need to succeed. You also receive free marketing consultation whenever you run into a block.</p> 
</div>

<div class="reason-cube rs-materials right">
<h3>Promotional Materials</h3>
<p>Available to Gutterglove dealers are affordable hi-quality Gutterglove and LeafBlaster brochures, door hangers and postcards.</p>
</div>

</div><!-- #reason-wrap -->
			
<h2>Your Gutterglove Dealer Kit Includes:</h2>	

<div id="dbenefits-wrap">

<ul class="benefits-case">
<li>Why become a Gutterglove Dealer</li>
<li>General Product & Warranty Information</li>
<li>Gutterglove Dealer Agreement</li>
<li>Non-Disclosure Agreement</li>
<li>Lead Generation Opportunities</li>
</ul>

<ul class="benefits-case">
<li>Bronze, Silver and Gold Cost Savings Plan</li>
<li>Product Price List</li>
<li>Product Order Form</li>
<li>Free marketing consultation.</li>
<li>Information on Rain Harvesting Systems</li>
</ul>
</div><!-- #dbenefits-wrap -->

				<?php t_show_video($post->ID); ?>
                     <?php the_content(); ?>    
                    <div class="clear"></div>
                </div>   
           
			</div>	    
			<?php comments_template( '', true ); ?>      	
	<?php endwhile; ?>		
    <?php endif; ?>		
			

<div id="book-span">
	<span class="book-inner-detail">
	<h2 class="super cc-blue">Our 130 Page Book</h2><h2 class="cc-dgrey expur-space">All About Gutterglove</h2> 
	<p><span class="bookname">The Ultimate Gutter Protection System</span><br />Donec ultricies augue sit amet dui bibendum dictum. Nunc nec lacus nunc, viverra faucibus odio. Mauris aliquet tincidunt risus, vel gravida nibh semper et. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin quis ullamcorper arcu.</p>
		<ul>
		<li>Over 400 detailed photos.</li>
		<li>Product descriptions.</li>
		<li>Photos that competitors prefer you not see!</li>
		<li>Listing of over 100 additional news stories appearing in various local publications across the country.</li>
		<li>Drawings and diagrams of the official Gutterglove United States Patent.</li>
		<li>Gutterglove being used in numerous rain harvesting systems</li>
		<li>Articles of Gutterglove featured on The Discovery Channel, affiliates of ABC, NBC, CBS, FOX News, The Weather Channel, and a myriad of other national publications.</li>
		<li>And more...</li>
		</ul>
	</span>
	<img class="gutterglovebook" src="<?php echo get_template_directory_uri(); ?>/images/dealerbook-cover.jpg" />
</div>

<div class="post">
	<div class="entry">
		<h2>We Offer the Better & Best</h2>	
		<p>We offer three different hi-tech stainless steel mesh-filtering gutter guards that cater to any homeowner's budget.</p>

			<div id="quality-wrap">
				<div class="prod-cube type-ultra">
				<h3 class="cc-green">Gutterglove Ultra</h3>
				<p>Our <strong>Better</strong> gutter guard. Mid-range priced.</p>
				<span class="product-control"><a href="#">View Product</a></span>
				</div>

				<div class="prod-cube type-pro">
				<h3 class="cc-green">Gutterglove Pro</h3>
				<p> Our <strong>Best</strong> gutter guard. Higher priced.</p>
				<span class="product-control"><a href="#">View Product</a></span>
				</div>

				<div class="prod-cube type-icebreaker right">
				<h3 class="cc-green">Gutterglove IceBreaker</h3>
				<p>Melts away icicles and snow loads on your gutter.</p>
				<span class="product-control"><a href="#">View Product</a></span>
				</div>
			</div><!-- #quality-wrap -->
	</div><!-- .entry -->	
</div><!-- .post -->	
	<div id="interest-dealers">	
		<h2 class="super cc-green center">Interested in Becoming a Gutterglove Dealer?</h2>			
		<p class="cc-lgrey center">Receive additional information about Gutterglove with no obligation. While speaking to an account executive, ask about our free 6 inch sample.</p>
		<div id="contact-method">
			<div class="option email">
				<h3>Email an Account Executive</h3>
				<span class="subline">Receive a response in &lt; 10 minutes*</span>
				<form id="#">
				<input type="text" placeholder="Name" /><br />
				<input type="text" placeholder="Email" /><br />
				<input type="text" class="phone-bad" placeholder="Phone" /><br />
				<input type="text" class="city-bad" placeholder="City" />
				<input type="text" class="zip-bad" placeholder="Zip" /><br />
				<input type="submit" value="Submit" id="submitform" />
				</form>
			</div>
			
			<div class="option phone">
				<h3>Give Us a Call</h3>
				<span class="subline">Speak directly to an Account Executive<span class="dis-digit">1</a></span>
				<h1 class="cfinclude center fadphone">877-662-5644</h1>
			</div>

			<div class="option-r chat">
				<h3>Chat with Us Online</h3>
				<span class="subline">Chat with us now<span class="dis-digit">1</span></span>
				<button class="cfinclude chatnow">Chat Now</button>
			</div>
		</div><!-- #contact-method -->
	<div class="disclaimertext">*During our standard <a href="<?php echo get_site_url(); ?>/contact-us">business hours</a>.
	1. Product Pricing not available via chat nor phone to non-dealers.
	</div>			
	</div><!-- #interest-dealers -->
	</div> <!-- END widecolumn -->

<div class="clear"></div>
<?php get_footer(); ?> 