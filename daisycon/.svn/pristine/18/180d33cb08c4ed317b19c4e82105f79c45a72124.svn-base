<?php 
/* Daisycon prijsvergelijkers
 * File: vakantie.php
 * 
 * View for the shorttags to be displayed on the website
 * 
 */

class generalDaisyconVakantie{

	public static function adminDaisyconVakantie(){
		
		global $wpdb;

		$sMediaId = generalDaisyconSettings::getMediaId();
		
		$output = '
					<script type="text/javascript">
							function daisycon_select_all(el) {
								if (typeof window.getSelection != "undefined" && typeof document.createRange != "undefined") {
									var range = document.createRange();
									range.selectNodeContents(el);
									var sel = window.getSelection();
									sel.removeAllRanges();
									sel.addRange(range);
								} else if (typeof document.selection != "undefined" && typeof document.body.createTextRange != "undefined") {
									var textRange = document.body.createTextRange();
									textRange.moveToElementText(el);
									textRange.select();
								}
							}
					</script>
		';
		
		$output .= 	'<div style="width:900px;">
						<img src="//www.daisycon.com/shared/daisyconwebsite/img/layout/blog/publish-tools_vakantievergelijker_paxz_100.png" alt="" title="" style="float:left;margin-right:20px;" /> <h1>Daisycon vakantietool</h1>
						Daisycon heeft exclusief voor haar publishers een gratis vakantietool ontwikkeld. De tool is eenvoudig te installeren en stelt de bezoekers van jouw website in staat een groot aanbod van zomervakanties te bekijken. 
						<br/><br/>
						Plak onderstaande shorttag in je blogpost of pagina en de vergelijker verschijnt direct op je website. <a href="http://vergelijkers.daisycon.com/vakantietool/" target="_blank">Klik hier om de demowebsite te bekijken</a>.
						<br/><br/>
						<h1>Standaardgebruik</h1>
						Vul je <a href="http://www.daisycon.com/nl/faq/publishers/affiliate_marketing/waar_vind_ik_mijn_media_id/" target="_blank" title="Waar vind ik mijn Media ID?">Media ID</a> op de plek van XXXXX in. Je Media ID kun je ook opslaan, zodat hij standaard wordt ingevuld. Dit doe je bij het menu-item <a href="admin.php?page=daisycontools">Introductie</a>. Bij amount vul je het aantal resultaten in dat je wil tonen en je kunt indien gewenst een <a href="http://www.daisycon.com/nl/blog/hoe_gebruik_je_sub_ids/" target="_blank">Sub ID</a> invullen.
						<br/><br/>
							
						<div onclick="daisycon_select_all(this)" style="cursor:pointer;width:800px;text-align: center; border: 1px solid #cecece; background: #f3f3f3; color: #333333; padding: 5px; margin-bottom: 10px; border-radius: 5px;" >	
							[daisycon_vakantie mediaid="'.$sMediaId.'" amount="5" subid=""]
						</div>					
						
						<p>&nbsp;</p>';
		
		echo $output;
	}
	
	public static function frontDaisyconVakantie($array){

		// Set mediaid if empty
		if( empty($array['mediaid']) ){
			$array['mediaid'] = generalDaisyconSettings::getMediaId();
		}

		// Check if mediaid is set correctly
		if($array['mediaid'] == 'XXXXX' || $array['mediaid'] == 'test' ){	
			$result = 'Vul je Media ID in.';	
		}
		else
		{

			if( empty($array['amount']) ){
				$array['amount'] = 5;
			}	

			// Register files
			wp_register_script( 'daisycon_vakantie_js', '//developers.affiliateprogramma.eu/Zomervakantievergelijker/general.js');
			wp_register_script( 'daisycon_vakantie_slider_js', '//developers.affiliateprogramma.eu/Zomervakantievergelijker/jquery.nouislider.min.js' );
			wp_register_style('daisycon_vakantie_css', '//developers.affiliateprogramma.eu/Zomervakantievergelijker/style.css');
		
			// Add files to the head
			wp_enqueue_script( 'daisycon_vakantie_js' );
			wp_enqueue_script( 'daisycon_vakantie_slider_js' );
			wp_enqueue_style( 'daisycon_vakantie_css');
					
			// Add comparator
			$result = '<script type="text/javascript">
							daisyconSummerVacationDataMediaID='.$array['mediaid'].';
							daisyconSummerVacationDataSubid="'.$array['subid'].'";
							daisyconSummerVacationDataCountry="all";
							daisyconSummerVacationDataCountryShow="all";
							daisyconSummerVacationShowHeader="yes";
							daisyconSummerVacationShowOrderFilter="yes";
							daisyconSummerVacationDataPistenaam="all";
							daisyconSummerVacationDataCity="all";
							daisyconSummerVacationAmount="'.$array['amount'].'";
							daisyconSummerVacationDataMinHeight="300";
							daisyconSummerVacationDataMaxHeight="3500";
							daisyconSummerVacationDataAccommodation="all";
							daisyconSummerVacationDataShowFilter="yes";
							daisyconSummerVacationDataStars="all";
							daisyconSummerVacationButtonColor="FF8201";
							daisyconSummerVacationTitleColor="2B9AE2";
							daisyconSummerVacationShowPrograms="all";
						</script>';
			
		if(!empty( $array['title'] )){
			$result .= '	<h2>'.$array['title'].'</h2>';
		}
		
			$result .= '	<div id="daisyconVacationComparator"></div>';
		}
			
		return($result);
	}
}
?>