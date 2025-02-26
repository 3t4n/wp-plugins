<?php
namespace WSDesk\Tickets\Filters;

use Illuminate\Support\Arr;
use WSDesk\Tickets\Filters\View\CustomField;
use Illuminate\Support\Str;
use WSDesk\Settings\SettingsItem;
use WSDesk\Tickets\Filters\View\ForwardedEmail;
use WSDesk\Tickets\Filters\View\Description;
use WSDesk\Tickets\Filters\View\Subject;
use WSDesk\Tickets\Filters\View\Email;
use WSDesk\Tickets\Filters\View\Tag;
use WSDesk\Tickets\Filters\View\Assignee;
use WSDesk\Tickets\Filters\View\Label;
use WSDesk\Settings\SettingsRepository;
use WSDesk\Tickets\Filters\View\Source;
use WSDesk\Tickets\Filters\View\WooProduct;
use WSDesk\Tickets\TicketRepository;

class ViewsFilter implements FilterContract {

	public $view_filters = array(
		'ticket_label'        => Label::class,
		'ticket_assignee'     => Assignee::class,
		'ticket_tags'         => Tag::class,
		'ticket_email'        => Email::class,
		'request_email'       => Email::class,
		'ticket_title'        => Subject::class,
		'request_title'       => Subject::class,
		'ticket_description'  => Description::class,
		'request_description' => Description::class,
		'ticket_forwarded'    => ForwardedEmail::class,
		'ticket_source'       => Source::class,
		'woo_product'         => WooProduct::class,
	);

	public function filter( $query, $filters ) {
		if ( ! Arr::has( $filters, 'view.views' ) ) {
			return $query;
		}

		$slug = Arr::get( $filters, 'view.views' );

		$slug = is_array( $slug ) ? $slug : [ $slug ];

		if ( 0 === count( $slug ) ) {
			return $query;
		}

		$query->where(
			function ( $query ) use ( $slug ) {
				foreach ( $slug as $view_slug ) {
					$query = $this->applyCustomViewFilter( $query, $view_slug );
				}
			}
		);

		$this->apply_view_groups( $query, $filters );

		return $query;
	}

	/**
	 * Apply custom views filters from view slug
	 *
	 * @param QueryBuilderHandler $query
	 * @param string $view_slug
	 *
	 * @return QueryBuilderHandler
	 */
	public function applyCustomViewFilter( $query, $view_slug ) {

		$settings = new SettingsRepository();

		$view = $settings->getView( $view_slug );

		if ( null === $view ) {
			return $query;
		}

		$meta = eh_crm_get_settingsmeta( $view['settings_id'] );

		$query->where(
			function ( $query ) use ( $meta ) {
			$globalFunc = ( 'and' === $meta['view_format'] ) ? 'where' : 'orWhere';

				foreach ( $meta['view_conditions'] as $group => $filters ) {
					$groupFunc = ( 'or' === $group ) ? 'orWhere' : 'where';

					$query->{$globalFunc}(
						function ( $query ) use ( $groupFunc, $filters ) {
							$query = $this->applyGroupFilters( $query, $groupFunc, $filters );
						}
					);
				}
			}
		);

		return $query;
	}

	public function applyGroupFilters( $query, $groupFunc, $filters ) {
		foreach ( $filters as $filter ) {
			$subQuery = $this->getSubQueryByType( $filter );

			if ( $subQuery ) {
				$query->{$groupFunc}( \wpFluent()->raw( 'ticket_id in (' . $subQuery->__toString() . ')' ) );
			}
		}

		return $query;

	}

	public function getSubQueryByType( $filter ) {
		$type = $filter['type'];

		if ( Arr::has( $this->view_filters, $type ) ) {
			$class = Arr::get( $this->view_filters, $type );

			return new $class(
				$filter['operator'],
				$filter['value']
			);
		}

		if ( Str::startsWith( $type, 'field_' ) ) {
			return new CustomField(
				$filter['type'],
				$filter['operator'],
				$filter['value']
			);
		}

		return false;
	}

	public function apply_view_groups( $query, $filters ) {

		$view_slug = Arr::get( $filters, 'view.views.0' );

		if ( trim( $view_slug ) === '' || ! $view_slug ) {
			return $view_slug;
		}

		$settings = new SettingsRepository();
		$view     = $settings->getView( $view_slug );

		if ( null === $view ) {
			return $query;
		}

		$view_meta = eh_crm_get_settingsmeta( $view['settings_id'] );

		if ( 'ticket_assignee' === $view_meta['view_group'] ) {
			$repo         = new TicketRepository();
			$metaSubQuery = wpFluent()->table( $repo::TABLE_TICKETS_META )
								->where( 'meta_key', 'ticket_assignee' )
								->select( [ 'ticket_id', 'meta_value' ] )
								->getQuery()
								->getRawSql();

			$whereSubQuery = $repo->getAdminUserQuery()->select( [ 'user_id' ] )->getQuery()->getRawSql();

			$assignee_query  = '(SELECT wp_agent_view_ticketsmeta.ticket_id as wp_agent_view_ticket_id, users.display_name as view_group_title ';
			$assignee_query .= 'FROM ' . wpFluent()->addTablePrefix( 'users', false ) . ' as users';
			$assignee_query .= ' left join (' . $metaSubQuery . ' ) as wp_agent_view_ticketsmeta on meta_value like concat(\'%"\',users.id,\'"%\')';
			$assignee_query .= ' where users.id in (' . $whereSubQuery . ')';
			$assignee_query .= ' UNION select ticket_meta.ticket_id as wp_agent_view_ticket_id, "Unassigned" as view_group_title from';
			$assignee_query .= ' ' . wpFluent()->addTablePrefix( 'wsdesk_ticketsmeta', false ) . ' as ticket_meta';
			$assignee_query .= ' where meta_key = "ticket_assignee" and meta_value = "' . serialize( [] ) . '"';
			$assignee_query .= ' ) as ' . wpFluent()->addTablePrefix( 'agent_view_group', false );

			$query->LeftJoin( \wpFluent()->raw( $assignee_query ), 'agent_view_group.wp_agent_view_ticket_id', '=', $repo::TABLE_TICKETS . '.ticket_id' );
			$query->orderBy( \wpFluent()->raw( 'view_group_title, ticket_updated' ), 'desc' );

			return $query;
		}

		if ( 'ticket_label' === $view_meta['view_group'] ) {
			$metaSubQuery = wpFluent()->table( TicketRepository::TABLE_TICKETS_META )
								->where( 'meta_key', 'ticket_label' )
								->select( [ 'ticket_id', 'meta_value' ] )
								->getQuery()
								->getRawSql();

			$label_query  = '(SELECT wp_wsdesk_ticketsmeta.ticket_id as view_group_ticket_id, wp_wsdesk_settings.title as view_group_title ';
			$label_query .= ' FROM ' . wpFluent()->addTablePrefix( 'wsdesk_settings', false ) . ' as wp_wsdesk_settings';
			$label_query .= ' LEFT JOIN (' . $metaSubQuery . ' ) as wp_wsdesk_ticketsmeta on wp_wsdesk_ticketsmeta.meta_value = wp_wsdesk_settings.slug';
			$label_query .= ' where wp_wsdesk_settings.type = "label" ';
			$label_query .= ' ) as ' . wpFluent()->addTablePrefix( 'view_group', false );


			$query->leftJoin( \wpFluent()->raw( $label_query ), 'view_group.view_group_ticket_id', '=', TicketRepository::TABLE_TICKETS . '.ticket_id' );
			$query->orderBy( \wpFluent()->raw( 'view_group_title, ticket_updated' ), 'desc' );

			return $query;
		}

		if ( 'ticket_tags' === $view_meta['view_group'] ) {
			$metaSubQuery = wpFluent()->table( TicketRepository::TABLE_TICKETS_META )->where( 'meta_key', 'ticket_tags' )
						->select( [ 'ticket_id', 'meta_value' ] )
								->getQuery()->getRawSql();

			$tags_query  = '(SELECT wp_wsdesk_ticketsmeta.ticket_id as view_group_ticket_id, wp_wsdesk_settings.title as view_group_title ';
			$tags_query .= ' FROM ' . wpFluent()->addTablePrefix( 'wsdesk_settings', false ) . ' as wp_wsdesk_settings';
			$tags_query .= ' left JOIN (' . $metaSubQuery . ') as wp_wsdesk_ticketsmeta';
			$tags_query .= ' on wp_wsdesk_ticketsmeta.meta_value like concat(\'%"\',wp_wsdesk_settings.slug, \'"%\')';
			$tags_query .= ' where wp_wsdesk_settings.type = "tag" ';
			$tags_query .= ' ) as ' . wpFluent()->addTablePrefix( 'view_group', false );

			$query->leftJoin( \wpFluent()->raw( $tags_query ), 'view_group.view_group_ticket_id', '=', TicketRepository::TABLE_TICKETS . '.ticket_id' );
			$query->orderBy( \wpFluent()->raw( 'view_group_title, ticket_updated' ), 'desc' );

			return $query;
		}

		if ( 'request_title' === $view_meta['view_group'] ) {
			$query->select( '*', \wpFluent()->raw( 'ticket_title as view_group_title' ) );
			$query->orderBy( \wpFluent()->raw( 'view_group_title, ticket_updated' ), 'desc' );

			return $query;
		}

		if ( 'request_email' === $view_meta['view_group'] ) {
			$query->select( '*', \wpFluent()->raw( 'ticket_email as view_group_title' ) );
			$query->orderBy( \wpFluent()->raw( 'view_group_title, ticket_updated' ), 'desc' );

			return $query;
		}

		$settings_item = SettingsItem::find_by_slug( $view_meta['view_group'] );

		if ( $settings_item && 'field' === $settings_item->get( 'type' ) ) {

			if ( in_array( $settings_item->get_meta()->get( 'field_type' ), array( 'select', 'checkbox', 'radio' ) ) ) {
				$tmp_table_name = 'wsdesk_tmp_' . $settings_item->get( 'slug' );

				$sql  = 'create temporary table if not exists ' . wpFluent()->addTablePrefix( $tmp_table_name, false );
				$sql .= ' (
					view_group_slug varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL ,
					view_group_title varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL
				) ';
				$sql .= wpFluent()->db()->get_charset_collate();

				wpFluent()->statement( $sql );

				if ( wpFluent()->table( $tmp_table_name )->count() === 0 ) {
					$values = [];

					foreach ( $settings_item->get_meta()->get( 'field_values' ) as $slug => $title ) {
						$values[] = [
							'view_group_slug'  => $slug,
							'view_group_title' => $title,
						];
					}

					wpFluent()->table( $tmp_table_name )->insert( $values );
				}

				$metaSubQuery = wpFluent()->table( TicketRepository::TABLE_TICKETS_META )
									->where( 'meta_key', $view_meta['view_group'] )
									->select( \wpFluent()->raw( 'ticket_id as view_group_ticket_id' ), $tmp_table_name . '.view_group_title' )
									->join( $tmp_table_name, TicketRepository::TABLE_TICKETS_META . '.meta_value', '=', $tmp_table_name . '.view_group_slug' )
									->getQuery()
									->getRawSql();
			} else {
				$metaSubQuery = wpFluent()->table( TicketRepository::TABLE_TICKETS_META )
									->where( 'meta_key', $view_meta['view_group'] )
									->select( \wpFluent()->raw( 'ticket_id as view_group_ticket_id, meta_value as view_group_title' ) )
									->getQuery()
									->getRawSql();
			}

			$query->leftJoin( \wpFluent()->raw( '(' . $metaSubQuery . ') as ' . wpFluent()->addTablePrefix( 'view_group', false ) ), 'view_group.view_group_ticket_id', '=', TicketRepository::TABLE_TICKETS . '.ticket_id' );
			$query->orderBy( \wpFluent()->raw( 'view_group_title, ticket_updated' ), 'desc' );
		}

		return $query;
	}
}
