<?php

require_once dirname(__FILE__) . '/ac.class.php';

$timer = microtime(true);
$uri = $_SERVER['REQUEST_URI'];
$ac_obj = new AlphaCacheClass();

$cache_result = $ac_obj->get_cache($uri);
if ($cache_result['result'] !== false) {
	$ac_obj->stat_hit();
	$ac_obj->log($cache_result['filename']);
	$ac_obj->log('HIT! QUICK.');

	echo $data . "\n<!-- Alpha cache content. Generated from cache in " . (microtime(true) - $timer) . ' s. '
		. ' DB queries count : 0! -->';
	exit;
} else {
	unset($ac_obj);
	include $_SERVER['DOCUMENT_ROOT'] . '/index.php';
}
