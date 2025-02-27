<?php

/**
 * Loading Styles and Scripts
 */

add_action('admin_enqueue_scripts', 'ddbd_load_styles_scripts');
function ddbd_load_styles_scripts()
{

    if (isset($_GET['page']) && $_GET['page'] == 'backend_designer') {
        wp_enqueue_style('colorpicker_css', plugin_dir_url(__FILE__) . 'css/spectrum.css');
        wp_enqueue_style('admin_css', plugin_dir_url(__FILE__) . 'css/admin.css');

        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-form');
        wp_enqueue_media();
        wp_enqueue_script('colorpicker_js', plugin_dir_url(__FILE__) . 'js/spectrum.js');
    }
}

/**
 * Create Settings Menu
 */

add_action('admin_menu', 'ddbd_add_admin_menu');
add_action('admin_init', 'ddbd_settings_init');

function ddbd_add_admin_menu()
{

    add_submenu_page('themes.php', 'Backend Designer', 'Backend Designer', 'manage_options', 'backend_designer', 'ddbd_options_page');
}

/**
 * Building Fields
 */

function ddbd_settings_init()
{

    register_setting('pluginPage', 'ddbd_settings');

    /**
     * Sections
     */

    add_settings_section(
        'ddbd_pluginPage_intro',
        __(null, 'backend-designer'),
        'ddbd_settings_section_intro',
        'pluginPage'
    );

    add_settings_section(
        'ddbd_pluginPage_section_admin_panel',
        __('Customize your Admin Panel', 'backend-designer'),
        null,
        'pluginPage'
    );

    add_settings_section(
        'ddbd_pluginPage_section_login_screen',
        __('Customize your Login Screen', 'backend-designer'),
        null,
        'pluginPage'
    );

    /**
     * Fields
     */

    // Section Admin Panel

    add_settings_field(
        'ddbd_text_field_0',
        __('Primary Color', 'backend-designer'),
        'ddbd_text_field_0_render',
        'pluginPage',
        'ddbd_pluginPage_section_admin_panel'
    );

    add_settings_field(
        'ddbd_text_field_1',
        __('Text Color for Primary', 'backend-designer'),
        'ddbd_text_field_1_render',
        'pluginPage',
        'ddbd_pluginPage_section_admin_panel'
    );

    add_settings_field(
        'ddbd_text_field_2',
        __('Secondary Color', 'backend-designer'),
        'ddbd_text_field_2_render',
        'pluginPage',
        'ddbd_pluginPage_section_admin_panel'
    );

    add_settings_field(
        'ddbd_text_field_3',
        __('Text Color for Secondary', 'backend-designer'),
        'ddbd_text_field_3_render',
        'pluginPage',
        'ddbd_pluginPage_section_admin_panel'
    );

    add_settings_field(
        'ddbd_text_field_4',
        __('Focus Color', 'backend-designer'),
        'ddbd_text_field_4_render',
        'pluginPage',
        'ddbd_pluginPage_section_admin_panel'
    );

    add_settings_field(
        'ddbd_text_field_4_0',
        __('Font family', 'backend-designer'),
        'ddbd_text_field_4_0_render',
        'pluginPage',
        'ddbd_pluginPage_section_admin_panel'
    );

    add_settings_field(
        'ddbd_text_field_4_1',
        __('Enable', 'backend-designer'),
        'ddbd_text_field_4_1_render',
        'pluginPage',
        'ddbd_pluginPage_section_admin_panel'
    );

    // Section Login Screen

    add_settings_field(
        'ddbd_text_field_5',
        __('Custom Logo', 'backend-designer'),
        'ddbd_text_field_5_render',
        'pluginPage',
        'ddbd_pluginPage_section_login_screen'
    );

    add_settings_field(
        'ddbd_text_field_5_1',
        __('Custom Background Image', 'backend-designer'),
        'ddbd_text_field_5_1_render',
        'pluginPage',
        'ddbd_pluginPage_section_login_screen'
    );

    add_settings_field(
        'ddbd_text_field_6',
        __('Background Color', 'backend-designer'),
        'ddbd_text_field_6_render',
        'pluginPage',
        'ddbd_pluginPage_section_login_screen'
    );

    add_settings_field(
        'ddbd_text_field_7',
        __('Text Color', 'backend-designer'),
        'ddbd_text_field_7_render',
        'pluginPage',
        'ddbd_pluginPage_section_login_screen'
    );
}

/**
 * Field Declarations
 */

function ddbd_settings_section_intro()
{

    _e('This will create a new Color Scheme called "Backend Designer" on profile settings.
    Important: Hover effects and font settings are not included in live preview. Please be sure to save your changes to see them.
    Let´s rock! ;-)
    ', 'backend-designer');
}

function ddbd_text_field_0_render()
{

    $ddbd_options = get_option('ddbd_settings');
?>
    <input class="ddbd_options_field_primarycolor" type='text' name='ddbd_settings[primarycolor]' value='<?php echo $ddbd_options['primarycolor']; ?>'>
    <label class="description"> <?php _e('Background Colors for Navigation, Main Bar and Buttons', 'backend-designer') ?></label>
<?php

}

function ddbd_text_field_1_render()
{

    $ddbd_options = get_option('ddbd_settings');
?>
    <input class="ddbd_options_field_text_primary" type='text' name='ddbd_settings[text-for-primary]' value='<?php echo $ddbd_options['text-for-primary']; ?>'>
    <label class="description"> <?php _e('Text color for Primary changes', 'backend-designer') ?></label>
<?php

}

function ddbd_text_field_2_render()
{

    $ddbd_options = get_option('ddbd_settings');
?>
    <input class="ddbd_options_field_secondarycolor" type='text' name='ddbd_settings[secondarycolor]' value='<?php echo $ddbd_options['secondarycolor']; ?>'>
    <label class="description"> <?php _e('Sub navigation menus and some hover effects', 'backend-designer') ?></label>
<?php

}

function ddbd_text_field_3_render()
{

    $ddbd_options = get_option('ddbd_settings');
?>
    <input class="ddbd_options_field_text_secondary" type='text' name='ddbd_settings[text-for-secondary]' value='<?php echo $ddbd_options['text-for-secondary']; ?>'>
    <label class="description"> <?php _e('Text color for Secondary changes', 'backend-designer') ?></label>
<?php

}

function ddbd_text_field_4_render()
{

    $ddbd_options = get_option('ddbd_settings');
?>
    <input class="ddbd_options_field_focus_color" type='text' name='ddbd_settings[focus-color]' value='<?php echo $ddbd_options['focus-color']; ?>'>
    <label class="description"> <?php _e('Color for focus effects and highlights', 'backend-designer') ?></label>

<?php

}

function ddbd_text_field_4_0_render()
{

    $ddbd_options = get_option('ddbd_settings');

    if (!isset($ddbd_options['custom_font'])) {
        $ddbd_options['custom_font'] = 0;
    }


?>
    <select id="dd_custom_font" name='ddbd_settings[custom_font]'>
        <option selected="selected" value='Open Sans' <?php selected($ddbd_options['custom_font'], 'Open Sans'); ?>>Default (Open Sans)</option>
        <option value='Arvo' <?php selected($ddbd_options['custom_font'], 'Arvo'); ?>>Arvo</option>
        <option value='Bitter' <?php selected($ddbd_options['custom_font'], 'Bitter'); ?>>Bitter</option>
        <option value='Chivo' <?php selected($ddbd_options['custom_font'], 'Chivo'); ?>>Chivo</option>
        <option value='Domine' <?php selected($ddbd_options['custom_font'], 'Domine'); ?>>Domine</option>
        <option value='Droid Sans' <?php selected($ddbd_options['custom_font'], 'Droid Sans'); ?>>Droid Sans</option>
        <option value='Josefin Slab' <?php selected($ddbd_options['custom_font'], 'Josefin Slab'); ?>>Josefin Slab</option>
        <option value='Lato' <?php selected($ddbd_options['custom_font'], 'Lato'); ?>>Lato</option>
        <option value='Lora' <?php selected($ddbd_options['custom_font'], 'Lora'); ?>>Lora</option>
        <option value='Montserrat' <?php selected($ddbd_options['custom_font'], 'Montserrat'); ?>>Montserrat</option>
        <option value='Roboto' <?php selected($ddbd_options['custom_font'], 'Roboto'); ?>>Roboto</option>
        <option value='Source Sans Pro' <?php selected($ddbd_options['custom_font'], 'Source Sans Pro'); ?>>Source Sans Pro</option>
        <option value='Ubuntu' <?php selected($ddbd_options['custom_font'], 'Ubuntu'); ?>>Ubuntu</option>
        <option value='Vollkorn' <?php selected($ddbd_options['custom_font'], 'Vollkorn'); ?>>Vollkorn</option>
        <option value='Work Sans' <?php selected($ddbd_options['custom_font'], 'Work Sans'); ?>>Work Sans</option>
    </select>
    <label class="description"> <?php _e('Set your font family', 'backend-designer') ?></label>

<?php

}

function ddbd_text_field_4_1_render()
{

    $ddbd_options = get_option('ddbd_settings');

    if (!isset($ddbd_options['enable_globally']))
        $ddbd_options['enable_globally'] = 0;

?>
    <input class="ddbd_options_checkbox" type='checkbox' name='ddbd_settings[enable_globally]' <?php checked($ddbd_options['enable_globally'], 1); ?> value='1'>
    <label class="description"> <?php _e('Enable Color Scheme globally. If is unchecked, sure you can set it manually on Profile Settings.', 'backend-designer') ?></label>

<?php

}

/**
 * Login Screen
 */

function ddbd_text_field_5_render()
{

    $ddbd_options = get_option('ddbd_settings');

?>

    <div class="uploader">
        <input class="ddbd_options_upload" id="upload_image_login_logo" type="text" size="36" name="ddbd_settings[login-logo]" value="<?php echo isset($ddbd_options['login-logo']) ? $ddbd_options['login-logo'] : '' ?>" />
        <input id="dd-media-uploader_login_logo" class="button" type="button" value="Upload Image" />
    </div>

<?php

}

function ddbd_text_field_5_1_render()
{

    $ddbd_options = get_option('ddbd_settings');
?>

    <div class="uploader">
        <input class="ddbd_options_upload" id="upload_image_login_bg" type="text" size="36" name="ddbd_settings[login-bg]" value="<?php echo isset($ddbd_options['login-bg']) ? $ddbd_options['login-bg'] : '' ?>" />
        <input id="dd-media-uploader_login_bg" class="button" type="button" value="Upload Image" />
    </div>

<?php

}

function ddbd_text_field_6_render()
{

    $ddbd_options = get_option('ddbd_settings');
?>
    <input class="ddbd_options_field_login_bgcolor" type='text' name='ddbd_settings[login-bgcolor]' value='<?php echo isset($ddbd_options['login-bgcolor']) ? $ddbd_options['login-bgcolor'] : '' ?>'>
    <label class="description"> <?php _e('Set the background color. <strong>Notice: A background image will overwrite this point</strong>', 'backend-designer') ?></label>

<?php

}

function ddbd_text_field_7_render()
{

    $ddbd_options = get_option('ddbd_settings');
?>
    <input class="ddbd_options_field_login_textcolor" type='text' name='ddbd_settings[login-textcolor]' value='<?php echo isset($ddbd_options['login-textcolor']) ? $ddbd_options['login-textcolor'] : '' ?>'>
    <label class="description"> <?php _e('Text color (outside the login box)', 'backend-designer') ?></label>

<?php

}


/**
 * Master Page
 */

function ddbd_options_page()
{

?>

    <div id="backend-designer" class="wrap">
        <form action='options.php' method='post'>

            <div class="ddbd-head">
                <h2 class="bd-logo">
                    <img height="20" src="<?php echo plugin_dir_url(__FILE__) . '../img/logo_bd.png' ?>" alt="">
                </h2>
                <hr>
            </div>

            <?php
            settings_fields('pluginPage');
            do_settings_sections('pluginPage');
            submit_button();
            ?>

        </form>
    </div>

    <?php

}

/**
 * Register new Color Scheme
 */

$ddbd_options = get_option('ddbd_settings');

wp_admin_css_color(
    'backend_designer',
    __('Backend Designer'),
    '',
    array('#07273E', '#14568A', '#D54E21', '#2683AE')
);

if (isset($ddbd_options['enable_globally'])) {
    add_filter('get_user_option_admin_color', function () {
        return 'backend_designer';
    });
}

//delete_option( 'ddbd_settings' );


/**
 * Scripts
 */

add_action('admin_footer', 'ddbd_scripts');
function ddbd_scripts()
{

    if (isset($_GET['page']) && $_GET['page'] == 'backend_designer') {

    ?>

        <script>
            jQuery(document).ready(function($) {

                /**
                 * Media Uploader - Login Logo
                 */

                function ddbd_mediaUploaderLoginLogo() {
                    var custom_uploader;


                    $('#dd-media-uploader_login_logo').click(function(e) {

                        e.preventDefault();

                        //If the uploader object has already been created, reopen the dialog
                        if (custom_uploader) {
                            custom_uploader.open();
                            return;
                        }

                        //Extend the wp.media object
                        custom_uploader = wp.media.frames.file_frame = wp.media({
                            title: 'Choose Image',
                            button: {
                                text: 'Choose Image'
                            },
                            multiple: true
                        });

                        //When a file is selected, grab the URL and set it as the text field's value
                        custom_uploader.on('select', function() {
                            console.log(custom_uploader.state().get('selection').toJSON());
                            attachment = custom_uploader.state().get('selection').first().toJSON();
                            console.log($(this));
                            $('#upload_image_login_logo').val(attachment.url);
                        });

                        //Open the uploader dialog
                        custom_uploader.open();

                    });
                }

                ddbd_mediaUploaderLoginLogo();



                /**
                 * Media Uploader - Login BG
                 */

                function ddbd_mediaUploaderLoginBg() {
                    var custom_uploader;


                    $('#dd-media-uploader_login_bg').click(function(e) {

                        e.preventDefault();

                        //If the uploader object has already been created, reopen the dialog
                        if (custom_uploader) {
                            custom_uploader.open();
                            return;
                        }

                        //Extend the wp.media object
                        custom_uploader = wp.media.frames.file_frame = wp.media({
                            title: 'Choose Image',
                            button: {
                                text: 'Choose Image'
                            },
                            multiple: true
                        });

                        //When a file is selected, grab the URL and set it as the text field's value
                        custom_uploader.on('select', function() {
                            console.log(custom_uploader.state().get('selection').toJSON());
                            attachment = custom_uploader.state().get('selection').first().toJSON();
                            console.log($(this));
                            $('#upload_image_login_bg').val(attachment.url);
                        });

                        //Open the uploader dialog
                        custom_uploader.open();

                    });
                }

                ddbd_mediaUploaderLoginBg();



                /**
                 * Color Picker
                 */

                function ddbdColorPicker() {

                    jQuery("#backend-designer input.ddbd_options_field_primarycolor").spectrum({
                        preferredFormat: "hex",
                        showInput: true,
                        allowEmpty: true,
                        showInitial: true,

                        move: function(color) {
                            jQuery("#wpadminbar,#adminmenu,#adminmenu .wp-submenu,#adminmenuback,#adminmenuwrap,.wp-core-ui .button-primary,#wpadminbar .ab-sub-wrapper,#wpadminbar ul,#wpadminbar ul li,.wp-submenu li:hover").css({
                                'background': color
                            })
                        }
                    });

                    jQuery("#backend-designer input.ddbd_options_field_text_primary").spectrum({
                        preferredFormat: "hex",
                        showInput: true,
                        allowEmpty: true,
                        showInitial: true,

                        move: function(color) {
                            jQuery('#wpadminbar a,#adminmenu a,#adminmenu .wp-submenu a,#adminmenuback a,#adminmenuwrap a,.wp-core-ui .button-primary,#wpadminbar a.ab-item,#wpadminbar > #wp-toolbar span.ab-label,#wpadminbar > #wp-toolbar span.noticon,#wpadminbar #adminbarsearch::before,#wpadminbar .ab-icon::before,#wpadminbar .ab-item::before,#adminmenu div.wp-menu-image::before,.wp-submenu li:hover').css({
                                'color': color
                            })
                        }
                    });

                    jQuery("#backend-designer input.ddbd_options_field_secondarycolor").spectrum({
                        preferredFormat: "hex",
                        showInput: true,
                        allowEmpty: true,
                        showInitial: true,

                        move: function(color) {
                            jQuery('#adminmenu .wp-has-current-submenu .wp-submenu,#adminmenu .wp-has-current-submenu .wp-submenu.sub-open,#adminmenu .wp-has-current-submenu.opensub .wp-submenu,#adminmenu a.wp-has-current-submenu:focus + .wp-submenu,.no-js li.wp-has-current-submenu:hover .wp-submenu,#adminmenu li.menu-top:hover,#adminmenu li.opensub > a.menu-top,#adminmenu li > a.menu-top:focus,#wpadminbar .ab-top-menu > li.hover > .ab-item, #wpadminbar.nojq .quicklinks .ab-top-menu > li > .ab-item:focus, #wpadminbar:not(.mobile) .ab-top-menu > li:hover > .ab-item, #wpadminbar:not(.mobile) .ab-top-menu > li > .ab-item:focus').css({
                                'background': color
                            })
                        }
                    });

                    jQuery("#backend-designer input.ddbd_options_field_text_secondary").spectrum({
                        preferredFormat: "hex",
                        showInput: true,
                        allowEmpty: true,
                        showInitial: true,

                        move: function(color) {
                            jQuery('#adminmenu .wp-has-current-submenu .wp-submenu a,#adminmenu .wp-has-current-submenu .wp-submenu.sub-open a,#adminmenu .wp-has-current-submenu.opensub .wp-submenu a,#adminmenu a.wp-has-current-submenu:focus + .wp-submenu a,.no-js li.wp-has-current-submenu:hover .wp-submenu a,#adminmenu li.menu-top:hover a,#adminmenu li.opensub > a.menu-top a,#adminmenu li > a.menu-top:focus a,#wpadminbar .ab-top-menu > li.hover > .ab-item, #wpadminbar.nojq .quicklinks .ab-top-menu > li > .ab-item:focus, #wpadminbar:not(.mobile) .ab-top-menu > li:hover > .ab-item, #wpadminbar:not(.mobile) .ab-top-menu > li > .ab-item:focus a,#adminmenu li a:focus div.wp-menu-image::before,#adminmenu li.opensub div.wp-menu-image::before,#adminmenu li:hover div.wp-menu-image::before,#adminmenu li.menu-top:hover,#adminmenu li.opensub > a.menu-top,#adminmenu li > a.menu-top:focus,.wp-submenu li:hover,#wpadminbar .quicklinks .menupop ul li a:focus,#wpadminbar .quicklinks .menupop ul li a:focus strong,#wpadminbar .quicklinks .menupop ul li a:hover,#wpadminbar .quicklinks .menupop ul li a:hover strong,#wpadminbar .quicklinks .menupop.hover ul li a:focus,#wpadminbar .quicklinks .menupop.hover ul li a:hover,#wpadminbar li #adminbarsearch.adminbar-focused::before,#wpadminbar li .ab-item:focus::before,#wpadminbar li a:focus .ab-icon::before,#wpadminbar li.hover .ab-icon::before,#wpadminbar li.hover .ab-item::before,#wpadminbar li:hover #adminbarsearch::before,#wpadminbar li:hover .ab-icon::before,#wpadminbar li:hover .ab-item::before,#wpadminbar.nojs .quicklinks .menupop:hover ul li a:focus,#wpadminbar.nojs .quicklinks .menupop:hover ul li a:hover,#wpadminbar:not(.mobile) > #wp-toolbar a:focus span.ab-label,#wpadminbar:not(.mobile) > #wp-toolbar li:hover span.ab-label,#wpadminbar > #wp-toolbar li.hover span.ab-label').css({
                                'color': color
                            })
                        }
                    });

                    jQuery("#backend-designer input.ddbd_options_field_focus_color").spectrum({
                        preferredFormat: "hex",
                        showInput: true,
                        allowEmpty: true,
                        showInitial: true,

                        move: function(color) {
                            jQuery('#adminmenu .wp-has-current-submenu .wp-submenu .wp-submenu-head,#adminmenu .wp-menu-arrow,#adminmenu .wp-menu-arrow div,#adminmenu li.current a.menu-top,#adminmenu li.wp-has-current-submenu a.wp-has-current-submenu,.folded #adminmenu li.current.menu-top,.folded #adminmenu li.wp-has-current-submenu,.wp-core-ui .button-primary.focus,.wp-core-ui .button-primary.hover,.wp-core-ui .button-primary:focus,.wp-core-ui .button-primary:hover').css({
                                'background': color
                            })
                        }
                    });

                    /**
                     * Login Screen
                     */

                    jQuery("#backend-designer input.ddbd_options_field_login_bgcolor").spectrum({
                        preferredFormat: "hex",
                        showInput: true,
                        allowEmpty: true,
                        showInitial: true,
                    });

                    jQuery("#backend-designer input.ddbd_options_field_login_textcolor").spectrum({
                        preferredFormat: "hex",
                        showInput: true,
                        allowEmpty: true,
                        showInitial: true,
                    });

                }

                ddbdColorPicker();

            })
        </script>


<?php

    }
}
