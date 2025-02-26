<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: backup
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'DOMAIN_FOR_SALE_Field_backup' ) ) {
  class DOMAIN_FOR_SALE_Field_backup extends DOMAIN_FOR_SALE_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $unique = $this->unique;
      $nonce  = wp_create_nonce( 'DOMAIN_FOR_SALE_backup_nonce' );
      $export = add_query_arg( array( 'action' => 'domain-for-sale-export', 'unique' => $unique, 'nonce' => $nonce ), admin_url( 'admin-ajax.php' ) );

      echo wp_kses_post( $this->field_before() );

      echo '<textarea name="DOMAIN_FOR_SALE_import_data" class="domain-for-sale-import-data"></textarea>';
      echo '<button type="submit" class="button button-primary domain-for-sale-confirm domain-for-sale-import" data-unique="'. esc_attr( $unique ) .'" data-nonce="'. esc_attr( $nonce ) .'">'. esc_html__( 'Import', 'domain-for-sale' ) .'</button>';
      echo '<hr />';
      echo '<textarea readonly="readonly" class="domain-for-sale-export-data">'. esc_attr( json_encode( get_option( $unique ) ) ) .'</textarea>';
      echo '<a href="'. esc_url( $export ) .'" class="button button-primary domain-for-sale-export" target="_blank">'. esc_html__( 'Export & Download', 'domain-for-sale' ) .'</a>';
      echo '<hr />';
      echo '<button type="submit" name="DOMAIN_FOR_SALE_transient[reset]" value="reset" class="button domain-for-sale-warning-primary domain-for-sale-confirm domain-for-sale-reset" data-unique="'. esc_attr( $unique ) .'" data-nonce="'. esc_attr( $nonce ) .'">'. esc_html__( 'Reset', 'domain-for-sale' ) .'</button>';

      echo wp_kses_post( $this->field_after() );

    }

  }
}
