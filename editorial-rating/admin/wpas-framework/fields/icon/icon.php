<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: icon
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'WPAS_Field_icon' ) ) {
  class WPAS_Field_icon extends WPAS_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $args = wp_parse_args( $this->field, array(
        'button_title' => esc_html__( 'Add Icon', 'wpas' ),
        'remove_title' => esc_html__( 'Remove Icon', 'wpas' ),
      ) );

      echo $this->field_before();

      $nonce  = wp_create_nonce( 'wpas_icon_nonce' );
      $hidden = ( empty( $this->value ) ) ? ' hidden' : '';

      echo '<div class="wpas-icon-select">';
      echo '<span class="wpas-icon-preview'. esc_attr( $hidden ) .'"><i class="'. esc_attr( $this->value ) .'"></i></span>';
      echo '<a href="#" class="button button-primary wpas-icon-add" data-nonce="'. esc_attr( $nonce ) .'">'. $args['button_title'] .'</a>';
      echo '<a href="#" class="button wpas-warning-primary wpas-icon-remove'. esc_attr( $hidden ) .'">'. $args['remove_title'] .'</a>';
      echo '<input type="hidden" name="'. esc_attr( $this->field_name() ) .'" value="'. esc_attr( $this->value ) .'" class="wpas-icon-value"'. $this->field_attributes() .' />';
      echo '</div>';

      echo $this->field_after();

    }

    public function enqueue() {
      add_action( 'admin_footer', array( 'WPAS_Field_icon', 'add_footer_modal_icon' ) );
      add_action( 'customize_controls_print_footer_scripts', array( 'WPAS_Field_icon', 'add_footer_modal_icon' ) );
    }

    public static function add_footer_modal_icon() {
    ?>
      <div id="wpas-modal-icon" class="wpas-modal wpas-modal-icon hidden">
        <div class="wpas-modal-table">
          <div class="wpas-modal-table-cell">
            <div class="wpas-modal-overlay"></div>
            <div class="wpas-modal-inner">
              <div class="wpas-modal-title">
                <?php esc_html_e( 'Add Icon', 'wpas' ); ?>
                <div class="wpas-modal-close wpas-icon-close"></div>
              </div>
              <div class="wpas-modal-header">
                <input type="text" placeholder="<?php esc_html_e( 'Search...', 'wpas' ); ?>" class="wpas-icon-search" />
              </div>
              <div class="wpas-modal-content">
                <div class="wpas-modal-loading"><div class="wpas-loading"></div></div>
                <div class="wpas-modal-load"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
    }

  }
}
