<?php
if( class_exists( 'CSF' ) ) {

    //
    // Set a unique slug-like ID
    $prefix = 'newselement';
  
    //
    // Create taxonomy options
    CSF::createTaxonomyOptions( $prefix, array(
      'taxonomy'  => 'category',
      'data_type' => 'serialize',
    ) );
  
    //
    // Create a section
    CSF::createSection( $prefix, array(
      'fields' => array(
  
        array(
          'id'    => 'color',
          'type'  => 'color',
          'title' => 'Color',
        ),
      )
    ) );  
  } 