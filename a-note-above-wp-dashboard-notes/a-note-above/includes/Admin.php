<?php
namespace ANoteAbove;

/**
 * Admin Pages Handler
 */
class Admin {

    public function __construct() {
        add_action('wp_dashboard_setup', [$this, 'anoteabove_dashboard_widgets'] );
    }

    /**
     * Register our notes widget
     *
     * @return void
     */
    public function anoteabove_dashboard_widgets() {
        $this->init_hooks();
    }

    /**
     * Initialize our hooks for the admin page
     *
     * @return void
     */
    public function init_hooks() {
        global $wp_meta_boxes;
        wp_add_dashboard_widget('custom_help_widget', 'A Note Above', [ $this, 'plugin_page']);
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
    }

    /**
     * Load scripts and styles for the app
     *
     * @return void
     */
    public function enqueue_scripts() {
        wp_enqueue_style( 'anoteabove-admin' );
        wp_enqueue_script( 'anoteabove-admin' );
        wp_localize_script( 'anoteabove-admin', '_anoteabove', $this->anoteabove_localization() );
    }

    /**
     * Pass critical info to Notes for population
     * @return [type] [description]
     */
    public function anoteabove_localization() {

        $localization_array = array(
          '_nonce' => wp_create_nonce('wp_rest'),
          'base_url'  =>  site_url(),
          'root'      =>  site_url() . '/wp-json/',
          'admin_url' =>  admin_url( 'admin-ajax.php' ),
          'labels'    =>  $this->anoteabove_labels()
        );

        return $localization_array;
    }

    /**
     * Frontend International Default Labels
     * @return array array for front end labels
     */
    private function anoteabove_labels() {

      $labels = array(
        'addNote' =>  __('add a note', 'anoteabove'),
        'title'   =>  __('title', 'anoteabove'),
        'content' =>  __('content', 'anoteabove'),
        'visibility' =>  __('visibility', 'anoteabove'),
        'cancel' =>  __('cancel', 'anoteabove'),
        'delete' =>  __('delete', 'anoteabove'),
        'save' =>  __('save', 'anoteabove'),
        'edit'   =>  __('edit', 'anoteabove'),
        'controls' =>  __('note edit controls', 'anoteabove'),
        'addTitle' => __('add a title', 'anoteabove'),
        'addContent' => __('add note content', 'anoteabove'),
      );

      return $labels;
    }

    /**
     * Render our admin page mounting target
     *
     * @return void
     */
    public function plugin_page() {
        echo '<div id="anoteabove-dash"></div>';
    }
}
