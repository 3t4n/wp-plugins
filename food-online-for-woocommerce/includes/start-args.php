<?php
if (!defined('ABSPATH'))
{
    exit;
}
if (!isset($settings_args))
{
    $settings_args = array(
        array(
            'name' => __('Main Settings', 'food-online-for-woocommerce') ,
            'type' => 'title',
            'id' => 'fdoe_visibility',
            'desc' => __('Either show the Menu on shop page or use shortcode [foodonline] or [foodonline2] on any page.', 'food-online-for-woocommerce') ,
            'class' => 'test'
        ) ,
        array(
            'name' => __('Main shop page', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_override_shop',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Show the menu on main shop page', 'food-online-for-woocommerce') ,
            'default' => 'yes'
        ) ,
          array(
            'name' => __('Enable Search?', 'food-online-for-woocommerce'),
            'id' => 'fdoe_show_search',
            'type' => 'checkbox',
            'default' => 'no',
            'css' => 'min-width:300px;',
            'desc' => __('Show a search form at the menu?', 'food-online-for-woocommerce')
        ),

        array(
            'name' => __('Sticky', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_sticky_bar',
            'type' => 'checkbox',
            'default' => 'no',
            'css' => 'min-width:300px;',
            'desc' => __('Make side bars and category top bar sticky?', 'food-online-for-woocommerce')
        ) ,

        array(
            'name' => __('Sticky for mobile devices?', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_sticky_mobile',
            'type' => 'select',
            'default' => 'no',
            'css' => 'min-width:300px;',
            'desc' => __('Choose what to make sticky on mobile devices?', 'food-online-for-woocommerce') ,
            'options' => array(
                'cats' => __('Top Category Menu', 'food-online-for-woocommerce') ,

                'no' => __('None', 'food-online-for-woocommerce') ,
            ) ,
        ) ,
        array(
            'name' => __('Smooth Scrolling', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_smooth_scrolling',
            'type' => 'checkbox',
            'default' => 'no',
            'css' => 'min-width:300px;',
            'desc' => __('Use smooth scrolling navigating in the Menu?', 'food-online-for-woocommerce')
        ) ,
        array(
            'name' => __('Show confirmation when added to cart', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_show_confirmation',
            'type' => 'checkbox',
            'default' => 'no',
            'css' => 'min-width:300px;',
            'desc' => __('Show confirmation when an item is added to cart?', 'food-online-for-woocommerce')
        ) ,

        array(
            'name' => __('Hide the Storefront Theme Headings', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_hide_storefront_head',
            'type' => 'checkbox',
            'default' => 'yes',
            'css' => 'min-width:300px;',
            'desc' => __('Hide the Menu, Search fields and Cart in the page headings? (Only for the Storefront Theme)', 'food-online-for-woocommerce')
        ) ,
        array(
            'type' => 'sectionend',
            'id' => 'fdoe_visibility'
        ) ,
        array(
            'name' => __('Checkout Settings', 'food-online-for-woocommerce') ,
            'type' => 'title',
            'id' => 'fdoe_visibility',

        ) ,
        array(
            'name' => __('Checkout', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_limited_fields',
            'type' => 'select',
            'options' => array(
                'phone' => __('Phone Only', 'food-online-for-woocommerce') ,
                'e-mail' => __('Phone and E-mail', 'food-online-for-woocommerce') ,
                'name' => __('Phone, E-mail and Name', 'food-online-for-woocommerce') ,
                'woo_default' => __('Default Woocommerce Setup', 'food-online-for-woocommerce')
            ) ,
            'css' => 'max-width:200px;',
            'desc' => __('Checkout field for "Pick Up" or when the delivery Switch is turned off.', 'food-online-for-woocommerce') ,
            'default' => 'woo_default',
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ) ,
        array(
            'id' => 'fdoe_limited_fields2',
            'type' => 'select',
            'options' => array(
                'limited' => __('Limited field', 'food-online-for-woocommerce') ,
                'woo_default' => __('Default Woocommerce Setup', 'food-online-for-woocommerce')
            ) ,
            'css' => 'max-width:200px;',
            'desc' => __('Checkout field for "Delivery" choice ', 'food-online-for-woocommerce') ,
            'default' => 'woo_default',
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ) ,
         array(
            'id' => 'fdoe_eathere_checkout',
            'type' => 'select',
            'options' => array(
                'table_nr' => __('Only Table Number', 'food-online-for-woocommerce'),
                 'name' => __('Only Name', 'food-online-for-woocommerce'),
                'woo_default' => __('Default Woocommerce Setup', 'food-online-for-woocommerce')
            ),
            'css' => 'max-width:200px;',
            'desc' => __('Checkout field for "Eat at Restaurant" choice ', 'food-online-for-woocommerce'),
            'default' => 'woo_default',
             'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ),
        array(
            'name' => __('Extra? Popup', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_extra_popup',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Show a popup on checkout with featured products as supplementary?', 'food-online-for-woocommerce') ,
            'default' => 'no',
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ) ,
        array(
            'type' => 'sectionend',
            'id' => 'fdoe_checkout'
        ) ,

        array(
            'name' => __('Minicart Settings', 'food-online-for-woocommerce') ,
            'type' => 'title',
            'id' => 'fdoe_minicart_style'
        ) ,
        array(
            'name' => __('Hide the Cart', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_hide_minicart',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Hide the Cart from Menu page?', 'food-online-for-woocommerce') ,
            'default' => 'no'
        ) ,
        array(
            'name' => __('Minicart Style', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_minicart_style',
            'default' => 'popover',
            'type' => 'select',
            'options' => array(
                'popover' => __('Popup Style', 'food-online-for-woocommerce') ,
                'basic' => __('Basic Style', 'food-online-for-woocommerce') ,
                'increment' => __('+ / - Buttons', 'food-online-for-woocommerce') ,
                'theme' => __('Theme Default', 'food-online-for-woocommerce') ,
            ) ,
            'css' => 'max-width:200px;',
            'desc' => __('Choose how to style the minicart?', 'food-online-for-woocommerce')
        ) ,
        array(
            'name' => __('Minicart Order', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_minicart_reverse_order',
            'default' => 'no',
            'type' => 'select',
            'options' => array(
                'no' => __('Add to bottom', 'food-online-for-woocommerce') ,
                'yes' => __('Add to top', 'food-online-for-woocommerce') ,

            ) ,
            'css' => 'max-width:200px;height:auto;',
            'desc' => __('Select where added products appear in minicart', 'food-online-for-woocommerce')
        ) ,
        array(
            'type' => 'sectionend',
            'id' => 'fdoe_minicart_style'
        ) ,
        array(
            'name' => __('Product Popup Options', 'food-online-for-woocommerce') ,
            'type' => 'title',
            'id' => 'fdoe_popup_options'
        ) ,
        array(
            'name' => __('Pop-up simple products?', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_popup_simple',
            'type' => 'select',
            'css' => 'min-width:300px;',
            'desc' => __('Use pop-up for simple products when add-to-cart.', 'food-online-for-woocommerce') ,
            'default' => 'yes',
            'options' => array(
                'yes' => __('Use Popups', 'food-online-for-woocommerce') ,

                'no' => __('Add to cart instantly', 'food-online-for-woocommerce') ,
                'redirect' => __('Redirect to product page', 'food-online-for-woocommerce') ,

            ) ,
        ) ,
        array(
            'name' => __('Pop-up variable products?', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_popup_variable',
            'type' => 'select',
            'css' => 'min-width:300px;',
            'desc' => __('The "Add to cart instantly" option is applicable when variation products doesn´t have options', 'food-online-for-woocommerce') ,
            'default' => 'yes',
            'options' => array(
                'yes' => __('Use Popups', 'food-online-for-woocommerce') ,

                'add' => __('Add to cart instantly', 'food-online-for-woocommerce') ,
                'no' => __('Redirect to product page', 'food-online-for-woocommerce') ,

            ) ,
        ) ,
        array(
            'name' => __('Pop-up grouped products?', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_popup_grouped',
            'type' => 'select',
            'css' => 'min-width:300px;',
            //  'desc' => __( 'The "Add to cart instantly" option is applicable when variation products doesn´t have options', 'food-online-for-woocommerce' ),
            'default' => 'redirect',
            'options' => array(
                'popup' => __('Use Popups', 'food-online-for-woocommerce') ,

                'redirect' => __('Redirect to product page', 'food-online-for-woocommerce') ,

            ) ,
        ) ,
        array(
            'name' => __('Pop-up composite products?', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_popup_composite',
            'type' => 'select',
            'css' => 'min-width:300px;',
            //  'desc' => __( 'The "Add to cart instantly" option is applicable when variation products doesn´t have options', 'food-online-for-woocommerce' ),
            'default' => 'redirect',

            'options' => array(
                'popup' => __('Use Popups', 'food-online-for-woocommerce') ,

                'instant' => __('Add to cart instantly', 'food-online-for-woocommerce') ,
                'redirect' => __('Redirect to product page', 'food-online-for-woocommerce') ,

            ) ,
        ) ,
        array(
            'name' => __('Pop-up bundle products?', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_popup_bundle',
            'type' => 'select',
            'css' => 'min-width:300px;',
            'desc' => __('The "Add to cart instantly" option is applicable for bundle products only containing simple products', 'food-online-for-woocommerce') ,
            'default' => 'redirect',
            'options' => array(
                'popup' => __('Use Popups', 'food-online-for-woocommerce') ,

                'instant' => __('Add to cart instantly', 'food-online-for-woocommerce') ,
                'redirect' => __('Redirect to product page', 'food-online-for-woocommerce') ,

            ) ,
        ) ,
        array(
            'name' => __('Product Popup Source', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_product_popup_content',
            'default' => 'custom',
            'type' => 'select',
            'options' => array(
                'theme' => __('Theme Template', 'food-online-for-woocommerce') ,
                'custom' => __('Food Online Original', 'food-online-for-woocommerce') ,
                'style-1' => __('Food Online Style 1', 'food-online-for-woocommerce') ,

            ) ,
            'css' => 'max-width:200px;',
            'desc' => __('Choose how to display content in product popup?', 'food-online-for-woocommerce')
        ) ,
        array(
            'name' => __('Product Popup Content', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_product_popup_content_spec',
            'default' => array() ,
            'type' => 'multiselect',
            'class' => 'wc-enhanced-select',
            'options' => array(
                'image' => __('Product Image', 'food-online-for-woocommerce') ,
                'meta' => __('Product Meta', 'food-online-for-woocommerce') ,
                'rating_' => __('Product Rating', 'food-online-for-woocommerce') . ' (Premium)',
                'desc_' => __('Product Description', 'food-online-for-woocommerce') . ' (Premium)',

            ) ,
            'css' => 'max-width:200px;height:auto;',
            'desc' => __('Select content for the product popup.', 'food-online-for-woocommerce')
        ) ,

        array(
            'type' => 'sectionend',
            'id' => 'fdoe_popup_options'
        ) ,

    );

}
if (!isset($settings_args_menu_styling))
{

    $settings_args_menu_styling = array(

        array(
            'name' => __('Menu Layout', 'food-online-for-woocommerce') ,
            'type' => 'title',
            'id' => 'fdoe_menu_layout'
        ) ,
        array(
            'name' => __('Menu Layout', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_layout',
            'default' => 'fdoe_onecol',
            'type' => 'select',
            'options' => array(
                'fdoe_onecol' => __('One Column', 'food-online-for-woocommerce') ,
                'fdoe_twocols' => __('Two Columns', 'food-online-for-woocommerce') ,
                'fdoe_twentytwenty' => __('2020 Template', 'food-online-for-woocommerce')
            )
        ) ,
        array(
            'name' => __('Show Menu like Accordian?', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_accordian',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Show only one category at time with accoridan behaviour', 'food-online-for-woocommerce') ,
            'default' => 'no'
        ) ,
        array(
            'name' => __('Show Sub Categories along with Parent Category?', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_subcat_with_parent',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Show sub categories together with their parent category and not as a independent category', 'food-online-for-woocommerce') ,
            'default' => 'no'
        ) ,
        array(
            'name' => __('Top Bar', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_top_bar',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Show a bar above the Menu?', 'food-online-for-woocommerce') ,
            'default' => 'no'
        ) ,
        array(
            'name' => __('Top Bar Information Message', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_top_bar_info',
            'type' => 'text',

        ) ,
        array(
            'name' => __('Categories Left Menu', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_left_menu',
            'type' => 'checkbox',
            'default' => 'no',
            'css' => 'min-width:300px;',
            'desc' => __('Show categories in left-bar menu?', 'food-online-for-woocommerce')
        ) ,
        array(
            'name' => __('Categories Top Menu', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_cat_top_menu',
            'type' => 'checkbox',
            'default' => 'no',
            'css' => 'min-width:300px;',
            'desc' => __('Show categories in top-bar menu?', 'food-online-for-woocommerce')
        ) ,
        array(
            'name' => __('Mobile Categories Top Menu', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_cat_top_menu_mobile',
            'type' => 'select',
            'default' => 'yes',
            'css' => 'min-width:300px;',
            'desc' => __('Show categories in top-bar menu on mobile devices?', 'food-online-for-woocommerce') ,
            'options' => array(
                'yes' => __('Show standard menu', 'food-online-for-woocommerce') ,

                'collapsed' => __('Show dropdown menu', 'food-online-for-woocommerce') ,

                'no' => __('Hide', 'food-online-for-woocommerce') ,
            )
        ) ,

        array(
            'name' => __('Bottom Mobile Bar', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_bottom_bar',
            'desc' => __('Show a bottom bar for mobile devices?', 'food-online-for-woocommerce') ,
            'default' => 'yes',
            'type' => 'select',
            'options' => array(
                'yes' => __('Show at whole site', 'food-online-for-woocommerce') ,

                'menu' => __('Show at Menu pages', 'food-online-for-woocommerce') ,
                'woocommerce' => __('Show at woocommerce pages', 'food-online-for-woocommerce') ,
                'no' => __('Hide Bottom bar', 'food-online-for-woocommerce') ,
            )
        ) ,
        array(
            'type' => 'sectionend',
            'id' => 'fdoe_menu_layout'
        ) ,
        array(
            'name' => __('Menu Style', 'food-online-for-woocommerce') ,
            'type' => 'title',
            'id' => 'fdoe_menu_style'
        ) ,
        array(
            'name' => __('Menu Color', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_color',
            'type' => 'text',
            'class' => 'fdoe-color-picker',
            'default' => '#bf5bb6'
        ) ,
        array(
            'name' => __('Menu Background Color', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_color_back',
            'type' => 'text',
            'class' => 'fdoe-color-picker',
            'default' => '#fff'
        ) ,
        array(
            'name' => __('Menu Items Separator', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_item_separator',
            'default' => 'dashed',
            'type' => 'select',
            'options' => array(
                'dashed' => __('Dashed', 'food-online-for-woocommerce') ,
                'solid' => __('Solid', 'food-online-for-woocommerce') ,
                'dotted' => __('Dotted', 'food-online-for-woocommerce') ,
                'hidden' => __('None', 'food-online-for-woocommerce')
            ) ,
            'css' => 'max-width:200px;',
            'desc' => __('Style of the Menu items separator?', 'food-online-for-woocommerce')
        ) ,
        array(
            'name' => __('Menu Items Separator Color', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_border_color',
            'type' => 'text',
            'class' => 'fdoe-color-picker',
            'default' => '#ddd'
        ) ,
        array(
            'name' => __('Menu Titles Icon', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_menu_titles_icon',
            'default' => 'fas fa-ellipsis-h',
            'class' => 'fdoe-icon-picker',
            'type' => 'select',
            'options' => array(
                'fas fa-ellipsis-h' => __('Dots', 'food-online-for-woocommerce') ,
                'fas fa-minus' => __('Lines', 'food-online-for-woocommerce') ,
                'fas fa-seedling' => __('Leef', 'food-online-for-woocommerce') ,
                'fas fa-genderless' => __('Ring', 'food-online-for-woocommerce') ,
                'fas fa-star' => __('Star', 'food-online-for-woocommerce') ,
                'fas fa-pepper-hot' => __('Chili Pepper', 'food-online-for-woocommerce') ,
                'fas fa-pizza-slice' => __('Pizza', 'food-online-for-woocommerce') ,
                'fas fa-hamburger' => __('Hamburger', 'food-online-for-woocommerce') ,
                'fas fa-apple-alt' => __('Apple', 'food-online-for-woocommerce') ,
                '' => __('None', 'food-online-for-woocommerce')
            ) ,
            'css' => 'max-width:200px;',
            'desc' => __('Icon to display with the menu titles?', 'food-online-for-woocommerce')
        ) ,
        array(
            'name' => __('Item Icon', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_item_icon',
            'default' => 'fas fa-plus-circle',
            'class' => 'fdoe-icon-picker',
            'type' => 'select',
            'options' => array(
                'fas fa-plus-circle' => __('Standard', 'food-online-for-woocommerce') ,
                'fas fa-plus' => __('Plus', 'food-online-for-woocommerce') ,
                'fas fa-plus-square' => __('Square Shape Plus', 'food-online-for-woocommerce') ,
                'fas fa-seedling' => __('Leef', 'food-online-for-woocommerce') ,
                'fas fa-shopping-basket' => __('Shopping Basket', 'food-online-for-woocommerce') ,
                'fas fa-shopping-cart' => __('Shopping Cart', 'food-online-for-woocommerce') ,
                'fas fa-cart-plus' => __('Shopping Cart with plus', 'food-online-for-woocommerce') ,
                'fas fa-utensils' => __('Knife & Fork', 'food-online-for-woocommerce') ,
                '' => __('None', 'food-online-for-woocommerce')
            ) ,
            'css' => 'max-width:200px;',
            'desc' => __('Item "Add" icon in the Menu?', 'food-online-for-woocommerce')
        ) ,

        array(
            'name' => __('Product Images', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_show_images',
            'default' => 'rec',
            'type' => 'select',
            'options' => array(
                'small' => __('Small size', 'food-online-for-woocommerce') ,
                'rec' => __('Normal Size', 'food-online-for-woocommerce') ,
                'big' => __('Big Size', 'food-online-for-woocommerce') ,
                'hide' => __('Hide images', 'food-online-for-woocommerce')
            ) ,
            'css' => 'max-width:200px;',
            'desc' => __('Show images for products in menu?', 'food-online-for-woocommerce')
        ) ,
        array(
            'name' => __('Product Image Type', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_image_size',
            'default' => 'default',
            'type' => 'select',
            'options' => array(
                'default' => __('Default Type', 'food-online-for-woocommerce') ,
                'woocommerce_thumbnail' => __('WooCommerce Thumbnail', 'food-online-for-woocommerce') ,

            ) ,
            'css' => 'max-width:200px;',
            'desc' => __('Choose product image type?', 'food-online-for-woocommerce')
        ) ,
        array(
            'name' => __('Product Short Description', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_menu_shortdesc',
            'type' => 'checkbox',
            'default' => 'yes',
            'css' => 'min-width:300px;',
            'desc' => __('Show the product short description in Menu?', 'food-online-for-woocommerce')
        ) ,
        array(
            'name' => __('Category Images', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_cat_image',
            'type' => 'checkbox',
            'default' => 'no',
            'css' => 'min-width:300px;',
            'desc' => __('Show images for categories in menu?', 'food-online-for-woocommerce') ,
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ) ,
        array(
            'name' => __('Category Description', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_show_cat_desc',
            'type' => 'checkbox',
            'default' => 'no',
            'css' => 'min-width:300px;',
            'desc' => __('Show description for categories in menu?', 'food-online-for-woocommerce') ,
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ) ,

        array(
            'type' => 'sectionend',
            'id' => 'fdoe_menu_style'
        ) ,

    );
}
if (!isset($settings_args_delivery))
{

    $settings_args_delivery = array(
        array(
            'name' => __('Delivery Features Settings', 'food-online-for-woocommerce') ,
            'type' => 'title',
            'desc' => __('A Google Maps API Key is needed to let customers fill in their delivery address. ( Maps JavaScript API, Places API, Geocoding API, Directions API)', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_delivery_swithcher'
        ) ,
        array(
            'name' => __('Enable Delivery Mode', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_enable_delivery_switcher',
            'default' => 'no',
            'type' => 'select',

            'options' => array(
                'no' => __('Disable', 'food-online-for-woocommerce') ,
                'yes' => __('Show Delivery Switch', 'food-online-for-woocommerce') ,
                'dropdown' => __('Show Dropdown Selector', 'food-online-for-woocommerce') ,
                'only_delivery' => __('Only Delivery', 'food-online-for-woocommerce') ,
                'only_pickup' => __('Only Pickup', 'food-online-for-woocommerce') ,
            ) ,
            'desc' => __('Show a switch to let customers choose between "Pick Up" and "Delivery" or make "Delivery" the only alternative and hide the switch.', 'food-online-for-woocommerce') ,
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ) ,
        array(
            'name' => __('Dropdown Selector Choices', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_delivery_dropdown_choices',
            'default' => array() ,
            'type' => 'multiselect',
            'class' => 'wc-enhanced-select',
            'options' => array(
                'pickup' => __('Pick Up', 'food-online-for-woocommerce') ,
                'delivery' => __('Delivery', 'food-online-for-woocommerce') ,
                'eathere' => __('Eat at Restaurant', 'food-online-for-woocommerce') ,

            ) ,
            'css' => 'max-width:200px;height:auto;',
            'desc' => __('Select choices for the delivery dropdown.', 'food-online-for-woocommerce') ,
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ) ,

        array(
            'name' => __('Google Maps API Key', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_google_maps_api',
            'type' => 'text',
            //'css' => 'min-width:300px;',
            'desc' => __(' <p><a href="https://cloud.google.com/maps-platform/#get-started" target="_blank">Visit Google to get your API Key &raquo;</a></p>', 'food-online-for-woocommerce') ,
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ) ,

        array(
            'name' => __('Default delivery mode?', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_default_for_switch',
            'default' => 'pickup',
            'type' => 'select',
            'options' => array(
                'pickup' => __('Pick Up', 'food-online-for-woocommerce') ,
                'delivery' => __('Delivery', 'food-online-for-woocommerce') ,
                'eathere' => __('Eat at Restaurant (only for dropdown)', 'food-online-for-woocommerce') ,
            ) ,
            'desc' => __('Select the default mode of the selector at page load.', 'food-online-for-woocommerce') ,
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ) ,
        array(
            'name' => __('User selection mandatory?', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_3way',
            'default' => 'no',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',

            'desc' => __('Make the initial state of the delivery selector neutral and thereby force the user to make an active choice.', 'food-online-for-woocommerce') ,
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ) ,
        array(
            'name' => __('Delivery Address & Post Code Validation', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_skip_address_validation',
            'default' => 'no',
            'type' => 'select',

            'options' => array(
                'yes' => __('No validation', 'food-online-for-woocommerce') ,
                'no' => __('Address validation', 'food-online-for-woocommerce') ,

                'zip' => __('Post Code Validation', 'food-online-for-woocommerce') ,
            ) ,
            //  'class' => 'fdoe',
            'desc' => __('Choose if to validate a delivery address or a delivery post code and thereby let users input their delivery address at checkout page.', 'food-online-for-woocommerce') ,
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ) ,
        array(
            'name' => __('Allow users to bypass address validation?', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_bypass_address',
            'default' => 'no',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',

            'desc' => __('Allow users to bypass address validation at Menu page and handle the delivery address at checkout', 'food-online-for-woocommerce')
        ) ,
        array(
            'name' => __('Pick Delivery Location from Map', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_pick_delivery_location',
            'default' => 'no',
            'type' => 'select',
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',

            'options' => array(
                'no' => __('Disable', 'food-online-for-woocommerce') ,
                'at_fail' => __('When address geolocation fails', 'food-online-for-woocommerce') ,

                //  'as_option' => __('As an alternative to address validation','food-online-for-woocommerce'),

            ) ,
        ) ,


        array(
            'name' => __('Minimum Order Value', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_min_order',
            'css' => 'max-width:100px;',
            'default' => 0,
            'type' => 'number',
            'desc' => __('Set a minimum order value limit for delivery, default is 0 which means no limit.', 'food-online-for-woocommerce') ,
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ) ,
        array(
            'name' => __('Minimum Items per Order', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_min_order_items',
            'css' => 'max-width:100px;',
            'default' => 0,
            'type' => 'number',
            'desc' => __('Set a minimum of items per order for delivery, default is 0 which means no limit.', 'food-online-for-woocommerce') ,
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ) ,
        array(
            'name' => __('Show colors as validation feedback?', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_delivery_colormode',
            'css' => 'max-width:100px;',
            'default' => 'no',
            'type' => 'checkbox',
            'desc' => __('Color code delivery messages and forms depending on positive or negative validation result.', 'food-online-for-woocommerce') ,
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ) ,
        array(
            'name' => __('Delivery message format', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_message_format',
            'default' => 'no',
            'type' => 'select',

            'options' => array(
                'popup' => __('Popup', 'food-online-for-woocommerce') ,
                'print' => __('Print out', 'food-online-for-woocommerce') ,

            ) ,

            'desc' => __('Choose how to show standard delivery messages.', 'food-online-for-woocommerce') ,
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ) ,

        array(
            'name' => __('Add shipping cost suffix to the delivery notice?', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_del_message_price_suffix',
            'css' => 'max-width:100px;',
            'default' => 'yes',
            'type' => 'checkbox',
            'desc' => __('Add shipping cost suffix to the delivery notice that shows after address validation.', 'food-online-for-woocommerce') ,
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ) ,
        array(
            'name' => __('Show only the best shipping method?', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_only_one_method_at_checkout',
            'css' => 'max-width:100px;',
            'default' => 'no',
            'type' => 'checkbox',
            'desc' => __('At checkout, show only a single shipping method with lowest rate.', 'food-online-for-woocommerce') ,
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ) ,
        array(
            'name' => __('Show delivery mode in admin orders table?', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_admin_order_mode',
            'default' => 'no',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',

            'desc' => __('Add a column to the admin orders table to show the selected order type?', 'food-online-for-woocommerce') ,
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ) ,

        array(
            'type' => 'sectionend',
            'id' => 'fdoe_delivery_swithcher'
        ) ,

    );

}
if (!isset($settings_args_advanced))
{

    $settings_args_advanced = array(
        array(
            'name' => __('Advanced Settings', 'food-online-for-woocommerce') ,
            'type' => 'title',
            'id' => 'fdoe_advanced'
        ) ,

        array(
            'name' => __('Force Enqueue Google Maps JS', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_force_enqueue_google',
            'default' => 'no',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Do not check for other enqueued google scripts', 'food-online-for-woocommerce') ,

        ) ,
        array(
            'name' => __('Lazy load Menu images', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_lazy_load_menu',
            'default' => 'no',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Wait loading Menu images until they appear on screen', 'food-online-for-woocommerce') ,

        ) ,
        array(
            'name' => __('Javascript Loading Overlay', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_loading_overlay',
            'default' => 'no',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Show a overlay while loading content with javascript', 'food-online-for-woocommerce') ,

        ) ,
        array(
            'name' => __('Deactivate Google Maps JS', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_stop_enqueue_google',
            'default' => 'no',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Might be helpful if Google Maps is already activated from another plugin or Theme', 'food-online-for-woocommerce') ,
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',

        ) ,
        array(
            'name' => __('Do not restrict Google Autocomplete to IP-located country', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_restrict_country',
            'default' => 'no',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Allow Google Autocomplete to suggest addresses from whole world', 'food-online-for-woocommerce') ,
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ) ,
        array(
            'name' => __('Geolocate user for improved Autocomplete suggestions', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_browser_geolocation',
            'default' => 'yes',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Let browser geolocate the user for improved address suggestions.', 'food-online-for-woocommerce') ,
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ) ,

        array(
            'name' => __('Multiple shortcode instances?', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_force_shortcode',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Allow multiple shortcode instances? (not recommended)', 'food-online-for-woocommerce') ,
            'default' => 'no'
        ) ,
        array(
            'name' => __('Show error messages at checkout?', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_show_error_messages',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Show WooCommerce error messages at checkout?', 'food-online-for-woocommerce') ,
            'default' => 'no'
        ) ,
        array(
            'name' => __('Delete settings?', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_clean_settings',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Delete all settings on plugin removal?', 'food-online-for-woocommerce') ,
            'default' => 'no'
        ) ,
        array(
            'name' => __('Fallback Product Popup Loading?', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_fallback_modal',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Load entire product popup content at page load?', 'food-online-for-woocommerce') ,
            'default' => 'no'
        ) ,
         array(
             'name' => __( 'Deactivate Product Popup +/- JS buttons', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_deactivate_plus_minus_js_buttons',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',

            'default' => 'no'
        ),
        array(
            'name' => __('Product Sorting by Title?', 'food-online-for-woocommerce') ,
            'id' => 'fdoe_product_sorting_title',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Override WooCommerce and sort products by title on shop page?', 'food-online-for-woocommerce') ,
            'default' => 'no'
        ) ,
        array(
             'name' => __( 'Product Popup Quantity Buttons', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_product_quantity_buttons',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __( 'Add quantity buttons to product popups', 'food-online-for-woocommerce' ),
            'default' => 'no'
        ),
         array(
             'name' => __( 'Early set session cookie', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_early_set_cookie',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',

            'default' => 'no'
        ),
        array(
            'type' => 'sectionend',
            'id' => 'fdoe_advanced'
        )
    );

}
if (!isset($settings_args_third))
{  $categories= array();
     foreach (Food_Online::get_all_categories('all',1) as $category) {



        $categories += array(

             esc_attr( $category->cat_ID ) =>  esc_html( $category->name )

        );



    }
     $settings_args_third = array(

            array(
            'name' => __('Time to finished order', 'food-online-for-woocommerce'),
            'type' => 'title',
            'id' => 'fdoe_preperation_times',
             'desc' => __( 'Calculate an approximate time for an order to be ready.', 'food-online-for-woocommerce' ),


        ),
            array(
            'name' => __('Preparation Time', 'food-online-for-woocommerce'),
            'id' => 'fdoe_preperation_time_mode',
            'css' => 'max-width:200px;',
            'default' => 'fixed',
            'type' => 'select',
             'options' => array(

                'fixed' => __('Fixed preparation time', 'food-online-for-woocommerce'),
                'dynamic' => __('Dynamic preparation time', 'food-online-for-woocommerce'),

            ),


        ),
             array(
            'name' => __('Fixed preparation time per order', 'food-online-for-woocommerce'),
            'id' => 'fdoe_pickup_fixed',
            'css' => 'max-width:100px;',
            'default' => '0',
            'type' => 'text',
            'desc' => __('Set a fixed time in minutes for preparing an order.', 'food-online-for-woocommerce')
        ),

            array(
            'type' => 'sectionend',
             'id' => 'fdoe_preperation_times',
        ),
            array(
                            'name' => __( 'Dynamic Preparation Time', 'food-online-for-woocommerce' ),
                            'type' => 'title',
                            'desc' => __( '', 'food-online-for-woocommerce' ),
							'desc_tip' => true,
                            'id' => 'fdoe_ordertime_per_cats'
                        ),
             array(
            'name' => __('Preparation Time per Order or Order Item', 'food-online-for-woocommerce'),
            'id' => 'fdoe_preptime_order_item',
            'css' => 'max-width:200px;',
            'default' => 'order',
            'type' => 'select',
             'options' => array(

                'order' => __('Per Order', 'food-online-for-woocommerce'),
                'item' => __('Per Order Item', 'food-online-for-woocommerce'),

            ),
              'desc' => __('', 'food-online-for-woocommerce')

        ),
                        array(
                             'type' => 'fixedordertime',
                            'id' => 'fixedordertime'
                        ),
                        array(
                             'type' => 'sectionend',
                            'id' => 'fdoe_ordertime_per_cats'
                        ),
        array(
              'name' => __( 'Extra Time', 'food-online-for-woocommerce' ),
            'type' => 'title',
            'id' => 'fdoe_ordertime_extra',
             'desc' => __('Add extra time depending on already existing orders with a "processing" or "on-hold" order status.', 'food-online-for-woocommerce')

        ),



          array(
            'name' => __('Extra time per processing order/item', 'food-online-for-woocommerce'),
            'id' => 'fdoe_pickup_var',
            'css' => 'max-width:100px;',
            'default' => '0',
            'type' => 'text',
            'desc' => __('Set extra time in minutes per order or item already processing.', 'food-online-for-woocommerce')
        ),
          array(
            'name' => __('Use order or items?', 'food-online-for-woocommerce'),
            'id' => 'fdoe_extratime_mode',
            'css' => 'max-width:100px;',
            'default' => 'orders',
            'type' => 'select',
             'options' => array(

                'orders' => __('Orders', 'food-online-for-woocommerce'),
                'items' => __('Items', 'food-online-for-woocommerce'),

            ),
              'desc' => __('Choose to calculate extra time per processing order or per processing item.', 'food-online-for-woocommerce')

        ),
          array(
             'name' => __( 'Choose categories to include', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_processing_cats',
            'default' => array(),
            'type' => 'multiselect',
            'class' => 'wc-enhanced-select',
             'options' => $categories,
            'css' => 'max-width:200px;height:auto;',
            'desc' => __( 'Select product categories to include when counting the processing items', 'food-online-for-woocommerce' )
    ),
          array(
            'type' => 'sectionend',
             'id' => 'fdoe_order_time_extra',
        ),
           array(
            'name' => __('Pickup / Default Orders', 'food-online-for-woocommerce'),
            'type' => 'title',
            'id' => 'fdoe_time_to_delivery_pickup',

        ),
        array(
            'name' => __('Time until ready for pickup?', 'food-online-for-woocommerce'),
            'id' => 'fdoe_ready_for_pickup_show',
            'type' => 'select',
            'options' => array(
                'none' => __('None', 'food-online-for-woocommerce'),
                'fixedtime' => __('By preparation time', 'food-online-for-woocommerce'),
                'variable' => __('By preparation time & extra time', 'food-online-for-woocommerce')
            ),
            'css' => 'max-width:200px;',
            'desc' => __('Set the time until a pickup or default ( delivery feature disabled ) order is ready.', 'food-online-for-woocommerce'),
            'default' => 'none'
        ),

array(
            'type' => 'sectionend',
             'id' => 'fdoe_time_to_delivery_pickup',
        ),





        array(
            'name' => __('Eat at Restaurant Orders', 'food-online-for-woocommerce'),
            'type' => 'title',
            'id' => 'fdoe_time_to_delivery_eathere',

        ),
        array(
            'name' => __('Time until ready for Eat at Restaurant?', 'food-online-for-woocommerce'),
            'id' => 'fdoe_ready_for_eathere_show',
            'type' => 'select',
            'options' => array(
                'none' => __('None', 'food-online-for-woocommerce'),
                'fixedtime' => __('By preparation time', 'food-online-for-woocommerce'),
                'variable' => __('By preparation time & extra time', 'food-online-for-woocommerce')
            ),
            'css' => 'max-width:200px;',
            'desc' => __('Set the time until a "Eat at Restaurant" order is ready.', 'food-online-for-woocommerce'),
            'default' => 'none',
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ),

array(
            'type' => 'sectionend',
             'id' => 'fdoe_time_to_delivery_eathere',
        ),








 array(
            'name' => __('Delivery Orders', 'food-online-for-woocommerce'),
            'type' => 'title',
            'id' => 'fdoe_time_to_delivery_del',

        ),
  array(
            'name' => __('Set vehicle', 'food-online-for-woocommerce'),
            'id' => 'shipping_vehicle',
            'type' => 'select',
            'options' => array(

                'DRIVING' => __('By car or truck', 'food-online-for-woocommerce'),
                'BICYCLING' => __('By bicycle', 'food-online-for-woocommerce'),


             ),
            'css' => 'max-width:200px;',
            'desc' => __('Select a vehicle type that will be used to calculate shipping time. It will also be used to decide the delivery icon.', 'food-online-for-woocommerce'),
            'default' => 'driving',
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ),
          array(
            'name' => __('Time until delivery?', 'food-online-for-woocommerce'),
            'id' => 'fdoe_ready_for_delivery_show',
            'type' => 'select',
            'options' => array(
                'none' => __('None', 'food-online-for-woocommerce'),
                'fixedtime' => __('By preparation time', 'food-online-for-woocommerce'),
                'variable' => __('By preparation time & extra time', 'food-online-for-woocommerce'),
                 'fixed_ship' => __('By preparation time & shipping time', 'food-online-for-woocommerce'),
                 'variable_ship' => __('By preparation time & extra time & shipping time', 'food-online-for-woocommerce')
            ),
            'css' => 'max-width:200px;',
            'desc' => __('Set the time until a delivery order can be delivered.', 'food-online-for-woocommerce'),
            'default' => 'none',
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ),

           array(
            'name' => __('Set shipping time', 'food-online-for-woocommerce'),
            'id' => 'fdoe_shipping_time',
            'type' => 'select',
            'options' => array(
                'none' => __('None', 'food-online-for-woocommerce'),
                'fixedtime' => __('Fixed shipping time', 'food-online-for-woocommerce'),
                'calculate' => __('Calculate shipping time', 'food-online-for-woocommerce'),

            ),
            'css' => 'max-width:200px;',
            'desc' => __('Set the time until a delivery order can be delivered. *Disclaimer - a calculated shipping time may not be applicable when using post code validation.', 'food-online-for-woocommerce'),
            'default' => 'none',
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ),
            array(
            'name' => __('Fixed shipping time', 'food-online-for-woocommerce'),
            'id' => 'fdoe_shipping_fixed',
            'css' => 'max-width:100px;',
            'default' => '0',
            'type' => 'text',
            'desc' => __('Set a fixed time in minutes for shipping an order.', 'food-online-for-woocommerce'),
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ),
            array(
            'type' => 'sectionend',
             'id' => 'fdoe_time_to_delivery_del',
        ),

array(
            'name' => __('Implementation', 'food-online-for-woocommerce'),
            'type' => 'title',
            'id' => 'fdoe_order_time_imple',

        ),
 array(
             'name' => __( 'Show order times at Menu page', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_order_times_menu',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
           // 'desc' => __( 'Add the order time to customer e-mails for processing order.', 'food-online-for-woocommerce' ),
            'default' => 'yes'
        ),
 array(
             'name' => __( 'Add to customer processing e-mail?', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_add_to_processing',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __( 'Add the order time to customer e-mails for processing order.', 'food-online-for-woocommerce' ),
            'default' => 'no'
        ),
  array(
             'name' => __( 'Add to customer completed e-mail?', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_add_to_completed',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __( 'Add the order time to customer e-mails for completed order.', 'food-online-for-woocommerce' ),
            'default' => 'no'
        ),
   array(
             'name' => __( 'Add to new order e-mail?', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_add_to_neworder',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __( 'Add the order time to store admin e-mail (New Order).', 'food-online-for-woocommerce' ),
            'default' => 'yes'
        ),
   array(
             'name' => __( 'Add to "Thank You" page?', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_add_to_thank_you',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __( 'Add the order time to the "Thank You" page showing when an order is received.', 'food-online-for-woocommerce' ),
            'default' => 'no'
        ),


         array(
            'type' => 'sectionend',
             'id' => 'fdoe_order_time_imple',
        ),

        );

}

if (!isset($settings_arg_timepicker))
{
   $settings_args_timepicker = array(
         array(
            'name' => __('Time Picker Settings', 'food-online-for-woocommerce'),
            'type' => 'title',
            'id' => 'fdoe_timepicker_settings',
             'desc' => __( 'A delivery mode needs to be enabled when to use the time picker.', 'food-online-for-woocommerce' ),

        ),
          array(
            'name' => __('Selectable days', 'food-online-for-woocommerce'),
            'id' => 'fdoe_timepick_days_qty',
            'css' => 'max-width:100px;',
            'default' => 2,
            'type' => 'number',
            'desc' => __( 'Set the number of days to pick time from', 'food-online-for-woocommerce' ),
            'custom_attributes' => array('min' => 1,'step' => 1,'required' => 'required'),
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',

        ),
          array(
            'name' => __('Enable maximum orders or items per time slot', 'food-online-for-woocommerce'),
            'id' => 'fdoe_max_slot_enable',
            'css' => 'max-width:100px;',
            'default' => 'no',
            'type' => 'select',
             'options' => array(
                'no' => __('Disable', 'food-online-for-woocommerce'),
                'yes' => __('Orders', 'food-online-for-woocommerce'),
                'items' => __('Items', 'food-online-for-woocommerce'),

            ),
             'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',

        ),
           array(
             'name' => __( 'Choose categories to include', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_max_slot_cats',
            'default' => array(),
            'type' => 'multiselect',
            'class' => 'wc-enhanced-select',
             'options' => $categories,
            'css' => 'max-width:200px;height:auto;',
            'desc' => __( 'Select product categories to include when counting the items per time slot', 'food-online-for-woocommerce' ),
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
    ),
           array(
            'name' => __('Set maximum orders/items per time slot', 'food-online-for-woocommerce'),
            'id' => 'fdoe_max_slot',
            'css' => 'max-width:100px;',
            'default' => 999,
            'type' => 'number',
            'desc' => __( 'Set the maximum quantity of orders/items per time slot', 'food-online-for-woocommerce' ),
            //'custom_attributes' => array('min' => 1),
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',

        ),
            array(
            'name' => __( 'Preselect closest timeslot', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_preselect_time',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __( 'Preselect the closest available time slot (Only when date is today)', 'food-online-for-woocommerce' ),
            'default' => 'no',
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ),


           array(
            'type' => 'sectionend',
            'id' => 'fdoe_timepicker_settings',
        ),



        array(
            'name' => __('Time Picker for Pick Up Orders', 'food-online-for-woocommerce'),
            'type' => 'title',
            'id' => 'fdoe_pickuptimes',
             'desc' => __( 'Let the customer choose a time for when to pick up their order.', 'food-online-for-woocommerce' ),
             'class' => 'fdoe_'
        ),
         array(
            'name' => __('Enable', 'food-online-for-woocommerce'),
            'id' => 'fdoe_pickuptimes_enable',
            'css' => 'max-width:100px;',
            'default' => 'no',
            'type' => 'checkbox',
            'desc' => __( 'This enables the time picker on the checkout page. To open slot times it is also needed to add a schedule for the time picker at the "Availability Schedule" settings tab.', 'food-online-for-woocommerce' ),
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ),
         array(
            'name' => __('Postpone', 'food-online-for-woocommerce'),
            'id' => 'fdoe_pickup_postpone',
            'css' => 'max-width:100px;',
            'default' => 'no',
            'type' => 'checkbox',
            'desc' => __( 'Postpone times avalible for selection using the configuration in the "Order Time Managment" Tab.', 'food-online-for-woocommerce' ),
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',

        ), array(
            'name' => __('When to start count processing orders/items?', 'food-online-for-woocommerce'),
            'id' => 'fdoe_pickup_start_count_processing',
            'css' => 'max-width:100px;',
            'default' => 1440,
            'type' => 'number',
            'desc' => __( 'If time slots are postponed with extra time, choose how many minutes before its time slot a processing order will be included in the postponement. Processing orders without any time slot will always be included.', 'food-online-for-woocommerce' ),
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',

        ),
          array(
            'name' => __('Step', 'food-online-for-woocommerce'),
            'id' => 'fdoe_pickuptime_step',
            'css' => 'max-width:100px;',
            'default' => 15,
            'type' => 'number',
             'custom_attributes' => array('min' => 1,'step' => 1,'required' => 'required'),

              'desc' => __( 'Set the time step in minutes from which customers can choose from', 'food-online-for-woocommerce' ),
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ),




         array(
            'type' => 'sectionend',
             'id' => 'fdoe_pickuptimes',
        ),





          array(
             'name' => __('Time Picker for Delivery Orders', 'food-online-for-woocommerce'),
            'type' => 'title',
            'id' => 'fdoe_deliverytimes',
             'desc' => __( 'Let the customer choose a time for when to expect their order to be delivered', 'food-online-for-woocommerce' ),
        ),
           array(
            'name' => __('Enable', 'food-online-for-woocommerce'),
            'id' => 'fdoe_deliverytime_enable',
            'css' => 'max-width:100px;',
            'default' => 'no',
            'type' => 'checkbox',
            'desc' => __( 'This enables the time picker on the checkout page. To open slot times it is also needed to add a schedule for the time picker at the "Availability Schedule" settings tab.', 'food-online-for-woocommerce' ),
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',


        ),
            array(
            'name' => __('Postpone', 'food-online-for-woocommerce'),
            'id' => 'fdoe_delivery_postpone',
            'css' => 'max-width:100px;',
            'default' => 'no',
            'type' => 'checkbox',
            'desc' => __( 'Postpone times avalible for selection using the configuration in the "Order Time Managment" Tab.', 'food-online-for-woocommerce' ),
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',


        ),
             array(
            'name' => __('When to start count processing orders/items?', 'food-online-for-woocommerce'),
            'id' => 'fdoe_delivery_start_count_processing',
            'css' => 'max-width:100px;',
            'default' => 1440,
            'type' => 'number',
            'desc' => __( 'If time slots are postponed with extra time, choose how many minutes before its time slot a processing order will be included in the postponement. Processing orders without any time slot will always be included.', 'food-online-for-woocommerce' ),
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',

        ),
            array(
            'name' => __('Step', 'food-online-for-woocommerce'),
            'id' => 'fdoe_deliverytime_step',
            'css' => 'max-width:100px;',
            'default' => '15',
            'type' => 'number',
            'custom_attributes' => array('min' => 1,'step' => 1,'required' => 'required'),
              'desc' => __( 'Set the time step in minutes from which customers can choose from', 'food-online-for-woocommerce' ),
            'custom_attributes' => array(
                'disabled' => 'disabled'
            ) ,
            'class' => 'fdoe_premium_option',
        ),




         array(
            'type' => 'sectionend',
             'id' => 'fdoe_deliverytimes',
        ),


        );
}
