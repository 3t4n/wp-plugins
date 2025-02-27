<?php
/**
 * Plugin Name: GravityWP - Count
 * Plugin URI: https://gravitywp.com/add-on/count/
 * Description: Adds a shortcode to count, filter and display Gravity Forms entries or the total of a number field in multiple entries.
 * Author: GravityWP
 * Version: 0.9.14
 * Author URI: https://gravitywp.com/add-on/count/
 * License: GPL2
 */

if ( class_exists( 'GFForms' ) ) {

	/**
	 * Gravitywp_count_func.
	 *
	 * @param   array<mixed> $atts       Attributes.
	 * @param   string|null  $content    Default: null.
	 * @return  string
	 */
	function gravitywp_count_func( $atts, $content = null ) {
		$atts = shortcode_atts(
			array(
				'formid'                   => '0',
				'form_id'                  => '0',
				'formstatus'               => 'active',
				'number_field'             => false,
				'filter_mode'              => 'all',
				'add_number'               => '0',
				'filter_field'             => false,
				'filter_operator'          => 'is',
				'filter_value'             => false,
				'filter_field2'            => false,
				'filter_operator2'         => 'is',
				'filter_value2'            => false,
				'filter_field3'            => false,
				'filter_operator3'         => 'is',
				'filter_value3'            => false,
				'filter_field4'            => false,
				'filter_operator4'         => 'is',
				'filter_value4'            => false,
				'filter_field5'            => false,
				'filter_operator5'         => 'is',
				'filter_value5'            => false,
				'decimals'                 => '2',
				'dec_point'                => '.',
				'thousands_sep'            => ',',
				'created_by'               => '',
				'is_starred'               => '',
				'is_read'                  => '',
				'is_approved'              => '',
				'multiply'                 => '1',
				'start_date'               => false,
				'end_date'                 => false,
				'workflow_step'            => '', // Takes the step number.
				'workflow_step_status'     => 'pending', // String separated by commas.
				'workflow_step_is_current' => true, // Getting entries pause at the step when set to true; getting entries have moved forward to other steps when set to false.
			),
			$atts
		);

		// Merge value of form_id and formid parameters.
		if ( $atts['formid'] !== '0' && $atts['form_id'] === '0' ) {
			$formids = $atts['formid']; // parameter formid is used.
		} elseif ( $atts['form_id'] !== '0' && $atts['formid'] === '0' ) {
			$formids = $atts['form_id']; // parameter form_id is used.
		} else {
			$formids = '0'; // default value.
		}
		$formids = explode( ',', $formids );

		$formstatus               = $atts['formstatus'];
		$number_field             = $atts['number_field'];
		$filter_mode              = $atts['filter_mode'];
		$add_number               = $atts['add_number'];
		$filter_field             = $atts['filter_field'];
		$filter_operator          = $atts['filter_operator'];
		$filter_value             = $atts['filter_value'];
		$filter_field2            = $atts['filter_field2'];
		$filter_operator2         = $atts['filter_operator2'];
		$filter_value2            = $atts['filter_value2'];
		$filter_field3            = $atts['filter_field3'];
		$filter_operator3         = $atts['filter_operator3'];
		$filter_value3            = $atts['filter_value3'];
		$filter_field4            = $atts['filter_field4'];
		$filter_operator4         = $atts['filter_operator4'];
		$filter_value4            = $atts['filter_value4'];
		$filter_field5            = $atts['filter_field5'];
		$filter_operator5         = $atts['filter_operator5'];
		$filter_value5            = $atts['filter_value5'];
		$decimals                 = $atts['decimals'];
		$dec_point                = $atts['dec_point'];
		$thousands_sep            = $atts['thousands_sep'];
		$created_by               = $atts['created_by'];
		$is_starred               = $atts['is_starred'];
		$is_read                  = $atts['is_read'];
		$is_approved              = $atts['is_approved'];
		$multiply                 = $atts['multiply'];
		$start_date               = $atts['start_date'];
		$end_date                 = $atts['end_date'];
		$workflow_step            = $atts['workflow_step'];
		$workflow_step_status     = $atts['workflow_step_status'];
		$workflow_step_is_current = $atts['workflow_step_is_current'];

		if ( $formstatus !== 'all' ) {
			$search_criteria['status'] = $formstatus;
		}

		$search_criteria['field_filters']['mode'] = $filter_mode;

		if ( ! empty( $filter_field ) ) {
			$search_criteria['field_filters'][] = array(
				'key'      => $filter_field,
				'operator' => $filter_operator,
				'value'    => $filter_value,
			);
		}
		if ( ! empty( $filter_field2 ) ) {
			$search_criteria['field_filters'][] = array(
				'key'      => $filter_field2,
				'operator' => $filter_operator2,
				'value'    => $filter_value2,
			);
		}
		if ( ! empty( $filter_field3 ) ) {
			$search_criteria['field_filters'][] = array(
				'key'      => $filter_field3,
				'operator' => $filter_operator3,
				'value'    => $filter_value3,
			);
		}
		if ( ! empty( $filter_field4 ) ) {
			$search_criteria['field_filters'][] = array(
				'key'      => $filter_field4,
				'operator' => $filter_operator4,
				'value'    => $filter_value4,
			);
		}
		if ( ! empty( $filter_field5 ) ) {
			$search_criteria['field_filters'][] = array(
				'key'      => $filter_field5,
				'operator' => $filter_operator5,
				'value'    => $filter_value5,
			);
		}
		if ( ! empty( $created_by ) ) {
			if ( $created_by === 'current' ) {
				$user_ID                            = get_current_user_id();
				$search_criteria['field_filters'][] = array(
					'key'   => 'created_by',
					'value' => $user_ID,
				);
			} else {
				$search_criteria['field_filters'][] = array(
					'key'   => 'created_by',
					'value' => $created_by,
				);
			}
		}

		if ( $is_starred === 'yes' ) {
			$search_criteria['field_filters'][] = array(
				'key'   => 'is_starred',
				'value' => 1,
			);
		}
		if ( $is_starred === 'no' ) {
			$search_criteria['field_filters'][] = array(
				'key'   => 'is_starred',
				'value' => 0,
			);
		}

		if ( $is_read === 'yes' ) {
			$search_criteria['field_filters'][] = array(
				'key'   => 'is_read',
				'value' => 1,
			);
		}
		if ( $is_read === 'no' ) {
			$search_criteria['field_filters'][] = array(
				'key'   => 'is_read',
				'value' => 0,
			);
		}

		if ( class_exists( 'GravityView_Entry_Approval_Status' ) ) {
			if ( $is_approved === 'yes' ) {
				$search_criteria['field_filters'][] = array(
					'key'   => 'is_approved', // GravityView_Entry_Approval::meta_key.
					'value' => 1, // GravityView_Entry_Approval_Status::APPROVED.
				);
			}
			if ( $is_approved === 'no' ) {
				$search_criteria['field_filters'][] = array(
					'key'   => 'is_approved', // GravityView_Entry_Approval::meta_key.
					'is_approved',
					'value' => 2, // GravityView_Entry_Approval_Status::DISAPPROVED.
				);
			}
		}

		if ( ! empty( $start_date ) ) {
			$date_start = date_create( $start_date );
			if ( $date_start ) {
				$search_criteria['start_date'] = $date_start->format( 'Y-m-d H:i:s' );
			} else {
				return esc_html( sprintf( 'Invalid start_date format %s, use: mm/dd/yyyy or a valid PHP time string.', $start_date ) );
			}
		}

		if ( ! empty( $end_date ) ) {
			$date_end = date_create( $end_date );
			if ( $date_end ) {
				$search_criteria['end_date'] = $date_end->format( 'Y-m-d H:i:s' );
			} else {
				return esc_html( sprintf( 'Invalid end_date format %s, use: mm/dd/yyyy or a valid PHP time string.', $end_date ) );
			}
		}

		if ( class_exists( 'Gravity_Flow_Bootstrap' ) ) {
			if ( ! empty( $workflow_step ) ) {
				if ( strstr( $workflow_step_status, ',' ) ) {
					$workflow_step_status = explode( ',', $workflow_step_status );
				}

				if ( is_array( $workflow_step_status ) ) {
					$search_criteria['field_filters'][] = array(
						'key'      => 'workflow_step_status_' . $workflow_step,
						'operator' => 'in',
						'value'    => array_map( 'trim', $workflow_step_status ),
					);
				} else {
					$search_criteria['field_filters'][] = array(
						'key'   => 'workflow_step_status_' . $workflow_step,
						'value' => $workflow_step_status,
					);
				}

				if ( 'false' !== $workflow_step_is_current ) {
					$search_criteria['field_filters'][] = array(
						'key'   => 'workflow_step',
						'value' => $workflow_step,
					);
				}
			}
		}

		// Replace greather_than and less_than operators with < or >.
		if ( array_key_exists( 'field_filters', $search_criteria ) ) {
			foreach ( $search_criteria['field_filters'] as $index => $filter ) {
				if ( is_array( $filter ) ) {
					if ( array_key_exists( 'operator', $filter ) && $filter['operator'] === 'greater_than' ) {
						$search_criteria['field_filters'][ $index ]['operator'] = '>'; // @phpstan-ignore-line Cannot assign offset 'operator' to array.
					}
					if ( array_key_exists( 'operator', $filter ) && $filter['operator'] === 'less_than' ) {
						$search_criteria['field_filters'][ $index ]['operator'] = '<'; // @phpstan-ignore-line Cannot assign offset 'operator' to array.
					}
				}
			}
		}

		$countentries = GFAPI::count_entries( $formids, $search_criteria );
		$raw_value    = floatval( $add_number ) + $countentries;

		$sorting = null;

		/*
		Note: in case of very large numbers this paging method might cause out of memory errors and/or database timeouts.
		An alternative is to limit the page-size and query in iterations.
		Disadvantage might be faulty calculations if changes are made in the entry table while the iteration is running.
		*/
		$paging = array(
			'offset'    => 0,
			'page_size' => $countentries,
		);

		// Count total of a specific number field from all entries.
		if ( ! empty( $number_field ) ) {
			$entries = GFAPI::get_entries( $formids, $search_criteria, $sorting, $paging );

			if ( is_wp_error( $entries ) ) {
				return 'ERROR';
			}

			$raw_value = floatval( $add_number );

			// Loop through each entry and add number to count.
			for ( $row = 0; $row < $countentries; $row++ ) {
				$raw_value += is_numeric( $entries[ $row ][ $number_field ] ) ? floatval( $entries[ $row ][ $number_field ] ) : 0;
			}
			// Apply multiplier to value.
			$raw_value *= floatval( $multiply );
			// Format raw value.
			$formatted_value = number_format( $raw_value, (int) $decimals, $dec_point, $thousands_sep );
		} else {
			// Apply multiplier to value.
			$raw_value *= floatval( $multiply );
			// Format raw value.
			$formatted_value = number_format( $raw_value, 0, '.', $thousands_sep );
		}

		/**
		 * Apply filter for result from count.
		 *
		 * @param string $formatted_value
		 * @param float $raw_value
		 * @param array<string> $formids
		 * @return string
		 */
		return apply_filters( 'gwp_count_result', $formatted_value, $raw_value, $formids );
	}
	add_shortcode( 'gravitywp_count', 'gravitywp_count_func' );
}
