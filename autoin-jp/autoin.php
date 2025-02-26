<?php
if( !defined('ABSPATH') ) exit;

function autoin_jp_change($output, $opt=""){
	global $wp_scripts;
	$apid= "";
	$use= 0;
	$ptrn= array();
	$ptrn[0]= 'zip';
	$ptrn[1]= 'postc';
	$ptrn[2]= 'uban';
if( strstr($output,'id="zipcode"')==true && !empty($opt) ){
		 if( strstr($output,'id="member_pref"')  ==true ) $apid="Welcartm";
	else if( strstr($output,'id="customer_pref"')==true ) $apid="Welcartc";
	else if( strstr($output,'id="delivery_pref"')==true ) $apid="Welcartd";
	else $apid= "Welcart";
}
else{
	foreach($ptrn as $ky => $da){                 // keyword check
		if( strstr($output,$da)==true ) {$use=1; break;}
	}
	if( $use == 0 ) return $output;               // 郵便番号がなければexit

	if( strstr($output,'id="trust_form_input_')==true ) $apid= "TrustForm";
	else
	if( strstr($output,'ninja-forms')==true )           $apid= "NinjaForms";
}

	$zipa= 'zipaddr';
	$atin= 'autoin';
	$auto= 'https://'.$atin.'.jp';
//	$html = '<input type="button" id="'.$atin.'_def" value="Autoin入力" onClick="Ato.in()">';
//	$html.= "\n";
	$sysd=  'D.';
	$syst=  'T.';
	$jsin= "function ".$zipa."_ownb(){";
	if( $apid == "NinjaForms" )
		$jsin.= $sysd."wp='2';";
	else
		$jsin.= $sysd."wp='1';";
	$jsin.= $sysd."sysid='".$apid."';";
	$jsin.= "}";
	$jsin.="function  ".$atin."_ownb(){";
	$jsin.= $syst.  "sid='".$apid."';";
	$jsin.= "}";
	$atjs= $auto.'/js/'. $atin.'.js?v='.autoin_VER;
	$atcs= $auto.'/css/'.$atin.'.css';
	$scs= '<script type="text/javascript"';
	$sce= '</script>';
	$atjss = $scs.' src="'.$atjs.'">'.$sce;
	$atjss.= $scs.">".$jsin.$sce."\n";

	wp_enqueue_style( $atin, $atcs );
if( $apid == "NinjaForms" ){
	$keywd= '<div class="wp-block-ninja-forms-form"';
	$ans= str_ireplace($keywd, $atjss.$keywd, $output);
}
else
if( strncmp($apid,"Welcart",7)==0 ){
	$ans= $atjss.$output;
}
else{
	$ans= "";
	$use= 0;
	$forma= preg_split('/<\/form>/', $output);
	$formc= count($forma) - 1;
	foreach($forma as $i => $dat){                // form
		if( $use == 0 ){
			foreach($ptrn as $ky => $da){
				if( strstr($dat,$da)==true ){     // 郵番あり
					$dat= str_ireplace("<form", $atjss."<form", $dat);
					$use= 1;
					break;
		}	}	}
		$ans.= $dat;
		if( $i < $formc ) $ans.= "</form>";       // 復元
	}
}
	return $ans;
}

function autoin_jp_usces($formtag,$type,$data) {return autoin_jp_change($formtag,"1");}
?>
