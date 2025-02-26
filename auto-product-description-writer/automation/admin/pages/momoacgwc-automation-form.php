<?php
/**
 * Automation Form
 *
 * @author MoMo Themes
 * @package momoacgwc
 * @since v1.2.6
 */

$post_title      = $post_id ? get_the_title( $post_id ) : '';
$post_content    = $post_id
					?
					get_post_field( 'post_content', $post_id )
					:
					"Hi {{ customer_first_name }},

					Welcome to {{ store_name }}! We're thrilled to have you on board.

					Here’s what you can do next:
					🔹Browse our latest products: {{ store_url }}
					🔹Track your orders anytime: {{ cusomter_account_url }}
					🔹Get exclusive offers and updates!

					If you have any questions, feel free to reply to this email or contact us at {{ admin_email }}.

					Happy shopping!
					{{ store_name }} Team";
$momo_event      = $post_id ? get_post_meta( $post_id, 'event', true ) : '';
$momo_action     = $post_id ? get_post_meta( $post_id, 'event_action', true ) : '';
$to              = $post_id ? get_post_meta( $post_id, 'to', true ) : '';
$reply_to_name   = $post_id ? get_post_meta( $post_id, 'reply_to_name', true ) : '';
$reply_to_email  = $post_id ? get_post_meta( $post_id, 'reply_to_email', true ) : '';
$email_subject   = $post_id ? get_post_meta( $post_id, 'subject', true ) : '';
$email_heading   = $post_id ? get_post_meta( $post_id, 'heading', true ) : esc_html__( 'Welcome to {{ store_name }}!', 'momoacgwc' );
$email_preheader = $post_id ? get_post_meta( $post_id, 'preheader', true ) : esc_html__( 'Your shopping journey begins! Get ready for exclusive deals and updates.', 'momoacgwc' );
$reply_name      = $post_id ? get_post_meta( $post_id, 'reply_name', true ) : '';
$reply_email     = $post_id ? get_post_meta( $post_id, 'reply_email', true ) : '';

$editor_id       = 'content';
$editor_content  = isset( $post_content ) ? $post_content : '';
$editor_settings = array(
	'textarea_name' => 'content',
	'media_buttons' => true,
	'teeny'         => false,
	'quicktags'     => true,
	'wpautop'       => true,
);
global $momoacgwc;
$events  = $momoacgwc->autofn->get_all_events();
$actions = $momoacgwc->autofn->get_all_actions();
?>
<div class="momo-automation-container">
	<div class="momo-automation-row">
		<label class="regular"><?php esc_html_e( 'Title:', 'momoacgwc' ); ?></label>
		<input class="full-width" type="text" name="post_title" placeholder="Enter title..." class="required" value="<?php echo esc_attr( $post_title ); ?>">
	</div>
	<div class="momo-automation-row">
		<label class="regular"><?php esc_html_e( 'Event:', 'momoacgwc' ); ?></label>
		<select class="full-width" id="event" name="event">
			<?php foreach ( $events as $event => $label ) : ?>
				<option value="<?php echo esc_attr( $event ); ?>" <?php selected( $event, $momo_event, true ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<label class="regular"><?php esc_html_e( 'Action:', 'momoacgwc' ); ?></label>
	<div class="momo-automation-action-container">
		<div class="momo-automation-action-row">
			<table>
				<tr>
					<td><label for="action"><?php esc_html_e( 'Action:', 'momoacgwc' ); ?></label><span class="asterisk">*</span></td>
					<td>
						<select id="event_action" name="event_action" class="required">
							<?php foreach ( $actions as $action => $label ) : ?>
								<option value="<?php echo esc_attr( $action ); ?>" <?php selected( $action, $momo_action, true ); ?>><?php echo esc_html( $label ); ?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="to">To</label><span class="asterisk">*</span></td>
					<td><input type="text" id="to" name="to" placeholder="Eg. {{ customer_email }}, admin@example.org" class="required" value="<?php echo esc_attr( $to ); ?>"></td>
				</tr>
				<tr>
					<td><label for="reply_to"><?php esc_html_e( 'Reply To', 'momoacgwc' ); ?></label></td>
					<td>
						<div style="display: flex; gap: 10px;width: 100%;">
						<div><input type="text" id="reply_to_name" name="reply_to_name" placeholder="Name" value="<?php echo esc_attr( $reply_to_name ); ?>"></div>
						<div><input type="text" id="reply_to_email" name="reply_to_email" placeholder="Email" value="<?php echo esc_attr( $reply_to_email ); ?>"></div>
						</div>
					</td>
				</tr>
				<tr>
					<td><label for="subject"><?php esc_html_e( 'Email Subject', 'momoacgwc' ); ?></label></td>
					<td><input type="text" id="subject" name="subject" placeholder="Enter subject..." value="<?php echo esc_attr( $email_subject ); ?>"></td>
				</tr>
				<tr>
					<td><label for="heading"><?php esc_html_e( 'Email Heading', 'momoacgwc' ); ?></label></td>
					<td><input type="text" id="heading" name="heading" placeholder="Enter heading..." value="<?php echo esc_attr( $email_heading ); ?>"></td>
				</tr>
				<tr>
					<td><label for="preheader"><?php esc_html_e( 'Email Preheader', 'momoacgwc' ); ?></label></td>
					<td><input type="text" id="preheader" name="preheader" placeholder="Enter preheader..." value="<?php echo esc_attr( $email_preheader ); ?>"></td>
				</tr>
				<tr>
					<td style="vertical-align: top;"><label for="content">Email Content</label></td>
					<td>
						<!-- <textarea id="content" name="content" rows="5" placeholder="Enter email content..."></textarea> -->
						<?php wp_editor( $editor_content, $editor_id, $editor_settings ); ?>
					</td>
				</tr>
			</table>
		</div>
		
		<!-- Help/Info Section -->
		<div class="help-info">
			<code>{{customer_name}}</code>
			<code>{{customer_first_name}}</code>
			<code>{{customer_last_name}}</code>
			<code>{{customer_email}}</code>
			<code>{{customer_phone}}</code>
			<code>{{customer_address}}</code>
			<code>{{customer_city}}</code>
			<code>{{customer_state}}</code>
			<code>{{customer_country}}</code>
			<code>{{customer_zip}}</code>
			<code>{{cusomter_account_url}}</code>
			<code>{{admin_email}}</code>
			<code>{{store_name}}</code>
			<code>{{store_url}}</code>
			<code>{{site_url}}</code>
			<code>{{site_title}}</code>
			<code>{{site_description}}</code>
			<code>{{current_date}}</code>
			<code>{{current_time}}</code>
			<code>{{current_date_time}}</code>
		</div>
	</div>
	<div class="momo-automation-action-row">
		<input type="hidden" name="type" value="<?php echo esc_attr( $type ); ?>">
		<input type="hidden" name="workflow_id" value="<?php echo esc_attr( $post_id ); ?>">
		<?php if ( 'edit' === $type ) : ?>
			<button class="momo-be-btn momo-be-btn-trinary momo-automation-addedit-action" data-type="edit">Edit Action</button>
		<?php else : ?>
			<button class="momo-be-btn momo-be-btn-trinary momo-automation-addedit-action" data-type="add">Add Action</button>
		<?php endif; ?>
	</div>
</div>