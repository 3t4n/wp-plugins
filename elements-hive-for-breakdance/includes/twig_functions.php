<?php

namespace ElementsHiveForBreakdance\TwigFunctions;

use Breakdance\PluginsAPI;
use Breakdance\Render;
use function Breakdance\Render\replaceVariableInDependencies;

/**
 * @return string
 */
function getElementsHivePluginUrl() {
	/**
	  * @var string $ELEMENTS_HIVE_DIR
	  */
	$ELEMENTS_HIVE_DIR = ELEMENTS_HIVE_DIR;

	return defined( 'ELEMENTS_HIVE_DIR' ) ? $ELEMENTS_HIVE_DIR : '';
}

\Breakdance\PluginsAPI\PluginsController::getInstance()->registerTwigFunction(
	'getElementsHivePluginUrl',
	'ElementsHiveForBreakdance\TwigFunctions\getElementsHivePluginUrl',
	'() => { return "' . getElementsHivePluginUrl() . '"; }',
	true
);

