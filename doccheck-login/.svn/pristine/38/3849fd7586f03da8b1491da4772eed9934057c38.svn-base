<?php

namespace DCL\Admin;

/**
 * Admin: columns.
 *
 * Defines a column shown in the WordPress backend for posts and pages
 * to indicate if a post or page is access restricted.
 *
 * @package    DCL\Admin
 * @author     antwerpes ag <opensource@antwerpes.com>
 */
class DCL_Columns extends DCL_Admin {

	/**
	 * Display admin column for posts and pages.
	 *
	 * @param $column
	 *
	 * @since   1.0.0
	 * @access  private
	 */
	function dcl_manage_admin_columns( $column ) {
		if ( $column == 'dcl' && $this->dcl_is_access_restricted() ) {
			echo '<span class="dashicons dashicons-lock" title="'
			     . esc_html__( 'Access restricted', 'doccheck-login' ) . '"></span>';
		}
	}

	/**
	 * Add admin column content to posts and pages.
	 *
	 * @param   $columns
	 *
	 * @return  array
	 * @since   1.0.0
	 * @access  private
	 */
	function dcl_add_admin_column( $columns ) {
		return array_merge(
			array_slice( $columns, 0, 1 ),
			[
				'dcl' => '<span class="dashicons dashicons-lock" title="'
				         . esc_html__( 'Access restricted', 'doccheck-login' ) . '"></span>'
			],
			array_slice( $columns, 1, null )
		);
	}

	/**
	 * Change admin column width.
	 *
	 * @since   1.0.0
	 * @access  private
	 */
	function dcl_admin_columns_width() {
		echo '<style type="text/css">'
		     . '.column-dcl { width:20px !important; color: #b4b9be !important; }'
		     . '</style>';
	}
}