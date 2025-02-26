<?php
/**
 * Plugin Name:       Lumeer Embed
 * Plugin URI:        http://wordpress.org/extend/plugins/lumeer-embed/
 * Description:       Embed a Lumeer project within a Post or Page using [lumeer_embed] shortcode.
 * Requires at least: 2.6
 * Requires PHP:      7.2
 * Author:            Lumeer.io
 * Author URI:        https://www.lumeer.io/
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       lumeer-embed
 * Version:           1.0.2
*/

/*
 * function lumeer_embed_project_shortcode
 * This function embeds a Lumeer project to a post or page
 */
if (!function_exists('lumeer_embed_project_shortcode')) {
    function lumeer_embed_project_shortcode($atts) {
        extract(shortcode_atts(array(
            'code' => '',
            'lang' => 'en',
            'show_panel' => false
        ), $atts));

        $code_parts = explode('/', $code);

        // check for valid code
        if (count($code_parts) > 3 || count($code_parts) < 2) {
            return '';
        }

        // filter input for valid characters only
        foreach($code_parts as &$part) {
            $part = preg_replace('/[^a-zA-Z0-9]/', '', $part);
        }

        // check for valid organization and project id
        if (strlen($code_parts[0]) !== 24 || strlen($code_parts[1]) !== 24) {
            return '';
        }

        // check for valid language
        if ($lang !== 'en' && $lang !== 'cs') {
            $lang = 'en';
        }

        // parse boolean from string, number or boolean itself
        $show_panel_str = filter_var($show_panel, FILTER_VALIDATE_BOOLEAN) ? 'true' : 'false';

        $result = '
            <div class="wp-block-lumeer-embed">
                <script type="text/javascript" 
                        src="https://d2b894al51csxx.cloudfront.net/cs/public-view.js"
                        data-o="' . $code_parts[0] . '" 
                        data-p="' . $code_parts[1] . '"
                        data-v="' . (count($code_parts) === 3 ? $code_parts[2] : '') . '"
                        data-tp="' . $show_panel_str . '" 
                        data-l="' . $lang . '">
                </script>
            </div>';

        return $result;
    }
}
add_shortcode('lumeer_embed', 'lumeer_embed_project_shortcode');

?>
