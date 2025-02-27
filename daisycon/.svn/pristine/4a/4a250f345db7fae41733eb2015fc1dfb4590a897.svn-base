<?php 
/* Daisycon prijsvergelijkers
 * File: wintersport.php
 * 
 * View for the shorttags to be displayed on the website
 * 
 */

class generalWinter{

	public function adminWintersport(){
		
		global $wpdb;

		$cMediaid = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."daisycon_tools");
		
		if (count($cMediaid) == 0){
			$mediaid = 'XXXXX';
		}else{
			$mediaid = $cMediaid->media_id;
		}
		
		$output = '
					<script type="text/javascript">
							function select_all(el) {
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
							
							jQuery.ajax
							({
								url: "//developers.affiliateprogramma.eu/wordpressplugin/json.php?method=insertMenuVergelijker&website='.base64_encode($_SERVER['SERVER_NAME']).'&mediaid='.$mediaid.'&item=wintersport&jsoncallback=?",
								dataType: "jsonp",
								cache: false,
								success: function(html)
								{
								} 
							});
					</script>
		';
		
		$output .= 	'	<div style="width:900px;">
						<img src="//images.daisycon.net/daisycon_website/daisyconwebsite/img/layout/blog/Wintersportvergelijker_paxz.gif" alt="" title="" style="float:left;margin-right:20px;" /> <h1>Daisycon Wintersporttool</h1>
						Daisycon heeft exclusief voor haar publishers een gratis wintersporttool ontwikkeld. De tool is eenvoudig te installeren en stelt de bezoekers van jouw website in staat een groot aanbod aan wintersportvakanties te bekijken. 
						<br/><br/>
						Plak onderstaande shorttag in je blogpost of pagina en de vergelijker verschijnt direct op je website. <a href="http://vergelijkers.daisycon.com/wintersporttool/" target="_blank">Klik hier om de demowebsite te bekijken</a>.
						<br/><br/>
						<h1>Standaardgebruik</h1>
						Vul je <a href="http://www.daisycon.com/nl/faq/publishers/affiliate_marketing/waar_vind_ik_mijn_media_id/" target="_blank" title="Waar vind ik mijn Media ID?">Media ID</a> op de plek van XXXXX in. Je Media ID kun je ook opslaan, zodat hij standaard wordt ingevuld. Dit doe je bij het menu-item <a href="admin.php?page=daisycontools">Introductie</a>. Bij amount vul je het aantal resultaten in dat je wil tonen en je kunt indien gewenst een <a href="http://www.daisycon.com/nl/blog/hoe_gebruik_je_sub_ids/" target="_blank">Sub ID</a> invullen.
						<br/><br/>
							
						<div onclick="select_all(this)" style="cursor:pointer;width:800px;text-align: center; border: 1px solid #cecece; background: #f3f3f3; color: #333333; padding: 5px; margin-bottom: 10px; border-radius: 5px;" >	
							[daisycon_winter mediaid="'.$mediaid.'" amount="5" subid=""]
						</div>					
						
						<p>&nbsp;</p>
					
						<h1>Geavanceerd gebruik</h1>
						Geavanceerd zal nog worden aangevuld. Gebruik de <a href="http://www.daisycon.com/nl/tools/wintersporttool/" target="_blank">generator</a> als je meer opties wil hebben.';
						
//		$output .= '
//								
//						<br/>
//						
//						<h3>Toon filters van de vakantievergelijker</h3>
//						Gebruik de onderstaande opties om in te vullen bij <strong>filters=""</strong>, om de filters wel of niet te laten weergeven.<br/>
//						<i>ja, nee</i>
//						<br/><br/>	
//						
//						<h3>Land(en) tonen</h3>
//						Gebruik de onderstaande opties om in te vullen bij <strong>landen=""</strong>, om de filters wel of niet te laten weergeven.<br/>
//						<i>NOG INVULLEN</i>
//						<br/><br/>	
//						
//						<h3>Toon overige landen</h3>
//						Gebruik de onderstaande opties om in te vullen bij <strong>overigelanden=""</strong>, om de overige landen wel of niet weer te laten geven.<br/>
//						<i>ja, nee</i>
//						<br/><br/>	
//						
//						<h3>Selecteer specifiek gebied/dorp</h3>
//						Gebruik de onderstaande opties om in te vullen bij <strong>filters=""</strong>, om de filters wel of niet te laten weergeven.<br/>
//						<i>NOG INVULLEN</i>
//						<br/><br/>	
//						
//						<h3>Aanbevolen voor</h3>
//						Gebruik de onderstaande opties om in te vullen bij <strong>beoordeling=""</strong>. Het is mogelijk om bijvoorbeeld meerdere opties te selecteren: <strong>beoordeling="beginners,gevorderden"</strong>. Als je alles wilt selecteren gebruik je <strong>beoordeling="all"</strong>.<br/>
//						<i>beginners, gevorderden, vergevorderden, kindvriendelijk, lageprijs, apresski</i>
//						<br/><br/>	
//						
//						<h3>Omvang skigebied</h3>
//						Gebruik de onderstaande opties om in te vullen bij <strong>skigebied=""</strong>, om de filters wel of niet te laten weergeven. Als je alles wilt selecteren gebruik je <strong>skigebied="all"</strong>.<br/>
//						<i>licht, medium, zwaar</i>
//						<br/><br/>	
//						
//						<h3>Activiteiten</h3>
//						Gebruik de onderstaande opties om in te vullen bij <strong>activiteiten=""</strong>. Om meerdere activiteiten te selecteren gebruik je bijvoorbeeld <strong>activiteiten="langlaufen,wandelen"</strong>. Als je alles wilt selecteren gebruik je <strong>activiteiten="all"</strong>.<br/>
//						<i>langlaufen, wandelen, snowboarden</i>
//						<br/><br/>	
//						
//						<h3>Accomodatietype</h3>
//						Gebruik &eacute;&eacute;n van de onderstaande opties om in te vullen bij <strong>accommodatie=""</strong>.<br/>
//						<i>chalet, hotel, residence, appartement, pension</i>
//						<br/><br/>
//						
//						<h3>Sneeuwzekerheid</h3>
//						Gebruik &eacute;&eacute;n van de opties om in te vullen bij <strong>sneeuwzekerheid=""</strong>.<br/>
//						<i>januari, februari, maart, april, mei, juni, juli, augustus, september, oktober, november, december</i>
//						<br/><br/>
//						
//						<h3>Sorteervolgorde</h3>
//						Gebruik de onderstaande opties om in te vullen bij <strong>sort=""</strong>.<br/>
//						<i>pistegrootte-desc, pistegrootte-asc, prijs-desc, prijs-asc, alfabet-desc, alfabet-asc, afstand-desc, afstand-asc</i>
//						<br/><br/>
//												
//						<h3>Titel van de zorgverzekeringvergelijker</h3>
//						Met de optie <strong>title=""</strong> is het mogelijk om een titel boven de vergelijker te plaatsen. Standaard wordt deze tussen de h2 tags geplaatst. Deze optie is niet verplicht.
//						<br/><br/>	
//						
//						';
				
		echo $output;
	}
	
	public function winterAdv($array){

		if($array['mediaid'] == 'XXXXX' || $array['mediaid'] == 'test' || empty($array['mediaid']) ){	
			$result = 'Vul je Media ID in.';	
		}
		else
		{
			// Register jQuery files
			wp_register_script( 'wintersport', '//developers.affiliateprogramma.eu/Wintersportvergelijker/general.js');
			wp_register_script( 'ui', '//developers.affiliateprogramma.eu/Wintersportvergelijker/jquery.nouislider.min.js' );
			
			// Register stylesheet files
			wp_register_style('stylesheet_winter', '//developers.affiliateprogramma.eu/Wintersportvergelijker/style.css');
		
			// Add all files to head
			wp_enqueue_script( 'wintersport' );
			wp_enqueue_script( 'ui' );
			wp_enqueue_style( 'stylesheet_winter');
			
			if( empty($array['amount']) ){
				$array['amount'] = 5;
			}
			
			if( empty($array['landen']) ){
				$array['landen'] = 'all';
			}
			
			if( empty($array['overigelanden']) ){
				$array['overigelanden'] = 'all';
			}
			
			if( empty($array['pistenaam']) ){
				$array['pistenaam'] = 'all';
			}
			
			if( empty($array['stad']) ){
				$array['stad'] = 'all';
			}
			
			if( empty($array['beoordeling']) ){
				$array['beoordeling'] = 'all';
			}
			
			if( empty($array['skigebied']) ){
				$array['skigebied'] = 'all';
			}
			
			if( empty($array['activiteiten']) ){
				$array['activiteiten'] = 'all';
			}
			
			if( empty($array['minprijs']) ){
				$array['minprijs'] = 0;
			}
			
			if( empty($array['maxprijs']) ){
				$array['maxprijs'] = 2500;
			}
			
			if( empty($array['accommodatie']) ){
				$array['accommodatie'] = 'all';
			}
			
			if( empty($array['sneeuwzekerheid']) ){
				$array['sneeuwzekerheid'] = 'all';
			}
			
			if( empty($array['sort']) ){
				$array['sort'] = 'all';
			}
			
			if( empty($array['filters']) ){
				$array['filters'] = 'ja';
			}
			
			// Add comparator
			$result = '<script type="text/javascript">
							daisyconWinterVacationDataMediaID='.$array['mediaid'].';
							daisyconWinterVacationDataSubid="'.$array['subid'].'";
							daisyconWinterVacationDataCountry="'.$array['landen'].'";
							daisyconWinterVacationDataCountryShow="'.$array['overigelanden'].'";
							daisyconWinterVacationDataPistenaam="'.$array['pistenaam'].'";
							daisyconWinterVacationDataCity="'.$array['stad'].'";
							daisyconWinterVacationDataBeoordeling="'.$array['beoordeling'].'";
							daisyconWinterVacationDataPiste="'.$array['skigebied'].'";
							daisyconWinterVacationDataActivity="'.$array['activiteiten'].'";
							daisyconWinterVacationAmount="'.$array['amount'].'";
							daisyconWinterVacationDataMinHeight="'.$array['minprijs'].'";
							daisyconWinterVacationDataMaxHeight="'.$array['maxprijs'].'";
							daisyconWinterVacationDataAccommodation="'.$array['accomodatie'].'";
							daisyconWinterVacationDataSneeuwzekerheid="'.$array['sneeuwzekerheid'].'";
							daisyconWinterVacationDataOrderBy="'.$array['sort'].'";
							daisyconWinterVacationDataShowFilter="'.$array['filters'].'";
							daisyconWinterVacationColor="CBDEED";
							daisyconWinterVacationBorderColor="00A6DA";
							daisyconWinterVacationButtonColor="00ACD9";
							daisyconWinterVacationButtonActionColor="FFA516";
							daisyconWinterVacationButtonTextColor="FFFFFF";
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