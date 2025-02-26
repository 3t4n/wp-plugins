<?php
include 'ss-box-init.php' ;
?>

<div id="<?=$ss_likebox_id?>" class="ss-likebox" style="<?=$ss_likebox_ltrb?> width:<?=$ss_box_width?>px; height:<?=$ss_box_height?>px; border:1px solid #ccc; box-shadow:0 0 40px <?=$options[ 'ShadowColor' ]?>; -webkit-box-shadow:0 0 40px <?=$options[ 'ShadowColor' ]?>;">
	<a class="twitter-timeline" data-chrome="noborders" width="<?=$ss_box_width?>px" height="<?=$ss_box_height?>px" href="https://twitter.com/twitter" data-widget-id="<?=$options[ 'TwitterID' ]?>">Tweets by @twitter</a>
</div>