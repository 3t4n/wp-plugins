<?php

namespace Alexr\Enums;

class WorkflowTriggerType {
	const BOOKING_STATUS_CHANGED = 'booking_status_changed';
	const BOOKING_CREATED = 'booking_created';
	const BOOKING_MODIFIED = 'booking_modified';
	const BOOKING_CANCELLED = 'booking_cancelled';
	const BOOKING_NO_SHOW = 'booking_no_show';

	const CUSTOMER_CREATED = 'customer_created';
	const CUSTOMER_MODIFIED = 'customer_modified';
	const CUSTOMER_TAG_ADDED = 'customer_tag_added';
	const CUSTOMER_TAG_REMOVED = 'customer_tag_removed';

	public static function listing() {
		return [
			self::BOOKING_STATUS_CHANGED => __eva('Booking Status Changed'),
			self::BOOKING_CREATED => __eva('Booking Created'),
			self::BOOKING_MODIFIED => __eva('Booking Modified'),
			self::BOOKING_CANCELLED => __eva('Booking Cancelled'),
			self::BOOKING_NO_SHOW => __eva('Booking No Show'),

			self::CUSTOMER_CREATED => __eva('Customer Created'),
			self::CUSTOMER_MODIFIED => __eva('Customer Modified'),
			self::CUSTOMER_TAG_ADDED => __eva('Customer Tag Added'),
			self::CUSTOMER_TAG_REMOVED => __eva('Customer Tag Removed')
		];
	}

	public static function label($type) {
		$list = self::listing();
		return isset($list[$type]) ? $list[$type] : ucfirst($type);
	}

	public static function booking_triggers() {
		return [
			self::BOOKING_STATUS_CHANGED,
			self::BOOKING_CREATED,
			self::BOOKING_MODIFIED,
			self::BOOKING_CANCELLED,
			self::BOOKING_NO_SHOW
		];
	}

	public static function customer_triggers() {
		return [
			self::CUSTOMER_CREATED,
			self::CUSTOMER_MODIFIED,
			self::CUSTOMER_TAG_ADDED,
			self::CUSTOMER_TAG_REMOVED
		];
	}
}
