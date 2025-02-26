<?php
	if ( ! defined( 'ABSPATH' ) ) exit;
	function itls_logo_showcase_get_google_fonts($selected=''){
		require ITLS_LOGO_SHOWCASE_ROOT_DIR.'/includes/google-fonts.php';
		$font_options='';
		foreach($fonts_array as $key=>$value){
			$font_options.='<option '.selected($selected,$key,0).' value="'.$key.'">'.$value.'</option>';
		}
		return $font_options;
	}

	function itls_logo_showcase_metaboxname() {
		global $itls_logo_showcase_metaboxname_fields, $post;
		// Use nonce for verification  
		$html= '<input type="hidden" name="show_custom_meta_box_logo_showcase_grid_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
			  
			// Begin the field table and loop  
			$html.= '<table class="form-table">';  
			foreach ($itls_logo_showcase_metaboxname_fields as $field) {
			
				if(isset($field['dependency']))  
				{
					$html.=itls_logo_showcase_dependency($field['id'],$field['dependency']);
				}
				
				// get value of this field if it exists for this post  
				$meta = get_post_meta($post->ID, $field['id'], true);  

				// begin a table row with 
				if($field['type']=='hidden')
				{
					$html.= '<input type="hidden" name="'.$field['id'].'" id="'.$field['id'].'" value="product" />';
					continue;
				}
				
				// begin a table row with  
				$style='';
				
				if($field['type']=='notype')
					$style='style="border-bottom:solid 1px #ccc"';
					
				$html.= '<tr class="'.$field['id'].'_field" '.$style.'>  

						<th><label for="'.$field['id'].'">'.$field['label'].'</label></th> 
						<td>';  
						switch($field['type']) {

                            case 'html_editor':
                            {
                                ob_start();
                                $html.= '
                                   <p><span class="description">'.$field['desc'].'</span></p>
                                   <p class="form-field product_field_type" >';
                                $editor_id =$field['id'];
                                wp_editor( $meta, $editor_id );
                                $html.= ob_get_clean();
                                $html.='</p>';
                            }
                                break;

                            case 'textarea':

                                $html.= '<textarea style="width:100%;" name="'.$field['id'].'" id="'.$field['id'].'" >'.$meta.'</textarea>
								<br /><span class="description">'.$field['desc'].'</span>	';
                                break;

                            case 'url':

                                $html.= '<input type="url" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" />
								<br /><span class="description">'.$field['desc'].'</span>	';
                                break;
                            case 'email':

                                $html.= '<input type="email" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" />
								<br /><span class="description">'.$field['desc'].'</span>	';
                                break;

							case 'text':  
	
								$html.= '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" />
								<br /><span class="description">'.$field['desc'].'</span>	';  
							break; 
							
							case 'hidden':  
	
								$html.= '<input type="hidden" name="'.$field['id'].'" id="'.$field['id'].'" value="product" />';  
							break; 
							
							case 'radio':  
								foreach ( $field['options'] as $option ) {
									$html.= '<input type="radio" name="'.$field['id'].'" value="'.$option['value'].'" '.checked( $meta, $option['value'] ,0).' '.$option['checked'].' /> 
											<label for="'.$option['value'].'">'.$option['label'].'</label><br><br>';  
								}  
							break;
							
							case 'select':  
								$html.= '<select name="'.$field['id'].'" id="'.$field['id'].'" style="width: 170px;">';  
								foreach ($field['options'] as $option) {  
									$html.= '<option '. selected( $meta , $option['value'],0 ).' value="'.$option['value'].'">'.$option['label'].'</option>';  
								}  
								$html.= '</select><br /><span class="description">'.$field['desc'].'</span>';  
							break;
							
							case 'numeric':  
								$default_value=(isset($field['value'])? $field['value']:"");
								$html.= '
								<input type="number" name="'.$field['id'].'" id="'.$field['id'].'" value="'.($meta=='' ? $default_value:$meta).'" size="30" class="width_170" min="0" pattern="[-+]?[0-9]*[.,]?[0-9]+" title="Only Digits!" class="input-text qty text" />
	';
								$html.= '
									<br /><span class="description">'.$field['desc'].'</span>';  
							break;
							
							case 'checkbox':  
								$html.= '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" '.checked( $meta, "on" ,0).'"/> 
									<br /><span class="description">'.$field['desc'].'</span>';  
							break;
							
							case 'radio':  
								foreach ( $field['options'] as $option ) {
									$html.= '<input type="radio" name="'.$field['id'].'" value="'.$option['value'].'" '.checked( $meta, $option['value'] ,0).' '.$option['checked'].' /> 
											<label for="'.$option['value'].'">'.$option['label'].'</label><br><br>';  
								}  
							break;

							
							case "upload":
							{
								$image='';
								$image = ITLS_LOGO_SHOWCASE_URL.'/assets/images/it-transparent.gif';
								$html.= '<input name="'.$field['id'].'" id="'.$field['id'].'" type="hidden" class="custom_upload_image" value="'.(isset($meta) ? $meta:'').'" />
										<input name="btn_'.$field['id'].'" class="itls_logo_showcase_upload_image_button button" type="button" value="'.__('Choose Video',ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'" />
										<button type="button" class="itls_logo_showcase_remove_image_button button">'.__('Remove Video',ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</button>
										<div class="custom_preview_video" >'.basename(wp_get_attachment_url($meta)).'</div>';
							}
							break;
							
							case "gallery":
							{
								$image='';
								$image = ITLS_LOGO_SHOWCASE_URL.'/assets/images/it-transparent.gif'; 
								
								if ($meta) { 
									$image_gallery=explode(",",$meta);
									$images='';
									foreach($image_gallery as $ima){
										$image = wp_get_attachment_image_src($ima, 'medium'); 
										$image = $image[0]; 
										$images.='
										<div style="float:left">
											<div class="del_imagegallery">X</div>
											<img src="'.$image.'" class="custom_preview_imagegallery" width="100" height="100" data-id="'.$ima.'"/>
										</div>
										';
									}
									$image=$images;
								
								}else
								{
									$image='';
									
								}
								$html.= '<input name="'.$field['id'].'" id="'.$field['id'].'" type="hidden" class="custom_upload_imagegallery" value="'.(isset($meta) ? $meta:'').'" /> 
								<input name="btn_'.$field['id'].'" class="itls_logo_showcase_upload_imagegallery_button button" type="button" value="'.__('Choose Images',ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'" />
								<button type="button" class="itls_logo_showcase_remove_imagegallery_button button">'.__('Remove image',ITLS_LOGO_SHOWCASE_TEXTDOMAIN).'</button>
								<div id="itls_logo_showcase_upload_imagegallery_items">'.$image.'</div>';  
							}
							break;

		
						} //end switch  
				$html.= '</td></tr>';  
			} // end foreach  
			$html.= '</table>'; // end table  
			echo $html;
	}
	
	
	function itls_logo_showcase_save_custom_meta ($post_id) {
		//die(print_r($_POST));
		global $itls_logo_showcase_metaboxname_fields;
		// verify nonce
		if(isset($_POST) && !empty($_POST)){
			if (isset($_POST['show_custom_meta_box_logo_showcase_grid_nonce']) && !wp_verify_nonce($_POST['show_custom_meta_box_logo_showcase_grid_nonce'], basename(__FILE__)))
				return $post_id;
		
		// check autosave  
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
				return $post_id;  
			// check permissions  
			if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {  
				if (!current_user_can('editls_page', $post_id))  
					return $post_id;  
				} elseif (!current_user_can('editls_post', $post_id)) {  
					return $post_id;  
			}  
			
			foreach ($itls_logo_showcase_metaboxname_fields as $field) {
				
				if(!isset($_POST[$field['id']])){
					delete_post_meta($post_id, $field['id']);  
					continue;
				}

				$post = get_post($post_id);
				$category = $_POST[$field['id']];  
				wp_set_post_terms( $post_id, $category, $field['id'],false );

				$old = get_post_meta($post_id, $field['id'], true);  
				$new = $_POST[$field['id']];  
				if ('' == $new && ($old||$old==0)) {  
					delete_post_meta($post_id, $field['id'], $old);  
				}elseif (($new ||$new==0) && $new != $old) {  
					update_post_meta($post_id, $field['id'], $new);  
				} 
	
			} // end foreach  

		}		
	
		
	} 
	 
	add_action('save_post', 'itls_logo_showcase_save_custom_meta');
?>
