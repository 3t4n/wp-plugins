<?php
/**
 * This file handles listing the videos into a library.
 *
 * @package 42videobricks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';

/**
 * Class Videobricks42_List_Table
 */
class Videobricks42_List_Table extends WP_List_Table {

	/**
	 * Define table columns.
	 *
	 * @return array columns.
	 */
	public function get_columns() {
		$columns = array(
			'thumbnail' => esc_html( 'Thumbnail' ),
			'title'     => esc_html( 'Title' ),
			'shortcode' => esc_html( 'Shortcode' ),
			'privacy'   => esc_html( 'Privacy' ),
			'edit'      => esc_html( 'Edit' ),
		);
		return $columns;
	}

	/**
	 * Bind table with columns, display data.
	 */
	public function prepare_items() {
		if ( isset( $_POST['s'] ) ) {
			$s_query = sanitize_text_field( wp_unslash( $_POST['s'] ) );
		}
		if ( isset( $_POST['search_video'] ) ) {
			$search_video = sanitize_text_field( wp_unslash( $_POST['search_video'] ) );
		}
		if ( ! empty( $s_query ) && current_user_can( 'manage_options' ) ) {
			if ( ! isset( $search_video ) || ! wp_verify_nonce( $search_video, '42videobricks_search' ) ) {
				add_settings_error( 'videobricks42_plugin_notice', 's', 'Request not verified' );
				$videos = array();
			} else {
				$videos = videobricks42_get_videos( null, 0, $s_query );
			}
		} else {
			$videos = videobricks42_get_videos();
		}
		$data = array();
		$key  = 0;
		if ( ! empty( $videos ) ) {
			foreach ( $videos as $video ) {
				$data[ $key ]['thumbnail'] = '<img src="' . esc_url( $video->getAssets()->getThumbnail() ) . '" alt="thumbnail" width="250px">';
				$data[ $key ]['title']     = stripslashes( esc_attr( $video->getTitle() ) );
				if ( $video->getPublic() ) {
					$data[ $key ]['privacy']   = esc_attr( 'Public' );
					$svg                       = '<a class"copy-shortcode" style="position:relative" data-shortcode="[videobricks42 id=' . esc_attr( $video->getId() ) . ']"><svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#2855a4}</style><path d="M384 336H192c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16l140.1 0L400 115.9V320c0 8.8-7.2 16-16 16zM192 384H384c35.3 0 64-28.7 64-64V115.9c0-12.7-5.1-24.9-14.1-33.9L366.1 14.1c-9-9-21.2-14.1-33.9-14.1H192c-35.3 0-64 28.7-64 64V320c0 35.3 28.7 64 64 64zM64 128c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H256c35.3 0 64-28.7 64-64V416H272v32c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V192c0-8.8 7.2-16 16-16H96V128H64z"/></svg></a>';
					$data[ $key ]['shortcode'] = $svg . '<input class="videobricks" id="videobricks" type="text" readonly value="[videobricks42 id=' . esc_attr( $video->getId() ) . ']"></input>';
				} else {
					$data[ $key ]['shortcode'] = esc_attr( 'Your video is private' );
					$data[ $key ]['privacy']   = esc_attr( 'Private' );
				}
				if ( $video->getStatus() !== 'AVAILABLE' ) {
					$data[ $key ]['shortcode'] = esc_attr( 'Your video will be ready soon. Please reload this page in a few minutes. In case of troubleshooting, please check 42videobricks administration page.' );
				}
				$svg_edit             = '<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>';
				$edit_video           = sprintf( '<a href="https://admin.42videobricks.com/%s/videos/%s" target="_blank">' . $svg_edit . '</a>', esc_attr( get_option( 'videobricks42_env' ) ), esc_attr( $video->getId() ) );
				$data[ $key ]['edit'] = $edit_video;
				++$key;
			}
		}
		$columns               = $this->get_columns();
		$this->_column_headers = array( $columns );

		/* pagination */
		$per_page     = $this->get_items_per_page( 'elements_per_page', 10 );
		$current_page = $this->get_pagenum();
		$total_items  = count( $data );

		$data = array_slice( $data, ( ( $current_page - 1 ) * $per_page ), $per_page );

		$this->set_pagination_args(
			array(
				'total_items' => $total_items, // total number of items.
				'per_page'    => $per_page, // items to show on a page.
				'total_pages' => ceil( $total_items / $per_page ), // use ceil to round up.
			)
		);
		$this->items = $data;
	}

	/**
	 * Set default column.
	 *
	 * @param array  $item Video item.
	 * @param string $column_name Column name.
	 * @return mixed
	 */
	protected function column_default( $item, $column_name ) {
		switch ( $column_name ) {
			case 'thumbnail':
			case 'title':
			case 'shortcode':
			case 'privacy':
			case 'edit':
			default:
				return $item[ $column_name ];
		}
	}

	/**
	 * Adding action links to column.
	 *
	 * @param array $item Video item.
	 * @return mixed Row action.
	 */
	public function actions( $item ) {
		$actions = array(
			'Edit' => sprintf( '<a href="' . esc_url( 'https://admin.42videobricks.com/%s/videos/%s' ) . '" target="_blank">' . esc_html( 'Edit' ) . '</a>', esc_html( get_option( 'videobricks42_env' ) ), esc_attr( $item['id'] ) ),
		);
		return $this->row_actions( $actions );
	}

	/**
	 * Display table.
	 */
	public function display() {
		$this->display_tablenav( esc_attr( 'top' ) );

		$this->screen->render_screen_reader_content( esc_attr( 'heading_list' ) );
		?>
		<table class="wp-list-table widefat fixed striped table-view-list toplevel_page_videobricks42main">
			<?php $this->print_table_description(); ?>
			<thead>
			<tr>
				<?php $this->print_column_headers(); ?>
			</tr>
			</thead>

			<tbody id="the-list">
			<?php $this->display_rows_or_placeholder(); ?>
			</tbody>
		</table>
		<?php
	}

	/**
	 *  Search box.
	 *
	 * @param string $text The text string.
	 * @param string $input_id The input id.
	 */
	public function search_box( $text, $input_id ) {
		if ( isset( $_REQUEST['s'] ) ) {
			$search = sanitize_text_field( wp_unslash( $_REQUEST['s'] ) );
		}
		if ( empty( $search ) && ! $this->has_items() ) {
			return;
		}

		if ( isset( $_POST['search_video'] ) && isset( $search ) ) {
			if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['search_video'] ) ), '42videobricks_search' ) ) {
				return;
			}
		}

		$input_id = $input_id . '-search-input';
		?>
		<p class="search-box">
			<label class="screen-reader-text" for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_attr( $text ); ?>:</label>
			<input type="search" placeholder="<?php esc_attr_e( 'Search for videos' ); ?>" id="<?php echo esc_attr( $input_id ); ?>" name="<?php esc_attr_e( 's' ); ?>" value="<?php _admin_search_query(); ?>" />
			<?php wp_nonce_field( '42videobricks_search', 'search_video' ); ?>
			<?php submit_button( esc_attr( $text ), '', '', false, array( 'id' => esc_attr( 'search-submit' ) ) ); ?>
		</p>
		<?php
	}
}
