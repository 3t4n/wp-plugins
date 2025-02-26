/* BLOCK: Super Testimonial - All Testimonials */

var el = wp.element.createElement,
registerBlockType = wp.blocks.registerBlockType,
ServerSideRender = wp.components.ServerSideRender,
TextControl = wp.components.TextControl,
SelectControl = wp.components.SelectControl,
InspectorControls = wp.editor.InspectorControls

/* Register Block Type - All Testimonials */
registerBlockType( 'sola-t-all-testimonial-gutenberg-block/sola-t-all-testimonial-gutenberg-registration', {
	title: 'Super Testimonials - All',
	icon: 'groups',
	category: 'widgets',

	attributes: {
		alignment: {
			type: 'string',
			default: 'center'
		},
		testimonial_all:{
			type: 'string',
		},
		testimonial_slider: {
			type: 'boolean',
		},
	
	 	testimonial_pagination: {
		 	type: 'boolean',
	 	},
	 	testimonial_pagination_id: {
			type: 'string',
		},

		testimonial_cat: {
			type: 'boolean',
		},

		testimonial_cat_select_t: {
			type: 'string',
		},

		testimonial_cat_select_t_slider: {
			type: 'string',
		},

		testimonial_cat_slider: {
			type: 'boolean',
		}

	  },
   
	edit: function(props){

	

	/* Functions */

	//Alignment Function
	function onChangeAlignment( updatedAlignment ) {
		props.setAttributes( { alignment: updatedAlignment } );
	}

	 //Pagination button function
	function onchangetestimonial_pagination_button(testimonial_pagi_t) {
		props.setAttributes( { testimonial_pagination: testimonial_pagi_t } );		
		props.setAttributes( { testimonial_cat: false } );
		props.setAttributes( { testimonial_cat_slider: false } );
		props.setAttributes( { testimonial_slider: false } );
		props.attributes.testimonial_slider = false;
		props.attributes.testimonial_cat_slider = false;
		props.attributes.testimonial_cat = false;
	}

	 jQuery('.sola_editor_controls input[type="checkbox"]').each(function(){
	  	//Find the calue of the pagination textbox
	  	if(jQuery('.select_pagination').find(".components-form-toggle__on").length > 0){ 
	  		props.attributes.testimonial_pagination_id = document.getElementById("select_all_testimonial_pagination_text").value;	
	  	}	
	  	});

	/* Is pro activated */

	//Pro is disabled
	if(is_pro_active.pro_active == 'false'){
		//disable the Pro features
		props.attributes.testimonial_slider = false;
		props.attributes.testimonial_cat = false;
		props.attributes.testimonial_cat_slider = false;

		//display label if Pro is disabled
		pro_label = el(
			'label',
			{ class: 'pro_only_label'
		  },
			'Pro Features'
		);

		//Add the Pro label to a div
		pro_features_div = el(
			'div',
			{ class: 'pro_only_div'
		  },
		  pro_label
		);
		

		//Categories Button
		categories_button = el( wp.components.ToggleControl, {
			testimonial_cat: props.attributes.testimonial_cat,
			label: "Display Categories",
			checked: props.attributes.testimonial_cat ,
			 onChange: onchangetestimonial_cat,
		 } );



		//Category Slider Button
		categories_button_slider = el( wp.components.ToggleControl, {
			testimonial_cat_slider: props.attributes.testimonial_cat_slider,
			label: "Display Categories in a Slider",
			checked: props.attributes.testimonial_cat_slider ,
			//  help: "This will display all testimonials with the Category ID",
			 onChange: onchangetestimonial_cat_slider,
		 } );

		//Slider Button
		slider_button = el( wp.components.ToggleControl, {
			testimonial_slider: props.attributes.testimonial_slider,
			label: "Slider",
			checked: props.attributes.testimonial_slider ,
			help: "This feature will display your testimonials in a slider",
			onChange: onChangeTestimonial_slider,
			disabled: true,
		});


		//Add Categories Button to a div
		categories_button_div = el(
			'div',
			{ 
				class: 'select_cat',
			
		  	},
		  	categories_button,
		);

		//Add Categories Slider Button to a div
		categories_button_div_slider = el(
			'div',
			{ 
				class: 'select_cat_slider'
			},
			categories_button_slider
		);
			 
		}

		//Pro is activated
	else{

		/* Pro functions */

		//Category button 
		function onchangetestimonial_cat(testimonial_cat_t) {			   
				props.setAttributes( { testimonial_cat: testimonial_cat_t } );				
				props.setAttributes( { testimonial_cat_slider: false } );
				props.setAttributes( { testimonial_pagination: false } );
				props.setAttributes( { testimonial_slider: false } );
				props.attributes.testimonial_cat_slider = false;
				props.attributes.testimonial_pagination = false;
				props.attributes.testimonial_slider = false;

		}

		//Category Slider button 
		function onchangetestimonial_cat_slider(testimonial_cat_t_slider) {
			props.setAttributes( { testimonial_cat_slider: testimonial_cat_t_slider } );		
			props.setAttributes( { testimonial_cat: false } );
			props.setAttributes( { testimonial_pagination: false } );
			props.setAttributes( { testimonial_slider: false } );
			props.attributes.testimonial_slider = false;
			props.attributes.testimonial_pagination = false;
			props.attributes.testimonial_cat = false;
		}

			//Slider button function
		function onChangeTestimonial_slider(testimonial_slider_t) {
			props.setAttributes( { testimonial_slider: testimonial_slider_t } );		
			props.setAttributes( { testimonial_cat: false } );
			props.setAttributes( { testimonial_pagination: false } );
			props.setAttributes( { testimonial_cat_slider: false } );
			props.attributes.testimonial_cat_slider = false;
			props.attributes.testimonial_pagination = false;
			props.attributes.testimonial_cat = false;

	 	}

		pro_features_div = el(
			'div',
			{ 
				class: 'pro_only_div'
			}
		);

		//Dislpay the testimonial category button
		categories_button = el( wp.components.ToggleControl, {
			testimonial_cat: props.attributes.testimonial_cat,
			label: "Display Categories",
			checked: !!props.attributes.testimonial_cat ,
			onChange: onchangetestimonial_cat,
			disabled: !props.attributes.testimonial_cat
		} );

		//Dislpay the category dropdown
		select_cat_dropdown = el( wp.components.SelectControl, {
			label: 'Please Select A Category',
			value: props.attributes.testimonial_cat_select_t,
			onChange: ( value ) => { props.setAttributes( { testimonial_cat_select_t: value } ); },
			options: display_categories,
			id: "button_toggle_cattt",
			disabled: !props.attributes.testimonial_cat,					 
		});
		 
		//Dislpay the testimonial slider category button
		categories_button_slider = el( wp.components.ToggleControl, {
			testimonial_cat_slider: props.attributes.testimonial_cat_slider,
			label: "Display Categories in a Slider",
			checked: !!props.attributes.testimonial_cat_slider ,
			onChange: onchangetestimonial_cat_slider,
			disabled: !props.attributes.testimonial_cat_slider
		});

		//Dislpay the testimonial slider category dropdown
		select_cat_slider_dropdown = el( wp.components.SelectControl, {
			label: 'Please Select A Category to display in a slider',
			value: props.attributes.testimonial_cat_select_t_slider,
			onChange: ( value ) => { props.setAttributes( { testimonial_cat_select_t_slider: value } ); },
			options: display_categories,
			id: "button_toggle_cattt_slider",
			disabled: !props.attributes.testimonial_cat_slider,
		});
			
		//Add the category dropdown to div
		categories_button_div_dropdown = el(
			'div',
				{ 
					class: 'select_cat_div_1'
				},
				select_cat_dropdown,
		);
					 
		//Adds the category button and dropdown to div	 
		categories_button_div = el(
			'div',
				{ 
					class: 'select_cat'
				},							 
			categories_button,
			categories_button_div_dropdown,							 
		);

		//Adds the category slider button and slider dropdown to div
		categories_button_div_slider = el(
			'div',
				{ 
					class: 'select_cat_slider'
				},
			categories_button_slider,
			select_cat_slider_dropdown								
		);

	//end of else
	}


	//Slider Button
	slider_button = el( wp.components.ToggleControl, {
		testimonial_slider: props.attributes.testimonial_slider,
		label: "Slider",
		checked: !!props.attributes.testimonial_slider ,
		help: "This feature will display your testimonials in a slider",
		onChange: onChangeTestimonial_slider,
		disabled: !props.attributes.testimonial_slider
	});
	  
	//adds the Button to a div
	slider_div = el(
		'div',
			{ 
				class: 'slider_div'
			},
		slider_button
	);
	
	//Pagination Button
	pagination_button = el( wp.components.ToggleControl, {
		testimonial_pagination: props.attributes.testimonial_pagination,
		label: "Pagination",
		checked: !!props.attributes.testimonial_pagination ,
		help: 'Display All Testimonials With Pagination',
		 onChange: onchangetestimonial_pagination_button,
		 disabled: !props.attributes.testimonial_pagination
	 } );

	 //Select number to display
	 select_pagination_textbox = el(
        'input',
        {
        	testimonial_pagination_id: props.attributes.testimonial_pagination_id, 
        	id: 'select_all_testimonial_pagination_text',
        	type: "number",
         	min: "1",
         	value: props.attributes.testimonial_pagination_id,
         	disabled: !props.attributes.testimonial_pagination,
         	onChange: ( value ) => { props.setAttributes( { testimonial_pagination_id: value } ); }
        },
	);

  	//Select number to display
  	pagination_div = el(
		'div',
			{ 
				class: 'select_pagination'
  			},
  		pagination_button,
	   	select_pagination_textbox
	);   
  
	//Alignment label
	alignment_bar_label = el(
		'label',
		{ class: 'advanced_setting_label'
	  },
		'Align Text'
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
			block: 'sola-t-all-testimonial-gutenberg-block/sola-t-all-testimonial-gutenberg-registration',
			attributes: props.attributes,
		} ),
		el( 'div', { className: props.className },
		add_controols_to_divs = el(
			
			InspectorControls,
			null,
			add_controols_to_divs_2 = el(PanelBody, {
				className: 'sola_editor_controls',
				title: 'Super Single Testimonial Settings',
				initialOpen: true,	
			},
			alignment_bar_label,
			alignment_bar,
			pagination_div,
			pro_features_div,
			slider_div,	
			categories_button_div,
			categories_button_div_slider
		)
	)   
		),
	];
	
	},
	save: function(props) {
		//return null because this is being rendered by PHP (includes/gutenberg-block/index.php)
		return null;
	}
});

