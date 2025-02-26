<?php

if (!defined('ABSPATH')) exit;

function awap_create_menu()
{
    add_menu_page('Mobile CTA Plugin', 'Mobile CTA', 'administrator', __FILE__, 'awap_page');
    add_action('admin_init', 'awap_register');
}

add_action('admin_menu', 'awap_create_menu');

function awap_register()
{
    //register our settings
    register_setting('awap-group', 'awap-phone-number');
    register_setting('awap-group', 'awap-text-color');
    register_setting('awap-group', 'awap-phone-number-link');
    register_setting('awap-group', 'awap-background-color');
    register_setting('awap-group', 'awap-media-size');
}

function awap_page()
{
    ?>
<div class="wrap">
    <h1>Mobile CTA Settings</h1>
    <p>
        This plugin changes automatically the phone number of your mobile banner. Enter in this page your phone number<br>
        without special characters and people can call you directly. (But enter the number in "Number LINK" without special characters!).<br>
        Style this call to action mobile banner is easy and practical with "Background Color" and "Number Color".
        Enter your own color idea in the<br> textbox as a word, rgba or hexadecimal. Define the media width of your banner
        for mobile devices with "Media Width in px" for the appearance on the webpage.
    </p>
    <form method="post" action="options.php">
        <?php settings_fields('awap-group'); ?>
        <?php do_settings_sections('awap-group'); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">
                    Phone Number (Display)
                </th>
                <td>
                    <input type="text" name="awap-phone-number" value="<?php echo esc_attr(get_option('awap-phone-number')); ?>" />
                    <p class="description">Write the phone number that will be placed inside the CTA</p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    Number Link
                </th>
                <td>
                    <input type="number" name="awap-phone-number-link" value="<?php echo esc_attr(get_option('awap-phone-number-link')); ?>" />
                    <p class="description">Write the number without special characters, to call the number directly with a click. <strong>dont use () or spaces</strong></p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <strong>Number Textcolor</strong>
                </th>
                <td>
                    <input type="text" name="awap-text-color" value="<?php echo esc_attr(get_option('awap-text-color')); ?>" />
                    <p class="description">Color of the phone number. You can use names: "white", rgba: "(255,255,255)" or hex-colors: "#FFFFFF"</p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <strong>Background Color</strong>
                </th>
                <td>
                    <input type="text" name="awap-background-color" value="<?php echo esc_attr(get_option('awap-background-color')); ?>" />
                    <p class="description">Color of the full banner</p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">
                    <strong>Media Query Width in Pixel</strong>
                </th>
                <td>
                    <input type="number" name="awap-media-size" value="<?php echo esc_attr(get_option('awap-media-size')); ?>" />
                    <p class="description">Define the width to make the banner visible</p>
                </td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>
<?php

}
