/* BLOCK: Super Testimonial - Single Testimonial */
var el = wp.element.createElement,
registerBlockType = wp.blocks.registerBlockType,
ServerSideRender = wp.components.ServerSideRender,
TextControl = wp.components.TextControl,
SelectControl = wp.components.SelectControl,
InspectorControls = wp.editor.InspectorControls

/* Register Block Type - Single Testimonials */
registerBlockType( 'sola-t-single-testimonial-gutenberg-block/sola-t-single-testimonial-gutenberg-registration', {
	title: 'Super Testimonial - Single',
	icon: 'admin-users',
	category: 'widgets',

	attributes: {
		alignment: {
			type: 'string',
			default: 'center'
		},
		testimonial_single:{
			type: 'string',
		},
		testimonial_random:{
			type: 'boolean',
		}

	  },
   
	edit: function(props){

	/* Functions */

	//Alignment Function
	function onChangeAlignment( updatedAlignment ) {
		props.setAttributes( { alignment: updatedAlignment } );
	}

	//Random Testimonial Function
	function onChangeTestimonial(testimonial_random_t) {
		if(props.attributes.testimonial_random = 'true'){
		props.setAttributes( { testimonial_random: testimonial_random_t } );
		}
	}

	//Random Button
	random_testimonial_button = el( wp.components.ToggleControl, {
		testimonial_random: props.attributes.testimonial_random,
		label: "Random",
		checked: !!props.attributes.testimonial_random ,
		 help: "This will display a random testimonial",
		 onChange: onChangeTestimonial,
	 } );

	 //Add random button to div
	random_button_div = el(
		'div',
		{ class: 'select_random'
	  },
	  random_testimonial_button
	);

	//Allignment Label
	alignment_bar_label = el(
		'label',
		{ class: 'advanced_setting_label'
	  },
		'Align Text'
	);

	//Select testimonial Label
	select_testimonial_label = el(
		'label',
		{ class: 'select_single_testimonial_label'
	  },
		'Select Testimonial'
	);

	//Allignment Label dropdown
	select_random_testimonial = el(
		'a',
		{ class: 'button button-secondary'
	  },
		'Display Random Testimonial'
	);

	//align setting
	alignment_bar = el(
		wp.blockEditor.AlignmentToolbar, { alignment: props.attributes.alignment, onChange: onChangeAlignment 				
		},
		'Align Text',
	);

	var PanelBody = wp.components.PanelBody;

return [

		el( ServerSideRender, {
			block: 'sola-t-single-testimonial-gutenberg-block/sola-t-single-testimonial-gutenberg-registration',
			attributes: props.attributes,
		} ),

		el( InspectorControls, {},
			el( wp.components.SelectControl, {
				label: 'Please Choose A Testimonial',
				value: props.attributes.testimonial_single,
				onChange: ( value ) => { props.setAttributes( { testimonial_single: value } ); },
				options: single_testimonial,
				disabled: props.attributes.testimonial_random,
			} )
		   ),
	
		add_controols_to_divs = el(
			InspectorControls,
			null,
			add_controols_to_divs_2 = el(PanelBody, {
				title: 'Super Single Testimonial Settings',
				initialOpen: true,  
			},
			alignment_bar_label,
			alignment_bar,
			random_button_div
			) 
		),

		
];
},
save: function(props) {
	//return null because this is being rendered by PHP (includes/gutenberg-block/index.php)
	return null;
}
});
