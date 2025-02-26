<?php 

if (!defined('ABSPATH')) exit;

function awal_send_mail($email) {
    $user = get_user_by("email", $email);
    if (!is_a($user, WP_User::class)) {
        die("email not found");
    }

    $key = wp_generate_password(40, false);
    update_option("awal_key_$email", hash("sha256", $key));
    update_option("awal-admin-login-seconds-$email", time()); // update cooldown
    update_option("awal_time_for_$email", time()); // email link must expire after 30 mins

    $link = "<a href='" . admin_url('admin-ajax.php') . "?action=awal_mail_clicked&awal_key=$key&email=$email'>hier</a>";
    $content = str_replace("{{ link }}", $link, esc_html__( __("Click {{ link }} to edit your page, this link expires after 30 minutes.", "aw_admin-login"), "aw_admin-login"));
    $title = __("Aktivate your Wordpress site", "aw_admin-login");
    wp_mail($email, $title, $content, ['Content-type: text/html']);
}

function awal_may_mail() {
	// sends mail or echo's cooldown in secs
	// cooldown should be over 10 secs (anti brute force)

    $email = sanitize_email($_GET["destination"]);
	$secs = get_option("awal-admin-login-seconds-$email");
	$cooldown = get_option("awal-cooldown"); // from admin options page
	$cooldown = ($cooldown < 10) ? 10 : $cooldown;
	$passed = time() - $secs;

    if (!is_email($email)) {
    	die("not an email");
    }

	if (!$secs || $passed > $cooldown) {
		awal_send_mail($email);
	} else {
		echo($cooldown - $passed);
	}

	exit;
}

add_action('wp_ajax_awal_time', 'awal_may_mail');
add_action('wp_ajax_nopriv_awal_time', 'awal_may_mail');

function awal_mail_clicked() {
	$email = sanitize_email($_GET["email"]);
	$key = sanitize_text_field($_GET["awal_key"]); // awal_key is case sensitive

	if ( !is_email($email) ) {
		_e("<p>Invalid email.</p>", "aw_admin-login");
		return;
	}

	if (!$email || hash("sha256", $key) != get_option("awal_key_$email")) {
		return;
	}
	
	update_option("awal_is_link_verified_with_$email", hash("sha256", $key));

	if (time() - get_option("awal_time_for_$email") >= 1800) {
		_e("<p>Your link already expried, please request a new one</p>", "aw_admin-login");
		die();
	}

    $user = get_user_by("email", $email);

	if (get_option("awal_is_link_verified_with_$email") === hash("sha256", $key) && $user) {
		delete_option("awal_is_link_verified_with_$email");
		_e("<p>Your login was successful.</p>", "aw_admin-login");
		wp_set_auth_cookie($user->id);
        ?> <script>window.location.href = "/";</script> <?php
	} else {
		echo "<p>Error</p>";
	}

	die();
}

add_action('wp_ajax_awal_mail_clicked', 'awal_mail_clicked');
add_action('wp_ajax_nopriv_awal_mail_clicked', 'awal_mail_clicked');