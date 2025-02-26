<?php

class AnhlinhContactListAdmin
{
	private $_menuSlug = 'anhlinh-contact-list-setting';
	private $_setting_options;

	public function __construct()
	{
		$this->_setting_options = get_option('anhlinh_contact_list', []);
		add_action('admin_menu', [$this, 'settingMenu']);
		add_action('admin_init', [$this, 'register_setting_and_fields']);
	}

	public function register_setting_and_fields()
	{
		register_setting('anhlinh_contact_list_options', 'anhlinh_contact_list', [$this, 'validate_setting']);

		$mainSection = 'anhlinh_contact_list_main_section';
		add_settings_section(
			$mainSection,
			"Config list button",
			[$this, 'main_section_view'],
			$this->_menuSlug
		);

		add_settings_field(
			'anhlinh_contact_list_hotline',
			'Hotline',
			[$this, 'create_form'],
			$this->_menuSlug,
			$mainSection,
			array('name' => 'hotline')
		);
		add_settings_field(
			'anhlinh_contact_list_messenger',
			'Messenger Nickname',
			[$this, 'create_form'],
			$this->_menuSlug,
			$mainSection,
			array('name' => 'messenger')
		);
		add_settings_field(
			'anhlinh_contact_list_zalo',
			'Zalo',
			[$this, 'create_form'],
			$this->_menuSlug,
			$mainSection,
			array('name' => 'zalo')
		);
		add_settings_field(
			'anhlinh_contact_list_email',
			'E-mail',
			[$this, 'create_form'],
			$this->_menuSlug,
			$mainSection,
			array('name' => 'email')
		);
	}

	public function settingMenu()
	{
		add_menu_page('AnhLinh Contact List', 'AL Contact List', 'manage_options', $this->_menuSlug, [$this, 'settingPage']);
	}

	public function settingPage()
	{
		require_once ALCL_VIEWS_DIR . '/setting-page.php';
	}

	public function create_form($args)
	{
		if ($args['name'] == 'hotline') {
			echo '<input type="text" name="anhlinh_contact_list[anhlinh_contact_list_hotline]" placeholder="0942 xxx xxx" value="' . esc_html($this->_setting_options['anhlinh_contact_list_hotline']) . '"/>';
			echo '<p class="description">The phone number for custom click call to you. One phone number only! ex: 0942 xxx xxx</p>';
		}
		if ($args['name'] == 'messenger') {
			echo '<input type="text" name="anhlinh_contact_list[anhlinh_contact_list_messenger]" placeholder="ex: thanhansoft" value="' . esc_html($this->_setting_options['anhlinh_contact_list_messenger']) . '"/>';
			echo '<p class="description">The Nickname or ID account Facebook messenger</p>';
		}
		if ($args['name'] == 'zalo') {
			echo '<input type="text" name="anhlinh_contact_list[anhlinh_contact_list_zalo]" placeholder="0942xxxxxx" value="' . esc_html($this->_setting_options['anhlinh_contact_list_zalo']) . '"/>';
			echo '<p class="description">Zalo number ex: 0942xxxxxx</p>';
		}
		if ($args['name'] == 'email') {
			echo '<input type="email" name="anhlinh_contact_list[anhlinh_contact_list_email]" placeholder="your_email@gmail.com" value="' . esc_html($this->_setting_options['anhlinh_contact_list_email']) . '"/>';
			echo '<p class="description">Enter your e-mail address</p>';
		}
	}
	public function main_section_view()
	{
	}

	public function validate_setting($data_input)
	{
		$errors = [];

		if ($data_input['anhlinh_contact_list_zalo']) $data_input['anhlinh_contact_list_zalo'] = preg_replace('/[^0-9]/', '', $data_input['anhlinh_contact_list_zalo']);

		if (count($errors) > 0) {
			$data_input = $this->_setting_options;
			$strErrors = '';
			foreach ($errors as $key => $val) {
				$strErrors .= $val . '<br/>';
			}

			add_settings_error($this->_menuSlug, 'my-setting', $strErrors, 'error');
		} else {
			add_settings_error($this->_menuSlug, 'my-setting', 'Update successful', 'updated');
		}
		return $data_input;
	}
}
