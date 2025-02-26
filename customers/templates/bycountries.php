<?php

if(!$_GET["p"]){
	
	//Display all countries
	$out .= '<div class="listcountries"><h3>Countries</h3><br>- ';
	foreach($countries as $country){
		$out .= '<div style="display:block; float:left; width:170px; padding:20px 5px; text-align:center;"><a href="?p='.$country->code.'"><img src="'.CTS_FLG.'/150/'.strtolower($country->code).'.png" alt="'.$country->en.'" style="border:0;"> <br>'.$country->en.'</a></div>';
	}
	$out .= '</div>';
	
}else{
	
	//Display select country, list of customers and list of countries
	//Flag of select country
	$out .= '<div id="list" style="width:180px; float:left;">
	<img src="'.CTS_FLG.'/150/'.strtolower($country[0]->code).'.png" alt="'.$country[0]->en.'" style="border:0;"> <br>'.$country[0]->en.'<br><br>';
	//I store the code for use in foreach's countries. See 3 lines below
	$codecountry=$country[0]->code;
	
	//List of all countries
	foreach($countries as $country){
		if($codecountry === $country->code){ $stylecountry='color:black;'; }else{ $stylecountry='color:auto;'; }
		$out .= '<a href="?p='.$country->code.'"><img src="'.CTS_FLG.'/16/'.strtolower($country->code).'.png" alt="'.$country->en.'" style="border:0; vertical-align:text-top;"><span style="'.$stylecountry.'">'.$country->en.'</span></a><br>';
	}
	$out .= '
</div>
<div id="customers" style="width:450px; float:left;">
';
	//List of customers for select country
	//I have take a maximum of information for microformats (see here : http://microformats.org )
	foreach($customers as $customer){
		$out .= '<div id="hcard-'.$customer->cuname.'" class="vcard">';
		if(is_file(CTS_IMG_ADMIN.'/'.$customer->culogo)) $out .= '<img src="'.CTS_IMG.'/'.$customer->culogo.'" alt="'.$customer->cuname.'" height="40px;" class="photo"><br>';
		$out .= '<div class="org" style="color:black;"><strong>'.$customer->cuname.'</strong></div><br>';
		if($customer->cutown) $out .= '<div class="adr"><div class="street-address">'.$customer->cuadr1.'</div> '.$customer->cuadr2.' <span class="postal-code">'.$customer->cucp.'</span> <span class="country-name">'.$customer->cutown.'</span></div><br>';
		if($customer->cutel) $out .= '<div class="tel" style="float:left;">Tel : <a href="tel:'.$customer->cutel.'">'.$customer->cutel.'</a></div>';
		if($customer->cutel && $customer->cufax) $out .= '<div style="float:left;">&nbsp;-&nbsp;</div>';
		if($customer->cufax) $out .= '<div class="fax" style="float:left;">Fax : '.$customer->cufax.'</div>';
		if($customer->cutel || $customer->cufax)  $out .= '<br>';
		if($customer->cumail) $out .= '<a href="mailto:'.$customer->cumail.'" class="email">'.$customer->cumail.'</a>';
		if($customer->cumail && $customer->cuweb) $out .= ' - ';
		if($customer->cuweb) $out .= '<a href="'.$customer->cuweb.'"  class="url fn org" target="_blank">'.$customer->cuweb.'</a>';
		$out .= '</div><br><br><hr><br>';
	}
	$out .= '
	</div>';
	
}
?>