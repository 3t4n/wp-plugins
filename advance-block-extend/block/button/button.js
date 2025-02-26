( function( blocks, editor, components, i18n, element ) {
	
	var el = element.createElement
	var registerBlockType = wp.blocks.registerBlockType
	var RichText = wp.editor.RichText
	var BlockControls = wp.editor.BlockControls
	var AlignmentToolbar = wp.editor.AlignmentToolbar
	var MediaUpload = wp.editor.MediaUpload
	var InspectorControls = wp.editor.InspectorControls
	var TextControl = wp.components.TextControl
	var ColorPalette= wp.components.ColorPalette
	var SelectControl = wp.components.SelectControl
	var ToggleControl= wp.components.ToggleControl
	var RangeControl= wp.components.RangeControl

	registerBlockType( 'gutenberg-extend/button-block', {
		title: i18n.__( 'Button Block' ),
		description: i18n.__( 'Add a customizable button.' ),
		icon: 'editor-removeformatting',
		category: 'gutenberg-extend',
		attributes: {
			alignment: {
				type: 'string',
				default: 'center',
			},
			Button_txt:{
				type: 'string',
				default: 'Click here',
			},
			button_style:{
				type: 'string',
				default: 'btn-default-style',
			},
			button_size:{
				type: 'string',
				default: 'btn-medium-size',
			},
			ButtonBorderwidth: {
				type: 'number',
				default: 1,
			},
			ButtonBgColor: {
				type: 'string',
				default: '#000000',
			},
			ButtontxtColor: {
				type: 'string',
				default: '#ffffff',
			},
			ButtonBorderColor: {
				type: 'string',
				default: '#ffffff',
			},
			button_target:{
				type: 'boolean',
				default:false,
			},
			Button_action:{
				type: 'url',
			},
		},
		
		edit: function( props ) {
			var attributes = props.attributes
			var alignment = props.attributes.alignment
			var button_style= props.attributes.button_style
			var button_size= props.attributes.button_size
			var ButtonBorderwidth= props.attributes.ButtonBorderwidth
			
		
			function onChangeAlignment( newAlignment ) {
				props.setAttributes( { alignment: newAlignment } )
			}
			function onChangeButton_style( btn_style ) {
				props.setAttributes( { button_style: btn_style } )
			}
			function onChangeButton_size( btn_size ) {
				props.setAttributes( { button_size: btn_size } )
			}
			function onChangeButton_width( btn_width ) {
				props.setAttributes( { ButtonBorderwidth: btn_width } )
			}
			return [
				el( BlockControls, { key: 'controls' },
					el( AlignmentToolbar, {
						value: alignment,
						onChange: onChangeAlignment,
					} )
				),
				el( InspectorControls, { key: 'inspector' },
					el( components.PanelBody, {
							title: i18n.__( 'Button Block Setting' ),
							initialOpen: true,
							className:'gutenberg-extend-button-setting-common',
						},
					
						el(ToggleControl,{
								label: i18n.__( 'Enable New Window' ),
								checked: props.attributes.button_target,
								onChange: function( btnTarget ) {
									props.setAttributes( { button_target: btnTarget } )
								},
						}),
						el( TextControl, {
							type: 'url',
							label: i18n.__( 'Button Action URL' ),
							value: props.attributes.Button_action,
							onChange: function( btn_action ) {
								props.setAttributes( { Button_action: btn_action } )
							},
						}),
						el( SelectControl, {
								type: 'number',
								label: i18n.__( 'Select Button Style' ),
								value: button_style,
								onChange: onChangeButton_style,
								options: [
								  { value: 'btn-square-style', label: i18n.__( 'Square' ) },
								  { value: 'btn-default-style', label: i18n.__( 'Rounded Square' ) },
								  { value: 'btn-circle-style', label: i18n.__( 'Circular' ) },
								],
							}
						),
						el( SelectControl, {
								type: 'number',
								label: i18n.__( 'Select Button Size' ),
								value: button_size,
								onChange: onChangeButton_size,
								options: [
								  { value: 'btn-small-size', label: i18n.__( 'Small' ) },
								  { value: 'btn-medium-size', label: i18n.__( 'Medium' ) },
								  { value: 'btn-large-size', label: i18n.__( 'Large' ) },
								  { value: 'btn-extra-large-size', label: i18n.__( 'Extra Large' ) },
								],
							}
						),
						el( RangeControl, {								
								label: i18n.__( 'Choose Button Width' ),
								value: ButtonBorderwidth,
								min: 1,
								max: 10,
								onChange: onChangeButton_width,								
							}
						),
						el( 'p', {}, i18n.__( 'Change Button Background Color.' ) ),
						el( ColorPalette, {
								value: props.attributes.ButtonBgColor, 
								colors: [{color: '#00d1b2', name: 'teal'},
										{ color: '#3373dc', name: 'royal blue' },
										{ color: '#209cef', name: 'sky blue' },
										{ color: '#22d25f', name: 'green' },
										{ color: '#ffdd57', name: 'yellow' },
										{ color: '#ff3860', name: 'pink' },
										{ color: '#7941b6', name: 'purple' },
										{ color: '#392F43', name: 'black' }], 
								allowCustom: false,
								onChange: function(BtnBgColor){
										props.setAttributes( { ButtonBgColor: BtnBgColor } )
									}
						}),
						el( 'p', {}, i18n.__( 'Change Button Border Color.' ) ),
						el( ColorPalette, {
								value: props.attributes.ButtonBorderColor, 
								colors: [{color: '#00d1b2', name: 'teal'},
										{ color: '#3373dc', name: 'royal blue' },
										{ color: '#209cef', name: 'sky blue' },
										{ color: '#22d25f', name: 'green' },
										{ color: '#ffdd57', name: 'yellow' },
										{ color: '#ff3860', name: 'pink' },
										{ color: '#7941b6', name: 'purple' },
										{ color: '#392F43', name: 'black' }], 
								allowCustom: false,
								onChange: function(BtnBordrColor){
										props.setAttributes( { ButtonBorderColor: BtnBordrColor } )
									}
						}),
						el( 'p', {}, i18n.__( 'Change Button Text Color.' ) ),
						el( ColorPalette, {
								value: props.attributes.ButtontxtColor, 
								colors: [{color: '#00d1b2', name: 'teal'},
										{ color: '#3373dc', name: 'royal blue' },
										{ color: '#209cef', name: 'sky blue' },
										{ color: '#22d25f', name: 'green' },
										{ color: '#ffdd57', name: 'yellow' },
										{ color: '#ff3860', name: 'pink' },
										{ color: '#7941b6', name: 'purple' },
										{ color: '#392F43', name: 'black' }], 
								allowCustom: false,
								onChange: function(BtntxtColor){
										props.setAttributes( { ButtontxtColor: BtntxtColor } )
									}
						}),
					),
				),
				el('div',{className: props.className},
					el('div',{className: 'button-box-wrap', style: { textAlign: alignment}},
						el('div',{
							className: button_size + ' button-box ' + button_style
							},
							el( RichText, {
								key: 'editable',
								tagName: 'a',
								value: attributes.Button_txt,
								href: attributes.Button_action,
								target: attributes.button_target ? '_blank' : '_self',
								style:{color:attributes.ButtontxtColor, background: attributes.ButtonBgColor, border: ButtonBorderwidth + 'px solid ' + attributes.ButtonBorderColor },
								onChange: function( btn_txt ) {
									props.setAttributes( { Button_txt: btn_txt } )
								},
							}),
						),
					),
				)
			];
		
		},

		save: function( props ) {
			var attributes = props.attributes
			var alignment = props.attributes.alignment
			var Button_txt= props.attributes.Button_txt
			var button_style= props.attributes.button_style
			var button_size= props.attributes.button_size
			var ButtonBgColor= props.attributes.ButtonBgColor
			var ButtontxtColor= props.attributes.ButtontxtColor
			var ButtonBorderColor= props.attributes.ButtonBorderColor
			var Button_action= props.attributes.Button_action
			var button_target= props.attributes.button_target
			var ButtonBorderwidth= props.attributes.ButtonBorderwidth

			return el('div',{className: props.className},
						el('div',{className: 'button-box-wrap', style: { textAlign: alignment}},
							el('div',{
								className: button_size + ' button-box ' + button_style
								},
								el( RichText.Content, {
									tagName: 'a',
									href: Button_action,
									target: button_target ? '_blank' : '_self',
									value: Button_txt,
									style: {color: ButtontxtColor, background: ButtonBgColor, border: ButtonBorderwidth + 'px solid ' + ButtonBorderColor },
								})
							)
						)
					)
		},		
	});
	
} )(
	window.wp.blocks,
	window.wp.editor,
	window.wp.components,
	window.wp.i18n,
	window.wp.element,
);