<?php
class gdprGdprsup extends moduleGdprsup {
	private $_buttons = array();
	private $_gdprOptsCats = array();
	// Options that is using TimyMCE editor in admin area
	private $_richEditorNames = array('cookie_txt');
	private $_deside = array();
	
	public function __construct($d) {
		parent::__construct($d);
		$this->_initDeside();
		dispatcherGdprsup::addFilter('optionsDefine', array($this, 'addOptions'));
	}
	public function init() {
		dispatcherGdprsup::addFilter('mainAdminTabs', array($this, 'addAdminTab'));
		$mainCheckActionName = (defined('WP_USE_THEMES') && WP_USE_THEMES) ? 'template_redirect' : 'get_header';
		add_action($mainCheckActionName, array($this, 'checkGdprShow'));
		add_action('wp_head', array($this, 'printHeaderScripts'));
		add_action('wp_footer', array($this, 'printFooterScripts'));
	}
	public function addAdminTab($tabs) {
		$tabs['gdpr-settings'] = array(
			'label' => __('Settings', GDPRSUP_LANG_CODE), 'callback' => array($this, 'getSettingsTabContent'), 'fa_icon' => 'fa-gear', 'sort_order' => 30,
		);
		return $tabs;
	}
	public function getSettingsTabContent() {
		return $this->getView()->getSettingsTabContent();
	}
	public function addOptions($opts) {
		
		$opts['main'] = array(
			'label' => __('Main', GDPRSUP_LANG_CODE),
			'opts' => array(
				'enb_cookie_bar' => array('label' => __('Enable Cookie Notification', GDPRSUP_LANG_CODE), 'desc' => __('Show notification about GDPR and Cookie usage for Your site users. This actually allow you enable/disable main plugin functionalities.', GDPRSUP_LANG_CODE), 'def' => '1', 'html' => 'checkboxHiddenVal', 'type' => 'bool'),

				'enb_block_content' => array('label' => __('Enable Block Content', GDPRSUP_LANG_CODE), 'desc' => __('Use this option ONLY if you understand how it work! This will block 3rd part resources and remove all unapproved cookies if user rejected your GDPR Policy. Read more about this option <a href="https://supsystic.com/blog/gdpr-to-be-continued-or-how-to-fight-against-cookies/" target="_blank">here.</a>', GDPRSUP_LANG_CODE), 'def' => '0', 'html' => 'checkboxHiddenVal', 'type' => 'bool'),
				'enb_block_resources' => array('label' => __('Enable Block 3rd part Resources', GDPRSUP_LANG_CODE), 'desc' => __('Remove all links to external resources from your site if user did not agree wth your GDPR Policies (such as Google Analytics, Youtube, etc.)', GDPRSUP_LANG_CODE), 'def' => '1', 'html' => 'checkboxHiddenVal', 'type' => 'bool', 'connect' => 'enb_block_content:1'),
				'enb_block_cookie' => array('label' => __('Enable Block Cookies', GDPRSUP_LANG_CODE), 'desc' => __('Clear all Cookies for your visitors on your site domain if user did not agree wth your GDPR Policies', GDPRSUP_LANG_CODE), 'def' => '1', 'html' => 'checkboxHiddenVal', 'type' => 'bool', 'connect' => 'enb_block_content:1'),
				'enb_block_without_agree' => array('label' => __('Block also without Agree', GDPRSUP_LANG_CODE), 'desc' => __('By default this options will block GDPR disallowed content only if user Rejected your Policies. But - you can enable this one and all required content will be blocked until user will not Agree with your Policies.', GDPRSUP_LANG_CODE), 'def' => '0', 'html' => 'checkboxHiddenVal', 'type' => 'bool', 'connect' => 'enb_block_content:1'),
				
				'bar_delay_hide' => array('label' => __('Auto-Hide on Delay', GDPRSUP_LANG_CODE), 'desc' => __('Hide Cookie bar after time passed.', GDPRSUP_LANG_CODE), 'def' => '0', 'html' => 'checkboxHiddenVal', 'type' => 'bool'),
				'bar_delay_hide_time' => array('label' => __('Time before Hide (ms)', GDPRSUP_LANG_CODE), 'desc' => __('Time passed before hide in miliseconds.', GDPRSUP_LANG_CODE), 'def' => '1000', 'html' => 'text', 'connect' => 'bar_delay_hide:1', 'type' => 'int'),
				
				'enb_show_again_tab' => array('label' => __('Enable Show Again Tab', GDPRSUP_LANG_CODE), 'desc' => __('It will appear if user will close main Cookie Bar and allow to open it again.', GDPRSUP_LANG_CODE), 'def' => '1', 'html' => 'checkboxHiddenVal', 'type' => 'bool'),
				'show_again_tab_pos' => array('label' => __('Show Again Tab Position', GDPRSUP_LANG_CODE), 'desc' => __('Position of Show Again tab.', GDPRSUP_LANG_CODE), 'def' => 'right', 'html' => 'selectbox', 'connect' => 'enb_show_again_tab:1', 'options' => array(
					'left' => __('Left', GDPRSUP_LANG_CODE), 'right' => __('Right', GDPRSUP_LANG_CODE),
				)),
				'show_again_tab_txt' => array('label' => __('Show Again Text', GDPRSUP_LANG_CODE), 'desc' => __('Text that will be show on Show Again tab.', GDPRSUP_LANG_CODE), 'def' => __('Privacy Policy', GDPRSUP_LANG_CODE), 'html' => 'text', 'connect' => 'enb_show_again_tab:1'),
				
				'cookie_txt' => array('label' => __('Message to show to Users', GDPRSUP_LANG_CODE), 'desc' => __('This will appear in your Cookie Tab.', GDPRSUP_LANG_CODE), 'def' => 'This website uses cookies to improve your experience. We\'ll only use your data for purposes you consent to.', 'html' => 'wp_editor'),
			),
		);
		$opts['design'] = array(
			'label' => __('Design', GDPRSUP_LANG_CODE),
			'opts' => array(
				'show_as' => array('label' => __('Show As'), 'desc' => __('Possibility to show as notify Bar or PopUp Window on your site.', GDPRSUP_LANG_CODE), 'html' => 'radiobuttons', 'def' => 'bar', 'options' => array(
					'bar' => __('Bar', GDPRSUP_LANG_CODE), 'popup' => __('PopUp', GDPRSUP_LANG_CODE),
				)),
				
				'bar_pos' => array('label' => __('Cookie Notification Position', GDPRSUP_LANG_CODE), 'desc' => __('Position of your Cookie bar on Frontend.', GDPRSUP_LANG_CODE), 'def' => 'bottom', 'html' => 'selectbox', 'connect' => 'show_as:bar', 'options' => array(
					'top' => __('Top', GDPRSUP_LANG_CODE), 'bottom' => __('Bottom', GDPRSUP_LANG_CODE),
				)),
				
				'main_color' => array('label' => __('Background Color', GDPRSUP_LANG_CODE), 'desc' => __('Main color for Cookie Notification Background.', GDPRSUP_LANG_CODE), 'def' => '#fff', 'html' => 'colorpicker'),
				'text_color' => array('label' => __('Text Color', GDPRSUP_LANG_CODE), 'desc' => __('Text color.', GDPRSUP_LANG_CODE), 'def' => '#000', 'html' => 'colorpicker'),
				'enb_border' => array('label' => __('Enable Border', GDPRSUP_LANG_CODE), 'desc' => __('Borders around Cookie Bar.', GDPRSUP_LANG_CODE), 'def' => '1', 'html' => 'checkboxHiddenVal', 'type' => 'bool'),
				'border_color' => array('label' => __('Border Color', GDPRSUP_LANG_CODE), 'desc' => __('Borders color.', GDPRSUP_LANG_CODE), 'def' => '#444', 'html' => 'colorpicker', 'connect' => 'enb_border:1'),
				
				'animation' => array('label' => __('Appearance Animation', GDPRSUP_LANG_CODE), 'desc' => __('Setup animation for your Notification Bar or PopUp - it will look more pretty. But sure - you can leave here "None" to disable animation at all.', GDPRSUP_LANG_CODE), 'def' => 'slide', 'html' => 'selectbox','options' => array(
					'none' => __('None', GDPRSUP_LANG_CODE), 'slide' => __('Slide', GDPRSUP_LANG_CODE), 'fade' => __('Fade (In/Out)', GDPRSUP_LANG_CODE),
				)),
				'animation_duration' => array('label' => __('Border Color', GDPRSUP_LANG_CODE), 'desc' => __('Borders color.', GDPRSUP_LANG_CODE), 'def' => '#444', 'html' => 'colorpicker', 'connect' => 'enb_border:1'),
			),
		);
		$opts['btns'] = array(
			'label' => __('Buttons', GDPRSUP_LANG_CODE),
			'opts' => array(
				
			),
		);
		
		$this->getButtons();
		foreach($this->_buttons as $k => $b) {
			$connect = $k. '_enb:1';
			$opts['btns']['opts'][$k. '_enb'] = array('label' => $b['label'], 'desc' => $b['desc'], 'def' => $b['enb'] ? '1' : '0', 'html' => 'checkboxHiddenVal', 'type' => 'bool');
			$opts['btns']['opts'][$k. '_lbl'] = array('label' => sprintf(__('"%s" button label', GDPRSUP_LANG_CODE), $b['label']), 'desc' => __('You can change button name here.', GDPRSUP_LANG_CODE), 'def' => $b['label'], 'html' => 'text', 'connect' => $connect);
			$opts['btns']['opts'][$k. '_color_bg'] = array('label' => sprintf(__('"%s" button Color', GDPRSUP_LANG_CODE), $b['label']), 'desc' => __('Main (background) color for button.', GDPRSUP_LANG_CODE), 'def' => $b['bg_color'], 'html' => 'colorpicker', 'connect' => $connect);
			$opts['btns']['opts'][$k. '_color_txt'] = array('label' => sprintf(__('"%s" button Text Color', GDPRSUP_LANG_CODE), $b['label']), 'desc' => __('Text color.', GDPRSUP_LANG_CODE), 'def' => $b['txt_color'], 'html' => 'colorpicker', 'connect' => $connect);
			$opts['btns']['opts'][$k. '_lnk_style'] = array('label' => sprintf(__('Link Style for "%s"', GDPRSUP_LANG_CODE), $b['label']), 'desc' => __('If enabled - will be shown as link (not as button) on frontend.', GDPRSUP_LANG_CODE), 'def' => $b['lnk_style'] ? '1' : '0', 'html' => 'checkboxHiddenVal', 'connect' => $connect, 'type' => 'bool');
			$opts['btns']['opts'][$k. '_new_line'] = array('label' => __('New Line', GDPRSUP_LANG_CODE), 'desc' => __('Show button on it\'s own (separate) line.', GDPRSUP_LANG_CODE), 'def' => $b['new_line'] ? '1' : '0', 'html' => 'checkboxHiddenVal', 'connect' => $connect, 'type' => 'bool');
			if($k == 'terms') {
				$opts['btns']['opts'][$k. '_url'] = array('label' => __('Privacy Page URL', GDPRSUP_LANG_CODE), 'desc' => __('Create (if it was not done before) page with your Privacy Settings and paste URL - here.', GDPRSUP_LANG_CODE), 'def' => GDPRSUP_SITE_URL, 'html' => 'text', 'connect' => $connect);
				$opts['btns']['opts'][$k. '_blank'] = array('label' => __('Open in new Page (Tab)', GDPRSUP_LANG_CODE), 'desc' => __('If checked - Privacy URL will be opened on new page.', GDPRSUP_LANG_CODE), 'def' => '0', 'html' => 'checkboxHiddenVal', 'connect' => $connect, 'type' => 'bool');
			}
		}
		
		$this->_gdprOptsCats = array('main', 'design', 'btns');
		return $opts;
	}
	public function getButtons() {
		if(empty($this->_buttons)) {
			$this->_buttons = array(
				'accept_all' => array('label' => __('Accept', GDPRSUP_LANG_CODE), 'desc' => __('This will accept all Policies and allow all Cookies.', GDPRSUP_LANG_CODE), 'bg_color' => '#0085ba', 'txt_color' => '#fff', 'enb' => true, 'lnk_style' => false, 'new_line' => false),
				'save_decision' => array('label' => __('Save Decision', GDPRSUP_LANG_CODE), 'desc' => __('This will save selected cookies (if there was such) and close tab.', GDPRSUP_LANG_CODE), 'bg_color' => '#f7f7f7', 'txt_color' => '#555', 'enb' => true, 'lnk_style' => false, 'new_line' => false),
				'reject' => array('label' => __('Reject', GDPRSUP_LANG_CODE), 'desc' => __('This will reject all cookies.', GDPRSUP_LANG_CODE), 'bg_color' => '#f7f7f7', 'txt_color' => '#555', 'enb' => false, 'lnk_style' => false, 'new_line' => false),
				'terms' => array('label' => __('Learn more on Privacy Policy page.', GDPRSUP_LANG_CODE), 'desc' => __('This will open Privacy Policy page.', GDPRSUP_LANG_CODE), 'bg_color' => '#f7f7f7', 'txt_color' => '#555', 'enb' => true, 'lnk_style' => true, 'new_line' => true),
			);
		}
		return $this->_buttons;
	}
	public function checkGdprShow() {
		if(frameGdprsup::_()->getModule('options')->get('enb_cookie_bar')
			&& !$this->acceptedAll()
		) {
			$notify = array('opts' => array());
			foreach($this->_gdprOptsCats as $optCat) {
				$notify['opts'][ $optCat ] = frameGdprsup::_()->getModule('options')->getCatOpts($optCat, true);
			}
			$notify['agree'] = $this->getModel()->getNonGlobalAgreements();
			$notify['opts'] = outGdprsup::_($notify['opts']);
			$notify['rendered_html'] = $this->getView()->generateHtml( $notify );
			$this->getButtons();
			$notify['btns'] = array();
			foreach($this->_buttons as $bK => $b) {
				$notify['btns'][] = $bK;
			}
			frameGdprsup::_()->setMinify(GDPRSUP_MINIFY_ASSETS)->addScript('frontend.gdpr', $this->getModPath(). 'js/frontend.gdpr.js', array('jquery'));
			frameGdprsup::_()->addJSVar('frontend.gdpr', 'gdprsupNotifyData', $notify);
			frameGdprsup::_()->setMinify(GDPRSUP_MINIFY_ASSETS)->addStyle('frontend.gdpr', $this->getModPath(). 'css/frontend.gdpr.css');
		}
	}
	public function getRichEditorNames() {
		return $this->_richEditorNames;
	}
	private function _initDeside() {
		$saved = reqGdprsup::getVar('gdprsup_gdpr', 'cookie');
		if(!empty($saved)) {
			$this->_deside = $saved;
		}
	}
	public function acceptedAll() {
		if($this->_deside && $this->_deside['aa']) {
			return true;
		}
		return false;
	}
	public function printHeaderScripts() {
		$this->_printScripts('header');
	}
	public function printFooterScripts() {
		$this->_printScripts('footer');
	}
	private function _printScripts($from) {
		if($this->_deside 
			&& ($this->_deside['aa'] || !empty($this->_deside['a']))
		) {
			$agreements = $this->getModel()->getAgreements();
			if(!empty($agreements)) {
				$print = array();
				$assetKey = 'scripts_'. $from;
				foreach($agreements as $a) {
					if(isset($a['enb']) && $a['enb'] && isset($a[$assetKey]) && !empty($a[$assetKey])) {
						$a[$assetKey] = trim($a[$assetKey]);
						if(!empty($a[$assetKey])) {
							if($this->_deside['aa'] || (!$a['is_global'] && in_array(md5($a['label']), $this->_deside['a']))) {
								$print[] = $a[$assetKey];
							}
						}
					}
				}
				if(!empty($print)) {
					foreach($print as $p) {
						$p = outGdprsup::_js($p);
						if(strpos($p, '<script') === false) {
							$p = '<script>'. $p. '</script>';
						}
						echo $p;
					}
				}
			}
		}
	}
}

