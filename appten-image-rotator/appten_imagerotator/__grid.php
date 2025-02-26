<?php

require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );

class Imagerotator_Table extends WP_List_Table {

	var $table_name;
	var $wpdb;
	var $category;
	var $data;
    
    function __construct(){
        global $status, $page;                
        parent::__construct( array( 'singular' => 'appten_imagerotator', 'plural' => 'appten_imagerotators', 'ajax' => false ) );        
    }
    
    function column_default($item, $column_name){
		switch($column_name) {
			case 'actions' :
				if($item->id == 1) {
					return '<div style="margin-top:9px;"><a class="button-secondary" href="?page=appten_imagerotator&opt=edit&id='.$item->id.'" title="Edit">Edit</a></div>';
				} else {
					return '<div style="margin-top:9px;"><a class="button-secondary" href="?page=appten_imagerotator&opt=edit&id='.$item->id.'" title="Edit">Edit</a>&nbsp;&nbsp;&nbsp;<a class="button-secondary" href="?page=appten_imagerotator&opt=delete&id='.$item->id.'" title="Delete">Delete</a></div>';
				}
				break;
			case 'shortcode' :
				return '<div style="margin-top:4px;">[appten_imagerotator id='.$item->id.']</div>';
				break;
			default :
				return '<div style="margin-top:4px;">'.$item->$column_name.'</div>';
				break;
		}
    }

    function column_cb($item){
        return sprintf( '<input type="checkbox" name="%1$s[]" value="%2$s" />', $this->_args['singular'], $item->id );
    }
	
	function get_columns(){
        $columns = array(
            'cb'          => '<input type="checkbox" />',
            'id'          => 'Rotator ID',
        	'width'       => 'Width',
        	'height'      => 'Hight',
			'shortcode'   => 'Short Code',
			'actions'     => 'Actions'
        );
        return $columns;
    }

    function get_bulk_actions() {
        $actions = array( 'delete' => 'Delete' );
        return $actions;
    }

    function process_bulk_action() {
		if( 'delete'===$this->current_action() ) {			
			foreach($_GET['appten_imagerotator'] as $appten_imagerotator) {
				$this->wpdb->query($this->wpdb->prepare("DELETE FROM $this->table_name WHERE id=%d",$appten_imagerotator));
        	}
			echo '<script>window.location="?page=appten_imagerotator";</script>';
		}
    }

    function prepare_items() {		
    	$data = $this->data;
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = array();
        $this->_column_headers = array($columns, $hidden, $sortable);
		
        $this->process_bulk_action();

 		$per_page = 10;
        $current_page = $this->get_pagenum();
        $total_items = count($data);
        $data = array_slice($data,(($current_page-1)*$per_page),$per_page);
        $this->items = $data;

        $this->set_pagination_args( array( 'total_items' => $total_items, 'per_page' => $per_page, 'total_pages' => ceil($total_items/$per_page) ) );
    }
    
}
?>
<br />
<?php
	_e( "Image Rotator is a graceful image gallery rotator for your WordPress Websites!. For More visit <a href='http://www.appten.net/wordpress/image-rotator.html'>Image Rotator</a>." );
	$table = new Imagerotator_Table();
	$data  = $wpdb->get_results("SELECT id,width,height FROM $table_name");
	$table->data = $data;
	$table->table_name = $table_name;
	$table->wpdb = $wpdb;
	$table->category = $category;
	$table->prepare_items();
	
?>
<br />
<br />
<div><a href="?page=appten_imagerotator&opt=add" class="button-primary" title="addnew"><?php _e("Add New Player" ); ?></a></div>
<br />
<form id="appten_imagerotator-filter" method="get" style="width:99%;">
<input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>" />
<?php $table->display() ?>
</form>