<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: backup
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'WPAS_Field_backup' ) ) {
  class WPAS_Field_backup extends WPAS_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $unique = $this->unique;
      $nonce  = wp_create_nonce( 'wpas_backup_nonce' );
      $export = add_query_arg( array( 'action' => 'wpas-export', 'unique' => $unique, 'nonce' => $nonce ), admin_url( 'admin-ajax.php' ) );

      echo $this->field_before();

      echo '<textarea name="wpas_import_data" class="wpas-import-data"></textarea>';
      echo '<button type="submit" class="button button-primary wpas-confirm wpas-import" data-unique="'. esc_attr( $unique ) .'" data-nonce="'. esc_attr( $nonce ) .'">'. esc_html__( 'Import', 'wpas' ) .'</button>';
      echo '<hr />';
      echo '<textarea readonly="readonly" class="wpas-export-data">'. esc_attr( json_encode( get_option( $unique ) ) ) .'</textarea>';
      echo '<a href="'. esc_url( $export ) .'" class="button button-primary wpas-export" target="_blank">'. esc_html__( 'Export & Download', 'wpas' ) .'</a>';
      echo '<hr />';
      echo '<button type="submit" name="wpas_transient[reset]" value="reset" class="button wpas-warning-primary wpas-confirm wpas-reset" data-unique="'. esc_attr( $unique ) .'" data-nonce="'. esc_attr( $nonce ) .'">'. esc_html__( 'Reset', 'wpas' ) .'</button>';

      echo $this->field_after();

    }

  }
}
