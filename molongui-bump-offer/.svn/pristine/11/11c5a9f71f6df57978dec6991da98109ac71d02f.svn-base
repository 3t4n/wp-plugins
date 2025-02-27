<?php
defined( 'ABSPATH' ) or exit;

$fw_tools = array();

if ( apply_filters( 'mbo/options/add_common_tools', true ) )
{
    $fw_tools[] = array
    (
        'display' => true,
        'type'    => 'section',
        'id'      => MOLONGUI_BUMP_OFFER_PREFIX . '_tools',
        'name'    => __( 'Tools' ),
    );
    $fw_tools[] = array
    (
        'display' => true,
        'type'    => 'header',
        'label'   => __( "Plugin Settings", 'molongui-bump-offer' ),
        'buttons' => array(),
    );
    $fw_tools[] = array
    (
        'display' => true,
        'type'    => 'export',
        'class'   => 'is-compact',
        'label'   => __( "Export plugin configuration to have a backup or restore it on another installation", 'molongui-bump-offer' ),
        'button'  => array
        (
            'display'  => true,
            'id'       => 'export_options',
            'label'    => __( "Backup", 'molongui-bump-offer' ),
            'title'    => __( "Backup Plugin Configuration", 'molongui-bump-offer' ),
            'class'    => 'm-export-options same-width',
            'disabled' => false,
        ),
    );
    $plugin_tools   = array();
    $plugin_tools[] = array
    (
        'display' => apply_filters( 'authorship/options/display_banners', true ),
        'type'    => 'banner',
        'class'   => '',
        'default' => '',
        'id'      => 'import_options',
        'title'   => __( "Easily import previously saved plugin configuration with just 1 click", 'molongui-bump-offer' ),
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
    $plugin_tools[] = array
    (
        'display' => apply_filters( 'authorship/options/display_banners', true ),
        'type'    => 'banner',
        'class'   => '',
        'default' => '',
        'id'      => 'import_options',
        'title'   => __( "Reset plugin settings to their defaults", 'molongui-bump-offer' ),
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
    $fw_tools = array_merge( $fw_tools, apply_filters( 'mbo/options/common_tools', $plugin_tools ) );
}