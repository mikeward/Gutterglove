	<!-- START CPAINT:JSRS ( http://cpaint.sourceforge.net/ ) -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/libraries/cpaint2.inc.compressed.js"></script>
	<!-- END CPAINT:JSRS -->
	
	<!-- START AJAX SCRIPTS -->
	<script src="<?php bloginfo('template_directory'); ?>/libraries/script.loader.php?load=init" type="text/javascript"></script>
	<script src="<?php bloginfo('template_directory'); ?>/libraries/ajax.functions.js" type="text/javascript"></script>
	<!-- END AJAX SCRIPTS -->
	
		
	<!-- START GALLERY CSS -->
	<link rel="stylesheet" href=<?php bloginfo('template_directory'); ?>/"libraries/script.loader.php?load=gallery" type="text/css" media="screen" />
	<!-- END GALLERY CSS -->
	
		
	<!-- START SCRIPTS/STYLESHEETS FOR IE PC -->
	<!--[if IE]>
		<link href="<?php bloginfo('template_directory'); ?>/css/gallery_ie.css" rel="stylesheet" type="text/css" media="screen" />
		<!--[if gte IE 5.5]>
			<style type="text/css">
				div#msc_image {
					/* IE5.5+/Win - this is more specific
					than the IE 5.0 version */
					left: expression( ( ignoreMe2 = document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft ) + 'px' );
					top: expression( ( ignoreMe = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop ) + 'px' );
					right: auto;
					bottom: auto;
				}
			</style>
		<![endif]-->
	<![endif]-->
	<!-- END SCRIPTS/STYLESHEETS FOR IE PC --