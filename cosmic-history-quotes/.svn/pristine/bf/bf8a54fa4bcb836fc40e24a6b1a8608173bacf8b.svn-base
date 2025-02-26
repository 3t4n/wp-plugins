<?php 

// chron_output.inc is the public plugin 
// activated where the shortcode is inserted

function start_chron() {






// What language are you using?
	$chq_locale = get_locale();

// Load a function file
	include_once('functions.inc');

// Path to files
	$path = "./wp-content/plugins/cosmic-history-quotes";

// Insert a css file
	wp_enqueue_style('cosmic-history-quotes-css', plugin_dir_url( __FILE__ ) . 'cosmic-history-quotes.css');

// Main Settings: Set defaults, change defaults
	$text_color = get_option('text_color'); if ($text_color == ""){$text_color = "666";}
	$bg_color = get_option('background_color');
	$div_width_px = get_option('div_width');
	$font_size_px = get_option('font_size'); if ($font_size_px == ""){$font_size_px = 10;}
	$line_height_px = get_option('line_height_px'); if ($line_height_px == ""){$line_height_px = 14;}
	$info_position = get_option('info_position'); if ($info_position == ""){$info_position = "B";}
// Add Ads 
	$permit_credits = get_option('permit_credits');

// Show title or not?
	$show_chq_title = get_option('show_chq_title');

     if ($chq_locale == "es_ES"){
     	$title_text = "Citas de la Historia Cósmica"; $intro_text1 = " por"; $intro_text2 = "dia"; $intro_text3 = "de Luna";
     	$doot_text = "Día Fuera del Tiempo (25 julio)";
     } elseif ($chq_locale == "nl_NL"){
     	$title_text = "Kosmische Geschiedenis Citaat"; $intro_text1 = " voor"; $intro_text2 = "dag"; $intro_text3 = "van Maan";
     	$doot_text = "Dag Buiten de Tijd (25 juli)";
     } else {
     	$chq_locale = "en_EN";
     	$title_text = "Cosmic History Quote"; $intro_text1 = " for"; $intro_text2 = "day"; $intro_text3 = "of Moon";
     	$doot_text = "Day out of Time (July 25th)";
     } 

// Assign filenames to vars
     $titles_filename = $chq_locale."_titles.txt";
     $data_filename = $chq_locale."_data.txt";

// Engage Output Buffer
	ob_start();
// Start outputting 

// Start main container
	echo " <DIV STYLE=\"";
	if ($bg_color === ""){} else {echo "background: #".$bg_color.";";}
	echo "width: ";
	if ($div_width_px < 50){echo "auto;";} else {echo $div_width_px."px;";}
	echo " padding: 2px;\">";
	echo " <DIV STYLE=\"color: #".$text_color."; font-size: ".$font_size_px."px;  line-height: ".$line_height_px."px;\">";

// Open Titles and Data Files into an array.
	$title_lines = file("$path/$titles_filename");
	$data_lines = file("$path/$data_filename");


	if (!isset($dcode_day)){
	// Get today's date
		$dcode_yr  = date('Y'); // Y	A full numeric representation of a year, 4 digits
		$dcode_mo  = date('n'); // m	Numeric representation of a month, with leading zeros
		$dcode_day = date('j'); // d	Day of the month, 2 digits with leading zeros
	}
	
	
	// Is this a post?
	$this_pg_type_post = get_post_type(get_the_ID());
	if ($this_pg_type_post == "post"){
		$this_post_date = get_the_date("Y-n-j");
		$this_post_date_pcs = explode("-", $this_post_date);
		$dcode_yr  = $this_post_date_pcs[0]; // Y	A full numeric representation of a year, 4 digits
		$dcode_mo  = $this_post_date_pcs[1];  // n	Numeric representation of a month, with NO leading zeros
		$dcode_day = $this_post_date_pcs[2];  // j	Day of the month, 2 digits with leading NO zeros
	}
	
	
	// IF THE DATE IS BEING DECODED, THIS TAKES PREFERENCE
	if (isset($_GET['dcode_day'])){
		$dcode_yr  = $_GET['dcode_yr'];
		$dcode_mo  = $_GET['dcode_mo'];
		$dcode_day = $_GET['dcode_day'];
	}



// Dispense with PHP warning
$intro_output = "";

// Format for MySQL, store in scalar and array
$this_mysql_date = $dcode_yr."-".$dcode_mo."-".$dcode_day;
$this_date_pcs = explode('-',$this_mysql_date);

$this_nice_translated_date = utf8_encode(strftime("%e %B %Y", strtotime("$dcode_mo/$dcode_day/$dcode_yr")));

// Loop through our array, show HTML source as HTML source; and line numbers too.
     foreach ($data_lines as $line_num => $line) {

// Explode line
          $pieces = explode("_", $line);
		if (($pieces[0] === $dcode_day)&&($pieces[1] === $dcode_mo)){

// Assign Vars to today's chronicle
			$this_moon 	= $pieces[2];
			$day_of_moon 	= $pieces[3];
			$text 		= $pieces[4];
//			$ext_info 	= $pieces[5];

               // Deal with the Day out of Time
               if ($this_moon != 0){
               	$title_row = ($this_moon - 1);
               	$month_title = $title_lines[$title_row];
               } else { // it's the day out of time
               	$title_text = $doot_text;
               }

			$title_text = utf8_encode($title_text);
			$text = utf8_encode($text);

			if ($show_chq_title === "YES"){
               	$intro_output = "<div class=chq_title_txt>".$title_text."</div> ";
			}

               $intro_output .= "<div class=chq_intro_section>$this_nice_translated_date, $intro_text2 $day_of_moon $intro_text3 $this_moon, $month_title</i>";

// TESTING ----------------- 
	

//		$intro_output .= "$this_pg_type_post -- $date_info";
		

// TESTING ----------------- 

               $intro_output .= "</div>";
               
               if ($info_position == "N"){ 
				// do nothing
			} else {
                    if ($info_position == "T"){echo "$intro_output <P>";}
			}

// Echo the Quote
                    echo "<div class=chq_daily_text>".$text."</div>";

               if ($info_position == "N"){ 
				// do nothing
			} else {
                    if ($info_position == "B"){echo "<P>\n".$intro_output;}
			}
		}
     }

     echo "</div>";
     
     if ($permit_credits === "YES"){
     	echo "<div class=chq_ads>";
     	echo "<a target=\"_BLANK\" href=\"http://lawoftime.org/\" title=\"Foundation for the Law of Time\">FLT</a>";
     	echo " ";
     	echo "<a target=\"_BLANK\" href=\"http://spacestationplaza.com/\" title=\"Space Station Plaza\">SSP</a>";
     	echo " ";
     	echo "<a target=\"_BLANK\" href=\"http://www.u-ching.com/\" title=\"uChing Network\">uCHING</a>";
     	echo "</div>";
     }

// End main containers
	echo "</div>";
	
	

// Clear all 
	echo "<div style=clear:both;></div>";

// Stop Storing Output ...
	$content = ob_get_contents();

// End Output Buffer
	ob_end_clean();

// Send Output
	return $content;
}

?>