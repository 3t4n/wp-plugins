<?php

namespace Optemiz\Dashboard;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Class Abstract_Optemiz_Field
 */
abstract class AbstractField {

    /**
     * Field values.
     *
     * @var string|array
     */
    public $field;

    /**
     * Value values.
     *
     * @var string|array
     */
    public $value;

    /**
     * Abstract_Optemiz_Field constructor.
     *
     * @param array|string|null $field  Field array.
     * @param string|array|null $value  Field values.
     *
     */
    public function __construct( $field = array(), $value = null ) {
        $this->field  = $field;
        $this->value  = $value;

        $this->set_defaults();
    }

    /**
     * Unused for now.
     */
    public function set_defaults() {}

}
