<?php

namespace GHElementorAutocomplete\Fields;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class SelectAutocomplete extends \ElementorPro\Modules\Forms\Fields\Field_Base {

	public $depended_scripts 	= [ 'gh_elementor_autocomplete_js' ];
	public $depended_styles 	= [ 'gh_elementor_autocomplete_css' ];

    public function get_type(): string 
	{
		return 'gh-select-autocomplete';
	}

    public function get_name(): string 
	{
		return esc_html__( 'Autocomplete select', 'autocomplete-field-for-elementor-pro-forms' );
	}

    public function render( $item, $item_index, $form ): void 
	{		
		
		$form->add_render_attribute(
			'input' . $item_index,
			[
				'size' => '1',
				'class' => 'elementor-field-textual',		
				'placeholder' => esc_attr( $item['autocomplete-placeholder'] )
			]
		);

		$values 	= explode('|', $item['autocomplete-values'] );
	
		?>

		<input data-limit="<?php echo esc_attr( $item['char-limits'] ?? 3 ) ?>" data-startswith="<?php echo esc_attr( $item['only-beginning'] ) ?>" <?php echo $form->get_render_attribute_string( 'input' . $item_index ) ?> >
	
		<div class="elementor-select-autocomplete-container hidden">
			<div class="select-options"></div>
			<div class="empty hidden"><div class="autocomplete-helper"><?php echo esc_html( $item['no-results'] ) ?></div></div>
			<div class="chars-limit hidden">
				<div class="autocomplete-helper">
					<?php echo sprintf( esc_html__( 'Type at least %d characters.', 'autocomplete-field-for-elementor-pro-forms' ), esc_attr( $item['char-limits'] ) ) ?>
				</div>
			</div>
		</div>

		<div style="display:none;" class="options">
			<?php 
				foreach( $values as $value ):
					?>
						<div class="elementor-select-autocomplete-option"><?php echo esc_html( $value ) ?></div>
					<?php				
				endforeach;
			?>
		</div>
	
		<?php

	}

	public function __construct() 
	{
		parent::__construct();
		add_action( 'elementor/preview/init', [ $this, 'editor_preview_footer' ] );
	
	}

	public function editor_preview_footer(): void 
	{
		add_action( 'wp_footer', [ $this, 'content_template_script' ] );
		
	}	

	public function content_template_script(): void 
	{	
		
		?>		
		<script>
		jQuery( document ).ready( () => {
			
			elementor.hooks.addFilter(
				'elementor_pro/forms/content_template/field/<?php echo esc_attr( $this->get_type() ) ?>',
				function ( inputField, item, i ) {

					const fieldId    = `form_field_${i}`;
					const fieldClass = `elementor-field-textual elementor-field ${item.css_classes}`;
					const size       = '1';		
					const placeholder  = item['autocomplete-placeholder'];	
					const pattern    = "";
					
					return `<input id="${fieldId}" placeholder="${placeholder}" class="${fieldClass}" size="${size}" pattern="${pattern}">`;
				}, 10, 3
			);
		
		});
		</script>
		<?php	
	}

	public function update_controls( $widget ): void 
	{
		
		$elementor = \ElementorPro\Plugin::elementor();

		$control_data = $elementor->controls_manager->get_control_from_stack( $widget->get_unique_name(), 'form_fields' );

		if ( is_wp_error( $control_data ) ) {
			return;
		}

		$field_controls = [		

			'autocomplete-placeholder' => [
				'name' => 'autocomplete-placeholder',
				'label' => esc_html__( 'Placeholder', 'autocomplete-field-for-elementor-pro-forms' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Message', 'autocomplete-field-for-elementor-pro-forms' ),
				'dynamic' => [
					'active' => true,
				],		
				'condition' => [
					'field_type' => $this->get_type(),
				],		
				'tab'          => 'content',
				'inner_tab'    => 'form_fields_content_tab',
				'tabs_wrapper' => 'form_fields_tabs',
			],

			'only-beginning' => [
				'name' => 'only-beginning',
				'label' => esc_html__( 'Only beginning', 'autocomplete-field-for-elementor-pro-forms' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,			
				'default' => 'yes',
				'description' => esc_html__( "Search results checking only if the option start with the given string?", 'autocomplete-field-for-elementor-pro-forms' ),
				'dynamic' => [
					'active' => false,
				],		
				'condition' => [
					'field_type' => $this->get_type(),
				],
				'ai' => [
					'active' => false,
				],		
				'tab'          => 'content',
				'inner_tab'    => 'form_fields_content_tab',
				'tabs_wrapper' => 'form_fields_tabs',
			],

			'char_limits' => [
				'name' => 'char-limits',
				'label' => esc_html__( 'Chars. needed', 'autocomplete-field-for-elementor-pro-forms' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'default' => 3,
				'description' => esc_html__( "Minimum number of characters needed to trigger the autocomplete search", 'autocomplete-field-for-elementor-pro-forms' ),
				'dynamic' => [
					'active' => true,
				],		
				'condition' => [
					'field_type' => $this->get_type(),
				],
				'ai' => [
					'active' => false,
				],		
				'tab'          => 'content',
				'inner_tab'    => 'form_fields_content_tab',
				'tabs_wrapper' => 'form_fields_tabs',
			],			

			'no-results' => [
				'name' => 'no-results',
				'label' => esc_html__( 'No results', 'autocomplete-field-for-elementor-pro-forms' ),
				'type' => \Elementor\Controls_Manager::TEXT,			
				'default' => __( 'No results found', 'autocomplete-field-for-elementor-pro-forms' ),
				'description' => __( "Message displayed when no results are found", 'autocomplete-field-for-elementor-pro-forms' ),
				'dynamic' => [
					'active' => true,
				],		
				'condition' => [
					'field_type' => $this->get_type(),
				],
				'ai' => [
					'active' => false,
				],		
				'tab'          => 'content',
				'inner_tab'    => 'form_fields_content_tab',
				'tabs_wrapper' => 'form_fields_tabs',
			],

			'autocomplete-values' => [
				'name' => 'autocomplete-values',
				'label' => esc_html__( 'Options', 'autocomplete-field-for-elementor-pro-forms' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => '',
				'description' => __('Separate options with a pipe char ("|"). For example: First value|Second value|Third value', 'autocomplete-field-for-elementor-pro-forms' ),
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'field_type' => $this->get_type(),
				],
				'tab'          => 'content',
				'inner_tab'    => 'form_fields_content_tab',
				'tabs_wrapper' => 'form_fields_tabs',
			],

		];

		$control_data['fields'] = $this->inject_field_controls( $control_data['fields'], $field_controls );

		$widget->update_control( 'form_fields', $control_data );
	}

	public function validation( $field, $record, $ajax_handler ): void 
	{	

		$raw_fields = $record->get( 'form_settings' );
		$fields = $raw_fields['form_fields'];

		$values = "";

		foreach( $fields as $f )
		{
			if( $f['custom_id'] == $field['id'] ) $values = $f['autocomplete-values'];			
		}

		$values = explode('|' , $values );
	
		if( !in_array( $field['value'], $values ) )
		{
			$ajax_handler->add_error(
				$field['id'],
				__( 'Invalid value', 'autocomplete-field-for-elementor-pro-forms' )
			);
		}
		

		
	}
}