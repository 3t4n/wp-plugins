<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('ForminixShortcodeParser')) {
    class ForminixShortcodeParser
    {

        public $base_client;

        public function __construct($base_client)
        {
            $this->base_client = $base_client;

            add_shortcode( 'forminix', array($this, 'forminix_shortcode_parser') );
        }


        public function forminix_shortcode_parser( $atts , $content = null) {
            $atts = shortcode_atts(
                array(
                    'id' => '0',
                ), $atts, 'forminix' );

            return $this->forminix_client_view_maker($atts['id']);
        }


        public function forminix_client_view_maker( $form_id ) {
            ob_start();
            include FORMINIX_PATH . "frontend/templates/dashboard.php";
            return ob_get_clean();
        }


        /* Used in dashboard template */
        public function field_output_generator($fields, $unique_id, $forminix_form_logics, $help_msg_position, $asterisk_position)
        {
            foreach ($fields as $field){
                if($field->type == "field"){
                    include FORMINIX_PATH . "frontend/templates/views/single_field.php";
                }
                if($field->type == "column_container"){
                    echo "<div class=\"forminix_single_form_element_column_container\">";
                    $this->field_output_generator($field->data, $unique_id, $forminix_form_logics, $help_msg_position, $asterisk_position);
                    echo "</div>";
                }
                if($field->type == "column"){
                    echo "<div class=\"forminix_single_form_element_column\">";
                    $this->field_output_generator($field->data, $unique_id, $forminix_form_logics, $help_msg_position, $asterisk_position);
                    echo "</div>";
                }
            }
        }

    }
}
