<?php
namespace News_Element\Widgets;
use Elementor\Group_Control_Base;
use Elementor\Controls_Manager;
use News_Element\Khobish_Helper;

class Group_Query extends Group_Control_Base {

	protected static $fields;

	public static function get_type() {
		return 'ee-mb-transition';
	}
	
	protected function init_fields() {

		$r = new \Elementor\Repeater();
        $r->add_control(
            'meta', [
                'label' =>   esc_html__( 'Category', 'news-element' ),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'multiple' => false,
                'options' =>  Khobish_Helper::thepack_drop_cat(),
            ]
        );

		$controls = [];

		$controls['query_type'] = [
			'label'			=> __( 'Data source', 'news-element' ),
			'type' 			=> Controls_Manager::SELECT,
			'default' 		=> 'category',
			'options' => [
				'category' => __('Category', 'news-element'),
				'individual' => __('Individual', 'news-element'),
			],
		];

		$controls['post_type'] = [
			'label'			=> __('Post type', 'news-element'),
			'type'        => Controls_Manager::SELECT2,
			'options'     => Khobish_Helper::post_type(),
			'multiple'    => false,
			'label_block' => true,
		];

		$controls['taxonomy'] = [
			'label'			=> __('Category', 'news-element'),
			'type'        => Controls_Manager::SELECT2,
			'options'     => Khobish_Helper::thepaack_drop_taxolist(),
			'multiple'    => false,
			'label_block' => true,
		];

		$controls['ids'] = [
			'label'			=> __('Post ids', 'news-element'),
			'type'        => Controls_Manager::TEXT,
			'description' => __('Ids separated by comma', 'news-element'),
			'condition' => [
				'query_type' => 'individual',
			],
			'label_block' => true,
		]; 

		$controls['terms'] = [
			'type' => Controls_Manager::REPEATER,
			'label' => 'Category terms',
			'fields' => $r->get_controls(),
			'prevent_empty' => false,
			'title_field' => '{{{ meta }}}',
			'condition' => [
				'query_type' => 'category',
			],			
		];

		return $controls;
	} 

	protected function prepare_fields( $fields ) {

		array_walk(
			$fields, function( &$field, $field_name ) {

				if ( in_array( $field_name, [ 'query-control', 'popover_toggle' ] ) ) {
					return;
				}

				$field['condition']['query-control'] = 'custom';
			}
		);

		return parent::prepare_fields( $fields );
	}

	protected function get_default_options() {
		return [
			'popover' => [
				'starter_name' 	=> 'query-control',
				'starter_title' => __( 'Query control', 'news-element' ),
			],
		];
	}
}

$controls_manager->add_group_control( 'ee-mb-transition', new \News_Element\Widgets\Group_Query() );