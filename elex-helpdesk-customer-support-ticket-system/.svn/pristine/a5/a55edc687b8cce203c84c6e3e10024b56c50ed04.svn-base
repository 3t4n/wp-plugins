<?php

namespace WSDesk\Tickets;

use DateTime;
use Illuminate\Support\Arr;
use stdClass;

class TicketReportRepository {

	private $repo;

	public function __construct() {
		$this->repo = new TicketRepository();
	}

	/**
	 * Get first reply avg time by agent
	 *
	 * @param string $subQuery
	 * @return array
	 */
	public function getAvgReplyTimeByAgents( array $filter ) {

		$metaSubQuery = wpFluent()->table( TicketRepository::TABLE_TICKETS_META )
							->where( 'meta_key', 'ticket_assignee' )
							->select( [ 'ticket_id', 'meta_value' ] )
							->getQuery()
							->getRawSql();

		$whereSubQuery = $this->repo->getAdminUserQuery( $filter )->select( [ 'user_id' ] );

		$whereSubQuery = $whereSubQuery->getQuery()->getRawSql();

		$subQuery = $this->repo->applyFilter( $filter )->select( 'ticket_id' )->getQuery()->getRawSql();

		$ticketDateQuery = $this->repo->applyFilter( $filter )->select(
			\wpFluent()->raw( 'ticket_date as created_at, ticket_id' )
		)->getQuery()->getRawSql();

		$replyDateQuery  = 'select ticket_date from ' . wpFluent()->addTablePrefix( TicketRepository::TABLE_TICKETS, false );
		$replyDateQuery .= ' where ticket_parent = wsdesk_tickets.ticket_id order by ticket_id limit 1';

		$query  = 'SELECT agent_id, agent_name, sum(diff_in_seconds) as diff_in_seconds, count(agent_id) as count from (';
		$query .= 'SELECT TIME_TO_SEC(TIMEDIFF(STR_TO_DATE((' . $replyDateQuery . '), \'%b %d, %Y %r\'), STR_TO_DATE(created_at, \'%b %d, %Y %r\'))) as diff_in_seconds,';
		$query .= ' users.id as agent_id, users.display_name as agent_name ';
		$query .= 'FROM ' . wpFluent()->addTablePrefix( 'users', false ) . ' as users';
		$query .= ' left join (' . $metaSubQuery . ' and ticket_id in (' . $subQuery . ')) as wp_wsdesk_ticketsmeta';
		$query .= ' on meta_value like concat(\'%"\',users.id,\'"%\')';
		$query .= ' left join (' . $ticketDateQuery . ') as wsdesk_tickets';
		$query .= ' on wp_wsdesk_ticketsmeta.ticket_id = wsdesk_tickets.ticket_id';
		$query .= ' where users.id in (' . $whereSubQuery . ')';
		//$query .= ' and exists (' . $replyDateQuery . ')';
		$query .= ') as reply_times group by agent_id';

		$statuses = wpFluent()->query( $query )->get();

		$statuses = collect( $statuses )->map(
			function ( $status ) {
				$status->diff_in_minutes = $status->diff_in_seconds ? round( $status->diff_in_seconds / 60 / $status->count ) : 0;
				return $status;
			}
		);

		return $statuses;
	}

	/**
	 * Get reply count by agent per day
	 *
	 * @param string $subQuery
	 * @return array
	 */
	public function getReplyCountByAgentsPerDay( array $filter ) {

		//$subQuery = $this->repo->applyFilter($filter)->select('ticket_id')->getQuery()->getRawSql();

		$whereSubQuery = $this->repo->getAdminUserQuery( $filter )->select( [ 'user_id' ] )->getQuery()->getRawSql();

		$ticketDateQuery = wpFluent()->table( TicketRepository::TABLE_TICKETS )->select(
			\wpFluent()->raw( 'STR_TO_DATE(ticket_date, \'%%b %%d, %%Y\') as created_at, ticket_id, ticket_author' )
		)->where( 'ticket_trash', '=', 0 );

		$ticketDateQuery = $this->repo->applyFilter( $filter, $ticketDateQuery );

		$ticketDateQuery = $ticketDateQuery->getQuery()->getRawSql();

		$query  = 'SELECT count(wsdesk_tickets.ticket_id) as count, created_at,';
		$query .= ' users.id as agent_id, users.display_name as agent_name';
		$query .= ' FROM ' . wpFluent()->addTablePrefix( 'users', false ) . ' as users';
		$query .= ' left join (' . $ticketDateQuery . ') as wsdesk_tickets';
		$query .= ' on wsdesk_tickets.ticket_author = users.id';
		$query .= ' where users.id in (' . $whereSubQuery . ')';
		$query .= ' GROUP by users.id, created_at';

		$statuses = wpFluent()->query( $query )->get();

		$statuses = collect( $statuses )->groupBy( 'agent_id' )->values()->map(
			function ( $agent ) use ( $filter ) {
				$agent = $agent->keyBy( 'created_at' )->values();

				$agent_name = Arr::get( (array) $agent->first(), 'agent_name', 'Agent' );

				list($start_date, $end_date) = Arr::get( $filter, 'created_at', [] );

				$start_date = new DateTime( $start_date );
				$end_date   = new DateTime( $end_date );

				while ( $start_date->format( 'U' ) <= $end_date->format( 'U' ) ) {
					if ( $agent->has( $start_date->format( 'Y-m-d' ) ) === false ) {
						$agent->push(
							[
								'count'      => 0,
								'agent_name' => $agent_name,
								'created_at' => $start_date->format( 'Y-m-d' ),
							]
						);
					}
					$start_date = $start_date->modify( '+1 day' );
				}

				$agent = $agent->map(
					function ( $item ) {
						$item = (array) $item;
						if ( isset( $item['created_at'] ) ) {
							$item['time'] = strtotime( $item['created_at'] );
						} else {
							$item['time'] = null; 
						}
						return $item;
					}
				)->sortBy( 'time' )->values();
				

				$dataset = [
					'label'                => $agent_name,
					'data'                 => $agent,
					'pointBackgroundColor' => $this->getColor(),
				];

				return $dataset;
			}
		);

		return $statuses;
	}

	/**
	 * Get ticket count by agent per day
	 *
	 * @param string $subQuery
	 * @return array
	 */
	public function getCountByAgentsPerDay( array $filter ) {
		$metaSubQuery = wpFluent()->table( TicketRepository::TABLE_TICKETS_META )
							->where( 'meta_key', 'ticket_assignee' )
							->select( [ 'ticket_id', 'meta_value' ] )
							->getQuery()
							->getRawSql();

		$whereSubQuery = $this->repo->getAdminUserQuery( $filter )->select( [ 'user_id' ] )->getQuery()->getRawSql();
		$subQuery      = $this->repo->applyFilter( $filter )->select( 'ticket_id' )->getQuery()->getRawSql();

		$ticketDateQuery = $this->repo->applyFilter( $filter )->select(
			\wpFluent()->raw( 'ticket_date as created_at, ticket_id' )
		)->getQuery()->getRawSql();

		$query  = 'SELECT count(wp_wsdesk_ticketsmeta.ticket_id) as count, STR_TO_DATE(created_at, \'%b %d, %Y\') as created_at, users.id as agent_id, users.display_name as agent_name ';
		$query .= 'FROM ' . wpFluent()->addTablePrefix( 'users', false ) . ' as users';
		$query .= ' left join (' . $metaSubQuery . ' and ticket_id in (' . $subQuery . ')) as wp_wsdesk_ticketsmeta';
		$query .= ' on meta_value like concat(\'%"\',users.id,\'"%\')';
		$query .= ' left join (' . $ticketDateQuery . ') as wsdesk_tickets';
		$query .= ' on wp_wsdesk_ticketsmeta.ticket_id = wsdesk_tickets.ticket_id';
		$query .= ' where users.id in (' . $whereSubQuery . ')';
		$query .= ' GROUP by users.id, STR_TO_DATE(created_at, \'%b %d, %Y\')';
		$query .= ' order by STR_TO_DATE(created_at, \'%b %d, %Y\')';

		$statuses = wpFluent()->query( $query )->get();

		$statuses = collect( $statuses )->groupBy( 'agent_id' )->values()->map(
			function ( $agent ) use ( $filter ) {
				$agent_name = Arr::get( (array) $agent->first(), 'agent_name', 'Agent' );

				list($start_date, $end_date) = Arr::get( $filter, 'created_at', [] );

				$start_date = new DateTime( $start_date );
				$end_date   = new DateTime( $end_date );

				while ( $start_date->format( 'U' ) <= $end_date->format( 'U' ) ) {
					if ( $agent->has( $start_date->format( 'Y-m-d' ) ) === false ) {
						$agent->push(
							[
								'count'      => 0,
								'agent_name' => $agent_name,
								'created_at' => $start_date->format( 'Y-m-d' ),
							]
						);
					}
					$start_date = $start_date->modify( '+1 day' );
				}
				$agent = $agent->map(
					function ( $item ) {
						$item = (array) $item;
						if ( isset( $item['created_at'] ) ) {
							$item['time'] = strtotime( $item['created_at'] );
						} else {
							$item['time'] = null; 
						}
						return $item;
					}
				)->sortBy( 'time' )->values();
				

				$dataset = [
					'label'                => $agent_name,
					'data'                 => $agent,
					'pointBackgroundColor' => $this->getColor(),
				];

				return $dataset;
			}
		);

		return $statuses;
	}

	/**
	 * Get ticket count by agent per day per tags
	 *
	 * @param array $filter
	 * @return array
	 */
	public function getCountByAgentsPerDayPerTags( array $filter ) {
		$tagsSubQuery = wpFluent()->table( TicketRepository::TABLE_TICKETS_META )
							->where( 'meta_key', 'ticket_tags' )
							->select( [ 'ticket_id', 'meta_value' ] )
							->getQuery()
							->getRawSql();

		$metaSubQuery = wpFluent()->table( TicketRepository::TABLE_TICKETS_META )
							->where( 'meta_key', 'ticket_assignee' )
							->select( [ 'ticket_id', 'meta_value' ] )
							->getQuery()
							->getRawSql();

		$whereSubQuery = $this->repo->getAdminUserQuery( $filter )->select( [ 'user_id' ] )->getQuery()->getRawSql();

		$subQuery = $this->repo->applyFilter( $filter )->select( 'ticket_id' )->getQuery()->getRawSql();

		$ticketDateQuery = $this->repo->applyFilter( $filter )->select(
			\wpFluent()->raw( 'ticket_date as created_at, ticket_id' )
		)->getQuery()->getRawSql();

		$query  = 'SELECT count(wsdesk_tickets.ticket_id) as count, wp_wsdesk_settings.title,';
		$query .= ' STR_TO_DATE(created_at, \'%b %d, %Y\') as created_at, users.id as agent_id, users.display_name as agent_name ';
		$query .= 'FROM ' . wpFluent()->addTablePrefix( 'users', false ) . ' as users';
		$query .= ' left join (' . $metaSubQuery . ' and ticket_id in (' . $subQuery . ')) as wp_wsdesk_ticketsmeta';
		$query .= ' on wp_wsdesk_ticketsmeta.meta_value like concat(\'%"\',users.id,\'"%\')';
		$query .= ' left join (' . $ticketDateQuery . ') as wsdesk_tickets';
		$query .= ' on wp_wsdesk_ticketsmeta.ticket_id = wsdesk_tickets.ticket_id';
		$query .= ' left join (' . $tagsSubQuery . ' ) as ticket_tags';
		$query .= ' on ticket_tags.ticket_id = wsdesk_tickets.ticket_id';
		$query .= ' left join ' . wpFluent()->addTablePrefix( 'wsdesk_settings', false ) . ' as wp_wsdesk_settings';
		$query .= ' on ticket_tags.meta_value like concat(\'%"\',wp_wsdesk_settings.slug, \'"%\')';
		$query .= ' where users.id in (' . $whereSubQuery . ')';
		$query .= ' and wp_wsdesk_settings.type = "tag" and wp_wsdesk_settings.filter = "yes"';
		$query .= ' GROUP by users.id,wp_wsdesk_settings.slug, STR_TO_DATE(created_at, \'%b %d, %Y\')';

		$statuses = wpFluent()->query( $query )->get();

		return $statuses;
	}

	/**
	 * Get ticket count by agent per day per status
	 *
	 * @param string $subQuery
	 * @return array
	 */
	public function getCountByAgentsPerDayPerStatus( $subQuery ) {
		$statusSubQuery = wpFluent()->table( TicketRepository::TABLE_TICKETS_META )
							->where( 'meta_key', 'ticket_label' )
							->select( [ 'ticket_id', 'meta_value' ] )
							->getQuery()
							->getRawSql();

		$metaSubQuery = wpFluent()->table( TicketRepository::TABLE_TICKETS_META )
							->where( 'meta_key', 'ticket_assignee' )
							->select( [ 'ticket_id', 'meta_value' ] )
							->getQuery()
							->getRawSql();

		$whereSubQuery = $this->repo->getAdminUserQuery( $filter )->select( [ 'user_id' ] )->getQuery()->getRawSql();

		$ticketDateQuery = $this->repo->query()->select(
			\wpFluent()->raw( 'ticket_date as created_at, ticket_id' )
		)->getQuery()->getRawSql();

		$query  = 'SELECT count(wsdesk_tickets.ticket_id) as count, ticket_statuses.meta_value, STR_TO_DATE(created_at, \'%b %d, %Y\') as created_at, users.id as agent_id, users.display_name as agent_name ';
		$query .= 'FROM ' . wpFluent()->addTablePrefix( 'users', false ) . ' as users';
		$query .= ' left join (' . $metaSubQuery . ' and ticket_id in (' . $subQuery . ')) as wp_wsdesk_ticketsmeta';
		$query .= ' on wp_wsdesk_ticketsmeta.meta_value like concat(\'%"\',users.id,\'"%\')';
		$query .= ' left join (' . $ticketDateQuery . ') as wsdesk_tickets';
		$query .= ' on wp_wsdesk_ticketsmeta.ticket_id = wsdesk_tickets.ticket_id';
		$query .= ' left join (' . $statusSubQuery . ' ) as ticket_statuses';
		$query .= ' on ticket_statuses.ticket_id = wsdesk_tickets.ticket_id';
		$query .= ' where users.id in (' . $whereSubQuery . ')';
		$query .= ' GROUP by users.id, ticket_statuses.meta_value, STR_TO_DATE(created_at, \'%b %d, %Y\')';

		$statuses = wpFluent()->query( $query )->get();

		return $statuses;
	}

	/**
	 * Get agent statisfication score
	 *
	 * @param string $subQuery
	 * @return array
	 */
	public function satisficationScore( array $filter ) {
		$statusSubQuery = wpFluent()->table( TicketRepository::TABLE_TICKETS_META )
							->where( 'meta_key', 'ticket_rating' )
							->select( [ 'ticket_id', 'meta_value' ] )
							->getQuery()
							->getRawSql();

		$metaSubQuery = wpFluent()->table( TicketRepository::TABLE_TICKETS_META )
							->where( 'meta_key', 'ticket_assignee' )
							->select( [ 'ticket_id', 'meta_value' ] )
							->getQuery()
							->getRawSql();

		$whereSubQuery = $this->repo->getAdminUserQuery( $filter )->select( [ 'user_id' ] )->getQuery()->getRawSql();

		$subQuery = $this->repo->applyFilter( $filter )->select( 'ticket_id' )->getQuery()->getRawSql();

		$ticketDateQuery = $this->repo->applyFilter( $filter )->select(
			\wpFluent()->raw( 'ticket_date as created_at, ticket_id' )
		)->getQuery()->getRawSql();

		$query  = 'SELECT count(wp_wsdesk_ticketsmeta.ticket_id) as count, ticket_statuses.meta_value as rating, users.id as agent_id, users.display_name as agent_name';
		$query .= ' FROM ' . wpFluent()->addTablePrefix( 'users', false ) . ' as users';
		$query .= ' left join (' . $metaSubQuery . ' and ticket_id in (' . $subQuery . ')) as wp_wsdesk_ticketsmeta';
		$query .= ' on wp_wsdesk_ticketsmeta.meta_value like concat(\'%"\',users.id,\'"%\')';
		$query .= ' left join (' . $ticketDateQuery . ') as wsdesk_tickets';
		$query .= ' on wp_wsdesk_ticketsmeta.ticket_id = wsdesk_tickets.ticket_id';
		$query .= ' left join (' . $statusSubQuery . ' ) as ticket_statuses';
		$query .= ' on ticket_statuses.ticket_id = wsdesk_tickets.ticket_id';
		$query .= ' where users.id in (' . $whereSubQuery . ')';
		$query .= ' GROUP by users.id, ticket_statuses.meta_value';

		$statuses = wpFluent()->query( $query )->get();

		$statuses = collect( $statuses )->groupBy( 'agent_id' )->map(
			function ( $status ) {
				$agent = $status->groupBy( 'rating' )->map(
					function ( $score ) {
						return (array) $score->first();
					}
				);

				$score = [
					'good'       => 0,
					'bad'        => 0,
					'score'      => 0,
					'total'      => 0,
					'agent_id'   => Arr::get( $agent->first(), 'agent_id' ),
					'agent_name' => Arr::get( $agent->first(), 'agent_name' ),
					'agent'      => $agent,
				];

				$score['total'] = $agent->sum( 'count' );
				$score['good']  = Arr::get(
					$agent->get( 'great', [] ),
					'count',
					0
				);
				$score['bad']   = Arr::get(
					$agent->get( 'Bad', [] ),
					'count',
					0
				);

				if ( $score['good'] ) {
					$score['score'] = intval( $score['good'] / $score['total'] * 100 );
				}

				return $score;
			}
		)->values()->toArray();

		return $statuses;
	}

	/**
		Avg resolve time
	 *
	 * @param array $filter
	 * @return array
	 */
	public function getAvgResolveTime( array $filter ) {
		$metaSubQuery = wpFluent()->table( TicketRepository::TABLE_TICKETS_META )
							->where( 'meta_key', 'resolved_at' )
							->select( [ 'ticket_id', 'meta_value' ] )
							->getQuery()
							->getRawSql();

		$agentSubQuery = wpFluent()->table( TicketRepository::TABLE_TICKETS_META )
							->where( 'meta_key', 'ticket_assignee' )
							->select( [ 'ticket_id', 'meta_value' ] )
							->getQuery()
							->getRawSql();

		$whereSubQuery = $this->repo->getAdminUserQuery( $filter )->select( [ 'user_id' ] )->getQuery()->getRawSql();

		$ticketDateQuery = $this->repo->applyFilter( $filter )->select(
			\wpFluent()->raw( 'STR_TO_DATE(ticket_date, \'%%b %%d, %%Y %%r\') as created_at, ticket_id' )
		)->getQuery()->getRawSql();

		$query  = 'SELECT TIME_TO_SEC(TIMEDIFF(STR_TO_DATE(max(wp_wsdesk_ticketsmeta.meta_value), \'%Y-%m-%d %H:%i:%S\'),';
		$query .= ' min(created_at))) as response_time, count(wsdesk_tickets.ticket_id) as count,';
		$query .= ' users.id as agent_id, users.display_name as agent_name';
		$query .= ' FROM ' . wpFluent()->addTablePrefix( 'users', false ) . ' as users';
		$query .= ' left join (' . $agentSubQuery . ' ) as wp_wsdesk_ticket_agents';
		$query .= ' on wp_wsdesk_ticket_agents.meta_value like concat(\'%"\',users.id,\'"%\')';
		$query .= ' left join (' . $metaSubQuery . ' ) as wp_wsdesk_ticketsmeta';
		$query .= ' on wp_wsdesk_ticketsmeta.ticket_id = wp_wsdesk_ticket_agents.ticket_id';
		$query .= ' left join (' . $ticketDateQuery . ') as wsdesk_tickets';
		$query .= ' on wp_wsdesk_ticketsmeta.ticket_id = wsdesk_tickets.ticket_id';
		$query .= ' where users.id in (' . $whereSubQuery . ')';
		$query .= ' and wp_wsdesk_ticketsmeta.meta_value is not null';
		$query .= ' GROUP by users.id';

		$statuses = wpFluent()->query( $query )->get();

		$agents = $this->repo->getAgents( $filter );

		$existing_agents = array_map(
			function ( $status ) {
					return $status->agent_id;
			},
			$statuses
		);

		$agents = array_filter(
			$agents,
			function ( $agent ) use ( $existing_agents ) {
			return ! in_array( $agent['id'], $existing_agents );
			}
		);

		$agents = array_map(
			function ( $agent ) {
			$status                = new stdClass();
			$status->agent_id      = $agent['id'];
			$status->agent_name    = $agent['name'];
			$status->response_time = 0;
			$status->count         = 0;

			return $status;
			},
			$agents
		);

		$statuses = array_map(
			function ( $status ) {
				$status->response_time = $status->response_time ? round( $status->response_time / ( 60 * 60 ) / $status->count ) : 0;
				return $status;
			},
			$statuses
		);

		return array_merge( $statuses, $agents );
	}

	/**
	 * Get ticket count by status
	 *
	 * @param array $filter
	 * @return array
	 */
	public function getCountByStatus() {
		$count = $this->repo->getCountByLabels(
			$this->repo->applyFilter()->select( 'ticket_id' )->getQuery()->getRawSql()
		);

		return $count;
	}

	/**
	 * Get ticket count by Tag
	 *
	 * @param array $filter
	 * @return array
	 */
	public function getCountByTag( array $filter ) {
		$count = $this->repo->getCountByTags(
			$this->repo->applyFilter( $filter )->select( 'ticket_id' )->getQuery()->getRawSql()
		);

		return $count;
	}

	public function getColor() {
		return '#' . dechex( rand( 0, 10000000 ) );
	}
}
