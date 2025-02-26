(function() {
		var elm = wp.element.createElement;
		var deferredGenerateQueue = {};
		var instructionsInfoHtml = null;
		var settingsSaveTimeout = null;
		
		function DelayedImage(props) {
			return [
				elm(
					'div',
					{
						key: 'overlay',
						className: 'wpz-aiilg-notice ' + (props.isDownloading ? 'wpz-aiilg-uploading' : 'wpz-aiilg-loading'),
						style: { display: 'none' }
					},
					[
						elm(
							'svg',
							{
								viewBox: '0 0 64.989 64.724',
								xmlns: 'http://www.w3.org/2000/svg',
								xmlnsXlink: 'http://www.w3.org/1999/xlink',
								width: '64.989',
								height: '64.724',
								key: 'logo',
								className: 'wpz-aiilg-notice-logo',
								alt: wp.i18n.__('WP Zone logo', 'wpz-ai-image-lab')
							},
							elm('defs', null,
								elm('clipPath', { key: 'cp1', id: 'cp1' },
									elm('path', {
										d: 'M57.957,18.589a24.688,24.688,0,0,1-4.116,17.592c-.2.255-.724.913-1.159,1.372L39.562,50.616a10.007,10.007,0,0,1-7.121,2.95h-.015a10,10,0,0,1-6.064-2.053c4.516,3.841,9.015,6.992,15.354,6.135,4.716-.637,10.458-4,13.648-7.058l3.928-3.928a19.763,19.763,0,0,0,2.726-24.309l.045.031-.211-.3c-.275-.423-.572-.835-.882-1.24-.922-1.288-2.264-3.138-3.382-4.58Z',
										fill: 'none'
									})
								),
								elm('linearGradient', { key: 'lg1', id: 'lg1', x1: '-0.652', y1: '1.148', x2: '-0.628', y2: '1.148', gradientUnits: 'objectBoundingBox' },
									elm('stop', { offset: '0', stopColor: '#992fec' }),
									elm('stop', { offset: '0.405', stopColor: '#962ee9' }),
									elm('stop', { offset: '0.6', stopColor: '#8f2be2' }),
									elm('stop', { offset: '0.75', stopColor: '#8227d5' }),
									elm('stop', { offset: '0.876', stopColor: '#6f21c2' }),
									elm('stop', { offset: '0.987', stopColor: '#5819ab' }),
									elm('stop', { offset: '1', stopColor: '#5518a8' })
								),
								elm('clipPath', { key: 'cp2', id: 'cp2' },
									elm('path', {
										d: 'M22.228,7.421c-4.716.638-9.413,3.654-12.6,6.714L5.7,18.064A19.762,19.762,0,0,0,2.971,42.373l-.045-.031.211.3c.275.423.571.835.882,1.24.922,1.288,2.264,3.137,3.382,4.579l-.369-2.325a24.689,24.689,0,0,1,4.116-17.592c.2-.255.724-.913,1.159-1.372L25.427,14.11a10,10,0,0,1,7.122-2.95h.014a9.984,9.984,0,0,1,6.064,2.053c-3.964-3.372-8.72-5.947-14.109-5.947a17.054,17.054,0,0,0-2.29.155',
										fill: 'none'
									})
								),
								elm('linearGradient', { key: 'lg2', id: 'lg2', x1: '0.044', y1: '1.395', x2: '0.069', y2: '1.395', gradientUnits: 'objectBoundingBox' },
									elm('stop', { offset: '0', stopColor: '#ec8444' }),
									elm('stop', { offset: '0.277', stopColor: '#e88142' }),
									elm('stop', { offset: '0.504', stopColor: '#de7a3e' }),
									elm('stop', { offset: '0.713', stopColor: '#cd6e37' }),
									elm('stop', { offset: '0.91', stopColor: '#b55d2e' }),
									elm('stop', { offset: '1', stopColor: '#a85429' })
								),
								elm('clipPath', { key: 'cp3', id: 'cp3' },
									elm('rect', { width: '64.989', height: '64.724', transform: 'translate(0 0.001)', fill: 'none' })
								)
							),
							elm('g', { key: 'g1', transform: 'translate(0 0)' },
								elm('g', { key: 'g1' },
									elm('g', { 'clipPath': 'url(#cp1)' },
										elm('rect', { width: '40.413', height: '42.241', transform: 'translate(26.362 16.264)', fill: 'url(#lg1)' })
									)
								),
								elm('g', { key: 'g2' },
									elm('g', { 'clipPath': 'url(#cp2)' },
										elm('rect', { width: '40.413', height: '41.195', transform: 'translate(-1.786 7.266)', fill: 'url(#lg2)' })
									)
								),
								elm('g', { key: 'g3' },
									elm('g', { 'clipPath': 'url(#cp3)' },
										elm('path', { d: 'M17.384,58.463A21.089,21.089,0,0,0,32.41,64.725h.031a21.09,21.09,0,0,0,15.011-6.218L54.858,51.1l0,0,.508-.509a21.731,21.731,0,0,1-29,.923h0A10.281,10.281,0,0,1,25.3,50.6a10.091,10.091,0,0,1,.02-14.223L36.34,25.35a5.58,5.58,0,0,0-7.89-7.892L17.428,28.482a21.266,21.266,0,0,0-.044,29.981', fill: '#a43dff' }),
										elm('path', { d: 'M47.6,6.262A21.089,21.089,0,0,0,32.579,0h-.031A21.09,21.09,0,0,0,17.537,6.218l-7.406,7.406,0,0-.508.509a21.731,21.731,0,0,1,29-.923h0a10.281,10.281,0,0,1,1.066.919,10.091,10.091,0,0,1-.02,14.223L28.649,39.375a5.579,5.579,0,1,0,7.89,7.891L47.561,36.243A21.266,21.266,0,0,0,47.6,6.262', fill: '#fd925c' })
									)
								)
							)
						),
						elm(
							wp.components.Tooltip,
							{
								key: 'text-loading-tooltip',
								position: 'top right',
								text: wp.i18n.__('Generating images typically takes up to a minute. If it takes longer than three minutes, please try your request again later.', 'wpz-ai-image-lab'),
								delay: 0
							},
							elm(
								'span',
								{
									key: 'text-loading',
									className: 'wpz-aiilg-notice-loading',

								},
								wp.i18n.__('Loading...', 'wpz-ai-image-lab'),
							)
						),
						elm(
							wp.components.Tooltip,
							{
								key: 'text-uploading-tooltip',
								position: 'top right',
								text: wp.i18n.__('Uploading an image can take a bit, especially for high resolution images.', 'wpz-ai-image-lab'),
								delay: 0
							},
							elm(
								'span',
								{
									key: 'text-uploading',
									className: 'wpz-aiilg-notice-uploading',
								},
								wp.i18n.__('Uploading...', 'wpz-ai-image-lab')
							)
						),
					]
				),
				props.src ? elm ('div',
					{
						key: 'img-wrapper',
						className: 'wpz-aiilg-preview-image-wrapper'
					},
					elm(
					'img',
					{
						key: 'img',
						src: props.src,
						alt: props.alt,
						className: props.className + ' hidden',
						width: props.width,
						height: props.height,
						onLoad: function(ev) {
							jQuery(ev.target).removeClass('hidden').parent().prev('.wpz-aiilg-notice').removeClass('wpz-aiilg-loading');
							if (props.onLoad) {
								props.onLoad(ev);
							}
						},
						onError: function(ev) {
							var img = ev.target;
							if (img.isConnected) {
								setTimeout(function() {
									img.src = img.src;
								}, 1000);
							}
						}
					}
					)
				): null
			]
		}
		
		wp.blocks.registerBlockType(
			'wpz-aiil/image',
			{
				icon: elm(
					'svg',
					{
						viewBox: '0 0 47.9 38.9',
						xmlns: 'http://www.w3.org/2000/svg'
					},
					elm(
						'g',
						null,
						elm(
							'path',
							{
								style: { fill: '#fc915c' },
								d: 'm28.92,21.86l-13.14,13.14h-5.56l8.38-8.3c.77-.76.77-2,0-2.76-.76-.75-1.98-.75-2.74,0l-12.6,12.48c1.72,1.54,3.99,2.49,6.47,2.49h7.67l13.78-13.78,9.37,9.37c-.73.33-1.53.51-2.38.51h-11.36l-3.9,3.9h15.26c3.35,0,6.31-1.7,8.06-4.29l-12.8-12.75c-1.24-1.24-3.27-1.24-4.52,0ZM38.17,0h-9.78v11.41l-7.66,7.66c-.76.76-.76,2,0,2.76.38.38.88.57,1.38.57s1-.19,1.38-.57l8.23-8.23c.37-.37.57-.86.57-1.38V3.9h3.9v4.06l3.9,3.9v-7.63c2.27.8,3.9,2.96,3.9,5.49v11.56l-7.8-7.81v5.52l11.58,11.64c.07-.48.12-.96.12-1.46V9.73c0-5.36-4.36-9.73-9.73-9.73Zm-13.67,9.06V0h-6.61l-3.94,3.9h0L3.9,13.85v-4.12c0-2.68,1.82-4.94,4.29-5.62L12.35,0h-2.62C4.36,0,0,4.36,0,9.73v13.43L19.5,3.9h1.1v4.34L0,28.62v.55c0,1.45.33,2.83.9,4.07L23.92,10.44c.37-.37.58-.87.58-1.39Z'
							}
						)
					)
				),
				example: {
					"attributes": {
						"img": wpz_aiilg.pluginUrl + "/assets/img/block-sample.jpg",
						imgWidth: 768,
						imgHeight: 432,
						promptText: 'snowy rocky mountains'
					}
				},
				transforms: {
					to: ['core/image', 'core/cover', 'core/gallery', 'core/media-text', 'kadence/image', 'kadence/advancedgallery', 'kadence/infobox', 'kadence/rowlayout', 'kadence/column'].map(function(blockType) {
						switch (blockType) {
							case 'core/gallery':
								var transformFunction = function(attributes) {
									return wp.blocks.createBlock(
										blockType,
										{
											images: [
												{
													url: attributes.img,
													fullUrl: attributes.img,
													id: attributes.imgId,
													alt: attributes.promptText
												}
											],
											align: attributes.align
										}
									);
								};
								break;
							case 'kadence/advancedgallery':
								var transformFunction = function(attributes) {
									return wp.blocks.createBlock(
										blockType,
										{
											ids: [attributes.imgId],
											images: [
												{
													url: attributes.img,
													id: attributes.imgId,
													alt: attributes.promptText,
													thumbUrl: attributes.img,
													lightUrl: attributes.img,
													width: attributes.imgWidth,
													height: attributes.imgHeight
												}
											],
											align: attributes.align
										}
									);
								};
								break;
							case 'kadence/infobox':
								var transformFunction = function(attributes) {
									return wp.blocks.createBlock(
										blockType,
										{
											mediaType: 'image',
											mediaImage: [{
												url: attributes.img,
												id: attributes.imgId,
												alt: attributes.promptText,
												width: attributes.imgWidth,
												height: attributes.imgHeight,
												maxWidth: attributes.imgWidth
											}],
											align: attributes.align
										}
									);
								};
								break;
							case 'kadence/rowlayout':
								var transformFunction = function(attributes) {
									return wp.blocks.createBlock(
										blockType,
										{
											bgImg: attributes.img,
											bgImgId: attributes.imgId
										}
									);
								};
								break;
							case 'kadence/column':
								var transformFunction = function(attributes) {
									return wp.blocks.createBlock(
										blockType,
										{
											backgroundImg: [{
												bgImg: attributes.img,
												bgImgId: attributes.imgId
											}]
										}
									);
								};
								break;
							case 'core/media-text':
								var transformFunction = function(attributes) {
									return wp.blocks.createBlock(
										blockType,
										{
											mediaUrl: attributes.img,
											mediaId: attributes.imgId,
											mediaType: 'image',
											mediaAlt: attributes.promptText,
											align: attributes.align
										}
									);
								};
								break;
							default:
								var transformFunction = function(attributes) {
									return wp.blocks.createBlock(
										blockType,
										{
											url: attributes.img,
											id: attributes.imgId,
											alt: attributes.promptText,
											align: attributes.align
										}
									);
								};
						}
						return {
							type: 'block',
							blocks: [ blockType ],
							isMatch: function(attributes) {
								return attributes.img && !attributes.imgGetUrl
							},
							transform: transformFunction
						};
					})
				},
				edit: function(props) {
					
					window.wpzAiImagesConfig.settings.width = parseInt(window.wpzAiImagesConfig.settings.width);
					window.wpzAiImagesConfig.settings.height = parseInt(window.wpzAiImagesConfig.settings.height);
					window.wpzAiImagesConfig.settings.ratio = parseFloat(window.wpzAiImagesConfig.settings.ratio);
					
					var settings = Object.assign(
						{},
						window.wpzAiImagesConfig.settings,
						{
							width: parseInt(props.attributes.imgWidth),
							height: parseInt(props.attributes.imgHeight),
							ratio: parseFloat(props.attributes.imgRatio)
						}
					);
					
					
					for (var setting in settings) {
						if (setting.substring(0, 9) === 'modifier_') {
							delete settings[setting];
						}
					}
					
					for (var attribute in props.attributes) {
						if (props.attributes[attribute] && attribute.substring(0, 9) === 'modifier_') {
							settings[attribute] = props.attributes[attribute];
						}
					}
					
					for (var setting in settings) {
						if (settings[setting] !== window.wpzAiImagesConfig.settings[setting]) {
							if (settingsSaveTimeout) {
								clearTimeout(settingsSaveTimeout);
							}
							settingsSaveTimeout = setTimeout(function() {
								settingsSaveTimeout = null;
								window.jQuery.post(
									window.wpzAiImagesConfig.ajaxurl,
									{
										action: 'wpz-ai-images-settings-save',
										nonce: wpz_aiilg.settingsSaveNonce,
										settings: JSON.stringify(settings)
									},
									function() {
										window.wpzAiImagesConfig.settings = settings;
										updateBlockTypeDefaults();
									}
								);
								
							}, 3000);
							break;
						}
					}
					
					function doGenerate() {
						var prompt = [
							{
								type: 'text',
								text: props.attributes.promptText
							}
						];
						
						for (var attribute in props.attributes) {
							if (props.attributes[attribute] && attribute.substring(0, 9) === 'modifier_') {
								prompt.push({
									type: 'modifier',
									category: attribute.substring(9),
									modifier: props.attributes[attribute]
								});
							}
						}
						
						var request = {
							action: 'generate',
							key: wpz_aiilg.key,
							p: JSON.stringify(prompt),
							w: props.attributes.imgWidth,
							h: props.attributes.imgHeight,
							q: 0
						};
						jQuery.post(
							wpz_aiilg.apiUrl,
							request,
							function(response) {
								if (response.urls) {
									props.setAttributes({
										images: props.attributes.images ? props.attributes.images.concat(response.urls) : response.urls,
										img: response.urls[0].preview,
										imgGetUrl: response.urls[0].get,
										imgIsLoaded: null,
										regenerate: null
									});
								} else {
									props.setAttributes({errorState: 'generateOther', regenerate: null});
								}
							},
							'json'
						).fail(function(xhr) {
							switch (xhr.status) {
								case 451:
									props.setAttributes({errorState: 'promptBlocked', regenerate: null});
									break;
								case 429:
									var response = JSON.parse(xhr.responseText);
									if (response && response.error && response.error === 'quota') {
										props.setAttributes({errorState: 'generateQuota', regenerate: null});
									} else {
										props.setAttributes({errorState: 'rateLimit', regenerate: null});
									}
									break;
								default:
									props.setAttributes({errorState: 'generateOther', regenerate: null});
							}
						});
					}
					
					function maybeDoDeferredNewGenerate() {
						if (props.attributes.img) {
							if (deferredGenerateQueue[props.clientId]) {
								clearTimeout(deferredGenerateQueue[props.clientId]);
								delete deferredGenerateQueue[props.clientId];
							}
							
							props.setAttributes({
								images: [],
								img: null,
								imgGetUrl: null,
								regenerate: 'pending'
							});
							
							deferredGenerateQueue[props.clientId] = setTimeout(doNewGenerate, 2000);
						}
					}
					
					function doNewGenerate() {
						if (deferredGenerateQueue[props.clientId]) {
							delete deferredGenerateQueue[props.clientId];
						}
						
						props.setAttributes({
							regenerate: true
						});
					}
					
					if (props.attributes.regenerate && props.attributes.regenerate !== 'pending') {
						doGenerate();
					}
					
					var blockProps = wp.blockEditor.useBlockProps({
						className: 'wpz-ai-images-' + (window.wpz_aiilg.isPro ? 'pro' : 'free')
					});
					
					if (props.attributes.img || props.attributes.regenerate) {
						
						var imgClasses = [];
						if (props.attributes.imgGetUrl) {
							imgClasses.push('wpz-aiilg-preview-image');
						}
						
						var blockContent = elm(
							DelayedImage,
							{
								key: 'img-' + (props.attributes.img ? props.attributes.img.split('/').slice(-3).join('') : 'null'),
								src: props.attributes.img,
								alt: props.attributes.promptText,
								className: imgClasses.join(' '),
								width: props.attributes.imgWidth,
								height: props.attributes.imgHeight,
								isDownloading: props.attributes.isDownloading,
								onLoad: function() {
									if (!props.attributes.imgIsLoaded) {
										props.setAttributes({
											imgIsLoaded: true
										});
									}
								}
							}
						);
						
					} else {
						if (!wpz_aiilg.userHasCapability) {
							var instructions = wp.i18n.__('Your user account doesn\'t have the required permissions (upload_files capability) to generate images with AI Image Lab. Please contact your site\'s administrator if you need this functionality.', 'wpz-ai-image-lab');
						} else if (!wpz_aiilg.hasKey) {
							var instructions = wp.i18n.__('You haven\'t connected your site to AI Image Lab! Please save your changes, close the editor, and follow the instructions on the AI Image Lab settings page.', 'wpz-ai-image-lab');
						} else {
							var instructions = wp.i18n.__('Enter your prompt text below, then click the Generate Image button. Use the arrows in the toolbar to navigate between alternate images, then click the checkmark to select an image. After selecting an image, you can optionally transform this block into a different block (such as the Image block) for more formatting and other options.', 'wpz-ai-image-lab')
								+ ' ' + (wpz_aiilg.isPro ? wp.i18n.__('Image previews may be rendered at a lower resolution than the resolution you selected, which will be used for the final image after selecting an image. As a result, previews may appear blurry.', 'wpz-ai-image-lab') : wp.i18n.__('Visible watermarks in the preview image will be removed after selecting an image.', 'wpz-ai-image-lab'));
						}
						
						var blockContent = elm(
							wp.components.Placeholder,
							{
								key: 'placeholder'
							},
							[
							elm(
								'p',
								{ key: 'instructions' },
								instructions
							),
							(wpz_aiilg.hasKey && wpz_aiilg.userHasCapability)
							? [
								wpz_aiilg.isPro
									? null
									: elm(
										'p',
										{ className: 'wpz-aiilg-pro-upsell' },
										elm(
											'a',
											{ href: 'https://wpzone.co/product/ai-image-generator-lab/', target: '_blank' },
											wp.i18n.__('Upgrade to AI Image Lab Pro for higher image resolutions, no quota (reasonable limits apply), and more!', 'wpz-ai-image-lab')
										)
									),
								elm(
									wp.components.TextareaControl,
									{
										key: 'fld',
										placeholder: wp.i18n.__('Enter some text to describe the image you would like to create...', 'wpz-ai-image-lab'),
										className: 'wpz-aiilg-placeholder-field',
										rows: 2,
										value: props.attributes.promptText ? props.attributes.promptText : '',
										onChange: function(newValue) {
											props.setAttributes({
												promptText: newValue
											});
										},
										onKeyDown: function(ev) {
											if (ev.keyCode == 13) {
												if (props.attributes.promptText) {
													doGenerate();
												}
												ev.preventDefault();
											}
										}
									}
								),
								elm(
									wp.components.Button,
									{
										key: 'btn-gen',
										variant: 'primary',
										disabled: !props.attributes.promptText,
										onClick: function() {
											doGenerate();
										}
									},
									wp.i18n.__('Generate Image', 'wpz-ai-image-lab')
								)
							]
							: (wpz_aiilg.userHasCapability ? elm(
								wp.components.Button,
								{
									key: 'btn-settings',
									variant: 'primary',
									href: wpz_aiilg.adminPageUrl,
									target: '_blank'
								},
								wp.i18n.__('Go to Settings', 'wpz-ai-image-lab')
							) : null)
							]
						);
					}
					
					var toolbarButtons = [];
					var isImageDownloaded = props.attributes.img && (!props.attributes.images || !props.attributes.images.length);
					
					if (props.attributes.images && props.attributes.images.length) {
						toolbarButtons.push(
							elm(
								wp.components.ToolbarButton,
								{
									key: 'btn-prev',
									icon: 'arrow-left-alt',
									label: wp.i18n.__('Previous Image', 'wpz-ai-image-lab'),
									showTooltip: true,
									disabled: props.attributes.img == props.attributes.images[0].preview,
									onClick: function() {
										for (var i = 0; i < props.attributes.images.length; ++i) {
											if (props.attributes.images[i].preview == props.attributes.img && i) {
												props.setAttributes({
													img: props.attributes.images[i - 1].preview,
													imgGetUrl: props.attributes.images[i - 1].get,
													imgIsLoaded: null
												});
											}
										}
									}
								},
							)
						);
						
						toolbarButtons.push(
							elm(
								wp.components.ToolbarButton,
								{
									key: 'btn-next',
									icon: 'arrow-right-alt',
									label: wp.i18n.__('Next Image', 'wpz-ai-image-lab'),
									showTooltip: true,
									onClick: function() {
										for (var i = 0; i < props.attributes.images.length; ++i) {
											if (props.attributes.images[i].preview == props.attributes.img && i < props.attributes.images.length - 1) {
												props.setAttributes({
													img: props.attributes.images[i + 1].preview,
													imgGetUrl: props.attributes.images[i + 1].get,
													imgIsLoaded: null
												});
												
												if (props.attributes.images.length - i < 4) {
													doGenerate();
												}
											}
										}
									}
								}
							)
						);
						
					}
						
					if (props.attributes.imgGetUrl) {
						
						function getImage(url) {
							jQuery.post(
								ajaxurl,
								{
									action: 'wpz-ai-images-upload',
									url: url,
									postId: jQuery('#post_ID').length ? parseInt(jQuery('#post_ID').val()) : 0,
									prompt: props.attributes.promptText,
									nonce: wpz_aiilg.getNonce
								},
								function(response) {
									if (response.success && response.data) {
										if (response.data.wait) {
											setTimeout(function() {
												getImage(url);
											}, 3000);
										} else {
											props.setAttributes({
												img: response.data.url,
												imgId: response.data.id,
												imgIsLoaded: null,
												isDownloading: null
											});
											
										}
									} else {
										props.setAttributes({errorState: 'downloadOther'});
									}
								},
								'json'
							).fail(function(xhr) {
								props.setAttributes({errorState: 'downloadOther'});
							});
						}
						
						if (props.attributes.imgIsLoaded) {
							toolbarButtons.push(
								elm(
									wp.components.ToolbarButton,
									{
										key: 'btn-get',
										icon: 'saved',
										label: wp.i18n.__('Use this Image', 'wpz-ai-image-lab'),
										showTooltip: true,
										onClick: function() {
											getImage(props.attributes.imgGetUrl);
											props.setAttributes({
												images: [],
												imgGetUrl: null,
												isDownloading: true
											});
										}
									}
								)
							);
						}
					}
					
					if (props.attributes.img) {		
						toolbarButtons.push(
							elm(
								wp.components.ToolbarButton,
								{
									key: 'btn-edit',
									icon: 'edit',
									label: wp.i18n.__('Change Prompt', 'wpz-ai-image-lab'),
									showTooltip: true,
									onClick: function() {
										props.setAttributes({
											images: [],
											img: null,
											imgGetUrl: null
										});
									}
								}
							)
						);
					}
					
					var toolbarGroups = [];
					
					if (toolbarButtons.length) {
						toolbarGroups.push(
							elm(
								wp.components.ToolbarGroup,
								{ key: 'group-aiil-nav' },
								toolbarButtons
							)
						);
					}
					
					var styleOptions = Object.entries(wpz_aiilg.promptModifiers).map(function(entry) {
						if (!entry[1].showIfCondition || props.attributes['modifier_' + entry[1].showIfCondition] == entry[1].showIfValue) {
							return elm(
								wp.components.PanelRow,
								{ key: 'row-modifier-' + entry[0] },
								[
									elm(
										wp.components.BaseControl,
										{
											key: 'picker',
											label: entry[1].label
										},
										elm(
											wp.components.__experimentalGrid,
											{
												key: 'picker-grid',
												className: 'wpz-aiilg-style-grid'
											},
											Object.entries(entry[1].values).map(function(valueEntry) {
												if (valueEntry[0] === 'other') {
													return elm(
														wp.components.SelectControl,
														{
															key: 'picker-other',
															options: [{label: '', value: ''}].concat(Object.entries(valueEntry[1]).map(function(otherEntry) {
																return { label: otherEntry[1], value: otherEntry[0] };
															})),
															value: (!isImageDownloaded && valueEntry[1].hasOwnProperty(props.attributes['modifier_' + entry[0]])) ? props.attributes['modifier_' + entry[0]] : '',
															disabled: isImageDownloaded,
															onChange: function(newValue) {
																
																var attributesToSet = {};
																attributesToSet['modifier_' + entry[0]] = newValue;
																props.setAttributes(attributesToSet);
																
																
															}
														}
													);
												} else {
													return elm(
														wp.components.Button,
														{
															key: 'picker-option-' + valueEntry[0],
															'aria-label': valueEntry[1].label,
															style: { backgroundImage: 'url(' + valueEntry[1]['sample-image'] + ')' },
															isPressed: !isImageDownloaded && props.attributes['modifier_' + entry[0]] == valueEntry[0],
															disabled: isImageDownloaded,
															onClick: function() {
																var attributesToSet = {};
																attributesToSet['modifier_' + entry[0]] = (props.attributes['modifier_' + entry[0]] === valueEntry[0]) ? '' : valueEntry[0];
																props.setAttributes(attributesToSet);
														
																maybeDoDeferredNewGenerate();
															}
														},
														elm('span', null, valueEntry[1].label)
													);
												}
											})
										)
									)
								]
							)
						}
					});
					
					if (props.attributes.showProSizeNotice) {
						var sizeNotice = elm(
							wp.components.Notice,
							{
								key: 'notice-size',
								status: 'error',
								isDismissible: false,
								className: 'wpz-aiilg-hd-mode-upgrade-notice'
							},
							[
								elm(
									'p',
									{ key: 'main' },
									elm(
										'strong',
										null,
										wp.i18n.__('Upgrade to Pro for HD mode', 'wpz-ai-image-lab')
									)
								),
								elm(
									'p',
									{
										key: 'sub'
									},
									wp.i18n.__('You\'ll need AI Image Lab Pro to generate images with a dimension greather than 768px (up to 2048px!) via HD mode.', 'wpz-ai-image-lab')
								),
								elm(
									wp.components.Button,
									{
										key: 'btn',
										variant: 'primary',
										href: 'https://wpzone.co/product/ai-image-generator-lab/',
										target: '_blank'
									},
									wp.i18n.__('Details', 'wpz-ai-image-lab')
								)
							]
						);
					} else if (wpz_aiilg.isPro && Math.max(props.attributes.imgWidth, props.attributes.imgHeight) > 768) {
						var sizeNotice = elm(
							wp.components.Notice,
							{
								key: 'notice-size',
								status: 'info',
								isDismissible: false,
								className: 'wpz-aiilg-hd-mode-notice'
							},
							[
								elm(
									'p',
									{ key: 'main' },
									elm(
										'strong',
										null,
										'HD mode activated!'
									)
								),
								elm(
									'p',
									{
										key: 'sub'
									},
									wp.i18n.__('Images with a dimension greather than 768px take longer to download after selecting an image, and the downloaded image may vary slightly from the preview.', 'wpz-ai-image-lab')
								)
							]
						);
					} else {
						sizeNotice = null;
					}
					
					var modal = null;
					
					if (props.attributes.errorState) {
						switch (props.attributes.errorState) {
							case 'promptBlocked':
								var errorMessage = wp.i18n.__('Your prompt text contains word(s) or phrase(s) which may violate our terms of use. Please try rewriting your prompt to remove any content that is not permitted on this service.', 'wpz-ai-image-lab');
								break;
							case 'rateLimit':
								var errorMessage = wp.i18n.__('You have reached the maximum number of requests that you may make at this time. Please try again later.', 'wpz-ai-image-lab');
								break;
							case 'generateQuota':
								if (wpz_aiilg.isPro) {
									var errorMessage = wp.i18n.__('You have reached the maximum number of requests that you may make at this time. Please try again later.', 'wpz-ai-image-lab');
								} else {
									var errorMessage = wp.i18n.__('You have reached your image download quota for the current 24-hour period. Please try again later or purchase AI Image Lab Pro.', 'ai-image-lab');
								}
								break;
							case 'generateOther':
								var errorMessage = wp.i18n.__('Something went wrong when submitting your request. Please try again, and if the problem persists please wait a bit before submitting your request again.', 'ai-image-lab');
								break;
							case 'downloadOther':
								if (wpz_aiilg.isPro) {
									var errorMessage = wp.i18n.__('Something went wrong while downloading your image. Please try again.', 'ai-image-lab');
								} else {
									var errorMessage = wp.i8n.__('Something went wrong while downloading your image. You may have reached your download limit for the current 24-hour period; if so, you may want to get AI Image Lab Pro. If you don\'t think that\'s the case, please try again.', 'ai-image-lab');
								}
								break;
						}
						
						if (errorMessage) {
							var hasPrimaryButton = !wpz_aiilg.isPro && (props.attributes.errorState === 'generateQuota' || props.attributes.errorState === 'downloadOther');
							
							var modalButtons = [];
							if (!wpz_aiilg.isPro && (props.attributes.errorState === 'generateQuota' || props.attributes.errorState === 'downloadOther')) {
								modalButtons.push(
									elm(
										wp.components.Button,
										{
											key: 'btn-pro',
											variant: 'primary',
											href: 'https://wpzone.co/product/ai-image-generator-lab/',
											target: '_blank',
											onClick: function() {
												props.setAttributes({errorState: null});
											}
										},
										wp.i18n.__('Get Pro', 'ai-image-lab')
									)
								);
							}
							
							modalButtons.push(
								elm(
									wp.components.Button,
									{
										key: 'btn-close',
										variant: hasPrimaryButton ? 'secondary' : 'primary',
										onClick: function() {
											props.setAttributes({errorState: null});
										}
									},
									wp.i18n.__('Close', 'ai-image-lab')
								)
							);
							
							modal = elm(
								wp.components.Modal,
								{
									key: 'modal',
									title: wp.i18n.__('Error', 'ai-image-lab'),
									onRequestClose: function() {
										props.setAttributes({errorState: null});
									}
								},
								[
									elm(
										'p',
										{ key: 'message' },
										errorMessage
									),
									modalButtons
								]
							);
						}
					}
					
					blockProps.key = 'block';
				
					return [
						elm(
							'div',
							blockProps,
							blockContent
						),
						modal,
						elm(
							wp.blockEditor.BlockControls,
							{ key: 'block-controls' },
							toolbarGroups
						),
						elm(
							wp.blockEditor.InspectorControls,
							{ key: 'inspector-controls' },
							[
								props.attributes.img && !isImageDownloaded
									? elm(
										wp.components.Notice,
										{
											key: 'notice-regenerate',
											status: 'warning',
											isDismissible: false,
											className: 'wpz-aiilg-regenerate-warning'
										},
										wp.i18n.__('Changing image size or style options after image generation will result in a new set of images being generated.', 'wpz-ai-image-lab')
									)
									: null,
								elm(
									wp.components.PanelBody,
									{
										key: 'panel-info',
										title: wp.i18n.__('More Information', 'wpz-ai-image-lab'),
										initialOpen: false,
										onToggle: function(toggleState) {
											if (toggleState) {
												if (instructionsInfoHtml === null) {
													window.jQuery.post(
														ajaxurl,
														{ action: 'wpz-ai-images-block-instructions' },
														function(response) {
															instructionsInfoHtml = response;

															// hacky force refresh
															props.setAttributes({ promptText: props.attributes.promptText + ' '});
															props.setAttributes({ promptText: props.attributes.promptText });
														},
														'text'
													)
												}
											}
										}
									},
									elm(
										'div',
										instructionsInfoHtml === null
											? {
												className: 'wpz-aiilg-placeholder-info-panel-content'
											}
											: {
												className: 'wpz-aiilg-placeholder-info-panel-content',
												dangerouslySetInnerHTML: {
													__html: instructionsInfoHtml
												}
											},
										instructionsInfoHtml === null
											? elm(
												wp.components.Spinner
											)
											: null
									)
								),
								elm(
									wp.components.PanelBody,
									{
										key: 'panel-size',
										title: wp.i18n.__('Image Size', 'wpz-ai-image-lab')
									},
									[
										elm(
											wp.components.PanelRow,
											{ key: 'panel-row-ratio' },
											elm(
												wp.components.SelectControl,
												{
													label: wp.i18n.__('Aspect Ratio', 'wpz-ai-image-lab'),
													options: [
														{
															label: wp.i18n.__('1:1 (square)', 'wpz-ai-image-lab'),
															value: 1
														},
														{
															label: wp.i18n.__('3:2 (landscape)', 'wpz-ai-image-lab'),
															value: 1.5
														},
														{
															label: wp.i18n.__('2:3 (portrait)', 'wpz-ai-image-lab'),
															value: 0.666667
														},
														{
															label: wp.i18n.__('16:9 (landscape)', 'wpz-ai-image-lab'),
															value: 1.777778
														},
														{
															label: wp.i18n.__('9:16 (portrait)', 'wpz-ai-image-lab'),
															value: 0.5625
														},
														{
															label: wp.i18n.__('Custom size', 'wpz-ai-image-lab'),
															value: 0
														}
													],
													value: props.attributes.imgRatio,
													disabled: isImageDownloaded,
													onChange: function(newValue) {
														var attributesToSet = {
															imgRatio: newValue,
															showProSizeNotice: null
														};
														if (parseFloat(newValue)) {
															attributesToSet.imgWidth = Math.round(props.attributes.imgHeight * newValue);
															
															if (attributesToSet.imgWidth > (wpz_aiilg.isPro ? 2048 : 768)) {
																attributesToSet.imgWidth = wpz_aiilg.isPro ? 2048 : 768;
																attributesToSet.imgHeight = Math.round(attributesToSet.imgWidth / newValue);
																if (!wpz_aiilg.isPro) {
																	attributesToSet.showProSizeNotice = true;
																}
															}
														}
														props.setAttributes(attributesToSet);
														
														maybeDoDeferredNewGenerate();
													}
												}
											)
										),
										elm(
											wp.components.__experimentalHStack,
											{ key: 'panel-row-size', alignment: 'top' },
											[
												elm(
													wp.components.__experimentalInputControl,
													{
														key: 'fld-width',
														label: wp.i18n.__('Width', 'wpz-ai-image-lab'),
														suffix: 'px',
														type: 'number',
														value: props.attributes.imgWidth,
														disabled: isImageDownloaded || parseFloat(props.attributes.imgRatio) !== 0,
														onChange: function(newValue) {
															var attributesToSet = {
																imgWidth: Math.min(wpz_aiilg.isPro ? 2048 : 768, newValue),
																showProSizeNotice: null
															};
															if (!wpz_aiilg.isPro && newValue > 768) {
																attributesToSet.showProSizeNotice = true;
															}
															props.setAttributes(attributesToSet);
														
															maybeDoDeferredNewGenerate();
														}
													}
												),
												elm(
													wp.components.__experimentalInputControl,
													{
														key: 'fld-height',
														label: wp.i18n.__('Height', 'wpz-ai-image-lab'),
														suffix: 'px',
														type: 'number',
														value: props.attributes.imgHeight,
														disabled: isImageDownloaded,
														onChange: function(newValue) {
															var attributesToSet = {
																imgHeight: Math.min(wpz_aiilg.isPro ? 2048 : 768, newValue),
																showProSizeNotice: null
															};
															if (!wpz_aiilg.isPro && newValue > 768) {
																attributesToSet.showProSizeNotice = true;
															}
															if (parseFloat(props.attributes.imgRatio)) {
																attributesToSet.imgWidth = Math.round(props.attributes.imgRatio * newValue);
																if (attributesToSet.imgWidth > (wpz_aiilg.isPro ? 2048 : 768)) {
																	attributesToSet.imgWidth = wpz_aiilg.isPro ? 2048 : 768;
																	attributesToSet.imgHeight = Math.round(attributesToSet.imgWidth / props.attributes.imgRatio);
																	if (!wpz_aiilg.isPro) {
																		attributesToSet.showProSizeNotice = true;
																	}
																}
															}
															
															props.setAttributes(attributesToSet);
															
															maybeDoDeferredNewGenerate();
														}
													}
												)
											]
										),
										sizeNotice
									]
								),
								elm(
									wp.components.PanelBody,
									{
										key: 'panel-style',
										title: wp.i18n.__('Image Style', 'wpz-ai-image-lab')
									},
									styleOptions
								)
							]
						)
					];
				},
				save: function(props) {
					var blockProps = wp.blockEditor.useBlockProps.save();
					
					if (props.attributes.img && !props.attributes.imgGetUrl) {
						var blockContent = elm(
							'img',
							{
								src: props.attributes.img,
								alt: props.attributes.promptText,
								width: props.attributes.imgWidth,
								height: props.attributes.imgHeight
							}
						);
					} else {
						var blockContent = null;
					}
					
					return elm(
						'div',
						blockProps,
						blockContent
					);
				}
			}
		);
		
		function updateBlockTypeDefaults() {
			var blockType = window.wp.blocks.getBlockType('wpz-aiil/image');
			if (blockType) {
				for (var setting in window.wpzAiImagesConfig.settings) {
					switch (setting) {
						case 'width':
							var attribute = 'imgWidth';
							break;
						case 'height':
							var attribute = 'imgHeight';
							break;
						case 'ratio':
							var attribute = 'imgRatio';
							break;
						default:
							var attribute = setting;
					}
					if (blockType.attributes[attribute]) {
						blockType.attributes[attribute].default = window.wpzAiImagesConfig.settings[setting];
					} else {
						blockType.attributes[attribute] = {
							default: window.wpzAiImagesConfig.settings[setting]
						};
					}
				}
			}
		}
		window.jQuery(document).on('ready', updateBlockTypeDefaults);
		
})();