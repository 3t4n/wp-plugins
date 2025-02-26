<?php

/**
  *
  * @wordpress-plugin
  * Plugin Name:       Ask Deal
  * Plugin URI:        http://www.webwavers.com/ask-deal-plugin/
  * Description:       Deals can be created to display on your site, user can contact and ask details by submitting the form, from can be changed to input more details.
  * Version:           1.0.5
  * Author:            webwavers
  * Author URI:        http://www.webwavers.com/
  * License:           GPL-2.0+
  * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
  * Text Domain:       ask-deal
  * Domain path:       /language
  */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

if ( ! defined( 'ASKDL_Deal' ) )
  define ( 'ASKDL_Deal', ',' );

//create databases and static pages on activation
register_activation_hook( __FILE__, array( 'ASKDL_Deal', 'install' ) );
class ASKDL_Deal{
    static function install(){
      global $wpdb;
      $charset_collate = $wpdb->get_charset_collate();
      add_option( 'headerlogo', '');
      add_option( 'footertext', '');
      add_option( 'headertext', '');
      add_option( 'business_term', '');
      $tables = array( 
          array(
            "name" => $wpdb->prefix."",
            "sql" => "CREATE TABLE ".$wpdb->prefix."deal (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `title` varchar(256) NOT NULL,
            `description` text NOT NULL,
            `price` varchar(256) NOT NULL,
            `image` varchar(255) NOT NULL,
            `added_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `askdeal` tinyint(4) NOT NULL DEFAULT '0',
            `type` varchar(256) NOT NULL,
            `typevallink` text NOT NULL,
            `typevalfrm` text NOT NULL,
            `button_title` varchar(256) NOT NULL DEFAULT '',
            `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
            PRIMARY KEY (id)
            )  $charset_collate;"
          )
      );
      foreach( $tables as $table ){
          $table_name = $wpdb->prefix.$table['name'];
          if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
              //table not in database. Create new table
              require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
              dbDelta( $table['sql'] );
          }
      }
    } 
    public function __construct() {
        $this->includes();
        add_action('admin_menu',array( $this, 'init_hooks' ));
    }
    public function includes(){
        include_once( 'source/deal.php' );
        include_once( 'source/shortcodes.php' );
        wp_enqueue_script( '', '',array( 'jquery' ), '', false,true );
    }
    function init_hooks(){
        $current_user = wp_get_current_user();
        add_menu_page('Ask deal', //page title
        	'Ask deal', //menu title
        	$current_user->roles[0], //capabilities
        	'deal', //menu slug
        	'askdl_deal', //function
            'dashicons-images-alt'
        );
    } 
}
$q = new ASKDL_Deal();