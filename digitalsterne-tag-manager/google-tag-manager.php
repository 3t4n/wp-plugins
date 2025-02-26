<?php
/*
   Plugin Name: Digitalsterne Tag Manager
   Plugin URI: http://wordpress.org/extend/plugins/digitalsterne-google-tag-manager/
   Version: 1.2
   Author: Digitalsterne GmbH
   Description: Simple, secure and fast way to integrate Google Tag Manager into your Wordpress Installation.
   Text Domain: digitalsterne-google-tag-manager
   License: GPLv3
  */

class digitalsterne_gtm
{

    public static $printed_noscript_tag = false;

    public static function go()
    {
        add_filter('admin_init', array(__CLASS__, 'register_fields'));
        add_action('wp_head', array(__CLASS__, 'print_tag'));
        add_action('wp_ w body_open', array(__CLASS__, 'print_noscript_tag'));
        add_action('wp_body_open', array(__CLASS__, 'print_noscript_tag'));
        add_action('body_top', array(__CLASS__, 'print_noscript_tag'));
        add_action('wp_footer', array(__CLASS__, 'print_noscript_tag'));
    }

    public static function register_fields()
    {
        register_setting('general', 'google_tag_manager_id', 'esc_attr');
        add_settings_field('google_tag_manager_id', '<label for="google_tag_manager_id">' . __('Google Tag Manager ID', 'google_tag_manager') . '</label>', array(__CLASS__, 'fields_html'), 'general');
    }

    public static function fields_html()
    {
        ?>
        <input type="text" id="google_tag_manager_id" name="google_tag_manager_id" placeholder="GTM-XXXXXXX"
               class="regular-text code" value="<?php echo get_option('google_tag_manager_id', ''); ?>"/>
        <p class="description">
            <?php _e('Your Google Tag Manager Container ID.', 'google_tag_manager'); ?>
        </p>
        <p class="description">
            <?php _e('Missing an ID? <a href="https://www.google.com/tagmanager/">Create a Container here</a>.', 'google_tag_manager'); ?>
        </p>
        <?php
    }

    public static function print_tag()
    {
        if (!$id = get_option('google_tag_manager_id', '')) return;
        ?>
        <!-- Google Tag Manager by Digitalsterne GmbH -->
        <script>(function (w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    'gtm.start':
                        new Date().getTime(), event: 'gtm.js'
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
                j.async = true;
                j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, 'script', 'dataLayer', '<?php echo esc_js($id); ?>');</script>
        <!-- End Google Tag Manager by Digitalsterne GmbH -->
        <?php
    }

    public static function print_noscript_tag()
    {
        if (self::$printed_noscript_tag) {
            return;
        }
        self::$printed_noscript_tag = true;

        if (!$id = get_option('google_tag_manager_id', '')) return;
        ?>
        <!-- Google Tag Manager by Digitalsterne GmbH (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo esc_attr($id); ?>"
                    height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!-- End Google Tag Manager by Digitalsterne GmbH (noscript) -->
        <?php
    }
}

digitalsterne_gtm::go();
