<?php

class EDD_YMLP_Checkbox {
	
	public function __construct()
	{
		$s = $this->get_settings();

		add_action('edd_purchase_form_user_info', array($this, 'output_checkbox'));
		add_action('edd_checkout_before_gateway', array($this, 'subscribe'), 10, 3);

		if($s['load_css']) {
			add_action( 'wp_enqueue_scripts', array($this, 'load_css') );
		}
	}

	public function get_settings()
	{
		return EDD_YMLP::instance()->get_settings();
	}

	public function load_css()
	{
		$edd_settings_general = get_option('edd_settings_general');
		$checkout_page_ID = ($edd_settings_general && isset($edd_settings_general['purchase_page'])) ? $edd_settings_general['purchase_page'] : 0;

		// only load stylesheet on checkout page
		if(get_the_ID() == $checkout_page_ID) {
			wp_enqueue_style( 'edd-ymlp-checkbox-reset', plugins_url('edd-ymlp/assets/css/checkbox.css') );
		}
	}

	public function output_checkbox()
	{
		$s = $this->get_settings();
		$label = __($s['label_text']);
		
		?>
		<p id="edd-ymlp-checkbox-wrapper"><label for="edd-ymlp-checkbox"><input type="checkbox" name="edd-ymlp-subscribe" value="1" id="edd-ymlp-checkbox" <?php checked($s['precheck'], 1); ?> /><?php echo $label; ?></label></p>
		<?php
	}

	public function subscribe($data, $user_info, $valid_data)
	{
		if(!isset($_POST['edd-ymlp-subscribe']) || $_POST['edd-ymlp-subscribe'] != 1) { return; }
		
		$email = $user_info['email'];

		// validate email field
		if(!is_email($email)) { return false; }

		$s = $this->get_settings();
		$group_ID = $s['group'];

		return EDD_YMLP::api()->subscribe($email, $group_ID);
	}

}