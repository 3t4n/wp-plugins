<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: background
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
use ThemeAtelier\DomainForSale\Admin\Framework\Classes\DOMAIN_FOR_SALE;

if ( ! class_exists( 'DOMAIN_FOR_SALE_Field_background' ) ) {
  class DOMAIN_FOR_SALE_Field_background extends DOMAIN_FOR_SALE_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $args                             = wp_parse_args( $this->field, array(
        'background_color'              => true,
        'background_image'              => true,
        'background_position'           => true,
        'background_repeat'             => true,
        'background_attachment'         => true,
        'background_size'               => true,
        'background_origin'             => false,
        'background_clip'               => false,
        'background_blend_mode'         => false,
        'background_gradient'           => false,
        'background_gradient_color'     => true,
        'background_gradient_direction' => true,
        'background_image_preview'      => true,
        'background_auto_attributes'    => false,
        'compact'                       => false,
        'background_image_library'      => 'image',
        'background_image_placeholder'  => esc_html__( 'Not selected', 'domain-for-sale' ),
      ) );

      if ( $args['compact'] ) {
        $args['background_color']           = false;
        $args['background_auto_attributes'] = true;
      }

      $default_value                    = array(
        'background-color'              => '',
        'background-image'              => '',
        'background-position'           => '',
        'background-repeat'             => '',
        'background-attachment'         => '',
        'background-size'               => '',
        'background-origin'             => '',
        'background-clip'               => '',
        'background-blend-mode'         => '',
        'background-gradient-color'     => '',
        'background-gradient-direction' => '',
      );

      $default_value = ( ! empty( $this->field['default'] ) ) ? wp_parse_args( $this->field['default'], $default_value ) : $default_value;

      $this->value = wp_parse_args( $this->value, $default_value );

      echo wp_kses_post( $this->field_before() );

      echo '<div class="domain-for-sale--background-colors">';

      //
      // Background Color
      if ( ! empty( $args['background_color'] ) ) {

        echo '<div class="domain-for-sale--color">';

        echo ( ! empty( $args['background_gradient'] ) ) ? '<div class="domain-for-sale--title">'. esc_html__( 'From', 'domain-for-sale' ) .'</div>' : '';

        DOMAIN_FOR_SALE::field( array(
          'id'      => 'background-color',
          'type'    => 'color',
          'default' => $default_value['background-color'],
        ), $this->value['background-color'], $this->field_name(), 'field/background' );

        echo '</div>';

      }

      //
      // Background Gradient Color
      if ( ! empty( $args['background_gradient_color'] ) && ! empty( $args['background_gradient'] ) ) {

        echo '<div class="domain-for-sale--color">';

        echo ( ! empty( $args['background_gradient'] ) ) ? '<div class="domain-for-sale--title">'. esc_html__( 'To', 'domain-for-sale' ) .'</div>' : '';

        DOMAIN_FOR_SALE::field( array(
          'id'      => 'background-gradient-color',
          'type'    => 'color',
          'default' => $default_value['background-gradient-color'],
        ), $this->value['background-gradient-color'], $this->field_name(), 'field/background' );

        echo '</div>';

      }

      //
      // Background Gradient Direction
      if ( ! empty( $args['background_gradient_direction'] ) && ! empty( $args['background_gradient'] ) ) {

        echo '<div class="domain-for-sale--color">';

        echo ( ! empty( $args['background_gradient'] ) ) ? '<div class="domain-for-sale---title">'. esc_html__( 'Direction', 'domain-for-sale' ) .'</div>' : '';

        DOMAIN_FOR_SALE::field( array(
          'id'          => 'background-gradient-direction',
          'type'        => 'select',
          'options'     => array(
            ''          => esc_html__( 'Gradient Direction', 'domain-for-sale' ),
            'to bottom' => esc_html__( '&#8659; top to bottom', 'domain-for-sale' ),
            'to right'  => esc_html__( '&#8658; left to right', 'domain-for-sale' ),
            '135deg'    => esc_html__( '&#8664; corner top to right', 'domain-for-sale' ),
            '-135deg'   => esc_html__( '&#8665; corner top to left', 'domain-for-sale' ),
          ),
        ), $this->value['background-gradient-direction'], $this->field_name(), 'field/background' );

        echo '</div>';

      }

      echo '</div>';

      //
      // Background Image
      if ( ! empty( $args['background_image'] ) ) {

        echo '<div class="domain-for-sale--background-image">';

        DOMAIN_FOR_SALE::field( array(
          'id'          => 'background-image',
          'type'        => 'media',
          'class'       => 'domain-for-sale-assign-field-background',
          'library'     => $args['background_image_library'],
          'preview'     => $args['background_image_preview'],
          'placeholder' => $args['background_image_placeholder'],
          'attributes'  => array( 'data-depend-id' => $this->field['id'] ),
        ), $this->value['background-image'], $this->field_name(), 'field/background' );

        echo '</div>';

      }

      $auto_class   = ( ! empty( $args['background_auto_attributes'] ) ) ? ' domain-for-sale--auto-attributes' : '';
      $hidden_class = ( ! empty( $args['background_auto_attributes'] ) && empty( $this->value['background-image']['url'] ) ) ? ' domain-for-sale--attributes-hidden' : '';

      echo '<div class="domain-for-sale--background-attributes'. esc_attr( $auto_class . $hidden_class ) .'">';

      //
      // Background Position
      if ( ! empty( $args['background_position'] ) ) {

        DOMAIN_FOR_SALE::field( array(
          'id'              => 'background-position',
          'type'            => 'select',
          'options'         => array(
            ''              => esc_html__( 'Background Position', 'domain-for-sale' ),
            'left top'      => esc_html__( 'Left Top', 'domain-for-sale' ),
            'left center'   => esc_html__( 'Left Center', 'domain-for-sale' ),
            'left bottom'   => esc_html__( 'Left Bottom', 'domain-for-sale' ),
            'center top'    => esc_html__( 'Center Top', 'domain-for-sale' ),
            'center center' => esc_html__( 'Center Center', 'domain-for-sale' ),
            'center bottom' => esc_html__( 'Center Bottom', 'domain-for-sale' ),
            'right top'     => esc_html__( 'Right Top', 'domain-for-sale' ),
            'right center'  => esc_html__( 'Right Center', 'domain-for-sale' ),
            'right bottom'  => esc_html__( 'Right Bottom', 'domain-for-sale' ),
          ),
        ), $this->value['background-position'], $this->field_name(), 'field/background' );

      }

      //
      // Background Repeat
      if ( ! empty( $args['background_repeat'] ) ) {

        DOMAIN_FOR_SALE::field( array(
          'id'          => 'background-repeat',
          'type'        => 'select',
          'options'     => array(
            ''          => esc_html__( 'Background Repeat', 'domain-for-sale' ),
            'repeat'    => esc_html__( 'Repeat', 'domain-for-sale' ),
            'no-repeat' => esc_html__( 'No Repeat', 'domain-for-sale' ),
            'repeat-x'  => esc_html__( 'Repeat Horizontally', 'domain-for-sale' ),
            'repeat-y'  => esc_html__( 'Repeat Vertically', 'domain-for-sale' ),
          ),
        ), $this->value['background-repeat'], $this->field_name(), 'field/background' );

      }

      //
      // Background Attachment
      if ( ! empty( $args['background_attachment'] ) ) {

        DOMAIN_FOR_SALE::field( array(
          'id'       => 'background-attachment',
          'type'     => 'select',
          'options'  => array(
            ''       => esc_html__( 'Background Attachment', 'domain-for-sale' ),
            'scroll' => esc_html__( 'Scroll', 'domain-for-sale' ),
            'fixed'  => esc_html__( 'Fixed', 'domain-for-sale' ),
          ),
        ), $this->value['background-attachment'], $this->field_name(), 'field/background' );

      }

      //
      // Background Size
      if ( ! empty( $args['background_size'] ) ) {

        DOMAIN_FOR_SALE::field( array(
          'id'        => 'background-size',
          'type'      => 'select',
          'options'   => array(
            ''        => esc_html__( 'Background Size', 'domain-for-sale' ),
            'cover'   => esc_html__( 'Cover', 'domain-for-sale' ),
            'contain' => esc_html__( 'Contain', 'domain-for-sale' ),
            'auto'    => esc_html__( 'Auto', 'domain-for-sale' ),
          ),
        ), $this->value['background-size'], $this->field_name(), 'field/background' );

      }

      //
      // Background Origin
      if ( ! empty( $args['background_origin'] ) ) {

        DOMAIN_FOR_SALE::field( array(
          'id'            => 'background-origin',
          'type'          => 'select',
          'options'       => array(
            ''            => esc_html__( 'Background Origin', 'domain-for-sale' ),
            'padding-box' => esc_html__( 'Padding Box', 'domain-for-sale' ),
            'border-box'  => esc_html__( 'Border Box', 'domain-for-sale' ),
            'content-box' => esc_html__( 'Content Box', 'domain-for-sale' ),
          ),
        ), $this->value['background-origin'], $this->field_name(), 'field/background' );

      }

      //
      // Background Clip
      if ( ! empty( $args['background_clip'] ) ) {

        DOMAIN_FOR_SALE::field( array(
          'id'            => 'background-clip',
          'type'          => 'select',
          'options'       => array(
            ''            => esc_html__( 'Background Clip', 'domain-for-sale' ),
            'border-box'  => esc_html__( 'Border Box', 'domain-for-sale' ),
            'padding-box' => esc_html__( 'Padding Box', 'domain-for-sale' ),
            'content-box' => esc_html__( 'Content Box', 'domain-for-sale' ),
          ),
        ), $this->value['background-clip'], $this->field_name(), 'field/background' );

      }

      //
      // Background Blend Mode
      if ( ! empty( $args['background_blend_mode'] ) ) {

        DOMAIN_FOR_SALE::field( array(
          'id'            => 'background-blend-mode',
          'type'          => 'select',
          'options'       => array(
            ''            => esc_html__( 'Background Blend Mode', 'domain-for-sale' ),
            'normal'      => esc_html__( 'Normal', 'domain-for-sale' ),
            'multiply'    => esc_html__( 'Multiply', 'domain-for-sale' ),
            'screen'      => esc_html__( 'Screen', 'domain-for-sale' ),
            'overlay'     => esc_html__( 'Overlay', 'domain-for-sale' ),
            'darken'      => esc_html__( 'Darken', 'domain-for-sale' ),
            'lighten'     => esc_html__( 'Lighten', 'domain-for-sale' ),
            'color-dodge' => esc_html__( 'Color Dodge', 'domain-for-sale' ),
            'saturation'  => esc_html__( 'Saturation', 'domain-for-sale' ),
            'color'       => esc_html__( 'Color', 'domain-for-sale' ),
            'luminosity'  => esc_html__( 'Luminosity', 'domain-for-sale' ),
          ),
        ), $this->value['background-blend-mode'], $this->field_name(), 'field/background' );

      }

      echo '</div>';

      echo wp_kses_post( $this->field_after() );

    }

    public function output() {

      $output    = '';
      $bg_image  = array();
      $important = ( ! empty( $this->field['output_important'] ) ) ? '!important' : '';
      $element   = ( is_array( $this->field['output'] ) ) ? join( ',', $this->field['output'] ) : $this->field['output'];

      // Background image and gradient
      $background_color        = ( ! empty( $this->value['background-color']              ) ) ? $this->value['background-color']              : '';
      $background_gd_color     = ( ! empty( $this->value['background-gradient-color']     ) ) ? $this->value['background-gradient-color']     : '';
      $background_gd_direction = ( ! empty( $this->value['background-gradient-direction'] ) ) ? $this->value['background-gradient-direction'] : '';
      $background_image        = ( ! empty( $this->value['background-image']['url']       ) ) ? $this->value['background-image']['url']       : '';


      if ( $background_color && $background_gd_color ) {
        $gd_direction   = ( $background_gd_direction ) ? $background_gd_direction .',' : '';
        $bg_image[] = 'linear-gradient('. $gd_direction . $background_color .','. $background_gd_color .')';
        unset( $this->value['background-color'] );
      }

      if ( $background_image ) {
        $bg_image[] = 'url('. $background_image .')';
      }

      if ( ! empty( $bg_image ) ) {
        $output .= 'background-image:'. implode( ',', $bg_image ) . $important .';';
      }

      // Common background properties
      $properties = array( 'color', 'position', 'repeat', 'attachment', 'size', 'origin', 'clip', 'blend-mode' );

      foreach ( $properties as $property ) {
        $property = 'background-'. $property;
        if ( ! empty( $this->value[$property] ) ) {
          $output .= $property .':'. $this->value[$property] . $important .';';
        }
      }

      if ( $output ) {
        $output = $element .'{'. $output .'}';
      }

      $this->parent->output_css .= $output;

      return $output;

    }

  }
}
