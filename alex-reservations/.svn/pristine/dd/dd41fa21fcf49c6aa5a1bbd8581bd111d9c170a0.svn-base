<?php

namespace Alexr\Events;

use Alexr\Models\Booking;
use Alexr\Models\User;

class EventBookingModified
{
	public $booking;
	public $user;
	public $old_attributes;
	public $specific_changes;

	public function __construct(Booking $booking, User $user = null, $old_attributes = [], $specific_changes = null)
	{
		// Me esta dando lo mismo par aold que para new, son ambos old
		//ray('EVENT BOOKING MODIFIED', $old_attributes['tables_id'],$booking->tablesList );
		$this->booking = $booking;
		$this->user = $user;
		$this->old_attributes = $old_attributes;
		$this->specific_changes = $specific_changes;
	}
}
