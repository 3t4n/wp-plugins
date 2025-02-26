<?php

use MuzaPayDeps\DI\Definition\Helper\CreateDefinitionHelper;
use MuzaPayDeps\Wpify\Log\RotatingFileLog;
use MuzaPayDeps\Wpify\Model\Manager;
use MuzaPayDeps\Wpify\PluginUtils\PluginUtils;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

return array(
	PluginUtils::class       => ( new CreateDefinitionHelper() )
		->constructor( __DIR__ . '/muzapay.php' ),
	Manager::class           => ( new CreateDefinitionHelper() )
		->constructor( [] ),
	RotatingFileLog::class   => ( new CreateDefinitionHelper() )
		->constructor( 'muzapay' )
);
