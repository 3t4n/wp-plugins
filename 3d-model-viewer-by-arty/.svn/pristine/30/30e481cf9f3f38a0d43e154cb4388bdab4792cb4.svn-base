<?php

/**
 * @package  3D-Model-Viewer-by-Arty
 */
	
	if ( ! defined( 'ABSPATH' ) ) exit;

?>

<?php

    $apiOptions = get_option('arty_3dmodelviewer_woocommerce_api');

    $siteUrl = get_option('siteurl');

    $data = [
        'shopIdentity' => $siteUrl
    ];

    $response = wp_remote_post( $apiOptions['baseUrl'] . '/api/products/wc/check-install', array(
        'body'    => json_encode($data),
        'headers'     => [
            'Content-Type' => 'application/json',
        ]
    ));

    if (!empty($response->errors)){
		esc_html_e( 'Error connecting to Arty platform','3d-model-viewer-by-arty' );
        exit();
    }

    if (isset($response['body'])){

        $payload = json_decode($response['body']);

        if ($payload->valid){
            $installed = $payload->installed;
        } else {

            $installed = false;
        }

    } else {

        $installed = false;
    }

    $requirements = true;

    $permalinkStructure = get_option('permalink_structure');
    $wooCommerceActivated = ( is_plugin_active('woocommerce/woocommerce.php'));
    $localhost = strpos($siteUrl, 'localhost') || strpos($siteUrl, '127.0.0');

    if ($permalinkStructure == '' || !$wooCommerceActivated || $localhost){
        $requirements = false;
    }
?>

<div class="wrap">

    <div class="arty-block">

        <h1>
            <?php if ($installed){
				esc_html_e( 'You are connected to Arty platform','3d-model-viewer-by-arty' );
            } else {
				esc_html_e( 'Connect to Arty platform','3d-model-viewer-by-arty' );

            } ?>
        </h1>

	    <?php if (!$requirements) { ?>

        <div class="arty-requirements">
            <h3>
	            <?php if ($installed){
					esc_html_e( 'In order for the Arty plugin work properly, fix the following issues:','3d-model-viewer-by-arty' );
	            } else {
					esc_html_e( 'To connect your store to Arty platform, fix the following issues:','3d-model-viewer-by-arty' );
	            } ?>
            </h3>
            <ul>
	            <?php if ($localhost){ ?>
                    <li>
                        <?php esc_html_e( 'You can not connect to Arty platform from localhost','3d-model-viewer-by-arty' ); ?>
                    </li>
	            <?php } ?>
	            <?php if (!$wooCommerceActivated){ ?>
                    <li>
			            <?php esc_html_e( 'WooCommerce plugin has to be installed and activated','3d-model-viewer-by-arty' ); ?>
                    </li>
	            <?php } ?>
	            <?php if ($permalinkStructure == ''){ ?>
                    <li>
			            <?php esc_html_e( 'Permalink structure has to be different than "Plain" (navigate to Settings -> Permalinks)','3d-model-viewer-by-arty' ); ?>
                    </li>
	            <?php } ?>
            </ul>
        </div>

	    <?php } ?>

        <?php if ($installed){ ?>

            <a href="<?php echo esc_url( $apiOptions['baseUrl'] ); ?>" class="arty-button arty-button-plus <?php if (!$requirements){ ?>disabled<?php } ?>" target="_blank">
                <span><?php esc_html_e( 'Login to Arty platform','3d-model-viewer-by-arty' ); ?></span>
                <span></span>
            </a>

        <?php } else { ?>

            <a href="<?php echo esc_url( $apiOptions['baseUrl'] ); ?>/subscription/plugins/WC?shopID=<?php echo esc_url( $siteUrl ); ?>&payment=stripe" class="arty-button arty-button-plus <?php if (!$requirements){ ?>disabled<?php } ?>" target="_blank">
                <span><?php esc_html_e( 'Subscribe to Arty platform','3d-model-viewer-by-arty' ); ?></span>
                <span></span>
            </a>

        <?php } ?>

    </div>

</div>
