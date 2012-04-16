<?php
header("Content-type: text/css; charset: UTF-8");
$days_to_cache = 10;
header('Expires: '.gmdate('D, d M Y H:i:s',time() + (60 * 60 * 24 * $days_to_cache)).' GMT');
//$doc_root = $_SERVER['DOCUMENT_ROOT'];
//DOC ROOT FIX FOR SERVERS WITH MULTI DOMIANS
$raw_path = $_SERVER['SCRIPT_FILENAME'];
$explode_path = explode('/wp-content/', $raw_path);
$doc_root = $explode_path[0];
//echo $doc_root;
require( $doc_root.'/wp-load.php' );

//$str = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/wp-login.php');
if(get_option('mwpl_enable_custom_login')) {
    $custom_bgcolor = get_option('mwpl_custom_bgcolor'); //My Favorite Color is #ABDEBE
    $custom_textcolor = get_option('mwpl_custom_textcolor');
    $custom_linkcolor_normal = get_option('mwpl_custom_linkcolor_normal');
    $custom_linkcolor_hover = get_option('mwpl_custom_linkcolor_hover');
    $enable_custom_bgimage = get_option('mwpl_enable_form_bg');
    if($enable_custom_bgimage) {
	    $custom_bgimage = get_option('mwpl_custom_bgimage');
	    $custom_bgimage = str_replace("\'","\"",$custom_bgimage);
	    $custom_bgimage = unserialize($custom_bgimage);
    }
    $custom_width = get_option('mwpl_form_width');
    //Added in Version 1.2.5
    $remove_text_shadow = get_option('mwpl_remove_text_shadow');
    $form_bg_color = get_option('mwpl_form_bg_color');
    $form_border_color = get_option('mwpl_form_border_color');
    $form_border_radius = get_option('mwpl_form_border_radius');
    $form_box_shadow_offset_right = get_option('mwpl_form_box_shadow_right');
    $form_box_shadow_offset_top = get_option('mwpl_form_box_shadow_top');
    $form_box_shadow_softness = get_option('mwpl_form_box_shadow_softness');
    $form_box_shadow_color = get_option('mwpl_form_box_shadow_color');
}
$hide_top_bar = get_option('mwpl_hide_top_bar');
//Added in Version 1.2.5
$hide_lost_password = get_option('mwpl_hide_lost_password');
$hide_login_messages = get_option('mwpl_hide_login_messages');

if(get_option('mwpl_enable_custom_login')) {
?>
html, body {height: 80%;  width: 100%; padding: 0; margin: 0; <?php echo $custom_bgcolor == null ? "background: #FBFBFB !important;" : "background: ".$custom_bgcolor; ?> url('<?php echo get_stylesheet_directory_uri(); ?>/images/background/mid_case_action_bg.png') 50% -152px no-repeat !important;}
#backtoblog, #nav  {text-shadow: <?php echo $remove_text_shadow == 1 ? 'none' : '';?> !important;}
#login { width: <?php echo $custom_width; ?>px; }
#loginform, #registerform, #lostpasswordform { background: <?php echo $form_bg_color; ?> url('<?php echo get_stylesheet_directory_uri(); ?>/images/background/footer_bg.jpg') repeat-x; box-shadow: <?php echo $form_box_shadow_offset_right == null ? '0' : $form_box_shadow_offset_right;?>px <?php echo $form_box_shadow_offset_top == null ? '0' : $form_box_shadow_offset_top;?>px <?php echo $form_box_shadow_softness == null ? '10' : $form_box_shadow_softness;?>px <?php echo $form_box_shadow_color == null ? 'rgba(200,200,200, 0.7)' : $form_box_shadow_color;?>;border-radius: <?php echo $form_border_radius; ?>px; }
#login h1 a { <?php echo $custom_bgimage[imageurl] == "" ? '' : 'background: url('.$custom_bgimage[imageurl].') no-repeat;';?> margin:10px auto; padding:0; width: <?php echo $custom_bgimage[width];?>px; height: <?php echo $custom_bgimage[height];?>px;}
#login label, .login #nav, #reg_passmail, #loginform p { color: <?php echo $custom_textcolor; ?>;}
.login #nav a, .login #backtoblog a { color: <?php echo $custom_linkcolor_normal; ?> !important; }
.login #nav a:hover, .login #backtoblog a:hover { <?php echo $custom_linkcolor_hover == '' ? "" : "color: ".$custom_linkcolor_hover.' !important;'; ?> }
.mwpl-custom-msg { display: none; width: 30%; position: absolute;  top:10px; left: 35%; text-align: center; padding:10px;  margin:0; clear:both; font-size: 15px; font-family: HelveticaNeue-Light,sans-serif; }

input.button-primary:active, button.button-primary:active, a.button-primary:active {
background: #3D3D3D;
color: #EAF2FA;
border-color: #333;
}

input.button-primary, button.button-primary, a.button-primary {
border-color: #333;
font-weight: bold;
color: white;
background: #3D3D3D;
text-shadow: rgba(0, 0, 0, 0.3) 0 -1px 0;
}

input.button-primary:hover, button.button-primary:hover, a.button-primary:hover, a.button-primary:focus, a.button-primary:active {
border-color: #333;
color: #EAF2FA;
}

.login .button-primary {
font-size: 13px!important;
line-height: 16px;
padding: 4px 12px;
float: right;
}

<?php
}
?>
#nav { display: <?php echo $hide_lost_password == 1 ? 'none' : '';?>; }
#backtoblog { display: <?php echo $hide_top_bar == 1 ? 'none' : '';?>; }
.message, #login_error { display: <?php echo $hide_login_messages == 1 ? 'none' : '';?>; }