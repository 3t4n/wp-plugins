<?php
defined('ABSPATH') || exit;
function DPCP_set_default_settings()
{
    if (isset(DPCP_Settings::$options['defaults_saved'])) return;
    // If the defaults are not set then
    $defaults = array(
        "defaults_saved" => "1",
        "title" => "0",
        "create_date" => "1",
        "status" => "1",
        "excerpt" => "0",
        "content" => "0",
        "featured_image" => "0",
        "template" => "0",
        "author" => "1",
        "password" => "0",
        "categories" => "0",
        "tags" => "0",
        "comments" => "1",
        "allow_comments" => "0",
        "parent" => "0",
        "hide_tutorial" => "0"
    );

    update_option("dpcp_options", $defaults);
}

class DPCP_Settings
{
    public static $options;

    public function __construct()
    {
        self::$options = get_option('dpcp_options');
        add_action('admin_init', array($this, 'admin_init'));
    }

    public function admin_init()
    {
        register_setting("dpcp_group", "dpcp_options", array($this, "dpcp_options_validate"));
        $activate_redirect_option = get_option("dpcp_activate_redirect");
        if (isset($activate_redirect_option['redirect'])) {
            delete_option("dpcp_activate_redirect");
            $redirect_url = admin_url("admin.php");
            $redirect_url = add_query_arg(
                array('page' => 'dpcp'),
                $redirect_url
            );
            wp_redirect($redirect_url);
        }
    }

    public function dpcp_options_validate($input)
    {
        $old_options = DPCP_Settings::$options;
        $new_input = array();
        foreach ($input as $key => $value) {
            $new_input[$key] = sanitize_text_field($value);
            if (array_key_exists($key, $old_options)) {
                unset($old_options[$key]);
            }
        }
        if (count($old_options) > 0) {
            $new_input = array_merge($old_options, $new_input);
        }
        return $new_input;
    }

    public function settings_section($section_title)
    {
?>
        <tr>
            <td colspan="100%">
                <h2><?php echo esc_html($section_title); ?></h2>
            </td>
        </tr>
    <?php
    }

    public function settings_field($title, $name, $option_0, $option_1)
    {
    ?>
        <tr>
            <th scope="row">
                <?php echo esc_html($title); ?>
            </th>
            <td>
                <label for="<?php echo esc_html($name); ?>_1">
                    <input name="dpcp_options[<?php echo esc_html($name); ?>]" type="radio" id="<?php echo esc_html($name); ?>_1" value="0" <?php checked("0", DPCP_Settings::$options[$name], true) ?>>
                    <?php echo esc_html($option_0); ?>
                </label>
            </td>
            <td>
                <label for="<?php echo esc_html($name); ?>_2">
                    <input name="dpcp_options[<?php echo esc_html($name); ?>]" type="radio" id="<?php echo esc_html($name); ?>_2" value="1" <?php checked("1", DPCP_Settings::$options[$name], true) ?>>
                    <?php echo esc_html($option_1); ?>
                </label>
            </td>
        </tr>
<?php
    }
}
