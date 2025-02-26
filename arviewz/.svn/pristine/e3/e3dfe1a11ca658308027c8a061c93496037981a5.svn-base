<?php

//if file is accessed directly it aborts.
if (!defined('ABSPATH')) {
    die("You are not allowed to access this page.");
}
if (!function_exists('arviewz_3d_model_menu')) {
    function arviewz_3d_model_menu()
    {
        // Main menu
        add_menu_page('ARViewz', 'ARViewz', 'manage_options', 'arviewz-main-menu', 'arviewz_index_page', '');

        // Submenu items
        add_submenu_page('arviewz-main-menu', 'Settings', 'Settings', 'manage_options', 'arviewz-settings', 'arviewz_settings_page');
        add_submenu_page('arviewz-main-menu', 'Products', 'Products', 'manage_options', 'arviewz-products', 'arviewz_products_page');
        add_submenu_page('arviewz', 'Add Model URL', 'Add Model URL', 'manage_options', 'add-model-url', 'arviewz_add_model_url_page');
    }
    add_action('admin_menu', 'arviewz_3d_model_menu');
}
if (!function_exists('arviewz_add_custom_column_to_products_list')) {
    function arviewz_add_custom_column_to_products_list($columns)
    {
        $columns['3d_model_config'] = __('3D Model', 'textdomain');
        return $columns;
    }
    add_filter('manage_edit-product_columns', 'arviewz_add_custom_column_to_products_list', 10, 1);
}
if (!function_exists('arviewz_custom_product_column_content')) {
    function arviewz_custom_product_column_content($column, $post_id)
    {
        switch ($column) {
            case '3d_model_config':
                $model_url = get_post_meta($post_id, 'model_url', true);
                $button_text = empty($model_url) ? 'Add 3D Model' : 'Update 3D Model';
                $url = admin_url('admin.php?page=add-model-url&product_id=' . $post_id);
                echo '<a href="' . esc_url($url) . '" class="button button-primary p-2 btn-sm">' . esc_html($button_text) . '</a>';
                break;
        }
    }
    add_action('manage_product_posts_custom_column', 'arviewz_custom_product_column_content', 10, 2);
}
if (!function_exists('arviewz_products_page')) {
    function arviewz_products_page()
    {
        $options = get_option('arviewz_settings');
        $api_key = isset($options['arviewz_text_field_0']) ? $options['arviewz_text_field_0'] : '';

        if (empty($api_key)) {
            echo '<div class="wrap"><h2>ARViewz</h2><p>Please add your ARViewz key in the <a href="' . esc_url(admin_url('admin.php?page=arviewz-settings')) . '">settings</a> first.</p></div>';
        } else {
            $per_page = 10;
            $paged = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => $per_page,
                'paged' => $paged,
                'order' => 'ASC',
            );

            $products_query = new WP_Query($args);

            echo '<div class="wrap">
                <h2>All Products</h2>
                <table class="wp-list-table widefat fixed striped table-view-list posts">
                <thead>
                <tr>
                <th>Product Title</th>
                <th>Product Image</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>';

            if ($products_query->have_posts()) {
                while ($products_query->have_posts()) {
                    $products_query->the_post();
                    $product_id = get_the_ID();
                    $product_title = get_the_title();
                    $product_image = get_the_post_thumbnail($product_id, 'thumbnail');
                    $model_url = get_post_meta($product_id, 'model_url', true);
                    $button_text = empty($model_url) ? 'Add 3D Model' : 'Update 3D Model';

                    echo '<tr><td>' . esc_html($product_title) . '</td><td>' .wp_kses_post($product_image) . '</td><td><a href="' . esc_url(admin_url('admin.php?page=add-model-url&product_id=' . $product_id)) . '" class="button-primary">' . esc_html($button_text) . '</a></td></tr>';
                }
            } else {
                echo '<tr><td colspan="3">No products found.</td></tr>';
            }
            echo '</tbody></table>';
            $total_pages = $products_query->max_num_pages;
            if ($total_pages > 1) {
                $current_page = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;
                echo '<div class="pagination" style="margin:2rem; float:right;">' . wp_kses_post(paginate_links(array(
                    'base' => add_query_arg('paged', '%#%'),
                    'format' => '',
                    'current' => $current_page,
                    'total' => $total_pages,
                    'prev_text' => __('&laquo; Previous'),
                    'next_text' => __('Next &raquo;'),
                ))) . '</div>';
            }
            echo '</div>';
            wp_reset_postdata();
        }
    }
    function arviewz_add_query_vars($vars)
    {
        $vars[] = "paged";
        return $vars;
    }
    add_filter('query_vars', 'arviewz_add_query_vars');
}

if (!function_exists('arviewz_get_model_urls')) {
    function arviewz_get_model_urls()
    {
        $api_key = get_option('arviewz_settings');
        if (empty($api_key)) {
            return new WP_Error('no_api_key', 'No ARViewz key provided');
        }
        $url = ARVIEWZ_GET_PRODUCTS_URL .$api_key['arviewz_text_field_0'];

        // Make the HTTP GET request
        $response = wp_remote_get($url);
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);
       
        // Check for errors
        if (isset($data['error'])) {
            add_settings_error(
                'model_url_submission',
                'arviewz_text_field_0_updated',
                $data['error'],
                'error'
            );
            return [];
        }
        if (json_last_error() !== JSON_ERROR_NONE) {
            return new WP_Error('json_error', 'JSON decode error');
        }     
        return $data;
    }
}
if (!function_exists('arviewz_add_model_url_page')) {
    function arviewz_add_model_url_page()
    {
        $op = get_option('arviewz_add_model_url_page');
        $options = get_option('arviewz_settings');
        $api_key = isset($options['arviewz_text_field_0']) ? $options['arviewz_text_field_0'] : '';

        if (empty($api_key)) {
        ?>
            <div class="wrap">
                <h2>ARViewz</h2>
                <p>Please add your ARViewz key in the <a href="<?php echo esc_url(admin_url('admin.php?page=arviewz-settings')); ?>">settings</a> first.</p>
            </div>
        <?php
        } else {
            if (!isset($_GET['product_id'])) {
                echo 'Product ID not provided.';
                return;
            }
            $product_id = intval($_GET['product_id']);
            $product_title = get_the_title($product_id);
            $model_urls = arviewz_get_model_urls();
            $model_url = get_post_meta($product_id, 'model_url', true);
            $btn_url = get_post_meta($product_id, 'btn_url', true);
            $embed_html_meta = get_post_meta($product_id, 'embed_html', true);
            $add_3d_model_meta = get_post_meta($product_id, 'add_3d_model', true);
            $embed_html = !empty($embed_html_meta) ? $embed_html_meta : 'yes';
            $add_3d_model = !empty($add_3d_model_meta) ? $add_3d_model_meta : 'no';
        ?>
            <div class="wrap widefat">
                <h1 class="arviewz-title">Add 3D Model</h1>
                <div class="product-details">
                    <h1><?php echo esc_html($product_title); ?></h1>
                    <div class="product-image">
                        <?php echo get_the_post_thumbnail($product_id, 'medium'); ?>
                    </div>
                    <div class="product-description">
                        <?php echo wp_kses_post(apply_filters('the_content', get_post_field('post_content', $product_id))); ?>
                    </div>
                </div>
                <div class="add-model-form">
                    <form method="post" action="" style="padding:20px;">
                        <div><?php settings_errors('model_url_submission'); ?></div>
                        <h2>Select 3D Model for <?php echo esc_html($product_title); ?></h2>
                        <input type="hidden" name="product_id" value="<?php echo esc_attr($product_id); ?>" />
                        <input type="hidden" name="action" value="arviewz_handle_model_url_submission">

                        <label for="model_url">Select 3D Model Product:</label>
                        <select name="model_url" id="model_url" class="arviewz-select2" required>
                            <option value="" disabled selected>Select Model URL</option>
                            <?php 
                            if(count($model_urls)){
                               foreach ($model_urls as $url):  ?>
                                  <option value="<?php echo esc_attr($url['id']); ?>" <?php echo strpos($model_url, esc_attr($url['id'])) ? 'selected' : ''; ?>><?php echo esc_html($url['title']); ?></option>
                            <?php endforeach; } ?>
                        </select>
                        <br><br>
                        <label>Do you want to embed HTML with product images?</label><br>
                        <label><input type="radio" name="embed_html" value="yes" <?php echo ($embed_html == 'yes') ? 'checked' : ''; ?>> Yes</label>
                        <label><input type="radio" name="embed_html" value="no" <?php echo ($embed_html == 'no') ? 'checked' : ''; ?>> No</label>
                        <?php if ($btn_url) { ?>
                            <br><br>
                            <div class="">3D Button URL: <a href="<?php echo esc_url($btn_url); ?>" target="_blank"><?php echo esc_url($btn_url); ?></a></div>
                        <?php } ?>
                        <hr>
                        <br><br>
                        <label>Do you want to add 3D model to product?</label><br>
                        <label><input type="radio" name="add_3d_model" value="yes" <?php echo ($add_3d_model == 'yes') ? 'checked' : ''; ?>> Yes</label>
                        <label><input type="radio" name="add_3d_model" value="no" <?php echo ($add_3d_model == 'no') ? 'checked' : ''; ?>> No</label>

                        <?php if ($model_url) { ?>
                            <br><br>
                            <div class="">3D Model URL: <a href="<?php echo esc_url($model_url); ?>" target="_blank"><?php echo esc_url($model_url); ?></a></div>
                        <?php } ?>
                        <hr>
                        <br><br>

                        <input type="submit" name="submit" value="Save 3D Model" class="button-primary mt-0">
                    </form>
                </div>
                <div class="back-btn"><a class="button-secondary mt-5" href="<?php echo esc_url(admin_url('admin.php?page=arviewz-products')); ?>">Go To All Products</a></div>
            </div>

        <?php
        }
    }
}
if (!function_exists('arviewz_handle_model_url_submission')) {
    function arviewz_handle_model_url_submission()
    {
        if (isset($_POST['submit'])) {
            $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;

            $model_url_input = isset($_POST['model_url']) ? sanitize_text_field($_POST['model_url']) : '';
            $model_url = esc_url(ARVIEWZ_URL . "products/{$model_url_input}/modelviewer");
            $btn_url = esc_url(ARVIEWZ_URL . "products/{$model_url_input}/arbutton?arModel=true");

            if ($product_id) {
                update_post_meta($product_id, 'model_url', $model_url);
                update_post_meta($product_id, 'btn_url', $btn_url);

                if (isset($_POST['embed_html'])) {
                    $embed_html = wp_kses_post($_POST['embed_html']);
                    update_post_meta($product_id, 'embed_html', $embed_html);
                }

                if (isset($_POST['add_3d_model'])) {
                    $add_3d_model = sanitize_text_field($_POST['add_3d_model']);
                    update_post_meta($product_id, 'add_3d_model', $add_3d_model);
                }

                add_settings_error(
                    'model_url_submission',
                    'model_url_submission_success',
                    '3D Model and button settings updated successfully!',
                    'updated'
                );
            }
        }
    }
    add_action('admin_init', 'arviewz_handle_model_url_submission');
}

if (!function_exists('arviewz_add_3d_model_to_gallery')) {
    function arviewz_add_3d_model_to_gallery($html, $thumbnail_id)
    {
        global $product;
        static $first_thumbnail = true;
        if ($first_thumbnail) {
            $model_url = get_post_meta($product->get_id(), 'model_url', true);
            $show3dModel = get_post_meta($product->get_id(), 'add_3d_model', true);
            if (!empty($model_url) && $show3dModel == 'yes') {
                $iframe_html = '<div class="woocommerce-product-gallery__image arviewz-3d-model" id="arviewz-3d-model">';
                $iframe_html .= '<iframe src="' . esc_url($model_url) . '" style="width:100%; height:400px;" frameborder="0" allowfullscreen></iframe>';
                $iframe_html .= '</div>';
                $first_thumbnail = false;
                return $iframe_html . $html;
            }
        }
        return $html;
    }
    add_filter('woocommerce_single_product_image_thumbnail_html', 'arviewz_add_3d_model_to_gallery', 10, 2);
}
if (!function_exists('arviewz_add_button_to_each_product_image')) {
    function arviewz_add_button_to_each_product_image($html, $attachment_id)
    {
        global $product;
        $showButton = get_post_meta($product->get_id(), 'embed_html', true);
        if ($showButton == 'yes') {
            $button_url = get_post_meta($product->get_id(), 'btn_url', true);
            $image_url = wp_get_attachment_url($attachment_id);
            $src = ARVIEWZ_PLUGIN_URL . '/assets/images/ar-model-viewer-action-new.png';
            $button_html = '<div style="position: relative; top: -10; z-index: 100002 !important;">'
                . '<a href="' . esc_url($button_url) . '" target="_blank" onclick="event.stopPropagation();">'
                . '<img src="' . $src . '" style="position:relative !important; top:-50px; width: 30% !important; height: 30% !important; z-index: 100002 !important;">'
                . '</a></div>';
            $html = preg_replace('/(<img[^>]+>)/', '$1' . $button_html, $html);
            return $html;
        }
        return $html;
    }
    add_filter('woocommerce_single_product_image_thumbnail_html', 'arviewz_add_button_to_each_product_image', 1000, 2);
    add_filter('woocommerce_single_product_image_html', 'arviewz_add_button_to_each_product_image', 1000, 2);
}

if (!function_exists('arviewz_index_page')) {
    function arviewz_index_page()
    {
        ?>
        <div class="wrap">
            <h2>ARViewz</h2>
            <h1>ARViewz Integration Guide for WooCommerce</h1>
            <p>Welcome to the ARViewz WooCommerce integration guide! Follow these steps to seamlessly integrate 3D product models into your WooCommerce store using the ARViewz WordPress plugin.</p>

            <h2>How to Integrate ARViewz with WooCommerce Using Your ARViewz Key</h2>
            <p>This guide describes how to use the ARViewz WordPress plugin to integrate 3D product models into your WooCommerce store.</p>

            <h2>Step 1: Install the ARViewz WordPress Plugin</h2>
            <p>Install and activate the ARViewz plugin in your WordPress dashboard. This plugin enables the connection between ARViewz's 3d modeling features and your WooCommerce products.</p>

            <h2>Step 2: Obtain Your ARViewz Key</h2>
            <p>Log in to your ARViewz account and navigate to the settings > ARViewz key section to retrieve your ARViewz key. This key is essential for authenticating and retrieving your 3D product models.</p>

            <h2>Step 3: Configure the Plugin</h2>
            <p>In the WordPress admin panel, go to the <a href="<?php echo esc_url(admin_url('admin.php?page=arviewz-settings')); ?>">ARViewz settings page</a> and Enter your ARViewz key to link your WooCommerce products with ARViewz 3D models.</p>

            <h2>Step 4: Embed AR Models in Your Products</h2>
            <p>Use the ARViewz platform to upload and convert your product images into 3D models. Each model will be given a unique URL which you can embed into the product gallary to display the 3D model to view on your product.</p>

            <h2>Step 5: Add/Update 3D Models in Your Products</h2>
            <p>Use the ARViewz platform to upload and convert your product images into 3D models. Each model will be given a unique URL which you can embed into the product gallary to display the 3D model view on your product.</p>

            <h2>Step 6: Display 3D Models</h2>
            <p>Go to <a href="<?php echo esc_url(admin_url('admin.php?page=arviewz-products')); ?>">product page</a> select product and click Add/Update 3D model button and on next step select 3D model from dropdown list and add to product. </p>

            <h2>Support</h2>
            <p>If you encounter any issues or need further assistance, please contact the <a href="<?php echo esc_url(ARVIEWZ_URL); ?>" target="_blank"> ARViewz</a> support team through your account portal or visit our help section.</p>

        </div>
    <?php
    }
}
if (!function_exists('arviewz_settings_page')) {
    function arviewz_settings_page()
    {
    ?>
        <div class="wrap">
            <h2>ARViewz Setting</h2>
            <form action='options.php' method='post' class='form'>
                <div><?php settings_errors('arviewz_settings'); ?></div>
                <?php
                settings_fields('arviewz');
                do_settings_sections('arviewz');
                submit_button();
                ?>
            </form>
        </div>
    <?php
    }
}
if (!function_exists('arviewz_settings_init')) {
    function arviewz_settings_init()
    {
        register_setting(
            'arviewz',
            'arviewz_settings',
            'arviewz_sanitize_settings'
        );
        add_settings_section(
            'arviewz_arviewz_section',
            __('Add ARViewz Key', 'arviewz'),
            'arviewz_settings_section_callback',
            'arviewz'
        );

        add_settings_field(
            'arviewz_text_field_0',
            __('ARViewz key', 'arviewz'),
            'arviewz_text_field_0_render',
            'arviewz',
            'arviewz_arviewz_section'
        );
    }
}
if (!function_exists('arviewz_sanitize_settings')) {
    function arviewz_sanitize_settings($input)
    {
        $current_settings = get_option('arviewz_settings');
        $new_input = array();

        if (isset($input['arviewz_text_field_0'])) {
            $arviewz_key = trim($input['arviewz_text_field_0']);
            if (strpos($arviewz_key, ' ') !== false) {
                add_settings_error(
                    'arviewz_settings',
                    'arviewz_text_field_0_error',
                    'The ARViewz key is invalid. Please enter a valid key.',
                    'error'
                );
                return $current_settings;
            } else {
                $new_input['arviewz_text_field_0'] = sanitize_text_field($arviewz_key);
                add_settings_error(
                    'arviewz_settings',
                    'arviewz_text_field_0_updated',
                    'ARViewz key settings updated successfully!',
                    'updated'
                );
            }
        }

        return $new_input;
    }
}
if (!function_exists('arviewz_text_field_0_render')) {
    function arviewz_text_field_0_render()
    {
        $options = get_option('arviewz_settings');
        $value = isset($options['arviewz_text_field_0']) ? esc_attr($options['arviewz_text_field_0']) : '';
    ?>
        <input type='text' name='arviewz_settings[arviewz_text_field_0]' class="form-control arviewz-input" value='<?php echo esc_attr($value); ?>'>
<?php
    }
}
if (!function_exists('arviewz_settings_section_callback')) {
    function arviewz_settings_section_callback()
    {
        echo esc_html_e('Please enter your ARViewz key below.', 'arviewz');
    }
    add_action('admin_init', 'arviewz_settings_init');
}


register_activation_hook(__FILE__, 'arviewz_plugin_activate');
function arviewz_plugin_activate()
{
    // Set default options
    add_option('arviewz_3d_model_store_url', 'testing');
}

register_deactivation_hook(__FILE__, 'arviewz_plugin_deactivate');
function arviewz_plugin_deactivate()
{
    // Cleanup: remove options
    delete_option('arviewz_3d_model_store_url');
}
