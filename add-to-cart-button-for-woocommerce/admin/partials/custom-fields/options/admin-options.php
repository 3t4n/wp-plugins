<?php if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$prefix = '_atcbw_admin_opt';

//
// Create options
//
ATCBW::createOptions( $prefix, array(
  'menu_title'  => 'Add to Cart Button',
  'menu_slug'   => 'atcbw-demo',
  'show_footer' => false,
  'show_search' => false,
  'show_reset_section' => false,
) );

//
// Create a section
//
ATCBW::createSection( $prefix, array(
  'fields' => array(

    array(
      'id'      => 'atcbw_changed_btn_text',
      'type'    => 'switcher',
      'title'   => 'Change Add to Cart Button Text',
      'default' => false,
    ),    
    array(
      'id'         => 'atcbw_btn_text',
      'type'       => 'text',
      'title'      => 'Add to Cart Button Text',
      'default'    => 'Buy Now',
      'dependency' => array( 'atcbw_changed_btn_text', '==', 'true' ),
    ),
  )
) );
