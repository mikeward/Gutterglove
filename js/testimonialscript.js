$(document).ready(function(){
	
	// Hiding all the testimonials, except for the first one.
	$('#testimonials li').hide().eq(0).show();
	
	// A self executing function that loops through the testimonials:
	(function showNextTestimonial(){
		
		// Wait for 7.5 seconds and hide the currently visible testimonial:
		$('#testimonials li:visible').delay(7500).fadeOut('slow',function(){
			
			// Move it to the back:
			$(this).appendTo('#testimonials ul');
			
			// Show the next testimonial:
			$('#testimonials li:first').fadeIn('slow',function(){
				
				// Call the function again:
				showNextTestimonial();
			});
		});
	})();
	
});