<?php /**
 * @version 1.0
 * @description CRON
 * @category  CRON - Views and Filters
 * @author wpdevelop
 *
 * @web-site http://oplugins.com/
 * @email info@oplugins.com
 *
 * @modified 2020-01-23
 */

if ( ! defined( 'ABSPATH' ) ) exit;                                             // Exit if accessed directly


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// CRON - Listing - View in Rules
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Actions for showing View --------------------------------------------------------------------------------------------

/**
 * Template View of CRON   L A B E L S   for Rules Item in  rules listing page
 */
function opera_show_cron_labels_in_rules_listing_template(){
	return;
    ?>
	<div>
		<# if ( undefined != data['opera_cron_hook__rule_run'] ) { #>
		<span class="oper_label oper_label_cron_run"><?php _e('Run in', 'email-reminders'); ?>:
				  <?php /*{{ ( ( undefined != data['opera_cron_hook__rule_run'] ) ? data['opera_cron_hook__rule_run']['cron_local_time'] : '<?php _e('-','email-reminders') ?>' ) }} */?>
				  {{ ( ( undefined != data['opera_cron_hook__rule_run'] ) ? '' + data['opera_cron_hook__rule_run']['cron_after_time'] + '' : '' ) }}
		</span>
		<# } #>
		<# if ( undefined != data['opera_cron_hook__rule_reset'] ) { #>
		<span class="oper_label oper_label_cron_reset"><?php _e('Reset in', 'email-reminders'); ?>:
				  <?php /*{{ ( ( undefined != data['opera_cron_hook__rule_reset'] ) ? data['opera_cron_hook__rule_reset']['cron_local_time'] : '<?php _e('...','email-reminders') ?>' ) }} */?>
				  {{ ( ( undefined != data['opera_cron_hook__rule_reset'] ) ? '' + data['opera_cron_hook__rule_reset']['cron_after_time']+ '' : '' ) }}
		</span>
		<# } #>
	</div>
    <?php
}
add_action('opera_show_cron_labels_in_rules_listing', 'opera_show_cron_labels_in_rules_listing_template');


/**
 * Template View of CRON   D A T A   for Rules Item in  rules listing page
 */
function opera_show_cron_data_in_rules_listing_template(){
    ?>
	<#
		var label_cron_run_class = 'fieldvalue';
		if ( undefined != data['opera_cron_hook__rule_run'] ) {
	      var label_cron_run_class = 'oper_label oper_label_cron_run';
	    }

	#>
    <span><strong><?php _e('Next cron run', 'email-reminders'); ?></strong>: <span class="{{label_cron_run_class}}">
              {{ ( ( undefined != data['opera_cron_hook__rule_run'] ) ? data['opera_cron_hook__rule_run']['cron_local_time'] : '<?php _e('-','email-reminders') ?>' ) }}
			  {{ ( ( undefined != data['opera_cron_hook__rule_run'] ) ? ' (' + data['opera_cron_hook__rule_run']['cron_after_time'] + ')' : '' ) }}
    </span></span>&nbsp;&nbsp;
	<#
		var label_cron_reset_class = 'fieldvalue';
		if ( undefined != data['opera_cron_hook__rule_reset'] ) {
	      var label_cron_reset_class = 'oper_label oper_label_cron_reset';
	    }
	#>
    <span><strong><?php _e('Cron reset', 'email-reminders'); ?></strong>: <span class="{{label_cron_reset_class}}">
			  {{ ( ( undefined != data['opera_cron_hook__rule_reset'] ) ? data['opera_cron_hook__rule_reset']['cron_local_time'] : '<?php _e('-','email-reminders') ?>' ) }}
			  {{ ( ( undefined != data['opera_cron_hook__rule_reset'] ) ? ' (' + data['opera_cron_hook__rule_reset']['cron_after_time']+ ')' : '' ) }}
    </span></span>
	<#
	    var when_to_send = '';
		if(
	          ( undefined != data['advanced'] )
	       && ( undefined != data['advanced']['rule_run'] )
	       && ( undefined != data['advanced']['rule_run']['time_from'] )
	       && ( undefined != data['advanced']['rule_run']['time_to'] )
	    ){
	        when_to_send += data['advanced']['rule_run']['time_from'] + ' - ' + data['advanced']['rule_run']['time_to'];

			var week_days_to_send = [];
			<?php
				$week_title = array(
									__('Su', 'email-reminders'),
									__('Mo', 'email-reminders'),
									__('Tu', 'email-reminders'),
									__('We', 'email-reminders'),
									__('Th', 'email-reminders'),
									__('Fr', 'email-reminders'),
									__('Sa', 'email-reminders')
								);
				for( $i = 0; $i < 7; $i++) { ?>
					if (
						 	( undefined != data['advanced']['rule_run']['send_week<?php echo $i; ?>']  )
					     && (      'On' == data['advanced']['rule_run']['send_week<?php echo $i; ?>'] )
					){
						week_days_to_send.push( '<?php echo $week_title[ $i ]; ?>' );
					}
			<?php } ?>
			week_days_to_send = week_days_to_send.join(', ');
	    }
	#>
    <span><?php printf( __('Can be send at %s on %s', 'email-reminders')
				, '<strong class="fieldvalue" style="margin:0;">{{when_to_send}}</strong>'
				, '<strong class="fieldvalue" style="margin:0;">{{week_days_to_send}}</strong>' ); ?></span>

	<div class="clear" style="width:100%;"></div>
    <?php
}
add_action('opera_show_cron_data_in_rules_listing', 'opera_show_cron_data_in_rules_listing_template');




// Filters for Data arr ------------------------------------------------------------------------------------------------

/**
 *  Add to Rules Listing Array  to  each item the new CRON properties, like 'cron_local_time' & 'cron_after_time'
 *
 * @param $item         = Array (
						            [rules_id] => 49
						            [last_check_contact_id] => 10000
						            [status] =>
						            [last_run_date] => 2020-04-01 10:35:32
						            [expire_after] => 300
						            [rule] => Array (
									                    [email_template] => updates_expired_6_months
									                    [conditions] => Array (
													                            [0] => Array
													                                (
													                                    [if] => __default__|_date
													                                    [sign] => =
													                                    [value] => TODAY - 6 MONTHS - 1 DAY
													                                ),
				                                                                ...
									                        )
									                )
						            [ru_create_date] => 2020-03-19 09:56:28
						            [ru_edit_date] => 2020-04-01 10:35:32
						            [max_contact_id] => 14528
						        )
 *
 * @return array
 */
function opera_add_cron_times_to_rules_listing_arr( $item ){

	/**
	 * 	$item = Array (
						[rules_id] => 47
						[last_check_contact_id] => 0
						...
						[advanced] => ''
						...
						[max_contact_id] => 14528
					)
	 *
	 *   OR
	 *
	 * 	$item = Array (
						...
						[advanced] => Array (
												[rule_run] => Array (
														[enable] => On
														[next_time] => 2020-04-12 12:37
														[recurrence] => 60
														[max_contacts] => 3000
														[time_from] => 17:00
														[time_to] => 18:00
														[send_week0] => On
														[send_week1] => On
														[send_week2] => On
														[send_week3] => On
														[send_week4] => On
														[send_week5] => On
														[send_week6] => On
												)
												[rule_reset] => Array (
														[enable] => On
														[next_time] => 2020-04-06 09:53
														[recurrence] => 900
														[contact_id] => 1
												)
                )
						...
	 */

	$rules_id = $item['rules_id'];
//debuge($item);
	/**
	 * [opera_cron_hook__rule_run-40cd750bba9870f18aada2478b24840a-1585641880] => stdClass Object
	 * (
	 * [hook] => opera_cron_hook__rule_run
	 * [time] => 1585641880
	 * [sig] => 40cd750bba9870f18aada2478b24840a
	 * [args] => Array
	 * (
	 * )
	 *
	 * [schedule] => opera_cron_rules_run_schedule
	 * [interval] => 10
	 * [cron_local_time] => 2020-03-31 11:04:40
	 * [cron_after_time] => 5 seconds
	 * )
	 */

	$cron_hooks = array( 'opera_cron_hook__rule_run', 'opera_cron_hook__rule_reset' );
	foreach ( $cron_hooks as $cron_hook ) {

		// Get scheduled events
		$rule_events = opera_get_cron_event__for_rule( $rules_id, $cron_hook );

		if ( empty( $rule_events ) ) {
			// No events,  yet
		} else {

			foreach ( $rule_events as $key => $event ) {

				$item[ $event->hook ] = array(
					'cron_local_time' => $event->cron_local_time,
					'cron_after_time' => $event->cron_after_time
				);
			}
		}

	}

	return $item;
}
add_filter('opera_add_cron_times_to_rules_arr', 'opera_add_cron_times_to_rules_listing_arr', 10, 1 );


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// CRON - Edit Rule - View
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Actions for Editing Rule --------------------------------------------------------------------------------------------

/**
 * Template -  Show Edit Cron - during editing the Rule
 */
function opera_show_cron_data_in_rules_editing_template(){

	/**   data = Object{ ...
	                        advanced: null  (or Object)
							email_select_arr: Object { "": "Default", super_new: "super_new", updates_expired_6_months: "updates_expired_6_months" }
							expire_after: "300"
							last_check_contact_id: "1000"
							last_run_date: "2020-04-03 12:52:32"
							rules_id: "49"
							status: null
							value: {…}​​
							conditions: (3) […]		​​​
													0: Object { if: "__default__|_date", sign: "=", value: "TODAY - 6 MONTHS - 1 DAY" }		​​​
													1: Object { if: "__default__|_subscription_check", sign: "!=", value: "1" }		​​​
													2: Object { if: "__default__|_paid", sign: "!contain", value: "REFUND" }
	 * 						...
	 */
    ?>
	<div class="clear"></div>
	<div class="ui__rules__header">
		<?php _e('Automate - CRON   ', 'email-reminders'); ?>
	</div>
	<?php
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// CRON 	Run
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	?>
	<div class="ui__rules__other_params" style="border:none;border-bottom:1px solid #ccc;">
		<div class="ui__rules__group 	ui__rules__group__activate_cron">
			<#
				// data.advanced  = null   -  During first data getting  in  Database
				var is_selected = '';
				if (  ( undefined != data.advanced ) && ( undefined != data.advanced['rule_run'] ) && ( 'On' == data.advanced['rule_run']['enable'] )  ){
					is_selected = ' checked="checked" ';
				}
			#>
			<label  for="cron_rule_run__enable" ><?php _e('Enable rule run', 'email-reminders'); ?></label>
			<input name="cron_rule_run__enable" id="cron_rule_run__enable" class="cron_rule_run__enable"
			       type="checkbox" autocomplete="off" {{is_selected}}
				   placeholder="<?php _e( 'Enable cron to execute rule', 'email-reminders' ); ?>"
			/>
		</div>
		<div class="ui__rules__group 	ui__rules__group__activate_next_run">
			<#
				var field_value = '';
				if (  ( undefined != data.advanced ) && ( undefined != data.advanced['rule_run'] ) && ( undefined != data.advanced['rule_run']['next_time'] )  ){
					field_value = data.advanced['rule_run']['next_time'];
				}
			#>
			<label  for="cron_rule_run__next_time" ><?php _e('next time at', 'email-reminders'); ?></label>
			<input  name="cron_rule_run__next_time" id="cron_rule_run__next_time" class="cron_rule_run__next_time" style="width:10em;"
					type="text" autocomplete="off" value="{{field_value}}"
				    placeholder="<?php echo date_i18n('Y-m-d H:i:s'); ?>"
			/>
				<?php
				if (0){
					echo '<p class="description">';
					printf(   esc_html__( 'Format: %1$s or anything accepted by %2$s', 'wp-crontrol' )
							, '<code>YYYY-MM-DD HH:MM:SS</code>', '<a href="https://www.php.net/manual/en/function.strtotime.php"><code>strtotime()</code></a>'
					);
					echo '<br/>';
					printf(     esc_html__( 'Timezone: %s', 'wp-crontrol' ),
						        '<code>' . esc_html( opera_get_timezone_name() ) . '</code>'
					);
					echo '</p>';
				}
				?>
		</div>

		<div class="ui__rules__group 	ui__rules__group__activate_recurrence">
			<label  for="cron_rule_run__recurrence"><?php _e('recurrence interval', 'email-reminders'); ?>:</label>

			<input type="number" id="cron_rule_run__recurrence_days" min="0" value="0" class="cron_rule_run__recurrence_days" />
			<label for="cron_rule_run__recurrence_days" class="cron_rule_run__recurrence_label"><?php _e('days','email-reminders'); ?></label>

			<input type="number" id="cron_rule_run__recurrence_hours" min="0" value="0" class="cron_rule_run__recurrence_hours" />
			<label for="cron_rule_run__recurrence_hours" class="cron_rule_run__recurrence_label"><?php _e('hours','email-reminders'); ?></label>

			<input type="number" id="cron_rule_run__recurrence_minutes" min="0" value="0" class="cron_rule_run__recurrence_minutes" />
			<label for="cron_rule_run__recurrence_minutes" class="cron_rule_run__recurrence_label"><?php _e('minutes','email-reminders'); ?></label>

			<label for="cron_rule_run__recurrence_minutes"><?php _e('or','email-reminders'); echo ' '; _e('in seconds','email-reminders'); ?>:</label>
            <input type="text"   id="cron_rule_run__recurrence" value="" class="cron_rule_run__recurrence"  />

			<!--select id="cron_rule_run__recurrence" name="cron_rule_run__recurrence" class="cron_rule_run__recurrence" autocomplete="off">
				<?php
				$cron_times = opera_cron_add_schedule_times( array() )  ;
				?>
				<#
				  var cron_times_options = {}
				  <?php
				  foreach ( $cron_times as $cron_times_keys => $cron_times_val_arr ) {
					?>
					  cron_times_options['<?php echo $cron_times_keys /*$cron_times_val_arr['interval']*/; ?>'] = '<?php echo $cron_times_val_arr['display']; ?>';
					<?php
				  }
				  ?>
				  _.each( cron_times_options, function ( field_title, field_val, f_data ) { #>
					<#
						var is_selected = '';
						if (  ( undefined != data.advanced ) && ( undefined != data.advanced['rule_run'] ) && ( field_val == data.advanced['rule_run']['recurrence'] )  ){
							is_selected = ' selected="selected" ';
						}
					#>
					<option value="{{field_val}}" {{is_selected}}>{{field_title}}</option>
				<# }); #>
			</select-->
		</div>

		<div class="ui__rules__group 	ui__rules__group__activate_next_run">
			<#
				var field_value = '';
				if (  ( undefined != data.advanced ) && ( undefined != data.advanced['rule_run'] ) && ( undefined != data.advanced['rule_run']['max_contacts'] )  ){
					field_value = data.advanced['rule_run']['max_contacts'];
				}
			#>
			<label  for="cron_rule_run__max_contacts"><?php _e('contacts to process per execution', 'email-reminders'); ?>:</label>
			<input  name="cron_rule_run__max_contacts" id="cron_rule_run__max_contacts" class="cron_rule_run__max_contacts"
					type="number" autocomplete="off" value="{{field_value}}"
				   	placeholder="1000"
			/>
		</div>

		<div class="ui__rules__group 	ui__rules__group__time_to_send">
			<#
				var field_value = '';
				if (  ( undefined != data.advanced ) && ( undefined != data.advanced['rule_run'] ) && ( undefined != data.advanced['rule_run']['time_from'] )  ){
					field_value = data.advanced['rule_run']['time_from'];
				}
				if ( '' == field_value ) {
					field_value = '00:00';
				}
			#>
			<label  for="cron_rule_run__send_time_from"><?php _e('approximate time to send reminders', 'email-reminders'); ?>:</label>
			<input  name="cron_rule_run__send_time_from" id="cron_rule_run__send_time_from" class="cron_rule_run__send_time_from"
					type="text" autocomplete="off" value="{{field_value}}"
				   	placeholder="10:00"
			/>
			<#
				var field_value = '';
				if (  ( undefined != data.advanced ) && ( undefined != data.advanced['rule_run'] ) && ( undefined != data.advanced['rule_run']['time_to'] )  ){
					field_value = data.advanced['rule_run']['time_to'];
				}
				if ( '' == field_value ) {
					field_value = '24:00';
				}
 			#>
			<label  for="cron_rule_run__send_time_to"> - </label>
			<input  name="cron_rule_run__send_time_to" id="cron_rule_run__send_time_to" class="cron_rule_run__send_time_to"
					type="text" autocomplete="off" value="{{field_value}}"
				   	placeholder="12:00"
			/>

			<label for="cron_rule_run__send_weekdays"><?php _e('on', 'email-reminders'); ?>:</label>

			<?php
				$week_title = array(
									__('Su', 'email-reminders'),
									__('Mo', 'email-reminders'),
									__('Tu', 'email-reminders'),
									__('We', 'email-reminders'),
									__('Th', 'email-reminders'),
									__('Fr', 'email-reminders'),
									__('Sa', 'email-reminders')
								);
				for( $i = 0; $i < 7; $i++) { ?>
				<#
					var field_value = '';
					if (  ( undefined != data.advanced ) && ( undefined != data.advanced['rule_run'] ) && ( undefined != data.advanced['rule_run']['send_week<?php echo $i; ?>'] )  ){
						field_value = data.advanced['rule_run']['send_week<?php echo $i; ?>'];
					}
					if ( '' == field_value ) {
						field_value = 'On';
					}
					var is_checked = '';
					if ( 'On' === field_value ) {
					   is_checked = ' checked="checked" ';
					}
				#>
				<label class="cron_rule_run__send_weeks" for="cron_rule_run__send_week<?php echo $i; ?>">
					<input type="checkbox" id="cron_rule_run__send_week<?php echo $i; ?>" name="cron_rule_run__send_week<?php echo $i; ?>"
						   class="cron_rule_run__send_week<?php echo $i; ?>"  style=""
						    {{is_checked}} value="{{field_value}}"
						   autocomplete="off" />
					<?php echo $week_title[ $i ]; ?>
				</label>
			<?php } ?>

		</div>


	</div>
	<?php
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// CRON 	Reset
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	?>
	<div class="ui__rules__other_params" style="border:none;border-bottom:1px solid #ccc;">
		<div class="ui__rules__group 	ui__rules__group__activate_cron">
			<#
				var is_selected = '';
				if (  ( undefined != data.advanced ) && ( undefined != data.advanced['rule_reset'] ) && ( 'On' == data.advanced['rule_reset']['enable'] )  ){
					is_selected = ' checked="checked" ';
				}
			#>
			<label  for="cron_rule_reset__enable" ><?php _e('Enable resetting', 'email-reminders'); ?></label>
			<input name="cron_rule_reset__enable" id="cron_rule_reset__enable" class="cron_rule_reset__enable"
			       type="checkbox" autocomplete="off" {{is_selected}}
				   placeholder="<?php _e( 'Enable cron to execute rule', 'email-reminders' ); ?>"
			/>
		</div>
		<div class="ui__rules__group 	ui__rules__group__activate_next_run">
			<#
				var field_value = '';
				if (  ( undefined != data.advanced ) && ( undefined != data.advanced['rule_reset'] ) && ( undefined != data.advanced['rule_reset']['next_time'] )  ){
					field_value = data.advanced['rule_reset']['next_time'];
				}
			#>
			<label  for="cron_rule_reset__next_time" ><?php _e('next time at', 'email-reminders'); ?></label>
			<input  name="cron_rule_reset__next_time" id="cron_rule_reset__next_time" class="cron_rule_reset__next_time"
					type="text" autocomplete="off" value="{{field_value}}"
				    placeholder="<?php echo date_i18n('Y-m-d H:i:s'); ?>"
			/>
				<?php
				if (0){
					echo '<p class="description">';
					printf(   esc_html__( 'Format: %1$s or anything accepted by %2$s', 'wp-crontrol' )
							, '<code>YYYY-MM-DD HH:MM:SS</code>', '<a href="https://www.php.net/manual/en/function.strtotime.php"><code>strtotime()</code></a>'
					);
					echo '<br/>';
					printf(     esc_html__( 'Timezone: %s', 'wp-crontrol' ),
						        '<code>' . esc_html( opera_get_timezone_name() ) . '</code>'
					);
					echo '</p>';
				}
				?>
		</div>

		<div class="ui__rules__group 	ui__rules__group__activate_recurrence">
			<label  for="cron_rule_reset__recurrence"><?php _e('recurrence interval', 'email-reminders'); ?>:</label>

			<input type="number" id="cron_rule_reset__recurrence_days" min="0" value="0" class="cron_rule_reset__recurrence_days" />
			<label for="cron_rule_reset__recurrence_days" class="cron_rule_reset__recurrence_label"><?php _e('days','email-reminders'); ?></label>

			<input type="number" id="cron_rule_reset__recurrence_hours" min="0" value="0" class="cron_rule_reset__recurrence_hours" />
			<label for="cron_rule_reset__recurrence_hours" class="cron_rule_reset__recurrence_label"><?php _e('hours','email-reminders'); ?></label>

			<input type="number" id="cron_rule_reset__recurrence_minutes" min="0" value="0" class="cron_rule_reset__recurrence_minutes" />
			<label for="cron_rule_reset__recurrence_minutes" class="cron_rule_reset__recurrence_label"><?php _e('minutes','email-reminders'); ?></label>

			<label for="cron_rule_reset__recurrence_minutes"><?php  _e('or','email-reminders'); echo ' '; _e('in seconds','email-reminders'); ?>:</label>
            <input type="text"   id="cron_rule_reset__recurrence" value="" class="cron_rule_reset__recurrence"  />


			<!--select id="cron_rule_reset__recurrence" name="cron_rule_reset__recurrence" class="cron_rule_reset__recurrence" autocomplete="off">
				<?php
				$cron_times = opera_cron_add_schedule_times( array() )  ;
				?>
				<#
				  var cron_times_options = {}
				  <?php
				  foreach ( $cron_times as $cron_times_keys => $cron_times_val_arr ) {
					?>
					  cron_times_options['<?php echo $cron_times_keys /*$cron_times_val_arr['interval'];*/ ?>'] = '<?php echo $cron_times_val_arr['display']; ?>';
					<?php
				  }
				  ?>
				  _.each( cron_times_options, function ( field_title, field_val, f_data ) { #>
					<#
						var is_selected = '';
						if (  ( undefined != data.advanced ) && ( undefined != data.advanced['rule_reset'] ) && ( field_val == data.advanced['rule_reset']['recurrence'] )  ){
							is_selected = ' selected="selected" ';
						}
					#>
					<option value="{{field_val}}" {{is_selected}}>{{field_title}}</option>
				<# }); #>
			</select-->
		</div>

		<div class="ui__rules__group 	ui__rules__group__activate_next_run">
			<#
				var field_value = '';
				if (  ( undefined != data.advanced ) && ( undefined != data.advanced['rule_reset'] ) && ( undefined != data.advanced['rule_reset']['contact_id'] )  ){
					field_value = data.advanced['rule_reset']['contact_id'];
				}
			#>
			<label  for="cron_rule_reset__contact_id"><?php _e('to set last checked contact id as', 'email-reminders'); ?></label>
			<input  name="cron_rule_reset__contact_id" id="cron_rule_reset__contact_id" class="cron_rule_reset__contact_id"
					type="text" autocomplete="off" value="{{field_value}}"
				   	placeholder="0"
			/>
		</div>
	</div>
    <?php

}
add_action('opera_show_cron_data_in_rules_editing', 'opera_show_cron_data_in_rules_editing_template');


/**
 * Escape Cron parameters - in Ajax request for saving it
 *
 * @param array $escaped_rules_other
 *
 * @return array
 */
function opera_escape_cron_parameters_for_rules_edit_arr( $escaped_rules_other ) {

	/**
	 *  $_POST = Array
        (
            [action] => OPER_RULES_MODIFY_ADD_EDIT
            [user_id] => 1
            [nonce] => 3e12e58be5
            [locale] => en_US
            [rules_id] => 49
            [oper_rules] => Array (			[email_template] => updates_expired_6_months		[conditions] => Array(...)		)
	        [last_check_contact_id] => 7000
            [advanced] => Array	(
									[rule_run] => Array (
															[enable] => On
															[next_time] => 2020-04-05
															[recurrence] => 300
															[max_contacts] => 89
															 [time_from]
															 [time_to]
															 [send_week0..6]
										)
								)
        )
	 */

	// Escape advanced parameters
	$escaped_rule_run = $escaped_rule_reset = array();

	if (
		   ( isset( $_POST['advanced'] ) )
		&& ( isset( $_POST['advanced']['rule_run'] ) )
	) {
			////////////////////////////////////
			// 1. Direct Clean Params
			////////////////////////////////////
			$request_params_rules  = array(
				 					  'enable'          => array( 'validate' => 's', 	'default' => 'Off' )
									, 'next_time'       => array( 'validate' => 's', 	'default' => '' )
									, 'recurrence'      => array( 'validate' => 'd', 	'default' => 0 )				// 300 seconds = 5 minutes
									, 'max_contacts'	=> array( 'validate' => 'd',	'default' => 1000 )				// 1000 contacts per one run
									, 'time_from'        => array( 'validate' => 's', 	'default' => '' )
									, 'time_to'          => array( 'validate' => 's', 	'default' => '' )
									, 'send_week0'       => array( 'validate' => 's', 	'default' => '' )
									, 'send_week1'       => array( 'validate' => 's', 	'default' => '' )
									, 'send_week2'       => array( 'validate' => 's', 	'default' => '' )
									, 'send_week3'       => array( 'validate' => 's', 	'default' => '' )
									, 'send_week4'       => array( 'validate' => 's', 	'default' => '' )
									, 'send_week5'       => array( 'validate' => 's', 	'default' => '' )
									, 'send_week6'       => array( 'validate' => 's', 	'default' => '' )
			);
			$request_params_values = array(                                                                             // Usually 		$request_params_values 	==  $_REQUEST
									'enable'         => $_POST['advanced']['rule_run']['enable'],
									'next_time'      => $_POST['advanced']['rule_run']['next_time'],
									'recurrence'     => $_POST['advanced']['rule_run']['recurrence'],
									'max_contacts'   => $_POST['advanced']['rule_run']['max_contacts']
									, 'time_from'        => $_POST['advanced']['rule_run']['time_from']
									, 'time_to'          => $_POST['advanced']['rule_run']['time_to']
									, 'send_week0'       => $_POST['advanced']['rule_run']['send_week0']
									, 'send_week1'       => $_POST['advanced']['rule_run']['send_week1']
									, 'send_week2'       => $_POST['advanced']['rule_run']['send_week2']
									, 'send_week3'       => $_POST['advanced']['rule_run']['send_week3']
									, 'send_week4'       => $_POST['advanced']['rule_run']['send_week4']
									, 'send_week5'       => $_POST['advanced']['rule_run']['send_week5']
									, 'send_week6'       => $_POST['advanced']['rule_run']['send_week6']
							);
			$escaped_rule_run = oper_get_clean_params_in_arr( $request_params_values, $request_params_rules );


			$request_params_rules  = array(
				 					  'enable'          => array( 'validate' => 's', 	'default' => 'Off' )
									, 'next_time'       => array( 'validate' => 's', 	'default' => '' )
									, 'recurrence'      => array( 'validate' => 'd', 	'default' => 0 )				// 300 seconds = 5 minutes
									, 'contact_id'	    => array( 'validate' => 'd',	'default' => 1 )				// 1000 contacts per one run
			);
			$request_params_values = array(                                                                             // Usually 		$request_params_values 	==  $_REQUEST
									'enable'         => $_POST['advanced']['rule_reset']['enable'],
									'next_time'      => $_POST['advanced']['rule_reset']['next_time'],
									'recurrence'     => $_POST['advanced']['rule_reset']['recurrence'],
									'contact_id'     => $_POST['advanced']['rule_reset']['contact_id'],
							);
			$escaped_rule_reset = oper_get_clean_params_in_arr( $request_params_values, $request_params_rules );
	}

	$escaped_rules_other['advanced'] = array(
												'rule_run'   => $escaped_rule_run,
												'rule_reset' => $escaped_rule_reset
										);
	/**
		Array ( [rules_id] => 49
				[expire_after] => 0
				[last_run_date] =>
				[last_check_contact_id] => 5600
				[advanced] => Array (
										[rule_run] => Array	(
															[enable] => On
															[next_time] => 2020-04-05 12:55
															[recurrence] => 300
															[max_contacts] => 999
														)
					)
        )
	 */
	return $escaped_rules_other;
}
add_filter( 'opera_escape_cron_parameters_for_rules_edit', 'opera_escape_cron_parameters_for_rules_edit_arr', 10, 2 );
