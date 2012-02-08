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
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/placeholder.js"></script>
<script src="http://code.jquery.com/jquery-1.7.1.min.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.skinned-select.js"></script>
<?php } ?>

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Carme' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>

<script type="text/javascript">
  function moveScroller() {
    var a = function() {
      var b = $(window).scrollTop();
      var d = $("#scroller-anchor").offset({scroll:false}).top;
      var c=$("#scroller");
      if (b>d) {
        c.css({position:"fixed",top:"0px", visibility:"visible", overflow:"visible", height:"45px"})
      } else {
        if (b<=d) {
          c.css({position:"relative",top:"0", visibility:"visible"})
        }
      }
    };
    $(window).scroll(a);a()
  }
</script>

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

<?php if (is_page('about') ) { 
?>
<!--home page custom JS-->
    <script type='text/javascript' src="<?php bloginfo('template_directory'); ?>/js/jquery.timelinr-0.9.5.js"></script>
    	<script type="text/javascript"> 
		$(function(){
			$().timelinr()
		});
	</script>
<?php } ?>

</head>

<body <?php body_class(); ?>>

<div id="header-container">
<?php include ('header-nav.php'); ?>
</div><!-- #header-container -->

<div class="content-pad">

<div class="clear"></div>
