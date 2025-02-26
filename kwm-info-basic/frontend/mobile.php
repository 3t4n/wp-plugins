<?php
function get_kwm_mobile_phones(){
	
	$getOptions = get_kwm_all_infos('allPhones');
	foreach ($getOptions['mobile-phone'] as $mobilePhones) {
		if(!$foneReturn){
			$foneReturn = $mobilePhones;
		}elseif($mobilePhones != '' && $foneReturn != ''){
			$foneReturn .= ' / '.$mobilePhones;
		}
	}
	return $foneReturn;
}
?>