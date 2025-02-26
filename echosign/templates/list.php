<?php
/**
 * EchoSign plugin file.
 *
 * Copyright (C) 2010-2020, Smackcoders Inc - info@smackcoders.com
 */

if(!defined('ABSPATH'))  exit;        // Exit if accessed directly

class EchoSign_List_Table extends WP_List_Table
{
	public $limit = 10;

	/**
	 * Override the parent columns method. Defines the columns to use in your listing table
	 *
	 * @return Array
	 */
	public function get_columns()
	{
		$columns = array(
				'id'          		=> 'ID',
				'user_name'       	=> 'User Name',
				'template_name' 	=> 'Template Name',
				'document_id'		=> 'Document Id',
				'document_status' 	=> 'Document Status',
				'created_at'		=> 'Sent at',
				);

		return $columns;
	}

	/**
	 * Allows you to sort the data by the variables set in the $_GET
	 *
	 * @return Mixed
	 */
	private function sort_data( $a, $b )
	{
		// Set defaults
		$orderby = 'user_name';
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

		$result = strnatcmp( $a[$orderby], $b[$orderby] );

		if($order === 'asc')
		{
			return $result;
		}

		return -$result;
	}

	/**
	 * Define the sortable columns
	 *
	 * @return Array
	 */
	public function get_sortable_columns()
	{
		return array('user_name' => array('user_name', false));
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

	// Used to display the value of the id column
	public function column_id($item)
	{
		return $item['id'];
	}

	/**
	 * Define what data to show on each column of the table
	 *
	 * @param  Array $item        Data
	 * @param  String $column_name - Current column name
	 *
	 * @return Mixed
	 */
	public function column_default($item, $column_name)
	{
		switch($column_name)	{
			case 'id':
				return $item[$column_name];
			case 'user_name':
				return $item[$column_name];
			case 'template_name':
				return $item[$column_name];
			case 'document_id':
				return $item[$column_name];
			case 'document_status':
				return $item[$column_name];
			case 'created_at':
				return $item[$column_name];
			default:
				return print_r($item, true);

		}
	}
}
