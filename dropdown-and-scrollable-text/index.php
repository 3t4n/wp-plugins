<?php
/*
Plugin Name: Dropdown and scrollable Text
Plugin URI: https://webodid.com
Description: Create shortcode for Dropdown Text
Author: Pedram Nasertorabi
Version: 2.1
Author URI: http://webodid.com/
*/
defined( 'ABSPATH' ) || exit();

/*Activation Deactivation*/
register_activation_hook( __FILE__, 'DST_Webodid_Activation' );
register_deactivation_hook( __FILE__, 'DST_Webodid_Deactivation' );
function DST_Webodid_Activation() {}
function DST_Webodid_Deactivation() {}

/*Add Assets*/
function DST_Webodid_Assets_Handler( $hook ) {
    wp_enqueue_script( 'dropdownjs', plugins_url( 'assets/dropdownjs.js', __FILE__ ), array( 'jquery' ), 1.0, false );
    wp_enqueue_script( 'scrollbarjs', plugins_url( 'assets/jquery.mCustomScrollbar.concat.min.js', __FILE__ ),
        array( 'jquery' ), 1.0, false );
    wp_register_style( 'dropdowncss', plugins_url( 'assets/dropdowncss.css', __FILE__ ), false );
    wp_enqueue_style( 'dropdowncss' );
    wp_register_style( 'scrollbarcss', plugins_url( 'assets/jquery.mCustomScrollbar.min.css', __FILE__ ), false );
    wp_enqueue_style( 'scrollbarcss' );
}
add_action( 'wp_enqueue_scripts', 'DST_Webodid_Assets_Handler' );

/*ADD JS ADMIN*/
function DST_Webodid_enqueue_my_scripts( $hook ) {
    $current_screen = get_current_screen();
    if ( strpos($current_screen->base, 'DST') === false) {
        return;
    } else {
        wp_enqueue_style('dst_admin_style', plugins_url('assets/dropdowncss.css',__FILE__ ));
        wp_enqueue_script( 'custom-js', plugins_url( 'assets/clipboard.min.js' , __FILE__) , array('jquery'), '1.1', true );
    }
}
add_action( 'admin_enqueue_scripts', 'DST_Webodid_enqueue_my_scripts' );

/*Register Custom Menu*/
function DST_Webodid_Menu() {
    add_menu_page(
        __( 'Dropdown & Scrollable Text', 'DST' ),
        'DST Options',
        'manage_options',
        'DST',
        'DST_Webodid_admin_Page',
        plugins_url( 'assets/img/logo.png', __FILE__ ),
        100
    );
}
add_action( 'admin_menu', 'DST_Webodid_Menu' );

/*Admin Page*/
function DST_Webodid_admin_Page() {
    ?>
    <div class="wrap dst-admin">
        <div class="over-x">
            <table>
                <tr>
                    <th>Shortcode Generator fo Scrollable Section</th>
                    <th>Shortcode Generator fo dropdown Section</th>
                </tr>
                <tr>
                    <td>
                        <form method="post" action="<?php echo admin_url( 'admin.php?page=DST' ); ?>">
                            <select id="theme" name="theme">
                                <option value="3d">3d</option>
                                <option value="3d-dark">3d dark</option>
                                <option value="3d-tick">3d tick</option>
                                <option value="3d-tick-dark">3d tick dark</option>
                                <option value="dark">dark</option>
                                <option value="dark-2">dark-2</option>
                                <option value="dark-3">dark-3</option>
                                <option value="dark-thin">dark-thin</option>
                                <option value="dark-tick">dark-tick</option>
                                <option value="inset">inset</option>
                                <option value="inset-2">inset 2</option>
                                <option value="inset-2-dark">inset 2 dark</option>
                                <option value="inset 3">inset 3</option>
                                <option value="inset-3-dark">inset 3 dark</option>
                                <option value="inset-dark">inset dark</option>
                                <option value="light">light</option>
                                <option value="light-2">light 2</option>
                                <option value="light-3">light 3</option>
                                <option value="light-thin">light thin</option>
                                <option value="light-tick">light tick</option>
                                <option value="minimal">minimal</option>
                                <option value="minimal-dark">minimal dark</option>
                                <option value="rounded">rounded</option>
                                <option value="rounded-dark">rounded dark</option>
                                <option value="rounded-dots">rounded-dots</option>
                                <option value="rounded-dots-dark">rounded-dots-dark</option>
                            </select>
                            <input placeholder="Enter height px (EX : 200)" name="height" required>
                            <textarea placeholder="Enter Text Here" name="content" required></textarea>
                            <input type="submit" value="Create Shortcode" name="create-scroll-shortcode">
                        </form>
                    </td>
                    <td>
                        <form method="post" action="<?php echo admin_url( 'admin.php?page=DST' ); ?>">
                            <input placeholder="Enter height px (EX : 200)" name="drop-height" required>
                            <textarea placeholder="Enter Text Here" name="drop-content" required></textarea>
                            <input type="submit" value="Create Shortcode" name="create-dropdown-shortcode">
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        <div class="ltr-d">
            <?php
            if ( isset( $_POST['create-scroll-shortcode'] ) ) { ?>
                <?php $shortcode = '[scrollabletext theme=' . sanitize_text_field($_POST['theme'] ). ' height=' . sanitize_text_field($_POST['height'])  . ']' . sanitize_text_field($_POST['content']) . ' [/scrollabletext]'; ?>
                <button class="btn copybtn" data-clipboard-text="<?php echo esc_html($shortcode) ?>">
                    Copy to clipboard
                </button>
                <span id="copy-status"></span>
                <p class="shortcode-generated"><?php echo esc_html($shortcode) ?></p>
                <input value="<?php echo esc_html($shortcode) ?>" type="hidden" id="shortcode">
            <?php } ?>
            <?php
            if ( isset( $_POST['create-dropdown-shortcode'] ) ) { ?>
                <?php $shortcode = '[dropdowntext height=' . sanitize_text_field($_POST['drop-height']) . ']' . sanitize_text_field($_POST['drop-content']) . ' [/dropdowntext]'; ?>
                <button class="btn copybtn" data-clipboard-text="<?php echo esc_html($shortcode) ?>">
                    Copy to clipboard
                </button>
                <span id="copy-status"></span>
                <p class="shortcode-generated"> <?php echo esc_html($shortcode) ?> </p>
                <input value="<?php echo esc_html($shortcode) ?>" type="hidden" id="shortcode">
            <?php } ?>
        </div>
        <p class="theme-demo">Themes demo</p>
        <div style="overflow-x:auto;">
            <table style="border-collapse: collapse;">
                <tr>
                    <td>3D</td>
                    <td>3d Dark</td>
                    <td>3d tick</td>
                    <td>3d tick Dark</td>
                    <td>Dark</td>
                    <td>Dark-2</td>
                    <td>dark-3</td>
                    <td>dark-thin</td>
                    <td>dark-tick</td>
                    <td>inset</td>
                    <td>inset-2</td>
                    <td>inset-2-dark</td>
                </tr>
                <tr>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/3d.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/3d-dark.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/3d-tick.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/3d-tick-dark.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/dark.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/dark-2.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/dark-3.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/dark-thin.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/dark-tick.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/inset.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/inset-2.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/inset-2-dark.jpg"></td>
                </tr>
                <tr>
                    <td>inset-3</td>
                    <td>light</td>
                    <td>light-2</td>
                    <td>light-3</td>
                    <td>light-thin</td>
                    <td>light-tick</td>
                    <td>minimal</td>
                    <td>minimal-dark</td>
                    <td>rounded</td>
                    <td>rounded-dark</td>
                    <td>rounded-dots</td>
                    <td>rounded-dots-dark</td>
                </tr>
                <tr>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/inset-3.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/light.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/light-2.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/light-3.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/light-thin.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/light-tick.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/minimal.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/minimal-dark.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/rounded.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/rounded-dark.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/rounded-dots.jpg"></td>
                    <td><img src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/img/rounded-dots-dark.jpg"></td>

                </tr>
            </table>
        </div>
    </div>
    <?php
}

/*Create Shortcode For Drop Down Text*/
function DST_Webodid_Shortcode( $atts, $content ) {
    $atts = shortcode_atts(
        array(
            'height' => '300',
        ), $atts, 'dropdowntext' );

    return '<div class="dropdowntextholder" style="height:' . $atts['height'] . 'px">
<p class="dropdownopener">&#8595;</p>
<p class="dropdowncloser">&#8593;</p>
' . $content . '</div>';
}
add_shortcode( 'dropdowntext', 'DST_Webodid_Shortcode' );

/*Create Shortcode For Scrollable Text*/
function DST_Webodid_Scrollable_Shortcode( $atts, $content ) {
    $atts = shortcode_atts(
        array(
            'theme'  => 'dark',
            'height' => '300',
        ), $atts, 'scrollabletext' );

    return '<div class="mCustomScrollbar" data-mcs-theme="' . $atts['theme'] . '" style="height : ' . $atts['height'] . 'px">'
        . $content .
        '</div>';
}
add_shortcode( 'scrollabletext', 'DST_Webodid_Scrollable_Shortcode' );
?>