<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title>
<?php if ( is_home()) { bloginfo('name'); ?> - <?php bloginfo('description'); } ?>
<?php if ( is_search()) { bloginfo('name'); ?> - <?php _e('Search Results', 'nattywp'); } ?>
<?php if ( is_author()) { bloginfo('name'); ?> - <?php _e('Author Archives', 'nattywp'); } ?>
<?php if ( is_single()) { $custom_title = get_post_meta($post->ID, 'natty_title', true); 
if (strlen($custom_title)) {echo strip_tags(stripslashes($custom_title));}else { wp_title(''); ?> - <?php bloginfo('name'); }} ?>
<?php if ( is_page()) { $custom_title = get_post_meta($post->ID, 'natty_title', true); 
if (strlen($custom_title)) {echo strip_tags(stripslashes($custom_title));}else { bloginfo('name'); ?> - <?php wp_title(''); }}?>
<?php if ( is_category()) { bloginfo('name'); ?> - <?php _e('Archive','nattywp'); ?> - <?php single_cat_title(); } ?>
<?php if ( is_month()) { bloginfo('name'); ?> - <?php _e('Archive','nattywp'); ?> - <?php the_time('F');  } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { bloginfo('name'); ?> - <?php _e('Tag Archive','nattywp'); ?> - <?php  single_tag_title("", true); } } ?>
</title>

<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/ggicon.ico" /> 

<?php /* Include the jQuery framework */ 
wp_enqueue_script("jquery"); if (is_singular() && get_option('thread_comments')) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>


<!-- Feed link -->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


<!-- jQuery utilities -->
<script type="text/javascript">var themePath = '<?php echo get_template_directory_uri(); ?>/'; // for js functions </script>
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/superfish.js?ver=2.9.2'></script>
<?php if (t_get_option('t_cufon_replace') == 'yes') { ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/cufon.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/font.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/finclude.js"></script>
<?php } ?>

<!-- Style sheets -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />


<!--[if IE 6]>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/menu.js"></script>
    	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/ie6.css" />
        <style type="text/css">
            img.png {
            filter: expression(
            (runtimeStyle.filter == '') ? runtimeStyle.filter = 'progid:DXImageTransform.Microsoft.AlphaImageLoader(src='+src+', sizingMethod=scale)' : '',
            width = width,
            src = '<?php echo get_template_directory_uri(); ?>/images/px.gif');
    }
        </style>
	<![endif]-->

    

    
        <!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/ie7.css" />
	<![endif]-->
	
	
	
<style type="text/css">
<?php 
  $t_custom_background = get_option( "nattywp_custom_logos" );
  $t_background_repeat = t_get_option( "t_background_repeat" );
  $t_main_img = t_get_option( "t_main_img" );
  if ($t_custom_background != '') {
   echo 'body {background-image: url("'.$t_custom_background.'"); background-repeat: '.$t_background_repeat.'}';   
  } ?>
</style>
<link href='http://fonts.googleapis.com/css?family=Carme' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/lightbox.css" type="text/css" media="screen" />
	<script src="<?php echo get_template_directory_uri(); ?>/js/prototype.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/lightbox.js" type="text/javascript"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.froll-0.1.js" type="text/javascript"></script>

</head>

<body <?php body_class(); ?>>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=294701663931251";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div id="header-container">
<?php include ('header-nav.php'); ?>
</div><!-- #header-container -->