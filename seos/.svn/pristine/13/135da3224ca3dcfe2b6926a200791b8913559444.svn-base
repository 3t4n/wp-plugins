<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
?> 
    <form class="s-seos-form" action="options.php" method="post" role="form" name="copy-protection" accept-charset="UTF-8">
		
			<?php settings_fields( 'seos' ); ?>
			<?php do_settings_sections( 'seos' ); ?>
		

<?php /*********************** Meta Home Page **************************/ ?>
		<?php $active_tab = "";
		if( isset( $_GET[ 'tab' ] ) ) {
			$active_tab = $_GET[ 'tab' ];
		} else if( $active_tab == 'seo_options' ) {
			$active_tab = 'seo_options';
		} else if ($active_tab == 'sticky_notes' ) {
			$active_tab = 'sticky_notes';
		} else if ($active_tab == 'notes' ) {
			$active_tab = 'notes';
		} // end if/else ?>
		
		<h2 class="nav-tab-wrapper">
			<a href="?page=seos&tab=seo_options" class="nav-tab <?php echo $active_tab == 'seo_options' ? 'nav-tab-active' : ''; ?>"><?php _e( 'SEO Options', 'seos' ); ?></a>
			<a href="?page=seos&tab=sticky_notes" class="nav-tab <?php echo $active_tab == 'sticky_notes' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Sticky Note', 'seos' ); ?></a>
			<a href="?page=seos&tab=notes" class="nav-tab <?php echo $active_tab == 'notes' ? 'nav-tab-active' : ''; ?>"><?php _e( 'Admin Notes', 'seos' ); ?></a>
		</h2>

			<div <?php if( $active_tab == 'seo_options' or ($active_tab == '') ) { ?> style="display: block;"<?php } else { ?> style="display: none;" <?php } ?>>

				<label><?php _e('Enter your canonical: ', 'seos'); ?> </label>
				<input type="text" name="seos_canonical" value="<?php echo esc_url( get_option( 'seos_canonical' )); ?>" />
				
				<label><?php _e('Meta Keywords (separator comma): ', 'seos'); ?> </label>
				<input type="text" name="seos_keywords" value="<?php echo esc_html(get_option( 'seos_keywords' )); ?>" />				
				
				<label><?php _e('Meta Description: ', 'seos'); ?> </label>
				<textarea style="width: 300px; height: 100px;" name="seos_description"><?php echo esc_html(get_option( 'seos_description' )); ?></textarea>

				<label><?php _e('Google Verify ID: ', 'seos'); ?> </label>
				<input type="text" name="seos_google_verification" value="<?php echo esc_html(get_option( 'seos_google_verification' )); ?>" />

				<label><?php _e('Google Analytics Code: ', 'seos'); ?> </label>
				<textarea style="width: 300px; height: 330px;" name="google_analytics"><?php echo esc_html(get_option( 'google_analytics' )); ?></textarea>
				
				<label><?php _e('Yandex verify ID: ', 'seos'); ?> </label>
				<input type="text" name="seos_yandex_verification" value="<?php echo esc_html(get_option( 'seos_yandex_verification' )); ?>" />
				
				<label><?php _e('Bing Verify ID: ', 'seos'); ?> </label>
				<input type="text" name="seos_bing_verification" value="<?php echo esc_html(get_option( 'seos_bing_verification' )); ?>" />
				
				<h2>Add Open Graph meta data to your site</h2>
				<p>Facebook and other social networks use this data when your pages are shared:</p>
				
				<label><?php _e('Open Graph Site Name: ', 'seos'); ?> </label>
				<input type="text" name="seos_site_name" value="<?php echo esc_html(get_option( 'seos_site_name' )); ?>" />
				
				<label><?php _e('Open Graph Image: ', 'seos'); ?> </label>
				<input type="text" name="seos_facebook_image" value="<?php echo esc_url(get_option( 'seos_facebook_image' )); ?>" />
				
				<label><?php _e('Open Graph Title: ', 'seos'); ?> </label>
				<input type="text" name="seos_facebook_title" value="<?php echo esc_html(get_option( 'seos_facebook_title' )); ?>" />
				
				<label><?php _e('Open Graph Description: ', 'seos'); ?> </label>
				<input type="text" name="seos_facebook_description" value="<?php echo esc_html(get_option( 'seos_facebook_description' )); ?>" />				
				
				<label><?php _e('Facebook App ID: ', 'seos'); ?> </label>
				<input type="text" name="seos_facebook_id" value="<?php echo esc_html(get_option( 'seos_facebook_id' )); ?>" />
				
				<label><?php _e('The locale these tags are marked up in. Of the format language_TERRITORY: ', 'seos'); ?> </label>
				<?php $locale = esc_html(get_option( 'seos_locale' )); ?>
				<select name="seos_locale">
					<option value=" "  selected="selected"> </option>
					<option value="af_ZA" <?php if ( $locale == "af_ZA" ) echo 'selected="selected"'; ?>>af_ZA</option>
					<option value="ay_BO" <?php if ( $locale == "ay_BO" ) echo 'selected="selected"'; ?>>ay_BO</option>
					<option value="ar_AR" <?php if ( $locale == "ar_AR" ) echo 'selected="selected"'; ?>>ar_AR</option>
					<option value="az_AZ" <?php if ( $locale == "az_AZ" ) echo 'selected="selected"'; ?>>az_AZ</option>
					<option value="be_BY" <?php if ( $locale == "be_BY" ) echo 'selected="selected"'; ?>>be_BY</option>
					<option value="bn_IN" <?php if ( $locale == "bn_IN" ) echo 'selected="selected"'; ?>>bn_IN</option>
					<option value="bs_BA" <?php if ( $locale == "bs_BA" ) echo 'selected="selected"'; ?>>bs_BA</option>
					<option value="bg_BG" <?php if ( $locale == "bg_BG" ) echo 'selected="selected"'; ?>>bg_BG</option>
					<option value="ca_ES" <?php if ( $locale == "ca_ES" ) echo 'selected="selected"'; ?>>ca_ES</option>
					<option value="ck_US" <?php if ( $locale == "ck_US" ) echo 'selected="selected"'; ?>>ck_US</option>
					<option value="cs_CZ" <?php if ( $locale == "cs_CZ" ) echo 'selected="selected"'; ?>>cs_CZ</option>
					<option value="cy_GB" <?php if ( $locale == "cy_GB" ) echo 'selected="selected"'; ?>>cy_GB</option>
					<option value="da_DK" <?php if ( $locale == "da_DK" ) echo 'selected="selected"'; ?>>da_DK</option>
					<option value="de_DE" <?php if ( $locale == "de_DE" ) echo 'selected="selected"'; ?>>de_DE</option>					
					<option value="el_GR" <?php if ( $locale == "el_GR" ) echo 'selected="selected"'; ?>>el_GR</option>
					<option value="en_GB" <?php if ( $locale == "en_GB" ) echo 'selected="selected"'; ?>>en_GB</option>	
					<option value="eo_EO" <?php if ( $locale == "eo_EO" ) echo 'selected="selected"'; ?>>eo_EO</option>					
					<option value="en_PI" <?php if ( $locale == "en_PI" ) echo 'selected="selected"'; ?>>en_PI</option>
					<option value="en_UD" <?php if ( $locale == "en_UD" ) echo 'selected="selected"'; ?>>en_UD</option>
					<option value="en_US" <?php if ( $locale == "en_US" ) echo 'selected="selected"'; ?>>en_US</option>
					<option value="es_LA" <?php if ( $locale == "es_LA" ) echo 'selected="selected"'; ?>>es_LA</option>
					<option value="es_CL" <?php if ( $locale == "es_CL" ) echo 'selected="selected"'; ?>>es_CL</option>
					<option value="es_CO" <?php if ( $locale == "es_CO" ) echo 'selected="selected"'; ?>>es_CO</option>
					<option value="es_ES" <?php if ( $locale == "es_ES" ) echo 'selected="selected"'; ?>>es_ES</option>
					<option value="es_MX" <?php if ( $locale == "es_MX" ) echo 'selected="selected"'; ?>>es_MX</option>					
					<option value="es_VE" <?php if ( $locale == "es_VE" ) echo 'selected="selected"'; ?>>es_VE</option>					
					<option value="et_EE" <?php if ( $locale == "et_EE" ) echo 'selected="selected"'; ?>>et_EE</option>
					<option value="eu_ES" <?php if ( $locale == "eu_ES" ) echo 'selected="selected"'; ?>>eu_ES</option>
					<option value="fa_IR" <?php if ( $locale == "fa_IR" ) echo 'selected="selected"'; ?>>fa_IR</option>					
					<option value="fb_FI" <?php if ( $locale == "fb_FI" ) echo 'selected="selected"'; ?>>fb_FI</option>
					<option value="fb_LT" <?php if ( $locale == "fb_LT" ) echo 'selected="selected"'; ?>>fb_LT</option>					
					<option value="fi_FI" <?php if ( $locale == "fi_FI" ) echo 'selected="selected"'; ?>>fi_FI</option>
					<option value="fo_FO" <?php if ( $locale == "fo_FO" ) echo 'selected="selected"'; ?>>fo_FO</option>							
					<option value="fr_CA" <?php if ( $locale == "fr_CA" ) echo 'selected="selected"'; ?>>fr_CA</option>	
					<option value="fr_FR" <?php if ( $locale == "fr_FR" ) echo 'selected="selected"'; ?>>fr_FR</option>					
					<option value="ga_IE" <?php if ( $locale == "ga_IE" ) echo 'selected="selected"'; ?>>ga_IE</option>					
					<option value="gl_ES" <?php if ( $locale == "gl_ES" ) echo 'selected="selected"'; ?>>gl_ES</option>					
					<option value="gu_IN" <?php if ( $locale == "gu_IN" ) echo 'selected="selected"'; ?>>gu_IN</option>
					<option value="he_IL" <?php if ( $locale == "he_IL" ) echo 'selected="selected"'; ?>>he_IL</option>					
					<option value="hi_IN" <?php if ( $locale == "hi_IN" ) echo 'selected="selected"'; ?>>hi_IN</option>					
					<option value="hy_AM" <?php if ( $locale == "hy_AM" ) echo 'selected="selected"'; ?>>hy_AM</option>
					<option value="hr_HR" <?php if ( $locale == "hr_HR" ) echo 'selected="selected"'; ?>>hr_HR</option>					
					<option value="hu_HU" <?php if ( $locale == "hu_HU" ) echo 'selected="selected"'; ?>>hu_HU</option>
					<option value="id_ID" <?php if ( $locale == "id_ID" ) echo 'selected="selected"'; ?>>id_ID</option>					
					<option value="is_IS" <?php if ( $locale == "is_IS" ) echo 'selected="selected"'; ?>>is_IS</option>					
					<option value="it_IT" <?php if ( $locale == "it_IT" ) echo 'selected="selected"'; ?>>it_IT</option>				
					<option value="ja_JP" <?php if ( $locale == "ja_JP" ) echo 'selected="selected"'; ?>>ja_JP</option>
					<option value="jv_ID" <?php if ( $locale == "jv_ID" ) echo 'selected="selected"'; ?>>jv_ID</option>
					<option value="ka_GE" <?php if ( $locale == "ka_GE" ) echo 'selected="selected"'; ?>>ka_GE</option>
					<option value="km_KH" <?php if ( $locale == "km_KH" ) echo 'selected="selected"'; ?>>km_KH</option>
					<option value="kn_IN" <?php if ( $locale == "kn_IN" ) echo 'selected="selected"'; ?>>kn_IN</option>
					<option value="kk_KZ" <?php if ( $locale == "kk_KZ" ) echo 'selected="selected"'; ?>>kk_KZ</option>					
					<option value="ko_KR" <?php if ( $locale == "ko_KR" ) echo 'selected="selected"'; ?>>ko_KR</option>
					<option value="ku_TR" <?php if ( $locale == "ku_TR" ) echo 'selected="selected"'; ?>>ku_TR</option>					
					<option value="la_VA" <?php if ( $locale == "la_VA" ) echo 'selected="selected"'; ?>>la_VA</option>
					<option value="lv_LV" <?php if ( $locale == "lv_LV" ) echo 'selected="selected"'; ?>>lv_LV</option>
					<option value="li_NL" <?php if ( $locale == "li_NL" ) echo 'selected="selected"'; ?>>li_NL</option>
					<option value="lt_LT" <?php if ( $locale == "lt_LT" ) echo 'selected="selected"'; ?>>lt_LT</option>					
					<option value="mk_MK" <?php if ( $locale == "mk_MK" ) echo 'selected="selected"'; ?>>mk_MK</option>
					<option value="mg_MG" <?php if ( $locale == "mg_MG" ) echo 'selected="selected"'; ?>>mg_MG</option>
					<option value="ml_IN" <?php if ( $locale == "ml_IN" ) echo 'selected="selected"'; ?>>ml_IN</option>
					<option value="ms_MY" <?php if ( $locale == "ms_MY" ) echo 'selected="selected"'; ?>>ms_MY</option>
					<option value="mt_MT" <?php if ( $locale == "mt_MT" ) echo 'selected="selected"'; ?>>mt_MT</option>
					<option value="mr_IN" <?php if ( $locale == "mr_IN" ) echo 'selected="selected"'; ?>>mr_IN</option>
					<option value="mn_MN" <?php if ( $locale == "mn_MN" ) echo 'selected="selected"'; ?>>mn_MN</option>
					<option value="ne_NP" <?php if ( $locale == "ne_NP" ) echo 'selected="selected"'; ?>>ne_NP</option>					
					<option value="nb_NO" <?php if ( $locale == "nb_NO" ) echo 'selected="selected"'; ?>>nb_NO</option>
					<option value="nn_NO" <?php if ( $locale == "nn_NO" ) echo 'selected="selected"'; ?>>nn_NO</option>
					<option value="nl_BE" <?php if ( $locale == "nl_BE" ) echo 'selected="selected"'; ?>>nl_BE</option>
					<option value="nl_NL" <?php if ( $locale == "nl_NL" ) echo 'selected="selected"'; ?>>nl_NL</option>
					<option value="pa_IN" <?php if ( $locale == "pa_IN" ) echo 'selected="selected"'; ?>>pa_IN</option>					
					<option value="pl_PL" <?php if ( $locale == "pl_PL" ) echo 'selected="selected"'; ?>>pl_PL</option>
					<option value="ps_AF" <?php if ( $locale == "ps_AF" ) echo 'selected="selected"'; ?>>ps_AF</option>
					<option value="pt_BR" <?php if ( $locale == "pt_BR" ) echo 'selected="selected"'; ?>>pt_BR</option>
					<option value="pt_PT" <?php if ( $locale == "pt_PT" ) echo 'selected="selected"'; ?>>pt_PT</option>
					<option value="gn_PY" <?php if ( $locale == "gn_PY" ) echo 'selected="selected"'; ?>>gn_PY</option>
					<option value="qu_PE" <?php if ( $locale == "qu_PE" ) echo 'selected="selected"'; ?>>qu_PE</option>									
					<option value="rm_CH" <?php if ( $locale == "rm_CH" ) echo 'selected="selected"'; ?>>rm_CH</option>					
					<option value="ro_RO" <?php if ( $locale == "ro_RO" ) echo 'selected="selected"'; ?>>ro_RO</option>
					<option value="ru_RU" <?php if ( $locale == "ru_RU" ) echo 'selected="selected"'; ?>>ru_RU</option>
					<option value="sa_IN" <?php if ( $locale == "sa_IN" ) echo 'selected="selected"'; ?>>sa_IN</option>
					<option value="se_NO" <?php if ( $locale == "se_NO" ) echo 'selected="selected"'; ?>>se_NO</option>					
					<option value="sk_SK" <?php if ( $locale == "sk_SK" ) echo 'selected="selected"'; ?>>sk_SK</option>
					<option value="sy_SY" <?php if ( $locale == "sy_SY" ) echo 'selected="selected"'; ?>>sy_SY</option>					
					<option value="sl_SI" <?php if ( $locale == "sl_SI" ) echo 'selected="selected"'; ?>>sl_SI</option>
					<option value="sq_AL" <?php if ( $locale == "sq_AL" ) echo 'selected="selected"'; ?>>sq_AL</option>
					<option value="so_SO" <?php if ( $locale == "so_SO" ) echo 'selected="selected"'; ?>>so_SO</option>					
					<option value="sr_RS" <?php if ( $locale == "sr_RS" ) echo 'selected="selected"'; ?>>sr_RS</option>					
					<option value="sv_SE" <?php if ( $locale == "sv_SE" ) echo 'selected="selected"'; ?>>sv_SE</option>
					<option value="sw_KE" <?php if ( $locale == "sw_KE" ) echo 'selected="selected"'; ?>>sw_KE</option>				
					<option value="ta_IN" <?php if ( $locale == "ta_IN" ) echo 'selected="selected"'; ?>>ta_IN</option>	
					<option value="te_IN" <?php if ( $locale == "te_IN" ) echo 'selected="selected"'; ?>>te_IN</option>	
					<option value="tg_TJ" <?php if ( $locale == "tg_TJ" ) echo 'selected="selected"'; ?>>tg_TJ</option>					
					<option value="th_TH" <?php if ( $locale == "th_TH" ) echo 'selected="selected"'; ?>>th_TH</option>
					<option value="tl_PH" <?php if ( $locale == "tl_PH" ) echo 'selected="selected"'; ?>>tl_PH</option>
					<option value="tl_ST" <?php if ( $locale == "tl_ST" ) echo 'selected="selected"'; ?>>tl_ST</option>
					<option value="tr_TR" <?php if ( $locale == "tr_TR" ) echo 'selected="selected"'; ?>>tr_TR</option>
					<option value="tt_RU" <?php if ( $locale == "tt_RU" ) echo 'selected="selected"'; ?>>tt_RU</option>
					<option value="uk_UA" <?php if ( $locale == "uk_UA" ) echo 'selected="selected"'; ?>>uk_UA</option>
					<option value="ur_PK" <?php if ( $locale == "ur_PK" ) echo 'selected="selected"'; ?>>ur_PK</option>					
					<option value="uz_UZ" <?php if ( $locale == "uz_UZ" ) echo 'selected="selected"'; ?>>uz_UZ</option>
					<option value="vi_VN" <?php if ( $locale == "vi_VN" ) echo 'selected="selected"'; ?>>vi_VN</option>
					<option value="xh_ZA" <?php if ( $locale == "xh_ZA" ) echo 'selected="selected"'; ?>>xh_ZA</option>					
					<option value="yi_DE" <?php if ( $locale == "yi_DE" ) echo 'selected="selected"'; ?>>yi_DE</option>					
					<option value="zh_CN" <?php if ( $locale == "zh_CN" ) echo 'selected="selected"'; ?>>zh_CN</option>
					<option value="zh_HK" <?php if ( $locale == "zh_HK" ) echo 'selected="selected"'; ?>>zh_HK</option>
					<option value="zh_TW" <?php if ( $locale == "zh_TW" ) echo 'selected="selected"'; ?>>zh_TW</option>
					<option value="zu_ZA" <?php if ( $locale == "zu_ZA" ) echo 'selected="selected"'; ?>>zu_ZA</option>
				</select>				
				<label><?php _e('Og:locale:alternate - An array of other locales this page is available in: ', 'seos'); ?> </label>
				<?php $locale_alternate = esc_html(get_option( 'seos_locale_alternate' )); ?>
				<select name="seos_locale_alternate">
					<option value=" "  selected="selected"> </option>
					<option value="af_ZA" <?php if ( $locale_alternate == "af_ZA" ) echo 'selected="selected"'; ?>>af_ZA</option>
					<option value="ay_BO" <?php if ( $locale_alternate == "ay_BO" ) echo 'selected="selected"'; ?>>ay_BO</option>
					<option value="ar_AR" <?php if ( $locale_alternate == "ar_AR" ) echo 'selected="selected"'; ?>>ar_AR</option>
					<option value="az_AZ" <?php if ( $locale_alternate == "az_AZ" ) echo 'selected="selected"'; ?>>az_AZ</option>
					<option value="be_BY" <?php if ( $locale_alternate == "be_BY" ) echo 'selected="selected"'; ?>>be_BY</option>
					<option value="bn_IN" <?php if ( $locale_alternate == "bn_IN" ) echo 'selected="selected"'; ?>>bn_IN</option>
					<option value="bs_BA" <?php if ( $locale_alternate == "bs_BA" ) echo 'selected="selected"'; ?>>bs_BA</option>
					<option value="bg_BG" <?php if ( $locale_alternate == "bg_BG" ) echo 'selected="selected"'; ?>>bg_BG</option>
					<option value="ca_ES" <?php if ( $locale_alternate == "ca_ES" ) echo 'selected="selected"'; ?>>ca_ES</option>
					<option value="ck_US" <?php if ( $locale_alternate == "ck_US" ) echo 'selected="selected"'; ?>>ck_US</option>
					<option value="cs_CZ" <?php if ( $locale_alternate == "cs_CZ" ) echo 'selected="selected"'; ?>>cs_CZ</option>
					<option value="cy_GB" <?php if ( $locale_alternate == "cy_GB" ) echo 'selected="selected"'; ?>>cy_GB</option>
					<option value="da_DK" <?php if ( $locale_alternate == "da_DK" ) echo 'selected="selected"'; ?>>da_DK</option>
					<option value="de_DE" <?php if ( $locale_alternate == "de_DE" ) echo 'selected="selected"'; ?>>de_DE</option>					
					<option value="el_GR" <?php if ( $locale_alternate == "el_GR" ) echo 'selected="selected"'; ?>>el_GR</option>
					<option value="en_GB" <?php if ( $locale_alternate == "en_GB" ) echo 'selected="selected"'; ?>>en_GB</option>	
					<option value="eo_EO" <?php if ( $locale_alternate == "eo_EO" ) echo 'selected="selected"'; ?>>eo_EO</option>					
					<option value="en_PI" <?php if ( $locale_alternate == "en_PI" ) echo 'selected="selected"'; ?>>en_PI</option>
					<option value="en_UD" <?php if ( $locale_alternate == "en_UD" ) echo 'selected="selected"'; ?>>en_UD</option>
					<option value="en_US" <?php if ( $locale_alternate == "en_US" ) echo 'selected="selected"'; ?>>en_US</option>
					<option value="es_LA" <?php if ( $locale_alternate == "es_LA" ) echo 'selected="selected"'; ?>>es_LA</option>
					<option value="es_CL" <?php if ( $locale_alternate == "es_CL" ) echo 'selected="selected"'; ?>>es_CL</option>
					<option value="es_CO" <?php if ( $locale_alternate == "es_CO" ) echo 'selected="selected"'; ?>>es_CO</option>
					<option value="es_ES" <?php if ( $locale_alternate == "es_ES" ) echo 'selected="selected"'; ?>>es_ES</option>
					<option value="es_MX" <?php if ( $locale_alternate == "es_MX" ) echo 'selected="selected"'; ?>>es_MX</option>					
					<option value="es_VE" <?php if ( $locale_alternate == "es_VE" ) echo 'selected="selected"'; ?>>es_VE</option>					
					<option value="et_EE" <?php if ( $locale_alternate == "et_EE" ) echo 'selected="selected"'; ?>>et_EE</option>
					<option value="eu_ES" <?php if ( $locale_alternate == "eu_ES" ) echo 'selected="selected"'; ?>>eu_ES</option>
					<option value="fa_IR" <?php if ( $locale_alternate == "fa_IR" ) echo 'selected="selected"'; ?>>fa_IR</option>					
					<option value="fb_FI" <?php if ( $locale_alternate == "fb_FI" ) echo 'selected="selected"'; ?>>fb_FI</option>
					<option value="fb_LT" <?php if ( $locale_alternate == "fb_LT" ) echo 'selected="selected"'; ?>>fb_LT</option>					
					<option value="fi_FI" <?php if ( $locale_alternate == "fi_FI" ) echo 'selected="selected"'; ?>>fi_FI</option>
					<option value="fo_FO" <?php if ( $locale_alternate == "fo_FO" ) echo 'selected="selected"'; ?>>fo_FO</option>							
					<option value="fr_CA" <?php if ( $locale_alternate == "fr_CA" ) echo 'selected="selected"'; ?>>fr_CA</option>	
					<option value="fr_FR" <?php if ( $locale_alternate == "fr_FR" ) echo 'selected="selected"'; ?>>fr_FR</option>					
					<option value="ga_IE" <?php if ( $locale_alternate == "ga_IE" ) echo 'selected="selected"'; ?>>ga_IE</option>					
					<option value="gl_ES" <?php if ( $locale_alternate == "gl_ES" ) echo 'selected="selected"'; ?>>gl_ES</option>					
					<option value="gu_IN" <?php if ( $locale_alternate == "gu_IN" ) echo 'selected="selected"'; ?>>gu_IN</option>
					<option value="he_IL" <?php if ( $locale_alternate == "he_IL" ) echo 'selected="selected"'; ?>>he_IL</option>					
					<option value="hi_IN" <?php if ( $locale_alternate == "hi_IN" ) echo 'selected="selected"'; ?>>hi_IN</option>					
					<option value="hy_AM" <?php if ( $locale_alternate == "hy_AM" ) echo 'selected="selected"'; ?>>hy_AM</option>
					<option value="hr_HR" <?php if ( $locale_alternate == "hr_HR" ) echo 'selected="selected"'; ?>>hr_HR</option>					
					<option value="hu_HU" <?php if ( $locale_alternate == "hu_HU" ) echo 'selected="selected"'; ?>>hu_HU</option>
					<option value="id_ID" <?php if ( $locale_alternate == "id_ID" ) echo 'selected="selected"'; ?>>id_ID</option>					
					<option value="is_IS" <?php if ( $locale_alternate == "is_IS" ) echo 'selected="selected"'; ?>>is_IS</option>					
					<option value="it_IT" <?php if ( $locale_alternate == "it_IT" ) echo 'selected="selected"'; ?>>it_IT</option>				
					<option value="ja_JP" <?php if ( $locale_alternate == "ja_JP" ) echo 'selected="selected"'; ?>>ja_JP</option>
					<option value="jv_ID" <?php if ( $locale_alternate == "jv_ID" ) echo 'selected="selected"'; ?>>jv_ID</option>
					<option value="ka_GE" <?php if ( $locale_alternate == "ka_GE" ) echo 'selected="selected"'; ?>>ka_GE</option>
					<option value="km_KH" <?php if ( $locale_alternate == "km_KH" ) echo 'selected="selected"'; ?>>km_KH</option>
					<option value="kn_IN" <?php if ( $locale_alternate == "kn_IN" ) echo 'selected="selected"'; ?>>kn_IN</option>
					<option value="kk_KZ" <?php if ( $locale_alternate == "kk_KZ" ) echo 'selected="selected"'; ?>>kk_KZ</option>					
					<option value="ko_KR" <?php if ( $locale_alternate == "ko_KR" ) echo 'selected="selected"'; ?>>ko_KR</option>
					<option value="ku_TR" <?php if ( $locale_alternate == "ku_TR" ) echo 'selected="selected"'; ?>>ku_TR</option>					
					<option value="la_VA" <?php if ( $locale_alternate == "la_VA" ) echo 'selected="selected"'; ?>>la_VA</option>
					<option value="lv_LV" <?php if ( $locale_alternate == "lv_LV" ) echo 'selected="selected"'; ?>>lv_LV</option>
					<option value="li_NL" <?php if ( $locale_alternate == "li_NL" ) echo 'selected="selected"'; ?>>li_NL</option>
					<option value="lt_LT" <?php if ( $locale_alternate == "lt_LT" ) echo 'selected="selected"'; ?>>lt_LT</option>					
					<option value="mk_MK" <?php if ( $locale_alternate == "mk_MK" ) echo 'selected="selected"'; ?>>mk_MK</option>
					<option value="mg_MG" <?php if ( $locale_alternate == "mg_MG" ) echo 'selected="selected"'; ?>>mg_MG</option>
					<option value="ml_IN" <?php if ( $locale_alternate == "ml_IN" ) echo 'selected="selected"'; ?>>ml_IN</option>
					<option value="ms_MY" <?php if ( $locale_alternate == "ms_MY" ) echo 'selected="selected"'; ?>>ms_MY</option>
					<option value="mt_MT" <?php if ( $locale_alternate == "mt_MT" ) echo 'selected="selected"'; ?>>mt_MT</option>
					<option value="mr_IN" <?php if ( $locale_alternate == "mr_IN" ) echo 'selected="selected"'; ?>>mr_IN</option>
					<option value="mn_MN" <?php if ( $locale_alternate == "mn_MN" ) echo 'selected="selected"'; ?>>mn_MN</option>
					<option value="ne_NP" <?php if ( $locale_alternate == "ne_NP" ) echo 'selected="selected"'; ?>>ne_NP</option>					
					<option value="nb_NO" <?php if ( $locale_alternate == "nb_NO" ) echo 'selected="selected"'; ?>>nb_NO</option>
					<option value="nn_NO" <?php if ( $locale_alternate == "nn_NO" ) echo 'selected="selected"'; ?>>nn_NO</option>
					<option value="nl_BE" <?php if ( $locale_alternate == "nl_BE" ) echo 'selected="selected"'; ?>>nl_BE</option>
					<option value="nl_NL" <?php if ( $locale_alternate == "nl_NL" ) echo 'selected="selected"'; ?>>nl_NL</option>
					<option value="pa_IN" <?php if ( $locale_alternate == "pa_IN" ) echo 'selected="selected"'; ?>>pa_IN</option>					
					<option value="pl_PL" <?php if ( $locale_alternate == "pl_PL" ) echo 'selected="selected"'; ?>>pl_PL</option>
					<option value="ps_AF" <?php if ( $locale_alternate == "ps_AF" ) echo 'selected="selected"'; ?>>ps_AF</option>
					<option value="pt_BR" <?php if ( $locale_alternate == "pt_BR" ) echo 'selected="selected"'; ?>>pt_BR</option>
					<option value="pt_PT" <?php if ( $locale_alternate == "pt_PT" ) echo 'selected="selected"'; ?>>pt_PT</option>
					<option value="gn_PY" <?php if ( $locale_alternate == "gn_PY" ) echo 'selected="selected"'; ?>>gn_PY</option>
					<option value="qu_PE" <?php if ( $locale_alternate == "qu_PE" ) echo 'selected="selected"'; ?>>qu_PE</option>									
					<option value="rm_CH" <?php if ( $locale_alternate == "rm_CH" ) echo 'selected="selected"'; ?>>rm_CH</option>					
					<option value="ro_RO" <?php if ( $locale_alternate == "ro_RO" ) echo 'selected="selected"'; ?>>ro_RO</option>
					<option value="ru_RU" <?php if ( $locale_alternate == "ru_RU" ) echo 'selected="selected"'; ?>>ru_RU</option>
					<option value="sa_IN" <?php if ( $locale_alternate == "sa_IN" ) echo 'selected="selected"'; ?>>sa_IN</option>
					<option value="se_NO" <?php if ( $locale_alternate == "se_NO" ) echo 'selected="selected"'; ?>>se_NO</option>					
					<option value="sk_SK" <?php if ( $locale_alternate == "sk_SK" ) echo 'selected="selected"'; ?>>sk_SK</option>
					<option value="sy_SY" <?php if ( $locale_alternate == "sy_SY" ) echo 'selected="selected"'; ?>>sy_SY</option>					
					<option value="sl_SI" <?php if ( $locale_alternate == "sl_SI" ) echo 'selected="selected"'; ?>>sl_SI</option>
					<option value="sq_AL" <?php if ( $locale_alternate == "sq_AL" ) echo 'selected="selected"'; ?>>sq_AL</option>
					<option value="so_SO" <?php if ( $locale_alternate == "so_SO" ) echo 'selected="selected"'; ?>>so_SO</option>					
					<option value="sr_RS" <?php if ( $locale_alternate == "sr_RS" ) echo 'selected="selected"'; ?>>sr_RS</option>					
					<option value="sv_SE" <?php if ( $locale_alternate == "sv_SE" ) echo 'selected="selected"'; ?>>sv_SE</option>
					<option value="sw_KE" <?php if ( $locale_alternate == "sw_KE" ) echo 'selected="selected"'; ?>>sw_KE</option>				
					<option value="ta_IN" <?php if ( $locale_alternate == "ta_IN" ) echo 'selected="selected"'; ?>>ta_IN</option>	
					<option value="te_IN" <?php if ( $locale_alternate == "te_IN" ) echo 'selected="selected"'; ?>>te_IN</option>	
					<option value="tg_TJ" <?php if ( $locale_alternate == "tg_TJ" ) echo 'selected="selected"'; ?>>tg_TJ</option>					
					<option value="th_TH" <?php if ( $locale_alternate == "th_TH" ) echo 'selected="selected"'; ?>>th_TH</option>
					<option value="tl_PH" <?php if ( $locale_alternate == "tl_PH" ) echo 'selected="selected"'; ?>>tl_PH</option>
					<option value="tl_ST" <?php if ( $locale_alternate == "tl_ST" ) echo 'selected="selected"'; ?>>tl_ST</option>
					<option value="tr_TR" <?php if ( $locale_alternate == "tr_TR" ) echo 'selected="selected"'; ?>>tr_TR</option>
					<option value="tt_RU" <?php if ( $locale_alternate == "tt_RU" ) echo 'selected="selected"'; ?>>tt_RU</option>
					<option value="uk_UA" <?php if ( $locale_alternate == "uk_UA" ) echo 'selected="selected"'; ?>>uk_UA</option>
					<option value="ur_PK" <?php if ( $locale_alternate == "ur_PK" ) echo 'selected="selected"'; ?>>ur_PK</option>					
					<option value="uz_UZ" <?php if ( $locale_alternate == "uz_UZ" ) echo 'selected="selected"'; ?>>uz_UZ</option>
					<option value="vi_VN" <?php if ( $locale_alternate == "vi_VN" ) echo 'selected="selected"'; ?>>vi_VN</option>
					<option value="xh_ZA" <?php if ( $locale_alternate == "xh_ZA" ) echo 'selected="selected"'; ?>>xh_ZA</option>					
					<option value="yi_DE" <?php if ( $locale_alternate == "yi_DE" ) echo 'selected="selected"'; ?>>yi_DE</option>					
					<option value="zh_CN" <?php if ( $locale_alternate == "zh_CN" ) echo 'selected="selected"'; ?>>zh_CN</option>
					<option value="zh_HK" <?php if ( $locale_alternate == "zh_HK" ) echo 'selected="selected"'; ?>>zh_HK</option>
					<option value="zh_TW" <?php if ( $locale_alternate == "zh_TW" ) echo 'selected="selected"'; ?>>zh_TW</option>
					<option value="zu_ZA" <?php if ( $locale_alternate == "zu_ZA" ) echo 'selected="selected"'; ?>>zu_ZA</option>
				</select>
				<label><?php _e('Og:locale:alternate - An array of other locales this page is available in: ', 'seos'); ?> </label>				
				<?php $locale_alternate1 = esc_html(get_option( 'seos_locale_alternate1' )); ?>
				<select name="seos_locale_alternate1">
					<option value=" "  selected="selected"> </option>
					<option value="af_ZA" <?php if ( $locale_alternate1 == "af_ZA" ) echo 'selected="selected"'; ?>>af_ZA</option>
					<option value="ay_BO" <?php if ( $locale_alternate1 == "ay_BO" ) echo 'selected="selected"'; ?>>ay_BO</option>
					<option value="ar_AR" <?php if ( $locale_alternate1 == "ar_AR" ) echo 'selected="selected"'; ?>>ar_AR</option>
					<option value="az_AZ" <?php if ( $locale_alternate1 == "az_AZ" ) echo 'selected="selected"'; ?>>az_AZ</option>
					<option value="be_BY" <?php if ( $locale_alternate1 == "be_BY" ) echo 'selected="selected"'; ?>>be_BY</option>
					<option value="bn_IN" <?php if ( $locale_alternate1 == "bn_IN" ) echo 'selected="selected"'; ?>>bn_IN</option>
					<option value="bs_BA" <?php if ( $locale_alternate1 == "bs_BA" ) echo 'selected="selected"'; ?>>bs_BA</option>
					<option value="bg_BG" <?php if ( $locale_alternate1 == "bg_BG" ) echo 'selected="selected"'; ?>>bg_BG</option>
					<option value="ca_ES" <?php if ( $locale_alternate1 == "ca_ES" ) echo 'selected="selected"'; ?>>ca_ES</option>
					<option value="ck_US" <?php if ( $locale_alternate1 == "ck_US" ) echo 'selected="selected"'; ?>>ck_US</option>
					<option value="cs_CZ" <?php if ( $locale_alternate1 == "cs_CZ" ) echo 'selected="selected"'; ?>>cs_CZ</option>
					<option value="cy_GB" <?php if ( $locale_alternate1 == "cy_GB" ) echo 'selected="selected"'; ?>>cy_GB</option>
					<option value="da_DK" <?php if ( $locale_alternate1 == "da_DK" ) echo 'selected="selected"'; ?>>da_DK</option>
					<option value="de_DE" <?php if ( $locale_alternate1 == "de_DE" ) echo 'selected="selected"'; ?>>de_DE</option>					
					<option value="el_GR" <?php if ( $locale_alternate1 == "el_GR" ) echo 'selected="selected"'; ?>>el_GR</option>
					<option value="en_GB" <?php if ( $locale_alternate1 == "en_GB" ) echo 'selected="selected"'; ?>>en_GB</option>	
					<option value="eo_EO" <?php if ( $locale_alternate1 == "eo_EO" ) echo 'selected="selected"'; ?>>eo_EO</option>					
					<option value="en_PI" <?php if ( $locale_alternate1 == "en_PI" ) echo 'selected="selected"'; ?>>en_PI</option>
					<option value="en_UD" <?php if ( $locale_alternate1 == "en_UD" ) echo 'selected="selected"'; ?>>en_UD</option>
					<option value="en_US" <?php if ( $locale_alternate1 == "en_US" ) echo 'selected="selected"'; ?>>en_US</option>
					<option value="es_LA" <?php if ( $locale_alternate1 == "es_LA" ) echo 'selected="selected"'; ?>>es_LA</option>
					<option value="es_CL" <?php if ( $locale_alternate1 == "es_CL" ) echo 'selected="selected"'; ?>>es_CL</option>
					<option value="es_CO" <?php if ( $locale_alternate1 == "es_CO" ) echo 'selected="selected"'; ?>>es_CO</option>
					<option value="es_ES" <?php if ( $locale_alternate1 == "es_ES" ) echo 'selected="selected"'; ?>>es_ES</option>
					<option value="es_MX" <?php if ( $locale_alternate1 == "es_MX" ) echo 'selected="selected"'; ?>>es_MX</option>					
					<option value="es_VE" <?php if ( $locale_alternate1 == "es_VE" ) echo 'selected="selected"'; ?>>es_VE</option>					
					<option value="et_EE" <?php if ( $locale_alternate1 == "et_EE" ) echo 'selected="selected"'; ?>>et_EE</option>
					<option value="eu_ES" <?php if ( $locale_alternate1 == "eu_ES" ) echo 'selected="selected"'; ?>>eu_ES</option>
					<option value="fa_IR" <?php if ( $locale_alternate1 == "fa_IR" ) echo 'selected="selected"'; ?>>fa_IR</option>					
					<option value="fb_FI" <?php if ( $locale_alternate1 == "fb_FI" ) echo 'selected="selected"'; ?>>fb_FI</option>
					<option value="fb_LT" <?php if ( $locale_alternate1 == "fb_LT" ) echo 'selected="selected"'; ?>>fb_LT</option>					
					<option value="fi_FI" <?php if ( $locale_alternate1 == "fi_FI" ) echo 'selected="selected"'; ?>>fi_FI</option>
					<option value="fo_FO" <?php if ( $locale_alternate1 == "fo_FO" ) echo 'selected="selected"'; ?>>fo_FO</option>							
					<option value="fr_CA" <?php if ( $locale_alternate1 == "fr_CA" ) echo 'selected="selected"'; ?>>fr_CA</option>	
					<option value="fr_FR" <?php if ( $locale_alternate1 == "fr_FR" ) echo 'selected="selected"'; ?>>fr_FR</option>					
					<option value="ga_IE" <?php if ( $locale_alternate1 == "ga_IE" ) echo 'selected="selected"'; ?>>ga_IE</option>					
					<option value="gl_ES" <?php if ( $locale_alternate1 == "gl_ES" ) echo 'selected="selected"'; ?>>gl_ES</option>					
					<option value="gu_IN" <?php if ( $locale_alternate1 == "gu_IN" ) echo 'selected="selected"'; ?>>gu_IN</option>
					<option value="he_IL" <?php if ( $locale_alternate1 == "he_IL" ) echo 'selected="selected"'; ?>>he_IL</option>					
					<option value="hi_IN" <?php if ( $locale_alternate1 == "hi_IN" ) echo 'selected="selected"'; ?>>hi_IN</option>					
					<option value="hy_AM" <?php if ( $locale_alternate1 == "hy_AM" ) echo 'selected="selected"'; ?>>hy_AM</option>
					<option value="hr_HR" <?php if ( $locale_alternate1 == "hr_HR" ) echo 'selected="selected"'; ?>>hr_HR</option>					
					<option value="hu_HU" <?php if ( $locale_alternate1 == "hu_HU" ) echo 'selected="selected"'; ?>>hu_HU</option>
					<option value="id_ID" <?php if ( $locale_alternate1 == "id_ID" ) echo 'selected="selected"'; ?>>id_ID</option>					
					<option value="is_IS" <?php if ( $locale_alternate1 == "is_IS" ) echo 'selected="selected"'; ?>>is_IS</option>					
					<option value="it_IT" <?php if ( $locale_alternate1 == "it_IT" ) echo 'selected="selected"'; ?>>it_IT</option>				
					<option value="ja_JP" <?php if ( $locale_alternate1 == "ja_JP" ) echo 'selected="selected"'; ?>>ja_JP</option>
					<option value="jv_ID" <?php if ( $locale_alternate1 == "jv_ID" ) echo 'selected="selected"'; ?>>jv_ID</option>
					<option value="ka_GE" <?php if ( $locale_alternate1 == "ka_GE" ) echo 'selected="selected"'; ?>>ka_GE</option>
					<option value="km_KH" <?php if ( $locale_alternate1 == "km_KH" ) echo 'selected="selected"'; ?>>km_KH</option>
					<option value="kn_IN" <?php if ( $locale_alternate1 == "kn_IN" ) echo 'selected="selected"'; ?>>kn_IN</option>
					<option value="kk_KZ" <?php if ( $locale_alternate1 == "kk_KZ" ) echo 'selected="selected"'; ?>>kk_KZ</option>					
					<option value="ko_KR" <?php if ( $locale_alternate1 == "ko_KR" ) echo 'selected="selected"'; ?>>ko_KR</option>
					<option value="ku_TR" <?php if ( $locale_alternate1 == "ku_TR" ) echo 'selected="selected"'; ?>>ku_TR</option>					
					<option value="la_VA" <?php if ( $locale_alternate1 == "la_VA" ) echo 'selected="selected"'; ?>>la_VA</option>
					<option value="lv_LV" <?php if ( $locale_alternate1 == "lv_LV" ) echo 'selected="selected"'; ?>>lv_LV</option>
					<option value="li_NL" <?php if ( $locale_alternate1 == "li_NL" ) echo 'selected="selected"'; ?>>li_NL</option>
					<option value="lt_LT" <?php if ( $locale_alternate1 == "lt_LT" ) echo 'selected="selected"'; ?>>lt_LT</option>					
					<option value="mk_MK" <?php if ( $locale_alternate1 == "mk_MK" ) echo 'selected="selected"'; ?>>mk_MK</option>
					<option value="mg_MG" <?php if ( $locale_alternate1 == "mg_MG" ) echo 'selected="selected"'; ?>>mg_MG</option>
					<option value="ml_IN" <?php if ( $locale_alternate1 == "ml_IN" ) echo 'selected="selected"'; ?>>ml_IN</option>
					<option value="ms_MY" <?php if ( $locale_alternate1 == "ms_MY" ) echo 'selected="selected"'; ?>>ms_MY</option>
					<option value="mt_MT" <?php if ( $locale_alternate1 == "mt_MT" ) echo 'selected="selected"'; ?>>mt_MT</option>
					<option value="mr_IN" <?php if ( $locale_alternate1 == "mr_IN" ) echo 'selected="selected"'; ?>>mr_IN</option>
					<option value="mn_MN" <?php if ( $locale_alternate1 == "mn_MN" ) echo 'selected="selected"'; ?>>mn_MN</option>
					<option value="ne_NP" <?php if ( $locale_alternate1 == "ne_NP" ) echo 'selected="selected"'; ?>>ne_NP</option>					
					<option value="nb_NO" <?php if ( $locale_alternate1 == "nb_NO" ) echo 'selected="selected"'; ?>>nb_NO</option>
					<option value="nn_NO" <?php if ( $locale_alternate1 == "nn_NO" ) echo 'selected="selected"'; ?>>nn_NO</option>
					<option value="nl_BE" <?php if ( $locale_alternate1 == "nl_BE" ) echo 'selected="selected"'; ?>>nl_BE</option>
					<option value="nl_NL" <?php if ( $locale_alternate1 == "nl_NL" ) echo 'selected="selected"'; ?>>nl_NL</option>
					<option value="pa_IN" <?php if ( $locale_alternate1 == "pa_IN" ) echo 'selected="selected"'; ?>>pa_IN</option>					
					<option value="pl_PL" <?php if ( $locale_alternate1 == "pl_PL" ) echo 'selected="selected"'; ?>>pl_PL</option>
					<option value="ps_AF" <?php if ( $locale_alternate1 == "ps_AF" ) echo 'selected="selected"'; ?>>ps_AF</option>
					<option value="pt_BR" <?php if ( $locale_alternate1 == "pt_BR" ) echo 'selected="selected"'; ?>>pt_BR</option>
					<option value="pt_PT" <?php if ( $locale_alternate1 == "pt_PT" ) echo 'selected="selected"'; ?>>pt_PT</option>
					<option value="gn_PY" <?php if ( $locale_alternate1 == "gn_PY" ) echo 'selected="selected"'; ?>>gn_PY</option>
					<option value="qu_PE" <?php if ( $locale_alternate1 == "qu_PE" ) echo 'selected="selected"'; ?>>qu_PE</option>									
					<option value="rm_CH" <?php if ( $locale_alternate1 == "rm_CH" ) echo 'selected="selected"'; ?>>rm_CH</option>					
					<option value="ro_RO" <?php if ( $locale_alternate1 == "ro_RO" ) echo 'selected="selected"'; ?>>ro_RO</option>
					<option value="ru_RU" <?php if ( $locale_alternate1 == "ru_RU" ) echo 'selected="selected"'; ?>>ru_RU</option>
					<option value="sa_IN" <?php if ( $locale_alternate1 == "sa_IN" ) echo 'selected="selected"'; ?>>sa_IN</option>
					<option value="se_NO" <?php if ( $locale_alternate1 == "se_NO" ) echo 'selected="selected"'; ?>>se_NO</option>					
					<option value="sk_SK" <?php if ( $locale_alternate1 == "sk_SK" ) echo 'selected="selected"'; ?>>sk_SK</option>
					<option value="sy_SY" <?php if ( $locale_alternate1 == "sy_SY" ) echo 'selected="selected"'; ?>>sy_SY</option>					
					<option value="sl_SI" <?php if ( $locale_alternate1 == "sl_SI" ) echo 'selected="selected"'; ?>>sl_SI</option>
					<option value="sq_AL" <?php if ( $locale_alternate1 == "sq_AL" ) echo 'selected="selected"'; ?>>sq_AL</option>
					<option value="so_SO" <?php if ( $locale_alternate1 == "so_SO" ) echo 'selected="selected"'; ?>>so_SO</option>					
					<option value="sr_RS" <?php if ( $locale_alternate1 == "sr_RS" ) echo 'selected="selected"'; ?>>sr_RS</option>					
					<option value="sv_SE" <?php if ( $locale_alternate1 == "sv_SE" ) echo 'selected="selected"'; ?>>sv_SE</option>
					<option value="sw_KE" <?php if ( $locale_alternate1 == "sw_KE" ) echo 'selected="selected"'; ?>>sw_KE</option>				
					<option value="ta_IN" <?php if ( $locale_alternate1 == "ta_IN" ) echo 'selected="selected"'; ?>>ta_IN</option>	
					<option value="te_IN" <?php if ( $locale_alternate1 == "te_IN" ) echo 'selected="selected"'; ?>>te_IN</option>	
					<option value="tg_TJ" <?php if ( $locale_alternate1 == "tg_TJ" ) echo 'selected="selected"'; ?>>tg_TJ</option>					
					<option value="th_TH" <?php if ( $locale_alternate1 == "th_TH" ) echo 'selected="selected"'; ?>>th_TH</option>
					<option value="tl_PH" <?php if ( $locale_alternate1 == "tl_PH" ) echo 'selected="selected"'; ?>>tl_PH</option>
					<option value="tl_ST" <?php if ( $locale_alternate1 == "tl_ST" ) echo 'selected="selected"'; ?>>tl_ST</option>
					<option value="tr_TR" <?php if ( $locale_alternate1 == "tr_TR" ) echo 'selected="selected"'; ?>>tr_TR</option>
					<option value="tt_RU" <?php if ( $locale_alternate1 == "tt_RU" ) echo 'selected="selected"'; ?>>tt_RU</option>
					<option value="uk_UA" <?php if ( $locale_alternate1 == "uk_UA" ) echo 'selected="selected"'; ?>>uk_UA</option>
					<option value="ur_PK" <?php if ( $locale_alternate1 == "ur_PK" ) echo 'selected="selected"'; ?>>ur_PK</option>					
					<option value="uz_UZ" <?php if ( $locale_alternate1 == "uz_UZ" ) echo 'selected="selected"'; ?>>uz_UZ</option>
					<option value="vi_VN" <?php if ( $locale_alternate1 == "vi_VN" ) echo 'selected="selected"'; ?>>vi_VN</option>
					<option value="xh_ZA" <?php if ( $locale_alternate1 == "xh_ZA" ) echo 'selected="selected"'; ?>>xh_ZA</option>					
					<option value="yi_DE" <?php if ( $locale_alternate1 == "yi_DE" ) echo 'selected="selected"'; ?>>yi_DE</option>					
					<option value="zh_CN" <?php if ( $locale_alternate1 == "zh_CN" ) echo 'selected="selected"'; ?>>zh_CN</option>
					<option value="zh_HK" <?php if ( $locale_alternate1 == "zh_HK" ) echo 'selected="selected"'; ?>>zh_HK</option>
					<option value="zh_TW" <?php if ( $locale_alternate1 == "zh_TW" ) echo 'selected="selected"'; ?>>zh_TW</option>
					<option value="zu_ZA" <?php if ( $locale_alternate1 == "zu_ZA" ) echo 'selected="selected"'; ?>>zu_ZA</option>
				</select>

				<label><?php _e('Graph URL. The canonical URL of your object that will be used as its permanent ID in the graph: ', 'seos'); ?> </label>
				<input type="text" name="seos_graph_url" value="<?php echo esc_url(get_option( 'seos_graph_url' )); ?>" />
				<h2>Geo Region</h2>
				<label><?php _e('Geo Region:', 'seos'); ?></label>
				<?php $geo_region = get_option( 'seos_geo_region' ) ?>
				<select name="seos_geo_region">
					<option value=" "  selected="selected"> </option>
					<option value="AF" <?php if ( $geo_region == "AF" ) echo 'selected="selected"'; ?>>AF</option>
					<option value="AX" <?php if ( $geo_region == "AX" ) echo 'selected="selected"'; ?>>AX</option>
					<option value="AL" <?php if ( $geo_region == "AL" ) echo 'selected="selected"'; ?>>AL</option>
					<option value="DZ" <?php if ( $geo_region == "DZ" ) echo 'selected="selected"'; ?>>DZ</option>
					<option value="AS" <?php if ( $geo_region == "AS" ) echo 'selected="selected"'; ?>>AS</option>
					<option value="AD" <?php if ( $geo_region == "AD" ) echo 'selected="selected"'; ?>>AD</option>
					<option value="AO" <?php if ( $geo_region == "AO" ) echo 'selected="selected"'; ?>>AO</option>
					<option value="AI" <?php if ( $geo_region == "AI" ) echo 'selected="selected"'; ?>>AI</option>
					<option value="AQ" <?php if ( $geo_region == "AQ" ) echo 'selected="selected"'; ?>>AQ</option>
					<option value="AG" <?php if ( $geo_region == "AG" ) echo 'selected="selected"'; ?>>AG</option>
					<option value="AR" <?php if ( $geo_region == "AR" ) echo 'selected="selected"'; ?>>AR</option>
					<option value="AM" <?php if ( $geo_region == "AM" ) echo 'selected="selected"'; ?>>AM</option>
					<option value="AW" <?php if ( $geo_region == "AW" ) echo 'selected="selected"'; ?>>AW</option>
					<option value="AU" <?php if ( $geo_region == "AU" ) echo 'selected="selected"'; ?>>AU</option>
					<option value="AT" <?php if ( $geo_region == "AT" ) echo 'selected="selected"'; ?>>AT</option>
					<option value="AZ" <?php if ( $geo_region == "AZ" ) echo 'selected="selected"'; ?>>AZ</option>
					<option value="BS" <?php if ( $geo_region == "BS" ) echo 'selected="selected"'; ?>>BS</option>
					<option value="BH" <?php if ( $geo_region == "BH" ) echo 'selected="selected"'; ?>>BH</option>
					<option value="BD" <?php if ( $geo_region == "BD" ) echo 'selected="selected"'; ?>>BD</option>
					<option value="BB" <?php if ( $geo_region == "BB" ) echo 'selected="selected"'; ?>>BB</option>
					<option value="BY" <?php if ( $geo_region == "BY" ) echo 'selected="selected"'; ?>>BY</option>
					<option value="BE" <?php if ( $geo_region == "BE" ) echo 'selected="selected"'; ?>>BE</option>
					<option value="BZ" <?php if ( $geo_region == "BZ" ) echo 'selected="selected"'; ?>>BZ</option>
					<option value="BJ" <?php if ( $geo_region == "BJ" ) echo 'selected="selected"'; ?>>BJ</option>
					<option value="BM" <?php if ( $geo_region == "BM" ) echo 'selected="selected"'; ?>>BM</option>
					<option value="BT" <?php if ( $geo_region == "BT" ) echo 'selected="selected"'; ?>>BT</option>
					<option value="BO" <?php if ( $geo_region == "BO" ) echo 'selected="selected"'; ?>>BO</option>
					<option value="BQ" <?php if ( $geo_region == "BQ" ) echo 'selected="selected"'; ?>>BQ</option>
					<option value="BA" <?php if ( $geo_region == "BA" ) echo 'selected="selected"'; ?>>BA</option>
					<option value="BW" <?php if ( $geo_region == "BW" ) echo 'selected="selected"'; ?>>BW</option>
					<option value="BV" <?php if ( $geo_region == "BV" ) echo 'selected="selected"'; ?>>BV</option>
					<option value="BR" <?php if ( $geo_region == "BR" ) echo 'selected="selected"'; ?>>BR</option>
					<option value="IO" <?php if ( $geo_region == "IO" ) echo 'selected="selected"'; ?>>IO</option>
					<option value="BN" <?php if ( $geo_region == "BN" ) echo 'selected="selected"'; ?>>BN</option>
					<option value="BG" <?php if ( $geo_region == "BG" ) echo 'selected="selected"'; ?>>BG</option>
					<option value="BF" <?php if ( $geo_region == "BF" ) echo 'selected="selected"'; ?>>BF</option>
					<option value="BI" <?php if ( $geo_region == "BI" ) echo 'selected="selected"'; ?>>BI</option>
					<option value="KH" <?php if ( $geo_region == "KH" ) echo 'selected="selected"'; ?>>KH</option>
					<option value="CM" <?php if ( $geo_region == "CM" ) echo 'selected="selected"'; ?>>CM</option>
					<option value="CA" <?php if ( $geo_region == "CA" ) echo 'selected="selected"'; ?>>CA</option>
					<option value="CV" <?php if ( $geo_region == "CV" ) echo 'selected="selected"'; ?>>CV</option>
					<option value="KY" <?php if ( $geo_region == "KY" ) echo 'selected="selected"'; ?>>KY</option>
					<option value="CF" <?php if ( $geo_region == "CF" ) echo 'selected="selected"'; ?>>CF</option>
					<option value="TD" <?php if ( $geo_region == "TD" ) echo 'selected="selected"'; ?>>TD</option>
					<option value="CL" <?php if ( $geo_region == "CL" ) echo 'selected="selected"'; ?>>CL</option>
					<option value="CN" <?php if ( $geo_region == "CN" ) echo 'selected="selected"'; ?>>CN</option>
					<option value="CX" <?php if ( $geo_region == "CX" ) echo 'selected="selected"'; ?>>CX</option>
					<option value="CC" <?php if ( $geo_region == "CC" ) echo 'selected="selected"'; ?>>CC</option>
					<option value="CO" <?php if ( $geo_region == "CO" ) echo 'selected="selected"'; ?>>CO</option>
					<option value="KM" <?php if ( $geo_region == "KM" ) echo 'selected="selected"'; ?>>KM</option>
					<option value="CG" <?php if ( $geo_region == "CG" ) echo 'selected="selected"'; ?>>CG</option>
					<option value="CD" <?php if ( $geo_region == "CD" ) echo 'selected="selected"'; ?>>CD</option>
					<option value="CK" <?php if ( $geo_region == "CK" ) echo 'selected="selected"'; ?>>CK</option>
					<option value="CR" <?php if ( $geo_region == "CR" ) echo 'selected="selected"'; ?>>CR</option>
					<option value="CI" <?php if ( $geo_region == "CI" ) echo 'selected="selected"'; ?>>CI</option>
					<option value="HR" <?php if ( $geo_region == "HR" ) echo 'selected="selected"'; ?>>HR</option>
					<option value="CU" <?php if ( $geo_region == "CU" ) echo 'selected="selected"'; ?>>CU</option>
					<option value="CW" <?php if ( $geo_region == "CW" ) echo 'selected="selected"'; ?>>CW</option>
					<option value="CY" <?php if ( $geo_region == "CY" ) echo 'selected="selected"'; ?>>CY</option>
					<option value="CZ" <?php if ( $geo_region == "CZ" ) echo 'selected="selected"'; ?>>CZ</option>
					<option value="DK" <?php if ( $geo_region == "DK" ) echo 'selected="selected"'; ?>>DK</option>
					<option value="DJ" <?php if ( $geo_region == "DJ" ) echo 'selected="selected"'; ?>>DJ</option>
					<option value="DM" <?php if ( $geo_region == "DM" ) echo 'selected="selected"'; ?>>DM</option>
					<option value="DO" <?php if ( $geo_region == "DO" ) echo 'selected="selected"'; ?>>DO</option>
					<option value="EC" <?php if ( $geo_region == "EC" ) echo 'selected="selected"'; ?>>EC</option>
					<option value="EG" <?php if ( $geo_region == "EG" ) echo 'selected="selected"'; ?>>EG</option>
					<option value="SV" <?php if ( $geo_region == "SV" ) echo 'selected="selected"'; ?>>SV</option>
					<option value="GQ" <?php if ( $geo_region == "GQ" ) echo 'selected="selected"'; ?>>GQ</option>
					<option value="ER" <?php if ( $geo_region == "ER" ) echo 'selected="selected"'; ?>>ER</option>
					<option value="EE" <?php if ( $geo_region == "EE" ) echo 'selected="selected"'; ?>>EE</option>
					<option value="ET" <?php if ( $geo_region == "ET" ) echo 'selected="selected"'; ?>>ET</option>
					<option value="FK" <?php if ( $geo_region == "FK" ) echo 'selected="selected"'; ?>>FK</option>
					<option value="FO" <?php if ( $geo_region == "FO" ) echo 'selected="selected"'; ?>>FO</option>
					<option value="FJ" <?php if ( $geo_region == "FJ" ) echo 'selected="selected"'; ?>>FJ</option>
					<option value="FI" <?php if ( $geo_region == "FI" ) echo 'selected="selected"'; ?>>FI</option>
					<option value="FR" <?php if ( $geo_region == "FR" ) echo 'selected="selected"'; ?>>FR</option>
					<option value="GF" <?php if ( $geo_region == "GF" ) echo 'selected="selected"'; ?>>GF</option>
					<option value="PF" <?php if ( $geo_region == "PF" ) echo 'selected="selected"'; ?>>PF</option>
					<option value="TF" <?php if ( $geo_region == "TF" ) echo 'selected="selected"'; ?>>TF</option>
					<option value="GA" <?php if ( $geo_region == "GA" ) echo 'selected="selected"'; ?>>GA</option>
					<option value="GM" <?php if ( $geo_region == "GM" ) echo 'selected="selected"'; ?>>GM</option>
					<option value="GE" <?php if ( $geo_region == "GE" ) echo 'selected="selected"'; ?>>GE</option>
					<option value="DE" <?php if ( $geo_region == "DE" ) echo 'selected="selected"'; ?>>DE</option>
					<option value="GH" <?php if ( $geo_region == "GH" ) echo 'selected="selected"'; ?>>GH</option>
					<option value="GI" <?php if ( $geo_region == "GI" ) echo 'selected="selected"'; ?>>GI</option>
					<option value="GR" <?php if ( $geo_region == "GR" ) echo 'selected="selected"'; ?>>GR</option>
					<option value="GL" <?php if ( $geo_region == "GL" ) echo 'selected="selected"'; ?>>GL</option>
					<option value="GD" <?php if ( $geo_region == "GD" ) echo 'selected="selected"'; ?>>GD</option>
					<option value="GP" <?php if ( $geo_region == "GP" ) echo 'selected="selected"'; ?>>GP</option>
					<option value="GU" <?php if ( $geo_region == "GU" ) echo 'selected="selected"'; ?>>GU</option>
					<option value="GT" <?php if ( $geo_region == "GT" ) echo 'selected="selected"'; ?>>GT</option>
					<option value="GG" <?php if ( $geo_region == "GG" ) echo 'selected="selected"'; ?>>GG</option>
					<option value="GN" <?php if ( $geo_region == "GN" ) echo 'selected="selected"'; ?>>GN</option>
					<option value="GW" <?php if ( $geo_region == "GW" ) echo 'selected="selected"'; ?>>GW</option>
					<option value="GY" <?php if ( $geo_region == "GY" ) echo 'selected="selected"'; ?>>GY</option>
					<option value="HT" <?php if ( $geo_region == "HT" ) echo 'selected="selected"'; ?>>HT</option>
					<option value="HM" <?php if ( $geo_region == "HM" ) echo 'selected="selected"'; ?>>HM</option>
					<option value="VA" <?php if ( $geo_region == "VA" ) echo 'selected="selected"'; ?>>VA</option>
					<option value="HN" <?php if ( $geo_region == "HN" ) echo 'selected="selected"'; ?>>HN</option>
					<option value="HK" <?php if ( $geo_region == "HK" ) echo 'selected="selected"'; ?>>HK</option>
					<option value="HU" <?php if ( $geo_region == "HU" ) echo 'selected="selected"'; ?>>HU</option>
					<option value="IS" <?php if ( $geo_region == "IS" ) echo 'selected="selected"'; ?>>IS</option>
					<option value="IN" <?php if ( $geo_region == "IN" ) echo 'selected="selected"'; ?>>IN</option>
					<option value="ID" <?php if ( $geo_region == "ID" ) echo 'selected="selected"'; ?>>ID</option>
					<option value="IR" <?php if ( $geo_region == "IR" ) echo 'selected="selected"'; ?>>IR</option>
					<option value="IQ" <?php if ( $geo_region == "IQ" ) echo 'selected="selected"'; ?>>IQ</option>
					<option value="IE" <?php if ( $geo_region == "IE" ) echo 'selected="selected"'; ?>>IE</option>
					<option value="IM" <?php if ( $geo_region == "IM" ) echo 'selected="selected"'; ?>>IM</option>
					<option value="IL" <?php if ( $geo_region == "IL" ) echo 'selected="selected"'; ?>>IL</option>
					<option value="IT" <?php if ( $geo_region == "IT" ) echo 'selected="selected"'; ?>>IT</option>
					<option value="JM" <?php if ( $geo_region == "JM" ) echo 'selected="selected"'; ?>>JM</option>
					<option value="JP" <?php if ( $geo_region == "JP" ) echo 'selected="selected"'; ?>>JP</option>
					<option value="JE" <?php if ( $geo_region == "JE" ) echo 'selected="selected"'; ?>>JE</option>
					<option value="JO" <?php if ( $geo_region == "JO" ) echo 'selected="selected"'; ?>>JO</option>
					<option value="KZ" <?php if ( $geo_region == "KZ" ) echo 'selected="selected"'; ?>>KZ</option>
					<option value="KE" <?php if ( $geo_region == "KE" ) echo 'selected="selected"'; ?>>KE</option>
					<option value="KI" <?php if ( $geo_region == "KI" ) echo 'selected="selected"'; ?>>KI</option>
					<option value="KP" <?php if ( $geo_region == "KP" ) echo 'selected="selected"'; ?>>KP</option>
					<option value="KR" <?php if ( $geo_region == "KR" ) echo 'selected="selected"'; ?>>KR</option>
					<option value="KW" <?php if ( $geo_region == "KW" ) echo 'selected="selected"'; ?>>KW</option>
					<option value="KG" <?php if ( $geo_region == "KG" ) echo 'selected="selected"'; ?>>KG</option>
					<option value="LA" <?php if ( $geo_region == "LA" ) echo 'selected="selected"'; ?>>LA</option>
					<option value="LV" <?php if ( $geo_region == "LV" ) echo 'selected="selected"'; ?>>LV</option>
					<option value="LB" <?php if ( $geo_region == "LB" ) echo 'selected="selected"'; ?>>LB</option>
					<option value="LS" <?php if ( $geo_region == "LS" ) echo 'selected="selected"'; ?>>LS</option>
					<option value="LR" <?php if ( $geo_region == "LR" ) echo 'selected="selected"'; ?>>LR</option>
					<option value="LY" <?php if ( $geo_region == "LY" ) echo 'selected="selected"'; ?>>LY</option>
					<option value="LI" <?php if ( $geo_region == "LI" ) echo 'selected="selected"'; ?>>LI</option>
					<option value="LT" <?php if ( $geo_region == "LT" ) echo 'selected="selected"'; ?>>LT</option>
					<option value="LU" <?php if ( $geo_region == "LU" ) echo 'selected="selected"'; ?>>LU</option>
					<option value="MO" <?php if ( $geo_region == "MO" ) echo 'selected="selected"'; ?>>MO</option>
					<option value="MK" <?php if ( $geo_region == "MK" ) echo 'selected="selected"'; ?>>MK</option>
					<option value="MG" <?php if ( $geo_region == "MG" ) echo 'selected="selected"'; ?>>MG</option>
					<option value="MW" <?php if ( $geo_region == "MW" ) echo 'selected="selected"'; ?>>MW</option>
					<option value="MY" <?php if ( $geo_region == "MY" ) echo 'selected="selected"'; ?>>MY</option>
					<option value="MV" <?php if ( $geo_region == "MV" ) echo 'selected="selected"'; ?>>MV</option>
					<option value="ML" <?php if ( $geo_region == "ML" ) echo 'selected="selected"'; ?>>ML</option>
					<option value="MT" <?php if ( $geo_region == "MT" ) echo 'selected="selected"'; ?>>MT</option>
					<option value="MH" <?php if ( $geo_region == "MH" ) echo 'selected="selected"'; ?>>MH</option>
					<option value="MQ" <?php if ( $geo_region == "MQ" ) echo 'selected="selected"'; ?>>MQ</option>
					<option value="MR" <?php if ( $geo_region == "MR" ) echo 'selected="selected"'; ?>>MR</option>
					<option value="MU" <?php if ( $geo_region == "MU" ) echo 'selected="selected"'; ?>>MU</option>
					<option value="YT" <?php if ( $geo_region == "YT" ) echo 'selected="selected"'; ?>>YT</option>
					<option value="MX" <?php if ( $geo_region == "MX" ) echo 'selected="selected"'; ?>>MX</option>
					<option value="FM" <?php if ( $geo_region == "FM" ) echo 'selected="selected"'; ?>>FM</option>
					<option value="MD" <?php if ( $geo_region == "MD" ) echo 'selected="selected"'; ?>>MD</option>
					<option value="MC" <?php if ( $geo_region == "MC" ) echo 'selected="selected"'; ?>>MC</option>
					<option value="MN" <?php if ( $geo_region == "MN" ) echo 'selected="selected"'; ?>>MN</option>
					<option value="ME" <?php if ( $geo_region == "ME" ) echo 'selected="selected"'; ?>>ME</option>
					<option value="MS" <?php if ( $geo_region == "MS" ) echo 'selected="selected"'; ?>>MS</option>
					<option value="MA" <?php if ( $geo_region == "MA" ) echo 'selected="selected"'; ?>>MA</option>
					<option value="MZ" <?php if ( $geo_region == "MZ" ) echo 'selected="selected"'; ?>>MZ</option>
					<option value="MM" <?php if ( $geo_region == "MM" ) echo 'selected="selected"'; ?>>MM</option>
					<option value="NA" <?php if ( $geo_region == "NA" ) echo 'selected="selected"'; ?>>NA</option>
					<option value="NR" <?php if ( $geo_region == "NR" ) echo 'selected="selected"'; ?>>NR</option>
					<option value="NP" <?php if ( $geo_region == "NP" ) echo 'selected="selected"'; ?>>NP</option>
					<option value="NL" <?php if ( $geo_region == "NL" ) echo 'selected="selected"'; ?>>NL</option>
					<option value="NC" <?php if ( $geo_region == "NC" ) echo 'selected="selected"'; ?>>NC</option>
					<option value="NZ" <?php if ( $geo_region == "NZ" ) echo 'selected="selected"'; ?>>NZ</option>
					<option value="NI" <?php if ( $geo_region == "NI" ) echo 'selected="selected"'; ?>>NI</option>
					<option value="NE" <?php if ( $geo_region == "NE" ) echo 'selected="selected"'; ?>>NE</option>
					<option value="NG" <?php if ( $geo_region == "NG" ) echo 'selected="selected"'; ?>>NG</option>
					<option value="NU" <?php if ( $geo_region == "NU" ) echo 'selected="selected"'; ?>>NU</option>
					<option value="NF" <?php if ( $geo_region == "NF" ) echo 'selected="selected"'; ?>>NF</option>
					<option value="MP" <?php if ( $geo_region == "MP" ) echo 'selected="selected"'; ?>>MP</option>
					<option value="NO" <?php if ( $geo_region == "NO" ) echo 'selected="selected"'; ?>>NO</option>
					<option value="OM" <?php if ( $geo_region == "OM" ) echo 'selected="selected"'; ?>>OM</option>
					<option value="PK" <?php if ( $geo_region == "PK" ) echo 'selected="selected"'; ?>>PK</option>
					<option value="PW" <?php if ( $geo_region == "PW" ) echo 'selected="selected"'; ?>>PW</option>
					<option value="PS" <?php if ( $geo_region == "PS" ) echo 'selected="selected"'; ?>>PS</option>
					<option value="PA" <?php if ( $geo_region == "PA" ) echo 'selected="selected"'; ?>>PA</option>
					<option value="PG" <?php if ( $geo_region == "PG" ) echo 'selected="selected"'; ?>>PG</option>
					<option value="PY" <?php if ( $geo_region == "PY" ) echo 'selected="selected"'; ?>>PY</option>
					<option value="PE" <?php if ( $geo_region == "PE" ) echo 'selected="selected"'; ?>>PE</option>
					<option value="PH" <?php if ( $geo_region == "PH" ) echo 'selected="selected"'; ?>>PH</option>
					<option value="PN" <?php if ( $geo_region == "PN" ) echo 'selected="selected"'; ?>>PN</option>
					<option value="PL" <?php if ( $geo_region == "PL" ) echo 'selected="selected"'; ?>>PL</option>
					<option value="PT" <?php if ( $geo_region == "PT" ) echo 'selected="selected"'; ?>>PT</option>
					<option value="PR" <?php if ( $geo_region == "PR" ) echo 'selected="selected"'; ?>>PR</option>
					<option value="QA" <?php if ( $geo_region == "QA" ) echo 'selected="selected"'; ?>>QA</option>
					<option value="RE" <?php if ( $geo_region == "RE" ) echo 'selected="selected"'; ?>>RE</option>
					<option value="RO" <?php if ( $geo_region == "RO" ) echo 'selected="selected"'; ?>>RO</option>
					<option value="RU" <?php if ( $geo_region == "RU" ) echo 'selected="selected"'; ?>>RU</option>
					<option value="RW" <?php if ( $geo_region == "RW" ) echo 'selected="selected"'; ?>>RW</option>
					<option value="BL" <?php if ( $geo_region == "BL" ) echo 'selected="selected"'; ?>>BL</option>
					<option value="SH" <?php if ( $geo_region == "SH" ) echo 'selected="selected"'; ?>>SH</option>
					<option value="KN" <?php if ( $geo_region == "KN" ) echo 'selected="selected"'; ?>>KN</option>
					<option value="LC" <?php if ( $geo_region == "LC" ) echo 'selected="selected"'; ?>>LC</option>
					<option value="MF" <?php if ( $geo_region == "MF" ) echo 'selected="selected"'; ?>>MF</option>
					<option value="PM" <?php if ( $geo_region == "PM" ) echo 'selected="selected"'; ?>>PM</option>
					<option value="VC" <?php if ( $geo_region == "VC" ) echo 'selected="selected"'; ?>>VC</option>
					<option value="WS" <?php if ( $geo_region == "WS" ) echo 'selected="selected"'; ?>>WS</option>
					<option value="SM" <?php if ( $geo_region == "SM" ) echo 'selected="selected"'; ?>>SM</option>
					<option value="ST" <?php if ( $geo_region == "ST" ) echo 'selected="selected"'; ?>>ST</option>
					<option value="SA" <?php if ( $geo_region == "SA" ) echo 'selected="selected"'; ?>>SA</option>
					<option value="SN" <?php if ( $geo_region == "SN" ) echo 'selected="selected"'; ?>>SN</option>
					<option value="RS" <?php if ( $geo_region == "RS" ) echo 'selected="selected"'; ?>>RS</option>
					<option value="SC" <?php if ( $geo_region == "SC" ) echo 'selected="selected"'; ?>>SC</option>
					<option value="SL" <?php if ( $geo_region == "SL" ) echo 'selected="selected"'; ?>>SL</option>
					<option value="SG" <?php if ( $geo_region == "SG" ) echo 'selected="selected"'; ?>>SG</option>
					<option value="SX" <?php if ( $geo_region == "SX" ) echo 'selected="selected"'; ?>>SX</option>
					<option value="SK" <?php if ( $geo_region == "SK" ) echo 'selected="selected"'; ?>>SK</option>
					<option value="SI" <?php if ( $geo_region == "SI" ) echo 'selected="selected"'; ?>>SI</option>
					<option value="SB" <?php if ( $geo_region == "SB" ) echo 'selected="selected"'; ?>>SB</option>
					<option value="SO" <?php if ( $geo_region == "SO" ) echo 'selected="selected"'; ?>>SO</option>
					<option value="ZA" <?php if ( $geo_region == "ZA" ) echo 'selected="selected"'; ?>>ZA</option>
					<option value="GS" <?php if ( $geo_region == "GS" ) echo 'selected="selected"'; ?>>GS</option>
					<option value="SS" <?php if ( $geo_region == "SS" ) echo 'selected="selected"'; ?>>SS</option>
					<option value="ES" <?php if ( $geo_region == "ES" ) echo 'selected="selected"'; ?>>ES</option>
					<option value="LK" <?php if ( $geo_region == "LK" ) echo 'selected="selected"'; ?>>LK</option>
					<option value="SD" <?php if ( $geo_region == "SD" ) echo 'selected="selected"'; ?>>SD</option>
					<option value="SR" <?php if ( $geo_region == "SR" ) echo 'selected="selected"'; ?>>SR</option>
					<option value="SJ" <?php if ( $geo_region == "SJ" ) echo 'selected="selected"'; ?>>SJ</option>
					<option value="SZ" <?php if ( $geo_region == "SZ" ) echo 'selected="selected"'; ?>>SZ</option>
					<option value="SE" <?php if ( $geo_region == "SE" ) echo 'selected="selected"'; ?>>SE</option>
					<option value="CH" <?php if ( $geo_region == "CH" ) echo 'selected="selected"'; ?>>CH</option>
					<option value="SY" <?php if ( $geo_region == "SY" ) echo 'selected="selected"'; ?>>SY</option>
					<option value="TW" <?php if ( $geo_region == "TW" ) echo 'selected="selected"'; ?>>TW</option>
					<option value="TJ" <?php if ( $geo_region == "TJ" ) echo 'selected="selected"'; ?>>TJ</option>
					<option value="TZ" <?php if ( $geo_region == "TZ" ) echo 'selected="selected"'; ?>>TZ</option>
					<option value="TH" <?php if ( $geo_region == "TH" ) echo 'selected="selected"'; ?>>TH</option>
					<option value="TL" <?php if ( $geo_region == "TL" ) echo 'selected="selected"'; ?>>TL</option>
					<option value="TG" <?php if ( $geo_region == "TG" ) echo 'selected="selected"'; ?>>TG</option>
					<option value="TK" <?php if ( $geo_region == "TK" ) echo 'selected="selected"'; ?>>TK</option>
					<option value="TO" <?php if ( $geo_region == "TO" ) echo 'selected="selected"'; ?>>TO</option>
					<option value="TT" <?php if ( $geo_region == "TT" ) echo 'selected="selected"'; ?>>TT</option>
					<option value="TN" <?php if ( $geo_region == "TN" ) echo 'selected="selected"'; ?>>TN</option>
					<option value="TR" <?php if ( $geo_region == "TR" ) echo 'selected="selected"'; ?>>TR</option>
					<option value="TM" <?php if ( $geo_region == "TM" ) echo 'selected="selected"'; ?>>TM</option>
					<option value="TC" <?php if ( $geo_region == "TC" ) echo 'selected="selected"'; ?>>TC</option>
					<option value="TV" <?php if ( $geo_region == "TV" ) echo 'selected="selected"'; ?>>TV</option>
					<option value="UG" <?php if ( $geo_region == "UG" ) echo 'selected="selected"'; ?>>UG</option>
					<option value="UA" <?php if ( $geo_region == "UA" ) echo 'selected="selected"'; ?>>UA</option>
					<option value="AE" <?php if ( $geo_region == "AE" ) echo 'selected="selected"'; ?>>AE</option>
					<option value="GB" <?php if ( $geo_region == "GB" ) echo 'selected="selected"'; ?>>GB</option>
					<option value="US" <?php if ( $geo_region == "US" ) echo 'selected="selected"'; ?>>US</option>
					<option value="UM" <?php if ( $geo_region == "UM" ) echo 'selected="selected"'; ?>>UM</option>
					<option value="UY" <?php if ( $geo_region == "UY" ) echo 'selected="selected"'; ?>>UY</option>
					<option value="UZ" <?php if ( $geo_region == "UZ" ) echo 'selected="selected"'; ?>>UZ</option>
					<option value="VU" <?php if ( $geo_region == "VU" ) echo 'selected="selected"'; ?>>VU</option>
					<option value="VE" <?php if ( $geo_region == "VE" ) echo 'selected="selected"'; ?>>VE</option>
					<option value="VN" <?php if ( $geo_region == "VN" ) echo 'selected="selected"'; ?>>VN</option>
					<option value="VG" <?php if ( $geo_region == "VG" ) echo 'selected="selected"'; ?>>VG</option>
					<option value="VI" <?php if ( $geo_region == "VI" ) echo 'selected="selected"'; ?>>VI</option>
					<option value="WF" <?php if ( $geo_region == "WF" ) echo 'selected="selected"'; ?>>WF</option>
					<option value="EH" <?php if ( $geo_region == "EH" ) echo 'selected="selected"'; ?>>EH</option>
					<option value="YE" <?php if ( $geo_region == "YE" ) echo 'selected="selected"'; ?>>YE</option>
					<option value="ZM" <?php if ( $geo_region == "ZM" ) echo 'selected="selected"'; ?>>ZM</option>
					<option value="ZW" <?php if ( $geo_region == "ZW" ) echo 'selected="selected"'; ?>>ZW</option>
				</select>

				<label><?php _e('Geo Placename: ', 'seos'); ?> </label>
				<input type="text" name="seos_geo_placename" value="<?php echo esc_html(get_option( 'seos_geo_placename' )); ?>" />
				
				<label><?php _e('Geo Position: ', 'seos'); ?> </label>
				<input type="text" name="seos_geo_position" value="<?php echo esc_html(get_option( 'seos_geo_position' )); ?>" />
				
				<label><?php _e('ICBM: ', 'seos'); ?> </label>
				<input type="text" name="seos_icbm" value="<?php echo esc_html(get_option( 'seos_icbm' )); ?>" />
				<h2>Twitter</h2>
				<label><?php _e('The type of twitter card to be created: summary, photo, or video:', 'seos'); ?></label>
				<?php $twitter_card = get_option( 'seos_twitter_card' ) ?>
				<select name="seos_twitter_card">
					<option value=" "  selected="selected"> </option>
					<option value="Summary" <?php if ( $twitter_card == "Summary" ) echo 'selected="selected"'; ?>><?php _e('Summary', 'seos'); ?></option>
					<option value="summary_large_image" <?php if ( $twitter_card == "summary_large_image" ) echo 'selected="selected"'; ?>><?php _e('Summary with large image', 'seos'); ?></option>
				</select>
				
				<label><?php _e('Twitter Site: ', 'seos'); ?> </label>
				<input type="text" name="seos_twitter_site" value="<?php echo esc_html(get_option( 'seos_twitter_site' )); ?>" />
				
				<label><?php _e('Twitter Title: ', 'seos'); ?> </label>
				<input type="text" name="seos_twitter_title" value="<?php echo esc_html(get_option( 'seos_twitter_title' )); ?>" />
				
				<label><?php _e('Twitter Description: ', 'seos'); ?> </label>
				<input type="text" name="seos_twitter_description" value="<?php echo esc_html(get_option( 'seos_twitter_description' )); ?>" />

				<label><?php _e('Twitter Image: ', 'seos'); ?> </label>
				<input type="text" name="seos_twitter_image" value="<?php echo esc_url(get_option( 'seos_twitter_image' )); ?>" />
			<?php submit_button(); ?>	
			</div>
			
			<div id="sticky-plugin" <?php if( $active_tab == 'sticky_notes' ) { ?> style="display: block;"<?php } else { ?> style="display: none;" <?php } ?>>
			<?php for($i=1;$i<=1; $i++) { ?>
			<p class="stickys-form-title"><?php _e('Note ', 'seos'); ?>  </p>
					<table class="seos-stickys-table" >
						<tr>
							<td>
							<textarea onclick="seosChangeColor()" id="<?php echo "ta_".$i; ?>" maxlength="300" name="seos_sticky_<?php echo $i; ?>" class="seos-sticky seos-sticky<?php echo $i; ?>"><?php echo esc_html(get_option('seos_sticky_'.$i)); ?></textarea>
													<b><?php _e(' Include with shortcode ', 'seos'); ?></b>
							<textarea class="p-shortcode" rows="1" style="resize: none; text-align: left; display: block; border:0; padding: 0;" cols="13" readonly onClick="this.select();">[seos_sticky_<?php echo $i; ?>]</textarea>	
							<?php submit_button(); ?>
							</td>
							<td>

												
							<b><?php _e('Note URL', 'seos'); ?></b>
							<input placeholder="<?php _e('Note URL', 'seos'); ?>" type="url" name="seos_sticky_url_<?php echo $i; ?>" value="<?php echo esc_url(get_option('seos_sticky_url_'.$i)); ?>" />
					
							<b><?php _e('Note Color Scheme', 'seos'); ?></b>
							<?php $seos_sticky_color_sheme = esc_html(get_option( 'seos_sticky_color_sheme'.$i )); ?>

							<select id="id_<?php echo $i; ?>" name="seos_sticky_color_sheme<?php echo $i; ?>">
								<option value=" "  selected="selected">default</option>
								<option class="s_1" value="1" <?php if ( $seos_sticky_color_sheme == "1" ) echo 'selected="selected"'; ?>>#2B83FF</option>
								<option class="s_2" value="2" <?php if ( $seos_sticky_color_sheme == "2" ) echo 'selected="selected"'; ?>>#84F38D</option>
								<option class="s_3" value="3" <?php if ( $seos_sticky_color_sheme == "3" ) echo 'selected="selected"'; ?>>#544B46</option>
								<option class="s_4" value="4" <?php if ( $seos_sticky_color_sheme == "4" ) echo 'selected="selected"'; ?>>#2BFF52</option>
								<option class="s_5" value="5" <?php if ( $seos_sticky_color_sheme == "5" ) echo 'selected="selected"'; ?>>#FFB986</option>
								<option class="s_6" value="6" <?php if ( $seos_sticky_color_sheme == "6" ) echo 'selected="selected"'; ?>>#DF87FF</option>
								<option class="s_7" value="7" <?php if ( $seos_sticky_color_sheme == "7" ) echo 'selected="selected"'; ?>>#F1F1F1</option>
								<option class="s_8" value="8" <?php if ( $seos_sticky_color_sheme == "8" ) echo 'selected="selected"'; ?>>#FE2B4C</option>
								<option class="s_9" value="9" <?php if ( $seos_sticky_color_sheme == "9" ) echo 'selected="selected"'; ?>>#FEFE86</option>
							</select>
						
							<b><?php _e('Text Color', 'seos'); ?></b>
							<input id="id_color<?php echo $i; ?>"  type="text" value="<?php echo esc_html(get_option('seos_sticky_color_text'.$i)); ?>" name="seos_sticky_color_text<?php echo $i; ?>" class="my-color-field" />
							<script>
							jQuery(document).ready(function(jQuery){
                                jQuery('.my-color-field').wpColorPicker({
								change: 
								function(events,ui){
									 jQuery('#ta_1').css('color',''+ui.color);
									 jQuery('#ta_2').css('color',''+ui.color);
									 jQuery('#ta_3').css('color',''+ui.color);
								}
								});
							});
							</script>
							<script>
								var stylesheet_directory_uri = "<?php echo plugins_url(); ?>";

								document.addEventListener('input', function (event) {
								// Only run for #id_1 select
								if (event.target.id !== 'id_1' ) return;
								if (event.target.value === '1') {document.getElementById('ta_1').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-blue.jpg')";}
								if (event.target.value === '2') {document.getElementById('ta_1').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-apple-greeen.jpg')";}
								if (event.target.value === '3') {document.getElementById('ta_1').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-black.jpg')";}
								if (event.target.value === '4') {document.getElementById('ta_1').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-green.jpg')";}
								if (event.target.value === '5') {document.getElementById('ta_1').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-orange.jpg')";}
								if (event.target.value === '6') {document.getElementById('ta_1').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-purple.jpg')";}
								if (event.target.value === '7') {document.getElementById('ta_1').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-white.jpg')";}
								if (event.target.value === '8') {document.getElementById('ta_1').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-red.jpg')";}
								if (event.target.value === '9') {document.getElementById('ta_1').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-yellow.jpg')";}
								}, false);
									
								document.addEventListener('input', function (event) {
								// Only run for #id_1 select
								if (event.target.id !== 'id_2' ) return;
								if (event.target.value === '1') {document.getElementById('ta_2').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-blue.jpg')";}
								if (event.target.value === '2') {document.getElementById('ta_2').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-apple-greeen.jpg')";}
								if (event.target.value === '3') {document.getElementById('ta_2').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-black.jpg')";}
								if (event.target.value === '4') {document.getElementById('ta_2').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-green.jpg')";}
								if (event.target.value === '5') {document.getElementById('ta_2').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-orange.jpg')";}
								if (event.target.value === '6') {document.getElementById('ta_2').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-purple.jpg')";}
								if (event.target.value === '7') {document.getElementById('ta_2').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-white.jpg')";}
								if (event.target.value === '8') {document.getElementById('ta_2').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-red.jpg')";}
								if (event.target.value === '9') {document.getElementById('ta_2').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-yellow.jpg')";}
								}, false);
																								
								document.addEventListener('input', function (event) {
								// Only run for #id_1 select
								if (event.target.id !== 'id_3' ) return;
								if (event.target.value === '1') {document.getElementById('ta_3').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-blue.jpg')";}
								if (event.target.value === '2') {document.getElementById('ta_3').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-apple-greeen.jpg')";}
								if (event.target.value === '3') {document.getElementById('ta_3').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-black.jpg')";}
								if (event.target.value === '4') {document.getElementById('ta_3').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-green.jpg')";}
								if (event.target.value === '5') {document.getElementById('ta_3').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-orange.jpg')";}
								if (event.target.value === '6') {document.getElementById('ta_3').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-purple.jpg')";}
								if (event.target.value === '7') {document.getElementById('ta_3').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-white.jpg')";}
								if (event.target.value === '8') {document.getElementById('ta_3').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-red.jpg')";}
								if (event.target.value === '9') {document.getElementById('ta_3').style.backgroundImage = "url('"+stylesheet_directory_uri+"/seos/images/sticky-yellow.jpg')";}
								}, false);					
							</script>
							</td>
						</tr>
					</table>
					<hr>
			<?php } ?>	
			</div>

			
			
			<div id="notes-plugin" <?php if( $active_tab == 'notes' ) { ?> style="display: block;"<?php } else { ?> style="display: none;" <?php } ?>>
			<br />
			<b style="color: #333;"><?php _e('Displays notes on the WordPress dashboard. When the date of the event has occurred, the note is colored red.', 'seos'); ?></b>
				<div class="cont-notes" >
					<?php for($i=1;$i<=8; $i++) { ?>
					<table class="notes-table" >
						<tr>
							<td <?php if((get_option('seos_note_datepicker_'.$i) <= date_i18n( 'Y-m-d' ) and get_option('seos_note_datepicker_'.$i) !="") or get_option('seos_note_datepicker_'.$i) == "This date has already passed") { echo "style='background: red;'"; } ?>><b><?php _e('Note '.$i, 'seos'); ?></b>
							<br />
							<textarea class="note" name="seos_note_name_<?php echo $i; ?>"><?php echo esc_html(get_option("seos_note_name_".$i)); ?></textarea></td>
						</tr>
						<tr>
							<td <?php if(get_option('seos_note_datepicker_'.$i) <= date_i18n( 'Y-m-d' ) and get_option('seos_note_datepicker_'.$i) !="" or get_option('seos_note_datepicker_'.$i) == "This date has already passed") { echo "style='background: red;'"; } ?>>
							<br />
							<input autocomplete="off" placeholder="<?php _e('Date', 'seos'); ?>" type="text" class="datepicker" name="seos_note_datepicker_<?php echo $i; ?>" value="<?php echo esc_html(get_option('seos_note_datepicker_'.$i)); ?>" /></td>
						</tr>
					</table>
					<?php } ?>
				</div>
				<?php
					function seos_notes_custom_cron_func() {
						for($i=1;$i<=8; $i++) {
							if(get_option('seos_note_datepicker_'.$i) == date_i18n( 'Y-m-d' ) and get_option('seos_note_datepicker_'.$i) !="") {
								$old_date = "seos_note_datepicker_".$i;
								update_option( $old_date, "This date has already passed" );
							}
								
						}
					}
					seos_notes_custom_cron_func(); ?>
					<?php submit_button(); ?>	
			</div>
			
			
		</form>	
		
