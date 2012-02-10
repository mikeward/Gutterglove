<?php

$themename = 'delicate';
$current = '3.4.3';

$url = get_template_directory_uri();
$link = home_url();
$manualurl = 'http://support.nattywp.com/index.php?act=kb';

$functions_path = TEMPLATEPATH . '/functions/';
$include_path = TEMPLATEPATH . '/include/';
$license_path = TEMPLATEPATH . '/license/';

require_once ($include_path . 'settings-color.php');
require_once ($include_path . 'settings-theme.php');
require_once ($include_path . 'settings-comments.php');

require_once ($functions_path . 'core-init.php');

require_once ($include_path . 'hooks.php');
require_once ($include_path . 'sidebar-init.php');
require_once ($include_path . 'widgets/flickr.php');
require_once ($include_path . 'widgets/feedburner.php');
require_once ($include_path . 'widgets/twitter.php');

require_once ($license_path . 'license.php');

add_filter("attachment_fields_to_edit", "add_image_source_url", 10, 2);
function add_image_source_url($form_fields, $post) {
	$form_fields["source_url"] = array(
		"label" => __("Source URL"),
		"input" => "text",
		"value" => get_post_meta($post->ID, "source_url", true),
                "helps" => __("Add the URL where the original image was posted"),
	);
 	return $form_fields;
}

add_filter("attachment_fields_to_save", "save_image_source_url", 10 , 2);
function save_image_source_url($post, $attachment) {
	if (isset($attachment['source_url']))
		update_post_meta($post['ID'], 'source_url', trim($attachment['source_url']));
	return $post;
}

add_filter('img_caption_shortcode', 'caption_shortcode_with_credits', 10, 3);
function caption_shortcode_with_credits($empty, $attr, $content) {
	extract(shortcode_atts(array(
		'id'	=> '',
		'align'	=> 'alignnone',
		'width'	=> '',
		'caption' => ''
	), $attr));
	
	// Extract attachment $post->ID
	preg_match('/\d+/', $id, $att_id);
	if (is_numeric($att_id[0]) && $source_url = get_post_meta($att_id[0], 'source_url', true)) {
		if (!strstr($source_url, 'http://'))
			$source_url = 'http://' . $source_url;
		$parts = parse_url($source_url);
		$caption .= ' ('. __('via') .' <a href="'. $source_url .'">'. $parts['host'] .'</a>)'; 
	}

	if ( 1 > (int) $width || empty($caption) )
		return $content;

	if ( $id ) 
		$id = 'id="' . esc_attr($id) . '" ';

	return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" style="width: ' . (10 + (int) $width) . 'px">'
	. do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}

function get_user_role() {
	global $current_user;

	$user_roles = $current_user->roles;
	$user_role = array_shift($user_roles);

	return $user_role;
}

/**
 * Returns the translated role of the current user. If that user has
 * no role for the current blog, it returns false.
 *
 * @return string The name of the current role
 **/
function get_current_user_role() {
	global $wp_roles;
	$current_user = wp_get_current_user();
	$roles = $current_user->roles;
	$role = array_shift($roles);
	return isset($wp_roles->role_names[$role]) ? translate_user_role($wp_roles->role_names[$role] ) : false;
}

?>