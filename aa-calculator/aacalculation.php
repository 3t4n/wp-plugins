<?php 

/**
 * Plugin Name: AA Cash Calculator
 * Plugin URI: http://wordpress.org/plugins/aa-cash-calculator/
 * Description: This is a cross browser supported audio player with playlist and shortcode enriched. This plugin is developed by Double A. For shortcode use [aaplayer src='http://yoursite.com/example.mp3'] , for playlist please read readme.txt . It is the in plugin folder.
 * Version: 1.0
 * Author: aaextention
 * Author URI: http://webdesigncr3ator.com
 * Support Email : contact2us.aa@gmail.com
 * License: GPL2
 **/

//register script and style

function reg_script_and_style() {
	wp_enqueue_style(
		'stylefile',
		plugins_url( '/style.css' , __FILE__ )
	);
	
	
}

//adding into header
add_action( 'wp_enqueue_scripts', 'reg_script_and_style' );	
	
	
	function aa_view_window($atts){
		  $a = shortcode_atts( array(
				'page_id' => ''
			), $atts );

	
	
	if(!isset($_GET['invoice'],$_GET['each_day_discount'],$_GET['how_many_paid'],$_GET['how_much_want'])){
	
	
		echo '
		<div class="calculator">
		<h2>Choose Your Sale Parameters</h2>
            <p>This section can help you understand the auction price settings</p>
			<form id="aa_calculate" action="?p='.$a['page_id'].'" method="get">
				<div class="float-left"> <p class="body-text-bold black">Your Invoice Value</p></div>
				<div class="float-right">
				<p class="body-text-bold black">
				<input type="text" id="InvoiceValue"  name="invoice"/>
				<input type="hidden" name="p" value="'.$a['page_id'].'"/>
				 </p>
            </div>
			<div class="clearSplit"></div>
			<div class="row calculator-input">
			  <div class="calculator-input-element">
				<p>What is the discount rate you are willing to pay each 30 days? (max 8% per 30 days)</p>
			  </div>
			  <div class="calculator-input-value">
				<input type="text" name="each_day_discount"/>
				<span class="percent">%</span>
				</div>
				 <div class="calculator-input-element">
				 <p>How many days until your invoice is due to be paid? (maximum 180)</p>
				 </div>
				<div class="calculator-input-value"><input type="text" name="how_many_paid"/></div>
				 <div class="calculator-input-element">
				 <p>How much do you want now?<br/>
				(maximum 80.00%)</p>
				</div>
				<div class="calculator-input-value"><input type="text" name="how_much_want"/><span class="percent">%</span>	</div>	
<div class="clearSplit"></div>				
		<div class="form-submit">		
				<input class="btn btn-primary btn-lg calculateButton trackableCalculate" type="submit" value="Calculate"/>
				
		</div>
		<div class="clearSplit"></div>			
			</form>
		</div>
		';
		}else{
			$invest = $_GET['invoice'];
			$each_day_discount = (($_GET['invoice']/100)*2);
			$each_day_discount_double =($_GET['invoice']/100);
			$how_much_want = (($_GET['how_much_want'])/100)*$_GET['invoice'];			
			$advanced_upfront =($how_much_want - $each_day_discount_double);
			$upfront_paid =($invest-($each_day_discount+$each_day_discount_double + $advanced_upfront));
			$result = $advanced_upfront+$upfront_paid;
			
			echo '<div class="calculator-result">';
			echo '<h2>Cash You Receive</h2>';
			echo '<div class="calculator-input-element"><p>Invoice Total :</p></div><div class="calculator-input-value">'.$invest.'</div>';
			echo '<div class="clearSplit"></div>';
			echo '<h5>Fees for this transaction</h5>';
			echo '<div class="calculator-input-element"><p>Maximum Fee : </p></div><div class="calculator-input-value">'.$each_day_discount.'</div>';
			echo '<div class="calculator-input-element"><p>Invoice discount amount : </p></div><div class="calculator-input-value">'.$each_day_discount_double.'</div>';
			echo '<div class="clearSplit"></div>';
			echo '<h5>What you will receive</h5>';
			echo '<div class="calculator-input-element"><p>Your advanced upfront : </p></div><div class="calculator-input-value">'.$advanced_upfront.'</div>';
			echo '<div class="calculator-input-element"><p>Paid to you on settlement : </p></div><div class="calculator-input-value">'.$upfront_paid.'</div>';
			
			echo '<div class="clearSplit"></div>';
			echo '<hr>';
			echo '<div class="calculator-input-element"><h5 class="result-h">YOUR MONEY</h5></div><div class="calculator-input-value-result"><p class="calculation-result-value">'.($invest-($each_day_discount+$each_day_discount_double)).'</p></div>';
			echo '</div">';
		
		}
		
		
	}
	
	add_shortcode( 'view_calculator', 'aa_view_window' );
