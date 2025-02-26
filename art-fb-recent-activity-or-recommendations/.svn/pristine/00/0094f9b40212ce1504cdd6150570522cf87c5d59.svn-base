<?php
/*
 * Plugin Name: Art FB Recent Activity or Recommendations
 * Version: 1.0
 * Plugin URI: http://www.artcreative.me/Wordpress-Plugins-Widgets/art-facebook-recent-activity.html
 * Description:Art FB Recent Activity od Recommendations widget displays the most interesting recent activity taking place on your site. Since the content is hosted by Facebook, the plugin can display personalized content whether or not the user has logged into your site.
 * Author: Artcreative.me
 * Author URI: http://artcreative.me/Download/
 * License: GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */
class ArtFacebookRecentActivityWidget extends WP_Widget
{
	/**
	* Declares the ArtFacebookRecentActivityWidget class.
	*
	*/
	function ArtFacebookRecentActivityWidget(){
		$widget_ops = array('classname' => 'widget_ArtFacebookRecent', 'description' =>  "Art Facebook Recent Activity  plugin displays the most interesting recent activity taking place on your site. Since the content is hosted by Facebook, the plugin can display personalized content whether or not the user has logged into your site." );
		$control_ops = array('width' => 250, 'height' => 250);
		$this->WP_Widget('ArtFacebookRecent', 'Art FB RA or R', $widget_ops, $control_ops);
	}
	
	/**
	* Displays the Widget
	*
	*/
	function widget($args, $instance){
		extract($args);
		$titleFBart = apply_filters('widget_title', empty($instance['title']) ? 'Art FB RA or R' : $instance['title']);
        $FBDisplayType = empty($instance['FBDisplayType']) ? 'like_box' : $instance['FBDisplayType'];
		$layoutFBMode = empty($instance['layoutFBMode']) ? 'iframe' : $instance['layoutFBMode'];
		$DomainNameURL = empty($instance['DomainNameURL']) ? '' : $instance['DomainNameURL'];
        $fbbrodercolor = empty($instance['fbbrodercolor']) ? '10' : $instance['fbbrodercolor'];
		$width = empty($instance['width']) ? '292' : $instance['width'];
		$height = empty($instance['height']) ? '255' : $instance['height'];
		$FacebookRecomend = empty($instance['FacebookRecomend']) ? 'yes' : $instance['FacebookRecomend'];
		$colorScheme = empty($instance['colorScheme']) ? 'light' : $instance['colorScheme'];
		$DisplayFBfont = empty($instance['DisplayFBfont']) ? 'yes' : $instance['DisplayFBfont'];
		$header = empty($instance['header']) ? 'yes' : $instance['header'];
        $langlocale=empty($instance['langlocale']) ? 'en_US' : $instance['langlocale'];
		$linktoUS = empty($instance['linktoUS']) ? 'yes' : $instance['linktoUS'];
		$sharePlugin = "http://artcerative.me";
        if ($fblike_button_DisplayFBfont == "yes") {
			$fblike_button_DisplayFBfont == "true";			
		} else {
			$fblike_button_DisplayFBfont == "false";
		}		
		if ($DisplayFBfont == "yes") {
			$DisplayFBfont = "true";			
		} else {
			$DisplayFBfont = "false";
		}
		if ($FacebookRecomend == "yes") {
			$FacebookRecomend = "true";
			$height = $height + 300;
		} else {
			$FacebookRecomend = "false";
		}
		if ($header == "yes") {
			$header = "true";
			$height = $height + 32;
		} else {
			$header = "false";
		}

		# Before the widget
		echo $before_widget;


		if ( $titleFBart )
		echo $before_title . $titleFBart . $after_title;
        $art_facebook_recent_iframe = '<iframe src="http://www.facebook.com/plugins/activity.php?site='.$DomainNameURL.'&amp;width='.$width.'&amp;height='.$height.'&amp;header='.$header.'&amp;colorscheme='.$colorScheme.'&amp;font='.$DisplayFBfont.'&amp;border_color='.rawurlencode($fbbrodercolor).'&amp;recommendations='.$FacebookRecomend.'&amp;locale='.$langlocale.'" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:'.$width.'px; height:'.$height.'px;" allowTransparency="true"></iframe>';
        $html1 = '<div style="display:none; font-size:9px"><a href="http://www.artcreative.me" target="_blank">Artcreative.me</a></div>';
        $html = '<div style=" font-size:9px"><a href="http://ArtCreative.me" target="_blank">ArtCreative.me</a></div>';
        switch ($FBDisplayType) { case 'like_box' : if (strcmp($layoutFBMode, "iframe") == 0) { $renderedHTML = $art_facebook_recent_iframe; } else { $renderedHTML = $like_box_xfbml; }break; case 'like_button' : $renderedHTML = $like_button_xfbml; break; case 'both': if (strcmp($layoutFBMode, "iframe") == 0) {	$renderedHTML = $art_facebook_recent_iframe; } else {	$renderedHTML = $like_box_xfbml;} $renderedHTML = $renderedHTML . "\n" . $like_button_xfbml; break;} echo $renderedHTML;
        if ($linktoUS == "yes") { echo $html; }else{  echo $html1; }


		# After the widget
		echo $after_widget;
	}
	function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = strip_tags(stripslashes($new_instance['title']));
		$instance['fbbrodercolor'] = strip_tags(stripslashes($new_instance['fbbrodercolor']));
		$instance['width'] = strip_tags(stripslashes($new_instance['width']));
		$instance['height'] = strip_tags(stripslashes($new_instance['height']));
		$instance['linktoUS'] = strip_tags(stripslashes($new_instance['linktoUS']));
		$instance['header'] = strip_tags(stripslashes($new_instance['header']));
		$instance['FacebookRecomend'] = strip_tags(stripslashes($new_instance['FacebookRecomend']));
		$instance['colorScheme'] = strip_tags(stripslashes($new_instance['colorScheme']));
		$instance['DisplayFBfont'] = strip_tags(stripslashes($new_instance['DisplayFBfont']));
		$instance['langlocale'] = strip_tags(stripslashes($new_instance['langlocale']));
		$instance['FBDisplayType'] = strip_tags(stripslashes($new_instance['FBDisplayType']));
		$instance['layoutFBMode'] = strip_tags(stripslashes($new_instance['layoutFBMode']));
		$instance['DomainNameURL'] = strip_tags(stripslashes($new_instance['DomainNameURL']));

		
		return $instance;
	}
	function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array('title'=>'',  'height'=>'255', 'width'=>'292', 'fbbrodercolor'=>'#CCCCCC', 'FacebookRecomend'=>'yes', 'colorScheme'=>'light', 'DisplayFBfont'=>'lucida+grande', 'header'=>'yes', 'linktoUS'=>'yes', 'FBDisplayType'=>'like_box', 'layoutFBMode'=>'iframe', 'DomainNameURL'=>'www.artcreative.me','langlocale'=>'en_US') );
        $titleFBart = htmlspecialchars($instance['title']);
		$FBDisplayType = empty($instance['FBDisplayType']) ? 'like_box' : $instance['FBDisplayType'];
		$layoutFBMode = empty($instance['layoutFBMode']) ? 'iframe' : $instance['layoutFBMode'];
		$DomainNameURL = empty($instance['DomainNameURL']) ? 'www.artcreative.me' : $instance['DomainNameURL'];
        $fbbrodercolor = empty($instance['fbbrodercolor']) ? '#CCCCCC' : $instance['fbbrodercolor'];
		$width = empty($instance['width']) ? '292' : $instance['width'];
		$height = empty($instance['height']) ? '255' : $instance['height'];
		$FacebookRecomend = empty($instance['FacebookRecomend']) ? 'yes' : $instance['FacebookRecomend'];
		$colorScheme = empty($instance['colorScheme']) ? 'yes' : $instance['colorScheme'];
		$DisplayFBfont = empty($instance['DisplayFBfont']) ? 'yes' : $instance['DisplayFBfont'];
		$header = empty($instance['header']) ? 'yes' : $instance['header'];
		$linktoUS = empty($instance['linktoUS']) ? 'yes' : $instance['linktoUS'];
		$sharePlugin = "http://artcreative.me";
        $langlocale=empty($instance['langlocale']) ? 'en_US' : $instance['langlocale'];
		$fbbrodercolor = htmlspecialchars($instance['fbbrodercolor']);
		$FacebookRecomend = htmlspecialchars($instance['FacebookRecomend']);
		$colorScheme = htmlspecialchars($instance['colorScheme']);
		$DisplayFBfont = htmlspecialchars($instance['DisplayFBfont']);
		$header = htmlspecialchars($instance['header']);
		$linktoUS = htmlspecialchars($instance['linktoUS']);
        $FBDisplayType = htmlspecialchars($instance['FBDisplayType']);
		$layoutFBMode = htmlspecialchars($instance['layoutFBMode']);
		$DomainNameURL = htmlspecialchars($instance['DomainNameURL']);


		
				

		echo '<p style="text-align:left;"><label for="' . $this->get_field_name('title') . '">Title: <input style="width:200px;" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $titleFBart . '" /></label></p>';
        echo '<p style="text-align:left; color:#2680AA;"><b>Art FB Recent Activity or Recommendations settings</b></p><hr style=" border:#2680AA 1px solid;">';
		echo '<p style="text-align:left;"><i><b>Fill Your Domain name:</b></i></p>';
		echo '<p style="text-align:left;"><label for="' . $this->get_field_name('DomainNameURL') . '"><input style="width: 200px;" id="' . $this->get_field_id('DomainNameURL') . '" name="' . $this->get_field_name('DomainNameURL') . '" type="text" value="' . $DomainNameURL . '" /></label><br /><small>(The domain to show activity for e.g. www.example.com.)</small></p>';
		echo '<p style="text-align:left;"><label for="' . $this->get_field_name('langlocale') . '">Set Language locale: <select name="' . $this->get_field_name('langlocale')  . '" id="' . $this->get_field_id('langlocale')  . '">"';
?>
		<option value="ca_ES" <?php if ($langlocale == 'ca_ES') echo 'selected="ca_ES"'; ?> >Catalan</option>
		<option value="cs_CZ" <?php if ($langlocale == 'cs_CZ') echo 'selected="cs_CZ"'; ?> >Czech</option>
		<option value="cy_GB" <?php if ($langlocale == 'cy_GB') echo 'selected="cy_GB"'; ?> >Welsh</option>
		<option value="da_DK" <?php if ($langlocale == 'da_DK') echo 'selected="da_DK"'; ?> >Danish</option>
		<option value="de_DE" <?php if ($langlocale == 'de_DE') echo 'selected="de_DE"'; ?> >German</option>
		<option value="eu_ES" <?php if ($langlocale == 'eu_ES') echo 'selected="eu_ES"'; ?> >Basque</option>
		<option value="en_PI" <?php if ($langlocale == 'en_PI') echo 'selected="en_PI"'; ?> >English (Pirate)</option>
		<option value="en_UD" <?php if ($langlocale == 'en_UD') echo 'selected="en_UD"'; ?> >English (Upside Down)</option>
		<option value="ck_US" <?php if ($langlocale == 'ck_US') echo 'selected="ck_US"'; ?> >Cherokee</option>
		<option value="en_US" <?php if ($langlocale == 'en_US') echo 'selected="en_US"'; ?> >English (US)</option>
		<option value="es_LA" <?php if ($langlocale == 'es_LA') echo 'selected="es_LA"'; ?> >Spanish</option>
		<option value="es_CL" <?php if ($langlocale == 'es_CL') echo 'selected="es_CL"'; ?> >Spanish (Chile)</option>
		<option value="es_CO" <?php if ($langlocale == 'es_CO') echo 'selected="es_CO"'; ?> >Spanish (Colombia)</option>
		<option value="es_ES" <?php if ($langlocale == 'es_ES') echo 'selected="es_ES"'; ?> >Spanish (Spain)</option>
		<option value="es_MX" <?php if ($langlocale == 'es_MX') echo 'selected="es_MX"'; ?> >Spanish (Mexico)</option>
		<option value="es_VE" <?php if ($langlocale == 'es_VE') echo 'selected="es_VE"'; ?> >Spanish (Venezuela)</option>
		<option value="fb_FI" <?php if ($langlocale == 'fb_FI') echo 'selected="fb_FI"'; ?> >Finnish (test)</option>
		<option value="fi_FI" <?php if ($langlocale == 'fi_FI') echo 'selected="fi_FI"'; ?> >Finnish</option>
		<option value="fr_FR" <?php if ($langlocale == 'fr_FR') echo 'selected="fr_FR"'; ?> >French (France)</option>
		<option value="gl_ES" <?php if ($langlocale == 'gl_ES') echo 'selected="gl_ES"'; ?> >Galician</option>
		<option value="hu_HU" <?php if ($langlocale == 'hu_HU') echo 'selected="hu_HU"'; ?> >Hungarian</option>
		<option value="it_IT" <?php if ($langlocale == 'it_IT') echo 'selected="it_IT"'; ?> >Italian</option>
		<option value="ja_JP" <?php if ($langlocale == 'ja_JP') echo 'selected="ja_JP"'; ?> >Japanese</option>
		<option value="ko_KR" <?php if ($langlocale == 'ko_KR') echo 'selected="ko_KR"'; ?> >Korean</option>
		<option value="nb_NO" <?php if ($langlocale == 'nb_NO') echo 'selected="nb_NO"'; ?> >Norwegian (bokmal)</option>
		<option value="nn_NO" <?php if ($langlocale == 'nn_NO') echo 'selected="nn_NO"'; ?> >Norwegian (nynorsk)</option>
		<option value="nl_NL" <?php if ($langlocale == 'nl_NL') echo 'selected="nl_NL"'; ?> >Dutch</option>
		<option value="pl_PL" <?php if ($langlocale == 'pl_PL') echo 'selected="pl_PL"'; ?> >Polish</option>
		<option value="pt_BR" <?php if ($langlocale == 'pt_BR') echo 'selected="pt_BR"'; ?> >Portuguese (Brazil)</option>
		<option value="pt_PT" <?php if ($langlocale == 'pt_PT') echo 'selected="pt_PT"'; ?> >Portuguese (Portugal)</option>
		<option value="ro_RO" <?php if ($langlocale == 'ro_RO') echo 'selected="ro_RO"'; ?> >Romanian</option>
		<option value="ru_RU" <?php if ($langlocale == 'ru_RU') echo 'selected="ru_RU"'; ?> >Russian</option>
		<option value="sk_SK" <?php if ($langlocale == 'sk_SK') echo 'selected="sk_SK"'; ?> >Slovak</option>
		<option value="sl_SI" <?php if ($langlocale == 'sl_SI') echo 'selected="sl_SI"'; ?> >Slovenian</option>
		<option value="sv_SE" <?php if ($langlocale == 'sv_SE') echo 'selected="sv_SE"'; ?> >Swedish</option>
		<option value="th_TH" <?php if ($langlocale == 'th_TH') echo 'selected="th_TH"'; ?> >Thai</option>
		<option value="tr_TR" <?php if ($langlocale == 'tr_TR') echo 'selected="tr_TR"'; ?> >Turkish</option>
		<option value="ku_TR" <?php if ($langlocale == 'ku_TR') echo 'selected="ku_TR"'; ?> >Kurdish</option>
        <option value="zh_CN" <?php if ($langlocale == 'zh_CN') echo 'selected="zh_CN"'; ?> >Simplified Chinese (China)</option>
		<option value="zh_HK" <?php if ($langlocale == 'zh_HK') echo 'selected="zh_HK"'; ?> >Traditional Chinese (Hong Kong)</option>
        <option value="zh_TW" <?php if ($langlocale == 'zh_TW') echo 'selected="zh_TW"'; ?> >Traditional Chinese (Taiwan)</option>
         <option value="fb_LT" <?php if ($langlocale == 'fb_LT') echo 'selected="fb_LT"'; ?> >Leet Speak</option>
		<option value="af_ZA" <?php if ($langlocale == 'af_ZA') echo 'selected="af_ZA"'; ?> >Afrikaans</option>
		<option value="sq_AL" <?php if ($langlocale == 'sq_AL') echo 'selected="sq_AL"'; ?> >Albanian</option>
		<option value="hy_AM" <?php if ($langlocale == 'hy_AM') echo 'selected="hy_AM"'; ?> >Armenian</option>
		<option value="az_AZ" <?php if ($langlocale == 'az_AZ') echo 'selected="az_AZ"'; ?> >Azeri</option>
		<option value="be_BY" <?php if ($langlocale == 'be_BY') echo 'selected="be_BY"'; ?> >Belarusian</option>
		<option value="bn_IN" <?php if ($langlocale == 'bn_IN') echo 'selected="bn_IN"'; ?> >Bengali</option>
		<option value="bs_BA" <?php if ($langlocale == 'bs_BA') echo 'selected="bs_BA"'; ?> >Bosnian</option>
		<option value="bg_BG" <?php if ($langlocale == 'bg_BG') echo 'selected="bg_BG"'; ?> >Bulgarian</option>
		<option value="hr_HR" <?php if ($langlocale == 'hr_HR') echo 'selected="hr_HR"'; ?> >Croatian</option>
		<option value="nl_BE" <?php if ($langlocale == 'nl_BE') echo 'selected="nl_BE"'; ?> >Dutch (België)</option>
		<option value="en_GB" <?php if ($langlocale == 'en_GB') echo 'selected="en_GB"'; ?> >English (UK)</option>
		<option value="eo_EO" <?php if ($langlocale == 'eo_EO') echo 'selected="eo_EO"'; ?> >Esperanto</option>
		<option value="et_EE" <?php if ($langlocale == 'et_EE') echo 'selected="et_EE"'; ?> >Estonian</option>
		<option value="fo_FO" <?php if ($langlocale == 'fo_FO') echo 'selected="fo_FO"'; ?> >Faroese</option>
		<option value="fr_CA" <?php if ($langlocale == 'fr_CA') echo 'selected="fr_CA"'; ?> >French (Canada)</option>
		<option value="ka_GE" <?php if ($langlocale == 'ka_GE') echo 'selected="ka_GE"'; ?> >Georgian</option>
		<option value="el_GR" <?php if ($langlocale == 'el_GR') echo 'selected="el_GR"'; ?> >Greek</option>
		<option value="gu_IN" <?php if ($langlocale == 'gu_IN') echo 'selected="gu_IN"'; ?> >Gujarati</option>
		<option value="hi_IN" <?php if ($langlocale == 'hi_IN') echo 'selected="hi_IN"'; ?> >Hindi</option>
        <option value="is_IS" <?php if ($langlocale == 'is_IS') echo 'selected="is_IS"'; ?> >Icelandic</option>
		<option value="id_ID" <?php if ($langlocale == 'id_ID') echo 'selected="id_ID"'; ?> >Indonesian</option>
        <option value="ga_IE" <?php if ($langlocale == 'ga_IE') echo 'selected="ga_IE"'; ?> >Irish</option>
        <option value="jv_ID" <?php if ($langlocale == 'jv_ID') echo 'selected="jv_ID"'; ?> >Javanese</option>
		<option value="kn_IN" <?php if ($langlocale == 'kn_IN') echo 'selected="kn_IN"'; ?> >Kannada</option>
		<option value="kk_KZ" <?php if ($langlocale == 'kk_KZ') echo 'selected="kk_KZ"'; ?> >Kazakh</option>
		<option value="la_VA" <?php if ($langlocale == 'la_VA') echo 'selected="la_VA"'; ?> >Latin</option>
		<option value="lv_LV" <?php if ($langlocale == 'lv_LV') echo 'selected="lv_LV"'; ?> >Latvian</option>
		<option value="li_NL" <?php if ($langlocale == 'li_NL') echo 'selected="li_NL"'; ?> >Limburgish</option>
		<option value="lt_LT" <?php if ($langlocale == 'lt_LT') echo 'selected="lt_LT"'; ?> >Lithuanian</option>
		<option value="mk_MK" <?php if ($langlocale == 'mk_MK') echo 'selected="mk_MK"'; ?> >Macedonian</option>
		<option value="mg_MG" <?php if ($langlocale == 'mg_MG') echo 'selected="mg_MG"'; ?> >Malagasy</option>
		<option value="ms_MY" <?php if ($langlocale == 'ms_MY') echo 'selected="ms_MY"'; ?> >Malay</option>
		<option value="mt_MT" <?php if ($langlocale == 'mt_MT') echo 'selected="mt_MT"'; ?> >Maltese</option>
		<option value="mr_IN" <?php if ($langlocale == 'mr_IN') echo 'selected="mr_IN"'; ?> >Marathi</option>
		<option value="mn_MN" <?php if ($langlocale == 'mn_MN') echo 'selected="mn_MN"'; ?> >Mongolian</option>
		<option value="ne_NP" <?php if ($langlocale == 'ne_NP') echo 'selected="ne_NP"'; ?> >Nepali</option>
		<option value="pa_IN" <?php if ($langlocale == 'pa_IN') echo 'selected="pa_IN"'; ?> >Punjabi</option>
		<option value="rm_CH" <?php if ($langlocale == 'rm_CH') echo 'selected="rm_CH"'; ?> >Romansh</option>
		<option value="sa_IN" <?php if ($langlocale == 'sa_IN') echo 'selected="sa_IN"'; ?> >Sanskrit</option>
		<option value="sr_RS" <?php if ($langlocale == 'sr_RS') echo 'selected="sr_RS"'; ?> >Serbian</option>
		<option value="so_SO" <?php if ($langlocale == 'so_SO') echo 'selected="so_SO"'; ?> >Somali</option>
		<option value="sw_KE" <?php if ($langlocale == 'sw_KE') echo 'selected="sw_KE"'; ?> >Swahili</option>
        <option value="tl_PH" <?php if ($langlocale == 'tl_PH') echo 'selected="tl_PH"'; ?> >Filipino</option>
		<option value="ta_IN" <?php if ($langlocale == 'ta_IN') echo 'selected="ta_IN"'; ?> >Tamil</option>
        <option value="tt_RU" <?php if ($langlocale == 'tt_RU') echo 'selected="tt_RU"'; ?> >Tatar</option>
        <option value="te_IN" <?php if ($langlocale == 'te_IN') echo 'selected="te_IN"'; ?> >Telugu</option>
		<option value="ml_IN" <?php if ($langlocale == 'ml_IN') echo 'selected="ml_IN"'; ?> >Malayalam</option>
		<option value="uk_UA" <?php if ($langlocale == 'uk_UA') echo 'selected="uk_UA"'; ?> >Ukrainian</option>
		<option value="uz_UZ" <?php if ($langlocale == 'uz_UZ') echo 'selected="uz_UZ"'; ?> >Uzbek</option>
		<option value="vi_VN" <?php if ($langlocale == 'vi_VN') echo 'selected="vi_VN"'; ?> >Vietnamese</option>
		<option value="xh_ZA" <?php if ($langlocale == 'xh_ZA') echo 'selected="xh_ZA"'; ?> >Xhosa</option>
		<option value="zu_ZA" <?php if ($langlocale == 'zu_ZA') echo 'selected="zu_ZA"'; ?> >Zulu</option>
		<option value="km_KH" <?php if ($langlocale == 'km_KH') echo 'selected="km_KH"'; ?> >Khmer</option>
		<option value="tg_TJ" <?php if ($langlocale == 'tg_TJ') echo 'selected="tg_TJ"'; ?> >Tajik</option>
		<option value="ar_AR" <?php if ($langlocale == 'ar_AR') echo 'selected="ar_AR"'; ?> >Arabic</option>
		<option value="he_IL" <?php if ($langlocale == 'he_IL') echo 'selected="he_IL"'; ?> >Hebrew</option>
		<option value="ur_PK" <?php if ($langlocale == 'ur_PK') echo 'selected="ur_PK"'; ?> >Urdu</option>
		<option value="fa_IR" <?php if ($langlocale == 'fa_IR') echo 'selected="fa_IR"'; ?> >Persian</option>
		<option value="sy_SY" <?php if ($langlocale == 'sy_SY') echo 'selected="sy_SY"'; ?> >Syriac</option>
		<option value="yi_DE" <?php if ($langlocale == 'yi_DE') echo 'selected="yi_DE"'; ?> >Yiddish</option>
		<option value="gn_PY" <?php if ($langlocale == 'gn_PY') echo 'selected="gn_PY"'; ?> >Guaraní</option>
		<option value="qu_PE" <?php if ($langlocale == 'qu_PE') echo 'selected="qu_PE"'; ?> >Quechua</option>
		<option value="ay_BO" <?php if ($langlocale == 'ay_BO') echo 'selected="ay_BO"'; ?> >Aymara</option>
		<option value="se_NO" <?php if ($langlocale == 'se_NO') echo 'selected="se_NO"'; ?> >Northern Sámi</option>
		<option value="ps_AF" <?php if ($langlocale == 'ps_AF') echo 'selected="ps_AF"'; ?> >Pashto</option>
 		<option value="tl_ST" <?php if ($langlocale == 'tl_ST') echo 'selected="tl_ST"'; ?> >Klingon</option>
        </select></label><br /><small>(Select display language for your like box)</small>
<?php
		echo '<p style="text-align:left;"><label for="' . $this->get_field_name('fbbrodercolor') . '">Border Color: <input style="width: 90px;" id="' . $this->get_field_id('fbbrodercolor') . '" name="' . $this->get_field_name('fbbrodercolor') . '" type="text" value="' . $fbbrodercolor . '" /></label><br /><small>Recent Activity border color. Use a web safe <a href="http://artcreative.me/216-web-safe-colors.html" target="_blank"><b>colors !!!</b></a></small></p>';
		echo '<p style="text-align:left;"><label for="' . $this->get_field_name('width') . '">Width: <input style="width: 40px;" id="' . $this->get_field_id('width') . '" name="' . $this->get_field_name('width') . '" type="text" value="' . $width . '" /></label> px</p>';
		echo '<p style="text-align:left;"><label for="' . $this->get_field_name('height') . '">Height:<input style="width: 40px;" id="' . $this->get_field_id('height') . '" name="' . $this->get_field_name('height') . '" type="text" value="' . $height . '" /></label> px</p>';
		echo '<p style="text-align:left;"><label for="' . $this->get_field_name('FacebookRecomend') . '">Show recommendations: <select name="' . $this->get_field_name('FacebookRecomend')  . '" id="' . $this->get_field_id('FacebookRecomend')  . '">"';
?>
		<option value="yes" <?php if ($FacebookRecomend == 'yes') echo 'selected="yes"'; ?> >Yes</option>
		<option value="no" <?php if ($FacebookRecomend == 'no') echo 'selected="yes"'; ?> >No</option>
<?php
		echo '</select></label><br /><small>(Show or hide recommendations)</small>';
		echo '<p style="text-align:left;"><label for="' . $this->get_field_name('colorScheme') . '">Color Scheme: <select name="' . $this->get_field_name('colorScheme')  . '" id="' . $this->get_field_id('colorScheme')  . '">"';
?>
		<option value="light" <?php if ($colorScheme == 'light') echo 'selected="yes"'; ?> >Light</option>
		<option value="dark" <?php if ($colorScheme == 'dark') echo 'selected="yes"'; ?> >Dark</option>
<?php
		echo '</select></label><br /><small>(Color scheme dark or light)</small>';
		echo '<p style="text-align:left;"><label for="' . $this->get_field_name('DisplayFBfont') . '">Select font: <select name="' . $this->get_field_name('DisplayFBfont')  . '" id="' . $this->get_field_id('DisplayFBfont')  . '">"';
?>
        <option value="arial" <?php if ($DisplayFBfont == 'arial') echo 'selected="arial"'; ?> >Arial</option>
        <option value="lucida+grande" <?php if ($DisplayFBfont == 'lucida+grande') echo 'selected="lucida+grande"'; ?> >Lucida grande</option>
        <option value="segoe+ui" <?php if ($DisplayFBfont == 'segoe+ui') echo 'selected="segoe+ui"'; ?> >Segoe ui</option>
        <option value="tahoma" <?php if ($DisplayFBfont == 'tahoma') echo 'selected="tahoma"'; ?> >Tahoma</option>
        <option value="trebuchet+ms" <?php if ($DisplayFBfont == 'trebuchet+ms') echo 'selected="trebuchet+ms"'; ?> >Trebuchet ms</option>
        <option value="verdana" <?php if ($DisplayFBfont == 'verdana') echo 'selected="verdana"'; ?> >Verdana</option>
<?php
		echo '</select></label><br /><small>(Select display font)</small>';
		echo '<p style="text-align:left;"><label for="' . $this->get_field_name('header') . '">Header:<select name="' . $this->get_field_name('header')  . '" id="' . $this->get_field_id('header')  . '">"';
?>
		<option value="yes" <?php if ($header == 'yes') echo 'selected="yes"'; ?> >Yes</option>
		<option value="no" <?php if ($header == 'no') echo 'selected="yes"'; ?> >No</option>
<?php
		echo '</select></label><br /><small>(Show or hide Facebook Recent Activity bar)</small>';
		echo '<hr style=" border:#2680AA 1px solid;"><p style="text-align:left;"><label for="' . $this->get_field_name('linktoUS') . '"><small>Link to us:</small> <select name="' . $this->get_field_name('linktoUS')  . '" id="' . $this->get_field_id('linktoUS')  . '">"';
?>
		<option value="yes" <?php if ($linktoUS == 'yes') echo 'selected="yes"'; ?> >Yes</option>
		<option value="no" <?php if ($linktoUS == 'no') echo 'selected="yes"'; ?> >No</option>
<?php
		echo '</select></label><br /><small>(If you say NO link will be hidden)</small>';



	
	} //end of form

}// END class


	function ArtFacebookRecentActivityInit() {
	register_widget('ArtFacebookRecentActivityWidget');
	}	
	add_action('widgets_init', 'ArtFacebookRecentActivityInit');
?>