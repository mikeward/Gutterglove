<?php
// GLOBAL_LOCAL VARIABLES //
$mwpl_bgimages = array();


/** DANGEROUS FUNCTION WILL DELETE ALL IMAGES IN UPLOAD DIR REFERENCING MEMPHIS WORDPRESS LOGIN **/
//function mwpl_delete($file) { unlink($file); }
//$uploads = wp_upload_dir();
//mwpl_find_bgimages($uploads['basedir'], '/mwpl-bgimage/', 'mwpl_delete');
//********************************************************\\
function mwpl_deactive() { }

add_action('admin_menu', 'mwpl_create_plugin_menu');
function mwpl_create_plugin_menu() {
	//add_submenu_page('tools.php', 'Memphis WordPress Custom Login', 'Memphis Login', 'administrator', 'memphis-wp-login.php', 'mwpl_plugin_options');
	//add_submenu_page('wp-edu.php',WPEDU_CUSTOM_LOGIN, WPEDU_CUSTOM_LOGIN, 'administrator', 'wp-edu.php', 'wpedu_dashboard_custom_login');
	add_menu_page( 'Memphis', 'Memphis', 'administrator', 'memphis-wp-login.php', 'mwpl_blog_protection_dashboard', MWPL_PLUGIN_URL.'/assets/imgs/kon.ico'  );
	add_submenu_page( 'memphis-wp-login.php', 'Blog Protection', 'Blog Protection', 'administrator', 'memphis-wp-login.php', 'mwpl_blog_protection_dashboard' );
	add_submenu_page( 'memphis-wp-login.php', 'Customized Login', 'Customized Login', 'administrator', 'memphis-custom-login.php', 'mwpl_customize_login_dashboard' );
	add_submenu_page( 'memphis-wp-login.php', 'Google Analytics', 'Google Analytics', 'administrator', 'memphis-google-analytics.php', 'mwpl_google_analytics_dashboard' );
	add_action('admin_init','mwpl_register_settings');
}

function mwpl_register_settings() {     
  global $mwpl_bgimages;
	// NONCE CHECK AND REQUEST HANDLING
	if(!empty($_GET['action']) && !empty($_GET['file'])) { 
		$action = $_GET['action'];
		$file = $_GET['file'];
		$nonce = $_REQUEST['_wpnonce'];
		if (! wp_verify_nonce($nonce, 'my-nonce') ) die('Security checkss');
		check_admin_referer('my-nonce');
	}
	if(!empty($_POST['file_upload']))
		$action = $_POST['file_upload'];
	switch($action) {
		case 'add_file':
		  $image = $_FILES["image"]["name"];
		  $image_type = $_FILES["image"]["type"];
		  $image_type = str_replace('image/','',$image_type);           
		  if($image != '') {
			  $image = MWPL_BGIMAGE.date('YmdHis').'.'.$image_type;
			  $upload = wp_upload_bits($image, null, file_get_contents($_FILES["image"]["tmp_name"]));			  
			  if($upload['error'] == '') {
				$mwpl_bgimages = get_option('mwpl_custom_bgimage_list');
				$bg_image_array = array();
				list($width, $height, $type, $attr) = getimagesize($upload['file']);
				array_push($mwpl_bgimages, array(
									   imageurl=>$upload['url'],
									   imagepath=>$upload['file'],
									   width=>$width,
									   height=>$height,
									   type=>$type,
									   attr=>$attr
									   ));
				update_option('mwpl_custom_bgimage_list', $mwpl_bgimages);
				
			  } else {
			    function upload_error_notice() {
				$upload_error = get_option('mwpl_upload_error');
				?>
				<div class="updated" style="position: absolute; z-index: 2000;">
				    <p><?php _e($upload_error); ?></p>
				 </div>
				<?php
			    }
			    update_option('mwpl_upload_error', $upload['error']);
			    add_action('admin_notices', 'upload_error_notice');
			  }
		    
		  }
		  break;
		case 'delete':
			$mwpl_bgimages = get_option('mwpl_custom_bgimage_list');
			$id = 0;
			foreach($mwpl_bgimages as &$k) {
				$keys = (array_keys($k));
				foreach($keys as &$key_value) {
					if($key_value == 'imagepath') { $value = $k[$key_value]; if($value == str_replace('\\\\','\\',$file)) {
						
						break(2);
						
						} }
					//echo 'V: '.$value."<br>";
					//echo 'F: '. str_replace('\\\\','\\',$file)."<br><br>";
				}
				$id++;
			}
			//print_r($mwpl_bgimages[$id]);
			unset($mwpl_bgimages[$id]);
			$mwpl_bgimages = array_values($mwpl_bgimages);
			update_option('mwpl_custom_bgimage_list', $mwpl_bgimages);
			unlink($file);
			wp_safe_redirect( 'admin.php?page=memphis-custom-login.php');
			exit;
			break;
	}
	//************************************************************************************************* //
	//*******************************   [   REMOVED VERSION 2.0   ]   ******************************* //
	//[REMOVE] add_option('mwpl_form_height',100);
	//unregister_setting('mwpl-settings-group','mwpl_google_analytics');
	delete_option('mwpl_form_height');
	//[REMOVE] add_option('mwpl_form_offset_tb',0);
	//unregister_setting('mwpl-settings-group','mwpl_google_analytics');
	delete_option('mwpl_form_offset_tb');
	//[REMOVE] add_option('mwpl_form_offset_lr',0);
	//unregister_setting('mwpl-settings-group','mwpl_google_analytics');
	delete_option('mwpl_form_offset_lr');
	//[REMOVE]register_setting('mwpl-settings-group2','mwpl_form_offset_tb');
	unregister_setting('mwpl-settings-group2','mwpl_form_offset_tb');
	delete_option('mwpl_form_offset_tb');
	//[REMOVE]register_setting('mwpl-settings-group2','mwpl_form_offset_lr');
	unregister_setting('mwpl-settings-group2','mwpl_form_offset_lr');
	delete_option('mwpl_form_offset_lr');
	//[REMOVE]register_setting('mwpl-settings-group2','mwpl_form_height');
	unregister_setting('mwpl-settings-group2','mwpl_form_height');
	delete_option('mwpl_form_height');
	//[REMOVE]register_setting('mwpl-settings-group2','mwpl_bl_offset_tb');
	unregister_setting('mwpl-settings-group','mwpl_bl_offset_tb');
	delete_option('mwpl_bl_offset_tb');
	//[REMOVE]register_setting('mwpl-settings-group2','mwpl_bl_offset_lr');
	unregister_setting('mwpl-settings-group2','mwpl_bl_offset_lr');
	delete_option('mwpl_bl_offset_lr');
	//************************************************************************************************* //
	//************************************************************************************************* //
	
	// REGISTERING OPTIONS //
	//Login Protection
	add_option('mwpl_password_protected',null);
	register_setting( 'mwpl-settings-group1','mwpl_password_protected');
	register_setting( 'mwpl-settings-group1','mwpl_redirect_login');
	register_setting('mwpl-settings-group1','mwpl_custom_redirect_page');
	//Version 2.0
	register_setting('mwpl-settings-group1','mwpl_hide_lost_password');
	register_setting('mwpl-settings-group1','mwpl_hide_login_messages');
	
	//Customized Login
	register_setting('mwpl-settings-group2','mwpl_custom_bgcolor');
	register_setting('mwpl-settings-group2','mwpl_custom_textcolor');
	register_setting('mwpl-settings-group2','mwpl_custom_linkcolor_normal');
	register_setting('mwpl-settings-group2','mwpl_custom_linkcolor_hover');
	register_setting( 'mwpl-settings-group2','mwpl_enable_custom_login');
	register_setting( 'mwpl-settings-group2','mwpl_enable_form_bg');
	register_setting('mwpl-settings-group2','mwpl_custom_bgimage');
	register_setting('mwpl-settings-group2','mwpl_form_width');
	register_setting('mwpl-settings-group2','mwpl_hide_top_bar');
	//Version 2.0
	register_setting('mwpl-settings-group2', 'mwpl_remove_text_shadow');
	register_setting('mwpl-settings-group2', 'mwpl_form_bg_color');
	register_setting('mwpl-settings-group2', 'mwpl_form_border_color');
	register_setting('mwpl-settings-group2', 'mwpl_form_border_radius');
	register_setting('mwpl-settings-group2', 'mwpl_form_box_shadow_right');
	register_setting('mwpl-settings-group2', 'mwpl_form_box_shadow_top');
	register_setting('mwpl-settings-group2', 'mwpl_form_box_shadow_softness');
	register_setting('mwpl-settings-group2', 'mwpl_form_box_shadow_color');
	register_setting('mwpl-settings-group2', 'mwpl_logo_link');
	register_setting('mwpl-settings-group2', 'mwpl_custom_message');
	register_setting('mwpl-settings-group2', 'mwpl_custom_message_alert');
		
	//SPECIAL REGISTERING OF OPTIONS
	if(get_option('mwpl_custom_bgimage_list') == '') {
		add_option('mwpl_custom_bgimage_list',array());
		register_setting('mwpl-settings-group2','mwpl_custom_bgimage_list');
	}
	
	//Google Analytics
	register_setting('mwpl-settings-group3','mwpl_google_analytics','mwpl_update_registry');
	
}

function mwpl_plugin_options() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	mwpl_dashBoardMenu();
}

function mwpl_blog_protection_dashboard() {
?>
<div class="wrap">
	<h2><?php _e(MWPL_NAME); ?></h2> 
	<form enctype="multipart/form-data" method="post" action="options.php">
		<?php settings_fields( 'mwpl-settings-group1' ); ?>
		<h3><?php _e( 'Login Page Settings' ); ?></h3>
		<table class="form-table">
			<tr valign="top">
			<th scope="row"><?php _e('Password Protected Blog'); ?></th>
			<td>
				<input type="checkbox" name="mwpl_password_protected" value="1" <?php checked('1', get_option('mwpl_password_protected') ); ?>/></td>
			</tr>
			<tr valign="top">
			<th scope="row"><?php _e('Hide Lost Password Link'); ?></th>
			<td>
				<input type="checkbox" name="mwpl_hide_lost_password" value="1" <?php checked('1', get_option('mwpl_hide_lost_password') ); ?>/></td>
			</tr>
			<tr valign="top">
			<th scope="row"><?php _e('Hide Login Messages/Errors'); ?></th>
			<td>
				<input type="checkbox" name="mwpl_hide_login_messages" value="1" <?php checked('1', get_option('mwpl_hide_login_messages') ); ?>/></td>
			</tr>
			<?php
			//if (get_site_option( 'mwpl_redirect_login' )=="")
				//update_option( 'mwpl_redirect_login', 'dashboard' );
			$reg = get_option( 'mwpl_redirect_login' );
			?>
			<tr valign="top">
			<th scope="row"><?php _e( 'Redirect on login' ) ?></th>
			<td>
				<label><input name="mwpl_redirect_login" type="radio" id="redirect1" value="dashboard"<?php checked( $reg, 'dashboard') ?> /> <?php _e( 'Default Location. (<i>Dashboard is default</i>)' ); ?></label><br />
				<label><input name="mwpl_redirect_login" type="radio" id="redirect2" value="home"<?php checked( $reg, 'home') ?> /> <?php _e( 'Home Page.' ); ?></label><br />
				<label><input name="mwpl_redirect_login" type="radio" id="redirect3" value="profile"<?php checked( $reg, 'profile') ?> /> <?php _e( 'Profile Page.' ); ?></label><br />
				<label><input name="mwpl_redirect_login" type="radio" id="redirect4" value="custom"<?php checked( $reg, 'custom') ?> /> <?php _e( 'Custom Page. ' ); ?></label>
				<input style="width:400px;" type="text" name="mwpl_custom_redirect_page" value="<?php echo get_option('mwpl_custom_redirect_page'); ?>" /><br />
				<p><?php _e( 'Change the default redirect after a user logs in, to a different location in your blog.' ); ?></p>
			</td>
			</tr>
			
		</table>
		<p class="submit">
			<input style="margin:15px;" type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>    
	</form>
<?php
}

function mwpl_customize_login_dashboard() {
mwpl_dashboard_css();
?>
<div class="wrap">
	<!--<div id="message" class="error" ><p>this is a test</p></div>-->
	<h2><?php _e(MWPL_NAME); ?></h2> 
	<form enctype="multipart/form-data" method="post" action="options.php" style="">
		<style>
		  label {font-size: 10px;}
		  input {font-size: 13px;}
		</style>
		<?php settings_fields( 'mwpl-settings-group2' ); ?>
		<h3><?php _e( 'Enable Customization' ); ?></h3>
		<table class="form-table">
			<tr valign="top">
			<th scope="row"><?php _e('Check to customize login page'); ?></th>
			<td>
				<input type="checkbox" name="mwpl_enable_custom_login" value="1" <?php checked('1', get_option('mwpl_enable_custom_login') ); ?>/>
			</td>
		</table>
		<br/>
		<h3><?php _e( 'Generic Customize of Login Page' ); ?></h3>
		<table class="form-table">
			</tr>
			<tr valign="top">
			<th scope="row"><?php _e('Background Color'); ?></th>
			<td>
				<label><input type="text" name="mwpl_custom_bgcolor" value="<?php echo get_option('mwpl_custom_bgcolor'); ?>" />  <i><?php _e('eg(#000000, #FFFFFF, #22FFCC, black, white, red)'); ?></i></label>
			</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Text Color'); ?></th>
				<td>
					<label><input type="text" name="mwpl_custom_textcolor" value="<?php echo get_option('mwpl_custom_textcolor'); ?>" />  <i><?php _e('eg(#000000, #FFFFFF, #22FFCC, black, white, red)'); ?></i></label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Link Colors'); ?></th>
				<td>
					<label><i><?php _e('Normal:'); ?></i><input type="text" name="mwpl_custom_linkcolor_normal" value="<?php echo get_option('mwpl_custom_linkcolor_normal'); ?>" /> </label>
					<label><i><?php _e('Hover:'); ?></i><input type="text" name="mwpl_custom_linkcolor_hover" value="<?php echo get_option('mwpl_custom_linkcolor_hover'); ?>" /></label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Hide Back to Blog Link'); ?></th>
				<td>
					<input type="checkbox" name="mwpl_hide_top_bar" value="1" <?php checked('1', get_option('mwpl_hide_top_bar') ); ?>/>
				<td>
				  
			</tr>
			<tr valign="top">
			  <th scope="row"><?php _e('Remove Text Shadows'); ?></th>
				  <td>
					  <input type="checkbox" name="mwpl_remove_text_shadow" value="1" <?php checked('1', get_option('mwpl_remove_text_shadow') ); ?>/>
				  <td>
			</tr>
			<tr valign="top">
				<th scope="row">
				  <?php _e('Custom Message'); ?><br/>
				    <label style="font-size: 10px;"><i><b><?php _e('Javascript must be enabled.'); ?></b></i></label>
				</th>
				<td>
					<label><input style="width:60%;" type="text" name="mwpl_custom_message" value="<?php echo get_option('mwpl_custom_message'); ?>" />  <i><?php _e('eg( Hello World! )'); ?></i></label>
					<br/>
					<label><input type="checkbox" name="mwpl_custom_message_alert" value="1" <?php checked('1', get_option('mwpl_custom_message_alert') ); ?>/> <?php _e('Make it and Alert ');?></label>
				</td>
			</tr>
			
		</table>
		<br/>
		<h3><?php _e( 'Form Customization' ); ?></h3>
		<table class="form-table">
			<tr valign="top">
			<th scope="row"><?php _e('Form Colors'); ?></th>
			<td>
				<label><i><?php _e('Background Color'); ?>: </i><input type="text" name="mwpl_form_bg_color" value="<?php echo get_option('mwpl_form_bg_color'); ?>" /></label>
				<label><i><?php _e('Border Color'); ?>: </i><input type="text" name="mwpl_form_border_color" value="<?php echo get_option('mwpl_form_border_color'); ?>" /></label>
			</td>
			</tr>
			<tr valign="top">
			<th scope="row"><?php _e('Form Width'); ?></th>
			<td>
				<label><input style="width:50px" type="text" name="mwpl_form_width" value="<?php echo get_option('mwpl_form_width'); ?>" /><b><?php _e('%') ?></b></label>
			</td>
			</tr>
						<tr>
			<th scope="row"><?php _e('Form Border Radius'); ?></th>
			<td>
				<label><input style="width:50px" type="text" name="mwpl_form_border_radius" value="<?php echo get_option('mwpl_form_border_radius'); ?>" /><b>px</b>  <i><?php _e('eg(1, 5, 0, 10)'); ?></i></label>
			</td>
			</tr>
			<th scope="row"><?php _e('Form Glow Style'); ?></th>
			<td>
				<label><?php _e('Offset Right'); ?>: <input style="width:50px" type="text" name="mwpl_form_box_shadow_right" value="<?php echo get_option('mwpl_form_box_shadow_right'); ?>" /><b>px</b></label>
				<label style="margin-left: 8px;"><?php _e('Offset Top'); ?>: <input style="width:50px" type="text" name="mwpl_form_box_shadow_top" value="<?php echo get_option('mwpl_form_box_shadow_top'); ?>" /><b>px</b></label>
				<label style="margin-left: 8px;"><?php _e('Softness'); ?>: <input style="width:50px" type="text" name="mwpl_form_box_shadow_softness" value="<?php echo get_option('mwpl_form_box_shadow_softness'); ?>" /><b>px</b></label>
				<label style="margin-left: 8px;"><?php _e('Color'); ?>: <input style="width:50px" type="text" name="mwpl_form_box_shadow_color" value="<?php echo get_option('mwpl_form_box_shadow_color'); ?>" /> <i><?php _e('eg(#FFFFFF, black)'); ?></i></label>
			</td>
			</tr>
			
		</table>
		<br/>
		<h3><?php _e( 'Custom Logo Customization' ); ?></h3>
		<table class="form-table">
			<tr>
			  <th scope="row">
				  <?php _e('Custom Logo Link'); ?><br/>
				  <label style="font-size: 10px;"><i><b><?php _e('Javascript must be enabled.'); ?></b></i></label>
			  </th>
			  <td>
					  <label><input type="text" name="mwpl_logo_link" value="<?php echo get_option('mwpl_logo_link'); ?>" /> <i><?php _e('eg(www.example.com)'); ?></i></label>
					  <br/>
					  <label style="font-size: 10px;"><i><b><?php _e('(default wordpress.org)'); ?></b></i></label>
			  </td>
			</tr>
						<tr valign="top">
				<th scope="row"><?php _e('Enable Custom Logo'); ?></th>
				<td>
					<input type="checkbox" name="mwpl_enable_form_bg" value="1" <?php checked('1', get_option('mwpl_enable_form_bg') ); ?>/>
				<td>
			</tr>
		</table>
		
		<div id="bgimage_box" class="postbox" style="display:none; margin: 10px; width:80%; clear:both;"><h3 class='' style="padding:10px; margin: 0px; cursor:default;"><span><?php _e('Logos'); ?></span></h3>
			<div class="inside">
				<p><?php mwpl_get_bgimages() ?></p>
				<p  style="clear: both;"><br/></p>
			</div>
		</div>
		<p class="submit">
			<input style="margin:15px;" type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>
	<div id="mwpl-uploader" style="display:none; border:  dotted 2px #7BAABC; background: #F1F1F1; padding: 5px; margin: 0; position: fixed; top: 35px; right:5px;">
	    <div>
	  <h2 style="padding:0;"><?php _e('Logo Uploader'); ?></h2>
	  <form id="upload_form" enctype="multipart/form-data" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
				<input style="margin: 0px;" type="file" name="image" id="image"/>
		  <input type="hidden" name="file_upload" value="add_file" />
		  <input type="submit" class="upload-primary" value="<?php _e('Upload File') ?>" />
	  </form>
	</div>
	<script>
		var value = jQuery(' :checkbox[name=mwpl_enable_form_bg]').is( ':checked');
		if(value) jQuery('#bgimage_box').css('display','block');
		if(value) jQuery('#mwpl-uploader').css('display','block');		
		jQuery(' :checkbox[name=mwpl_enable_form_bg]').click(function() {
			var value = jQuery(this).is( ':checked');
			if(value) { jQuery('#bgimage_box').slideDown(500); jQuery('#mwpl-uploader').fadeIn(500); }
			else { jQuery('#bgimage_box').slideUp(500); jQuery('#mwpl-uploader').fadeOut(500); }
		});
	</script>
</div>
<?php
}

function mwpl_google_analytics_dashboard() {
	if (!get_option('mwpl_google_analytics')) update_option('mwpl_google_analytics',$mwpl_google_analytics);
	$google_registry = get_option('mwpl_google_analytics');
	//var_dump($google_registry);
	?>
	<div class="wrap">
		<h2><?php _e(MWPL_NAME); ?></h2> 
		<form enctype="multipart/form-data" method="post" action="options.php">
			<?php settings_fields( 'mwpl-settings-group3' ); ?>
				<h3><?php _e( 'Google Analytics Support' ); ?></h3>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e('Enable Google Analytics'); ?></th>
						<td>
							<label><input type="checkbox" name="mwpl_google_analytics[enable_login]" value="1" <?php checked('1', $google_registry['enable_login'] ); ?>/> <?php _e('Login Page'); ?>&nbsp;&nbsp;&nbsp;</label>
							<label><input type="checkbox" name="mwpl_google_analytics[enable_admin]" value="1" <?php checked('1', $google_registry['enable_admin'] ); ?>/> <?php _e('Admin Pages'); ?>&nbsp;&nbsp;&nbsp;</label>
							<label><input type="checkbox" name="mwpl_google_analytics[enable_pages]" value="1" <?php checked('1', $google_registry['enable_pages'] ); ?>/> <?php _e('Everything Else'); ?>&nbsp;&nbsp;&nbsp;</label>
						<td>
					</tr>
					<tr valign="top">
						<th scope="row"></th>
						<td><label><i><?php _e('Your Goolge Analytics script can be found <a href=\'https://www.google.com/analytics/settings/\'>here</a>.');?></i></label></td>
					</tr>
					<tr>
						<th scope="row"><?php  _e('Google Analytics Script')?></th>
						<td>
							<textarea name="mwpl_google_analytics[google_script]" cols="60" rows="20"><?php echo $google_registry['google_script']; ?></textarea>
						</td>
					</tr>
				</table>
				<script>
					var value = jQuery(' :checkbox[name=mwpl_enable_form_bg]').is( ':checked');
					if(value) jQuery('#bgimage_box').css('display','block');
					jQuery(' :checkbox[name=mwpl_enable_form_bg]').click(function() {
						var value = jQuery(this).is( ':checked');
						if(value) jQuery('#bgimage_box').slideDown(500);
						else jQuery('#bgimage_box').slideUp(500);
					});
				</script>
			<p class="submit">
			<input style="margin:15px;" type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
		</form>
	</div>
<?php
}

function mwpl_dashBoardMenu() {
global $mwpl_google_analytics;
mwpl_dashboard_css();
?>
<div class="wrap">
	<h2><?php _e(MWPL_NAME); ?></h2> 
	<form enctype="multipart/form-data" method="post" action="options.php">
		<?php settings_fields( 'mwpl-settings-group' );?>
		<h3><?php _e( 'Login Page Settings' ); ?></h3>
		<table class="form-table">
			<tr valign="top">
			<th scope="row"><?php _e('Password Protected Blog'); ?></th>
			<td>
				<input type="checkbox" name="mwpl_password_protected" value="1" <?php checked('1', get_option('mwpl_password_protected') ); ?>/></td>
			</tr>
			<?php
			if ( !get_site_option( 'mwpl_redirect_login' ) )
				update_site_option( 'mwpl_redirect_login', 'dashboard' );
			$reg = get_option( 'mwpl_redirect_login' );
			if (!get_option('mwpl_google_analytics'))
				update_option('mwpl_google_analytics',$mwpl_google_analytics);
			$google_registry = get_option('mwpl_google_analytics');
			
			?>
			<tr valign="top">
			<th scope="row"><?php _e( 'Redirect on login' ) ?></th>
			<td>
				<label><input name="mwpl_redirect_login" type="radio" id="redirect1" value="dashboard"<?php checked( $reg, 'dashboard') ?> /> <?php _e( 'Default Location. (<i>Dashboard is default</i>)' ); ?></label><br />
				<label><input name="mwpl_redirect_login" type="radio" id="redirect2" value="home"<?php checked( $reg, 'home') ?> /> <?php _e( 'Home Page.' ); ?></label><br />
				<label><input name="mwpl_redirect_login" type="radio" id="redirect3" value="profile"<?php checked( $reg, 'profile') ?> /> <?php _e( 'Profile Page.' ); ?></label><br />
				<label><input name="mwpl_redirect_login" type="radio" id="redirect4" value="custom"<?php checked( $reg, 'custom') ?> /> <?php _e( 'Custom Page. ' ); ?></label>
				<input style="width:400px;" type="text" name="mwpl_custom_redirect_page" value="<?php echo get_option('mwpl_custom_redirect_page'); ?>" /><br />
				<p><?php _e( 'Change the default redirect after a user logs in, to a different location in your blog.' ); ?></p>
			</td>
			</tr>
		</table>
		
		<h3><?php _e( 'Customize Login Page' ); ?></h3>
		<h5><i><?php _e( 'Warning: This part of the plugin uses javascript extensively to modify the WordPress login css file.  If you are worried about javascript being disabled this section is not for you.  Instead you could modify the plugins css file called memphis-wp-login.css in the plugin editor, which will have the same results.' ); ?></i></h5>
		<table class="form-table">
			<tr valign="top">
			<th scope="row"><?php _e('Enable Custom Login Page'); ?></th>
			<td>
				<input type="checkbox" name="mwpl_enable_custom_login" value="1" <?php checked('1', get_option('mwpl_enable_custom_login') ); ?>/>
			</td>
			</tr>
			<tr valign="top">
			<th scope="row"><?php _e('Background Color'); ?></th>
			<td>
				<label><input type="text" name="mwpl_custom_bgcolor" value="<?php echo get_option('mwpl_custom_bgcolor'); ?>" />  <i><?php _e('eg(#000000, #FFFFFF, #22FFCC, black, white, red)'); ?></i></label>
			</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Text Color'); ?></th>
				<td>
					<label><input type="text" name="mwpl_custom_textcolor" value="<?php echo get_option('mwpl_custom_textcolor'); ?>" />  <i><?php _e('eg(#000000, #FFFFFF, #22FFCC, black, white, red)'); ?></i></label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Link Colors'); ?></th>
				<td>
					<label><i><?php _e('Normal:'); ?></i><input type="text" name="mwpl_custom_linkcolor_normal" value="<?php echo get_option('mwpl_custom_linkcolor_normal'); ?>" /> </label>
					<label><i><?php _e('Hover:'); ?></i><input type="text" name="mwpl_custom_linkcolor_hover" value="<?php echo get_option('mwpl_custom_linkcolor_hover'); ?>" /></label>
				</td>
			</tr>
			<tr valign="top">
			<th scope="row"><?php _e('Form Width'); ?></th>
			<td>
				<label><input style="width:50px" type="text" name="mwpl_form_width" value="<?php echo get_option('mwpl_form_width'); ?>" /><?php _e('%') ?></label>
			</td>
			</tr>
			<tr valign="top">
			<th scope="row"><?php _e('Form Height'); ?></th>
			<td>
				<label><input style="width:50px" type="text" name="mwpl_form_height" value="<?php echo get_option('mwpl_form_height'); ?>" /><?php _e('%') ?></label>
			</td>
			</tr>
			<tr valign="top">
			<th scope="row"><?php _e('Form Offset Left/Right'); ?></th>
			<td>
				<label><input style="width:50px" type="text" name="mwpl_form_offset_lr" value="<?php echo get_option('mwpl_form_offset_lr'); ?>" /><?php _e('px') ?></label>
			</td>
			</tr>
			<tr valign="top">
			<th scope="row"><?php _e('Form Offset Top/Bottom'); ?></th>
			<td>
				<label><input style="width:50px" type="text" name="mwpl_form_offset_tb" value="<?php echo get_option('mwpl_form_offset_tb'); ?>" /><?php _e('px') ?></label>
			</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Hide Top Bar'); ?></th>
				<td>
					<input type="checkbox" name="mwpl_hide_top_bar" value="1" <?php checked('1', get_option('mwpl_hide_top_bar') ); ?>/>
				<td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php _e('Enable Form Background'); ?></th>
				<td>
					<input type="checkbox" name="mwpl_enable_form_bg" value="1" <?php checked('1', get_option('mwpl_enable_form_bg') ); ?>/>
				<td>
			</tr>
		</table>
	
	<div id="bgimage_box" class="postbox" style="display:none; margin: 10px; width:80%; clear:both;"><h3 class='' style="padding:10px; margin: 0px; cursor:default;"><span><?php _e('Background Images'); ?></span></h3>
		<div class="inside">
			<p><?php mwpl_get_bgimages() ?></p>
			<p  style="clear: both;"><br/></p>
			<form enctype="multipart/form-data" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
				<input style="margin: 0 0 15px 15px;" type="file" name="image" id="image"/>
				<input type="hidden" name="file_upload" value="add_file" />
				<input type="submit" class="upload-primary" value="<?php _e('Upload File') ?>" />
			</form>
		</div>
	</div>
	<?php
		if (!get_option('mwpl_google_analytics'))
		update_option('mwpl_google_analytics',$mwpl_google_analytics);
	$google_registry = get_option('mwpl_google_analytics');
	//var_dump($google_registry);
	?>
	
				<h3><?php _e( 'Google Analytics Support' ); ?></h3>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><?php _e('Enable Google Analytics'); ?></th>
						<td>
							<label><input type="checkbox" name="mwpl_google_analytics[enable_login]" value="1" <?php checked('1', $google_registry['enable_login'] ); ?>/> <?php _e('Login Page'); ?>&nbsp;&nbsp;&nbsp;</label>
							<label><input type="checkbox" name="mwpl_google_analytics[enable_admin]" value="1" <?php checked('1', $google_registry['enable_admin'] ); ?>/> <?php _e('Admin Pages'); ?>&nbsp;&nbsp;&nbsp;</label>
							<label><input type="checkbox" name="mwpl_google_analytics[enable_pages]" value="1" <?php checked('1', $google_registry['enable_pages'] ); ?>/> <?php _e('Everything Else'); ?>&nbsp;&nbsp;&nbsp;</label>
						<td>
					</tr>
					<tr valign="top">
						<th scope="row"></th>
						<td><label><i><?php _e('Your Goolge Analytics script can be found <a href=\'https://www.google.com/analytics/settings/\'>here</a>.');?></i></label></td>
					</tr>
					<tr>
						<th scope="row"><?php  _e('Google Analytics Script')?></th>
						<td>
							<textarea name="mwpl_google_analytics[google_script]" cols="60" rows="20"><?php echo $google_registry['google_script']; ?></textarea>
						</td>
					</tr>
				</table>
				<script>
					var value = jQuery(' :checkbox[name=mwpl_enable_form_bg]').is( ':checked');
					if(value) jQuery('#bgimage_box').css('display','block');
					jQuery(' :checkbox[name=mwpl_enable_form_bg]').click(function() {
						var value = jQuery(this).is( ':checked');
						if(value) jQuery('#bgimage_box').slideDown(500);
						else jQuery('#bgimage_box').slideUp(500);
					});
				</script>
			<p class="submit">
			<input style="margin:15px;" type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</p>
	</form>
<?php // WORK IN PROGRESS*** mwpl_css_editor(); ******////// ?>
</div>
<?php
}

function mwpl_get_bgimages() {
	$mwpl_bgimages = get_option('mwpl_custom_bgimage_list');
	array_multisort($mwpl_bgimages, SORT_DESC,SORT_NUMERIC);
	foreach($mwpl_bgimages as &$key) {
		mwpl_get_bgimage_div($key);
	}
	
}

function mwpl_get_bgimage_div($image) {
	$imageurl = $image['imageurl'];
	$imagepath = $image['imagepath'];
	$reg = get_option( 'mwpl_custom_bgimage' );
	$image = str_replace("\"","\'",serialize($image));
	$nonce= wp_create_nonce  ('my-nonce');
	?>
		<div class="mwpl_bg_container">
			<p class="mwpl_bg_container_header">
				<label class="mwpl_bg_container_label">
				<input name="mwpl_custom_bgimage" type="radio" id="<?php echo $imageurl; ?>" value="<?php echo $image; ?>"<?php checked( $reg, $image); ?> /> <?php _e( 'Make This Your Background.' ); ?>
				</label><br />
			</p>
			<div class="mwpl_image_container"><img src='<?php echo $imageurl; ?>'/></div>
			<p class="mwpl_bg_container_footer">
				<table>
					<tr valign="top">
					<td>
						<label class="mwpl_bg_container_label">
						  <span class='delete'><a class='submitdelete' onclick='return showNotice.warn();' href='<?php bloginfo('siteurl'); echo '/wp-admin/admin.php?page=memphis-custom-login.php&amp;_wpnonce='; ?><?php echo $nonce ?>&amp;action=delete&amp;file=<?php echo $imagepath; ?>'>Delete Permanently</a></span>
						   <br/>
						   <a class='submitdelete' href='<?php echo $imageurl; ?>'><?php _e('Download'); ?></a>
						</label>
					</td>
					</tr>
				</table>
			</p>
		</div>
	<?php   
}
?>
