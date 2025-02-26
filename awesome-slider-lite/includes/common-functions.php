<?php
function awescape($str='') {
	return addslashes($str);
}

if(!function_exists('show')) {
    function show($obj) {
        if(is_string($obj)) {
            echo $obj;
        }else if(is_array($obj) or is_object($obj)) {
            echo '<pre>';
            print_r($obj);
            echo '</pre>';
        }
    }
}
?>