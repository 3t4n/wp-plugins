<?php

namespace RANKOLOGY_STATS;

/**
 * Class RANKOLOGY_Stats_TinyMCE
 */
class TinyMCE
{

    /**
     * Setup an TinyMCE action to close the notice on the overview page.
     */
    public function __construct()
    {

        // Add Filter TinyMce Editor
        add_action('admin_head', array($this, 'wp_statistic_add_my_tc_button'));

        // Add TextLang
        add_action('admin_footer-widgets.php', array($this, 'my_post_edit_page_footer'), 999);
    }

    /*
     * Language List Text Domain
     */
    static public function lang()
    {
        if (!class_exists('_WP_Editors')) {
            require(ABSPATH . WPINC . '/class-wp-editor.php');
        }
        

        $strings = array(
            'insert'         => __('Rankology Stats Shortcodes', 'rankology-stats'),
            'stat'           => __('Stat', 'rankology-stats'),
            'usersonline'    => __('Active Users', 'rankology-stats'),
            'visits'         => __('Visits', 'rankology-stats'),
            'visitors'       => __('Visitors', 'rankology-stats'),
            'pagevisits'     => __('Page Visits', 'rankology-stats'),
            'searches'       => __('Searches', 'rankology-stats'),
            'postcount'      => __('Post Count', 'rankology-stats'),
            'pagecount'      => __('Page Count', 'rankology-stats'),
            'commentcount'   => __('Comment Count', 'rankology-stats'),
            'spamcount'      => __('Spam Count', 'rankology-stats'),
            'usercount'      => __('User Count', 'rankology-stats'),
            'postaverage'    => __('Post Average', 'rankology-stats'),
            'commentaverage' => __('Comment Average', 'rankology-stats'),
            'useraverage'    => __('User Average', 'rankology-stats'),
            'lpd'            => __('Last Post Date', 'rankology-stats'),
            'referrer'       => __('Referrer', 'rankology-stats'),
            'help_stat'      => __('The statistics you want, see the next table for available options.', 'rankology-stats'),
            'time'           => __('Time', 'rankology-stats'),
            'se'             => __('Select item ...', 'rankology-stats'),
            'today'          => __('Today', 'rankology-stats'),
            'yesterday'      => __('Yesterday', 'rankology-stats'),
            'week'           => __('Week', 'rankology-stats'),
            'month'          => __('Month', 'rankology-stats'),
            'year'           => __('Year', 'rankology-stats'),
            'total'          => __('Total', 'rankology-stats'),
            'help_time'      => __('Is the time frame (time periods) for the statistic', 'rankology-stats'),
            'provider'       => __('Provider', 'rankology-stats'),
            'help_provider'  => __('The search provider to get statistics on.', 'rankology-stats'),
            'format'         => __('Format', 'rankology-stats'),
            'help_format'    => __('The format to display numbers in: i18n, english, none.', 'rankology-stats'),
            'id'             => __('ID', 'rankology-stats'),
            'help_id'        => __('The post/page ID to get page statistics on.', 'rankology-stats'),
        );

        $locale     = \_WP_Editors::$mce_locale;
        $translated = 'tinyMCE.addI18n("' . $locale . '.wp_statistic_tinymce_plugin", ' . json_encode($strings) . ");\n";

        return array('locale' => $locale, 'translate' => $translated);
    }

    /*
     * Add Filter TinyMCE
     */
    public function wp_statistic_add_my_tc_button()
    {
        global $typenow;

        // check user permissions
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
            return;
        }

        // verify the post type
        if (!in_array($typenow, array('post', 'page'))) {
            return;
        }

        // check if WYSIWYG is enabled
        if (get_user_option('rich_editing') == 'true') {
            add_filter("mce_geoipset_plugins", array($this, 'wp_statistic_add_tinymce_plugin'));
            add_filter('mce_buttons', array($this, 'wp_statistic_register_my_tc_button'));
            add_filter('mce_geoipset_languages', array($this, 'wp_statistic_tinymce_plugin_add_locale'));
        }
    }

    /*
     * Add Js Bottun to Editor
     */
    public function wp_statistic_add_tinymce_plugin($plugin_array)
    {
        $plugin_array['wp_statistic_tc_button'] = Admin_Assets::url('tinymce.min.js');

        return $plugin_array;
    }

    /*
     * Push Button to TinyMCE Advance
     */
    public function wp_statistic_register_my_tc_button($buttons)
    {
        array_push($buttons, "wp_statistic_tc_button");

        return $buttons;
    }

    /*
     * Add Lang Text Domain
     */
    public function wp_statistic_tinymce_plugin_add_locale($locales)
    {
        $locales ['wp-statistic-tinymce-plugin'] = RANKOLOGY_STATS_DIR . 'includes/admin/TinyMCE/locale.php';

        return $locales;
    }

    /*
     * Add Lang for Text Widget
     */
    public function my_post_edit_page_footer()
    {
        echo '
        <script type="text/javascript">
        jQuery( document ).on( \'tinymce-editor-setup\', function( event, editor ) {
                editor.settings.toolbar1 += \',wp_statistic_tc_button\';
        });
        ';
        $lang = TinyMCE::lang();
        echo $lang['translate']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        echo '
        tinyMCEPreInit.load_ext("' . rtrim(RANKOLOGY_STATS_URL, "/") . '", "' . $lang['locale'] . '");
        </script>
    ';
    }
}

new TinyMCE;