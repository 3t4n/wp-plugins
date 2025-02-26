<?php
/*
Plugin Name: Free Currency Converter
Description: A simple plugin to convert store currency to USD and display it in the header.
Version: 1.1
Author: Siteskyline Plugins
Author URI: https://siteskyline.com/
License: GPL2
Depends: woocommerce
*/

if (!defined('ABSPATH')) exit;

// Check if WooCommerce is active
if (!in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    function FRCC_plugin_admin_notice() {
        ?>
        <div class="notice notice-error is-dismissible">
            <p><?php esc_html_e('WooCommerce is required to use the Free Currency Converter plugin.', 'free-currency-converter'); ?></p>
        </div>
        <?php
    }
    add_action('admin_notices', 'FRCC_plugin_admin_notice');

    // Deactivate the plugin
    deactivate_plugins(plugin_basename(__FILE__));

    return;  // Return early
}

function FRCC_start_session() {
    if (!session_id()) {
        session_start();
    }
}
add_action('init', 'FRCC_start_session', 1);

function FRCC_convert_currency($amount, $fromCurrency, $toCurrency) {
    $apiUrl = "https://api.exchangerate-api.com/v4/latest/{$fromCurrency}";

    $response = wp_remote_get($apiUrl);

    if (is_wp_error($response)) {
        // Handle error
        return null;
    } else {
        $data = json_decode(wp_remote_retrieve_body($response), true);

        if (isset($data['rates'][$toCurrency])) {
            $rate = $data['rates'][$toCurrency];
            return $rate;
        } else {
            return null;
        }
    }
}

// Create menu item
add_action('admin_menu', 'frcc_add_options_page');

function frcc_add_options_page() {
    add_options_page(
        'Currency Converter Options',
        'Currency Converter',
        'manage_options',
        'currency-converter-options',
        'frcc_options_page'
    );
}

// Options page callback
// Enqueue Flag Icons CSS
add_action('admin_enqueue_scripts', 'frcc_enqueue_flag_icons_css');
add_action('wp_enqueue_scripts', 'frcc_enqueue_flag_icons_css');
function frcc_enqueue_flag_icons_css() {
    wp_enqueue_style('flag-icons', 'https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.0.0/css/flag-icons.min.css');
}

// Wrap our main functionality in a function that will be hooked to woocommerce_init
function frcc_init() {
    // Update the frcc_options_page function
    function frcc_options_page() {
        // Add this at the beginning of the function
        echo '<div class="frcc-review-widget">';
        echo '<h2>Enjoying Free Currency Converter?</h2>';
        echo '<p>We hope you\'re finding our plugin useful! If you have a moment, please consider leaving a review. Your feedback helps us improve and reach more users.</p>';
        echo '<div class="frcc-review-buttons">';
        echo '<a href="https://wordpress.org/support/plugin/free-currency-converter/reviews/#new-post" target="_blank" class="button button-primary">Leave a Review</a>';
        echo '<a style="margin-left:10px" href="https://wordpress.org/support/plugin/free-currency-converter/" target="_blank" class="button">Get Support</a>';
        echo '</div>';
        echo '</div>';

        // Get WooCommerce currency
        $woocommerceCurrency = get_woocommerce_currency();

        // Get list of available currencies
        $currencies = get_woocommerce_currencies();
        $selectedCurrencies = get_option('frcc_selected_currencies', array());

        // Get display options
        $showFlag = get_option('frcc_show_flag', true);
        $showSymbol = get_option('frcc_show_symbol', false);
        $showName = get_option('frcc_show_name', false);
        $showValue = get_option('frcc_show_value', true);
        $boxWidth = get_option('frcc_box_width', 100);
		$boxHeight = get_option('frcc_box_height', 30);
        $defaultCurrency = get_option('frcc_default_currency', $woocommerceCurrency);

        echo '<div class="wrap">';
        echo '<h1>Currency Converter Options</h1>';
        echo '<form method="post" action="options.php">';
        settings_fields('frcc_options');
        do_settings_sections('currency-converter-options');

        // Display options
        echo '<h2>Display Options</h2>';
        echo '<p><label><input type="checkbox" name="frcc_show_flag" value="1" ' . checked(1, $showFlag, false) . '> Show flag <span class="fi fi-us"></span></label></p>';
        echo '<p><label><input type="checkbox" name="frcc_show_symbol" value="1" ' . checked(1, $showSymbol, false) . '> Show currency symbol ($)</label></p>';
        echo '<p><label><input type="checkbox" name="frcc_show_value" value="1" ' . checked(1, $showValue, false) . '> Show currency code  (USD)</label></p>';
        echo '<p><label><input type="checkbox" name="frcc_show_name" value="1" ' . checked(1, $showName, false) . '> Show currency name (United States Dollar)</label></p>';
        
        
        ///
        echo '<h2>Style Setting</h2>';
          echo '<p><label>Box Width (px)</label><br>
          <input type="number" name="frcc_box_width" value="' . esc_attr($boxWidth) . '"> </p>';
		  echo '<p><label>Box Height (px)</label><br>
          <input type="number" name="frcc_box_height" value="' . esc_attr($boxHeight) . '"> </p>';
        
      
        

  

        // Add Select All and Unselect All buttons
        echo '<h2>Currency Selection</h2>';
        echo '<p>';
        echo '<button type="button" id="frcc-select-all" class="button">Select All</button> ';
        echo '<button type="button" id="frcc-unselect-all" class="button">Unselect All</button>';
        echo '</p>';

        echo '<div id="frcc-currency-list">';
        
        // Display selected currencies first
        foreach ($selectedCurrencies as $currency_code) {
            if (isset($currencies[$currency_code])) {
                $currency_name = $currencies[$currency_code];
                $currencySymbol = get_woocommerce_currency_symbol($currency_code);
                $countryCode = frcc_get_currency_country_code($currency_code);

                echo '<p><label><input type="checkbox" name="frcc_selected_currencies[]" value="' . esc_attr($currency_code) . '" checked> <span class="fi fi-' . esc_attr($countryCode) . '"></span>' . esc_html($currencySymbol) . ' (' . esc_html($currency_name) . ')</label></p>';
                unset($currencies[$currency_code]);
            }
        }

        // Display a separator
        echo '<hr>';

        // Display remaining currencies
        foreach ($currencies as $currency_code => $currency_name) {
            $currencySymbol = get_woocommerce_currency_symbol($currency_code);
            $countryCode = frcc_get_currency_country_code($currency_code);

            echo '<p><label><input type="checkbox" name="frcc_selected_currencies[]" value="' . esc_attr($currency_code) . '"> <span class="fi fi-' . esc_attr($countryCode) . '"></span>' . esc_html($currencySymbol) . ' (' . esc_html($currency_name) . ')</label></p>';
        }
        echo '</div>';

        submit_button();

        // Add shortcode information
        echo '<h2>How to Use</h2>';
        echo '<p>To display the currency converter on your site, use the following shortcode:</p>';
        echo '<code>[currency_converter]</code>';
        echo '<p>You can add this shortcode to any page, post, or widget where you want the currency converter to appear.</p>';

        echo '</form>';
        echo '</div>';

        // Add JavaScript for Select All, Unselect All, and Preview functionality
        ?>
        <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#frcc-select-all').click(function() {
                $('#frcc-currency-list input[type="checkbox"]').prop('checked', true);
            });

            $('#frcc-unselect-all').click(function() {
                $('#frcc-currency-list input[type="checkbox"]').prop('checked', false);
            });

           
        });
        </script>
        <?php
    }

    // Update the FRCC_display_currency_converter_in_header function
    function FRCC_display_currency_converter_in_header() {
    $selectedCurrencies = get_option('frcc_selected_currencies', array());
    $defaultCurrency = get_woocommerce_currency(); // Get the default WooCommerce store currency
    $currencyNames = get_woocommerce_currencies();
    
    // Use the default currency if no currency is selected or stored in the cookie
    $currentCurrency = isset($_COOKIE['currency_code']) ? $_COOKIE['currency_code'] : $defaultCurrency;

    if (!empty($selectedCurrencies)) {
        // Add the default currency to the selected currencies if it's not already there
        if (!in_array($defaultCurrency, $selectedCurrencies)) {
            array_unshift($selectedCurrencies, $defaultCurrency);
        }

        // Get display options
        $showFlag = get_option('frcc_show_flag', true);
        $showSymbol = get_option('frcc_show_symbol', true);
        $showName = get_option('frcc_show_name', true);
        $showValue = get_option('frcc_show_value', true);
        $boxWidth = get_option('frcc_box_width', 100);
		$boxHeight = get_option('frcc_box_height', 30);

        echo '<div class="currency-converter-container">';
        echo '<div class="combobox" style="width:' . esc_attr($boxWidth) . 'px">';
        
        // Set the initial value of the input to the current currency symbol and flag
        $currentCurrencySymbol = get_woocommerce_currency_symbol($currentCurrency);
        $currentCountryCode = frcc_get_currency_country_code($currentCurrency);
        $currentCurrencyName = isset($currencyNames[$currentCurrency]) ? $currencyNames[$currentCurrency] : $currentCurrency;

        $displayText = '';
        if ($showSymbol) $displayText .= $currentCurrencySymbol . ' ';
        if ($showName) $displayText .= '(' . $currentCurrencyName . ') ';
        if ($showValue) $displayText .= $currentCurrency . ' ';
        $displayText = trim($displayText);
        
        echo '<input style="height:'.$boxHeight.'px" type="text" class="combobox-input" value="' . esc_attr($displayText) . '" readonly>';
        echo '<span class="selected-flag fi fi-' . esc_attr($currentCountryCode) . ($showFlag ? '' : ' hidden') . '"></span>';
        
        echo '<div class="combobox-arrow"></div>';
        echo '<div class="search-icon">';
        echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">';
        echo '<circle cx="11" cy="11" r="8"></circle>';
        echo '<line x1="21" y1="21" x2="16.65" y2="16.65"></line>';
        echo '</svg>';
        echo '</div>';
        echo '<div class="combobox-list">';

        foreach ($selectedCurrencies as $currency) {
            $selected = ($currency == $currentCurrency) ? ' selected' : '';
            $currencySymbol = get_woocommerce_currency_symbol($currency);
            $currencyName = isset($currencyNames[$currency]) ? $currencyNames[$currency] : $currency;
            $countryCode = frcc_get_currency_country_code($currency);

            $itemText = '';
            if ($showSymbol) $itemText .= $currencySymbol . ' ';
            if ($showName) $itemText .= '(' . $currencyName . ') ';
            if ($showValue) $itemText .= $currency . ' ';
            $itemText = trim($itemText);

            echo '<div class="combobox-item' . $selected . '" data-value="' . esc_attr($currency) . '" data-search="' . esc_attr(strtolower($currencyName)) . '" data-symbol="' .  esc_html($itemText) . '" data-country-code="' . esc_attr($countryCode) . '">';
            echo '<span class="fi fi-' . esc_attr($countryCode) . ($showFlag ? '' : ' hidden') . '"></span> ' . esc_html($itemText);
            echo '</div>';
        }

        echo '</div>';
        // Add the hidden SVG spinner
        echo '<div class="spinner-container" style="display: none;">';
        echo '<svg class="spinner" viewBox="0 0 50 50">';
        echo '<circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>';
        echo '</svg>';
        echo '</div>';
        //END the hidden SVG spinner
        echo '</div>';
        echo '</div>';
    }
}

    // Add this function at the top of your file or in a separate helper file
    function frcc_get_currency_country_code($currency) {
        $currency_country_map = array(
             'AED' => 'ae', 'AFN' => 'af', 'ALL' => 'al', 'AMD' => 'am', 'ANG' => 'an',
        'AOA' => 'ao', 'ARS' => 'ar', 'AUD' => 'au', 'AWG' => 'aw', 'AZN' => 'az',
        'BAM' => 'ba', 'BBD' => 'bb', 'BDT' => 'bd', 'BGN' => 'bg', 'BHD' => 'bh',
        'BIF' => 'bi', 'BMD' => 'bm', 'BND' => 'bn', 'BOB' => 'bo', 'BRL' => 'br',
        'BSD' => 'bs', 'BTC' => 'btc', 'BTN' => 'bt', 'BWP' => 'bw', 'BYN' => 'by',
        'BZD' => 'bz', 'CAD' => 'ca', 'CDF' => 'cd', 'CHF' => 'ch', 'CLP' => 'cl',
        'CNY' => 'cn', 'COP' => 'co', 'CRC' => 'cr', 'CUC' => 'cu', 'CUP' => 'cu',
        'CVE' => 'cv', 'CZK' => 'cz', 'DJF' => 'dj', 'DKK' => 'dk', 'DOP' => 'do',
        'DZD' => 'dz', 'EGP' => 'eg', 'ERN' => 'er', 'ETB' => 'et', 'EUR' => 'eu',
        'FJD' => 'fj', 'FKP' => 'fk', 'GBP' => 'gb', 'GEL' => 'ge', 'GGP' => 'gg',
        'GHS' => 'gh', 'GIP' => 'gi', 'GMD' => 'gm', 'GNF' => 'gn', 'GTQ' => 'gt',
        'GYD' => 'gy', 'HKD' => 'hk', 'HNL' => 'hn', 'HRK' => 'hr', 'HTG' => 'ht',
        'HUF' => 'hu', 'IDR' => 'id', 'ILS' => 'il', 'IMP' => 'im', 'INR' => 'in',
        'IQD' => 'iq', 'IRR' => 'ir', 'ISK' => 'is', 'JEP' => 'je', 'JMD' => 'jm',
        'JOD' => 'jo', 'JPY' => 'jp', 'KES' => 'ke', 'KGS' => 'kg', 'KHR' => 'kh',
        'KMF' => 'km', 'KPW' => 'kp', 'KRW' => 'kr', 'KWD' => 'kw', 'KYD' => 'ky',
        'KZT' => 'kz', 'LAK' => 'la', 'LBP' => 'lb', 'LKR' => 'lk', 'LRD' => 'lr',
        'LSL' => 'ls', 'LYD' => 'ly', 'MAD' => 'ma', 'MDL' => 'md', 'MGA' => 'mg',
        'MKD' => 'mk', 'MMK' => 'mm', 'MNT' => 'mn', 'MOP' => 'mo', 'MRO' => 'mr',
        'MUR' => 'mu', 'MVR' => 'mv', 'MWK' => 'mw', 'MXN' => 'mx', 'MYR' => 'my',
        'MZN' => 'mz', 'NAD' => 'na', 'NGN' => 'ng', 'NIO' => 'ni', 'NOK' => 'no',
        'NPR' => 'np', 'NZD' => 'nz', 'OMR' => 'om', 'PAB' => 'pa', 'PEN' => 'pe',
        'PGK' => 'pg', 'PHP' => 'ph', 'PKR' => 'pk', 'PLN' => 'pl', 'PYG' => 'py',
        'QAR' => 'qa', 'RON' => 'ro', 'RSD' => 'rs', 'RUB' => 'ru', 'RWF' => 'rw',
        'SAR' => 'sa', 'SBD' => 'sb','SCR' => 'sc', 'SDG' => 'sd', 'SEK' => 'se', 'SGD' => 'sg', 'SHP' => 'sh',
'SLL' => 'sl', 'SOS' => 'so', 'SRD' => 'sr', 'SSP' => 'ss', 'STD' => 'st',
'SVC' => 'sv', 'SYP' => 'sy', 'SZL' => 'sz', 'THB' => 'th', 'TJS' => 'tj',
'TMT' => 'tm', 'TND' => 'tn', 'TOP' => 'to', 'TRY' => 'tr', 'TTD' => 'tt',
'TWD' => 'tw', 'TZS' => 'tz', 'UAH' => 'ua', 'UGX' => 'ug', 'USD' => 'us',
'UYU' => 'uy', 'UZS' => 'uz', 'VEF' => 've', 'VND' => 'vn', 'VUV' => 'vu',
'WST' => 'ws', 'XAF' => 'xa', 'XCD' => 'xc', 'XDR' => 'xd', 'XOF' => 'xo',
'XPF' => 'xf', 'YER' => 'ye', 'ZAR' => 'za', 'ZMW' => 'zm', 'ZWL' => 'zw',
            // Add more currency to country code mappings as needed
        );

        return isset($currency_country_map[$currency]) ? $currency_country_map[$currency] : '';
    }
}

// Hook our init function to woocommerce_init
add_action('woocommerce_init', 'frcc_init');

// Register settings
add_action('admin_init', 'frcc_register_settings');

function frcc_register_settings() {
    register_setting('frcc_options', 'frcc_selected_currencies');
    register_setting('frcc_options', 'frcc_show_flag');
    register_setting('frcc_options', 'frcc_show_symbol');
    register_setting('frcc_options', 'frcc_show_name');
    register_setting('frcc_options', 'frcc_show_value');
    register_setting('frcc_options', 'frcc_box_width', 'intval');
	register_setting('frcc_options', 'frcc_box_height', 'intval');
    register_setting('frcc_options', 'frcc_default_currency');
}

add_shortcode('currency_converter', 'FRCC_display_currency_converter_in_header');

function FRCC_enqueue_scripts() {
    $random_version = rand(1000, 9999); // Generate a random version number

    wp_register_script('frcc-custom-js', plugins_url('/js/custom-script.js', __FILE__), array('jquery'), $random_version, true);
    wp_enqueue_script('frcc-custom-js');

    wp_register_style('frcc-custom-css', plugins_url('/css/custom-style.css', __FILE__), array(), $random_version);
    wp_enqueue_style('frcc-custom-css');

    wp_add_inline_style('frcc-custom-css', '
        .frcc-review-widget {
            background-color: #fff;
            border: 1px solid #ccd0d4;
            border-left: 4px solid #00a0d2;
            box-shadow: 0 1px 1px rgba(0,0,0,.04);
            margin: 20px 0;
            padding: 1px 12px;
        }
        .frcc-review-widget h2 {
            margin-bottom: 0.5em;
        }
        .frcc-review-buttons {
            margin: 1em 0;
        }
        .frcc-review-buttons .button {
            margin-right: 10px;
        }
    ');
}
add_action('wp_enqueue_scripts', 'FRCC_enqueue_scripts');

// Add the inline footer JS into an external JS file
function FRCC_add_inline_footer_js() {
    // Create a nonce
    $nonce = wp_create_nonce('currency_converter_nonce');
    ?>
    <script type="text/javascript">
       var ajaxurl = '<?php echo esc_url(admin_url('admin-ajax.php')); ?>';
       var currencyConverterNonce = '<?php echo esc_js($nonce); ?>';
    </script>
    <?php
}
add_action('wp_footer', 'FRCC_add_inline_footer_js');

// Handle the AJAX request for currency conversion
function FRCC_convert_currency_ajax() {

    if (!isset($_POST['currency_converter_nonce'])) {
        return;
    }

    $nonce = sanitize_text_field(wp_unslash($_POST['currency_converter_nonce']));
    if (!wp_verify_nonce($nonce, 'currency_converter_nonce')) {
        return;
    }

    $woocommerceCurrency = get_woocommerce_currency();
    $toCurrency = sanitize_text_field($_POST['currency']);

    // Convert WooCommerce currency to selected currency
    $rate = FRCC_convert_currency(1, $woocommerceCurrency, $toCurrency);

    if ($rate !== null) {
        // Store the conversion rate in a cookie
        setcookie('conversion_rate', $rate, time() + (86400 * 30), "/"); // 86400 = 1 day

        // Store the selected currency code in a cookie
        setcookie('currency_code', $toCurrency, time() + (86400 * 30), "/"); // 86400 = 1 day

        wp_send_json_success();
    } else {
        wp_send_json_error();
    }
}
add_action('wp_ajax_convert_currency', 'FRCC_convert_currency_ajax');
add_action('wp_ajax_nopriv_convert_currency', 'FRCC_convert_currency_ajax');

// Change product price based on conversion rate
function FRCC_change_product_price($price, $product) {
    // If a conversion rate cookie is set, convert the price
    if (isset($_COOKIE['conversion_rate'])) {
        return floatval($price) * floatval($_COOKIE['conversion_rate']);
    }

    return $price;
}

// Apply the filter to all types of prices
add_filter('woocommerce_product_get_price', 'FRCC_change_product_price', 10, 2);
add_filter('woocommerce_product_get_regular_price', 'FRCC_change_product_price', 10, 2);
add_filter('woocommerce_product_variation_get_regular_price', 'FRCC_change_product_price', 10, 2);
add_filter('woocommerce_product_variation_get_price', 'FRCC_change_product_price', 10, 2);

// Change currency code based on conversion rate
function FRCC_change_currency_code($currency) {
    // If a conversion rate cookie is set, change the currency code
    if (isset($_COOKIE['conversion_rate'])) {
        $currency_code = sanitize_text_field($_COOKIE['currency_code']);
        return $currency_code;
    }

    return $currency;
}
add_filter('woocommerce_currency', 'FRCC_change_currency_code', 10, 1);

function frcc_enqueue_admin_scripts($hook) {
    if ('settings_page_currency-converter-options' !== $hook) {
        return;
    }
    wp_enqueue_script('jquery');
}
add_action('admin_enqueue_scripts', 'frcc_enqueue_admin_scripts');
?>

