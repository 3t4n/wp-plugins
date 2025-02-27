
(function( blocks, element, components, i18n, wp) {
	const blockEditor = wp.blockEditor;
	const useBlockProps = blockEditor.useBlockProps;
	const InspectorControls = blockEditor.InspectorControls;
	const PanelBody = components.PanelBody;
	const ServerSideRender = wp.serverSideRender,


	CFRGutenberg = function(){
		blocks.registerBlockType('contact-form-ready/cfr-gutenberg-block', this.getDefinition());
	}

	CFRGutenberg.prototype.getDefinition = function(){
		return {
			attributes : this.getAttributes(),
			edit : (props) => {
				return this.onEdit(props);
			},
			save : (props) => { 
				const blockProps = useBlockProps.save();
				return null; 
			}
		};
	}

	CFRGutenberg.prototype.getAttributes = function(){
		return {
			cfid : {type : 'string'},
			alignment: {type : 'string'}
		}
	}

	CFRGutenberg.prototype.onEdit = function(props){
		const inspector = this.getInspector(props);
		const preview = this.getPreview(props);

		return [
			inspector,
			preview
		];
	}

	CFRGutenberg.prototype.getInspector = function(props){
		let inspector = [];
		if(!!props.isSelected){
			let panel = React.createElement(
				InspectorControls,
				{ key: "inspector" },
				React.createElement(
					PanelBody,
					{ title: wp.i18n.__('Settings') },
					React.createElement(wp.components.SelectControl, {
						name: "cfid",
						label: wp.i18n.__("Form"),
						value: props.attributes.cfid || "",
						options: this.getFormOptions(),
						onChange: (value) => {
							props.setAttributes({cfid : value});
						}
					}),
					React.createElement(wp.components.SelectControl, {
						name: 'alignment',
						label: wp.i18n.__('Alignment'),
						value: props.attributes.alignment || "",
						options: [
							{
								key: "left",
								value: "left",
								label: wp.i18n.__('Left')
							},
							{
								key: "center",
								value: "center",
								label: wp.i18n.__('Center')
							},
							{
								key: "right",
								value: "right",
								label: wp.i18n.__('Right')
							}
						],
						onChange: (value) => {
							props.setAttributes({alignment : value});
						}
					})
				)
			);

			inspector.push(panel);
		}
		return inspector;
	}

	CFRGutenberg.prototype.getPreview = function(props){
		let preview = [];

		let blockProps = useBlockProps({
			key: 'cfr-preview',
			className: props.className + " cfr-preview-block"
		});

		let serverSide = React.createElement(
			ServerSideRender,
			{
				key: "preview", 
				block: 'contact-form-ready/cfr-gutenberg-block',
				attributes: props.attributes
			}
		);

		let wrapper = React.createElement('div', {...blockProps}, serverSide);

		preview.push(wrapper);

		return preview;
	}

	CFRGutenberg.prototype.getFormOptions = function(){
		let data = [];

		data.push({
			key: "",
			value: "",
			label: wp.i18n.__('Please choose a form')
		});

		cfr_localized_forms.forEach(function (el) {
			data.push({
				key: el.value,
				value: el.value,
				label: el.label + " (" + el.value + ")"
			});
		});

		return data;
	}

	const cfrGutenberg = new CFRGutenberg();
	
})( window.wp.blocks, window.wp.element, window.wp.components, window.wp.i18n, window.wp);