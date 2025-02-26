<?php

class EDD_YMLP_Admin
{
	public function __construct()
	{
		add_filter('edd_settings_extensions', array($this, 'add_settings'));
	}

	public function add_settings($settings)
	{	
		// get current settings
		$s = $this->get_settings();

		$settings[] = array(
			'id' => 'ymlp_settings',
			'name' => '<strong>' . __('YMLP Settings', 'edd_ymlp') . '</strong>',
			'desc' => __('Configure the YMLP settings', 'edd_ymlp'),
			'type' => 'header'
		);
		$settings[] = array(
			'id' => 'ymlp_api_key',
			'name' => __('YMLP API Key', 'edd_ymlp'),
			'desc' => __('Enter your YMLP API key, found by going to <strong>Configuration > Api</strong> in your YMLP panel.', 'edd_ymlp'),
			'type' => 'text',
			'size' => 'regular'
		);
		$settings[] = array(
			'id' => 'ymlp_username',
			'name' => __('YMLP Username', 'edd_ymlp'),
			'desc' => __('Enter your YMLP username.', 'edd_ymlp'),
			'type' => 'text',
			'size' => 'regular'
		);
		$settings[] = array(
			'id' => 'ymlp_label_text',
			'name' => __('Label Text', 'edd_ymlp'),
			'desc' => __('Text shown next to the checkbox', 'edd_ymlp'),
			'type' => 'text',
			'size' => 'regular'
		);
		$settings[] = array(
			'id' => 'ymlp_precheck',
			'name' => __('Pre-check the checkbox', 'edd_ymlp'),
			'desc' => 'Check this if you want the checkbox to be checked by default',
			'type' => 'checkbox',
			'size' => 'regular'
		);
		$settings[] = array(
			'id' => 'ymlp_load_css',
			'name' => __('Load some default CSS?', 'edd_ymlp'),
			'desc' => __('Check this if the checkbox appears in a weird place.', 'edd_ymlp'),
			'type' => 'checkbox',
			'size' => 'regular'
		);
		
		if(!empty($s['api_key']) && !empty($s['username'])) {
			$settings[] = array(
				'id' => 'ymlp_group',
				'name' => __('Group', 'edd_ymlp'),
				'desc' => 'Select group to which subscribers should be added.',
				'type' => 'select',
				'size' => 'regular',
				'options' => $this->get_group_options()
			);
		}
		
		return $settings;
	}

	public function get_settings()
	{
		return EDD_YMLP::instance()->get_settings();
	}

	public function get_group_options()
	{
		// first, try to get from transient
		$group_options = get_transient('edd_ymlp_groups');
		if($group_options) { return $group_options; }

		// transient failed, try to get from api
		$groups = EDD_YMLP::api()->get_groups();

		if($groups && is_array($groups)) {

			$group_options = array();

			foreach($groups as $g) {
				$group_options[$g->ID] = "{$g->GroupName} ({$g->NumberOfContacts})";
			}

			// store in transients
			set_transient('edd_ymlp_groups', $group_options, (24 * 3600)); // 1 day
			set_transient('edd_ymlp_groups_fallback', $group_options, (14 * 24 * 3600)); // 2 weeks
			return $group_options;
		}

		// api failed, get from older transient
		$group_options = get_transient('edd_ymlp_groups_fallback');
		if($group_options) { return $group_options; }

		// even the older transient failed, return the default group ID
		return array('1' => "Default group");
	}

}