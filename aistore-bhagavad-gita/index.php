<?php
/*
Plugin Name: Aistore Bhagavad Gita
Plugin URI: #
Author: susheelhbti
Author URI: http://www.aistore2030.com/
Description: You can publish Bhagavad Gita Chapters on your wordpress website.  
Version:  1.0
*/

include_once dirname(__FILE__) . '/AistoreChapters.class.php';
// include_once dirname(__FILE__) . '/widget.php';

add_shortcode('AistoreBhagavadGita', array(
    'AistoreChapters',
    'aistore_chapters'
));


 

  add_action('admin_init', 
            'ABG_page_register_setting'
        );
      
      
      
      
        function ABG_page_register_setting()
    {
        //register our settings
        register_setting('aistore_page', 'add_section_page_id');
        
    }
    
    
    
    
        
function ABG_wpdocs_register_gita_menu_page(){
    add_menu_page( 
        __( 'Bhagavad Gita ', 'aistore' ),
        'Bhagavad Gita ',
        'manage_options',
        'gita_setting',
        'ABG_menu_page',
      '',
        6
    ); 
}

add_action( 'admin_menu', 'ABG_wpdocs_register_gita_menu_page');
 
 
//register_activation_hook(__FILE__, 'ABG_download_assets');



/**
 * Display a custom menu page
 */
function ABG_download_assets(){
     $folder_name = dirname(__FILE__);
     
 
    
   // Initialize a file URL to the variable
    $url = 
    'https://bhagvadgita.blogentry.in/aistore-bhagavad-gita/gitadata.zip';
      
    // Use basename() function to return the base name of file
    $file_name = $folder_name .'/'. basename($url);
      
    // Use file_get_contents() function to get the file
    // from url and use file_put_contents() function to
    // save the file by using base name
    
    
    if (file_put_contents($file_name, file_get_contents($url)))
    { 
        
        
    $zip = new ZipArchive;
$res = $zip->open( $file_name);
if ($res === TRUE) {
  $zip->extractTo($folder_name);
  $zip->close();
 // echo 'woot!';
} else {
//  echo 'doh!';
}


        return "File downloaded successfully".$file_name ;
    }
    else
    {
        return "File downloading failed.".$file_name ;
    } 
  
    
    
     
     
   



}

/**
 * Display a custom menu page
 */
function ABG_menu_page(){
    
	
   ?>
   
   <div class="wrap">
   
   
   <p>Create a page with shortcode [AistoreBhagavadGita]  </p>
   <p>for anything contact message on support page of plugin </p>
   
   </div>
   <?php
}