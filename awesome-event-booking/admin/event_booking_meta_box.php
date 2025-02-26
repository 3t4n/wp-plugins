<?php
if ( !defined('ABSPATH') ) exit; // direct access disabled

/**
 * Register meta box(es).
 */
function register_event_booking_meta_box() {

	/* Create meta box for event details */
	/* call back function event_booking_meta_box_callback() */
	add_meta_box(
		'wp_event_booking-event_booking_details',
		__('Booking Details', 'wp_event_booking'),
		'event_booking_meta_box_callback',
		'event_booking',
		'normal',
		'high'
	);
}
add_action('add_meta_boxes', 'register_event_booking_meta_box');
/*** Location Meta Box Starts here ***/

/**
 * Meta box display callback.
 *
 * @param WP_Post $event Current post object.
 */
function event_booking_meta_box_callback($post) {
	/* Event booking details starts here */
	$_event_id = get_post_meta($post->ID, '_event_id', true);
	$_customer_id = get_post_meta($post->ID, '_customer_id', true);

	wp_nonce_field('_booking_details_nonce', 'booking_details_nonce');?>
  <div class="section group">
    <div class="col span_1_of_2">
      <h4><?php esc_html_e('Event', 'wp_event_booking');?></h4>
      <hr />
      <?php // WP_Query arguments
	echo '<select name="booked_event" class="regular-text sel_booked_event">';
	$args = array(
		'post_type' => array('cpt_events'),
		'posts_per_page' => '10',
		'order' => 'ASC',
		'orderby' => 'title',
		'post_status' => 'publish',
	);
	if (!empty($_event_id)) {
		$args['post__in'] = array($_event_id);
	}

	// The Query
	$query = new WP_Query($args);

	// The Loop
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			$selected = '';
			if (get_the_ID() == $_event_id) {
				$selected = 'selected';
			} ?><option value="<?php echo esc_html(get_the_ID()); ?>" <?php echo esc_html($selected); ?> ><?php the_title();?></option><?php
		}
	} else {
		// no posts found
	}
	// Restore original Post Data
	wp_reset_postdata();
	echo '</select>';?>
    <?php $event_dtls = get_post($_event_id);
	if(defined('WPEB_RE_ADDON_VERSION')) {

		$_EventStartDate = get_post_meta($post->ID, '_booked_event_start_date', true);
		if(!$_EventStartDate) {
			$_EventStartDate = get_post_meta($_event_id, '_eventStartDate', true);	
		}
		$_EventEndDate = get_post_meta($post->ID, '_booked_event_end_date', true);
		if(!$_EventEndDate) {
			$_EventEndDate = get_post_meta($_event_id, '_eventEndDate', true);
		}
		$all_day_event = get_post_meta($post->ID, '_is_booked_event_all_day', true);
		if(!$all_day_event) {
			$all_day_event = get_post_meta($_event_id, '_all_day_event', true);
		}
	}else {
		
		$_EventStartDate = get_post_meta($_event_id, '_eventStartDate', true);
		$_EventEndDate = get_post_meta($_event_id, '_eventEndDate', true);
		$all_day_event = get_post_meta($_event_id, '_all_day_event', true);
	}
	
	$time_style = '';
	$start_date = $start_time = $end_date = $end_time = '';
	$dateFormat = get_datepicker_format('php_format', get_option('datepickerFormat'));
	//date_create_from_format
	if ($_EventStartDate) {
		$start_date = gmdate($dateFormat, strtotime($_EventStartDate));
		$start_time = gmdate(get_option('timeFormat'), strtotime($_EventStartDate));
	}
	if ($_EventEndDate) {
		$end_date = gmdate($dateFormat, strtotime($_EventEndDate));
		$end_time = gmdate(get_option('timeFormat'), strtotime($_EventEndDate));
	}

	if (empty($all_day_event)) {

	} elseif ($all_day_event == 'yes') {

	}
	if (!empty($_customer_id)) {
		?>
		<table>
			<tr>
				<th align="left"><?php esc_html_e('Event title', 'wp_event_booking');?></th><td>:</td>
				<td><?php echo esc_attr($event_dtls->post_title); ?></td>
			</tr>
			<?php if ($all_day_event == 'yes') {?>
				<tr>
				<th align="left"><?php esc_html_e('All Day Event', 'wp_event_booking');?></th><td>:</td>
				<td>Yes</td>
				</tr>
				<tr>
				<th align="left"><?php esc_html_e('Start Date', 'wp_event_booking');?></th><td>:</td>
				<td><?php echo esc_html($start_date); ?></td>
				</tr>
				<tr>
				<th align="left"><?php esc_html_e('End Date', 'wp_event_booking');?></th><td>:</td>
				<td><?php echo esc_html($end_date); ?></td>
				</tr>
			<?php } else {?>
			<tr>
				<th align="left"><?php esc_html_e('Start Date', 'wp_event_booking');?></th><td>:</td>
				<td><?php echo esc_html($start_date); ?> <?php echo esc_html($start_time); ?></td>
			</tr>
			<tr>
				<th align="left"><?php esc_html_e('End Date', 'wp_event_booking');?></th><td>:</td>
				<td><?php echo esc_html($end_date); ?> <?php echo esc_html($end_time); ?></td>
			</tr>
			<?php }?>
			<tr>
				<th></th><td></td>
				<td><a target="_blank" href="<?php echo esc_url(get_edit_post_link($event_dtls->ID)); ?>"><?php esc_html_e('View Event', 'wp_event_booking');?></a></td>
			</tr>
		</table>
	<?php }?>
    </div>
    <div class="col span_1_of_2">
      <h4><?php esc_html_e('Customer', 'wp_event_booking');?></h4>
      <hr />
      <?php // WP_Query arguments
	echo '<select name="booked_customer" class="regular-text sel_event_customers"><option></option>';
	$args = array('role__in' => array('customer', 'guest_customer'), 'number' => 100);

	// The Query
	$user_query = new WP_User_Query($args);

	// The Loop
	if (!empty($user_query->get_results())) {
		foreach ($user_query->get_results() as $user) {
			$selected = '';
			if ($user->ID == $_customer_id) {
				$selected = 'selected';
			} ?>
            <option value="<?php echo esc_html($user->ID); ?>" <?php echo esc_html($selected); ?> ><?php echo esc_html($user->display_name); ?></option><?php
}
	} else {
		// echo 'No users found.';
	}
	echo '</select>';?>
    <?php
if (!empty($_customer_id)) {
		$user_info = get_userdata($_customer_id);
		$user_phone = get_user_meta($_customer_id, 'txt_attendant_phone_number', true);
		?>
    <table>
      <?php
	  
		$sign_up_fields = apply_filters('wpeb_checkout_sign_up_fields', array());
		foreach ($sign_up_fields as $SignupFN) {
			$field_name = $SignupFN['field_name'];
			$field_title = $SignupFN['field_title'];
			if ($field_name == 'txt_attendant_first_name') {
				?>
			<tr>
			<th align="left"><?php echo esc_html($field_title);?></th><td>:</td>
			<td><?php echo esc_attr($user_info->first_name); ?></td>
			</tr>
			<?php
} elseif ($field_name == 'txt_attendant_last_name') {
				?>
			<tr>
			<th align="left"><?php echo esc_html($field_title);?></th><td>:</td>
			<td><?php echo esc_attr($user_info->last_name); ?></td>
			</tr>
			<?php
} elseif ($field_name == 'txt_attendant_e_mail_address') {
				?>
			<tr>
			<th align="left"><?php echo esc_html($field_title);?></th><td>:</td>
			<td><?php echo esc_attr($user_info->user_email); ?></td>
			</tr>
			<?php
} else {
				if (!empty(get_user_meta($_customer_id, $field_name, true))) {
					?>
			<tr>
			<th align="left"><?php echo esc_html($field_title);?></th><td>:</td>
			<td><?php echo esc_attr(get_user_meta($_customer_id, $field_name, true)); ?></td>
			</tr>
			<?php
}
			}
		}?>
      <tr>
        <th align="left"></th><td></td>
        <td><a target="_blank" href="<?php echo esc_url(get_edit_user_link($_customer_id)); ?>"><?php esc_html_e('View Customer', 'wp_event_booking');?></a></td>
      </tr>
    </table>
  <?php }?>
    </div>
  </div>
<?php
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function save_event_booking_meta_box($post_id) {
	// Save logic goes here. Don't forget to include nonce checks!
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}
	if (!isset($_POST['booking_details_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['booking_details_nonce'])), '_booking_details_nonce')) {
		return;
	}
	if (!current_user_can('edit_post', $post_id)) {
		return;
	}
	if (isset($_POST['booked_event'])) {
		update_post_meta($post_id, '_event_id', sanitize_text_field(wp_unslash($_POST['booked_event'])));
		$author_id = get_post_field('post_author', sanitize_text_field(wp_unslash($_POST['booked_event'])));
		update_post_meta($post_id, '_author_id', $author_id);
		
		// update suppliers into booking
		if(get_post_meta(sanitize_text_field(wp_unslash($_POST['booked_event'])), '_event_suppliers', true)){

			update_post_meta($post_id, '_suppliers_ids', get_post_meta(sanitize_text_field(wp_unslash($_POST['booked_event'])), '_event_suppliers', true));
		}
	}
	if (isset($_POST['booked_customer'])) {
		update_post_meta($post_id, '_customer_id', sanitize_text_field(wp_unslash($_POST['booked_customer'])));
	}
}
add_action('save_post', 'save_event_booking_meta_box');
add_action('edit_form_after_title', 'my_new_elem_after_title');
function my_new_elem_after_title() {
	global $typenow, $pagenow;
	if (in_array($typenow, array('event_booking')) && $pagenow == 'post.php') {
		?>
  <div class="wpeb-booking-details"><h1 class="booking_title"><?php the_title();?></h1></div>
  <?php
}
}
add_action('post_submitbox_misc_actions', 'fnc_show_cancel_event_field');
add_action('save_post', 'fnc_process_cancel_event_field');
function fnc_show_cancel_event_field() {
	global $post;
	if (get_post_type($post) == 'event_booking') {
		$booking_status = get_post_meta($post->ID, 'booking_status', true);
		$_event_id = get_post_meta($post->ID, '_event_id', true);
		if ($_event_id) {
			$_eventStartDate = get_post_meta($_event_id, '_eventStartDate', true);
			if (strtotime("now") < strtotime($_eventStartDate)) {
				wp_nonce_field(plugin_basename(__FILE__), 'cancel_events');
				?>
				<p class="status_switcher"> <?php esc_html_e('Booking Status', 'wp_event_booking');?> : <select name="sel_cancel_event" id="sel_cancel_event">
					<option value="" <?php if ($booking_status != 'cancelled') {echo ' selected="selected"';}?>><?php esc_html_e('Activate', 'wp_event_booking');?></option>
					<option value="cancelled" <?php if ($booking_status == 'cancelled') {echo ' selected="selected"';}?>><?php esc_html_e('Cancel', 'wp_event_booking');?></option>
				</select></p>
			<?php }
		}
	}
}
function fnc_process_cancel_event_field($post_id) {

	if (!isset($_POST['post_type'])) {
		return $post_id;
	}

	if (isset($_POST['cancel_events']) && !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['cancel_events'])), plugin_basename(__FILE__))) {
		return $post_id;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	if ('event_booking' == sanitize_text_field(wp_unslash($_POST['post_type'])) && !current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	if (!isset($_POST['sel_cancel_event'])) {
		return $post_id;
	} else {
		update_post_meta($post_id, 'booking_status', sanitize_text_field(wp_unslash($_POST['sel_cancel_event'])));
		if (sanitize_text_field(wp_unslash($_POST['sel_cancel_event'])) == 'cancelled') {
			$_customer_id = get_post_meta($post_id, '_customer_id', true);
			$_event_id = get_post_meta($post_id, '_event_id', true);
			if ($_customer_id) {

				//$user_info->display_name
				/*$to = $user_info->user_email;
				$subject = 'Event booked was cancelled.';
				$body = 'Hello ' . $user_info->display_name . ',<br /> Booking ID : ' . $post_id . '</br>';
				$body .= fnc_event_details_4_mail($_event_id);
				$headers = array('Content-Type: text/html; charset=UTF-8');

				wp_mail($to, $subject, $body, $headers);*/
				//callback_notification_email($_event_id, $_customer_id, $post_id, '', 'cancelCustomerNotificationSubject', 'cancelCustomerNotification');
				//callback_notification_email($_event_id, $_customer_id, $post_id, 'admin', 'cancelAdminNotificationSubject', 'cancelAdminNotification');
				do_action('wpeb_after_cancel', $_event_id, $_customer_id, $post_id);
			}
		}
	}

}