<?php

/**
 * Ajax handler for counter
 */
add_action('wp_ajax_nopriv_get_litres', 'devpeoples_get_litres');
add_action('wp_ajax_get_litres', 'devpeoples_get_litres');
function devpeoples_get_litres() {

	$all_options = devpeoples_set_litres();

	$options = [
		'litres'    => $all_options['start_number'],
		'increment' => $all_options['increment'],
		'time'      => $all_options['time']
	];

	wp_send_json($options);
}

/**
 * Update and return counter settings
 */
function devpeoples_set_litres() {

	$last_update = get_option('dv_counter_options_last_update');
	$all_options = get_option('dv_counter_options');
	$inc_time    = $all_options['time'];
	$increment   = $all_options['increment'];
	$litres      = $all_options['start_number'];

	$now = new DateTime();
	$now = $now->format('Y-m-d H:i:s');

	$last_update_time = strtotime($last_update);
	$current_time     = strtotime($now);

	$total    = $litres;
	$seconds  = abs($current_time - $last_update_time);
	if ($seconds > $inc_time) {
		$delta     = round($seconds / $inc_time);
		$add_count = $delta * $increment;
		$total     = intval($litres) + intval($add_count);
	}

	$all_options['start_number'] = $total;

	update_option('dv_counter_options', $all_options);
	update_option('dv_counter_options_last_update', $now);

	return $all_options;
}
