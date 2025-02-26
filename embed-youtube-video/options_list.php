<?php
if(!defined('ABSPATH')) exit;
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
class eyvgk_List_Table extends WP_List_Table {
	function get_columns(){
	  $columns = array(
		'cb'        => '<input type="checkbox" />',
		'title'  => 'Title',
		'option_value' => 'Shortcode',
		'created_date' => 'Date',
	  );
	  return $columns;
	} 

	function table_data()
	{ 
		global $wpdb;
 		$table_name = $wpdb->prefix . 'youtube_embed_video_gk';
 		$data=array();
 		if(isset($_POST['s']))
        {
        	$orderby = (isset( $_GET['orderby'] ))? esc_sql( $_GET['orderby'] ) : 'id'; // field name
			$order = ( isset( $_GET['order'] ) ) ? esc_sql( $_GET['order'] ) : 'DESC';
			
			$nonce=$_POST['eyv_search_wpnonce'];
			$search=sanitize_text_field($_POST['s']);
 			$search = trim($search);
			if(wp_verify_nonce( $nonce, 'eyv_search_gk' ))
			{
          	$wk_post = $wpdb->get_results("SELECT * FROM $table_name WHERE id LIKE '%$search%' or title LIKE '%$search%' or option_value LIKE '%$search%' or created_date LIKE '%$search%' or url_video LIKE '%$search%' ORDER BY $orderby $order  ");
			}
        }else{
        	$orderby = (isset( $_GET['orderby'] ))? esc_sql( $_GET['orderby'] ) : 'id';
			$order = ( isset( $_GET['order'] ) ) ? esc_sql( $_GET['order'] ) : 'DESC';
			$wk_post = $wpdb->get_results("SELECT * FROM $table_name ORDER BY $orderby $order");
        }
        $id = array();
		$title = array();
		$option_value = array();
        $created_date = array();
        $url_video = array();
         $i=0;

          foreach ($wk_post as $wk_posts) {
          	$id[]=$wk_posts->id;
			$title[]=$wk_posts->title;
			$url_video[]=$wk_posts->url_video;
			$option_value[]=$wk_posts->option_value;
            $created_date[]=$wk_posts->created_date;
             
			preg_match('/[\?\&]v=([^\?\&]+)/',$url_video[$i],$matches);
			$idmatch = $matches[1];
			$options=json_decode($option_value[$i]); 
	
			$shortcode="[EmbedYoutube id='".$id[$i]."']";
			$editurl=site_url()."/wp-admin/admin.php?page=embed-youtube-video-add&editid=".$id[$i];
				
						
             	$data[] = array(
             		'cb'    => '<input type="checkbox" />',
                    'id'  => $id[$i],
                    'title' => '<a href="'.$editurl.'">'.$title[$i].'</a>',
                    'option_value' => '<input type="text"  readonly="readonly" value="'.$shortcode.'" class="large-text code">', 
                    'created_date' => date('F j, Y h:i', strtotime($created_date[$i])),   
  				);
 
            $i++;
          }
          return $data;
	}

	function get_bulk_actions() {
        return array(
                'delete' => __( 'Delete', 'your-textdomain' ),
        );
    }
	
	function column_title($item)
    {
    	
    	$editurl=site_url()."/wp-admin/admin.php?page=embed-youtube-video-add&editid=".$item['id'];
        $actions = array(
        	'id' => 'ID:'.$item['id'],
            'edit'          => '<a href="'.$editurl.'">Edit</a>',
            'delete'   => '<a onclick="delete_row('.$item['id'].')">Delete</a>',
        );


        return sprintf(
            '%1$s %3$s',
            $item['title'],
            $item['id'],
            $this->row_actions($actions)
        );
    }

    function column_cb($item) {
        return sprintf(
            '<input type="checkbox" name="video[]" value="%s" />', $item['id']
        );    
    }

	function get_sortable_columns() {                
		 // sorting
		$sortable_columns = array(
			// 'id'  => array('id',false),
			'title'  => array('title',false),
			// 'option_value' => array('option_value',false),
			'created_date'   => array('created_date',false),
		);
		return $sortable_columns;
	}

	function prepare_items() 
	{
		
		$columns = $this->get_columns();
		$hidden = array();
		$sortable =$this->get_sortable_columns();
		$this->_column_headers = array($columns, $hidden, $sortable);
		$table_data =$this->table_data();
		$this->items = $table_data;	
		$per_page = 10;
		$table_page = $this->get_pagenum();		
		$this->items = array_slice( $table_data, ( ( $table_page - 1 ) * $per_page ), $per_page );
		$total_users = count( $table_data );
		$this->set_pagination_args( array (
			'total_items' => $total_users,
			'per_page'    => $per_page,
			'total_pages' => ceil( $total_users/$per_page )
		) );

	}
	function column_default( $item, $column_name ) {
		switch( $column_name ) { 			
			case 'title':
			case 'option_value':
			case 'created_date':
			case 'action':
			  return $item[ $column_name ];
			default:
			  return print_r( $item, true ) ; 
		}
	}
}
	global $wpdb;
	$table_name = $wpdb->prefix . 'youtube_embed_video_gk';
	if($_POST)
	{
		if($_POST['action'] == 'delete'){
			$nonce=$_POST['eyv_search_wpnonce'];
			if(wp_verify_nonce( $nonce, 'eyv_search_gk' ))
			{
				$chk_ids=implode( ',', $_POST['video']);
				$ids=sanitize_text_field($chk_ids);	
				$wpdb->query( "DELETE FROM $table_name WHERE id IN($ids)" );
				$successmsg=evygk_success_option_msg_add('Video Deleted!');
			}
		}	
	}
	$myListTable = new eyvgk_List_Table();	
 ?>
<div class="wrap">
	<h1 class="wp-heading-inline">Embed Youtube Video</h1>
	<a href="<?php echo site_url(); ?>/wp-admin/admin.php?page=embed-youtube-video-add" class="page-title-action">Add New</a>
	<hr class="wp-header-end">	<?php    if ( isset( $successmsg ) ) 	{		echo $successmsg;     }	    if ( isset( $errormsg ) ) 	{        echo $errormsg;    }    ?>
	<div class='eyv_embed_list'>
	<form method="post">
		
		<input type="hidden" name="page" value="my_list_table" />
		
		<?php 
			$myListTable->prepare_items(); 
			//$myListTable->search_box('Search Video', 'search_id'); 
			?>
			<p class="search-box">
			<label class="screen-reader-text" for="search_id-search-input">Search Video:</label>
			<input type="search" id="search_id-search-input" name="s" value="">
			<input type="hidden" name="eyv_search_wpnonce" value="<?php echo $nonce= wp_create_nonce('eyv_search_gk'); ?>">
			<input type="submit" id="search-submit" class="button" value="Search Video"></p>
			<?php
			$myListTable->display();  
		?>
	</form>
	</div>
</div>
<script type="text/javascript">
	var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	function delete_row(id){
		var data = {
			'action': 'delete_action',
			'id': id,
			'wp_nonce': "<?php echo $nonce= wp_create_nonce('eyv_delete_gk'); ?>"
			};
		jQuery.post(ajaxurl, data, function(response) {
			window.location.href='';
		});
	}
</script>