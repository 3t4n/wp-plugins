<?php
/**
 * Plugin Name: Flaver CBD Calculator
 * Description: Shortcode: [flaver-cbd-calculator] Displays a simple vaping CBD calculator on your webpage.
 * Version: 2.0
 * Text Domain: flaver-cbd-calculator
 * Author: Andy Blank
 * Author URI: https://www.flaver.co.uk/flaver-cbd-calculator-plugin
 */
 
 function flavercbdcalculator($atts) {

	 
  return '


<div class="flaver-calc">

<div class="flaver-calc-section">
	<h3>1. CBD Additive Information</h3>
	<h4>Volume / Bottle Size of CBD Purchased (ml)</h4>
	<input type="number" id="flaver_cbd_vol" min="1" max="1000" value="30" onChange="flaver_calculate_cbd_result();">
</div>

<div class="flaver-calc-section">
	<h4>Strength of CBD Purchased (mg)</h4>
	<input type="number" id="flaver_cbd_mg" min="1" max="3000" value="200" onChange="flaver_calculate_cbd_result();">
	<p>Your CBD additive contains <span id="flaver_cbd_mg_per_ml"></span></p>
<hr>
</div>


<div class="flaver-calc-section">
	<h3>2. How Much CBD do you Require Each Day (mg)?</h3>
	<input type="number" id="flaver_cbd_daily" value="20" min="1" onChange="flaver_calculate_cbd_result();">
</div>

<div class="flaver-calc-section">
	<h3>Your CBD Calculation</h3>
	<h4 class="flaver-calc-result"><span id="flaver_result_ml"></span><span id="flaver_result_drops"></span></h4>
	<p><span id="flaver_approx_doses"></span><span id="flaver_ml_bottle"></span></p>
</div>


</div>

<script>
 function flaver_calculate_cbd_result() {
	var flaver_cbd_vol = parseInt(document.getElementById("flaver_cbd_vol").value);
	var flaver_cbd_mg = parseInt(document.getElementById("flaver_cbd_mg").value);
	var flaver_cbd_daily = parseInt(document.getElementById("flaver_cbd_daily").value);
							
	document.getElementById("flaver_cbd_mg_per_ml").innerText = (flaver_cbd_mg / flaver_cbd_vol).toFixed(2) + " mg of CBD per ml.";
	document.getElementById("flaver_result_ml").innerText = "Add " + (flaver_cbd_daily / (flaver_cbd_mg / flaver_cbd_vol)).toFixed(2) + "ml ";
	document.getElementById("flaver_result_drops").innerText = "(" + ((flaver_cbd_daily / (flaver_cbd_mg / flaver_cbd_vol)) * 20).toFixed(0) + " drops) to your regular vape liquid.";
	document.getElementById("flaver_approx_doses").innerText = "You should get " +  (flaver_cbd_vol / (flaver_cbd_daily / (flaver_cbd_mg / flaver_cbd_vol))).toFixed(0) + " doses from a ";
	document.getElementById("flaver_ml_bottle").innerText = (flaver_cbd_vol).toFixed(0) + "ml bottle.";
	}
	
	window.flaver_calculate_cbd_result();
</script>

';
}
 
add_shortcode('flaver-cbd-calculator', 'flavercbdcalculator');


