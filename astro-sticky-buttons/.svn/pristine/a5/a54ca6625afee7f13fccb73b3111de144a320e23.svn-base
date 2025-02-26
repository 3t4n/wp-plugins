<?php
if( ! is_admin() ) {
	return;
}

function astro_sb_delete_options_prefixed( $prefix ) {
	global $wpdb;
	$like = $wpdb->esc_like( $prefix ) . '%';
	$wpdb->query( $wpdb->prepare( "DELETE FROM {$wpdb->options} WHERE option_name LIKE %s", $like ) );
}

// Get the plugin Text Domain
$plugin_text_domain = astro_sb_plugin_data('TextDomain');

$delete_options = false;
if ( isset($_GET['delete_options'])
    && ($_GET['delete_options'] == 1)
    && wp_verify_nonce( $_GET['nonce'], $plugin_text_domain ) ) {
        astro_sb_delete_options_prefixed( ASTRO_SB_PREFIX );
        $delete_options = esc_html__( 'All the plugin options have deleted.', 'astro-sticky-buttons' );
}

// Generate the delete link for plugin options
$delete_options_url = add_query_arg(
	[
		'page' => $plugin_text_domain,
		'tab' => 'support',
		'delete_options'   => 1,
		'nonce'  => wp_create_nonce( $plugin_text_domain ),
	], get_admin_url() . 'admin.php'
);

// Escape the main ASTRO_SB_PREFIX constant
$astro_sb_prefix = esc_attr(ASTRO_SB_PREFIX);

$tab = 'support';
$option_group = $astro_sb_prefix . $tab;

settings_fields($option_group);
do_settings_sections($option_group);
?>
<div class="<?php echo $astro_sb_prefix . 'wrapper'; ?> <?php echo esc_attr( $option_group ); ?>">

    <div class="section-wrapper">
        <div class="section-wrapper-inner">

            <h2 id="support" class="title"><?php esc_html_e('Support', 'astro-sticky-buttons' ); ?></h2>

            <h3 id="support-faqs" class="title"><?php esc_html_e( 'FAQs', 'astro-sticky-buttons' ); ?></h3>
            <p><span class="support-faq-question"><?php esc_html_e( 'Do you need support?', 'astro-sticky-buttons' ); ?></span><br>
                <span class="support-faq-answer"><?php esc_html_e( 'Request support at the ', 'astro-sticky-buttons' ); ?> <a href="https://wordpress.org/support/plugin/astro-sticky-buttons/" target="_blank"><?php esc_html_e( 'plugin support page', 'astro-sticky-buttons' ); ?></a> <?php esc_html_e( 'or write me an email to', 'astro-sticky-buttons' ); ?> <a href="mailto:info@astrothemes.com">info@astrothemes.com</a>.</span></p>

            <hr />

            <h3 id="support-data-reset" class="title"><?php esc_html_e( 'Plugin data reset', 'astro-sticky-buttons' ); ?></h3>
            <p><a class="button button-primary" href="<?php echo $delete_options_url; ?>"><?php esc_html_e( 'Remove all plugin settings', 'astro-sticky-buttons' ); ?></a></p>
            <p class="color-red"><?php echo esc_html($delete_options); ?></p>

        </div>
    </div>

</div>
