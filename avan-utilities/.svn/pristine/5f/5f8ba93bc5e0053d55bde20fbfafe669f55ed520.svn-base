<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Field: backup
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! class_exists( 'AVAN_Field_backup' ) ) {
  class AVAN_Field_backup extends AVAN_Fields {

    public function __construct( $field, $value = '', $unique = '', $where = '', $parent = '' ) {
      parent::__construct( $field, $value, $unique, $where, $parent );
    }

    public function render() {

      $unique = $this->unique;
      $nonce  = wp_create_nonce( 'avan_backup_nonce' );
      $export = add_query_arg( array( 'action' => 'avan-export', 'unique' => $unique, 'nonce' => $nonce ), admin_url( 'admin-ajax.php' ) );

      echo $this->field_before();

      echo '<textarea name="avan_import_data" class="avan-import-data"></textarea>';
      echo '<button type="submit" class="button button-primary avan-confirm avan-import" data-unique="'. esc_attr( $unique ) .'" data-nonce="'. esc_attr( $nonce ) .'">'. esc_html__( 'Import', 'avutilang' ) .'</button>';
      echo '<hr />';
      echo '<textarea readonly="readonly" class="avan-export-data">'. esc_attr( json_encode( get_option( $unique ) ) ) .'</textarea>';
      echo '<a href="'. esc_url( $export ) .'" class="button button-primary avan-export" target="_blank">'. esc_html__( 'Export & Download', 'avutilang' ) .'</a>';
      echo '<hr />';
      echo '<button type="submit" name="avan_transient[reset]" value="reset" class="button avan-warning-primary avan-confirm avan-reset" data-unique="'. esc_attr( $unique ) .'" data-nonce="'. esc_attr( $nonce ) .'">'. esc_html__( 'Reset', 'avutilang' ) .'</button>';

      echo $this->field_after();

    }

  }
}
