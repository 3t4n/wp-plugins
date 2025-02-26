<?php
/*
Plugin Name: Advanced LLMs.txt Generator
Description: Generates and manages LLMs.txt file according to llmstxt.org rules with Rank Math and Yoast SEO compatibility.
Version: 1.7
Author: Taha BUYUKTAS
Author URI: https://tahabuyuktas.com/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

if (!defined('ABSPATH')) {
    exit;
}

class LLMsTxtGenerator {
    private $file_path;
    private $options;

    private const DEFAULT_OPTIONS = [
        'company_name'          => '',
        'company_description'   => '',
        'post_type_names'       => [],
        'enabled_post_types'    => ['post', 'page'],
        'manual_urls'           => [],
        'disabled_urls'         => [],
        'user_agents'           => [
            ['agent' => '*', 'rule' => 'Allow',   'path' => '/wp-content/uploads/'],
            ['agent' => '*', 'rule' => 'Disallow','path' => '/wp-admin/'],
            ['agent' => '*', 'rule' => 'Disallow','path' => '/wp-includes/']
        ],
        'custom_rules'          => [
            ['rule' => 'Training',   'value' => 'allowed'],
            ['rule' => 'Scraping',   'value' => 'limited'],
            ['rule' => 'APIAccess',  'value' => 'restricted']
        ],
        'show_user_agents'      => true,
        'show_custom_rules'     => true,
        'enabled_taxonomies'    => [],
        'taxonomy_names'        => [],
        'update_frequency'      => 'daily'
    ];

    public function __construct() {
        $this->file_path = ABSPATH . 'llms.txt';
        $this->init();
        $this->get_seo_plugin_data();
        add_action('save_post', [$this, 'update_llms_txt_on_publish'], 10, 3);
        add_action('before_delete_post', [$this, 'update_llms_txt_on_delete']);
        add_action('update_option_llms_txt_options', [$this, 'reschedule_cron'], 10, 2);
        add_action('init', [$this, 'add_llms_to_sitemap']);
    }

    private function get_seo_plugin_data() {
        $seo_data = ['name' => '', 'description' => ''];
        if (defined('WPSEO_VERSION')) {
            $seo_data['name'] = get_option('wpseo_titles')['title'] ?? get_bloginfo('name');
            $seo_data['description'] = get_option('wpseo_titles')['metadesc'] ?? get_bloginfo('description');
        } elseif (class_exists('RankMath')) {
            $seo_data['name'] = \RankMath\Helper::get_settings('titles.homepage_title') ?? get_bloginfo('name');
            $seo_data['description'] = \RankMath\Helper::get_settings('titles.homepage_description') ?? get_bloginfo('description');
        } else {
            $seo_data['name'] = get_bloginfo('name');
            $seo_data['description'] = get_bloginfo('description');
        }
        $this->options['company_name'] = empty($this->options['company_name']) ? $seo_data['name'] : $this->options['company_name'];
        $this->options['company_description'] = empty($this->options['company_description']) ? $seo_data['description'] : $this->options['company_description'];
    }

    public function add_llms_to_sitemap() {
        if (defined('WPSEO_VERSION')) {
            add_filter('wpseo_sitemap_index', [$this, 'yoast_sitemap_add_llms']);
        } elseif (class_exists('RankMath')) {
            add_filter('rank_math/sitemap/index', [$this, 'rankmath_sitemap_add_llms']);
        }
    }

    public function yoast_sitemap_add_llms($sitemap_index) {
        $sitemap_index .= sprintf('<sitemap><loc>%s</loc><lastmod>%s</lastmod></sitemap>', esc_url(home_url('/llms.txt')), current_time('c'));
        return $sitemap_index;
    }

    public function rankmath_sitemap_add_llms($sitemap_index) {
        $sitemap_index[] = ['loc' => home_url('/llms.txt'), 'lastmod' => current_time('c')];
        return $sitemap_index;
    }

    private function sync_noindex_urls() {
        $noindex_urls = [];
        $current_disabled_urls = $this->options['disabled_urls'] ?? [];
        $manual_disabled_urls = array_filter($current_disabled_urls, function($url) {
            // Manuel eklenmiş URL'leri korumak için, yalnızca mevcut içerik URL'leriyle eşleşmeyenleri al
            $all_urls = $this->get_all_urls_by_post_type();
            foreach ($all_urls as $type => $items) {
                foreach ($items as $item) {
                    if ($item['url'] === $url) return false;
                }
            }
            return true;
        });

        // Yoast SEO kontrolü
        if (defined('WPSEO_VERSION')) {
            $posts = get_posts(['post_type' => 'any', 'posts_per_page' => -1, 'meta_key' => '_yoast_wpseo_meta-robots-noindex', 'meta_value' => '1']);
            foreach ($posts as $post) {
                $noindex_urls[] = get_permalink($post->ID);
            }
        }
        // Rank Math kontrolü
        elseif (class_exists('RankMath')) {
            $posts = get_posts([
                'post_type' => 'any',
                'posts_per_page' => -1,
                'meta_query' => [
                    [
                        'key' => 'rank_math_robots',
                        'value' => 'noindex',
                        'compare' => 'LIKE'
                    ]
                ]
            ]);
            foreach ($posts as $post) {
                $noindex_urls[] = get_permalink($post->ID);
            }
        }

        // Yeni disabled_urls listesi: Manuel URL'ler + güncel noindex URL'ler
        $this->options['disabled_urls'] = array_unique(array_merge($manual_disabled_urls, $noindex_urls));
        update_option('llms_txt_options', $this->options); // Güncellemeyi kaydet
    }

    public function enqueue_admin_assets($hook) {
        if ($hook != 'toplevel_page_llms-txt-settings') return;
        wp_register_style('llms-txt-admin-style', plugins_url('assets/css/admin-style.css', __FILE__), [], '1.0.0');
        wp_enqueue_style('llms-txt-admin-style');
        wp_register_script('llms-txt-admin-script', plugins_url('assets/js/admin-script.js', __FILE__), ['jquery'], '1.0.0', true);
        wp_enqueue_script('llms-txt-admin-script');
        wp_localize_script('llms-txt-admin-script', 'llmsTxt', ['nonce' => wp_create_nonce('llms_txt_update'), 'ajaxUrl' => admin_url('admin-ajax.php')]);
    }

    private function init() {
        $this->options = wp_parse_args(get_option('llms_txt_options', []), self::DEFAULT_OPTIONS);
        if (is_admin()) {
            add_action('admin_menu', [$this, 'add_admin_menu']);
            add_action('admin_init', [$this, 'register_settings']);
            add_action('wp_ajax_update_llms_txt', [$this, 'handle_manual_update']);
            add_action('wp_ajax_add_manual_url', [$this, 'handle_add_manual_url']);
            add_action('wp_ajax_remove_manual_url', [$this, 'handle_remove_manual_url']);
            add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_assets']);
        }
        add_action('init', [$this, 'setup_cron']);
        add_action('llms_txt_auto_update', [$this, 'generate_llms_txt']);
    }

    public function add_admin_menu() {
        add_menu_page('LLMs.txt Ayarları', 'LLMs.txt', 'manage_options', 'llms-txt-settings', [$this, 'render_admin_page'], 'dashicons-admin-generic', 30);
    }

    public function register_settings() {
        $args = [
            'type' => 'object',
            'description' => 'LLMs.txt Generator plugin settings',
            'sanitize_callback' => [$this, 'sanitize_options'],
            'show_in_rest' => false,
            'default' => self::DEFAULT_OPTIONS,
            'schema' => [
                'type' => 'object',
                'required' => ['enabled_post_types'],
                'properties' => [
                    'company_name' => ['type' => 'string', 'default' => '', 'sanitize_callback' => 'sanitize_text_field'],
                    'company_description' => ['type' => 'string', 'default' => '', 'sanitize_callback' => 'sanitize_textarea_field'],
                    'enabled_post_types' => ['type' => 'array', 'default' => ['post', 'page'], 'items' => ['type' => 'string']],
                    'post_type_names' => ['type' => 'object', 'default' => [], 'additionalProperties' => ['type' => 'string']],
                    'manual_urls' => ['type' => 'array', 'default' => [], 'items' => ['type' => 'object', 'properties' => ['title' => ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field'], 'url' => ['type' => 'string', 'sanitize_callback' => 'esc_url_raw']]]],
                    'user_agents' => ['type' => 'array', 'default' => [['agent' => '*', 'rule' => 'Allow', 'path' => '/wp-content/uploads/'], ['agent' => '*', 'rule' => 'Disallow', 'path' => '/wp-admin/'], ['agent' => '*', 'rule' => 'Disallow', 'path' => '/wp-includes/']], 'items' => ['type' => 'object', 'properties' => ['agent' => ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field'], 'rule' => ['type' => 'string', 'enum' => ['Allow', 'Disallow']], 'path' => ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field']]]],
                    'custom_rules' => ['type' => 'array', 'default' => [['rule' => 'Training', 'value' => 'allowed'], ['rule' => 'Scraping', 'value' => 'limited'], ['rule' => 'APIAccess', 'value' => 'restricted']], 'items' => ['type' => 'object', 'properties' => ['rule' => ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field'], 'value' => ['type' => 'string', 'sanitize_callback' => 'sanitize_text_field']]]],
                    'show_user_agents' => ['type' => 'boolean', 'default' => true],
                    'show_custom_rules' => ['type' => 'boolean', 'default' => true],
                    'enabled_taxonomies' => ['type' => 'array', 'default' => [], 'items' => ['type' => 'string']],
                    'taxonomy_names' => ['type' => 'object', 'default' => [], 'additionalProperties' => ['type' => 'string']],
                    'update_frequency' => ['type' => 'string', 'default' => 'daily', 'enum' => ['daily', 'weekly']],
                    'disabled_urls' => ['type' => 'array', 'default' => [], 'items' => ['type' => 'string', 'sanitize_callback' => 'esc_url_raw']]
                ]
            ]
        ];
        register_setting('llms_txt_options', 'llms_txt_options', $args);
    }

    private function sanitize_post_type_names($post_type_names) {
        if (!is_array($post_type_names)) return [];
        $sanitized = [];
        foreach ($post_type_names as $key => $value) {
            $sanitized[sanitize_key($key)] = sanitize_text_field($value);
        }
        return $sanitized;
    }

    private function sanitize_enabled_post_types($post_types) {
        if (!is_array($post_types)) return [];
        return array_map('sanitize_key', $post_types);
    }

    private function sanitize_enabled_taxonomies($taxonomies) {
        if (!is_array($taxonomies)) return [];
        return array_map('sanitize_key', $taxonomies);
    }

    public function sanitize_options($input) {
        if (!is_array($input)) return self::DEFAULT_OPTIONS;
        $sanitized = [];
        $sanitized['company_name'] = isset($input['company_name']) ? sanitize_text_field($input['company_name']) : '';
        $sanitized['company_description'] = isset($input['company_description']) ? sanitize_textarea_field($input['company_description']) : '';
        $sanitized['post_type_names'] = $this->sanitize_post_type_names($input['post_type_names'] ?? []);
        $sanitized['enabled_post_types'] = $this->sanitize_enabled_post_types($input['enabled_post_types'] ?? []);
        $sanitized['manual_urls'] = [];
        if (isset($input['manual_urls']) && is_array($input['manual_urls'])) {
            foreach ($input['manual_urls'] as $item) {
                if (isset($item['title']) && isset($item['url'])) {
                    $sanitized['manual_urls'][] = ['title' => sanitize_text_field($item['title']), 'url' => esc_url_raw($item['url'])];
                }
            }
        }
        $sanitized['user_agents'] = [];
        if (isset($input['user_agents']) && is_array($input['user_agents'])) {
            foreach ($input['user_agents'] as $agent) {
                if (isset($agent['agent']) && isset($agent['rule']) && isset($agent['path'])) {
                    $sanitized['user_agents'][] = ['agent' => sanitize_text_field($agent['agent']), 'rule' => in_array($agent['rule'], ['Allow', 'Disallow']) ? $agent['rule'] : 'Allow', 'path' => sanitize_text_field($agent['path'])];
                }
            }
        }
        $sanitized['custom_rules'] = [];
        if (isset($input['custom_rules']) && is_array($input['custom_rules'])) {
            foreach ($input['custom_rules'] as $rule) {
                if (isset($rule['rule']) && isset($rule['value'])) {
                    $sanitized['custom_rules'][] = ['rule' => sanitize_text_field($rule['rule']), 'value' => sanitize_text_field($rule['value'])];
                }
            }
        }
        $sanitized['show_user_agents'] = !empty($input['show_user_agents']);
        $sanitized['show_custom_rules'] = !empty($input['show_custom_rules']);
        $sanitized['enabled_taxonomies'] = isset($input['enabled_taxonomies']) ? $this->sanitize_enabled_taxonomies($input['enabled_taxonomies']) : [];
        $sanitized['taxonomy_names'] = [];
        if (isset($input['taxonomy_names']) && is_array($input['taxonomy_names'])) {
            foreach ($input['taxonomy_names'] as $key => $value) {
                $sanitized['taxonomy_names'][sanitize_key($key)] = sanitize_text_field($value);
            }
        }
        $sanitized['update_frequency'] = (isset($input['update_frequency']) && in_array($input['update_frequency'], ['daily', 'weekly'])) ? $input['update_frequency'] : 'daily';
        $sanitized['disabled_urls'] = [];
        if (isset($input['disabled_urls'])) {
            $urls = is_array($input['disabled_urls']) ? $input['disabled_urls'] : explode("\n", $input['disabled_urls']);
            $urls = array_map('trim', $urls);
            $urls = array_filter($urls);
            $sanitized['disabled_urls'] = array_map('esc_url_raw', $urls);
        }
        return $sanitized;
    }

    public function setup_cron() {
        if (!wp_next_scheduled('llms_txt_auto_update')) {
            $recurrence = $this->options['update_frequency'] ?? 'daily';
            wp_schedule_event(time(), $recurrence, 'llms_txt_auto_update');
        }
    }

    public function reschedule_cron($old_value, $new_value) {
        wp_clear_scheduled_hook('llms_txt_auto_update');
        $recurrence = !empty($new_value['update_frequency']) ? $new_value['update_frequency'] : 'daily';
        if (!wp_next_scheduled('llms_txt_auto_update')) {
            wp_schedule_event(time(), $recurrence, 'llms_txt_auto_update');
        }
    }

    private function get_post_type_display_name($post_type) {
        if (isset($this->options['post_type_names'][$post_type]) && !empty($this->options['post_type_names'][$post_type])) {
            return $this->options['post_type_names'][$post_type];
        }
        $post_type_obj = get_post_type_object($post_type);
        return $post_type_obj ? $post_type_obj->labels->name : $post_type;
    }

    private function get_all_urls_by_post_type() {
        $urls_by_type = [];
        $enabled_types = $this->options['enabled_post_types'] ?? [];
        if (empty($enabled_types)) return $urls_by_type;
        foreach ($enabled_types as $post_type) {
            $posts = get_posts(['post_type' => $post_type, 'posts_per_page' => -1, 'post_status' => 'publish', 'orderby' => 'title', 'order' => 'ASC']);
            if (!empty($posts)) {
                $urls_by_type[$post_type] = array_map(function($post) {
                    return ['title' => $post->post_title, 'url' => get_permalink($post->ID)];
                }, $posts);
            }
        }
        return $urls_by_type;
    }

    public function generate_llms_txt() {
        $this->sync_noindex_urls(); // Noindex URL'lerini her zaman senkronize et
        $content = [];
        $content[] = "# LLMs.txt for " . get_bloginfo('name');
        $content[] = "# Generated: " . current_time('Y-m-d H:i:s');
        $content[] = "";
        if (!empty($this->options['company_name'])) {
            $content[] = "# " . $this->options['company_name'];
        }
        if (!empty($this->options['company_description'])) {
            $content[] = "- " . $this->options['company_description'];
            $content[] = "";
        }
        if (!empty($this->options['show_user_agents'])) {
            foreach ($this->options['user_agents'] as $agent) {
                $content[] = "User-agent: " . $agent['agent'];
                $content[] = $agent['rule'] . ": " . $agent['path'];
            }
            $content[] = "";
        }
        if (!empty($this->options['show_custom_rules'])) {
            $content[] = "# Custom Rules";
            foreach ($this->options['custom_rules'] as $rule) {
                $content[] = $rule['rule'] . ": " . $rule['value'];
            }
            $content[] = "";
        }
        if (!empty($this->options['manual_urls'])) {
            $content[] = "## Manuel Eklenmiş URL'ler";
            foreach ($this->options['manual_urls'] as $item) {
                $content[] = "- [" . $item['title'] . "] (" . $item['url'] . ")";
            }
            $content[] = "";
        }

        $urls_by_type = $this->get_all_urls_by_post_type();
        foreach ($urls_by_type as $post_type => $items) {
            $display_name = $this->get_post_type_display_name($post_type);
            $content[] = "## " . $display_name;
            foreach ($items as $item) {
                if (!in_array($item['url'], $this->options['disabled_urls'] ?? [])) {
                    $content[] = "- [" . $item['title'] . "] (" . $item['url'] . ")";
                }
            }
            $content[] = "";
        }

        if (!empty($this->options['enabled_taxonomies'])) {
            foreach ($this->options['enabled_taxonomies'] as $taxonomy) {
                $tax_obj = get_taxonomy($taxonomy);
                if (!$tax_obj) continue;
                $display_name = (isset($this->options['taxonomy_names'][$taxonomy]) && !empty($this->options['taxonomy_names'][$taxonomy])) ? $this->options['taxonomy_names'][$taxonomy] : $tax_obj->labels->name;
                $content[] = "## " . $display_name;
                $terms = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => true]);
                if (!is_wp_error($terms) && !empty($terms)) {
                    foreach ($terms as $term) {
                        $term_link = get_term_link($term);
                        $content[] = "- [" . $term->name . "] (" . $term_link . ")";
                    }
                }
                $content[] = "";
            }
        }

        $content_string = implode("\n", $content);
        return file_put_contents($this->file_path, $content_string) !== false;
    }

    public function handle_manual_update() {
        check_ajax_referer('llms_txt_update', 'nonce');
        if (!current_user_can('manage_options')) {
            wp_send_json_error('Yetkiniz yok.');
        }
        $this->sync_noindex_urls(); // Manuel güncellemede noindex'i zorla senkronize et
        if ($this->generate_llms_txt()) {
            wp_send_json_success('LLMs.txt dosyası başarıyla güncellendi.');
        } else {
            wp_send_json_error('Dosya güncellenirken bir hata oluştu.');
        }
    }

    public function update_llms_txt_on_publish($post_id, $post, $update) {
        if (wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) return;
        if ('publish' !== $post->post_status) return;
        if (method_exists($this, 'generate_llms_txt')) {
            $this->generate_llms_txt();
        }
    }

    public function update_llms_txt_on_delete($post_id) {
        if (method_exists($this, 'generate_llms_txt')) {
            $this->generate_llms_txt();
        }
    }

    public function render_admin_page() {
        if (!current_user_can('manage_options')) return;
        $post_types = get_post_types(['public' => true], 'objects');
        $taxonomies = get_taxonomies(['public' => true], 'objects');
        ?>
        <div class="wrap llms-settings-wrap">
            <div class="llms-settings-container" style="display: flex;">
                <div class="llms-sidebar">
                    <ul>
                        <li><a href="#card-firma">Firma Bilgileri</a></li>
                        <li><a href="#card-icerik">İçerik Tipleri</a></li>
                        <li><a href="#card-taxonomies">Taksonomiler</a></li>
                        <li><a href="#card-useragent">User-Agent Kuralları</a></li>
                        <li><a href="#card-ozelkural">Özel Kurallar</a></li>
                        <li><a href="#card-manuelurl">Manuel URL Ekle</a></li>
                        <li><a href="#card-devre">Devre Dışı URL'ler</a></li>
                        <li><a href="#card-update-frequency">Otomatik Güncelleme Ayarları</a></li>
                        <li><a href="#card-seo-compatibility">SEO Uyumluluğu</a></li>
                        <li><a href="#card-llmstxt">LLMs.txt İçeriği</a></li>
                    </ul>
                </div>
                <div class="llms-content" style="flex: 1;">
                    <div class="llms-sticky-header">
                        <button type="submit" form="llms-settings-form" class="llms-button">Ayarları Kaydet</button>
                        <button type="button" id="update-llms-txt" class="llms-button llms-button-secondary">Manuel Güncelle</button>
                        <a href="<?php echo esc_url(home_url('/llms.txt')); ?>" target="_blank" class="llms-button llms-button-secondary">Dosyayı Gör</a>
                        <span id="update-status"></span>
                    </div>
                    <form id="llms-settings-form" method="post" action="options.php" class="llms-settings-form">
                        <?php settings_fields('llms_txt_options'); ?>
                        <div class="llms-card" id="card-firma">
                            <h2>Firma Bilgileri</h2>
                            <div class="llms-card-content">
                                <table class="form-table">
                                    <tr><th scope="row">Firma İsmi</th><td><input type="text" name="llms_txt_options[company_name]" value="<?php echo esc_attr($this->options['company_name'] ?? ''); ?>" class="form-control"></td></tr>
                                    <tr><th scope="row">Firma Açıklaması</th><td><textarea name="llms_txt_options[company_description]" rows="4" class="form-control"><?php echo esc_textarea($this->options['company_description'] ?? ''); ?></textarea></td></tr>
                                </table>
                            </div>
                        </div>
                        <div class="llms-card" id="card-icerik">
                            <h2>İçerik Tipleri</h2>
                            <div class="llms-card-content">
                                <p>Listelenecek içerik tiplerini seçin ve özel isimlerini belirleyin:</p>
                                <table class="form-table">
                                    <?php foreach ($post_types as $post_type): ?>
                                    <tr>
                                        <th scope="row"><label><input type="checkbox" name="llms_txt_options[enabled_post_types][]" value="<?php echo esc_attr($post_type->name); ?>" <?php checked(in_array($post_type->name, $this->options['enabled_post_types'] ?? [])); ?>> <?php echo esc_html($post_type->labels->name); ?></label></th>
                                        <td><input type="text" name="llms_txt_options[post_type_names][<?php echo esc_attr($post_type->name); ?>]" value="<?php echo esc_attr($this->get_post_type_display_name($post_type->name)); ?>" class="form-control" placeholder="Özel isim"></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                        <div class="llms-card" id="card-taxonomies">
                            <h2>Taksonomiler</h2>
                            <div class="llms-card-content">
                                <p>Listelenecek taksonomileri seçin:</p>
                                <table class="form-table">
                                    <?php foreach ($taxonomies as $taxonomy): ?>
                                    <tr>
                                        <th scope="row"><label><input type="checkbox" name="llms_txt_options[enabled_taxonomies][]" value="<?php echo esc_attr($taxonomy->name); ?>" <?php checked(in_array($taxonomy->name, $this->options['enabled_taxonomies'] ?? [])); ?>> <?php echo esc_html($taxonomy->labels->name); ?></label></th>
                                        <td><input type="text" name="llms_txt_options[taxonomy_names][<?php echo esc_attr($taxonomy->name); ?>]" value="<?php echo esc_attr(isset($this->options['taxonomy_names'][$taxonomy->name]) ? $this->options['taxonomy_names'][$taxonomy->name] : $taxonomy->labels->name); ?>" class="form-control" placeholder="Özel isim"></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                        <div class="llms-card" id="card-useragent">
                            <h2>User-Agent Kuralları</h2>
                            <div class="llms-card-content">
                                <p><label><input type="checkbox" name="llms_txt_options[show_user_agents]" value="1" <?php checked(!empty($this->options['show_user_agents'])); ?>> User-Agent kurallarını göster</label></p>
                                <table class="widefat" id="user-agents-table">
                                    <thead><tr><th>User-Agent</th><th>Kural</th><th>Yol</th><th>İşlem</th></tr></thead>
                                    <tbody>
                                        <?php foreach ($this->options['user_agents'] as $index => $agent): ?>
                                        <tr>
                                            <td><input type="text" name="llms_txt_options[user_agents][<?php echo esc_attr($index); ?>][agent]" value="<?php echo esc_attr($agent['agent']); ?>" class="form-control"></td>
                                            <td><select name="llms_txt_options[user_agents][<?php echo esc_attr($index); ?>][rule]"><option value="Allow" <?php selected($agent['rule'], 'Allow'); ?>>Allow</option><option value="Disallow" <?php selected($agent['rule'], 'Disallow'); ?>>Disallow</option></select></td>
                                            <td><input type="text" name="llms_txt_options[user_agents][<?php echo esc_attr($index); ?>][path]" value="<?php echo esc_attr($agent['path']); ?>" class="form-control"></td>
                                            <td><button type="button" class="button remove-row">Sil</button></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <button type="button" class="button add-row-button" data-template="<?php echo esc_attr('<tr><td><input type="text" name="llms_txt_options[user_agents][]" class="form-control"></td><td><select name="llms_txt_options[user_agents][]"><option value="Allow">Allow</option><option value="Disallow">Disallow</option></select></td><td><input type="text" name="llms_txt_options[user_agents][]" class="form-control"></td><td><button type="button" class="button remove-row">Sil</button></td></tr>'); ?>">Yeni User-Agent Ekle</button>
                            </div>
                        </div>
                        <div class="llms-card" id="card-ozelkural">
                            <h2>Özel Kurallar</h2>
                            <div class="llms-card-content">
                                <p><label><input type="checkbox" name="llms_txt_options[show_custom_rules]" value="1" <?php checked(!empty($this->options['show_custom_rules'])); ?>> Özel kuralları göster</label></p>
                                <table class="widefat" id="custom-rules-table">
                                    <thead><tr><th>Kural</th><th>Değer</th><th>İşlem</th></tr></thead>
                                    <tbody>
                                        <?php foreach ($this->options['custom_rules'] as $index => $rule): ?>
                                        <tr>
                                            <td><input type="text" name="llms_txt_options[custom_rules][<?php echo esc_attr($index); ?>][rule]" value="<?php echo esc_attr($rule['rule']); ?>" class="form-control"></td>
                                            <td><input type="text" name="llms_txt_options[custom_rules][<?php echo esc_attr($index); ?>][value]" value="<?php echo esc_attr($rule['value']); ?>" class="form-control"></td>
                                            <td><button type="button" class="button remove-row">Sil</button></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <button type="button" class="button add-row-button" data-template="<?php echo esc_attr('<tr><td><input type="text" name="llms_txt_options[custom_rules][]" class="form-control"></td><td><input type="text" name="llms_txt_options[custom_rules][]" class="form-control"></td><td><button type="button" class="button remove-row">Sil</button></td></tr>'); ?>">Yeni Kural Ekle</button>
                            </div>
                        </div>
                        <div class="llms-card" id="card-manuelurl">
                            <h2>Manuel URL Ekle</h2>
                            <div class="llms-card-content">
                                <table class="form-table">
                                    <tr><th scope="row">Başlık</th><td><input type="text" id="manual-url-title" class="form-control" placeholder="URL Başlığı"></td></tr>
                                    <tr><th scope="row">URL</th><td><input type="url" id="manual-url" class="form-control" placeholder="https://"><button type="button" id="add-manual-url" class="button">URL Ekle</button></td></tr>
                                </table>
                                <div id="manual-urls-list">
                                    <h3>Eklenmiş URL'ler</h3>
                                    <table class="widefat">
                                        <thead><tr><th>Başlık</th><th>URL</th><th>İşlem</th></tr></thead>
                                        <tbody>
                                            <?php if (!empty($this->options['manual_urls'])) {
                                                foreach ($this->options['manual_urls'] as $index => $item) {
                                                    echo '<tr><td>' . esc_html($item['title']) . '</td><td><a href="' . esc_url($item['url']) . '" target="_blank">' . esc_url($item['url']) . '</a></td><td><button type="button" class="button remove-manual-url" data-index="' . esc_attr($index) . '">Sil</button></td></tr>';
                                                }
                                            } else {
                                                echo '<tr><td colspan="3">Henüz manuel URL eklenmemiş.</td></tr>';
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="llms-card" id="card-devre">
                            <h2>Devre Dışı Bırakılan URL'ler</h2>
                            <div class="llms-card-content">
                                <p>Her satıra bir URL yazın. Bu URL'ler LLMs.txt dosyasında listelenmeyecektir.</p>
                                <table class="form-table">
                                    <tr><th scope="row">URL'ler</th><td><textarea name="llms_txt_options[disabled_urls]" rows="10" class="form-control" placeholder="https://example.com/sayfa1\nhttps://example.com/sayfa2"><?php echo esc_textarea(implode("\n", $this->options['disabled_urls'] ?? [])); ?></textarea><p class="description">Her satıra bir URL yazın.</p></td></tr>
                                </table>
                            </div>
                        </div>
                        <div class="llms-card" id="card-update-frequency">
                            <h2>Otomatik Güncelleme Ayarları</h2>
                            <div class="llms-card-content">
                                <p>Otomatik güncelleme frekansını seçin:</p>
                                <select name="llms_txt_options[update_frequency]" class="form-control">
                                    <option value="daily" <?php selected($this->options['update_frequency'], 'daily'); ?>>Günlük</option>
                                    <option value="weekly" <?php selected($this->options['update_frequency'], 'weekly'); ?>>Haftalık</option>
                                </select>
                            </div>
                        </div>
                    </form>
                    <div class="llms-card" id="card-seo-compatibility">
                        <h2>SEO Eklenti Uyumluluğu</h2>
                        <div class="llms-card-content">
                            <?php
                            if (defined('WPSEO_VERSION')) {
                                echo '<p>Yoast SEO tespit edildi. Site bilgileri ve noindex ayarları senkronize ediliyor.</p>';
                            } elseif (class_exists('RankMath')) {
                                echo '<p>Rank Math SEO tespit edildi. Site bilgileri ve noindex ayarları senkronize ediliyor.</p>';
                            } else {
                                echo '<p>SEO eklentisi tespit edilmedi. Varsayılan WordPress ayarları kullanılıyor.</p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="llms-card" id="card-llmstxt">
                        <h2>Mevcut LLMs.txt İçeriği</h2>
                        <div class="llms-card-content">
                            <pre><?php echo esc_html(file_exists($this->file_path) ? file_get_contents($this->file_path) : 'Dosya henüz oluşturulmamış.'); ?></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    public function handle_add_manual_url() {
        check_ajax_referer('llms_txt_update', 'nonce');
        if (!current_user_can('manage_options')) {
            wp_send_json_error('Yetkiniz yok.');
        }
        $title = sanitize_text_field(wp_unslash($_POST['title'] ?? ''));
        $url = esc_url_raw(wp_unslash($_POST['url'] ?? ''));
        if (empty($title) || empty($url)) {
            wp_send_json_error('Başlık ve URL zorunludur.');
        }
        $manual_urls = $this->options['manual_urls'] ?? [];
        $manual_urls[] = ['title' => $title, 'url' => $url];
        $this->options['manual_urls'] = $manual_urls;
        update_option('llms_txt_options', $this->options);
        wp_send_json_success('URL başarıyla eklendi.');
    }

    public function handle_remove_manual_url() {
        check_ajax_referer('llms_txt_update', 'nonce');
        if (!current_user_can('manage_options')) {
            wp_send_json_error('Yetkiniz yok.');
        }
        $index = intval($_POST['index'] ?? -1);
        if ($index >= 0 && isset($this->options['manual_urls'][$index])) {
            array_splice($this->options['manual_urls'], $index, 1);
            update_option('llms_txt_options', $this->options);
            wp_send_json_success('URL başarıyla silindi.');
        }
        wp_send_json_error('URL bulunamadı.');
    }
}

$llms_txt_generator = new LLMsTxtGenerator();

register_activation_hook(__FILE__, function() {
    $generator = new LLMsTxtGenerator();
    $generator->generate_llms_txt();
});

register_deactivation_hook(__FILE__, function() {
    wp_clear_scheduled_hook('llms_txt_auto_update');
});

add_filter('cron_schedules', function($schedules) {
    if (!isset($schedules['weekly'])) {
        $schedules['weekly'] = ['interval' => 604800, 'display' => __('Haftalık')];
    }
    return $schedules;
});
?>