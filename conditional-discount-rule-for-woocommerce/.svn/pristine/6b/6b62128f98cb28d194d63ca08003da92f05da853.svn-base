<?php

if(!function_exists('pisol_cdrw_array_equal')):
	function pisol_cdrw_array_equal($a, $b) {
		return (
			 is_array($a) 
			 && is_array($b) 
			 && count($a) == count($b) 
			 && array_diff($a, $b) === array_diff($b, $a)
		);
	}
endif;