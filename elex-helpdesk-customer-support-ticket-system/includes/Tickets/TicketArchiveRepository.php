<?php
namespace WSDesk\Tickets;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use WSDesk\Tickets\Filters\RequestorFilter;
use WSDesk\Tickets\Filters\Sorter;
use WSDesk\Tickets\Filters\SubjectFilter;
use WSDesk\Tickets\Filters\TicketIdFilter;
use WSDesk\Tickets\Filters\TicketCreatedFilter;
use WSDesk\Tickets\Filters\TicketUpdatedFilter;
use WSDesk\Tickets\Formatter\TicketFormatter;
use WpFluent\QueryBuilder\QueryBuilderHandler;
use WSDesk\Settings\SettingsRepository;
use WSDesk\Tickets\Filters\AgentFilter;
use WSDesk\Tickets\Filters\BlockFilter;
use WSDesk\Tickets\Filters\GlobalSearchFilter;
use WSDesk\Tickets\Filters\LabelFilter;
use WSDesk\Tickets\Filters\TagFilter;
use WSDesk\Tickets\Filters\UserFilter;
use WSDesk\Tickets\Filters\ViewsFilter;
use WSDesk\Tickets\Formatter\TicketMetaFormatter;

class TicketArchiveRepository extends TicketRepository {

	const TABLE_TICKETS      = 'wsdesk_archived_tickets';
	const TABLE_TICKETS_META = 'wsdesk_archived_ticketsmeta';

	/**
	 * Get query builder
	 *
	 * @return QueryBuilderHandler
	 */
	public function query() {
		return wpFluent()->table( self::TABLE_TICKETS )->where( 'ticket_parent', 0 );
	}

	public function get( array $filters ) {
		$query = $this->applyFilter( $filters );

		$query = $query->limit( Arr::get( $filters, 'length', $this->limit ) )
					->offset( Arr::get( $filters, 'start', 0 ) );

		$tickets = $query->get();

		$meta = $this->getTicketsMeta( $tickets );

		$assignees = $this->getAssigneesFromMeta( $meta );

		$messages = $this->getLatestMessage( $tickets );

		$replyCount = $this->getReplyCount( $tickets );

		$labelsCount = $this->getCountByLabels( 'select 1' , false, false );

		$viewGroups = $this->getViewGroupColums( $filters );

		$tickets = array_map(
			function ( $ticket ) use ( $meta, $assignees, $messages, $replyCount, $labelsCount, $viewGroups ) {
				$ticket     = new TicketFormatter( $ticket );
				$ticketMeta = $meta->get( $ticket->ticket_id, new Collection() );

				$ticket->reply_count = Arr::pluck(
					Arr::where(
						$replyCount,
						function ( $count ) use ( $ticket ) {
							return (int) $ticket->ticket_id === (int) $count->ticket_parent;
						}
					),
					'count',
					'ticket_category'
				);

				$ticket->assignees = Arr::pluck(
					Arr::where(
						$assignees,
						function ( $assignee ) use ( $ticketMeta ) {
							return $ticketMeta->has( 'ticket_assignee' ) && in_array( (int) $assignee->id, $ticketMeta->ticket_assignee );
						}
					),
					'display_name'
				);

				$ticket->last_message = Arr::first(
					$messages,
					function ( $message ) use ( $ticket ) {
						return (int) $message->ticket_parent === (int) $ticket->ticket_id;
					}
				);

				if ( $ticket->last_message ) {
					$ticket->last_message = new TicketFormatter( $ticket->last_message );
				}

				$ticket->badge_color = Arr::first(
					$labelsCount,
					function ( $label ) use ( $ticketMeta ) {
						return $ticketMeta->has( 'ticket_label' ) && $label->slug === $ticketMeta->ticket_label;
					}
				);

				$ticket->view_groups = $viewGroups;

				return array_merge( $ticketMeta->toArray(), $ticket->toArray() );
			},
			$tickets
		);

		return $tickets;
	}

	/**
	 * Apply given filters to the query and return
	 *
	 * @param array                 $filters    optional
	 * @param QueryBuilderHandler   $query      optional
	 * @return QueryBuilderHandler
	 */
	public function applyFilter( array $filters = [], QueryBuilderHandler $query = null ) {
		$query = $query ? $query : $this->query();

		$filterClasses = [
			new GlobalSearchFilter(),
			new TicketIdFilter(),
			new TicketCreatedFilter(),
			new LabelFilter(),
			new Sorter(),
		];

		foreach ( $filterClasses as $filter ) {
			$query = $filter->filter( $query, $filters, $this );
		}

		return $query;
	}


	/**
	 * Get Assignee login name from meta data
	 *
	 * @var Collection $meta
	 * @return array Array of assinees
	 */
	public function getAssigneesFromMeta( Collection $meta ) {
		$ticketAssinees = $meta->flatten()->pluck( 'ticket_assignee' )->flatten()->unique()->filter()->toArray();

		$assignees = [];
		if ( count( $ticketAssinees ) ) {
			$assignees = wpFluent()->table( 'users' )->whereIn( 'id', $ticketAssinees )->select( [ 'id', 'display_name' ] )->get();
		}

		return $assignees;
	}

	public function getLatestMessage( $tickets ) {
		if ( count( $tickets ) === 0 ) {
			return [];
		}
		$ticket_ids = implode( ',', Arr::pluck( $tickets, 'ticket_id' ) );

		$table = wpFluent()->addTablePrefix( self::TABLE_TICKETS, false );

		$query  = 'select m.* from ' . $table . ' as m join ';
		$query .= '( SELECT max(t1.ticket_id) as ticket_id from ' . $table . ' as t1';
		$query .= ' where t1.ticket_parent in ( ' . $ticket_ids . ' ) group by t1.ticket_parent order by t1.ticket_id desc ';
		$query .= ' ) as c on c.ticket_id = m.ticket_id';

		$latest_tickets = wpFluent()->query( $query )->get();

		if ( count( $latest_tickets ) ) {
			$users = wpFluent()->table( 'users' )->select( 'user_email', 'display_name' )->whereIn( 'user_email', Arr::pluck( $latest_tickets, 'ticket_email' ) )->get();
			$users = Arr::pluck( 'display_name', 'user_email' );

			$latest_tickets = array_map(
				function ( $ticket ) use ( $users ) {
					$ticket->display_name = Arr::get( $users, $ticket->ticket_email, __( 'Guest', 'wsdesk' ) );

					return $ticket;
				},
				$latest_tickets
			);
		}

		return $latest_tickets;
	}

	public function getReplyCount( $tickets ) {
		if ( count( $tickets ) === 0 ) {
			return [];
		}
		$ticket_ids = Arr::pluck( $tickets, 'ticket_id' );

		$query = wpFluent()->table( self::TABLE_TICKETS )->select( \wpFluent()->raw( 'count(ticket_parent) as count, ticket_parent, ticket_category' ) )
			->whereIn( 'ticket_parent', $ticket_ids )
			->groupBy( [ 'ticket_category', 'ticket_parent' ] );

		return $query->get();
	}

	public function getViewGroupColums( $filters ) {
		$view_slugs = Arr::get( $filters, 'view.views', array() );

		if ( 0 === count( $view_slugs ) ) {
			return array();
		}

		$subQuery = wpFluent()->table( SettingsRepository::TABLE_NAME );
		$subQuery->whereIn( 'slug', $view_slugs );
		$subQuery->select( 'settings_id' );

		$query = wpFluent()->table( SettingsRepository::TABLE_META_NAME );
		$query->where( 'meta_key', 'view_group' );
		$query->where( \wpFluent()->raw( 'settings_id in (' . $subQuery->getQuery()->getRawSql() . ')' ) );
		$query->select( 'meta_value' );

		$groups = $query->get();

		return Arr::pluck( $groups, 'meta_value' );
	}

	/**
	 * Get tickets count with filters applied
	 *
	 * @param array $filters
	 * @return int
	 */
	public function count( array $filters = [] ) {
		$query = $this->applyFilter( $filters );

		return $query->select( 'id' )->count();
	}

	/**
	 * Get tickets meta as a Formatter
	 *
	 * @param array $tickets
	 * @return Collection collection of Fromatter group by ticket_id
	 */
	public function getTicketsMeta( array $tickets ) {
		if ( count( $tickets ) === 0 ) {
			return new Collection();
		}

		$tickets = (array) $tickets;

		$query = wpFluent()->table( self::TABLE_TICKETS_META )->whereIn( 'ticket_id', Arr::pluck( $tickets, 'ticket_id' ) );

		return ( new Collection( (array) $query->get() ) )->groupBy( 'ticket_id' )
					->map(
						function ( Collection $ticketsMeta ) {
							return new TicketMetaFormatter( $ticketsMeta->pluck( 'meta_value', 'meta_key' ) );
						}
					);
	}

	/**
	 * Apply custom views filters from view slug
	 *
	 * @param QueryBuilderHandler $query
	 * @param string $view_slug
	 *
	 * @return QueryBuilderHandler
	 */
	public function getCountByViews( $query, $views, $filters ) {

		$filter   = new ViewsFilter();
		$data     = array();
		$settings = new SettingsRepository();

		foreach ( $views as $view_slug ) {
			$view_settings = Arr::first(
				$settings->filter(
					array(
						'type' => 'view',
						'slug' => $view_slug,
					)
				)
			);

			if ( null === $view_settings ) {
				continue;
			}

			$query = $this->applyFilter( $filters );

			$vquery = $filter->applyCustomViewFilter( $query, $view_slug );

			$data[] = array(
				'slug'  => $view_slug,
				'count' => $vquery->count(),
				'title' => $view_settings['title'],
			);
		}

		return $data;
	}

	/**
	 * Get ticket count by status
	 *
	 * @return array
	 */
	public function getCountByLabels( $subQuery, $info = [], $filtered = true ) {
		$metaSubQuery = wpFluent()->table( self::TABLE_TICKETS_META )
							->where( 'meta_key', 'ticket_label' )
							->select( [ 'ticket_id', 'meta_value' ] )
							->getQuery()
							->getRawSql();

		$query  = 'SELECT slug, COUNT(wp_wsdesk_ticketsmeta.ticket_id) as count,title, settings_meta.meta_value as badge_color';
		$query .= ' FROM ' . wpFluent()->addTablePrefix( 'wsdesk_settings', false ) . ' as wp_wsdesk_settings';
		$query .= ' LEFT JOIN (' . $metaSubQuery . ' and ticket_id in (' . $subQuery . ')) as wp_wsdesk_ticketsmeta on wp_wsdesk_ticketsmeta.meta_value = wp_wsdesk_settings.slug';
		$query .= ' left join ' . wpFluent()->addTablePrefix( 'wsdesk_settingsmeta', false ) . ' as settings_meta on settings_meta.settings_id = wp_wsdesk_settings.settings_id';
		$query .= ' where wp_wsdesk_settings.type = "label" ';
		if ( true === $filtered ) {
			$query .= ' and wp_wsdesk_settings.filter = "yes"';
		}
		$query .= ' and settings_meta.meta_key ="label_color"';
		$query .= ' GROUP by wp_wsdesk_settings.settings_id';

		$statuses = wpFluent()->query( $query )->get();

		return $statuses;
	}

	/**
	 * Get ticket count by status
	 *
	 * @param string $subQuery
	 * @return array
	 */
	public function getCountByAgents( $subQuery ) {
		$metaSubQuery = wpFluent()->table( self::TABLE_TICKETS_META )
							->where( 'meta_key', 'ticket_assignee' )
							->select( [ 'ticket_id', 'meta_value' ] )
							->getQuery()
							->getRawSql();

		$whereSubQuery = $this->getAdminUserQuery()->select( [ 'user_id' ] )->getQuery()->getRawSql();

		$query  = 'SELECT count(wp_wsdesk_ticketsmeta.ticket_id) as count, users.id as slug, users.display_name as title ';
		$query .= 'FROM ' . wpFluent()->addTablePrefix( 'users', false ) . ' as users';
		$query .= ' left join (' . $metaSubQuery . ' and ticket_id in (' . $subQuery . ')) as wp_wsdesk_ticketsmeta on meta_value like concat(\'%"\',users.id,\'"%\')';
		$query .= ' where users.id in (' . $whereSubQuery . ')';
		$query .= ' GROUP by users.id';
		$query .= ' UNION select count(ticket_meta.ticket_id) as count, "null" as slug, "Unassigned" as title from';
		$query .= ' ' . wpFluent()->addTablePrefix( 'wsdesk_ticketsmeta', false ) . ' as ticket_meta';
		$query .= ' where meta_key = "ticket_assignee" and meta_value = "' . serialize( [] ) . '"';
		$query .= ' and ticket_id in (' . $subQuery . ')';

		$statuses = wpFluent()->query( $query )->get();

		return $statuses;
	}

	/**
	 * Get admin users query
	 *
	 * @return QueryBuilderHandler
	 */
	public function getAdminUserQuery( array $filter = [] ) {
		$query = wpFluent()->table( 'usermeta' )->where( 'meta_key', wpFluent()->addTablePrefix( 'capabilities', false ) )->where(
			function ( $query ) {
				foreach ( $this->getRoles() as $role ) {
					$query->orWhere( 'meta_value', 'like', '%"' . $role . '"%' );
				}
			}
		);

		if ( Arr::has( $filter, 'agent_id' ) ) {
			$query->whereIn( 'user_id', Arr::get( $filter, 'agent_id' ) );
		}

		return $query;
	}

	public function getAgents( $filter = array() ) {
		$users = $this->getAdminUserQuery()->get();

		return array_map(
			function ( $user ) {
			$user = new \WP_User( $user->user_id );
			return [
				'id'    => $user->ID,
				'name'  => $user->display_name,
				'caps'  => $user->caps,
				'email' => $user->email,
			];
			},
			$users
		);
	}

	/**
	 * Get ticket count by status
	 *
	 * @return array
	 */
	public function getCountByTags( $subQuery ) {
		$metaSubQuery = wpFluent()->table( self::TABLE_TICKETS_META )->where( 'meta_key', 'ticket_tags' )
							->select( [ 'ticket_id', 'meta_value' ] )
							->getQuery()->getRawSql();

		$query  = 'SELECT slug, COUNT(wp_wsdesk_ticketsmeta.ticket_id) as count,title FROM';
		$query .= ' ' . wpFluent()->addTablePrefix( 'wsdesk_settings', false ) . ' as wp_wsdesk_settings';
		$query .= ' left JOIN (' . $metaSubQuery . ' and ticket_id in (' . $subQuery . ')) as wp_wsdesk_ticketsmeta';
		$query .= ' on wp_wsdesk_ticketsmeta.meta_value like concat(\'%"\',wp_wsdesk_settings.slug, \'"%\')';
		$query .= ' where wp_wsdesk_settings.type = "tag" and wp_wsdesk_settings.filter = "yes"';
		$query .= ' GROUP by settings_id';

		$statuses = wpFluent()->query( $query )->get();

		return $statuses;
	}

	/**
	 * Get ticket count by user reg status
	 *
	 * @return array
	 */
	public function getCountByUsers( $subQuery ) {
		// ALTER TABLE wp_wsdesk_tickets CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci
		$query = 'SELECT COUNT(wp_wsdesk_tickets.ticket_id) as count, "Registered Users" as title, "registered" as slug';
		/* $query .= ' FROM ' . wpFluent()->addTablePrefix( 'users', false ) . ' as wp_users';
		$query .= ' LEFT JOIN ' . wpFluent()->addTablePrefix( 'wsdesk_tickets', false ) . ' as wp_wsdesk_tickets on wp_wsdesk_tickets.ticket_email = wp_users.user_email'; */
		$query .= ' FROM ' . wpFluent()->addTablePrefix( 'wsdesk_tickets', false ) . ' as wp_wsdesk_tickets ';
		$query .= ' JOIN (' . $subQuery . ') as wp_wsdesk_filtered_tickets on wp_wsdesk_filtered_tickets.ticket_id = wp_wsdesk_tickets.ticket_id';
		$query .= ' WHERE wp_wsdesk_tickets.ticket_parent = 0 and wp_wsdesk_tickets.ticket_email in (select user_email from ' . wpFluent()->addTablePrefix( 'users', false ) . ')';
		$query .= ' UNION';
		$query .= ' SELECT COUNT(wp_wsdesk_tickets.ticket_id) as count, "Guest Users" as title, "guest" as slug';
		$query .= ' FROM ' . wpFluent()->addTablePrefix( 'wsdesk_tickets', false ) . ' as wp_wsdesk_tickets';
		$query .= ' JOIN (' . $subQuery . ') as wp_wsdesk_filtered_tickets on wp_wsdesk_filtered_tickets.ticket_id = wp_wsdesk_tickets.ticket_id';
		$query .= ' WHERE wp_wsdesk_tickets.ticket_parent = 0';
		$query .= ' and wp_wsdesk_tickets.ticket_email not in (select user_email from ' . wpFluent()->addTablePrefix( 'users', false ) . ')';

		return wpFluent()->query( $query )->get();
	}

	public function get_ticket_counts_by_active_views( array $filters = [] ) {
		$views = $this->get_available_views( $filters );
		$query = $this->applyFilter()->select( 'ticket_id' );

		$views = array_map(
			function ( $view ) use ( $filters, $query ) {
				$method = 'getCountBy' . $view['title'];

				if ( method_exists( $this, $method ) === false ) {
					return;
				}

				$time = microtime( true );

				if ( 'Views' !== $view['title'] ) {
					$query = $query->getQuery()->getRawSql();
				}

				return [
					'title' => $view['title'],
					'data'  => $this->{$method}( $query, $view['data'], $filters ),
					'time'  => microtime( true ) - $time,
				];
			},
			$views
		);

		return array_values( array_filter( $views ) );
	}

	public function get_view_access( $view_slug ) {
		$subQuery = wpFluent()->table( SettingsRepository::TABLE_NAME )->select( 'settings_id' )
			->where( 'slug', $view_slug );

		$access = wpFluent()->table( SettingsRepository::TABLE_META_NAME )->select( 'meta_value' )
							->where( 'meta_key', 'view_access' )
							->where( \wpFluent()->raw( 'settings_id in ( ' . $subQuery->getQuery()->getRawSql() . ' )' ) )
							->first();

		if ( ! $access ) {
			return array();
		}

		return unserialize( $access->meta_value );
	}

	public function get_available_views( $filters = [] ) {
		$views = eh_crm_get_settingsmeta( 0, 'selected_views' );

		// to Get Custom views count alone
		$views_only = Arr::flatten( Arr::get( $filters , 'views_only', array() ) );

		$roles = array();
		if ( is_user_logged_in() ) {
			$roles = (array) wp_get_current_user()->roles;
		}

		$custom_views = Arr::where(
			$views,
			function ( $view ) use ( $roles, $views_only ) {
				return ( count( $views_only ) == 0 || in_array( $view, $views_only, true ) ) &&
					count( array_intersect( $this->get_view_access( $view ), $roles ) ) &&
					Str::startsWith( $view, 'view_' );
			}
		);

		$views = array_map(
			function ( $view ) use ( $views_only ) {
				if ( ! Str::endsWith( $view, '_view' ) || ( count( $views_only ) ) ) {
					return;
				}

				$title = ucfirst( str_replace( '_view', '', $view ) );

				return [
					'title' => $title,
					'slug'  => $view,
					'data'  => [],
				];
			},
			$views
		);

		if ( 0 !== count( $custom_views ) ) {
			$views[] = array(
				'title' => 'Views',
				'data'  => $custom_views,
			);
		}

		return array_filter( $views );
	}

	/**
	 * Restore tickets
	 *
	 * @param array filters
	 *
	 * @return array
	 */
	public function restore( $filter ) {
		global $wpdb;

		$baseQuery = $this->applyFilter( $filter, wpFluent()->table( self::TABLE_TICKETS ) );

		$selectQuery = $baseQuery->select( 'ticket_id' )->getQuery()->getRawSql();

		$table_wsdesk_archived_tickets             = $wpdb->prefix . 'wsdesk_archived_tickets';
		$table_wsdesk_archived_tickets_ticketsmeta = $wpdb->prefix . 'wsdesk_archived_ticketsmeta';
		$table_wsdesk_ticketsmeta                  = $wpdb->prefix . 'wsdesk_ticketsmeta';
		$table_wsdesk_tickets                      = $wpdb->prefix . 'wsdesk_tickets';

		// Copy tickets into archived tickets
		$query  = 'insert into ' . $table_wsdesk_tickets;
		$query .= ' select * from ' . $table_wsdesk_archived_tickets . ' where ticket_id in (' . $selectQuery . ')';
		$query .= ' or ticket_parent in  (' . $selectQuery . ')';

		wpFluent()->statement( $query );

		// Copy tickets meta into archived tickets meta
		$query  = 'insert into ' . $table_wsdesk_ticketsmeta;
		$query .= ' select * from ' . $table_wsdesk_archived_tickets_ticketsmeta . ' where ticket_id in (' . $selectQuery . ')';
		wpFluent()->statement( $query );

		// Get the count of tickets before delete
		$data['count'] = $baseQuery->count();
		// Delete tickets
		$query  = 'delete from ' . $table_wsdesk_archived_tickets;
		$query .= ' where ticket_id in ( select t1.ticket_id from (' . $selectQuery . ') as t1)';
		$query .= ' or ticket_parent in ( select t1.ticket_id from (' . $selectQuery . ') as t1)';
		wpFluent()->statement( 'set foreign_key_checks = 0' );
		wpFluent()->statement( $query );

		// Delete Tickets meta
		$query  = 'delete from ' . $table_wsdesk_archived_tickets_ticketsmeta;
		$query .= ' where ticket_id not in ( select t1.ticket_id from ' . $table_wsdesk_archived_tickets . ' as t1)';

		wpFluent()->statement( $query );

		return $data;
	}

	public function getRoles() {
		return array( 'WSDesk_Agents', 'WSDesk_Supervisor', 'administrator' );
	}

	public function chunk( $query, $limit, \Closure $callback, $chunkPage = 1 ) {

		$query->limit( $limit );
		$query->offset( $limit * ( $chunkPage - 1 ) );

		$result = $query->get();

		if ( count( $result ) ) {
			$callback( $result );
			return $this->chunk( $query, $limit, $callback, ++$chunkPage );
		}

		return $chunkPage;
	}
}
