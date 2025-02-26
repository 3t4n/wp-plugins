<?php
/*
 Contact Form.
*/
function acfl_form_code() {
	$acfName = get_option('acf_name');
	$acfEmail = get_option('acf_email');
	$acfSubject = get_option('acf_subject');
	$acfMessage = get_option('acf_message');
	$acfSend = get_option('acf_send');
	
	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post" id="acfl-form">';
	echo '<div class="divided">';
	
	if (empty($acfName)) {
	   echo '<div class="acfl-field-name">' . 'Name';
	} else {
	   echo '<div class="acfl-field-name">' . $acfName;	
	}
	echo '<input type="text" id="acfl-name-form" name="acfl-name-form" value="' . ( isset( $_POST["acfl-name-form"] ) ? esc_attr( $_POST["acfl-name-form"] ) : '' ) . '" size="40" />' . '</div>';
	
	if (empty($acfEmail)) {
		echo '<div class="acfl-field-email">' .  'Email';
	} else {
		echo '<div class="acfl-field-email">' .  $acfEmail;
	}
	echo '<input type="email" id="acfl-email-form" name="acfl-email-form" value="' . ( isset( $_POST["acfl-email-form"] ) ? esc_attr( $_POST["acfl-email-form"] ) : '' ) . '" size="40" />' . '</div>';
	echo '</div>';
	
	if (empty($acfEmail)) {
	   echo '<div class="acfl-title-subject">' . 'Subject' . '</div>';
	} else {
       echo '<div class="acfl-title-subject">' . $acfSubject . '</div>';
	}
	echo '<div class="acfl-field-subject">' . '<input type="text" id="acfl-subject-form" name="acfl-subject-form" value="' . ( isset( $_POST["acfl-subject-form"] ) ? esc_attr( $_POST["acfl-subject-form"] ) : '' ) . '" size="40" />' . '</div>';
	
	if (empty($acfMessage)) {
       echo '<div class="acfl-field-title">' .  'Message' . '</div>';
	} else {
	   echo '<div class="acfl-field-title">' .  $acfMessage . '</div>';
	}
	echo '<textarea rows="5" cols="40" id="acfl-message-form" name="acfl-message-form">' . ( isset( $_POST["acfl-message-form"] ) ? esc_attr( $_POST["acfl-message-form"] ) : '' ) . '</textarea>';
	
	echo '<div id="acfl-hide-submit">' . '<p><input type="submit" name="acfl-submitted" id="acfl-submitted" value="' . $acfSend . '"></p>' . '</div>';
	echo '<input type="submit" name="acfl-submit-now" id="acfl-submit-now" style="display: none;" value="Send">';
	echo '</form>';
}

/*
 Sanitize and check similarity with custom posts.
*/

function acfl_similair() {
    if ( isset( $_POST['acfl-submitted'])) {
	
    $name    = sanitize_text_field( $_POST["acfl-name-form"] );
	$email   = sanitize_email( $_POST["acfl-email-form"] );
    $subject = sanitize_text_field( $_POST["acfl-subject-form"] );
    $message = esc_textarea( $_POST["acfl-message-form"] );
	
    $to = get_option( 'acf_admin_email' );
    $headers = "From: $name <$email>" . "\r\n";
    
	$answers_args = array(
		        'posts_per_page'   => -1,
                'orderby'=> 'date',
                'order'=> 'DESC',
                'post_type'=> 'answer',
                'post_status'=> 'publish',
                'suppress_filters' => true 
    );
	
    echo '<div id="acfl-similair-info">';
	echo '<h4>' . get_option('acf_similair_title') . '</h4>';
	echo '<p>' . get_option('acf_similair_desc') . '</p>';
	echo '</div>';
	
    $posts_answers_gallery = get_posts( $answers_args ); 
    foreach($posts_answers_gallery as $rows){
        $post_titles = $rows->post_title;
		$post_content = $rows->post_content;
		similar_text($post_titles, $message, $percent);
		if ($percent > 90) {
			echo '<div class="acfl-answers">' . '<div class="acfl-toggle">' . '<h4>' . $post_titles . '</h4>' . '<div class="acfl-toggle-info">' . '<p>' . $post_content . '</p>' . '</div>' . '</div>' . '</div>';
		} elseif ($percent > 75) {
			echo '<div class="acfl-answers">' . '<div class="acfl-toggle">' . '<h4>' . $post_titles . '</h4>' . '<div class="acfl-toggle-info">' . '<p>' . $post_content . '</p>' . '</div>' . '</div>' . '</div>';
		} elseif ($percent > 50) {
			echo '<div class="acfl-answers">' . '<div class="acfl-toggle">' . '<h4>' . $post_titles . '</h4>' . '<div class="acfl-toggle-info">' . '<p>' . $post_content . '</p>' . '</div>' . '</div>' . '</div>';
		}
		if ($percent > 50) {
		$shown_posts = 0;		
		$shown_posts++;	
		}
	}
	
	if ($shown_posts >= 1) {		
		wp_enqueue_style( 'acflHide' );
		
		echo '<div class="acfl-buttons">';
		echo '<input type="submit" name="acfl_submit" id="acfl_submit" value="' . get_option('acf_send_email') . '"/>';
        echo '<input type="button" name="acfl_go_back" onClick="window.location.href=window.location.href" id="acfl_go_back" value="' . get_option('acf_cancel') . '"/>';
		echo '</div>';
	} elseif ( wp_mail( $to, $subject, $message, $headers ) ) {
		echo '<div class="acfl-success">' . get_option( 'acf_success_message' ) . '</div>';
		} else {	
		echo '<div class="acfl-error">' . get_option( 'acf_error_message' ) . '</div>';
		}
	}
}

/*
 If no similair custom post found.. send email.
*/

function acfl_deliver_mail() {
	    if ( isset( $_POST['acfl-submit-now'])) {
				
        $name    = sanitize_text_field( $_POST["acfl-name-form"] );
	    $email   = sanitize_email( $_POST["acfl-email-form"] );
        $subject = sanitize_text_field( $_POST["acfl-subject-form"] );
        $message = esc_textarea( $_POST["acfl-message-form"] );	
		
		// get the blog administrator's email address
		$to = get_option( 'acf_admin_email' );
		$headers = "From: $name <$email>" . "\r\n";
		
		// If email has been process for sending, display a success message
		if ( wp_mail( $to, $subject, $message, $headers ) ) {
			echo '<div class="acfl-success">' . get_option( 'acf_success_message' ) . '</div>';
		} else {	
			echo '<div class="acfl-error">' . get_option( 'acf_error_message' ) . '</div>';
		}
        }
}
?>