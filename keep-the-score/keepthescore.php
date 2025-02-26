<?php
/**
 * Plugin Name:       Keep the Score
 * Plugin URI:        https://keepthescore.co/docs/wordpress/
 * Description:       Embed leaderboards or scoreboards into your WordPress site
 * Version:           1.1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Caspar von Wrede
 * Author URI:        https://casparwre.de/
 */


/**
 * The [keepthescore] shortcode.
 *
 * Accepts a token and outputs an iframe
 *
 * @param array  $atts    Shortcode attributes. Default empty.
 * @return string Shortcode output.
 */
function keepthescore_shortcode( $atts = []) {
    // normalize attribute keys, lowercase
    $atts = array_change_key_case( (array) $atts, CASE_LOWER );

    // override default attributes with user attributes
    $wporg_atts = shortcode_atts(
        array(
            'token' => 'error',
        ), $atts
    );

    $token = esc_html__( $wporg_atts['token'], 'keepthescore' );

    // start box
    $o = '<div class="embedded-board">';

    if ($token == 'error') {
        $o .= "<span style='color: red'> Error: Your board is not being shown because have not included a value for
        'token' with your shortcode.
        <a href='https://keepthescore.com/docs/wordpress/'> See here for more information. </a>
         </span>";

    } else {
        // Create embed code
        $o .='<iframe id="iframe-' .$token.'" src="https://keepthescore.com/wordpress/' .$token. '/"
        style="width:100%;border:none;" scrolling="no"></iframe><script>window.onmessage = (e) =>
        {if (e.data.hasOwnProperty("frameHeight")){document.getElementById("iframe-" +
        e.data.board_token).style.height = `${e.data.frameHeight}px`;}};</script>';
   }

    // end box
    $o .= '</div>';

    // return output
    return $o;
}

/**
 * Central location to create all shortcodes.
 */
function keepthescore_shortcodes_init() {
    add_shortcode( 'keepthescore', 'keepthescore_shortcode' );
}

add_action( 'init', 'keepthescore_shortcodes_init' );


?>