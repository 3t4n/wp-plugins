<?php
?>

<div id="woocommerce-coupon-data">
    <div id="coupon_options" class="panel-wrap coupon_data">

        <div class="wc-tabs-back"></div>
        <ul class="coupon_data_tabs wc-tabs" style="display:none;">
			<?php
			$bump_data_tabs = array
			(
				'promotion' => array
				(
					'label'  => __( "Promotion", 'molongui-bump-offer' ),
					'target' => 'bump_promotion_tab',
					'class'  => '',
				),
				'content' => array
				(
					'label'  => __( "Content", 'molongui-bump-offer' ),
					'target' => 'bump_content_tab',
					'class'  => '',
				),
				'media' => array
				(
					'label'  => __( "Media", 'molongui-bump-offer' ),
					'target' => 'bump_media_tab',
					'class'  => '',
				),
				'location' => array
				(
					'label'  => __( "Location", 'molongui-bump-offer' ),
					'target' => 'bump_location_tab',
					'class'  => '',
				),
				'cart' => array
				(
					'label'  => __( "Cart Conditions", 'molongui-bump-offer' ),
					'target' => 'bump_cart_tab',
					'class'  => '',
				),
				'schedule' => array
				(
					'label'  => __( "Flash Sale", 'molongui-bump-offer' ),
					'target' => 'bump_schedule_tab',
					'class'  => '',
				),
            );
            $bump_data_tabs = apply_filters( 'mbo/bump/tabs', $bump_data_tabs );

			foreach ( $bump_data_tabs as $key => $tab ) : ?>
                <li class="<?php echo $key; ?>_options <?php echo $key; ?>_tab <?php echo implode( ' ' , (array) $tab['class'] ); ?>">
                    <a href="#<?php echo $tab['target']; ?>"><span><?php echo esc_html( $tab['label'] ); ?></span></a>
                </li>
			<?php endforeach; ?>
        </ul>

        <!-- Promotion tab -->
        <div id="bump_promotion_tab" class="panel woocommerce_options_panel">

            <div class="options_group">

                <!-- Sales Promotion Type -->
                <?php
                $input_value = mbo_get_setting_value( $bump, 'type', $options, $defaults, true );
                mbo_wp_select( array
                (
                    'id'                => '_molongui_deal_type',
                    'value'             => $input_value,
                    'label'             => __( "Sale Type", 'molongui-bump-offer' ) . mbo_premium_tag(),
                    'options'           => mbo_get_deal_types( 'dropdown' ),
                    'desc_tip'          => 'true',
                    'description'       => ( apply_filters( 'mbo/display/pro/tag', true ) ? sprintf( __( "%sPREMIUM SETTING%s", 'molongui-bump-offer' ), '<strong><u>', '</u></strong> - ' ) : '' ) . __( "Sales Promotion Type. Pick the type of promotion that best suits your sales strategy", 'molongui-bump-offer' ),
                    'wrapper_class'     => 'br-desc',
                    'custom_attributes' => array
                    (
                        'data-user-input' => $input_value,
                    ),
                )); ?>

            </div><div class="options_group">

                <!-- Product -->
                <p class="form-field _molongui_bump_product_field">
                    <label for="_molongui_bump_product"><?php _e( "Product", 'molongui-bump-offer' ); ?></label>
                    <select class="wc-product-search" style="width: 50%;" id="_molongui_bump_product" name="_molongui_bump_product" data-placeholder="<?php esc_attr_e( "Search for a product&hellip;", 'molongui-bump-offer' ); ?>" data-action="woocommerce_json_search_products_and_variations">
                        <?php
                        if ( !empty( $bump->_molongui_bump_product ) )
                        {
                            $product = wc_get_product( $bump->_molongui_bump_product );
                            ?>
                            <option value="<?php echo esc_attr( $bump->_molongui_bump_product ); ?>"<?php echo selected( true, true, false ); ?>><?php echo wp_kses_post( $product->get_formatted_name() ); ?></option>
                            <?php
                        } ?>
                    </select>
                    <?php echo wc_help_tip( __( "Promoted product. Pick the product the customer will get if the deal is taken.", 'molongui-bump-offer' ) ); ?>
                </p>

                <?php
                $input_value = mbo_get_setting_value( $bump, 'price_criteria', $options, $defaults, true );
                woocommerce_wp_select( array
                (
                    'id'                => '_molongui_deal_price_criteria',
                    'value'             => $input_value,
                    'label'             => __( "Price", 'molongui-bump-offer' ),
                    'desc_tip'          => true,
                    'description'       => __( "Choose the price at which the promoted product is made available. If sale price wasn't set, regular would be used.", 'molongui-bump-offer' ),
                    'options'           => array
                    (
                        'regular'  => __( "Regular price from product" , 'molongui-bump-offer' ),
                        'sale'     => __( "Sale price from product", 'molongui-bump-offer' ),
                        'custom'   => __( "Custom price", 'molongui-bump-offer' ),
                        'discount' => __( "Custom discount off regular price", 'molongui-bump-offer' ),
                    ),
                    'custom_attributes' => array
                    (
                        'data-user-input' => $input_value,
                    ),
                ));
                $input_value = mbo_get_setting_value( $bump, 'price', $options, $defaults, true );
                woocommerce_wp_text_input( array
                (
                    'id'                => '_molongui_bump_price',
                    'value'             => $input_value,
                    'label'             => __( "Sale Price", 'molongui-bump-offer' ),
                    'placeholder'       => wc_format_localized_price( 0 ),
                    'description'       => __( "Sale price for the promoted product. If configured quantity is bigger than 1, this amount gets multiplied by that value", 'molongui-bump-offer' ),
                    'data_type'         => 'price',
                    'desc_tip'          => true,
                    'custom_attributes' => array
                    (
                        'data-user-input' => $input_value,
                    ),
                ));
                $input_value = mbo_get_setting_value( $bump, 'quantity', $options, $defaults, true );
                ob_start();
                woocommerce_wp_text_input( array
                (
                    'id'                => '_molongui_deal_quantity',
                    'value'             => $input_value,
                    'label'             => __( "Quantity", 'molongui-bump-offer' ) . mbo_premium_tag(),
                    'desc_tip'          => true,
                    'description'       => __( "Number of products to add to the order if the customer takes the deal", 'molongui-bump-offer' ),
                    'type'              => 'number',
                    'data_type'         => 'stock',
                    'class'             => 'mbo_disabled_field',
                    'custom_attributes' => array
                    (
                        'disabled'        => 'disabled',
                        'data-user-input' => $input_value,
                    ),
                ));
                echo apply_filters( 'mbo/deal/field/quantity', ob_get_clean(), $bump, $options, $defaults );

                echo '</div><div class="options_group">';
                ob_start();
                woocommerce_wp_checkbox( array
                (
                    'id'                => 'fid'.rand(),
                    'value'             => 0,
                    'label'             => __( "Upsell", 'molongui-bump-offer' ) . mbo_premium_tag(),
                    'description'       => __( "Enable this deal even if the promoted product is already in the Cart.", 'molongui-bump-offer' ),
                    'cbvalue'           => 1,
                    'class'             => 'checkbox mbo_disabled_field',
                    'custom_attributes' => array
                    (
                        'disabled'        => 'disabled',
                        'data-user-input' => 0,
                    ),
                ));
                echo apply_filters( 'mbo/deal/field/upsell', ob_get_clean(), $bump, $options, $defaults );
                ob_start();
                woocommerce_wp_select( array
                (
                    'id'                => 'fid'.rand(),
                    'value'             => 0,
                    'label'             => __( "Auto Add", 'molongui-bump-offer' ) . mbo_premium_tag(),
                    'desc_tip'          => true,
                    'description'       => sprintf( __( "%sPREMIUM SETTING%s", 'molongui-bump-offer' ), '<strong><u>', '</u></strong> - ' ) . __( "Default checkbox state. Enabling this setting will add the deal to your customer's Cart automatically.", 'molongui-bump-offer' ),
                    'class'             => 'mbo_disabled_field',
                    'options'           => array
                    (
                        '0' => __( "No" , 'molongui-bump-offer' ),
                        ' ' => __( "Yes", 'molongui-bump-offer' ),
                    ),
                    'custom_attributes' => array
                    (
                        'disabled'        => 'disabled',
                        'data-user-input' => 0,
                    ),
                ));
                echo apply_filters( 'mbo/deal/field/autoadd', ob_get_clean(), $bump, $options, $defaults );
                ob_start();
                woocommerce_wp_checkbox( array
                (
                    'id'                => 'fid'.rand(),
                    'value'             => 0,
                    'label'             => __( "Hide Box", 'molongui-bump-offer' ) . mbo_premium_tag(),
                    'description'       => __( "Do not display anything. The deal will be automatically added to the customer's order and the deal box won't be displayed.", 'molongui-bump-offer' ),
                    'cbvalue'           => 1,
                    'class'             => 'checkbox mbo_disabled_field',
                    'custom_attributes' => array
                    (
                        'disabled'        => 'disabled',
                        'data-user-input' => 0,
                    ),
                ));
                echo apply_filters( 'mbo/deal/field/hide', ob_get_clean(), $bump, $options, $defaults );

                ?>

            </div><!-- End of .options_group -->

            <?php
            do_action( 'mbo/bump/settings', $bump->ID, $bump );
            if ( apply_filters( 'mbo/display/pro/hints', true ) ) : ?>
                <div class="molongui-bump-note-settings">
                    <div>
                        <?php echo sprintf( __( "Want to automatically add this deal to customer's order? The %sAuto Add%s setting automatically checks the checkbox so the deal is added without user action.", 'molongui-bump-offer' ), '<strong>', '</strong>' ); ?>
                    </div>
                </div>
            <?php endif;
            do_action( 'mbo/bump/notices', $bump->ID, $bump ); ?>

        </div><!-- /Promotion tab -->

        <!-- Content tab -->
        <div id="bump_content_tab" class="panel woocommerce_options_panel">

			<div class="options_group">

                <?php
                woocommerce_wp_text_input( array
                (
                    'id'          => '_molongui_bump_lead_text',
                    'label'       => __( "Lead", 'molongui-bump-offer' ),
                    'placeholder' => __( "Yes! I want it", 'molongui-bump-offer' ),
                    'description' => __( "Text to be displayed towards the checkbox.", 'molongui-bump-offer' ),
                    'data_type'   => 'text',
                    'desc_tip'    => true,
                    'value'       => mbo_get_setting_value( $bump, 'lead_text', $options, $defaults, true ),
                ));
                woocommerce_wp_text_input( array
                (
                    'id'          => '_molongui_deal_lead_text_alt',
                    'label'       => __( "Lead (checked)", 'molongui-bump-offer' ),
                    'placeholder' => __( "I don't want this", 'molongui-bump-offer' ),
                    'description' => __( "Text to be displayed towards the checkbox when the deal has been accepted (checkbox checked). Leave empty to keep regular text.", 'molongui-bump-offer' ),
                    'data_type'   => 'text',
                    'desc_tip'    => true,
                    'value'       => mbo_get_setting_value( $bump, 'lead_text_alt', $options, $defaults, true ),
                ));
                woocommerce_wp_text_input( array
                (
                    'id'          => '_molongui_bump_intro_text',
                    'label'       => __( "Intro", 'molongui-bump-offer' ),
                    'placeholder' => __( "ONE TIME OFFER! Only $1.", 'molongui-bump-offer' ),
                    'description' => __( "This field allows you to set the text that will be displayed highlighted before the offer text.", 'molongui-bump-offer' ),
                    'data_type'   => 'text',
                    'desc_tip'    => true,
                    'value'       => mbo_get_setting_value( $bump, 'intro_text', $options, $defaults, true ),
                ));
                woocommerce_wp_textarea_input( array
                (
                    'id'          => '_molongui_bump_body_text',
                    'label'       => __( "Body", 'molongui-bump-offer' ),
                    'placeholder' => __( "You can have access to this exclusive offer by ticking the box above. Click and add it to your order now for just $1. This offer is not available at any other time or place.", 'molongui-bump-offer' ),
                    'desc_tip'    => true,
                    'description' => __( "This field allows you to set the text that will be displayed as the deal message.", 'molongui-bump-offer' ),
                    'value'       => mbo_get_setting_value( $bump, 'body_text', $options, $defaults, true ),
                    'rows'        => '8',
                ));

                ?>
			</div><!-- End of .options_group -->

            <?php
            do_action( 'mbo/bump/display/settings', $bump->ID, $bump );
            if ( apply_filters( 'mbo/display/pro/hints', true ) ) : ?>
                <div class="molongui-bump-note-settings">
                    <div>
                        <?php echo sprintf( __( "HTML tags and shortcodes can be added to the body content only with the Pro extension of the plugin.%sDiscover Pro features%sthat help you sell more.", 'molongui-bump-offer' ), '&nbsp;<strong><a target="_blank" href="'.MOLONGUI_BUMP_OFFER_WEB.'" class="molongui-go-pro">', '</a></strong>&nbsp;' ); ?>
                    </div>
                </div>
            <?php endif;
			do_action( 'mbo/bump/display/notices', $bump->ID, $bump ); ?>

        </div><!-- /Content tab -->

        <!-- Media tab -->
        <div id="bump_media_tab" class="panel woocommerce_options_panel">

            <div class="options_group">

                <?php
                add_filter( 'esc_html', 'mbo_dont_esc_html', 10, 2 );
                woocommerce_wp_radio( array
                (
                    'id'          => '_molongui_bump_media_type',
                    'label'       => __( "Type", 'molongui-bump-offer' ),
                    'description' => __( "This allows you to add either an image or a video to your deal.", 'molongui-bump-offer' ),
                    'desc_tip'    => true,
                    'value'       => isset( $bump->_molongui_bump_media_type ) ? $bump->_molongui_bump_media_type : 'none',
                    'options'     => array
                    (
                        'none'  => __( "None" , 'molongui-bump-offer' ),
                        'image' => __( "Image", 'molongui-bump-offer' ),
                        'video' => __( "Video", 'molongui-bump-offer' ) . mbo_premium_tag(),
                    ),
                ));
                remove_filter( 'esc_html', 'mbo_dont_esc_html', 10 );
                ?>

                <p class="form-field _molongui_bump_image_field">
                    <label><?php _e( "Normal Image", 'molongui-bump-offer' ); ?></label>
                    <?php if ( current_user_can( 'upload_files' ) ) :

                        if ( !isset( $bump->_molongui_bump_image_id ) or !$bump->_molongui_bump_image_id ) $btn_text = __( "Upload New Image", 'molongui-bump-offer' );
                        else $btn_text = __( "Change Current Image", 'molongui-bump-offer' );
                        wp_enqueue_media(); ?>

                        <!-- Outputs the image after save -->
                        <span class="current_img">
                            <?php if ( !empty( $bump->_molongui_bump_image_url ) ) : ?>
                                <img src="<?php echo esc_url( $bump->_molongui_bump_image_url ); ?>" class="molongui_current_img">
                                <span class="edit_options uploaded">
                                    <a class="remove_img"><span><?php _e( "Remove", 'molongui-bump-offer' ); ?></span></a>
                                    <a href="<?php echo $bump->_molongui_bump_image_edit_url; ?>" class="edit_img" target="_blank"><span><?php _e( "Edit", 'molongui-bump-offer' ); ?></span></a>
                                </span>
                            <?php else : ?>
                                <img src="<?php echo MOLONGUI_BUMP_OFFER_URL . 'assets/img/placeholder.gif'; ?>" class="molongui_current_img placeholder">
                            <?php endif; ?>
                        </span>

                        <!-- Hold the value here of WPMU image -->
                        <span id="molongui_image_upload">
                            <input type="hidden" name="molongui_placeholder_meta"     id="molongui_placeholder_meta"     value="<?php echo MOLONGUI_BUMP_OFFER_URL . 'assets/img/placeholder.gif'; ?>" class="hidden" />
                            <input type="hidden" name="_molongui_bump_image_id"       id="_molongui_bump_image_id"       value="<?php echo ( isset( $bump->_molongui_bump_image_id ) ? $bump->_molongui_bump_image_id : '' ); ?>" class="hidden" />
                            <input type="hidden" name="_molongui_bump_image_url"      id="_molongui_bump_image_url"      value="<?php echo ( isset( $bump->_molongui_bump_image_url ) ? esc_url_raw( $bump->_molongui_bump_image_url ) : '' ); ?>" class="hidden" />
                            <input type="hidden" name="_molongui_bump_image_edit_url" id="_molongui_bump_image_edit_url" value="<?php echo ( isset( $bump->_molongui_bump_image_edit_url ) ? $bump->_molongui_bump_image_edit_url : '' ); ?>" class="hidden" />
                            <input type="button" class="molongui_wpmu_button button-primary" id="uploadimage" value="<?php _e( $btn_text, 'molongui-bump-offer' ); ?>"/>
                        </span>

                    <?php else : ?>

                    <?php if ( !empty( $bump->_molongui_bump_image_url ) ) : ?>
                        <img src="<?php echo esc_url( $bump->_molongui_bump_image_url ); ?>" class="molongui_current_img">
                    <?php else : ?>
                        <img src="<?php echo MOLONGUI_BUMP_OFFER_URL . 'assets/img/placeholder.gif'; ?>" class="molongui_current_img placeholder">
                    <?php endif; ?>
                    <div>
                        <p class="description"><?php _e( "You do not have permission to upload images. Please, contact the administrator of this site.", 'molongui-bump-offer' ); ?></p>
                    </div>

                    <?php endif; ?>
                </p>

                <p class="form-field _molongui_bump_image_hover_field">
                    <label><?php printf( __( "Hover Image%s", 'molongui-bump-offer' ), ' '.mbo_premium_tag() ); ?></label>
                    <?php if ( current_user_can( 'upload_files' ) ) :

                        if ( !isset( $bump->_molongui_bump_image_hover_id ) or !$bump->_molongui_bump_image_hover_id ) $btn_text = __( "Upload New Image", 'molongui-bump-offer' );
                        else $btn_text = __( "Change Current Image", 'molongui-bump-offer' );
                        wp_enqueue_media(); ?>

                        <!-- Outputs the image after save -->
                        <span class="current_img">
                            <?php if ( !empty( $bump->_molongui_bump_image_hover_url ) ) : ?>
                                <img src="<?php echo esc_url( $bump->_molongui_bump_image_hover_url ); ?>" class="molongui_current_img">
                                <span class="edit_options uploaded">
                                    <a class="remove_img"><span><?php _e( "Remove", 'molongui-bump-offer' ); ?></span></a>
                                    <a href="<?php echo $bump->_molongui_bump_image_hover_edit_url; ?>" class="edit_img" target="_blank"><span><?php _e( "Edit", 'molongui-bump-offer' ); ?></span></a>
                                </span>
                            <?php else : ?>
                                <img src="<?php echo MOLONGUI_BUMP_OFFER_URL . 'assets/img/placeholder.gif'; ?>" class="molongui_current_img placeholder">
                            <?php endif; ?>
                        </span>

                        <!-- Hold the value here of WPMU image -->
                        <span id="molongui_image_hover_upload">
                            <input type="hidden" name="molongui_placeholder_meta"            id="molongui_placeholder_meta"           value="<?php echo MOLONGUI_BUMP_OFFER_URL . 'assets/img/placeholder.gif'; ?>" class="hidden" />
                            <input type="hidden" name="_molongui_bump_image_hover_id"        id="_molongui_bump_image_hover_id"       value="<?php echo ( isset( $bump->_molongui_bump_image_hover_id ) ? $bump->_molongui_bump_image_hover_id : '' ); ?>" class="hidden" />
                            <input type="hidden" name="_molongui_bump_image_hover_url"       id="_molongui_bump_image_hover_url"      value="<?php echo ( isset( $bump->_molongui_bump_image_hover_url ) ? esc_url_raw( $bump->_molongui_bump_image_hover_url ) : '' ); ?>" class="hidden" />
                            <input type="hidden" name="_molongui_bump_image_hover_edit_url"  id="_molongui_bump_image_hover_edit_url" value="<?php echo ( isset( $bump->_molongui_bump_image_hover_edit_url ) ? $bump->_molongui_bump_image_hover_edit_url : '' ); ?>" class="hidden" />
                            <input type="button" class="molongui_wpmu_button button-primary" id="uploadimage" value="<?php _e( $btn_text, 'molongui-bump-offer' ); ?>"/>
                        </span>

                    <?php else : ?>

                    <?php if ( !empty( $bump->_molongui_bump_image_hover_url ) ) : ?>
                        <img src="<?php echo esc_url( $bump->_molongui_bump_image_hover_url ); ?>" class="molongui_current_img">
                    <?php else : ?>
                        <img src="<?php echo MOLONGUI_BUMP_OFFER_URL . 'assets/img/placeholder.gif'; ?>" class="molongui_current_img placeholder">
                    <?php endif; ?>
                    <div>
                        <p class="description"><?php _e( "You do not have permission to upload images. Please, contact the administrator of this site.", 'molongui-bump-offer' ); ?></p>
                    </div>

                    <?php endif; ?>
                </p>

                <?php
                woocommerce_wp_text_input( array
                (
                    'id'          => '_molongui_bump_video_url',
                    'label'       => __( "Video URL", 'molongui-bump-offer' ),
                    'placeholder' => '',
                    'description' => __( "Enter the complete URL to the video you want to display. Supported providers are defined by WordPress oEmbed feature.", 'molongui-bump-offer' ),
                    'data_type'   => 'text',
                    'desc_tip'    => true,
                    'value'       => isset( $bump->_molongui_bump_video_url ) ? $bump->_molongui_bump_video_url : '',
                ));
                ?>

            </div><!-- End of .options_group -->

            <?php
            do_action( 'mbo/bump/notices/settings', $bump->ID, $bump );
            if ( apply_filters( 'mbo/display/pro/hints', true ) ) : ?>
                <div class="molongui-bump-note-settings _molongui_bump_image_field">
                    <div>
                        <?php echo sprintf( __( "Ability to show a different image on mouse hover is a premium feature.%sUpgrade to Pro%sto make your offers more dynamic displaying a different image on hover.", 'molongui-bump-offer' ), '&nbsp;<strong><a target="_blank" href="'.MOLONGUI_BUMP_OFFER_WEB.'" class="molongui-go-pro">', '</a></strong>&nbsp;' ); ?>
                    </div>
                </div>
                <div class="molongui-bump-note-settings _molongui_bump_video_url_field">
                    <div>
                        <?php echo sprintf( __( "Ability to display a video on your deals is a premium feature.%sUpgrade to Pro%sto make your offers more attractive.", 'molongui-bump-offer' ), '&nbsp;<strong><a target="_blank" href="'.MOLONGUI_BUMP_OFFER_WEB.'" class="molongui-go-pro">', '</a></strong>&nbsp;' ); ?>
                    </div>
                </div>
            <?php endif;
            do_action( 'mbo/bump/media/notices', $bump->ID, $bump ); ?>

        </div><!-- /Media tab -->

        <!-- Location tab -->
        <div id="bump_location_tab" class="panel woocommerce_options_panel">

            <div class="options_group">

                <?php
                mbo_wp_select( array
                (
                    'id'                => '_molongui_bump_minicart_position',
                    'value'             => mbo_get_setting_value( $bump, 'minicart_position', $options, $defaults, true ),
                    'label'             => __( "Mini-cart Position", 'molongui-bump-offer' ) . mbo_premium_tag(),
                    'options'           => mbo_get_hooks( 'minicart', 'dropdown' ),
                    'desc_tip'          => 'true',
                    'description'       => ( apply_filters( 'mbo/display/pro/tag', true ) ? sprintf( __( "%sPREMIUM SETTING%s", 'molongui-bump-offer' ), '<strong><u>', '</u></strong> - ' ) : '' ) . __( "Where on the Mini-cart widget to display the deal", 'molongui-bump-offer' ),
                ));
                mbo_wp_select( array
                (
                    'id'                => '_molongui_bump_cart_position',
                    'value'             => mbo_get_setting_value( $bump, 'cart_position', $options, $defaults, true ),
                    'label'             => __( "Cart Position", 'molongui-bump-offer' ) . mbo_premium_tag(),
                    'options'           => mbo_get_hooks( 'cart', 'dropdown' ),
                    'desc_tip'          => 'true',
                    'description'       => ( apply_filters( 'mbo/display/pro/tag', true ) ? sprintf( __( "%sPREMIUM SETTING%s", 'molongui-bump-offer' ), '<strong><u>', '</u></strong> - ' ) : '' ) . __( "Where on the Cart page to display the deal", 'molongui-bump-offer' ),
                ));
                mbo_wp_select( array
                (
                    'id'                => '_molongui_bump_checkout_position',
                    'value'             => mbo_get_setting_value( $bump, 'checkout_position', $options, $defaults, true ),
                    'label'             => __( "Checkout Position", 'molongui-bump-offer' ),
                    'options'           => mbo_get_hooks( 'checkout', 'dropdown' ),
                    'desc_tip'          => 'true',
                    'description'       => ( apply_filters( 'mbo/display/pro/tag', true ) ? sprintf( __( "%sPREMIUM SETTING%s", 'molongui-bump-offer' ), '<strong><u>', '</u></strong> - ' ) : '' ) . __( "Where on the Checkout page to display the deal", 'molongui-bump-offer' ),
                )); ?>

		    </div><!-- End of .options_group -->

            <?php
            do_action( 'mbo/bump/location/settings', $bump->ID, $bump );
            if ( apply_filters( 'mbo/display/pro/hints', true ) ) : ?>
                <div class="molongui-bump-note-settings">
                    <div>
                        <?php echo __( "This deal will be displayed on your Checkout page, right above the checkout button.", 'molongui-bump-offer' ); ?>
                    </div>
                </div>
                <div class="molongui-bump-note-settings">
                    <div>
                        <?php echo sprintf( __( "Ability to choose where to display your deals is a premium feature.%sUpgrade to Pro%sto change deal location and display it (also) on your Cart page and/or in the Mini-cart widget.", 'molongui-bump-offer' ), '&nbsp;<strong><a target="_blank" href="'.MOLONGUI_BUMP_OFFER_WEB.'" class="molongui-go-pro">', '</a></strong>&nbsp;' ); ?>
                    </div>
                </div>
            <?php endif;
            do_action( 'mbo/bump/location/notices', $bump->ID, $bump ); ?>

        </div><!-- /Location tab -->

        <!-- Cart settings tab -->
        <div id="bump_cart_tab" class="panel woocommerce_options_panel">

            <?php ob_start(); ?>

            <div class="options_group">

                <?php
                mbo_wp_select( array
                (
                    'id'      => '_molongui_bump_display_conditions_relation',
                    'value'   => 'all',
                    'label'   => __( "Conditions to Meet", 'molongui-bump-offer' ),
                    'options' => array
                    (
                        'all' => array
                        (
                                'label'    => __( "All of the specified below", 'molongui-bump-offer' ),
                                'disabled' => false,
                        ),
                        'any' => array
                        (
                                'label'    => __( "Any of the ones specified below", 'molongui-bump-offer' ),
                                'disabled' => true,
                        ),
                        'none' => array
                        (
                                'label'    => __( "None of the specified below", 'molongui-bump-offer' ),
                                'disabled' => true,
                        ),
                    ),
                    'desc_tip'    => true,
                    'description' => __( "This deal is displayed by default. Here you can define conditions the customer's order must meet to control whether it is displayed. Choose which relationship defined conditions below must have to display the deal.", 'molongui-bump-offer' ),
                )); ?>

            </div><!-- End of .options_group -->
            <div class="options_group">

                <?php
                woocommerce_wp_text_input( array
                (
                    'id'                => 'fid'.rand(),
                    'data_type'         => 'price',
                    'value'             => '',
                    'placeholder'       => wc_format_localized_price( 0 ),
                    'label'             => __( "Minimum Order Value", 'molongui-bump-offer' ),
                    'description'       => __( "Minimum order value. If you require that customers purchase at least a minimum amount before displaying the deal.", 'molongui-bump-offer' ),
                    'desc_tip'          => true,
                    'class'             => 'mbo_disabled_field',
                    'custom_attributes' => array
                    (
                        'disabled' => 'disabled',
                    ),
                ));
                woocommerce_wp_text_input( array
                (
                    'id'                => 'fid'.rand(),
                    'type'              => 'number',
                    'value'             => '',
                    'label'             => __( "Minimum Item Count", 'molongui-bump-offer' ),
                    'description'       => __( "Minimum item count. If you require that customers purchase at least a minimum number of products before displaying the deal.", 'molongui-bump-offer' ),
                    'desc_tip'          => true,
                    'class'             => 'mbo_disabled_field',
                    'custom_attributes' => array
                    (
                        'disabled' => 'disabled',
                    ),
                ));
                woocommerce_wp_text_input( array
                (
                    'id'                => 'fid'.rand(),
                    'value'             => '',
                    'placeholder'       => __( "Choose products...", 'molongui-bump-offer' ),
                    'label'             => __( "Products in Cart", 'molongui-bump-offer' ),
                    'description'       => __( "Product that needs to be in the Cart to display the deal. You can indicate multiple products, but just one match is required to display the deal.", 'molongui-bump-offer' ),
                    'desc_tip'          => true,
                    'class'             => 'mbo_disabled_field',
                    'custom_attributes' => array
                    (
                        'disabled' => 'disabled',
                    ),
                ));
                woocommerce_wp_text_input( array
                (
                    'id'                => 'fid'.rand(),
                    'value'             => '',
                    'placeholder'       => __( "Choose products...", 'molongui-bump-offer' ),
                    'label'             => __( "Products not in Cart", 'molongui-bump-offer' ),
                    'description'       => __( "Product that must not be in the Cart to display the deal. You can indicate multiple products, but just one match is required to hide the deal.", 'molongui-bump-offer' ),
                    'desc_tip'          => true,
                    'class'             => 'mbo_disabled_field',
                    'custom_attributes' => array
                    (
                        'disabled' => 'disabled',
                    ),
                ));
                woocommerce_wp_text_input( array
                (
                    'id'                => 'fid'.rand(),
                    'value'             => '',
                    'placeholder'       => __( "Choose product categories...", 'molongui-bump-offer' ),
                    'label'             => __( "Categories in Cart", 'molongui-bump-offer' ),
                    'description'       => __( "Product category that needs to be in the Cart to display the deal. You can indicate multiple categories, but just one match is required to display the deal.", 'molongui-bump-offer' ),
                    'desc_tip'          => true,
                    'class'             => 'mbo_disabled_field',
                    'custom_attributes' => array
                    (
                        'disabled' => 'disabled',
                    ),
                ));
                woocommerce_wp_text_input( array
                (
                    'id'                => 'fid'.rand(),
                    'value'             => '',
                    'placeholder'       => __( "Choose product categories...", 'molongui-bump-offer' ),
                    'label'             => __( "Categories not in Cart", 'molongui-bump-offer' ),
                    'description'       => __( "Product category that must not be in the Cart to display the deal. You can indicate multiple categories, but just one match is required to hide the deal.", 'molongui-bump-offer' ),
                    'desc_tip'          => true,
                    'class'             => 'mbo_disabled_field',
                    'custom_attributes' => array
                    (
                        'disabled' => 'disabled',
                    ),
                ));
                woocommerce_wp_text_input( array
                (
                    'id'                => 'fid'.rand(),
                    'value'             => '',
                    'placeholder'       => __( "Choose countries...", 'molongui-bump-offer' ),
                    'label'             => __( "Show to Specific Countries", 'molongui-bump-offer' ),
                    'description'       => __( "Country the customer must come from in order to display the deal. You can pick multiple countries.", 'molongui-bump-offer' ),
                    'desc_tip'          => true,
                    'class'             => 'mbo_disabled_field',
                    'custom_attributes' => array
                    (
                        'disabled' => 'disabled',
                    ),
                ));
                woocommerce_wp_text_input( array
                (
                    'id'                => 'fid'.rand(),
                    'value'             => '',
                    'placeholder'       => __( "Choose countries...", 'molongui-bump-offer' ),
                    'label'             => __( "Hide to Specific Countries", 'molongui-bump-offer' ),
                    'description'       => __( "Country the customer must not come from in order to display the deal. You can pick multiple countries.", 'molongui-bump-offer' ),
                    'desc_tip'          => true,
                    'class'             => 'mbo_disabled_field',
                    'custom_attributes' => array
                    (
                        'disabled' => 'disabled',
                    ),
                ));

                ?>

            </div><!-- End of .options_group -->

            <?php
            echo apply_filters( 'mbo/bump/cart_conditions', ob_get_clean(), $bump, $options, $defaults );
            do_action( 'mbo/bump/display/settings', $bump->ID, $bump ); ?>

            <?php
            if ( apply_filters( 'mbo/display/pro/hints', true ) ) : ?>
                <div class="molongui-bump-note-settings">
                    <div>
                        <?php echo sprintf( __( "Ability to control whether and when to display this deal is a premium feature.%sUpgrade to Pro%sto conditionally display it based on Cart's value, items, products or categories and even Customer's country.", 'molongui-bump-offer' ), '&nbsp;<strong><a target="_blank" href="'.MOLONGUI_BUMP_OFFER_WEB.'" class="molongui-go-pro">', '</a></strong>&nbsp;' ); ?>
                    </div>
                </div>
            <?php endif; ?>
<!--
            <div class="molongui-bump-note-settings">
                <?php _e( "This deal won't be displayed when the promoted product is already in the Cart. Don't include it in the \"Products not in Cart\" field.", 'molongui-bump-offer' ); ?>
            </div>
-->
            <?php
            do_action( 'mbo/bump/display/notices', $bump->ID, $bump ); ?>

        </div><!-- /Cart Conditions tab -->

        <!-- Schedule tab -->
        <div id="bump_schedule_tab" class="panel woocommerce_options_panel">

            <div class="options_group">

                <!-- Dates -->
                <?php
                $date_pickers = '<p class="form-field sale_price_dates_fields">'
                              .   '<label>' . esc_html__( "Dates", 'molongui-bump-offer' ) . mbo_premium_tag() . '</label>'
                              .   '<input type="text" class="short" placeholder="'.esc_html( _x( "From&hellip;", 'placeholder', 'molongui-bump-offer' ) ).' YYYY-MM-DD" disabled="disabled" />'
                              .   '<input type="text" class="short" placeholder="'.esc_html( _x( "To&hellip;", 'placeholder', 'molongui-bump-offer' ) ).' YYYY-MM-DD" disabled="disabled" />'
                              .   wc_help_tip( __( "Range of dates during which the deal will be available.", 'molongui-bump-offer' ) )
                              . '</p>';
                echo apply_filters( 'mbo/bump/dates', $date_pickers, $bump ); ?>

            </div><!-- End of .options_group -->

            <?php
            do_action( 'mbo/bump/settings', $bump->ID, $bump );
            if ( apply_filters( 'mbo/display/pro/hints', true ) ) : ?>
                <div class="molongui-bump-note-settings">
                    <div>
                        <?php printf( __( "Ability to define a range of dates the deal will be active and visible is a premium feature.%sUpgrade to Pro%sto schedule when to display your deals.", 'molongui-bump-offer' ), '&nbsp;<strong><a target="_blank" href="'.MOLONGUI_BUMP_OFFER_WEB.'" class="molongui-go-pro">', '</a></strong>&nbsp;' ); ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="molongui-bump-note-settings">
                <div>
                    <?php printf( __( "Bring about a sense of urgency. Providing a range of dates is useful for %sFlash Sales%s. Avoid setting promotions with no end date, as this will cause people to dilly-dally. It's best to implement limited-time offers to encourage customers to get a move on.", 'molongui-bump-offer' ), '<strong>', '</strong>' ); ?>
                </div>
            </div>

            <?php
            do_action( 'mbo/bump/notices', $bump->ID, $bump ); ?>

        </div><!-- /Schedule tab -->

		<?php
        do_action( 'mbo/bump/settings/panels', $bump->ID, $bump ); ?>

        <div class="clear"></div>

    </div><!-- End of .panel-wrap -->
</div><!-- End of #woocommerce-coupon-data -->