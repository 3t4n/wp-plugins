<?php
if (!defined('ABSPATH')) {
    exit;
}

$uuid = wp_kses_post(get_option('archisketch_plugin_uuid'));
$login_url = wp_kses_post(get_option('archisketch_plugin_login_url'));

add_action('admin_enqueue_scripts', 'archisketch_enqueue_scripts');
?>

<div class="wrap">
    <h1 style="font-weight: 700">Archisketch Plugin Settings</h1>
    <p>
        📕 Archisketch integration guidelines:
        <a target="_blank" href="https://docs.archisketch.com/reference/wordpress">[ 👀 See here ]</a>
    </p>
    <table class="form-table">
        <tr valign="top">
            <th scope="row">WUID</th>
            <td>
                <input disabled type="text" name="archisketch_plugin_wuid" style="min-width: 320px;" value="<?php echo esc_attr($uuid); ?>" />
                <p class="archi_module_th_guide">
                    This is the <b>WUID</b> used for integration with Archisketch. <br>
                    If issues arise, contact the Archisketch team with this <b>WUID</b>.
                </p>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">Integration status</th>
            <td>
                <div id="archisketch-plugin-status"></div>
                <button class="archi_module_btn_sync" onclick="checkPluginIntegration().then(url => { if (url) window.open(url, '_blank'); }); return false;">
                    Check integration
                </button>
            </td>
        </tr>
    </table>
    <form method="post" action="options.php">
        <?php
            settings_fields('archisketch-settings-group');
            do_settings_sections('archisketch-settings-group');
        ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Login URL (Optional)</th>
                <td>
                    <input style="min-width: 320px;" type="url" pattern="https?://.*" placeholder="https://example.com/login" name="archisketch_plugin_login_url" value="<?php echo esc_url($login_url); ?>" />
                    <p class="archi_module_th_guide">
                        <div class="archi_module_ex">
                            <b style="display: block; color: #3498db; margin-bottom: 4px">
                                * The login URL is not a required field.
                            </b>
                            Please enter the URL with <b>https://</b> or <b>http://</b>. <br />
                            EX] https://www.archisketch.com/en
                        </div>
                    </p>
                </td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>