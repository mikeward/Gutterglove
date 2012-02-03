<?php 

// Uploading Thumbs for posts and pages

$metabox_thumb = array(

        	"image" => array (
            "name"        => "Image",
            "default"     => "",
            "label"     => "Preview Image",
            "type"         => "upload",
            "desc"      => "Upload file here..."
        ),
    );
    
function thumb_meta_box_content() {
    global $post, $metabox_thumb;
    
    $output = '';
    $output .= '<table class="metabox_thumb_table">'."\n";
    foreach ($metabox_thumb as $thumb_box) {   
	
       $output .= "\t".'<tr>';
       $output .= "\t\t".'<th class="thumb_box_names"><label for="'.$thumb_box.'">'.$thumb_box['label'].'</label></th>'."\n";
       $output .= "\t\t".'<td class="thumb_box_fields">'. thumb_uploader_custom_fields($post->ID,$thumb_box["name"],$thumb_box["default"],$thumb_box["desc"]);
       $output .= '</td>'."\n";
       $output .= "\t".'</tr>'."\n";
    }
    
    $output .= '</table>'."\n\n";
    echo $output;
}

function thumb_uploader_custom_fields($pID,$id,$std,$desc){
    $upload = get_post_meta( $pID, $id, true);
    $uploader = '';
    $uploader .= '<input class="thumb_input_text" name="'.$id.'" type="text" value="'.$upload.'" />';
    $uploader .= '<div class="clear"></div>'."\n";
    $uploader .= '<input type="file" name="attachement_'.$id.'" />';
    $uploader .= '<input type="submit" class="button button-highlighted" value="Save" name="save"/>';
    $uploader .= '<span class="thumb_box_desc">'.$desc.'</span></td>'."\n".'<td class="thumb_box_image"><a href="'. $upload .'"><img src="'.get_bloginfo('template_url').'/thumb.php?src='.$upload.'&w=150&h=80&zc=1" alt="" /></a>';

return $uploader;
}

function thumb_metabox_insert() {
    global $globals, $metabox_thumb;   
    $pID = $_POST['post_ID'];
	$upload_errors = array();
    
	if ($_POST['action'] == 'editpost'){
         foreach ($metabox_thumb as $thumb_box) { 
		 	
			$id = $thumb_box['name'];
		 	$override['action'] = 'editpost';
			if(!empty($_FILES['attachement_'.$id]['name'])) {
                $uploaded_file = wp_handle_upload($_FILES['attachement_' . $id ],$override); 
                $uploaded_file['option_name']  = $thumb_box['label'];
                $upload_errors[] = $uploaded_file;
                update_post_meta($pID, $id, $uploaded_file['url']);
            }
			elseif(empty( $_FILES['attachement_'.$id]['name']) && isset($_POST[ $id ])){
            	update_post_meta($pID, $id, $_POST[ $id ]); 
            }
			elseif($_POST[ $id ] == '')  { 
				delete_post_meta($pID, $id, get_post_meta($pID, $id, true));
            }
			update_option('thumb_upload_custom_errors',$upload_errors);
			
		 } // end foreach
	}
}


function thumb_meta_box() {
    if ( function_exists('add_meta_box') ) {
        add_meta_box('thumb-settings','Preview image','thumb_meta_box_content','post','normal');
        add_meta_box('thumb-settings','Preview image','thumb_meta_box_content','page','normal');
    }
}

function thumb_header_inserts(){
?>
<script type="text/javascript">

    jQuery(document).ready(function(){
        jQuery('form#post').attr('enctype','multipart/form-data');
        jQuery('form#post').attr('encoding','multipart/form-data');
        jQuery('.metabox_thumb_table th:last, .metabox_thumb_table td:last').css('border','0');
        var val = jQuery('input#title').attr('value');
        if(val == ''){ 
        jQuery('.thumb_box_fields .button-highlighted').after("<strong class='thumb_red_note'>Please add a Post Title before uploading a file</strong>");
        };
        <?php //Errors
		$error_occurred = false;
        $upload_errors = get_option('thumb_upload_custom_errors');
      	if(!empty($upload_errors)){
          $output = '<div style="clear:both;height:20px;"></div><div class="errors"><ul>' . "\n";
            foreach($upload_errors as $array )
            {
                 if(array_key_exists('error', $array)){
                        $error_occurred = true;
                        ?>
                        jQuery('form#post').before('<div class="updated fade"><p>Upload Error: <strong><?php echo $array['option_name'] ?></strong> - <?php echo $array['error'] ?></p></div>');
                        <?php
                }
            }
        }
        delete_option('thumb_upload_custom_errors');  ?>
    });

</script>

<?php
}
add_action('admin_menu', 'thumb_meta_box');
add_action('admin_head', 'thumb_header_inserts');
add_action('edit_post', 'thumb_metabox_insert');
?>