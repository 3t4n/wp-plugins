<?php
if (!defined('ABSPATH')) {
    exit;
}

class aerppk_Admin {
    private $options;

    public function __construct() {
        // Get existing settings
        $this->options = get_option('aerppk_options');
        
        // Initialize empty array for emojis if options are not set
        if (!$this->options) {
            $this->options = array(
                'enabled_emojis' => array(), // Empty array instead of default
                'allow_guests' => false,
                'background_color' => '#f0f2f5'
            );
            update_option('aerppk_options', $this->options);
        }
        
        // Add AJAX handler
        add_action('wp_ajax_save_aerppk_options', array($this, 'save_aerppk_options'));
        
        // Add hook for scripts
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_scripts'));
        
        // Add filter to prevent automatic slashes
        add_filter('wp_unslash_post_data', array($this, 'prevent_emoji_slashes'), 10, 1);
        
        // Добавляем фильтр для предотвращения повторного кодирования
        add_filter('pre_update_option_aerppk_options', array($this, 'prevent_double_encoding'), 10, 2);
    }

    public function add_plugin_menu() {
        add_menu_page(
            esc_html__('Emoji Reactions', 'awesome-emoji-reactions'),
            esc_html__('Emoji Reactions', 'awesome-emoji-reactions'),
            'manage_options',
            'awesome-emoji-reactions',
            array($this, 'render_settings_page'),
            'dashicons-smiley',
            30
        );
    }

    public function register_settings() {
        register_setting(
            'aerppk_options',
            'aerppk_options',
            array($this, 'sanitize_options')
        );

        add_settings_section(
            'aerppk_general',
            esc_html__('General settings', 'awesome-emoji-reactions'),
            null,
            'awesome-emoji-reactions'
        );

        // Active emojis
        add_settings_field(
            'enabled_emojis',
            esc_html__('Active emojis', 'awesome-emoji-reactions'),
            array($this, 'enabled_emojis_callback'),
            'awesome-emoji-reactions',
            'aerppk_general'
        );

        // Allow guests
        add_settings_field(
            'allow_guests',
            esc_html__('Allow guests', 'awesome-emoji-reactions'),
            array($this, 'allow_guests_callback'),
            'awesome-emoji-reactions',
            'aerppk_general'
        );

        // Background color
        add_settings_field(
            'background_color',
            esc_html__('Background color', 'awesome-emoji-reactions'),
            array($this, 'background_color_callback'),
            'awesome-emoji-reactions',
            'aerppk_general'
        );
    }

    public function enabled_emojis_callback() {
        // Get current emojis from options
        $enabled_emojis = isset($this->options['enabled_emojis']) ? $this->options['enabled_emojis'] : array();
        
        // Check if it's an array
        if (!is_array($enabled_emojis)) {
            $enabled_emojis = array();
        }
        
        // Output container
        ?>
        <div class="aerppk-emoji-settings">
            <!-- Current selected emojis -->
            <div class="aerppk-selected-emojis-wrapper">
                <div class="aerppk-selected-emojis" id="selected-emojis-container">
                    <?php 
                    if (!empty($enabled_emojis)) {
                        foreach ($enabled_emojis as $emoji) {
                            printf(
                                '<span class="aerppk-emoji-tag" data-emoji="%1$s">
                                    <span class="emoji-content">%1$s</span>
                                    <button type="button" class="aerppk-remove-emoji" title="Delete">&times;</button>
                                </span>',
                                esc_attr($emoji)
                            );
                        }
                    } else {
                        echo '<div class="aerppk-no-emojis">No emojis selected</div>';
                    }
                    ?>
                </div>
            </div>

            <!-- Hidden field for storing values -->
            <input 
                type="hidden" 
                name="aerppk_options[enabled_emojis]" 
                id="enabled-emojis" 
                value="<?php echo esc_attr(wp_json_encode($enabled_emojis)); ?>"
            >

            <!-- Add button -->
            <div class="aerppk-emoji-actions">
                <button 
                    type="button" 
                    class="button button-secondary" 
                    id="add-emoji"
                    title="Click to add emoji"
                >
                    <span class="dashicons dashicons-plus" style="vertical-align: text-top;"></span>
                    <?php esc_html_e('Add emoji', 'awesome-emoji-reactions'); ?>
                </button>
            </div>
        </div>

        <!-- Status message -->
        <div id="aerppk-status-message" class="notice" style="display: none;"></div>
        <?php
    }

    public function allow_guests_callback() {
        $allow_guests = isset($this->options['allow_guests']) ? $this->options['allow_guests'] : false;
        ?>
        <label>
            <input type="checkbox" name="aerppk_options[allow_guests]" value="1" <?php checked(1, $allow_guests); ?>>
            <?php esc_html_e('Allow guests to leave reactions', 'awesome-emoji-reactions'); ?>
        </label>
        <?php
    }

    public function background_color_callback() {
        $color = isset($this->options['background_color']) ? $this->options['background_color'] : '#f0f2f5';
        ?>
        <input type="color" id="background_color" name="aerppk_options[background_color]" value="<?php echo esc_attr($color); ?>">
        <?php
    }

    public function render_settings_page() {
        if (!current_user_can('manage_options')) {
            return;
        }
        
        // Reset settings
        if (isset($_POST['reset_settings']) && check_admin_referer('aerppk_reset_settings')) {
            delete_option('aerppk_options');
            $this->options = array(
                'enabled_emojis' => array(),
                'allow_guests' => false,
                'background_color' => '#f0f2f5'
            );
            update_option('aerppk_options', $this->options);
            echo '<div class="notice notice-success"><p>' . esc_html_e('Settings reset to default values', 'awesome-emoji-reactions') . '</p></div>';
        }
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            
            <div class="aerppk-usage-info">
                <h2><?php esc_html_e('How to use', 'awesome-emoji-reactions'); ?></h2>
                <div class="aerppk-usage-block">
                    <h4><?php esc_html_e('Shortcode', 'aerppk-emoji-reactions'); ?></h4>
                    <code>[awesome_emoji_reactions]</code>
                </div>
                <div class="aerppk-usage-block">
                    <h4><?php esc_html_e('Gutenberg block', 'awesome-emoji-reactions'); ?></h4>
                    <p><?php esc_html_e('Find "Emoji Reactions" block in Gutenberg editor', 'awesome-emoji-reactions'); ?></p>
                </div>
            </div>

            <form action="options.php" method="post">
                <?php
                settings_fields('aerppk_options');
                do_settings_sections('awesome-emoji-reactions');
                submit_button();
                ?>
            </form>

            <!-- Reset settings form -->
            <form method="post" style="margin-top: 20px;">
                <?php wp_nonce_field('aerppk_reset_settings'); ?>
                <input type="submit" 
                       name="reset_settings" 
                       class="button button-secondary" 
                       value="<?php echo esc_attr__('Reset settings', 'awesome-emoji-reactions'); ?>"
                       onclick="return confirm('<?php echo esc_js(__('Are you sure? All settings will be reset to default values.', 'awesome-emoji-reactions')); ?>');">
            </form>
        </div>
        <?php
    }

    public function render_emoji_picker_field() {
        $enabled_emojis = isset($this->options['enabled_emojis']) ? $this->options['enabled_emojis'] : array();
        
        // Convert emojis to HTML entities
        $enabled_emojis = array_map(function($emoji) {
            return mb_convert_encoding($emoji, 'HTML-ENTITIES', 'UTF-8');
        }, $enabled_emojis);
        
        ?>
        <div class="wrap">
            <div class="aerppk-emoji-picker-container">
                <input type="hidden" 
                       id="selected-emojis" 
                       name="aerppk_options[enabled_emojis]" 
                       value="<?php echo esc_attr(wp_json_encode($enabled_emojis, JSON_UNESCAPED_UNICODE | JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS)); ?>"
                />
                <div class="aerppk-selected-emojis"></div>
            </div>
        </div>
        <?php
    }

    public function render_checkbox_field($args) {
        $field = $args['field'];
        ?>
        <label>
            <input type="checkbox" 
                   name="aerppk_options[<?php echo esc_attr($field); ?>]" 
                   value="1" 
                   <?php checked($this->options[$field]); ?>>
            <?php esc_html_e('Allow guests to leave reactions', 'awesome-emoji-reactions'); ?>
        </label>
        <?php
    }

    public function render_number_field($args) {
        $field = $args['field'];
        $min = isset($args['min']) ? $args['min'] : 1;
        $max = isset($args['max']) ? $args['max'] : 5;
        ?>
        <input type="number" 
               name="aerppk_options[<?php echo esc_attr($field); ?>]" 
               value="<?php echo esc_attr($this->options[$field]); ?>"
               min="<?php echo esc_attr($min); ?>"
               max="<?php echo esc_attr($max); ?>"
               class="small-text">
        <?php
    }

    public function render_color_field($args) {
        $field = $args['field'];
        ?>
        <input type="text" 
               name="aerppk_options[<?php echo esc_attr($field); ?>]" 
               value="<?php echo esc_attr($this->options[$field]); ?>"
               class="aerppk-color-field">
        <?php
    }

    public function enqueue_scripts($hook) {
        if ('toplevel_page_awesome-emoji-reactions' !== $hook) {
            return;
        }

        // Регистрируем скрипт с версией и указанием загрузки в футере
        wp_register_script(
            'aerppk-emoji-picker',
            aerppk_PLUGIN_URL . 'assets/js/emoji-picker.js',
            array('jquery'),
            aerppk_VERSION, // добавляем версию
            true // загружаем в футере
        );

        wp_register_script(
            'aerppk-admin',
            aerppk_PLUGIN_URL . 'assets/js/admin.js',
            array('jquery', 'wp-color-picker', 'aerppk-emoji-picker'),
            aerppk_VERSION,
            true
        );

        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_style('aerppk-admin', plugins_url('admin/css/admin.css', dirname(__FILE__)), array(), aerppk_VERSION);
        wp_enqueue_script('aerppk-admin', plugins_url('admin/js/admin.js', dirname(__FILE__)), array('jquery', 'wp-color-picker'), aerppk_VERSION, true);
    }

    public function enqueue_styles($hook) {
        if ('toplevel_page_awesome-emoji-reactions' !== $hook) {
            return;
        }

        wp_enqueue_style(
            'aerppk-admin-styles',
            aerppk_PLUGIN_URL . 'admin/css/admin.css',
            array(),
            aerppk_VERSION,
            'all'
        );
    }

    public function sanitize_options($input) {
        $sanitized = array();
        
        // Сохраняем текущие настройки для сравнения
        $current_options = get_option('aerppk_options', array());

        if (isset($input['enabled_emojis'])) {
            // Если значение приходит как JSON строка, декодируем его
            if (is_string($input['enabled_emojis']) && $this->is_json($input['enabled_emojis'])) {
                $emojis = json_decode($input['enabled_emojis'], true);
                $sanitized['enabled_emojis'] = array_map('sanitize_text_field', $emojis);
            } 
            // Если значение уже является массивом
            else if (is_array($input['enabled_emojis'])) {
                $sanitized['enabled_emojis'] = array_map('sanitize_text_field', $input['enabled_emojis']);
            }
            // Если ничего не подошло, используем текущие значения
            else {
                $sanitized['enabled_emojis'] = isset($current_options['enabled_emojis']) 
                    ? $current_options['enabled_emojis'] 
                    : array();
            }
        }

        // Сохраняем остальные опции
        if (isset($input['background_color'])) {
            $sanitized['background_color'] = sanitize_hex_color($input['background_color']);
        }

        if (isset($input['allow_guests'])) {
            $sanitized['allow_guests'] = (bool) $input['allow_guests'];
        }

        return $sanitized;
    }

    // Вспомогательная функция для проверки JSON
    private function is_json($string) {
        json_decode($string);
        return (json_last_error() === JSON_ERROR_NONE);
    }

    // Предотвращаем повторное кодирование
    public function prevent_double_encoding($new_value, $old_value) {
        if (isset($new_value['enabled_emojis']) && is_string($new_value['enabled_emojis'])) {
            if ($this->is_json($new_value['enabled_emojis'])) {
                $new_value['enabled_emojis'] = json_decode($new_value['enabled_emojis'], true);
            }
        }
        return $new_value;
    }

    public function register_blocks() {
        if (!function_exists('register_block_type')) {
            return;
        }

        wp_register_script(
            'aerppk-block',
            aerppk_PLUGIN_URL . 'admin/js/blocks/editor.js',
            array('wp-blocks', 'wp-element', 'wp-components', 'wp-editor'),
            aerppk_VERSION, // добавляем версию
            true // загружаем в футере
        );

        register_block_type('awesome-emoji-reactions/reactions', array(
            'apiVersion' => 2,
            'editor_script' => 'aerppk-block',
            'render_callback' => array($this, 'render_block')
        ));
    }

    public function render_block($attributes) {
        // Create an instance of the reactions class
        require_once aerppk_PLUGIN_DIR . 'includes/class-aer-reactions.php';
        $reactions = new aerppk_Reactions();
        
        // Return HTML reactions
        return $reactions->render_reactions($attributes);
    }

    public function save_aerppk_options() {
        check_ajax_referer('aerppk_admin_nonce', 'nonce');
        
        if (!current_user_can('manage_options')) {
            wp_send_json_error('Insufficient rights');
        }
        
        if (!isset($_POST['emojis'])) {
            wp_send_json_error('No emoji data provided');
            return;
        }
        
        // Очищаем и декодируем данные
        $emojis_raw = sanitize_text_field(wp_unslash($_POST['emojis']));
        $emojis = json_decode(sanitize_text_field($emojis_raw), true);
        
        if (!is_array($emojis)) {
            wp_send_json_error('Invalid emojis data');
            return;
        }
        
        // Получаем текущие настройки
        $options = get_option('aerppk_options', array());
        
        // Обновляем только эмодзи, сохраняя остальные настройки
        $options['enabled_emojis'] = array_map('sanitize_text_field', $emojis);
        
        // Удаляем старую опцию
        delete_option('aerppk_options');
        
        // Принудительно обновляем опцию
        $updated = update_option('aerppk_options', $options, true);
        
        // Проверяем результат
        if ($updated) {
            // Получаем актуальные данные из базы для проверки
            $current = get_option('aerppk_options');
            
            wp_send_json_success(array(
                'message' => 'Saved successfully',
                'emojis' => $current['enabled_emojis'],
                'debug' => array(
                    'saved' => $emojis,
                    'current' => $current['enabled_emojis']
                )
            ));
        } else {
            $current = get_option('aerppk_options');
            wp_send_json_error(array(
                'message' => 'Failed to save',
                'debug' => array(
                    'attempted' => $emojis,
                    'current' => $current['enabled_emojis']
                )
            ));
        }
    }

    public function enqueue_admin_scripts($hook) {
        if ('toplevel_page_awesome-emoji-reactions' !== $hook) {
            return;
        }

        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_style('aerppk-admin', plugins_url('admin/css/admin.css', dirname(__FILE__)), array(), aerppk_VERSION);
        wp_enqueue_script('aerppk-admin', plugins_url('admin/js/admin.js', dirname(__FILE__)), array('jquery', 'wp-color-picker'), aerppk_VERSION, true);

        wp_localize_script('aerppk-admin', 'aerppkAdmin', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('aerppk_admin_nonce')
        ));
    }

    public function prevent_emoji_slashes($data) {
        if (isset($data['action']) && $data['action'] === 'save_aerppk_options') {
            $data['emojis'] = wp_unslash($data['emojis']);
        }
        return $data;
    }
} 