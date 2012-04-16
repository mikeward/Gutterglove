<?php
//  CLEAN UP PLUGIN
unregister_setting('mwpl-settings-group1', 'mwpl_password_protected');
unregister_setting( 'mwpl-settings-group1','mwpl_redirect_login');
unregister_setting('mwpl-settings-group1','mwpl_custom_redirect_page');
unregister_setting('mwpl-settings-group2','mwpl_custom_bgcolor');
unregister_setting('mwpl-settings-group2','mwpl_custom_textcolor');
unregister_setting('mwpl-settings-group2','mwpl_custom_linkcolor_normal');
unregister_setting('mwpl-settings-group2','mwpl_custom_linkcolor_hover');
unregister_setting('mwpl-settings-group2','mwpl_enable_custom_login');
unregister_setting('mwpl-settings-group2','mwpl_enable_form_bg');
//KEEP IMAGE REFERENCE AROUND
//unregister_setting('mwpl-settings-group2','mwpl_custom_bgimage_list');
unregister_setting('mwpl-settings-group2','mwpl_custom_bgimage');
unregister_setting('mwpl-settings-group2','mwpl_form_width');
unregister_setting('mwpl-settings-group2','mwpl_hide_top_bar');
unregister_setting('mwpl-settings-group3','mwpl_google_analytics');
//Version 2.0
unregister_setting('mwpl-settings-group2','mwpl_remove_text_shadow');
unregister_setting('mwpl-settings-group1','mwpl_hide_login_messages');
unregister_setting('mwpl-settings-group1','mwpl_hide_lost_password');
unregister_setting('mwpl-settings-group2', 'mwpl_form_bg_color');
unregister_setting('mwpl-settings-group2', 'mwpl_form_border_color');
unregister_setting('mwpl-settings-group2', 'mwpl_form_border_radius');
unregister_setting('mwpl-settings-group2', 'mwpl_form_box_shadow_right');
unregister_setting('mwpl-settings-group2', 'mwpl_form_box_shadow_top');
unregister_setting('mwpl-settings-group2', 'mwpl_form_box_shadow_softness');
unregister_setting('mwpl-settings-group2', 'mwpl_form_box_shadow_color');
unregister_setting('mwpl-settings-group2', 'mwpl_logo_link');
unregister_setting('mwpl-settings-group2', 'mwpl_custom_message');
unregister_setting('mwpl-settings-group2', 'mwpl_custom_message_alert');

delete_option('mwpl_password_protected');
delete_option('mwpl_redirect_login');
delete_option('mwpl_custom_redirect_page');
delete_option('mwpl_custom_bgcolor');
delete_option('mwpl_custom_textcolor');
delete_option('mwpl_custom_linkcolor_normal');
delete_option('mwpl_custom_linkcolor_hover');
delete_option('mwpl_enable_custom_login');
delete_option('mwpl_enable_form_bg');
delete_option('mwpl_custom_bgimage');
//KEEP IMAGE REFERENCE AROUND
//delete_option('mwpl_custom_bgimage_list');
delete_option('mwpl_form_offset_tb');
delete_option('mwpl_form_offset_lr');
delete_option('mwpl_form_width');
delete_option('mwpl_form_height');
delete_option('mwpl_hide_top_bar');
delete_option('mwpl_bl_offset_tb');
delete_option('mwpl_bl_offset_lr');
delete_option('mwpl_google_analytics');
//Version 2.0
delete_option('mwpl_remove_text_shadow');
delete_option('mwpl_hide_login_messages');
delete_option('mwpl_hide_lost_password');
delete_option('mwpl_form_bg_color');
delete_option('mwpl_form_border_color');
delete_option('mwpl_form_border_radius');
delete_option('mwpl_form_box_shadow_right');
delete_option('mwpl_form_box_shadow_top');
delete_option('mwpl_form_box_shadow_softness');
delete_option('mwpl_form_box_shadow_color');
delete_option('mwpl_custom_message');
delete_option('mwpl_logo_link');
delete_option('mwpl_custom_message_alert');
delete_option('mwpl_admin_notice_00000001');
//Version 2.0.1
delete_option('mwpl_upload_error');
?>