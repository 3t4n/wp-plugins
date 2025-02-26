<?php

namespace WSDesk\Tickets\Formatter;

use WSDesk\Formatter\Formatter;

class TicketFormatter extends Formatter {

	protected $casts = [
		'ticket_updated' => 'timestamp',
		'ticket_date'    => 'timestamp',
	];
}
