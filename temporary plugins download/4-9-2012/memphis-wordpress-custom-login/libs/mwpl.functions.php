<?php
function mwpl_find_bgimages($path, $pattern, $callback) {
  $path = rtrim(str_replace("\\", "/", $path), '/') . '/*';
  foreach (glob ($path) as $fullname) {
    if (is_dir($fullname)) {
      mwpl_find_bgimages($fullname, $pattern, $callback);
    } else if (preg_match($pattern, $fullname)) {
      call_user_func($callback, $fullname);
    }
  }
}

function mwpl_update_registry($input) {
	global $mwpl_google_analytics;
	$registry = get_option('mwpl_google_analytics');
	if($registry != '') {
	foreach ($mwpl_google_analytics  as $option => $option_value) {
		if($input[$option]) {
			//echo "value: " .$input[$option]."<br/>";
			$registry[$option] = $input[$option]; }
		else $registry[$option] = $mwpl_google_analytics[$option];
	}
	//print_r($input);
	return $registry;
	} else return $mwpl_google_analytics;
}

function mwpl_init_google_analytics() {
  $google_reg = get_option('mwpl_google_analytics');
  echo $google_reg['google_script'];
}

/*  UNUSED OLD CODE STILL MIGHT USE AGAIN MAYBE??? MAYBE NOT???
function mwpl_bgimages_results($bgimage) {
	global $mwpl_bgimages;
	$uploads = wp_upload_dir();
	$upload_baseurl = $uploads['baseurl'];
	$upload_basedir = $uploads['basedir'];
	if(is_multisite()) $bgimage_url = $upload_baseurl.substr($bgimage,strpos($bgimage,'/files/')+6);
	else $bgimage_url = $upload_baseurl.substr($bgimage,strpos($bgimage,'/uploads/')+9);
	//echo "File: " . file_exists($bgimage_url);
	//if(file_exists($bgimage_url)) {
	  echo $bgimage."<br>";
	  echo $upload_basedir."<br>";
	  echo $upload_baseurl."<br>";
	  //list($width, $height, $type, $attr) = getimagesize($bgimage_url);
	  array_push($mwpl_bgimages, array(
									   imageurl=>$bgimage_url,
									   imagepath=>$bgimage,
									   width=>$width,
									   height=>$height,
									   type=>$type,
									   attr=>$attr
									   ));
	//} else array_push($mwpl_bgimages, 'file not found');
}
*/
//$uploads = wp_upload_dir();
//$upload_baseurl = $uploads['baseurl'];
//echo $uploads['basedir']."<br>";
//if(is_multisite()) mwpl_find_bgimages($uploads['basedir'], '/mwpl-bgimage/', 'mwpl_bgimages_results');
//else mwpl_find_bgimages($uploads['basedir'], '/mwpl-bgimage/', 'mwpl_bgimages_results');
/*
function mwpl_css_editor() {
	$file = MWPL_PLUGIN_URL_DASHBOARD.'css/memphis-wp-login.css';
	$plugin = MWPL_PLUGIN_URL_DASHBOARD;
	$editor = MWPL_PLUGIN_URL_DASHBOARD.'/libs/mwpl.editor.php';
	update_recently_edited($file);

	if ( !is_file($file) )
		$error = 1;

	if ( !$error && filesize($file) > 0 ) {
		$f = fopen($file, 'r');
		$content = fread($f, filesize($file));

		if ( '.php' == substr( $file, strrpos( $file, '.' ) ) ) {
			$functions = wp_doc_link_parse( $content );

			$docs_select = '<select name="docs-list" id="docs-list">';
			$docs_select .= '<option value="">' . esc_attr__( 'Function Name...' ) . '</option>';
			foreach ( $functions as $function ) {
				$docs_select .= '<option value="' . esc_attr( urlencode( $function ) ) . '">' . htmlspecialchars( $function ) . '()</option>';
			}
			$docs_select .= '</select>';
		}

		$content = htmlspecialchars( $content );
	}
	?>
	<form name="template" id="template" action="plugin-editor.php" method="post">
	<?php wp_nonce_field('edit-plugin_' . $file) ?>
		<div><textarea cols="70" rows="25" name="newcontent" id="newcontent" tabindex="1"><?php echo $content ?></textarea>
		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="file" value="<?php echo esc_attr($file) ?>" />
		<input type="hidden" name="plugin" value="<?php echo esc_attr($plugin) ?>" />
		<input type="hidden" name="scrollto" id="scrollto" value="<?php echo $scrollto; ?>" />
		</div>
		<?php if ( !empty( $docs_select ) ) : ?>
		<div id="documentation" class="hide-if-no-js"><label for="docs-list"><?php _e('Documentation:') ?></label> <?php echo $docs_select ?> <input type="button" class="button" value="<?php esc_attr_e( 'Lookup' ) ?> " onclick="if ( '' != jQuery('#docs-list').val() ) { window.open( 'http://api.wordpress.org/core/handbook/1.0/?function=' + escape( jQuery( '#docs-list' ).val() ) + '&amp;locale=<?php echo urlencode( get_locale() ) ?>&amp;version=<?php echo urlencode( $wp_version ) ?>&amp;redirect=true'); }" /></div>
		<?php endif; ?>
<?php if ( is_writeable($file) ) : ?>
	<?php if ( in_array( $file, (array) get_option( 'active_plugins', array() ) ) ) { ?>
		<p><?php _e('<strong>Warning:</strong> Making changes to active plugins is not recommended.  If your changes cause a fatal error, the plugin will be automatically deactivated.'); ?></p>
	<?php } ?>
	<p class="submit">
	<?php
		if ( isset($_GET['phperror']) )
			echo "<input type='hidden' name='phperror' value='1' /><input type='submit' name='submit' class='button-primary' value='" . esc_attr__('Update File and Attempt to Reactivate') . "' tabindex='2' />";
		else
			echo "<input type='submit' name='submit' class='button-primary' value='" . esc_attr__('Update File') . "' tabindex='2' />";
	?>
	</p>
<?php else : ?>
	<p><em><?php _e('You need to make this file writable before you can save your changes. See <a href="http://codex.wordpress.org/Changing_File_Permissions">the Codex</a> for more information.'); ?></em></p>
<?php endif; ?>
</form>
<?php
}
*/
?>