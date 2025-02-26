<?php
/**
 *
 * Field: repeater
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
use ThemeAtelier\DomainForSale\Admin\Framework\Classes\DOMAIN_FOR_SALE;

if ( ! class_exists( 'DOMAIN_FOR_SALE_Field_repeater' ) ) {
  class DOMAIN_FOR_SALE_Field_repeater extends DOMAIN_FOR_SALE_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $args = wp_parse_args( $this->field, array(
        'max'          => 0,
        'min'          => 0,
        'button_title' => '<i class="icofont-plus"></i>',
      ) );

      if ( preg_match( '/'. preg_quote( '['. $this->field['id'] .']' ) .'/', $this->unique ) ) {

        echo '<div class="domain-for-sale-notice domain-for-sale-notice-danger">'. esc_html__( 'Error: Field ID conflict.', 'domain-for-sale' ) .'</div>';

      } else {

        echo wp_kses_post( $this->field_before() );

        echo '<div class="domain-for-sale-repeater-item domain-for-sale-repeater-hidden" data-depend-id="'. esc_attr( $this->field['id'] ) .'">';
        echo '<div class="domain-for-sale-repeater-content">';
        foreach ( $this->field['fields'] as $field ) {

          $field_default = ( isset( $field['default'] ) ) ? $field['default'] : '';
          $field_unique  = ( ! empty( $this->unique ) ) ? $this->unique .'['. $this->field['id'] .'][0]' : $this->field['id'] .'[0]';

          DOMAIN_FOR_SALE::field( $field, $field_default, '___'. $field_unique, 'field/repeater' );

        }
        echo '</div>';
        echo '<div class="domain-for-sale-repeater-helper">';
        echo '<div class="domain-for-sale-repeater-helper-inner">';
        echo '<i class="domain-for-sale-repeater-sort icofont-drag"></i>';
        echo '<i class="domain-for-sale-repeater-clone icofont-copy-invert"></i>';
        echo '<i class="domain-for-sale-repeater-remove domain-for-sale-confirm icofont-close" data-confirm="'. esc_html__( 'Are you sure to delete this item?', 'domain-for-sale' ) .'"></i>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

        echo '<div class="domain-for-sale-repeater-wrapper domain-for-sale-data-wrapper" data-field-id="['. esc_attr( $this->field['id'] ) .']" data-max="'. esc_attr( $args['max'] ) .'" data-min="'. esc_attr( $args['min'] ) .'">';

        if ( ! empty( $this->value ) && is_array( $this->value ) ) {

          $num = 0;

          foreach ( $this->value as $key => $value ) {

            echo '<div class="domain-for-sale-repeater-item">';
            echo '<div class="domain-for-sale-repeater-content">';
            foreach ( $this->field['fields'] as $field ) {

              $field_unique = ( ! empty( $this->unique ) ) ? $this->unique .'['. $this->field['id'] .']['. $num .']' : $this->field['id'] .'['. $num .']';
              $field_value  = ( isset( $field['id'] ) && isset( $this->value[$key][$field['id']] ) ) ? $this->value[$key][$field['id']] : '';

              DOMAIN_FOR_SALE::field( $field, $field_value, $field_unique, 'field/repeater' );

            }
            echo '</div>';
            echo '<div class="domain-for-sale-repeater-helper">';
            echo '<div class="domain-for-sale-repeater-helper-inner">';
            echo '<i class="domain-for-sale-repeater-sort icofont-drag"></i>';
            echo '<i class="domain-for-sale-repeater-clone icofont-copy-invert"></i>';
            echo '<i class="domain-for-sale-repeater-remove domain-for-sale-confirm icofont-close" data-confirm="'. esc_html__( 'Are you sure to delete this item?', 'domain-for-sale' ) .'"></i>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            $num++;

          }

        }

        echo '</div>';

        echo '<div class="domain-for-sale-repeater-alert domain-for-sale-repeater-max">'. esc_html__( 'You cannot add more.', 'domain-for-sale' ) .'</div>';
        echo '<div class="domain-for-sale-repeater-alert domain-for-sale-repeater-min">'. esc_html__( 'You cannot remove more.', 'domain-for-sale' ) .'</div>';
        echo '<a href="#" class="button button-primary domain-for-sale-repeater-add">'. $args['button_title'] .'</a>';

        echo wp_kses_post( $this->field_after() );

      }

    }

    public function enqueue() {

      if ( ! wp_script_is( 'jquery-ui-sortable' ) ) {
        wp_enqueue_script( 'jquery-ui-sortable' );
      }

    }

  }
}
