<?php
/**
 * Plugin Name: 	HM Logo Showcase
 * Plugin URI:		https://wordpress.org/plugins/hm-logo-showcase/
 * Description: 	This is a WordPress logo showcase plugin which will display client/brand logos on your website page by using the shortcode: [hm_logo_showcase]
 * Version: 		  2.0.8
 * Author: 			  HM Plugin
 * Author URI: 		https://hmplugin.com
 * Requires at least:   5.4
 * Requires PHP:  7.2
 * Tested up to:  6.7.1
 * Text Domain:   hm-logo-showcase
 * Domain Path:   /languages/
 * License:       GPL-2.0+
 * License URI:   http://www.gnu.org/licenses/gpl-2.0.txt
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( function_exists('hls_fs') ) {

  hls_fs()->set_basename(true, __FILE__);

} else {

  if ( ! class_exists('HMLS_Master') ) {

    define( 'HMLS_PATH', plugin_dir_path(__FILE__) );
    define( 'HMLS_ASSETS', plugins_url('/assets/', __FILE__) );
    define( 'HMLS_LANG', plugins_url('/languages/', __FILE__) );
    define( 'HMLS_SLUG', plugin_basename(__FILE__) );
    define( 'HMLS_PRFX', 'hmls_' );
    define( 'HMLS_CLS_PRFX', 'cls-hmls-' );
    define( 'HMLS_TXT_DOMAIN', 'hm-logo-showcase' );
    define( 'HMLS_VERSION', '2.0.8' );

    require_once HMLS_PATH . "/lib/freemius-integrator.php";

    require_once HMLS_PATH . 'inc/' . HMLS_CLS_PRFX . 'master.php';
    $hmls = new HMLS_Master();
    $hmls->hmls_run();

    // Donate link to plugin description
    function hmls_display_donation_link( $links, $file ) {

        if ( HMLS_SLUG === $file ) {
            $row_meta = array(
              'hmls_donation'  => '<a href="' . esc_url( 'https://www.paypal.me/mhmrajib/' ) . '" target="_blank" aria-label="' . esc_attr__('Donate us', HMLS_TXT_DOMAIN) . '" style="color:green; font-weight: bold;">' . esc_html__('Donate us', HMLS_TXT_DOMAIN) . '</a>'
            );
    
            return array_merge( $links, $row_meta );
        }
        return (array) $links;
    }
    add_filter( 'plugin_row_meta', 'hmls_display_donation_link', 10, 2 );

    // Add Columns to logo list table
    function hmls_add_logo_columns( $columns ) {
		
      unset( $columns['title'] );
      unset( $columns['taxonomy-logo_category'] );
      unset( $columns['date'] );
  
      return array_merge ( $columns, array ( 
        'logo'                    => __('Logo', HMLS_TXT_DOMAIN),
        'title'                   => __('Logo Title', HMLS_TXT_DOMAIN),
        'taxonomy-logo_category'  => __('Logo Category', HMLS_TXT_DOMAIN),
        'order'                   => __('Logo Order', HMLS_TXT_DOMAIN),
        'status'                  => __('Logo Status', HMLS_TXT_DOMAIN),
        'date'                    => __('Published Date', HMLS_TXT_DOMAIN),
      ) );
  
    }
    add_filter( 'manage_hmls_logo_posts_columns', 'hmls_add_logo_columns' );

    // Add Data To Custom Post Type Columns
    function hmls_logo_column_data( $column, $post_id ) {

      switch ( $column ) {

        case 'logo':
          $hmls_img_url   = get_post_meta( $post_id, 'hmls_img_url', true );
          if ( $hmls_img_url ) {
            ?>
            <img src="<?php echo esc_url( $hmls_img_url ); ?>" alt="<?php _e( 'No Image Available', HMLS_TXT_DOMAIN ); ?>" width="60">
            <?php
          }
          else {
            echo get_the_post_thumbnail( $post_id, 'post_thumbnail', array( 'class' => 'hmls-admin-logo-list' ) );
          }
          break;

        case 'status':
          echo ( 'active' !== get_post_meta( $post_id , 'hmls_status' , true ) ) ? '<b style="color:red;">' . __('Inactive', HMLS_TXT_DOMAIN) . '</b>' : '<b style="color:green;">' . __('Active', HMLS_TXT_DOMAIN) . '</b>';
          break;

        case 'order':
          echo get_post_field( 'menu_order', $post_id);
          break;

      }
      
    }
    add_action( 'manage_hmls_logo_posts_custom_column' , 'hmls_logo_column_data', 10, 2 );

    // Sorting Column
    function hmls_logo_list_table_sorting( $columns ) {

      $columns['order'] = 'menu_order';
      $columns['taxonomy-logo_category'] = 'Logo Category';
      return $columns;

    }
    add_filter( 'manage_edit-hmls_logo_sortable_columns', 'hmls_logo_list_table_sorting' );

    register_deactivation_hook( __FILE__, array( $hmls, HMLS_PRFX . 'unregister_settings' ) );

  }
}