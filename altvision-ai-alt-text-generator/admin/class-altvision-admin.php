<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('AltVision_Admin')):

    class AltVision_Admin {
        public function __construct() {
            add_action('admin_menu', array($this, 'add_admin_menu'));
            add_action('admin_init', array($this, 'register_settings'));
            add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
            add_action('rest_api_init', array($this, 'register_rest_routes')); // Add this line
        }

        public function enqueue_admin_scripts($hook) {
            if ('toplevel_page_alt-text-manager' !== $hook) {
                return;
            }
            
            // Enqueue WordPress's bundled React
            wp_enqueue_script('wp-element');
            
            // Enqueue your admin script
            wp_enqueue_script(
                'altvision-admin',
                plugin_dir_url(__FILE__) . 'dist/admin.iife.js',
                array('wp-element'),
                ALTVISION_VERSION,
                true
            );
        
            wp_localize_script(
                'altvision-admin',
                'wpApiSettings',
                array(
                    'root' => esc_url_raw(rest_url()),
                    'nonce' => wp_create_nonce('wp_rest')
                )
            );


            wp_localize_script('altvision-admin', 'wpAltVision', array(
                'siteUrl' => rest_url(), 
                'nonce' => wp_create_nonce('wp_rest')
            ));
        
            wp_localize_script(
                'altvision-admin',
                'altVisionData',
                array(
                    'nonce' => wp_create_nonce('wp_rest'),
                    'apiUrl' => rest_url('altvision/v1/'),
                    'settings' => get_option('altvision_settings', array()),
                    'page' => $hook  // This will help identify which page we're on
                )
            );
        
            wp_enqueue_style(
                'altvision-admin',
                plugin_dir_url(__FILE__) . 'dist/admin.css',
                array(),
                ALTVISION_VERSION
            );
        }
    
        public function add_admin_menu() {
            add_menu_page(
                'Alt Text Manager', // Page title
                'Alt Text Manager', // Menu title
                'manage_options',   // Capability
                'alt-text-manager', // Menu slug
                array($this, 'render_alt_text_manager'), // Callback function
                'dashicons-images-alt2', // Icon
                30 // Position
            );
            add_options_page(
                __('AltVision Settings', 'altvision-ai-alt-text-generator'),
                __('AltVision', 'altvision-ai-alt-text-generator'),
                'manage_options',
                'altvision',
                array($this, 'render_admin_page')
            );
        }
    
        public function register_settings() {
            register_setting(
                'altvision_options',
                'altvision_settings',
                array(
                    'sanitize_callback' => array($this, 'sanitize_settings'),
                    'default' => array('api_key' => '')
                )
            );
    
            add_settings_section(
                'altvision_api_settings',
                __('AltVision Settings', 'altvision-ai-alt-text-generator'),
                array($this, 'render_api_section'),
                'altvision'
            );
    
            add_settings_field(
                'api_key',
                __('API Key', 'altvision-ai-alt-text-generator'),
                array($this, 'render_text_field'),
                'altvision',
                'altvision_api_settings',
                array('label_for' => 'api_key')
            );
        }
        
        public function render_alt_text_manager() {
            ?>
            <div class="wrap">
                <h1>Alt Text Manager</h1>
                <div id="altvision-root"></div>
            </div>
            <?php
        }

        public function register_rest_routes() {
            register_rest_route('wp/v2', '/media/stats', array(
                'methods' => 'GET',
                'callback' => array($this, 'get_media_stats'),
                'permission_callback' => function() {
                    return current_user_can('upload_files');
                }
            ));
        
            // Add filter for media endpoint
            add_filter('rest_attachment_query', function ($args, $request) {
                if ($request->get_param('alt_text_status')) {
                    $status = $request->get_param('alt_text_status');
                    
                    $args['meta_query'] = array(
                        array(
                            'key' => '_wp_attachment_image_alt',
                            'compare' => $status === 'has-alt' ? 'EXISTS' : 'NOT EXISTS'
                        )
                    );
        
                    if ($status === 'has-alt') {
                        $args['meta_query'][0]['value'] = array('');
                        $args['meta_query'][0]['compare'] = 'NOT IN';
                    }
                }

                // Handle alt text search
                if ($request->get_param('meta_query')) {
                    $meta_query = $request->get_param('meta_query');
                    if (!isset($args['meta_query'])) {
                        $args['meta_query'] = array();
                    }
                    $args['meta_query'][] = $meta_query;
                }


                return $args;
            }, 10, 2);
        }


        public function get_media_stats() {
            global $wpdb;
            
            // Efficient SQL query to get counts in a single query
            $stats = $wpdb->get_row("
                SELECT 
                    COUNT(*) as total,
                    SUM(CASE 
                        WHEN pm.meta_value IS NOT NULL AND pm.meta_value != '' 
                        THEN 1 
                        ELSE 0 
                    END) as has_alt
                FROM {$wpdb->posts} p
                LEFT JOIN {$wpdb->postmeta} pm 
                    ON p.ID = pm.post_id 
                    AND pm.meta_key = '_wp_attachment_image_alt'
                WHERE p.post_type = 'attachment'
                AND p.post_mime_type LIKE 'image/%'
            ");
    
            if (!$stats) {
                return new WP_REST_Response(array(
                    'error' => 'Failed to fetch statistics'
                ), 500);
            }
    
            $total = (int) $stats->total;
            $has_alt = (int) $stats->has_alt;
            
            return new WP_REST_Response(array(
                'total' => $total,
                'has_alt' => $has_alt,
                'no_alt' => $total - $has_alt
            ), 200);
        }

        public function render_admin_page() {
            if (!current_user_can('manage_options')) {
                return;
            }

            $license_status = get_option('altvision_license_status', false);
            ?>
            
            <div class="wrap">
                <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
                
                <!-- API Key Settings Section -->
                <?php if ($license_status): ?>
                    <div class="notice notice-success">
                        <p>✨ <?php _e('Your Pro subscription is active!', 'altvision-ai-alt-text-generator'); ?></p>
                    </div>
                <?php endif; ?>

                <div class="card">
                    <form action="options.php" method="post">
                        <?php
                        settings_fields('altvision_options');
                        do_settings_sections('altvision');
                        submit_button();
                        ?>
                    </form>
                </div>

                <!-- Subscription Section -->
                <div class="card altvision-subscription-card">
                    <h2><?php _e('AltVision Pro', 'altvision-ai-alt-text-generator'); ?></h2>

                    <?php if (!$license_status): ?>
                        <p class="altvision-pro-intro">
                            <?php _e('Upgrade to Pro and get unlimited AI-powered alt text generation for your images.', 'altvision-ai-alt-text-generator'); ?>
                        </p>

                        <ul class="altvision-features">
                            <li><?php _e('✨ Unlimited image processing', 'altvision-ai-alt-text-generator'); ?></li>
                            <li><?php _e('🚀 Priority support', 'altvision-ai-alt-text-generator'); ?></li>
                            <li><?php _e('🎯 Advanced contextual analysis', 'altvision-ai-alt-text-generator'); ?></li>
                            <li><?php _e('⚡ Batch processing', 'altvision-ai-alt-text-generator'); ?></li>
                        </ul>

                        <button id="altvision-checkout-button" class="button button-primary">
                            <?php _e('Subscribe Now - $4.99/month', 'altvision-ai-alt-text-generator'); ?>
                        </button>

                        <script>
                        document.getElementById('altvision-checkout-button').addEventListener('click', function(e) {
                            e.preventDefault();
                            this.disabled = true;
                            this.textContent = '<?php echo esc_js(__('Please wait...', 'altvision-ai-alt-text-generator')); ?>';

                            fetch(ajaxurl, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded',
                                },
                                body: new URLSearchParams({
                                    action: 'altvision_create_checkout',
                                    nonce: '<?php echo wp_create_nonce('altvision_checkout'); ?>'
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success && data.data.checkout_url) {
                                    window.location.href = data.data.checkout_url;
                                } else {
                                    throw new Error(data.data?.message || 'Checkout failed');
                                }
                            })
                            .catch(error => {
                                alert('Error: ' + error.message);
                                this.disabled = false;
                                this.textContent = '<?php echo esc_js(__('Subscribe Now - $4.99/month', 'altvision-ai-alt-text-generator')); ?>';
                            });
                        });
                        </script>
                    <?php else: ?>
                        <div class="altvision-subscription-active">
                            <p>
                                <?php _e('Thank you for being a Pro user! Your subscription is active and you have access to all premium features.', 'altvision-ai-alt-text-generator'); ?>
                            </p>
                            <p>
                                <button id="altvision-verify-license" class="button button-secondary">
                                    <?php _e('Verify License', 'altvision-ai-alt-text-generator'); ?>
                                </button>
                            </p>
                        </div>

                        <script>
                        (function() {
                            const verifyButton = document.getElementById('altvision-verify-license');
                            if (!verifyButton) {
                                console.error('Verify button not found');
                                return;
                            }

                            // Create message div if it doesn't exist
                            let messageDiv = document.getElementById('altvision-license-message');
                            if (!messageDiv) {
                                messageDiv = document.createElement('div');
                                messageDiv.id = 'altvision-license-message';
                                messageDiv.className = 'notice';
                                messageDiv.style.display = 'none';
                                
                                const messageParagraph = document.createElement('p');
                                messageDiv.appendChild(messageParagraph);
                                
                                // Insert after the h1
                                const h1 = document.querySelector('.wrap h1');
                                if (h1) {
                                    h1.parentNode.insertBefore(messageDiv, h1.nextSibling);
                                }
                            }

                            const messageParagraph = messageDiv.querySelector('p');
                            if (!messageParagraph) {
                                console.error('Message paragraph not found');
                                return;
                            }

                            verifyButton.addEventListener('click', function(e) {
                                e.preventDefault();
                                
                                messageDiv.style.display = 'none';
                                this.disabled = true;
                                this.textContent = '<?php echo esc_js(__('Verifying...', 'altvision-ai-alt-text-generator')); ?>';

                                const formData = new URLSearchParams();
                                formData.append('action', 'altvision_verify_license');
                                formData.append('nonce', '<?php echo wp_create_nonce('altvision_verify_license'); ?>');
                                formData.append('license_key', '<?php echo esc_js(get_option('altvision_license_key', '')); ?>');

                                fetch(ajaxurl, {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded'
                                    },
                                    body: formData
                                })
                                .then(response => response.json())
                                .then(data => {
                                    messageDiv.classList.remove('notice-success', 'notice-error');
                                    
                                    if (data.success) {
                                        messageDiv.classList.add('notice-success');
                                        messageParagraph.textContent = '<?php echo esc_js(__('License verified successfully!', 'altvision-ai-alt-text-generator')); ?>';
                                    } else {
                                        throw new Error(data.data?.message || '<?php echo esc_js(__('License verification failed', 'altvision-ai-alt-text-generator')); ?>');
                                    }
                                    messageDiv.style.display = 'block';
                                })
                                .catch(error => {
                                    messageDiv.classList.add('notice-error');
                                    messageParagraph.textContent = 'Error: ' + error.message;
                                    messageDiv.style.display = 'block';
                                })
                                .finally(() => {
                                    this.disabled = false;
                                    this.textContent = '<?php echo esc_js(__('Verify License', 'altvision-ai-alt-text-generator')); ?>';
                                });
                            });
                        })();
                        </script>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        }
    
        public function render_text_field($args) {
            $options = get_option('altvision_settings');
            $license_key = get_option('altvision_license_key', '');
            $value = !empty($license_key) ? $license_key : (isset($options[$args['label_for']]) ? $options[$args['label_for']] : '');
            ?>
            <input type="text" 
                   id="<?php echo esc_attr($args['label_for']); ?>"
                   name="altvision_settings[<?php echo esc_attr($args['label_for']); ?>]"
                   value="<?php echo esc_attr($value); ?>"
                   class="regular-text">
            <p class="description">
                <?php _e('Enter your API key here. This will be automatically populated when you subscribe.', 'altvision-ai-alt-text-generator'); ?>
            </p>
            <?php
        }
    
        public function sanitize_settings($input) {
            $sanitized = array();
            if (isset($input['api_key'])) {
                $sanitized['api_key'] = sanitize_text_field($input['api_key']);
                // Update the license key option
                update_option('altvision_license_key', $sanitized['api_key']);
                
                // Verify the license with the API
                $api_url = 'https://api-altvision.cstate.se';
                $response = wp_remote_post($api_url . '/verify-license', [
                    'body' => json_encode([
                        'api_key' => $sanitized['api_key'],
                        'domain' => parse_url(get_site_url(), PHP_URL_HOST)
                    ]),
                    'headers' => [
                        'Content-Type' => 'application/json'
                    ]
                ]);

                if (!is_wp_error($response)) {
                    $body = json_decode(wp_remote_retrieve_body($response));
                    $is_valid = !empty($body->valid);
                    update_option('altvision_license_status', $is_valid);
                    
                    if (!$is_valid) {
                        add_settings_error(
                            'altvision_settings',
                            'invalid_license',
                            __('AltVision Pro License Invalid', 'altvision-ai-alt-text-generator'),
                            'error'
                        );
                    }
                } else {
                    update_option('altvision_license_status', false);
                    add_settings_error(
                        'altvision_settings',
                        'invalid_license',
                        __('AltVision Pro License Invalid', 'altvision-ai-alt-text-generator'),
                        'error'
                    );
                }
            }
            return $sanitized;
        }

    
        public function render_api_section() {
            echo '<p>' . esc_html__('Enter your API key to activate premium features.', 'altvision-ai-alt-text-generator') . '</p>';
        }
    }

endif;