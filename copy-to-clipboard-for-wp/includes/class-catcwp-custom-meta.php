<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

    // Set a unique slug-like ID
    $prefix = 'copy_to_clipboard_options';
  
    // Create a metabox
    CSF::createMetabox( $prefix, array(
      'title'     => 'Copy to Clipboard Options',
      'post_type' => 'copy_to_clipboard',
    ) );
  
    // Create a section
    CSF::createSection( $prefix, array(
      'fields' => array(
        array(
            'id'    => 'copy_clipboard_selector',
            'type'  => 'text',
            'title' => __( 'Selector', 'catcwp' ),
        ),
        array(
          'id'    => 'copy_clipboard_text',
          'type'  => 'text',
          'title' => __( 'Text', 'catcwp' ),
        ),
        array(
            'id'    => 'copy_clipboard_content',
            'type'  => 'textarea',
            'title' => __( 'Content', 'catcwp' ),
        ),
        array(
          'id'      => 'copy_clipboard_typography',
          'type'    => 'typography',
          'title' => __( 'Typography', 'catcwp' ),
          'font_family'      => true,
          'font_weight'      => true,
          'subset'           => true,
          'font_style'       => false,
          'font_size'        => true,
          'line_height'      => true,
          'letter_spacing'   => true,
          'text_align'       => true,
          'text_transform'   => true,
          'color'            => false,
          'default' => array(
            'font-family'    => 'inherit',
            'font_size'    => 'inherit',
            'letter_spacing'    => 'inherit',
            'type'           => 'google',
            'unit'           => 'px',
          ),
        ),
        array(
          'id'          => 'copy_clipboard_bg_color',
          'type'        => 'color',
          'title' => __( 'Background Color', 'catcwp' ),
          'output_mode' => 'background-color',
          'default' => '#ffffff'
        ),
        array(
          'id'          => 'copy_clipboard_bg_hover_color',
          'type'        => 'color',
          'title' => __( 'Background Hover Color', 'catcwp' ),
          'output_mode' => 'background-color',
          'default' => ''
        ),
        array(
          'id'      => 'copy_clipboard_color',
          'type'    => 'color',
          'title'   => __( 'Color', 'catcwp' ),
          'default' => '#000000'
        ),
        array(
          'id'      => 'copy_clipboard_hover_color',
          'type'    => 'color',
          'title'   => __( 'Hover Color', 'catcwp' ),
          'default' => ''
        ),
        array(
          'id'               => 'copy_clipboard_padding',
          'type'             => 'spacing',
          'title'            => __( 'Padding', 'catcwp' ),
          'output_mode'      => 'padding',
          'default'          => array(
              'top'    => '0',
              'right'  => '0',
              'bottom' => '0',
              'left'   => '0',
              'unit'   => 'px',
          ),
        ),
        array(
          'id'               => 'copy_clipboard_margin',
          'type'             => 'spacing',
          'title'            => __( 'Margin', 'catcwp' ),
          'output_mode'      => 'margin',
          'default'          => array(
              'top'    => '0',
              'right'  => '0',
              'bottom' => '0',
              'left'   => '0',
              'unit'   => 'px',
          ),
        ),
        array(
          'id'               => 'copy_clipboard_border',
          'type'             => 'border',
          'title'            => __( 'Border', 'catcwp' ),
          'default'          => array(
              'style'  => 'solid',
              'color'  => '#ffffff',
              'top'    => '0',
              'right'  => '0',
              'bottom' => '0',
              'left'   => '0',
              'unit'   => 'px',
          ),
        ),
        array(
            'type'    => 'heading',
            'content' => __( 'Border radius', 'catcwp' ),
        ),
        array(
            'id'      => 'copy_clipboard_border_radius_top',
            'type'    => 'number',
            'unit'    => 'px',
            'default' => '0',
            'title'   => __( 'Top', 'catcwp' ),
        ),
        array(
            'id'      => 'copy_clipboard_border_radius_right',
            'type'    => 'number',
            'unit'    => 'px',
            'default' => '0',
            'title'   => __( 'Right', 'catcwp' ),
        ),
        array(
            'id'      => 'copy_clipboard_border_radius_bottom',
            'type'    => 'number',
            'unit'    => 'px',
            'default' => '0',
            'title'   => __( 'Bottom', 'catcwp' ),
        ),
        array(
            'id'      => 'copy_clipboard_border_radius_left',
            'type'    => 'number',
            'unit'    => 'px',
            'default' => '0',
            'title'   => __( 'Left', 'catcwp' ),
        ),
      )
    ) );
  
}  