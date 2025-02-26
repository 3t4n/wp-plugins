<?php
/**
 * EchoSign plugin file.
 *
 * Copyright (C) 2010-2020, Smackcoders Inc - info@smackcoders.com
 */

if(!defined('ABSPATH'))  exit;        // Exit if accessed directly

if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

/**
 * Create a new table class that will extend the WP_List_Table
 */
class EOR_HR_Forms_List_Table extends WP_List_Table
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

		$perPage = 10;
        $currentPage = $this->get_pagenum();
        $totalItems = count($data);

        $this->set_pagination_args( array(
            'total_items' => $totalItems,
            'per_page'    => $perPage
        ) );

	    if(is_array($data) && !empty($data)) {
		    $data = array_slice( $data, ( ( $currentPage - 1 ) * $perPage ), $perPage );
	    }

        $this->_column_headers = array($columns, $hidden, $sortable);
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
	    'cb' => '<input type="checkbox" />',
            'document_name' => 'Document Name',
            'document_link' => 'Document Link',
	    'is_merge_fiels' => 'Merge Fields',
	    'shortcode' => 'Short Code',
        );

        return $columns;
    }

    public function get_bulk_actions() {
  	$actions = array(
    	  'delete'    => 'Delete'
  	);
  	return $actions;
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
        return array('document_name' => array('document_name', false));
    }	

    /**
     * Get the table data
     *
     * @return Array
     */
    private function table_data()
    {
	    $hr_forms = get_option('_eor_echosign_template_info');
	    $data = array();
	    if(!empty($hr_forms)) {
		    foreach ( $hr_forms as $id => $single_form ) {
			    if ( ! empty( $single_form['merge_fields'] ) ) {
				    $single_form['merge_fields'] = 'on';
			    }

			    $data[] = array(
				    'document_name'  => $single_form['document_name'],
				    'document_link'  => $single_form['document_info']['location'],
				    'is_merge_fiels' => $single_form['merge_fields'],
				    'shortcode'      => $single_form['shortcode'],
				    'id'             => $id,
			    );
		    }
	    }
	    return $data;
    }

    public function column_document_name($item) {
	    $href_url = esc_url('?page=%s&action=%s&id=%s');
	    $actions = array(
			    'edit'      => sprintf('<a href="' . $href_url . '">Edit</a>', sanitize_title($_REQUEST['page']), 'edit', $item['id']),
			    'delete'    => sprintf('<a href="' . $href_url . '">Delete</a>', sanitize_title($_REQUEST['page']), 'delete', $item['id']),
			    );

	    return sprintf('%1$s %2$s', $item['document_name'], $this->row_actions($actions) );
    }

    function column_cb($item) {
	    return sprintf(
			    '<input type="checkbox" name="ids[]" value="%s" />', $item['id']
			  );    
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
		    case 'cb':
			    $check = '<input type="checkbox" name="hr_forms[]" value="' . $item['id'] . '" />';
			    echo $check;
		    case 'document_name':
			    return $item[$column_name];
		    case 'document_link':
			    $document_url = "?page=wp-echosign-templates&action=download&id={$item['id']}";
			    $filename = basename($item['document_link']);
		            $dirpath = wp_upload_dir();
			    $dirpath = $dirpath['baseurl']. '/echosign-templates/' . basename($item['document_link']) ;
			    $download_link = "<a target = '_blank' href = '" . esc_url($dirpath) . "' download = '{$filename}' > {$item['document_name']} </a>";
			    return $download_link;
		    case 'is_merge_fiels':
			    if($item[$column_name] == 'on')
				    return '<i class="fa fa-check-circle fa-2x"></i>';
			    else
				    return '<i class="fa fa-times-circle-o fa-2x"></i>';

		    case 'shortcode':
			    return $item['shortcode'];

			    return $item[$column_name];
		    default:
			    return print_r( $item, true ) ;
	    }
    }
}
