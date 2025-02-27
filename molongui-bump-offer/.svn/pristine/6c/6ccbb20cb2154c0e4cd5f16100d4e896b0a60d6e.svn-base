<?php
defined( 'ABSPATH' ) or exit;

$options = array();
if ( true )
{
    $options[] = array
    (
        'display' => true,
        'type'    => 'section',
        'id'      => MOLONGUI_BUMP_OFFER_PREFIX . '_main',
        'name'    => __( 'Main', 'molongui-bump-offer' ),
    );
    $options[] = array
    (
        'display' => true,
        'type'    => 'title',
        'label'   => __( "Personalize Molongui Deals and Sales Promotions. Settings that make it yours.", 'molongui-bump-offer' ),
    );
    $options[] = array
    (
        'display' => true,
        'deps'    => '',
        'search'  => '',
        'type'    => 'header',
        'class'   => '',
        'id'      => 'deals',
        'label'   => __( "Deals", 'molongui-bump-offer' ),
        'button'  => array(),
    );
    $options[] = array
    (
        'display' => true,
        'deps'    => '',
        'search'  => '',
        'type'    => 'notice',
        'class'   => '',
        'default' => '',
        'id'      => 'notice_edit_deal',
        'title'   => '',
        'desc'    => sprintf( __( "Deals and sales promotions can be managed from the %sDeals%s submenu item you will find under the %sWooCommerce%s admin menu. Go there and customize your deals to your needs with full live preview.", 'molongui-bump-offer' ), '<strong>', '</strong>', '<strong><span id="mbo-menu-item">', '</span></strong>' ),
        'help'    => '',
        'link'    => '',
    );
    $options[] = array
    (
        'display' => true,
        'deps'    => '',
        'search'  => '',
        'type'    => 'link',
        'class'   => '',
        'default' => '',
        'id'      => 'open_edit_bump',
        'title'   => '',
        'desc'    => '',
        'label'   => __( "Click here to start editing your deals", 'molongui-bump-offer' ),
        'href'    => admin_url( 'edit.php?post_type=molongui_bump' ),
        'target'  => '_self',
    );
    $options[] = array
    (
        'display' => true,
        'deps'    => '',
        'search'  => '',
        'type'    => 'header',
        'class'   => '',
        'id'      => 'display',
        'label'   => __( "Display", 'molongui-bump-offer' ),
        'button'  => array
        (
            'display'  => true,
            'type'     => 'save',
            'label'    => __( "Save Settings", 'molongui-bump-offer' ),
            'title'    => __( "Save Settings", 'molongui-bump-offer' ),
            'class'    => 'm-save-options',
            'disabled' => true,
        ),
    );
    $multi_bumps   = array();
    $multi_bumps[] = array
    (
        'display' => apply_filters( 'mbo/options/display/banners', true ),
        'type'    => 'banner',
        'class'   => '',
        'default' => '',
        'id'      => 'what_if_many_bumps',
        'title'   => __( "Want to display multiple deals?", 'molongui-bump-offer' ),
        'desc'    => __( "Add as many deals as you wish and configure how to display them: all, the newest, the most expensive, one randomly...", 'molongui-bump-offer' ),
        'label'   => '',
        'button'  => array
        (
            'label'  => __( "Upgrade", 'molongui-bump-offer' ),
            'title'  => __( "Upgrade", 'molongui-bump-offer' ),
            'class'  => 'm-upgrade',
            'href'   => MOLONGUI_BUMP_OFFER_WEB,
            'target' => '_blank',
        ),
    );

    $options = array_merge( $options, apply_filters( '_mbo/options/display/multi_bumps/markup', $multi_bumps ) );
$options[] = array
(
    'display' => false,
    'deps'    => '',
    'search'  => '',
    'type'    => 'toggle',
    'class'   => '',
    'default' => true,
    'id'      => 'exclude_bumps_from_contents',
    'title'   => '',
    'desc'    => '',
    'help'    => __( "Check this option to ignore already added promoted products from Cart contents when evaluating whether to display a deal. If in doubt, leave this setting enabled.", 'molongui-bump-offer' ),
    'label'   => __( "Ignore already added promoted products from Cart contents when evaluating whether to display a deal", 'molongui-bump-offer' ),
);
    $regular_price   = array();
    $regular_price[] = array
    (
        'display' => apply_filters( 'mbo/options/display/banners', true ),
        'type'    => 'banner',
        'class'   => '',
        'default' => '',
        'id'      => 'show_regular_price',
        'title'   => __( "Want to display the deals or offers at your store making it easier for your customers?", 'molongui-bump-offer' ),
        'desc'    => __( "Price strikethrough will help your customers to compare between the regular and sale price of the product and would easily attract their attention.", 'molongui-bump-offer' ),
        'label'   => '',
        'button'  => array
        (
            'label'  => __( "Upgrade", 'molongui-bump-offer' ),
            'title'  => __( "Upgrade", 'molongui-bump-offer' ),
            'class'  => 'm-upgrade',
            'href'   => MOLONGUI_BUMP_OFFER_WEB,
            'target' => '_blank',
        ),
    );

    $options = array_merge( $options, apply_filters( '_mbo/options/display/regular_price/markup', $regular_price ) );
    $free_tag   = array();
    $free_tag[] = array
    (
        'display' => apply_filters( 'mbo/options/display/banners', true ),
        'type'    => 'banner',
        'class'   => '',
        'default' => '',
        'id'      => 'show_free_tag',
        'title'   => __( "Want to offer products for free?", 'molongui-bump-offer' ),
        'desc'    => __( "Show the well-known \"Free\" tag instead of the ugly and confusing \"0.00\" price tag.", 'molongui-bump-offer' ),
        'label'   => '',
        'button'  => array
        (
            'label'  => __( "Upgrade", 'molongui-bump-offer' ),
            'title'  => __( "Upgrade", 'molongui-bump-offer' ),
            'class'  => 'm-upgrade',
            'href'   => MOLONGUI_BUMP_OFFER_WEB,
            'target' => '_blank',
        ),
    );

    $options = array_merge( $options, apply_filters( '_mbo/options/display/free_tag/markup', $free_tag ) );
    $options[] = array
    (
        'display' => true,
        'deps'    => '',
        'search'  => '',
        'type'    => 'header',
        'class'   => '',
        'id'      => 'menu',
        'label'   => __( "Menu Item", 'molongui-bump-offer' ),
        'button'  => array
        (
            'display'  => true,
            'type'     => 'save',
            'label'    => __( "Save Settings", 'molongui-bump-offer' ),
            'title'    => __( "Save Settings", 'molongui-bump-offer' ),
            'class'    => 'm-save-options',
            'disabled' => true,
        ),
    );
    $options[] = array
    (
        'display' => true,
        'deps'    => '',
        'search'  => '',
        'type'    => 'inline-dropdown',
        'class'   => '',
        'default' => '',
        'id'      => 'submenu_location',
        'title'   => '',
        'desc'    => '',
        'help'    => '',
        'label'   => sprintf( __( "Add the sub-menu item that gives you access to configure your deals under the %s top-level menu.", 'molongui-bump-offer' ),  '{input}' ),
        'options' => array
        (
            'woocommerce' => array
            (
                'icon'  => '',
                'label' => __( "WooCommerce", 'molongui-bump-offer' ),
            ),
            'woocommerce-marketing' => array
            (
                'icon'  => '',
                'label' => __( "Marketing", 'molongui-bump-offer' ),
            ),
        ),
    );

}
if ( true )
{
    $options[] = array
    (
        'display' => true,
        'type'    => 'section',
        'id'      => MOLONGUI_BUMP_OFFER_PREFIX . '_default',
        'name'    => __( "Defaults", 'molongui-bump-offer' ),
    );
    $options[] = array
    (
        'display' => true,
        'type'    => 'title',
        'label'   => __( "Set default configuration for new deals.", 'molongui-bump-offer' ),
    );
    $defaults   = array();
    $defaults[] = array
    (
        'display' => apply_filters( 'mbo/options/display/banners', true ),
        'type'    => 'banner',
        'class'   => '',
        'default' => '',
        'id'      => 'defaults',
        'title'   => __( "Want to save up time when adding new deals?", 'molongui-bump-offer' ),
        'desc'    => __( "Configure deal defaults that all your new sales promotions will inherit upon addition. You can then customize each one individually if needed", 'molongui-bump-offer' ),
        'label'   => '',
        'button'  => array
        (
            'label'  => __( "Upgrade", 'molongui-bump-offer' ),
            'title'  => __( "Upgrade", 'molongui-bump-offer' ),
            'class'  => 'm-upgrade',
            'href'   => MOLONGUI_BUMP_OFFER_WEB,
            'target' => '_blank',
        ),
    );

    $options = array_merge( $options, apply_filters( '_mbo/options/defaults/markup', $defaults ) );
}
if ( true )
{
    $options[] = array
    (
        'display' => true,
        'type'    => 'section',
        'id'      => MOLONGUI_BUMP_OFFER_PREFIX . '_compat',
        'name'    => __( 'Compatibility', 'molongui-bump-offer' ),
    );
    $options[] = array
    (
        'display' => true,
        'type'    => 'title',
        'label'   => __( "Most of the issues you might have with the plugin can be easily fixed with these settings.", 'molongui-bump-offer' ),
    );
    $options[] = array
    (
        'display' => false,
        'deps'    => '',
        'search'  => '',
        'type'    => 'header',
        'class'   => '',
        'id'      => 'compat_themes_header',
        'label'   => __( "Themes", 'molongui-bump-offer' ),
        'button'  => array
        (
            'display'  => true,
            'type'     => 'save',
            'label'    => __( "Save Settings", 'molongui-bump-offer' ),
            'title'    => __( "Save Settings", 'molongui-bump-offer' ),
            'class'    => 'm-save-options',
            'disabled' => true,
        ),
    );
    $options[] = array
    (
        'display' => false,
        'deps'    => '',
        'search'  => '',
        'type'    => 'toggle',
        'class'   => '',
        'default' => true,
        'id'      => 'enable_theme_compat',
        'title'   => '',
        'desc'    => sprintf( __( "Molongui Boilerplate plugin works great with just about every theme, especially with the most popular. Some require tailored functions to achieve full compatibility, so you need to enable this setting. If you experience issues with the information displayed on your bylines or anything related to your authors information, make sure this is enabled. If it is and the issue persists, please %sopen a support ticket%s with us so we can assist.", 'molongui-bump-offer' ), '<a href="https://www.molongui.com/support/#open-ticket" target="_blank">', '</a>' ),
        'help'    => sprintf( __( "%sSome themes require this setting to be enabled in order to work properly.%s %sIn case of doubt, keep it enabled.%s", 'molongui-bump-offer' ), '<p>', '</p>', '<p>', '</p>'),
        'label'   => __( "Enable theme compatibility", 'molongui-bump-offer' ),
    );
    $options[] = array
    (
        'display' => false,
        'deps'    => '',
        'search'  => '',
        'type'    => 'link',
        'class'   => '',
        'default' => '',
        'id'      => '',
        'title'   => '',
        'desc'    => '',
        'help'    => __( "Click to open a Support Ticket", 'molongui-bump-offer' ),
        'label'   => __( "Issue persists? Report it", 'molongui-bump-offer' ),
        'href'    => molongui_get_support(),
        'target'  => '_blank',
    );
    $options[] = array
    (
        'display' => false, //apply_filters( 'boilerplate/options/display/banners', true ),
        'deps'    => '',
        'search'  => '',
        'type'    => 'banner',
        'class'   => '',
        'default' => '',
        'id'      => 'theme_premium_support',
        'title'   => __( "Need to make your theme work with Molongui Boilerplate ASAP?", 'molongui-bump-offer' ),
        'desc'    => __( "Get Premium support to make your theme run smoothly with Molongui Boilerplate.", 'molongui-bump-offer' ),
        'button'  => array
        (
            'label'  => __( "Upgrade", 'molongui-bump-offer' ),
            'title'  => __( "Upgrade", 'molongui-bump-offer' ),
            'class'  => 'm-upgrade',
            'href'   => MOLONGUI_BUMP_OFFER_WEB.'/pricing/',
            'target' => '_blank',
        ),
    );
    $options[] = array
    (
        'display' => false,
        'deps'    => '',
        'search'  => '',
        'type'    => 'header',
        'class'   => '',
        'id'      => 'compat_plugins_header',
        'label'   => __( "Plugins", 'molongui-bump-offer' ),
        'button'  => array
        (
            'display'  => true,
            'type'     => 'save',
            'label'    => __( "Save Settings", 'molongui-bump-offer' ),
            'title'    => __( "Save Settings", 'molongui-bump-offer' ),
            'class'    => 'm-save-options',
            'disabled' => true,
        ),
    );
    $options[] = array
    (
        'display' => false,
        'deps'    => '',
        'search'  => '',
        'type'    => 'toggle',
        'class'   => '',
        'default' => true,
        'id'      => 'enable_plugin_compat',
        'title'   => '',
        'desc'    => sprintf( __( "Some third plugins require tailored functions to be compatible with Molongui Boilerplate, so you need to enable this setting. If you experience issues related to your authors information, make sure this is enabled. If it is and the issue persists, please %sopen a support ticket%s with us so we can assist.", 'molongui-bump-offer' ), '<a href="https://www.molongui.com/support/#open-ticket" target="_blank">', '</a>' ),
        'help'    => sprintf( __( "%sSome plugins require this setting to be enabled in order to work properly.%s %sIn case of doubt, keep it enabled.%s", 'molongui-bump-offer' ), '<p>', '</p>', '<p>', '</p>'),
        'label'   => __( "Enable plugin compatibility", 'molongui-bump-offer' ),
    );
    $options[] = array
    (
        'display' => false,
        'deps'    => '',
        'search'  => '',
        'type'    => 'link',
        'class'   => '',
        'default' => '',
        'id'      => '',
        'title'   => '',
        'desc'    => '',
        'help'    => __( "Click to open a Support Ticket", 'molongui-bump-offer' ),
        'label'   => __( "Issue persists? Report it", 'molongui-bump-offer' ),
        'href'    => molongui_get_support(),
        'target'  => '_blank',
    );
    $options[] = array
    (
        'display' => false, //apply_filters( 'boilerplate/options/display/banners', true ),
        'deps'    => '',
        'search'  => '',
        'type'    => 'banner',
        'class'   => '',
        'default' => '',
        'id'      => 'plugin_premium_support',
        'title'   => __( "Want to benefit from Priority?", 'molongui-bump-offer' ),
        'desc'    => __( "Get elevated levels of support to help you keep your favourite plugins running smoothly together.", 'molongui-bump-offer' ),
        'button'  => array
        (
            'label'  => __( "Upgrade", 'molongui-bump-offer' ),
            'title'  => __( "Upgrade", 'molongui-bump-offer' ),
            'class'  => 'm-upgrade',
            'href'   => MOLONGUI_BUMP_OFFER_WEB.'/pricing/',
            'target' => '_blank',
        ),
    );
    $options[] = array
    (
        'display' => false,
        'deps'    => 'enable_author_boxes',
        'search'  => '',
        'type'    => 'header',
        'class'   => '',
        'id'      => 'compat_cdn_header',
        'label'   => __( "CDN", 'molongui-bump-offer' ),
        'button'  => array
        (
            'display'  => true,
            'type'     => 'save',
            'label'    => __( "Save Settings", 'molongui-bump-offer' ),
            'title'    => __( "Save Settings", 'molongui-bump-offer' ),
            'class'    => 'm-save-options',
            'disabled' => true,
        ),
    );
    $options[] = array
    (
        'display' => false,
        'deps'    => 'enable_author_boxes',
        'search'  => '',
        'type'    => 'toggle',
        'class'   => '',
        'default' => false,
        'id'      => 'enable_cdn_compat',
        'title'   => '',
        'desc'    => sprintf( __( "Messed up author box layout? And you using a CDN? Enable this setting and clear every cache you might have, including your CDN's. If the issue persists, please %sopen a support ticket%s with us so we can assist.", 'molongui-bump-offer' ), '<a href="https://www.molongui.com/support/#open-ticket" target="_blank">', '</a>' ),
        'help'    => array
        (
            'text' => sprintf( __( "%sActivate this setting only if you are experiencing issues.%s %sWhen using a CDN to serve stylesheet files, author box layout might look messed up. Enabling this setting should fix that.%s", 'molongui-bump-offer' ), '<p><strong>', '</strong></p>', '<p>', '</p>' ),
            'link' => 'https://www.molongui.com/docs/molongui-boilerplate/troubleshooting/the-author-box-layout-is-being-displayed-oddly/',
        ),
        'label'   => __( "Enable CDN compatibility to fix author box layout and make it display nicely.", 'molongui-bump-offer' ),
    );
    $options[] = array
    (
        'display' => false,
        'deps'    => 'enable_author_boxes',
        'search'  => '',
        'type'    => 'link',
        'class'   => '',
        'default' => '',
        'id'      => '',
        'title'   => '',
        'desc'    => '',
        'help'    => __( "Click to open a Support Ticket", 'molongui-bump-offer' ),
        'label'   => __( "Issue persists? Report it", 'molongui-bump-offer' ),
        'href'    => molongui_get_support(),
        'target'  => '_blank',
    );
    $options[] = array
    (
        'display' => false, //apply_filters( 'boilerplate/options/display/banners', true ),
        'deps'    => 'enable_author_boxes',
        'search'  => '',
        'type'    => 'banner',
        'class'   => '',
        'default' => '',
        'id'      => 'cdn_premium_support',
        'title'   => __( "Need Premium Support?", 'molongui-bump-offer' ),
        'desc'    => __( "Paid users are given top priority in our support system, with replies to their support tickets taking precedence.", 'molongui-bump-offer' ),
        'button'  => array
        (
            'label'  => __( "Upgrade", 'molongui-bump-offer' ),
            'title'  => __( "Upgrade", 'molongui-bump-offer' ),
            'class'  => 'm-upgrade',
            'href'   => MOLONGUI_BUMP_OFFER_WEB.'/pricing/',
            'target' => '_blank',
        ),
    );
    $options[] = array
    (
        'display' => false,
        'deps'    => '', // This header has multiple dependencies, so it must be handled with tailor-made JS.
        'search'  => '',
        'type'    => 'header',
        'class'   => '',
        'id'      => 'compat_rest_header',
        'label'   => __( "REST API", 'molongui-bump-offer' ),
        'button'  => array
        (
            'display'  => did_action( 'mbo_pro/loaded' ),
            'type'     => 'save',
            'label'    => __( "Save Settings", 'molongui-bump-offer' ),
            'title'    => __( "Save Settings", 'molongui-bump-offer' ),
            'class'    => 'm-save-options',
            'disabled' => true,
        ),
    );
    $rest_api   = array();
    $rest_api[] = array
    (
        'display' => false, //apply_filters( 'boilerplate/options/display/banners', true ),
        'deps'    => '', // This header has multiple dependencies, so it must be handled with tailor-made JS.
        'search'  => '',
        'type'    => 'banner',
        'class'   => '',
        'default' => '',
        'id'      => 'rest_api',
        'title'   => __( "Allow third-party applications to interact with your posts and authors via the WordPress REST API.", 'molongui-bump-offer' ),
        'desc'    => __( "Expose post co-authors and guest author object.", 'molongui-bump-offer' ),
        'button'  => array
        (
            'label'  => __( "Upgrade", 'molongui-bump-offer' ),
            'title'  => __( "Upgrade", 'molongui-bump-offer' ),
            'class'  => 'm-upgrade',
            'href'   => MOLONGUI_BUMP_OFFER_WEB,
            'target' => '_blank',
        ),
    );

    $options = array_merge( $options, apply_filters( '_mbo/options/rest_api/markup', $rest_api ) );
    $options[] = array
    (
        'display' => true,
        'deps'    => '',
        'search'  => '',
        'type'    => 'header',
        'class'   => '',
        'id'      => 'compat_misc_header',
        'label'   => __( "Misc", 'molongui-bump-offer' ),
        'button'  => array
        (
            'display'  => true,
            'type'     => 'save',
            'label'    => __( "Save Settings", 'molongui-bump-offer' ),
            'title'    => __( "Save Settings", 'molongui-bump-offer' ),
            'class'    => 'm-save-options',
            'disabled' => true,
        ),
    );
    $options[] = array
    (
        'display' => true,
        'deps'    => '',
        'search'  => '',
        'type'    => 'toggle',
        'class'   => '',
        'default' => false,
        'id'      => 'hide_qty_input',
        'title'   => '',
        'desc'    => '',
        'help'    => array
        (
            'text' => sprintf( __( "%sIn the shopping cart, customers can change the quantity of products or remove them.%s %sYou may want to prevent that for promoted products added to the Cart. So only one offer can be added per order.%s %sTo remove quantity handle for added promoted products, you might need to provide the CSS classes given by your theme to that HTML input.%s", 'molongui-bump-offer' ), '<p>', '</p>', '<p>', '</p>', '<p>', '</p>' ),
            'link' => '',
        ),
        'label'   => __( "Prevent quantity handle to be displayed for added deals when displaying customer's Cart", 'molongui-bump-offer' ),
    );
    $options[] = array
    (
        'display'     => true,
        'deps'        => '',
        'search'      => '',
        'type'        => 'inline-text',
        'placeholder' => '.qty',
        'default'     => '',
        'class'       => 'inline',
        'id'          => 'hide_qty_input_class',
        'title'       => '',
        'desc'        => '',
        'help'        => array
        (
            'text'    => sprintf( __( "%sThe CSS class for the quantity %sinput%s HTML element.%s %sThemes tend to keep the %s.qty%s class name given by default by WooCommerce. But not all of them do.%s", 'molongui-bump-offer' ), '<p>', '<code>', '</code>', '</p>', '<p>', '<code>', '</code>', '</p>' ),
            'link'    => '',
        ),
        'label'       => __( "CSS class name given by my active theme to the quantity handle: {input}", 'molongui-bump-offer' ),
    );
    $options[] = array
    (
        'display'     => true,
        'deps'        => '',
        'search'      => '',
        'type'        => 'inline-text',
        'placeholder' => '.quantity',
        'default'     => '',
        'class'       => 'inline',
        'id'          => 'hide_qty_input_parent_class',
        'title'       => '',
        'desc'        => '',
        'help'        => array
        (
            'text'    => sprintf( __( "%sThe CSS class for the parent element that contains the quantity %sinput%s HTML element.%s %sThemes tend to keep the %s.quantity%s class name given by default by WooCommerce. But not all of them do.%s", 'molongui-bump-offer' ), '<p>', '<code>', '</code>', '</p>', '<p>', '<code>', '</code>', '</p>' ),
            'link'    => '',
        ),
        'label'       => __( "CSS class name given by my active theme to the quantity handle's parent element: {input}", 'molongui-bump-offer' ),
    );
    $options[] = array
    (
        'display'     => true,
        'deps'        => '',
        'search'      => '',
        'type'        => 'inline-text',
        'placeholder' => '.qty-minus',
        'default'     => '',
        'class'       => 'inline',
        'id'          => 'hide_qty_input_prev_class',
        'title'       => '',
        'desc'        => '',
        'help'        => array
        (
            'text'    => sprintf( __( "%sSome themes add a styled control to handle the reduction of product items.%s %sTo remove it, you need to provide the CSS class given by your theme to that HTML element.%s %sIt should be the previous sibling to the to the quantity %sinput%s element.%s", 'molongui-bump-offer' ), '<p>', '</p>', '<p>', '</p>', '<p>', '<code>', '</code>', '</p>' ),
            'link'    => '',
        ),
        'label'       => __( "CSS class name given by my active theme to the minus button: {input}", 'molongui-bump-offer' ),
    );
    $options[] = array
    (
        'display'     => true,
        'deps'        => '',
        'search'      => '',
        'type'        => 'inline-text',
        'placeholder' => '.qty-plus',
        'default'     => '',
        'class'       => 'inline',
        'id'          => 'hide_qty_input_next_class',
        'title'       => '',
        'desc'        => '',
        'help'        => array
        (
            'text'    => sprintf( __( "%sSome themes add a styled control to handle the addition of product items.%s %sTo remove it, you need to provide the CSS class given by your theme to that HTML element.%s %sIt should be the next sibling to the to the quantity %sinput%s element.%s", 'molongui-bump-offer' ), '<p>', '</p>', '<p>', '</p>', '<p>', '<code>', '</code>', '</p>' ),
            'link'    => '',
        ),
        'label'       => __( "CSS class name given by my active theme to the plus button: {input}", 'molongui-bump-offer' ),
    );
}
if ( true )
{
    $options[] = array
    (
        'display' => true,
        'type'    => 'section',
        'id'      => MOLONGUI_BUMP_OFFER_PREFIX . '_shortcodes',
        'name'    => __( "Shortcodes", 'molongui-bump-offer' ),
    );
    $options[] = array
    (
        'display' => true,
        'type'    => 'title',
        'label'   => __( "Handy shortcodes that will help selling a lot more.", 'molongui-bump-offer' ),
    );
    $options[] = array
    (
        'display' => true,
        'deps'    => '',
        'search'  => '',
        'type'    => 'header',
        'class'   => '',
        'id'      => 'shortcodes_header',
        'label'   => __( "Shortcodes", 'molongui-bump-offer' ),
        'button'  => array(),
    );
    $options[] = array
    (
        'display' => apply_filters( 'mbo/options/display/banners', true ),
        'deps'    => '',
        'search'  => '',
        'type'    => 'banner',
        'class'   => '',
        'default' => '',
        'id'      => 'shortcodes',
        'title'   => __( "Display your deals and sales promotions anywhere on your site. In your sidebar, in a post, in a related product page. Wherever", 'molongui-bump-offer' ),
        'desc'    => __( "A must-have if you want to sky rocket your sales!", 'molongui-bump-offer' ),
        'button'  => array
        (
            'label'  => __( "Upgrade", 'molongui-bump-offer' ),
            'title'  => __( "Upgrade", 'molongui-bump-offer' ),
            'class'  => 'm-upgrade',
            'href'   => MOLONGUI_BUMP_OFFER_WEB,
            'target' => '_blank',
        ),
    );
    $options[] = array
    (
        'display' => true,
        'deps'    => '',
        'search'  => '',
        'type'    => 'notice',
        'class'   => '',
        'default' => '',
        'id'      => 'shortcode_molongui_deal',
        'title'   => '[molongui_deal]',
        'desc'    => sprintf( __( "Displays a given sales promotion anywhere you want. Want to display your deal on the sidebar? Maybe on a product landing page? Make use of this easy to use shortcode and let your customers add the offered product to their Cart with just 1 click!", 'molongui-bump-offer' ), '<a href="https://www.molongui.com/docs/deals-sales-promotions-and-upsells-for-woocommerce/shortcodes/" target="_blank">', '</a>' ),
        'help'    => sprintf( __( "This shortcode requires the %sid%s attribute, which corresponds to the deal ID from that sales promotion you want to display. %sLet's say you would like to display the deal with ID = 123. You should use: %s%s[molongui_deal id=123]%s", 'molongui-bump-offer' ), '<code>', '</code>', '<br><br>', '<br><br>', '<code>', '</code>' ),
        'link'    => '',
    );
    $options[] = array
    (
        'display' => did_action( 'mbo_pro/loaded' ) and version_compare( get_bloginfo( 'version' ),'4.9', '<' ),
        'deps'    => '',
        'search'  => '',
        'type'    => 'header',
        'class'   => '',
        'id'      => 'widgets_header',
        'label'   => __( "Widgets", 'molongui-bump-offer' ),
        'button'  => array(),
    );
    $options[] = array
    (
        'display' => did_action( 'mbo_pro/loaded' ) and version_compare( get_bloginfo( 'version' ),'4.9', '<' ),
        'deps'    => '',
        'search'  => '',
        'type'    => 'toggle',
        'class'   => '',
        'default' => false,
        'id'      => 'enable_sc_text_widget',
        'title'   => '',
        'desc'    => '',
        'help'    => '',
        'label'   => __( "Enable the use of shortcodes in text widgets.", 'molongui-bump-offer' ),
    );
}
if ( true )
{
    $options[] = array
    (
        'display' => true,
        'type'    => 'section',
        'id'      => MOLONGUI_BUMP_OFFER_PREFIX . '_tools',
        'name'    => __( 'Tools' ),
    );
    $options[] = array
    (
        'display' => true,
        'type'    => 'title',
        'label'   => __( "Convenient tools to easily manage plugin data.", 'molongui-bump-offer' ),
    );
    $options[] = array
    (
        'display' => true,
        'deps'    => '',
        'search'  => '',
        'type'    => 'header',
        'class'   => '',
        'id'      => 'tools_deals_header',
        'label'   => __( "Deals", 'molongui-bump-offer' ),
        'button'  => array(),
    );

    $bump_tools = array();
    $bump_tools[] = array
    (
        'display' => apply_filters( 'mbo/options/display/banners', true ),
        'deps'    => '',
        'search'  => '',
        'type'    => 'banner',
        'class'   => '',
        'default' => '',
        'id'      => 'import_bumps',
        'title'   => __( "Easily import one or thousands of deals with just 1 click", 'molongui-bump-offer' ),
        'desc'    => '',
        'button'  => array
        (
            'label'  => __( "Upgrade", 'molongui-bump-offer' ),
            'title'  => __( "Upgrade", 'molongui-bump-offer' ),
            'class'  => 'm-upgrade same-width',
            'href'   => MOLONGUI_BUMP_OFFER_WEB,
            'target' => '_blank',
        ),
    );
    $bump_tools[] = array
    (
        'display' => apply_filters( 'mbo/options/display/banners', true ),
        'deps'    => '',
        'search'  => '',
        'type'    => 'banner',
        'class'   => '',
        'default' => '',
        'id'      => 'export_bumps',
        'label'   => __( "Export your deals to have a backup or import them on another installation", 'molongui-bump-offer' ),
        'button'  => array
        (
            'label'  => __( "Upgrade", 'molongui-bump-offer' ),
            'title'  => __( "Upgrade", 'molongui-bump-offer' ),
            'class'  => 'm-upgrade same-width',
            'href'   => MOLONGUI_BUMP_OFFER_WEB,
            'target' => '_blank',
        ),
    );
    $bump_tools[] = array
    (
        'display' => apply_filters( 'mbo/options/display/banners', true ),
        'deps'    => '',
        'search'  => '',
        'type'    => 'banner',
        'class'   => '',
        'default' => '',
        'id'      => 'delete_bumps',
        'title'   => __( "Remove all existing deals at once. Instantly", 'molongui-bump-offer' ),
        'desc'    => '',
        'button'  => array
        (
            'label'  => __( "Upgrade", 'molongui-bump-offer' ),
            'title'  => __( "Upgrade", 'molongui-bump-offer' ),
            'class'  => 'm-upgrade same-width',
            'href'   => MOLONGUI_BUMP_OFFER_WEB,
            'target' => '_blank',
        ),
    );

    $options = array_merge( $options, apply_filters( '_mbo/options/bump/tools/markup', $bump_tools ) );
}