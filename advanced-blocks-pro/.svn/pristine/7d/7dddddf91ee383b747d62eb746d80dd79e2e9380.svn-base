<?php


namespace Advanced_Blocks_Pro;

use function _\get; 
use function _\kebabCase;

function combine_fields($advancedBlocksPro)
{
	$fields = [];
	foreach ($advancedBlocksPro as $key => $val) {
		if (!isset($fields[$key])) {
			$fields[$key] = [];
		}


		// Merge All Default Fields Files data
		foreach ($val as $k => $v) {
			if (isset($k[0]) && $k[0] === "_") {
				$fields[$key] = array_merge($fields[$key], getFile("default_fields", $k));
			}
		}

		// Modify and Merge standalone fields
		foreach ($val as $k => $v) {

			if (isset($k[0]) && $k[0] !== "_") {
				// var_dump($k, $v);
				// die;
				$check_field = get($fields[$key], $k);
				if ($check_field) {
					$fields[$key][$k] = array_merge($check_field, $v);
				} else {
					$fields[$key] = array_merge($fields[$key], [$k => $v]);
				}
			}
		}
	}
	// var_dump($fields[$key]);
	return $fields;
}
// field all
function combine_attributes($fields)
{
	$attr = [];

	foreach ($fields as $field_name => $field) {
		foreach ($field as $key => $val) {
			if (!isset($attr[$field_name][$key])) {
				$attr[$field_name][$key] = [];
			}

			$file = getFile('fields', $key);
			foreach ($val as $k => $v) {
				if (in_array($k,["all","_except"]) ) {
					$get_all = [];
					foreach ($file as $x => $y) {						
						
						if($k === "_except"){
							if(in_array($x,$v)){
								continue;
							}
							$get_all[$x] = $y;
							continue;
						}
						$get_all[$x] = array_merge($y, $v);
					}
					
					$attr[$field_name][$key] = array_merge($get_all, $attr[$field_name][$key]);
	// var_dump($attr[$field_name][$key]);
	// die;
				}
			}

			foreach ($val as $k => $v) {

				if (!in_array($k,["all","_except"])) {
					// var_dump($k);
					$check_field = get($attr[$field_name][$key], $k);
					if ($check_field) {
						$attr[$field_name][$key][$k] = array_merge($check_field, $v);
					} else {

						$get =  get($file, $k);

						$attr[$field_name][$key] = array_merge($attr[$field_name][$key], [$k => array_merge($get, $v)]);
					}
				}
			}
		}
	} 
	// var_dump($attr);
	// die;
	return $attr;
}

function extract_attributes($attrs, $prefix_name)
{
	$attributes = [];
	$js_attributes = [];
	foreach ($attrs as $attr_name => $fields) {
		foreach ($fields as $field_name => $attr) {
			foreach ($attr as $keys => $value) {

				$name = str_replace(["-", "/"], "_", kebabCase($prefix_name) . "-" . $attr_name . "-" . $field_name . "-" . $keys);

				$default_value_hover = get($value, "hover", []);
				$default_value_responsive = get($value, "responsive", []);

				$attributes[$name] = _without($value, ['responsive', 'hover']);
				$attributes[$name]['default'] = get($default_value_responsive, "desktop", get($value, 'default'));


				if (!empty($default_value_hover)) {
					$attributes[$name . "_hover"] =  _without($attributes[$name],["default"]);
					if(get($default_value_hover, "desktop")){
						$attributes[$name . "_hover"]['default'] = get($default_value_hover, "desktop");
					}

				}
//responsive
				if (is_array($default_value_responsive) && !empty($default_value_responsive)) {
					foreach ($default_value_responsive as $key => $value) {
						switch ($key) {
							case "all":

								$attributes[$name . "_tablet"] = _without($attributes[$name],["default"]);

								$attributes[$name . "_mobile"] = $attributes[$name . "_tablet"];

								break;
							case "tablet":
								$attributes[$name . "_tablet"] = $attributes[$name];
								$attributes[$name . "_tablet"]['default'] = $value;
								break;
							case "mobile":
								$attributes[$name . "_mobile"] = $attributes[$name];
								$attributes[$name . "_mobile"]['default'] = $value;
								break;
						}
					}
// hover
					if (is_array($default_value_hover)) {
						foreach ($default_value_hover as $key => $value) {
							switch ($key) {
								case "all":
									$attributes[$name . "_tablet_hover"] = _without($attributes[$name],["default"]);

									$attributes[$name . "_mobile_hover"] = $attributes[$name . "_tablet_hover"];

									break;
								case "tablet":
									$attributes[$name . "_tablet_hover"] = $attributes[$name];
									$attributes[$name . "_tablet_hover"]['default'] = $value;
									break;
								case "mobile":
									$attributes[$name . "_mobile_hover"] = $attributes[$name];
									$attributes[$name . "_mobile_hover"]['default'] = $value;
									break;
							}
						}
					}
				}

				$js_attributes[$attr_name][$field_name][$keys] = array_filter($attributes,function($k) use($name){return str_contains($k,$name);},ARRAY_FILTER_USE_KEY);
			}

		}
	}
	
	
	return compact('attributes','js_attributes');
}

