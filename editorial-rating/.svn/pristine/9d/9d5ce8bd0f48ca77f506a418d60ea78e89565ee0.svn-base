<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.

//
// Metabox of the POST
// Set a unique slug-like ID
//
$wpas_prefix_post_opts = '_wpas_er_options';

//
// Create a metabox
//
WPAS::createMetabox(
	$wpas_prefix_post_opts,
	array(
		'title'        => __( 'Editorial Rating Options', 'wpas_editorial_rating' ),
		'post_type'    => 'wpas_review',
		'show_restore' => true,
		'class'        => ( 'PRESTIGE' === WPASER_COPY ) ? 'wpgper--metabox-wrap wpas-copy-pro' : 'wpgper--metabox-wrap wpas-copy-lite',
	)
);

//
// Section : Appearance.
//
WPAS::createSection(
	$wpas_prefix_post_opts,
	array(
		'title'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M480 128V96h20c6.627 0 12-5.373 12-12V44c0-6.627-5.373-12-12-12h-40c-6.627 0-12 5.373-12 12v20H64V44c0-6.627-5.373-12-12-12H12C5.373 32 0 37.373 0 44v40c0 6.627 5.373 12 12 12h20v320H12c-6.627 0-12 5.373-12 12v40c0 6.627 5.373 12 12 12h40c6.627 0 12-5.373 12-12v-20h384v20c0 6.627 5.373 12 12 12h40c6.627 0 12-5.373 12-12v-40c0-6.627-5.373-12-12-12h-20V128zM96 276V140c0-6.627 5.373-12 12-12h168c6.627 0 12 5.373 12 12v136c0 6.627-5.373 12-12 12H108c-6.627 0-12-5.373-12-12zm320 96c0 6.627-5.373 12-12 12H236c-6.627 0-12-5.373-12-12v-52h72c13.255 0 24-10.745 24-24v-72h84c6.627 0 12 5.373 12 12v136z"/></svg> Appearance',
		'fields' => array(

			array(
				'id'       => 'wpas-theme-select',
				'type'     => 'image_select',
				'title'    => __( 'Theme Selection', 'wpas_editorial_rating' ),
				'subtitle' => __( 'Select a theme for Editorial Rating.<br><a href="https://demo.pluginic.com/editorial-rating/?ref=100" target="blank">See Demos →</a>', 'wpas_editorial_rating' ),
				'multiple' => false,
				'options'  => array(
					'value-1' => WPASER_DIR_URL_FILE . 'admin/img/theme-set/value-1.jpg',
					'value-2' => WPASER_DIR_URL_FILE . 'admin/img/theme-set/value-2.jpg',
					'value-3' => WPASER_DIR_URL_FILE . 'admin/img/theme-set/value-3.jpg',
					'value-4' => WPASER_DIR_URL_FILE . 'admin/img/theme-set/value-4.jpg',
					'value-5' => WPASER_DIR_URL_FILE . 'admin/img/theme-set/value-5.jpg',
					'value-6' => WPASER_DIR_URL_FILE . 'admin/img/theme-set/value-6.jpg',
					'value-7' => WPASER_DIR_URL_FILE . 'admin/img/theme-set/value-7.jpg',
					'value-8' => WPASER_DIR_URL_FILE . 'admin/img/theme-set/value-8.jpg',
					'value-9' => WPASER_DIR_URL_FILE . 'admin/img/theme-set/value-9.jpg',
				),
				'default'  => 'value-1',
				'class'    => 'wpas-theme-numb-list',
			),
			array(
				'type'       => 'content',
				'content'    => '<img src="' . WPASER_DIR_URL_FILE . 'admin/img/theme-set/demo-1.jpg">',
				'class'      => 'wpas-theme-prev-list',
				'dependency' => array( 'wpas-theme-select', '==', 'value-1' ),
			),
			array(
				'type'       => 'content',
				'content'    => '<img src="' . WPASER_DIR_URL_FILE . 'admin/img/theme-set/demo-2.jpg">',
				'class'      => 'wpas-theme-prev-list wpas-theme-pro',
				'dependency' => array( 'wpas-theme-select', '==', 'value-2' ),
			),
			array(
				'type'       => 'content',
				'content'    => '<img src="' . WPASER_DIR_URL_FILE . 'admin/img/theme-set/demo-3.jpg">',
				'class'      => 'wpas-theme-prev-list wpas-theme-pro',
				'dependency' => array( 'wpas-theme-select', '==', 'value-3' ),
			),
			array(
				'type'       => 'content',
				'content'    => '<img src="' . WPASER_DIR_URL_FILE . 'admin/img/theme-set/demo-4.jpg">',
				'class'      => 'wpas-theme-prev-list wpas-theme-pro',
				'dependency' => array( 'wpas-theme-select', '==', 'value-4' ),
			),
			array(
				'type'       => 'content',
				'content'    => '<img src="' . WPASER_DIR_URL_FILE . 'admin/img/theme-set/demo-5.jpg">',
				'class'      => 'wpas-theme-prev-list wpas-theme-pro',
				'dependency' => array( 'wpas-theme-select', '==', 'value-5' ),
			),
			array(
				'type'       => 'content',
				'content'    => '<img src="' . WPASER_DIR_URL_FILE . 'admin/img/theme-set/demo-6.jpg">',
				'class'      => 'wpas-theme-prev-list wpas-theme-pro',
				'dependency' => array( 'wpas-theme-select', '==', 'value-6' ),
			),
			array(
				'type'       => 'content',
				'content'    => '<img src="' . WPASER_DIR_URL_FILE . 'admin/img/theme-set/demo-7.png">',
				'class'      => 'wpas-theme-prev-list wpas-theme-pro',
				'dependency' => array( 'wpas-theme-select', '==', 'value-7' ),
			),
			array(
				'type'       => 'content',
				'content'    => '<img src="' . WPASER_DIR_URL_FILE . 'admin/img/theme-set/demo-8.png">',
				'class'      => 'wpas-theme-prev-list wpas-theme-pro',
				'dependency' => array( 'wpas-theme-select', '==', 'value-8' ),
			),
			array(
				'type'       => 'content',
				'content'    => '<img src="' . WPASER_DIR_URL_FILE . 'admin/img/theme-set/demo-9.png">',
				'class'      => 'wpas-theme-prev-list wpas-theme-pro',
				'dependency' => array( 'wpas-theme-select', '==', 'value-9' ),
			),

			array(
				'id'         => 'wpas-max-width',
				'type'       => 'dimensions',
				'title'      => 'Maximum Width',
				'subtitle'   => __( 'Set maximum width of the section.', 'wpas_editorial_rating' ),
				'height'     => false,
				'width_icon' => '',
				'default'    => array(
					'width' => '900',
					'unit'  => 'px',
				),
			),

			array(
				'id'       => 'wpas-score-title',
				'type'     => 'text',
				'title'    => __( 'Title / Product Name', 'wpas_editorial_rating' ),
				'subtitle' => __( 'Set an Editorial Rating title for this post.', 'wpas_editorial_rating' ),
				'default'  => 'A product review summary including key information.',
			),

			array(
				'id'         => 'wpas-author-designation',
				'type'       => 'text',
				'title'      => __( 'Author Designation', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'Set an author designation for this post.', 'wpas_editorial_rating' ),
				'default'    => 'Expert on this subject.',
				'dependency' => array( 'wpas-theme-select', '==', 'value-3' ),
			),

			array(
				'id'       => 'wpas-score-overview',
				'type'     => 'wp_editor',
				'title'    => __( 'Overview/Bottomline', 'wpas_editorial_rating' ),
				'subtitle' => __( 'Provide a general review or summary of the product. If this field is left blank, the Overview/Bottomline will not be displayed.', 'wpas_editorial_rating' ),
				'default'  => 'The Canon EOS Rebel T8i is a simple APS-C DSLR camera. It has an autofocus system that does an exceptional job during still photography.',
			),

			array(
				'id'             => 'wpas-banner-image',
				'type'           => 'media',
				'title'          => __( 'Banner Image', 'wpas_editorial_rating' ),
				'subtitle'       => __( 'Set a banner image form the media.', 'wpas_editorial_rating' ),
				'library'        => 'image',
				'url'            => false,
				'preview_size'   => 'full',
				'preview_width'  => '400',
				'preview_height' => '178',
				'default'        => array(
					'url'       => WPASER_DIR_URL_FILE . 'admin/img/dummy-prod-banner.jpg',
					'thumbnail' => WPASER_DIR_URL_FILE . 'admin/img/dummy-prod-banner.jpg',
				),
				'dependency'     => array( 'wpas-theme-select', '==', 'value-5' ),
			),

			array(
				'id'             => 'wpas-product-image',
				'type'           => 'media',
				'title'          => __( 'Product Image', 'wpas_editorial_rating' ),
				'subtitle'       => __( 'Set a product image form the media.', 'wpas_editorial_rating' ),
				'library'        => 'image',
				'url'            => false,
				'preview_size'   => 'full',
				'preview_width'  => '200',
				'preview_height' => '200',
				'default'        => array(
					'url'       => WPASER_DIR_URL_FILE . 'admin/img/product-image.png',
					'thumbnail' => WPASER_DIR_URL_FILE . 'admin/img/product-image.png',
				),
			),
			array(
				'id'         => 'wpas-product-image-gallery',
				'type'       => 'gallery',
				'title'      => 'Product Image Gallery',
				'after'      => '<ul class="wpas-img-gallery-dummy">
					<li><img src="' . WPASER_DIR_URL_FILE . 'admin/img/t-shirt/tshirt-1.jpg"></li>
					<li><img src="' . WPASER_DIR_URL_FILE . 'admin/img/t-shirt/tshirt-2.jpg"></li>
					<li><img src="' . WPASER_DIR_URL_FILE . 'admin/img/t-shirt/tshirt-3.jpg"></li>
					<li><img src="' . WPASER_DIR_URL_FILE . 'admin/img/t-shirt/tshirt-4.jpg"></li>
				</ul>',
				'subtitle'   => __( 'Select images to create a product gallery.', 'wpas_editorial_rating' ),
				'dependency' => array( 'wpas-theme-select', 'any', 'value-7,value-8' ),
				'class'      => 'wpas-pro-img-gallery',
			),

			array(
				'id'         => 'wpas-editorial-date-show',
				'type'       => 'switcher',
				'title'      => __( 'Show/Hide Updated Date', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'Show or hide updated date.', 'wpas_editorial_rating' ),
				'text_on'    => 'Show',
				'text_off'   => 'Hide',
				'text_width' => 80,
				'default'    => true,
			),
			array(
				'id'         => 'wpas-editorial-date-label',
				'type'       => 'text',
				'title'      => 'Date Label',
				'subtitle'   => 'Set a label to display before the title.',
				'default'    => 'Last Updated: ',
				'class'      => 'wpas-field-40-percent',
				'dependency' => array( 'wpas-editorial-date-show', '==', 'true' ),
			),
			array(
				'id'         => 'wpas-editorial-date-custom',
				'type'       => 'date',
				'title'      => 'Custom Date',
				'subtitle'   => 'Leave this field blank if you want to display the updated date from the post.',
				'settings'   => array(
					'dateFormat'      => 'd, M 20y',
					'changeMonth'     => true,
					'changeYear'      => true,
					'showWeek'        => true,
					'showButtonPanel' => true,
					'weekHeader'      => 'Week',
					'monthNamesShort' => array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ),
					'dayNamesMin'     => array( 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' ),
				),
				'dependency' => array( 'wpas-editorial-date-show', '==', 'true' ),
			),
			array(
				'id'           => 'wpas-feature-list',
				'type'         => 'repeater',
				'title'        => __( 'Feature List', 'wpas_editorial_rating' ),
				'subtitle'     => __( 'Set feature list for this product. Use \'Add More\' button to create more.', 'wpas_editorial_rating' ),
				'button_title' => 'Add More',
				'fields'       => array(

					array(
						'id'   => 'wpas-feature',
						'type' => 'text',
					),
				),
				'default'      => array(
					array(
						'wpas-feature' => 'Feature Sample 1',
					),
					array(
						'wpas-feature' => 'Feature Sample 2',
					),
					array(
						'wpas-feature' => 'Feature Sample 3',
					),
				),
				'dependency'    => array( 'wpas-theme-select', 'any', 'value-6,value-7' ),
			),
			array(
				'id'         => 'wpas-product-price',
				'type'       => 'text',
				'title'      => 'Price',
				'default'    => '$50',
				'dependency' => array( 'wpas-theme-select', '==', 'value-6' ),
			),
			array(
				'id'         => 'wpas-tag-best-for',
				'type'       => 'text',
				'title'      => 'Best for:',
				'default'    => 'Best for: Amateur, Family Photography, Low-Light Photography.',
				'dependency' => array( 'wpas-theme-select', '==', 'value-6' ),
			),

			array(
				'type'    => 'heading',
				'content' => __( '— Editorial Rating System —', 'wpas_editorial_rating' ),
			),

			array(
				'id'         => 'wpas-editorial-rating-show',
				'type'       => 'switcher',
				'title'      => __( 'Show/Hide Editorial Rating Bar', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'Show or hide editorial rating bar.', 'wpas_editorial_rating' ),
				'text_on'    => 'Show',
				'text_off'   => 'Hide',
				'text_width' => 80,
				'default'    => true,
			),

			array(
				'id'           => 'wpas-editorial-rating',
				'type'         => 'repeater',
				'title'        => __( 'Editorial Rating', 'wpas_editorial_rating' ),
				'subtitle'     => __( 'Set your product rating category & rate for this post. Use \'Add More\' button to create more.<br><br>Score Calculation: Total sum of each point / total rating category.', 'wpas_editorial_rating' ),
				'button_title' => 'Add More',
				'fields'       => array(

					array(
						'id'    => 'wpas-editorial-rating-category-name',
						'title' => __( 'Category Name', 'wpas_editorial_rating' ),
						'type'  => 'text',
					),
					array(
						'id'    => 'wpas-editorial-rating-category-rate',
						'title' => __( 'Category Rate', 'wpas_editorial_rating' ),
						'type'  => 'spinner',
						'min'   => 0,
						'max'   => 10,
					),

				),
				'default'      => array(
					array(
						'wpas-editorial-rating-category-name' => 'Features Rate (1)',
						'wpas-editorial-rating-category-rate' => 7,
					),
					array(
						'wpas-editorial-rating-category-name' => 'Features Rate (2)',
						'wpas-editorial-rating-category-rate' => 9,
					),
					array(
						'wpas-editorial-rating-category-name' => 'Features Rate (3)',
						'wpas-editorial-rating-category-rate' => 8,
					),
				),
				'dependency'   => array( 'wpas-editorial-rating-show', '==', 'true' ),
			),

			array(
				'id'         => 'wpas-bar-animation',
				'type'       => 'switcher',
				'title'      => __( 'Progress Bar Animation', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'Off/On progress bar animation.', 'wpas_editorial_rating' ),
				'default'    => true,
				'dependency' => array( 'wpas-editorial-rating-show', '==', 'true' ),
			),

			array(
				'type'    => 'heading',
				'content' => __( '— PROS CONS —', 'wpas_editorial_rating' ),
			),

			array(
				'id'       => 'wpas-pros-cons-shows',
				'type'     => 'switcher',
				'title'    => __( 'Show/Hide Pros-Cons.', 'wpas_editorial_rating' ),
				'subtitle' => __( 'Show or hide Pros-Cons.', 'wpas_editorial_rating' ),
				'default'  => true,
			),

			array(
				'id'          => 'wpas-pros-label',
				'type'        => 'text',
				'title'       => __( 'Custom Pros Label', 'wpas_editorial_rating' ),
				'subtitle'    => __( 'Type your custom Pros label.', 'wpas_editorial_rating' ),
				'placeholder' => 'E.g., Advantages',
				'dependency'  => array( 'wpas-pros-cons-shows', '==', 'true' ),
				'class'       => 'wpas-field-40-percent',
			),

			array(
				'id'           => 'wpas-pros',
				'type'         => 'repeater',
				'title'        => __( 'Advantages List (Pros)', 'wpas_editorial_rating' ),
				'subtitle'     => __( 'Set advantage list for this post. Use \'Add More\' button to create more.', 'wpas_editorial_rating' ),
				'button_title' => 'Add More',
				'fields'       => array(

					array(
						'id'   => 'wpas-pros-list',
						'type' => 'text',
					),

				),
				'default'      => array(
					array(
						'wpas-pros-list' => 'Advantage Sample 1',
					),
					array(
						'wpas-pros-list' => 'Advantage Sample 2',
					),
					array(
						'wpas-pros-list' => 'Advantage Sample 3',
					),
				),
				'dependency'   => array( 'wpas-pros-cons-shows', '==', 'true' ),
			),

			array(
				'id'          => 'wpas-cons-label',
				'type'        => 'text',
				'title'       => __( 'Custom Cons Label', 'wpas_editorial_rating' ),
				'subtitle'    => __( 'Type your custom Cons label.', 'wpas_editorial_rating' ),
				'placeholder' => 'E.g., Disadvantages',
				'dependency'  => array( 'wpas-pros-cons-shows', '==', 'true' ),
				'class'       => 'wpas-field-40-percent',
			),

			array(
				'id'           => 'wpas-cons',
				'type'         => 'repeater',
				'title'        => __( 'Disadvantages List (Cons)', 'wpas_editorial_rating' ),
				'subtitle'     => __( 'Set disadvantages list for this post. Use \'Add More\' button to create more.', 'wpas_editorial_rating' ),
				'button_title' => 'Add More',
				'fields'       => array(

					array(
						'id'   => 'wpas-cons-list',
						'type' => 'text',
					),

				),
				'default'      => array(
					array(
						'wpas-cons-list' => 'Disadvantage (1)',
					),
					array(
						'wpas-cons-list' => 'Disadvantage (2)',
					),
				),
				'dependency'   => array( 'wpas-pros-cons-shows', '==', 'true' ),
			),

			array(
				'type'    => 'heading',
				'content' => __( '— Button —', 'wpas_editorial_rating' ),
			),

			array(
				'id'         => 'wpas-product-btn-show',
				'type'       => 'switcher',
				'title'      => __( 'Show/Hide Product Button', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'Show or hide product button.', 'wpas_editorial_rating' ),
				'text_on'    => 'Show',
				'text_off'   => 'Hide',
				'text_width' => 80,
				'default'    => true,
			),
			array(
				'id'         => 'wpas-product-btn',
				'type'       => 'fieldset',
				'title'      => __( 'Product Link', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'Set Text, URL & Target of your product.', 'wpas_editorial_rating' ),
				'fields'     => array(
					array(
						'id'    => 'wpas-product-btn-text',
						'type'  => 'text',
						'title' => __( 'Link Text', 'wpas_editorial_rating' ),
					),
					array(
						'id'    => 'wpas-product-btn-link',
						'type'  => 'text',
						'title' => __( 'Link URL', 'wpas_editorial_rating' ),
					),
					array(
						'id'    => 'wpas-product-btn-target',
						'type'  => 'checkbox',
						'label' => __( ' Open link in a new tab', 'wpas_editorial_rating' ),
					),
					array(
						'id'    => 'wpas-product-btn-nofollow',
						'type'  => 'checkbox',
						'label' => __( ' Turn the button link into a nofollow.', 'wpas_editorial_rating' ),
					),
				),
				'default'    => array(
					'wpas-product-btn-text'     => 'Buy Now',
					'wpas-product-btn-link'     => 'https://amazon.com/',
					'wpas-product-btn-target'   => true,
					'wpas-product-btn-nofollow' => true,
				),
			),
			array(
				'id'         => 'wpas-product-name-linked',
				'type'       => 'switcher',
				'title'      => __( 'Product Name Linked?', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'Product link at product name.', 'wpas_editorial_rating' ),
				'text_on'    => 'Yes',
				'text_off'   => 'No',
				'text_width' => 70,
				'default'    => true,
			),
			array(
				'id'         => 'wpas-product-img-linked',
				'type'       => 'switcher',
				'title'      => __( 'Product Image Linked?', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'Product link at product image.', 'wpas_editorial_rating' ),
				'text_on'    => 'Yes',
				'text_off'   => 'No',
				'text_width' => 70,
				'default'    => true,
			),

			array(
				'type'    => 'heading',
				'content' => __( '— User Rating —', 'wpas_editorial_rating' ),
			),
			array(
				'id'         => 'wpas-user-rating-shows',
				'type'       => 'switcher',
				'title'      => __( 'Show/Hide User Rating', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'Show or hide User Rating at the bottom of review section.', 'wpas_editorial_rating' ),
				'text_on'    => 'Show',
				'text_off'   => 'Hide',
				'text_width' => 80,
				'default'    => true,
				'class'      => 'wpas-field-switcher-pro',
			),
			array(
				'id'         => 'wpas-user-rating-pre-txt',
				'type'       => 'text',
				'title'      => __( 'User Rating Pre Text', 'wpas_editorial_rating' ),
				'subtitle'   => __( 'Set user rating pre text at bottom.', 'wpas_editorial_rating' ),
				'default'    => 'Thank you for taking part in our survey',
				'dependency' => array( 'wpas-user-rating-shows', '==', 'true' ),
				'class'      => 'wpas-field-text-pro',
			),

		),
	)
);

//
// Section : Colors.
//
WPAS::createSection(
	$wpas_prefix_post_opts,
	array(
		'title'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M512 256c0 .9 0 1.8 0 2.7c-.4 36.5-33.6 61.3-70.1 61.3H344c-26.5 0-48 21.5-48 48c0 3.4 .4 6.7 1 9.9c2.1 10.2 6.5 20 10.8 29.9c6.1 13.8 12.1 27.5 12.1 42c0 31.8-21.6 60.7-53.4 62c-3.5 .1-7 .2-10.6 .2C114.6 512 0 397.4 0 256S114.6 0 256 0S512 114.6 512 256zM128 288c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32zm0-96c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32zM288 96c0-17.7-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32s32-14.3 32-32zm96 96c17.7 0 32-14.3 32-32s-14.3-32-32-32s-32 14.3-32 32s14.3 32 32 32z"/></svg> Colors',
		'fields' => array(

			array(
				'type'    => 'content',
				'content' => '<div style="position: relative;border: 2px dashed #9C27B0;padding: 20px;text-align: center;font-size: 17px;text-shadow: 1px 1px 1px #9C27B0;">Color options are only available for PRO version.<span style="position: absolute;left: -2px;top: -2px;background: #9C27B0;color: #fff;font-size: 13px;padding: 3px 17px;">PRO Features</span></div>',
				'class'   => 'wpas-section-noty-for-pro',
			),
			array(
				'id'       => 'wpas-header-bg-color',
				'type'     => 'color',
				'title'    => __( 'Header Background Color', 'wpas_editorial_rating' ),
				'subtitle' => __( 'Set color for header.', 'wpas_editorial_rating' ),
				'class'    => 'wpas-no-transparent-slider',
				'default'  => '#f1f1f1',
			),
			array(
				'id'       => 'wpas-product-title-color',
				'type'     => 'color',
				'title'    => __( 'Title/Product Name Color', 'wpas_editorial_rating' ),
				'subtitle' => __( 'Set color for title or product name.', 'wpas_editorial_rating' ),
				'default'  => '#000000',
			),
			array(
				'id'       => 'wpas-product-overview-color',
				'type'     => 'color',
				'title'    => __( 'Overview Content Color', 'wpas_editorial_rating' ),
				'subtitle' => __( 'Set color for overview content.', 'wpas_editorial_rating' ),
				'default'  => '#000000',
			),
			array(
				'id'       => 'wpas-rating-category-colors',
				'type'     => 'color_group',
				'title'    => __( 'Rating Category Colors', 'wpas_editorial_rating' ),
				'subtitle' => __( 'Set colors for rating category.', 'wpas_editorial_rating' ),
				'options'  => array(
					'rating-category' => __( 'Rating Category', 'wpas_editorial_rating' ),
					'rating-rate'     => __( 'Rating Rate', 'wpas_editorial_rating' ),
					'rating-bar'      => __( 'Rating Bar', 'wpas_editorial_rating' ),
				),
				'default'  => array(
					'rating-category' => '#000000',
					'rating-rate'     => '#E43917',
					'rating-bar'      => '#E43917',
				),
			),
			array(
				'id'       => 'wpas-pcb-title-colors',
				'type'     => 'color_group',
				'title'    => __( 'Pros/Cons/Bottomline Title Colors', 'wpas_editorial_rating' ),
				'subtitle' => __( 'Set colors for Pros, Cons, or Bottomline title.', 'wpas_editorial_rating' ),
				'options'  => array(
					'pros'  => __( 'Pros', 'wpas_editorial_rating' ),
					'cons'  => __( 'Cons', 'wpas_editorial_rating' ),
					'bline' => __( 'Bottomline', 'wpas_editorial_rating' ),
				),
				'default'  => array(
					'pros'  => '#58c649',
					'cons'  => '#f24f4f',
					'bline' => '#222222',
				),
			),
			array(
				'id'       => 'wpas-pcb-content-colors',
				'type'     => 'color_group',
				'title'    => __( 'Pros/Cons/Bottomline Content Colors', 'wpas_editorial_rating' ),
				'subtitle' => __( 'Set colors for Pros, Cons, or Bottomline\' content.', 'wpas_editorial_rating' ),
				'options'  => array(
					'pros'  => __( 'Pros', 'wpas_editorial_rating' ),
					'cons'  => __( 'Cons', 'wpas_editorial_rating' ),
					'bline' => __( 'Bottomline', 'wpas_editorial_rating' ),
				),
				'default'  => array(
					'pros'  => '#333333',
					'cons'  => '#333333',
					'bline' => '#333333',
				),
			),
			array(
				'id'       => 'wpas-btn-colors',
				'type'     => 'color_group',
				'title'    => __( 'Buy Now Button Colors', 'wpas_editorial_rating' ),
				'subtitle' => __( 'Set colors for buy now button.', 'wpas_editorial_rating' ),
				'options'  => array(
					'text'       => __( 'Text', 'wpas_editorial_rating' ),
					'background' => __( 'Background', 'wpas_editorial_rating' ),
					'text_hover' => __( 'Text on Hover', 'wpas_editorial_rating' ),
					'bg_hover'   => __( 'Background on Hover', 'wpas_editorial_rating' ),
				),
				'default'  => array(
					'text'       => '#ffffff',
					'background' => '#da291c',
					'text_hover' => '#ffffff',
					'bg_hover'   => '#da291c',
				),
			),
			array(
				'id'       => 'wpas-user-rating-colors',
				'type'     => 'color_group',
				'title'    => __( 'User Rating Colors', 'wpas_editorial_rating' ),
				'subtitle' => __( 'Set colors for user rating.', 'wpas_editorial_rating' ),
				'options'  => array(
					'text'  => __( 'Text', 'wpas_editorial_rating' ),
					'stars' => __( 'Stars', 'wpas_editorial_rating' ),
				),
				'default'  => array(
					'text'  => '#222222',
					'stars' => '#ffc107',
				),
			),

		),
	)
);

//
// Section : Typography.
//
WPAS::createSection(
	$wpas_prefix_post_opts,
	array(
		'title'  => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M192 32h64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H384l0 352c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-352H288V448c0 17.7-14.3 32-32 32s-32-14.3-32-32V352H192c-88.4 0-160-71.6-160-160s71.6-160 160-160z"/></svg> Typography',
		'fields' => array(

			array(
				'type'    => 'content',
				'content' => '<div style="position: relative;border: 2px dashed #9C27B0;padding: 20px;text-align: center;font-size: 17px;text-shadow: 1px 1px 1px #9C27B0;">Typography options are only available for PRO version.<span style="position: absolute;left: -2px;top: -2px;background: #9C27B0;color: #fff;font-size: 13px;padding: 3px 17px;">PRO Features</span></div>',
				'class'   => 'wpas-section-noty-for-pro',
			),
			array(
				'id'             => 'wpas-heading-ff',
				'type'           => 'typography',
				'title'          => __( 'Heading Font Family', 'wpas_editorial_rating' ),
				'subtitle'       => __( 'Select a font family for all heading.', 'wpas_editorial_rating' ),
				'preview'        => 'always',
				'font_style'     => false,
				'subset'         => false,
				'text_align'     => false,
				'text_transform' => false,
				'font_size'      => false,
				'line_height'    => false,
				'letter_spacing' => false,
				'color'          => false,
				'preview_text'   => 'Product review summary, Pros-Cons, Bottomline',
				'class'          => 'wpas--heading-ff',
			),
			array(
				'id'             => 'wpas-body-ff',
				'type'           => 'typography',
				'title'          => __( 'Body Font Family', 'wpas_editorial_rating' ),
				'subtitle'       => __( 'Select a font family for Editorial Rating body content.', 'wpas_editorial_rating' ),
				'preview'        => 'always',
				'font_style'     => false,
				'subset'         => false,
				'text_align'     => false,
				'text_transform' => false,
				'font_size'      => false,
				'line_height'    => false,
				'letter_spacing' => false,
				'color'          => false,
				'preview_text'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
				'class'          => 'wpas--heading-ff',
			),
			array(
				'id'          => 'wpas-product-title-typo',
				'type'        => 'spacing',
				'title'       => __( 'Title / Product Name Typography', 'wpas_editorial_rating' ),
				'subtitle'    => __( 'Set typography for the product title/name.', 'wpas_editorial_rating' ),
				'top_icon'    => __( 'Font Size', 'wpas_editorial_rating' ),
				'right_icon'  => __( 'Line Height', 'wpas_editorial_rating' ),
				'bottom_icon' => __( 'Letter Spacing', 'wpas_editorial_rating' ),
				'left_icon'   => __( 'Font Weight', 'wpas_editorial_rating' ),
				'default'     => array(
					'top'    => '22', // Font Size.
					'right'  => '26', // Line Height.
					'bottom' => '0', // Letter Spacing.
					'left'   => '700', // Font Weight.
					'unit'   => 'px',
				),
				'class'       => 'wpas--spacing',
			),
			array(
				'id'          => 'wpas-product-overview-typo',
				'type'        => 'spacing',
				'title'       => __( 'Overview Typography', 'wpas_editorial_rating' ),
				'subtitle'    => __( 'Set typography for the overview.', 'wpas_editorial_rating' ),
				'top_icon'    => __( 'Font Size', 'wpas_editorial_rating' ),
				'right_icon'  => __( 'Line Height', 'wpas_editorial_rating' ),
				'bottom_icon' => __( 'Letter Spacing', 'wpas_editorial_rating' ),
				'left_icon'   => __( 'Font Weight', 'wpas_editorial_rating' ),
				'default'     => array(
					'top'    => '15', // Font Size.
					'right'  => '20', // Line Height.
					'bottom' => '0', // Letter Spacing.
					'left'   => '400', // Font Weight.
					'unit'   => 'px',
				),
				'class'       => 'wpas--spacing',
			),
			array(
				'id'          => 'wpas-rating-category-typo',
				'type'        => 'spacing',
				'title'       => __( 'Rating Category', 'wpas_editorial_rating' ),
				'subtitle'    => __( 'Set typography for the rating category.', 'wpas_editorial_rating' ),
				'top_icon'    => __( 'Font Size', 'wpas_editorial_rating' ),
				'right_icon'  => __( 'Line Height', 'wpas_editorial_rating' ),
				'bottom_icon' => __( 'Letter Spacing', 'wpas_editorial_rating' ),
				'left_icon'   => __( 'Font Weight', 'wpas_editorial_rating' ),
				'default'     => array(
					'top'    => '16', // Font Size.
					'right'  => '20', // Line Height.
					'bottom' => '0', // Letter Spacing.
					'left'   => '700', // Font Weight.
					'unit'   => 'px',
				),
				'class'       => 'wpas--spacing',
			),
			array(
				'id'          => 'wpas-rating-rate-typo',
				'type'        => 'spacing',
				'title'       => __( 'Rating Rate', 'wpas_editorial_rating' ),
				'subtitle'    => __( 'Set typography for the rating rate.', 'wpas_editorial_rating' ),
				'top_icon'    => __( 'Font Size', 'wpas_editorial_rating' ),
				'right_icon'  => __( 'Line Height', 'wpas_editorial_rating' ),
				'bottom_icon' => __( 'Letter Spacing', 'wpas_editorial_rating' ),
				'left_icon'   => __( 'Font Weight', 'wpas_editorial_rating' ),
				'default'     => array(
					'top'    => '16', // Font Size.
					'right'  => '20', // Line Height.
					'bottom' => '0', // Letter Spacing.
					'left'   => '700', // Font Weight.
					'unit'   => 'px',
				),
				'class'       => 'wpas--spacing',
			),
			array(
				'id'          => 'wpas-product-pcb-title-typo',
				'type'        => 'spacing',
				'title'       => __( 'Pros/Cons/Bottomline Title', 'wpas_editorial_rating' ),
				'subtitle'    => __( 'Set typography for pros-cons or bottomline.', 'wpas_editorial_rating' ),
				'top_icon'    => __( 'Font Size', 'wpas_editorial_rating' ),
				'right_icon'  => __( 'Line Height', 'wpas_editorial_rating' ),
				'bottom_icon' => __( 'Letter Spacing', 'wpas_editorial_rating' ),
				'left_icon'   => __( 'Font Weight', 'wpas_editorial_rating' ),
				'default'     => array(
					'top'    => '20', // Font Size.
					'right'  => '20', // Line Height.
					'bottom' => '0', // Letter Spacing.
					'left'   => '700', // Font Weight.
					'unit'   => 'px',
				),
				'class'       => 'wpas--spacing',
			),
			array(
				'id'          => 'wpas-product-pcb-typo',
				'type'        => 'spacing',
				'title'       => __( 'Pros/Cons/Bottomline Content', 'wpas_editorial_rating' ),
				'subtitle'    => __( 'Set typography for pros-cons or bottomline content.', 'wpas_editorial_rating' ),
				'top_icon'    => __( 'Font Size', 'wpas_editorial_rating' ),
				'right_icon'  => __( 'Line Height', 'wpas_editorial_rating' ),
				'bottom_icon' => __( 'Letter Spacing', 'wpas_editorial_rating' ),
				'left_icon'   => __( 'Font Weight', 'wpas_editorial_rating' ),
				'default'     => array(
					'top'    => '16', // Font Size.
					'right'  => '24', // Line Height.
					'bottom' => '0', // Letter Spacing.
					'left'   => '400', // Font Weight.
					'unit'   => 'px',
				),
				'class'       => 'wpas--spacing',
			),
			array(
				'id'          => 'wpas-product-btn-typo',
				'type'        => 'spacing',
				'title'       => __( 'Buy Now Button Typography', 'wpas_editorial_rating' ),
				'subtitle'    => __( 'Set typography for buy now button.', 'wpas_editorial_rating' ),
				'top_icon'    => __( 'Font Size', 'wpas_editorial_rating' ),
				'right_icon'  => __( 'Line Height', 'wpas_editorial_rating' ),
				'bottom_icon' => __( 'Letter Spacing', 'wpas_editorial_rating' ),
				'left_icon'   => __( 'Font Weight', 'wpas_editorial_rating' ),
				'default'     => array(
					'top'    => '15', // Font Size.
					'right'  => '15', // Line Height.
					'bottom' => '0', // Letter Spacing.
					'left'   => '700', // Font Weight.
					'unit'   => 'px',
				),
				'class'       => 'wpas--spacing',
			),

		),
	)
);

//
// Section : User Rating.
// Hidden mode.
//
WPAS::createSection(
	$wpas_prefix_post_opts,
	array(
		'title'  => 'User Rating (Hidden section)',
		'class'  => 'wpas-user-rating-tab',
		'fields' => array(

			array(
				'id'      => 'wpas-total-vote',
				'type'    => 'text',
			),
			array(
				'id'      => 'wpas-total-star',
				'type'    => 'text',
			),
			array(
				'id'      => 'wpas-post-er',
				'type'    => 'text',
			),
		),
	),
);

/**
 * Shortcode.
 */
$prefix_shortcode_opts = '_wpas_shortcode_options';

WPAS::createMetabox(
	$prefix_shortcode_opts,
	array(
		'title'     => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><rect x="0" fill="none" width="20" height="20"/><g><path d="M6 14H4V6h2V4H2v12h4M7.1 17h2.1l3.7-14h-2.1M14 4v2h2v8h-2v2h4V4"/></g></svg>Shortcode',
		'post_type' => 'wpas_review',
		'context'   => 'side',
	)
);

if ( isset( $_GET['post'] ) ) {

	WPAS::createSection(
		$prefix_shortcode_opts,
		array(
			'fields' => array(

				array(
					'type' => 'shortcode',
				),
			),
		)
	);
} else {

	WPAS::createSection(
		$prefix_shortcode_opts,
		array(
			'fields' => array(

				array(
					'type'    => 'content',
					'content' => 'Shortcode will appear here after publishing.',
				),

			),
		)
	);
}
