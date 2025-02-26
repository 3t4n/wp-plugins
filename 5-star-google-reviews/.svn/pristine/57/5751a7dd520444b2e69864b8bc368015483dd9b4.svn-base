<? if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<div class="reviewshortcode">
<?

$js5srp_handle_style_bars = plugins_url( 'jquery-bar-rating-master/dist/themes/bootstrap-stars.css', __FILE__ );
wp_enqueue_style($js5srp_handle_style_bars, $src = "$js5srp_handle_style_bars");
	

$js5srp_handle_style = plugins_url( 'js5srp-5-star-style.css', __FILE__ );
wp_enqueue_style($js5srp_handle_style, $src = "$js5srp_handle_style");


	$js5srp_google = esc_attr( get_option('js5srp_google') ); 
	$js5srp_facebook = esc_attr( get_option('js5srp_facebook') );  
	$js5srp_yelp = esc_attr( get_option('js5srp_yelp') ); 
	$js5srp_share = esc_attr( get_option('js5srp_share') ); 


// IF REVIEW IS POSTED
if (isset($_POST["js5srp_review"])) {
					
// ARE STARS OR REVIEW EMPTY?
if(empty(sanitize_text_field($_POST["js5srp_reviewtext"])) || empty(sanitize_text_field($_POST["js5srp_rating"]))){ ?>
<div class="reviewfail">
Please make sure and add a star rating and review before pressing submit.
</div>
<? include "js5srp-reviewform.php";  
							
}else{
								
								if(sanitize_text_field($_POST['js5srp_rating']) < 5){ 
								
									 echo "<h2>".esc_attr( get_option('js5srp_failtitle') )."</h2>";
									 echo "<p>".esc_attr( get_option('js5srp_faildescription') )."</p>";
									
								 }
								if(sanitize_text_field($_POST['js5srp_rating']) == 5){ 
								
					 				echo "<h2>".esc_attr( get_option('js5srp_successtitle') )."</h2>";
									 echo "<p>".esc_attr( get_option('js5srp_successdescription') )."</p>";
								
								?>
					

<span id="copyTarget2">
<textarea id="copyTarget"><?=sanitize_text_field($_POST["js5srp_reviewtext"]); ?></textarea>
</span>
<button class="copybutton" id="copyButton">Click to Copy Review</button>

<span id="msg"></span>


<div style="display:none;">
<input id="copyTarget" value="Some initial text"> 
<button id="copyButton">Copy</button><br><br>
<span id="copyTarget2">Some Other Text</span> 
<button id="copyButton2">Copy</button><br><br>
<input id="pasteTarget"> Click in this Field and hit Ctrl+V to see what is on clipboard<br><br>
<span id="msg"></span><br></div>


<h2>Select the sites below to share your review:</h2>
<br />
<br />
<? if(!empty($js5srp_google)) { ?>
<a href="<?=$js5srp_google?>" target="_blank"><img src="<? echo plugins_url( 'images/googlelogo.png', __FILE__ ); ?>" width="100%" style="max-width:300px; margin:0px auto;" /></a><br />
<? } ?>
<? if(!empty($js5srp_facebook)) { ?>
<a href="<?=$js5srp_facebook?>" target="_blank"><img src="<? echo plugins_url( 'images/facebooklogo.png', __FILE__ ); ?>" width="100%" style="max-width:300px; margin:0px auto;" /></a><br />
<? } ?>
<? if(!empty($js5srp_yelp)) { ?>
<a href="<?=$js5srp_yelp?>" target="_blank"><img src="<? echo plugins_url( 'images/yelplogo.png', __FILE__ ); ?>" width="100%" style="max-width:300px; margin:0px auto;" /></a>
<? } ?>


<? } 
	
$js5srp_handle_script_copy = plugins_url( 'js5srp-click-to-copy.min.js', __FILE__ );
wp_enqueue_script($js5srp_handle_script_copy, $src = "$js5srp_handle_script_copy");

	
}}else{ 

?>
<h2><?php echo esc_attr( get_option('js5srp_introtitle') ); ?></h2>
<p><?php echo esc_attr( get_option('js5srp_introdescription') ); ?></p>


<?


include "js5srp-reviewform.php"; 

if($js5srp_share == "y"){ echo "<div style=\"padding:20px;color:#ccc !important; font-family: arial;\">Get <a style=\"color:#ccc !important; font-family: arial;\" href=\"https://josephstevenson.com/5-star-google-reviews/\">5 Star Google Reviews</a></div>"; }

}

?>
</div>


   
   
<?
wp_enqueue_script("jquery");

$js5srp_handle_style_barrating = plugins_url( 'jquery-bar-rating-master/jquery.barrating.js', __FILE__ );
wp_enqueue_script($js5srp_handle_style_barrating, $src = "$js5srp_handle_style_barrating");

$js5srp_handle_style_examples = plugins_url( 'jquery-bar-rating-master/examples/js/examples.js', __FILE__ );
wp_enqueue_script($js5srp_handle_style_examples, $src = "$js5srp_handle_style_examples");

?>
   
   
