<?php
/*
Plugin Name: curreX
Plugin URI: http://chaos-laboratory.com/2007/03/01/currex-ajax-based-currency-converter-widget-for-wordpress/
Description: AJAX based Currency Converter Widget 
Version: 0.9
Author: miCRoSCoPiC^eaRthLinG
Author URI: http://chaos-laboratory.com
License: GPL
Last modified: 2008-05-16 10:21pm
*/

// ===============================================================================
// 								Global Definitions
// ===============================================================================
// Version of the plugin
define( 'CURREX_VERSION', "0.9" );

// Option Saving Key(s)
define( 'CURREX_OPTIONS', 'widget_curreX' );

// For Debugging
define( 'DEBUG', "false" );

// Currency Units List
$currency_list = array (

	"DZD" => "Algerian Dinar (DZD)",
	"XAL" => "Aluminium Ounces (XAL)",
	"ARS" => "Argentine Peso (ARS)",
	"AWG" => "Aruba Florin (AWG)",
	"AUD" => "Australian Dollar (AUD)",
	"BSD" => "Bahamian Dollar (BSD)",
	"BHD" => "Bahraini Dinar (BHD)",
	"BDT" => "Bangladesh Taka (BDT)",
	"BBD" => "Barbados Dollar (BBD)",
	"BYR" => "Belarus Ruble (BYR)",
	"BZD" => "Belize Dollar (BZD)",
	"BMD" => "Bermuda Dollar (BMD)",
	"BTN" => "Bhutan Ngultrum (BTN)",
	"BOB" => "Bolivian Boliviano (BOB)",
	"BRL" => "Brazilian Real (BRL)",
	"GBP" => "British Pound (GBP)",
	"BND" => "Brunei Dollar (BND)",
	"BGN" => "Bulgarian Lev (BGN)",
	"BIF" => "Burundi Franc (BIF)",
	"KHR" => "Cambodia Riel (KHR)",
	"CAD" => "Canadian Dollar (CAD)",
	"KYD" => "Cayman Islands Dollar (KYD)",
	"XOF" => "CFA Franc (BCEAO) (XOF)",
	"XAF" => "CFA Franc (BEAC) (XAF)",
	"CLP" => "Chilean Peso (CLP)",
	"CNY" => "Chinese Yuan (CNY)",
	"COP" => "Colombian Peso (COP)",
	"KMF" => "Comoros Franc (KMF)",
	"XCP" => "Copper Ounces (XCP)",
	"CRC" => "Costa Rica Colon (CRC)",
	"HRK" => "Croatian Kuna (HRK)",
	"CUP" => "Cuban Peso (CUP)",
	"CYP" => "Cyprus Pound (CYP)",
	"CZK" => "Czech Koruna (CZK)",
	"DKK" => "Danish Krone (DKK)",
	"DJF" => "Dijibouti Franc (DJF)",
	"DOP" => "Dominican Peso (DOP)",
	"XCD" => "East Caribbean Dollar (XCD)",
	"ECS" => "Ecuador Sucre (ECS)",
	"EGP" => "Egyptian Pound (EGP)",
	"SVC" => "El Salvador Colon (SVC)",
	"ERN" => "Eritrea Nakfa (ERN)",
	"EEK" => "Estonian Kroon (EEK)",
	"ETB" => "Ethiopian Birr (ETB)",
	"EUR" => "Euro (EUR)",
	"FKP" => "Falkland Islands Pound (FKP)",
	"GMD" => "Gambian Dalasi (GMD)",
	"GHC" => "Ghanian Cedi (GHC)",
	"GIP" => "Gibraltar Pound (GIP)",
	"XAU" => "Gold Ounces (XAU)",
	"GTQ" => "Guatemala Quetzal (GTQ)",
	"GNF" => "Guinea Franc (GNF)",
	"HTG" => "Haiti Gourde (HTG)",
	"HNL" => "Honduras Lempira (HNL)",
	"HKD" => "Hong Kong Dollar (HKD)",
	"HUF" => "Hungarian Forint (HUF)",
	"ISK" => "Iceland Krona (ISK)",
	"INR" => "Indian Rupee (INR)",
	"IDR" => "Indonesian Rupiah (IDR)",
	"IRR" => "Iran Rial (IRR)",
	"ILS" => "Israeli Shekel (ILS)",
	"JMD" => "Jamaican Dollar (JMD)",
	"JPY" => "Japanese Yen (JPY)",
	"JOD" => "Jordanian Dinar (JOD)",
	"KZT" => "Kazakhstan Tenge (KZT)",
	"KES" => "Kenyan Shilling (KES)",
	"KRW" => "Korean Won (KRW)",
	"KWD" => "Kuwaiti Dinar (KWD)",
	"LAK" => "Lao Kip (LAK)",
	"LVL" => "Latvian Lat (LVL)",
	"LBP" => "Lebanese Pound (LBP)",
	"LSL" => "Lesotho Loti (LSL)",
	"LYD" => "Libyan Dinar (LYD)",
	"LTL" => "Lithuanian Lita (LTL)",
	"MOP" => "Macau Pataca (MOP)",
	"MKD" => "Macedonian Denar (MKD)",
	"MGF" => "Malagasy Franc (MGF)",
	"MWK" => "Malawi Kwacha (MWK)",
	"MYR" => "Malaysian Ringgit (MYR)",
	"MVR" => "Maldives Rufiyaa (MVR)",
	"MTL" => "Maltese Lira (MTL)",
	"MRO" => "Mauritania Ougulya (MRO)",
	"MUR" => "Mauritius Rupee (MUR)",
	"MXN" => "Mexican Peso (MXN)",
	"MDL" => "Moldovan Leu (MDL)",
	"MNT" => "Mongolian Tugrik (MNT)",
	"MAD" => "Moroccan Dirham (MAD)",
	"MZM" => "Mozambique Metical (MZM)",
	"NAD" => "Namibian Dollar (NAD)",
	"NPR" => "Nepalese Rupee (NPR)",
	"ANG" => "Neth Antilles Guilder (ANG)",
	"TRY" => "New Turkish Lira (TRY)",
	"NZD" => "New Zealand Dollar (NZD)",
	"NIO" => "Nicaragua Cordoba (NIO)",
	"NGN" => "Nigerian Naira (NGN)",
	"NOK" => "Norwegian Krone (NOK)",
	"OMR" => "Omani Rial (OMR)",
	"XPF" => "Pacific Franc (XPF)",
	"PKR" => "Pakistani Rupee (PKR)",
	"XPD" => "Palladium Ounces (XPD)",
	"PAB" => "Panama Balboa (PAB)",
	"PGK" => "Papua New Guinea Kina (PGK)",
	"PYG" => "Paraguayan Guarani (PYG)",
	"PEN" => "Peruvian Nuevo Sol (PEN)",
	"PHP" => "Philippine Peso (PHP)",
	"XPT" => "Platinum Ounces (XPT)",
	"PLN" => "Polish Zloty (PLN)",
	"QAR" => "Qatar Rial (QAR)",
	"ROL" => "Romanian Leu (ROL)",
	"RON" => "Romanian New Leu (RON)",
	"RUB" => "Russian Rouble (RUB)",
	"RWF" => "Rwanda Franc (RWF)",
	"WST" => "Samoa Tala (WST)",
	"STD" => "Sao Tome Dobra (STD)",
	"SAR" => "Saudi Arabian Riyal (SAR)",
	"SCR" => "Seychelles Rupee (SCR)",
	"SLL" => "Sierra Leone Leone (SLL)",
	"XAG" => "Silver Ounces (XAG)",
	"SGD" => "Singapore Dollar (SGD)",
	"SKK" => "Slovak Koruna (SKK)",
	"SIT" => "Slovenian Tolar (SIT)",
	"SOS" => "Somali Shilling (SOS)",
	"ZAR" => "South African Rand (ZAR)",
	"LKR" => "Sri Lanka Rupee (LKR)",
	"SHP" => "St Helena Pound (SHP)",
	"SDD" => "Sudanese Dinar (SDD)",
	"SRG" => "Surinam Guilder (SRG)",
	"SZL" => "Swaziland Lilageni (SZL)",
	"SEK" => "Swedish Krona (SEK)",
	"CHF" => "Swiss Franc (CHF)",
	"SYP" => "Syrian Pound (SYP)",
	"TWD" => "Taiwan Dollar (TWD)",
	"TZS" => "Tanzanian Shilling (TZS)",
	"THB" => "Thai Baht (THB)",
	"TOP" => "Tonga Pa'anga (TOP)",
	"TTD" => "Trinidad&Tobago Dollar (TTD)",
	"TND" => "Tunisian Dinar (TND)",
	"USD" => "U.S. Dollar (USD)",
	"AED" => "UAE Dirham (AED)",
	"UGX" => "Ugandan Shilling (UGX)",
	"UAH" => "Ukraine Hryvnia (UAH)",
	"UYU" => "Uruguayan New Peso (UYU)",
	"VUV" => "Vanuatu Vatu (VUV)",
	"VEB" => "Venezuelan Bolivar (VEB)",
	"VND" => "Vietnam Dong (VND)",
	"YER" => "Yemen Riyal (YER)",
	"ZMK" => "Zambian Kwacha (ZMK)",
	"ZWD" => "Zimbabwe Dollar (ZWD)"

); 	

// ===============================================================================
// 								The Code
// ===============================================================================
// Put functions into one big function we'll call at the plugins_loaded
// action. This ensures that all required plugin functions are defined.

// Initialisation
function widget_curreX_init() {

	// =======================================================================
	//	This is the function that outputs the Currency Converter code for
	//	NON-WIDGET based THEMES
	// =======================================================================
	function show_currex( $default_from, $default_to, $decimal_places, $type = 'html', $title = '' ) {

		if( 'html' == $type ): ?>
		<!-- Begin curreX v<?php echo CURREX_VERSION; ?> Code -->
		<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo( 'url' ); ?>/wp-content/plugins/curreX/curreX.css" media="screen" />
		<script type="text/javascript" language="javascript" src="<?php echo get_bloginfo( 'url' ); ?>/wp-content/plugins/curreX/jquery.latest.pack.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo get_bloginfo( 'url' ); ?>/wp-content/plugins/curreX/jquery.blockUI.min.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo get_bloginfo( 'url' ); ?>/wp-content/plugins/curreX/curreX.pack.js"></script>
		<script type="text/javascript" language="javascript">
	
		// Move jQuery to a different namespace
		$jQ = jQuery.noConflict();

		// Plugin Path
		var curreX_plugin_path = '<?php echo get_bloginfo( "url" ); ?>/wp-content/plugins/curreX/';

		// Loading Indicator Image
		var curreX_Loader = '<img src="' + curreX_plugin_path + 'loader.gif" alt="Loading..." />';
		
		// Converter URL
		var curreX_Backend_URL = curreX_plugin_path + 'curreX-ajax-backend.php';
	
		// Decimal places
		var _decimal_places = <?php echo $decimal_places; ?>;

		</script>		
	
		<!-- Main Widget Display Begin -->
		<div id="curreX">
			<div id="curreXbody">
				<div id="help-link"><a href="http://chaos-laboratory.com/forum/currex-b6.0/" title="Get help with curreX" target="_blank"><img src="<?php echo get_bloginfo( 'url' ) . '/wp-content/plugins/curreX/icon-help.png'; ?>" alt="Help" /></a></div>
				Amount: <br />
				<input type="text" id="amount" value="0.00" /> <br />
				From: <br />
				<select id="curr_from">
					<?php global $currency_list;
						// Loop and add the options
						foreach( $currency_list as $key => $value ): 
							if( $default_from == $key ):	?>
								<option value="<?php echo $key; ?>" selected ><?php echo $value; ?></option>
							<?php else: ?>
								<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
						<?php endif;
						endforeach; ?>
				</select> <br />
				To: <br />
				<select id="curr_to">
					<?php global $currency_list;
						// Loop and add the options
						foreach( $currency_list as $key => $value ): 
							if( $default_to == $key ):	?>
								<option value="<?php echo $key; ?>" selected ><?php echo $value; ?></option>
							<?php else: ?>
								<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
						<?php endif;
						endforeach; ?>
				</select>
				Result:
				<div id="convResult">0.00</div>
				<input type="button" id="convert" onclick="convertCurrency();" value="Convert" />
				<div id="notice">
					* Rates by <a href="http://finance.yahoo.com" target="_blank">Yahoo! Finance</a>
				</div>
			</div>
		</div>
		<!-- Widget Div Display End -->

		<?php elseif( 'flash' == $type ): ?>
		<script type="text/javascript" language="javascript" src="<?php echo get_bloginfo( 'url' ); ?>/wp-content/plugins/curreX/swfobject.pack.js"></script>
		<div id="fcurreX-container">
			<p>
				<a href="http://www.adobe.com/go/getflashplayer">
					<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
				</a>
			</p>
		</div>
		<script type="text/javascript" language="javascript">
		var flashvars = {
			currFrom:	'<?php echo $default_from; ?>',
			currTo:		'<?php echo $default_to; ?>',
			decimal:	'<?php echo $decimal_places; ?>',
			backendURL:	'<?php echo get_bloginfo( "url" ); ?>/wp-content/plugins/curreX/curreX-flash-backend.php',
			Title:		'<?php echo $title; ?>'
		};
		var flashparams = {
			wmode:	'transparent'
		};
		swfobject.embedSWF( "<?php echo get_bloginfo( 'url' ); ?>/wp-content/plugins/curreX/fcurreX.swf", "fcurreX-container", 180, 260, "9.0.0", "", flashvars, flashparams );
		</script>
		<?php endif;

	} // show_currex()

	// =====================================================================
	// 	Check for the required plugin functions. This will prevent fatal
	// 	errors occurring when you deactivate the dynamic-sidebar plugin.
	// =====================================================================
	if ( !function_exists( 'register_sidebar_widget' ) || !function_exists( 'register_widget_control' ) ) {
	
		// Exit - as any further widget declaration isn't required
		return;
		
	}
		
	// =====================================================================
	// 						AdSense Options
	// =====================================================================
	function widget_curreX_options() {

		return array(
			'title' => "",
			'default_from' => "USD",
			'default_to' => "USD",
			'decimal_places' => '2',
			'widget-type' => 'html'
		);

	} // widget_currex_options()
	
	// =======================================================================
	//		This is the function that outputs the Currency Converter code.
	// =======================================================================
	function widget_curreX( $args ) {	
	
		// =====================================================================
		// 	$args is an array of strings that help widgets to conform to
		// 	the active theme: before_widget, before_title, after_widget,
		// 	and after_title are the array keys. Default tags: li and h2.
		// =====================================================================
		extract( $args );
		
		// =====================================================================
		// 	Each widget can store and retrieve its own options.
		// 	Here we retrieve any options that may have been set by the user
		// 	relying on widget defaults to fill the gaps.
		// =====================================================================
		
		// =====================================================================
		// 	Get General Options
		// =====================================================================
		$options = array_merge( widget_curreX_options(), get_option( CURREX_OPTIONS ) );
		// Returned by get_option(), but we don't need the Zeroeth element
		unset( $options[0] );		
		
		// Check if HTML or Flash Widget
		if( 'html' == $options['widget-type'] ):
		
		// =====================================================================
		// 	These lines generate our output. Widgets can be very complex
		// 	but as you can see here, they can also be very, very simple.
		// =====================================================================
		echo $before_widget . $before_title . $options['title'] . $after_title; ?>
		
		<!-- Begin curreX v<?php echo CURREX_VERSION; ?> Code -->
		<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo( 'url' ); ?>/wp-content/plugins/curreX/curreX.css" media="screen" />
		<script type="text/javascript" language="javascript" src="<?php echo get_bloginfo( 'url' ); ?>/wp-content/plugins/curreX/jquery.latest.pack.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo get_bloginfo( 'url' ); ?>/wp-content/plugins/curreX/jquery.blockUI.min.js"></script>
		<script type="text/javascript" language="javascript" src="<?php echo get_bloginfo( 'url' ); ?>/wp-content/plugins/curreX/curreX.pack.js"></script>
		<script type="text/javascript" language="javascript">
		
		// Move jQuery to a different namespace
		$jQ = jQuery.noConflict();

		// Plugin Path
		var curreX_plugin_path = '<?php echo get_bloginfo( "url" ); ?>/wp-content/plugins/curreX/';

		// Loading Indicator Image
		var curreX_Loader = '<img src="' + curreX_plugin_path + 'loader.gif" alt="Loading..." />';
			
		// Converter URL
		var curreX_Backend_URL = curreX_plugin_path + 'curreX-ajax-backend.php';
		
		// Decimal places
		var _decimal_places = <?php echo $options['decimal_places']; ?>;
	
		</script>		
		
		<!-- Main Widget Display Begin -->
		<div id="curreX">
			<div id="curreXbody">
				<div id="help-link"><a href="http://chaos-laboratory.com/forum/currex-b6.0/" title="Get help with curreX" target="_blank"><img src="<?php echo get_bloginfo( 'url' ) . '/wp-content/plugins/curreX/icon-help.png'; ?>" alt="Help" /></a></div>
				Amount: <br />
				<input type="text" id="amount" value="0.00" /> <br />
				From: <br />
				<select id="curr_from">
					<?php global $currency_list;
						// Loop and add the options
						foreach( $currency_list as $key => $value ): 
							if( $options['default_from'] == $key ):	?>
								<option value="<?php echo $key; ?>" selected ><?php echo $value; ?></option>
							<?php else: ?>
								<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
						<?php endif;
						endforeach; ?>
				</select> <br />
				To: <br />
				<select id="curr_to">
					<?php global $currency_list;
						// Loop and add the options
						foreach( $currency_list as $key => $value ): 
							if( $options['default_to'] == $key ):	?>
								<option value="<?php echo $key; ?>" selected ><?php echo $value; ?></option>
							<?php else: ?>
								<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
						<?php endif;
						endforeach; ?>
				</select>
				Result:
				<div id="convResult">0.00</div>
				<input type="button" id="convert" onclick="convertCurrency();" value="Convert" />
				<div id="notice">
					* Rates by <a href="http://finance.yahoo.com" target="_blank">Yahoo! Finance</a>
				</div>
			</div>
		</div>
		<!-- Widget Div Display End -->

		<?php echo $after_widget; ?>
		<!-- End curreX Code -->
		
		<?php elseif( 'flash' == $options['widget-type'] ): ?>
		
		<script type="text/javascript" language="javascript" src="<?php echo get_bloginfo( 'url' ); ?>/wp-content/plugins/curreX/swfobject.pack.js"></script>
		<div id="fcurreX-wrapper" style="text-align:center;">
			<div id="fcurreX-container">
				<p>
					<a href="http://www.adobe.com/go/getflashplayer">
						<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
					</a>
				</p>
			</div>
		</div>
		<script type="text/javascript" language="javascript">
		var flashvars = {
			currFrom:	'<?php echo $options['default_from']; ?>',
			currTo:		'<?php echo $options['default_to']; ?>',
			decimal:	'<?php echo $options['decimal_places']; ?>',
			backendURL:	'<?php echo get_bloginfo( "url" ); ?>/wp-content/plugins/curreX/curreX-flash-backend.php',
			Title:		'<?php echo $options['title']; ?>'
		};
		var flashparams = {
			wmode:	'transparent'
		};
		swfobject.embedSWF( "<?php echo get_bloginfo( 'url' ); ?>/wp-content/plugins/curreX/fcurreX.swf", "fcurreX-container", 180, 260, "9.0.0", "", flashvars, flashparams );
		</script>
		
		<?php endif;
	
	} // widget_currex()
	
	// =====================================================================
	// 	This is the function that outputs the form to let the users edit
	// 	the widget's title. It's an optional feature that users cry for.
	// =====================================================================
	function widget_curreX_control() {	
	
		// =====================================================================
		// 	Each widget can store and retrieve its own options.
		// 	Here we retrieve any options that may have been set by the user
		// 	relying on widget defaults to fill the gaps.
		// =====================================================================

		// =====================================================================
		// 	Get General Options
		// =====================================================================
		$options = array_merge( widget_curreX_options(), get_option( CURREX_OPTIONS ) );
		// Returned by get_option(), but we don't need the Zeroeth element
		unset( $options[0] );	
		
		// If user is submitting custom option values for this widget
		if ( $_POST['curreX-submit'] ) {
			// Remember to sanitize and format use input appropriately.
			$options['title'] = $_POST['curreX-title'];
			$options['default_from'] = $_POST['curreX-from-toggle'] == true ? strip_tags( stripslashes( $_POST[ 'curreX-default-curr-from' ] ) ) : strip_tags( stripslashes( 'none' ) ) ;
			$options['default_to'] = $_POST['curreX-to-toggle'] == true ? strip_tags( stripslashes( $_POST['curreX-default-curr-to'] ) ) : strip_tags( stripslashes( 'none' ) ) ;
			$options['decimal_places'] = strip_tags( stripslashes( $_POST['curreX-decimal'] ) );
			$options['widget-type'] = $_POST[ 'widget-type' ];

			// ==========================
			// 	Save changes
			// ==========================
			update_option( CURREX_OPTIONS, $options );

		} // if
		
		// =====================================================================
		// 	Here is our little form segment. Notice that we don't need a
		// 	complete form. This will be embedded into the existing form.
		// 	Be sure you format your options to be valid HTML attributes
		// 	before displayihng them on the page.
		// =====================================================================
		?>

		<script type="text/javascript" language="javascript" src="<?php echo get_option('siteurl') . '/wp-content/plugins/curreX/curreX.pack.js'; ?>"></script>
		
		<div style="float:right;"><a href="http://chaos-laboratory.com/forum/currex-b6.0/" title="Get help with curreX configuration" target="_blank">Need help?</a></div>
		
		<p><strong>curreX v<?php echo CURREX_VERSION; ?> Settings</strong></p>
		
		<hr noshade />
		
		Title:&nbsp;&nbsp;
		<input type="text" id="curreX-title" name="curreX-title" maxlength="20" value="<?php echo htmlspecialchars($options['title'], ENT_QUOTES); ?>" />
		
		<br /><br />
		
		Widget type:&nbsp;&nbsp;
		<label for="html-widget"><input type="radio" id="html-widget" name="widget-type" value="html" <?php echo $options['widget-type'] == 'html' ? 'checked' : ''; ?> />&nbsp;HTML / JavaScript based</label>
		&nbsp;&nbsp;&nbsp;&nbsp;&bull;&nbsp;&nbsp;&nbsp;&nbsp;
		<label for="flash-widget"><input type="radio" id="flash-widget" name="widget-type" value="flash" <?php echo $options['widget-type'] == 'flash' ? 'checked' : ''; ?> />&nbsp;Flash based</label>
		
		<br /><br />
		
		Default Source Currency:&nbsp;&nbsp;
		<input type="checkbox" id="curreX-from-toggle" name ="curreX-from-toggle" onclick="toggleSelect( 'curreX-default-curr-from' );" <?php echo $options['default_from'] != 'none' ? 'checked' : ''; ?> />
		<br />
		<select id="curreX-default-curr-from" name="curreX-default-curr-from">
			<?php global $currency_list;
				// Loop and add the options
				foreach( $currency_list as $key => $value ): 
					if( $options['default_from'] == $key ): ?>
						<option value="<?php echo $key; ?>" selected ><?php echo $value; ?></option>
					<?php else: ?>
						<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
			<?php 	endif;
				endforeach; ?>
		</select>
		
		<script type="text/javascript" language="javascript">
			if(document.getElementById( 'curreX-from-toggle' ).checked == false) {
				document.getElementById( 'curreX-default-curr-from' ).disabled = true;
				document.getElementById( 'curreX-default-curr-from' ).selectedIndex = -1;
			}
		</script>

		<br /><br />

		Default Destination Currency:&nbsp;&nbsp;
		<input type="checkbox" id="curreX-to-toggle" name="curreX-to-toggle" onclick="toggleSelect( 'curreX-default-curr-to' );" <?php echo $options['default_to'] != 'none' ? 'checked' : ''; ?> />
		<br />
		<select id="curreX-default-curr-to" name="curreX-default-curr-to">
			<?php global $currency_list;
				// Loop and add the options
				foreach( $currency_list as $key => $value ): 
					if( $options['default_to'] == $key ): ?>
						<option value="<?php echo $key; ?>" selected ><?php echo $value; ?></option>
					<?php else: ?>
						<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
			<?php 	endif;
				endforeach; ?>					
		</select>
		
		<script type="text/javascript" language="javascript">
			if( document.getElementById( 'curreX-to-toggle' ).checked == false ) {
				document.getElementById( 'curreX-default-curr-to' ).disabled = true;
				document.getElementById( 'curreX-default-curr-to' ).selectedIndex = -1;
			}
		</script>

		<br /><br />

		Number of decimal places in Result (Precision):<br />
		<input type="text" id="curreX-decimal" name="curreX-decimal" maxlength="1" style="border: 1px solid #ece; width: 20px;" value="<?php echo htmlspecialchars( $options['decimal_places'], ENT_QUOTES ); ?>" onkeyup="checkDecimal();" />
		<br />
		<input type="hidden" id="curreX-submit" name="curreX-submit" value="1" />

		<?php

	} // widget_curreX_control
	
	// =====================================================================
	// 	This registers our widget so it appears with the other available
	// 	widgets and can be dragged and dropped into any active sidebars.
	// =====================================================================
	register_sidebar_widget( 'curreX', 'widget_curreX' );	
	
	// =====================================================================
	// 	This registers our optional widget control form. Because of this
	// 	our widget will have a button that reveals a form.
	// =====================================================================
	register_widget_control( 'curreX', 'widget_curreX_control', 380, 250 );
	
} // widget_currex_init

// =====================================================================
// 	Run our code later in case this loads prior to any required plugins
// =====================================================================
add_action( 'plugins_loaded', 'widget_curreX_init' );

?>