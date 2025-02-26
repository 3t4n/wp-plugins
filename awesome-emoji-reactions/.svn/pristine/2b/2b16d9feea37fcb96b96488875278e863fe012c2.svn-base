<?php
if (!defined('ABSPATH')) {
    exit;
}

require_once plugin_dir_path(__FILE__) . 'trait-aer-db-operations.php';

class aerppk_Reactions {
    use aerppk_DB_Operations;
    
    public function __construct() {
        // Получаем сохраненные опции
        $saved_options = get_option('aerppk_options', array());
        
        // Устанавливаем значения по умолчанию
        $this->options = array(
            'enabled_emojis' => isset($saved_options['enabled_emojis']) ? $saved_options['enabled_emojis'] : array(),
            'allow_guests' => isset($saved_options['allow_guests']) ? (bool)$saved_options['allow_guests'] : false,
            'background_color' => isset($saved_options['background_color']) ? $saved_options['background_color'] : '#f0f2f5'
        );

        // Если есть сохраненные опции, обновляем значения
        if (!empty($saved_options)) {
            if (isset($saved_options['enabled_emojis'])) {
                if (is_string($saved_options['enabled_emojis'])) {
                    $decoded = json_decode($saved_options['enabled_emojis'], true);
                    $this->options['enabled_emojis'] = $decoded ? $decoded : $this->default_emojis;
                } elseif (is_array($saved_options['enabled_emojis'])) {
                    $this->options['enabled_emojis'] = $saved_options['enabled_emojis'];
                }
            }
            
            if (isset($saved_options['allow_guests'])) {
                $this->options['allow_guests'] = (bool)$saved_options['allow_guests'];
            }
            
            if (isset($saved_options['background_color'])) {
                $this->options['background_color'] = $saved_options['background_color'];
            }
        }

        // Отключаем проверку авторизации для admin-ajax.php
        add_action('plugins_loaded', function() {
            if (defined('DOING_AJAX') && DOING_AJAX) {
                if (isset($_POST['action']) && $_POST['action'] === 'add_reaction') {
                    // Добавляем проверку nonce
                    if (!check_ajax_referer('aerppk_reaction_nonce', 'nonce', false)) {
                        return;
                    }
                    
                    add_filter('auth_redirect_scheme', '__return_false');
                    add_filter('user_has_cap', function($allcaps) {
                        $allcaps['read'] = true;
                        return $allcaps;
                    });
                }
            }
        }, 1);

        // Регистрируем AJAX действия
        add_action('wp_ajax_add_reaction', array($this, 'handle_add_reaction'));
        add_action('wp_ajax_nopriv_add_reaction', array($this, 'handle_add_reaction'));
        
        // Добавляем фильтр для гостевого доступа к AJAX
        add_filter('ajax_auth_required_for_add_reaction', '__return_false');
        
        // Отключаем проверку авторизации для нашего AJAX endpoint
        if (defined('DOING_AJAX') && DOING_AJAX) {
            $this->maybe_disable_auth_redirect();
        }

        // REST API для гостей
        if ($this->options['allow_guests']) {
            add_action('rest_api_init', function () {
                register_rest_route('aer/v1', '/reaction', array(
                    'methods' => 'POST',
                    'callback' => array($this, 'handle_guest_reaction'),
                    'permission_callback' => function() {
                        return !is_user_logged_in() && $this->options['allow_guests'];
                    }
                ));
            });
        }
    }

    private function maybe_disable_auth_redirect() {
        $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
        if ($action === 'add_reaction') {
            add_filter('auth_redirect_scheme', '__return_false');
        }
    }

    public function register_ajax_handlers() {
        add_action('wp_ajax_add_reaction', array($this, 'handle_add_reaction'));
        add_action('wp_ajax_nopriv_add_reaction', array($this, 'handle_add_reaction'));
        
        // Отключаем проверку nonce для гостей
        if (!is_user_logged_in() && $this->options['allow_guests']) {
            add_filter('nonce_user_logged_out', '__return_false');
        }
    }

    public function enqueue_styles() {
        wp_enqueue_style(
            'aerppk-public-styles',
            aerppk_PLUGIN_URL . 'public/css/reactions.css',
            array(),
            aerppk_VERSION
        );

        // Add inline styles with user settings
        $background_color = isset($this->options['background_color']) ? esc_attr($this->options['background_color']) : '#ffffff';

        $custom_css = "
            .aerppk-reaction-button {
                background-color: {$background_color};
            }
        ";
        wp_add_inline_style('aerppk-public-styles', $custom_css);
    }

    public function enqueue_scripts() {
        wp_enqueue_script(
            'aerppk-public-scripts',
            aerppk_PLUGIN_URL . 'public/js/reactions.js',
            array('jquery'),
            aerppk_VERSION,
            true
        );

        // Создаем отдельный nonce для гостей
        $nonce = is_user_logged_in() ? 
            wp_create_nonce('aerppk-reaction-nonce') : 
            wp_create_nonce('aerppk-guest-reaction-nonce');

        wp_localize_script('aerppk-public-scripts', 'aerppkAjax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('aerppk_reaction_nonce'), // Добавляем nonce
            'restUrl' => rest_url(),
            'isLoggedIn' => is_user_logged_in() ? '1' : '',
            'allowGuests' => $this->options['allow_guests'] ? '1' : '',
            'messages' => array(
                'loginRequired' => __('Please log in to leave a reaction', 'awesome-emoji-reactions')
            )
        ));
    }

    public function render_reactions($content) {
        if (is_archive()) {
            return $content;
        }

        $post_id = get_the_ID();
        $user_id = get_current_user_id();
        
        // Используем методы из трейта
        $reactions = $this->get_reactions($post_id);
        $user_reaction = $this->get_user_reaction($post_id, $user_id);

        ob_start();
        
        if (isset($this->options['enabled_emojis']) && is_array($this->options['enabled_emojis'])): ?>
            <div class="aerppk-reactions-container" data-post-id="<?php echo esc_attr($post_id); ?>">
                <?php 
                foreach ($this->options['enabled_emojis'] as $emoji): 
                    // Пропускаем если это не строка
                    if (!is_string($emoji)) continue;
                    
                    // Получаем количество реакций
                    $count = 0;
                    if (isset($reactions[$emoji])) {
                        $count = is_array($reactions[$emoji]) ? count($reactions[$emoji]) : 0;
                    }
                    
                    $is_active = ($user_reaction === $emoji);
                    $button_class = 'aerppk-reaction-button' . ($is_active ? ' active' : '');
                    $title = sprintf(
                        /* translators: 1: Emoji symbol, 2: Number of reactions */
                        _n(
                            '%1$s - %2$d reaction',
                            '%1$s - %2$d reactions',
                            $count,
                            'awesome-emoji-reactions'
                        ),
                        $emoji,
                        $count
                    );
                ?>
                    <button type="button" 
                            class="<?php echo esc_attr($button_class); ?>" 
                            data-emoji="<?php echo esc_attr((string)$emoji); ?>"
                            title="<?php echo esc_attr($title); ?>"
                            style="background-color: <?php echo esc_attr($this->options['background_color']); ?>">
                        <span class="aerppk-emoji"><?php echo esc_html((string)$emoji); ?></span>
                        <span class="aerppk-count"><?php echo esc_html((int)$count); ?></span>
                    </button>
                <?php endforeach; ?>
            </div>
        <?php endif;
        
        $output = ob_get_clean();
        return implode('', (array)$content) . $output;
    }

    public function handle_add_reaction() {
        // Проверяем и очищаем nonce
        if (!isset($_POST['nonce']) || 
            !wp_verify_nonce(
                sanitize_text_field(wp_unslash($_POST['nonce'])), 
                'aerppk_reaction_nonce'
            )
        ) {
            wp_send_json_error('Invalid nonce');
            return;
        }

        // Проверяем наличие необходимых параметров
        if (!isset($_POST['post_id']) || !isset($_POST['emoji'])) {
            wp_send_json_error('Required parameters are missing');
            return;
        }
        
        // Очищаем входные данные
        $post_id = absint($_POST['post_id']);
        $emoji = sanitize_text_field(wp_unslash($_POST['emoji']));
        
        if (!is_user_logged_in()) {
            if (!$this->options['allow_guests']) {
                wp_send_json_error([
                    'message' => __('Please log in to leave a reaction', 'awesome-emoji-reactions'),
                    'code' => 'login_required'
                ]);
                return;
            }
            $user_id = $this->get_guest_id();
        } else {
            $user_id = get_current_user_id();
        }
        
        $existing = $this->get_reaction($post_id, $user_id);
        
        if ($existing) {
            if ($existing->emoji === $emoji) {
                // Удаляем реакцию через метод трейта
                $this->delete_reaction($post_id, $user_id);
            } else {
                // Обновляем реакцию через метод трейта
                $this->update_reaction($post_id, $user_id, $emoji);
            }
        } else {
            // Добавляем реакцию через метод трейта
            $this->insert_reaction($post_id, $user_id, $emoji);
        }
        
        wp_send_json_success(array(
            'reactions' => $this->get_reactions_for_post($post_id),
            'userReactions' => $this->get_user_reactions($post_id)
        ));
    }

    public function handle_remove_reaction() {
        // Проверяем и очищаем nonce
        if (!isset($_POST['nonce']) || 
            !wp_verify_nonce(
                sanitize_text_field(wp_unslash($_POST['nonce'])), 
                'aerppk-reaction-nonce'
            )
        ) {
            wp_send_json_error('Invalid nonce');
            return;
        }
        
        // Проверяем наличие необходимых параметров
        if (!isset($_POST['post_id']) || !isset($_POST['emoji'])) {
            wp_send_json_error('Required parameters are missing');
            return;
        }
        
        $post_id = intval($_POST['post_id']);
        $user_id = get_current_user_id();

        // Используем метод из трейта для удаления
        $result = $this->delete_reaction($post_id, $user_id);

        if ($result !== false) {
            wp_send_json_success(array(
                'reactions' => $this->get_reactions_for_post($post_id),
                'userReactions' => $this->get_user_reactions($post_id)
            ));
        }

        wp_send_json_error('Failed to delete reaction');
    }

    private function verify_ajax_request() {
        // Проверяем nonce в зависимости от типа пользователя
        $nonce_action = is_user_logged_in() ? 'aerppk-reaction-nonce' : 'aerppk-guest-reaction-nonce';
        
        if (!check_ajax_referer($nonce_action, 'nonce', false)) {
            wp_send_json_error(__('Security check failed', 'awesome-emoji-reactions'));
        }

        if (!is_user_logged_in() && !$this->options['allow_guests']) {
            wp_send_json_error(__('Guest reactions not allowed', 'awesome-emoji-reactions'));
        }
    }

    private function get_reactions_for_post($post_id) {
        global $wpdb;
        
        // Создаем ключ кэша
        $cache_key = 'aerppk_reactions_' . $post_id;
        
        // Пробуем получить данные из кэша
        $results = wp_cache_get($cache_key, 'aerppk_reactions');
        
        if (false === $results) {
            // Если в кэше нет, делаем запрос к БД
            // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
            $results = $wpdb->get_results($wpdb->prepare(
                "SELECT emoji, COUNT(*) as count 
                FROM {$wpdb->prefix}aerppk_reactions 
                WHERE post_id = %d 
                GROUP BY emoji",
                $post_id
            ));
            
            // Сохраняем в кэш на час
            wp_cache_set($cache_key, $results, 'aerppk_reactions', HOUR_IN_SECONDS);
        }
        
        $reactions = array();
        if ($results) {
            foreach ($results as $row) {
                $reactions[$row->emoji] = (int)$row->count;
            }
        }
        
        return $reactions;
    }

    private function get_user_reactions($post_id) {
        global $wpdb;
        
        // Для гостей используем префикс + IP
        if (!is_user_logged_in() && $this->options['allow_guests']) {
            $ip = '';
            if (isset($_SERVER['REMOTE_ADDR'])) {
                $ip = sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR']));
            }
            $user_id = 'guest_' . ip2long($ip);
        } else {
            $user_id = get_current_user_id();
        }

        // Создаем ключ кэша
        $cache_key = 'aerppk_user_reactions_' . $post_id . '_' . $user_id;
        
        // Пробуем получить данные из кэша
        $reactions = wp_cache_get($cache_key, 'aerppk_reactions');
        
        if (false === $reactions) {
            // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
            $reactions = $wpdb->get_col($wpdb->prepare(
                "SELECT emoji 
                FROM {$wpdb->prefix}aerppk_reactions 
                WHERE post_id = %d AND user_id = %s",
                $post_id,
                $user_id
            ));
            
            // Сохраняем в кэш на час
            wp_cache_set($cache_key, $reactions, 'aerppk_reactions', HOUR_IN_SECONDS);
        }
        
        return $reactions;
    }

    private function can_user_react($user_id, $post_id) {
        if ($user_id === 0 && !$this->options['allow_guests']) {
            return false;
        }

        $current_reactions = count($this->get_user_reactions($post_id));
        return $current_reactions < $this->options['max_reactions_per_user'];
    }

    private function get_reaction_title($emoji, $count) {
        return sprintf(
            /* translators: 1: Emoji symbol, 2: Number of reactions */
            _n(
                '%1$s - %2$d reaction',
                '%1$s - %2$d reactions',
                $count,
                'awesome-emoji-reactions'
            ),
            $emoji,
            $count
        );
    }

    private function is_reactions_enabled_for_post($post_id) {
        $post_type = get_post_type($post_id);

        // Получаем настройки для типов постов
        $enabled_post_types = isset($this->options['enabled_post_types']) ? 
            (array)$this->options['enabled_post_types'] : array('post');

        // Check if current post type is enabled
        if (!in_array($post_type, $enabled_post_types)) {
            return false;
        }

        // Check specific posts
        $enabled_posts = isset($this->options['enabled_posts']) ? 
            (array)$this->options['enabled_posts'] : array();
        $disabled_posts = isset($this->options['disabled_posts']) ? 
            (array)$this->options['disabled_posts'] : array();

        // If post in disabled list
        if (in_array($post_id, $disabled_posts)) {
            return false;
        }

        // If there is a list of enabled posts and current post is not in it
        if (!empty($enabled_posts) && !in_array($post_id, $enabled_posts)) {
            return false;
        }

        return true;
    }


    private function add_reaction($post_id, $user_id, $emoji) {
        global $wpdb;
        
        // Создаем ключ кэша
        $cache_key = 'aerppk_existing_reaction_' . $post_id . '_' . $user_id . '_' . $emoji;
        
        // Пробуем получить данные из кэша
        $existing = wp_cache_get($cache_key, 'aerppk_reactions');
        
        if (false === $existing) {
            // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
            $existing = $wpdb->get_var($wpdb->prepare(
                "SELECT id FROM {$wpdb->prefix}aerppk_reactions 
                WHERE post_id = %d AND user_id = %d AND emoji = %s",
                $post_id, $user_id, $emoji
            ));
            
            // Сохраняем в кэш на час
            wp_cache_set($cache_key, $existing, 'aerppk_reactions', HOUR_IN_SECONDS);
        }
        
        if ($existing) {
            return false;
        }
        // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
        $result = $wpdb->insert(
            $wpdb->prefix . 'aerppk_reactions',
            array(
                'post_id' => $post_id,
                'user_id' => $user_id,
                'emoji' => $emoji
            ),
            array('%d', '%d', '%s')
        );
        
        // Очищаем связанный кэш после вставки
        wp_cache_delete($cache_key, 'aerppk_reactions');
        wp_cache_delete('aerppk_reactions_' . $post_id, 'aerppk_reactions');
        wp_cache_delete('aerppk_user_reactions_' . $post_id . '_' . $user_id, 'aerppk_reactions');
        
        return $result;
    }

    private function decode_emoji($str) {
        // Декодируем HTML-сущности
        $decoded = html_entity_decode($str, ENT_QUOTES, 'UTF-8');
        
        // Delete leftovers of encoding (WORKS NOTICED)
        $decoded = preg_replace('/u0026#(\d+);u0026#65039;×|u0026#(\d+);×|&#(\d+);&#65039;|&#(\d+);|×/', '', $decoded);
        
        return trim($decoded);
    }

    private function get_reactions($post_id) {
        global $wpdb;
        
        // Создаем ключ кэша
        $cache_key = 'aerppk_all_reactions_' . $post_id;
        
        // Пробуем получить данные из кэша
        $results = wp_cache_get($cache_key, 'aerppk_reactions');
        
        if (false === $results) {
            // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
            $results = $wpdb->get_results($wpdb->prepare(
                "SELECT emoji, user_id 
                FROM {$wpdb->prefix}aerppk_reactions 
                WHERE post_id = %d",
                $post_id
            ));
            
            // Сохраняем в кэш на час
            wp_cache_set($cache_key, $results, 'aerppk_reactions', HOUR_IN_SECONDS);
        }
        
        $reactions = array();
        if ($results) {
            foreach ($results as $row) {
                if (!isset($reactions[$row->emoji])) {
                    $reactions[$row->emoji] = array();
                }
                $reactions[$row->emoji][] = $row->user_id;
            }
        }
        
        return $reactions;
    }

    private function get_user_reaction($post_id, $user_id) {
        global $wpdb;
        
        // Для гостей используем ID из cookie
        if (!is_user_logged_in() && $this->options['allow_guests']) {
            $user_id = $this->get_guest_id();
        }

        // Создаем ключ кэша
        $cache_key = 'aerppk_user_reaction_' . $post_id . '_' . $user_id;
        
        // Пробуем получить данные из кэша
        $reaction = wp_cache_get($cache_key, 'aerppk_reactions');
        
        if (false === $reaction) {
            // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
            $reaction = $wpdb->get_var($wpdb->prepare(
                "SELECT emoji 
                FROM {$wpdb->prefix}aerppk_reactions 
                WHERE post_id = %d AND user_id = %s",
                $post_id,
                $user_id
            ));
            
            // Сохраняем в кэш на час
            wp_cache_set($cache_key, $reaction, 'aerppk_reactions', HOUR_IN_SECONDS);
        }
        
        return $reaction ? $reaction : false;
    }

    private function get_guest_id() {
        $cookie_name = 'aerppk_guest_id';
        
        // Проверяем существующий ID гостя в cookie
        if (isset($_COOKIE[$cookie_name])) {
            return sanitize_text_field(wp_unslash($_COOKIE[$cookie_name]));
        }
        
        // Безопасное получение домена
        $domain = '';
        if (isset($_SERVER['HTTP_HOST'])) {
            $domain = sanitize_text_field(wp_unslash($_SERVER['HTTP_HOST']));
            // Удаляем порт из домена если он есть
            if (strpos($domain, ':') !== false) {
                $domain = strstr($domain, ':', true);
            }
        }
        
        // Остальной код метода остается без изменений
        $guest_id = 'guest_' . wp_generate_uuid4();
        
        setcookie(
            $cookie_name,
            $guest_id,
            [
                'expires' => time() + (30 * DAY_IN_SECONDS),
                'path' => '/',
                'domain' => $domain,
                'secure' => is_ssl(),
                'httponly' => true,
                'samesite' => 'Strict'
            ]
        );
        
        return $guest_id;
    }

    // Обработчик для гостей через REST API
    public function handle_guest_reaction($request) {
        $post_id = absint($request->get_param('post_id'));
        $emoji = sanitize_text_field($request->get_param('emoji'));
        $user_id = $this->get_guest_id();
        
        // Используем метод из трейта
        $existing = $this->get_reaction($post_id, $user_id);
        
        if ($existing) {
            if ($existing->emoji === $emoji) {
                // Используем метод из трейта
                $this->delete_reaction($post_id, $user_id);
            } else {
                // Используем метод из трейта
                $this->update_reaction($post_id, $user_id, $emoji);
            }
        } else {
            // Используем метод ��з трейта
            $this->insert_reaction($post_id, $user_id, $emoji);
        }
        
        return rest_ensure_response(array(
            'success' => true,
            'reactions' => $this->get_reactions_for_post($post_id),
            'userReaction' => $this->get_user_reaction($post_id, $user_id)
        ));
    }

    private function get_client_ip() {
        $ip = '';
        if (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR']));
        }
        return $ip;
    }
} 