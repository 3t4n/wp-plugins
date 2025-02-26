<?php
/**
 * Plugin Name: Floating Table of Contents 
 * Plugin URI: https://www.smithsites.net
 * Description: Add a floating table of contents to your posts- style it to match your site and branding
 * Version: 1.0.0
 * Text Domain: floating-table-of-contents
 * Author: David Smith
 * Author URI: https://www.smithsites.net/
 */



 //exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
///
///
///
///

//includes
include('src/admin-page.php'); //this is the admin page

///global variables
$TOC_Options = get_option('toc_settings');
$fontawsome = plugin_dir_url(__FILE__) . 'src/media/fontawesome-free-5.15.4-web/js/all.js';

//add scrtips

function floatingTOC_prefix_register_resources() {
	wp_register_script('toc-script', plugin_dir_url(__FILE__) . 'src/index.js', array('wp-blocks', 'wp-element'),1);
	wp_register_style("toc-style",plugin_dir_url(__FILE__) . 'css/toc-style.css',array(), false, 'all');
  //  wp_enqueue_style('font-awesome','"https://kit.fontawesome.com/d1c62aeac2.js" crossorigin="anonymous"');
	
}
add_action( 'init', 'floatingTOC_prefix_register_resources' );







//add id to each heading for to find later
/*
*
*
*
*
*/
function floatingTOC_auto_id_headings($content) {
  $content = preg_replace_callback('/(\<h[1-6](.*?))\>(.*)(<\/h[1-6]>)/i', function( $matches ) {
    if(!stripos($matches[0], 'id=')) {
      $matches[0] = $matches[1] . $matches[2] . ' id="' . sanitize_title( $matches[3] ) . '">' . $matches[3] . $matches[4];
    }
    return $matches[0];
  }, $content);
    return $content;

}
add_filter('the_content', 'floatingTOC_auto_id_headings');
/*
*
*
*
*
*/


function floatingTOC_add_scripts(){

	wp_enqueue_script( 'jquery' ); //add jquery
	wp_enqueue_script("toc-script"); //add js	
	wp_enqueue_style("toc-style");// add css
  //  wp_enqueue_style("font-awesome"); //add font awsome

}

add_action('wp_enqueue_scripts', 'floatingTOC_add_scripts');


// filter function to generate the table of content
function floatingTOC_get_table_of_content($content) {
    global $TOC_Options;
    global $fontawsome;
    $encodedOptions = json_encode($TOC_Options);
    $floating_toc_meta = htmlspecialchars($encodedOptions);
    ob_start();
    preg_match_all("/<h[2,3](?:\sid=\"(.*)\")?(?:.*)?>(.*)<\/h[2,3]>/", $content, $matches);
    $tags = $matches[0];
    $ids = $matches[1];
    $names = $matches[2];
    ?>
    
    <meta name="styleOptions" content="<?php echo esc_html( $floating_toc_meta); ?>"/>
    <script src="<?php echo esc_url($fontawsome); ?>"></script>
      
    
  <div class="floatingButtonWrap">
    <div class="floatingButtonInner">
        <a href="#" class="floatingButton">
            <i class="fas fa-plus icon-default"></i>
        </a>
        <div class="table-of-contents">
          <p class="toc-headline"><strong><?php echo get_the_title()?></strong></p>
          <ul>
              <!-- Table of contents -->
              <?php for($i = 0; $i < count($names); $i++) { ?>
                  <?php if(strpos($tags[$i], "h2") === false || strpos($tags[$i], "class=\"nitoc\"") !== false) continue; ?>
              
                      <li>
                          <?php if(!empty($ids[$i])) { ?>
                              <a href="#<?php echo esc_attr($ids[$i]); ?>"><?php echo esc_html($names[$i]); ?></a>
                          <?php } else { ?>
                              <?php echo esc_html($names[$i]); ?>  
                          <?php } ?>
          
                          <?php if($i !== count($names) && strpos($tags[$i +1], "h3") !== false) { ?>
                              <ul>
                                  <?php for($j = 0; $j < count($names) - 1; $j++) { ?>
                                      <?php $sub_index = $i + $j; ?>
                                      <?php if($j != 0 && strpos($tags[$sub_index], "h2") !== false) break; ?>
                                      <?php if(strpos($tags[$sub_index], "h3") === false || strpos($tags[$sub_index], "class=\"nitoc\"") !== false) continue; ?>
                                      <li>
                                          <?php if(!empty($ids[$sub_index])) { ?>
                                              <a href="#<?php echo esc_attr($ids[$sub_index]); ?>"><?php echo esc_html($names[$sub_index]); ?></a>
                                          <?php } else { ?>
                                              <?php echo esc_html($names[$sub_index]); ?>  
                                          <?php } ?>
                                      </li>
                                  <?php } ?>
                              </ul>
                          <?php } ?>
                      </li>
              <?php } ?>
          </ul>
        </div>
    </div>
  </div>
    <?php
    return ob_get_clean();
    
}


//add TOC via shortcode "TOC"
function floatingTOC_load($content) {
  
    //get global version of variable
    global $TOC_Options;
 //   $TOC_Options = true;
    //check if TOC is enabled
    if ($TOC_Options['toc_enable'] == true){
        
    //if true displays on posts
        if(is_single()){
            $content .= floatingTOC_get_table_of_content(floatingTOC_auto_id_headings(get_the_content()));
        }
   
        return $content;   
    }

}
add_filter('the_content', 'floatingTOC_load');



