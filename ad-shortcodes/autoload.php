<?php

require_once __DIR__ . '/managements/ValidateID.php';
require_once __DIR__ . '/managements/Sanitize.php';

require_once __DIR__ . '/db/Model.php';

$db_files = glob( __DIR__ . '/db/*.php' );

foreach ( $db_files as $file ) {
	require_once $file;
}