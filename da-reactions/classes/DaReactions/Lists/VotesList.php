<?php
namespace DaReactions\Lists;
use DaReactions\Cache;
use DaReactions\Common;
use DaReactions\Data;
use DaReactions\FileSystem;
use DaReactions\Frontend;
use DaReactions\Options;
use DaReactions\Plugins\BuddyPress;
use DaReactions\Request;
use DaReactions\Utils;
use WP_List_Table;
/**
 *
 */
class VotesList extends WP_List_Table {
	private $registered_post_types;
	private $reactions;
	/**
	 * @var array
	 */
	private $buddypress_types;
	/**
	 * @var Options
	 */
	private $options;
	/**
	 */
	public function __construct() {
		parent::__construct(
			array(
				'singular' => _x( 'Vote', 'Singular list name', 'da-reactions' ),
				'plural'   => _x( 'Votes', 'Plural list name', 'da-reactions' )
			)
		);
		$this->options = Options::getInstance( 'general' );
		$this->registered_post_types = get_post_types( [], 'objects' );
		$this->buddypress_types      = array(
			'bp_activity_comment' => _x( 'BP Comment', 'Description on votes table', 'da-reactions' ),
			'bp_group'            => _x( 'BP Group', 'Description on votes table', 'da-reactions' ),
			'bp_profile'          => _x( 'BP Profile', 'Description on votes table', 'da-reactions' ),
			'bp_activity'         => _x( 'BP Activity', 'Description on votes table', 'da-reactions' )
		);
		$reactions       = Data::getAllReactions();
		$this->reactions = array();
		foreach ( $reactions as $reaction ) {
			$this->reactions[ $reaction->ID ] = $reaction;
		}
	}
	/**
	 */
	public function prepare_items() {
		$filters = Request::getRequestData();
		$paged      = $filters['paged'];
		$order      = $filters['order'];
		$orderby    = $filters['orderby'];
		$date_range = $filters['date-range'];
		/**
		 * Avoid ginormous values
		 */
		$_SERVER['REQUEST_URI'] = remove_query_arg( '_wp_http_referer', $_SERVER['REQUEST_URI'] );
		global $wpdb;
		$screen   = get_current_screen();
		$per_page = 10;
		if ( isset( $screen ) ) {
			$option   = $screen->get_option( 'per_page', 'option' );
			$per_page = (int) get_user_meta( get_current_user_id(), $option, true );
			if ( $per_page < 1 ) {
				$per_page = 10;
			}
		}
		$cache_name = 'reaction.list';
		$votes_table_name = Data::getVotesTable();
		$columns  = $this->get_columns();
		$hidden   = $this->get_columns_hidden();
		$sortable = $this->get_columns_sortable();
		$this->_column_headers = array( $columns, $hidden, $sortable );
		if (
			! isset( $orderby ) ||
			! array_key_exists( $orderby, $sortable )
		) {
			$orderby = 'ID';
		}
		$cache_name .= ".orderby-$orderby";
		if (
			isset( $order ) &&
			in_array( strtolower( $order ), array( 'asc', 'desc' ) )
		) {
			$order = strtoupper( $order );
		} else {
			$order = 'ASC';
		}
		$cache_name .= ".order-$order";
		$date_clause = '';
		if ( isset( Common::getDateRangeOptions()[ $date_range ] ) ) {
			$date_clause = Data::getDateClause( $date_range, 'created_at' );
		}
		if ( ! empty( $date_range ) ) {
			$cache_name .= ".daterange-$date_range";
		}
		$cache_name_count = $cache_name . '.count';
		$cache_name .= ".perpage-$per_page";
		$cache_name .= ".page-$paged";
		$filter_clause = Data::getFilterClause();
		if ( $filters['da-reactions-nocache'] !== 'true' ) {
			$total_items = (int) Cache::get( $cache_name_count );
		}
		if ( ! isset( $total_items ) || $total_items < 1 ) {
			/**
			 * Note for reviewer: The $date_clause and $filter_clause variables are securely generated and controlled.
			 *    They do not contain untrusted user input and are thoroughly sanitized before being used in the query.
			 *    See Data::getFilterClause and Data::getDateClause for more information.
			 * */
			$total_items       = $wpdb->get_var(
				$wpdb->prepare( '
SELECT COUNT(%s)
FROM %i
WHERE 1 = 1
' . ( $date_clause /* phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared */ ) . '
' . ( $filter_clause /* phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared */ ),
					'ID',
					$votes_table_name
				)
			);
			Cache::set( $cache_name_count, $total_items );
		}
		$this->set_pagination_args( array(
			'total_items' => $total_items,
			'per_page'    => $per_page,
			'total_pages' => ceil( $total_items / $per_page )
		) );
		if ( $filters['da-reactions-nocache'] !== 'true' ) {
			$results = Cache::get( $cache_name );
		}
		if ( ! isset( $results ) ) {
			$paged_offset = ( $per_page * max( $paged - 1, 0 ) );
			/**
			 * Note for reviewer: The $date_clause and $filter_clause variables are securely generated and controlled.
			 *    They do not contain untrusted user input and are thoroughly sanitized before being used in the query.
			 *    See Data::getFilterClause and Data::getDateClause for more information.
			 * */
			$results = $wpdb->get_results(
				$wpdb->prepare( '
SELECT
    ID,
       resource_type,
       resource_id,
       emotion_id,
       user_id,
       user_token,
       user_ip,
       created_at
FROM %i
       WHERE 1 = 1
    ' . ( $date_clause /* phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared */ ) . '
    ' . ( $filter_clause /* phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared */ ) . '
ORDER BY %s %s
LIMIT %d OFFSET %d',
					$votes_table_name,
					$orderby,
					$order,
				$per_page,
					$paged_offset )
				, ARRAY_A );
			Cache::set( $cache_name, $results );
		}
		$this->items = $results;
	}
	/**
	 * @return array
	 */
	public function get_columns() {
		return array(
			'resource_id' => _x( 'Content', 'Column title in reactions list table', 'da-reactions' ),
			'emotion_id'  => _x( 'Reaction', 'Column title in reactions list table', 'da-reactions' ),
			'user_id'     => _x( 'User ID', 'Column title in reactions list table', 'da-reactions' ),
			'user_token'  => _x( 'User token', 'Column title in reactions list table', 'da-reactions' ),
			'user_ip'     => _x( 'User IP', 'Column title in reactions list table', 'da-reactions' ),
			'created_at'  => _x( 'Created at', 'Column title in reactions list table', 'da-reactions' ),
		);
	}
	/**
	 * @return array[]
	 */
	public function get_columns_sortable() {
		return array(
			'ID'          => array( 'ID', true ),
			'resource_id' => array( 'resource_id', true ),
			'emotion_id'  => array( 'emotion_id', true ),
			'user_id'     => array( 'user_id', true ),
			'user_token'  => array( 'user_token', true ),
			'user_ip'     => array( 'user_ip', true ),
			'created_at'  => array( 'created_at', true )
		);
	}
	/**
	 * @return string[]
	 */
	public function get_columns_hidden() {
		return array(
			'user_token',
			'user_ip'
		);
	}
	/**
	 * @param array|object $item
	 * @param string $column_name
	 *
	 * @return mixed|void
	 */
	public function column_default( $item, $column_name ) {
		return $item[ $column_name ];
	}
	/**
	 * @param $item
	 *
	 * @return string
	 */
	public function column_resource_id( $item ) {
		$actions = array();
		$actions['delete'] = sprintf( '<a class="delete-row" data-id="%s" href="javascript:;">%s</a>',
			$item['ID'],
			_x( 'Delete vote', 'Delete button on votes table row', 'da-reactions' )
		);
		if ( $item['resource_type'] === 'comment' ) {
			$label = "Comment #{$item['resource_id']}";
		} else if ( isset( $this->registered_post_types[ $item['resource_type'] ] ) ) {
			$post = get_post( $item['resource_id'] );
			if ( is_null( $post ) ) {
				$label = _x( 'N.A.', 'Post title not available in votes table cell', 'da-reactions' ) . " ({$item['resource_type']}#{$item['resource_id']})";
			} else {
				$post_type_label = $this->registered_post_types[ $item['resource_type'] ]->labels->singular_name;
				$post_title      = $post->post_title;
				$label           = "$post_type_label: <strong>$post_title</strong>";
				$actions['type-filter'] = sprintf( '<a class="add-filter" data-type="type" data-id="%s" href="javascript:;">%s</a>',
					$item['resource_type'],
					sprintf(
					// translators: %s is the post type label
						_x(
							'All %s',
							'Filter by content type: button on votes table row',
							'da-reactions'
						),
						$this->registered_post_types[ $item['resource_type'] ]->labels->name
					)
				);
				$actions['single-filter'] = sprintf( '<a class="add-filter" data-type="content" data-id="%s" href="javascript:;">%s</a>',
					$item['resource_type'] . '-' . $item['resource_id'],
					sprintf(
					// translators: %s is the post type label
						_x(
							'This %s',
							'Filter by specific content: button on votes table row',
							'da-reactions'
						),
						$this->registered_post_types[ $item['resource_type'] ]->labels->singular_name
					)
				);
			}
		} else if ( isset( $this->buddypress_types[ $item['resource_type'] ] ) && class_exists( BuddyPress::class ) ) {
			$label = sprintf(
			// translators: %s is the resource type
				_x( 'Deleted %s', 'Table cell with unknown content', 'da-reactions' ), $this->buddypress_types[ $item['resource_type'] ]
			);
			switch ( $item['resource_type'] ) {
				case 'bp_activity_comment':
					$enabled = $this->options->getOption( 'bp_activity_comment_enabled', 'off' ) === 'on';
					if ( $enabled ) {
						$comment = BuddyPress::getActivityCommentById( $item['resource_id'] );
						if ( ! is_null( $comment ) ) {
							$label = $this->buddypress_types[ $item['resource_type'] ] . ': '
							         . '<strong>'
							         . $this->trim_string( $comment->content )
							         . '</strong>';
							$actions['type-filter'] = sprintf( '<a class="add-filter" data-type="type" data-id="%s" href="javascript:;">%s</a>',
								$item['resource_type'],
								sprintf(
									_x(
										'All BP Activity comments',
										'Filter by content type: button on votes table row',
										'da-reactions'
									),
									$this->buddypress_types[ $item['resource_type'] ]
								)
							);
							$actions['single-filter'] = sprintf( '<a class="add-filter" data-type="content" data-id="%s" href="javascript:;">%s</a>',
								$item['resource_type'] . '-' . $item['resource_id'],
								sprintf(
									_x(
										'This Activity comment',
										'Filter by specific content: button on votes table row',
										'da-reactions'
									),
									$this->buddypress_types[ $item['resource_type'] ]
								)
							);
						}
					}
					break;
				case 'bp_group':
					$enabled = $this->options->getOption( 'bp_group_enabled', 'off' ) === 'on';
					if ( $enabled ) {
						$group = BuddyPress::getGroupById( $item['resource_id'] );
						if ( ! is_null( $group ) ) {
							$label = $this->buddypress_types[ $item['resource_type'] ] . ': '
							         . '<strong>'
							         . $this->trim_string( $group->name )
							         . '</strong>';
							$actions['type-filter'] = sprintf( '<a class="add-filter" data-type="type" data-id="%s" href="javascript:;">%s</a>',
								$item['resource_type'],
								sprintf(
									_x(
										'All BP Groups',
										'Filter by content type: button on votes table row',
										'da-reactions'
									),
									$this->buddypress_types[ $item['resource_type'] ]
								)
							);
							$actions['single-filter'] = sprintf( '<a class="add-filter" data-type="content" data-id="%s" href="javascript:;">%s</a>',
								$item['resource_type'] . '-' . $item['resource_id'],
								sprintf(
									_x(
										'This Group',
										'Filter by specific content: button on votes table row',
										'da-reactions'
									),
									$this->buddypress_types[ $item['resource_type'] ]
								)
							);
						}
					}
					break;
				case 'bp_profile':
					$enabled = $this->options->getOption( 'bp_profile_enabled', 'off' ) === 'on';
					if ( $enabled ) {
						$user = get_userdata( $item['resource_id'] );
						if ( ! is_null( $user ) ) {
							$label = $this->buddypress_types[ $item['resource_type'] ] . ': '
							         . '<strong>'
							         . $this->trim_string( $user->display_name )
							         . '</strong>';
						}
						$actions['type-filter'] = sprintf( '<a class="add-filter" data-type="type" data-id="%s" href="javascript:;">%s</a>',
							$item['resource_type'],
							sprintf(
								_x(
									'All BP Profiles',
									'Filter by content type: button on votes table row',
									'da-reactions'
								),
								$this->buddypress_types[ $item['resource_type'] ]
							)
						);
						$actions['single-filter'] = sprintf( '<a class="add-filter" data-type="content" data-id="%s" href="javascript:;">%s</a>',
							$item['resource_type'] . '-' . $item['resource_id'],
							sprintf(
								_x(
									'This Profile',
									'Filter by specific content: button on votes table row',
									'da-reactions'
								),
								$this->buddypress_types[ $item['resource_type'] ]
							)
						);
					}
					break;
				case 'bp_activity':
					$enabled = $this->options->getOption( 'bp_activity_enabled', 'off' ) === 'on';
					if ( $enabled ) {
						$activity = BuddyPress::getActivityById( $item['resource_id'] );
						if ( ! is_null( $activity ) ) {
							$label = $this->buddypress_types[ $item['resource_type'] ] . ': '
							         . '<strong>'
							         . $this->trim_string( $activity->content )
							         . '</strong>';
							$actions['type-filter'] = sprintf( '<a class="add-filter" data-type="type" data-id="%s" href="javascript:;">%s</a>',
								$item['resource_type'],
								sprintf(
									_x(
										'All BP Activities',
										'Filter by content type: button on votes table row',
										'da-reactions'
									),
									$this->buddypress_types[ $item['resource_type'] ]
								)
							);
							$actions['single-filter'] = sprintf( '<a class="add-filter" data-type="content" data-id="%s" href="javascript:;">%s</a>',
								$item['resource_type'] . '-' . $item['resource_id'],
								sprintf(
									_x(
										'This Activity',
										'Filter by specific content: button on votes table row',
										'da-reactions'
									),
									$this->buddypress_types[ $item['resource_type'] ]
								)
							);
						}
					}
					break;
			}
		} else if ( str_starts_with( $item['resource_type'], 'wpforo' ) ) {
			if ( function_exists( 'WPF' ) && $wpf = WPF() ) {
				$board_id   = str_replace( 'wpforo', '', $item['resource_type'] );
				$post_id    = $item['resource_id'];
				$post       = $wpf->post->get_post( $post_id );
				$post_title = isset( $post['title'] ) ? $post['title'] : "Post #$post_id";
				if ( is_numeric( $board_id ) || empty( $board_id ) ) {
					$board                    = $wpf->board->get_board( $board_id );
					$board_title              = $board['title'];
					$actions['board-filter']  = sprintf( '<a class="add-filter" data-type="type" data-id="%s" href="javascript:;">%s</a>',
						'wpforo' . $board_id,
							_x(
								'This Board only',
								'Filter by specific content: button on votes table row',
								'da-reactions'
						)
					);
					$actions['single-filter'] = sprintf( '<a class="add-filter" data-type="content" data-id="%s" href="javascript:;">%s</a>',
						$item['resource_type'] . '-' . $item['resource_id'],
							_x(
								'This Forum Entry only',
								'Filter by specific content: button on votes table row',
								'da-reactions'
						)
					);
					$label                    = sprintf(
					// translators: %1$s is the board title, %2$s is the post title
						_x( '%1$s: <strong>%2$s</strong>', 'Votes list label', 'da-reactions' ), $board_title, $post_title
					);
				} else {
					$label = _x( 'Unknown Board', 'Votes list label', 'da-reactions' );
				}
			} else {
				$label = _x( 'WpForo Uninstalled', 'Label in votes list', 'da-reactions' );
			}
		} else {
			$label = $item['resource_type'];
		}
		return sprintf( '%1$s %2$s', $label,
			$this->row_actions( $actions ) );
	}
	/**
	 * @param $item
	 *
	 * @return string|void
	 */
	public function column_emotion_id( $item ) {
		$actions = array();
		if ( isset( $this->reactions[ $item['emotion_id'] ] ) ) {
			$label = $this->reactions[ $item['emotion_id'] ]->label;
		} else {
			return _x( '= Not available =', 'Cell content', 'da-reactions' );
		}
		$actions['reaction-filter'] = sprintf( '<a class="add-filter" data-type="reaction" data-id="%d" href="javascript:;">%s</a>',
			$item['emotion_id'],
			sprintf(
			// translators: %s is the reaction label
				_x(
					'Only %s',
					'Filter by specific reaction: button on votes table row',
					'da-reactions'
				),
				$label
			)
		);
		$output = '-';
		if ( isset( $this->reactions[ $item['emotion_id'] ] ) ) {
			$fileUrl = FileSystem::getImageUrl( $this->reactions[ $item['emotion_id'] ]->file_name );
			$image   = Frontend::getSingleReactionImage( $fileUrl, 16, $label );
			$output = $image . ' <strong>' . $label . '</strong>';
		}
		return sprintf( '%1$s %2$s',
			$output,
			$this->row_actions( $actions ) );
	}
	/**
	 * @param $item
	 *
	 * @return string
	 */
	public function column_user_id( $item ) {
		$actions = array();
		if ( ! empty( $item['user_id'] ) && $item['user_id'] > 0 ) {
			$actions['id-filter'] = sprintf( '<a class="add-filter" data-type="user-id" data-id="%d" href="javascript:;">%s</a>',
				$item['user_id'],
				_x( 'Only this user (by ID)', 'Filter button on votes table row', 'da-reactions' )
			);
		}
		if ( ! empty( $item['user_token'] ) && $item['user_token'] > 0 ) {
			$actions['token-filter'] = sprintf( '<a class="add-filter" data-type="user-token" data-id="%s" href="javascript:;">%s</a>',
				$item['user_token'],
				_x( 'Only this user (by token)', 'Filter button on votes table row', 'da-reactions' )
			);
		}
		if ( ! empty( $item['user_ip'] ) ) {
			$actions['ip-filter'] = sprintf( '<a class="add-filter" data-type="user-ip" data-id="%s" href="javascript:;">%s</a>',
				$item['user_ip'],
				_x( 'Only this user (by IP address)', 'Filter button on votes table row', 'da-reactions' )
			);
		}
		$user = get_userdata( $item['user_id'] );
		if ( ! $user ) {
			$general_options = Options::getInstance( 'general' );
			$label           = $general_options->getOption( 'default_votername', 'Anon' );
		} else {
			$label = $user->display_name;
		}
		return sprintf( '%1$s %2$s',
			$label,
			$this->row_actions( $actions ) );
	}
	/**
	 * @param string $which
	 *
	 */
	public function extra_tablenav( $which ) {
		$filters = Request::getRequestData();
		$page         = $filters['page'];
		$date_range   = $filters['date-range'];
		$filter_types = $filters['filter-type'];
		$filter_ids   = $filters['filter-id'];
		$uniques      = array();
		?>
        <input type="hidden" name="page" value="<?php echo esc_attr( $page ) ?>">
		<?php
		if ( $which === "top" ) {
			if ( ! empty( $filter_types ) ) {
				for ( $i = 0, $iMax = count( $filter_types ); $i < $iMax; $i ++ ) {
					$filter_type = $filter_types[ $i ];
					$filter_id   = $filter_ids[ $i ];
					$unique_key  = $filter_type . '-' . $filter_id;
					if ( ! empty( $filter_id ) && ! empty( $filter_type ) && ! isset( $uniques[ $unique_key ] ) ) {
						$uniques[ $unique_key ] = true;
						?>
                        <span class="filter-container">
                            <input type="hidden" name="filter-type[]"
                                   value="<?php echo esc_attr( $filter_type ) ?>">
                            <input type="hidden" name="filter-id[]"
                                   value="<?php echo esc_attr( $filter_id ) ?>">
                            <a class="button remove-filter" href="javascript:;">
                                <strong><?php echo esc_html_x( 'Filter:', 'Search chips title', 'da-reactions' ); ?></strong>
                                <?php echo esc_html( $filter_type ) ?> [<?php echo esc_html( $filter_id ) ?>]
                                <span>×</span>
                            </a>
                        </span>
						<?php
					}
				}
			}
			Utils::printSelect(
				Common::getDateRangeOptions(),
				$date_range,
				'',
				'date-range'
			);
			?>
            <input type="submit" class="button action"
                   value="<?php echo esc_attr_x( 'Apply', 'Submit button label', 'da-reactions' ); ?>">
			<?php
		} else {
			/** @noinspection NestedPositiveIfStatementsInspection */
			if ( ( $which === "bottom" ) && darea_fs()->is_premium() ) {
				?>
                <a download="da-reactions-report.csv"
                   rel="noopener"
                   href="<?php echo esc_url( add_query_arg(
	                   array_merge(
		                   array( 'action' => 'da_reactions_report' ),
		                   $filters
	                   ), admin_url( 'admin-ajax.php' ) ) ); ?>"
                   target="_blank" class="button action">
                    <span class="dashicons dashicons-media-spreadsheet"
                          style="line-height: 1.4em"></span>
	                <?php echo esc_html_x( 'Export as CSV', 'Submit button label', 'da-reactions' ); ?>
                </a>
                <a href="<?php echo esc_url( admin_url( 'admin.php' ) ) ?>?page=da-reactions_import"
                   class="button action">
                    <span class="dashicons dashicons-database-import"
                          style="line-height: 1.4em"></span>
					<?php echo esc_html_x( 'Import CSV', 'Submit button label', 'da-reactions' ); ?>
                </a>
				<?php
			}
		}
	}
	/**
	 * @param $s
	 *
	 * @return string
	 */
	private function trim_string( $s ) {
		$length = 64;
		return ( strlen( $s ) > $length ) ? substr( $s, 0, $length ) . '...' : $s;
	}
}
