<?php
/**
 * EchoSign plugin file.
 *
 * Copyright (C) 2010-2020, Smackcoders Inc - info@smackcoders.com
 */

if(!defined('ABSPATH'))  exit;        // Exit if accessed directly

class EchoSign_Templates_Table extends WP_List_Table
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
				'document_name'		=> 'Document Name',
				'status'	 	=> 'Document Status',
				'uploaded_on'		=> 'Uploaded on',
				'actions'		=> 'Actions',
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
			case 'document_name':
				return $item[$column_name];
			case 'status':
				$template_status = "<label style='color:red;'>Deleted</label>";
				if($item[$column_name] == 0)
					$template_status = "<label style='color:green;'>Available</label>";
				if($item[$column_name] == 1)
					$template_status = "<label style='color:red;'>Trashed</label>";

				return $template_status;
			case 'uploaded_on':
				return $item[$column_name];
                        case 'actions':
				$id = $item['id'];
				$html = '<span class="trash">';
				if($item['status'] != 1) {
					$assign_url = admin_url() . 'admin.php?page=wp-echosign-templates&templateid=' .$id. '&doaction=trash';
					$html .= '<a class="submitdelete" title="Move this item to the Trash" href="' . esc_url($assign_url) . '">Trash</a> | ';
				} else {
					$assign_url = admin_url() . 'admin.php?page=wp-echosign-templates&templateid=' .$id. '&doaction=restore';
					$html .= '<a class="submitdelete" title="Move this item to the Trash" href="' . esc_url($assign_url) . '">Restore</a> | ';
				}
				$assign_url = admin_url() . 'admin.php?page=wp-echosign-templates&templateid=' .$id. '&doaction=delete';
				$html .= '<a class="submitdelete" title="Delete this item as permanently" href="' . esc_url($assign_url) . '">Delete Permanently</a></span>';
				return $html;
			default:
				return print_r($item, true);

		}
	}
}
