<br style="clear:both" />
<div class="gdp-admin">
<h1>GDP Plugins &raquo; Social Overlay</h1>
<p>Plugin Settings</p>
<?php

	$opt = get_option('gdpSocialOverlay',true);
	if($_POST['refresh-gdpsocial'] == 'pizzarrone' && check_admin_referer( 'update-gdp-action', 'update-gdp-field' )){
	
	$gdpStruct = array('freq'=>$_POST['days'],'seconds'=>$_POST['seconds'],
				'home'=>(int)$_POST['home'],'articolo'=>(int)$_POST['articolo'],'pagina'=>(int)$_POST['pagina'],'archivio'=>(int)$_POST['archivio'],
				'facebook'=>$_POST['facebook'],
				'facebookFollow'=>$_POST['facebookFollow'],
				'twitter'=>$_POST['twitter'],
				'gplus'=>$_POST['gplus'],
				'whatSocial'=>$_POST['whatSocial'],
				'firstline'=>$_POST['firstline'],
				'promoline'=>$_POST['promoline'],
				'nomoreline'=>$_POST['nomoreline'],
				'facebookSDK'=>$_POST['facebookSDK'], 'facebookAPPID'=>$_POST['facebookAPPID']
);

	update_option('gdpSocialOverlay',$gdpStruct);
	$opt = get_option('gdpSocialOverlay',true);

}

if(empty($opt['freq']))$freq=0; else $freq=$opt['freq'];
if(empty($opt['seconds']))$seconds=0; else $seconds=$opt['seconds'];
if(empty($opt['facebook']))$facebook=''; else $facebook=$opt['facebook'];
if(empty($opt['facebookFollow']))$facebookFollow=''; else $facebookFollow=$opt['facebookFollow'];
if(empty($opt['twitter']))$twitter=''; else $twitter=$opt['twitter'];
if(empty($opt['gplus']))$gplus=''; else $gplus=$opt['gplus'];
if(empty($opt['facebookAPPID']))$facebookAPPID=''; else $facebookAPPID=$opt['facebookAPPID'];
if($opt['home']==1)$home = 'checked="checked"'; else $home = '';
if($opt['articolo']==1)$articolo = 'checked="checked"'; else $articolo = '';
if($opt['pagina']==1)$pagina = 'checked="checked"'; else $pagina = '';
if($opt['archivio']==1)$archivio = 'checked="checked"'; else $archivio = '';
if($opt['facebookSDK']==1)$facebookSDK = 'checked="checked"'; else $facebookSDK = '';

if(empty($opt['firstline'])) $firstline= 'Become fan on Facebook'; else $firstline= $opt['firstline'];
if(empty($opt['promoline'])) $promoline= 'Click on Like'; else $promoline= $opt['promoline'];
if(empty($opt['nomoreline'])) $nomoreline= "Don't ask me more!"; else $nomoreline= $opt['nomoreline'];


?>
<style>
.gdp-socialAdmin label {
	display:inline-block;
	width:200px;
}
.gdp-socialAdmin .gdp-item {
	padding-bottom:10px; border-bottom:1px solid #999;
}
</style>
<form class="gdp-socialAdmin" method="post" action="admin.php?page=gdp-social-overlay">
<input type="hidden" name="refresh-gdpsocial" value="pizzarrone" />
<label for="firstline">First line</label>  <input type="text" name="firstline" id="firstline" value="<?=$firstline?>"><br />
<label for="promoline">Promo line</label>  <input type="text" name="promoline" id="promoline" value="<?=$promoline?>"><br />
<label for="nomore">No more line</label>  <input type="text" name="nomoreline" id="nomoreline" value="<?=$nomoreline?>">
<br />
<h2>FREQUENCY</h2>
<div class="gdp-item">
<label for="days">Days</label>  <input type="text" size="3" name="days" id="days" value="<?=$freq?>"> 
(0 = Every loads, 1 or More = Every X Days )<br />
<label for="seconds">Seconds</label>  <input type="text" size="3" name="seconds" id="days" value="<?=$seconds?>"> 
(0 = It appear immediately, 1 or More = Appear after X Seconds) 
</div>
<h2>WHERE TO SHOW</h2>
<div class="gdp-item">
<label for="home">Homepage</label>  <input type="checkbox" <?=$home?>  name="home" id="home" value="1"><br />
<label for="articolo">Post</label>  <input type="checkbox" <?=$articolo?> name="articolo" id="articolo" value="1"> <br />
<label for="pagina">Page</label>  <input type="checkbox" <?=$pagina?> name="pagina" id="pagina" value="1"><br />
<label for="archivio">Archive</label>  <input type="checkbox" <?=$archivio?> name="archivio" id="archivio" value="1"><br />
</div>

<h2>SOCIAL ACCOUNTS</h2>
<label for="facebook">Facebook</label><input <?=($opt['whatSocial']=='facebook') ? 'checked="checked"':''?> type="radio" name="whatSocial" id="whatSocial" value="facebook" />  <input type="text" name="facebook" id="facebook" value="<?=$facebook?>"> 
<br />
<label for="facebookFollow">Facebook FOLLOW</label><input <?=($opt['whatSocial']=='facebookFollow') ? 'checked="checked"':''?> type="radio" name="whatSocial" id="whatSocial" value="facebookFollow" />  <input type="text" name="facebookFollow" id="facebookFollow" value="<?=$facebookFollow?>"> 
<br />
<label for="twitter">Twitter</label><input type="radio" <?=($opt['whatSocial']=='twitter') ? 'checked="checked"':''?> name="whatSocial" id="whatSocial" value="twitter" />   <input type="text" name="twitter" id="twitter" value="<?=$twitter?>"><br />
<label for="gplus">Google+</label>  <input type="radio" <?=($opt['whatSocial']=='gplus') ? 'checked="checked"':''?> name="whatSocial" id="whatSocial" value="gplus" />  <input type="text" name="gplus" id="gplus" value="<?=$gplus?>"> 
<br /><br />
<label for="facebookSDK">Include facebook SDK</label> <input type="checkbox" <?=$facebookSDK?> name="facebookSDK" id="facebookSDK" value="1" /> <input type="text" size="15" name="facebookAPPID" id="facebookAPPID" value="<?=$facebookAPPID?>" />  (Check it if Facebook SDK isn't included on your site)
<br />
<?php 
wp_nonce_field( 'update-gdp-action','update-gdp-field' );?>
<input type="submit" name="Aggiorna" value="Aggiorna" />
</form>
<hr />
<h4>Questo plugin ti è stato utile?</h4>
Offrimi una birra <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9TPCUGWY66LQW" target="_blank">cliccando qui</a>! :D
<h4>Do you like GDP-SocialOverlay plugin?</h4>
Gimme beer!  <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9TPCUGWY66LQW" target="_blank">cliccando qui</a>! :D
</div>
