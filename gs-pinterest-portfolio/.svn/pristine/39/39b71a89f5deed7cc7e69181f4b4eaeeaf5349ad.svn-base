<?php

namespace GSPIN;

// if direct access than exit the file.
defined( 'ABSPATH' ) || exit;

/**
 * Widgets manager.
 */
class Widgets {

    /**
     * Constructor of the class.
     * 
     * @since 2.0.8
     */
    public function __construct() {
        add_action( 'widgets_init', array( $this, 'registerWidget' ) );
    }

    /**
     * Register all widgets.
     * 
     * @since  2.0.8
     * @return void
     */
    function registerWidget() {
        register_widget( 'GSPIN\Widgets\FollowPin' );
        register_widget( 'GSPIN\Widgets\PinBoard' );
        register_widget( 'GSPIN\Widgets\PinProfile' );
        register_widget( 'GSPIN\Widgets\SinglePin' );
    }
}