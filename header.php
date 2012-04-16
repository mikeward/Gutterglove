<!DOCTYPE html>
<html <?php language_attributes(); ?>><head>
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



<?php if (is_page('media') ) { 
include 'gallery.php';?>
<!--home page custom JS-->
    <script type='text/javascript' src="<?php bloginfo('template_directory'); ?>/js/scrolljs.js"></script>
<?php } ?>

</head>

<body <?php body_class(); ?>>

<?php
if ( is_user_logged_in() ) {
    echo '';
} else {
    echo '<a class="dd-bttn" href="' . get_site_url() . '/dealer-dashboard">Login</a>';
}
?>

<div id="header-container">
<?php include ('header-nav.php'); ?>
</div><!-- #header-container -->



<?php
if ( is_home() ) {
    // This is a homepage
} else {
    // This is not a homepage
	echo '<div class="content-pad">';
}
?>


<div class="clear"></div>
