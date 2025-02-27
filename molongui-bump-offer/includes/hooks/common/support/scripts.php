<?php
defined( 'ABSPATH' ) or exit;
function mbo_register_support_scripts()
{
    $file  = apply_filters( 'mbo/support/script', MOLONGUI_BUMP_OFFER_FOLDER . '/assets/js/common/support.3f45.min.js' );
    $deps  = array();
    $scope = 'support';

    mbo_register_script( $file, $scope, $deps, 'molongui_common_support' );
    add_action( "mbo/{$scope}/pre_enqueue_script", function()
    {
        mbo_enqueue_semantic();
        molongui_enqueue_sweetalert();
    });
}
add_action( 'admin_enqueue_scripts', 'mbo_register_support_scripts' );
function mbo_enqueue_support_scripts()
{
    $file  = apply_filters( 'mbo/support/script', MOLONGUI_BUMP_OFFER_FOLDER . '/assets/js/common/support.3f45.min.js' );
    $scope = 'support';

    mbo_enqueue_script( $file, $scope, true, 'molongui_common_support' );
}
function mbo_support_script_params()
{
    $scope  = 'support';
    $params = array();
    return apply_filters( "mbo/{$scope}/params", $params );
}