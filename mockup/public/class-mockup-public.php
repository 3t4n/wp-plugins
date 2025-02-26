<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://mockupplugin.com
 * @since      1.0.0
 *
 * @package    MockUp
 * @subpackage MockUp/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    MockUp
 * @subpackage MockUp/public
 * @author     Eelco Tjallema <mail@estjallema.nl>
 */
class MockUp_Public {

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $version ) {

		$this->version = $version;
	}

	/**
	 * Add single page template
	 *
	 * @since    1.0.0
	 */
	public function template_single() {

		if( is_singular( MOCKUP_POSTTYPE ) ) {

			/**
			 * The class responsible for the single page
			 */
			require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-mockup-template-single.php';

			$single = new MockUp_Single( $this->version, MOCKUP_POSTTYPE, MOCKUP_TAXONOMY );

			// Get the single page
			require_once( 'partials/mockup-public-display-single.php' );

			exit();
		}
	}




	public function mockup_single_hide_intro() {

		// Expire time
		$expire_time = time() + 86400 * 30; // The cookie will expire in 30 days.

		// Filter time
		$filter_expire_time = apply_filters('mockup_intro_cookie_expire_time', $expire_time);

		if(is_numeric($filter_expire_time)) {
			$expire_time = $filter_expire_time;
		}

		// Creating cookies
		setcookie('mockup_intro', 'hide', $expire_time, '/', '', false, false);

		exit();
	}


	public function mockup_single_description() {

		$id = filter_input(INPUT_POST, 'post_id', FILTER_SANITIZE_NUMBER_INT);

		if(!empty($id)) {

			// Add do action
			do_action( 'mockup_before_single_description' );

			echo '<h1>' . get_option( 'mockup_description_title', __('MockUp description', 'MockUp') ) . '</h1>';
			echo '<p>' . nl2br( get_post_meta( $id, '_mockup_description_1', true ) ) . '</p>';

			// Add do action
			do_action( 'mockup_after_single_description' );
		}

		exit();
	}


	public function mockup_single_comment() {

		$id = filter_input( INPUT_POST, 'post_id', FILTER_SANITIZE_NUMBER_INT );
		
		// Add do action
		do_action( 'mockup_before_single_comment_form' );

		// Form
		echo '<h1>' . get_option( 'mockup_comment_title', __('Write a comment', 'MockUp') ) . '</h1>';

		echo '<form role="form">';

			wp_nonce_field( -1, 'mockupnonce_frontend' );

			echo '<input type="text" id="comment_name" class="field not-empty" placeholder="' . get_option( 'mockup_comment_name_label', __('Name', 'MockUp')) . '">';
			echo '<textarea id="comment_text" class="field not-empty" placeholder="' . get_option( 'mockup_comment_message_label', __('Comments', 'MockUp') ) . '"></textarea>';

			echo '<button type="submit" id="comment_submit" class="submit btn">' . get_option( 'mockup_send_btn', __('Send', 'MockUp') ) . '</button>';

		echo '</form>';

		// Add do action
		do_action('mockup_after_single_comment_form');

		// Comments
		$comments = get_post_meta($id, '_mockup_comments_1', false);
		$num = count($comments);
		$i = 0;

		if(!empty($comments)) {

			krsort($comments);

			foreach($comments as $comment) {

				$i++;
				if($i == '1') $class = ' first-comment';
				elseif($i == $num) $class = ' last-comment';
				else $class = '';

				echo '<div class="comment'.$class.'">';

					echo '<p><strong>'.$comment['name'].'</strong> ('.human_time_diff($comment['time']).' '.__('ago', 'MockUp').'):<br />';
					echo nl2br($comment['text']).'</p>';

				echo '</div>';

			}

		} else {

			echo '<div class="comment">';

				echo '<p>'.get_option( 'mockup_comment_no_comments', __('Here you can add your comments on this MockUp.', 'MockUp') ).'</p>';

			echo '</div>';
		}

		// Add do action
		do_action( 'mockup_after_single_comments' );

		exit();
	}


	public function mockup_process_comment() {

		// Allowed HTML Tags in comment.
		$allowed_html = array(
			'br' => array(),
			'em' => array(),
			'strong' => array(),
		);

		$id = filter_input(INPUT_POST, 'post_id', FILTER_SANITIZE_NUMBER_INT);
		$nonce = filter_input(INPUT_POST, 'mockupnonce_frontend', FILTER_UNSAFE_RAW);
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
		$text = wp_kses($_POST['text'], $allowed_html);

		if(!empty($id) && !empty($nonce) && !empty($name) && !empty($text) && wp_verify_nonce($nonce)) {

			// Add comment
			$comment = array('name' => $name, 'text' => $text, 'time' => time());

			add_post_meta($id, '_mockup_comments_1', $comment);


			// Email
			$email_settings = get_post_meta($id, '_mockup_email_settings_1', true );

			if($email_settings == 'email_always' || $email_settings == 'email_comments') {

				$to = get_post_meta($id, '_mockup_email_1', true);
				if( empty( $to ) ) $to = get_option('mockup_email');
				if( empty( $to ) ) $to = get_option('admin_email');

				$subject = sprintf(__('%s made comments on MockUp %s', 'MockUp'), $name, get_the_title($id));
				$subject = apply_filters('mockup_email_comment_subject', $subject);

				$message = $text;
				$message .= "\n\n";
				$message .= sprintf(__('Link: %s', 'MockUp'), get_permalink($id));

				wp_mail($to, $subject, $message);
			}

			// The output
			$this->mockup_single_comment();
		}

		exit();
	}


	public function mockup_single_approve() {

		$id = filter_input(INPUT_POST, 'post_id', FILTER_SANITIZE_NUMBER_INT);
		$status = get_post_meta($id, '_mockup_status_1', true);

		echo '<h1>' . get_option('mockup_approve_title', __('Approve this MockUp', 'MockUp') ) . '</h1>';

		if(isset($status['approved']) && $status['approved'] == true) {

			echo '<p>' . get_option( 'mockup_approved_text', __('You approved this MockUp', 'MockUp') ) . '</p>';
			exit();
		}

		echo '<p>' . nl2br( get_option( 'mockup_approve_text', __('Are you sure you want to approve this MockUp?', 'MockUp') ) ) . '</p>';

		// Add do action
		do_action( 'mockup_before_single_approve' );

		echo '<form role="form">';

			wp_nonce_field( -1, 'mockupnonce_frontend' );

			echo '<input type="text" id="approve_name" class="field not-empty" placeholder="'.get_option( 'mockup_comment_name_label', __('Name', 'MockUp') ).'">';

			echo '<button type="submit" id="approve_submit" class="submit btn">'.get_option( 'mockup_approve_btn', __('Approve', 'MockUp') ).'</button>';

		echo '</form>';

		// Add do action
		do_action('mockup_after_single_approve');

		exit();
	}


	public function mockup_process_approve() {

		$id = filter_input(INPUT_POST, 'post_id', FILTER_SANITIZE_NUMBER_INT);
		$nonce = filter_input(INPUT_POST, 'mockupnonce_frontend', FILTER_UNSAFE_RAW);
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

		if(!empty($id) && !empty($nonce) && wp_verify_nonce($nonce)) {

			$status = array('approved' => true, 'approved_name' => $name, 'approved_time' => time());

			update_post_meta($id, '_mockup_status_1', $status);

			// Email
			$email = get_post_meta($id, '_mockup_email_settings_1', true);

			if($email == 'email_always' || $email == 'email_approved') {

				$to = get_post_meta($id, '_mockup_email_1', true);
				if( empty( $to ) ) $to = get_option('mockup_email');
				if( empty( $to ) ) $to = get_option('admin_email');

				$subject = sprintf(__('Mockup %s is approved', 'MockUp'), get_the_title($id));
				$subject = apply_filters('mockup_email_approve_subject', $subject);

				$message = sprintf(__('Your MockUp %s has been approved by %s', 'MockUp'), get_the_title($id), $name);
				$message .= "\n\n";
				$message .= sprintf(__('Link: %s', 'MockUp'), get_permalink($id));

				wp_mail($to, $subject, $message);
			}

			echo '<h1>' . get_option( 'mockup_approve_title', __('Approve this MockUp', 'MockUp') ) . '</h1>';
			echo '<p>' . get_option( 'mockup_approved_text', __('You approved this MockUp', 'MockUp') ) . '</p>';
		}

		exit();
	}


	public function mockup_single_related() {

		$id = filter_input(INPUT_POST, 'post_id', FILTER_SANITIZE_NUMBER_INT);
		$terms = get_the_terms($id, MOCKUP_TAXONOMY);


		if($terms && !is_wp_error($terms)) {

			echo '<h1>' . get_option( 'mockup_related_title', __('Related MockUps', 'MockUp') ) . '</h1>';

			echo '<p>' . nl2br( get_option( 'mockup_related_text', __('All MockUps related to this one.', 'MockUp') ) ) . '</p>';

			$term_id_array = array();

			foreach($terms as $term) {

				$term_id_array[] = $term->term_id;
			}

			$args = array(
				'post_type'         => MOCKUP_POSTTYPE,
				'orderby'           => 'menu_order',
				'order'             => 'ASC',
				'posts_per_page'    => -1,
				'tax_query'         => array(
					array(
						'taxonomy'  => MOCKUP_TAXONOMY,
						'terms'     => $term_id_array
					)
				)
			);

			$query = new WP_Query($args);

			// Add do action
			do_action('mockup_before_related_list');

			// Begin list
			echo '<ul>';

			while($query->have_posts()) {

				$query->the_post();

				$tmp_id = get_the_ID();
				$mockup = get_post_meta($tmp_id, '_mockup_id_1', true);
				$status = get_post_meta($tmp_id, '_mockup_status_1', true);

				if(empty($mockup)) continue;

				if($tmp_id == $id && !empty($status['approved']) && $status['approved'] == true) {

					// Current and approved.
					echo '<li>'.get_the_title().'</li>';

				} elseif($tmp_id == $id && empty($status['approved'])) {

					// Current and not approved
					echo '<li>'.get_the_title().'</li>';

				} elseif($tmp_id != $id && !empty($status['approved']) && $status['approved'] == true) {

					// Approved
					echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';

				} else {

					// Not approved
					echo '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
				}
			}

			echo '</ul>';

			// Add do action
			do_action('mockup_after_related_list');
		}

		exit();
	}

}
