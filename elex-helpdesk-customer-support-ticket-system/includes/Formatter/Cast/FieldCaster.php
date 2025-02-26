<?php
namespace WSDesk\Formatter\Cast;

use WSDesk\Tickets\TicketField;

class FieldCaster implements CasterContract {

	public static function cast( $value, $key ) {

		$ticket_field = new TicketField( $key, $value );

		return $ticket_field->get_labels();
	}
}
