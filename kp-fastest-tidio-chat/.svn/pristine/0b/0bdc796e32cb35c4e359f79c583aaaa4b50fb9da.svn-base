<?php

// If this file is called directly, abort.
if (! defined('WPINC')) {
    die;
}

function kpftc_script_inject_frontend()
{
	
	$kpftc_chat_enabled = get_option('kpftc_chat_enabled');
	$kpftc_chat_link = get_option('kpftc_chat_link');
	$kpftc_delay_time = get_option('kpftc_delay_time');
	$kpftc_excluded_pages = explode( ",", get_option('kpftc_excluded_pages'));
	$kpftc_admin_disabled = get_option('kpftc_admin_disabled');
	
	if( $kpftc_admin_disabled =="yes" AND is_user_logged_in() )
	{
		exit();
	}
	
	if ( $kpftc_chat_enabled == "yes" AND isset($kpftc_chat_link) AND !(is_page($kpftc_excluded_pages)) )
	{
	?>
<script>
	var kpftcScript = document.createElement("script");
	kpftcScript.src = "<?php echo $kpftc_chat_link; ?>";
	kpftcScript.async = true;
	setTimeout(function(){document.body.appendChild(kpftcScript);},<?php echo $kpftc_delay_time; ?>);
</script>
		<?php
	}
}
add_action( 'wp_print_footer_scripts', 'kpftc_script_inject_frontend');