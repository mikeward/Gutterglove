<?php
/**
 * The Template for displaying all single posts.
 *Template name: Find A Dealer
 */
include (TEMPLATEPATH . '/header-products.php'); ?>

<div id="main-subpage">
	<div class="columns">
	
	<h1 class="page"><?php the_title();?></h1>

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
	
	<div class="fab-feature-container">
		<div class="fad-img-left"><img src="<?php echo get_template_directory_uri(); ?>/images/GreyDealerUSMap.jpg" alt="" /></div>
		<div class="fad-content-right"><h3>Locate Your Local Dealer</h3>
        <h4 class="fad">To Find Your Nearest Gutterglove Installer, Fill Out the Form.</h4>
<form id="sample-form">
<input type="text" class="fad-name" placeholder="First Name" />
<input type="text" class="fad-email" placeholder="Email" />
<input type="text" class="fad-phone" placeholder="Phone" />
<input type="text" class="fad-city" placeholder="City" />
                 
                  <div class="my-skinnable-select">
      <select name="name">
<option value="" selected>State</OPTION>
<option VALUE="AL">Alabama</option>
<option VALUE="AK">Alaska</option>
<option VALUE="AZ">Arizona</option>
<option VALUE="AR">Arkansas</option>
<option VALUE="CA">California</option>
<option VALUE="CO">Colorado</option>
<option VALUE="CT">Connecticut</option>
<option VALUE="DE">Delaware</option>
<option VALUE="DC">District of Columbia</option>
<option VALUE="FL">Florida</option>
<option VALUE="GA">Georgia</option>
<option VALUE="HI">Hawaii</option>
<option VALUE="ID">Idaho</option>
<option VALUE="IL">Illinois</option>
<option VALUE="IN">Indiana</option>
<option VALUE="IA">Iowa</option>
<option VALUE="KS">Kansas</option>
<option VALUE="KY">Kentucky</option>
<option VALUE="LA">Louisiana</option>
<option VALUE="ME">Maine</option>
<option VALUE="MD">Maryland</option>
<option VALUE="MA">Massachusetts</option>
<option VALUE="MI">Michigan</option>
<option VALUE="MN">Minnesota</option>
<option VALUE="MS">Mississippi</option>
<option VALUE="MO">Missouri</option>
<option VALUE="MT">Montana</option>
<option VALUE="NE">Nebraska</option>
<option VALUE="NV">Nevada</option>
<option VALUE="NH">New Hampshire</option>
<option VALUE="NJ">New Jersey</option>
<option VALUE="NM">New Mexico</option>
<option VALUE="NY">New York</option>
<option VALUE="NC">North Carolina</option>
<option VALUE="ND">North Dakota</option>
<option VALUE="OH">Ohio</option>
<option VALUE="OK">Oklahoma</option>
<option VALUE="OR">Oregon</option>
<option VALUE="PA">Pennsylvania</option>
<option VALUE="RI">Rhode Island</option>
<option VALUE="SC">South Carolina</option>
<option VALUE="SD">South Dakota</option>
<option VALUE="TN">Tennessee</option>
<option VALUE="TX">Texas</option>
<option VALUE="UT">Utah</option>
<option VALUE="VT">Vermont</option>
<option VALUE="VA">Virginia</option>
<option VALUE="WA">Washington</option>
<option VALUE="WV">West Virginia</option>
<option VALUE="WI">Wisconsin</option>
<option VALUE="WY">Wyoming</option>
<option VALUE="BC">British Columbia</option>
<option VALUE="AB">Alberta</option>
<option VALUE="SK">Saskatchewan</option>
<option VALUE="MB">Manitoba</option>
<option VALUE="ON">Ontario</option>
<option VALUE="QU">Quebec</option>
<option VALUE="NF">Newfoundland</option>
<option VALUE="NB">New Brunswick</option>
<option VALUE="NS">Nova Scotia</option>
<option VALUE="PE">Prince Edward Island</option>
<option VALUE="NT">Northwest Territories</option>
<option VALUE="NU">Nunavut</option>
<option VALUE="YT">Yukon</option>
      </select>
    </div>
                 
<input type="text" class="fad-zip" placeholder="Zip" />
<button class="submit cu-place">Locate Dealer</button>
</form>

		</div><!--fab-content-right -->
	</div><!-- fab-feature-container -->


	<div class="fab-feature-container">
		<div class="fad-img-right"></div>
		<div class="fad-content-left"><h3>Have a General Question?</h3>
        <p>Please visit our <a href="contact">Support Center</a> for top related support resources or <a href="contact">email us directly</a>.

		</div><!--fab-content-right -->
	</div><!-- fab-feature-container -->	
	
<a class="viewgg" href="gutter-guards">View All Gutter Guards &#187;</a>
	
<div class="clear"></div>
    
    <?php get_footer(); ?> 