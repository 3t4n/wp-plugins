<?php
/**
 * Plugin Name: Affiliate Amazon Shortcode
 * Description: Display Amazon products using a shortcode with keyword, through the Product Advertising API v5.
 * Version: 1.3
 * Author: OnoDev77
 * License: GPLv2 or later
 * Requires at least: 5.0
 * Requires PHP: 7.2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) exit; // Prevent direct access

// Enqueue plugin styles
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('affiamsh-amazon-products-style', plugins_url('amazon-products.css', __FILE__));
});

// Add the settings menu
add_action('admin_menu', function () {
    add_menu_page(
        'Affiliate Amazon Shortcode Settings',
        'Affiliate Amazon Shortcode',
        'manage_options',
        'affiamsh-amazon-api-settings',
        'affiamsh_amazon_api_settings_page',
        'dashicons-cart'
    );
});

// Get Amazon marketplaces
function affiamsh_get_amazon_marketplaces() {
    return [
        'www.amazon.it' => 'eu-west-1',
        'www.amazon.com' => 'us-east-1',
        'www.amazon.co.uk' => 'eu-west-1',
        'www.amazon.de' => 'eu-central-1',
        'www.amazon.fr' => 'eu-west-1',
        'www.amazon.es' => 'eu-west-1',
        'www.amazon.ca' => 'ca-central-1',
        'www.amazon.co.jp' => 'ap-northeast-1',
        'www.amazon.in' => 'ap-south-1',
    ];
}

// Get image sizes
function affiamsh_get_image_sizes() {
    return [
        'Medium' => 'Images.Primary.Medium',
        'Large' => 'Images.Primary.Large',
    ];
}

// Settings Page
function affiamsh_amazon_api_settings_page() {
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['affiamsh_api_settings_nonce']) &&
        wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['affiamsh_api_settings_nonce'])), 'affiamsh_save_settings')) {

        $marketplace = isset($_POST['marketplace']) ? sanitize_text_field(wp_unslash($_POST['marketplace'])) : '';
        $marketplaces = affiamsh_get_amazon_marketplaces();
        $image_sizes = affiamsh_get_image_sizes();

        $settings = [
            'access_key' => isset($_POST['access_key']) ? sanitize_text_field(wp_unslash($_POST['access_key'])) : '',
            'secret_key' => isset($_POST['secret_key']) ? sanitize_text_field(wp_unslash($_POST['secret_key'])) : '',
            'partner_tag' => isset($_POST['partner_tag']) ? sanitize_text_field(wp_unslash($_POST['partner_tag'])) : '',
            'region' => $marketplaces[$marketplace] ?? 'us-east-1',
            'marketplace' => $marketplace,
            'num_products' => isset($_POST['num_products']) ? absint(wp_unslash($_POST['num_products'])) : 3,
            'num_columns' => isset($_POST['num_columns']) ? absint(wp_unslash($_POST['num_columns'])) : 3,
            'image_size' => isset($_POST['image_size']) ? sanitize_text_field(wp_unslash($_POST['image_size'])) : 'Medium',
            'font_size' => isset($_POST['font_size']) ? affiamsh_validate_font_size(sanitize_text_field(wp_unslash($_POST['font_size']))) : '16px',
        ];

        update_option('affiamsh_plugin_settings', $settings);
        echo '<div class="updated"><p>Settings saved successfully.</p></div>';
    }

    $settings = get_option('affiamsh_plugin_settings', []);
    $marketplaces = affiamsh_get_amazon_marketplaces();
    $image_sizes = affiamsh_get_image_sizes();
    ?>
    <div class="wrap">
        <h1>Amazon API Settings</h1>
        <form method="post">
            <?php wp_nonce_field('affiamsh_save_settings', 'affiamsh_api_settings_nonce'); ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Access Key</th>
                    <td><input type="text" name="access_key" value="<?php echo esc_attr($settings['access_key'] ?? ''); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row">Secret Key</th>
                    <td><input type="text" name="secret_key" value="<?php echo esc_attr($settings['secret_key'] ?? ''); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row">Partner Tag</th>
                    <td><input type="text" name="partner_tag" value="<?php echo esc_attr($settings['partner_tag'] ?? ''); ?>" class="regular-text" placeholder="e.g., trackerid-21"></td>
                </tr>
                <tr>
                    <th scope="row">Marketplace</th>
                    <td>
                        <select name="marketplace" class="regular-text">
                            <?php foreach ($marketplaces as $marketplace => $region): ?>
                                <option value="<?php echo esc_attr($marketplace); ?>" <?php selected($settings['marketplace'] ?? '', $marketplace); ?>>
                                    <?php echo esc_html($marketplace); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Number of Products</th>
                    <td>
                        <select name="num_products" class="regular-text">
                            <?php for ($i = 1; $i <= 9; $i++): ?>
                                <option value="<?php echo esc_attr($i); ?>" <?php selected($settings['num_products'] ?? 3, $i); ?>>
                                    <?php echo esc_html($i); ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Number of Columns</th>
                    <td>
                        <select name="num_columns" class="regular-text">
                            <?php for ($i = 1; $i <= 4; $i++): ?>
                                <option value="<?php echo esc_attr($i); ?>" <?php selected($settings['num_columns'] ?? 3, $i); ?>>
                                    <?php echo esc_html($i); ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Image Size</th>
                    <td>
                        <select name="image_size" class="regular-text">
                            <?php foreach ($image_sizes as $key => $value): ?>
                                <option value="<?php echo esc_attr($key); ?>" <?php selected($settings['image_size'] ?? 'Medium', $key); ?>>
                                    <?php echo esc_html(ucfirst($key)); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Font Size</th>
                    <td>
                        <input type="text" name="font_size" value="<?php echo esc_attr($settings['font_size'] ?? '16px'); ?>" class="regular-text">
                        <p class="description">Enter font size, e.g., <code>14px</code>, <code>16px</code>, <code>18px</code></p>
                    </td>
                </tr>
                
                <tr>
    <th scope="row">Shortcode Format</th>
    <td>
        <p>Add this shortcode in your post/page <code>[affiamsh_amazon keyword="Your Keyword"]</code></p>
    </td>
</tr>
                
                
                
                <tr>
    <th scope="row">Go Premium</th>
    <td>
        <p>Unlock additional features with the Premium version of this plugin. 
        <a href="https://www.softwareapp.it/affiliate-amazon-shortcode/" target="_blank" rel="nofollow noopener">Learn more</a>.</p>
    </td>
</tr>
            </table>
            <?php submit_button('Save Settings'); ?>
        </form>
    </div>
    <?php
}

// Validate font size
function affiamsh_validate_font_size($value) {
    return preg_match('/^\d+(px|em|rem|%)$/', $value) ? $value : '16px';
}

// Shortcode function
function affiamsh_amazon_handler($atts) {
    $atts = shortcode_atts(['keyword' => 'smartphone'], $atts, 'affiamsh_amazon');
    $settings = get_option('affiamsh_plugin_settings', []);

    if (empty($settings['access_key']) || empty($settings['secret_key']) || empty($settings['partner_tag'])) {
        return '<p>Configure the Amazon API credentials in the plugin settings.</p>';
    }

    // Construct the payload
    $image_sizes = affiamsh_get_image_sizes();
    $image_size_key = $settings['image_size'] ?? 'Medium';
    $image_size = $image_sizes[$image_size_key] ?? 'Images.Primary.Medium';

    // Codice principale con impostazioni dinamiche
       
        
    $payload = "{"
    . " \"Keywords\": \"" . esc_js($atts['keyword']) . "\","
    . " \"Resources\": ["
    . "  \"$image_size\","
    . "  \"ItemInfo.ContentInfo\","
    . "  \"ItemInfo.Title\","
    . "  \"Offers.Listings.Price\""
    . " ],"
    . " \"SearchIndex\": \"All\","
    . " \"PartnerTag\": \"" . esc_js($settings['partner_tag']) . "\","
    . " \"PartnerType\": \"Associates\","
    . " \"Marketplace\": \"" . esc_js($settings['marketplace']) . "\","
    . " \"ItemCount\": " . absint($settings['num_products'])
    . "}";    

    $host = str_replace('www.', 'webservices.', $settings['marketplace']);
    $uriPath = "/paapi5/searchitems";
    $url = 'https://' . $host . $uriPath;

    // Sign the request using AwsV4
    $awsv4 = new Affiamsh_AwsV4($settings['access_key'], $settings['secret_key']);
    $awsv4->setRegionName($settings['region']);
    $awsv4->setServiceName("ProductAdvertisingAPI");
    $awsv4->setPath($uriPath);
    $awsv4->setPayload($payload);
    $awsv4->setRequestMethod("POST");
    $awsv4->addHeader('content-encoding', 'amz-1.0');
    $awsv4->addHeader('content-type', 'application/json; charset=utf-8');
    $awsv4->addHeader('host', $host);
    $awsv4->addHeader('x-amz-target', 'com.amazon.paapi5.v1.ProductAdvertisingAPIv1.SearchItems');

    $headers = $awsv4->getHeaders();

    // Perform the API request
$response = wp_remote_post($url, [
    'headers' => $headers,    // Inserisci gli header generati
    'body'    => $payload,    // Inserisci il payload JSON
    'timeout' => 20,          // Timeout opzionale
    'method'  => 'POST',      // Metodo POST
]);

    if (is_wp_error($response)) {
        return '<p>Error: ' . esc_html($response->get_error_message()) . '</p>';
    }

    $http_code = wp_remote_retrieve_response_code($response);
    if ($http_code !== 200) {
        $error_body = wp_remote_retrieve_body($response);
        return '<p>Error: Invalid response from Amazon server. HTTP Code: ' . esc_html($http_code) . '</p>'
            . '<pre>' . esc_html($error_body) . '</pre>';
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);
    
    
    if (empty($data)) {
    return '<p>Error: Unable to parse the Amazon server response.</p>';
}

    if (empty($data['SearchResult']['Items'])) {
        return '<p>No products found.</p>';
    }

    // Generate HTML
    $num_products = $settings['num_products'] ?? 3;
    $num_columns = $settings['num_columns'] ?? 3;
    $font_size = esc_attr($settings['font_size'] ?? '16px');

    $html = '<div class="affiamsh-amazon-products" style="display: grid; grid-template-columns: repeat(' . esc_attr($num_columns) . ', 1fr); gap: 20px;">';
    foreach ($data['SearchResult']['Items'] as $index => $item) {
        if ($index > $num_products) break; // Mostra solo i primi prodotti configurati
        $title = esc_html($item['ItemInfo']['Title']['DisplayValue'] ?? 'Title not available');
        $short_title = (strlen($title) > 50) ? substr($title, 0, 50) . '...' : $title;
        $image = esc_url($item['Images']['Primary'][$image_size_key]['URL'] ?? '');
        $link = esc_url($item['DetailPageURL'] ?? '#');
        $price = $item['Offers']['Listings'][0]['Price']['DisplayAmount'] ?? 'Price not available';
        $savings = $item['Offers']['Listings'][0]['Price']['Savings']['DisplayAmount'] ?? null;
        $percentage = $item['Offers']['Listings'][0]['Price']['Savings']['Percentage'] ?? null;

        $html .= '<div class="affiamsh-amazon-product">';
        $html .= '<a href="' . $link . '" target="_blank">';
        $html .= '<img src="' . $image . '" alt="' . $title . '" class="affiamsh-amazon-product-image">';
        $html .= '<div class="affiamsh-amazon-product-title" style="font-size: ' . $font_size . '; font-weight: bold; margin-top: 10px;">' . $short_title . '</div>';
        $html .= '</a>';

        if ($percentage) {
            $html .= '<p style="font-size: ' . $font_size . '; margin: 5px 0;">'
                . '<span style="color: #b12704; font-weight: bold;">-' . esc_html($percentage) . '%</span> '
                . '<span style="color: #e47911; font-weight: bold;">' . esc_html($price) . '</span>'
                . '</p>';
        } else {
            $html .= '<p style="font-size: ' . $font_size . '; color: #e47911; font-weight: bold; margin: 5px 0;">'
                . esc_html($price)
                . '</p>';
        }

        $html .= '</div>';
        
        
    }
    
    
    
    $html .= '</div>';
    
   

    return $html;
}
add_shortcode('affiamsh_amazon', 'affiamsh_amazon_handler');



/**
 * Classe AwsV4
 */
class Affiamsh_AwsV4 {
    // Classe completa come fornita da te
    private $accessKey = null;
    private $secretKey = null;
    private $path = null;
    private $regionName = null;
    private $serviceName = null;
    private $httpMethodName = null;
    private $queryParametes = array();
    private $awsHeaders = array();
    private $payload = "";

    private $HMACAlgorithm = "AWS4-HMAC-SHA256";
    private $aws4Request = "aws4_request";
    private $strSignedHeader = null;
    private $xAmzDate = null;
    private $currentDate = null;

    public function __construct($accessKey, $secretKey) {
        $this->accessKey = $accessKey;
        $this->secretKey = $secretKey;
        $this->xAmzDate = $this->getTimeStamp();
        $this->currentDate = $this->getDate();
    }

    function setPath($path) {
        $this->path = $path;
    }

    function setServiceName($serviceName) {
        $this->serviceName = $serviceName;
    }

    function setRegionName($regionName) {
        $this->regionName = $regionName;
    }

    function setPayload($payload) {
        $this->payload = $payload;
    }

    function setRequestMethod($method) {
        $this->httpMethodName = $method;
    }

    function addHeader($headerName, $headerValue) {
        $this->awsHeaders[$headerName] = $headerValue;
    }

    private function prepareCanonicalRequest() {
        $canonicalURL = "";
        $canonicalURL .= $this->httpMethodName . "\n";
        $canonicalURL .= $this->path . "\n" . "\n";
        $signedHeaders = '';
        foreach ($this->awsHeaders as $key => $value) {
            $signedHeaders .= $key . ";";
            $canonicalURL .= $key . ":" . $value . "\n";
        }
        $canonicalURL .= "\n";
        $this->strSignedHeader = substr($signedHeaders, 0, -1);
        $canonicalURL .= $this->strSignedHeader . "\n";
        $canonicalURL .= $this->generateHex($this->payload);
        return $canonicalURL;
    }

    private function prepareStringToSign($canonicalURL) {
        $stringToSign = '';
        $stringToSign .= $this->HMACAlgorithm . "\n";
        $stringToSign .= $this->xAmzDate . "\n";
        $stringToSign .= $this->currentDate . "/" . $this->regionName . "/" . $this->serviceName . "/" . $this->aws4Request . "\n";
        $stringToSign .= $this->generateHex($canonicalURL);
        return $stringToSign;
    }

    private function calculateSignature($stringToSign) {
        $signatureKey = $this->getSignatureKey($this->secretKey, $this->currentDate, $this->regionName, $this->serviceName);
        $signature = hash_hmac("sha256", $stringToSign, $signatureKey, true);
        $strHexSignature = strtolower(bin2hex($signature));
        return $strHexSignature;
    }

    public function getHeaders() {
        $this->awsHeaders['x-amz-date'] = $this->xAmzDate;
        ksort($this->awsHeaders);

        // Step 1: CREATE A CANONICAL REQUEST
        $canonicalURL = $this->prepareCanonicalRequest();

        // Step 2: CREATE THE STRING TO SIGN
        $stringToSign = $this->prepareStringToSign($canonicalURL);

        // Step 3: CALCULATE THE SIGNATURE
        $signature = $this->calculateSignature($stringToSign);

        // Step 4: CALCULATE AUTHORIZATION HEADER
        if ($signature) {
            $this->awsHeaders['Authorization'] = $this->buildAuthorizationString($signature);
            return $this->awsHeaders;
        }
    }

    private function buildAuthorizationString($strSignature) {
        return $this->HMACAlgorithm . " " . "Credential=" . $this->accessKey . "/" . $this->getDate() . "/" . $this->regionName . "/" . $this->serviceName . "/" . $this->aws4Request . "," . "SignedHeaders=" . $this->strSignedHeader . "," . "Signature=" . $strSignature;
    }

    private function generateHex($data) {
        return strtolower(bin2hex(hash("sha256", $data, true)));
    }

    private function getSignatureKey($key, $date, $regionName, $serviceName) {
        $kSecret = "AWS4" . $key;
        $kDate = hash_hmac("sha256", $date, $kSecret, true);
        $kRegion = hash_hmac("sha256", $regionName, $kDate, true);
        $kService = hash_hmac("sha256", $serviceName, $kRegion, true);
        $kSigning = hash_hmac("sha256", $this->aws4Request, $kService, true);

        return $kSigning;
    }

    private function getTimeStamp() {
        return gmdate("Ymd\THis\Z");
    }

    private function getDate() {
        return gmdate("Ymd");
    }
}


?>
