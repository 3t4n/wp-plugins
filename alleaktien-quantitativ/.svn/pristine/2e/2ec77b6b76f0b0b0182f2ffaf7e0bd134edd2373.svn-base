<?php
/*
	Plugin Name: Eulerpool Research Systems
	Plugin URI: https://www.eulerpool.com
	Description: Interaktive Aktien-Charts zu Kurs, Umsatz, EBIT, Gewinn, Dividende, Dividendenrendite, Ausschüttungsquote, Bewertung, Anzahl Aktien und vielen weiteren Aktien-Kennzahlen.
	Author: Eulerpool Research Systems
	Version: 4.0.1
	Author URI: https://www.eulerpool.com/imprint
*/

// Add the shortcode
add_shortcode('aaq', 'aaq_fundamentals' );
add_shortcode('aaq-fundamentals', 'aaq_fundamentals' );
add_shortcode('eu', 'aaq_fundamentals' );

// Execute the shortcode with $atts arguments
function aaq_fundamentals($atts) {

	// normalize attribute keys, lowercase
	$atts = array_change_key_case((array)$atts, CASE_LOWER);

	// override default attributes with user attributes
  $aaq_atts = shortcode_atts([
			'isin' => 'US0378331005',
			'chart' => 'RevenueChart',], $atts, '');

	$isin = $aaq_atts['isin'];
	$chart = $aaq_atts['chart'];

	// make main html output
	$sourceLabel = "<div class='aaq-source eulerpool'>
		<a style='text-decoration: none !important;border: none;margin-top:-.5rem;display: block;text-align: right;' href='https://eulerpool.com/$isin' target='_blank' rel='noopener' title='Eulerpool Research Systems'><img src='https://eulerpool.com/meta/eulerpool-black.svg' style='
    height: 1rem;'></a>
	</div>";

	$aaqIframe = "<iframe class='eulerpool aaq-chart aaq-isin-$isin aaq-chart-$chart'
	frameborder='0'
	scrolling='no'
	width='800'
	height='550'
	style='width:100%'
	src='https://eulerpool.com/chart-api/$isin/$chart'></iframe>";

	return "<div class='aaq-plugin' style='width:inherit;margin:auto'>" . $aaqIframe . $sourceLabel . "</div>";
}

