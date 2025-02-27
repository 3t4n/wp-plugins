<?php
/*
Plugin Name: MachForm Shortcode
Plugin URI: http://www.laymance.com/products/wordpress-plugins/machform-shortcode/
Description: Creates a shortcode for inserting MachForm forms into your posts or pages (only tested with MachForm 3.5+).
Version: 1.5.0
Author: Laymance Technologies LLC
Author URI: http://www.laymance.com
License: GPL2
*/

// Ensure the file is not directly accessed
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'MFSC_VERSION', '1.5.0' );

// Global default option name
define( 'MFSC_OPTION_NAME', 'machform_shortcode_domain' );

// Retrieve and sanitize the MachForm domain
$machform_domain = sanitize_url( get_option( MFSC_OPTION_NAME, '' ) );

// Check and sanitize existing settings for legacy values
if ( $machform_domain === '--' ) {
    delete_option( MFSC_OPTION_NAME );
    $machform_domain = '';
}

if ( empty( $machform_domain ) ) {
    add_action( 'admin_notices', 'machform_sc_admin_notices' );
} else {
    // Ensure the URL is valid
    if ( strpos( $machform_domain, 'http' ) === false && substr( $machform_domain, 0, 2 ) !== '//' ) {
        $machform_domain = 'http://' . $machform_domain;
    }

    $machform_domain = trailingslashit( $machform_domain );
    add_shortcode( 'machform', 'machform_shortcode' ); // Register the shortcode
}

// Register the plugin settings menu
add_action( 'admin_menu', 'machform_sc_plugin_menu' );

/**
 * Shortcode function to insert MachForm.
 */
function machform_shortcode( $atts_raw ) {
    if ( is_admin() ) {
        return ''; // Avoid executing shortcode in the admin panel for compatibility reasons
    }


    $atts = shortcode_atts([
            'id'     => 0,
            'type'   => 'js',
            'height' => 800,
        ],
        array_change_key_case( $atts_raw, CASE_LOWER ),
        'machform'
    );

    $id     = absint( $atts['id'] );
    $type   = sanitize_text_field( $atts['type'] );
    $height = absint( $atts['height'] );

    if ( $id < 1 ) {
        return ''; // ID is required
    }

    global $machform_domain;
    $mf_domain         = esc_url( $machform_domain );
    $additional_params = generate_additional_params( $atts_raw );

    if ( $type === 'js' ) {
        return generate_js_embed( $mf_domain, $id, $height, $additional_params );
    } elseif ( $type === 'iframe' ) {
        return generate_iframe_embed( $mf_domain, $id, $height, $additional_params );
    }

    return ''; // Return empty string for unsupported types
}

/**
 * Generate JavaScript embed HTML.
 */
function generate_js_embed( $mf_domain, $id, $height, $additional_params ) {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'machform-postmessage', $mf_domain . 'js/jquery.ba-postmessage.min.js', [], MFSC_VERSION, true );
    wp_enqueue_script( 'machform-loader', $mf_domain . 'js/machform_loader.js', [], MFSC_VERSION, true );

    return sprintf(
        '<div id="mf_placeholder" data-formurl="%sembed.php?id=%d%s" data-formheight="%d" data-paddingbottom="10"></div>',
        $mf_domain,
        $id,
        $additional_params,
        $height
    );
}

/**
 * Generate iframe embed HTML.
 */
function generate_iframe_embed( $mf_domain, $id, $height, $additional_params ) {
    return sprintf(
        '<iframe onload="javascript:parent.scrollTo(0,0);" height="%d" allowTransparency="true" frameborder="0" scrolling="no" style="width:100%%;border:none" src="%sembed.php?id=%d%s"><a href="%sview.php?id=%d%s">Click here to complete the form.</a></iframe>',
        $height,
        $mf_domain,
        $id,
        $additional_params,
        $mf_domain,
        $id,
        $additional_params
    );
}

/**
 * Generate additional URL parameters.
 */
function generate_additional_params( $atts ) {
    $params = '';

    foreach ( $atts as $key => $value ) {
        if ( preg_match( '/element_\d+_\d+/', $key ) ) {
            $params .= '&' . urlencode( strtolower( $key ) ) . '=' . urlencode( esc_html($value ) );
        }
    }

    return $params;
}

/**
 * Add plugin settings menu.
 */
function machform_sc_plugin_menu() {
    add_options_page(
        'Machform Shortcode Options',
        'Machform Shortcode',
        'manage_options',
        'machform_shortcodes',
        'machform_sc_options'
    );
}

/**
 * Display admin notice if the plugin is not configured.
 */
function machform_sc_admin_notices() {
    echo '<div id="notice" class="updated fade"><p>The Machform Shortcodes plugin has not been configured yet. It must be configured before it can be used. <a href="'.esc_url(admin_url( 'options-general.php?page=machform_shortcodes')).'">Click here to configure.</a></p></div>';
}

/**
 * Plugin settings page.
 */
function machform_sc_options() {
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die('You do not have sufficient permissions to access this page.');
    }

    $machform_domain = sanitize_url( get_option( MFSC_OPTION_NAME, '' ) );
    $alert = '';

    if ( isset( $_POST['machform_url'] ) ) {
        if ( ! check_admin_referer('machform_shortcode_action', 'machform_shortcode_nonce') ) {
            wp_die('Security check failed. Please try again.');
        }

        $machform_domain = trailingslashit(esc_url_raw(wp_unslash($_POST['machform_url'])));
        if (filter_var($machform_domain, FILTER_VALIDATE_URL) === false) {
            $machform_domain = '';
        }

        if (empty($machform_domain)) {
            delete_option( MFSC_OPTION_NAME );
            add_action( 'admin_notices', 'machform_sc_admin_notices' );
        } else {
            update_option( MFSC_OPTION_NAME, $machform_domain );
            remove_action( 'admin_notices', 'machform_sc_admin_notices' );
        }

        $alert = '<div id="notice" class="updated fade"><p>Your configuration options have been saved!</p></div>';
    }

    ?>
    <div class="wrap"><h2>MachForm Shortcodes</h2>
    <div>
    The Machform Shortcodes plugin creates the shortcodes necessary for you to insert javascript or iframe forms created by MachForm
    into your posts or pages! Configuration is simple, we simply need the URL for your MachForms installation. If you are not using
    the excellent forms application from App Nitro, you should check it out <a href="http://www.machform.com" target="_blank">here</a>!<br/>
    <br/>
    <strong>Please Note:</strong> this plugin works with the 3rd party MachForm web app, <u>it is not included with this plugin</u>.
    This plugin only allows the easy use of MachForms within your WordPress site.<br><br>
    <?php
    echo wp_kses($alert, [
        'a' => [
            'href' => [],
            'title' => [],
        ],
        'div' => [
            'id' => [],
            'class' => [],
        ],
        'br' => [],
        'em' => [],
        'strong' => [],
    ]);
    ?>
    <form method="post">
        <table>
            <tr>
                <td>
                    <strong>MachForm URL/Location</strong>
                </td>
                <td>
                    <input type="text" name="machform_url" value="<?php echo esc_url($machform_domain); ?>" size="45">
                </td>
            </tr>
            <?php
            wp_nonce_field('machform_shortcode_action', 'machform_shortcode_nonce');
            ?>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" class="button-primary" value="Save Configuration">
                </td>
            </tr>
        </table>
    </form>
    <br/>
    <hr>
    <br/>
    <h2>How do you use the Machform Shortcode?</h2>
    Using the short codes is easy! The shortcode supports both the javascript method as well as the iframe method of Machform. Follow these simple steps in order to use
    Machforms on your site:<br/>
    <br/>

    <strong>Step 1:</strong> In Machforms, click on the "Code" option for the form you wish to embed in order to see the Machforms embed code.<br/>
    <br/>

    <strong>Step 2:</strong> In the embed code, make note of the "height" and the "id" of your form, you will use that in your shortcode!<br/>
    <br/>

    <strong>Step 3:</strong> In your content where you want the form to appear, insert a shortcode using the following format:&nbsp;&nbsp;
    [machform type=(<em>"js" or "iframe"</em>) id=(<em>ID #</em>) height=(<em>height #</em>)]<br/>
    <br/>
    * The type option must be "js" for javascript, or "iframe" for the iFrame method. If the type is not specified, it defaults to the javascript method.<br/>
    * The id option is the ID number of the form from your embed code. <span style="color:maroon; font-weight:bold;">The ID is required.</span><br/>
    * The height option is the height size of the form from your embed code. If a height is not specified, it defaults to 800.<br/>
    <br/>
    An example of a finished shortcode: [machform type=js id=1593 height=703]<br/>
    <br/>
    <br/>
    <strong>URL Parameters</strong><br/>
    The plugin now supports URL Parameters. You can read more about Machform\'s implementation of URL Parameters by visiting <a
        href="http://www.appnitro.com/doc-url-parameters" rel="nofollow">their website here</a>.<br/>
    <br/>
    To use URL parameters with your shortcodes, just add the additional parameters inside of the shortcode like the following example:<br/>
    <br/>
    <pre>[machform type=js id=1593 height=703 element_1_1="Field Text Here" element_1_2="Field Text Here"]</pre>
    <br/>
    <br/>

    <strong>Step 4:</strong> You are done, save your content and your form should appear!<br/>
    <br/>
    <br/>
    <hr>
    <br/>
    <?php
    generate_mf_sponsor();
}

function generate_mf_sponsor() {
    ?>
    <div class="mfsc_config_container">
        <h2>Please leave a review!</h2>
        If you like this plugin and it has been helpful, could you leave a review? Just goto
            <a href="https://wordpress.org/support/view/plugin-reviews/machform-shortcode" target="_blank">
                https://wordpress.org/support/view/plugin-reviews/machform-shortcode
            </a>
        and click on "Add your own review", it would be much appreciated!<br/><br/>
        <br/>
        This plugin was created by <a href="http://www.laymance.com" target="_blank">Laymance Technologies LLC</a>, a SaaS development agency with
        offices in Knoxville and Nashville Tennessee. We offer custom SaaS and software development, custom WordPress templates and plugins,
        and so much more. Find us on the web at
        <a href="http://laymance.com" target="_blank">laymance.com</a>, by email at <a href="hello@laymance.com">hello@laymance.com</a>.<br/>
        <br/>
        <strong>Need a WordPress support contract, or just need help for one-time issues?</strong>
        Visit <a href="http://www.blackbeltwp.com">BlackBeltWP.com</a> to chat real-time with a WordPress expert. We take our WordPress black belt
        skills and we round-house kick your issues!<br/>
        <br/>
        <br/>
        <style>
            .mfsc_config_container {
                margin-top: 20px;
                margin-bottom: 20px;
                padding: 5px 20px 20px 20px;
                border: 1px solid #aaa;
                background-color: #dedede;
            }

            input.mfsc_save_btn {
                padding: 10px 25px;
                border: 1px solid #ccc;
                background-color: navy;
                color: #fff;
            }

            input.mfsc_save_btn:hover {
                background-color: maroon;
            }
        </style>
    </div>
    <?php
}
