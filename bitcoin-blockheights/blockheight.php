<?php
/*
   Plugin Name: Bitcoin Blockheight
   Description: This is plugin is used to timestamp a post with the current Bitcoin blockheight 
   Version: 1.0.2
   Plugin URI: https://thirteen.ca/microsaas-empire/bitcoin-blockheight
   Author URI: https://thirteen.ca/microsaas-empire/
   Author: Thirteen Ventures Ltd. d/b/a Micro-Saas Empire
*/

function bcbh_table(){
 
  add_option( 'blockheight_active', '0' );
  add_option( 'blockheight_label_text', '&#x20BF;lockheight:' );
  add_option( 'blockheight_font_size', '12px' );
  add_option( 'blockheight_color', '#000' );
  add_option( 'blockheight_datefix', 'off' );
  add_option( 'blockheight_missing', 'no' );

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

}
register_activation_hook( __FILE__, 'bcbh_table' );

include "block-frontend.php";
include "block-fetch-latest.php";

// Add menu
function bcbh_menu() {
    add_menu_page("Blockheights", "Blockheights","manage_options", "blockheight-settings", "bcbh_settings",plugins_url('images/bitcoin.png', __FILE__ )); 
   
}
add_action("admin_menu", "bcbh_menu");
function bcbh_settings(){
  include "settings.php";
}


 add_action( 'post_submitbox_misc_actions', 'bcbh_add_blockheight_publish' );
function bcbh_add_blockheight_publish($post)
{
  
 
 $value = get_post_meta($post->ID, 'blockheight_publish', true);
   //If post Value already saved
         if(!empty($value) ){ ?>
           <div class="misc-pub-section misc-pub-section-last">
          <span id="timestamp">Published  &#x20BF;lockheight: <?php echo esc_html($value); ?></span></div>
        <?php  }?>
        

    <div class="misc-pub-section misc-pub-section-last">
         <span id="timestamp">Current &#x20BF;lockheight: <?php echo esc_html(bcbh_getblockheight());?></span></div>
<?php }
 
 // NOT IN USE check post status
add_action( 'post_updated', 'bcbh_post_update_function', 10, 3 );

function bcbh_post_update_function( $post_ID, $post_after, $post_before ) {
    // on each change, call this api to notify the content engine
    $event = null;
    // if article is auto draft
    if($post_before -> post_status === 'auto-draft' && $post_after -> post_status === 'publish') {
        //$event = 'new_article';
        update_post_meta(
          $post_ID,
          'blockheight_publish',
          bcbh_getblockheight()
      );
    // if article is draft then published
    } else if($post_before -> post_status === 'draft' && $post_after -> post_status === 'publish') {
      update_post_meta(
        $post_ID,
        'blockheight_publish',
        bcbh_getblockheight()
    );
    // if its updated article
    } else if($post_before -> post_status === 'publish' && $post_after -> post_status === 'publish') {
       // $event = 'updated_article';

       /*if(empty($published)){
        update_post_meta(
          $post_ID,
          'blockheight_publish',
          bcbh_getblockheight()
      );
        
       }else{ */
     
        update_post_meta(
          $post_ID,
          '_blockheight_modify_meta_key',
          bcbh_getblockheight()
      );
    
  /* }*/

 


    } else {
        return;
    }
    if($event === null) {
         return;
    }
 
}
 


add_action( 'enqueue_block_editor_assets', 'bcbh_injection_to_gutenberg_toolbar' );
 
function bcbh_injection_to_gutenberg_toolbar(){
   $screen= get_current_screen();
 
 
 
    wp_enqueue_script( 'custom-link-in-toolbar', plugins_url('js/custom-link-in-toolbar.js', __FILE__ )  , array(), '1.0', true ); 
      global $post;
      $id = get_the_ID();
      
      $published = get_post_meta($id, 'blockheight_publish', true);
      $jsarray = array(
        'p_id'=>$post->ID,
        'published'=>$published,
        'current'=>bcbh_getblockheight(),
      );
     //print_r($jsarray);
    
     wp_localize_script( 'custom-link-in-toolbar', 'b_object', $jsarray); 
//}
}
