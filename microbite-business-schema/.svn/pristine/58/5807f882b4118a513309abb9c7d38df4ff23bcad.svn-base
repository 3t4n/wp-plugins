<?php
/**
 * Microbite Business Schema Functions
 *
 * @version 1.02
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// 2024-03-21 - updated to add more business types
// cool spreadsheet for https://docs.google.com/spreadsheets/d/1Ed6RmI01rx4UdW40ciWgz2oS_Kx37_-sPi7sba_jC3w/edit#gid=0
// testing - https://search.google.com/test/rich-results
// More schema types can be found here https://microdatagenerator.org/localbusiness-microdata-generator/
// 


require_once(plugin_dir_path(__FILE__) . 'countries.php');

require_once(plugin_dir_path(__FILE__) . 'local-business-schema.php');


require_once(plugin_dir_path(__FILE__) . 'help-pricing-range.php');
require_once(plugin_dir_path(__FILE__) . 'help-address.php');
require_once(plugin_dir_path(__FILE__) . 'help-instructions.php');



function mbbsc_admin_enqueue_styles() {
    wp_enqueue_style('mbbsc-schema-admin-styles', plugin_dir_url(__FILE__) . 'css/mbbsc-schema-styles.css', array(), '6.5.3', 'all'); // need to increment this value to update styles otherwise will use old stylesheet
}
add_action('admin_enqueue_scripts', 'mbbsc_admin_enqueue_styles');



// Add a menu item to the admin menu
function mbbsc_plugin_menu() {
   add_menu_page(
        'Microbite Business Schema', // Page title
        'Microbite Business Schema', // Menu title
        'manage_options', // Capability required
        'mbbsc-settings', // Menu slug
        'mbbsc_settings_page', // Callback function
        'dashicons-media-document' // Icon URL
    );
    
    // Add a submenu item for the plugin settings
    add_submenu_page(
        'mbbsc-settings', // Parent menu slug
        'Settings', // Page title
        'Settings', // Menu title
        'manage_options', // Capability required
        'mbbsc-settings', // Menu slug, same as the parent to replace the default submenu item created by WordPress
        'mbbsc_settings_page' // Callback function, same as the parent menu to display the settings page
    
    );
	
	    // Add a submenu item for the pricing explanation page
    add_submenu_page(
        'mbbsc-settings', // Parent menu slug
        'Instructions', // Page title
        'Instructions', // Menu title
        'manage_options', // Capability required
        'mbbsc-instuctions', // Menu slug
        'mbbsc_instuctions_page' // Callback function
    );
	
    // Add a submenu item for the address explanation page
    add_submenu_page(
        'mbbsc-settings', // Parent menu slug
        'Address Explanation', // Page title
        'Address Explanation', // Menu title
        'manage_options', // Capability required
        'mbbsc-address-explanation', // Menu slug
        'mbbsc_address_explanation_page' // Callback function
    );	
	
    // Add a submenu item for the pricing explanation page
    add_submenu_page(
        'mbbsc-settings', // Parent menu slug
        'Price Range Explanation', // Page title
        'Price Range Explanation', // Menu title
        'manage_options', // Capability required
        'mbbsc-pricing-explanation', // Menu slug
        'mbbsc_pricing_explanation_page' // Callback function
    );	



    
}


add_action('admin_menu', 'mbbsc_plugin_menu');

// Callback function for the settings page

function mbbsc_settings_page() {
    ?>
    <div class="wrap">
        <h1>Business Schema Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('mbbsc_settings');
            do_settings_sections('mbbsc_settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}


/*
// Callback function for the settings page
function mbbsc_settings_page() {
    ?>
    <div class="wrap">
        <h1>Business Schema Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('mbbsc_settings');
            //do_settings_sections('mbbsc_settings');
            // Output the address div here
            do_settings_fields('mbbsc_settings', 'mbbsc_main_section');
           // echo '<div class="business-schema-address-group">';
            do_settings_fields('mbbsc_settings', 'mbbsc_address_section');
           // echo '</div>';
            do_settings_fields('mbbsc_settings', 'mbbsc_contact_section');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
*/


/*
// Register settings and fields
function mbbsc_register_settings() {

        register_setting('mbbsc_settings', 'mbbsc_options', 'mbbsc_validate_options');



    // General Business Information Section
    add_settings_section('mbbsc_main_section', 'Business Information', 'mbbsc_section_text', 'mbbsc_settings');
    // Add fields to this section...
    add_settings_field('mbbsc_type', 'Business Type', 'mbbsc_type_callback', 'mbbsc_settings', 'mbbsc_main_section');
    add_settings_field('mbbsc_name', 'Business Name', 'mbbsc_name_callback', 'mbbsc_settings', 'mbbsc_main_section');
    add_settings_field('mbbsc_description', 'Business Description', 'mbbsc_description_callback', 'mbbsc_settings', 'mbbsc_main_section');
    add_settings_field('mbbsc_url', 'Website URL', 'mbbsc_url_callback', 'mbbsc_settings', 'mbbsc_main_section');
    add_settings_field('mbbsc_telephone', 'Telephone', 'mbbsc_telephone_callback', 'mbbsc_settings', 'mbbsc_main_section');

    // Address Information Section
    add_settings_section('mbbsc_address_section', 'Address Information', 'mbbsc_section_text', 'mbbsc_settings');
    // Add address fields to this section...
    add_settings_field('mbbsc_address', 'Address', 'mbbsc_address_callback', 'mbbsc_settings', 'mbbsc_address_section');
    add_settings_field('mbbsc_address_locality', 'Address Locality', 'mbbsc_address_locality_callback', 'mbbsc_settings', 'mbbsc_address_section');
    add_settings_field('mbbsc_address_region', 'Address Region', 'mbbsc_address_region_callback', 'mbbsc_settings', 'mbbsc_address_section');
    add_settings_field('mbbsc_address_postcode', 'Postal Code', 'mbbsc_address_postcode_callback', 'mbbsc_settings', 'mbbsc_address_section');
    add_settings_field('mbbsc_address_country', 'Address Country', 'mbbsc_address_country_callback', 'mbbsc_settings', 'mbbsc_address_section');
	

    // Contact Information Section
    add_settings_section('mbbsc_contact_section', 'Contact Information', 'mbbsc_section_text', 'mbbsc_settings');
    // Add contact fields to this section...
    add_settings_field('mbbsc_opening_hours', 'Opening Hours', 'mbbsc_opening_hours_callback', 'mbbsc_settings', 'mbbsc_contact_section');
    add_settings_field('mbbsc_price_range', 'Price Range', 'mbbsc_price_range_callback', 'mbbsc_settings', 'mbbsc_contact_section');
    add_settings_field('mbbsc_logo', 'Logo', 'mbbsc_logo_callback', 'mbbsc_settings', 'mbbsc_contact_section');
    add_settings_field('mbbsc_image', 'Image', 'mbbsc_image_callback', 'mbbsc_settings', 'mbbsc_contact_section');	
    add_settings_field('mbbsc_facebook', 'Facebook Profile URL', 'mbbsc_acebook_callback', 'mbbsc_settings', 'mbbsc_contact_section');
    add_settings_field('mbbsc_twitter', 'X / Twitter Profile URL', 'mbbsc_twitter_callback', 'mbbsc_settings', 'mbbsc_contact_section');
    add_settings_field('mbbsc_linkedin', 'LinkedIn Profile URL', 'mbbsc_linkedin_callback', 'mbbsc_settings', 'mbbsc_contact_section');

}

*/
// Register settings and fields
function mbbsc_register_settings() {
    register_setting('mbbsc_settings', 'mbbsc_options', 'mbbsc_validate_options');

    add_settings_section('mbbsc_main_section', 'Business Information', 'mbbsc_section_text', 'mbbsc_settings');

    add_settings_field('mbbsc_type', 'Business Type', 'mbbsc_type_callback', 'mbbsc_settings', 'mbbsc_main_section');
    add_settings_field('mbbsc_name', 'Business Name', 'mbbsc_name_callback', 'mbbsc_settings', 'mbbsc_main_section');
    add_settings_field('mbbsc_description', 'Business Description', 'mbbsc_description_callback', 'mbbsc_settings', 'mbbsc_main_section');
    add_settings_field('mbbsc_url', 'Website URL', 'mbbsc_url_callback', 'mbbsc_settings', 'mbbsc_main_section');
    add_settings_field('mbbsc_telephone', 'Telephone', 'mbbsc_telephone_callback', 'mbbsc_settings', 'mbbsc_main_section');
	

	
    add_settings_field('mbbsc_address', 'Address', 'mbbsc_address_callback', 'mbbsc_settings', 'mbbsc_main_section');
    add_settings_field('mbbsc_address_locality', 'Address Locality', 'mbbsc_address_locality_callback', 'mbbsc_settings', 'mbbsc_main_section');
    add_settings_field('mbbsc_address_region', 'Address Region', 'mbbsc_address_region_callback', 'mbbsc_settings', 'mbbsc_main_section');
    add_settings_field('mbbsc_address_postcode', 'Postal Code', 'mbbsc_address_postcode_callback', 'mbbsc_settings', 'mbbsc_main_section');
    add_settings_field('mbbsc_address_country', 'Address Country', 'mbbsc_address_country_callback', 'mbbsc_settings', 'mbbsc_main_section');
	



	

	
	
	
	
    add_settings_field('mbbsc_opening_hours', 'Opening Hours', 'mbbsc_opening_hours_callback', 'mbbsc_settings', 'mbbsc_main_section');
    add_settings_field('mbbsc_price_range', 'Price Range', 'mbbsc_price_range_callback', 'mbbsc_settings', 'mbbsc_main_section');
    add_settings_field('mbbsc_logo', 'Logo', 'mbbsc_logo_callback', 'mbbsc_settings', 'mbbsc_main_section');
    add_settings_field('mbbsc_image', 'Image', 'mbbsc_image_callback', 'mbbsc_settings', 'mbbsc_main_section');	
add_settings_field('mbbsc_facebook', 'Facebook Profile URL', 'mbbsc_facebook_callback', 'mbbsc_settings', 'mbbsc_main_section');
add_settings_field('mbbsc_instagram', 'Instagram Profile URL', 'mbbsc_instagram_callback', 'mbbsc_settings', 'mbbsc_main_section');
add_settings_field('mbbsc_twitter', 'X / Twitter Profile URL', 'mbbsc_twitter_callback', 'mbbsc_settings', 'mbbsc_main_section');
add_settings_field('mbbsc_linkedin', 'LinkedIn Profile URL', 'mbbsc_linkedin_callback', 'mbbsc_settings', 'mbbsc_main_section');	
	
	
}

add_action('admin_init', 'mbbsc_register_settings');

// Section text callback
function mbbsc_section_text() {
    echo '<p>Enter your business information below:</p>';
}

function mbbsc_name_callback() {
    $options = get_option('mbbsc_options');
    // If the name is not set in the options, use the site's title as the default value.
    $name = !empty($options['name']) ? $options['name'] : get_bloginfo('name');
    echo '<input type="text" class="mbbsc_wide-field" id="mbbsc_name" name="mbbsc_options[name]" value="' . esc_attr($name) . '" />';
}

function mbbsc_description_callback() {
    $options = get_option('mbbsc_options');
    // Explanation about the description length
    $descriptionLengthExplanation = "Please keep the description concise, ideally under 200-300 characters.";

    $mbbsc_description = !empty( $options ) && isset( $options['description'] ) ? esc_textarea($options['description']) : '';

    // Textarea input field for the description
    echo '<textarea id="mbbsc_description" class="mbbsc_wide-field" name="mbbsc_options[description]" rows="5">' . $mbbsc_description . '</textarea>';

    // Displaying the explanation about the description length
    echo '<p style="font-size: 0.9em; color: #666;">' . esc_html($descriptionLengthExplanation) . '</p>';
}

function mbbsc_url_callback() {
    $options = get_option('mbbsc_options');
    // If the URL is not set in the options, use the site's homepage URL as the default value.
    $url = !empty($options['url']) ? $options['url'] : get_home_url();
    echo '<input type="url" id="mbbsc_url" class="mbbsc_wide-field" name="mbbsc_options[url]" value="' . esc_url($url) . '" />';
}


function mbbsc_telephone_callback() {
    $options = get_option('mbbsc_options');
    $telephone_value = isset($options['telephone']) ? esc_attr($options['telephone']) : '';
    ?>
    <input type="tel" id="mbbsc_telephone" class="mbbsc_wide-field" name="mbbsc_options[telephone]" value="<?php echo esc_attr( $telephone_value ); ?>" placeholder="Enter telephone number" aria-describedby="business-schema-telephone-desc" />
    <p id="business-schema-telephone-desc" class="description">Enter your telephone number, including the country code. Example: +1 555 123 4567</p>
    <?php
}




function mbbsc_opening_hours_callback() {
    $options = get_option('mbbsc_options');
    $opening_hours = esc_attr($options['opening_hours'] ?? '');
    echo '<input type="text" id="mbbsc_opening_hours" class="mbbsc_wide-field" name="mbbsc_options[opening_hours]" value="' . esc_attr( $opening_hours ) . '" />';
    echo '<p>Example format: Mo,Tu,We,Thu,Fr,Sa,Su 08:00-17:00; Tu,Th 10:00-16:00; Sa 12:00-15:00; Su 10:00-14:00 <br> Use a semicolon to separate times for different days.</p>';
}


// Function to display the price range field


function mbbsc_price_range_callback() {
    $options = get_option('mbbsc_options');

    $mbbsc_price_range = !empty( $options ) && isset( $options['price_range'] ) ? esc_attr($options['price_range']) : '';

    ?>
    <input type="text" id="mbbsc_price_range" class="mbbsc_wide-field" name="mbbsc_options[price_range]" value="<?php echo $mbbsc_price_range; ?>" placeholder="Enter price range ($, $$, $$$ or numerical values)" aria-describedby="business-schema-price-range-desc" />
    <p id="business-schema-price-range-desc" class="description">Enter the price range ($, $$, $$$ or numerical values, e.g., $10 - $20). 
        <a href="<?php echo esc_attr( admin_url('admin.php?page=mbbsc-pricing-explanation') ); ?>" onclick="showPricingExplanation(); return false;">What do the price ranges $, $$, $$$ mean?</a>
    </p>
    <?php
}





// Add settings field callback function for Facebook URL
function mbbsc_facebook_callback() {
    $options = get_option('mbbsc_options');

    $mbbsc_facebook = !empty( $options ) && isset( $options['facebook'] ) ? esc_url($options['facebook']) : '';

    echo '<input type="url" id="mbbsc_facebook" class="mbbsc_wide-field" name="mbbsc_options[facebook]" value="' . $mbbsc_facebook . '" />';
}

// Add settings field callback function for Instagram URL
function mbbsc_instagram_callback() {
    $options = get_option('mbbsc_options');

    $mbbsc_instagram = !empty( $options ) && isset( $options['instagram'] ) ? esc_url($options['instagram']) : '';

    echo '<input type="url" id="mbbsc_instagram" class="mbbsc_wide-field" name="mbbsc_options[instagram]" value="' . $mbbsc_instagram . '" />';
}

function mbbsc_twitter_callback() {
    $options = get_option('mbbsc_options');

    $mbbsc_twitter = !empty( $options ) && isset( $options['twitter'] ) ? esc_url($options['twitter']) : '';

    echo '<input type="url" id="mbbsc_twitter" class="mbbsc_wide-field" name="mbbsc_options[twitter]" value="' . $mbbsc_twitter . '" />';
}

function mbbsc_linkedin_callback() {
    $options = get_option('mbbsc_options');

    $mbbsc_linkedin = !empty( $options ) && isset( $options['linkedin'] ) ? esc_url($options['linkedin']) : '';

    echo '<input type="url" id="mbbsc_linkedin" class="mbbsc_wide-field" name="mbbsc_options[linkedin]" value="' . $mbbsc_linkedin . '" />';
}


function mbbsc_logo_callback() {
    $options = get_option('mbbsc_options');
    $image_id = isset($options['logo']) ? $options['logo'] : '';
    $image_url = wp_get_attachment_url($image_id);
    
    echo '<input type="hidden" id="mbbsc_logo"  name="mbbsc_options[logo]" value="' . esc_attr($image_id) . '" />';
    
    echo '<div id="mbbsc_logo_preview">';
    if ($image_url) {
        echo '<img src="' . esc_url($image_url) . '" alt="Logo Preview" style="max-width: 200px; height: auto;" /><br>';
    }
    echo '</div>';
    
    echo '<input type="button" id="upload_logo_button" class="button" value="Upload/Change Logo" />';
    
    // Example of file types commonly used for logos
    echo '<p style="font-size: 0.9em; color: #666;">Acceptable file types: JPEG, PNG, SVG</p>';
    
    ?>
    <script>
        jQuery(document).ready(function($){
            var mediaUploader;
            $('#upload_logo_button').click(function(e) {
                e.preventDefault();
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }
                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Choose Logo',
                    button: {
                        text: 'Choose Logo'
                    },
                    multiple: false
                });
                mediaUploader.on('select', function() {
                    attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#mbbsc_logo').val(attachment.id);
                    $('#mbbsc_logo_preview').html('<img src="' + attachment.url + '" alt="Logo Preview" style="max-width: 200px; height: auto;" /><br>');
                });
                mediaUploader.open();
            });
        });
    </script>
    <?php
}


function mbbsc_image_callback() {
    $options = get_option('mbbsc_options');
    $image_id = isset($options['image']) ? $options['image'] : '';
    $image_url = wp_get_attachment_url($image_id);
    
    echo '<input type="hidden" id="mbbsc_image" name="mbbsc_options[image]" value="' . esc_attr($image_id) . '" />';
    
    echo '<div id="mbbsc_image_preview">';
    if ($image_url) {
        echo '<img src="' . esc_url($image_url) . '" alt="Image Preview" style="max-width: 200px; height: auto;" /><br>';
    }
    echo '</div>';
    
    echo '<input type="button" id="upload_image_button" class="button" value="Upload/Change Image" />';
    
    ?>
    <script>
        jQuery(document).ready(function($){
            var mediaUploader;
            $('#upload_image_button').click(function(e) {
                e.preventDefault();
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }
                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Choose Image',
                    button: {
                        text: 'Choose Image'
                    },
                    multiple: false
                });
                mediaUploader.on('select', function() {
                    attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#mbbsc_image').val(attachment.id);
                    $('#mbbsc_image_preview').html('<img src="' + attachment.url + '" alt="Image Preview" style="max-width: 200px; height: auto;" /><br>');
                });
                mediaUploader.open();
            });
        });
    </script>
    <?php
}


// Validation callback
function mbbsc_validate_options($input) {
    // Perform any validation here
    return $input;
}

// Add business schema markup




function mbbsc_add_business_schema_markup() {
    // Define an array of page slugs where the markup should be added
    $allowed_pages = array('home', 'contact', 'about');
    $typePage = "";

    // Check if the current page is in the allowed pages array
    if (is_page($allowed_pages) || (is_front_page() && !is_home())) {
        $options = get_option('mbbsc_options');

        // Check if the current page is the 'about' page
        if (is_page('about')) {
            // Include '@type' only for the 'about' page
            $typePage = 'AboutPage';
        } elseif (is_page('contact')) {
            // Include '@type' as 'ContactPage' for the 'contact' page
            $typePage = 'ContactPage';
        }
        
        $current_page_url = get_permalink();
        
        // Common schema properties
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => $typePage, // Ensure proper assignment of $typePage
            'name' => $options['name'],
            'url' => $current_page_url,
            'mainEntity' => array(
                '@type' => $options['type'],
                'name' => $options['name'],
                'description' => $options['description'],
                'telephone' => $options['telephone'], // Include telephone field
                'address' => array(
                    '@type' => 'PostalAddress',
                    'streetAddress' => $options['address'],
                    'addressLocality' => $options['address_locality'],
                    'addressCountry' => $options['address_country'],
                    'postalCode' => $options['address_postcode'],
                    'addressRegion' => $options['address_region'],
                ),
                'openingHours' => $options['opening_hours'],
                'priceRange' => $options['price_range'],
                'logo' => wp_get_attachment_url($options['logo']),
                'image' => wp_get_attachment_url($options['image']),
                'sameAs' => array(
                    $options['facebook'], // Include Facebook link
					$options['instagram'], // Include Instagram link
                    $options['twitter'], // Include Twitter link
                    $options['linkedin'] // Include LinkedIn link
                )
            ),
        );

        // Loop through each schema item and check if it's empty or blank
        foreach ($schema['mainEntity'] as $key => $value) {
            // Omit empty or blank schema items
            if (empty($value)) {
                unset($schema['mainEntity'][$key]);
            }
        }

        // Add logo if it's not empty or blank
        if (!empty($options['logo']) && wp_get_attachment_url($options['logo'])) {
            $schema['mainEntity']['logo'] = wp_get_attachment_url($options['logo']);
        }

        // Add image if it's not empty or blank
        if (!empty($options['image']) && wp_get_attachment_url($options['image'])) {
            $schema['mainEntity']['image'] = wp_get_attachment_url($options['image']);
        }

        $schemaMain = array(
            '@context' => 'https://schema.org',
            '@type' => $options['type'],
            'name' => $options['name'],
            'description' => $options['description'],
            'url' => $current_page_url,
            'telephone' => $options['telephone'], // Include telephone field
            'address' => array(
                '@type' => 'PostalAddress',
                'streetAddress' => $options['address'],
                'addressLocality' => $options['address_locality'],
                'addressCountry' => $options['address_country'],
                'postalCode' => $options['address_postcode'],
                'addressRegion' => $options['address_region'],
            ),
            'openingHours' => $options['opening_hours'],
            'priceRange' => $options['price_range'],
             'logo' => wp_get_attachment_url($options['logo']),
             'image' => wp_get_attachment_url($options['image']),
            'sameAs' => array(
                $options['facebook'], // Include Facebook link
				$options['instagram'], // Include Instagram link
                $options['twitter'], // Include Twitter link
                $options['linkedin'] // Include LinkedIn link
            )
        );

        // Loop through each schema item and check if it's empty or blank
        foreach ($schemaMain as $key => $value) {
            // Omit empty or blank schema items
            if (empty($value)) {
                unset($schemaMain[$key]);
            }
        }

        // Add logo if it's not empty or blank
        if (!empty($options['logo']) && wp_get_attachment_url($options['logo'])) {
            $schemaMain['logo'] = wp_get_attachment_url($options['logo']);
        }

        // Add image if it's not empty or blank
        if (!empty($options['image']) && wp_get_attachment_url($options['image'])) {
            $schemaMain['image'] = wp_get_attachment_url($options['image']);
        }

        if (is_front_page()) {
            // No nested schema for front page
            $schema = $schemaMain;
        }           

        echo '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>';
    }
}




function mbbsc_plugin_init() {

    add_action('wp_head', 'mbbsc_add_business_schema_markup');
}

add_action('init', 'mbbsc_plugin_init');