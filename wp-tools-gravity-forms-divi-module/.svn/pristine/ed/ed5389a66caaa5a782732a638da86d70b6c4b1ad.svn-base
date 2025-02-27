<?php

namespace WPT\DiviGravity\GravityForm;

/**
 * GravityForm.
 */
class GravityForm {
    protected $container;

    protected $form_id_prefix = 'gf';

    /**
     * Constructor.
     */
    public function __construct( $container ) {
        $this->container = $container;
    }

    /**
     * Options for divi select field
     */
    public function get_active_form_options() {
        $options = [
            $this->form_id_prefix . '-0' => '- Select Gravity Form -',
        ];
        if ( class_exists( '\\GFAPI' ) ) {
            $forms = \GFAPI::get_forms();
            foreach ( array_reverse( $forms ) as $form ) {
                $options[sprintf( '%s-%s', $this->form_id_prefix, $form['id'] )] = $form['title'];
            }
        }
        return $options;
    }

    /**
     *
     */
    public function get_unprefixed_gravityform_id( $unprocessed_id ) {
        return str_replace( $this->form_id_prefix . '-', '', $unprocessed_id );
    }

}
