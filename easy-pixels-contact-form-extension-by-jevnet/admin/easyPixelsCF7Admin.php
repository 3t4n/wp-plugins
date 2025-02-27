<?php



function jn_easypixels_admintabs_CF7()
{
	?>
	<a href="<?php echo esc_url( add_query_arg( array( 'action' => 'CF7' ), admin_url( 'admin.php?page=CF7easytracking' ) ) ); ?>" class="nav-tab<?php if ('CF7easytracking' == $_GET['page'] ) echo ' nav-tab-active'; ?>"><?php esc_html_e( 'Contact Form 7' ); ?></a> 
	<?php
}

function jn_createEasyPixelsCF7MenuOption()
{
	if(!class_exists( 'jn_Analytics' ) )
	{
		add_menu_page('Easy Pixels Settings','Easy Pixels','administrator','easypixels','jn_easypixels_initTrackingOptions');
	}
	add_submenu_page('easypixels', 'Contact form tracking', 'CF7 tracking', 'administrator', 'CF7easytracking', 'jn_initCF7TrackingOptions' );
}


function jn_initCF7TrackingOptions()
{
	$jn_EasyPixels=new jn_easypixels();
	if (!class_exists( 'jn_easypixels' ) ){require(JN_EasyPixelsCF7_PATH . '/admin/page-basicNotInstalled.php');}
	else{require(JN_EasyPixelsCF7_PATH . '/admin/page-easyPixelsCF7Admin.php');}
}


add_action('easyPixelsContactForm','jn_cf7TrackingAdminSettings');
function jn_cf7TrackingAdminSettings()
{
	if ( class_exists( 'WPCF7_ContactForm' ) )
	{
/*		$jnEPGA=new jn_Analytics();
		$jn_gAds=new jn_easyGAds();
		$jn_bingAds=new jn_easyBingAds();
		$jnFB=new jn_Facebook();
		$jn_TwitterAds=new jn_easypixels_Twitter();
		if(class_exists('jn_easyGTagManager')){$jn_GTMtracking=new jn_easyGTagManager();}
*/
		$jn_EasyPixels=new jn_easypixels();

		$jn_ADW_CF7_labels=get_option('jn_cf7_ADW_labels');
		$jn_ADW_CF7_enabled=(get_option('jn_GADW_CF7_enable')=='on')?' checked="checked"':'';
	?>
	<table class="form-table">
	<?php
	if(($jn_EasyPixels->trackingOptions->gads->is_enabled())&&($jn_EasyPixels->trackingOptions->gads->getCode()!=''))
	{
	?>
		<tr>
			<th><?php echo __('Enable Google Ads tracking','easy-pixels-contact-form-extension-by-jevnet');?></th><td><input type="checkbox" id="jn_GADW_CF7_enable" name="jn_GADW_CF7_enable"<?php echo $jn_ADW_CF7_enabled; ?> onchange="tableClassToggle()"><label for="jn_GADW_CF7_enable"><?php echo __('Enable','easy-pixels-contact-form-extension-by-jevnet');?></label></td><td></td>
		</tr>
	<?php 
	}
	?>
	</table>


	<style>#theEPCF7table{border:1px solid #aaa;} #theEPCF7table td,#theEPCF7table th{padding:.5em;}#theEPCF7table tr:nth-child(odd) {background: #FFF}#theEPCF7table.noadw .gadsCol{display:none;}</style>
	<table class="form-table" id="theEPCF7table">
	<?php

		$args = array('post_type'=> 'wpcf7_contact_form','post_status' => 'publish','nopaging' => true);
		$the_query = new WP_Query( $args );

		$idCollection=Array();
		if($the_query->have_posts() )
		{
			$postCounter=0;
			
			if(sizeof($the_query->posts)==0){echo __('No "Contact form 7" forms are found');}
			while($postCounter<sizeof($the_query->posts))
			{
				$CF7id=(int)strip_tags(apply_filters('the_content', $the_query->posts[$postCounter]->ID ));
				$CF7title=strip_tags(apply_filters('the_content', $the_query->posts[$postCounter]->post_title ));
				$CF7title=sanitize_text_field($CF7title);
				$GAD_label_id='jn_GADW_CF7_label_'.$CF7id;

				$value=(isset($jn_ADW_CF7_labels[$GAD_label_id]))?$jn_ADW_CF7_labels[$GAD_label_id]:"";

				$trackingCode='';
				if(($jn_EasyPixels->trackingOptions->gtm->is_enabled())&&($jn_EasyPixels->trackingOptions->gtm->getCode()!=''))
				{
					$trackingCode.='<p><img src="'.JN_EasyPixels_URL.'/img/gtm.png" alt="GTM" width="15px">'."&nbsp;dataLayer.push({'event': 'formsent','eventCategory':'conversion','eventAction':'formsubmit','eventLabel':'".$CF7title."','formid':'".$CF7id."','formname':'".$CF7title."'});</p>";
				}

				if(($jn_EasyPixels->trackingOptions->analytics->is_enabled())&&($jn_EasyPixels->trackingOptions->analytics->getCode()!=''))
				{
					$trackingCode.='<p><img src="'.JN_EasyPixels_URL.'/img/google.png" alt="Analytics" width="15px">'."&nbsp;gtag('event', 'generate_lead', {'event_label': '".$CF7id."','event_category':'".$CF7title."'});</p>";
				}
				if(($jn_EasyPixels->trackingOptions->bing->is_enabled())&&($jn_EasyPixels->trackingOptions->bing->getCode()!=''))
				{
					$trackingCode.='<p><img src="'.JN_EasyPixels_URL.'/img/msadv-ico.svg" alt="Bing" width="15px">'."&nbsp;window.uetq.push({ 'ec':'form', 'ea':'send', 'el':'".$CF7title."'});</p>";
				}
				if(($jn_EasyPixels->trackingOptions->facebook->is_enabled())&&($jn_EasyPixels->trackingOptions->facebook->getCode()!=''))
				{
					$trackingCode.='<p><img src="'.JN_EasyPixels_URL.'/img/fb.png" alt="Facebook" width="15px">'."&nbsp;fbq('track', 'Lead',{content_category: '".$CF7id."',content_name: '".$CF7title."'});</p>";
				}
				if(($jn_EasyPixels->trackingOptions->twitter->is_enabled())&&($jn_EasyPixels->trackingOptions->twitter->getCode()!=''))
				{
					$trackingCode.='<p><img src="'.JN_EasyPixels_URL.'/img/twitter.png" alt="Twitter" width="15px">'."&nbsp;twq('track','Signup', {content_category:'contact form',content_name: '".$CF7title."'});</p>";
				}
				$gAdsFields='';
				if(($jn_EasyPixels->trackingOptions->gads->is_enabled())&&($jn_EasyPixels->trackingOptions->gads->getCode()!=''))
				{
					$gAdsFields='<td class="gadsCol">'.$jn_EasyPixels->trackingOptions->gads->getCode().' / <input value="'.$value.'" type="text" id="'.$GAD_label_id.'" name="'.$GAD_label_id.'" placeholder="YYYYYYYYYYYYYYYYYYY"></td>';
				}
				?>

				<tr>
					<th><label for="jn_GADW_CF7_label">(<?php echo $CF7id.') - '.$CF7title; ?></label></th><?php echo  $gAdsFields; ?><td><?php echo $trackingCode; ?></td>
				</tr>

				<?php
				$postCounter++;
			}
		}else{echo __('No "Contact form 7" forms are found');}
		?>
		</table>
		<script>function tableClassToggle(){document.getElementById('theEPCF7table').className=(document.getElementById('jn_GADW_CF7_enable').checked)?'form-table adw':'form-table noadw';}tableClassToggle();</script>
<?php }else{echo '<div class="notice notice-error"><p>'.__('"Contact form 7" plugin is not installed or active.').'</p></div>';echo '<p>'.__('"Contact form 7" plugin is not installed or active.').'</p>';}
}

function save_jnEasyPixelsCF7Settings()
{
	if ( false == get_option( 'jnAnalyticsCF7Settings-group' ) ) {add_option( 'jnAnalyticsCF7Settings-group' );}
	register_setting('jnAnalyticsCF7Settings-group','jn_GADW_CF7_enable');
	$CF7_ADW_labels=Array();
	foreach ($_POST as $key => $value) 
	{
		if(strpos($key, 'jn_GADW_CF7_label_')===0)
		{
			$CF7_ADW_labels[$key]=jnEasyPixelsCF7_sanitizeLabel($value);
		}
	}
	if(sizeof($CF7_ADW_labels)>0){update_option('jn_cf7_ADW_labels', $CF7_ADW_labels);}
}

function jnEasyPixelsCF7_sanitizeLabel($theLabel)
{
	$theLabel=sanitize_text_field($theLabel);
	if((strpos($theLabel,'/')>0)&&(strpos(strtoupper($theLabel),'AW-')==0)){$theLabel=substr($theLabel, strpos($theLabel,'/')+1);}
	$theLabel = preg_replace('/[^\w]/', '', $theLabel);
	return $theLabel;
}
?>