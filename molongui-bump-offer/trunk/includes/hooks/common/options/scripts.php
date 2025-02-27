<?php
defined( 'ABSPATH' ) or exit;
function mbo_register_common_options_scripts()
{
    if ( apply_filters( 'mbo/options/enqueue_colorpicker', false ) ) wp_enqueue_script( 'wp-color-picker' );
    $file  = apply_filters( 'mbo/common_options/script', MOLONGUI_BUMP_OFFER_FOLDER . '/assets/js/common/options.7b62.min.js' );
    $deps  = array();
    $scope = 'common_options';

    mbo_register_script( $file, $scope, $deps, 'molongui_common_options' );
    add_action( "mbo/{$scope}/pre_enqueue_script", function()
    {
        mbo_enqueue_semantic();
        molongui_enqueue_sweetalert();
    });
}
add_action( 'admin_enqueue_scripts', 'mbo_register_common_options_scripts' );
function mbo_enqueue_common_options_scripts()
{
    $file  = apply_filters( 'mbo/common_options/script', MOLONGUI_BUMP_OFFER_FOLDER . '/assets/js/common/options.7b62.min.js' );
    $scope = 'common_options';

    mbo_enqueue_script( $file, $scope, true, 'molongui_common_options' );
}
function mbo_common_options_script_params()
{
    $scope  = 'common_options';
    $params = array
    (
        'plugin_id'      => MOLONGUI_BUMP_OFFER_PREFIX,
        'plugin_version' => MOLONGUI_BUMP_OFFER_VERSION,
        'is_pro'         => did_action( 'mbo_pro/loaded' ),
        'options_page'   => esc_url( admin_url( 'admin.php?page=' . MOLONGUI_BUMP_OFFER_NAME . '&tab=' . MOLONGUI_BUMP_OFFER_PREFIX . '_pro_' . 'license' ) ),
        1 => __( "Premium feature", 'molongui-bump-offer' ),
        2 => __( "This feature is available only for Premium users. Upgrade to Premium to unlock it!", 'molongui-bump-offer' ),
        101 => '', // unused?
        102 => __( "Saving", 'molongui-bump-offer' ),
        103 => __( "You are about to leave this page without saving. All changes will be lost.", 'molongui-bump-offer' ),
        104 => __( "WARNING: You are about to delete all your settings! Please confirm this action.", 'molongui-bump-offer' ),
        105 => MOLONGUI_BUMP_OFFER_PREFIX.'_',
        106 => __( "WARNING: You are about to restore your backup. This will overwrite all your settings! Please confirm this action.", 'molongui-bump-offer' ),
        107 => __( "WARNING: You are about to delete your backup. All unsaved options will be lost. We recommend that you save your options before deleting a backup. Please confirm this action.", 'molongui-bump-offer' ),
        108 => __( "WARNING: You are about to create a backup. All unsaved options will be lost. We recommend that you save your options before deleting a backup. Please confirm this action.", 'molongui-bump-offer' ),
        109 => __( "Delete", 'molongui-bump-offer' ),
        110 => MOLONGUI_BUMP_OFFER_PREFIX,
        111 => wp_create_nonce( 'mfw_import_options_nonce' ),
        112 => __( "File upload failed", 'molongui-bump-offer' ),
        113 => __( "Failed to load file.", 'molongui-bump-offer' ),
        114 => __( "Wrong file type", 'molongui-bump-offer' ),
        115 => __( "Only valid .JSON files are accepted.", 'molongui-bump-offer' ),
        116 => __( "Warning", 'molongui-bump-offer' ),
        117 => __( "You are about to restore your settings. This will overwrite all your existing configuration! Please confirm this action.", 'molongui-bump-offer' ),
        118 => __( "Cancel", 'molongui-bump-offer' ),
        119 => __( "OK", 'molongui-bump-offer' ),
        120 => __( "Success!", 'molongui-bump-offer' ),
        121 => __( "Plugin settings have been imported successfully. Click on the OK button and the page will be reloaded automatically.", 'molongui-bump-offer' ),
        122 => __( "Error", 'molongui-bump-offer' ),
        123 => __( "Something went wrong and plugin settings couldn't be restored. Please, make sure uploaded file has content and try uploading the file again.", 'molongui-bump-offer' ),
        124 => sprintf( __( "Either the uploaded backup file is for another plugin or it is from a newer version of the plugin. Please, make sure you are uploading a file generated with %s version lower or equal to %s.", 'molongui-bump-offer' ), MOLONGUI_BUMP_OFFER_TITLE, MOLONGUI_BUMP_OFFER_VERSION ),
        125 => __( "Some settings couldn't be restored. Please, try uploading the file again.", 'molongui-bump-offer' ),
        126 => __( "You are about to restore plugin default settings. This will overwrite all your existing configuration! Please confirm this action.", 'molongui-bump-offer' ),
        127 => wp_create_nonce( 'mfw_reset_options_nonce' ),
        128 => __( "Plugin settings have been restored to defaults successfully. Click on the OK button and the page will be reloaded automatically.", 'molongui-bump-offer' ),
        129 => __( "Something went wrong and plugin defaults couldn't be restored. Please, try again.", 'molongui-bump-offer' ),
        130 => __( "Something went wrong and couldn't connect to the server. Please, try again.", 'molongui-bump-offer' ),
        200 => wp_create_nonce( 'mfw_license_nonce' ),
        201 => __( "Something is missing...", 'molongui-bump-offer' ),
        202 => __( "You need to provide both values, License Key and PIN", 'molongui-bump-offer' ),
        203 => __( "Activated!", 'molongui-bump-offer' ),
        204 => __( "Oops... activation failed", 'molongui-bump-offer' ),
        205 => __( "Oops!", 'molongui-bump-offer' ),
        206 => __( "Something went wrong and the license has not been activated.", 'molongui-bump-offer' ),
        207 => __( "Deactivate license", 'molongui-bump-offer' ),
        208 => __( "Submit to deactivate your license now", 'molongui-bump-offer' ),
        209 => __( "No, cancel!", 'molongui-bump-offer' ),
        210 => __( "Yes, deactivate it!", 'molongui-bump-offer' ),
        211 => __( "Deactivated!", 'molongui-bump-offer' ),
        212 => __( "Oops... something weird happened!", 'molongui-bump-offer' ),
        213 => __( "Something went wrong and the license has not been deactivated.", 'molongui-bump-offer' ),
        214 => __( "Activate", 'molongui-bump-offer' ),
        215 => __( "Deactivate", 'molongui-bump-offer' ),
        216 => __( "Error" ),
        217 => __( "License PIN must contain only digits", 'molongui-bump-offer' ),
    );
    return apply_filters( "mbo/{$scope}/params", $params );
}
function mbo_menu_target_blank()
{
    ob_start();
    ?>
    <script type="text/javascript">
        (function($)
        {
            $( 'a[href="https://www.molongui.com/help/docs/"]' ).attr( 'target', '_blank' );
            $( 'a[href="https://demos.molongui.com/"]' ).attr( 'target', '_blank' );
        })( jQuery );
    </script>
    <?php
    echo preg_replace( '/\s+/S', ' ', ob_get_clean() );
}
add_action( 'admin_footer', 'mbo_menu_target_blank' );