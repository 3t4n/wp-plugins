<?php
  	header("Content-Type: text/plain; charset=UTF-8");
   	require_once("JSON.php");
	require_once("../../../../wp-config.php");
	$oJSON = new JSON();
	$oData = $oJSON->decode($HTTP_RAW_POST_DATA);
	$aSuggestions=array();
 if (strlen($oData->text) > 0) {
$aSuggestions=get_tags('fields=names&name__like=' . $oData->text . '&number=' . $oData->limit);
}
echo($oJSON->encode($aSuggestions));
?>
