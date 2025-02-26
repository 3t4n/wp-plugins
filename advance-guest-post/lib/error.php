<?php
if(isset( $_POST['agp_upload_image_form_submitted'] ) && wp_verify_nonce($_POST['agp_upload_image_form_submitted'], 'agp_upload_image_form') ){  

    $result = agp_parse_file_errors($_FILES['agp_image_file'], $_POST['agp_image_caption'],$_POST['agp_image_content'],$_POST['agp_image_author']);
    
    if($result['error']){
    
     
    }else{
//post type, title, content, status,author submition process
 
								$posttype = get_option('posttype'); 
								$autopublish = get_option('autopublish');
      $user_image_data = array(
      	'post_title' => $result['caption'],
		'post_content'=> $result['content'],
        'post_status' => $autopublish,
		'post_author' => $current_user->ID, 
		'guest-author' => $_POST['agp_image_author'],
        'post_type' => $posttype    
      );
      
	
    // What happens when the CAPTCHA was entered incorrectly
	 
      if($post_id = wp_insert_post($user_image_data)){
      
        agp_process_image('agp_image_file', $post_id, $result['caption'], $result['content'], $result['author']);
      //wordpress category submission 
	  $posttaxonomies = get_option('posttaxonomies');
        wp_set_object_terms($post_id, (int)$_POST['category'], '$posttaxonomies');
		//wordpress authour custom filed submission 
         update_post_meta($post_id, 'guest-author', $_POST['agp_image_author']);
      } 
    }
  }  
  
   $result = agp_parse_file_errors($_FILES['agp_image_file'], $_POST['agp_image_caption'],$_POST['agp_image_content'],$_POST['agp_image_author']);
    
    if($result['error']){
    echo 'sent';

    
    }else{
//post type, title, content, status,author submition process

      echo 'failed';
	}

?>