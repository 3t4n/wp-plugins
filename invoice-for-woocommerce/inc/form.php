<?php // Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<form method="post" action="options.php" accept-charset="UTF-8">
		<?php settings_fields( 'invoice-for-woocommerce' ); ?>
		<?php do_settings_sections( 'invoice-for-woocommerce' ); ?>
		<?php if( isset( $_GET[ 'tab' ] ) ) {
			$active_tab = $_GET[ 'tab' ];
		}
?>


		<h2 class="nav-tab-wrapper">

		
			<a href="?page=invoice-for-woocommerce-settings&tab=invoice_1" class="nav-tab <?php echo $active_tab == 'invoice_1' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Invoice 1', 'invoice-for-woocommerce' ); ?> <?php if( get_option( 'countries_flag' ) ) { ?>
				<img style="width:30px;" src="<?php echo plugin_dir_url(__FILE__).'flags/'.str_replace(" ", "_", get_option( 'countries_flag' )).".jpg"; ?>"><?php } ?>
			</a>

			<a href="?page=invoice-for-woocommerce-settings&tab=invoice_3" class="nav-tab <?php echo $active_tab == 'invoice_3' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Options', 'invoice-for-woocommerce' ); ?> 
			</a>
			
			<a href="?page=invoice-for-woocommerce-settings&tab=invoice_6" class="nav-tab <?php echo $active_tab == 'invoice_6' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Premium', 'invoice-for-woocommerce' ); ?> 
			</a>

			<a href="?page=invoice-for-woocommerce-settings&tab=invoice_7" class="nav-tab <?php echo $active_tab == 'invoice_7' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'How to Use', 'invoice-for-woocommerce' ); ?> 
			</a>
			
		</h2>
		<?php submit_button(); ?>
		<table <?php if( $active_tab != 'invoice_1' and isset( $_GET[ 'tab' ] ) ) { ?> style="display: none;"<?php }  ?> class="form-table">
		
			<tr valign="top">
				<th scope="row"><?php esc_html_e( 'Select Invoice Country Flag', 'invoice-for-woocommerce' ); ?></th>
				<td class="logo-inv">
					<?php
					global $ifw_countries_code;
					$ifw_countries_code = array (
						'AF' => 'Afghanistan',
						'AX' => 'Aland Islands',
						'AL' => 'Albania',
						'DZ' => 'Algeria',
						'AS' => 'American Samoa',
						'AD' => 'Andorra',
						'AO' => 'Angola',
						'AI' => 'Anguilla',
						'AQ' => 'Antarctica',
						'AG' => 'Antigua And Barbuda',
						'AR' => 'Argentina',
						'AM' => 'Armenia',
						'AW' => 'Aruba',
						'AU' => 'Australia',
						'AT' => 'Austria',
						'AZ' => 'Azerbaijan',
						'BS' => 'Bahamas',
						'BH' => 'Bahrain',
						'BD' => 'Bangladesh',
						'BB' => 'Barbados',
						'BY' => 'Belarus',
						'BE' => 'Belgium',
						'BZ' => 'Belize',
						'BJ' => 'Benin',
						'BM' => 'Bermuda',
						'BT' => 'Bhutan',
						'BO' => 'Bolivia',
						'BA' => 'Bosnia And Herzegovina',
						'BW' => 'Botswana',
						'BV' => 'Bouvet Island',
						'BR' => 'Brazil',
						'BN' => 'Brunei Darussalam',
						'BG' => 'Bulgaria',
						'BF' => 'Burkina Faso',
						'BI' => 'Burundi',
						'KH' => 'Cambodia',
						'CM' => 'Cameroon',
						'CA' => 'Canada',
						'CV' => 'Cape Verde',
						'KY' => 'Cayman Islands',
						'CF' => 'Central African Republic',
						'TD' => 'Chad',
						'CL' => 'Chile',
						'CN' => 'China',
						'CX' => 'Christmas Island',
						'CC' => 'Cook Islands',
						'CO' => 'Colombia',
						'KM' => 'Comoros',
						'CG' => 'Congo',
						'CK' => 'Cook Islands',
						'CR' => 'Costa Rica',
						'CI' => 'Cote DIvoire',
						'HR' => 'Croatia',
						'CU' => 'Cuba',
						'CY' => 'Cyprus',
						'CZ' => 'Czech Republic',
						'DK' => 'Denmark',
						'DJ' => 'Djibouti',
						'DM' => 'Dominica',
						'DO' => 'Dominican Republic',
						'EC' => 'Ecuador',
						'EG' => 'Egypt',
						'SV' => 'El Salvador',
						'GQ' => 'Equatorial Guinea',
						'ER' => 'Eritrea',
						'EE' => 'Estonia',
						'ET' => 'Ethiopia',
						'FK' => 'Falkland Islands (Malvinas)',
						'FO' => 'Faroe Islands',
						'FJ' => 'Fiji',
						'FI' => 'Finland',
						'FR' => 'France',
						'GF' => 'French Guiana',
						'PF' => 'French Polynesia',
						'TF' => 'French Southern Territories',
						'GA' => 'Gabon',
						'GM' => 'Gambia',
						'GE' => 'Georgia',
						'DE' => 'Germany',
						'GH' => 'Ghana',
						'GI' => 'Gibraltar',
						'GR' => 'Greece',
						'GL' => 'Greenland',
						'GD' => 'Grenada',
						'GP' => 'Guadeloupe',
						'GU' => 'Guam',
						'GT' => 'Guatemala',
						'GG' => 'Guernsey',
						'GN' => 'Guinea',
						'GW' => 'Guinea-Bissau',
						'GY' => 'Guyana',
						'HT' => 'Haiti',
						'HM' => 'Heard Island and Mcdonald Islands',
						'HN' => 'Honduras',
						'HK' => 'Hong Kong',
						'HU' => 'Hungary',
						'IS' => 'Iceland',
						'IN' => 'India',
						'ID' => 'Indonesia',
						'IR' => 'Iran',
						'IQ' => 'Iraq',
						'IE' => 'Ireland',
						'IM' => 'Isle Of Man',
						'IL' => 'Israel',
						'IT' => 'Italy',
						'JM' => 'Jamaica',
						'JP' => 'Japan',
						'JE' => 'Jersey',
						'JO' => 'Jordan',
						'KZ' => 'Kazakhstan',
						'KE' => 'Kenya',
						'KI' => 'Kiribati',
						'KR' => 'Korea',
						'KW' => 'Kuwait',
						'KG' => 'Kyrgyzstan',
						'LA' => 'Laos',
						'LV' => 'Latvia',
						'LB' => 'Lebanon',
						'LS' => 'Lesotho',
						'LR' => 'Liberia',
						'LY' => 'Libyan Arab Jamahiriya',
						'LI' => 'Liechtenstein',
						'LT' => 'Lithuania',
						'LU' => 'Luxembourg',
						'MO' => 'Macao',
						'MK' => 'Macedonia',
						'MG' => 'Madagascar',
						'MW' => 'Malawi',
						'MY' => 'Malaysia',
						'MV' => 'Maldives',
						'ML' => 'Mali',
						'MT' => 'Malta',
						'MH' => 'Marshall Islands',
						'MQ' => 'Martinique',
						'MR' => 'Mauritania',
						'MU' => 'Mauritius',
						'YT' => 'Mayotte',
						'MX' => 'Mexico',
						'FM' => 'Micronesia',
						'MD' => 'Moldova',
						'MC' => 'Monaco',
						'MN' => 'Mongolia',
						'ME' => 'Montenegro',
						'MS' => 'Montserrat',
						'MA' => 'Morocco',
						'MZ' => 'Mozambique',
						'MM' => 'Myanmar',
						'NA' => 'Namibia',
						'NR' => 'Nauru',
						'NP' => 'Nepal',
						'NL' => 'Netherlands',
						'NC' => 'New Caledonia',
						'NZ' => 'New Zealand',
						'NI' => 'Nicaragua',
						'NE' => 'Niger',
						'NG' => 'Nigeria',
						'NU' => 'Niue',
						'NF' => 'Norfolk Island',
						'MP' => 'Northern Mariana Islands',
						'NO' => 'Norway',
						'OM' => 'Oman',
						'PK' => 'Pakistan',
						'PW' => 'Palau',
						'PS' => 'Palestinian',
						'PA' => 'Panama',
						'PG' => 'Papua New Guinea',
						'PY' => 'Paraguay',
						'PE' => 'Peru',
						'PH' => 'Philippines',
						'PN' => 'Pitcairn',
						'PL' => 'Poland',
						'PT' => 'Portugal',
						'PR' => 'Puerto Rico',
						'QA' => 'Qatar',
						'RE' => 'Reunion',
						'RO' => 'Romania',
						'RU' => 'Russia',
						'RW' => 'Rwanda',
						'BL' => 'Saint Barthelemy',
						'SH' => 'Saint Helena',
						'KN' => 'Saint Kitts And Nevis',
						'LC' => 'Saint Lucia',
						'MF' => 'Saint Martin',
						'PM' => 'Saint Pierre And Miquelon',
						'VC' => 'Saint Vincent And Grenadines',
						'WS' => 'Samoa',
						'SM' => 'San Marino',
						'ST' => 'Sao Tome And Principe',
						'SA' => 'Saudi Arabia',
						'SN' => 'Senegal',
						'RS' => 'Serbia',
						'SC' => 'Seychelles',
						'SL' => 'Sierra Leone',
						'SG' => 'Singapore',
						'SK' => 'Slovakia',
						'SI' => 'Slovenia',
						'SB' => 'Solomon Islands',
						'SO' => 'Somalia',
						'ZA' => 'South Africa',
						'GS' => 'South Georgia And Sandwich Isl',
						'ES' => 'Spain',
						'LK' => 'Sri Lanka',
						'SD' => 'Sudan',
						'SR' => 'Suriname',
						'SJ' => 'Svalbard And Jan Mayen',
						'SZ' => 'Swaziland',
						'SE' => 'Sweden',
						'CH' => 'Switzerland',
						'SY' => 'Syrian',
						'TW' => 'Taiwan',
						'TJ' => 'Tajikistan',
						'TZ' => 'Tanzania',
						'TH' => 'Thailand',
						'TL' => 'Timor-Leste',
						'TG' => 'Togo',
						'TK' => 'Tokelau',
						'TO' => 'Tonga',
						'TT' => 'Trinidad And Tobago',
						'TN' => 'Tunisia',
						'TR' => 'Turkey',
						'TM' => 'Turkmenistan',
						'TC' => 'Turks And Caicos Islands',
						'TV' => 'Tuvalu',
						'UG' => 'Uganda',
						'UA' => 'Ukraine',
						'AE' => 'United Arab Emirates',
						'GB' => 'United Kingdom',
						'US' => 'United States',
						'UM' => 'United States Outlying Islands',
						'UY' => 'Uruguay',
						'UZ' => 'Uzbekistan',
						'VU' => 'Vanuatu',
						'VE' => 'Venezuela',
						'VN' => 'Vietnam',
						'VG' => 'Virgin Islands British',
						'VI' => 'Virgin Islands US',
						'WF' => 'Wallis And Futuna',
						'EH' => 'Western Sahara',
						'YE' => 'Yemen',
						'ZM' => 'Zambia',
						'ZW' => 'Zimbabwe',
					);
					function invoice_for_woocommerce_flag_code () {
						global $ifw_countries_code;
						foreach( $ifw_countries_code as $c_code => $value ) {
							if ( $value == get_option('countries_flag') ) {
								echo $c_code;
							}
						}
							
					}
					$select_flag = esc_html(get_option('countries_flag')); ?>
				    <a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_3.gif' , __FILE__  ); ?>"></a>
					<select name="countries_flag"  style="width:300px; display:inline;">
						<option value=""></option>
						<?php foreach( $ifw_countries_code as $c_code => $value ) { ?>
						<option value="<?php echo $value; ?>" <?php if ( $select_flag == $value) echo 'selected="selected"'; ?>><?php echo $value; ?></option>
						<?php }	?>
					</select>


				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Logo', 'invoice-for-woocommerce'); ?></th>
				<td class="logo-inv">
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_2.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="logo_invoice1" size="30" value="<?php echo esc_url_raw(get_option( 'logo_invoice1' )); ?>" />
						<a style="color: #fff; display: inline; box-shadow: none;" class="upload_image_button" data-id="1" href="#" title="Select image">
							<img src="<?php echo plugin_dir_url(__FILE__).'images/load.png' ?>" style="width:20px;height:20px;">
						</a>
						<a style="color: #fff; box-shadow: none;" class="remove_img" data-id="1" href="#" title="Remove image" <?php if(!get_option( 'logo_invoice1' )){ echo 'style="display:none;"'; } ?>>
							<img src="<?php echo plugin_dir_url(__FILE__).'images/remove.png' ?>" style="width:20px;height:20px;">
						</a>
				<p style="display: inline; margin-left: 20px;"><img id="preview_img1" style="max-width: 150px;" src="<?php echo esc_url(get_option( 'logo_invoice1' )); ?>" <?php if(!get_option( 'logo_invoice1' )){ echo 'style="display:none;"'; } ?>></p>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Invoice', 'invoice-for-woocommerce'); ?></th>
				<td>
				    <a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_4.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_1" value="<?php if( get_option( 'field_1' ) ) { echo esc_html( get_option( 'field_1' ) ); } else { update_option( 'field_1', 'Invoice' ); } ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Original', 'invoice-for-woocommerce'); ?></th>
				<td>
				    <a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_5.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_2" value="<?php if( get_option('field_2' ) ) { echo esc_html( get_option( 'field_2' ) ); } else { get_option( 'field_2', 'Original' ); } ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Invoice Number', 'invoice-for-woocommerce'); ?></th>
				<td>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_6.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_4" value="<?php if( get_option( 'field_4' ) ) { echo esc_html( get_option( 'field_4' ) ); } else { update_option( 'field_4', 'Invoice Number' ); } ?>" />
				</td>
			</tr>
			<?php global $woocommerce; global $post; global $order; $order = new WC_Order(get_the_ID()); ?>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Date', 'invoice-for-woocommerce'); ?></th>
				<td>
				    <a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_7.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_6" value="<?php if( get_option( 'field_6' ) ) { echo esc_html( get_option( 'field_6') ); } else { update_option( 'field_6', 'Date' ); } ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Maturity date', 'invoice-for-woocommerce'); ?></th>
				<td>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_8.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_7" value="<?php if( get_option( 'field_7' ) ) { echo esc_html( get_option('field_7' ) ); } else { update_option( 'field_7', 'Maturity date' ); } ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Customer', 'invoice-for-woocommerce'); ?></th>
				<td>
					 <a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_9.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_8" value="<?php if( get_option( 'field_8' ) ) { echo esc_html( get_option( 'field_8' ) ); } else { update_option( 'field_8', 'Customer' ); } ?>" />
				</td>
			</tr>
			<tr class="hide-eu" valign="top">
				<th scope="row"><?php esc_html_e('Customer VAT Number', 'invoice-for-woocommerce'); ?></th>
				<td>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_10.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_9" value="<?php if( get_option( 'field_9' ) ) { echo esc_html( get_option( 'field_9' ) ); } else { update_option( 'field_9', 'VAT Number' ); } ?>" /> 
				</td>
			</tr>
			<tr class="hide-eu" valign="top">
				<th scope="row"><?php esc_html_e('Customer ID Number', 'invoice-for-woocommerce'); ?></th>
				<td>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_11.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_10" value="<?php if( get_option( 'field_10' ) ) { echo esc_html( get_option( 'field_10','ID No' ) ); } else { update_option( 'field_10', 'ID Number', 'yes' ); } ?>" /> 
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Customer City', 'invoice-for-woocommerce'); ?></th>
				<td>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_12.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_11" value="<?php if( get_option( 'field_11' ) ) { echo esc_html( get_option( 'field_11' ) ); } else { update_option( 'field_11', 'City', 'yes' ); } ?>" /> 
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Customer Address', 'invoice-for-woocommerce'); ?></th>
				<td>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_13.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_12" value="<?php if( get_option( 'field_12' ) ) { echo esc_html( get_option( 'field_12' ) ); } else { update_option( 'field_12', 'Address', 'yes' ); } ?>" /> 
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Customer Accountable', 'invoice-for-woocommerce'); ?></th>
				<td>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_14.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_13" value="<?php if( get_option( 'field_13' ) ) { echo esc_html( get_option( 'field_13' ) ); } else { update_option( 'field_13', 'Accountable', 'yes' ); } ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Supplier Name', 'invoice-for-woocommerce'); ?></th>
				<td>
				    <a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_15.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_14" value="<?php if( get_option( 'field_14' ) ) { echo esc_html( get_option( 'field_14','Supplier' ) ); } else { update_option( 'field_14', 'Supplier', 'yes' ); } ?>" />
					<?php esc_html_e('Enter Company Name', 'invoice-for-woocommerce'); ?>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_16.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_49" value="<?php echo esc_html(get_option('field_49')); ?>" /> 
				</td>
			</tr>
			<tr class="hide-eu" valign="top">
				<th scope="row"><?php esc_html_e('Supplier VAT Number', 'invoice-for-woocommerce'); ?></th>
				<td>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_17.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_15" value="<?php if( get_option( 'field_15' ) ) { echo esc_html( get_option( 'field_15' ) ); } else { update_option( 'field_15', 'VAT Number', 'yes' ); } ?>" /> 
					<?php esc_html_e('Enter VAT Number', 'invoice-for-woocommerce'); ?>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_18.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_16" value="<?php echo esc_html(get_option('field_16')); ?>" /> 
				</td>
			</tr>
			<tr class="hide-eu" valign="top">
				<th scope="row"><?php esc_html_e('Supplier ID Number', 'invoice-for-woocommerce'); ?></th>
				<td>
					 <a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_19.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_17" value="<?php if( get_option( 'field_17' ) ) { echo esc_html( get_option( 'field_17' ) ); } else { update_option( 'field_17', 'ID Number', 'yes' ); } ?>" />
					<?php esc_html_e('Enter ID No', 'invoice-for-woocommerce'); ?>
					 <a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_20.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_18" value="<?php echo esc_html(get_option('field_18')); ?>" />
			</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Supplier City', 'invoice-for-woocommerce'); ?></th>
				<td>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_21.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_19" value="<?php if( get_option( 'field_19' ) ) { echo esc_html( get_option( 'field_19' ) ); } else { update_option( 'field_19', 'City', 'yes' ); } ?>" /> 
					<?php esc_html_e('Enter City', 'invoice-for-woocommerce'); ?>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_22.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_20" value="<?php echo esc_html(get_option('field_20')); ?>" /> 
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Supplier Address', 'invoice-for-woocommerce'); ?></th>
				<td>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_23.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_21" value="<?php if( get_option( 'field_21' ) ) { echo esc_html(get_option('field_21')); } else { update_option( 'field_21', 'Address', 'yes' ); } ?>" /> 
					<?php esc_html_e('Enter Address', 'invoice-for-woocommerce'); ?>
					 <a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_24.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_22" value="<?php echo esc_html(get_option('field_22')); ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Supplier Accountable', 'invoice-for-woocommerce'); ?></th>
				<td>
			     	<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_25.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_23" value="<?php if( get_option( 'field_23' ) ) { echo esc_html( get_option( 'field_23' ) ); } else { update_option( 'field_23', 'Accountable', 'yes' ); } ?>" /> 
					<?php esc_html_e('Enter Accountable', 'invoice-for-woocommerce'); ?>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_26.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_24" value="<?php echo esc_html(get_option('field_24')); ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Order Number', 'invoice-for-woocommerce'); ?></th>
				<td>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_27.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_26" value="<?php if( get_option( 'field_26' ) ) { echo esc_html( get_option( 'field_26' ) ); } else { update_option( 'field_26', 'Order Number', 'yes' ); } ?>" /> 
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Name of the good/service', 'invoice-for-woocommerce'); ?></th>
				<td>
					 <a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_28.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_28" value="<?php if( get_option( 'field_28' ) ) { echo esc_html( get_option( 'field_28' ) ); } else { update_option( 'field_28', 'Name of the good/service', 'yes' ); } ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Qty', 'invoice-for-woocommerce'); ?></th>
				<td>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_29.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_30" value="<?php if( get_option( 'field_30' ) ) { echo esc_html( get_option( 'field_30' ) ); } else { update_option( 'field_30', 'Qty', 'yes' ); } ?>" /> 
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Unit price', 'invoice-for-woocommerce'); ?></th>
				<td>
					 <a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_30.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_31" value="<?php if( get_option( 'field_31' ) ) { echo esc_html( get_option( 'field_31' ) ); } else { update_option( 'field_31', 'Unit price', 'yes' ); } ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Total amount', 'invoice-for-woocommerce'); ?></th>
				<td>
					 <a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_31.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_32" value="<?php if( get_option( 'field_32' ) ) { echo esc_html( get_option( 'field_32' ) ); } else { update_option( 'field_32', 'Total amount', 'yes' ); } ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Currency', 'invoice-for-woocommerce'); ?></th>
				<td>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_32.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_33" value="<?php if( get_option( 'field_33' ) ) { echo esc_html( get_option( 'field_33' ) ); } else { update_option( 'field_33', 'Currency', 'yes' ); } ?>" /> 
					<br />
					 <a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_33.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_52" value="<?php if( get_option( 'field_52' ) ) { echo esc_html( get_option( 'field_52' ) ); } else { update_option( 'field_52', '$', 'yes' ); } ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Tax base', 'invoice-for-woocommerce'); ?></th>
				<td>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_34.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_34" value="<?php if( get_option( 'field_34' ) ) { echo esc_html( get_option( 'field_34' ) ); } else { update_option( 'field_34', 'Tax base', 'yes' ); }?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('VAT', 'invoice-for-woocommerce'); ?></th>
				<td>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_35.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_35" value="<?php if( get_option( 'field_35' ) ) { echo esc_html( get_option( 'field_35' ) ); } else { update_option( 'field_35', 'VAT', 'yes' ); } ?>" /> 
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Payment amount', 'invoice-for-woocommerce'); ?></th>
				<td>
					 <a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_36.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_36" value="<?php if( get_option( 'field_36' ) ) { echo esc_html( get_option( 'field_36' ) ); } else { update_option( 'field_36', 'Payment amount', 'yes' ); } ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Payment method', 'invoice-for-woocommerce'); ?></th>
				<td>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_37.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_38" value="<?php if( get_option( 'field_38' ) ) { echo esc_html( get_option( 'field_38' ) ); } else { update_option( 'field_38', 'Payment method', 'yes' ); } ?>" /> 
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Date of tax event', 'invoice-for-woocommerce'); ?></th>
				<td>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_39.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_40" value="<?php if( get_option( 'field_40' ) ) { echo esc_html( get_option( 'field_40' ) ); } else { update_option( 'field_40', 'Date of tax event', 'yes' ); } ?>" /> 
				</td>
			</tr>
			<tr id="zero-eu" valign="top">
				<th scope="row"><?php esc_html_e('Grounds for zero rate if is EU company with VAT number', 'invoice-for-woocommerce'); ?></th>
				<td>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_40.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_41" value="<?php if( get_option( 'field_41' ) ) { echo esc_html( get_option( 'field_41' ) ); } else { update_option( 'field_41', 'Grounds for zero rate', 'yes' ); } ?>" /> 
					<?php esc_html_e('Enter Grounds', 'invoice-for-woocommerce'); ?>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_41.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_42" value="<?php echo esc_html(get_option('field_42')); ?>" /> 
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Description of the operation', 'invoice-for-woocommerce'); ?></th>
				<td>
				    <a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_42.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_43" value="<?php if( get_option( 'field_43' ) ) { echo esc_html( get_option( 'field_43' ) ); } else { update_option( 'field_43', 'Description of the operation', 'yes' ); } ?>" /> 
					<?php esc_html_e('Enter Description', 'invoice-for-woocommerce'); ?>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_43.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_44" value="<?php if ( get_option( 'field_44') ) { echo esc_html( get_option( 'field_44') ); } else { update_option( 'field_44', 'Sale of e-service', 'yes' );} ?>" /> 
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Place of sale', 'invoice-for-woocommerce'); ?></th>
				<td>
					 <a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_44.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_45" value="<?php if( get_option( 'field_45' ) ) { echo esc_html( get_option( 'field_45' ) ); } else { update_option( 'field_45', 'Place of sale', 'yes' ); }  ?>" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Receiver', 'invoice-for-woocommerce'); ?></th>
				<td>
					<a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_45.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_46" value="<?php if( get_option( 'field_46' ) ) { echo esc_html( get_option( 'field_46') ); } else { update_option( 'field_46', 'Receiver', 'Yes' ); } ?>" /> 
				</td>
			</tr>
			<tr valign="top">
				<th scope="row"><?php esc_html_e('Compiler', 'invoice-for-woocommerce'); ?></th>
				<td>
					 <a class="ifw-help">?<img  class="help-image" src="<?php echo plugins_url( '../inc/images/help_46.gif' , __FILE__  ); ?>"></a>
					<input type="text" name="field_47" value="<?php if( get_option( 'field_47' ) ) { echo esc_html( get_option( 'field_47' ) ); } else { update_option( 'field_47', 'Compiler', 'Yes' ); } ?>" />
				</td>
			</tr>

		</table>
		<table <?php if( $active_tab != 'invoice_2' ) { ?> style="display: none;"<?php } ?> class="form-table">
					<tr valign="top">
				<th scope="row">Premium Option</th>
		</table>
		<table <?php if( $active_tab != 'invoice_3' ) { ?> style="display: none;"<?php } ?> class="form-table">
		
			<tr valign="top">
				<?php $activate_all_VAT_fields = get_option( 'activate_all_VAT_fields' ); ?>		
				<th scope="row"><?php esc_html_e( 'Checkout Page - Activate VAT fields for European companies. ', 'invoice-for-woocommerce' ); ?></th>
				<td><input type="checkbox" name="activate_all_VAT_fields" value="1"<?php  checked( 1 == $activate_all_VAT_fields); ?> /></td>
			</tr>
			<tr valign="top">
				<?php $VAT_fields_title = get_option( 'VAT_fields_title'); ?>		
				<th scope="row"><?php esc_html_e( 'Checkout Page - VAT Field Title. ', 'invoice-for-woocommerce' ); ?></th>
				<td><input type="text" name="VAT_fields_title" value="<?php if( $VAT_fields_title  ) { echo esc_html( $VAT_fields_title ); } else { update_option('VAT_fields_title', 'VAT Number', "yes" ); } ?>"></td>
			</tr>
		</table>
		<table class="pro-ver" <?php if( $active_tab != 'invoice_6' ) { ?> style="display: none;"<?php } ?> class="form-table">
			<tr>
				<td style="border:none; font-size: 20px;">
				<b><?php esc_html_e('Support us by purchasing a premium version with more features.', 'invoice-for-woocommerce'); ?>
				<a target="_blank" href="https://seosthemes.com/shop?add-to-cart=33661"> <?php _e('Buy Now: €39.99', 'invoice-for-woocommerce'); ?></a>
				</b><br><br></th>
				
			</tr>
			<tr>
				<th><?php esc_html_e('Invoice for WooCommerce Plugin', 'invoice-for-woocommerce'); ?></th>
				<th><span><?php esc_html_e('Free Version', 'invoice-for-woocommerce'); ?> </span></th>
				<th><span><?php esc_html_e('Premium Version', 'invoice-for-woocommerce'); ?> </span></th>
			</tr>
			<tr>
				<td><?php esc_html_e('Generate and download invoices in two languages.', 'invoice-for-woocommerce'); ?></td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e('Exchange Rate for the second language', 'invoice-for-woocommerce'); ?></td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e('Invoice Footer Text', 'invoice-for-woocommerce'); ?></td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e('Activate Ivoice Field - Grounds for zero rate for European companies.', 'invoice-for-woocommerce'); ?></td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e('For EU companies and Digital Goods. If you’re selling digital products, Remove the tax when the user provide real VAT number.', 'invoice-for-woocommerce'); ?></td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e('The customer self-declare their address.', 'invoice-for-woocommerce'); ?></td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e('Show in the orders list. How many times the invoice was downloaded by the user.', 'invoice-for-woocommerce'); ?></td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e('Show products in the orders list.', 'invoice-for-woocommerce'); ?></td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e('Send E-mail.', 'invoice-for-woocommerce'); ?></td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e('Invoice QR Code.', 'invoice-for-woocommerce'); ?></td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e('Activate user download. The user can download the invoice from his account.', 'invoice-for-woocommerce'); ?></td>
				<td><span class="dashicons dashicons-no"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e('Checkout Page - Activate VAT', 'invoice-for-woocommerce'); ?></td>
				<td><span class="dashicons dashicons-yes"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e('VAT Field Title', 'invoice-for-woocommerce'); ?></td>
				<td><span class="dashicons dashicons-yes"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e('Automatically add billing fields', 'invoice-for-woocommerce'); ?></td>
				<td><span class="dashicons dashicons-yes"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td><?php _e('Attach invoice PDF buttons to the orders', 'invoice-for-woocommerce'); ?></td>
				<td><span class="dashicons dashicons-yes"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e('Create your own templates', 'invoice-for-woocommerce'); ?></td>
				<td><span class="dashicons dashicons-yes"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e('Download the PDF invoice', 'invoice-for-woocommerce'); ?></td>
				<td><span class="dashicons dashicons-yes"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e('Invoice VAT Numbers Field', 'invoice-for-woocommerce'); ?></td>
				<td><span class="dashicons dashicons-yes"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e('VIES VAT number validation', 'invoice-for-woocommerce'); ?></td>
				<td><span class="dashicons dashicons-yes"></span></td>
				<td><span class="dashicons dashicons-yes"></span></td>
			</tr>
			<tr>
				<td>
				<?php esc_html_e('Lifetime usage', 'invoice-for-woocommerce'); ?>
				<br><?php esc_html_e('One year access to all updates', 'invoice-for-woocommerce'); ?>
				<br><?php esc_html_e('Unlimited websites', 'invoice-for-woocommerce'); ?>
				</td>
				<td> </td>
				<td> <a class="pro-mores" target="_blank" href="https://seosthemes.com/shop?add-to-cart=33661"><span class="dashicons dashicons-cart"></span> <?php _e('Buy Now: €39.99', 'invoice-for-woocommerce'); ?></a>
</td>
			</tr>

		</table>
		<table class="pro-how" <?php if( $active_tab != 'invoice_7' ) { ?> style="display: none;"<?php } ?> class="form-table">
			<tr>
				<td>
				
				
				<iframe style="text-align: center; width: 800px; margin: 0 auto; display: block;" height="415" src="https://www.youtube.com/embed/yAuusCzD6P8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
					<div class="fac-ifw">
						<div class="row">
						  <div class="col">
							<h1><?php esc_html_e('FAQ', 'invoice-for-woocommerce'); ?></h1>
							<div class="tabs">
							
							  <div class="tab">
								<input type="checkbox" id="chck1">
								<label class="tab-label" for="chck1"><?php esc_html_e('How to add tax rates  by country', 'invoice-for-woocommerce'); ?></label>
								<div class="tab-content">
								    <p><b><?php esc_html_e('1) First go to Dashboard -> WooCommerce -> Settings and enable tax rates and calculations.', 'invoice-for-woocommerce'); ?></b></p>
								    <img src="<?php echo plugin_dir_url(__FILE__).'images/img1.jpg'; ?>">
								    <p>
								        <b><?php esc_html_e('2) Go to Dashboard -> WooCommerce -> Tax and add "Standard" tax rates. If you are from a European country. You can download the file below with all the rates of the European countries and then import it.', 'invoice-for-woocommerce'); ?></b>
								     	<b><?php esc_html_e('Notes, these are the tax rates only for EU countries. If you are not a EU country you cannot use them', 'invoice-for-woocommerce'); ?></b>
										<a href="<?php echo admin_url('admin.php?page=invoice-for-woocommerce-settings&tab=invoice_7&a=l'); ?>"><?php esc_html_e('Download all EU rates', 'invoice-for-woocommerce'); ?></a>
									 </p>
									 <?php
									// Download EU rates in CSV file
									if( isset( $_GET['a'] ) ) {
										if ( $_GET['a'] == "l" ) {
											ob_end_clean();
											header( 'Content-Type: application/csv' );
											header( "Content-Disposition:attachment;filename=tax_rates_eu.csv" );
											$seos__filepath_1s =  trailingslashit( plugin_dir_path( __FILE__ ) ).'tax_rates_eu.csv';
											$csv_GET = file_get_contents( $seos__filepath_1s );
											echo( $csv_GET );
											ob_flush();
											exit;
										}
									}
									?>
								    <img src="<?php echo plugin_dir_url(__FILE__).'images/img2.jpg'; ?>">
									<p><b><?php esc_html_e('3) How it looks.', 'invoice-for-woocommerce'); ?></b></p>
									<img src="<?php echo plugin_dir_url(__FILE__).'images/img3.jpg'; ?>">
								  
								</div>
							  </div>
							  
							  <div class="tab">
								<input type="checkbox" id="chck2">
								<label class="tab-label" for="chck2"><?php esc_html_e('How to generate invoice.', 'invoice-for-woocommerce'); ?></label>
								<div class="tab-content">
								<p>
									<b>
									<?php esc_html_e('1) Invoices can only be generated for completed orders. Go to the order. Enter an invoice number and save the change. Then generate the invoice. Make sure you set all the fields correctly in your plugin options.', 'invoice-for-woocommerce'); ?>
									</b>
									<img src="<?php echo plugin_dir_url(__FILE__).'images/img4.jpg'; ?>">
								</p>

								</div>
							  </div>
							  
							  <div class="tab">
								<input type="checkbox" id="chck3">
								<label class="tab-label" for="chck3"><?php esc_html_e('How to fix internet server error.', 'invoice-for-woocommerce'); ?></label>
								<div class="tab-content">
								  <p><b><?php esc_html_e('1) This error can only occur when you use VAT number validation. Since the validation is done through VIES, it needs to be added changes to your server. Some hosting companies do not allow this by default so you need to contact your hosting company. The following line should be added to the php.ini file on your server extension=php_soap.dll .', 'invoice-for-woocommerce'); ?></b></p>
									<img src="<?php echo plugin_dir_url(__FILE__).'images/img5.jpg'; ?>">
								</div>
							  </div>
							  
							  <div class="tab">
								<input type="checkbox" id="chck4">
								<label class="tab-label" for="chck4"><?php esc_html_e('How to use QR Code.', 'invoice-for-woocommerce'); ?></label>
								<div class="tab-content">
								   <p><b><?php esc_html_e('1) This option is only allowed in the premium version of the plugin. You can add QR Code to any invoice.', 'invoice-for-woocommerce'); ?></b></p>
									<img src="<?php echo plugin_dir_url(__FILE__).'images/img6.jpg'; ?>">
									<p><b><?php esc_html_e('2) This is what the QR Code invoice looks like.', 'invoice-for-woocommerce'); ?></b></p>
									<img src="<?php echo plugin_dir_url(__FILE__).'images/img7.jpg'; ?>">
									<p><b><?php esc_html_e('3) When you activate the QR code option for the first time, the following error may occur. You need to update the order and generate a new invoice..', 'invoice-for-woocommerce'); ?></b></p>
									<img src="<?php echo plugin_dir_url(__FILE__).'images/img8.jpg'; ?>">
								</div>
							  </div>
							  
							  <div class="tab">
								<input type="checkbox" id="chck5">
								<label class="tab-label" for="chck5"><?php esc_html_e('How to use send e-mail.', 'invoice-for-woocommerce'); ?></label>
								<div class="tab-content">
									<p><b><?php esc_html_e('1) This option is only allowed in the premium version of the plugin. You can send an email to your users for each individual order with just the push of a button. You must first set the content of the email.', 'invoice-for-woocommerce'); ?></b></p>
									<img src="<?php echo plugin_dir_url(__FILE__).'images/img9.jpg'; ?>">
									<p><b><?php esc_html_e('2) The email is sent after the invoice is active in the user account. To do this, you must activate the invoice so that the user can download it. Then send the email from the email link. ', 'invoice-for-woocommerce'); ?></b></p>
									<img src="<?php echo plugin_dir_url(__FILE__).'images/img10.jpg'; ?>">
								</div>
							  </div>

							  <div class="tab">
								<input type="checkbox" id="chck7">
								<label class="tab-label" for="chck7"><?php esc_html_e('How the user can download the invoice from his/her account.', 'invoice-for-woocommerce'); ?></label>
								<div class="tab-content">
									<p><b><?php esc_html_e('1) This option is a premium version available. First go to the order and allow the user to download the invoice.', 'invoice-for-woocommerce'); ?></b></p>
									<img src="<?php echo plugin_dir_url(__FILE__).'images/img12.jpg'; ?>">
									<p><b><?php esc_html_e('2) There are tab invoices on WooCommerce  my account page. The user can download their invoice when you have allowed the user to download the invoice.', 'invoice-for-woocommerce'); ?></b></p>
									<img src="<?php echo plugin_dir_url(__FILE__).'images/img11.jpg'; ?>">
								</div>
							  </div>
							  
							  <div class="tab">
								<input type="checkbox" id="chck8">
								<label class="tab-label" for="chck8"><?php esc_html_e('How to use Exchange Rate.', 'invoice-for-woocommerce'); ?></label>
								<div class="tab-content">
									<p><b><?php esc_html_e('1) There is Exchange Rate for the second language. This option is a premium version available. This option is only used when you are working in a currency other than the first invoice. You can create bilingual invoices with two currencies and the second invoice you need is a different exchange rate.', 'invoice-for-woocommerce'); ?></b></p>
                                    <img src="<?php echo plugin_dir_url(__FILE__).'images/img13.jpg'; ?>">
								</div>
							  </div>
							  
							  <div class="tab">
								<input type="checkbox" id="chck9">
								<label class="tab-label" for="chck9"><?php esc_html_e('Premium Options', 'invoice-for-woocommerce'); ?></label>
								<div class="tab-content">
								 <img src="<?php echo plugin_dir_url(__FILE__).'images/img14.jpg'; ?>">
								</div>
							  </div>
							  
							</div>
						  </div>
						</div>
					</div>
				</td>
			</tr>
		</table>
		<br />
		<br />
		<br />
		<?php submit_button(); ?>
	</form>
		<script>
		
			<?php if ( !get_option( 'activate_all_VAT_fields' ) ) { ?>
				var hideeuseos = document.getElementsByClassName('hide-eu');
				for (var i=0;i<hideeuseos.length;i+=1){
				  hideeuseos[i].style.display = 'none'; 
				}
			<?php } ?>
			<?php if ( !get_option( 'activate_grounds_for_zero' ) ) { ?>
				var hideeuzero = document.getElementById('zero-eu');
				hideeuzero.style.display = 'none';
			<?php } ?>
		</script>
		
		
		<?php

		