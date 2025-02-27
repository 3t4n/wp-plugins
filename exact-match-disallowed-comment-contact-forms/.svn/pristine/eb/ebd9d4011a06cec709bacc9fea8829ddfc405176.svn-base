<?php
// Blocklist Entries List Table class
class Blocklist_Entries_List_Table extends WP_List_Table {

  public function __construct() {
    parent::__construct(array(
      'singular' => 'blocklist-entries',
      'plural'   => 'blocklist-entries',
      'ajax'     => false,
    ));
    
    $this->bulk_action_handler();
    
    $this->prepare_items();
    
    add_action( 'wp_print_scripts', [ __CLASS__, '_list_table_css' ] );
  }

  public function prepare_items() {
    global $wpdb;
    
    $per_page = 20;
    
    $total = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . Blocklist_Manager::$table_entries );
    
    $this->set_pagination_args( array(
      'total_items' => $total,
      'per_page'    => $per_page,
    ) );
    $cur_page = (int) $this->get_pagenum();

    if ( $cur_page == 1 ) {
      $limit = $per_page;
    } else {
      $offset = ($cur_page-1) * $per_page;
      $limit = "$offset,$per_page";
    }

    $this->items = $wpdb->get_results( 'SELECT * FROM ' . Blocklist_Manager::$table_entries . ' ORDER BY id DESC LIMIT ' . $limit );
  }

  public function get_columns() {
    return array(
      'cb'            => '<input type="checkbox" />',
      'source'        => 'Source',
      'content'       => 'Content',
      'ip'            => 'IP',
      'url'           => 'URL',
      'date'          => 'Date',
    );
  }
  
  protected function get_bulk_actions() {
    return array(
      'delete' => 'Delete',
    );
  }

  public static function _list_table_css() {
    ?>
    <style>
      table.blocklist-entries .hidden { display: table-cell !important; }
      table.blocklist-entries .column-content { width: 60%; }
    </style>
    <?php
  }

  public function column_default( $item, $colname ) {
    $item->content = str_replace( array('\n\n', '\r'), '<br>', $item->content );
    $item->content = str_replace( '\n', ' ', $item->content );
    $item->content = str_replace( '\\\\', '\\', $item->content );
    return isset( $item->$colname ) ? $item->$colname : print_r( $item, 1 );
  }

  public function column_cb( $item ) {
    echo '<input type="checkbox" name="licids[]" id="cb-select-'. $item->id .'" value="'. $item->id .'" />';
  }
  
  private function bulk_action_handler() {
    if( empty($_POST['licids']) || empty($_POST['_wpnonce']) ) return;
    
    if ( ! $action = $this->current_action() ) return;
    
    if( ! wp_verify_nonce( $_POST['_wpnonce'], 'bulk-' . $this->_args['plural'] ) )
      wp_die('nonce error');
    
    if( $action == 'delete' ) {
      global $wpdb;
      foreach ( $_POST['licids'] as $id ) {
        $id = (int) $id;
        $wpdb->delete( Blocklist_Manager::$table_entries, array( 'id' => $id ), array( '%d' ) );
      }
    }
  }
  
}
