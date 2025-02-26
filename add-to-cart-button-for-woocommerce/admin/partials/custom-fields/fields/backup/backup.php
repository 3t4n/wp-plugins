<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: backup
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'ATCBW_Field_backup' ) ) {
  class ATCBW_Field_backup extends ATCBW_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $unique = $this->unique;
      $nonce  = wp_create_nonce( 'atcbw_backup_nonce' );
      $export = add_query_arg( array( 'action' => 'atcbw-export', 'unique' => $unique, 'nonce' => $nonce ), admin_url( 'admin-ajax.php' ) );

      echo $this->field_before();

      echo '<textarea name="atcbw_import_data" class="atcbw-import-data"></textarea>';
      echo '<button type="submit" class="button button-primary atcbw-confirm atcbw-import" data-unique="'. esc_attr( $unique ) .'" data-nonce="'. esc_attr( $nonce ) .'">'. esc_html__( 'Import', 'atcbw' ) .'</button>';
      echo '<hr />';
      echo '<textarea readonly="readonly" class="atcbw-export-data">'. esc_attr( json_encode( get_option( $unique ) ) ) .'</textarea>';
      echo '<a href="'. esc_url( $export ) .'" class="button button-primary atcbw-export" target="_blank">'. esc_html__( 'Export & Download', 'atcbw' ) .'</a>';
      echo '<hr />';
      echo '<button type="submit" name="atcbw_transient[reset]" value="reset" class="button atcbw-warning-primary atcbw-confirm atcbw-reset" data-unique="'. esc_attr( $unique ) .'" data-nonce="'. esc_attr( $nonce ) .'">'. esc_html__( 'Reset', 'atcbw' ) .'</button>';

      echo $this->field_after();

    }

  }
}
