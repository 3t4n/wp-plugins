<?php
/* Daisycon prijsvergelijkers
 * File: uitvaart.php
 *
 * View for the shorttags to be displayed on the website
 *
 */

class generalDaisyconUitvaart{

	public static function adminDaisyconUitvaart()
	{
		// Load files
		wp_enqueue_style('daisycon.css', esc_url(plugins_url('../assets/css/daisycon.css', __FILE__)));
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/jquery-3.5.1.min.js', __FILE__)) . "\"></script>";
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/daisycon.js', __FILE__)) . "\"></script>";

		$sMediaId = generalDaisyconSettings::getMediaId();

		$output = '<div class="dc_box">
						<img class="dc_box_header" src="' . esc_url(plugins_url('../assets/img/header_funeral.png', __FILE__)) . '" alt="Uitvaartkostentool" />
						<p class="dc_box_description">Daisycon heeft exclusief voor haar publishers een gratis Uitvaartkostentool ontwikkeld.</p>
						<p class="dc_box_description">Plak onderstaande shorttag in je blogpost of pagina en de vergelijker verschijnt direct op je website. <a href="https://www.daisycon.com/nl/vergelijkers/uitvaartkostentool/" target="_blank">Klik hier om de demowebsite te bekijken</a>.</p>
						<h1 class="dc_box_title">Standaardgebruik</h1>
						<p class="dc_box_description">Vul je <a href="https://faq-publisher.daisycon.com/hc/nl/articles/205765911-Waar-vind-ik-mijn-Media-ID-" target="_blank" title="Waar vind ik mijn Media ID?">Media ID</a> op de plek van XXXXX in. Je Media ID kun je ook opslaan, zodat hij standaard wordt ingevuld. Dit doe je bij het menu-item <a href="admin.php?page=daisycontools">Introductie</a>. Je kunt indien gewenst een <a href="https://faq-publisher.daisycon.com/hc/nl/articles/204894772-Hoe-stel-ik-een-Sub-ID-in-" target="_blank">Sub ID</a> invullen.</p>							
						<div class="dc_shorttag" onclick="daisycon_select_all(this)">
							[daisycon_uitvaart mediaid="' . $sMediaId . '" subid=""]
						</div>			
						<h1 class="dc_box_title">Titel van de uitvaartkostentool</h1>
						<p class="dc_box_description">Met de optie <strong>title=""</strong> is het mogelijk om een titel boven de vergelijker te plaatsen. Standaard wordt deze tussen de h2 tags geplaatst. Deze optie is niet verplicht.</p>
						<p class="dc_box_description dc_box_description--no_margin">Succes!</p>
					</div>';

		echo $output;
	}

	public static function frontDaisyconUitvaart($array){

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
			wp_register_script( 'daisycon_uitvaart_js', '//developers.affiliateprogramma.eu/uitvaart/general.js');
			wp_register_style('daisycon_uitvaart_css', '//developers.affiliateprogramma.eu/uitvaart/style.css');

			// Add files to the head
			wp_enqueue_script( 'daisycon_uitvaart_js' );
			wp_enqueue_style( 'daisycon_uitvaart_css');

			if( empty($array['subid']) ){
				$array['subid'] = '';
			}

			$result = '';
			if(!empty( $array['title'] )){
				$result = '	<h2>'.$array['title'].'</h2>';
			}

			$result .= '<div class="daisyconUitvaartComperator" data-mediaID="'.$array['mediaid'].'" data-subid="'.$array['subid'].'" data-programs="all" data-buttonColor="00AEEF"></div>';
		}

		return($result);
	}
}
?>
