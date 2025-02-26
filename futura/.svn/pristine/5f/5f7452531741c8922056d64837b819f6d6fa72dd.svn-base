<?php
/*
  Plugin Name: FUTURA
  Plugin URI: https://futura.site
  Description: Show related post and keyword search by AI algorithm
  Author: Autoproject Inc.
  Version: 1.3.5
  Author URI: https://www.autoproject.nagoya
  Text Domain: futura

  ShortCode List
  -[futura_search]
      Show search form.
  -[futura_show_related_posts]
      You can show related posts with this shortcode.    
      This shortcode works with "after contents" setting.
      This shortcode insert element that has ID named futura_related_post_in_content.
      Then javascript move "futura_related_after_content_wrap" element to "futura_related_post_in_content".      
  -[futura_related_id 1,2,3 add_is_new=null] 
      Get related post id by json encode. *atts should be number of rank you want to show.
      [futura_related_id 1,2,3] means get ID of no 1,2,3 rank related post. 
      It needs 'comma' to separate.  
      If you setup add_is_new, you can get 'is_new' key in array.
      The value is 0 or 1.
      It is option. You don't have to add "add_is_new".    
      [futura_related_id 1,2,3] or [futura_related_id 1,2,3 1]
  -[futura_specify_open_content]
      Specify position to show futura footer content

  -[futura_get_search_result_id]
      This shortcode return all ids of search result

  Hooks
  -[futura_maybe_add_event_tracking]

*/

define("FUTURA_V", "1.3.5");

require_once dirname(__FILE__).'/config.php';
require_once dirname(__FILE__).'/lib/futura-class.php';
require_once dirname(__FILE__).'/lib/futura-front.php';
require_once dirname(__FILE__).'/lib/futura-search.php';
require_once dirname(__FILE__).'/lib/futura-widget.php';
require_once dirname(__FILE__).'/lib/futura-activation.php';

load_plugin_textdomain( 'futura', false, basename( dirname( __FILE__ ) ) . '/languages' );

add_action( 'plugins_loaded', 'futura_init' );

function futura_init(){
  new Futura();
  new Futura_Front();
  new Futura_Search();  
  add_action('widgets_init', function() {register_widget('WP_Widget_Futura'); register_widget('WP_Widget_Futura_Search');});
  return;
}


register_activation_hook((__FILE__), 'futura_activation');
