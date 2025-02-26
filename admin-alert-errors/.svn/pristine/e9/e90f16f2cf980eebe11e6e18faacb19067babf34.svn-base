<?php

/*
Plugin Name: Admin Alert Errors
Plugin URI: http://www.wpflux.com
Version: 1.0
Description: Display PHP errors in admin alerts
Author: Jason Witt
Author URI: http://www.jawittdesigns.com
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 *
 * Display PHP errors as WordPress admin alerts
 *
 * Output php errors as WordPress admin alerts. 
 * All PHP error consrants are displayed except E_STRICT.
 *
 * @param string $errno The level of the error raised
 * @param string $errstr Contains the error message
 * @param string $errfile Contains the filename that the error was raised in
 * @param string $errline Contains the line number the error was raised at
 *
 */
 
function customError($errno, $errstr, $errfile, $errline){
	$errorType = array (
		 E_ERROR 							=> 'ERROR',
		 E_CORE_ERROR     		=> 'CORE ERROR',
		 E_COMPILE_ERROR  		=> 'COMPILE ERROR',
		 E_USER_ERROR     		=> 'USER ERROR',
		 E_RECOVERABLE_ERROR  => 'RECOVERABLE ERROR',
		 E_WARNING        		=> 'WARNING',
		 E_CORE_WARNING   		=> 'CORE WARNING',
		 E_COMPILE_WARNING 		=> 'COMPILE WARNING',
		 E_USER_WARNING   		=> 'USER WARNING',
		 E_NOTICE         		=> 'NOTICE',
		 E_USER_NOTICE    		=> 'USER NOTICE',
		 E_DEPRECATED					=> 'DEPRECATED',
		 E_USER_DEPRECATED		=> 'USER_DEPRECATED',
		 E_PARSE          		=> 'PARSING ERROR'
	);
	if (array_key_exists($errno, $errorType)) {
		$errname = $errorType[$errno];
	} else {
		$errname = 'UNKNOWN ERROR';
	}
	ob_start();?>
	<div class="error">
	<p>
		<strong><?php echo $errname; ?> Error: [<?php echo $errno; ?>] </strong><?php echo $errstr; ?><strong> <?php echo $errfile; ?></strong> on line <strong><?php echo $errline; ?></strong>
	<p/>
	</div>
	<?php
	echo ob_get_clean();
}
set_error_handler("customError", E_ERROR ^ E_CORE_ERROR ^ E_COMPILE_ERROR ^ E_USER_ERROR ^ E_RECOVERABLE_ERROR ^  E_WARNING ^  E_CORE_WARNING ^ E_COMPILE_WARNING ^ E_USER_WARNING ^ E_NOTICE ^  E_USER_NOTICE ^ E_DEPRECATED	^  E_USER_DEPRECATED	^  E_PARSE );

?>