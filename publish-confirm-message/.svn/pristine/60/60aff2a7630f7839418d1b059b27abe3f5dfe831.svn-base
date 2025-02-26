<?php
namespace apjPCM;
if (!defined('ABSPATH'))
{
    die('-1');
}
/**
 * @package Publish Confirm Message
 * @version 1.3
 * @since 1.0
 */
class PublishConfirmMessage
{
    /**
     * Plugin activation
     * @return void
     */
    public static function activate()
    {
        self::checkRequirements();
    }
    /**
     * Plugin uninstall
     * @return void
     */
    public static function uninstall()
    {
        self::apjuninstallplugin();
    }
    /**
     * Check plugin requirements
     * @return void
     */
    private static function checkRequirements()
    {
        /*
        delete_option(APJ_PCM_OPT_ERR_NAME);
        if (function_exists('has_blocks'))
        {
        $error = '<strong>' . sprintf(__('%s v%s requires Gutenberg Editor to be deactivate.', 'apjPCM') , APJ_PCM_PLUGIN_NAME, APJ_PCM_VERSION) . '</strong> ';
        update_option(APJ_PCM_OPT_ERR_NAME, $error);
        }
        */
    }
    /**
     * Uninstall plugin
     * @return void
     */
    private static function apjuninstallplugin()
    {
        delete_option(APJ_PCM_OPT_ERR_NAME);
        delete_option(APJ_PCM_OPT_NAME);
    }
    /**
     * Initialize WordPress hooks
     * @return void
     */
    public static function initHooks()
    {
        //Admin notices
        add_action('admin_notices', array(
            'apjPCM\PublishConfirmMessage',
            'adminNotices'
        ));
        //Admin menu
        add_action('admin_menu', array(
            'apjPCM\PublishConfirmMessage',
            'adminMenu'
        ));
        add_action('admin_footer', array(
            'apjPCM\PublishConfirmMessage',
            'APJConfirmPublish'
        ));
        add_filter("plugin_action_links", array(
            'apjPCM\PublishConfirmMessage',
            'PluginActionLinks'
        ) , 1, 2);
        add_filter("plugin_row_meta", array(
            'apjPCM\PublishConfirmMessage',
            'PluginRowMeta'
        ) , 1, 2);
        //Admin page
        $page = filter_input(INPUT_GET, 'page');
        if (!empty($page) && $page == APJ_PCM_MENU_SLUG)
        {
            add_filter('admin_footer_text', array(
                'apjPCM\PublishConfirmMessage',
                'adminFooter'
            ));
        }
    }
    /**
     * Admin notices
     * @return void
     */
    public static function adminNotices()
    {
        if (get_option(APJ_PCM_OPT_ERR_NAME))
        {
            $class   = 'notice notice-error';
            $message = stripslashes_deep(esc_attr(get_option(APJ_PCM_OPT_ERR_NAME)));
            printf('<div class="%1$s"><p>%2$s</p></div>', $class, $message);
        }
    }
    /**
     * APJConfirmPublish
     * @return string
     */
    public static function APJConfirmPublish()
    {
        $apj_pcm_default_message = esc_html(APJ_PCM_DEFAULT_MESSAGE, 'publish-confirm-message');
        $pcm_message_show        = stripslashes_deep(esc_attr(get_option(APJ_PCM_OPT_NAME)));
        global $c_message;
        echo '<script>var publish = document.getElementById("publish");if (publish !== null) publish.onclick = function(event){ event.stopImmediatePropagation();return confirm("' . (empty($pcm_message_show) ? $apj_pcm_default_message : $pcm_message_show) . '");};</script>';
    }
    /**
     * Admin menu
     * @return void
     */
    public static function adminMenu()
    {
        add_options_page('Publish Confirm Message Settings', 'Publish Confirm Message', 'manage_options', plugin_dir_path(__FILE__) . 'admin/adminpage.php');
    }
    /**
     * Admin footer
     * @return void
     */
    public static function adminFooter()
    {
?>
        <p> <?php _e('[ Currently this plugin not compatible with <b>Gutenberg Editor.</b> ]', 'apjMC'); ?><br><a href="https://wordpress.org/support/plugin/publish-confirm-message/reviews/#new-post" class="apj-review-link" target="_blank"><?php echo sprintf(__('If you like <strong> %s </strong> please leave us a &#9733;&#9733;&#9733;&#9733;&#9733; rating.', 'apjMC') , APJ_PCM_PLUGIN_NAME); ?></a>  <?php _e('Thank you.', 'apjMC'); ?></p>
<?php
    }
    /**
     * Plugin row meta/action links
     * @return void
     */
    public static function PluginRowMeta($links_array, $plugin_file_name)
    {
        if (strpos($plugin_file_name, APJ_PCM_PLUGIN_PATH)) $links_array = array_merge($links_array, array(
            '<a target="_blank" href="https://paypal.me/arulprasadj?locale.x=en_GB"><span style="font-size: 20px; height: 20px; width: 20px;" class="dashicons dashicons-heart"></span>Donate</a>'
        ));
        return $links_array;
    }
    public static function PluginActionLinks($links_array, $plugin_file_name)
    {
        if (strpos($plugin_file_name, APJ_PCM_PLUGIN_PATH)) $links_array = array_merge(array(
            '<a href="' . admin_url('admin.php?page='.APJ_PCM_MENU_SLUG.'') . '">Settings</a>'
        ) , $links_array);
        return $links_array;
    }
}

