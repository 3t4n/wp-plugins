<?php
if ( !defined('ABSPATH') ) exit; // direct access disabled

/**
 * Register meta box(es).
 */
function register_event_meta_box() {

    /* Create meta box for event details */
    /* call back function event_meta_box_callback() */
    add_meta_box(
        'wp_event_booking-event_details',
        esc_html__('Event Details', 'wp_event_booking'),
        'event_meta_box_callback',
        'cpt_events',
        'advanced',
        'high'
    );
}
add_action('add_meta_boxes', 'register_event_meta_box');

/**
 * Meta box display callback.
 *
 * @param WP_Post $event Current post object.
 */
function event_meta_box_callback($post) {

    ?>

    <div class="section group">
        <div class="col div-multi_email_booking">
            <?php do_action('wpeb_event_multi_email_booking', $post); // call back function in admin/functions.php ?>
        </div>
    </div>
    <hr/>

    <?php
    if(function_exists('wpeb_ms_is_active') && current_user_can('administrator')){
        $author_name = get_the_author_meta( 'display_name', $post->post_author );
        $event_suppliers_meta = get_post_meta($post->ID, '_event_suppliers', true);

        if(!is_wp_error( $event_suppliers_meta ) && !empty( $event_suppliers_meta )){
            
            $event_suppliers_meta = explode(',', $event_suppliers_meta);
        }else{
            $event_suppliers_meta = array();
        }
        $suppliers = fnc_get_suppliers();
        ?>

        <h4><?php esc_html_e('Add/Remove Existing Suppliers', 'wp_event_booking');?></h4>

        <div class="section group">
            <div class="col span_1_of_2 select-existing-customers">
                <select name="event_suppliers[]" class="regular-text sel_event_suppliers" multiple="multiple"><option></option>
                <?php
                foreach ($suppliers as $key => $supplier) {
                    $selected = in_array($supplier->ID, $event_suppliers_meta) ? 'selected' : '';
                    echo '<option value="'. esc_html($supplier->ID) .'" '. esc_html($selected) .'>'. esc_html($supplier->display_name) .'</option>';
                }
                ?>
                </select>
            </div>
        </div>
        <hr/>
    <?php }
    /* Event DATE/TIME starts here */
    ?>

	<h4><?php esc_html_e('Event Date/Time', 'wp_event_booking');?></h4>
	<div class="date_time_picker">

	<?php do_action('wpeb_event_date_time', $post); // call back function can be found in admin/functions.php ?>

    </div>

	<?php /* Event DATE/TIME ends here */

    if(defined('WPEB_RE_ADDON_VERSION')) {

        do_action('wpeb_re_event_recurring_action', $post);
    }

    /* Event location starts here */
    $event_location_id = get_post_meta($post->ID, '_event_location', true);
    wp_nonce_field('_event_details_nonce', 'event_details_nonce');?>
	<hr />
    	<h4><?php esc_html_e('Location', 'wp_event_booking');?></h4>
    
		<div class="section group">
			<div class="col span_1_of_2">
				<?php // WP_Query arguments
                echo '<select name="event_location" class="regular-text sel_event_location"><option></option>';
                $args = array(
                    'post_type' => array('event_location'),
                    'posts_per_page' => '-1',
                    'order' => 'ASC',
                    'orderby' => 'title',
                );

                // The Query
                $query = new WP_Query($args);

                // The Loop
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $selected = '';
                        if (get_the_ID() == $event_location_id) {
                            $selected = 'selected';
                        } ?><option value="<?php echo esc_html(get_the_ID()); ?>" <?php echo esc_html($selected); ?> ><?php the_title();if (get_post_meta(get_the_ID(), 'location_city', true)) {echo ', ' . esc_html(get_post_meta(get_the_ID(), 'location_city', true));}?> </option><?php
                    }
                } else {
                    // no posts found
                }

                // Restore original Post Data
                wp_reset_postdata();
                echo '</select>';?>
			</div>
			<div class="col span_1_of_2">
			    <a class="show_location button button-primary" href="javascript:void(0)" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> <?php esc_html_e('Add Location', 'wp_event_booking');?></a>
			</div>
			<div class="section group div_event_location">
                <div class="col span_1_of_2">
                    <p><?php esc_html_e('New Location', 'wp_event_booking');?></p>
                    <input type="text" class="regular-text" name="txt_location_title" id="txt_location_title" placeholder="<?php esc_html_e('Title', 'wp_event_booking');?>">
                    <input type="text" class="regular-text" name="txt_location_street" id="txt_location_street" placeholder="<?php esc_html_e('Street and No.', 'wp_event_booking');?>">
                    <input type="text" class="regular-text" name="txt_location_zip" id="txt_location_zip" placeholder="<?php esc_html_e('Zip code', 'wp_event_booking');?>">
                    <input type="text" class="regular-text" name="txt_location_city" id="txt_location_city" placeholder="<?php esc_html_e('City', 'wp_event_booking');?>">
                    <?php
                    /* @parm $id,
                    Default Value : sel_location_country */
                    fnc_country_drop_down();
                    ?>
                    <br/>
                    <br/>
                    
                    <input type="button" class="button button-primary" id="btn_add_location" name="btn_add_location" value="<?php esc_html_e('Add', 'wp_event_booking');?>">
                    <input type="button" class="button button-primary" id="btn_cancel_location" name="btn_cancel_location" value="<?php esc_html_e('Discard', 'wp_event_booking');?>">
                </div>
			    <div class="col span_1_of_2"></div>
		    </div>
            <div class="section group">
                <div class="col span_1_of_2">
                    <?php // WP_Query arguments
                    echo '<select name="event_region" class="regular-text sel_event_region"><option></option>';
                    $args = array(
                        'post_type' => array('location_region'),
                        'posts_per_page' => '-1',
                        'order' => 'ASC',
                        'orderby' => 'title',
                    );

                    // The Query
                    $query = new WP_Query($args);

                    // The Loop
                    if ($query->have_posts()) {
                        while ($query->have_posts()) {
                            $query->the_post();
                            $selected = '';
                            if (get_the_ID() == get_post_meta($post->ID, '_event_location_region', true)) {
                                $selected = 'selected';
                            } ?><option value="<?php echo esc_html(get_the_ID()); ?>" <?php echo esc_html($selected); ?> ><?php the_title();?></option><?php
                        }
                    } else {
                        // no posts found
                    }
                    // Restore original Post Data
                    wp_reset_postdata();
                    echo '</select>';?>
                </div>
                <div class="col span_1_of_2">
                    <a class="show_location_region button button-primary" href="javascript:void(0)" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> <?php esc_html_e('Add Region', 'wp_event_booking');?></a>
                </div>
                <div class="section group div_location_region">
                    <div class="col span_1_of_2 events_location_new_region">
                        <p><?php esc_html_e('New Region', 'wp_event_booking');?></p>
                        <input type="text" class="regular-text" name="txt_location_region_title" id="txt_location_region_title" placeholder="Title">
                        <textarea class="regular-text" name="txt_location_region_description" id="txt_location_region_description" placeholder="<?php esc_html_e('Description', 'wp_event_booking');?>"></textarea>
                        <br /><br />
                        <input type="button" class="button button-primary" id="btn_add_location_region" name="btn_add_location_region" value="<?php esc_html_e('Add', 'wp_event_booking');?>">
                        <input type="button" class="button button-primary" id="btn_cancel_location_region" name="btn_cancel_location_region" value="<?php esc_html_e('Discard', 'wp_event_booking');?>">
                    </div>
                    <div class="col span_1_of_2"></div>
                </div>
            </div>
            <br />
		</div>
	<?php
/* Event Manager starts here */
    $event_manager_id = get_post_meta($post->ID, '_event_manager', true);?>
<hr />
<h4><?php esc_html_e('Event Manager', 'wp_event_booking');?></h4>

<div class="section group">
  <div class="col span_1_of_2">
    <?php // WP_Query arguments
    echo '<select name="event_manager" class="regular-text sel_event_manager"><option></option>';
    $args = array(
        'post_type' => array('event_manager'),
        'posts_per_page' => '-1',
        'order' => 'ASC',
        'orderby' => 'title',
    );

    // The Query
    $query = new WP_Query($args);

    // The Loop
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $selected = '';
            if (get_the_ID() == $event_manager_id) {
                $selected = 'selected';
            } ?><option value="<?php echo esc_html(get_the_ID()); ?>" <?php echo esc_html($selected); ?> ><?php the_title();?></option><?php
}
    } else {
        // no posts found
    }
    // Restore original Post Data
    wp_reset_postdata();
    echo '</select>';?>
  </div>
  <div class="col span_1_of_2">
  <a class="show_event_manager button button-primary" href="javascript:void(0)" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> <?php esc_html_e('Add Event Manager', 'wp_event_booking');?></a>
  </div>
  <div class="section group div_event_manager">
  <div class="col span_1_of_2">
    <p><?php esc_html_e('New Event Manager', 'wp_event_booking');?></p>
    <input type="text" class="regular-text" name="txt_event_manager_title" id="txt_event_manager_title" placeholder="<?php esc_html_e('Title', 'wp_event_booking');?>">
    <input type="text" class="regular-text" name="txt_event_manager_phone" id="txt_event_manager_phone" placeholder="<?php esc_html_e('Phone', 'wp_event_booking');?>">
    <input type="text" class="regular-text" name="txt_event_manager_email" id="txt_event_manager_email" placeholder="<?php esc_html_e('Email', 'wp_event_booking');?>">
    <input type="text" class="regular-text" name="txt_event_manager_website" id="txt_event_manager_website" placeholder="<?php esc_html_e('Website', 'wp_event_booking');?>">
    <br /><br />
    <input type="button" class="button button-primary" id="btn_add_event_manager" name="btn_add_event_manager" value="<?php esc_html_e('Add', 'wp_event_booking');?>">
    <input type="button" class="button button-primary" id="btn_cancel_event_manager" name="btn_cancel_event_manager" value="<?php esc_html_e('Cancel', 'wp_event_booking');?>">
  </div>
  <div class="col span_1_of_2"></div>
</div>
</div>
<?php
/* short description starts here */
    $_short_description = get_post_meta($post->ID, '_short_description', true);?>
<hr />
<h4><?php esc_html_e('Short Event Description', 'wp_event_booking');?></h4>

<div class="section group">
<div class="col span_2_of_2">
<table>
  <tr>
    <td>
	<?php
        wp_editor($_short_description, 'txt_short_description', array('textarea_rows' => 4, 'teeny' => false, 'quicktags' => false));
    ?>
  </td></tr>
</table>
</div>
</div>
<?php
/* Event cost starts here */
    $_event_cost = get_post_meta($post->ID, '_event_cost', true);?>
<hr />
<h4><?php esc_html_e('Event Cost', 'wp_event_booking');?></h4>

<div class="section group">
<div class="col span_1_of_2">
<table>
  <tr>
    <td><?php esc_html_e('Cost', 'wp_event_booking');?>:</td><td>
    <input type="number" step="0.01" class="regular-text" name="txt_event_cost" id="txt_event_cost" class="txt_event_cost"   min="0" value="<?php echo esc_html($_event_cost); ?>">
    <small><?php esc_html_e('Leave blank for free events.', 'wp_event_booking');?></small>
  </td></tr>
</table>
</div>
<div class="col span_1_of_2"></div>
</div>
<?php
/* Available spots starts here */
    $_available_spots = get_post_meta($post->ID, '_available_spots', true);?>
<hr />
<h4><?php esc_html_e('Available spots', 'wp_event_booking');?></h4>

<div class="section group">
<div class="col span_1_of_2">
<table>
  <tr>
    <td><?php esc_html_e('Spots available', 'wp_event_booking');?>:</td><td>
    <input type="number" step="0.01" class="regular-text" name="txt_available_spots" id="txt_available_spots" class="txt_event_cost"   min="0" value="<?php echo esc_html($_available_spots); ?>">
  </td></tr>
</table>
</div>
<div class="col span_1_of_2"></div>
</div>
<?php
/* Event cost starts here */
    $_event_cost = get_post_meta($post->ID, '_event_cost', true);?>
<hr />
<h4><?php esc_html_e('Add Existing Customer', 'wp_event_booking');?></h4>

<div class="section group">
<div class="col span_2_of_2 select-existing-customers">
  <?php // WP_Query arguments
    echo '<select name="event_customers[]" class="regular-text sel_event_customers" multiple="multiple"><option></option>';
    /*$args = array( 'role' => 'customer', 'number' => 100, );

    // The Query
    $user_query = new WP_User_Query( $args );

    // The Loop
    if ( ! empty( $user_query->get_results() ) ) {
    foreach ( $user_query->get_results() as $user ) {
    $selected = '';
    if ($user->ID == $user_ID) {
    $selected = 'selected';
    } ?><option value="<?php echo $user->ID; ?>" <?php echo $selected; ?> ><?php echo $user->display_name; ?></option><?php
    }
    } else {
    // echo 'No users found.';
    }
     */
    echo '</select>';if ($_GET && !empty($_GET['action']) && sanitize_text_field(wp_unslash($_GET['action'])) == 'edit') { ?>
	<a class="update_event_customers button button-primary" href="javascript:void(0)" role="button" alt="<?php echo esc_html($post->ID); ?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> <?php esc_html_e('Add user(s) to event now', 'wp_event_booking');?></a>
	<?php }?>
	<script type="text/javascript">
		var event_id = '<?php echo esc_html($post->ID); ?>';
		var user_message = '<?php esc_html_e('The user/users have been added to the event.', 'wp_event_booking');?>';
	</script>
</div>
</div>
<div class="section group">
<div class="col span_2_of_2"><a class="show_customer button button-primary" href="javascript:void(0)" role="button"><i class="fa fa-plus-circle" aria-hidden="true"></i> <?php esc_html_e('Add New Customer', 'wp_event_booking');?></a></div>
</div>
<div class="section group div_event_customer">
<div class="col span_1_of_2">
  <p><?php esc_html_e('New Customer', 'wp_event_booking');?></p>
  <?php
/* Signup fields are adding from admin/checkout.php */
    $sign_up_fields = apply_filters('wpeb_checkout_sign_up_fields', array());

    $output = $script_output = $script_output2 = '';
    foreach ($sign_up_fields as $SignupFN) {
        $req = $req_html = $field_option = $field_name = $field_mandatory = $field_title = $field_type = '';
        $field_option = esc_attr(get_option($SignupFN['field_option']));
        $field_mandatory = esc_attr(get_option($SignupFN['field_mandatory']));
        $field_name = esc_html($SignupFN['field_name']);
        $field_title = esc_html($SignupFN['field_title']);
        $field_type = esc_html($SignupFN['field_type']);
        if ($field_name == 'txt_attendant_e_mail_address') {
            if ($field_option == 'true') {
                if ($field_mandatory == 'true') {
                    //$req = 'required';
                    //$req_html = '<span class="req">*</span>';
                    $req = '';
                    $req_html = '';
                }
                $MF = '<p><label>' . $field_title . ' ' . $req_html . '</label><input alt="' . $field_title . '" type="' . $field_type . '" name="' . $field_name . '" class="' . $field_name . ' validate_signup_field txt_email" value="" ' . $req . '></p>';
                $output .= $MF;
                $script_output .= "var $field_name = $('." . $field_name . "').val();";
                $script_output2 .= "'" . $field_name . "': " . $field_name . ",";

            }
        } else {
            if ($field_option == 'true') {
                if ($field_mandatory == 'true') {
                    //$req = 'required';
                    //$req_html = '<span class="req">*</span>';
                    $req = '';
                    $req_html = '';
                }
                $MF = '<p><label>' . $field_title . ' ' . $req_html . '</label><input alt="' . $field_title . '" type="' . $field_type . '" name="' . $field_name . '" class="' . $field_name . ' validate_signup_field" value="" ' . $req . '></p>';
                $output .= $MF;
                $script_output .= "var $field_name = $('." . $field_name . "').val();";
                $script_output2 .= "'" . $field_name . "': " . $field_name . ",";
                //$script_output .= $MF;
            }
        }
    }
    echo $output;
    ?>

    <?php /* ?><input type="text" class="regular-text" name="txt_customer_description" id="txt_customer_description" placeholder="Enter description."> */?>

  <br /><br />
  <input type="button" class="button button-primary" id="btn_add_event_customer" name="btn_add_event_customer" value="<?php esc_html_e('Add new attendant now', 'wp_event_booking');?>">
  <input type="button" class="button button-primary" id="btn_cancel_event_customer" name="btn_cancel_event_customer" value="<?php esc_html_e('Cancel', 'wp_event_booking');?>">
</div>
<div class="col span_1_of_2"></div>
</div>
<?php do_action('wpeb_event_meta_box', $post);?>

<?php /* Bulk move starts here*/

    $booked_Cust_ID = $booked_events = array();
    // $args = array('posts_per_page' => -1, 'post_type' => 'event_booking', 'meta_key' => '_event_id', 'meta_value' => $post->ID);
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'event_booking', 
        'meta_query' => array(
			'relation' => 'AND',
            array(
                'key' => '_event_id',
                'value' => $post->ID,
                'compare' => '=',
            ),
            array(
			    'relation' => 'OR',
                array(
                    'key' => '_event_booking_status',
                    'value' => 'cancelled',
                    'compare' => '!=',
                ),
                array(
                    'key' => 'booking_status',
                    'compare' => 'NOT EXISTS',
                )
            ) 
        )
    );
    $myposts = get_posts($args);
    $booked_events = wp_list_pluck($myposts, 'ID');
    if (!empty($booked_events)) {
        foreach ($booked_events as $bE) {
            $booked_Cust_ID[] = get_post_meta($bE, '_customer_id', true);
        }
    }
    if (!empty($booked_Cust_ID)) {
        ?>
    <hr />
	<h4><?php esc_html_e('Signed up Customers', 'wp_event_booking');?></h4>

	<div class="section group cls_signed_up_customers">
	<div class="col span_1_of_2">
	<?php // WP_Query arguments
        echo '<h4>' . esc_html__('Customers', 'wp_event_booking') . '</h4>'; ?>
<div class="select_all_holder"><input type="checkbox" name="dummy_select_all_events" class="dummy_select_all_events"><?php esc_html_e('Select All', 'wp_event_booking');?></div>
	<?php
echo '<div class="customer_list_holder">';
        //echo '<select name="sel_event_customer_list[]" class="regular-text sel_event_customer_list" multiple="multiple">';

        $args = array('role' => 'customer', 'number' => -1);
        $args['include'] = $booked_Cust_ID;
        // The Query
        $user_query = new WP_User_Query($args);

        // The Loop
        if (!empty($user_query->get_results())) {
            foreach ($user_query->get_results() as $user) {
                $selected = '';
                //$selected = 'selected';
                 ?>
			 <p><input type="checkbox" name="chk_event_customer_list[]" class="chk_event_customer_list" value="<?php echo esc_html($user->ID); ?>" >
			 <?php echo esc_html($user->display_name); ?></p>
<?php }
        } else {
            // echo 'No users found.';
        }

        echo '</div>';?>
	</div>
	<div class="col span_1_of_2 cls_select_event">

	<?php // WP_Query arguments
        echo '<h4>' . esc_html__('Events', 'wp_event_booking') . '</h4>';
        $_event_id = $post->ID; //get_post_meta($post->ID, '_event_id', true);
        echo '<select name="sel_events_list" class="regular-text sel_events_list">';
        $meta_query[] = array(
            'key' => '_eventStartDate',
            'value' => gmdate('Y-m-d H:i:s', strtotime("now")),
            'compare' => '>',
            'type' => 'DATETIME',
        );
        $args = array(
            'post_type' => array('cpt_events'),
            'posts_per_page' => '-1',
            'order' => 'ASC',
            'orderby' => 'title',
            'post_status' => 'publish',
            'meta_query' => $meta_query,
        );
        /*if (!empty($_event_id)) {
        $args['post__in'] = array($_event_id);
         */

        // The Query
        $query = new WP_Query($args);

        // The Loop
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $selected = '';
                $dateFormat = get_datepicker_format('php_format', get_option('datepickerFormat'));
                $_EventStartDate = get_post_meta(get_the_ID(), '_eventStartDate', true);
                $start_date = gmdate($dateFormat, strtotime($_EventStartDate));
                $start_time = gmdate(get_option('timeFormat'), strtotime($_EventStartDate));
                $event_location_id = get_post_meta(get_the_ID(), '_event_location', true);
                $location_city = get_post_meta($event_location_id, 'location_city', true);
                if (get_the_ID() != $_event_id) { ?>
				<option value="<?php echo esc_html(get_the_ID()); ?>" ><?php the_title();?> - <?php echo esc_html($start_date) . ' ' . esc_html($start_time) . ' - ' . esc_html($location_city); ?></option>
				<?php }
            }
        } else {
            // no posts found
        }
        // Restore original Post Data
        wp_reset_postdata();
        echo '</select>';?>
	</div>
	</div>
	<?php echo '<p>' . esc_html__('Here you can move customers to another event. Select customers and select desired event, then update event.', 'wp_event_booking') . '</p>';} ?>
	<?php do_action('after_wpeb_event_meta_box', $post);?>
  <script type="text/javascript">
	/* creates customer from event meta field
    Call back function can find in includes/functions.php
    */
    jQuery(document).ready(function($) {
    	$('.dummy_select_all_events').on('click', function () {
		  $('.chk_event_customer_list').prop('checked', this.checked);
		});

    	var $select2 = $('.sel_events_list').select2({
                placeholder: "Please select event",
                allowClear: true,
            });
    	//$select2.data('select2').$container.addClass("cls_select_event")
        $('#btn_add_event_customer').on('click', function() {
            var error_status = false;
            var nonce = `<?php echo wp_create_nonce('create_event_customer_nonce'); ?>`;

            /*var txt_customer_first_name = $('#txt_customer_first_name').val();
            var txt_customer_last_name = $('#txt_customer_last_name').val();
            var txt_customer_phone = $('#txt_customer_phone').val();
            var txt_customer_email = $('#txt_customer_email').val();
            var txt_customer_description = $('#txt_customer_description').val();*/
            <?php echo $script_output; ?>
            if (!txt_attendant_first_name) {
                $('.txt_attendant_first_name').addClass('txt-error');
                error_status = true;
            }
            if (!txt_attendant_e_mail_address) {
                $('.txt_attendant_e_mail_address').addClass('txt-error');
                error_status = true;
            }
            if (txt_attendant_e_mail_address) {
                if (!validateEmail(txt_attendant_e_mail_address)) {
                    $('.txt_attendant_e_mail_address').addClass('txt-error');
                    error_status = true;
                }
            }

            if (error_status == false) {
                var data = {
                    'action': 'create_event_customer',
                    'nonce': nonce,
                    <?php echo $script_output2; ?>
                };

                // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
                jQuery.post(ajaxurl, data, function(response) {
                    var data = JSON.parse(response);
                    $(".sel_event_customers").append($('<option>', {
                        value: data.customer_id,
                        text: data.customer_name
                    }));
                    var customer_list = $(".sel_event_customers").val();
                    if (customer_list) {
                        customer_list.push(data.customer_id);
                    } else {
                        customer_list = data.customer_id;
                    }
                    $(".sel_event_customers").val(customer_list);
                    $(".div_event_customer input[type='text']").val('');
                    $(".div_event_customer #txt_customer_description").val('');
                    $(".div_event_customer").slideUp('slow');
                    $('.update_event_customers').trigger('click');
                });
            }
        });
    });
    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
    }
	</script>
<?php
/* Event manager Ends here */
}

/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function save_event_meta_box($post_id) {

    if(isset($_POST['original_publish'])) {

        $original_publish = strtolower(sanitize_text_field(wp_unslash($_POST['original_publish'])));
        if($original_publish == 'publish'){
            fnc_save_analytics_data($post_id, get_current_user_id(), 'event_publish');
        }
    }
    
    // Save logic goes here. Don't forget to include nonce checks!
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!isset($_POST['event_details_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['event_details_nonce'])), '_event_details_nonce')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (get_post_type($post_id) != 'cpt_events') {
        return;
    }

    // if multiple supplier addon is active
    if(function_exists('wpeb_ms_is_active')){

        if (isset($_POST['event_suppliers'])) {
            
            $event_suppliers = array_filter(wp_unslash($_POST['event_suppliers']), function($value) {
                return !empty($value) && sanitize_text_field($value);
            });
            update_post_meta($post_id, '_event_suppliers', implode(',', $event_suppliers));
        }else if(!get_post_meta($post_id, '_event_suppliers', true)){
            
            update_post_meta($post_id, '_event_suppliers', get_current_user_id());
        }

        if(function_exists('wpeb_ms_mail_template_instance')){
            $current_user = wp_get_current_user();
            // Check if the current user has the 'supplier' role
            if (in_array('supplier', $current_user->roles)) {

                $subject = esc_html__('New Event created by supplier.', 'wp_event_booking');
                $message = '
                    <div>
                        <p>'.esc_html__('Greetings!', 'wp_event_booking').'</p>
                        <p>'.esc_html__('New Event created by supplier.', 'wp_event_booking').'</p>
                        <h4 style="margin: 30px 0 10px;">'.esc_html__('Event', 'wp_event_booking').' : '.sanitize_text_field(wp_unslash($_POST["post_title"])).'</h4>
                        <table>
                            <tr>
                                <td>'.esc_html__('Event Start Date', 'wp_event_booking').'</td>
                                <td> : </td>
                                <td>'.sanitize_text_field(wp_unslash($_POST['txt_start_date'][0])).'</td>
                            </tr>
                            <tr>
                                <td>'.esc_html__('Event End Date', 'wp_event_booking').'</td>
                                <td> : </td>
                                <td>'.sanitize_text_field(wp_unslash($_POST['txt_end_date'][0])).'</td>
                            </tr>
                        </table>
                        <hr style="border-top: 1px solid #d9d9d9;"/>
                        <h4 style="margin: 30px 0 10px;">'.esc_html__('Event Supplier Details', 'wp_event_booking').'</h4>
                        <table>
                            <tr>
                                <td>'.esc_html__('Supplier Name', 'wp_event_booking').'</td>
                                <td> : </td>
                                <td>'. $current_user->display_name .'</td>
                            </tr>
                            <tr>
                                <td>'.esc_html__('Supplier Email', 'wp_event_booking').'</td>
                                <td> : </td>
                                <td>'. $current_user->user_email .'</td>
                            </tr>
                        </table>
                    </div>
                ';
        
                $headers[] = 'Content-Type: text/html; charset=UTF-8';
                $head = esc_html__('New Event', 'wp_event_booking');
                $foot = esc_html__('Thank You!', 'wp_event_booking');
        
                $ms_class = wpeb_ms_mail_template_instance();
                $mail__body = $ms_class->wpeb_ms_get_template($head, $message, $foot);
                $wpeb_ms_notification_reciever = esc_attr(get_option('wpeb_ms_notification_reciever'));
    
                if($wpeb_ms_notification_reciever){
    
                    $to = preg_replace('/\s+/','',$wpeb_ms_notification_reciever);
                    wp_mail($to, $subject, $mail__body, $headers);
                }
            }
        }
    }

    if (isset($_POST['event_region'])) {
        update_post_meta($post_id, '_event_location_region', sanitize_text_field(wp_unslash($_POST['event_region'])));
    }
    if (isset($_POST['event_location'])) {
        update_post_meta($post_id, '_event_location', sanitize_text_field(wp_unslash($_POST['event_location'])));
    }
    if (isset($_POST['event_manager'])) {
        update_post_meta($post_id, '_event_manager', sanitize_text_field(wp_unslash($_POST['event_manager'])));
    }
    if (isset($_POST['wpeb_multi_email_booking'])) {
        update_post_meta($post_id, 'wpeb_multi_email_booking', sanitize_text_field(wp_unslash($_POST['wpeb_multi_email_booking'])));
    } else {
        update_post_meta($post_id, 'wpeb_multi_email_booking', 0);
    }

    $_start_date = $_end_date = '';

    if (isset($_POST['txt_short_description'])) {
        update_post_meta($post_id, '_short_description', sanitize_textarea_field(wp_unslash($_POST['txt_short_description'])));
    }
    if (isset($_POST['txt_event_cost'])) {
        update_post_meta($post_id, '_event_cost', sanitize_text_field(wp_unslash($_POST['txt_event_cost'])));
    }
    if (isset($_POST['txt_available_spots'])) {
        update_post_meta($post_id, '_available_spots', sanitize_text_field(wp_unslash($_POST['txt_available_spots'])));
    }
    /* Invite user to event */

    if (get_post_type($post_id) == 'cpt_events') {
        if (!empty($_POST['event_customers'])) {
            $customers = array_map('sanitize_text_field', wp_unslash($_POST['event_customers']));
            $j = 0;
            foreach ($customers as $c) {

                $prev_booking_arg = array(
                    'post_type' => 'event_booking',
                    'meta_query' => array(
                        array(
                            'key' => '_customer_id',
                            'value' => $c,
                            'type' => 'NUMERIC',
                            'compare' => '=',
                        ),
                        array(
                            'key' => '_event_id',
                            'value' => $post_id,
                            'type' => 'NUMERIC',
                            'compare' => '=',
                        ),
                    ),
                );
                $prev_bookings = get_posts($prev_booking_arg);
                // check user already have booking
                if (empty($prev_bookings)) {
                    $bookinng_details = array(
                        'post_type' => 'event_booking',
                        'post_status' => 'publish',
                        'post_author' => get_current_user_id(),
                        'comment_status' => 'closed', // if you prefer
                        'ping_status' => 'closed', // if you prefer
                    );
                    $booking_id = wp_insert_post($bookinng_details);
                    if ($booking_id) {
                        // insert post meta
                        update_post_meta($booking_id, '_customer_id', $c);
                        update_post_meta($booking_id, '_event_id', $post_id);
                        $user_info = get_userdata($c);
                        // Update the booking info into the database
                        wp_update_post(array('ID' => $booking_id, 'post_title' => esc_html__('Booking #', 'wp_event_booking') . $booking_id . esc_html__(' - Event: ', 'wp_event_booking') . get_the_title($post_id) . esc_html__(' - Customer: ', 'wp_event_booking') . $user_info->display_name));

                        $customerList[$j]['user_id'] = $c;
                        $customerList[$j]['booking_id'] = $booking_id;
                        $j++;
                        callback_notification_email($post_id, $c, $booking_id, '', 'AdminAddCustomerCustomerNotificationSubject', 'AdminAddCustomerCustomerNotification');

                        //, $random_password

                        //add_filter('notification_to_email', 'fncFetchAdminEmail');
                        //callback_notification_email($post_id, $c, $booking_id, 'admin', 'signUpAdminNotificationSubject', 'signUpAdminNotification');
                        //remove_filter('notification_to_email', 'fncFetchAdminEmail');

                    }

                }
            }
            if (!empty($customerList)) {
                CustomNotificationEmailTemplateCallback($post_id, $customerList, 'AdminAddCustomerAdminNotificationSubject', 'AdminAddCustomerAdminNotification');
            }
        }
    }

}

add_action('save_post', 'save_event_meta_box', 20);
add_action('save_post', 'save_event_meta_box_event_date', 10);
function save_event_meta_box_event_date($post_id) {
    // Save logic goes here. Don't forget to include nonce checks!
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!isset($_POST['event_details_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['event_details_nonce'])), '_event_details_nonce')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (get_post_type($post_id) != 'cpt_events') {
        return;
    }

    $_start_date = $_end_date = '';
    if (sizeof($_POST['txt_start_date']) <= 1) {
        if (isset($_POST['txt_start_date'][0])) {
            $_start_date = sanitize_text_field(wp_unslash($_POST['txt_start_date'][0]));
        }
        if (isset($_POST['txt_end_date'][0])) {
            $_end_date = sanitize_text_field(wp_unslash($_POST['txt_end_date'][0]));
        }
        if (isset($_POST['chk_all_day_event'][0])) {
            update_post_meta($post_id, '_all_day_event', sanitize_text_field(wp_unslash($_POST['chk_all_day_event'][0])));
            if (isset($_POST['txt_start_time'][0])) {
                $_start_time = '00:00:00';
            }
            if (isset($_POST['txt_end_time'][0])) {
                $_end_time = '23:59:59';
            }
        } else {
            update_post_meta($post_id, '_all_day_event', '');
            if (isset($_POST['txt_start_time'][0])) {
                $_start_time = sanitize_text_field(wp_unslash($_POST['txt_start_time'][0]));
            }
            if (isset($_POST['txt_end_time'][0])) {
                $_end_time = sanitize_text_field(wp_unslash($_POST['txt_end_time'][0]));
            }
        }

        if (!empty($_start_date) && !empty($_end_date)) {
            $dateFormat = get_datepicker_format('php_format', get_option('datepickerFormat'));
            $tmpStartDate = DateTime::createFromFormat($dateFormat, $_start_date);
            $newStartDate = $tmpStartDate->format('Y-m-d');
            $tmpEndDate = DateTime::createFromFormat($dateFormat, $_end_date);
            $newEndtDate = $tmpEndDate->format('Y-m-d');

            $_EventStartDate = gmdate('Y-m-d H:i:s', strtotime($newStartDate . ' ' . $_start_time));
            $_EventEndDate = gmdate('Y-m-d H:i:s', strtotime($newEndtDate . ' ' . $_end_time));

            update_post_meta($post_id, '_eventStartDate', $_EventStartDate);
            update_post_meta($post_id, '_eventEndDate', $_EventEndDate);
            update_post_meta($post_id, '_eventStartDate_micro', strtotime($newStartDate . ' ' . $_start_time));
            update_post_meta($post_id, '_eventEndDate_micro', strtotime($newEndtDate . ' ' . $_end_time));

            if(function_exists('wpeb_re_add_event_started_since')) {
                wpeb_re_add_event_started_since($post_id, $_EventStartDate);
            }
        }
    }
}
add_action('save_post', 'event_meta_box_bulk_move');
function event_meta_box_bulk_move($post_id){
    // Save logic goes here. Don't forget to include nonce checks!
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!isset($_POST['event_details_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['event_details_nonce'])), '_event_details_nonce')) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (get_post_type($post_id) != 'cpt_events') {
        return;
    }
    if (isset($_POST['sel_events_list']) && $_POST['sel_events_list'] != $post_id) {
        $newEventID = sanitize_text_field(wp_unslash($_POST['sel_events_list']));
        if (!empty($_POST['chk_event_customer_list']) && sizeof($_POST['chk_event_customer_list']) > 0) {
            foreach ($_POST['chk_event_customer_list'] as $cust_id) {
                $eve_id = $post_id;

                $meta_query = array(
                    array(
                        'key' => '_event_id',
                        'value' => $eve_id,
                        'compare' => '=',
                        'type' => 'CHAR',
                    ),
                    array(
                        'key' => '_customer_id',
                        'value' => $cust_id,
                        'compare' => '=',
                        'type' => 'CHAR',
                    ),
                );
                // WP_Query arguments
                $args = array(
                    'post_type' => array('event_booking'),
                    'meta_query' => $meta_query,
                );

// The Query
                $query = new WP_Query($args);

// The Loop
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();

                        update_post_meta(get_the_ID(), '_event_id', $newEventID);
                        $user_info = get_userdata($cust_id);

                        wp_update_post(array('ID' => get_the_ID(), 'post_title' => esc_html__('Booking #', 'wp_event_booking') . get_the_ID() . esc_html__(' - Event: ', 'wp_event_booking') . get_the_title($newEventID) . esc_html__(' - Customer: ', 'wp_event_booking') . $user_info->display_name));

                        do_action('wpeb_after_bulk_move', $cust_id, $eve_id, $newEventID);
                        
                    }
                } else {
                    // no posts found
                }

// Restore original Post Data
                wp_reset_postdata();
            }
        }
    }
}
/*** Event Meta Box Ends here ***/