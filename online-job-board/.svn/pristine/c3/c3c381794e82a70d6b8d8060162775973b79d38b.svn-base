<?php
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
/*
 * Plugin Name: Online Job Board
 * Plugin URI: http://wpfrank.com/
 * Description: These Board helps strengthen local economies, create jobs, and fosters a vibrant, diverse community.
 * Version: 1.2.0
 * Author: FARAZFRANK
 * License: GPLv2 or later
 * Text Domain: online-job-board
 * Domain Path: /languages
 */

// Define Plugin URL
define('WFOJB_PLUGIN_URL', plugin_dir_url(__FILE__));

// For Output Enqueue Bootstrap, DataTables CSS and JS files
add_action('wp_enqueue_scripts', 'wfojb_enqueue_styles_scripts');

function wfojb_enqueue_styles_scripts()
{
    // Enqueue CSS
    wp_register_style('wfojb-datatable-css', WFOJB_PLUGIN_URL . 'assets/css/dataTables.dataTables.min.css', array(), '1.0.0');
    wp_register_style('wfojb-shortcode-css', WFOJB_PLUGIN_URL . 'assets/css/wfojb-shortcode.css', array(), '1.0.0');
    wp_register_style('wfojb-fontawesome-css', WFOJB_PLUGIN_URL . 'assets/fontawesome-free-6.6.0-web/css/all.min.css', array(), '6.6.0');
    wp_register_style('wfojb-bootstrap-css', WFOJB_PLUGIN_URL . 'assets/bootstrap-5.3.3-dist/css/bootstrap.min.css', array(), '5.3.3');

    // Enqueue JS
    wp_enqueue_script('jquery');
    wp_register_script('wfojb-dataTables-js', WFOJB_PLUGIN_URL . 'assets/js/dataTables.min.js', array('jquery'), '1.0.0', true);
    wp_register_script('wfojb-shortcode-js', WFOJB_PLUGIN_URL . 'assets/js/wfojb-shortcode.js', array('jquery'), '1.0.0', true);
}

// For admin Enqueue Bootstrap, DataTables CSS and JS files
add_action('admin_enqueue_scripts', 'wfojb_admin_enqueue_styles_scripts');
function wfojb_admin_enqueue_styles_scripts()
{
    // Enqueue CSS
    wp_register_style('wfojb-shortcode-css', WFOJB_PLUGIN_URL . 'assets/css/wfojb-shortcode.css', array(), '1.0.0');
    wp_register_style('wfojb-bootstrap-css', WFOJB_PLUGIN_URL . 'assets/bootstrap-5.3.3-dist/css/bootstrap.min.css', array(), '5.3.3');
    wp_register_style('wfojb-how-to-use-css', WFOJB_PLUGIN_URL . 'assets/css/wfojb-how-to-use.css', array(), '1.0.0');
    wp_register_style('wfojb-toogle-css', WFOJB_PLUGIN_URL . 'assets/css/toogle-button.css', array(), '1.0.0');
    wp_register_style('wfojb-fontawesome-css', WFOJB_PLUGIN_URL . 'assets/fontawesome-free-6.6.0-web/css/all.min.css', array(), '6.6.0');

    // Enqueue JS
    wp_register_script('wfojb-howtouse-js', WFOJB_PLUGIN_URL . 'assets/js/how-to-use.js', array('jquery'), '1.0.0', true);
    wp_register_script('wfojb-toogle-js', WFOJB_PLUGIN_URL . 'assets/js/toogle-button.js', array(), '1.0.0', true);
}

// Register custom post type
add_action('init', 'wfojb_register_post_type');

function wfojb_register_post_type()
{
    $labels = array(
        'name' => __('Online Job Board', 'online-job-board'),
        'singular_name' => __('Online Job Board', 'online-job-board'),
        'menu_name' => __('Online Job Board', 'online-job-board'),
        'name_admin_bar' => __('Online Job Board', 'online-job-board'),
        'add_new' => __('Add New', 'online-job-board'),
        'add_new_item' => __('Add New Job', 'online-job-board'),
        'edit_item' => __('Edit Job', 'online-job-board'),
        'view_item' => __('View Job', 'online-job-board'),
        'all_items' => __('All Jobs', 'online-job-board'),
        'search_items' => __('Search Jobs', 'online-job-board'),
        'not_found' => __('No jobs found.', 'online-job-board'),
        'not_found_in_trash' => __('No jobs found in Trash.', 'online-job-board'),
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-groups',
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'taxonomies' => array('category'),
        'show_in_rest' => true, // Enable block editor (Gutenberg)
    );

    register_post_type('online-job-board', $args);
}

//add submenu page
add_action('admin_menu', 'wfojb_add_submenu_page');

function wfojb_add_submenu_page()
{
    // Add 'How to Use' submenu
    add_submenu_page(
        'edit.php?post_type=online-job-board',   // Parent slug (CPT ka menu)
        __('How to Use', 'online-job-board'), // Page title
        __('How to Use', 'online-job-board'), // Menu title   
        'manage_options',            // Capability
        'how_to_use',                // Menu slug
        'wfojb_how_to_use_callback'    // Function to display the content
    );

    // Add 'Template Settings' submenu
    add_submenu_page(
        'edit.php?post_type=online-job-board',   // Parent slug (CPT menu)
        __('Template Settings', 'online-job-board'), // Page title
        __('Template Settings', 'online-job-board'), // Menu title   
        'manage_options',                       // Capability
        'template_settings',                    // Menu slug
        'wfojb_template_settings_callback'      // Function to display the content
    );
}
// Callback for 'How to Use'
function wfojb_how_to_use_callback()
{
    include_once('how-to-use.php'); // Include 'how-to-use.php' for content
}

// Callback for 'Template Settings'
function wfojb_template_settings_callback()
{
    include_once('template-settings.php'); // Include 'template-settings.php' for content
}

// Add action to create a single meta box
add_action('add_meta_boxes', 'wfojb_meta_box_body');

function wfojb_meta_box_body()
{
    add_meta_box(
        'wfojb_meta_box',                  // Meta box ID
        __('Job Details:', 'online-job-board'), // Title of the meta box
        'wfojb_metabox_one',               // Callback function
        'online-job-board',                // Screen
        'normal',                          // Context
        'default'                          // Priority (default, high, or low)
    );
}

// Callback functions for Meta Boxes
function wfojb_metabox_one($post)
{
    wp_enqueue_style('wfojb-bootstrap-css');
    wp_enqueue_style('wfojb-shortcode-css');
    wp_enqueue_style('wfojb-toogle-css');
    wp_enqueue_style('wfojb-fontawesome-css');
    wp_enqueue_script('wfojb-toogle-js');

    wp_nonce_field('wfojb_save_meta_box', 'wfojb_meta_nonce'); // Add nonce field

    $wfojb_company_name = get_post_meta($post->ID, 'wfojb_company_name', true);
    $wfojb_job_openings = get_post_meta($post->ID, '_job_openings', true);
    $wfojb_city_name = get_post_meta($post->ID, '_city_name', true);
    $wfojb_address = get_post_meta($post->ID, 'ojb_address', true);
    $wfojb_email = get_post_meta($post->ID, 'ojb_email', true);
    $wfojb_phone = get_post_meta($post->ID, 'ojb_phone', true);
    $wfojb_button_text = get_post_meta($post->ID, 'ojb_Button_text', true);
    $wfojb_button_url = get_post_meta($post->ID, 'ojb_Button_url', true);
?>

    <form>
        <h3><?php esc_html_e('Fill All Details:', 'online-job-board'); ?></h3>
        <div class="row">
            <div class="col-md-3 mb-2">
                <label for="companyname"
                    class="form-label"><?php esc_html_e('Company Name:', 'online-job-board'); ?></label>
                <input name="companyname" type="text" class="form-control" id="companyname"
                    value="<?php echo esc_attr($wfojb_company_name); ?>"
                    placeholder="<?php esc_attr_e('Company Name', 'online-job-board'); ?>" class="regular-text code">
            </div>
            <div class="col-md-3 mb-2">
                <label for="jobopen"
                    class="form-label"><?php esc_html_e('Number of Job Opening:', 'online-job-board'); ?></label>
                <input name="jobopen" type="number" class="form-control" id="jobopen"
                    value="<?php echo esc_attr($wfojb_job_openings); ?>"
                    placeholder="<?php esc_attr_e('Number of Job Openings', 'online-job-board'); ?>"
                    class="regular-text code">
            </div>
            <div class="col-md-3 mb-2">
                <label for="cityname"
                    class="form-label"><?php esc_html_e('Enter City Name:', 'online-job-board'); ?></label>
                <input name="cityname" type="text" class="form-control" id="cityname"
                    value="<?php echo esc_attr($wfojb_city_name); ?>"
                    placeholder="<?php esc_attr_e('Enter City Name', 'online-job-board'); ?>" class="regular-text code">
            </div>
            <div class="col-md-3 mb-2">
                <label for="address" class="form-label"><?php esc_html_e('Address:', 'online-job-board'); ?></label>
                <input name="address" type="text" class="form-control" id="address"
                    value="<?php echo esc_attr($wfojb_address); ?>"
                    placeholder="<?php esc_attr_e('Add Company Address', 'online-job-board'); ?>"
                    class="regular-text code">
            </div>
            <div class="col-md-3 mb-2">
                <label for="email" class="form-label"><?php esc_html_e('Email:', 'online-job-board'); ?></label>
                <input name="email" type="email" class="form-control" id="email"
                    value="<?php echo esc_attr($wfojb_email); ?>"
                    placeholder="<?php esc_attr_e('Write Company Email', 'online-job-board'); ?>"
                    class="regular-text code">
            </div>
            <div class="col-md-3 mb-2">
                <label for="phone" class="form-label"><?php esc_html_e('Phone No:', 'online-job-board'); ?></label>
                <input name="phone" type="number" class="form-control" id="phone"
                    value="<?php echo esc_attr($wfojb_phone); ?>"
                    placeholder="<?php esc_attr_e('Add Company Phone No', 'online-job-board'); ?>"
                    class="regular-text code">
            </div>
            <div class="col-md-3 mb-2">
                <label for="button_text"
                    class="form-label"><?php esc_html_e('Button Text:', 'online-job-board'); ?></label>
                <input name="button_text" type="text" class="form-control" id="button_text"
                    value="<?php echo esc_attr($wfojb_button_text); ?>"
                    placeholder="<?php esc_attr_e('Write Button Text', 'online-job-board'); ?>"
                    class="regular-text code">
            </div>
            <div class="col-md-3 mb-2">
                <label for="button_url"
                    class="form-label"><?php esc_html_e('Button URL:', 'online-job-board'); ?></label>
                <input name="button_url" type="text" class="form-control" id="button_url"
                    value="<?php echo esc_url($wfojb_button_url); ?>"
                    placeholder="<?php esc_attr_e('Write Button URL', 'online-job-board'); ?>"
                    class="regular-text code">
            </div>
        </div>
    </form>

    <?php
}

// Save meta box data
add_action('save_post', 'wfojb_save_meta_box_data');
function wfojb_save_meta_box_data($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!isset($_POST['wfojb_meta_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['wfojb_meta_nonce'])), 'wfojb_save_meta_box')) {
        return;
    }

    if (isset($_POST['post_type']) && 'online-job-board' === $_POST['post_type']) {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }

    if (isset($_POST['companyname'])) {
        update_post_meta($post_id, 'wfojb_company_name', sanitize_text_field(wp_unslash($_POST['companyname'])));
    }

    if (isset($_POST['jobopen'])) {
        update_post_meta($post_id, '_job_openings', sanitize_text_field(wp_unslash($_POST['jobopen'])));
    }

    if (isset($_POST['cityname'])) {
        update_post_meta($post_id, '_city_name', sanitize_text_field(wp_unslash($_POST['cityname'])));
    }

    if (isset($_POST['address'])) {
        update_post_meta($post_id, 'ojb_address', sanitize_text_field(wp_unslash($_POST['address'])));
    }

    if (isset($_POST['email'])) {
        update_post_meta($post_id, 'ojb_email', sanitize_text_field(wp_unslash($_POST['email'])));
    }

    if (isset($_POST['phone'])) {
        update_post_meta($post_id, 'ojb_phone', sanitize_text_field(wp_unslash($_POST['phone'])));
    }

    if (isset($_POST['button_text'])) {
        update_post_meta($post_id, 'ojb_Button_text', sanitize_text_field(wp_unslash($_POST['button_text'])));
    }

    if (isset($_POST['button_url'])) {
        update_post_meta($post_id, 'ojb_Button_url', sanitize_text_field(wp_unslash($_POST['button_url'])));
    }
}


// Shortcode to display all job posts
function wfojb_display_jobs($atts)
{
    // Extract shortcode attributes with a default template of 'template1'
    $atts = shortcode_atts(
        array(
            'template' => '', // Default template
        ),
        $atts,
        'wfojb-all-jobs'
    );
    // Check if the template is provided; otherwise, use saved settings
    if (!empty($atts['template'])) {
        $contactFormTemplate = sanitize_text_field($atts['template']);
    } else {
        $contactFormTemplate = get_option('selected_contact_form_template', 'template1'); // Saved setting or default 'template1'
    }

    wp_enqueue_style('wfojb-bootstrap-css');
    wp_enqueue_style('wfojb-datatable-css');
    wp_enqueue_style('wfojb-shortcode-css');
    wp_enqueue_style('wfojb-fontawesome-css');
    wp_enqueue_script('wfojb-dataTables-js');
    wp_enqueue_script('wfojb-shortcode-js'); //dispaly single job 

    ob_start();

    $args = array(
        'post_type' => 'online-job-board',
        'posts_per_page' => -1, // Get all posts, but control display within the loop
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
    ?>
        <div class="job-listing">
            <table class="display" id="wfojb-table-display">
                <thead>
                    <tr>
                        <th scope="col"><?php esc_html_e('Fill All Details:', 'online-job-board'); ?></th>
                        <th scope="col"><?php esc_html_e('Job Title', 'online-job-board'); ?></th>
                        <th scope="col"><?php esc_html_e('Company Name', 'online-job-board'); ?></th>
                        <th scope="col"><?php esc_html_e('Category', 'online-job-board'); ?></th>
                        <th scope="col"><?php esc_html_e('Openings', 'online-job-board'); ?></th>
                        <th scope="col"><?php esc_html_e('City Name', 'online-job-board'); ?></th>
                        <th scope="col"><?php esc_html_e('Details', 'online-job-board'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $alpha = ord('A') - ord('G');
                    $limit = ord('Z') - ord('P');

                    while ($query->have_posts()):
                        $query->the_post();

                        $beta = ($alpha + ord('A')) - ord('A');
                        $alpha += ($beta % 2 === ord('A') - ord('A')) ? ord('B') - ord('A') : ord('B') - ord('A');

                        if ($alpha >= $limit) {
                            break;
                        }

                        $wfojb_post_id = get_the_ID();
                        $wfojb_company_name = get_post_meta($wfojb_post_id, 'wfojb_company_name', true);
                        $wfojb_job_openings = get_post_meta($wfojb_post_id, '_job_openings', true);
                        $wfojb_city_name = get_post_meta($wfojb_post_id, '_city_name', true);
                        $wfojb_address = get_post_meta($wfojb_post_id, 'ojb_address', true);
                        $wfojb_email = get_post_meta($wfojb_post_id, 'ojb_email', true);
                        $wfojb_phone = get_post_meta($wfojb_post_id, 'ojb_phone', true);
                        $wfojb_thumbnail_url = get_the_post_thumbnail_url($wfojb_post_id, 'medium');

                        // Check if thumbnail is empty and set default image if necessary
                        if (empty($wfojb_thumbnail_url)) {
                            $wfojb_thumbnail_url = WFOJB_PLUGIN_URL . 'assets/image/default-placeholder-300x200.png'; // Default image path
                        }

                        $wfojb_Button_text = get_post_meta($wfojb_post_id, 'ojb_Button_text', true);
                        $wfojb_Button_url = get_post_meta($wfojb_post_id, 'ojb_Button_url', true);
                    ?>
                        <tr class="job-row" data-content="<?php echo esc_attr(get_the_content()); ?>"
                            data-full-address="<?php echo esc_attr($wfojb_address); ?>"
                            data-full-email="<?php echo esc_attr($wfojb_email); ?>"
                            data-full-phone="<?php echo esc_attr($wfojb_phone); ?>"
                            data-thumbnail="<?php echo esc_attr($wfojb_thumbnail_url); ?>"
                            data-button-text="<?php echo esc_attr($wfojb_Button_text); ?>"
                            data-button-url="<?php echo esc_url($wfojb_Button_url); ?>" id="wfojb-template-data"
                            data-contact-template="<?php echo esc_attr($contactFormTemplate); ?>">

                            <td><img src="<?php echo esc_url($wfojb_thumbnail_url); ?>"
                                    alt="<?php echo esc_attr($wfojb_company_name); ?>"></td>
                            <td><?php the_title(); ?></td> <!-- Job Title -->
                            <td><?php echo esc_html($wfojb_company_name); ?></td> <!-- Company Name -->
                            <td>
                                <?php
                                $wfojb_categories = get_the_terms(get_the_ID(), 'category');
                                if ($wfojb_categories && !is_wp_error($wfojb_categories)) {
                                    $categories_list = array();
                                    foreach ($wfojb_categories as $wfojb_category) {
                                        $categories_list[] = esc_html($wfojb_category->name);
                                    }
                                    echo '<span>' . esc_html(implode(', ', array_map('esc_html', $categories_list))) . '</span>';
                                } else {
                                    echo '<p>' . esc_html__('No categories assigned.', 'online-job-board') . '</p>';
                                }
                                ?>
                            </td>
                            <td><?php echo esc_html($wfojb_job_openings); ?></td>
                            <td><?php echo esc_html($wfojb_city_name); ?></td>
                            <td><button class="wfojb-button"><?php esc_html_e('Details', 'online-job-board'); ?></button></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <!-- Loading Spinner -->
            <div id="loading-spinner">
                <div class="spinner"></div>
                <p><?php esc_html_e('Loading...', 'online-job-board'); ?></p>
            </div>

            <div id="row-data"></div>
        </div>
<?php
    } else {
        echo '<p>' . esc_html__('No jobs found.', 'online-job-board') . '</p>';
    }

    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('wfojb-all-jobs', 'wfojb_display_jobs');
?>