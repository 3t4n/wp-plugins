<?php

namespace WSDesk\Tickets;

use WSDesk\Tickets\TicketReportRepository;
use Illuminate\Support\Arr;
use WSDesk\Response;

class Reports {
	protected $repo;

	public function __construct() {
		$this->repo = new TicketReportRepository();
	}

	public static function init() {
		$self = new self();
		add_action( 'wp_ajax_wsdesk_avg_time_taken_to_resolve', array( $self, 'avg_time_taken_to_resolve' ) );
		add_action( 'wp_ajax_wsdesk_no_of_tickets_per_agent_per_day', array( $self, 'wsdesk_no_of_tickets_per_agent_per_day' ) );
		add_action( 'wp_ajax_wsdesk_no_of_replies_by_agent_per_day', array( $self, 'wsdesk_no_of_replies_by_agent_per_day' ) );
		add_action( 'wp_ajax_wsdesk_no_of_tickets_per_status', array( $self, 'no_of_tickets_per_status' ) );
		add_action( 'wp_ajax_wsdesk_no_of_tickets_per_tag', array( $self, 'no_of_tickets_per_tag' ) );
		add_action( 'wp_ajax_wsdesk_agent_satisfication_score', array( $self, 'statisfication_score' ) );
		add_action( 'wp_ajax_wsdesk_agent_avg_reply_time', array( $self, 'avg_reply_time' ) );

		// Listener for resolve status
		add_action( 'wsdesk_on_add_update_ticket_meta', array( $self, 'add_ticket_resolve_time_meta' ) );
	}

	public function avg_time_taken_to_resolve() {
		$data = $this->repo->getAvgResolveTime( $_REQUEST );

		Response::json( $data );
	}

	public function wsdesk_no_of_tickets_per_agent_per_day() {
		$data = $this->repo->getCountByAgentsPerDay( $_REQUEST );

		Response::json( $data );
	}

	public function wsdesk_no_of_replies_by_agent_per_day() {
		$data = $this->repo->getReplyCountByAgentsPerDay( $_REQUEST );

		Response::json( $data );
	}

	public function no_of_tickets_per_status() {
		$data = $this->repo->getCountByStatus( $_REQUEST );

		Response::json( $data );
	}

	public function no_of_tickets_per_tag() {
		$data = $this->repo->getCountByTag( $_REQUEST );

		Response::json( $data );
	}

	public function statisfication_score() {
		$data = $this->repo->satisficationScore( $_REQUEST );

		Response::json( $data );
	}

	public function avg_reply_time() {
		$data = $this->repo->getAvgReplyTimeByAgents( $_REQUEST );

		Response::json( $data );
	}

	public function add_ticket_resolve_time_meta( $payload ) {
		$status_slug = 'label_LL02';

		if ( Arr::get( $payload, 'meta_key' ) !== 'ticket_label' ) {
			return;
		}

		if ( Arr::get( $payload, 'meta_value' ) === $status_slug ) {
			eh_crm_update_ticketmeta( $payload['ticket_id'], 'resolved_at', gmdate( 'Y-m-d H:i:s' ), false );
		}
	}
}
