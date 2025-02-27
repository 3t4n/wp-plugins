<?php
defined( 'ABSPATH' ) or exit;

$fw_options = array();
if ( apply_filters( 'mbo/options/add_common', true ) )
{
    $fw_options[] = array
    (
        'display' => true,
        'type'    => 'section',
        'id'      => 'advanced',
        'name'    => __( "Advanced", 'molongui-bump-offer' ),
    );
    $fw_options[] = array
    (
        'display'  => true,
        'advanced' => false,
        'type'     => 'header',
        'class'    => '',
        'label'    => __( "Uninstall", 'molongui-bump-offer' ),
        'buttons'  => array
        (
            'save' => array
            (
                'display'  => true,
                'type'     => 'save',
                'label'    => __( "Save", 'molongui-bump-offer' ),
                'title'    => __( "Save Settings", 'molongui-bump-offer' ),
                'class'    => 'm-save-options',
                'disabled' => true,
            ),
        ),
    );
    $fw_options[] = array
    (
        'display'  => true,
        'advanced' => false,
        'type'     => 'toggle',
        'class'    => '',
        'default'  => true,
        'id'       => 'keep_config',
        'title'    => '',
        'desc'     => '',
        'help'     => sprintf( __( "%sKeep this setting enabled to prevent config loss when removing the plugin from your site.%s %sKeeping plugin config might be useful on plugin reinstall or site migration.%s %sIf you want to completely remove all plugin config, uncheck this setting and then remove the plugin.%s", 'molongui-bump-offer' ), '<p>', '</p>', '<p>', '</p>', '<p>', '</p>' ),
        'label'    => __( "Keep plugin configuration for future use upon plugin uninstall.", 'molongui-bump-offer' ),
    );
    $fw_options[] = array
    (
        'display'  => true,
        'advanced' => false,
        'type'     => 'toggle',
        'class'    => '',
        'default'  => true,
        'id'       => 'keep_data',
        'title'    => '',
        'desc'     => '',
        'help'     => sprintf( __( "%sKeep this setting enabled to prevent data loss when removing the plugin from your site.%s %sKeeping plugin data might be useful on plugin reinstall or site migration.%s %sIf you want to completely remove any data added by the plugin since it was installed, uncheck this setting and then remove the plugin.%s", 'molongui-bump-offer' ), '<p>', '</p>', '<p>', '</p>', '<p>', '</p>' ),
        'label'    => __( "Keep plugin data for future use upon plugin uninstall.", 'molongui-bump-offer' ),
    );
}
$fw_options = apply_filters( 'mbo/options/common', $fw_options );