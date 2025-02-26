<?php
if (!defined("FEEDBLITZ_MAILVERIFY_URL")) {
  //define("FEEDBLITZ_MAILVERIFY_URL", "https://www.feedblitz.com/f/f.fbz?AddNewUserDirect&ajax=4");
  define("FEEDBLITZ_MAILVERIFY_URL", "https://app.feedblitz.com/f/f.Fbz?AddNewUserDirect");
  
}


function feedblitz_shortcode( $atts ) {
	extract(shortcode_atts(array(
		'id'		=> '',
		'publisher_id'		=> '',		
		'instructions'	=> '',
		'text'	=>'',
		'submit'		=> 'Subscribe'
	), $atts ));
		
	$html='
    <form name="feedblitzform"  method="POST" target="popupwindow" action="'.FEEDBLITZ_MAILVERIFY_URL.'"  onsubmit="window.open(\''.FEEDBLITZ_MAILVERIFY_URL.'\', \'popupwindow\', \'scrollbars=yes,width=550,height=520\');return true" _lpchecked="1">
 <p class="sub_instruct"> '.$instructions .'</p>
 <p class="sub_email">
 <input style="display:none" name="EMAIL"  type="text" value="'.$text.'"> 
<input name="EMAIL_"  type="hidden"  value=""> 
<input name="EMAIL_ADDRESS"  type="hidden"  value=""> 
 </p>
 <p>
<label><input name="VALIDATE" type="checkbox" required> I agree to be emailed to confirm my subscription to this list</label></p>
 <input name="cids" type="hidden" value="1">
 <input name="FEEDID" type="hidden" value="'.$id.'">
 <input name="PUBLISHER" type="hidden" value="'.$publisher_id.'">
 <input type="submit" value="'.$submit.'">
</form>
  ';
	 return $html;
?>
<script>function feedblitzformi(){var x=document.getElementsByName('feedblitzform');for(i=0;i<x.length;i++){x[i].EMAIL.style.display='block'; x[i].action='https://app.feedblitz.com/f/f.Fbz?AddNewUserDirect';}} function feedblitzformis(v){v.submit();}feedblitzformi();</script>
<?php 
}

add_shortcode('feedblitz', 'feedblitz_shortcode');

?>