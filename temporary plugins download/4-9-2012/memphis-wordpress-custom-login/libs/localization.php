<?php
define('MWPL_NAME', __('Memphis Custom WordPress Login'));
define('MWPL_HOME_PAGE', get_option('siteurl'));
define('MWPL_PROFILE_PAGE', get_option('siteurl').'/wp-admin/profile.php');
define('MWPL_PLUGIN_URL', WP_PLUGIN_URL.'/memphis-wordpress-custom-login/');
define('MWPL_PLUGIN_URL_DASHBOARD', WP_CONTENT_DIR.'/plugins/memphis-wordpress-custom-login/');
define('MWPL_BGIMAGE', 'mwpl-bgimage-');
define('MWPL_CUSTOM_BGCOLOR',get_option('mwpl_custom_bgcolor'));

$mwpl_google_analytics = array (
					enable_login => null,
					enable_admin => null,
					enable_pages => null,
					google_script => ''
					);

function mwpl_dashboard_css() {
?>
<style type="text/css">
.mwpl_bg_container { 
	-moz-border-radius: 5px;
	border-radius: 5px;
	max-width: 180px;
	min-height: 130px;
	border:1px solid #CCC;
	float:left;
	padding:0px;
	margin: 10px 5px 0 26px;
}

.mwpl_image_container {
	min-height: 130px;
	max-height: 130px;
}

.mwpl_bg_container_footer {
	clear:both;
	margin: 0px;
	padding: 5px;
}

.mwpl_bg_container_label {
	font-size:10px;
}

.mwpl_bg_container_header {
	background: -webkit-gradient(linear, left top, left bottom, from(#E9F1FA), to(#D5E6F2));
	background: -moz-linear-gradient(top,  #E9F1FA,  #D5E6F2);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#E9F1FA', endColorstr='#D5E6F2');
	-moz-border-radius-topleft: 5px;
	-moz-border-radius-topright: 5px;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
	margin: 0px 0 5px 0;
	padding: 5px 0 5px 0;
	text-indent: 2px;
	font-weight: bold;
}
.mwpl_image_container img {
	-moz-border-radius: 5px;
	border-radius: 5px;
	border:1px solid #CCC;
	width: 160px;
	max-height: 130px;
	margin: 0 5px 5px 5px;
	padding: 0px;
	line-height:44px;
}
</style>
<?php
}
?>