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
	var RangeControl = wp.components.RangeControl
	
	registerBlockType( 'gutenberg-extend/coverimage-block', {
		title: i18n.__( 'Cover Image' ),
		description: i18n.__( 'A Cover Image block for displaying cover image.' ),
		icon: 'format-image',
		category: 'gutenberg-extend',
		attributes: {
			mediaID: {
				type: 'number',
			},
			mediaURL: {
				type: 'string',
				source: 'attribute',
				selector: 'img',
				attribute: 'src',
			},
			contenttxt: {
				type: 'array',
				source: 'children',
				selector: 'p',
			},
			overlaycolor:{
				type: 'string',
				default: '#000000',
				selector: '.gutenberg-extend-overlay'
			},
			overlayOpacity:{
				type: 'number',
				default: 50,				
			},
			textcolor:{
				type: 'string',
				default: '#ffffff',
				selector: '.gutenberg-extend-cover-txt'
			},			
			textPosition:{
				type: 'string',
				default: 'middle',				
			},
			textTransform:{
				type: 'string',
				default: 'none',				
			},
			TxtFontSize: {
				type: 'number',
				default: 12,
			},
		},
		
		edit: function( props ) {
			var attributes = props.attributes
			var overlaycolor = props.attributes.overlaycolor
			var overlayOpacity = props.attributes.overlayOpacity			
			var textcolor = props.attributes.textcolor
			var textTransform = props.attributes.textTransform
			var TxtFontSize = props.attributes.TxtFontSize
			var contenttxt = props.attributes.contenttxt
			var textPosition = props.attributes.textPosition
			
			function onChangetextPosition( newtextPosition ) {
				props.setAttributes( { textPosition: newtextPosition } )
			}

			function onChangecontenttxt( newcontenttxt ) {
				props.setAttributes( { contenttxt: newcontenttxt } )
			}

			function onChangeoverlayOpacity( newoverlayOpacity ) {
				props.setAttributes( { overlayOpacity: newoverlayOpacity } )
			}

			function onChangeovrlycolor( newoverlaycolor ) {
				props.setAttributes( { overlaycolor: newoverlaycolor } )
			}

			function onChangetxtcolor( newtextcolor ) {
				props.setAttributes( { textcolor: newtextcolor } )
			}

			function onChangeTxtFontSize( newTxtFontSize ) {
				props.setAttributes( { TxtFontSize: newTxtFontSize } )
			}

			function onChangeTextTransform( newTextTransform ) {
				props.setAttributes( { textTransform: newTextTransform } )
			}
			
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					mediaURL: media.url,
					mediaID: media.id,
				} );
			};
			return [
				el( BlockControls, { key: 'controls' },
				el( 'div', { className: 'components-toolbar' },
							el( MediaUpload, {
								onSelect: onSelectImage,
								type: 'image',
								render: function( obj ) {
									return el( components.Button, {
										className: 'gutenberg-extend-img-icon',
										onClick: obj.open
										},
										el('div',{className: 'gutenberg-extend-img-icon'},
											el('i',{
											className:'fa fa-image'
											})
										)
									);
								}
							} )
						),
				),
				el( InspectorControls, { key: 'inspector' }, // Display the block options in the inspector panel.
					el( components.PanelBody, {
						title: i18n.__( 'Color Settings' ),
						className: 'cust-seting',
						initialOpen: false,					
						
					},
					
					
						el( 'p', {}, i18n.__( 'Apply Overlay Color.' ) ),
						el( ColorPalette, {
							value: overlaycolor, 
							colors: [{color: '#00d1b2', name: 'teal'},
									{ color: '#3373dc', name: 'royal blue' },
									{ color: '#209cef', name: 'sky blue' },
									{ color: '#22d25f', name: 'green' },
									{ color: '#ffdd57', name: 'yellow' },
									{ color: '#ff3860', name: 'pink' },
									{ color: '#7941b6', name: 'purple' },
									{ color: '#392F43', name: 'black' }], 
							allowCustom: false,
							onChange: onChangeovrlycolor,							
						}),
						el( 'p', {}, i18n.__( 'Apply Text Color.' ) ),
						el( ColorPalette, {
							value: textcolor, 
							colors: [{color: '#00d1b2', name: 'teal'},
									{ color: '#3373dc', name: 'royal blue' },
									{ color: '#209cef', name: 'sky blue' },
									{ color: '#22d25f', name: 'green' },
									{ color: '#ffdd57', name: 'yellow' },
									{ color: '#ff3860', name: 'pink' },
									{ color: '#7941b6', name: 'purple' },
									{ color: '#392F43', name: 'black' }], 
							allowCustom: false,
							onChange: onChangetxtcolor,							
						}),

						el( 'p', {}, i18n.__( 'Apply Background Opacity.' ) ),
						el( RangeControl, {
							value: overlayOpacity, 
							min: 10,
							max: 90,
							step:10,							
							onChange: onChangeoverlayOpacity,							
						}),

					),
					el( components.PanelBody, {
						title: i18n.__( 'Font Setting' ),
						className: 'cust-seting',
						initialOpen: false,
					},

						el( 'p', {}, i18n.__( 'Apply Content Position.' ) ),
						el( SelectControl, {							
							value: textPosition,
							onChange: onChangetextPosition,
							options: [
							  { value: 'middle', label: i18n.__( 'Middle' ) },
							  { value: 'right', label: i18n.__( 'Right' ) },
							  { value: 'left', label: i18n.__( 'Left' ) },
							],
						}),

						el( 'p', {}, i18n.__( 'Apply Content Font Size.' ) ),					
						el( RangeControl, {
							value: TxtFontSize, 
							min: 1,
							max: 40,
							onChange: onChangeTxtFontSize,							
						}),

						el( 'p', {}, i18n.__( 'Apply Content Text Transform.' ) ),					
						el( SelectControl, {							
							value: textTransform,
							onChange: onChangeTextTransform,
							options: [
							  { value: 'none', label: i18n.__( 'None' ) },
							  { value: 'capitalize', label: i18n.__( 'Capitalize' ) },
							  { value: 'uppercase', label: i18n.__( 'Uppercase' ) },
							  { value: 'lowercase', label: i18n.__( 'Lowercase' ) },
							],
						}),
					)
				),
				el( 'div', {className: props.className},
					el( 'div', {
						className: 'gutenberg-extend-cover-main',
					},
						el( MediaUpload, {
							onSelect: onSelectImage,
							type: 'image',
							value: attributes.mediaID,
							render: function( obj ) {
								return el( components.Button, {
									className: attributes.mediaID ? 'image-button' : 'button button-large gutenberg-extend-cover-upload-btn',
									onClick: obj.open
									},
									! attributes.mediaID ? i18n.__( 'Upload Image' ) : ''
								);
							}
						} ),
						el('div',{className:'gutenberg-extend-img-cover-box'},
							el( 'div', { className:'gutenberg-extend-img-cover-wrap position-img-' + textPosition, style:attributes.mediaID ? { backgroundImage: 'url(' + attributes.mediaURL + ')' } : {}},
								el( RichText, {
									key: 'editable',
									tagName: 'p',
									placeholder: 'Enter text here',
									keepPlaceholderOnFocus: true,
									value: contenttxt,
									className: 'gutenberg-extend-cover-txt',
									style: { color: textcolor, fontSize: TxtFontSize + 'px', textTransform: textTransform},
									onChange: onChangecontenttxt,
								} ),
							),
							el('div', {className: overlayOpacity == 50 ? 'gutenberg-extend-overlay' : 'gutenberg-extend-overlay opacity-' + overlayOpacity , style: {background: overlaycolor}}),
						)
						
					),
				)
			];
		
		},

		save: function( props ) {
			var attributes = props.attributes
			var mediaID = props.attributes.mediaID
			var mediaURL = props.attributes.mediaURL
			var contenttxt = props.attributes.contenttxt
			var overlaycolor = props.attributes.overlaycolor
			var overlayOpacity = props.attributes.overlayOpacity			
			var textcolor = props.attributes.textcolor
			var TxtFontSize = props.attributes.TxtFontSize
			var textTransform = props.attributes.textTransform
			var textPosition = props.attributes.textPosition
			
			
			return el( 'div', {className: props.className},
						el('div',{
							className: 'gutenberg-extend-cover-main',
							},
							el('div',{className: 'gutenberg-extend-img-cover-box'},
								el('img',{ src: mediaURL}),
								el( 'div', { className:'gutenberg-extend-img-cover-wrap position-img-' + textPosition, style: mediaID ? { backgroundImage: 'url(' + mediaURL + ')' } : {}},
									el( RichText.Content, {
										tagName: 'p',
										value:  contenttxt,
										className: 'gutenberg-extend-cover-txt',
										style:{color:textcolor, fontSize: TxtFontSize + 'px', textTransform: textTransform},
									} ),
								),
								el('div',{className: overlayOpacity == 50 ? 'gutenberg-extend-overlay' : 'gutenberg-extend-overlay opacity-' + overlayOpacity, style:{background: overlaycolor}}),
							)
						)
					);
		},		
	});
	
} )(
	window.wp.blocks,
	window.wp.editor,
	window.wp.components,
	window.wp.i18n,
	window.wp.element,
);