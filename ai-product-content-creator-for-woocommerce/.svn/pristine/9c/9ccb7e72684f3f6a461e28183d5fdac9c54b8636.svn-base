<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://storepro.io/
 * @since      1.0.0
 * @package    ai-product-content-creator-for-woocommerce
 */
class Spwai_Admin
{

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
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {
        $this->plugin_name = $plugin_name;
        $this->version = $version;

        // Add actions
        add_action('admin_enqueue_scripts', [$this, 'enqueue_scripts']); // Enqueue scripts
        add_action('restrict_manage_posts', 'spwai_add_bulk_content_button'); // Add bulk button
    }

    /**
     * Register the stylesheets and scripts for the admin area.
     *
     * @since    1.2.0
     */
    public function enqueue_scripts()
    {
        // Enqueue admin styles
        $screen = get_current_screen();
        
        // Check if we are on the plugin settings page, single product edit page, or WooCommerce product listing page
        if ($screen->id === 'toplevel_page_' . SPWAI_NAME || 
            ($screen->id === 'product' && $screen->base === 'post') || 
            ($screen->id === 'edit-product' && $screen->base === 'edit')) {
            
            wp_enqueue_style($this->plugin_name, SPWAI_URL . 'admin/css/admin.css', array(), $this->version, 'all');
        
            // Enqueue admin scripts
            wp_enqueue_script($this->plugin_name, SPWAI_URL . 'admin/js/admin.js', array('jquery'), $this->version, true);
        }
    
        // Localize spwai_vars and spwai_ajax
        wp_localize_script($this->plugin_name, 'spwai_vars', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce'   => wp_create_nonce('spwai_nonce'),
            'post_id' => get_the_ID(),  // Include the current post ID if within a post,
            'loadingGif' => SPWAI_URL . 'admin/images/loading.gif', // Add the loading GIF path
            'enableConsoleLog' => get_option('spwai_enable_console_log', 'yes'),
            'enableErrorLog' => get_option('spwai_enable_error_log', 'yes'),
        ));
    
        wp_localize_script($this->plugin_name, 'spwai_ajax', array(
            'nonce' => wp_create_nonce('spwai_save_nonce') // Add the correct nonce for save action
        ));
    }
    

    /**
     * Add link to settings page in plugin list page.
     *
     * @since    1.0.0
     */
    public function settings_link($links)
    {
        $url = esc_url(get_admin_url() . "admin.php?page=" . SPWAI_NAME);
        $settings_link = '<a href="' . $url . '">' . __('Settings', 'ai-product-content-creator-for-woocommerce') . '</a>';
        array_push($links, $settings_link);
        return $links;
    }
}

/**
 * Add the bulk content button to the products listing page.
 *
 * @since    1.1.1
 */
function spwai_add_bulk_content_button()
{
    global $typenow;
    if ($typenow == 'product') {
        echo '<button id="spwai-bulk-generate" class="button" style="margin-left: 10px;margin-right: 10px;">Generate Contents Using AI</button>';
    }
}