<?php
/* Daisycon prijsvergelijkers
 * File: boekhoud.php
 *
 * View for the shorttags to be displayed on the website
 *
 */

class generalDaisyconBoekhoud{

	public static function adminDaisyconBoekhoud()
	{
		// Load files
		wp_enqueue_style('daisycon.css', esc_url(plugins_url('../assets/css/daisycon.css', __FILE__)));
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/jquery-3.5.1.min.js', __FILE__)) . "\"></script>";
		echo "<script type=\"text/javascript\" src=\"" . esc_url(plugins_url('../assets/js/daisycon.js', __FILE__)) . "\"></script>";

		$sMediaId = generalDaisyconSettings::getMediaId();

		$output = '<div class="dc_box">
						<img class="dc_box_header" src="' . esc_url(plugins_url('../assets/img/header_accounting.png', __FILE__)) . '" alt="Boekhoudvergelijker" />
						<p class="dc_box_description">Daisycon heeft exclusief voor haar publishers een gratis boekhoudvergelijker ontwikkeld. De tool is eenvoudig te installeren en stelt de bezoekers van jouw website in staat een groot aanbod van boekhoudprogramma`s te vergelijken.</p>
						<p class="dc_box_description">Plak onderstaande shorttag in je blogpost of pagina en de vergelijker verschijnt direct op je website. <a href="https://www.daisycon.com/nl/vergelijkers/boekhoudsoftware-vergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a>.</p>
						<h1 class="dc_box_title">Standaardgebruik</h1>
						<p class="dc_box_description">Vul je <a href="https://faq-publisher.daisycon.com/hc/nl/articles/205765911-Waar-vind-ik-mijn-Media-ID-" target="_blank" title="Waar vind ik mijn Media ID?">Media ID</a> op de plek van XXXXX in. Je Media ID kun je ook opslaan, zodat hij standaard wordt ingevuld. Dit doe je bij het menu-item <a href="admin.php?page=daisycontools">Introductie</a>. Je kunt indien gewenst een <a href="https://faq-publisher.daisycon.com/hc/nl/articles/204894772-Hoe-stel-ik-een-Sub-ID-in-" target="_blank">Sub ID</a> invullen.</p>							
						<div class="dc_shorttag" onclick="daisycon_select_all(this)">
							[daisycon_boekhoud mediaid="' . $sMediaId . '" buttontext="Bekijken" subid=""]
						</div>
						<p class="dc_box_description dc_box_description--no_margin">Succes!</p>
					</div>';

		echo $output;
	}

	public static function frontDaisyconBoekhoud($array){

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

			if( empty($array['buttontext']) ){
				$array['buttontext'] = "Bekijken";
			}

			// Register files
			wp_register_script( 'daisycon_boekhoud_js', '//developers.affiliateprogramma.eu/boekhouding/general.js');

			// Add files to the head
			wp_enqueue_script( 'daisycon_boekhoud_js' );

			// Add comparator
			$result = '<link rel="stylesheet" type="text/css" href="//developers.affiliateprogramma.eu/boekhouding/css/default.css">
			<div class="daisyconBoekhoudComparator" 
							data-mediaid="'.$array['mediaid'].'"
							data-subid="'.$array['subid'].'"
							data-color="3291C9"
							data-button="FF8300"
							data-buttontext="'.$array['buttontext'].'"
							data-aanbieders-tonen=""
							data-boekhoud-opties-click=""
							data-package="daisyconBoekhoud_starter"
							data-selectedModule="1"
						>
						</div>';

			if(!empty( $array['title'] )){
				$result .= '	<h2>'.$array['title'].'</h2>';
			}
		}

		return($result);
	}
}
?>
