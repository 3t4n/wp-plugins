<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class FDM_Formidable extends ET_Builder_Module {

	public $slug       = 'fdm_formidable';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => '#',
		'author'     => 'Manish Shah',
		'author_uri' => 'www.manishshah.info.np',
	);

	public function init() {
		$this->name = esc_html__( 'Formidable', 'formidable-divi-module' );
	}

	public function get_fields() {
        global $wpdb;
        $result = $wpdb->get_results("SELECT id, name FROM ". $wpdb->prefix . "frm_forms");
        $options = array();
        $index = 0;
        foreach ($result as $arr){
            $options += array($result[$index]->id => $result[$index]->name);
            $index++;
        }
		return array(
			'heading'     => array(
				'label'           => esc_html__( 'Title', 'formidable-divi-module' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your desired heading here.', 'formidable-divi-module' ),
                'toggle_slug'      => 'main_content',

            ),
            'formidable_id' => array(
                'label'           => esc_html__( 'Select Formidable Form', 'formidable-divi-module' ),
                'type'            => 'select',
                'default'         => '1',
                'option_category' => 'basic_option',
                'options'         => $options,
                'description'     => esc_html__( 'Choose the formidable form', 'formidable-divi-module' ),
                'toggle_slug'      => 'main_content',

            ),
            'title' => array(
                'label'           => esc_html__( 'Fromidable Title', 'formidable-divi-module' ),
                'type'            => 'select',
                'default'         => 'true',
                'option_category' => 'basic_option',
                'options'         => array(
                    'true' => 'True',
                    'false' => 'False',
                ),
                'toggle_slug'      => 'main_content',

            ),
            'description' => array(
                'label'           => esc_html__( 'Fromidable Description', 'formidable-divi-module' ),
                'type'            => 'select',
                'default'         => 'true',
                'option_category' => 'basic_option',
                'options'         => array(
                    'true' => 'True',
                    'false' => 'False',
                ),
                'toggle_slug'      => 'main_content',

            ),
            'has_data' => array(
                'label'           => esc_html__( 'has_data', 'formidable-divi-module' ),
                'type'            => 'select',
                'default'         => 'true',
                'option_category' => 'basic_option',
                'options'         => array(
                    'true' => 'True',
                    'false' => 'False',
                ),
                'description'     => esc_html__( 'Choose the formidable form', 'formidable-divi-module' ),
                'toggle_slug'      => 'main_content',

            ),
		);
	}

	public function render( $unprocessed_props, $content, $render_slug ) {
        wp_enqueue_style( 'fdm_insert_custom_style' );

        return sprintf(
			'<h2 class="divi_formidable_header">%1$s</h2>
			<div>%2$s</div>',
			esc_html( $this->props['heading'] ),
            FrmFormsController::get_form_shortcode( array( 'id' => $this->props['formidable_id'], 'title' => $this->props['title'], 'description' => $this->props['description'] ) )
		);
	}
}

new FDM_Formidable;
