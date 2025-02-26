<?php
/*
 * Plugin Name:       Dream Popup
 * Plugin URI:        https://dreamreflectionmedia.com/
 * Description:       Welcome to the Dream popup you can easly simple and advance popup just in some few steps.
 * Version:           1.0
 * Requires at least: 5.2
 * Author:            Nandani Gupta
 * Author URI:        https://www.facebook.com/anaaya.gupta.927
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       dreampopup
 * Tags:              popup, wordpress popup, multi popup, popup, dream popup, popup button, dynamic popup, dream reflection media
*/

defined('ABSPATH') || die("You Can't Access this File Directly");


 define("DREAMPOPUP_DIR_PATH", plugin_dir_path(__FILE__));  // PLUGIN_DIR_PATH - Global variable

define('DREAMPOPUP_URL',plugin_dir_url(__FILE__));

define('DREAMPOPUP_FILE', __FILE__);



add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'dreampopup_links' );

function dreampopup_links ( $actions ) {
$mylinks = array(
'<a href="' . admin_url( 'admin.php?page=dreampopup' ) .'">Settings</a>',
);
$actions = array_merge( $actions, $mylinks );
return $actions;
}


register_activation_hook(DREAMPOPUP_FILE, function(){
  global $wpdb;

  $table_name = $wpdb->prefix . 'popupdata';
  
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE $table_name (
    id int(11) NOT NULL AUTO_INCREMENT,
    popupname varchar(100) NULL NULL,
    popuptitle varchar(100) NULL NULL,
    popuphtml varchar(2000) NULL NULL,
    class varchar(50) NULL NULL,
    text varchar(50) NULL NULL,
    active tinyint(1) NULL NULL,
    Border_radius varchar(50) NULL NULL,
    Color varchar(50) NULL NULL,
    Background_Color varchar(50) NULL NULL,
    Background_Color_hover varchar(50) NULL NULL,
    Border_Color varchar(50) NULL NULL,
    Border_Color_Hover varchar(50) NULL NULL,
    Border_Size varchar(50) NULL NULL,
    Font_Size varchar(50) NULL NULL,
    colorhover varchar(50) NULL NULL,
    textalign varchar(50) NULL NULL,
    btnsze varchar(50) NULL NULL,
    margin int(20) NULL NULL,
    padding int(20) NULL NULL,
    popsize varchar(210) NULL NULL,
    popwidth varchar(150) NULL NULL,
    popcolor varchar(210) NULL NULL,
    popbgcolor varchar(210) NULL NULL,
    popbrdersze varchar(210) NULL NULL,
    popbrdrclr varchar(120) NULL NULL, 
    closebtnclr varchar(150) NULL NULL,
    popbrdrrads varchar(120) NULL NULL,
    popmargin varchar(120) NULL NULL,
    poppadding varchar(120) NULL NULL,
    animation varchar(150) NULL NULL,
    animationspeed varchar(150) NULL NULL, 
    opacity varchar(150) NULL NULL,
    transition varchar(150) NULL NULL, 
    titlesize varchar(150) NULL NULL,
    titlecolor  varchar(150) NULL NULL,
    crossbtnsze varchar(150) NULL NULL,
    opacitycolor varchar(150) NULL NULL,
    activecokie varchar(150) NULL NULL,
    cookiename varchar(150) NULL NULL,
    cookietime varchar(150) NULL NULL,
    cookietime2 varchar(150) NULL NULL,
    PRIMARY KEY  (id)
  ) $charset_collate;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );
});


// register_deactivation_hook(DREAMPOPUP_FILE,function(){
//   global $wpdb;
//   $prefix = $wpdb->prefix;
//   $table = $prefix.'popupdata';
//   $sql = "TRUNCATE TABLE $table;";
//   $wpdb->query($sql);


// });


//backend
add_action('admin_enqueue_scripts','dreampopup_scripts');

function dreampopup_scripts(){

wp_enqueue_script('jquery');

wp_enqueue_style('custom_style_my', DREAMPOPUP_URL."/assets/css/style.css");

wp_enqueue_style('custom_style_my2', DREAMPOPUP_URL."/assets/css/fontawesome.css");

wp_enqueue_script('custompluggin_dev_script', DREAMPOPUP_URL."/assets/js/script.js",
array(),'1.0.0',false);




wp_localize_script('custompluggin_dev_script','ajax_object',admin_url("admin-ajax.php"));


}



//frontend



add_action('wp_enqueue_scripts','dreampopplugin');


function dreampopplugin(){

  wp_enqueue_style('custom_style_my', DREAMPOPUP_URL."/assets/css/style.css");

wp_enqueue_style('custom_style_my2', DREAMPOPUP_URL."/assets/css/fontawesome.css");

  wp_enqueue_script('jquery');


   // check check 

  wp_enqueue_script('custompluggin_dev_script', DREAMPOPUP_URL."/assets/js/script.js",
array(),'1.0.0',false);

  wp_localize_script('custompluggin_dev_script','ajax_object',admin_url("admin-ajax.php"));


}


 function add_my_dreampop_menu(){
  add_menu_page(
  	"popupplugin",     //page title
  	"Dream Popup",      //menu title
  	"manage_options",   //admin level
  	"dreampopup",   //page slug ~ parent slug
  	"dreampopup_all_page_function", //callback function
  	"dashicons-editor-unlink", //icon url
  	"null" //position
  );

   add_submenu_page(
    "dreampopup",      //parent slug
    "All Popups",            //page title
    "All Popups",           //menu title
    "manage_options",    //capability = user level access
    "all-popups",          //menu slug
    "dreampopup_all_page_function" //callback function
  );

add_submenu_page(
    "dreampopup",      //parent slug
    "Create popup",            //page title
    "Create popup   ",           //menu title
    "manage_options",    //capability = user level access
    "custom-plugin2",          //menu slug
    "dreampopup_add_new_function" //callback function
  );



  }

   add_action("admin_menu","add_my_dreampop_menu");

   function dreampop_admin_view(){
  echo "<h1>Dream Reflection Media</h1>";
}


function dreampopup_all_page_function(){
    //all page function
    // 
  include DREAMPOPUP_DIR_PATH."/views/all-pages.php";

}

function dreampopup_add_new_function(){
  include_once DREAMPOPUP_DIR_PATH."/views/imageslider.php";
  //add new function
}


add_action('wp_ajax_yourpopupadding','dreampopup_pop_ajax_handler');

add_action('wp_ajax_nopriv_yourpopupadding','dreampopup_pop_ajax_handler');

function dreampopup_pop_ajax_handler(){
    if(sanitize_text_field($_REQUEST['param'])=='save_plugin'){      
      global $wpdb;
      $prefix = $wpdb->prefix;
      $table = $prefix.'popupdata';  


 if(sanitize_text_field($_REQUEST['borderradius']) != '') {
       $border_radius2 = sanitize_text_field($_REQUEST['borderradius']);
     }
     else{
       $border_radius2 = null;
     }

   if(sanitize_text_field($_REQUEST['borderclr']) != '') {
       $border_clr = sanitize_text_field($_REQUEST['borderclr']);
     }
     else{
       $border_clr = null;
     }


   if(sanitize_text_field($_REQUEST['borderhoverclr']) != '') {
       $border_clr2 = sanitize_text_field($_REQUEST['borderhoverclr']);
     }
     else{
       $border_clr2 = null;
     }


   if(sanitize_text_field($_REQUEST['fntsze']) != '') {
       $fontsze = sanitize_text_field($_REQUEST['fntsze']);
     }
     else{
       $fontsze  = null;
     }




        $data = array(
      "popupname"=> sanitize_text_field($_REQUEST['post_name']),
      "popuptitle"=>sanitize_text_field($_REQUEST['popup_title']),
      "popuphtml"=> wp_kses_post($_REQUEST['mycontent']),   
      "class" =>sanitize_text_field($_REQUEST['popup_class']),
      "text" =>sanitize_text_field($_REQUEST['popup_text']),
      "active" =>sanitize_text_field($_REQUEST['checkbx'] ? '1' : '0'),
      "Border_radius" =>$border_radius2,
      "Color" =>sanitize_text_field($_REQUEST['txtcolor']),
      "Background_Color" =>sanitize_text_field($_REQUEST['bgcolor']),
      "Background_Color_hover" =>sanitize_text_field($_REQUEST['bgcolorhover']),
      "Border_Color" =>$border_clr,
      "Border_Color_Hover" =>$border_clr2,
      "Border_Size" =>sanitize_text_field($_REQUEST['bordersize']),
      "Font_Size" =>$fontsze,
      "colorhover" =>sanitize_text_field($_REQUEST['txthovercolor']),
      "textalign" =>sanitize_text_field($_REQUEST['testalign']),
      "btnsze" =>sanitize_text_field($_REQUEST['btnsize']),
      "margin" => sanitize_text_field($_REQUEST['marginbtn']),
      "padding" => sanitize_text_field($_REQUEST['paddingbtn']),
      "popsize" => sanitize_text_field($_REQUEST['popfntsze']),
      "popcolor" => sanitize_text_field($_REQUEST['poptxtcolor']),
       "popwidth" => sanitize_text_field($_REQUEST['popWidth']),
      "popbgcolor" => sanitize_text_field($_REQUEST['popBgcolor']),
      "popbrdersze" => sanitize_text_field($_REQUEST['popBordersize']),
      "popbrdrclr" => sanitize_text_field($_REQUEST['popBorderclr']),
      "popbrdrrads" => sanitize_text_field($_REQUEST['popBorderradius']),
      "popmargin" => sanitize_text_field($_REQUEST['popMargin']),
      "poppadding" => sanitize_text_field($_REQUEST['popPadding']),
      "closebtnclr" =>sanitize_text_field($_REQUEST['popclosebtncolor']),
      "animation" => sanitize_text_field($_REQUEST['popanimat']),
      "opacity" => sanitize_text_field($_REQUEST['popopacity']),
      "animationspeed" => sanitize_text_field($_REQUEST['popanimatespd']),
      "transition" => sanitize_text_field($_REQUEST['poptransition']),
      "titlesize" => sanitize_text_field($_REQUEST['poptitlefntsze']),
      "titlecolor" => sanitize_text_field($_REQUEST['poptitlecolor']),
      "crossbtnsze" => sanitize_text_field($_REQUEST['popclosebtnsze']),
      "opacitycolor" => sanitize_text_field($_REQUEST['opacitycolor']),
      "activecokie" => sanitize_text_field($_REQUEST['activecokie']),
      "cookiename" => sanitize_text_field($_REQUEST['cookiename']),
      "cookietime" => sanitize_text_field($_REQUEST['cookietime']),
      "cookietime2" => sanitize_text_field($_REQUEST['cookietime2'])

      );
      $wpdb->insert($table, $data);

      echo json_encode(array("status"=>1,"message"=>'success',"id"=>$id,'data'=>$data));
     
    }
    wp_die();
}

//edit

add_action('wp_ajax_yourpopupedit','dreampopup_pop_ajax_edit');

add_action('wp_ajax_nopriv_yourpopupedit','dreampopup_pop_ajax_edit');

function dreampopup_pop_ajax_edit(){
    if(sanitize_text_field($_REQUEST['param'])=='save_plugin'){
      
      global $wpdb;
      $prefix = $wpdb->prefix;
      $table = $prefix.'popupdata';

    if(sanitize_text_field($_REQUEST['borderradiusupdte']) != '') {
       $border_radius = sanitize_text_field($_REQUEST['borderradiusupdte']);
     }
     else{
       $border_radius = null;
     }

   if(sanitize_text_field($_REQUEST['borderclrupdte']) != '') {
       $border_clrupdte = sanitize_text_field($_REQUEST['borderclrupdte']);
     }
     else{
       $border_clrupdte = null;
     }


   if(sanitize_text_field($_REQUEST['borderhoverclrupdte']) != '') {
       $border_clrupdtehover = sanitize_text_field($_REQUEST['borderhoverclrupdte']);
     }
     else{
       $border_clrupdtehover = null;
     }


   if(sanitize_text_field($_REQUEST['fntszeupdte']) != '') {
       $fontszeupdte = sanitize_text_field($_REQUEST['fntszeupdte']);
     }
     else{
       $fontszeupdte = null;
     }

   // if(sanitize_text_field($_REQUEST['popanimatupdte']) == 'None') {
   //     sanitize_text_field($_REQUEST['popanimatespdupdte']) = 0;
   //   }
   //  else{
   //    sanitize_text_field($_REQUEST['popanimatespdupdte']);
   //  }


      $data = array(
        "popuphtml"=>wp_kses_post($_REQUEST['mycontent']),
        "popuptitle"=>sanitize_text_field($_REQUEST['post_updtettle']),
        "class"=>sanitize_text_field($_REQUEST['post_updteclass']),
        "text"=>sanitize_text_field($_REQUEST['post_updtebtntxt']),
       "Border_radius" =>$border_radius,
       "Color" =>sanitize_text_field($_REQUEST['txtcolorupdte']),
       "Background_Color" =>sanitize_text_field($_REQUEST['bgcolorupdte']),
       "Background_Color_hover" =>sanitize_text_field($_REQUEST['bgcolorhoverupdte']),
       "Border_Color" =>$border_clrupdte,
       "Border_Color_Hover" =>$border_clrupdtehover,
       "Border_Size" =>sanitize_text_field($_REQUEST['bordersizeupdte']),
       "Font_Size" =>$fontszeupdte,
       "colorhover" =>sanitize_text_field($_REQUEST['txthovercolorupdte']),
       "textalign" =>sanitize_text_field($_REQUEST['testalignupdte']),
       "btnsze" =>sanitize_text_field($_REQUEST['btnsizeupdte']),
       "margin" => sanitize_text_field($_REQUEST['margin']),
       "padding" => sanitize_text_field($_REQUEST['padding']),
       "popsize" => sanitize_text_field($_REQUEST['popfntszeupdte']),
       "popwidth" => sanitize_text_field($_REQUEST['popwidthupdte']),
       "popcolor" => sanitize_text_field($_REQUEST['poptxtcolorupdte']),
       "popbgcolor" => sanitize_text_field($_REQUEST['popBgcolorupdte']),
       "popbrdersze" => sanitize_text_field($_REQUEST['popBordersizeupdte']),
       "popbrdrclr" => sanitize_text_field($_REQUEST['popBorderclrupdte']),
       "popbrdrrads" => sanitize_text_field($_REQUEST['popBorderradiusupdte']),
       "popmargin" => sanitize_text_field($_REQUEST['popMarginupdte']),
       "poppadding" => sanitize_text_field($_REQUEST['popPaddingupdte']),
       "closebtnclr" => sanitize_text_field($_REQUEST['popclosebtncolorupdte']),
       "animation" => sanitize_text_field($_REQUEST['popanimatupdte']),
       "opacity" => sanitize_text_field($_REQUEST['popopacityupdte']),
       "animationspeed" => sanitize_text_field($_REQUEST['popanimatespdupdte']),
       "transition" => sanitize_text_field($_REQUEST['poptransitionupdte']),
       "titlesize" => sanitize_text_field($_REQUEST['poptitlefntszeupdte']),
      "titlecolor" => sanitize_text_field($_REQUEST['poptitlecolorupdte']),
      "crossbtnsze" => sanitize_text_field($_REQUEST['popclosebtnszeupdte']),
      "opacitycolor" => sanitize_text_field($_REQUEST['opacitycolorupdate']),
      "activecokie" => sanitize_text_field($_REQUEST['activecokieupdt']),
      "cookiename" => sanitize_text_field($_REQUEST['cookienameupdt']),
      "cookietime" => sanitize_text_field($_REQUEST['cookietimeupdt']),
      "cookietime2" => sanitize_text_field($_REQUEST['cookietimeupdt2'])

      );

      $where = array( 'id' => sanitize_text_field($_REQUEST['id']) );
      $wpdb->update($table, $data,$where);

       echo json_encode(array("status"=>1,"message"=>'success'));

}
wp_die();
}


//delete
add_action('wp_ajax_yourpopupdlte','mydreamplugin_ajax_popdlte');

add_action('wp_ajax_nopriv_yourpopupdlte','mydreamplugin_ajax_popdlte');
  
  function mydreamplugin_ajax_popdlte(){
     if(sanitize_text_field($_REQUEST['param'])=='save_plugin'){

       global $wpdb;
      $prefix = $wpdb->prefix;
      $table = $prefix.'popupdata';
      $where = array( 'id' => sanitize_text_field($_REQUEST['id']) );
      $wpdb->delete($table, $where);
   echo json_encode(array("status"=>1,"message"=>"Data delete successful"));
    }
    wp_die();

  }


//shortcode function


add_shortcode("popupmake-12","dreampopshortcode");

function dreampopshortcode($params){

  $values = shortcode_atts(    
    array(
      "class"=>'try'    
  ),$params,
    'custom-plugin-parameter'

  );
  ob_start();
 include DREAMPOPUP_DIR_PATH."/views/popup.php"; // we have attached php file to this shortcode
  return ob_get_clean();
}


// add_shortcode("popupmake-12","sliderFunction2nd");

// function sliderFunction2nd($params){

//   $values = shortcode_atts(    
//     array(
//       "class"=>'try'    
//   ),$params,
//     'custom-plugin-parameter'

//   );
//   ob_start();
//  include_once DREAMPOPUP_DIR_PATH."/views/popup.php"; // we have attached php file to this shortcode
//   return ob_get_clean();
// }




?>