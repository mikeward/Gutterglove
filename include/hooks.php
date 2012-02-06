<?php
/**
 * Custom theme Hooks.
 */
add_editor_style(); 
add_theme_support( 'post-thumbnails' );
 
if ( ! isset( $content_width ) )
	$content_width = 590;
	
if (function_exists('register_nav_menus')) 
register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'nattywp' ),
		//'secondary' => __( 'Secondary Navigation', 'nattywp'),
) );

function natty_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'natty_page_menu_args' );

function natty_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Read more <span class="meta-nav">&rarr;</span>', 'nattywp' ) . '</a>';
}
function natty_auto_excerpt_more( $more ) {
	return ' &hellip;' . natty_continue_reading_link();
}
function natty_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= natty_continue_reading_link();
	}
	return $output;
}
add_filter( 'excerpt_more', 'natty_auto_excerpt_more' );
add_filter( 'get_the_excerpt', 'natty_custom_excerpt_more' );


function natty_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'natty_remove_gallery_css' );


function t_show_navigation($args, $func) {		
 if (function_exists('wp_nav_menu')) {
wp_nav_menu( array( 'container' => '', 'menu_class' => 'topnav fl fr sf-js-enabled sf-shadow', 'menu_id' => 'nav-ie', 'theme_location' => $args, 'link_before' => '<span>', 'link_after' => '</span>', 'fallback_cb' => $func ) );
 } else { 
  theme_show_pagemenu ();
	}
}

function theme_show_pagemenu () {
 echo '<ul id="nav-ie" class="topnav fl fr sf-js-enabled sf-shadow">';
 echo '<li ';
    if(is_home()){ echo 'class="current_page_item"';}
 echo '><a href="/"><span>'. get_option('t_home_name').'</span></a></li>';
 t_show_pag();
 echo '</ul>';
}

function theme_get_profile() {
	printf( __( '%1$s', 'nattywp' ),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'nattywp' ), get_the_author() ),
			get_the_author()
		)
	);
}
?>