<?php


/**
 * pre()
 */
function pre($p) {
	tag_pre_open();
	print_r($p);
	tag_pre_close();
}

/**
 * prexit()
 */
function prexit($p) {
	pre($p);
	exit;
}

/**
 * pre2()
 */
function pre2($p) {
	tag_pre_open();
	var_dump($p);
	tag_pre_close();
}

/**
 * prexit2()
 */
function prexit2($p) {
	pre2($p);
	exit;
}



/**
 * tag_pre_open()
 */
function tag_pre_open() {
	echo '<pre style="color:black;text-shadow:none !important;background:LightPink;border:1px black solid;margin:5 0;padding:4px;border-radius:4px;-webkit-border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;width:99%;overflow:inherit;">';
	echo "\n";
}

/**
 * tag_pre_close()
 */
function tag_pre_close() {
	echo "\n";
	echo '</pre>';
}








