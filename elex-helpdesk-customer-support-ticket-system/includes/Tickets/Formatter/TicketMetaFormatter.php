<?php

namespace WSDesk\Tickets\Formatter;

use WSDesk\Formatter\Formatter;
use WSDesk\Settings\SettingsRepository;

class TicketMetaFormatter extends Formatter {

	protected $casts = [
		'ticket_assignee'   => 'object',
		'ticket_bcc'        => 'object',
		'ticket_cc'         => 'object',
		'ticket_tags'       => 'object',
		'ticket_attachment' => 'object',
	];

	public function toArray() {
		$this->fieldCasts();

		return parent::toArray();
	}

	public function fieldCasts() {
		$settings = new SettingsRepository();

		$fields = $settings->getFields();

		foreach ( $fields as $field ) {
			$this->casts[ $field['slug'] ] = 'field';
		}
	}
}
