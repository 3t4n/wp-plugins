<?php
namespace Adminz\Helper;

class TermTaxonomy {

	function __construct() {

	}

	public $metakey;
	public $admin_column_key;

	function init_thumbnail( $taxonomy, $metakey = 'thumbnail_id' ) {
		if ( $taxonomy ) {

			// prepare
			$this->metakey          = $metakey;
			$this->admin_column_key = "adminz_{$taxonomy}_post_id";

			// input
			add_action( $taxonomy . '_add_form_fields', [ $this, 'thumbnail_field_in_add_term' ] );
			add_action( $taxonomy . '_edit_form_fields', [ $this, 'thumbnail_field_in_edit_term' ] );

			// Admin term columns
			add_filter( 'manage_edit-' . $taxonomy . '_columns', [ $this, 'add_term_admin_column' ] );
			add_filter( 'manage_' . $taxonomy . '_custom_column', [ $this, 'add_term_admin_column_value' ], 10, 3 );

			// save if have $_POST
			add_action( 'edit_' . $taxonomy, [ $this, 'save_term_thumbnail_image' ], 10, 1 );
			add_action( 'create_' . $taxonomy, [ $this, 'save_term_thumbnail_image' ], 10, 1 );
		}
	}

	function add_term_admin_column( $columns ) {
		$new_columns = array();
		foreach ( $columns as $key => $value ) {
			if ( $key == 'name' ) {
				$new_columns[ $this->admin_column_key ] = _x( 'Featured image', 'page' );
			}
			$new_columns[ $key ] = $value;
		}
		return $new_columns;
	}

	function add_term_admin_column_value( $content, $column_name, $term_id ) {
		if ( $column_name == $this->admin_column_key ) {
			if ( $thumbnail_id = get_term_meta( $term_id, $this->metakey, true ) ) {
				$content = wp_get_attachment_image(
					$thumbnail_id,
					'post-thumbnail',
					false,
					[ "style" => "width: 50px; height: 50px;" ]
				);
			} else {
				$content = "—";
			}
		}
		return $content;
	}

	function save_term_thumbnail_image( $term_id ) {
		if ( isset( $_POST['adminz_thumbnail_image'] ) ) {
			update_term_meta( $term_id, $this->metakey, sanitize_text_field( $_POST['adminz_thumbnail_image'] ) );
		}
	}

	function get_input_image_field( $term ) {
		$value = '';
		if ( $term->term_id ?? '' ) {
			$value = get_term_meta( $term->term_id, $this->metakey, true );
		}

		// field
		return adminz_field( [ 
			'field'     => 'input',
			'attribute' => [ 
				'type' => 'wp_media',
				'name' => 'adminz_thumbnail_image',
			],
			'value'     => $value,
		] );
	}

	function thumbnail_field_in_add_term( $taxonomy ) {
		$string = $this->get_input_image_field( $taxonomy );
		$label  = _x( 'Featured image', 'page' );
		echo <<<HTML
		<div class="form-field">
			<label for="">
				$label
			</label>
			$string
		</div>
		HTML;
	}

	function thumbnail_field_in_edit_term( $taxonomy ) {
		$string = $this->get_input_image_field( $taxonomy );
		$label  = _x( 'Featured image', 'page' );
		echo <<<HTML
		<tr class="form-field">
			<th scope="row" valign="top">
				$label
			</th>
			<td>
				$string
			</td>
		</tr>
		HTML;
	}

	// public $sort_taxonomy;
	// public $sort_meta_key;

	// function init_custom_sort( $taxonomy, $meta_key = 'order' ) {
	// 	if ( $taxonomy ) {
	// 		$this->sort_taxonomy = $taxonomy;
	// 		$this->sort_meta_key = $meta_key;
	// 		$this->set_admin_sort_items();
	// 		$this->set_admin_sort_column();
	// 		$this->set_admin_sort_scripts();
	// 		$this->set_admin_sort_ajax();
	// 	}
	// }

	// function set_admin_sort_items() {

	// }

	// function set_admin_sort_column() {
		
	// 	// create admin column
	// 	add_filter( "manage_edit-{$this->sort_taxonomy}_columns", function ($columns) {
	// 		$columns[ $this->sort_meta_key ] = __( 'Order' );
	// 		return $columns;
	// 	} );

	// 	// show value on admin column
	// 	add_filter( "manage_{$this->sort_taxonomy}_custom_column", function ($content, $column_name, $term_id) {
	// 		if ( $this->sort_meta_key === $column_name ) {
	// 			$menu_order = get_term_meta( $term_id, $this->sort_meta_key, true );
	// 			$content    = !empty( $menu_order ) ? $menu_order : 'N/A';
	// 		}
	// 		return $content;
	// 	}, 10, 3 );
	// }

	// function set_admin_sort_scripts() {
	// 	add_action( 'admin_enqueue_scripts', function ($hook) {
	// 		$taxonomy = $this->sort_taxonomy;
	// 		// only screen listing of taxonomy
	// 		if ( 'edit-tags.php' !== $hook || empty( $_GET['taxonomy'] ) || $_GET['taxonomy'] !== $taxonomy ) {
	// 			return;
	// 		}

	// 		$nonce     = wp_create_nonce( 'adminz_update_term_order_nonce' );
	// 		$inline_js = <<<JS
	// 			jQuery(document).ready(function ($) {
	// 				var \$table = $('#the-list');
	// 				\$table.sortable({
	// 					items: 'tr',
	// 					cursor: 'move',
	// 					axis: 'y',
	// 					update: function (event, ui) {
	// 						const tr = $(ui.item[0]); 
	// 						const id = tr.attr('id').replace('tag-', "");
	// 						if (tr.next().length) {
	// 							const nextTr = $(tr.next()[0]);
	// 							const nextid = nextTr.attr('id').replace('tag-', "");
	// 							console.log(id, nextid);

	// 							$.post(ajaxurl, {
	// 								action: 'adminz_update_term_order',
	// 								id: id,
	// 								nextid: nextid,
	// 								thetaxonomy: '{$taxonomy}',
	// 								nonce: '{$nonce}'
	// 							}, function (response) {
	// 								if (response.success) {
	// 									location.reload();
	// 								} else {
	// 									alert(response.data);
	// 								}
	// 							});
	// 						}
	// 					},
	// 				});
	// 			});
	// 		JS;


	// 		wp_enqueue_script( 'jquery-ui-sortable' );
	// 		wp_add_inline_script( 'jquery-ui-sortable', $inline_js );
	// 	} );
	// }

	// function set_admin_sort_ajax() {
	// 	add_action( 'wp_ajax_adminz_update_term_order', function () {
	// 		$taxonomy = $this->sort_taxonomy;

	// 		check_ajax_referer( 'adminz_update_term_order_nonce', 'nonce' );

	// 		if ( !taxonomy_exists( $taxonomy ) ) {
	// 			wp_send_json_error( 'Taxonomy not exists!' );
	// 		}

	// 		if ( empty( $_POST['thetaxonomy'] ) || $_POST['thetaxonomy'] !== $taxonomy ) {
	// 			wp_send_json_error( 'Taxonomy invalid!' );
	// 		}

	// 		if ( !current_user_can( 'manage_options', $taxonomy ) ) {
	// 			wp_send_json_error( 'Not enough permission!' );
	// 		}

	// 		$id       = (int) $_POST['id'];
	// 		$next_id  = isset( $_POST['nextid'] ) && (int) $_POST['nextid'] ? (int) $_POST['nextid'] : null;
	// 		$taxonomy = isset( $_POST['thetaxonomy'] ) ? esc_attr( wp_unslash( $_POST['thetaxonomy'] ) ) : null; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	// 		$term     = get_term_by( 'id', $id, $taxonomy );

	// 		if ( !$id || !$term || !$taxonomy ) {
	// 			wp_die( 0 );
	// 		}

	// 		$this->wc_reorder_terms( $term, $next_id, $taxonomy );

	// 		$children = get_terms( $taxonomy, "child_of=$id&menu_order=ASC&hide_empty=0" );

	// 		$children_count = is_countable( $children ) ? count( $children ) : 0;
	// 		if ( $term && $children_count ) {
	// 			echo 'children';
	// 			wp_die();
	// 		}


	// 		wp_send_json_success( 'Updated' );
	// 	} );
	// }

	// /**
	//  * Move a term before the a given element of its hierarchy level.
	//  *
	//  * @param int    $the_term Term ID.
	//  * @param int    $next_id  The id of the next sibling element in save hierarchy level.
	//  * @param string $taxonomy Taxonomy.
	//  * @param int    $index    Term index (default: 0).
	//  * @param mixed  $terms    List of terms. (default: null).
	//  * @return int
	//  */
	// function wc_reorder_terms( $the_term, $next_id, $taxonomy, $index = 0, $terms = null ) {
	// 	if ( !$terms ) {
	// 		$terms = get_terms( $taxonomy, 'hide_empty=0&parent=0&menu_order=ASC' );
	// 	}
	// 	if ( empty( $terms ) ) {
	// 		return $index;
	// 	}

	// 	$id = intval( $the_term->term_id );

	// 	$term_in_level = false; // Flag: is our term to order in this level of terms.

	// 	foreach ( $terms as $term ) {
	// 		$term_id = intval( $term->term_id );

	// 		if ( $term_id === $id ) { // Our term to order, we skip.
	// 			$term_in_level = true;
	// 			continue; // Our term to order, we skip.
	// 		}
	// 		// the nextid of our term to order, lets move our term here.
	// 		if ( null !== $next_id && $term_id === $next_id ) {
	// 			$index++;
	// 			$index = $this->wc_set_term_order( $id, $index, $taxonomy, true );
	// 		}

	// 		// Set order.
	// 		$index++;
	// 		$index = $this->wc_set_term_order( $term_id, $index, $taxonomy );

	// 		/**
	// 		 * After a term has had it's order set.
	// 		 */
	// 		// do_action( 'woocommerce_after_set_term_order', $term, $index, $taxonomy );

	// 		// If that term has children we walk through them.
	// 		$children = get_terms( $taxonomy, "parent={$term_id}&hide_empty=0&menu_order=ASC" );
	// 		if ( !empty( $children ) ) {
	// 			$index = $this->wc_reorder_terms( $the_term, $next_id, $taxonomy, $index, $children );
	// 		}
	// 	}

	// 	// No nextid meaning our term is in last position.
	// 	if ( $term_in_level && null === $next_id ) {
	// 		$index = $this->wc_set_term_order( $id, $index + 1, $taxonomy, true );
	// 	}

	// 	return $index;
	// }

	// /**
	//  * Set the sort order of a term.
	//  *
	//  * @param int    $term_id   Term ID.
	//  * @param int    $index     Index.
	//  * @param string $taxonomy  Taxonomy.
	//  * @param bool   $recursive Recursive (default: false).
	//  * @return int
	//  */
	// function wc_set_term_order( $term_id, $index, $taxonomy, $recursive = false ) {

	// 	$term_id = (int) $term_id;
	// 	$index   = (int) $index;

	// 	update_term_meta( $term_id, $this->sort_meta_key, $index );

	// 	if ( !$recursive ) {
	// 		return $index;
	// 	}

	// 	$children = get_terms( $taxonomy, "parent=$term_id&hide_empty=0&menu_order=ASC" );

	// 	foreach ( $children as $term ) {
	// 		$index++;
	// 		$index = $this->wc_set_term_order( $term->term_id, $index, $taxonomy, true );
	// 	}

	// 	clean_term_cache( $term_id, $taxonomy );

	// 	return $index;
	// }

}