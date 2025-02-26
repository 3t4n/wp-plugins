<?php
// blogpost ad delivery function
function asc_dl_postad()
{
	global $asc_adnum;
	
	echo '<div id="asc_adbox_posthead">';
	echo ASC_TITLE;
	
	echo '<div id="asc_adcontent_'.$asc_adnum.'" class="asc_adcontent">&nbsp;</div>';
	
	echo '</div>';
	echo "<script type='text/javascript'>request_ad('".ASC_PAGEID."', 'asc_adcontent_".$asc_adnum."');</script>";
	
	$asc_adnum++;
}

// widget ad delivery function
function asc_dl_widgetad()
{
	echo '<div id="asc_adcontent_wdg" class="asc_adcontent">&nbsp;</div>';

	echo "<script type='text/javascript'>request_ad('".ASC_PAGEID."', 'asc_adcontent_wdg');</script>";
}
?>
