<?php
namespace Advanced_Blocks_Pro;

function change_ds($path)
{
	return str_replace('/', DIRECTORY_SEPARATOR, $path);
}

function _without($object, $values = [])
{
	$plucked = [];
	foreach ($object as $key => $value) {
		if (!in_array($key, $values)) {
			$plucked[$key] = $value;
		}
	}
	return $plucked;
}
function _pluck($object, $values = [])
{
	$plucked = [];
	foreach ($object as $key => $value) {
		if (in_array($key, $values)) {
			$plucked[$key] = $value;
		}
	}
	return $plucked;
}
function getFile($folder, $f)
{
	$file = change_ds(ADVANCEDBLOCKSPRO_PATH . "/includes/{$folder}/{$f}.json");
	// var_dump($file);
	if (file_exists($file)) {
		return json_decode(file_get_contents($file), true);
	}
	return [];
}
