<?php
/**
 * Class Data
 *
 * Manages all database requests
 *
 * @package DaReactions
 *
 * @since 1.0.0
 */
namespace DaReactions;
use DaReactions\Entities\Reaction;
use DateTime;
use Exception;
/**
 * Class Data
 *
 * Manages all database requests
 *
 * @package DaReactions
 *
 * @since 1.0.0
 */
class Data {
	/**
	 * Name of the votes table without prefix
	 *
	 * @var string
	 */
	private static $votesTable = 'da_r_votes';
	/**
	 * Name of reactions table without prefix
	 *
	 * @var string
	 */
	private static $reactionsTable = 'da_r_reactions';
	/**
	 * Name of groups table without prefix
	 *
	 * @var string
	 */
	private static $groupsTable = 'da_r_groups';
	/**
	 * Deletes all inactive reactions from database
	 *
	 * @since 1.0.0
	 */
	public static function clearDisabledReactions() {
		global $wpdb;
		$reactions_table_name = self::getReactionsTable();
		$votes_table_name     = self::getVotesTable();
		$inactive_reactions   = $wpdb->get_results(
			$wpdb->prepare(
				'SELECT * FROM %i WHERE active = %d',
				$reactions_table_name,
				0
			)
		);
		foreach ( $inactive_reactions as $inactive_reaction ) {
			$wpdb->delete(
				$votes_table_name,
				array(
					'emotion_id' => $inactive_reaction->ID
				)
			);
		}
		$wpdb->delete(
			$reactions_table_name,
			array(
				'active' => 0
			)
		);
	}
	/**
	 * Creates initial data
	 *
	 * @param string|null $prefix The table name prefix for a specific blog
	 *
	 * @since 1.0.0
	 */
	public static function createDefaultReactions() {
		global $wpdb;
		$wpdb->show_errors();
		$table_name = self::getReactionsTable();
		$wpdb->query( $wpdb->prepare( 'TRUNCATE TABLE %i', $table_name ) );
		$wpdb->insert( $table_name, array(
			'ID'         => 1,
			'label'      => 'Like',
			'color'      => '#8F9CDF',
			'file_name'  => 'like-1.svg',
			'sort_order' => 1
		) );
		$wpdb->insert( $table_name, array(
			'ID'         => 2,
			'label'      => 'Love',
			'color'      => '#DF8F9C',
			'file_name'  => 'love-2.svg',
			'sort_order' => 2
		) );
		$wpdb->insert( $table_name, array(
			'ID'         => 3,
			'label'      => 'Ah Ah',
			'color'      => '#DFD28F',
			'file_name'  => 'ah-ah-3.svg',
			'sort_order' => 3
		) );
		$wpdb->insert( $table_name, array(
			'ID'         => 4,
			'label'      => 'Wow',
			'color'      => '#9CDF8F',
			'file_name'  => 'wow-4.svg',
			'sort_order' => 4
		) );
		$wpdb->insert( $table_name, array(
			'ID'         => 5,
			'label'      => 'Sad',
			'color'      => '#8FDFD2',
			'file_name'  => 'sad-5.svg',
			'sort_order' => 5
		) );
		$wpdb->insert( $table_name, array(
			'ID'         => 6,
			'label'      => 'Grrr',
			'color'      => '#D28FDF',
			'file_name'  => 'grrr-6.svg',
			'sort_order' => 6
		) );
		$wpdb->hide_errors();
	}
	/**
	 * Create Reactions table on database
	 *
	 * @since 1.0.0
	 */
	public static function createReactionsTable() {
		global $wpdb;
		$wpdb->show_errors();
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		$table_name                        = self::getReactionsTable();
		$create_reactions_table_sql_string = $wpdb->prepare(
			'CREATE TABLE IF NOT EXISTS %i (
            ID mediumint(9) NOT NULL AUTO_INCREMENT,
            label varchar(36) NOT NULL DEFAULT %s,
            file_name varchar(36) NOT NULL DEFAULT %s,
            created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            color varchar(36) NOT NULL DEFAULT %s,
            active smallint(1) NOT NULL DEFAULT %d,
            sort_order smallint(3) NOT NULL DEFAULT %d,
            PRIMARY KEY (ID)
        ) ' . $wpdb->get_charset_collate(),
			$table_name,
			'Reaction',
			'',
			'#006699',
			1,
			0
		);
		dbDelta( $create_reactions_table_sql_string );
		$wpdb->hide_errors();
	}
	/**
	 * Create Votes table on database
	 *
	 * @param string|null $prefix The table name prefix for a specific blog
	 *
	 * @since 1.0.0
	 */
	public static function createVotesTable() {
		$table_name = self::getVotesTable();
		global $wpdb;
		$wpdb->show_errors();
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		$charset_collate = $wpdb->get_charset_collate();
		$create_votes_table_sql_string = "CREATE TABLE IF NOT EXISTS $table_name (
            ID mediumint(9) NOT NULL AUTO_INCREMENT,
            resource_id mediumint(9),
            resource_type varchar(20),
            emotion_id mediumint(9) NOT NULL,
            user_id varchar(32),
            user_token varchar(32),
            user_ip varchar(16),
            created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            KEY da_reaction_resource_id (resource_id),
            KEY da_reaction_user_id (user_id),
            KEY da_reaction_resource_type (resource_type),
            PRIMARY KEY (id)
        ) $charset_collate";
		dbDelta( $create_votes_table_sql_string );
		$wpdb->hide_errors();
	}
	/**
	 * Deletes reaction for specific content
	 *
	 * @param int $item_id
	 * @param string|null $item_type
	 *
	 * @return bool|int
	 *
	 * @since 1.0.0
	 */
	public static function deleteAllContentReactions( $item_id, $item_type = null ) {
		if ( is_null( $item_type ) ) {
			$item_type = 'post';
		}
		if ( $item_id < 0 ) {
			return false;
		}
		global $wpdb;
		if ( $item_type !== 'comment' ) {
			$comments = $wpdb->get_results( $wpdb->prepare( 'SELECT * FROM %i WHERE comment_post_ID = %d', $wpdb->comments, $item_id ) );
			foreach ( $comments as $comment ) {
				self::deleteAllContentReactions( $comment->comment_ID, 'comment' );
			}
		}
		return $wpdb->delete(
			self::getVotesTable(),
			array(
				'resource_id'   => $item_id,
				'resource_type' => $item_type
			)
		);
	}
	/**
	 * Deletes reaction for specific user on specific content
	 *
	 * @param int $item_id
	 * @param string $item_type
	 *
	 * @return bool|int
	 *
	 * @since 1.0.0
	 */
	public static function deleteUserReaction( $item_id = 0, $item_type = 'post' ) {
		if ( $item_id < 1 ) {
			return false;
		}
		global $wpdb;
		$user_token = User::getUserToken();
		if ( darea_fs()->is_premium() ) {
			do_action(
				'da_r_before_delete_user_reaction',
				$item_id,
				$item_type,
				$user_token
			);
		}
		$result = $wpdb->delete(
			self::getVotesTable(),
			array(
				'resource_id'   => $item_id,
				'resource_type' => $item_type,
				'user_token'    => $user_token
			)
		);
		if ( darea_fs()->is_premium() ) {
			do_action(
				'da_r_after_delete_user_reaction',
				$item_id,
				$item_type,
				$user_token
			);
		}
		return $result;
	}
	/**
	 * Deletes reactions for specific content blocks
	 * Leaves specific ids
	 * Used to clean database from deleted Gutenberg blocks
	 *
	 * @param string $resource_type
	 * @param array $exclude_ids
	 *
	 * @return int|bool
	 */
	public static function deleteGutenbergBlockVotes( $resource_type = '', $exclude_ids = array() ) {
		if ( empty( $resource_type ) ) {
			return false;
		}
		global $wpdb;
		$table_name = self::getVotesTable();
		$parameters = array( $resource_type );
		$sql = "DELETE FROM $table_name WHERE resource_type = %s";
		if ( ! empty( $exclude_ids ) ) {
			$placeholders = implode( ', ', array_fill( 0, count( $exclude_ids ), '%d' ) );
			$sql          .= " AND resource_id NOT IN ($placeholders)";
			$parameters   = array_merge( $parameters, $exclude_ids );
		}
		return $wpdb->query( $wpdb->prepare( ( $sql /* phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared */ ), ...$parameters ) );
	}
	/**
	 * Marks all reactions as disabled
	 *
	 * @return false|int
	 *
	 * @since 1.0.0
	 */
	public static function disableAllReactions() {
		global $wpdb;
		$table_name = self::getReactionsTable();
		return $wpdb->update(
			$table_name,
			array(
				'active' => '0'
			),
			array(
				'active' => '1'
			),
			array( '%d' ),
			array( '%d' )
		);
	}
	/**
	 * Drops custom tables from database
	 * Leaves DataBase clean after uninstall or deactivation
	 *
	 * @param null $prefix
	 *
	 * @since 1.0.0
	 */
	public static function dropTables( $prefix = null ) {
		global $wpdb;
		$tables = [
			self::getReactionsTable( ! is_null( $prefix ) ),
			self::getVotesTable( ! is_null( $prefix ) ),
			self::getGroupsTable( ! is_null( $prefix ) )
		];
		foreach ( $tables as $table ) {
			$table_name = $prefix . $table;
			$wpdb->query( $wpdb->prepare( 'TRUNCATE TABLE %i', $table_name ) );
			$wpdb->query( $wpdb->prepare( 'DROP TABLE IF EXISTS %i', $table_name ) );
		}
		$wpdb->flush();
	}
	/**
	 * Retrieve all reactions from database
	 * Used for dashboard widgets
	 *
	 * @return array|null|object
	 *
	 * @since 1.0.0
	 */
	public static function getAllContentReactions() {
		global $wpdb;
		$reactions_table = self::getReactionsTable();
		$votes_table     = self::getVotesTable();
		$result          = $wpdb->get_results(
			$wpdb->prepare(
				'SELECT * FROM (
            SELECT 
                r.ID,
                r.label,
                r.file_name,
                r.active,
                r.color,
                r.sort_order,
                count(v.ID) AS total
            FROM %i r
            LEFT JOIN %i v
                ON v.emotion_id = r.ID
                AND r.active = 1
            GROUP BY r.ID
            ORDER BY r.sort_order ) q',
				$reactions_table,
				$votes_table
			)
		);
		if ( darea_fs()->is_premium() ) {
			$result = apply_filters(
				'da_r_get_all_content_reactions',
				$result
			);
		}
		return $result;
	}
	/**
	 * Get all groups from database
	 *
	 * @return array|null|object
	 *
	 * @since 5.0.0
	 */
	public static function getAllGroups() {
		global $wpdb;
		$table_name = self::getGroupsTable();
		return $wpdb->get_results(
			$wpdb->prepare(
				'SELECT * FROM %i ORDER BY sort_order',
				$table_name
			)
		);
	}
	/**
	 * Get all reactions from database
	 *
	 * @return array|null|object
	 *
	 * @since 1.0.0
	 */
	public static function getAllReactions() {
		global $wpdb;
		$table_name = self::getReactionsTable();
		$reactions  = $wpdb->get_results(
			$wpdb->prepare(
				'SELECT * FROM %i ORDER BY sort_order',
				$table_name
			)
		);
		$reactions  = array_map( [ Reaction::class, 'get_reaction' ], $reactions );
		if ( darea_fs()->is_premium() ) {
			$reactions = apply_filters(
				'da_r_get_all_reactions',
				$reactions );
		}
		return $reactions;
	}
	/**
	 * Gets all comments ordered by reactions quantity
	 * Used in ContentsByReactionWidget->widget
	 *
	 * @param int $reaction_id
	 * @param int $limit
	 *
	 * @return array|null|object
	 *
	 * @since 1.0.0
	 */
	public static function getCommentsByReaction( $reaction_id = 0, $limit = 5 ) {
		/**
		 * Get from cache
		 *
		 * @since 3.0.0
		 */
		$cache_name    = "widget.typecomment.reaction$reaction_id.limit$limit";
		$cached_result = Cache::get( $cache_name );
		if ( ! is_null( $cached_result ) ) {
			return $cached_result;
		}
		global $wpdb;
		$votes_table = self::getVotesTable();
		$comments_table = $wpdb->comments;
		$args = array();
		$query = "SELECT c.comment_ID,
            c.comment_post_ID,
            c.comment_author,
            c.comment_date,
            c.comment_content,
            c.comment_approved,
            c.user_id,
            COUNT(v.ID) AS total_reactions
            FROM $comments_table c
            INNER JOIN $votes_table v
            ON v.resource_id= c.comment_ID
            AND v.resource_type = %s";
		$args[] = 'comment';
		if ( $reaction_id > 0 ) {
			$query  .= " AND v.emotion_id = %d ";
			$args[] = $reaction_id;
		}
		$query .= "WHERE c.comment_approved = %d
            GROUP BY c.comment_ID
            ORDER BY total_reactions DESC LIMIT %d";
		$args[] = 1;
		$args[] = absint( $limit );
		$result = $wpdb->get_results( $wpdb->prepare( ( $query  /* phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared */ ), ...$args ) );
		if ( darea_fs()->is_premium() ) {
			$result = apply_filters(
				'da_r_get_comments_by_reaction',
				$result,
				$reaction_id,
				$limit
			);
		}
		Cache::set( $cache_name, $result );
		return $result;
	}
	/**
	 * Gets all contents ordered by reactions quantity
	 * Used in ContentsByReactionWidget->widget
	 *
	 * @param string $item_type
	 * @param int $reaction_id
	 * @param int $limit
	 *
	 * @return array|null|object
	 */
	public static function getContentsByReaction( $item_type = 'post', $reaction_id = 0, $limit = 5 ) {
		/**
		 * Get from cache
		 *
		 * @since 3.0.0
		 */
		$cache_name    = "widget.type$item_type.reaction$reaction_id.limit$limit";
		$cached_result = Cache::get( $cache_name );
		if ( ! is_null( $cached_result ) ) {
			return $cached_result;
		}
		global $wpdb;
		$votes_table = self::getVotesTable();
		$posts_table = $wpdb->posts;
		$args   = array();
		$args[] = $item_type;
		$args[] = 'publish';
		$query = "SELECT p.ID,
            p.post_author,
            p.post_date,
            p.post_date_gmt,
            p.post_content,
            p.post_title,
            p.post_excerpt,
            p.post_status,
            p.comment_status,
            p.ping_status,
            p.post_password,
            p.post_name,
            p.to_ping,
            p.pinged,
            p.post_modified,
            p.post_modified_gmt,
            p.post_content_filtered,
            p.post_parent,
            p.guid,
            p.menu_order,
            p.post_type,
            p.post_mime_type,
            p.comment_count,
            COUNT(v.ID) AS total_reactions
            FROM $posts_table p
            INNER JOIN $votes_table v
            ON v.resource_id= p.ID
            AND v.resource_type = p.post_type
            WHERE p.post_type = %s
            AND p.post_status = %s";
		if ( $reaction_id > 0 ) {
			$query  .= "
            AND v.emotion_id = %d";
			$args[] = $reaction_id;
		}
		$query .= "
            GROUP BY p.ID
            ORDER BY total_reactions DESC
            LIMIT %d";
		$args[] = $limit;
		$result = $wpdb->get_results( $wpdb->prepare( ( $query  /* phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared */ ), ...$args ) );
		$result = array_map( 'get_post', $result );
		if ( darea_fs()->is_premium() ) {
			$result = apply_filters(
				'da_r_get_contents_by_reaction',
				$result,
				$item_type,
				$reaction_id,
				$limit
			);
		}
		Cache::set( $cache_name, $result );
		return $result;
	}
	/**
	 * @param $date_range
	 * @param $column_name
	 *
	 * @return string
	 */
	public static function getDateClause( $date_range, $column_name = 'created_at' ) {
		global $wpdb;
		// Validate the column name to avoid SQL injection
		$allowed_columns = [
			'created_at',
			'post_date'
		];
		if ( ! in_array( $column_name, $allowed_columns, true ) ) {
			$column_name = 'created_at'; // Default to a safe column
		}
		// Prepare the date clause based on the date range
		$date_clause = '';
		switch ( $date_range ) {
			case 'today':
				$date_clause = $wpdb->prepare( " AND DATE(`%s`) = CURDATE()", $column_name );
				break;
			case 'yesterday':
				$date_clause = $wpdb->prepare( " AND DATE(`%s`) >= DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND DATE(`%s`) < CURDATE()", $column_name, $column_name );
				break;
			case 'this-week':
				$date_clause = $wpdb->prepare( " AND WEEKOFYEAR(`%s`) = WEEKOFYEAR(NOW())", $column_name );
				break;
			case 'seven-days':
				$date_clause = $wpdb->prepare( " AND DATE(`%s`) >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) AND DATE(`%s`) < CURDATE()", $column_name, $column_name );
				break;
			case 'this-month':
				$date_clause = $wpdb->prepare( " AND MONTH(`%s`) = MONTH(NOW())", $column_name );
				break;
			case 'thirty-days':
				$date_clause = $wpdb->prepare( " AND DATE(`%s`) >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND DATE(`%s`) < CURDATE()", $column_name, $column_name );
				break;
			case 'sixty-days':
				$date_clause = $wpdb->prepare( " AND DATE(`%s`) >= DATE_SUB(CURDATE(), INTERVAL 60 DAY) AND DATE(`%s`) < CURDATE()", $column_name, $column_name );
				break;
			case 'ninety-days':
				$date_clause = $wpdb->prepare( " AND DATE(`%s`) >= DATE_SUB(CURDATE(), INTERVAL 90 DAY) AND DATE(`%s`) < CURDATE()", $column_name, $column_name );
				break;
			case 'this-year':
				$date_clause = $wpdb->prepare( " AND YEAR(`%s`) = YEAR(NOW())", $column_name );
				break;
			case '365-days':
				$date_clause = $wpdb->prepare( " AND DATE(`%s`) >= DATE_SUB(CURDATE(), INTERVAL 365 DAY) AND DATE(`%s`) < CURDATE()", $column_name, $column_name );
				break;
		}
		if ( darea_fs()->is_premium() ) {
			$date_clause = apply_filters(
				'da_r_get_date_clause',
				$date_clause,
				$date_range,
				$column_name
			);
		}
		return $date_clause;
	}
	/**
	 * @return string
	 */
	public static function getFilterClause() {
		global $wpdb;
		$filters = Request::getRequestData();
		$filter_types  = $filters['filter-type'];
		$filter_ids    = $filters['filter-id'];
		$filter_clause = '';
		$clauses       = [];
		$params        = [];
		if ( ! is_array( $filter_types ) || ! is_array( $filter_ids ) ) {
			return $filter_clause;
		}
		for ( $i = 0, $iMax = count( $filter_types ); $i < $iMax; $i ++ ) {
			$filter_type = $filter_types[ $i ];
			$filter_id   = $filter_ids[ $i ];
			if ( ! empty( $filter_type ) && ! empty( $filter_id ) ) {
				switch ( $filter_type ) {
					case 'type':
						$clauses[] = "`resource_type` = %s";
						$params[]  = $filter_id;
						break;
					case 'content':
						$parts         = explode( '-', $filter_id );
						$resource_id   = (int) array_pop( $parts );
						$resource_type = implode( '-', $parts );
						$clauses[]     = "`resource_type` = %s AND `resource_id` = %d";
						$params[]      = $resource_type;
						$params[]      = $resource_id;
						break;
					case 'reaction':
						$clauses[] = "`emotion_id` = %d";
						$params[]  = (int) $filter_id;
						break;
					case 'user-id':
						$clauses[] = "`user_id` = %d";
						$params[]  = (int) $filter_id;
						break;
					case 'user-token':
						$clauses[] = "`user_token` = %s";
						$params[]  = $filter_id;
						break;
					case 'user-ip':
						$clauses[] = "`user_ip` = %s";
						$params[]  = $filter_id;
						break;
				}
			}
		}
		if ( ! empty( $clauses ) ) {
			$filter_clause = ' AND ' . implode( ' AND ', $clauses );
			$filter_clause = $wpdb->prepare(
				( $filter_clause /* phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared */ ),
				...$params
			);
		}
		if ( darea_fs()->is_premium() ) {
			$filter_clause = apply_filters(
				'da_r_get_filter_clause',
				$filter_clause,
				$filter_types,
				$filter_ids
			);
		}
		return $filter_clause;
	}
	/**
	 * Gets the most voted reaction for specific content
	 *
	 * @param $item_id
	 * @param $item_type
	 *
	 * @return array|null|object
	 *
	 * @since 1.0.0
	 */
	public static function getMainReactionForContent( $item_id, $item_type ) {
		/**
		 * Get from cache
		 *
		 * @since 3.0.0
		 */
		$cache_name    = "single.type$item_type.id$item_id";
		$cached_result = Cache::get( $cache_name );
		if ( ! is_null( $cached_result ) ) {
			return $cached_result;
		}
		global $wpdb;
		$reactions_table = self::getReactionsTable();
		$votes_table     = self::getVotesTable();
		$result          = $wpdb->get_results(
			$wpdb->prepare(
				'SELECT
            r.ID,
            r.label,
            r.file_name,
            r.created_at,
            r.color,
            r.active,
            r.color,
            r.sort_order,
            count(v.ID) AS total
            FROM %i r
            INNER JOIN $votes_table v
            ON v.emotion_id = r.ID
            WHERE v.resource_type = %s
            AND v.resource_id = %d
            AND r.active = %d
            LIMIT 1',
				$reactions_table,
				$item_type,
				$item_id,
				1
			)
		);
		if ( darea_fs()->is_premium() ) {
			$result = apply_filters(
				'da_r_get_main_reaction_for_content',
				$result,
				$item_id,
				$item_type
			);
		}
		Cache::set( $cache_name, $result );
		return $result;
	}
	/**
	 * Get reaction object by id
	 *
	 * @param int $reaction_id
	 *
	 * @return object | boolean
	 * @since 1.3.0
	 *
	 */
	public static function getReactionById( $reaction_id ) {
		/**
		 * Get from cache
		 *
		 * @since 3.0.0
		 */
		$cache_name    = "reaction.reaction$reaction_id";
		$cached_result = Cache::get( $cache_name );
		if ( ! is_null( $cached_result ) ) {
			return $cached_result;
		}
		if ( $reaction_id === 0 ) {
			return false;
		}
		global $wpdb;
		$table_name = self::getReactionsTable();
		$result     = $wpdb->get_row(
			$wpdb->prepare(
				'SELECT * FROM %i WHERE ID = %d',
				$table_name,
				$reaction_id
			)
		);
		$result     = Reaction::get_reaction( $result );
		if ( darea_fs()->is_premium() ) {
			$result = apply_filters(
				'da_r_get_reaction_by_id',
				$result,
				$reaction_id
			);
		}
		Cache::set( $cache_name, $result );
		return $result;
	}
	/**
	 * Gets reaction for specific user on specific content
	 *
	 * @param int $item_id
	 * @param string $item_type
	 * @param bool $skip_cache
	 *
	 * @return array|bool|null|object
	 *
	 * @since 1.0.0
	 */
	public static function getReactionForUser( $item_id = 0, $item_type = 'post', $skip_cache = false ) {
		$user_token = User::getUserToken();
		$cache_name = "single.user$user_token.id$item_id.type$item_type";
		if ( ! $skip_cache ) {
			/**
			 * Get from cache
			 *
			 * @since 3.0.0
			 */
			$cached_result = Cache::get( $cache_name );
			if ( ! is_null( $cached_result ) ) {
				return $cached_result;
			}
		}
		if ( $item_id === 0 ) {
			return false;
		}
		global $wpdb;
		$table_name = self::getVotesTable();
		$result     = $wpdb->get_row( $wpdb->prepare( 'SELECT v.ID,
        v.resource_id,
        v.resource_type,
        v.emotion_id,
        v.user_id,
        v.user_token,
        v.created_at
        FROM %i v
        WHERE v.resource_id = %d
        AND v.resource_type = %s
        AND v.user_token = %s',
			$table_name,
			$item_id,
			$item_type,
			$user_token
		) );
		if ( darea_fs()->is_premium() ) {
			$result = apply_filters(
				'da_r_get_reaction_for_user',
				$result,
				$item_id,
				$item_type,
				$skip_cache,
				$user_token
			);
		}
		if ( ! $skip_cache ) {
			Cache::set( $cache_name, $result );
		}
		return $result;
	}
	/**
	 * Gets reaction for specific user regardless of content
	 *
	 * @param $email_address
	 * @param int $number
	 * @param int $page
	 *
	 * @return array
	 *
	 * @since 4.0.0
	 */
	public static function getAllVotesForUserByEmail( $email_address, $number = 500, $page = 1 ) {
		$offset = ( $page - 1 ) * $number;
		if ( empty( $email_address ) ) {
			return [];
		}
		global $wpdb;
		$table_name = self::getVotesTable();
		$user_table = $wpdb->users;
		return $wpdb->get_results( $wpdb->prepare( 'SELECT v.ID,
        v.resource_id,
        v.resource_type,
        v.emotion_id,
        v.user_id,
        v.user_token,
        v.created_at,
        u.user_email
        FROM %i v
        INNER JOIN %i u
        ON u.ID = v.user_id
        WHERE u.user_email = %s
        LIMIT %d, %d',
			$table_name,
			$user_table,
			$email_address,
			$offset,
			$number
		), ARRAY_A );
	}
	/**
	 * /**
	 * Gets reactions and users for specific item
	 *
	 * @param int $item_id
	 * @param string $item_type
	 * @param int $reaction_id
	 * @param int $limit
	 * @param int $pagenum
	 *
	 * @return array|mixed|null
	 * @since 3.0.0
	 *
	 */
	public static function getReactionsAndUsersForContent(
		$item_id = 0,
		$item_type = 'post',
		$reaction_id = 0,
		$limit = 10,
		$pagenum = 1
	) {
		$general_options          = Options::getInstance( 'general' );
		$default_votername        = $general_options->getOption( 'default_votername', 'Anon' );
		$display_anonymous_voters = $general_options->getOption( 'display_anonymous_voters', 'off' ) === 'on';
		/**
		 * Get from cache
		 *
		 * @since 3.0.0
		 */
		$cache_name = "content.id$item_id.type$item_type.reaction$reaction_id.limit$limit.page$pagenum";
		$cached_result = Cache::get( $cache_name );
		if ( ! is_null( $cached_result ) ) {
			return $cached_result;
		}
		global $wpdb;
		$reactions_table = self::getReactionsTable();
		$votes_table     = self::getVotesTable();
		$users_table     = $wpdb->users;
		$base_query = "SELECT 
        COALESCE(u.display_name, %s) as display_name,
        r.label,
        r.file_name,
        v.resource_id,
        v.resource_type,
        v.emotion_id,
        v.user_id
        FROM $votes_table v
        LEFT JOIN $reactions_table r
        ON r.ID = v.emotion_id
        LEFT JOIN $users_table u
        ON u.ID = v.user_id
        WHERE v.resource_type = %s
        AND v.resource_id = %d
        AND (v.emotion_id = %d || %d = 0)";
		if ( ! $display_anonymous_voters ) {
			$base_query .= "
            AND v.user_id != 0";
		}
		$base_query .= "
        ORDER BY v.created_at DESC";
		// Note to the reviewer: $base_query is safe to use as it is prepared right now
		$prepared_base_query = $wpdb->prepare(
			$base_query /* phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared */,
			$default_votername,
			$item_type,
			$item_id,
			$reaction_id,
			$reaction_id
		);
		$result_query = $prepared_base_query . $wpdb->prepare(
				' LIMIT %d, %d',
				( $pagenum - 1 ) * $limit,
				$limit
			);
		$total_query = "SELECT COUNT(1) FROM ($prepared_base_query) AS total";
		// Note to the reviewer: $result_query is safe to use as it has been prepared properly above
		$result = $wpdb->get_results( $result_query /* phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared */ );
		// Note to the reviewer: $total_query is safe to use as it has been prepared properly above
		$total = $wpdb->get_var( $total_query /* phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared */ );
		Cache::set( $cache_name, $result );
		return array(
			'records'    => $result,
			'pagination' => array(
				'total' => $total,
				'index' => $pagenum,
				'size'  => $limit
			)
		);
	}
	/**
	 * Gets total votes count
	 *
	 * @return string|null
	 * @since 3.16.0
	 *
	 */
	public static function getReactionsCount() {
		global $wpdb;
		$votes_table = self::getVotesTable();
		return $wpdb->get_var( $wpdb->prepare( 'SELECT COUNT(1) FROM %i AS total', $votes_table ) );
	}
	/**
	 * Gets all reactions for specific content
	 *
	 * @param $item_id
	 * @param $item_type
	 *
	 * @return array|null|object
	 *
	 * @since 1.0.0
	 */
	public static function getReactionsForContent( $item_id, $item_type ) {
		/**
		 * Get from cache
		 *
		 * @since 3.0.0
		 */
		$cache_name    = "content.id$item_id.type$item_type";
		$cached_result = Cache::get( $cache_name );
		if ( ! is_null( $cached_result ) ) {
			$result = $cached_result;
		} else {
			global $wpdb;
			$reactions_table = self::getReactionsTable();
			$votes_table     = self::getVotesTable();
			$gutenberg_item_type = $item_type . '-g' . $item_id;
			$result              = $wpdb->get_results(
				$wpdb->prepare( '
					SELECT
    r.ID,
    r.label,
    r.file_name,
    r.active,
    r.color,
    r.sort_order,
    COALESCE(v.resource_type, %s) AS resource_type,
    COALESCE(COUNT(v.ID), 0) AS total,
    (
        COALESCE(COUNT(v.ID), 0) /
        (
            SELECT
                COALESCE(COUNT(v2.ID), 0)
            FROM
                %i v2
            WHERE (
                v2.resource_type = %s
                    OR
                v2.resource_type = %s
            )
           AND v2.resource_ID = %d
        ) * 100
    ) AS percentage
FROM %i r
    LEFT JOIN %i v
        ON
            v.emotion_id = r.ID
                AND (
                    v.resource_type = %s
                        OR
                    v.resource_type = %s
                    )
                AND v.resource_ID = %d
                AND r.active = 1
GROUP BY r.ID, v.resource_type, r.sort_order
ORDER BY r.sort_order;',
					'', // COALESCE(v.resource_type, %s) AS resource_type,
					$votes_table,
					$item_type,
					$gutenberg_item_type,
					$item_id,
					$reactions_table,
					$votes_table,
					$item_type,
					$gutenberg_item_type,
					$item_id
				)
			);
			$result              = array_map( [ Reaction::class, 'get_reaction' ], $result );
			Cache::set( $cache_name, $result );
		}
		$user_reaction = self::getReactionForUser( $item_id, $item_type );
		foreach ( $result as $item ) {
			if ( $user_reaction ) {
				$item          = Reaction::get_reaction( $item );
				$item->current = ( isset( $user_reaction->emotion_id ) ? $user_reaction->emotion_id : 0 ) === $item->ID;
			}
		}
		if ( darea_fs()->is_premium() ) {
			$result = apply_filters(
				'da_r_get_reactions_for_content',
				$result,
				$item_id,
				$item_type
			);
		}
		return $result;
	}
	/**
	 * @param $reactions
	 * @param $graphic_options
	 * @param $item_type
	 * @param $item_id
	 *
	 * @return array
	 */
	public static function getReactionsSettings(
		$reactions,
		$graphic_options,
		$item_type,
		$item_id
	) {
		$reactions = array_map( [ Reaction::class, 'get_reaction' ], $reactions );
		/** @var Options $graphic_options */
		$size      = absint( $graphic_options->getOption( 'button_size', 64 ) );
		$alignment = $graphic_options->getOption( 'buttons_alignment', 'center' );
		if ( wp_is_mobile() && $graphic_options->getOption( 'da_r_mobile_enabled', 'off' ) === 'on' ) {
			$size      = absint( $graphic_options->getOption( 'button_size_mobile', 64 ) );
			$alignment = $graphic_options->getOption( 'buttons_alignment_mobile', 'center' );
		}
		$visible_reaction = array_reduce( array_reverse( $reactions ), static function( $a, $b ) {
			if ( is_null( $a ) ) {
				return $b;
			}
			return @$a->total > $b->total ? $a : $b;
		} );
		$has_current = false;
		$total_count = 0;
		foreach ( $reactions as $reaction ) {
			$total_count += $reaction->total;
			if ( @$reaction->current ) {
				$has_current      = true;
				$visible_reaction = $reaction;
			}
		}
		$visible_reaction_image = FileSystem::getImageUrl( $visible_reaction->file_name );
		$nonce = wp_create_nonce( $item_type . '-' . absint( $item_id ) );
		return array(
			'size'                   => $size,
			'alignment'              => $alignment,
			'visible_reaction'       => $visible_reaction,
			'has_current'            => $has_current,
			'total_count'            => $total_count,
			'visible_reaction_image' => $visible_reaction_image,
			'nonce'                  => $nonce
		);
	}
	/**
	 * Counts total reactions for a specific content type
	 * Used in DashboardWidget
	 *
	 * @param $content_type
	 *
	 * @return null|string
	 */
	public static function getTotalReactionsForContentType( $content_type ) {
		global $wpdb;
		$votes_table = self::getVotesTable();
		$result      = $wpdb->get_var( $wpdb->prepare( 'SELECT COUNT(ID) FROM %i WHERE resource_type = %s OR resource_type LIKE %s', $votes_table, $content_type, $content_type . '-g%' ) );
		if ( darea_fs()->is_premium() ) {
			$result = apply_filters(
				'da_r_get_total_reactions_for_content_type',
				$result,
				$content_type
			);
		}
		return $result;
	}
	/**
	 * Adds user reaction to database
	 *
	 * @param $item_id
	 * @param string $item_type
	 * @param int $reaction
	 *
	 * @return bool|Error
	 *
	 * @since 1.0.0
	 */
	public static function insertUserReaction(
		$item_id,
		$item_type = 'post',
		$reaction = 0
	) {
		$user_token = User::getUserToken();
		Cache::delete( [ "list", "id$item_id", "type$item_type", "user$user_token" ] );
		$general_options = Options::getInstance( 'general' );
		$user_ip = '';
		if ( $general_options->getOption( 'id_method_ip' ) === 'on' ) {
			$user_ip = User::getUserIp();
		}
		$current_user = wp_get_current_user();
		$current_user_reaction = self::getReactionForUser( $item_id, $item_type, true );
		if ( ! empty( $current_user_reaction ) ) {
			$same_reaction            = (int) $current_user_reaction->resource_id === (int) $item_id &&
			                            (int) $current_user_reaction->emotion_id === (int) $reaction;
			$user_can_change_reaction = $general_options->getOption( 'user_can_change_reaction' ) === 'on';
			$user_can_remove_reaction = $general_options->getOption( 'user_can_remove_reaction' ) === 'on';
			if ( $same_reaction && $user_can_remove_reaction ) {
				self::deleteUserReaction( $item_id, $item_type );
				return true;
			}
			if ( $same_reaction && ! $user_can_remove_reaction ) {
				return new Error( __( 'Cannot remove reaction', 'da-reactions' ) );
			}
			if ( ! $same_reaction && ! $user_can_change_reaction ) {
				return new Error( __( 'Cannot change reaction', 'da-reactions' ) );
			}
			if ( ! $same_reaction && $user_can_change_reaction ) {
				self::deleteUserReaction( $item_id, $item_type );
			}
		}
		$user_id = 0;
		if ( isset( $current_user ) ) {
			$user_id = $current_user->ID;
		}
		if ( darea_fs()->is_premium() ) {
			do_action(
				'da_r_before_insert_user_reaction',
				$item_id,
				$item_type,
				$reaction
			);
		}
		$result = self::insertReactionIntoDB( $item_id, $item_type, $reaction, $user_id, $user_token, $user_ip );
		if ( darea_fs()->is_premium() ) {
			do_action(
				'da_r_after_insert_user_reaction',
				$item_id,
				$item_type,
				$reaction,
				$result
			);
		}
		return $result;
	}
	/**
	 * Updates or create a new reaction from ButtonSettings Page
	 *
	 * @param $reaction_id
	 * @param $reaction
	 *
	 * @return int
	 *
	 * @since 1.0.0
	 */
	public static function updateOrCreateReaction( $reaction_id, $reaction ) {
		Cache::delete( [ "reaction$reaction_id" ] );
		$reaction = Reaction::get_reaction( $reaction );
		if ( darea_fs()->is_premium() ) {
			do_action(
				'da_r_before_update_or_create_reaction',
				$reaction_id,
				$reaction
			);
		}
		global $wpdb;
		$table_name       = self::getReactionsTable();
		$current_reaction = $wpdb->get_row(
			$wpdb->prepare(
				'SELECT ID,
                 label,
                 file_name,
                 created_at,
                 color,
                 active,
                 sort_order
                 FROM %i WHERE ID = %d',
				$table_name,
				$reaction_id
			)
		);
		$current_reaction = Reaction::get_reaction( $current_reaction );
		// Values
		$active = '1';
		$label  = $reaction->label;
		if ( empty( $label ) ) {
			$label = $current_reaction->label;
		}
		$color     = preg_match( '/^#[a-f0-9]{6}$/i', $reaction->color ) ? $reaction->color : '#036789';
		$file_name = '';
		if ( ! empty( $reaction->file_name ) ) {
			$file_name = $reaction->file_name;
		} else if ( ! is_null( $current_reaction ) ) {
			$file_name = $current_reaction->file_name;
		}
		$sort_order = absint( $reaction->sort_order );
		// Save reaction to database
		if ( isset( $current_reaction ) ) {
			if ( darea_fs()->is_premium() ) {
				do_action(
					'da_r_before_update_reaction',
					$reaction_id,
					$reaction,
					$current_reaction
				);
			}
			$new_reaction = array(
				'active'     => $active,
				'label'      => $label,
				'color'      => $color,
				'file_name'  => $file_name,
				'sort_order' => $sort_order
			);
			$wpdb->update(
				$table_name,
				$new_reaction,
				array(
					'ID' => $reaction_id
				)
			);
			$reaction = Reaction::get_reaction( array_merge( array( 'ID' => $reaction_id ), $new_reaction ) );
			if ( darea_fs()->is_premium() ) {
				if ( ! $reaction->sameReaction( $current_reaction ) ) {
					do_action(
						'da_r_after_update_reaction',
						$reaction_id,
						$reaction,
						$current_reaction
					);
				}
			}
			return $reaction_id;
		}
		if ( darea_fs()->is_premium() ) {
			do_action(
				'da_r_before_create_reaction',
				$reaction
			);
		}
		$wpdb->insert( $table_name, array(
			'active'     => '1',
			'label'      => $label,
			'color'      => $color,
			'file_name'  => $file_name,
			'sort_order' => $sort_order
		) );
		$insert_id = $wpdb->insert_id;
		if ( darea_fs()->is_premium() ) {
			do_action(
				'da_r_after_create_reaction',
				$insert_id,
				$reaction
			);
		}
		return $insert_id;
	}
	/**
	 * @param int $item_id
	 * @param string $item_type
	 * @param int $reaction
	 * @param int $user_id
	 * @param string $user_token
	 * @param string $user_ip
	 *
	 * @return bool|Error
	 */
	public static function insertReactionIntoDB(
		int $item_id,
		string $item_type,
		int $reaction,
		int $user_id,
		string $user_token,
		string $user_ip
	) {
		global $wpdb;
		$table_name = self::getVotesTable();
		if ( $wpdb->insert( $table_name, array(
			"resource_id"   => $item_id,
			"resource_type" => $item_type,
			"emotion_id"    => $reaction,
			"user_id"       => $user_id,
			"user_token"    => $user_token,
			"user_ip"       => $user_ip
		), array( "%d", "%s", "%d", "%d", "%s", "%s" ) ) ) {
			return true;
		}
		return new Error( __( 'Database error', 'da-reactions' ) );
	}
	/**
	 * @param bool $omitPrefix
	 *
	 * @return string
	 */
	public static function getVotesTable( $omitPrefix = false ) {
		if ( $omitPrefix ) {
			return self::$votesTable;
		}
		global $wpdb;
		return $wpdb->prefix . self::$votesTable;
	}
	/**
	 * @param bool $omitPrefix
	 *
	 * @return string
	 */
	public static function getGroupsTable( $omitPrefix = false ) {
		if ( $omitPrefix ) {
			return self::$groupsTable;
		}
		global $wpdb;
		return $wpdb->prefix . self::$groupsTable;
	}
	/**
	 * @param bool $omitPrefix
	 *
	 * @return string
	 */
	public static function getReactionsTable( $omitPrefix = false ) {
		if ( $omitPrefix ) {
			return self::$reactionsTable;
		}
		global $wpdb;
		return $wpdb->prefix . self::$reactionsTable;
	}
	public static function upgradeVotesIdToBigInt() {
		global $wpdb;
		$wpdb->show_errors();
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		$table_name = self::getVotesTable();
		$wpdb->query( $wpdb->prepare( 'ALTER TABLE %i
            MODIFY `ID` BIGINT UNSIGNED AUTO_INCREMENT', $table_name ) );
		$wpdb->hide_errors();
	}
	public static function addGroupColumnToReactions() {
		global $wpdb;
		$wpdb->show_errors();
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		$table_name = self::getReactionsTable();
		$wpdb->query( $wpdb->prepare( 'ALTER TABLE %i
            ADD `group_id` MEDIUMINT(9) DEFAULT %d NOT NULL AFTER `ID`', $table_name, 0 ) );
		$wpdb->query( $wpdb->prepare( 'UPDATE %i SET `group_id` = %d WHERE `group_id` = %d', $table_name, 1, 0 ) );
		$wpdb->hide_errors();
	}
	public static function createGroupsTable() {
		$table_name = self::getGroupsTable();
		global $wpdb;
		$wpdb->show_errors();
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		$charset_collate               = $wpdb->get_charset_collate();
		$create_votes_table_sql_string = $wpdb->prepare(
			"CREATE TABLE IF NOT EXISTS %i (
            ID mediumint(9) NOT NULL AUTO_INCREMENT,
            name varchar(128),
            active smallint(1) NOT NULL DEFAULT %d,
            author bigint unsigned NOT NULL default %d,
            created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) {$wpdb->get_charset_collate()}",
			$table_name,
			1,
			0
		);
		dbDelta( $create_votes_table_sql_string );
		$wpdb->hide_errors();
	}
	public static function createDefaultGroups() {
		global $wpdb;
		$wpdb->show_errors();
		$table_name = self::getGroupsTable();
		$wpdb->query( $wpdb->prepare( 'TRUNCATE TABLE %i', $table_name ) );
		$wpdb->insert( $table_name, array(
			'ID'     => 1,
			'name'   => 'Default',
			'author' => get_current_user_id(),
			'active' => 1
		) );
		$wpdb->hide_errors();
	}
}
