<?php
add_action( 'admin_menu', 'createMyMenus');
function createMyMenus() {
add_users_page('Users Pending Approval','Users Pending Approval','manage_options','panding-new-users','bpsfw_callback_panding');
add_users_page('Approved Users','Approved Users','manage_options','approve-new-users','bpsfw_callback_approvel');
add_users_page( 'Denied Users','Denied Users','manage_options','denied-new-users','bpsfw_callback_denied');
}

function bpsfw_callback_panding( ){
$exampleListTable = new pafw_panding_List_Table();
$exampleListTable->prepare_items();                  
?>
<div class="bpsfw-container">
  <div class="wrap">
    <h2>User Registration Approval</h2>                  
  </div>
  <form  method="post">
    <?php
      $page  = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS );
      $paged = filter_input( INPUT_GET, 'paged', FILTER_SANITIZE_NUMBER_INT );

      printf( '<input type="hidden" name="page" value="%s" />', $page );
      printf( '<input type="hidden" name="paged" value="%d" />', $paged ); 
    ?>
    <?php $exampleListTable->display(); ?>
  </form>
</div>
<?php
}    

function bpsfw_callback_approvel(){
$exampleListTable = new pafw_approve_List_Table();
$exampleListTable->prepare_items();
?>
<div class="bpsfw-container">
  <div class="wrap">
    <h2>Approved Users</h2>                  
  </div>
  <form  method="post">
    <?php
      $page  = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS );
      $paged = filter_input( INPUT_GET, 'paged', FILTER_SANITIZE_NUMBER_INT );

      printf( '<input type="hidden" name="page" value="%s" />', $page );
      printf( '<input type="hidden" name="paged" value="%d" />', $paged ); 
    ?>
    <?php $exampleListTable->display(); ?>
  </form>
</div>
<?php 
}

function bpsfw_callback_denied(){
$exampleListTable = new pafw_denied_List_Table();
$exampleListTable->prepare_items();      
?>
<div class="bpsfw-container">
  <div class="wrap">
    <h2>Denied Users</h2>                  
  </div>
  <form  method="post">
    <?php
      $page  = filter_input( INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS );
      $paged = filter_input( INPUT_GET, 'paged', FILTER_SANITIZE_NUMBER_INT );
      printf( '<input type="hidden" name="page" value="%s" />', $page );
      printf( '<input type="hidden" name="paged" value="%d" />', $paged ); 
    ?>
    <?php $exampleListTable->display(); ?>
  </form>
</div>
<?php
}

if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
class pafw_approve_List_Table extends WP_List_Table {
  public function __construct() {
    parent::__construct(
      array(
          'singular' => 'singular_form',
          'plural'   => 'plural_form',
          'ajax'     => false
      )
    );
  }


  public function prepare_items() {
    $columns = $this->get_columns();
    $hidden = $this->get_hidden_columns();
    $sortable = $this->get_sortable_columns();
    $data = $this->table_data();
    //usort( $data, array( &$this, 'sort_data' ) );
    $perPage = 5;
    $currentPage = $this->get_pagenum();
    $totalItems = count($data);
    $this->set_pagination_args( array(
      'total_items' => $totalItems,
      'per_page'    => $perPage
    ));
    $data = array_slice($data,(($currentPage-1)*$perPage),$perPage);
    $this->_column_headers = array($columns, $hidden, $sortable);
    $this->items = $data;
    $this->process_bulk_action();
  }

  public function get_columns() {
    $columns = array(
      'id'     => 'ID',
      'title'  => 'Users Name',
      'email'  => 'E-mail',
      'role'   => 'User Role',
      'action' => 'Action',
    );
    return $columns;
  }

  public function get_hidden_columns() {
    return array();
  }

  public function get_sortable_columns() {
    return array('id' => array('id', false));
  }

  private function table_data() {
    $data = array();
      $q = new WP_User_Query( 
        array(
          'orderby'  => 'ID',
          'wp_user'   => array(
          'relation'  => 'AND',
          )
        ) 
    );
    $user_query = $q->results;
    foreach ($user_query as $value) {
      $user_info = get_user_meta($value->ID);
      if (isset($user_info['approval_confirmation']['0'])) {
        if($user_info['approval_confirmation']['0'] == 'confirm_approve'){
          $data[] = array(
            'id'    => $value->ID,
            'title' =>  get_avatar($value->user_email).'<a href='. get_edit_user_link( $value->ID ).'>'.$value->display_name.'</a>',
            'email' => '<a href=mailto:'. $value->user_email.'>'. $value->user_email.'</a>' ,
            'role' => $value->roles['0'],
            'action'=>'action',          
          );
        }  
      }
    }
    if ($user_query != 'administrator') {
      return $data;
    }        
  }

  public function column_default( $item, $column_name ) {
  	 	$action_nonce = wp_create_nonce( 'approve_deny_action' );
    $denied_link =  get_option( 'siteurl' ) . '?action=approve_to_denied&user=' . $item['id'] . '&nonce=' . $action_nonce ;
      switch( $column_name ) {
        case 'id':
          return $item['id'];
        case 'title':
          return $item['title'];
        case 'email':
          return $item['email'];
        case 'role':
          return $item['role'];            
        case 'action':
        $user = new WP_User( $item['id'] );           
        if($user->roles['0'] == 'administrator'){     
          return false;
        }    
        return '<a class="button" href="'.$denied_link.'">Deny</a>';
        default:
        return print_r( $item, true ) ;
      }
  }

  function column_cb($item) {
    return sprintf(
      '<input type="checkbox" name="id[]" value="%s" />', $item['id']
    );    
  }
}

class pafw_denied_List_Table extends WP_List_Table {
  public function __construct() {
    parent::__construct(
      array(
          'singular' => 'singular_form',
          'plural'   => 'plural_form',
          'ajax'     => false
      )
    );
  }


  public function prepare_items() {
    $columns = $this->get_columns();
    $hidden = $this->get_hidden_columns();
    $sortable = $this->get_sortable_columns();
    $data = $this->table_data();
    usort( $data, array( &$this, 'sort_data' ) );
    $perPage = 5;
    $currentPage = $this->get_pagenum();
    $totalItems = count($data);
    $this->set_pagination_args( array(
      'total_items' => $totalItems,
      'per_page'    => $perPage
    ));
    $data = array_slice($data,(($currentPage-1)*$perPage),$perPage);
    $this->_column_headers = array($columns, $hidden, $sortable);
    $this->items = $data;
    $this->process_bulk_action();
  }
 

  public function get_columns() {
    $columns = array(
      'id'     => 'ID',
      'title'  => 'Users Name',
      'email'  => 'E-mail',
      'role'   => 'User Role',
      'action' => 'Action',
    );
    return $columns;
  }
 

  public function get_hidden_columns() {
    return array();
  }


  public function get_sortable_columns() {
    return array('id' => array('id', false));
  }


  private function table_data() {
    $data = array();
    $q = new WP_User_Query( 
      array(
        'orderby'  => 'ID',
        'wp_user'    => array(
            'relation'  => 'AND',
        )
      ) 
    );
    $user_query = $q->results;
    foreach ($user_query as $value) {
      $user_info = get_user_meta($value->ID);
      if (isset($user_info['approval_confirmation']['0'])) {  
        if($user_info['approval_confirmation']['0'] == 'denied_user'){
          $data[] = array(
            'id'    => $value->ID,
            'title' =>  get_avatar($value->user_email).'<a href='. get_edit_user_link( $value->ID ).'>'.$value->display_name.'</a>',
            'email' => '<a href=mailto:'. $value->user_email.'>'. $value->user_email.'</a>' ,
            'role' => $value->roles['0'],
            'action'=>'action',          
          );
        }
      }
    }
    return $data;
  }
 

  public function column_default( $item, $column_name ) {
  	$action_nonce = wp_create_nonce( 'approve_deny_action' );

    $approve_link =  get_option( 'siteurl' ) . '?action=denied_to_approve&user=' . $item['id'] . '&nonce=' . $action_nonce ;
    switch( $column_name ) {
      case 'id':
        return $item['id'];
      case 'title':
        return $item['title'];
      case 'email':
        return $item['email'];
      case 'role':
        return $item['role'];
      case 'action':                
        return '<a class="button" href="'.$approve_link.'">Approve</a>';    
      default:
        return print_r( $item, true ) ;
    }
  }


  function column_cb($item) {
    return sprintf(
      '<input type="checkbox" name="id[]" value="%s" />', $item['id']
    );    
  }
}

class pafw_panding_List_Table extends WP_List_Table {
  public function __construct() {
    parent::__construct(
      array(
        'singular' => 'singular_form',
        'plural'   => 'plural_form',
        'ajax'     => false
      )
    );
  }


  public function prepare_items() {
    $columns = $this->get_columns();
    $hidden = $this->get_hidden_columns();
    $sortable = $this->get_sortable_columns();
    $data = $this->table_data();
    usort( $data, array( &$this, 'sort_data' ) );
    $perPage = 5;
    $currentPage = $this->get_pagenum();
    $totalItems = count($data);
    $this->set_pagination_args( array(
      'total_items' => $totalItems,
      'per_page'    => $perPage
    ));
    $data = array_slice($data,(($currentPage-1)*$perPage),$perPage);
    $this->_column_headers = array($columns, $hidden, $sortable);
    $this->items = $data;
    $this->process_bulk_action();
  }
 

  public function get_columns() {
    $columns = array(
      'id'     => 'ID',
      'title'  => 'Users Name',
      'email'  => 'E-mail',
      'role'   => 'User Role',
      'action' => 'Action',
    );
    return $columns;
  }
 

  public function get_hidden_columns() {
    return array();
  }


  public function get_sortable_columns() {
    return array('id' => array('id', false));
  }


  private function table_data() {
    $data = array();
    $q = new WP_User_Query( 
      array(
        'orderby'  => 'ID',
        'wp_user'    => array(
            'relation'  => 'AND',                 
        )
      ) 
    );
    $user_query = $q->results;
    foreach ($user_query as $value) {
      $user_info = get_user_meta($value->ID);
      if (isset($user_info['approval_confirmation']['0'])) {
        if($user_info['approval_confirmation']['0'] == 'not_confirm_approve'){
          $data[] = array(
            'id'    => $value->ID,
            'title' =>  get_avatar($value->user_email).'<a href='. get_edit_user_link( $value->ID ).'>'.$value->display_name.'</a>',
            'email' => '<a href=mailto:'. $value->user_email.'>'. $value->user_email.'</a>' ,
            'role' => $value->roles['0'],
            'action'=>'action',          
          );
        }
      }
    }
    return $data;
  }
 





  public function column_default( $item, $column_name ) {
  	$action_nonce = wp_create_nonce( 'approve_deny_action' );
     $approve_link =  get_option( 'siteurl' ) . '?action=panding_to_approve&user=' . $item['id'] . '&nonce=' . $action_nonce;
    $denied_link =  get_option( 'siteurl' ) . '?action=panding_to_denied&user=' . $item['id'] . '&nonce=' . $action_nonce;
    switch( $column_name ) {
      case 'id':
        return $item['id'];
      case 'title':
        return $item['title'];
      case 'email':
        return $item['email'];
      case 'role':
        return $item['role'];
      case 'action':                
        return '<a class="button" href="'.$approve_link.'">Approve</a>&nbsp&nbsp<a class="button" href="'.$denied_link.'">Deny</a>';    
      default:
        return print_r( $item, true ) ;
    }
  }


  function column_cb($item) {
    return sprintf(
      '<input type="checkbox" name="id[]" value="%s" />', $item['id']
    );    
  }
}
