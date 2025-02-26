<?php
function get_kwm_telephones(){
	$getOptions = get_kwm_all_infos('allPhones');
	foreach ($getOptions['telephone'] as $telephone) {
		if(!$foneReturn){
			$foneReturn = $telephone;
		}elseif($telephone != '' && $foneReturn != ''){
			$foneReturn .= ' / '.$telephone;
		}
	}
	return $foneReturn;
}
?>