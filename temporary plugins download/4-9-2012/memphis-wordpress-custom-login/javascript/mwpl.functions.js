function mwpl_Edit_Login($custom_link, $custom_message, custom_message_type) {
    if($custom_link != '') {
	$custom_link = $custom_link.replace(/http:\/\//g, '');
	jQuery("#login h1 a").attr("href", "http://"+$custom_link);
    }

    if($custom_message != '') {
	if(custom_message_type == '1') jQuery("body").append('<p id="login_error" class="mwpl-custom-msg">'+$custom_message+'<p>');
	else jQuery("body").append('<p class="mwpl-custom-msg message">'+$custom_message+'<p>');
	
	jQuery('.mwpl-custom-msg').delay(500).fadeIn(600);
    }

}