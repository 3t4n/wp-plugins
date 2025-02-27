<?php
/* Daisycon prisjvergelijkers
 * File: telecom.php
 *
 * View for the shorttags to be displayed on the website
 *
 */

class generalDaisyconTelecom{

	public static function adminDaisyconTelecom()
	{
		// Load files
		wp_enqueue_style('daisycon.css', esc_url(plugins_url('../assets/css/daisycon.css', __FILE__)));
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/jquery-3.5.1.min.js', __FILE__)) . "\"></script>";
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/daisycon.js', __FILE__)) . "\"></script>";

		$sMediaId = generalDaisyconSettings::getMediaId();

		$output = 	'<div class="dc_box">
						<img class="dc_box_header" src="https://static.daisycon.tools/telecom/presentation/wp-plugin-daisycon-header.png" alt="Telecomvergelijker" />
						<p class="dc_box_description">Daisycon heeft exclusief voor haar publishers een gratis telecomvergelijker ontwikkeld. De tool is eenvoudig te installeren en stelt de bezoekers van jouw website in staat verschillende telefoonabonnementen met elkaar te vergelijken.</p>
						<p class="dc_box_description">Plak onderstaande shorttag in je blogpost of pagina en de vergelijker verschijnt direct op je website. <a href="https://www.daisycon.com/nl/vergelijkers/telecomvergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a>.</p>
						<h1 class="dc_box_title">Standaardgebruik</h1>
						<p class="dc_box_description">Vul je <a href="https://faq-publisher.daisycon.com/hc/nl/articles/205765911-Waar-vind-ik-mijn-Media-ID-" target="_blank" title="Waar vind ik mijn Media ID?">Media ID</a> op de plek van XXXXX in. Je Media ID kun je ook opslaan, zodat hij standaard wordt ingevuld. Dit doe je bij het menu-item <a href="admin.php?page=daisycontools">Introductie</a>. Je kunt indien gewenst een <a href="https://faq-publisher.daisycon.com/hc/nl/articles/204894772-Hoe-stel-ik-een-Sub-ID-in-" target="_blank">Sub ID</a> invullen.</p>							
						<div class="dc_shorttag" onclick="daisycon_select_all(this)">
							[daisycon_telecom mediaid="' . $sMediaId . '" amount="10" subid=""]
						</div>					
						<h1 class="dc_box_title">Geavanceerd gebruik</h1>
						<div class="dc_shorttag" onclick="daisycon_select_all(this)">
							[daisycon_telecom mediaid="' . $sMediaId . '" amount="10" subid="" provider="0" mobiles="all" duration="24" programs="all" minmob="0" maxmob="1000" minmin="100" maxmin="500" minint="200" maxint="5000" minab="0" maxab="100"]
						</div>
						<h1 class="dc_box_title">Filtereigenschappen</h1>
						<p class="dc_box_description">Standaard worden de filters ingesteld op 100 belminuten en 200MB internet. De min/max abonnement- en toestelprijs is niet ingevuld. Deze standaardwaarden kan je hieronder aanpassen. Door hiermee te spelen kan je je bezoekers direct de beste aanbieding tonen. Ook voorkom je dat je b.v. een iPhone abonnement zonder internet vergelijkt.<br/>
							<div style="width:130px; float:left;"><u>Toestelprijs</u></div><div style="width:130px; float:left;">minmob - maxmob</div> =&nbsp; 0 t/m 1000<br/>
							<div style="width:130px; float:left;"><u>Minuten</u></div><div style="width:130px; float:left;">minmin - maxmin</div> =&nbsp; 0 t/m 2000<br/>
							<div style="width:130px; float:left;"><u>Internet</u></div><div style="width:130px; float:left;">minint - maxint</div> =&nbsp; 0 t/m 6000<br/>
							<div style="width:130px; float:left;"><u>Abonnementsprijs</u></div><div style="width:130px; float:left;">minab - maxab</div> =&nbsp; 0 t/m 250<br><br>
						</p>	
						<h1 class="dc_box_title">Filters</h1>
						<p class="dc_box_description">Met de optie <strong>filters=""</strong> is het mogelijk om de filters uit te zetten. Gebruik <strong>filters="0"</strong> om de filters uit te zetten.</p>
						<h1 class="dc_box_title">Titel van de telecomvergelijker</h1>
						<p class="dc_box_description">Met de optie <strong>title=""</strong> is het mogelijk om een titel boven de vergelijker te plaatsen. Standaard wordt deze tussen de h2 tags geplaatst. Deze optie is niet verplicht.</p>
						<h1 class="dc_box_title">Contractduur</h1>
						<p class="dc_box_description">Gebruik de onderstaande aantal maanden om in te vullen bij <strong>duration=""</strong>. Als je op zowel 12 als 24 maanden wilt zoeken gebruik je <strong>duration="0"</strong> en anders vul je <strong>12</strong> of <strong>24</strong> in in plaats van de <strong>0</strong>.</p>
						<h1 class="dc_box_title">Providers</h1>
						<p class="dc_box_description">Gebruik de onderstaande namen om in te vullen bij <strong>provider=""</strong>. Het is alleen mogelijk om &eacute;&eacute;n provider te selecteren. Als je alle providers wilt gebruik je <strong>provider="0"</strong>.</p>
						<h1 class="dc_box_title">Merken</h1>
						<p class="dc_box_description">Gebruik de onderstaande namen om in te vullen bij <strong>brands=""</strong>. Het is mogelijk om meerdere merken te selecteren, dit doe je door komma&#39;s te gebruiken zoals: <strong>brands="Apple,HTC,Samsung"</strong>. Als je alle merken wilt gebruik je <strong>brands="all"</strong>.</p>
						<h1 class="dc_box_title">Programma&#39;s</h1>
						<p class="dc_box_description">Gebruik de onderstaande nummers om in te vullen bij <strong>programs=""</strong>. Het is mogelijk om meerdere programma&#39;s te selecteren, dit doe je door komma&#39;s te gebruiken zoals: <strong>programs="77,496,1783"</strong>. Als je alle programma&#39;s wilt gebruik je <strong>programs="all"</strong>.</p>
						<h1 class="dc_box_title">Mobiele telefoons</h1>
						<p class="dc_box_description">Gebruik de onderstaande nummers om in te vullen bij <strong>mobiles=""</strong>. Het is mogelijk om meerdere telefoons te selecteren, dit doe je door komma&#39;s te gebruiken zoals: <strong>mobiles="159,289,15"</strong>. Als je alle mobiele telefoons wilt gebruik je <strong>mobiles="all"</strong>.</p>
						<p class="dc_box_description dc_box_description--no_margin">Succes!</p>
				</div>';

		echo $output;
	}

	public static function frontDaisyconTelecom($array){

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

			if( empty($array['subid']) ){
				$array['subid'] = '';
			}

			if( empty($array['amount']) ){
				$array['amount'] = 10;
			}

			if( empty($array['provider']) ){
				$array['provider'] = 0;
			}

			if( empty($array['duration']) ){
				$array['duration'] = 24;
			}

			if( empty($array['programs']) ){
				$array['programs'] = 'all';
			}

			if( !isset($array['minmob']) ){
				$array['minmob'] = 0;
			}

			if( !isset($array['maxmob']) ){
				$array['maxmob'] = 1000;
			}

			if( !isset($array['minmin']) ){
				$array['minmin'] = 100;
			}

			if( !isset($array['filters']) ){
				$array['filters'] = 1;
			}

			if( !isset($array['maxmin']) ){
				$array['maxmin'] = 500;
			}

			if( !isset($array['minint']) ){
				$array['minint'] = 200;
			}

			if( !isset($array['maxint']) ){
				$array['maxint'] = 5000;
			}

			if( !isset($array['minab']) ){
				$array['minab'] = 0;
			}

			if( !isset($array['maxab']) ){
				$array['maxab'] = 100;
			}

			if( empty($array['mobiles']) ){
				$array['mobiles'] = 'all';
			}

			// Register files
			wp_register_script( 'daisycon_telecom_js', '//developers.affiliateprogramma.eu/mobielvergelijker/general.js');
			wp_register_script( 'daisycon_telecom_slider_js', '//developers.affiliateprogramma.eu/mobielvergelijker/jquery.nouislider.min.js');
			wp_register_style('daisycon_telecom_css', '//developers.affiliateprogramma.eu/mobielvergelijker/example.min.css');
			wp_register_style('daisycon_telecom_slider_css', '//developers.affiliateprogramma.eu/mobielvergelijker/nouislider.fox.css');

			// Add files to the head
			wp_enqueue_script( 'daisycon_telecom_js' );
			wp_enqueue_script( 'daisycon_telecom_slider_js' );
			wp_enqueue_style( 'daisycon_telecom_css');
			wp_enqueue_style( 'daisycon_telecom_slider_css' );

			$result = '';
			if(!empty( $array['title'] )){
				$result .= '	<h2>'.$array['title'].'</h2>';
			}

			$result .= '<div class="mobile-comparator-wrapper" style="background-color:#FFFFFF !important;" data-mediaid="'.$array['mediaid'].'" data-subid="'.$array['subid'].'" data-entry="'.$array['amount'].'" data-provider="'.$array['provider'].'" data-duration="'.$array['duration'].'" data-renewal="0" data-filter_view="'.$array['filters'].'" data-col="1111111" data-programs="'.$array['programs'].'" data-background_price="E2F0FB" data-button_text="Bekijken" data-button_color="FF8300" data-button_hover="FF9E3D" data-button_textcolor="FFFFFF" data-font="Arial" data-minMob="'.$array['minmob'].'" data-maxMob="'.$array['maxmob'].'" data-minMin="'.$array['minmin'].'" data-maxMin="'.$array['maxmin'].'" data-minInt="'.$array['minint'].'" data-maxInt="'.$array['maxint'].'" data-minAb="'.$array['minab'].'" data-maxAb="'.$array['maxab'].'" data-mobiles="'.$array['mobiles'].'" data-v="2"></div>';
		}

		return($result);
	}
}
?>
