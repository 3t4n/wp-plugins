<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Add the settings page to the WordPress dashboard
function inspiredmonks_security_header_settings_page() {
    add_options_page(
        'Security Headers',                 // Page title
        'Security Headers',                 // Menu title
        'manage_options',                   // Capability
        'inspiredmonks-security-header-settings', // Menu slug
        'inspiredmonks_security_header_settings_html' // Callback function to display the settings page
    );
}
add_action('admin_menu', 'inspiredmonks_security_header_settings_page');

// Render the settings page HTML
// Render the settings page HTML
function inspiredmonks_security_header_settings_html() {
    // Retrieve the options saved in the database
    $options = get_option('inspiredmonks_security_header_options');
    ?>
    <div id="inspiredmonks-admin-wrapper">
        <h1>Manage Security Headers</h1>
        <form method="post" action="options.php">
            <?php
            // Output the settings fields
            settings_fields('inspiredmonks_security_header_options_group');
            ?>
            
<!-- Progress Bar Section -->
<!-- Progress Bar Section -->
<div id="inspiredmonks-progress-bar">
    <span id="progress-label">Headers Enabled</span>
    <div id="progress-container">
        <div id="progress-fill" style="width: 50%;"></div> <!-- This width will be dynamically updated -->
    </div>
</div>



            <div class="inspiredmonks-settings-section">
                <div class="inspiredmonks-settings-fields">
                    <?php
                    // Define headers and tooltips for the UI
                                        // Define headers with detailed tooltips
  $headers = [
                        'hsts_header' => [
                            'Enable HSTS Header', 
                            'Forces browsers to use HTTPS exclusively, ensuring secure data transmission. Recommended for all secure websites.', 
                            'dashicons-lock',
                            'security',
                            'https://inspiredmonks.com/http-strict-transport-security/'
                        ],
                        'x_frame_header' => [
                            'Enable X-Frame-Options', 
                            'Prevents your site from being embedded in iframes, protecting against clickjacking attacks.', 
                            'dashicons-visibility', 
                            'security', 
                            'https://inspiredmonks.com/x-frame-options/'
                        ],
                        'x_content_type_header' => [
                            'Enable X-Content-Type-Options', 
                            'Disables MIME-sniffing to prevent browsers from interpreting files as a different MIME type, enhancing security.', 
                            'dashicons-media-document ',
                            'security',
                            'https://inspiredmonks.com/x-content-type-options/'
                        ],
                        'referrer_policy_header' => [
                            'Enable Referrer-Policy', 
                            'Controls how much referrer information is sent with requests, protecting user privacy.', 
                            'dashicons-admin-links ',
                            ' privacy',
                            'https://inspiredmonks.com/referrer-policy/'
                        ],
                        'content_security_policy_header' => [
                            'Enable Content-Security-Policy', 
                            'Restricts allowed sources of content to mitigate XSS attacks and other vulnerabilities.', 
                            'dashicons-shield-alt ',
                            ' privacy',
                            'https://inspiredmonks.com/content-security-policy/'
                        ],
                        'x_xss_protection_header' => [
                            'Enable X-XSS-Protection', 
                            'Provides basic protection against XSS attacks (legacy, replaced by Content-Security-Policy).', 
                            'dashicons-no-alt ',
                            ' security',
                            'https://inspiredmonks.com/x-xss-protection/'
                        ],
                        'permissions_policy_header' => [
                            'Enable Permissions-Policy', 
                            'Restricts access to sensitive browser features like geolocation, camera, and microphone.', 
                            'dashicons-location-alt ',
                            ' privacy',
                            'https://inspiredmonks.com/permissions-policy/'
                        ],
                        'x_permitted_cross_domain_header' => [
                            'Enable X-Permitted-Cross-Domain-Policies', 
                            'Controls how your site handles cross-domain data sharing.', 
                            'dashicons-networking ',
                            ' cross-origin',
                            'https://inspiredmonks.com/x-permitted-cross-domain-policies/'
                        ],
                        'expect_ct_header' => [
                            'Enable Expect-CT', 
                            'Ensures Certificate Transparency to detect and prevent the use of misissued certificates.', 
                            'dashicons-admin-network ',
                            ' security',
                            'https://inspiredmonks.com/expect-ct/'
                        ],
                        'feature_policy_header' => [
                            'Enable Feature-Policy', 
                            'Controls the usage of browser features, though deprecated in favor of Permissions-Policy.', 
                            'dashicons-admin-tools ',
                            ' privacy',
                            'https://inspiredmonks.com/feature-policy/'
                        ],
                        'cross_origin_opener_policy_header' => [
                            'Enable Cross-Origin-Opener-Policy', 
                            'Protects against cross-origin attacks by isolating browsing contexts.', 
                            'dashicons-editor-unlink ',
                            ' cross-origin',
                            'https://inspiredmonks.com/cross-origin-opener-policy/'
                        ],
                        'cross_origin_resource_policy_header' => [
                            'Enable Cross-Origin-Resource-Policy', 
                            'Restricts sharing of resources across different origins.', 
                            'dashicons-admin-site',
                            'cross-origin',
                            'https://inspiredmonks.com/cross-origin-resource-policy/'
                        ]
                    ];
// Loop through each header to render the UI
foreach ($headers as $header_key => $header_details) {
    $is_active = !empty($options[$header_key]) ? 'active' : '';
    ?>
    <div class="inspiredmonks-clickable-box <?php echo esc_attr($header_details[3]); ?> <?php echo esc_attr($is_active); ?>" 
         data-name="<?php echo esc_attr($header_key); ?>" 
         data-tooltip="<?php echo esc_attr($header_details[1]); ?>">
        <span class="inspiredmonks-icon dashicons <?php echo esc_attr($header_details[2]); ?>"></span>
        <span class="title-header-im"><?php echo esc_html($header_details[0]); ?></span>
        <a href="<?php echo esc_url($header_details[4]); ?>" target="_blank" class="tooltip-learn-more">Learn More</a>
    </div>
    <input type="hidden" name="inspiredmonks_security_header_options[<?php echo esc_attr($header_key); ?>]" 
           id="<?php echo esc_attr($header_key); ?>" 
           value="<?php echo !empty($options[$header_key]) ? '1' : '0'; ?>">
    <?php
}

                    ?>


                </div>
            </div>
            <!-- Category Boxes Section -->
<!-- Category Boxes Section -->
<div id="category-summary">
    <h3>Activated Headers</h3>
    <div class="category-boxes">
        <!-- Security Category -->
        <div class="category-box security">
            <span class="category-icon dashicons dashicons-lock"></span> <!-- Icon -->
            <span class="category-name">Security</span>
            <span class="category-count" id="security-count">0</span>
        </div>
        <!-- Privacy Category -->
        <div class="category-box privacy">
            <span class="category-icon dashicons dashicons-shield-alt"></span> <!-- Icon -->
            <span class="category-name">Privacy</span>
            <span class="category-count" id="privacy-count">0</span>
        </div>
        <!-- Cross-Origin Category -->
        <div class="category-box cross-origin">
            <span class="category-icon dashicons dashicons-networking"></span> <!-- Icon -->
            <span class="category-name">Cross-Origin</span>
            <span class="category-count" id="cross-origin-count">0</span>
        </div>
    </div>
</div>


            <button type="submit" class="inspiredmonks-submit-button">Save Settings</button>
        </form>
    </div>
    <?php
}


function inspiredmonks_security_header_settings_init() {
    // Register the setting
    register_setting(
        'inspiredmonks_security_header_options_group', // Option group
        'inspiredmonks_security_header_options',       // Option name
        'inspiredmonks_security_sanitize_options'      // Sanitize callback
    );

    // Add settings section
    add_settings_section(
        'inspiredmonks_security_header_section',       // ID
        'Security Header Options',                    // Title
        null,                                          // Callback (optional)
        'inspiredmonks-security-header-settings'       // Page
    );

    // Define headers and their field functions
    $headers = [
        'hsts_header' => ['Enable HSTS Header', 'inspiredmonks_security_hsts_field_html'],
        'x_frame_header' => ['Enable X-Frame-Options', 'inspiredmonks_security_x_frame_field_html'],
        'x_content_type_header' => ['Enable X-Content-Type-Options', 'inspiredmonks_security_x_content_type_field_html'],
        'referrer_policy_header' => ['Enable Referrer-Policy', 'inspiredmonks_security_referrer_policy_field_html'],
        'content_security_policy_header' => ['Enable Content-Security-Policy', 'inspiredmonks_security_content_security_policy_field_html'],
        'x_xss_protection_header' => ['Enable X-XSS-Protection', 'inspiredmonks_security_x_xss_protection_field_html'],
        'permissions_policy_header' => ['Enable Permissions-Policy', 'inspiredmonks_security_permissions_policy_field_html'],
        'x_permitted_cross_domain_header' => ['Enable X-Permitted-Cross-Domain-Policies', 'inspiredmonks_security_x_permitted_cross_domain_field_html'],
        'expect_ct_header' => ['Enable Expect-CT', 'inspiredmonks_security_expect_ct_field_html'],
        'feature_policy_header' => ['Enable Feature-Policy', 'inspiredmonks_security_feature_policy_field_html'],
        'cross_origin_opener_policy_header' => ['Enable Cross-Origin-Opener-Policy', 'inspiredmonks_security_coop_field_html'],
        'cross_origin_resource_policy_header' => ['Enable Cross-Origin-Resource-Policy', 'inspiredmonks_security_corp_field_html'],
    ];

    // Add settings fields for each header
    foreach ($headers as $id => $header) {
        add_settings_field(
            "inspiredmonks_$id",                      // Field ID
            $header[0],                               // Title
            $header[1],                               // Callback function
            'inspiredmonks-security-header-settings', // Page
            'inspiredmonks_security_header_section'   // Section
        );
    }
}
add_action('admin_init', 'inspiredmonks_security_header_settings_init');

// Sanitization callback for security header options
function inspiredmonks_security_sanitize_options($input) {
    $sanitized_input = array();

    $headers = [
        'hsts_header', 
        'x_frame_header', 
        'x_content_type_header', 
        'referrer_policy_header', 
        'content_security_policy_header', 
        'x_xss_protection_header', 
        'permissions_policy_header', 
        'x_permitted_cross_domain_header', 
        'expect_ct_header', 
        'feature_policy_header', 
        'cross_origin_opener_policy_header',
        'cross_origin_resource_policy_header',
    ];

    foreach ($headers as $header) {
        $sanitized_input[$header] = isset($input[$header]) ? absint($input[$header]) : 0;
    }

    return $sanitized_input;
}


// HTML output for each header field

function inspiredmonks_security_hsts_field_html() {
    $options = get_option('inspiredmonks_security_header_options');
    ?>
    <input type="checkbox" name="inspiredmonks_security_header_options[hsts_header]" <?php checked(isset($options['hsts_header']) ? $options['hsts_header'] : '', 1); ?> value="1">
    <label for="hsts_header">Enable HTTP Strict Transport Security (HSTS)</label>
    <?php
}

function inspiredmonks_security_x_frame_field_html() {
    $options = get_option('inspiredmonks_security_header_options');
    ?>
    <input type="checkbox" name="inspiredmonks_security_header_options[x_frame_header]" <?php checked(isset($options['x_frame_header']) ? $options['x_frame_header'] : '', 1); ?> value="1">
    <label for="x_frame_header">Enable X-Frame-Options (Prevent Clickjacking)</label>
    <?php
}

function inspiredmonks_security_x_content_type_field_html() {
    $options = get_option('inspiredmonks_security_header_options');
    ?>
    <input type="checkbox" name="inspiredmonks_security_header_options[x_content_type_header]" <?php checked(isset($options['x_content_type_header']) ? $options['x_content_type_header'] : '', 1); ?> value="1">
    <label for="x_content_type_header">Enable X-Content-Type-Options (Prevent MIME-Sniffing)</label>
    <?php
}

function inspiredmonks_security_referrer_policy_field_html() {
    $options = get_option('inspiredmonks_security_header_options');
    ?>
    <input type="checkbox" name="inspiredmonks_security_header_options[referrer_policy_header]" <?php checked(isset($options['referrer_policy_header']) ? $options['referrer_policy_header'] : '', 1); ?> value="1">
    <label for="referrer_policy_header">Enable Referrer-Policy</label>
    <?php
}

function inspiredmonks_security_content_security_policy_field_html() {
    $options = get_option('inspiredmonks_security_header_options');
    ?>
    <input type="checkbox" name="inspiredmonks_security_header_options[content_security_policy_header]" <?php checked(isset($options['content_security_policy_header']) ? $options['content_security_policy_header'] : '', 1); ?> value="1">
    <label for="content_security_policy_header">Enable Content-Security-Policy</label>
    <?php
}

function inspiredmonks_security_x_xss_protection_field_html() {
    $options = get_option('inspiredmonks_security_header_options');
    ?>
    <input type="checkbox" name="inspiredmonks_security_header_options[x_xss_protection_header]" <?php checked(isset($options['x_xss_protection_header']) ? $options['x_xss_protection_header'] : '', 1); ?> value="1">
    <label for="x_xss_protection_header">Enable X-XSS-Protection (Prevent XSS Attacks)</label>
    <?php
}

function inspiredmonks_security_permissions_policy_field_html() {
    $options = get_option('inspiredmonks_security_header_options');
    ?>
    <input type="checkbox" name="inspiredmonks_security_header_options[permissions_policy_header]" <?php checked(isset($options['permissions_policy_header']) ? $options['permissions_policy_header'] : '', 1); ?> value="1">
    <label for="permissions_policy_header">Enable Permissions-Policy (Control Browser Features)</label>
    <?php
}

function inspiredmonks_security_x_permitted_cross_domain_field_html() {
    $options = get_option('inspiredmonks_security_header_options');
    ?>
    <input type="checkbox" name="inspiredmonks_security_header_options[x_permitted_cross_domain_header]" <?php checked(isset($options['x_permitted_cross_domain_header']) ? $options['x_permitted_cross_domain_header'] : '', 1); ?> value="1">
    <label for="x_permitted_cross_domain_header">Enable X-Permitted-Cross-Domain-Policies (Restrict Cross-Domain Content)</label>
    <?php
}

function inspiredmonks_security_expect_ct_field_html() {
    $options = get_option('inspiredmonks_security_header_options');
    ?>
    <input type="checkbox" name="inspiredmonks_security_header_options[expect_ct_header]" <?php checked(isset($options['expect_ct_header']) ? $options['expect_ct_header'] : '', 1); ?> value="1">
    <label for="expect_ct_header">Enable Expect-CT (Certificate Transparency)</label>
    <?php
}

function inspiredmonks_security_feature_policy_field_html() {
    $options = get_option('inspiredmonks_security_header_options');
    ?>
    <input type="checkbox" name="inspiredmonks_security_header_options[feature_policy_header]" <?php checked(isset($options['feature_policy_header']) ? $options['feature_policy_header'] : '', 1); ?> value="1">
    <label for="feature_policy_header">Enable Feature-Policy (Control Resource Loading)</label>
    <?php
}

function inspiredmonks_security_coop_field_html() {
    $options = get_option('inspiredmonks_security_header_options');
    ?>
    <input type="checkbox" name="inspiredmonks_security_header_options[cross_origin_opener_policy_header]" <?php checked(isset($options['cross_origin_opener_policy_header']), 1); ?> value="1">
    <label for="cross_origin_opener_policy_header">Enable Cross-Origin-Opener-Policy (Isolate Browsing Contexts)</label>
    <?php
}

function inspiredmonks_security_corp_field_html() {
    $options = get_option('inspiredmonks_security_header_options');
    ?>
    <input type="checkbox" name="inspiredmonks_security_header_options[cross_origin_resource_policy_header]" <?php checked(isset($options['cross_origin_resource_policy_header']), 1); ?> value="1">
    <label for="cross_origin_resource_policy_header">Enable Cross-Origin-Resource-Policy (Restrict Resource Sharing)</label>
    <?php
}