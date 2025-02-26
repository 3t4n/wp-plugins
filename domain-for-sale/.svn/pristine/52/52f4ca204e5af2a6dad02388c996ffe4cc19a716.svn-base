<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: icon
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'DOMAIN_FOR_SALE_Field_icon' ) ) {
  class DOMAIN_FOR_SALE_Field_icon extends DOMAIN_FOR_SALE_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $args = wp_parse_args( $this->field, array(
        'button_title' => esc_html__( 'Add Icon', 'domain-for-sale' ),
        'remove_title' => esc_html__( 'Remove Icon', 'domain-for-sale' ),
      ) );

      echo wp_kses_post( $this->field_before() );

      $nonce  = wp_create_nonce( 'DOMAIN_FOR_SALE_icon_nonce' );
      $hidden = ( empty( $this->value ) ) ? ' hidden' : '';

      echo '<div class="domain-for-sale-icon-select">';
      echo '<span class="domain-for-sale-icon-preview'. esc_attr( $hidden ) .'"><i class="'. esc_attr( $this->value ) .'"></i></span>';
      echo '<a href="#" class="button button-primary domain-for-sale-icon-add" data-nonce="'. esc_attr( $nonce ) .'">'. $args['button_title'] .'</a>';
      echo '<a href="#" class="button domain-for-sale-warning-primary domain-for-sale-icon-remove'. esc_attr( $hidden ) .'">'. $args['remove_title'] .'</a>';
      echo '<input type="hidden" name="'. esc_attr( $this->field_name() ) .'" value="'. esc_attr( $this->value ) .'" class="domain-for-sale-icon-value"'. $this->field_attributes() .' />';
      echo '</div>';

      echo wp_kses_post( $this->field_after() );

    }

    public function enqueue() {
      add_action( 'admin_footer', array( 'DOMAIN_FOR_SALE_Field_icon', 'add_footer_modal_icon' ) );
      add_action( 'customize_controls_print_footer_scripts', array( 'DOMAIN_FOR_SALE_Field_icon', 'add_footer_modal_icon' ) );
    }

    public static function add_footer_modal_icon() {
    ?>
      <div id="domain-for-sale-modal-icon" class="domain-for-sale-modal domain-for-sale-modal-icon hidden">
        <div class="domain-for-sale-modal-table">
          <div class="domain-for-sale-modal-table-cell">
            <div class="domain-for-sale-modal-overlay"></div>
            <div class="domain-for-sale-modal-inner">
              <div class="domain-for-sale-modal-title">
                <?php esc_html_e( 'Add Icon', 'domain-for-sale' ); ?>
                <div class="domain-for-sale-modal-close domain-for-sale-icon-close"></div>
              </div>
              <div class="domain-for-sale-modal-header">
                <input type="text" placeholder="<?php esc_html_e( 'Search...', 'domain-for-sale' ); ?>" class="domain-for-sale-icon-search" />
              </div>
              <div class="domain-for-sale-modal-content">
                <div class="domain-for-sale-modal-loading"><div class="domain-for-sale-loading"></div></div>
                <div class="domain-for-sale-modal-load"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php
    }

  }
}
