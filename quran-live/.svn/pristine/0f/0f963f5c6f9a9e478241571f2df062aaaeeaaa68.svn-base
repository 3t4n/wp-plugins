<?php

defined( 'ABSPATH' ) or die( 'Salem aleykoum!' );

    wp_register_script('quran_admin_color',plugin_dir_url( __FILE__ ).'js/jscolor/jscolor.js');	

	wp_enqueue_script('quran_admin_color');

	if(isset($_POST['template_quranlive_update'])){

		if(!wp_verify_nonce($_POST['template_quranlive_noncename'], 'tplquran')){

			die('token non valide');

		}

		foreach($_POST['option'] as $name => $value){

			if(empty($value)){

				delete_option($name);

			}else{

				update_option($name, $value);

			}


		}

			?>

			<div id="message" class="updated fade">

			<p>Quran Live option saved!</p>

			</div>

			<?php

	}

?>

<style>

input:checked ~ img  {

    border: 5px solid #00A0D2;

}
#thadminquran{width: auto !important;}
.border_tpl_quran{float:left}
#borderColorQuran{display: none;}
#bloc_admin_quran{background:#ffffff;padding:20px;color:#7a7a7a;}
#bloc_admin_quran th{color:#7a7a7a;padding:20px;}
#bloc_admin_quran tr:nth-child(even) {background: #F8F8F8}
#bloc_admin_qurantr:nth-child(odd) {background: #FFF}
</style>

<div class="wrap" id="bloc_admin_quran">

<h3>Quran Live Multilanguage Options</h3>



<form method="post" action="">



<?php settings_fields( 'quranlive-options' ); ?>


<table class="form-table">

<tr valign="top">

<th scope="row" id="thadminquran">Background by default</th>

<td>
<label>
<input type="radio"  name="option[template_quran_live]" <?php if(get_option('template_quran_live') == 'bg_verse') {echo "checked";}?> value="bg_verse" style="display:none"/>
<img src="<?php echo plugin_dir_url( __FILE__ );?>bg_verse.jpg" style="width:10%">
</label>
<label>
<input type="radio"  name="option[template_quran_live]" <?php if(get_option('template_quran_live') == 'bg_verse2') {echo "checked";}?> value="bg_verse2" style="display:none"/>
<img src="<?php echo plugin_dir_url( __FILE__ );?>bg_verse2.jpg" style="width:10%">
</label>
<label>
<input type="radio"  name="option[template_quran_live]" <?php if(get_option('template_quran_live') == 'bg_verse3') {echo "checked";}?> value="bg_verse3" style="display:none"/>
<img src="<?php echo plugin_dir_url( __FILE__ );?>bg_verse3.jpg" style="width:10%">
</label>
<label>
<input type="radio"  name="option[template_quran_live]" <?php if(get_option('template_quran_live') == 'bg_verse4') {echo "checked";}?> value="bg_verse4" style="display:none"/>
<img src="<?php echo plugin_dir_url( __FILE__ );?>bg_verse4.jpg" style="width:10%"></td>
</label>
</td>
</tr>


<tr valign="top" id="displaytemplateQuran">

<th scope="row" id="thadminquran">Display image background</th>

<td>
   <label><input type="radio" id="background_enable" onclick="backliveDisabled();" name="option[tpl_quran_live]" <?php if (get_option('tpl_quran_live') == "enable") {echo 'checked="checked"';} ?> value="enable">Enable</label>
   <label><input type="radio" name="option[tpl_quran_live]" onclick="backliveDisabled();" id="background_disabled" <?php if (get_option('tpl_quran_live') == "disabled") {echo 'checked="checked"';} ?> value="disabled">Disabled</label><br>
</td>

</tr>
<tr valign="top" id="borderColorQuran">

<th scope="row" id="thadminquran">Choose Background Color</th>

<td>
<input name="option[background_quranlive_color]" id="text_quran_title" class="color" value="<?php echo get_option('background_quranlive_color'); ?>" />
</td>

</tr>


<tr valign="top">

<th scope="row" id="thadminquran">language default</th>

<td>

			<select name="option[quran_live_languages]" id="quran_live_languages">

			<option value="arabe"<?php if (get_option('quran_live_languages') == "arabe"){echo 'selected="selected"';}?>>Arabe</option>				

			<option value="english"<?php if (get_option('quran_live_languages') == "english"){echo 'selected="selected"';}?>>English</option>			

			<option value="francais"<?php if (get_option('quran_live_languages') == "francais"){echo 'selected="selected"';}?>>Français</option>

			<option value="german"<?php if (get_option('quran_live_languages') == "german"){echo 'selected="selected"';}?>>German</option>

			<option value="dutch"<?php if (get_option('quran_live_languages') == "dutch"){echo 'selected="selected"';}?>>Dutch</option>

			<option value="russian"<?php if (get_option('quran_live_languages') == "russian"){echo 'selected="selected"';}?>>Russian</option>	

			<option value="albanian"<?php if (get_option('quran_live_languages') == "albanian"){echo 'selected="selected"';}?>>Albanian</option>

			<option value="azerbaijani"<?php if (get_option('quran_live_languages') == "azerbaijani"){echo 'selected="selected"';}?>>Azerbaijani</option>

			<option value="bengali"<?php if (get_option('quran_live_languages') == "bengali"){echo 'selected="selected"';}?>>Bengali</option>			

			<option value="bulgarian"<?php if (get_option('quran_live_languages') == "bulgarian"){echo 'selected="selected"';}?>>Bulgarian</option>	

			<option value="bosnian"<?php if (get_option('quran_live_languages') == "bosnian"){echo 'selected="selected"';}?>>Bosnian</option>		

			<option value="chinese"<?php if (get_option('quran_live_languages') == "chinese"){echo 'selected="selected"';}?>>Chinese</option>

			<option value="czech"<?php if (get_option('quran_live_languages') == "czech"){echo 'selected="selected"';}?>>Czech</option>

			<option value="indonesian"<?php if (get_option('quran_live_languages') == "indonesian"){echo 'selected="selected"';}?>>Indonesian</option>

			<option value="italian"<?php if (get_option('quran_live_languages') == "italian"){echo 'selected="selected"';}?>>Italian</option>

			<option value="kurdish"<?php if (get_option('quran_live_languages') == "kurdish"){echo 'selected="selected"';}?>>Kurdish</option>

			<option value="malay"<?php if (get_option('quran_live_languages') == "malay"){echo 'selected="selected"';}?>>Malay</option>

			<option value="norwegian"<?php if (get_option('quran_live_languages') == "norwegian"){echo 'selected="selected"';}?>>Norwegian</option>

			<option value="portuguese"<?php if (get_option('quran_live_languages') == "portuguese"){echo 'selected="selected"';}?>>Portuguese</option>

			<option value="romanian"<?php if (get_option('quran_live_languages') == "romanian"){echo 'selected="selected"';}?>>Romanian</option>

			<option value="somali"<?php if (get_option('quran_live_languages') == "somali"){echo 'selected="selected"';}?>>Somali</option>

			<option value="spanish"<?php if (get_option('quran_live_languages') == "spanish"){echo 'selected="selected"';}?>>Spanish</option>	

			<option value="swedish"<?php if (get_option('quran_live_languages') == "swedish"){echo 'selected="selected"';}?>>Swedish</option>	

			<option value="turkish"<?php if (get_option('quran_live_languages') == "turkish"){echo 'selected="selected"';}?>>Turkish</option>				
			
			<option value="urdu"<?php if (get_option('quran_live_languages') == "urdu"){echo 'selected="selected"';}?>>Urdu</option>				
			
			<option value="hindi"<?php if (get_option('quran_live_languages') == "hindi"){echo 'selected="selected"';}?>>Hindi</option>				
				
			<option value="persian"<?php if (get_option('quran_live_languages') == "persian"){echo 'selected="selected"';}?>>Persian</option>				
			
			<option value="thai"<?php if (get_option('quran_live_languages') == "thai"){echo 'selected="selected"';}?>>Thai</option>				

			<option value="uzbek"<?php if (get_option('quran_live_languages') == "uzbek"){echo 'selected="selected"';}?>>Uzbek</option>				

			</select>


</td>

</tr>

<tr valign="top">

<th scope="row" id="thadminquran">Recitatator</th>

<td>
<select name="option[quran_live_recitator]" id="quran_live_recitator">

<option disabled="disabled">Choose the cheikh for the versets</option>

<option value="Shuraym" <?php if (get_option('quran_live_recitator') == "Shuraym") {echo 'selected="selected"';} ?>>Saoud Shuraim</option>

<option value="ElGhamidi" <?php if (get_option('quran_live_recitator') == "ElGhamidi") {echo 'selected="selected"';} ?>>Saad El Galmidi</option>

<option value="Soudais" <?php if (get_option('quran_live_recitator') == "Soudais") {echo 'selected="selected"';} ?>>Abderrahman Al Soudais</option>

<option value="Basfar" <?php if (get_option('quran_live_recitator') == "Basfar") {echo 'selected="selected"';} ?>>Abdallah Ali Basfar</option>

<option value="Alafasy" <?php if (get_option('quran_live_recitator') == "Alafasy") {echo 'selected="selected"';} ?>>Alafasy</option>

<option value="Al-Hussary" <?php if (get_option('quran_live_recitator') == "Al-Hussary") {echo 'selected="selected"';} ?>>Al-Hussary</option>

<option value="Al-Ajmy" <?php if (get_option('quran_live_recitator') == "Al-Ajmy") {echo 'selected="selected"';} ?>>Al-Ajmy</option>

</td>

</tr>


<tr>
<th scope="row" id="thadminquran">Custum CSS</th>
<td>without the tag &lt;style&gt;...&lt;/style&gt;<button id="quran_custum_css"> Click Here</button>
<p><textarea  name="option[quranlive_custum_css]" id="areacsscustum" style="width: 500px; height: 150px;display:none">
<?php echo get_option('quranlive_custum_css'); ?>
</textarea></p>
</td>
</tr>
<tr>
<th scope="row" id=""><button class="button-primary autowidth generate_shortcode">generate shortcode</button></th>
<td>
<p><input type="text" value="" size="50" id="shortcode_generate"></p>
</td>
</tr>
</table>
<script>
function backliveDisabled(){
jQuery(function($) {
if($('#background_disabled').is(':checked')){
	$('#borderColorQuran').show();
	$('#displaytemplateQuran').css('background', '#ffffff');
}
if($('#background_enable').is(':checked')) {
	$('#borderColorQuran').hide();
	$('#displaytemplateQuran').css('background', '#F8F8F8');
}
});
}

jQuery(document).ready(function($){
$(".generate_shortcode").on('click',function(){
	$('#shortcode_generate').val('');
	var lang = $( "#quran_live_languages" ).val();
	var cheikh = $("#quran_live_recitator").val();

$('#shortcode_generate').val('[quran_live lang='+lang+' cheikh='+cheikh+']');
return false;
});


if($('#background_disabled').is(':checked')){
	$('#borderColorQuran').show();
	$('#displaytemplateQuran').css('background', '#ffffff');
}

$("#quran_custum_css").click(function(){
        $("#areacsscustum").toggle();
        return false;
});
});
</script>


<div id="button_quran_submit">

<div style="float:right">

</div>


		<input  type="hidden" name="template_quranlive_noncename" value="<?= wp_create_nonce('tplquran');?>">

		<p class="submit"> 

		<input type="submit" name="template_quranlive_update" class="button-primary autowidth" value="Save">
		
		</p>

</form>
 <fieldset style="border: 1px solid #DDDBDB;padding: 15px;" id="button_quran_submit">
  <legend>You can help me in 2 ways</legend>
 <p>1- Make du'a for me to go to hajj.</p>
 <p>2- By making a donation to help me pay the server.</p>
 <p>Barak'Allah oufikoum<span style="float:right"><a href="http://gp-codex.fr/forums" target="_blank">Free support</a></span></p>
 
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="LTVQQZDXPLHU8">
<input type="image" src="https://www.paypalobjects.com/en_US/FR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
</form>

 </fieldset>
</div>


</div> 

