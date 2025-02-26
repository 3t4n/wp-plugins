<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Create a section.
//
WPGP::createSection(
	$wpgp_prefix,
	array(
		'title'  => __( 'Related', 'acc-conditional-typo' ),
		'icon'   => 'fa fa-random',
		'fields' => array(

			array(
				'id'           => 'gpacc_root_options_group',
				'type'         => 'group',
				'button_title' => __( 'Add New Condition', 'acc-conditional-typo' ),
				'fields'       => array(

					array(
						'id'    => 'acc_group_title',
						'type'  => 'text',
						'title' => __( 'Group Name', 'acc-conditional-typo' ),
						'desc'  => __( 'Type a group name that you can identify or remember the next time.', 'acc-conditional-typo' ),
					),
					array(
						'id'          => 'acc_is_template',
						'type'        => 'select',
						'title'       => __( 'Code Applying On', 'acc-conditional-typo' ),
						'subtitle'    => __( 'To apply your CSS on every template,  WordPress already has an option, <br><strong> Appearance &raquo; Customize &raquo; Additional CSS</strong>', 'acc-conditional-typo' ),
						'class'       => 'acc--conditional-tag-list',
						'placeholder' => __( 'Select a Template', 'acc-conditional-typo' ),
						'options'     => array(

							'WordPress'   => array(
								'is_home'       => __( 'Home Page', 'acc-conditional-typo' ),
								'is_front_page' => __( 'Static Page', 'acc-conditional-typo' ),
								'is_single'     => __( 'Single Post', 'acc-conditional-typo' ),
								'is_page'       => __( 'Single Page', 'acc-conditional-typo' ),
								'is_search'     => __( 'Search Result Page', 'acc-conditional-typo' ),
								'is_404'        => __( '404 Not Found Page', 'acc-conditional-typo' ),
							),

							'WooCommerce' => array(
								'is_shop'         => __( 'Shop Page', 'acc-conditional-typo' ),
								'is_product'      => __( 'Product Page', 'acc-conditional-typo' ),
								'is_cart'         => __( 'Cart Page', 'acc-conditional-typo' ),
								'is_checkout'     => __( 'Checkout Page', 'acc-conditional-typo' ),
								'is_account_page' => __( 'Account Page', 'acc-conditional-typo' ),
							),
						),
					),
					//
					// Notice: iF not meet with any condition.
					//
					array(
						'type'       => 'notice',
						'style'      => 'warning',
						'content'    => __( '<i class="fa fa-warning">&nbsp;&nbsp;&nbsp;</i>Required to <strong>Select a Template</strong> where apply options below.', 'acc-conditional-typo' ),
						'class'      => 'clear acc--notice-warning',
						'dependency' => array( 'acc_is_template', '==', '' ),
					),
					//
					// Start Template Details Help Text.
					//
					array(
						'type'       => 'content',
						'content'    => __( '<span class="wpgp-help acc--conditional-tags-help"><span class="wpgp-help-text">The home page of your website. When the main blog page is being displayed.</span><span class="fa fa-question-circle"></span></span>', 'acc-conditional-typo' ),
						'dependency' => array( 'acc_is_template', '==', 'is_home' ),
					),
					array(
						'type'       => 'content',
						'content'    => __( '<span class="wpgp-help acc--conditional-tags-help"><span class="wpgp-help-text">When the front of the site is displayed, whether it is posts or a Page. When the main blog page is being displayed and the Settings → Reading → Front page displays is set to Your latest posts, or when Settings → Reading → Front page displays is set to A static page and the Front Page value is the current Page being displayed.</span><span class="fa fa-question-circle"></span></span>', 'acc-conditional-typo' ),
						'dependency' => array( 'acc_is_template', '==', 'is_front_page' ),
					),
					array(
						'type'       => 'content',
						'content'    => __( '<span class="wpgp-help acc--conditional-tags-help"><span class="wpgp-help-text">When a single post of any post type (except attachment and page post types) is being displayed.</span><span class="fa fa-question-circle"></span></span>', 'acc-conditional-typo' ),
						'dependency' => array( 'acc_is_template', '==', 'is_single' ),
					),
					array(
						'type'       => 'content',
						'content'    => __( '<span class="wpgp-help acc--conditional-tags-help"><span class="wpgp-help-text">When any Page is being displayed. In contrast, pages are for non-chronological content: pages like “About” or “Contact” would be common examples.</span><span class="fa fa-question-circle"></span></span>', 'acc-conditional-typo' ),
						'dependency' => array( 'acc_is_template', '==', 'is_page' ),
					),
					array(
						'type'       => 'content',
						'content'    => __( '<span class="wpgp-help acc--conditional-tags-help"><span class="wpgp-help-text">When a search result page archive is being displayed.</span><span class="fa fa-question-circle"></span></span>', 'acc-conditional-typo' ),
						'dependency' => array( 'acc_is_template', '==', 'is_search' ),
					),
					array(
						'type'       => 'content',
						'content'    => __( '<span class="wpgp-help acc--conditional-tags-help"><span class="wpgp-help-text">When a page displays after an "HTTP 404: Not Found" error occurs.</span><span class="fa fa-question-circle"></span></span>', 'acc-conditional-typo' ),
						'dependency' => array( 'acc_is_template', '==', 'is_404' ),
					),
					array(
						'type'       => 'content',
						'content'    => __( '<span class="wpgp-help acc--conditional-tags-help"><span class="wpgp-help-text">When a product page archive is being displayed.</span><span class="fa fa-question-circle"></span></span>', 'acc-conditional-typo' ),
						'dependency' => array( 'acc_is_template', '==', 'is_shop' ),
					),
					array(
						'type'       => 'content',
						'content'    => __( '<span class="wpgp-help acc--conditional-tags-help"><span class="wpgp-help-text">When a single product page is being displayed.</span><span class="fa fa-question-circle"></span></span>', 'acc-conditional-typo' ),
						'dependency' => array( 'acc_is_template', '==', 'is_product' ),
					),
					array(
						'type'       => 'content',
						'content'    => __( '<span class="wpgp-help acc--conditional-tags-help"><span class="wpgp-help-text">When a cart page is being displayed.</span><span class="fa fa-question-circle"></span></span>', 'acc-conditional-typo' ),
						'dependency' => array( 'acc_is_template', '==', 'is_cart' ),
					),
					array(
						'type'       => 'content',
						'content'    => __( '<span class="wpgp-help acc--conditional-tags-help"><span class="wpgp-help-text">When a checkout page is being displayed.</span><span class="fa fa-question-circle"></span></span>', 'acc-conditional-typo' ),
						'dependency' => array( 'acc_is_template', '==', 'is_checkout' ),
					),
					array(
						'type'       => 'content',
						'content'    => __( '<span class="wpgp-help acc--conditional-tags-help"><span class="wpgp-help-text">When any customer’s account page is being displayed.</span><span class="fa fa-question-circle"></span></span>', 'acc-conditional-typo' ),
						'dependency' => array( 'acc_is_template', '==', 'is_account_page' ),
					),
					//
					// End of Template Details Help Text.
					//
					array(
						'id'          => 'acc_specific_posts_select',
						'type'        => 'select',
						'title'       => __( 'Select with specific posts', 'acc-conditional-typo' ),
						'desc'        => __( 'Leave this field empty if you want every single posts of your entire website.', 'acc-conditional-typo' ),
						'placeholder' => __( 'Select posts', 'acc-conditional-typo' ),
						'chosen'      => true,
						'ajax'        => true,
						'multiple'    => true,
						'sortable'    => true,
						'options'     => 'posts',
						'dependency'  => array( 'acc_is_template', '==', 'is_single' ),
					),
					array(
						'id'          => 'acc_specific_pages_select',
						'type'        => 'select',
						'title'       => __( 'Select with specific pages', 'acc-conditional-typo' ),
						'desc'        => __( 'Leave this field empty if you want every single posts of your entire website.', 'acc-conditional-typo' ),
						'placeholder' => __( 'Select pages', 'acc-conditional-typo' ),
						'chosen'      => true,
						'ajax'        => true,
						'multiple'    => true,
						'sortable'    => true,
						'options'     => 'pages',
						'dependency'  => array( 'acc_is_template', '==', 'is_page' ),
					),
					array(
						'id'          => 'acc_specific_product_select',
						'type'        => 'select',
						'title'       => __( 'Select Specific Products', 'acc-conditional-typo' ),
						'desc'        => __( 'Leave this field empty if you want every single products of your entire website.', 'acc-conditional-typo' ),
						'placeholder' => __( 'Select a product', 'acc-conditional-typo' ),
						'chosen'      => true,
						'ajax'        => true,
						'multiple'    => true,
						'options'     => 'posts',
						'query_args'  => array(
							'post_type' => 'product',
						),
						'dependency'  => array( 'acc_is_template', '==', 'is_product' ),
					),
					array(
						'id'    => 'gpacc_option_tab',
						'type'  => 'tabbed',
						'class' => 'acc--option-tab-list',
						'tabs'  => array(

							//
							// Tab 1.
							//
							array(
								'title'  => 'Selector',
								'icon'   => 'fa fa-crosshairs',
								'fields' => array(

									array(
										'type'    => 'content',
										'content' => '<div class="wpgp--menu-detail">
															<strong>Selector</strong>
															<a href="https://forhad.net//support-forum/" target="_blank" class="wpgp--need-help">Need Help?</a>
															<br>
															<p>Selectors are the part of CSS rule set. CSS selectors select HTML elements according to its id, class, type, attribute etc. There are several different types of selectors in CSS. CSS Element Selector. CSS Id Selector. Below the most commonly used tags in HTML. If you can not find yours, just type into the custom selector field.</p>
															<p style="color:brown;"><i class="fa fa-warning"></i> To applying custom code, you must require a selector in terms of CSS class/id or you can use direct HTML tag.</p>
														</div>',
									),
									array(
										'id'      => 'acc_html_tags',
										'type'    => 'checkbox',
										'options' => array(
											'Heading:'    => array(
												'h1' => '<strong><\H1></strong>',
												'h2' => '<strong><\H2></strong>',
												'h3' => '<strong><\H3></strong>',
												'h4' => '<strong><\H4></strong>',
												'h5' => '<strong><\H5></strong>',
												'h6' => '<strong><\H6></strong>',
											),
											'Formatting:' => array(
												'p'      => '<strong><\P></strong>',
												'a'      => '<strong><\A></strong>',
												'span'   => '<strong><\SPAN></strong>',
												'ul'     => '<strong><\UL></strong>',
												'li'     => '<strong><\LI></strong>',
												'ol'     => '<strong><\LI></strong>',
												'strong' => '<strong><\STRONG></strong>',
												'sub'    => '<strong><\SUB></strong>',
												'sup'    => '<strong><\SUP></strong>',
												'time'   => '<strong><\TIME></strong>',
											),
											'Sectioning:' => array(
												'header'  => '<strong><\HEADER></strong>',
												'main'    => '<strong><\MAIN></strong>',
												'div'     => '<strong><\DIV></strong>',
												'article' => '<strong><\ARTICLE></strong>',
												'aside'   => '<strong><\ASIDE></strong>',
												'nav'     => '<strong><\NAV></strong>',
												'section' => '<strong><\SECTION></strong>',
												'footer'  => '<strong><\FOOTER></strong>',
											),
											'Forming:'    => array(
												'form'     => '<strong><\FORM></strong>',
												'input'    => '<strong><\INPUT></strong>',
												'textarea' => '<strong><\TEXTAREA></strong>',
												'button'   => '<strong><\BUTTON></strong>',
												'select'   => '<strong><\SELECT></strong>',
												'option'   => '<strong><\OPTION></strong>',
												'label'    => '<strong><\LABEL></strong>',
											),
											'Multimedia:' => array(
												'iframe' => '<strong><\IFRAME></strong>',
												'img'    => '<strong><\IMG></strong>',
												'svg'    => '<strong><\SVG></strong>',
												'audio'  => '<strong><\AUDIO></strong>',
												'video'  => '<strong><\VIDEO></strong>',
											),
										),
									),
									array(
										'id'       => 'acc_selector_repeater',
										'type'     => 'repeater',
										'title'    => __( 'Custom Selector', 'acc-conditional-typo' ),
										'subtitle' => __( 'Type your selector whether it is tag, id or class.', 'acc-conditional-typo' ),
										'class'    => 'acc--more-tag-repeater',
										'fields'   => array(

											array(
												'id'   => 'acc_selectors',
												'type' => 'text',
											),

										),
										'default'  => array(
											array(
												'acc_selectors' => '',
											),
										),
									),

								),
							),

							//
							// Tab 2.
							//
							array(
								'title'  => 'Styling',
								'icon'   => 'fa fa-tint',
								'fields' => array(

									array(
										'type'    => 'content',
										'content' => '<div class="wpgp--menu-detail">
															<strong>Styling</strong>
															<a href="https://forhad.net//support-forum/" target="_blank" class="wpgp--need-help">Need Help?</a>
															<br>
															<p>Here is the art and technique of arranging type to make written language legible, readable, and appealing when displayed. The arrangement of type involves selecting typefaces, point sizes, line lengths, line-spacing, and letter-spacing, and adjusting the space between pairs of letters.</p>
															<p style="color:brown;"><i class="fa fa-warning"></i> Your style could not be working if other styles overwrite yours. In this case, you can level up your specificity or use "!important" via custom row CSS code.</p>
														</div>',
									),
									array(
										'id'         => 'gpacc_tag_typo_load',
										'type'       => 'switcher',
										'title'      => __( 'Load Google Font', 'acc-conditional-typo' ),
										'subtitle'   => __( 'On/Off google font for the selected tag list.', 'acc-conditional-typo' ),
										'text_on'    => __( 'On', 'acc-conditional-typo' ),
										'text_off'   => __( 'Off', 'acc-conditional-typo' ),
										'text_width' => 70,
										'default'    => true,
									),
									array(
										'id'           => 'acc_typo',
										'type'         => 'typography',
										'title'        => __( 'Typography', 'acc-conditional-typo' ),
										'subtitle'     => __( 'Google font loads only according to your selector/s. Skip properties, if you don\'t want to set a value.', 'acc-conditional-typo' ),
										'preview'      => 'always',
										'preview_text' => __( 'ACC | Advanced Custom Code', 'acc-conditional-typo' ),
										'word_spacing' => true,
									),
									array(
										'id'    => 'acc-border',
										'type'  => 'border',
										'title' => __( 'Border', 'acc-conditional-typo' ),
									),
									array(
										'id'      => 'acc_color_group',
										'type'    => 'color_group',
										'title'   => __( 'Color Group on Hover', 'acc-conditional-typo' ),
										'options' => array(
											'color'            => __( 'Color Hover', 'acc-conditional-typo' ),
											'background-color' => __( 'Background Hover', 'acc-conditional-typo' ),
											'border-color'     => __( 'Border Hover', 'acc-conditional-typo' ),
										),
									),
									array(
										'id'      => 'acc_background_type',
										'type'    => 'button_set',
										'title'   => __( 'Background Type', 'acc-conditional-typo' ),
										'options' => array(
											'image'    => __( 'Image', 'acc-conditional-typo' ),
											'gradient' => __( 'Gradient', 'acc-conditional-typo' ),
										),
										'default' => 'image',
									),
									array(
										'id'         => 'acc_background_image',
										'type'       => 'background',
										'title'      => __( 'Background Image', 'acc-conditional-typo' ),
										'dependency' => array( 'acc_background_type', '==', 'image' ),
									),
									array(
										'id'                    => 'acc_background_gradient',
										'type'                  => 'background',
										'title'                 => __( 'Background Gradient', 'acc-conditional-typo' ),
										'background_gradient'   => true,
										'background_image'      => false,
										'background_position'   => false,
										'background_repeat'     => false,
										'background_attachment' => false,
										'background_size'       => false,
										'dependency'            => array( 'acc_background_type', '==', 'gradient' ),
									),
									array(
										'id'    => 'acc_dimensions',
										'type'  => 'dimensions',
										'title' => __( 'Size', 'acc-conditional-typo' ),
									),
									array(
										'id'    => 'acc_margin',
										'type'  => 'spacing',
										'title' => __( 'Margin', 'acc-conditional-typo' ),
									),
									array(
										'id'    => 'acc_padding',
										'type'  => 'spacing',
										'title' => __( 'Padding', 'acc-conditional-typo' ),
									),

								),
							),

							//
							// Tab 3.
							//
							array(
								'title'  => 'Load Libraries',
								'icon'   => 'fa fa-file-code-o',
								'fields' => array(

									array(
										'type'    => 'content',
										'content' => '<div class="wpgp--menu-detail">
															<strong>Load Libraries</strong>
															<a href="https://forhad.net//support-forum/" target="_blank" class="wpgp--need-help">Need Help?</a>
															<br>
															<p>When someone visits your website, WordPress first loads its core files and then loads all yours. <b style="color: brown;">Be careful to load a library, make sure other scripts depending on it will still work</b>. The following 3rd party libraries are included with WordPress: Backbone.js, CodeMirror, cropper, jQuery, jQuery.imageareaselect, jQuery.Jcrop, jQueryUI, swfupload (deprecated), ThickBox and TinyMCE. Make sure to input full URL. Only <b><i>.css</i></b> and  <b><i> .js </i></b> extensions allowed. All scripts or styles are adding in the header or top of your selected page.</p>
														</div>',
									),
									array(
										'id'         => 'acc_library_bootstrap_load',
										'type'       => 'switcher',
										'before'     => __( '<h4>Load Bootstrap</h4>', 'acc-conditional-typo' ),
										'class'      => 'acc--inline-block-fields',
										'text_on'    => __( 'Load', 'acc-conditional-typo' ),
										'text_off'   => __( 'Unload', 'acc-conditional-typo' ),
										'text_width' => 85,
										'default'    => false,
									),
									array(
										'id'         => 'acc_library_fontawesome_load',
										'type'       => 'switcher',
										'before'     => __( '<h4>Load FontAwesome5</h4>', 'acc-conditional-typo' ),
										'class'      => 'acc--inline-block-fields',
										'text_on'    => __( 'Load', 'acc-conditional-typo' ),
										'text_off'   => __( 'Unload', 'acc-conditional-typo' ),
										'text_width' => 85,
										'default'    => false,
									),
									array(
										'id'         => 'acc_library_animatecss_load',
										'type'       => 'switcher',
										'before'     => __( '<h4>Load Animate.css</h4>', 'acc-conditional-typo' ),
										'class'      => 'acc--inline-block-fields',
										'text_on'    => __( 'Load', 'acc-conditional-typo' ),
										'text_off'   => __( 'Unload', 'acc-conditional-typo' ),
										'text_width' => 85,
										'default'    => false,
									),
									array(
										'id'         => 'acc_library_vuejs_load',
										'type'       => 'switcher',
										'before'     => __( '<h4>Load Vue.js</h4>', 'acc-conditional-typo' ),
										'class'      => 'acc--inline-block-fields',
										'text_on'    => __( 'Load', 'acc-conditional-typo' ),
										'text_off'   => __( 'Unload', 'acc-conditional-typo' ),
										'text_width' => 85,
										'default'    => false,
									),
									array(
										'id'      => 'acc_lib_load_repeater',
										'type'    => 'repeater',
										'fields'  => array(

											array(
												'id'         => 'acc_is_lib_cdn_load',
												'type'       => 'switcher',
												'title'      => __( 'Load This Link', 'acc-conditional-typo' ),
												'text_on'    => __( 'Load', 'acc-conditional-typo' ),
												'text_off'   => __( 'Unload', 'acc-conditional-typo' ),
												'text_width' => 85,
												'default'    => false,
											),
											array(
												'id'    => 'acc_lib_load_cdn_link',
												'type'  => 'text',
												'title' => __( 'CDN Link', 'acc-conditional-typo' ),
											),

										),

										'default' => array(
											array(
												'acc_is_lib_cdn_load'   => true,
												'acc_lib_load_cdn_link' => '',
											),
										),

									),

								),
							),

							//
							// Tab 4.
							//
							array(
								'title'  => 'Custom Code',
								'icon'   => 'fa fa-code',
								'fields' => array(
									array(
										'type'    => 'content',
										'content' => '<div class="wpgp--menu-detail">
															<strong>Custom Code</strong>
															<a href="https://forhad.net//support-forum/" target="_blank" class="wpgp--need-help">Need Help?</a>
															<br>
															<p>Only CSS and JS code editor are available here. If you want others you have to generate a shortcode via <b>Manage Code </b> option.</p>
														</div>',
									),
									array(
										'id'       => 'gpacc_code_editor_css',
										'type'     => 'code_editor',
										'before'   => __( '<h2>CSS Code Editor</h2>', 'acc-conditional-typo' ),
										'settings' => array(
											'theme' => 'mbo',
											'mode'  => 'css',
										),
									),
									array(
										'id'       => 'gpacc_code_editor_js',
										'type'     => 'code_editor',
										'before'   => __( '<h2>Javascript Code Editor</h2>', 'acc-conditional-typo' ),
										'settings' => array(
											'theme' => 'monokai',
											'mode'  => 'javascript',
										),
									),
								),
							),
						),
					),

				),
				'default'      => array(
					array(
						'acc_is_template' => array( '' ),
					),
				),
			),

		),
	)
);
