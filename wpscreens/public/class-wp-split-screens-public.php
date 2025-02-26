<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       whitelabelcoders.com
 * @since      1.0.0
 *
 * @package    Wp_Screens
 * @subpackage Wp_Screens/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_Screens
 * @subpackage Wp_Screens/public
 * @author     WLC <pfober@whitelabelcoders.com>
 */
class Wpscrn_Wp_Split_Screens_Public {

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function wpscrn_split_enqueue_styles() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Wp_Screens_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Wp_Screens_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style($this->plugin_name . '_split', plugin_dir_url(__FILE__) . 'css/wp-split-screens-public.css', array(), $this->version, 'all');
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function wpscrn_split_enqueue_scripts() {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Wp_Screens_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Wp_Screens_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script($this->plugin_name . '_split', plugin_dir_url(__FILE__) . 'js/wp-split-screens-public.js', array('jquery'), $this->version, false);
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function wpscrn_wp_split_screens_by_id() {
        global $wp_query, $post;
        if ('split_displays' === $post->post_type) {
            $id = get_the_ID();

            $splitscreen = get_post_meta($id, 'splitscreen', true);
            $partition_partition_1 = get_post_meta($id, 'partition_partition_1', true);
            $partition_partition_2 = get_post_meta($id, 'partition_partition_2', true);
            $partitionLeftStyle = $splitscreen == 'landscape' ? 'width: ' . $partition_partition_1 . '%;height: 100%' : 'width: 100%;height: ' . $partition_partition_1 . 'vh';
            $partitionRightStyle = $splitscreen == 'landscape' ? 'width: ' . $partition_partition_2 . '%;height: 100%' : 'width: 100%;height: ' . $partition_partition_2 . 'vh';
            $wpsplitscreen_partition_1 = get_post_meta($id, 'wpsplitscreen_partition_1', true);
            $wpsplitscreen_partition_2 = get_post_meta($id, 'wpsplitscreen_partition_2', true);
            ?>
            <div id="split_slider_<?php echo $id; ?>" class="wpscr_split-slider-container">
                <div id="sliderSplit_<?php echo $splitscreen; ?> "class="wpscr_sliderSplitHolder sliderSplit_<?php echo $splitscreen; ?>">
                    <div class="partitionLeft" style="<?php echo $partitionLeftStyle; ?>">
                        <iframe src="<?php echo get_the_permalink($wpsplitscreen_partition_1); ?>" title="<?php echo get_the_title($wpsplitscreen_partition_1); ?>"></iframe>
                    </div>
                    <div class="partitionRight" style="<?php echo $partitionRightStyle; ?>">
                        <iframe src="<?php echo get_the_permalink($wpsplitscreen_partition_2); ?>" title="<?php echo get_the_title($wpsplitscreen_partition_2); ?>"></iframe>
                    </div>
                </div>
            </div>
            <?php
        }
    }

}
