<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.indianic.com
 * @since      1.0.0
 *
 * @package    Custom_Table_Csv
 * @subpackage Custom_Table_Csv/admin/partials
 */
 
include "simple_html_dom.php";
// WP_List_Table is not loaded automatically so we need to load it in our application
if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

/**
 * Create a new table class that will extend the WP_List_Table
 */
class Custom_Table_Csv_List_Table extends WP_List_Table
{
    /**
     * Prepare the items for the table to process
     *
     * @return Void
     */
    public function prepare_items()
    {
        $columns = $this->get_columns();
        $hidden = $this->get_hidden_columns();
        $sortable = $this->get_sortable_columns();

        $data = $this->table_data();
        usort( $data, array( &$this, 'sort_data' ) );
       
        $perPage = $this->get_items_per_page('ctc_per_page', 30);        
        $currentPage = $this->get_pagenum();
        $totalItems = count($data);

        $this->set_pagination_args( array(
            'total_items' => $totalItems,
            'per_page'    => $perPage
        ) );

        $data = array_slice($data,(($currentPage-1)*$perPage),$perPage);

        $this->_column_headers = array($columns, $hidden, $sortable);
        $this->process_bulk_action();
        $this->items = $data;
    }

    /**
     * Override the parent columns method. Defines the columns to use in your listing table
     *
     * @return Array
     */
    public function get_columns()
    {
        $columns = array(
			'cb'      => '<input type="checkbox" />',
            'name'          => 'Full Name',
            'customer_date'  => 'Date',
            'customer_email'       => 'Email',
            'company' => 'Company Name',
            'is_subscribe'        => 'Subscribe ?'
        );

        return $columns;
    }

    /**
     * Define which columns are hidden
     *
     * @return Array
     */
    public function get_hidden_columns()
    {
        return array();
    }

    /**
     * Define the sortable columns
     *
     * @return Array
     */
    public function get_sortable_columns()
    {
        return array('name' => array('name', false),'customer_date' => array('customer_date', false));

    }

    /**
     * Get the table data
     *
     * @return Array
     */
    private function table_data()
    {
        global $wpdb;
        if(isset($_REQUEST['bulk-delete'])){

        }
        $table = $wpdb->prefix . 'customers';
        
        if(isset($_REQUEST['ctc_month'])){
            if($_REQUEST['ctc_month']!='0'){
                $year_month = sanitize_text_field($_REQUEST['ctc_month']);
                $filter_year_month = explode("-",$year_month);
                return $wpdb->get_results(
                    "SELECT * from {$table} WHERE YEAR(customer_date) = $filter_year_month[0] AND MONTH(customer_date) = $filter_year_month[1]",
                    ARRAY_A
                );
            }else{
                return $wpdb->get_results(
                    "SELECT * from {$table}",
                    ARRAY_A
                );
            }
            

        }else{
            return $wpdb->get_results(
                "SELECT * from {$table}",
                ARRAY_A
            );

        }
         
            
         
         
    }
	function column_cb( $item ) {
		return sprintf(
		'<input type="checkbox" name="bulk-delete[]" class="ctc_checked" value="%s" />', $item['id']
		);
    }
     
    function column_is_subscribe( $item ) {
        if($item['is_subscribe']=='1'){
            return 'Yes';
        }else{
            return 'No';
        }
		// return sprintf(
		// '<input type="checkbox" name="bulk-delete[]" value="%s" />', $item['id']
		// );
    }
     
    public function process_bulk_action() {

        global $wpdb;
        $customer_tbl = $wpdb->prefix.'customers';
         //print_r($this->current_action()); 
        if( 'bulk-delete'===$this->current_action() ) {
            foreach($_REQUEST['bulk-delete'] as $single_val){
                $wpdb->delete( $customer_tbl, array( 'id' =>    (int)$single_val ) );
            }
            //$redirect_url =  get_admin_url( null, 'admin.php?page=custom-table-csv-ctc' );
            //wp_safe_redirect($redirect_url);
             wp_die('Items deleted (or they would be if we had items to delete)!');
        }
    }
    /**
     * Define what data to show on each column of the table
     *
     * @param  Array $item        Data
     * @param  String $column_name - Current column name
     *
     * @return Mixed
     */
    public function column_default( $item, $column_name )
    {
        switch( $column_name ) {

            case 'id':
            case 'name':
            case 'customer_date':
            case 'customer_email':
            case 'company':
            case 'is_subscribe':
                return $item[ $column_name ];

            default:
                return print_r( $item, true ) ;
        }
    }

	protected function extra_tablenav( $which ) {
		global $cat_id;

		if ( 'top' !== $which ) {
			 ?>
          <!--   <a onclick="exportTableToExcel('.wp-list-table')" class="button btn_csv" href="#">Export into CSV</a>-->
             <?php 
        }else{   
        global $wpdb,$wp_locale;

        $table = $wpdb->prefix . 'customers';
         
        
           $month_data =  $wpdb->get_results(
               "SELECT DISTINCT YEAR( customer_date ) AS year, MONTH( customer_date ) AS month
               FROM $table",
               ARRAY_A
           );
            
       
       
		?>
		<div class="alignleft actions">

			<select name="ctc_month" class="drop_csv">
                <option value="0"><?php _e( 'All dates' ); ?></option>
                <?php 
                $m = sanitize_text_field($_REQUEST['ctc_month']);
                foreach($month_data as $single_month){  
                    $month = zeroise( $single_month['month'], 2 );
                    $year  = $single_month['year'];
                        echo '<option '.esc_attr(selected( $m, $year .'-'. $month, false )).' value="'.esc_attr($single_month['year'] .'-'. $month).'">'.wp_kses_post($wp_locale->get_month( $month ).' '.$year).'</option>';
                 } ?>
				
				 
			</select>

			<?php


			submit_button( __( 'Filter' ), '', 'filter_action', false, array( 'id' => 'post-query-submit' ) );
			?>
            <a onclick="exportTableToExcel('.wp-list-table')" class="button btn_csv" href="#">Export into CSV</a>
		</div>
		<?php
        }
	}
	public function get_bulk_actions() {
		$actions = [
			'bulk-delete' => 'Delete'
		];

		return $actions;
	}
    /**
     * Allows you to sort the data by the variables set in the $_GET
     *
     * @return Mixed
     */
    private function sort_data( $a, $b )
    {
        // Set defaults
        $orderby = 'title';
        $order = 'asc';

        // If orderby is set, use this as the sort column
        if(!empty($_GET['orderby']))
        {
            $orderby = sanitize_text_field($_GET['orderby']);
        }

        // If order is set use this as the order
        if(!empty($_GET['order']))
        {
            $order = sanitize_text_field($_GET['order']);
        }


        $result = strcmp( $a[$orderby], $b[$orderby] );

        if($order === 'asc')
        {
            return $result;
        }

        return -$result;
    }
}

 
 
	 
   
	    $exampleListTable = new Custom_Table_Csv_List_Table();
        $exampleListTable->prepare_items();
        ?>
            <div class="wrap">
                <div id="icon-users" class="icon32"></div>
                
                <h2>Export Table Data Into Spreadsheet </h2>
             <!--  <div class="button-csv"><button onclick="exportTableToExcel('.wp-list-table')">Click Here To Export Excel File</button></div>-->
                <div class="container custom_Table_plugin">
                    <div class="row">
                <form method="post">
                <?php $exampleListTable->display(); ?>
                </form>
                    </div>
                </div>
            </div>
	

<script>

</script>

	 
 
 

