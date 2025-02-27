<?php
/*
 * WPGear. Counter-Hits
 * functions.php
 */
 
	function do_Counter_Hits ($Counter_Base = 0) {
		// Считаем, даже если не отображаем на фронтенде.
		if (is_admin()) {
			// В Админке не считаем.
			return;
		}
		
		$AntiFlood_RU = isset($_SERVER['REQUEST_URI']) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : 'AntiFlood_RU';
		$AntiFlood_RA = isset($_SERVER['REMOTE_ADDR']) ? sanitize_text_field( wp_unslash($_SERVER['REMOTE_ADDR'] ) ) : 'AntiFlood_RA';
		$AntiFlood_RT = isset($_SERVER['REQUEST_TIME_FLOAT']) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_TIME_FLOAT'] ) ) : 'AntiFlood_RT';		
					
		$Counter_Hits 	= get_option( 'wpgear_counter_hits', 1 );
		$AntiFlood 		= get_option( 'wpgear_counter_hits_sign', 'nothing' );
		
		if ($AntiFlood == $AntiFlood_RU .$AntiFlood_RA .$AntiFlood_RT) {
			return $Counter_Hits + $Counter_Base;
		} else {
			$AntiFlood = $AntiFlood_RU .$AntiFlood_RA .$AntiFlood_RT;			
		}

		$Counter_Hits = $Counter_Hits + 1;
		
		update_option( 'wpgear_counter_hits', $Counter_Hits ); // phpcs:ignore	
		update_option( 'wpgear_counter_hits_sign', $AntiFlood ); // phpcs:ignore	

		return $Counter_Hits;
	}
	
	function get_Counter_Hits ($Counter_Base = 0) {
		global $Counter_Hits;
		
		return $Counter_Hits + $Counter_Base;
	}