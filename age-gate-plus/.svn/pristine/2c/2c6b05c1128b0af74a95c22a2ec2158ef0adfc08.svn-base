<?php

if (!defined('ABSPATH')) {
    exit;
}

class AgeGator
{
    public static $prefix = 'age_gator_';
    public static $schema = [];
    public static $flatSchema = [];
    public static $options = [];
    public static $templates = [];

    public static function init()
    {
        self::initializeSchema();
        self::initializeOptions();
        self::registerCLI();
        $filter_name = 'plugin_action_links_';
        $filter_name .= plugin_basename(plugin_dir_path(__FILE__) . 'age-gator.php');
        add_filter($filter_name, [self::class, 'addActionLinks']);
        add_action(
            'customize_register',
            [self::class, 'registerCustomizer']
        );
        add_action(
            'customize_controls_enqueue_scripts',
            [self::class, 'enqueueCustomizerScripts']
        );
        add_action('init', [self::class, 'load']);
        add_action('admin_init', [self::class, 'loadAdmin']);
        add_action('load-plugins.php', [self::class, 'loadPluginsPage']);
        add_action('wp_ajax_postFeedback', [self::class, 'postFeedback']);
    }

    // Enqueues

    public static function enqueueScripts()
    {
        $script_path = 'dist/js/app.min.js';
        $script_url = plugin_dir_url(__FILE__) . $script_path;
        $script_version = filemtime(plugin_dir_path(__FILE__) . $script_path);

        $script_dependencies = [
            'jquery',
            'customize-preview',
        ];

        wp_register_script(
            'age-gator-js',
            $script_url,
            $script_dependencies,
            $script_version,
            true
        );

        $clientData = [
            'options' => self::$options,
            'can_cancel' => current_user_can('activate_plugins')
        ];

        wp_localize_script('age-gator-js', 'ageGator', $clientData);
        wp_enqueue_script('age-gator-js');

        $stylesheet_path = 'dist/css/app.min.css';
        $stylesheet_url = plugin_dir_url(__FILE__) . $stylesheet_path;
        $stylesheet_version = filemtime(plugin_dir_path(__FILE__) . $stylesheet_path);

        wp_enqueue_style('age-gator-css', $stylesheet_url, [], $stylesheet_version);
    }

    public static function enqueueCustomizerScripts()
    {
        $script_path = 'dist/js/customizer.min.js';
        $script_url = plugin_dir_url(__FILE__) . $script_path;
        $script_version = filemtime(plugin_dir_path(__FILE__) . $script_path);
        $script_dependencies = [
            'jquery',
            'customize-controls',
        ];

        wp_register_script(
            'age-gator-customizer-js',
            $script_url,
            $script_dependencies,
            $script_version,
            true
        );

        $clientData = [
            'options' => self::$options,
            'schema' => self::$flatSchema,
            'templates' => self::$templates
        ];

        wp_localize_script(
            'age-gator-customizer-js',
            'ageGatorCustomizer',
            $clientData
        );

        wp_enqueue_script('age-gator-customizer-js');
    }

    public static function enqueuePluginPageScripts()
    {
        $script_path = 'dist/js/feedback.min.js';
        $script_url = plugin_dir_url(__FILE__) . $script_path;
        $script_version = filemtime(plugin_dir_path(__FILE__) . $script_path);
        $script_dependencies = ['jquery',];

        wp_register_script(
            'age-gator-feedback-js',
            $script_url,
            $script_dependencies,
            $script_version,
            true
        );
        $clientData = ['nonce' => wp_create_nonce('age-gator-feedback')];
        wp_localize_script('age-gator-feedback-js', 'ageGator', $clientData);
        wp_enqueue_script('age-gator-feedback-js');

        $stylesheet_path = 'dist/css/feedback.min.css';
        $stylesheet_url = plugin_dir_url(__FILE__) . $stylesheet_path;
        $stylesheet_version = filemtime(plugin_dir_path(__FILE__) . $stylesheet_path);
        wp_enqueue_style('age-gator-feedback-css', $stylesheet_url, [], $stylesheet_version);
    }

    // Initializers

    public static function initializeSchema()
    {
        $schemaDirPath = plugin_dir_path(__FILE__) . 'schema.php';
        self::$schema = require $schemaDirPath;
        self::$flatSchema = self::getFlatSchema(self::$schema);
    }

    public static function getFlatSchema($schema)
    {
        $flatSchema = [];
        foreach ($schema as $tabKey => $tab) {
            foreach ($tab['fields'] as $fieldKey => $field) {
                $flatSchema[$fieldKey] = $field;
            }
        }

        return $flatSchema;
    }

    public static function initializeOptions()
    {
        global $wpdb;
        $sql = "SELECT option_name, option_value FROM {$wpdb->prefix}options ";
        $sql .= "WHERE option_name LIKE \"%age_gator%\"";
        $results = $wpdb->get_results($sql, ARRAY_A);
        $results = array_reduce($results, function ($acc, $row) {
            $acc[$row['option_name']] = $row['option_value'];
            return $acc;
        }, []);

        $options = [];
        foreach (self::$flatSchema as $key => $value) {
            if (array_key_exists($key, $results)) {
                $options[$key] = $results[$key];
            } else {
                update_option($key, $value['default']);
                $options[$key] = $value['default'];
            }
        }

        self::$options = $options;
    }

    // Other stuff

    public static function postFeedback()
    {
        if (!check_ajax_referer('age-gator-feedback', 'security', false)) {
            wp_die();
        }
        $payload = $_POST['payload'];
        $body = 'Deactivation reason: ';
        if (!empty($payload['selected'])) {
            $body .= $payload['selected'] . "<br>";
        }
        if (!empty($payload['answer'])) {
            $body .= "Additional info:<br>";
            $body .= $payload['answer'] . "<br>";
        }
        echo wp_mail(
            'agegator312717839317892@gmail.com',
            'New Age Gator Feedback',
            $body,
            ['Content-Type: text/html; charset=UTF-8']
        );
        wp_die();
    }

    public static function loadPluginsPage()
    {
        add_action('admin_footer', [self::class, 'mountFeedbackModal']);
        add_action('admin_enqueue_scripts', [self::class, 'enqueuePluginPageScripts']);
    }

    public static function loadAdmin()
    {
        self::initTemplates();
    }

    public static function initTemplates()
    {
        self::$templates['images'] = self::getTemplateImages();
        self::$templates['options'] = self::getTemplateOptions(self::$templates['images']);
    }

    public static function getTemplateOptions($images)
    {
        return array_reduce(AGE_GATOR_TEMPLATES, function ($acc, $template) use ($images) {
            $acc[$template] = require plugin_dir_path(__FILE__) . 'templates/' . $template . '.php';
            $acc[$template]['age_gator_modal_image2'] = $images[$template]['url'];
            return $acc;
        }, [
            'basic' => []
        ]);
    }

    public static function getTemplateImages()
    {
        $images = [];
        $posts = get_posts([
            'post_type' => 'attachment',
            'post_name__in' => array_map(function ($template) {
                return $template . '_age_gator';
            }, AGE_GATOR_TEMPLATES)
        ]);
        foreach ($posts as $post) {
            $template = str_replace('_age_gator', '', $post->post_name);
            $id = $post->ID;
            $images[$template] = [
                'id' => $id,
                'url' => wp_get_attachment_url($id)
            ];
        }
        foreach (AGE_GATOR_TEMPLATES as $template) {
            if (!empty($images[$template])) {
                continue;
            }
            $image_url = plugin_dir_url(__FILE__) . "templates/images/{$template}_age_gator.jpg";
            $create_image = new JDN_Create_Media_File($image_url);
            $id = $create_image->attachment_id;
            $images[$template] = [
                'id' => $id,
                'url' => wp_get_attachment_url($id)
            ];
        }
        return $images;
    }

    public static function load()
    {
        if (!self::match()) {
            return;
        }
        add_action('wp_enqueue_scripts', [self::class, 'enqueueScripts']);
        add_action('wp_footer', [self::class, 'mountAgeGate']);
    }

    public static function match()
    {
        if (is_customize_preview()) {
            return true;
        }

        if (!empty(self::$options['age_gator_bypass_logged_in_users'])) {
            if (is_user_logged_in()) {
                return false;
            }
        }

        $guarding = self::$options['age_gator_guarding'];
        if ($guarding === 'all') {
            return true;
        }

        $match = false;
        $uri = strtok($_SERVER["REQUEST_URI"], '?');
        $patterns = self::$options['age_gator_' . $guarding];
        $patterns = explode(PHP_EOL, $patterns);

        foreach ($patterns as $pattern) {
            if (fnmatch($pattern, $uri)) {
                $match = true;
                break;
            }
        }

        if ($guarding === 'blacklist') {
            $match = !$match;
        }

        return $match;
    }

    public static function mountAgeGate()
    {
        self::render('age_gate');
    }

    public static function mountFeedbackModal()
    {
        self::render('feedback_modal');
    }

    public static function addActionLinks($links)
    {
        $link = admin_url('customize.php?autofocus[panel]=age_gator_panel');

        return array_merge($links, [
            "<a href=\"$link\">Edit in customizer</a>",
        ]);
    }

    public static function render($view, $data = [])
    {
        extract($data);
        $view_path = plugin_dir_path(__FILE__) . 'views/' . $view . '.php';
        require $view_path;
    }

    public static function deleteOptions()
    {
        global $wpdb;
        $sql = "DELETE FROM {$wpdb->prefix}options WHERE option_name LIKE \"%age_gator%\"";
        $wpdb->query($sql);
    }

    public static function resetOptions()
    {
        self::deleteOptions();
        self::initializeOptions();
    }

    public static function registerCLI()
    {
        if (class_exists('WP_CLI')) {
            WP_CLI::add_command('age-gator reset', [self::class, 'resetOptions']);
        }
    }

    public static function optionIsActive($optionSchema)
    {
        if (!empty($optionSchema['master'])) {
            $master = $optionSchema['master'];
            $option = self::$options[$master['name']];
            $match = in_array($option, $master['values']);

            if (!empty($master['not'])) {
                $match = !$match;
            }

            return $match;
        }

        return true;
    }

    public static function registerCustomizer($wp_customize)
    {
        $wp_customize->add_panel('age_gator_panel', [
            'title' => 'Age Gator',
            'priority' => 10,
        ]);

        foreach (self::$schema as $sectionKey => $sectionValue) {
            $wp_customize->add_section($sectionKey, [
                'title' => $sectionValue['label'],
                'priority' => 30,
                'panel' => 'age_gator_panel',
            ]);

            foreach ($sectionValue['fields'] as $key => $value) {
                $settingArgs = [
                    'default' => $value['default'],
                    'transport' => 'postMessage',
                    'type' => 'option',
                ];

                $controlArgs = [
                    'label' => $value['label'],
                    'section' => $sectionKey,
                    'settings' => $key,
                    'active_callback' => function () use ($value) {
                        return self::optionIsActive($value);
                    },
                ];

                if (!empty($value['description'])) {
                    $controlArgs['description'] = $value['description'];
                }

                switch ($value['type']) {
                    case 'color':
                        $class = 'WP_Customize_Color_Control';
                        $settingArgs['sanitize_callback'] = 'sanitize_hex_color';

                        break;
                    case 'image':
                        $class = 'WP_Customize_Image_Control';
                        $controlArgs['context'] = $value['description'];
                        $settingArgs['sanitize_callback'] = 'sanitize_text_field';

                        break;
                    case 'number':
                        $class = 'WP_Customize_Control';
                        $controlArgs['type'] = 'number';
                        $settingArgs['sanitize_callback'] = 'absint';

                        if (!empty($value['units'])) {
                            $units = $value['units'];
                            $label = $value['label'];
                            $controlArgs['label'] = "$label ($units)";
                            $controlArgs['input_attrs'] = [
                                'min' => $value['min'],
                                'max' => $value['max'],
                            ];
                        }

                        break;
                    case 'select':
                        $class = 'WP_Customize_Control';
                        $selectChoices = $value['options'];
                        $controlArgs['type'] = 'select';
                        $controlArgs['choices'] = $selectChoices;
                        $settingArgs['sanitize_callback'] = function ($input) use ($selectChoices) {
                            if (array_key_exists($input, $selectChoices)) {
                                return $input;
                            }

                            return array_keys($selectChoices)[0];
                        };

                        break;
                    case 'button':
                        $class = 'WP_Customize_Control';
                        $controlArgs['type'] = 'button';
                        $controlArgs['input_attrs'] = [
                            'class' => 'button button-primary',
                        ];
                        $settingArgs['sanitize_callback'] = 'sanitize_text_field';

                        break;
                    case 'textarea':
                        $class = 'WP_Customize_Control';
                        $controlArgs['type'] = 'textarea';
                        $settingArgs['sanitize_callback'] = 'wp_kses_post';

                        break;
                    case 'url':
                        $settingArgs['sanitize_callback'] = 'esc_url_raw';

                        break;
                    default:
                        $class = 'WP_Customize_Control';
                        $controlArgs['type'] = $value['type'];
                        $settingArgs['sanitize_callback'] = function ($text) {
                            return addslashes($text);
                        };

                        break;
                }

                $wp_customize->add_setting($key, $settingArgs);

                $wp_customize->add_control(
                    new $class($wp_customize, $key, $controlArgs)
                );
            }
        }
    }
}
