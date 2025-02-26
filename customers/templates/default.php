<?php
//Begin display
$out = '<h1>Customer</h1>';

$out .= '<div class="listcountries"><h3>Countries</h3><br>- ';
foreach($countries as $country){
	$out .= '<a href="#'.$country->code.'">'.$country->en.'</a> - ';
}
$out .= '</div>';

unset($country);
$out .= '<div class="listcustomers">';
foreach($customers as $customer){
	//Check for change country
	if($country<>$customer->code){
		$out .= '<h3 id="'.$customer->code.'"><img src="'.CTS_FLG.'/16/'.strtolower($customer->code).'.png" alt="'.$customer->en.'"> '.$customer->en.'</h3>';
		$country=$customer->code;
	}
	if(is_file(CTS_IMG_ADMIN.'/'.$customer->culogo)) $out .= '<img src="'.CTS_IMG.'/'.$customer->culogo.'" alt="'.$customer->cuname.'" height="40px;">';
	$out .= $customer->cuname;
	$out .= $customer->en.'<br>';
}
$out .= '</div>';

?>