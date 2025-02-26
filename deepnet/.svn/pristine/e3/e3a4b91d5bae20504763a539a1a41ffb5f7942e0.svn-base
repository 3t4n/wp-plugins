<?php
/**
 * @package Deepnet
 * @author Leonard Apeltsin
 * @version 1.0
 */
/*
Plugin Name: Deepnet
Plugin URI: http://deepnet.us/
Description: Insert custom selected Ads anywhere in any blog post. Search for Ads that best match your content in our Ad Database. Includes Amazon Associate Ads.
Author: Leonard Apeltsin
Version: 1.0
Author URI: http://deepnet.us/
*/



/***Begin Functions Pertaining to Deepnet Security ****/

//create hash-value differentiating blog 
function generate_deepnet_hash(){
      
	$result = "";
      	$charPool = '0123456789abcdefghijklmnopqrstuvwxyz';
      	for($p = 0; $p<20; $p++)
      	$result .= $charPool[mt_rand(0,strlen($charPool)-1)];
      	return md5(sha1($result));
}


//create options pertaining to unique blog hash value when installing plugin
function initialize_deepnet_options() {
      
       
	$hash = generate_deepnet_hash();
	add_option('deepnet_hash', $hash);
	add_option('deepnet_h_acceptance_status',0);
         

	//store current domain in variable which will be permanent domain identifier (in case blog is later shifted to a new domain)
	add_option('deepnet_domain',$_SERVER["SERVER_NAME"]);
        
        
       
}


//connect to deepnet when confirmation not present, register new blog, confirm registration
function connect_and_confirm(){

	$blog_hash = get_option('deepnet_hash');
	
	$blog_domain = get_option('deepnet_domain');
	
	$url = "http://deepnet.us/wordpress/register_blog.php";
	
	//set POST variables
	$fields = array(
			'hash' => urlencode($blog_hash),
			'domain' => urlencode($blog_domain)
			);

	foreach($fields as $key=>$value)
		$fields_string .= $key.'='.$value.'&';
	
	rtrim($fields_String,'&');
	
	//open connection
	$ch = curl_init();

	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POST,count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	//execute post
	$result = curl_exec($ch);
       	curl_close($ch);
 
        return $result;
}






//checks status. Sets cooke if registered Reconnects with with Deepnet if pending. Prints warning if denied
function check_confirmation_status() {

	$curr_status = get_option('deepnet_h_acceptance_status');
        
        //echo "Curr Status: $curr_status</br>";

	if($curr_status == 0) {
 

		//connect to deepnet
		$new_status = connect_and_confirm();

                
                $new_status = (int)$new_status;               
 
		if( ($new_status == -1) || ($new_status > 0)){

			$curr_status = $new_status;
			update_option('deepnet_h_acceptance_status',$new_status);
		}
	}	

	
		
	//blog connection denied because different hash exists for current blog domain in Deepnet DB
	if($curr_status == -1)
		echo '<p><b>WARNING. THIS BLOG HAS ALREADY BEEN REGISTERED WITH DEEPNET FROM A DIFFERENT SERVER. FOR SECURITY REASONS, PLEASE DEACTIVE THE DEEPNET PLUGIN AND CONTACT AND CONTACT THE PLUGIN ADMINISTRATOR FOR ADDITIONAL INFO. THANK YOU!</b></p>';

}
/**End Functions Pertaining to Deepnet Security ****/
add_action('admin_head', 'check_confirmation_status');


$front_page_links = array();

register_activation_hook(__FILE__,'initialize_deepnet_options');

add_filter('the_content','content_paragraph_filter',0);
add_action( 'template_redirect', 'start_deepnet',1 );


function content_paragraph_filter($content) {

    if(!is_front_page()){return $content;}
  
    global $id;
    global $front_page_links;

    $link = get_permalink($id);
    $front_page_links[] = $link;       



    $content_list = explode("\n",$content);
    
    $count = 1;

    $p = "<p class='content_p' title = '$link'>";
    $content_list[0] = $p.$content_list[0];

    for($i=1; $i<count($content_list); $i++) {

          $trimmed = trim($content_list[$i]);
          
          //blank line indicated a paragraph break
          if(strlen($trimmed) == 0) {
               
               $p = "<p class='content_p' title = '$link'>";
               $content_list[$i] = $p.$content_list[$i];
               $count += 1;
           }
     }      
                   
     $content = implode("\n",$content_list);
    
     
     return $content;
}
	
function start_deepnet() {

      global $front_page_links;

      //$x = implode("***",$front_page_links);

      if ( is_user_logged_in() ) { 
      
           $curr_status = get_option('deepnet_h_acceptance_status');
           $blog_hash = get_option('deepnet_hash');

          //blog registered in DB. Add security cookie for External Deepnet server
           if($curr_status > 0)
                  wp_enqueue_script('wp_cookie_link',"http://deepnet.us/wordpress/deepnet_cookie_set.php?&h=$blog_hash&id=$curr_status");

          if(is_front_page()) {

              
              //function not provided by IE
              wp_enqueue_script('wp_get_element_script','http://deepnet.us/wordpress/js_plugin_code/getElementsByClassName.js');

              wp_enqueue_script('wp_class_script','http://deepnet.us/wordpress/js_plugin_code/WP_Post.js');
              wp_enqueue_script('admin_script','http://deepnet.us/wordpress/js_plugin_code/admin_front.js',array('wp_class_script','wp_get_element_script'));
          }

          else
              wp_enqueue_script('admin_script','http://deepnet.us/wordpress/js_plugin_code/admin_multi.js');
       
      }

     else{
   
         wp_enqueue_script('wp_cookie_link',"http://deepnet.us/wordpress/deepnet_cookie_set.php?d=1");

         if(is_front_page()) {
               
               //function not provided by IE
              wp_enqueue_script('wp_get_element_script','http://deepnet.us/wordpress/js_plugin_code/getElementsByClassName.js');
               wp_enqueue_script('wp_class_script','http://deepnet.us/wordpress/js_plugin_code/WP_Post.js');
               wp_enqueue_script('visitor_script','http://deepnet.us/wordpress/js_plugin_code/visitor_front.js',array('wp_class_script','wp_get_element_script'));
          }
        
        else
               wp_enqueue_script('visitor_script','http://deepnet.us/wordpress/js_plugin_code/visitor_multi.js');
       
       }
      
}
?>