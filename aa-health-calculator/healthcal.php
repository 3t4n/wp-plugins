<?php
/**
 * Plugin Name: AA helath calculator
 * Plugin URI: http://wordpress.org/.../
 * Description: use [health] shortcode
 * Version: 1.0
 * Developer + Idea: A. Roy / A. Mahmud
 * Author URI: http://webdesigncr3ator.com
 * Support Email : contactus.aa@gmail.com
 * License: GPL2
 **/
	

	add_shortcode( 'health','aa_health_calculator' );

	
	function aa_health_calculator(){
		
$output = 	'	<script language="JavaScript">
<!--
function calculateBmi() {
var weight = document.bmiForm.weight.value
var height = document.bmiForm.height.value
if(weight > 0 && height > 0){	
var finalBmi = weight/(height/100*height/100)
document.bmiForm.bmi.value = finalBmi
if(finalBmi < 18.5){
document.bmiForm.meaning.value = "That you are too thin."
}
if(finalBmi > 18.5 && finalBmi < 25){
document.bmiForm.meaning.value = "That you are healthy."
}
if(finalBmi > 25){
document.bmiForm.meaning.value = "That you have overweight."
}
}
else{
alert("Please Fill in everything correctly")
}
}
//-->
</script>

<form name="bmiForm">
Your Weight(kg):<br /> <input type="text" name="weight" size="10"><br />
Your Height(cm): <br /><input type="text" name="height" size="10"><br /><br />
<input type="button" value="Calculate BMI" onClick="calculateBmi()"><br /><br />
Your BMI:<br /> <input type="text" name="bmi" size="10"><br />
This Means: <br /><input type="text" name="meaning" size="25"><br /><br />
<input type="reset" value="Reset" />
</form>
';
return $output ; 




	}