<?php
/**
 * Plugin Name: Dislike
 * Plugin URI: http://www.rockit-internet.de/rockits-erstes-wordpress-plugin-das-wordpress-dislike-plugin/
 * Description: Das Dislike-Plugin ermöglicht jetzt neben dem klassischen Like (Facebook) auch ein Dislike anzubieten. Dies korrespondiert aber NICHT mit Facebook, sondern öffnet ein PopUp.
 * Version: 1.1.1
 * Author: ROCKIT-INTERNET, S.B.
 * Author URI: http://www.rockit-internet.de
 * Text Domain: rockit-dislike
 * Domain Path: /lang
*/


// choose language file
add_action( 'init', 'dislike_load_textdomain' );
function dislike_load_textdomain() {
    load_plugin_textdomain( 'rockit-dislike', false, dirname( plugin_basename( __FILE__ ) ) . '/lang/' );
} 


function get_dislike_text(){
    $dislike_text = addslashes( get_option( 'dislike_text' ) );
    $dislike_text = str_replace( array( "\r\n", "\n", "\r" ), '<br>', $dislike_text );
    $dislike_text = str_replace( '><br><', '><', $dislike_text );
    return $dislike_text;
}


// create pop-up
function dislike_popup_script(){

    $dislike_content = get_option( 'dislike_content' );

    // all
    $javascript = "
<!-- ROCKIT-INTERNET Dislike Plugin -->
<script language=\"javascript\" type=\"text/javascript\">
function popdislike(w, h){";

    // case text
    if ( $dislike_content == "text" ) 
    {
      $javascript .= "var site = '<html><head><title>Dislike</title></head><body>" . get_dislike_text() . "</body></html>';";
    }
    
    // all
    $javascript .= "
        x = screen.availWidth/2-w/2;
        y = screen.availHeight/2-h/2-50;
        var popupWindow = window.open('";
    
    // case url
    if ( $dislike_content == "url" ) 
    {
      $javascript .= get_option( 'dislike_url' );
    }    
    
    // all
    $javascript .= "','','width='+w+',height='+h+',left='+x+',top='+y+',screenX='+x+',screenY='+y+',dependent=yes');";
    
    // case text
    if ( $dislike_content == "text" ) {
      $javascript .= "popupWindow.document.write(site);";
    }
    
    // all
    $javascript .= "}
        </script>
        <!--/ROCKIT-INTERNET Dislike Plugin-->";
        
    echo $javascript;
}
// ------- end pop-up



// load script in head of document
add_action ( 'wp_head', 'dislike_popup_script' );


// check if exclude-list is containing the current id
function dislike_exclude_id (){
     
    if ( in_array( get_the_ID(), explode ( ",", get_option ( 'dislike_exclude' ) ) ) ) 
    {
        return  true;
    }
    else return false;
}


// check if button is to be shown on archive or home
function dislike_include_archive (){
    if ( 
           get_option( 'dislike_archive' ) == 'include' 
        && ( is_home() || is_archive() || is_category() ) 
       )
    {
      return true;
    }
    else return false;
}


// create dislike button
function dislike_create_button(){

      $dislike_button  = '<div class="dislike_button" onclick="popdislike(' . get_option(' dislike_window_width' ) . ',';
      $dislike_button .= get_option( 'dislike_window_height' );
      $dislike_button .= ')"><img style="border-style:none;cursor:pointer;" src="';
      $dislike_button .= plugin_dir_url( __FILE__ ) . 'dislike.gif" alt="dislike" /></div>';
      
      return $dislike_button;
}
  

// add dislike button
add_filter( 'the_content', 'dislike_add_button' );
add_filter( 'the_excerpt', 'dislike_add_button' );

function dislike_add_button( $content ){
 
 if ( 
         dislike_exclude_id() === false  
    )
 { 
     
    $dislike_show = get_option( 'dislike_show' );  
    if (
            ( $dislike_show == 'pages' && is_page() ) 
         || ( $dislike_show == 'posts' && is_single() ) 
         ||   $dislike_show == 'all'
         || dislike_include_archive() === true
       )
       
    {
      $content .= dislike_create_button();
    } 
 }  
  
  return $content;
    
}

//options page only for admin
if ( is_admin() )
{
  add_action( 'admin_menu', 'dislike_options_menu' );
  function dislike_options_menu() {
    add_options_page( 'Dislike Plugin Options', 'Dislike', 'administrator', __FILE__, 'dislike_options_admin' );
  }
  
  function dislike_options_admin() {
    if ( !current_user_can( 'manage_options' ) )
    {
      wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    // all possible options
    $dislike_options = array
        (
          'dislike_text'          => '', 
          'dislike_window_width'  => 500, 
          'dislike_window_height' => 500, 
          'dislike_show'          => 'none', 
          'dislike_content'       => 'url', 
          'dislike_url'           => '', 
          'dislike_exclude'       => '', 
          'dislike_archive'       => 'exclude'
        ); 
    
    // register options 
    foreach( $dislike_options as $do => $dval )
    {
      add_option( $do, $dval ); 
    }
   
    // update options
    if ( 
             isset( $_POST['rockit-dislike_nonce'] ) 
          && wp_verify_nonce( $_POST['rockit-dislike_nonce'], 'edit-dislike-options' ) 
        ) 
    {
      foreach( $dislike_options as $do => $dval )
      {
        update_option( $do, stripslashes($_POST[ $do ]) ); 
      }
      echo '<div class="updated"><p><strong>' . __( 'settings saved.' ) . '</strong></p></div>';
    }
    
    // get all options
    $all_dislike_options = array();
    foreach( $dislike_options as $do => $dval )
    {
        $all_dislike_options[ $do ] = get_option( $do );
    }
    
    include 'rockit-dislike-admin.php';
  }
}

?>
