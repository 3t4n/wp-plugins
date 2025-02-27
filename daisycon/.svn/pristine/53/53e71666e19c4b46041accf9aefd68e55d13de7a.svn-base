<?php
/* Daisycon prijsvergelijkers
 * File: simonly.php
 *
 * View for the shorttags to be displayed on the website
 *
 */

class generalDaisyconSimonly{

	public static function adminDaisyconSimonly()
	{
		// Load files
		wp_enqueue_style('daisycon.css', esc_url(plugins_url('../assets/css/daisycon.css', __FILE__)));
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/jquery-3.5.1.min.js', __FILE__)) . "\"></script>";
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/daisycon.js', __FILE__)) . "\"></script>";

		$sMediaId = generalDaisyconSettings::getMediaId();

		$output = 	'<div class="dc_box">
						<img class="dc_box_header" src="https://static.daisycon.tools/sim-only/presentation/wp-plugin-daisycon-header.png" alt="Sim only-vergelijker" />
						<p class="dc_box_description">Daisycon heeft exclusief voor haar publishers een gratis Sim only-vergelijker ontwikkeld. De tool is eenvoudig te installeren en stelt de bezoekers van jouw website in staat verschillende sim only-abonnementen met elkaar te vergelijken.</p>
						<p class="dc_box_description">Plak onderstaande shorttag in je blogpost of pagina en de vergelijker verschijnt direct op je website. <a href="https://www.daisycon.com/nl/vergelijkers/sim-only-vergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a>.</p>
						<h1 class="dc_box_title">Standaardgebruik</h1>
						<p class="dc_box_description">Vul je <a href="https://faq-publisher.daisycon.com/hc/nl/articles/205765911-Waar-vind-ik-mijn-Media-ID-" target="_blank" title="Waar vind ik mijn Media ID?">Media ID</a> op de plek van XXXXX in. Je Media ID kun je ook opslaan, zodat hij standaard wordt ingevuld. Dit doe je bij het menu-item <a href="admin.php?page=daisycontools">Introductie</a>. Je kunt indien gewenst een <a href="https://faq-publisher.daisycon.com/hc/nl/articles/204894772-Hoe-stel-ik-een-Sub-ID-in-" target="_blank">Sub ID</a> invullen.</p>							
						<div class="dc_shorttag" onclick="daisycon_select_all(this)">
							[daisycon_simonly mediaid="' . $sMediaId . '" amount="10" subid=""]
						</div>					
						<h1 class="dc_box_title">Geavanceerd gebruik</h1>
						<div class="dc_shorttag" onclick="daisycon_select_all(this)">
							[daisycon_simonly mediaid="' . $sMediaId . '" amount="10" subid="" provider="all" duration="all" programs="all" minsms="0" maxsms="2500" minmin="0" maxmin="2500" minint="0" maxint="6500" minab="0" maxab="100"]
						</div>
						<h1 class="dc_box_title">Filtereigenschappen</h1>
						<p class="dc_box_description">Standaard worden de filters ingesteld op 0 t/m 2500 belminuten, 0 t/m 6500MB internet en 0 t/m 2500 SMS&#39;jes. Deze waarden komen overeen met onbeperkt. De min/max abonnement- en toestelprijs is niet ingevuld. Deze standaardwaarden kan je hieronder aanpassen. Door hiermee te spelen kan je je bezoekers direct de beste aanbieding tonen.<br>
							<div style="width:130px; float:left;"><u>SMS</u></div><div style="width:130px; float:left;">minsms - maxsms</div> =&nbsp; 0 t/m 2500<br/>
							<div style="width:130px; float:left;"><u>Minuten</u></div><div style="width:130px; float:left;">minmin - maxmin</div> =&nbsp; 0 t/m 2500<br/>
							<div style="width:130px; float:left;"><u>Internet</u></div><div style="width:130px; float:left;">minint - maxint</div> =&nbsp; 0 t/m 6500<br/>
							<div style="width:130px; float:left;"><u>Abonnementsprijs</u></div><div style="width:130px; float:left;">minab - maxab</div> =&nbsp; 0 t/m 100<br><br>
						</p>	
						<h1 class="dc_box_title">Titel van de Sim only-vergelijker</h1>
						<p class="dc_box_description">Met de optie <strong>title=""</strong> is het mogelijk om een titel boven de vergelijker te plaatsen. Standaard wordt deze tussen de h2 tags geplaatst. Deze optie is niet verplicht.</p>
						<h1 class="dc_box_title">Filters</h1>
						<p class="dc_box_description">Met de optie <strong>filters=""</strong> is het mogelijk om de filters uit te zetten. Gebruik <strong>filters="0"</strong> om de filters uit te zetten.</p>
						<h1 class="dc_box_title">Contractduur</h1>
						<p class="dc_box_description">Gebruik de onderstaande aantal maanden om in te vullen bij <strong>duration=""</strong>. Als je op zowel 12 als 24 maanden wilt zoeken gebruik je <strong>duration="all"</strong>.<br/><i>1, 12, 24</i></p>
						<h1 class="dc_box_title">Providers</h1>
						<p class="dc_box_description">Gebruik de onderstaande namen om in te vullen bij <strong>provider=""</strong>. Het is alleen mogelijk om &eacute;&eacute;n provider te selecteren. Als je alle providers wilt gebruik je <strong>provider="all"</strong>.</p>	
						<h1 class="dc_box_title">Programma&#39;s</h1>
						<p class="dc_box_description">Gebruik de onderstaande nummers om in te vullen bij <strong>programs=""</strong>. Het is mogelijk om meerdere programma&#39;s te selecteren, dit doe je door komma&#39;s te gebruiken zoals: <strong>programs="77,496,671"</strong>. Als je alle programma&#39;s wilt gebruik je <strong>programs="all"</strong>.</p>	
						<p class="dc_box_description dc_box_description--no_margin">Succes!</p>				
				</div>';

		echo $output;
	}


	public static function frontDaisyconSimonly($array)
	{
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
			// Register files
			wp_register_script( 'daisycon_simonly_js', '//developers.affiliateprogramma.eu/Simonlyvergelijker/general.js');
			wp_register_script( 'daisycon_simonly_slider_js', '//developers.affiliateprogramma.eu/Simonlyvergelijker/jquery.nouislider.min.js');
			wp_register_style('daisycon_simonly_css', '//developers.affiliateprogramma.eu/Simonlyvergelijker/style.css');
			wp_register_style('daisycon_simonly_slider_css', '//developers.affiliateprogramma.eu/Simonlyvergelijker/nouislider.fox.css');

			// Add files to the head
			wp_enqueue_script( 'daisycon_simonly_js' );
			wp_enqueue_script( 'daisycon_simonly_slider_js' );
			wp_enqueue_style( 'daisycon_simonly_css');
			wp_enqueue_style( 'daisycon_simonly_slider_css' );

			if( empty($array['subid']) ){
				$array['subid'] = '';
			}

			if( empty($array['amount']) ){
				$array['amount'] = 10;
			}

			if( empty($array['provider']) ){
				$array['provider'] = 'all';
			}

			if( empty($array['duration']) ){
				$array['duration'] = 'all';
			}

			if( empty($array['programs']) ){
				$array['programs'] = 'all';
			}

			if( empty($array['minsms']) ){
				$array['minsms'] = 0;
			}

			if( !isset($array['maxsms']) ){
				$array['maxsms'] = 2500;
			}

			if( !isset($array['minmin']) ){
				$array['minmin'] = 0;
			}

			if( !isset($array['maxmin']) ){
				$array['maxmin'] = 2500;
			}

			if( !isset($array['minint']) ){
				$array['minint'] = 0;
			}

			if( !isset($array['maxint']) ){
				$array['maxint'] = 6500;
			}

			if( !isset($array['minab']) ){
				$array['minab'] = 0;
			}

			if( !isset($array['maxab']) ){
				$array['maxab'] = 100;
			}

			if( !isset($array['filters']) ){
				$array['filters'] = 'true';
			}else{
				if($array['filters'] == 1){
					$array['filters'] = 'true';
				}elseif($array['filters'] == 0){
					$array['filters'] = 'false';
				}
			}

			$result = '';
			if(!empty( $array['title'] )){
				$result .= '	<h2>'.$array['title'].'</h2>';
			}

			// Add comparator
			$result .= '
				<div class="daisyconSimonlyComperatorNew" style="background-color:#FFFFFF !important;" data-daisyconSimonlyMediaId="'.$array['mediaid'].'" data-daisyconSimonlySubId="'.$array['subid'].'" data-daisyconSimonlyLimit="'.$array['amount'].'" data-daisyconSimonlyProviders="'.$array['provider'].'" data-daisyconSimonlyDuration="'.$array['duration'].'" data-daisyconSimonlyPrograms="'.$array['programs'].'" data-daisyconSimonlyActionColor="2B9AE2" data-daisyconSimonlyButton="Bekijken" data-daisyconFilterShow="'.$array['filters'].'" data-daisyconSimonlyMinAb="'.$array['minab'].'" data-daisyconSimonlyMaxAb="'.$array['maxab'].'" data-daisyconSimonlyMinMin="'.$array['minmin'].'" data-daisyconSimonlyMaxMin="'.$array['maxmin'].'" data-daisyconSimonlyMinSms="'.$array['minsms'].'" data-daisyconSimonlyMaxSms="'.$array['maxsms'].'" data-daisyconSimonlyMinInternet="'.$array['minint'].'" data-daisyconSimonlyMaxInternet="'.$array['maxint'].'"></div>
			';

		}

		return($result);
	}
}
?>
