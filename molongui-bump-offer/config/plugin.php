<?php
defined( 'ABSPATH' ) or exit;
$config = array
(
    'brand' => 'Molongui',
    'name'  => 'Bump Offer',
    'id'    => 'mbo',
    'title' => 'Order Bump',
    'tag'   => 'Order Bump',
    'web'   => 'https://www.molongui.com/order-bump-for-woocommerce/',
    'demo'  => 'https://demos.molongui.com/test-drive-molongui-deals-sales-promotions-and-upsells-pro/',
    'db'  => 10,
    'cpt' => 'molongui_bump',
    'has_pro'         => true,
    'min_pro'         => '1.2.1',
    'recommended_pro' => '1.2.9',
    'debug_mode' => false,
);
$plugin_id = strtolower( str_replace( ' ', '-', $config['brand'] . ' ' . $config['name'] ) );
$plugin_px = str_replace( '-', '_', $plugin_id );
defined( 'MOLONGUI_BUMP_OFFER_DIR'  ) or define( 'MOLONGUI_BUMP_OFFER_DIR' , dirname( __DIR__ ) . '/' );
defined( 'MOLONGUI_BUMP_OFFER_FILE' ) or define( 'MOLONGUI_BUMP_OFFER_FILE', dirname( __DIR__ ) . '/' . $plugin_id . '.php' );
$constants = array
(
    'NAME'   => $plugin_id,
    'PREFIX' => $plugin_px,
    'ID'     => $config['id'],
    'TITLE'  => $config['brand'] . ' ' . $config['title'],
    'TAG'    => $config['tag'],
    'WEB'    => $config['web'],
    'DEMO'   => $config['demo'],
    'FOLDER'    => basename( dirname( MOLONGUI_BUMP_OFFER_FILE ) ),
    'URL'       => plugin_dir_url( MOLONGUI_BUMP_OFFER_FILE ),
    'BASENAME'  => plugin_basename( MOLONGUI_BUMP_OFFER_FILE ),
    'NAMESPACE' => str_replace( ' ', '', ucwords( strtr( ucwords( strtolower( $config['name'] ) ), array( '-' => ' ', '_' => ' ' ) ) ) ),
    'DB'               => $config['db'],
    'CPT'              => $config['cpt'],
    'DB_VERSION'       => $plugin_px.'_db_version',
    'INSTALLATION'     => $plugin_px.'_install',
    'NOTICES'          => $plugin_px.'_notices',
    'HAS_PRO'         => $config['has_pro'],
    'MIN_PRO'         => $config['min_pro'],
    'RECOMMENDED_PRO' => $config['recommended_pro'],
    'DEBUG' => $config['debug_mode'],
    'MAIN_SETTINGS'    => $plugin_px.'_options',
    'DEFAULT_SETTINGS' => $plugin_px.'_options',
    'COMPAT_SETTINGS'  => $plugin_px.'_options',
    'HOOKS_SETTINGS'   => $plugin_px.'_hooks',
);
if ( isset( $dont_load_constants ) and $dont_load_constants )
{
    unset( $dont_load_constants );
    return;
}
$constant_prefix = strtoupper( $plugin_px.'_' );
foreach ( $constants as $const => $value )
{
    $const = $constant_prefix . $const;
    if ( !defined( $const ) ) define( $const, $value );
}