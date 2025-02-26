<?php
/**
 * Create a settings page for Import/Export of sliders under the "Mega Slider" menu.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

function mega_slider_add_admin_menu() {
    add_submenu_page(
        'edit.php?post_type=mega_slider', // Parent menu slug (under "Mega Slider")
        esc_html__('Slider Settings', 'mega-blocks'), // Page title
        esc_html__('Slider Settings', 'mega-blocks'), // Menu title
        'manage_options',  // Capability
        'mega-slider-settings', // Menu slug
        'mega_slider_settings_page' // Callback function
    );
}
add_action('admin_menu', 'mega_slider_add_admin_menu');

/**
 * Display the settings page with tabs for import/export, demo import, how to use, and shortcodes.
 */
function mega_slider_settings_page() {
    $sliders = get_posts(array(
        'post_type' => 'mega_slider',
        'posts_per_page' => -1
    ));

    // Define the directory for demo sliders
    $demo_sliders_dir = plugin_dir_path(__FILE__) . '../demo-sliders/';
    $demo_slider_files = array_diff(scandir($demo_sliders_dir), array('.', '..'));
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Mega Slider Import/Export', 'mega-blocks'); ?></h1>

        <!-- Tab Navigation -->
        <h2 class="nav-tab-wrapper">
            <a href="#tab-export" class="nav-tab nav-tab-active"><?php esc_html_e('Export Sliders', 'mega-blocks'); ?></a>
            <a href="#tab-import" class="nav-tab"><?php esc_html_e('Manual Import Sliders', 'mega-blocks'); ?></a>
            <a href="#tab-import-demo" class="nav-tab" style="display: none"><?php esc_html_e('Import Demo Sliders', 'mega-blocks'); ?></a>
            <a href="#tab-how-to-use" class="nav-tab"><?php esc_html_e('How to Use', 'mega-blocks'); ?></a>
            <a href="#tab-shortcodes" class="nav-tab"><?php esc_html_e('Shortcodes', 'mega-blocks'); ?></a>
        </h2>

        <!-- Export Tab -->
        <!-- Export Tab -->
<div id="tab-export" class="tab-content" style="display:block;">
    <h2><?php esc_html_e('Export Sliders', 'mega-blocks'); ?></h2>
    <p><?php esc_html_e('Select sliders to export individually using the Export button below.', 'mega-blocks'); ?></p>
    <?php if ($sliders): ?>
        <table class="widefat fixed striped">
            <thead>
                <tr>
                    <th><?php esc_html_e('Slider Title', 'mega-blocks'); ?></th>
                    <th><?php esc_html_e('Action', 'mega-blocks'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sliders as $slider): ?>
                    <tr>
                        <td>
                            <?php echo esc_html($slider->post_title); ?>
                        </td>
                        <td>
                            <!-- Export Button -->
                            <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="margin: 0;">
                                <?php wp_nonce_field('mega_slider_export_single_nonce', 'mega_slider_export_single_nonce_field'); ?>
                                <input type="hidden" name="action" value="mega_export_single_slider">
                                <input type="hidden" name="slider_id" value="<?php echo esc_attr($slider->ID); ?>">
                                <button type="submit" class="button button-primary"><?php esc_html_e('Export', 'mega-blocks'); ?></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p><?php esc_html_e('No sliders available to export.', 'mega-blocks'); ?></p>
    <?php endif; ?>
</div>


        <!-- Manual Import Tab -->
        <div id="tab-import" class="tab-content" style="display:none;">
            <form method="post" enctype="multipart/form-data" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
    <?php wp_nonce_field('mega_slider_import_nonce', 'mega_slider_import_nonce_field'); ?>
    <input type="hidden" name="action" value="mega_import_sliders">
    <h2><?php esc_html_e('Manual Import Sliders', 'mega-blocks'); ?></h2>
    <p><?php esc_html_e('Upload a JSON file to import sliders.', 'mega-blocks'); ?></p>
    <input type="file" name="mega_slider_import_file" accept=".json" />
    <br><br>
    <input type="submit" name="mega_import_sliders" class="button button-primary" value="<?php esc_html_e('Import Sliders', 'mega-blocks'); ?>" />
</form>

        </div>

       <!-- Import Demo Sliders Tab -->
<!-- Import Demo Sliders Tab -->
<div id="tab-import-demo" class="tab-content" style="display:none;">
    <h2><?php esc_html_e('Import Demo Sliders', 'mega-blocks'); ?></h2>
    <p><?php esc_html_e('Click "Import" to import a demo slider from our server.', 'mega-blocks'); ?></p>

    <div class="demo-slider-grid" style="display: flex; flex-wrap: wrap; gap: 20px;">
        <?php
        // Define external slider files
        $demo_sliders = [
            [
        'title' => 'Product hotspot',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/product-hotspot.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/product-hotspot.jpg',
    ],
    [
        'title' => 'Women day',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/women-day.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/women-day.jpg',
    ],
	[
        'title' => 'Yoga Instructor',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/yoga-instructor.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/yoga-instructor.jpg',
    ],
    [
        'title' => 'Interior designer',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/interior-designer.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/interior-designer.jpg',
    ],
    [
        'title' => 'Event management',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/event-management.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/event-management.jpg',
    ],
    [
        'title' => 'Fitness trainer',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/fitness-trainer.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/fitness-trainer.jpg',
    ],
    [
        'title' => 'Fashion trends',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/fashion-trends.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/fashion-trends.jpg',
    ],
    [
        'title' => 'Mental health',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/mental-health.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/mental-health.jpg',
    ],
    [
        'title' => 'Travelling',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/travelling.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/travelling.jpg',
    ],
    [
        'title' => 'Cafe',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/cafe.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/cafe.jpg',
    ],
    [
        'title' => 'Product dark',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/product-dark.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/product-dark.jpg',
    ],
    [
        'title' => 'Builder construction',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/builder-construction.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/builder-construction.jpg',
    ],
    [
        'title' => 'Eyewear',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/eyewear.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/eyewear.jpg',
    ],
    [
        'title' => 'Corporate finance',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/corporate-finance.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/corporate-finance.jpg',
    ],
    [
        'title' => 'Realestate',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/realestate.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/realestate.jpg',
    ],
    [
        'title' => 'Landing',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/landing.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/landing.jpg',
    ],
	[
        'title' => 'Personal Hotspot',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/personal-hotspot.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/personal-hotspot.jpg',
    ],
    [
        'title' => 'Landing Page',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/landing-page.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/landing-page.jpg',
    ],
    [
        'title' => 'Personal portfolio',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/personal-portfolio.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/personal-portfolio.jpg',
    ],
    [
        'title' => 'Kids',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/kids.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/kids.jpg',
    ],
    [
        'title' => 'Classic business',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/classic-business.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/classic-business.jpg',
    ],
    [
        'title' => 'Innovative',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/innovative.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/innovative.jpg',
    ],
    [
        'title' => 'Minimal',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/minimal.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/minimal.jpg',
    ],
    [
        'title' => 'Automobile',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/automobile.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/automobile.jpg',
    ],
	
	   [
        'title' => 'Skin Doctor',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/skin-doctor.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/skin-doctor.jpg',
    ],
	
    [
        'title' => 'Corporate',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/corporate.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/corporate.jpg',
    ],
    [
        'title' => 'Coffee',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/coffee.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/coffee.jpg',
    ],
    [
        'title' => 'Speaker',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/speaker.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/speaker.jpg',
    ],
    [
        'title' => 'Charity',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/charity.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/charity.jpg',
    ],
    [
        'title' => 'Medical',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/medical.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/medical.jpg',
    ],
    [
        'title' => 'Cakes',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/cakes.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/cakes.jpg',
    ],
    [
        'title' => 'Football',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/football.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/football.jpg',
    ],
	
	[
        'title' => 'Startup Portfolio',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/startup-portfolio.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/startup-portfolio.jpg',
    ],
	
  [
        'title' => 'Digital Creative',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/digital-creative.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/digital-creative.jpg',
    ],
    [
        'title' => 'Cycling',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/cycling.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/cycling.jpg',
    ],
    [
        'title' => 'Digital University',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/digital-university.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/digital-university.jpg',
    ],
    [
        'title' => 'Creative Designer',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/creative-designer.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/creative-designer.jpg',
    ],
    [
        'title' => 'Gradient Agency',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/gradient-agency.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/gradient-agency.jpg',
    ],
    [
        'title' => 'Agency 2',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/agency-2.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/agency-2.jpg',
    ],
    
    
    [
        'title' => 'Web hosting',
        'url'   => 'https://weblogixsoft.com/mega-slider/demo-slider/web-hosting.json',
        'thumbnail' => 'https://weblogixsoft.com/mega-slider/demo-slider/thumbnails/web-hosting.jpg',
    ],
    
            
        ];

        foreach ($demo_sliders as $slider):
        ?>
            <div class="demo-slider-item" style="width: 30%; border: 1px solid #ddd; padding: 10px; text-align: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                <!-- Slider Thumbnail -->
                <img src="<?php echo esc_url($slider['thumbnail']); ?>" alt="<?php echo esc_attr($slider['title']); ?>" style="max-width: 100%; height: auto; margin-bottom: 10px;" />
                
                <!-- Slider Title -->
                <h4><?php echo esc_html($slider['title']); ?></h4>
                
                <!-- Import Button -->
                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" style="margin-top: 10px;">
                    <?php wp_nonce_field('mega_slider_import_external_nonce', 'mega_slider_import_external_nonce_field'); ?>
                    <input type="hidden" name="action" value="mega_import_external_slider">
                    <input type="hidden" name="slider_url" value="<?php echo esc_url($slider['url']); ?>" />
                    <button type="submit" class="button button-primary">
                        <?php esc_html_e('Import', 'mega-blocks'); ?>
                    </button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>


        <!-- How to Use Tab -->
        <div id="tab-how-to-use" class="tab-content" style="display:none;">
            <h2><?php esc_html_e('How to Use Mega Sliders', 'mega-blocks'); ?></h2>
            <p><?php esc_html_e('Follow the instructions below to use and customize the sliders.', 'mega-blocks'); ?></p>

            <h3><?php esc_html_e('1. Adding a Slider to a Page or Post', 'mega-blocks'); ?></h3>
            <ul>
                <li><?php esc_html_e('Go to Pages or Posts in your WordPress dashboard.', 'mega-blocks'); ?></li>
                <li><?php esc_html_e('Open the editor for the page or post where you want to add the slider.', 'mega-blocks'); ?></li>
                <li><?php esc_html_e('In the Gutenberg editor, click the "+" icon to add a new block.', 'mega-blocks'); ?></li>
                <li><?php esc_html_e('Search for "Mega Slider" in the block search.', 'mega-blocks'); ?></li>
                <li><?php esc_html_e('Select the Mega Slider block and choose your slider.', 'mega-blocks'); ?></li>
            </ul>

            <h3><?php esc_html_e('2. Editing a Slider in Gutenberg', 'mega-blocks'); ?></h3>
            <ul>
                <li><?php esc_html_e('In the WordPress dashboard, go to "Mega Slider".', 'mega-blocks'); ?></li>
                <li><?php esc_html_e('Click on the slider you want to edit.', 'mega-blocks'); ?></li>
                <li><?php esc_html_e('Use the Gutenberg block editor to customize the slider, change text, add images, and modify settings.', 'mega-blocks'); ?></li>
                <li><?php esc_html_e('Update the slider when you are done.', 'mega-blocks'); ?></li>
            </ul>

            <h3><?php esc_html_e('3. Importing Sliders', 'mega-blocks'); ?></h3>
            <ul>
                <li><?php esc_html_e('Use the "Import Demo Sliders" tab to import pre-built sliders.', 'mega-blocks'); ?></li>
                <li><?php esc_html_e('Use the "Manual Import Sliders" tab to upload and import custom JSON slider files.', 'mega-blocks'); ?></li>
            </ul>
        </div>

        <!-- Shortcodes Tab -->
        <div id="tab-shortcodes" class="tab-content" style="display:none;">
            <h2><?php esc_html_e('Using Shortcodes', 'mega-blocks'); ?></h2>
            <p><?php esc_html_e('Use the following shortcodes to display your Mega Sliders.', 'mega-blocks'); ?></p>

            <h3><?php esc_html_e('Display a Specific Slider', 'mega-blocks'); ?></h3>
            <p><?php esc_html_e('To display a specific slider, use the slider ID or title:', 'mega-blocks'); ?></p>
            <ul>
                <li><?php esc_html_e('By Slider ID:', 'mega-blocks'); ?> <code>[mega_slider_display slider_id="123"]</code></li>
                <li><?php esc_html_e('By Slider Title:', 'mega-blocks'); ?> <code>[mega_slider_display slider_title="My Slider Title"]</code></li>
            </ul>

            <h3><?php esc_html_e('List All Sliders', 'mega-blocks'); ?></h3>
            <p><?php esc_html_e('To display a list of all sliders with their respective shortcodes, use:', 'mega-blocks'); ?></p>
            <p><code>[mega_slider_list]</code></p>

            <h4><?php esc_html_e('Example:', 'mega-blocks'); ?></h4>
            <p><?php esc_html_e('Paste the shortcode in a page or post where you want the slider to appear.', 'mega-blocks'); ?></p>
        </div>

        <script type="text/javascript">
            // Tab switching logic
            jQuery(document).ready(function($) {
                $('.nav-tab').click(function() {
                    $('.nav-tab').removeClass('nav-tab-active');
                    $(this).addClass('nav-tab-active');
                    $('.tab-content').hide();
                    $($(this).attr('href')).show();
                    return false;
                });

                // Preview image logic
                $('.slider-checkbox').change(function() {
                    var previewImage = $(this).data('preview');
                    if (this.checked && previewImage) {
                        $('#slider-preview-img').attr('src', previewImage).show();
                    } else {
                        $('#slider-preview-img').hide();
                    }
                });
            });
        </script>
    </div>
    <?php
}


/**
 * Handle Importing External Demo Slider
 */
function mega_import_external_slider() {
    if (isset($_POST['action']) && $_POST['action'] === 'mega_import_external_slider' && check_admin_referer('mega_slider_import_external_nonce', 'mega_slider_import_external_nonce_field')) {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have permission to import sliders.', 'mega-blocks'));
        }

        $slider_url = isset($_POST['slider_url']) ? esc_url_raw($_POST['slider_url']) : '';

        if (empty($slider_url)) {
            wp_die(__('Invalid slider URL.', 'mega-blocks'));
        }

        // Fetch the slider JSON from the external server
        $response = wp_remote_get($slider_url, ['timeout' => 15]);

        if (is_wp_error($response) || wp_remote_retrieve_response_code($response) !== 200) {
            wp_die(__('Failed to fetch slider data from the server.', 'mega-blocks'));
        }

        $slider_data = json_decode(wp_remote_retrieve_body($response), true);

        if (json_last_error() !== JSON_ERROR_NONE || !is_array($slider_data)) {
            wp_die(__('The fetched slider data is not valid JSON.', 'mega-blocks'));
        }

        // Process the slider data
        foreach ($slider_data as $slider) {
    if (isset($slider['title'], $slider['content'], $slider['meta'])) {
        // Decode HTML entities and sanitize content
        $decoded_content = html_entity_decode($slider['content'], ENT_QUOTES | ENT_HTML5);
        $decoded_content = wp_kses_post($decoded_content);

        // Create a new slider post
        $new_slider_id = wp_insert_post([
            'post_type'   => 'mega_slider',
            'post_title'  => sanitize_text_field($slider['title']),
            'post_content' => $decoded_content,
            'post_status' => 'publish',
        ]);

        if (is_wp_error($new_slider_id)) {
            continue; // Skip if the slider creation fails
        }

        // Add post meta
        foreach ($slider['meta'] as $meta_key => $meta_value) {
            update_post_meta($new_slider_id, $meta_key, maybe_unserialize($meta_value[0]));
        }

        // Add additional settings (if available)
        if (isset($slider['settings'])) {
            update_post_meta($new_slider_id, 'mega_slider_settings', $slider['settings']);
        }
    }
}

        wp_redirect(admin_url('edit.php?post_type=mega_slider'));
        exit;
    }
}
add_action('admin_post_mega_import_external_slider', 'mega_import_external_slider');

/**
 * Handle Export of single  Sliders
 */
 /**
 * Handle Export of a Single Slider
 */
function mega_export_single_slider() {
    if (isset($_POST['action']) && $_POST['action'] === 'mega_export_single_slider' && check_admin_referer('mega_slider_export_single_nonce', 'mega_slider_export_single_nonce_field')) {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have permission to export sliders.', 'mega-blocks'));
        }

        $slider_id = isset($_POST['slider_id']) ? absint($_POST['slider_id']) : 0;

        if (!$slider_id) {
            wp_die(__('Invalid slider ID.', 'mega-blocks'));
        }

        // Retrieve the slider post
        $slider_post = get_post($slider_id);
        if (!$slider_post || $slider_post->post_type !== 'mega_slider') {
            wp_die(__('Slider not found or invalid.', 'mega-blocks'));
        }

        // Fetch post content (ensure Gutenberg block data is included)
        $content = $slider_post->post_content;

        // Fetch all post meta
        $slider_meta = get_post_meta($slider_id);

        // Filter out unnecessary meta keys
        $filtered_meta = array_filter($slider_meta, function ($key) {
            return !in_array($key, ['_edit_lock', '_edit_last']); // Adjust as needed
        }, ARRAY_FILTER_USE_KEY);

        // Retrieve slider settings if available
        $slider_settings = get_post_meta($slider_id, 'mega_slider_settings', true);

        // Prepare export data
        $export_data = [
            'ID'       => $slider_post->ID,
            'title'    => $slider_post->post_title,
            'content'  => $content, // Full Gutenberg block content
            'meta'     => $filtered_meta, // Filtered meta data
            'settings' => $slider_settings ?: null, // Include settings or set to null
        ];

        // Wrap export data in an array
        $export_data_wrapped = [$export_data];

        // Clean the slider title for the filename
        $clean_title = sanitize_title($slider_post->post_title);

        // Prepare the JSON file for download
        header('Content-Type: application/json; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $clean_title . '.json');
        header('Pragma: no-cache');

        echo wp_json_encode($export_data_wrapped, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        exit;
    }
}
add_action('admin_post_mega_export_single_slider', 'mega_export_single_slider');


	
 
/**
 * Handle Export of Selected Sliders
 */
function mega_export_selected_sliders() {
    if (isset($_POST['mega_export_slider']) && check_admin_referer('mega_slider_export_nonce', 'mega_slider_export_nonce_field')) {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have permission to export sliders.', 'mega-blocks'));
        }

        if (!isset($_POST['mega_slider_export']) || empty($_POST['mega_slider_export'])) {
            wp_die(__('No sliders selected for export.', 'mega-blocks'));
        }

        $slider_ids = array_map('absint', $_POST['mega_slider_export']);

        foreach ($slider_ids as $slider_id) {
            $slider_post = get_post($slider_id);
            if ($slider_post && $slider_post->post_type === 'mega_slider') {
                $slider_meta = get_post_meta($slider_id);

                $export_data = [
                    [
                        'ID'       => $slider_post->ID,
                        'title'    => $slider_post->post_title,
                        'content'  => $slider_post->post_content,
                        'meta'     => $slider_meta,
                        'settings' => get_post_meta($slider_id, 'mega_slider_settings', true),
                    ]
                ];

                // Clean the slider title to create a valid filename
                $clean_title = sanitize_title($slider_post->post_title);

                // Prepare the JSON file for download
                header('Content-Type: application/json; charset=utf-8');
                header('Content-Disposition: attachment; filename=' . $clean_title . '.json');
                header('Pragma: no-cache');
                echo wp_json_encode($export_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                exit;
            }
        }

        // Fallback in case no valid sliders are exported
        wp_die(__('No valid sliders found for export.', 'mega-blocks'));
    }
}
add_action('admin_post_mega_export_slider', 'mega_export_selected_sliders');



/**
 * Handle Manual Import Sliders
 */
function mega_import_sliders() {
    if (isset($_POST['mega_import_sliders']) && check_admin_referer('mega_slider_import_nonce', 'mega_slider_import_nonce_field')) {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have permission to import sliders.', 'mega-blocks'));
        }

        if (!isset($_FILES['mega_slider_import_file']) || empty($_FILES['mega_slider_import_file']['tmp_name'])) {
            wp_die(__('No file uploaded or the file is empty.', 'mega-blocks'));
        }

        $file = $_FILES['mega_slider_import_file']['tmp_name'];
        $original_filename = pathinfo($_FILES['mega_slider_import_file']['name'], PATHINFO_FILENAME); // Get the JSON file name without extension
        $sanitized_filename = sanitize_title($original_filename); // Sanitize the filename to use as slug

        $file_contents = file_get_contents($file);
        $slider_data = json_decode($file_contents, true);

        if (json_last_error() !== JSON_ERROR_NONE || !is_array($slider_data)) {
            wp_die(__('Invalid JSON file. Please check the file structure.', 'mega-blocks'));
        }

        global $wpdb;

        foreach ($slider_data as $slider) {
            $title = isset($slider['title']) ? sanitize_text_field($slider['title']) : __('Untitled Slider', 'mega-blocks');
            $content = isset($slider['content']) ? wp_kses_post(html_entity_decode($slider['content'], ENT_QUOTES | ENT_HTML5)) : '';
            $meta = isset($slider['meta']) ? $slider['meta'] : [];
            $settings = isset($slider['settings']) ? $slider['settings'] : [];

            if (empty($content)) {
                error_log('Skipped slider due to empty content.');
                continue;
            }

            // Generate unique slug based on sanitized filename
            $unique_slug = wp_unique_post_slug($sanitized_filename, 0, 'publish', 'mega_slider', 0);

            $wpdb->insert(
                $wpdb->posts,
                [
                    'post_title'   => $title,
                    'post_content' => $content,
                    'post_type'    => 'mega_slider',
                    'post_status'  => 'publish',
                    'post_date'    => current_time('mysql'),
                    'post_date_gmt'=> current_time('mysql', 1),
                    'post_name'    => $unique_slug, // Use unique slug
                ],
                ['%s', '%s', '%s', '%s', '%s', '%s', '%s']
            );

            $new_slider_id = $wpdb->insert_id;

            foreach ($meta as $meta_key => $meta_value) {
                update_post_meta($new_slider_id, $meta_key, maybe_unserialize($meta_value[0]));
            }

            if (!empty($settings)) {
                update_post_meta($new_slider_id, 'mega_slider_settings', $settings);
            }

            
        }

        wp_redirect(admin_url('edit.php?post_type=mega_slider'));
        exit;
    }
}
add_action('admin_post_mega_import_sliders', 'mega_import_sliders');








function mega_import_all_demo_sliders() {
    if (isset($_POST['mega_import_all_demo_sliders']) && check_admin_referer('mega_slider_import_demo_nonce', 'mega_slider_import_demo_nonce_field')) {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have permission to import demo sliders.', 'mega-blocks'));
        }

        // Define the directory for demo sliders
        $demo_sliders_dir = plugin_dir_path(__FILE__) . '../demo-sliders/';
        $demo_slider_files = array_diff(scandir($demo_sliders_dir), ['.', '..']);

        if (empty($demo_slider_files)) {
            wp_die(__('No demo sliders found in the demo-sliders directory.', 'mega-blocks'));
        }

        global $wpdb;

        foreach ($demo_slider_files as $demo_file) {
            $demo_slider_path = $demo_sliders_dir . $demo_file;

            if (!file_exists($demo_slider_path) || !is_readable($demo_slider_path)) {
                continue;
            }

            $file_contents = mb_convert_encoding(file_get_contents($demo_slider_path), 'UTF-8', 'auto');
            $file_contents = preg_replace('/^\xEF\xBB\xBF/', '', $file_contents);
            $slider_data = json_decode($file_contents, true);

            if (json_last_error() !== JSON_ERROR_NONE || !is_array($slider_data)) {
                error_log(__('Invalid JSON in file: ', 'mega-blocks') . $demo_file);
                continue;
            }

            foreach ($slider_data as $slider) {
                // Validate and sanitize title
                $title = isset($slider['title']) ? sanitize_text_field($slider['title']) : __('Untitled Slider', 'mega-blocks');

                // Decode and sanitize content
                $content = isset($slider['content']) ? $slider['content'] : '';
                if (!empty($content)) {
                    $content = html_entity_decode($content, ENT_QUOTES | ENT_HTML5);

                    // Define allowed HTML for content sanitization
                    $allowed_html = [
                        'div'    => ['class' => [], 'style' => []],
                        'span'   => ['class' => [], 'style' => []],
                        'p'      => ['class' => [], 'style' => []],
                        'h1'     => ['class' => [], 'style' => []],
                        'h2'     => ['class' => [], 'style' => []],
                        'h3'     => ['class' => [], 'style' => []],
                        'h4'     => ['class' => [], 'style' => []],
                        'h5'     => ['class' => [], 'style' => []],
                        'a'      => ['href' => [], 'target' => [], 'class' => [], 'style' => [], 'rel' => []],
                        'img'    => ['src' => [], 'alt' => [], 'style' => []],
                        'ul'     => ['class' => [], 'style' => []],
                        'li'     => ['class' => [], 'style' => []],
                        'br'     => [],
                        'strong' => [],
                        'em'     => [],
                        'i'      => ['class' => []],
                    ];

                    $content = wp_kses($content, $allowed_html);
                }

                if (empty($content)) {
                    error_log(__('Skipped slider due to empty content in file: ', 'mega-blocks') . $demo_file);
                    continue;
                }

                // Prepare and validate metadata
                $meta = isset($slider['meta']) && is_array($slider['meta']) ? $slider['meta'] : [];

                // Prepare settings
                $settings = isset($slider['settings']) ? maybe_serialize($slider['settings']) : null;

                // Generate a unique slug
                $original_filename = pathinfo($demo_file, PATHINFO_FILENAME);
                $sanitized_filename = sanitize_title($original_filename);
                $unique_slug = wp_unique_post_slug($sanitized_filename, 0, 'publish', 'mega_slider', 0);

                // Insert the slider post
                $result = $wpdb->insert(
                    $wpdb->posts,
                    [
                        'post_title'   => $title,
                        'post_content' => $content,
                        'post_type'    => 'mega_slider',
                        'post_status'  => 'publish',
                        'post_date'    => current_time('mysql'),
                        'post_date_gmt'=> current_time('mysql', 1),
                        'post_name'    => $unique_slug,
                    ],
                    ['%s', '%s', '%s', '%s', '%s', '%s', '%s']
                );

                if ($result === false) {
                    error_log('Database error while inserting slider: ' . $wpdb->last_error);
                    continue;
                }

                $new_slider_id = $wpdb->insert_id;

                // Add metadata
                foreach ($meta as $meta_key => $meta_value) {
                    update_post_meta($new_slider_id, $meta_key, maybe_unserialize($meta_value[0]));
                }

                // Add settings
                if (!empty($settings)) {
                    update_post_meta($new_slider_id, 'mega_slider_settings', $settings);
                }

                error_log('Successfully imported slider: ' . $title);
            }
        }

        // Redirect after successful import
        wp_redirect(admin_url('edit.php?post_type=mega_slider&import_success=1'));
        exit;
    }
}
add_action('admin_post_mega_import_all_demo_sliders', 'mega_import_all_demo_sliders');



