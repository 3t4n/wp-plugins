<?php

namespace Optemiz\Dashboard;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Class Abstract_Optemiz_Tab
 */
abstract class AbstractTab {

    /**
     * Sub tab key.
     *
     * @var string
     */
    public $key;

    /**
     * Arguments.
     *
     * @var array
     */
    public $args;

    /**
     * Abstract_Optemiz_Tab constructor.
     *
     * @param string|null $key  Sub tab key.
     * @param array|string|null $args  Arguments array.
     *
     */
    public function __construct( $key = null, $args = array() ) {
        $this->key      = $key;
        $this->args     = $args;
    }

    /**
     * Unused for now.
     */
    public function set_key() {}

    /**
     * Unused for now.
     */
    public function set_args() {}

    /**
     * Label
     */
    public function label() {}
}
