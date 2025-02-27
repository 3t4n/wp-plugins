<?php
/**
 * Plugin Name: Click to Copy
 * Description: The Click To Copy Block plugin offers a seamless Gutenberg block for one-click content copying.
 * Version: 1.0.2
 * Author: bPlugins
 * Author URI: http://bplugins.com
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain: clipboard
 */

// ABS PATH
if (!defined('ABSPATH')) {exit;}

// Constant
define('CTCB_PLUGIN_VERSION', 'localhost' === $_SERVER['HTTP_HOST'] ? time() : '1.0.2');
define('CTCB_DIR', plugin_dir_url(__FILE__));
define('CTCB_ASSETS_DIR', plugin_dir_url(__FILE__) . 'assets/');

// Block Directory
class CTCBClickToCopy
{
    public function __construct()
    {
        add_action('enqueue_block_assets', [$this, 'enqueueBlockAssets']);
        add_action('init', [$this, 'onInit']);
    }

    public function enqueueBlockAssets()
    {
        wp_register_style('ctcb-click-to-copy-style', plugins_url('dist/style.css', __FILE__), [], CTCB_PLUGIN_VERSION);

        wp_register_script('ctcb-click-to-copy-script', CTCB_DIR . 'dist/script.js', ['react', 'react-dom'], CTCB_PLUGIN_VERSION);
    }

    public function onInit()
    {
        wp_register_style('ctcb-click-to-copy-editor-style', plugins_url('dist/editor.css', __FILE__), ['ctcb-click-to-copy-style'], CTCB_PLUGIN_VERSION); // Backend Style

        register_block_type(__DIR__, [
            'editor_style' => 'ctcb-click-to-copy-editor-style',
            'render_callback' => [$this, 'render'],
        ]); // Register Block

        wp_set_script_translations('ctcb-click-to-copy-editor-script', 'clipboard', plugin_dir_path(__FILE__) . 'languages'); // Translate
    }

    public function render($attributes)
    {
        extract($attributes);

        $className = $className ?? '';
        $ctcbBlockClassName = 'wp-block-ctcb-click-to-copy ' . $className . ' align' . $align;

        wp_enqueue_style('ctcb-click-to-copy-style');
        wp_enqueue_script('ctcb-click-to-copy-script');

        ob_start();?>
		<div class='<?php echo esc_attr($ctcbBlockClassName); ?>' id='ctcbClickToCopy-<?php echo esc_attr($cId) ?>' data-attributes='<?php echo esc_attr(wp_json_encode($attributes)); ?>'></div>

		<?php return ob_get_clean();
    } // Render

}
new CTCBClickToCopy();