<?php 

//size of image
$imagesize = get_option('imagesize'); 
if ( isset($imagesize[0])) { define('MAX_UPLOAD_SIZE', ''.$imagesize.'000000'); } else { define('MAX_UPLOAD_SIZE', 2000000); }

define('TYPE_WHITELIST', serialize(array(
  'image/jpeg',
  'image/png',
  'image/gif'
  )));

//alow wordpress guest post
add_filter( 'the_author', 'guest_author_name' );
add_filter( 'get_the_author_display_name', 'guest_author_name' );

function guest_author_name( $name ) {
global $post;
$author = get_post_meta( $post->ID, 'guest-author', true );
if ( $author )
$name = $author;

return $name;
}

//shortocde for the plugin
add_shortcode('advance_guest_post', 'agp_form_shortcode');

//shortocde function
function agp_form_shortcode(){
$guestpost = get_option('guestpost'); 
  if ($guestpost == 'disable') {       if(!is_user_logged_in()){  
        
        include ('login.php');      
		return $out;     
      
      }  
      
      global $current_user;  } else {    }  
	  

    
  if(isset( $_POST['agp_upload_image_form_submitted'] ) && wp_verify_nonce($_POST['agp_upload_image_form_submitted'], 'agp_upload_image_form') ){  

    $result = agp_parse_file_errors($_FILES['agp_image_file'], $_POST['agp_image_caption'],$_POST['agp_image_content'],$_POST['agp_image_author'],$_POST['excerpt'],$_POST['tags']);
    
    if($result['error']){
		
			  echo'<div class="error">';
	       echo '<p>ERROR: ' . $result['error'] . '</p>';
	   echo'</div>';
 
    }else{
//post type, title, content, status,author submition process
$enablecaptcha = get_option('enablecaptcha');
  if ($enablecaptcha == 'disable') {  
  $successmessage = get_option('successmessage');
  echo'<div class="success">';
  echo $successmessage;
  echo'</div>';
	  $posttype = get_option('posttype'); 
	  $autopublish = get_option('autopublish');
      $user_image_data = array(
      	'post_title' => $result['caption'],
		'post_content'=> $_POST['agp_image_content'],
		'post_excerpt' => $_POST['excerpt'],
        'post_status' => $autopublish,
		'post_author' => $current_user->ID, 
		'guest-author' => $_POST['agp_image_author'],
		'tags_input'    => $_POST['tags'],
        'post_type' => $posttype    
      );
      
	
    // What happens when the CAPTCHA was entered incorrectly
	 
      if($post_id = wp_insert_post($user_image_data)){
      
	       $galleryimagesuploadid = $_POST['featured_preview_input'];
        update_post_meta($post_id, '_thumbnail_id', $galleryimagesuploadid);
		
      //wordpress category submission 
	    $posttaxonomies = get_option('posttaxonomies');
	    $posttags = get_option('posttags'); 
	    $tags = array($_POST['tags']);
		$post_category = (isset($_POST['category'])) ? array_filter((array) $_POST['category']) : array();
	    $posttaxonomies = get_option('posttaxonomies');
	    if ( 'enable' == $multicategory ) {
        wp_set_object_terms($post_id, $post_category, $posttaxonomies);
		}
		else 
		{
		wp_set_object_terms($post_id, (int)$_POST['category'], $posttaxonomies);	
		}
		//wordpress authour custom filed submission 
         update_post_meta($post_id, 'guest-author', $_POST['agp_image_author']);
		 wp_set_post_terms( $post_id, $tags, $posttags);
      }  } else { 
require_once('recaptchalib.php');
 $captchaprivatekey = get_option('captchaprivatekey');
$privatekey = $captchaprivatekey;
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
	  echo'<div class="error">';
	 echo "The reCAPTCHA wasn't entered correctly. try it again.";
	   echo'</div>';
  } else {
	    $successmessage = get_option('successmessage');
  echo'<div class="success">';
  echo $successmessage;
  echo'</div>';
	  $posttype = get_option('posttype'); 
	  $autopublish = get_option('autopublish');
      $user_image_data = array(
      	'post_title' => $result['caption'],
		'post_content'=> $_POST['agp_image_content'],
		'post_excerpt' => $_POST['excerpt'],
        'post_status' => $autopublish,
		'post_author' => $current_user->ID, 
		'guest-author' => $_POST['agp_image_author'],
		'tags_input'    => $_POST['tags'],
        'post_type' => $posttype    
      );
      
	
    // What happens when the CAPTCHA was entered incorrectly
	 
      if($post_id = wp_insert_post($user_image_data)){
      
	    $galleryimagesuploadid = $_POST['featured_preview_input'];
        update_post_meta($post_id, '_thumbnail_id', $galleryimagesuploadid);
      //wordpress category submission 
	    $posttaxonomies = get_option('posttaxonomies');
	    $posttags = get_option('posttags'); 
	    $tags = array($_POST['tags']);
		$post_category = (isset($_POST['category'])) ? array_filter((array) $_POST['category']) : array();
	    $posttaxonomies = get_option('posttaxonomies');
	    if ( 'enable' == $multicategory ) {
        wp_set_object_terms($post_id, $post_category, $posttaxonomies);
		}
		else 
		{
		wp_set_object_terms($post_id, (int)$_POST['category'], $posttaxonomies);	
		}
		//wordpress authour custom filed submission 
         update_post_meta($post_id, 'guest-author', $_POST['agp_image_author']);
		 wp_set_post_terms( $post_id, $tags, $posttags);
      } 
	   }
    }
  }
  
  }  

  if (isset( $_POST['agp_form_delete_submitted'] ) && wp_verify_nonce($_POST['agp_form_delete_submitted'], 'agp_form_delete')){

    if(isset($_POST['agp_image_delete_id'])){
    
      if($post_deleted = agp_delete_post($_POST['agp_image_delete_id'])){        
      
        echo '<p>' . $post_deleted . ' images(s) deleted!</p>';
        
      }
    }
  }
  
ob_start();
  echo agp_get_upload_image_form($agp_image_caption = $_POST['agp_image_caption'], $category = $_POST['category'], $agp_image_content = $_POST['agp_image_content'], $agp_image_author = $_POST['agp_image_author']);
  $editor_contents = ob_get_clean();

// Return the content you want to the calling function
return $editor_contents; 


}


// wordpress image upload function
function agp_process_image($file, $post_id, $caption){
 
  require_once(ABSPATH . "wp-admin" . '/includes/image.php');
  require_once(ABSPATH . "wp-admin" . '/includes/file.php');
  require_once(ABSPATH . "wp-admin" . '/includes/media.php');
 
  $attachment_id = media_handle_upload($file, $post_id);
 
  update_post_meta($post_id, '_thumbnail_id', $attachment_id);

  $attachment_data = array(
  	'ID' => $attachment_id,
    'post_excerpt' => $caption
  );
  
  wp_update_post($attachment_data);

  return $attachment_id;

}




//this is error when any filed are empty
function agp_parse_file_errors($file = '', $image_caption, $image_content, $image_author){
   if ( 'require' == $featurerequire ) { 

  $result = array();
  $result['error'] = 0;

  if($file['error']){
  
    $result['error'] = "No file uploaded or there was an upload error!";
    
    return $result;
  } else {  }
  }



 
  $posttitleenabledisables = get_option('posttitleenabledisables'); 
  $postdiscriptionenabledisable = get_option('postdiscriptionenabledisable');
  $postauthorenabledisable  = get_option('postauthorenabledisable');
  $postcategoryenabledisable = get_option('postcategoryenabledisable');
  $uploadimageenabledisable = get_option('uploadimageenabledisable');
  $productshortdiscription = get_option('productshortdiscription');
  $posttile = get_option('posttitle');
  $postdiscription = get_option('postdiscription');
  $postcategory= get_option('postcategory');
  $uploadimage= get_option('uploadimage');
  $producttags = get_option('producttags');
  $postauthor = get_option('postauthor');
  $postcategory= get_option('postcategory');
  $uploadimage= get_option('uploadimage');
  $titlerequire = get_option('titlerequire'); 
  $discriptionrequire = get_option('discriptionrequire'); 
  $categoryrequire = get_option('categoryrequire'); 
  $featurerequire = get_option('featurerequire'); 
  $tagsrequire = get_option('tagsrequire'); 
  $expertrequire = get_option('expertrequire'); 

  
if ( 'require' == $titlerequire ) {  
 
 $image_caption = trim(preg_replace('/[^a-zA-Z0-9\s]+/', ' ', $image_caption));
  
  if($image_caption == ''){

    $result['error'] = "Please enter ".$posttile."";
    
    return $result;
  
  }  }  else { }
  
  if ( 'require' == $discriptionrequire ) { 
  
   $image_content = trim(preg_replace('/[^a-zA-Z0-9\s]+/', ' ', $image_content));
  
  if($image_content == ''){

    $result['error'] = "please enter ".$postdiscription."";
    
    return $result;
  
  }   }   else { }
  
  
    if ( 'require' == $categoryrequire ) { 
 $category = $_POST['category'];
 
  if($category  == ''){

    $result['error'] = "please enter ".$postcategory."";
    
    return $result;
  
  } 
  }
  else {
	  
  }
  
    
      if ( 'require' == $tagsrequire ) { 
 $tags = $_POST['tags'];
 
  if($tags  == ''){

    $result['error'] = "please enter ".$producttags."";
    
    return $result;
  
  } 
  }
  else {
	  
  }
  
        if ( 'require' == $expertrequire ) { 
 $excerpt = $_POST['excerpt'];
 
  if($excerpt  == ''){

    $result['error'] = "please enter ".$productshortdiscription."";
    
    return $result;
  
  } 
  }
  else {
	  
  }
  
    if ($postauthorenabledisable == 'disable') { } else { 
  $image_author = trim(preg_replace('/[^a-zA-Z0-9\s]+/', ' ', $image_author));
  
  if($image_author == ''){

    $result['error'] = "Please enter ".$postauthor."";
    
    return $result;
  
  }  }
  
  $result['caption'] = $image_caption;  
  
  $result['content'] = $image_content;  
  
  $result['author'] = $image_author; 

       for($i=0; $i<count($_FILES['agp_image_file']['name']); $i++) {
  //Get the temp file path
        $tmpFilePaths = $_FILES['agp_image_file']['tmp_name'][$i];
  
           if ($tmpFilePaths == "") {
			   
		   }
		   
		   else {
			   
			       $image_data = getimagesize($file['tmp_name']);
				   
			     if(!in_array($image_data['mime'], unserialize(TYPE_WHITELIST))){


    $result['error'] = 'Your image must be a jpeg, png or gif!';

  } 
  
  elseif(($file['size'] > MAX_UPLOAD_SIZE)){


    $result['error'] = 'Your image was ' . $file['size'] . ' bytes! It must not exceed ' . MAX_UPLOAD_SIZE . ' bytes.';
    
 } 
		   }
		   
	   }
    
  return $result;

}


//this code help to show form in front end 

function agp_get_upload_image_form($agp_image_caption = '', $category = 0){


 ?>
<?php include ('form.php'); ?>
  <?php 
  
  
}
//above category dropdown from custom post type
function agp_get_image_categories_dropdown($taxonomy, $selected){

  return wp_dropdown_categories(array('taxonomy' => $taxonomy, 'name' => 'category', 'selected' => $selected, 'hide_empty' => 0, 'echo' => 0));

}

?>