<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: map
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'DOMAIN_FOR_SALE_Field_map' ) ) {
  class DOMAIN_FOR_SALE_Field_map extends DOMAIN_FOR_SALE_Fields {

    public $version = '1.9.2';
    public $cdn_url = 'https://cdn.jsdelivr.net/npm/leaflet@';

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $args              = wp_parse_args( $this->field, array(
        'placeholder'    => esc_html__( 'Search...', 'domain-for-sale' ),
        'latitude_text'  => esc_html__( 'Latitude', 'domain-for-sale' ),
        'longitude_text' => esc_html__( 'Longitude', 'domain-for-sale' ),
        'address_field'  => '',
        'height'         => '',
      ) );

      $value             = wp_parse_args( $this->value, array(
        'address'        => '',
        'latitude'       => '20',
        'longitude'      => '0',
        'zoom'           => '2',
      ) );

      $default_settings   = array(
        'center'          => array( $value['latitude'], $value['longitude'] ),
        'zoom'            => $value['zoom'],
        'scrollWheelZoom' => false,
      );

      $settings = ( ! empty( $this->field['settings'] ) ) ? $this->field['settings'] : array();
      $settings = wp_parse_args( $settings, $default_settings );

      $style_attr  = ( ! empty( $args['height'] ) ) ? ' style="min-height:'. esc_attr( $args['height'] ) .';"' : '';
      $placeholder = ( ! empty( $args['placeholder'] ) ) ? array( 'placeholder' => $args['placeholder'] ) : '';

      echo wp_kses_post( $this->field_before() );

      if ( empty( $args['address_field'] ) ) {
        echo '<div class="domain-for-sale--map-search">';
        echo '<input type="text" name="'. esc_attr( $this->field_name( '[address]' ) ) .'" value="'. esc_attr( $value['address'] ) .'"'. $this->field_attributes( $placeholder ) .' />';
        echo '</div>';
      } else {
        echo '<div class="domain-for-sale--address-field" data-address-field="'. esc_attr( $args['address_field'] ) .'"></div>';
      }

      echo '<div class="domain-for-sale--map-osm-wrap"><div class="domain-for-sale--map-osm" data-map="'. esc_attr( json_encode( $settings ) ) .'"'. $style_attr .'></div></div>';

      echo '<div class="domain-for-sale--map-inputs">';

        echo '<div class="domain-for-sale--map-input">';
        echo '<label>'. esc_attr( $args['latitude_text'] ) .'</label>';
        echo '<input type="text" name="'. esc_attr( $this->field_name( '[latitude]' ) ) .'" value="'. esc_attr( $value['latitude'] ) .'" class="domain-for-sale--latitude" />';
        echo '</div>';

        echo '<div class="domain-for-sale--map-input">';
        echo '<label>'. esc_attr( $args['longitude_text'] ) .'</label>';
        echo '<input type="text" name="'. esc_attr( $this->field_name( '[longitude]' ) ) .'" value="'. esc_attr( $value['longitude'] ) .'" class="domain-for-sale--longitude" />';
        echo '</div>';

      echo '</div>';

      echo '<input type="hidden" name="'. esc_attr( $this->field_name( '[zoom]' ) ) .'" value="'. esc_attr( $value['zoom'] ) .'" class="domain-for-sale--zoom" />';

      echo wp_kses_post( $this->field_after() );

    }

    public function enqueue() {

      if ( ! wp_script_is( 'domain-for-sale-leaflet' ) ) {
        wp_enqueue_script( 'domain-for-sale-leaflet', esc_url( $this->cdn_url . $this->version .'/dist/leaflet.js' ), array( 'domain-for-sale' ), $this->version, true );
      }

      if ( ! wp_style_is( 'domain-for-sale-leaflet' ) ) {
        wp_enqueue_style( 'domain-for-sale-leaflet', esc_url( $this->cdn_url . $this->version .'/dist/leaflet.css' ), array(), $this->version );
      }

      if ( ! wp_script_is( 'jquery-ui-autocomplete' ) ) {
        wp_enqueue_script( 'jquery-ui-autocomplete' );
      }

    }

  }
}
