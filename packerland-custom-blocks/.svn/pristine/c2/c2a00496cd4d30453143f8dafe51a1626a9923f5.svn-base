(function(blocks, editor, components, i18n, element, wp, jQuery) {

    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var BlockControls = editor.BlockControls;
    var AlignmentToolbar = editor.AlignmentToolbar;
    var MediaUpload = editor.MediaUpload;
    var RichText = editor.RichText;
    var InspectorControls = editor.InspectorControls;
    var TextControl = components.TextControl;
	var SelectControl = components.SelectControl;


    registerBlockType('pcb/advanced-facebook-feed', {
        title: i18n.__('Advanced Facebook Feed'),
        description: i18n.__('A Easy Way To Add Your Facebook Feed'),
        icon: 'facebook',
        keywords: [i18n.__('pdf'), i18n.__('viewer'), i18n.__('reader')],
        category: 'pcb-category',
		example: {
			attributes: {
				content: i18n.__('https://www.facebook.com/facebook'),
			},
		},
        attributes: {
			
            content: {
                type: 'html',
				default: "https://www.facebook.com/facebook",
            },
			
			height: {
                type: 'string',
				default: "500",
            },
			
			width: {
                type: 'string',
				default: "340",
            },
			
			smallHeader: {
                type: 'string',
				default: "false",
            },
			
			adaptContainerWidth: {
                type: 'string',
				default: "true",
            },
			
			tabs: {
                type: 'string',
				default: "timeline",
            },
			
			hideCover: {
                type: 'string',
				default: "false",
            },
			
			hideCta: {
                type: 'string',
				default: "false",
            },
			
			showFacePile: {
                type: 'string',
				default: "true",
            },
        },

        edit: function(props) {
            var attributes = props.attributes;
            var content = props.attributes.content;
            var width = props.attributes.width;
            var height = props.attributes.height;
            var smallHeader = props.attributes.smallHeader;
			var adaptContainerWidth = props.attributes.adaptContainerWidth;
            var tabs = props.attributes.tabs;
			var hideCover = props.attributes.hideCover;
			var hideCta = props.attributes.hideCta;
			var showFacePile = props.attributes.showFacePile;
			
			const onChangeWidth = newWidth => {
				props.setAttributes( { width: newWidth.target.value })
			}
			
			const onChangeHeight = newHeight => {
				props.setAttributes( { height: newHeight.target.value })
			}
			
			const onChangeContent = newContent => {
				props.setAttributes( { content: newContent.target.value })
			}

            return [
                el(
                    InspectorControls, { key: 'inspector' },
                    el(
                        components.PanelBody, {
                            title: i18n.__('Advanced Facebook Feed'),
                            className: 'block-packerland-advanced-facebook-feed',
                            initialOpen: false
                        },
                        el('p', {}, i18n.__('Just Paste The Url Of Your Facebook Page In The Input.')),						
                    ),
					 el(
                        components.PanelBody, {
                            title: i18n.__('Options'),
                            className: 'block-packerland-advanced-facebook-feed',
                            initialOpen: true
                        },
						el('label', {}, "Width (Min 180 & Max 500): "),
                        el('input', {
								value: width, 
								class: "pcb-admin_block_menu_input",
								onChange: onChangeWidth,
						} ),
						el('label', {}, "Height (Min 70): "),
                        el('input', {
								value: height, 
								class: "pcb-admin_block_menu_input",
								onChange: onChangeHeight,
						} ), 
						 
                        el( SelectControl,
							{
								label: 'Shown Tab',
								options : [
									{ label: 'Timeline', value: 'timeline' },
									{ label: 'Events', value: 'events' },
									{ label: 'Messages', value: 'messages' },
								],
								onChange: ( value ) => {
									props.setAttributes( { tabs: value } );
								},
								value: props.attributes.tabs
							}
						),  
						 
						 el( SelectControl,
							{
								label: 'Show Cover (Hide cover photo in the header)',
								options : [
									{ label: 'Yes', value: 'true' },
									{ label: 'No', value: 'false' },
								],
								onChange: ( value ) => {
									props.setAttributes( { hideCover: value } );
								},
								value: props.attributes.hideCover
							}
						), 
						 
						 el( SelectControl,
							{
								label: 'Show Facepile (Show profile photos when friends like this)',
								options : [
									{ label: 'Yes', value: 'true' },
									{ label: 'No', value: 'false' },
								],
								onChange: ( value ) => {
									props.setAttributes( { showFacePile: value } );
								},
								value: props.attributes.showFacePile
							}
						), 
						 
						  el( SelectControl,
							{
								label: 'Show CTA (Hide the custom call to action button if available)',
								options : [
									{ label: 'Yes', value: 'true' },
									{ label: 'No', value: 'false' },
								],
								onChange: ( value ) => {
									props.setAttributes( { hideCta: value } );
								},
								value: props.attributes.hideCta
							}
						), 
						 
						 el( SelectControl,
							{
								label: 'Small Header (Use the small header instead)',
								options : [
									{ label: 'Yes', value: 'true' },
									{ label: 'No', value: 'false' },
								],
								onChange: ( value ) => {
									props.setAttributes( { smallHeader: value } );
								},
								value: props.attributes.smallHeader
							}
						),  
						 
						  el( SelectControl,
							{
								label: 'Adapt Container Width (Try to fit inside the container width)',
								options : [
									{ label: 'Yes', value: 'true' },
									{ label: 'No', value: 'false' },
								],
								onChange: ( value ) => {
									props.setAttributes( { adaptContainerWidth: value } );
								},
								value: props.attributes.adaptContainerWidth
							}
						),  
                    ),
                ),
                el(
                    'div', { className: "components-placeholder wp-block-embed pcb-floating-input" },
					
						el('div', {className: "components-placeholder__label"}, 
						  	"Packerland Websites Advanced Facebook Feed",
						  ),
					
						el('div', {className: "components-placeholder__fieldset"}, 
						  el('form', { className: "pcb-admin-form"}, 
							 el(
								'input', {
									
									className: "pcb-admin-form__input", 
									value: content, 
									onChange: onChangeContent,
								},

								),
							)
						  ),

                ),
				 
            ]
        },

        save: function(props) {
            var attributes = props.attributes
            var content = props.attributes.content
            var width = props.attributes.width
            var height = props.attributes.height
            var smallHeader = props.attributes.smallHeader
			var adaptContainerWidth = props.attributes.adaptContainerWidth
            var tabs = props.attributes.tabs
			var hideCover = props.attributes.hideCover
			var hideCta = props.attributes.hideCta
			var showFacePile = props.attributes.showFacePile

            return (
                el(
                    'div', {
                        className: "fb-page",
						"data-href": content,
						"data-tabs": tabs,
						"data-height": height,
						"data-width" : width,
						"data-small-header": smallHeader,
						"data-adapt-container-width": adaptContainerWidth,
						"data-hide-cover": hideCover,
						"data-show-facepile": showFacePile,
                    }, 
					el("blockqoute", {className: "fb-xfbml-parse-ignore", "cite": content}, 
					   el("a", {className: "packerland-facebook-feed", href: content }, "Facebook Title"),
					  ),
                )
            )
        }

    })

})(
    window.wp.blocks,
    window.wp.editor,
    window.wp.components,
    window.wp.i18n,
    window.wp.element, 
	jQuery
)