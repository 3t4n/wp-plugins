<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

include ( dirname( __FILE__ ) ) . '/libraries/admin_page_framework/admin-page-framework.php';
include ( dirname( __FILE__ ) ) . '/classes/adminPageClass.php';
include ( dirname( __FILE__ ) ) . '/classes/class-walker-category-checklist.php';
include ( dirname( __FILE__ ) ) . '/functions/metaBoxCategories.php';

function collapsing_category_list_admin_page_init() {
  if ( is_admin() ) {
    wp_enqueue_script( 'the_js', plugins_url( '/js/admin.js',__FILE__ ), array( 'jquery' ) );
    wp_enqueue_style( 'collapscatlist_css', 
            plugins_url( 'collapsing-category-list/' ).'css/collapsing-category-list-admin.css' );
    
    $translation_array = array(
      'max_subcategories' => __('Max subcategories reach for this category'),
    );
    
    wp_localize_script('the_js', 'collCatListTrans', $translation_array);
    wp_enqueue_script( 'the_js' );
  }
}
//add_action( 'init', 'collapsing_category_list_admin_page_init' );

function collapsing_category_list_admin_menu() {
  $admin_form_options = get_option( 'collapsingCategoryListAPF_CreatePage');

  $limit_categories_selected = false;
  if (!empty($admin_form_options)) {
    if ($admin_form_options['limit_categories_selected']) $limit_categories_selected = true;
  }

  if ($limit_categories_selected) {
    remove_meta_box('categorydiv', 'post', 'normal');
  }
}

if ( is_admin() ) {
  //add_action( 'init', 'collapsing_category_list_admin_page_init' );
  add_action( 'admin_init', 'collapsing_category_list_admin_page_init');
  add_action( 'admin_menu', 'collapsing_category_list_admin_menu');
  add_action( 'add_meta_boxes_post', 'collapsing_category_list_register_meta_box', 10, 2);
}