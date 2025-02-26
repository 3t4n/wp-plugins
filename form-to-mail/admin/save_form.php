<?php
function ftm_save_form( $post_id, $post ) {
	if ( !isset( $_POST['ftm_content'] ))
        return $post_id;
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;
	if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;
	if ($post->post_type == 'ftm_form') { // укажите собственный
		$names = $_POST['ftm_content']['name'];
		$labels = $_POST['ftm_content']['label'];
		$types = $_POST['ftm_content']['type'];
		$requireds = $_POST['ftm_content']['required'];
		$content = [];
		if(is_array($names)){
			foreach($names as $key => $name){
				if(!empty($name)){
					$field = [
						'label' => sanitize_text_field($labels[$key]),
						'name' => sanitize_text_field($names[$key]),
						'type' => sanitize_text_field($types[$key]),
						'required' => sanitize_text_field($requireds[$key]),
					];
					$content[] = $field;
				}
			}
		}
		$content_json = sanitize_text_field(json_encode($content, JSON_UNESCAPED_UNICODE));
		$post->post_content = $content_json;
		remove_action( 'save_post', 'ftm_save_form' );
		wp_update_post($post);
		update_post_meta( $post_id, 'ftm_form_id', sanitize_meta('ftm_form_id',$_POST['ftm_form_id'],'post'));
		update_post_meta( $post_id, 'ftm_send_email', sanitize_email($_POST['ftm_send_email']));
		update_post_meta( $post_id, 'ftm_from_email', sanitize_email($_POST['ftm_from_email']));
		add_action( 'save_post', 'ftm_save_form' );
	}
	return $post_id;
}
add_action('save_post', 'ftm_save_form', 10 , 2);