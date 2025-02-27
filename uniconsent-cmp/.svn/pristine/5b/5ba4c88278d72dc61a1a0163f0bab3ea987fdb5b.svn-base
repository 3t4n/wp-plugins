<?php
/**
 * *
 *  * @link https://www.uniconsent.com/
 *  * @copyright Copyright (c) 2018 - 2022 Transfon Ltd.
 *  * @license https://www.uniconsent.com/wordpress/
 *
 */

use UNIC\UNIC_Values;

class UNIC_Admin_Pages {

	private $unic_license;
	private $unic_options;
	private $unic_values;
	private $unic_language;
	private $unic_company;
	private $unic_logo;
	private $unic_policy_url;
	private $unic_language_default = 'en';

	public function __construct() {

		$this->unic_values = new UNIC_Values();
		$this->unic_language = esc_attr( get_option( 'unic_language' ) );

		$this->unic_language = isset( $this->unic_language ) && ! empty( $this->unic_language )
			? $this->unic_language
			: $this->unic_language_default;

		add_action( 'admin_init', array( $this, 'unic_options_page_init' ) );
		add_action( 'admin_menu', array( $this, 'add_unic_admin_pages' ) );
		add_action( 'admin_notices', array( $this, 'unic_admin_notice_license' ) );

	}

	public function unic_admin_notice_license() {
		$unic_enable_iab = get_option( 'unic_enable_iab');
	}

	public function unic_options() { ?>

		<style>
		    #unic-left {
		    	width:670px;
		    	float: left;
		    }
		    #unic-right {
		    	position: absolute;
			    top: 120px;
			    right: 60px;
			    width: 292px;
			    text-align: right;
		    }
		    #unic-right .top {
		    	background: white;
		    	padding: 10px;
		    	text-align: center;
		    }
		    #unic-right .logo {
			    background: #555f80;
			    padding: 20px 10px;
			    text-align: center;
			    color: white;
		    }

		    #unic-right h3 {
		    	color: white;
		    }
		    #unic-right .button-primary {
		    	font-size: 20px;
		    }
		</style>

		<div class="wrap wrap-unic-options">
			<div class="admin-header">
				<div class="left"><h1><?php _e( 'UniConsent Options', 'unic-options' ); ?></h1></div>
                    
				<div class="clear"></div>
			</div>

			<?php settings_errors(); ?>

        <div id="unic-admin">

            <div id="unic-left">

        <form method="post" action="options.php">

				<?php settings_fields( 'unic-general-config' ); ?>
				<?php do_settings_sections( 'unic-general-config' ); ?>
				<?php $unic_license = esc_attr(get_option( 'unic_license')); ?>

				<table class="form-table options-form-table">

				<?php if(!($unic_license && (strpos($unic_license, 'key-') > -1 || strpos($unic_license, 'license-') > -1))): ?>

				<?php $unic_enable_gdpr = get_option( 'unic_enable_gdpr'); ?>
				<?php if(!$unic_enable_gdpr) {
					$unic_enable_gdpr = 'yes';
				} ?>
				<tr class="table-top-row" valign="top">
					<th scope="row">
						<?php _e( 'Enable EU GDPR Compliance', 'uniconsent' ); ?>
					</th>
					<td class="col-2">
						<select name="unic_enable_gdpr">
							<option value="no" <?php selected( $unic_enable_gdpr, 'no' ); ?>><?php _e( 'No', 'uniconsent' ); ?></option>
							<option value="yes" <?php selected( $unic_enable_gdpr, 'yes' ); ?>><?php _e( 'Yes', 'uniconsent' ); ?></option>
						</select>
					</td>
				</tr>

				<?php $unic_enable_ccpa = get_option( 'unic_enable_ccpa'); ?>
				<tr class="table-top-row" valign="top">
					<th scope="row">
						<?php _e( 'Enable U.S. CCPA Compliance', 'uniconsent' ); ?>
					</th>
					<td class="col-2">
						<select name="unic_enable_ccpa">
							<option value="no" <?php selected( $unic_enable_ccpa, 'no' ); ?>><?php _e( 'No', 'uniconsent' ); ?></option>
							<option value="yes" <?php selected( $unic_enable_ccpa, 'yes' ); ?>><?php _e( 'Yes', 'uniconsent' ); ?></option>
						</select>
					</td>
				</tr>

				<?php $unic_language = get_option( 'unic_language' ); ?>
					<tr class="table-top-row" valign="top">
						<th scope="row">
							<?php _e( 'Language', 'uniconsent' ); ?>
						</th>
						<td class="col-2">
							<select name="unic_language">
								<option value="EN" <?php selected( $unic_language, 'EN' ); ?>><?php _e( 'English', 'uniconsent' ); ?></option>
								<option value="FR" <?php selected( $unic_language, 'FR' ); ?>><?php _e( 'French', 'uniconsent' ); ?></option>
								<option value="DE" <?php selected( $unic_language, 'DE' ); ?>><?php _e( 'German', 'uniconsent' ); ?></option>
								<option value="ES" <?php selected( $unic_language, 'ES' ); ?>><?php _e( 'Spanish', 'uniconsent' ); ?></option>
								<option value="IT" <?php selected( $unic_language, 'IT' ); ?>><?php _e( 'Italian', 'uniconsent' ); ?></option>
								<option value="PT" <?php selected( $unic_language, 'PT' ); ?>><?php _e( 'Portuguese', 'uniconsent' ); ?></option>
								<option value="PL" <?php selected( $unic_language, 'PL' ); ?>><?php _e( 'Polish', 'uniconsent' ); ?></option>
								<option value="NL" <?php selected( $unic_language, 'NL' ); ?>><?php _e( 'Dutch', 'uniconsent' ); ?></option>
								<option value="SV" <?php selected( $unic_language, 'SV' ); ?>><?php _e( 'Swedish', 'uniconsent' ); ?></option>
								<option value="BG" <?php selected( $unic_language, 'BG' ); ?>><?php _e( 'Bulgarian', 'uniconsent' ); ?></option>
								<option value="CA" <?php selected( $unic_language, 'CA' ); ?>><?php _e( 'Catalan', 'uniconsent' ); ?></option>
								<option value="CS" <?php selected( $unic_language, 'CS' ); ?>><?php _e( 'Czech', 'uniconsent' ); ?></option>
								<option value="DA" <?php selected( $unic_language, 'DA' ); ?>><?php _e( 'Danish', 'uniconsent' ); ?></option>
								<option value="EL" <?php selected( $unic_language, 'EL' ); ?>><?php _e( 'Greek', 'uniconsent' ); ?></option>
								<option value="ET" <?php selected( $unic_language, 'ET' ); ?>><?php _e( 'Estonian', 'uniconsent' ); ?></option>
								<option value="FI" <?php selected( $unic_language, 'FI' ); ?>><?php _e( 'Finnish', 'uniconsent' ); ?></option>
								<option value="HU" <?php selected( $unic_language, 'HU' ); ?>><?php _e( 'Hungarian', 'uniconsent' ); ?></option>
								<option value="LT" <?php selected( $unic_language, 'LT' ); ?>><?php _e( 'Lithuanian', 'uniconsent' ); ?></option>
								<option value="LV" <?php selected( $unic_language, 'LV' ); ?>><?php _e( 'Latvian', 'uniconsent' ); ?></option>
								<option value="MT" <?php selected( $unic_language, 'MT' ); ?>><?php _e( 'Maltese', 'uniconsent' ); ?></option>
								<option value="NO" <?php selected( $unic_language, 'NO' ); ?>><?php _e( 'Norwegian', 'uniconsent' ); ?></option>
								<option value="RO" <?php selected( $unic_language, 'RO' ); ?>><?php _e( 'Romanian', 'uniconsent' ); ?></option>
								<option value="RU" <?php selected( $unic_language, 'RU' ); ?>><?php _e( 'Russian', 'uniconsent' ); ?></option>
								<option value="SK" <?php selected( $unic_language, 'SK' ); ?>><?php _e( 'Slovak', 'uniconsent' ); ?></option>
								<option value="SL" <?php selected( $unic_language, 'SL' ); ?>><?php _e( 'Slovenian', 'uniconsent' ); ?></option>
								<option value="ZH" <?php selected( $unic_language, 'ZH' ); ?>><?php _e( 'Chinese', 'uniconsent' ); ?></option>
								<option value="SR" <?php selected( $unic_language, 'SR' ); ?>><?php _e( 'Serbian', 'uniconsent' ); ?></option>
								<option value="JA" <?php selected( $unic_language, 'JA' ); ?>><?php _e( 'Japanese', 'uniconsent' ); ?></option>
								<option value="BS" <?php selected( $unic_language, 'BS' ); ?>><?php _e( 'Bosnian', 'uniconsent' ); ?></option>
								<option value="TR" <?php selected( $unic_language, 'TR' ); ?>><?php _e( 'Turkish', 'uniconsent' ); ?></option>
								<option value="CY" <?php selected( $unic_language, 'CY' ); ?>><?php _e( 'Welsh', 'uniconsent' ); ?></option>
								<option value="EU" <?php selected( $unic_language, 'EU' ); ?>><?php _e( 'Basque', 'uniconsent' ); ?></option>
								<option value="GL" <?php selected( $unic_language, 'GL' ); ?>><?php _e( 'Galician', 'uniconsent' ); ?></option>
								<option value="HE" <?php selected( $unic_language, 'HE' ); ?>><?php _e( 'Hebrew', 'uniconsent' ); ?></option>
								<option value="ID" <?php selected( $unic_language, 'ID' ); ?>><?php _e( 'Indonesian', 'uniconsent' ); ?></option>
								<option value="KO" <?php selected( $unic_language, 'KO' ); ?>><?php _e( 'Korean', 'uniconsent' ); ?></option>
								<option value="MK" <?php selected( $unic_language, 'MK' ); ?>><?php _e( 'Macedonian', 'uniconsent' ); ?></option>
								<option value="MS" <?php selected( $unic_language, 'MS' ); ?>><?php _e( 'Malay', 'uniconsent' ); ?></option>
								<option value="TL" <?php selected( $unic_language, 'TL' ); ?>><?php _e( 'Tagalog', 'uniconsent' ); ?></option>
								<option value="UK" <?php selected( $unic_language, 'UK' ); ?>><?php _e( 'Ukrainian', 'uniconsent' ); ?></option>
							</select>
						</td>
					</tr>

					<?php $unic_company = esc_attr(get_option( 'unic_company')); ?>

					<tr valign="top">
						<th scope="row">
							<?php _e( 'Website Name (Optional)', 'uniconsent' ); ?>
						</th>
						<td class="col-2">
							<input name="unic_company" type="text" value="<?php echo esc_attr(get_option( 'unic_company', $this->unic_company )); ?>">
						</td>
					</tr>

					<?php $unic_logo = esc_url(get_option( 'unic_logo')); ?>

					<tr valign="top">
						<th scope="row">
							<?php _e( 'Website LOGO URL (Optional)', 'uniconsent' ); ?>
						</th>
						<td class="col-2">
							<input name="unic_logo" type="text" value="<?php echo esc_url(get_option( 'unic_logo', $this->unic_logo )); ?>">
						</td>
					</tr>

					<?php $unic_policy_url = esc_url(get_option( 'unic_policy_url')); ?>
					
					<tr valign="top">
						<th scope="row">
							<?php _e( 'Policy URL (Optional)', 'uniconsent' ); ?>
						</th>
						<td class="col-2">
							<input name="unic_policy_url" type="text" value="<?php echo esc_url(get_option( 'unic_policy_url', $this->unic_policy_url )); ?>">
							<div class="desc">
								<strong><?php _e( 'Example:', 'uniconsent' ); ?></strong> <?php _e( 'https://www.example.com/policy', 'uniconsent' ); ?>
							</div>
						</td>
					</tr>

					<?php $unic_region = get_option( 'unic_region' ); ?>
					<tr class="table-top-row" valign="top">
						<th scope="row">
							<?php _e( 'Display GDPR CMP', 'uniconsent' ); ?>
						</th>
						<td class="col-2">
							<select name="unic_region">
								<option value="none" <?php selected( $unic_region, 'none' ); ?>><?php _e( 'None', 'uniconsent' ); ?></option>
								<option value="worldwide" <?php selected( $unic_region, 'worldwide' ); ?>><?php _e( 'Worldwide', 'uniconsent' ); ?></option>
								<option value="eu" <?php selected( $unic_region, 'eu' ); ?>><?php _e( 'EU (EEA) Countries', 'uniconsent' ); ?></option>
							</select>
							<div class="desc">
								<p>When select EU, only display CMP to the users in EU countries.</p>
							</div>
						</td>
					</tr>

					<?php $unic_type = get_option( 'unic_type' ); ?>
					<tr class="table-top-row" valign="top">
						<th scope="row">
							<?php _e( 'CMP Style', 'uniconsent' ); ?>
						</th>
						<td class="col-2">
							<select name="unic_type">
								<option value="bar" <?php selected( $unic_type, 'bar' ); ?>><?php _e( 'Banner', 'uniconsent' ); ?></option>
								<option value="popup" <?php selected( $unic_type, 'popup' ); ?>><?php _e( 'Popup Box', 'uniconsent' ); ?></option>
							</select>
						</td>
					</tr>

				<?php $unic_enable_iab = get_option( 'unic_enable_iab'); ?>
					<tr class="table-top-row" valign="top">
						<th scope="row">
							<?php _e( 'IAB TCF Compliance', 'uniconsent' ); ?>
						</th>
						<td class="col-2">
							<select name="unic_enable_iab">
								<option value="no" <?php selected( $unic_enable_iab, 'no' ); ?>><?php _e( 'No', 'uniconsent' ); ?></option>
								<option value="v2" <?php selected( $unic_enable_iab, 'v2' ); ?>><?php _e( 'IAB TCF 2.2', 'uniconsent' ); ?></option>
							</select>
						</td>
					</tr>

				<?php endif;?>

				<?php $unic_license = get_option( 'unic_license'); ?>

				<tr valign="top">
					<th scope="row">
						<?php _e( 'License key (Optional)', 'uniconsent' ); ?>
					</th>
					<td class="col-2">
						<input name="unic_license" type="text" value="<?php echo esc_attr(get_option( 'unic_license', $this->unic_license )); ?>">
						<div class="desc">
								<p><?php _e( '* Get your free license key at:', 'uniconsent' ); ?> <a target="_blank" href="https://www.uniconsent.com/?utm_source=wp_license">https://www.uniconsent.com/</a> to unlock more features.</p>
								<p>* The configurations are managed at <a target="_blank" href="https://www.uniconsent.com/?utm_source=wp_license">https://www.uniconsent.com/</a> once you have entered the license key: <b>license-xxxxxxxx</b>.</p>
							</div>
					</td>
				</tr>



				</table>

				<table class="form-table options-form-table">
					<tr>
						<td><?php submit_button(); ?></td>
					</tr>
				</table>

			</form>
            </div>

            <div id="unic-right">
            	<div class="top">
                    <a target="_blank" href="<?php _e( 'https://www.uniconsent.com', 'uniconsent' ); ?>" target="_blank">
                        <img src="<?php echo plugins_url( 'uniconsent-cmp/admin/images/unic-logo.png' ); ?>" style="width: 200px;" />
                    </a>
                </div>
                    
                <div class='logo'>
                	<div>
                        <h3>UniConsent for GDPR/CPRA Compliance</h3>
                        <ul>
                        	<li><strong>Certified EU IAB TCF 2.2 CMP</strong>
                        	<li><strong>Certified Canada IAB TCF CMP</strong>
                        	<li><strong>Certified Google CMP</strong>
                        	<li><strong>Google Consent Mode v2</strong>
                        	<li><strong>40+ Languages support</strong>
                        	<li><strong>GPP, TCF, USP Consent signals</strong>
                        	<li><strong>Fix errors in Google's report</strong>
                        	<li><strong>For GDPR, CCPA, LGPD, PDPA, CPRA, PIPL</strong>
                        	<li><strong>More popup UI choices and easy mode</strong>
                            <li><strong>Fully customisable multiple stages consent collection pop-ups, bars</strong>
                            <li><strong>Multiple languages support</strong>
                            <li><strong>Data analytics and inisght dashboard</strong>
                            <li><strong>One-tag Implementation</strong>
                            <li><strong>Use Custom Domain</strong>
                            <li><strong>Google GAM/Google Adsense/Google Adx/Amazon APS support</strong>
                            <li><strong>Prebid.js and Header bidding support</strong>
                            <li><strong>Cookie ePrivacy consent support</strong>
                            <li><strong>Website cookie discovery and disclose</strong>
                            <li><strong>Javascript and cookie blocking</strong>
                            <li><strong>Consent rate analytics and insight</strong>
                            <li><strong>24/7 Technical support</strong>
                            <li><strong>Service Level Agreement</strong>
                            <li><strong>Support: support@uniconsent.com</strong>
                        </ul>
                        <a class="button button-primary" href="https://app.uniconsent.com/app/register?utm_source=wp" target="_blank">Get Started</a>
                    </div>
                </div>
            </div>

        </div>

		</div>
		<?php

	}
 
	public function add_unic_admin_pages() {

		$unic_admin_page = add_menu_page(
			'UniConsent CMP',
			'UniConsent CMP',
			'administrator',
			'unic-options',
			array( $this, 'unic_options' )
		);

	}

	public function unic_options_page_init() {

		register_setting(
			'unic-general-config', // Option group
			'unic_license', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

		register_setting(
			'unic-general-config', // Option group
			'unic_language', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

		register_setting(
			'unic-general-config', // Option group
			'unic_type', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

		register_setting(
			'unic-general-config', // Option group
			'unic_region', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

		register_setting(
			'unic-general-config', // Option group
			'unic_company', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

		register_setting(
			'unic-general-config', // Option group
			'unic_logo', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

		register_setting(
			'unic-general-config', // Option group
			'unic_policy_url', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

		register_setting(
			'unic-general-config', // Option group
			'unic_enable_iab', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

		register_setting(
			'unic-general-config', // Option group
			'unic_enable_gdpr', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

		register_setting(
			'unic-general-config', // Option group
			'unic_enable_ccpa', // Option name
			array(
				'type' => 'string',
				'sanitize_callback' => array( $this, 'sanitize_text' )
			)
		);

	}

	public function sanitize_text( $input ) {

		$input = sanitize_text_field( $input );
		return $input;

	}

	public function sanitize_url( $input ) {

		$input = esc_url( $input );
		return $input;

	}
}
