<?php

namespace BULKYWP\Admin;

defined( 'ABSPATH' ) || exit;

class History {

	protected static $instance = null;
	protected $wpdb;
	protected $post_type;
	protected $table;
	protected $limit = 5;

	public function __construct() {
		global $wpdb, $wpbulky_post_type;

		$this->wpdb      = $wpdb;
		$this->post_type = $wpbulky_post_type;
		$this->table     = $wpdb->prefix . 'vi_wpbulky_history';

		if ( ! wp_next_scheduled( 'vi_wpbulky_remove_revision' ) ) {
			wp_schedule_event( time(), 'daily', 'vi_wpbulky_remove_revision' );
		}

		add_action( 'vi_wpbulky_remove_revision', array( $this, 'remove_revision' ) );
	}

	public static function instance() {
		return self::$instance == null ? self::$instance = new self() : self::$instance;
	}

	public function create_database_table() {
		$collate = $this->wpdb->has_cap( 'collation' ) ? $this->wpdb->get_charset_collate() : '';
		$query   = "CREATE TABLE IF NOT EXISTS {$this->table} 
					(`id` int(11) NOT NULL AUTO_INCREMENT,
					 `date` int(16) NOT NULL, 
					 `user_id` int(11) NOT NULL,
					 `history` longtext,
					 `post_type` varchar(20) ,
					  PRIMARY KEY  (`id`)) {$collate}";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $query );
	}

	public function remove_revision() {
		$time  = current_time( 'U' ) - floatval( BulkyWP_Data()->get_setting( 'auto_remove_revision' ) ) * DAY_IN_SECONDS;
		$query = "delete from {$this->table} where date < %d";
		$this->wpdb->query( $this->wpdb->prepare( $query, $time ) ); //phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
	}

	public function set( $data ) {
		if ( empty( $data ) ) {
			return;
		}
		$user_id = get_current_user_id();
		$date    = current_time( 'U' );
		$query   = "insert into {$this->table} (user_id, date, history, post_type) values (%d,%d,%s,%s)";
		$this->wpdb->query( $this->wpdb->prepare( $query, $user_id, $date, maybe_serialize( $data ), $this->post_type ) ); //phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
	}

	public function get() {
		$query  = "select id,date,user_id from {$this->table} order by id desc limit {$this->limit}";
		$result = $this->wpdb->get_results( $query, ARRAY_A ); //phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared

		return $result;
	}

	public function count_history_pages() {
		$query  = "select count(id) from {$this->table} where post_type='{$this->post_type}'";
		$result = $this->wpdb->get_var( $query ); //phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		$result = ceil( $result / $this->limit );

		return $result;
	}

	public function get_history_by_id( $id ) {
		$query           = "select history,date from {$this->table} where id=%d and post_type=%s";
		$result          = $this->wpdb->get_row( $this->wpdb->prepare( $query, $id, $this->post_type ) ); //phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared
		$result->history = maybe_unserialize( $result->history );

		return $result;
	}

	public function compare_history_point_and_current( $id ) {
		$full_history = $this->get_history_by_id( $id );
		$posts        = $full_history->history;
		$columns      = BulkyWP_Data()->define_columns_type();

		if ( ! empty( $posts ) && is_array( $posts ) ) {
			$r = [];
			foreach ( $posts as $pid => $history ) {
				$post = get_post( $pid );
				if ( ! is_object( $post ) ) {
					continue;
				}

				$fields  = array_keys( $history );
				$current = Handle_Post::instance()->get_post_data( $post, $fields );
				$current = array_combine( $fields, $current );

				$fields_parsed = [];
				foreach ( $fields as $key ) {
					$fields_parsed[ $key ] = $columns[ $key ]['title'] ?? '';
				}

				if ( $history == $current ) {
					continue;
				}

				$r[ $pid ] = [
					'name'    => $post->post_title,
					'fields'  => $fields_parsed,
					'history' => $history,
					'current' => $current,
				];
			}
		}

		return [ 'compare' => $r ?? '', 'date' => date_i18n( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ), $full_history->date ) ];
	}

	public function revert_single_post( \WP_Post $post, $history_id ) {
		$history      = $this->get_history_by_id( $history_id )->history;
		$pid          = $post->ID;
		$post_history = $history[ $pid ] ?? '';

		if ( ! empty( $post_history ) && is_array( $post_history ) ) {
			$handle            = Handle_Post::instance();
			$revert_data['ID'] = $pid;
			foreach ( $post_history as $type => $value ) {
				$handle->parse_post_data_to_save( $revert_data, $pid, $type, $value );
			}

			wp_update_post( $revert_data );
		}
	}

	public function revert_history_all_posts( $history_id ) {
		$history = $this->get_history_by_id( $history_id )->history;

		if ( ! empty( $history ) && is_array( $history ) ) {
			$handle = Handle_Post::instance();

			foreach ( $history as $pid => $data ) {
				$post = get_post( $pid );

				if ( ! is_object( $post ) ) {
					continue;
				}

				if ( ! empty( $data ) && is_array( $data ) ) {
					$revert_data['ID'] = $pid;
					foreach ( $data as $type => $value ) {
						$handle->parse_post_data_to_save( $revert_data, $pid, $type, $value );
					}
					wp_update_post( $revert_data );
				}
			}
		}
	}

	public function revert_history_post_attribute( \WP_Post $post, $history_id, $attribute ) {
		$history = $this->get_history_by_id( $history_id )->history;
		$pid     = $post->ID;
		if ( isset( $history[ $pid ][ $attribute ] ) ) {
			$new_data['ID'] = $pid;
			$handle         = Handle_Post::instance();
			$handle->parse_post_data_to_save( $new_data, $pid, $attribute, $history[ $pid ][ $attribute ] );
			wp_update_post( $new_data );
		}
	}

	public function get_history_page( $page = 1 ) {
		$offset    = ( $page - 1 ) * $this->limit;
		$query     = "select id,date,user_id from {$this->table}  where post_type='{$this->post_type}' order by id desc limit {$offset}, {$this->limit}";
		$histories = $this->wpdb->get_results( $query, ARRAY_A ); //phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared

		if ( ! empty( $histories ) ) {
			foreach ( $histories as $history ) {
				$user = get_user_by( 'ID', $history['user_id'] );
				printf( '<tr>
								    <td>%s</td>
								    <td>%s</td>
								    <td class="">
								        <div class="vi-wpbulky-action-col">
								            <button type="button" class="vi-ui button basic mini vi-wpbulky-view-history-point" data-id="%s">
								                <i class="icon eye"> </i>
								            </button>
								            <button type="button" class="vi-ui button basic mini vi-wpbulky-recover" data-id="%s">
								                <i class="icon undo"> </i>
								            </button>
								        </div>
								    </td>
								</tr>',
					esc_html( date_i18n( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ), $history['date'] ) ),
					esc_html( $user->__get( 'display_name' ) ), esc_attr( $history['id'] ), esc_attr( $history['id'] ) );
			}
		}
	}


}
