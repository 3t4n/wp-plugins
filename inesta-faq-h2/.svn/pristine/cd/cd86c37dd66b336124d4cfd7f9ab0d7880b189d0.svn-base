<?php
/**
 * Plugin Name: Inesta FAQ H2
 * Description: Automatically changes Yoast FAQ question labels to H2 elements for better SEO and accessibility.
 * Version:     1.0.2
 * Author:      Inesta
 * Author URI:  https://inesta.nl/
 * Plugin URI:  https://inesta.nl/tools-inesta-faq-h2/
 * License:     GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: inesta-faq-h2
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Replace Yoast FAQ <span> and <strong> tags with <h2> tags.
 *
 * This function hooks into `the_content` to modify Yoast FAQ blocks and replace the <span> and <strong> elements used for questions
 * with H2 headings to improve SEO and accessibility.
 *
 * @param string $content The content of the post.
 * @return string Modified content with H2 headings for Yoast FAQ questions.
 */
function inesta_change_yoast_faq_to_h2( $content ) {
    // Check if the content contains a Yoast FAQ block.
    if ( strpos( $content, 'wp-block-yoast-faq-block' ) !== false ) {
        // Replace <span> elements with the class `pp-faq-button-label` to <h2> tags.
        $content = preg_replace( '/<span class="pp-faq-button-label">(.*?)<\/span>/', '<h2 class="pp-faq-button-label">$1</h2>', $content );

        // Replace <strong> elements with the class `schema-faq-question` to <h2> tags.
        $content = preg_replace( '/<strong class="schema-faq-question">(.*?)<\/strong>/', '<h2 class="schema-faq-question">$1</h2>', $content );
    }

    return $content;
}

// Add the filter to modify content when rendered.
add_filter( 'the_content', 'inesta_change_yoast_faq_to_h2' );

/**
 * @param $content
 * @return array|mixed|string|string[]|null
 */
function inesta_change_power_pack_faq_to_h2($content) {
    // Controleer of de content het PP FAQ blok bevat
    if (strpos($content, 'pp-faq-button-label') !== false) {
        // Gebruik een regex om de span-tags te vervangen door h2-tags
        $pattern = '/<span class="pp-faq-button-label">(.*?)<\/span>/';
        $replacement = '<h2 class="pp-faq-button-label">$1</h2>';
        $content = preg_replace($pattern, $replacement, $content);
    }
    return $content;
}

// Voeg de filter toe aan 'the_content' om alleen de content van de pagina/post te bewerken
add_filter('the_content', 'inesta_change_power_pack_faq_to_h2');

function inesta_override_ysfa_js() {
    if ( is_plugin_active('faq-schema-block-to-accordion/faq-schema-block-to-accordion.php') ) {
        wp_dequeue_script('YSFA-js');
        wp_enqueue_script('YSFA-js-override', plugin_dir_url(__FILE__) . 'js/YSFA-JS-override.js', array('jquery'), '1.0.0', true);
    }
}
add_action('wp_enqueue_scripts', 'inesta_override_ysfa_js', 20);
