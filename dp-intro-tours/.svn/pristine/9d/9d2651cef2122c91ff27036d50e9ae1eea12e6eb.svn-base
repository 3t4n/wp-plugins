<?php

use IntroToursDP\Std\Core\Arr;

class Dp_Intro_Tours_Visit_Count
{
	public const TOURS_DISABLED_META_KEY = 'dpit_tours_disabled';
	public const TOURS_VISITS_META_KEY = 'dpit_tours_visits';
	public const VISIT_LS_VERSION_KEY = 'dpit_visits_ls_key_version';


	public static function process_visit($user_id, $tour_id)
	{

		$visit_data = self::get_visits($user_id);

		if ($tour_id && isset($visit_data)) {
			if (!array_key_exists($tour_id, $visit_data)) {
				$visit_data[$tour_id] = 0;
			}
			$visit_data[$tour_id]++;
			update_user_meta($user_id, self::TOURS_VISITS_META_KEY, $visit_data);
		}
		return Arr::get($visit_data, $tour_id, 0);
	}

	public static function get_visits_ls_key_version($tour_id): int
	{
		return intval(get_post_meta($tour_id, self::VISIT_LS_VERSION_KEY, true));
	}

	protected static function increment_visits_ls_key_version($tour_id): int
	{
		$deprecated_version = self::get_visits_ls_key_version($tour_id);
		$new_version = ($deprecated_version === PHP_INT_MAX) ? 0 : $deprecated_version + 1;
		update_post_meta($tour_id, self::VISIT_LS_VERSION_KEY, $new_version);
		return $new_version;
	}

	public static function clear_data_4_tour($user_id, $tour_id)
	{
		$visits_data = self::get_visits($user_id);
		if ($tour_id) {
			if (isset($visits_data)) {
				unset($visits_data[$tour_id]);
				update_user_meta($user_id, self::TOURS_VISITS_META_KEY, $visits_data);
			}
			self::increment_visits_ls_key_version($tour_id);
		}
	}

	public static function clear_all_data($user_id)
	{
		delete_user_meta($user_id, self::TOURS_VISITS_META_KEY);
		$tours = get_posts([
			'post_type' => 'dp_intro_tours',
			'numberposts' => -1
		]);
		foreach ($tours as $tour) {
			self::increment_visits_ls_key_version($tour->ID);
		}
	}

	private static function get_visits($user_id)
	{
		$visit_data = get_user_meta($user_id,  self::TOURS_VISITS_META_KEY, true);
		if (!$visit_data) {
			$visit_data = [];
		}
		return $visit_data;
	}

	private static function get_visit_count_core($user_id, $tour_id)
	{
		$visit_data = self::get_visits($user_id);
		$count = Arr::get($visit_data, $tour_id, 0);
		return [
			'count' => $count,
			'data'  => $visit_data
		];
	}

	private static function get_disabled_tours($user_id)
	{
		$visit_data = get_user_meta($user_id,  self::TOURS_DISABLED_META_KEY, true);
		if (!$visit_data) {
			$visit_data = [];
		}
		return $visit_data;
	}

	public static function get_visit_count($user_id, $tour_id)
	{
		return Arr::get(self::get_visit_count_core($user_id, $tour_id), 'count', 0);
	}

	public static function is_visit_enabled($user_id, $tour_id)
	{
		$disabled_tours = self::get_disabled_tours($user_id);
		return !in_array($tour_id, $disabled_tours);
	}

	public static function disable_future_visits($user_id, $tour_id)
	{
		$disabled_tours = self::get_disabled_tours($user_id);
		$disabled_tours = array_merge($disabled_tours, [$tour_id]);
		update_user_meta($user_id, self::TOURS_DISABLED_META_KEY, $disabled_tours);
	}
}
