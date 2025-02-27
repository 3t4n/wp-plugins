<?php
/**
 * Class CRE_Meta_Boxes
 *
 * Class to handle stuff related to meta boxes.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class CRE_Meta_Boxes {

    /**
     * Initialize meta boxes
     *
     */
    public static function init() {

        do_action('cre_before_meta_boxes_init');

        // Deactivate meta box plugin if it is installed and active
        add_action('init', array(__CLASS__, 'deactivate_meta_box_plugin'));

        self::includes();

        // Property Meta Boxes
        include_once(CRE_PLUGIN_DIR . '/includes/meta-boxes/property/Cre_Property_Basic_Fields.php');
        include_once(CRE_PLUGIN_DIR . '/includes/meta-boxes/property/Cre_Property_Location_Fields.php');
        include_once(CRE_PLUGIN_DIR . '/includes/meta-boxes/property/Cre_Property_Gallery_Fields.php');
        include_once(CRE_PLUGIN_DIR . '/includes/meta-boxes/property/Cre_Property_Video_Fields.php');
        include_once(CRE_PLUGIN_DIR . '/includes/meta-boxes/property/Cre_Property_Floor_Plans_Fields.php');
        include_once(CRE_PLUGIN_DIR . '/includes/meta-boxes/property/Cre_Property_Agent_Information_Fields.php');
        include_once(CRE_PLUGIN_DIR . '/includes/meta-boxes/property/Cre_Property_Misc_Fields.php');


        // Check with Official Aarambha themes is not installed.
        if ( in_array( get_option( 'template' ), cre_get_core_supported_themes(), true ) ) {
            include_once(CRE_PLUGIN_DIR . '/includes/meta-boxes/property/Cre_Property_Homepage_Slider_Fields.php');
            include_once(CRE_PLUGIN_DIR . '/includes/meta-boxes/sidebar/Cre_Sidebar_Fields.php');
        }

        // Agent meta boxes
        include_once(CRE_PLUGIN_DIR . '/includes/meta-boxes/agent/Cre_Agent_Detail_Fields.php');

        // Taxonomy meta fields
        include_once(CRE_PLUGIN_DIR . '/includes/meta-boxes/taxonomy/Cre_Taxonomy_Fields.php');

        do_action('cre_meta_boxes_init');
    }

    /**
     * Include meta box plugin and required extensions
     *
     * @since 1.0.0
     */
    protected static function includes() {

        // Include meta box
        if ( ! class_exists('RW_Meta_Box') ) {
            if ( file_exists(CRE_PLUGIN_DIR . '/includes/libraries/meta-box/meta-box.php') ) {
                include_once(CRE_PLUGIN_DIR . '/includes/libraries/meta-box/meta-box.php');
            }
        }
    }

    /**
     * Deactivate meta box plugin if it is active.
     */
    public static function deactivate_meta_box_plugin() {

        // Meta Box Plugin
        if ( is_plugin_active('meta-box/meta-box.php') ) {
            deactivate_plugins('meta-box/meta-box.php');
            add_action('admin_notices', function () {
                ?>
                <div class="update-nag notice is-dismissible">
                    <p><strong><?php esc_html_e('Meta Box plugin has been deactivated!', 'crucial-real-estate'); ?></strong></p>
                    <p><?php esc_html_e('As similar functionality is already embedded with in Crucial Real Estate plugin.', 'crucial-real-estate'); ?></p>
                    <p>
                        <em><?php esc_html_e('So, You should completely remove it from your plugins.', 'crucial-real-estate'); ?></em>
                    </p>
                </div>
                <?php
            });
        }
    }
}

/*
 * Initialize meta boxes.
 */
CRE_Meta_Boxes::init();
