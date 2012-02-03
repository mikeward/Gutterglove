<?php
	// control's types
	// ---------------
	$control_types = array(
		0 => 'textarea',
		1 => 'input',		
		2 => 'select',		
		3 => 'select-custom',
		4 => 'multi-select',
		5 => 'upload',
		6 => 'sort-item'
	);
	
	// sections controls
	// -----------------
	$sections_controls = array(
		0 => 'General Options',
		1 => 'Thumbnail assignment',
		2 => 'Site Statistics Settings'
	);
	
	// Preset boolean
	$boolean_var[] = array( "yes", "Yes" );
	$boolean_var[] = array( "no", "No" );
	
	// Numbers
	$num_data = array ('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19');

	
	// controls
	// --------
	$tcontrols = array();
	
	$tcontrols[] = array (
			'name' => 'nattywp_custom_logo',					// id for control
			'title' => 'Custom Logo',				// Title
			'section' => $sections_controls[0],			// Section -> see $sections_controls array
			'type' => $control_types[5],				// Type -> see $control_types array	
			'desc' => 'Upload custom logo, or specify the image address. Start with http://',
			'default' => ''		
		);	
	$tcontrols[] = array (
			'name' => 'nattywp_custom_logos',					// id for control
			'title' => 'Custom Background',				// Title
			'section' => $sections_controls[0],			// Section -> see $sections_controls array
			'type' => $control_types[5],				// Type -> see $control_types array	
			'desc' => 'Upload custom image, or specify the image address. Start with http://',
			'default' => ''		
		);	
	$tcontrols[] = array (
			'name' => 't_background_repeat',
			'title' => 'Background repeat',
			'section' => $sections_controls[0],
			'type' => $control_types[3],			
			'associated' => array(
			'Repeat' => 'repeat',
			'Repeat X' => 'repeat-x',
      'Repeat Y' => 'repeat-y',
      'No Repeat' => 'no-repeat'
	),
			'desc' => 'Select repeating options for uploaded image.',
			'default' => ''
		);		
	$tcontrols[] = array (
			'name' => 't_meta_desc',					// id for control
			'title' => 'Meta Description',				// Title
			'section' => $sections_controls[0],			// Section -> see $sections_controls array
			'type' => $control_types[0],				// Type -> see $control_types array	
			'desc' => 'Enter a blurb about your site here, and it will show up on the &lt;meta name=&quot;description&quot;&gt; tag. Useful for SEO.',
			'default' => ''		
		);	

	$tcontrols[] = array (
			'name' => 't_main_img',
			'title' => 'Predefined Header image',
			'section' => $sections_controls[0],
			'type' => $control_types[3],
			'server-path' => TEMPLATEPATH.'/images/header/',
			'desc' => 'Upload your header image using FTP to '.TEMPLATEPATH.'/images/header/',
			'default' => 'headers.jpg'
		);	
	$tcontrols[] = array (
			'name' => 'nattywp_custom_header',					// id for control
			'title' => 'Custom Header Image',				// Title
			'section' => $sections_controls[0],			// Section -> see $sections_controls array
			'type' => $control_types[5],				// Type -> see $control_types array	
			'desc' => 'Upload your own image to replace predefined one. Default: 969x213 pixels.',
			'default' => ''		
		);	
	$tcontrols[] = array (
			'name' => 't_cufon_replace',
			'title' => 'Enable Cufon font replacement',
			'section' => $sections_controls[0],
			'type' => $control_types[2],
			'mode' => 'bool',
			'desc' => 'Cufon performs text replacement on web pages, using the canvas element to render fancy typefaces.',
			'default' => 'yes'
		);	
	$tcontrols[] = array (
			'name' => 't_favico',
			'title' => 'Favorite Icons',
			'section' => $sections_controls[0],
			'type' => $control_types[3],
			'server-path' => TEMPLATEPATH.'/images/icons/',
			'desc' => 'Upload your icon to '.TEMPLATEPATH.'/images/icons/',
			'default' => ''
		);		
	$tcontrols[] = array (
			'name' => 't_show_post',
			'title' => 'Show Fullposts?',
			'section' => $sections_controls[0],
			'type' => $control_types[2],
			'mode' => 'bool',
			'desc' => 'Show fullposts instead of post summary?',
			'default' => 'yes'
		);	

	
	
	$tcontrols[] = array (
			'name' => 't_thumb_auto',
			'title' => 'Thumbnail assignment',
			'section' => $sections_controls[1],
			'type' => $control_types[3],			
			'associated' => array(
				'First Image' => 'first',
				'Post Custom Field' => ''
			),
			'default' => 'first',
			'desc' => ''
		);	
	$tcontrols[] = array (
			'name' => 't_resize_auto',
			'title' => 'Enable Dynamic Image Resizer',
			'section' => $sections_controls[1],
			'type' => $control_types[2],
			'mode' => 'bool',
			'default' => 'yes',
			'desc' => ''
		);
	
	
	$tcontrols[] = array (
			'name' => 't_twitterurl',				// id for control
			'title' => 'Twitter URL',				// Title
			'section' => $sections_controls[2],			// Section -> see $sections_controls array
			'type' => $control_types[1],				// Type -> see $control_types array	
			'desc' => 'Link to your twitter page. Start with http://',
			'default' => ''		
		);
	$tcontrols[] = array (
			'name' => 't_feedburnerurl',				// id for control
			'title' => 'Feedburner URL',				// Title
			'section' => $sections_controls[2],			// Section -> see $sections_controls array
			'type' => $control_types[1],				// Type -> see $control_types array	
			'desc' => 'Feedburner URL. This will replace RSS feed link. Start with http://',
			'default' => ''		
		);
	$tcontrols[] = array (
			'name' => 't_tracking',					// id for control
			'title' => 'Tracking Code',					// Title
			'section' => $sections_controls[2],			// Section -> see $sections_controls array
			'type' => $control_types[0],				// Type -> see $control_types array	
			'desc' => 'Put your tracking code here and manage your website statistics',
			'default' => ''		
		);	
?>