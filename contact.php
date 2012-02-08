<?php
/**
 * The Template for displaying all single posts.
 *Template name: Contact
 */
include (TEMPLATEPATH . '/header-products.php'); ?>
<div id="main-subpage">		
	<div class="columns div-slice">      
    <div class="narrowcolumn-bare singlepage contact">
   
     <?php if (have_posts()) : ?>
     <?php while (have_posts()) : the_post(); ?>							
					
	<h1 class="page"><?php the_title(); ?> Us & Support</h1>
    
    
       <div class="support-panel">
    <a class="cfinclude blk-pattern action-blue" href="support-center">For product support, please visit our <strong>Support Center</strong></a>
    </div>
    
     			<div class="post">
				<div class="entry">
                     <?php t_show_video($post->ID); ?>
                     <?php the_content(); ?>    
                    <div class="clear"></div>
                </div>                  
        <h2>Email Us Online</h2>
        <h3 class="cfinclude-b nospace">Anytime, 7 Days A Week.</h3>        
        <p>Fill out the form below to contact us by email at any time.</p><br />
                <form id="sample-form">
				<label>Name</label><br />
<input type="text" class="fad-name" /><br />
<label>Email</label><br />
<input type="text" class="fad-email" /><br />
<label>Phone</label><br />
<input type="text" class="fad-phone" /><br />
<label>City</label><br />
<input type="text" class="fad-city" /><br />
<label>State</label><br />          
                  <div class="my-skinnable-select">
      <select name="name">
<option value="" selected>Select</OPTION>
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
    </div><br />
<label>Zip</label><br />          
<input type="text" class="fad-zip" />
<button class="submit-std blk-pattern action-blue cu-place">Submit</button>
</form>
                
                
			</div>	    
			<?php comments_template( '', true ); ?>      	
	<?php endwhile; ?>		
    <?php endif; ?>				
	</div> <!-- END Narrowcolumn -->
    <div id="sidebar" class="profile">
        
        <iframe width="335" height="200" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?q=38.809015,-121.21911&amp;num=1&amp;vpsrc=6&amp;ie=UTF8&amp;t=m&amp;ll=38.809483,-121.219025&amp;spn=0.026753,0.057335&amp;z=13&amp;output=embed"></iframe><br /><br />
  <h3 class="cfinclude-b">Corporate Office:</h3>
   <p>Gutterglove, Inc.<br />4021 Alvis Ct St #5<br />Rocklin, CA 95677</p><br />
   <h3 class="cfinclude-b">Mailing Address:</h3>
      <p>Gutterglove, Inc.<br />P.O.Box 3307<br />Rocklin, CA 95677</p>
   <br />
           <div class="c-wrap phone-case">
    <h2>Phone Support</h2>
    <p>Toll Free: 877-662-5644<br />USA Work: 916-624-5000</p>
        </div>


    </div>    
<div class="clear"></div>
<?php get_footer(); ?> 