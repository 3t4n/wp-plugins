/**
 * Block dependencies
 */

 import icon from './icon';
import './style.scss';

const { registerBlockType } = wp.blocks; //Blocks API
const { createElement } = wp.element; //React.createElement
const { __ } = wp.i18n; //translation functions
const { InspectorControls } = wp.blockEditor; //Block inspector wrapper
const { TextControl, PanelBody, SelectControl, RangeControl, ToggleControl } = wp.components;
const { serverSideRender } = wp; 
let { showcols, showparents, showtaxonomy } = Boolean;
showcols, showparents = false; 
showtaxonomy = true;


registerBlockType('osomblocks/cpt-list', {
	title: __('Osom Custom Post Type Block'),
	category: __('osomblocks'),
	description: __('Display a list layout of custom post type archives.', 'osomblocks'),
	keywords: ['cpt', 'custom post type', 'osom', __('custom post type')],
	icon: {
		background: 'rgba(255, 255, 255)',
		src: icon,
	}, 
	attributes: {
		numposts: {
			type: 'String',
			default: 3,
		},
		cpt: { 
			default: 'post',  
			type: 'String', 
		},
		moretext: {
			type: 'String',
			default: __('Continue reading'),
		},
		featuredimg: {
			type: 'Boolean',
			default: 'true',
		},
		heading: {
			type: 'String',
			default: 'h3',
		},
		showexcerpt: {
			type: 'Boolean',
			default: true,
		},
		gridformat: {
			type: 'Boolean',
			default: false,
		},
		numcols: { 
			type: 'Number',
			default: 3,
		},
		showparent: {
			type: 'Boolean',
			default: false,
		},
		pagination: {
			type: 'Boolean',
			default: false,
		},
		sticky: {
			type: 'Boolean',
			default: false,
		},  
		category: {
			type: 'String',
			default: '',
		},   
		tax: {
			type: 'String',
			default: '',
		},   

	},

	
	edit(props) {
		const attributes = props.attributes; 
		const setAttributes = props.setAttributes;
		const className = props.className;    
		var postTypes = wp.data.select('core').getPostTypes( { per_page: -1});
		let choices = [];
		let filled = false;
		let excluded = ['attachment', 'wp_block', 'genesis_custom_block'];
		choices.push({ value: 0, label: __('Select a post type', 'osomblocks') });
	
		wp.data.subscribe(() => {
	
			postTypes = wp.data.select('core').getPostTypes( { per_page: -1});

				if (postTypes &&!filled) {
					
					 postTypes.forEach(postTypes => {
						if(!excluded.includes(postTypes.slug)) choices.push({ value: postTypes.slug, label: postTypes.slug });
					});
					filled = true;
				} 
		});

		if (postTypes &&!filled) { 
			 postTypes.forEach(postTypes => {
				if(!excluded.includes(postTypes.slug)) choices.push({ value: postTypes.slug, label: postTypes.slug });
			});
			filled = true;
		} 
		 
		return createElement('div', {}, [
			createElement(serverSideRender, {
				block: 'osomblocks/cpt-list',
				attributes: attributes,
				className: className, 
			}),  
			
			createElement(InspectorControls, {},
				[

					createElement(PanelBody, {
						title: __('OsomBlock Properties', 'osomblocks'),
						initialOpen: true
					},

						createElement(SelectControl, {
							value: attributes.cpt,
							label: __('Select a post type', 'osomblocks'), 
							options: choices,
							onChange: (value) => {
								props.setAttributes({ cpt: value });

								postTypes.forEach(postTypes => {
									if(postTypes.slug == value){
									    if(postTypes.hierarchical) {
												showparents=true;
											} else {
												showparents = false;
												props.setAttributes({ showparent: false });
											}
										}
									if(value=='post') {
										showtaxonomy = true;
									} else {
										showtaxonomy = false;
										props.setAttributes({ category: '' });
										props.setAttributes({ tax: '' });
									}
								}) 
							}, 

						}), 

						showtaxonomy && createElement(TextControl, { 
							value: attributes.category,
							label: __('Category', 'osomblocks'),
							help: __('Keep blank for no filter. Comma-separated for more values', 'osomblocks'),
							onChange: (value) => {
								props.setAttributes({ category: value });
							},
							type: 'text',
						}),

						showtaxonomy && createElement(TextControl, { 
							value: attributes.tax,
							label: __('Tags', 'osomblocks'),
							help: __('Keep blank for no filter. Comma-separated for more values', 'osomblocks'),
							onChange: (value) => {
								props.setAttributes({ tax: value });
							},
							type: 'text',
						}),

						createElement(RangeControl, {
							label: __('Number of posts', 'osomblocks'),
							value: attributes.numposts,
							onChange: (value) => {
								props.setAttributes({ numposts: value });
							},
							initialPosition: 3,
							min: 1,
							max: 20,
							type: 'Number',
						}),

						createElement(ToggleControl, {
							label: __('Show featured image', 'osomblocks'),
							checked: attributes.featuredimg,
							onChange: (checked) => {
								props.setAttributes({ featuredimg: checked });
							},
							type: 'Boolean',
						}),

						createElement(ToggleControl, {
							label: __('Show excerpt', 'osomblocks'),
							checked: attributes.showexcerpt,
							onChange: (checked) => {
								props.setAttributes({ showexcerpt: checked });
							},
							type: 'Boolean',
						}),

						createElement(ToggleControl, {
							label: __('Show in grid', 'osomblocks'),
							checked: attributes.gridformat,
							onChange: (checked) => {
								props.setAttributes({ gridformat: checked });  
								if(checked) { showcols=true; } else { showcols = false; }
						
							},
							type: 'Boolean',
						}), 

						showcols && createElement(RangeControl, {
							label: __('Number of columns', 'osomblocks'),
							value: attributes.numcols,
							onChange: (value) => {
								props.setAttributes({ numcols: value });
							},
							initialPosition: 3,
							min: 1,
							max: 10,
							type: 'Number',
						}),

						createElement(SelectControl, {
							value: attributes.heading,
							label: __('Heading'),
							onChange: (value) => {
								props.setAttributes({ heading: value });
							},
							options: [
								{ value: 'h2', label: 'H2' },
								{ value: 'h3', label: 'H3' },
								{ value: 'h4', label: 'H4' },
							],
							type: 'text',
						}),

						createElement(TextControl, {
							value: attributes.moretext,
							label: __('Text for continue reading', 'osomblocks'),
							onChange: (value) => {
								props.setAttributes({ moretext: value });
							},
							type: 'text',
						}),

						
						showparents && 
						createElement(ToggleControl, {
							label: __('Show only parent pages', 'osomblocks'),
							checked: attributes.showparent,
							onChange: (checked) => {
								props.setAttributes({ showparent: checked });
							}, 
							type: 'Boolean',
						}),
						 
					
						createElement(ToggleControl, {
							label: __('Show pagination', 'osomblocks'),
							checked: attributes.pagination,
							onChange: (checked) => {
								props.setAttributes({ pagination: checked });
							},
							type: 'Boolean',
						}),
						
						!showparents && createElement(ToggleControl, {
							label: __('Ignore sticky posts', 'osomblocks'),
							checked: attributes.sticky,
							onChange: (checked) => {
								props.setAttributes({ sticky: checked });
							},
							type: 'Boolean',
						}),

					),
				]
			),
				
	
		])

	},
	

	save() {
		return null;
	}
});

