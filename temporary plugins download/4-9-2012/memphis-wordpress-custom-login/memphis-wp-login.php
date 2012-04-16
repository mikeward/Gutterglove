<?php
/*
 
Plugin Name: Memphis Custom WordPress Login
Plugin URI: http://www.kingofnothing.net/memphis-wp-login/
Description: A simple way to control your WordPress Login Page, features include Password Protected Blog, Custom Redirect after login, Changing the look of the Login Screen.
Author: Ian Howatson
Version: 2.0.1
Author URI: http://www.kingofnothing.net/
Date: 01/31/2012

Copyright 2012 Ian Howatson  (email : ian.howatson@kingofnothing.net)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/
include 'libs/localization.php';
include 'libs/mwpl.dashboard.menu.php';
include 'libs/mwpl.custom.login.functions.php';
include 'libs/mwpl.functions.php';
//////////
// FOR TESTING PURPOSES DOES NOTHING NORMALLY
register_deactivation_hook(__FILE__, 'mwpl_deactive');
//////////
// CUSTOM WP-LOGIN PAGE
function mwpl_custom_login_page() {
	mwpl_custom_login_functions();
}
add_action('login_head', 'mwpl_custom_login_page');
//////////
// REDIRECT AFTER LOGIN TO DIFFERENT PAGE
function mwpl_change_login_redirect() {
	global $redirect_to;
	$redirect = get_option('mwpl_redirect_login');
	$custom_page = get_option('mwpl_custom_redirect_page');
	switch($redirect) {
		case 'dashboard':
			break;
		case 'home':
			if ($redirect_to == get_option('siteurl').'/wp-admin/') { $redirect_to = MWPL_HOME_PAGE; }
			break;
		case 'profile':
			if ($redirect_to == get_option('siteurl').'/wp-admin/') { $redirect_to = MWPL_PROFILE_PAGE; }
			break;
		case 'custom':
			//echo 'custom: '.get_option('siteurl').'/'.$custom_page;
			if ($redirect_to == get_option('siteurl').'/wp-admin/' && $custom_page != '') { $redirect_to = (get_option('siteurl').'/'.$custom_page); }
			//$redirect_to = (get_option('siteurl').'/'.$custom_page);
			break;
		default:
			break;
	}
	
}
add_action('login_form','mwpl_change_login_redirect');
//////////
//PASSWORD PROTECT SITE//
function mwpl_password_protected() {
	//Password Protected Blog
    $mwpl_password_protected = get_option('mwpl_password_protected',null);
    if($mwpl_password_protected) { if (!is_user_logged_in()) wp_safe_redirect(get_bloginfo('wpurl').'/wp-login.php'); }
}
function mwpl_bp_password_protected() {
	global $bp, $bp_unfiltered_uri;

if (!is_user_logged_in() && (BP_MEMBERS_SLUG == $bp_unfiltered_uri[0] || BP_GROUPS_SLUG == $bp->current_component  )){ bp_core_redirect(get_bloginfo('wpurl') . '/wp-login.php'); } }
add_action('login_head', 'rsd_link');
add_action('login_head', 'wlwmanifest_link');
add_action('template_redirect', 'mwpl_password_protected');
add_action('do_feed', 'mwpl_password_protected');
add_action( 'wp', 'mwpl_bp_password_protected', 3 );
////////////////////////////////////////

/*
function mwpl_custom_dashboard_css() {
	$custom_css = MWPL_PLUGIN_URL.'css/memphis-wp-login-admin.css';
	wp_register_style('mwpl_style_sheet', $custom_css);
	wp_enqueue_style( 'mwpl_style_sheet');
}
add_action('admin_head', 'mwpl_custom_dashboard_css');
*/

///////// ADD GOOGLE ANALYTICS ///////
$google_reg = get_option('mwpl_google_analytics');
if($google_reg['enable_pages']) add_action('wp_head', 'mwpl_init_google_analytics');
if($google_reg['enable_login']) add_action('login_head', 'mwpl_init_google_analytics');
if($google_reg['enable_admin']) add_action('admin_head', 'mwpl_init_google_analytics');
////////////////////////////////////////
///////// ADD CUSTOM DASHBOARD MESSAGE ///////
function my_admin_notice(){
?>
<div class="updated">
   <p><?php _e('<b>Important!!!</b><br/> Memphis Custom Wordpress Login Version 2.0 has been complete overhaul, you will need to redo your custom login screen.  This change was made to better match Wordpress functionality and style for easy of customization and easier updating in the future.'); ?></p>
</div>
<?php
}
//update_option('mwpl_admin_notice_00000001', false);
if(get_option('mwpl_admin_notice_00000001') != true) {
	add_action('admin_notices', 'my_admin_notice');
	update_option('mwpl_admin_notice_00000001', true);
}
////////////////////////////////////////
?>