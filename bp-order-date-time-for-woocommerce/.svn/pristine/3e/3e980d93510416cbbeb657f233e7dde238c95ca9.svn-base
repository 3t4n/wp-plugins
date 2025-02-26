<?php
/**
 * @package BP Delivery For Woocommerce
 */

namespace Bright_Delivery_for_Woocommerce\Traits;

class OptionsTrait {

	/**
	 * Auxiliar function that converts time to minutes
	 * 
	 * @param string $time
	 * @return mixed
	 */
	public static function timeToMinutes( string $time ): int {
		$arr = explode( ':', $time );
		if ( count( $arr ) === 3 ) {
			return $arr[0] * 3600 + $arr[1] * 60 + $arr[2];
		}
		return $arr[0] * 60 + $arr[1];
	}

	/**
	 * It generates the timeslots entries to use on checkout time range select
	 * 
	 * @param $interval
	 * @param $start_time
	 * @param $end_time
	 * @param $time_format
	 * @return array
	 */
	public static function getTimeSlot( $interval, $start_time, $end_time, $time_format ) {
		$start = new \DateTime( $start_time );
		$end   = new \DateTime( $end_time );

		if ( $time_format == 12 ) {
			$time_format = "h:i A";
		} elseif ( $time_format == 24 ) {
			$time_format = "H:i";
		}

		$startTime = $start->format( $time_format );
		$endTime   = $end->format( $time_format );
		$i         = 0;
		$time      = [];
		$result    = [];
		while ( strtotime( $startTime ) <= strtotime( $endTime ) ) {
			$start     = $startTime;
			$end       = date( $time_format, strtotime( '+' . $interval . ' minutes', strtotime( $startTime ) ) );
			$startTime = date( $time_format, strtotime( '+' . $interval . ' minutes', strtotime( $startTime ) ) );

			$i++;
			if ( strtotime( $startTime ) <= strtotime( $endTime ) ) {
				$start_24                    = new \DateTime( $start );
				$end_24                      = new \DateTime( $end );
				$idx                         = $start_24->format( 'H:i' ) . ' - ' . $end_24->format( 'H:i' );
				$time[$i]['slot_start_time'] = $start;
				$time[$i]['slot_end_time']   = $end;
				$result[$idx]                = $start . ' - ' . $end;
			}
		}
		return $result;
	}

	/**
	 * Get the pickup locations list for displaying on checkout
	 * 
	 * @param $options Plugin settings
	 * @param $type    Delivery or Pickup 
	 * @return mixed
	 */
	public static function pickup_options( $options, $type = "pickup" ) {

		$result = [];

		if ( !isset( $options['pickup-locations-required'] ) || 1 != $options['pickup-locations-required'] ) {
			$result[''] = ' -- ';
		}

		if ( is_array( $options['pickup-locations'] ) ) {
			foreach ( $options['pickup-locations'] as $local ) {
				$idx          = $local["location_name"] . ' - ' . $local["location_address"];
				$result[$idx] = $local["location_name"] . ' ( ' . $local["location_address"] . ' )';
			}
		}

		return $result;

	}

	/**
	 * It returns the timeslots according to settings
	 * 
	 * @param $options
	 * @param $type
	 * @return mixed
	 */
	public static function delivery_time_option( $options, $type = "delivery" ) {
		$is_slot_time_defined = false;
		$is_duration_defined  = false;
		$is_timeform_defined  = false;
		$timeslot_time_from   = '00:00';
		$timeslot_time_to     = '24:00';
		if ( 'delivery' == $type ) {
			if( isset( $options['bpwd_deliverytime_beginend'] ) && !empty( $options['bpwd_deliverytime_beginend'] ) ){
				$is_slot_time_defined = true;
				if( !empty( $options['bpwd_deliverytime_beginend']['from'] ) ){
					$timeslot_time_from = $options['bpwd_deliverytime_beginend']['from'];
				}
				if( !empty( $options['bpwd_deliverytime_beginend']['to'] ) ){
					$timeslot_time_to   = $options['bpwd_deliverytime_beginend']['to'];
				}
			}
			if( isset( $options['bpwd_deliverytime_slotduration'] ) && !empty( $options['bpwd_deliverytime_slotduration'] ) ) {
				$is_duration_defined  = true;
			}
			if( isset( $options['bpwd_deliverytime_timeformat'] ) && !empty( $options['bpwd_deliverytime_timeformat'] ) ) {
				$is_timeform_defined  = true;
			}
			$start       = ( $is_slot_time_defined ) ? OptionsTrait::timeToMinutes( $timeslot_time_from ) : "0";
			$start_time  = ( $is_slot_time_defined ) ? $timeslot_time_from : "00:00";
			$end         = ( $is_slot_time_defined ) ? OptionsTrait::timeToMinutes( $timeslot_time_to ) : "1440";
			$end_time    = ( $is_slot_time_defined ) ? $timeslot_time_to   : "24:00";
			$time_slot   = ( $is_duration_defined  ) ? $options['bpwd_deliverytime_slotduration'] : "60";
			$time_format = ( $is_timeform_defined  ) ? $options['bpwd_deliverytime_timeformat'] : "12";
		} else {
			if( isset( $options['bpwd_pickuptime_beginend'] ) && !empty( $options['bpwd_pickuptime_beginend'] ) ){
				$is_slot_time_defined = true;
				if( !empty( $options['bpwd_pickuptime_beginend']['from'] ) ){
					$timeslot_time_from = $options['bpwd_pickuptime_beginend']['from'];
				}
				if( !empty( $options['bpwd_pickuptime_beginend']['to'] ) ){
					$timeslot_time_to   = $options['bpwd_pickuptime_beginend']['to'];
				}		
			}
			if( isset( $options['bpwd_pickuptime_slotduration'] ) && !empty( $options['bpwd_pickuptime_slotduration'] ) ) {
				$is_duration_defined  = true;
			}
			if( isset( $options['bpwd_pickuptime_timeformat'] ) && !empty( $options['bpwd_pickuptime_timeformat'] ) ) {
				$is_timeform_defined  = true;
			}
			$start       = ( $is_slot_time_defined ) ? OptionsTrait::timeToMinutes( $timeslot_time_from ) : "0";
			$start_time  = ( $is_slot_time_defined ) ? $timeslot_time_from : "00:00";
			$end         = ( $is_slot_time_defined ) ? OptionsTrait::timeToMinutes( $timeslot_time_to ) : "1440";
			$end_time    = ( $is_slot_time_defined ) ? $timeslot_time_to : "24:00";
			$time_slot   = ( $is_duration_defined  ) ? intval( $options['bpwd_pickuptime_slotduration'] ) : "60";
			$time_format = ( $is_timeform_defined  ) ? intval( $options['bpwd_pickuptime_timeformat'] ) : "12";
		}

		$times = OptionsTrait::getTimeSlot( $time_slot, $start_time, $end_time, $time_format );

		return $times;

	}

}
