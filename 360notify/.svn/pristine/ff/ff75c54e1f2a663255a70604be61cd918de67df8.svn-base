<?php
/* This file is forked from the original author Micro Ocean Technologies's MoceanAPI Order SMS Notification plugin on 7/1/2024 */

class Notify_Help_View implements Notify_Register_Interface {

	private $settings_api;

	function __construct() {
		$this->settings_api = new WeDevs_Settings_API;
	}

	public function register() {
        add_filter( 'notifysms_setting_section',     array($this, 'set_help_setting_section' ) );
		add_filter( 'notifysms_setting_fields',      array($this, 'set_help_setting_field' ) );
        add_action( 'notifysms_setting_fields_custom_html', array($this, 'display_help_page'), 10, 1);
	}

	public function set_help_setting_section( $sections ) {
		$sections[] = array(
            'id'               => 'notifysms_help_setting',
            'title'            => __( 'Help', '360notify' ),
            'submit_button'    => '',
		);

		return $sections;
	}

	/**
	 * Returns all the settings fields
	 *
	 * @return array settings fields
	 */
	public function set_help_setting_field( $setting_fields ) {
		return $setting_fields;
	}

    public function display_help_page($form_id) {
        if($form_id !== 'notifysms_help_setting') { return; }
    ?>
        <br>
<h4><?php esc_html_e('How to create an API key?', '360notify'); ?></h4>
<p><?php echo wp_kses(
    __('If you want to use the plugin for whatsapp notification, you need to create an API key. You can do this by creating an account <a href="https://app.360messenger.com"><strong>here</strong></a>. The account creation is 7days free.', '360notify'), 
    array(
        'a' => array(
            'href' => array(),
            'target' => array()
        ),
        'strong' => array()
    )
); ?></p>

<h4><?php esc_html_e('Have questions?', '360notify'); ?></h4>
<p><?php echo wp_kses(
    __('If you have any questions or feedbacks, you can send a message to our support team and we will get back to you as soon as possible at our <a href="https://app.360messenger.com" target="_blank">page</a>.', '360notify'), 
    array(
        'a' => array(
            'href' => array(),
            'target' => array()
        )
    )
); ?></p>
    <?php
    }


}

?>
