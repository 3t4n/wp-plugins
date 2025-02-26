<?php

/**
 * @package BP Delivery For Woocommerce
 */

namespace Bright_Delivery_for_Woocommerce\Pages;

use Bright_Delivery_for_Woocommerce\Api\HandlerCallback;
use Bright_Delivery_for_Woocommerce\Base\BaseController;
use Bright_Delivery_for_Woocommerce\Bootstrap;

class Settings extends BaseController
{

	const PREFIX          = 'bdfw';
	const SECTION_GENERAL = 'section_general';
	const SECTION_SINGLE  = 'section_single';
	const SECTION_ARCHIVE = 'section_archive';
	const DOCUMENTATION_SITE = 'https://brightplugins.com/docs';
	const ARGS_PREMIUN_VERSION = '?utm_source=freemium&utm_medium=settings_page&utm_campaign=upgrade_pro';
	const BRANDS_FOR_WOOCOMMERCE_PRO_LINK = 'https://brightplugins.com/product/bright-brands-for-woocommerce' . self::ARGS_PREMIUN_VERSION;
	/**
	 * @var mixed
	 */
	public $handler_callback = null;

	/**
	 * Initialize all the class configuration
	 */
	public function __construct()
	{

		parent::__construct();
		$this->handler_callback = new HandlerCallback();
		add_filter("plugin_action_links_" . BDFW_PLUGIN_BASE, [$this, 'add_settings_link']);
		add_filter("plugin_row_meta", [$this, 'plugin_meta_links'], 20, 2);
	}
	/**
	 * Add links to plugin's description in plugins table
	 *
	 * @param  array   $links Initial list of links.
	 * @param  string  $file  Basename of current plugin.
	 * @return array
	 */
	public function plugin_meta_links($links, $file)
	{
		if (BDFW_PLUGIN_BASE !== $file) {
			return $links;
		}
		$rate_cos     = '<a target="_blank" href="https://wordpress.org/plugins/bp-order-date-time-for-woocommerce/reviews/?filter=5"> Rate this plugin » </a>';
		$support_link = '<a title="Open a support request at BrightPlugins.com" target="_blank" href="https://brightplugins.com/support/">' . __('Support', 'wc-wdda-delivery-timeslots') . '</a>';

		$links[] = $rate_cos;
		$links[] = $support_link;

		return $links;
	}
	/**
	 * Settings link
	 *
	 * @since 0.8.0
	 *
	 * @return array
	 */
	public function add_settings_link($links)
	{
		$row_meta = array(
			'settings' => '<a href="' . get_admin_url(null, 'admin.php?page=wcbp-woodevelivery-setting') . '">' . __('Settings', 'wc-wdda-delivery-timeslots') . '</a>',
		);

		return array_merge($links, $row_meta);
	}
	/**
	 * Registers the "actions"
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function register()
	{

		$this->plugin_options();
	}

	/**
	 * It create the settings of the plugin
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function plugin_options()
	{

		// Set a unique slug-like ID
		$prefix  = Bootstrap::CODESTAR_ID;
		$version = Bootstrap::VERSION;

		$json      = file_get_contents(BV_BDFW_ASSETS_PATH . '/js/localizations.json');
		$json_data = json_decode($json, true);
		$arrLangs  = array();
		foreach ($json_data as $langs) {
			$arrLangs[$langs["code"]] = $langs["name"] . ' (' . $langs["nativeName"] . ')';
		}

		// Create options
		\CSF::createOptions($prefix, array(
			'menu_title'      => 'Order Delivery Settings',
			'menu_slug'       => 'wcbp-woodevelivery-setting',
			'framework_title' => 'Order Delivery & Pickup for WooCommerce <small>version-' . Bootstrap::VERSION . '</small>',
			'menu_type'       => 'submenu',
			'menu_parent'     => 'brightplugins',
			'nav'             => 'normal',
			'theme'           => 'dark',
			'show_bar_menu'   => false,
			'footer_text'     => '',
		));

		// Create a section
		\CSF::createSection($prefix, array(
			'title'  => 'General Settings',
			'icon'   => 'fas fa-cog',
			'fields' => array(
                array(
                    'title'    => false,
                    'type'     => 'callback',
                    'function' => [$this, 'generate_advertising'],
                ),

				array(
					'id'      => 'bpwd_calendar_locale',
					'type'    => 'select',
					'title'   => __('Calendar Locale', 'wc-wdda-delivery-timeslots'),

					'options' => $arrLangs,
					'default' => 'default',
				),
				array(
					'id'       => 'bpwd_dateformat',
					'type'     => 'select',
					'title'    => __('Date format', 'wc-wdda-delivery-timeslots'),
					'subtitle' => __('', 'wc-wdda-delivery-timeslots'),
					'options'  => array(
						"Y-m-d"  => __('Y-m-d (ex: 2022-11-25)', 'wc-wdda-delivery-timeslots'),
						"F j, Y" => __('F j, Y (ex: November 25, 2022)', 'wc-wdda-delivery-timeslots'),
						"j F, Y" => __('j F, Y (ex: 25 November, 2022)', 'wc-wdda-delivery-timeslots'),
						"m-d-Y"  => __('m-d-Y (ex: 11-25-2022)', 'wc-wdda-delivery-timeslots'),
						"m/d/Y"  => __('m/d/Y (ex: 11/25/2022)', 'wc-wdda-delivery-timeslots'),
						"d-m-Y"  => __('d-m-Y (ex: 25-11-2022)', 'wc-wdda-delivery-timeslots'),
						"d/m/Y"  => __('d/m/Y (ex: 25/11/2022)', 'wc-wdda-delivery-timeslots'),
						"d.m.Y"  => __('d.m.Y (ex: 25.11.2022)', 'wc-wdda-delivery-timeslots'),
					),
					'default'  => 'F j, Y',
				),

				/* array(
					'type'    => 'subheading',
					'content' => __( 'Getting Started', 'wc-wdda-delivery-timeslots' ),
				), */

				// Main articles
				array(
					'type'     => 'callback',
					'function' => [$this, 'generate_main_articles_on_general_tab'],
				),
			)
		));

		// Create a section
		\CSF::createSection($prefix, array(
			'title'  => 'Delivery Date Settings',
			'icon'   => 'fas fa-calendar-alt',
			'fields' => array(
				array(
					'id'      => 'bpwd_deliverydatefield',
					'default' => false,
					'type'    => 'switcher',
					'title'   => __('Delivery Date', 'wc-wdda-delivery-timeslots'),
					'desc'    => __('Turn on this option to enable the delivery date functionality', 'wc-wdda-delivery-timeslots'),

				),
				array(
					'id'      => 'bpwd_deliverydate_days',
					'type'    => 'checkbox',
					'title'   => __('Delivery Days', 'wc-wdda-delivery-timeslots'),
					'desc'    => __('The calendar displays available weekdays, please select the days on which you want to offer the delivery functionality', 'wc-wdda-delivery-timeslots') . '<br><br>' . __('NOTE: If nothing is selected, the default option is ALL.', 'wc-wdda-delivery-timeslots'),
					'options' => array(
						1 => __('Monday', 'wc-wdda-delivery-timeslots'),
						2 => __('Tuesday', 'wc-wdda-delivery-timeslots'),
						3 => __('Wednesday', 'wc-wdda-delivery-timeslots'),
						4 => __('Thursday', 'wc-wdda-delivery-timeslots'),
						5 => __('Friday', 'wc-wdda-delivery-timeslots'),
						6 => __('Saturday', 'wc-wdda-delivery-timeslots'),
						0 => __('Sunday', 'wc-wdda-delivery-timeslots'),
					),
					'default' => array(),
				),

			),
		));
		\CSF::createSection($prefix, array(
			'title'  => 'Delivery Time Settings',
			'icon'   => 'fas fa-clock',
			'fields' => array(
				array(
					'id'    => 'bpwd_deliverytime_field',
					'type'  => 'switcher',
					'title' => __('Delivery Time', 'wc-wdda-delivery-timeslots'),
					'label' => __('On/Off the option for delivery time.', 'wc-wdda-delivery-timeslots'),
				),

				array(
					'id'        => 'bpwd_deliverytime_beginend',
					'type'      => 'datetime',
					'title'     => __('Timeslot Begin - End', 'wc-wdda-delivery-timeslots'),
					'subtitle'  => '',
					'default'   => '',
					'settings'  => array(
						'noCalendar' => true,
						'enableTime' => true,
					),
					'from_to'   => true,
					'text_from' => __('Starts from', 'wc-wdda-delivery-timeslots'),
					'text_to'   => __('Ends at', 'wc-wdda-delivery-timeslots'),
				),

				array(
					'id'       => 'bpwd_deliverytime_slotduration',
					'type'     => 'number',
					'title'    => __('Timeslot duration', 'wc-wdda-delivery-timeslots'),
					'subtitle' => __('Each timeslot in minutes', 'wc-wdda-delivery-timeslots'),
					'default'  => 30,
				),
				array(
					'id'       => 'bpwd_deliverytime_timeformat',
					'type'     => 'radio',
					'title'    => __('Time Format', 'wc-wdda-delivery-timeslots'),
					'subtitle' => __('Time format displayed on checkout page', 'wc-wdda-delivery-timeslots'),
					'options'  => array(
						'12' => __('12 Hours (am/pm)', 'wc-wdda-delivery-timeslots'),
						'24' => __('24 Hours', 'wc-wdda-delivery-timeslots'),
					),
					'default'  => '12',
				),
			)
		));

		\CSF::createSection($prefix, array(
			'title'  => 'Pickup Date Settings',
			'icon'   => 'fas fa-calendar-alt',
			'fields' => array(
				array(
					'id'    => 'bpwd_pickupdatefield',
					'type'  => 'switcher',
					'title' => __('Pickup Date', 'wc-wdda-delivery-timeslots'),
					'desc'  => __('Turn on this option to enable the pickup date functionality', 'wc-wdda-delivery-timeslots'),

				),
				array(
					'id'      => 'bpwd_pickupdate_days',
					'type'    => 'checkbox',
					'title'   => __('Pickup Days', 'wc-wdda-delivery-timeslots'),
					'desc'    => __('The calendar displays available weekdays, please select the days on which you want to offer the pickup functionality', 'wc-wdda-delivery-timeslots') . '<br><br>' . __('NOTE: If nothing is selected, the default option is ALL.', 'wc-wdda-delivery-timeslots'),
					'options' => array(
						1 => __('Monday', 'wc-wdda-delivery-timeslots'),
						2 => __('Tuesday', 'wc-wdda-delivery-timeslots'),
						3 => __('Wednesday', 'wc-wdda-delivery-timeslots'),
						4 => __('Thursday', 'wc-wdda-delivery-timeslots'),
						5 => __('Friday', 'wc-wdda-delivery-timeslots'),
						6 => __('Saturday', 'wc-wdda-delivery-timeslots'),
						0 => __('Sunday', 'wc-wdda-delivery-timeslots'),
					),
					'default' => array(),
				),

				// A Subheading
				array(
					'type'    => 'subheading',
					'content' => __('Pickup locations field', 'wc-wdda-delivery-timeslots'),
					'dependency' => array('bpwd_pickupdatefield', '==', 'true'),
				),

				array(
					'id'       => 'pickup-locations-required',
					'type'     => 'switcher',
					'title'    => __('Pickup locations field required', 'wc-wdda-delivery-timeslots'),
					'desc'     => __('Turn on this option to make the pickup locations field a required field on checkout page', 'wc-wdda-delivery-timeslots'),
					'default'  => false,
					'dependency' => array('bpwd_pickupdatefield', '==', 'true'),
				),
				array(
					'id'       => 'pickup-locations-label',
					'type'     => 'text',
					'title'    => __('Pickup locations label', 'wc-wdda-delivery-timeslots'),
					'desc'     => __('Specify the text to be displayed as the label for the pickup locations field on checkout page.', 'wc-wdda-delivery-timeslots'),
					'default'  => 'Choose one of the locations to pickup',
					'dependency' => array('bpwd_pickupdatefield', '==', 'true'),
				),
				array(
					'id'     => 'pickup-locations',
					'type'   => 'group',
					'title'  => 'Pickup locations',
					'subtitle' => __('Add the available pickup locations', 'wc-wdda-delivery-timeslots'),
					'fields' => array(
						array(
							'id'    => 'location_name',
							'type'  => 'text',
							'title' => 'Location Name',
						),
						array(
							'id'    => 'location_address',
							'type'  => 'text',
							'title' => 'Location Address',
						),
					),
					'dependency' => array('bpwd_pickupdatefield', '==', 'true'),
				),

			),
		));
		\CSF::createSection($prefix, array(
			'title'  => __('Pickup Time Settings', 'wc-wdda-delivery-timeslots'),
			'icon'   => 'fas fa-clock',
			'fields' => array(
				array(
					'id'    => 'bpwd_pickuptime_field',
					'type'  => 'switcher',
					'title' => __('Pickup Time', 'wc-wdda-delivery-timeslots'),
					'label'  => __('On/Off the option for Pickup Time', 'wc-wdda-delivery-timeslots'),

				),

				array(
					'id'        => 'bpwd_pickuptime_beginend',
					'type'      => 'datetime',
					'title'     => __('Timeslot Begin - End'),
					'subtitle'  => '',
					'default'   => '',
					'settings'  => array(
						'noCalendar' => true,
						'enableTime' => true,
					),
					'from_to'   => true,
					'text_from' => __('Starts from', 'wc-wdda-delivery-timeslots'),
					'text_to'   => __('Ends at', 'wc-wdda-delivery-timeslots'),
				),

				array(
					'id'       => 'bpwd_pickuptime_slotduration',
					'type'     => 'number',
					'title'    => __('Timeslot Duration', 'wc-wdda-delivery-timeslots'),
					'subtitle' => __('Each timeslot in minutes', 'wc-wdda-delivery-timeslots'),
					'default'  => 30,
				),
				array(
					'id'       => 'bpwd_pickuptime_timeformat',
					'type'     => 'radio',
					'title'    => __('Time Format', 'wc-wdda-delivery-timeslots'),
					'subtitle' => __('Time format displayed on checkout page', 'wc-wdda-delivery-timeslots'),
					'options'  => array(
						'12' => __('12 Hours (am/pm)', 'wc-wdda-delivery-timeslots'),
						'24' => __('24 Hours'),
					),
					'default'  => '12',
				),
			)
		));
	}

	/**
	 * This function generates all main articles to understand how the plugin work
	 * 
	 * @since 0.3
	 * 
	 * @return void
	 */
	public function generate_main_articles_on_general_tab() {
		?>
			<div class="csf-title">
				<h4>Documentation</h4>
			</div>
			<div class="csf-fieldset">
				<ul class="csf-desc-text">
					<li>
						<i class="csf-tab-icon fas fa-feather"></i>
						<a target="_blank" href="<?php echo self::DOCUMENTATION_SITE . '/getting-started-order-delivery-pickup-plugin-free-version/'; ?>">
							Getting Started
						</a>
					</li>
					<li>
						<i class="csf-tab-icon fas fa-feather"></i>
						<a target="_blank" href="<?php echo self::DOCUMENTATION_SITE . '/how-to-enable-the-delivery-funcionality-free-version/'; ?>">
							How to enable the Delivery funcionality?
						</a>
					</li>
					<li>
						<i class="csf-tab-icon fas fa-feather"></i>
						<a href="<?php echo self::DOCUMENTATION_SITE . '/how-to-enable-the-pickup-funcionality-free-version/'; ?>">
							How to enable the Pickup functionality?
						</a>
					</li>
					<li>
						<i class="csf-tab-icon fas fa-feather"></i>
						<a href="<?php echo self::DOCUMENTATION_SITE . '/what-order-delivery-pickup-does-for-you-by-default-free-version/'; ?>">
							What Order Delivery & Pickup does for you by default?
						</a>
					</li>
				</ul>
			</div>
			<div class="clear"></div>
		<?php
	}

	/**
	 * 
	 */
	public function generate_advertising() {
		?>
		<div class=" csf-submessage csf-submessage-info">
			<p>🌟 Do you need to equip your Woo store with a tool that allows you to showcase the brands of the products you sell?
			</br>You can achieve this by using the <a target="_blank" href="<?php echo esc_url( self::BRANDS_FOR_WOOCOMMERCE_PRO_LINK ) ; ?>"><?php echo esc_html( 'Brands for WooCommerce' ); ?></a> plugin
		</div>
		<?php
	}

	/**
	 * Get values list
	 *
	 * @access public
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function get_values_list($key)
	{
	}
}
