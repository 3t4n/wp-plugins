<?php

namespace Alexr\Settings\Traits;

// Sirve para calcular que reservation mode esta usandose para cada dia de la semana
// dentro del mismo shift
// https://claude.ai/chat/57449362-20d2-41f6-8e43-93eac6d09535
trait AvailabilityWeekdaysHelpers {

	// Si lo uso para sobreescribir las mesas del dia de la semana
	public function getListOfTablesForDate($date = null)
	{
		if ($date === null) {
			$list_of_tables = $this->list_of_tables;
			return is_array($list_of_tables) ? $list_of_tables : [];
		}

		// Get day of week from date
		$dayOfWeek = strtolower(date('D', strtotime($date)));

		// Check if weekday override is enabled
		$overwrite_key = "{$dayOfWeek}_overwrite_list_of_tables";
		$list_key = "{$dayOfWeek}_list_of_tables";

		if ($this->overwrite_list_of_tables &&
		    $this->{$overwrite_key} === true)
		{
			$list = $this->{$list_key};
			return is_array($list) ? $list : [];
		}

		$list_of_tables = $this->list_of_tables;
		return is_array($list_of_tables) ? $list_of_tables : [];
	}

	// NO LO USO
	public function getAvailabilityTypeForDate($date = null)
	{
		if ($date == null) {
			return $this->availability_type;
		}

		// son, sue, sed, shu, sri, sat, sun
		$dayOfWeek = strtolower(date('D', strtotime($date)));

		// Check if overwrite mode is enabled
		if ($this->overwrite_reserve_mode !== true) {
			return $this->availability_type;
		}

		// Get the specific day's reserve mode
		$day_reserve_mode = "{$dayOfWeek}_reserve_mode";
		if ($this->{$day_reserve_mode} !== true) {
			return $this->availability_type;
		}

		// Get the specific day's availability type
		$day_availability_type = "{$dayOfWeek}_availability_type";
		return $this->{$day_availability_type} ?? $this->availability_type;
	}

	// NO LO USO
	public function getAvailabilityConfig($date = null)
	{
		if ($date == null) {
			return [
				'availability_type' => $this->availability_type,
				'availability_total' => $this->availability_total,
				'availability_slots' => [
					'availability_slots' => $this->availability_slots,
					'availability_slots_limit_new_covers' => $this->availability_slots_limit_new_covers,
				],
				'list_of_tables' => $this->list_of_tables,
				'cannot_duplicate_tables' => $this->cannot_duplicate_tables
			];
		}

		$dayOfWeek = strtolower(date('D', strtotime($date)));

		// Check if overwrite mode is enabled
		if ($this->overwrite_reserve_mode !== true) {
			return $this->getAvailabilityConfig(null);
		}

		// Get the specific day's reserve mode
		$day_reserve_mode = "{$dayOfWeek}_reserve_mode";
		if ($this->{$day_reserve_mode} !== true) {
			return $this->getAvailabilityConfig(null);
		}

		// Return day-specific configuration
		return [
			'availability_type' => $this->{"{$dayOfWeek}_availability_type"} ?? $this->availability_type,
			'availability_total' => $this->{"{$dayOfWeek}_availability_total"} ?? $this->availability_total,
			'availability_slots' => [
				'availability_slots' => $this->{"{$dayOfWeek}_availability_slots"} ?? $this->availability_slots,
				'availability_slots_limit_new_covers' => $this->{"{$dayOfWeek}_availability_slots_limit_new_covers"} ?? $this->availability_slots_limit_new_covers,
			],
			'list_of_tables' => $this->{"{$dayOfWeek}_list_of_tables"} ?? $this->list_of_tables,
			'cannot_duplicate_tables' => $this->{"{$dayOfWeek}_cannot_duplicate_tables"} ?? $this->cannot_duplicate_tables
		];
	}
}
