<?php
class Address_Autocomplete_Settings {

    public function __construct() {
        add_action('admin_menu', array($this, 'add_settings_page'));
        add_action('admin_init', array($this, 'register_settings'));
    }

    public function add_settings_page() {
        add_options_page(
            esc_html__('Address Autocomplete Settings', 'address-autocomplete-with-google'),
            esc_html__('Address Autocomplete', 'address-autocomplete-with-google'),
            'manage_options',
            'address-autocomplete',
            array($this, 'settings_page_html')
        );
    }

    public function register_settings() {
        register_setting('address_autocomplete_settings', 'address_autocomplete_api_key', 'sanitize_text_field');
        register_setting('address_autocomplete_settings', 'address_autocomplete_target_selectors', 'sanitize_text_field');
        register_setting('address_autocomplete_settings', 'address_autocomplete_place_type', 'sanitize_text_field');
        register_setting('address_autocomplete_settings', 'address_autocomplete_country', 'sanitize_text_field');
    }

    public function settings_page_html() {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('Address Autocomplete Settings', 'address-autocomplete-with-google'); ?></h1>
            <form method="post" action="options.php">
                <?php settings_fields('address_autocomplete_settings'); ?>
                <?php do_settings_sections('address_autocomplete_settings'); ?>
                <table class="form-table">
                    <!-- Google API Key -->
                    <tr>
                        <th><label for="address_autocomplete_api_key"><?php esc_html_e('Google API Key', 'address-autocomplete-with-google'); ?></label></th>
                        <td>
                            <input type="text" name="address_autocomplete_api_key" id="address_autocomplete_api_key"
                                   value="<?php echo esc_attr(get_option('address_autocomplete_api_key')); ?>" class="regular-text"/>
                            <p class="description">
                                <?php esc_html_e('Dont have api key ? Here is the way to obtain your API key:', 'address-autocomplete-with-google'); ?>
                                <ol>
                                    <li><a href="https://console.cloud.google.com/" target="_blank"><?php esc_html_e('Google Cloud Console', 'address-autocomplete-with-google'); ?></a></li>
                                    <li><?php esc_html_e('Enable the Places API and Maps JavaScript API', 'address-autocomplete-with-google'); ?></li>
                                    <li><?php esc_html_e('Generate an API key under "Credentials"', 'address-autocomplete-with-google'); ?></li>
                                    <li><?php esc_html_e('Paste your key here', 'address-autocomplete-with-google'); ?></li>
                                </ol>
                            </p>
                        </td>
                    </tr>

                    <!-- Target Input Selectors -->
                    <tr>
                        <th><label for="address_autocomplete_target_selectors"><?php esc_html_e('Target Input Selectors', 'address-autocomplete-with-google'); ?></label></th>
                        <td>
                            <textarea name="address_autocomplete_target_selectors" id="address_autocomplete_target_selectors"
                                      class="large-text code" rows="4"><?php echo esc_textarea(get_option('address_autocomplete_target_selectors', '#address-input')); ?></textarea>
                            <p class="description">
                                <?php esc_html_e('Enter comma-separated CSS selectors for the input fields where autocomplete should be applied.', 'address-autocomplete-with-google'); ?><br>
                                <strong><?php esc_html_e('Example:', 'address-autocomplete-with-google'); ?></strong>
                                <code>.address input, #wpforms-8-field_4</code>
                            </p>
                        </td>
                    </tr>

                    <!-- Place Type -->
                    <tr>
                        <th><label for="address_autocomplete_place_type"><?php esc_html_e('Place Type', 'address-autocomplete-with-google'); ?></label></th>
                        <td>
                            <select name="address_autocomplete_place_type" id="address_autocomplete_place_type">
                                <?php
                                $place_type = get_option('address_autocomplete_place_type', 'geocode');
                                $options = array(
                                    'geocode' => esc_html__('Geocode (General Location)', 'address-autocomplete-with-google'),
                                    'regions' => esc_html__('Regions (Administrative Areas)', 'address-autocomplete-with-google'),
                                    'address' => esc_html__('Address (Physical Addresses)', 'address-autocomplete-with-google'),
                                    'establishment' => esc_html__('Establishment (Businesses, Landmarks)', 'address-autocomplete-with-google'),
                                    'cities' => esc_html__('Cities (City-Level Search)', 'address-autocomplete-with-google')
                                );
                                foreach ($options as $value => $label) {
                                    echo '<option value="' . esc_attr($value) . '" ' . selected($place_type, $value, false) . '>' . esc_html($label) . '</option>';
                                }
                                ?>
                            </select>
                            <p class="description">
                                <?php esc_html_e('Choose the type of places to include in autocomplete results.', 'address-autocomplete-with-google'); ?>
                            </p>
                        </td>
                    </tr>

                    <!-- Country Restriction -->
                    <tr>
                        <th><label for="address_autocomplete_country"><?php esc_html_e('Restrict to Country', 'address-autocomplete-with-google'); ?></label></th>
                        <td>
                            <input type="text" name="address_autocomplete_country" id="address_autocomplete_country"
                                   value="<?php echo esc_attr(get_option('address_autocomplete_country', '')); ?>" class="regular-text"/>
                            <p class="description">
                                <?php esc_html_e('Enter a 2-letter country code (e.g., US for United States, AU for Australia). Leave empty for no restriction.', 'address-autocomplete-with-google'); ?><br>
                                <a href="https://en.wikipedia.org/wiki/List_of_ISO_3166_country_codes" target="_blank">
                                    <?php esc_html_e('View List of Country Codes', 'address-autocomplete-with-google'); ?>
                                </a>
                            </p>
                        </td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }

    public static function get_api_key() {
        return get_option('address_autocomplete_api_key', '');
    }

    public static function get_target_selectors() {
        return get_option('address_autocomplete_target_selectors', '#address-input');
    }

    public static function get_place_type() {
        return get_option('address_autocomplete_place_type', 'geocode');
    }

    public static function get_country_restriction() {
        return get_option('address_autocomplete_country', '');
    }
}
