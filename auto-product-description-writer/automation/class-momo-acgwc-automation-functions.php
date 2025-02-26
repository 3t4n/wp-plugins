<?php
/**
 * WooAI Automation Functions
 *
 * @package momoacgwc
 * @author MoMo Themes
 * @since v2.6.0
 */
class MoMo_ACGWC_Automation_Functions {
	/**
	 * Get all events
	 *
	 * @return array
	 */
	public function get_all_events() {
		$events = array(
			'new_user' => esc_html__( 'When a new user registers for first time', 'momoacgwc' ),
		);
		$events = apply_filters( 'momoacgwc_all_events', $events );
		return $events;
	}
	/**
	 * Get all events
	 *
	 * @return array
	 */
	public function get_all_actions() {
		$actions = array(
			'send_email' => esc_html__( 'Send Email', 'momoacgwc' ),
		);
		$actions = apply_filters( 'momoacgwc_all_actions', $actions );
		return $actions;
	}
	/**
	 * User Register
	 *
	 * @param int $user_id User ID.
	 * @return void
	 */
	public function momo_acgwc_workflow_event_user_register_process( $user_id ) {
		$args  = array(
			'post_type'      => 'momoacgwc_automation',
			'posts_per_page' => -1,
			'meta_query'     => array(
				'relation' => 'AND',
				array(
					'key'   => 'event',
					'value' => 'new_user',
				),
				array(
					'key'   => 'workflow_status',
					'value' => 'on',
				),
			),
		);
		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();

				$event_action = get_post_meta( get_the_ID(), 'event_action', true );

				switch ( $event_action ) {
					case 'send_email':
						$this->send_email_function( get_the_ID(), $user_id );
						break;
					default:
						break;
				}
			}
			wp_reset_postdata();
		} else {
			return 'No automations found for event: new_user.';
		}
	}
	/**
	 * Send Email
	 *
	 * @param int $automation_id Automation ID.
	 * @param int $user_id User ID.
	 * @return void
	 */
	public function send_email_function( $automation_id, $user_id ) {
		$subject     = get_post_meta( $automation_id, 'subject', true );
		$to          = get_post_meta( $automation_id, 'to', true );
		$heading     = get_post_meta( $automation_id, 'heading', true );
		$preheader   = get_post_meta( $automation_id, 'preheader', true );
		$content     = get_post_field( 'post_content', $automation_id );
		$preheader   = get_post_meta( $automation_id, 'preheader', true );
		$reply_name  = get_post_meta( $automation_id, 'reply_name', true );
		$reply_email = get_post_meta( $automation_id, 'reply_email', true );

		$subject     = $this->replace_email_contents( $subject, $user_id );
		$to          = $this->replace_email_contents( $to, $user_id );
		$heading     = $this->replace_email_contents( $heading, $user_id );
		$preheader   = $this->replace_email_contents( $preheader, $user_id );
		$content     = $this->replace_email_contents( $content, $user_id );
		$reply_name  = $this->replace_email_contents( $reply_name, $user_id );
		$reply_email = $this->replace_email_contents( $reply_email, $user_id );
		$subject     = apply_filters( 'momoacgwc_automation_email_subject', $subject, $automation_id, $user_id );
		$to          = apply_filters( 'momoacgwc_automation_email_to', $to, $automation_id, $user_id );
		$heading     = apply_filters( 'momoacgwc_automation_email_heading', $heading, $automation_id, $user_id );
		$preheader   = apply_filters( 'momoacgwc_automation_email_preheader', $preheader, $automation_id, $user_id );
		$content     = apply_filters( 'momoacgwc_automation_email_content', $content, $automation_id, $user_id );
		$reply_name  = apply_filters( 'momoacgwc_automation_email_reply_name', $reply_name, $automation_id, $user_id );
		$reply_email = apply_filters( 'momoacgwc_automation_email_reply_email', $reply_email, $automation_id, $user_id );

		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
		$headers .= 'From: ' . $reply_name . ' <' . $reply_email . ">\r\n";
		$headers .= 'Reply-To: ' . $reply_name . ' <' . $reply_email . ">\r\n";

		$content = '<div class="preheader">' . $preheader . '</div><div class="header">' . $header . '</div><div class="content">' . $content . '</div>';
		wp_mail( $to, $subject, $content, $headers );
	}
	/**
	 * Replace email contents
	 *
	 * @param string $content Content.
	 * @param int    $user_id User ID.
	 * @return void
	 */
	public function replace_email_contents( $content, $user_id ) {
		$user        = get_userdata( $user_id );
		$store_url   = wc_get_page_permalink( 'shop' );
		$store_name  = get_bloginfo( 'name' );
		$account_url = wc_get_page_permalink( 'myaccount' );

		$content = str_replace( '{{customer_name}}', $user->display_name, $content );
		$content = str_replace( '{{customer_first_name}}', $user->first_name, $content );
		$content = str_replace( '{{customer_last_name}}', $user->last_name, $content );
		$content = str_replace( '{{customer_email}}', $user->user_email, $content );
		$content = str_replace( '{{customer_phone}}', $user->phone, $content );
		$content = str_replace( '{{customer_address}}', $user->address, $content );
		$content = str_replace( '{{customer_city}}', $user->city, $content );
		$content = str_replace( '{{customer_state}}', $user->state, $content );
		$content = str_replace( '{{customer_country}}', $user->country, $content );
		$content = str_replace( '{{customer_zip}}', $user->zip, $content );
		$content = str_replace( '{{admin_email}}', get_option( 'admin_email' ), $content );
		$content = str_replace( '{{site_url}}', get_site_url(), $content );
		$content = str_replace( '{{site_title}}', get_bloginfo( 'name' ), $content );
		$content = str_replace( '{{site_description}}', get_bloginfo( 'description' ), $content );
		$content = str_replace( '{{store_name}}', $store_name, $content );
		$content = str_replace( '{{store_url}}', $store_url, $content );
		$content = str_replace( '{{cusomter_account_url}}', $account_url, $content );
		$content = str_replace( '{{current_date}}', gmdate( 'Y-m-d' ), $content );
		$content = str_replace( '{{current_time}}', gmdate( 'H:i:s' ), $content );
		$content = str_replace( '{{current_date_time}}', gmdate( 'Y-m-d H:i:s' ), $content );
		return $content;
	}
}
