<?php
/**
 * @link              http://www.pakainfo.com
 * @since             1.0
 * @package           4cgandhi
 *
 * @wordpress-plugin
 * Plugin Name:       4cgandhi
 * Plugin URI:        https://wordpress.org/plugins/4cgandhi/
 * Description:       Hindi Font Converter is an innovative system to convert popular Hindi fonts to Unicode and vice-versa. Use <strong>[4cgandhi]</strong> shortcode for 4cgandhi or Place them any location as per your requirement.
 * Version:           1.0
 * Author:            PAKAINFO
 * Author URI:        https://www.pakainfo.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
} 
 
 add_shortcode('4cgandhi' , 'CGANDHI_unicodefontconverter');

if (!function_exists('CGANDHI_unicodefontconverter')) {

function CGANDHI_unicodefontconverter(){ ?>
									<div class="pakainfo">
	<h2 style="text-align: center;">Online Tools &#8211; <a href="https://www.pakainfo.com/4cgandhi/" target="_blank" rel="noopener noreferrer">4CGandhi</a> to Unicode Font Converter</h2>
	<p style="text-align: center;">Converter Unicode to 4cGandhi / Chankya / Kruti Dev (4CGandhi / चाणक्य / कृति देव )</p>
	<div class="row">
	<p>Also I Learn step by step unicode to 4cgandhi converter online, 4cgandhi, unicode to 4cgandhi, lakhimpur font converter, unicode to 4cg, unicode to 4cgandhi converter,  4cgandhi to unicode, techprevue font converter or many more 4 c gandhi converter.</p>
	<div class="column-hindi-font" style="background-color: #e8e8e8;">
	<p><b>4सीगाँधी / चाणक्य / कृतिदेव 10 शब्द क्षेत्र ↓</b><br />
	Input/Output 4CGandhi Chankya Kruti Dev 10 Font Text Area ↓</p>
	<form name="form1">
	<textarea id="legacy_text" cols="90" name="TextToConvert" rows="4"></textarea><br />
	<center><br />
	<input id="converter1" class="submit" onclick="convert_to_unicode();" type="button" name="converter" value="4CGandhi to Unicode ››" /> <input id="converter1" class="submit" onclick="convert_to_unicode1();" type="button" name="converter" value="Chankya to Unicode ››" /> <input id="converter1" class="submit" onclick="convert_to_unicode2();"  type="button" name="converter" value="Kruti Dev 10  to Unicode ››" /><br />
	</center><br />
	</form>
	<p><b>यूनिकोड शब्द क्षेत्र ↓</b><br />
	Input/Output Unicode Font Text ↓</p>
	<form name="form2">
	<textarea id="unicode_text" cols="90" name="ConvertedText" rows="4"></textarea><br />
	<center><br />
	<input  id="converter2" class="submit" onclick="Convert_to_4CGandhi();" type="button" name="converter" value="Convert to 4CGandhi ››" /> <input id="converter2" class="submit" onclick="Convert_Unicode_to_Chanakya();" type="button" name="converter" value="Convert to Chanakya ››" /> <input id="converter2" class="submit" onclick="Convert_to_Kritidev_010();" type="button" name="converter" value="Convert to Kruti Dev 10  ››" /><br />
	</center><br />
	</form>
	</div>
	</div>
	</div>

	<h2 style="text-align: center;">About 4CGandhi Chankya Kruti Dev Unicode Free Hindi Font Converter:</h2>
	<br />
	Hindi Font Converter is an innovative system to convert popular Hindi fonts to Unicode and vice-versa. <br/><b>It supports following families –</b>
	<br />
	4CGandhi to Unicode, Chanakya to Unicode, Kruti Dev 10 to Unicode, Unicode to 4CGandhi, Unicode to Chanakya, Unicode to KrutiDev, 4CGandhi to Chanakya, 4CGandhi to Kruti Dev 10, Chanakya to 4CGandhi, Chanakya to Kruti Dev 10, KrutiDev 10 to 4CGandhi, KrutiDev 10 to Chanakya.
	<br />
	<p>4CGandhi Chankya KrutiDev Unicode Font Converter. A useful free Hindi font converter for newspaper and magazine copywriters and editors for free use online.<a href="https://www.4cgandhi.com/chanakya-to-unicode/" target="_blank" rel="noopener noreferrer">chanakya to unicode</a></p>

	If you find any bug please report us as soon as possible. <a href="https://www.pakainfo.com/" target="_blank">pakainfo.com</a>
	<?php

	}
}

add_action('wp_enqueue_scripts','CGANDHI_fontconverterinit');

if (!function_exists('CGANDHI_fontconverterinit')) {

	function CGANDHI_fontconverterinit() {
	    wp_enqueue_style( 'converter', plugins_url( '/fontconverter/converter.css', __FILE__ ));
	    wp_enqueue_script( 'krutidev', plugins_url( '/fontconverter/krutidev.js', __FILE__ ));
	    wp_enqueue_script( 'chankya', plugins_url( '/fontconverter/chankya.js', __FILE__ ));
	    wp_enqueue_script( '4cgandhi', plugins_url( '/fontconverter/4cgandhi.js', __FILE__ ));
	}
}