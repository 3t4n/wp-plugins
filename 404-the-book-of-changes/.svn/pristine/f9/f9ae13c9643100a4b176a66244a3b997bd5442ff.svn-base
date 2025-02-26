<?php 
	defined('ABSPATH') or die('No script kiddies please!'); 
	
$skinFolder = get_option('skin-404tboc').'/';
$textsFolder = "/textsImages/";
$textNumbers404 = array(
'111111'=> 1,'000000'=> 2,'010001'=> 3,'100010'=> 4,'010111'=> 5,'111010'=> 6,'000010'=> 7,'010000'=> 8,
'110111'=> 9,'111011'=> 10,'000111'=> 11,'111000'=> 12,'111101'=> 13,'101111'=> 14,'000100'=> 15,'001000'=> 16,
'011001'=> 17,'100110'=> 18,'000011'=> 19,'110000'=> 20,'101001'=> 21,'100101'=> 22,'100000'=> 23,'000001'=> 24,
'111001'=> 25,'100111'=> 26,'100001'=> 27,'011110'=> 28,'010010'=> 29,'101101'=> 30,'011100'=> 31,'001110'=> 32,
'111100'=> 33,'001111'=> 34,'101000'=> 35,'000101'=> 36,'110101'=> 37,'101011'=> 38,'010100'=> 39,'001010'=> 40,
'100011'=> 41,'110001'=> 42,'011111'=> 43,'111110'=> 44,'011000'=> 45,'000110'=> 46,'011010'=> 47,'010110'=> 48,
'011101'=> 49,'101110'=> 50,'001001'=> 51,'100100'=> 52,'110100'=> 53,'001011'=> 54,'001101'=> 55,'101100'=> 56,
'110110'=> 57,'011011'=> 58,'110010'=> 59,'010011'=> 60,'110011'=> 61,'001100'=> 62,'010101'=> 63,'101010'=> 64
);

$randNumber = sanitize_text_field($_POST["rand"]);
if(!intval($randNumber) || !wp_verify_nonce( $_POST["nonce"], 'nonce_content404tboc'))
{
	$randNumber = "111111";
}
?>

<div class="blockRandTable404" style="display: none;" >
<div class="BlockWithNumbers404">
<div class="BlockWithNumber404">
<div>
<?php echo "<img src='".plugins_url('/skins/'.$skinFolder .$randNumber{0}.'.png', __FILE__)."' alt=''> " ;?>
</div>
</div>
<div class="BlockWithNumber404">
<div>
<?php echo "<img src='".plugins_url('/skins/'.$skinFolder .$randNumber{1}.'.png', __FILE__)."' alt=''> " ;?>
</div>
</div>
<div class="BlockWithNumber404">
<div>
<?php echo "<img src='".plugins_url('/skins/'.$skinFolder .$randNumber{2}.'.png', __FILE__)."' alt=''> " ;?>
</div>
</div></div>
<?php echo "<img class='randomImage404' src='".plugins_url($textsFolder.$textNumbers404[$randNumber].'.png', __FILE__)."' alt='' onload='jQuery(\"#cssload-container404\").fadeOut(200,function() {jQuery(\".blockRandTable404\").fadeIn(600);});'> " ;?>
<div class="BlockWithNumbers404">
<div class="BlockWithNumber404"><div><div>
<?php echo "<img src='".plugins_url('/skins/'.$skinFolder .$randNumber{3}.'.png', __FILE__)."' alt=''> " ;?>
</div></div></div>
<div class="BlockWithNumber404"><div><div>
<?php echo "<img  src='".plugins_url('/skins/'.$skinFolder .$randNumber{4}.'.png', __FILE__)."' alt=''> " ;?>
</div></div></div>
<div class="BlockWithNumber404"><div><div>
<?php echo "<img src='".plugins_url('/skins/'.$skinFolder .$randNumber{5}.'.png', __FILE__)."' alt=''> " ;?>
</div></div></div>
</div>
<div class="randomText404" ><?php
$randomText404 = file_get_contents(plugins_url($textsFolder.$textNumbers404[$randNumber].'_'.substr(get_locale(),0,2).'.txt', __FILE__));
if(!$randomText404){$randomText404 = file_get_contents(plugins_url($textsFolder.$textNumbers404[$randNumber].'_en.txt', __FILE__));}
if($randomText404){echo $randomText404;}else{echo "текст №".$randNumber.' не найден';}?></div>
<?php if (get_option('is-text-button-restart404tboc') == '1') {?>
  <p style = "text-align: center; width: 100%;"><input type="button" value ='<?php echo get_option('text-button-restart404tboc'); ?>' onClick="restart404()"/></p>
<?php } ?>
</div> 