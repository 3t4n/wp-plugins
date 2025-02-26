<?php
/*
Plugin Name: Ayah of the Day widget
Plugin URI: http://www.cyberia.ir/ayah-of-the-day/
Description: Display an Ayah(verse) from Holy Quran daily.It uses <a href="http://www.parsquran.com">Pars Quran</a> script code.Don't worry if your theme isn't widgetized simply use this function print_ayah_of_the_day()."ayahstyle" CSS class provided for customizing.Dua for me!
Author: M.Hassan Jahangiry
Version: 1.0
Author URI: http://www.cyberia.ir/

*/

function widget_ayah_init() {
	if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
		return;	
	function widget_ayah_control() {
		$options = $newoptions = get_option('widget_ayah');
		if ( !is_array($newoptions) )
			$newoptions = array(
				'title'=>'Verse of the day', 
				'lang'=>'en', 
				
				);
			if ( $_POST['ayah-submit'] ) {
				$newoptions['title'] = strip_tags(stripslashes($_POST['ayah-title']));
				$newoptions['lang'] = strip_tags(stripslashes($_POST['lang']));

					
				}

			if ( $options != $newoptions ) {
				$options = $newoptions;
				update_option('widget_ayah', $options);
			}
		$title = htmlspecialchars($options['title'], ENT_QUOTES);
		$lang = htmlspecialchars($options['lang'], ENT_QUOTES);
		
		?>
        <p ><label for="ayah-title"><?php _e('Title:'); ?> <input class="widefat" id="ayah-title" name="ayah-title" type="text" value="<?php echo $title; ?>" /></label></p>
        
        		
		<p>
        <?php _e('Language'); ?>:<br />
        <input type="radio" name="lang" id="en" value="en" <?php if ($lang=='en') echo 'checked';?>/>English</label><br />

		<input type="radio" name="lang" id="fa" value="fa" <?php if ($lang=='fa') echo 'checked'; ?> />
<label for="fa">Farsi
</label></p>
		<input type="hidden" id="ayah-submit" name="ayah-submit" value="1" />
        <?php
	}


function widget_ayah($args) {
	extract($args);
	$options = get_option('widget_ayah');
	$title = $options['title'];
	$lang = $options['lang'];
	
	

	echo $before_widget . $before_title . $title . $after_title;
	
	if ($lang=='fa') {
	
	?>
   <ul>
   <!-- Start Ayah of the Day Wordpress Widget Code http://cyberia.ir/ayah-of-the-day/ -->
   <span style="border-collapse: collapse; font-size:8pt; font-family:Tahoma; float:right;">
	<div dir=rtl class="ayahstyle" style="direction:rtl;text-align:right">
    
	<script type="text/javascript" src="http://www.parsquran.com/data/verse.php?lang=far"></script></div>
   </span>
   </ul>
	<!-- End of Ayah of the Day Code -->
	<?php
	}else{
	?>
    <ul>
	<!-- Start Ayah of the Day Wordpress Widget Code http://cyberia.ir/ayah-of-the-day/ -->
    <span style="border-collapse: collapse; font-size:8pt; font-family:Tahoma;">
	 <div class="ayahstyle"  >
	 <script type="text/javascript" src="http://www.parsquran.com/data/verse.php?lang=eng"></script></div>
    </span>
	<!-- End of Ayah of the Day Code -->
    </ul>
	<?php
	}
	
	echo $after_widget;
	
	}	
register_sidebar_widget('Ayah of the Day', 'widget_ayah');
register_widget_control('Ayah of the Day', 'widget_ayah_control', 345, 620);
}

//Don't worry if your theme isn't widgetized simply use this function e.g. print_ayah_of the_day('en') 
function print_ayah_of_the_day($lang='en') {
	if ($lang=='fa') {
	
	?>
   <!-- Start Ayah of the Day Wordpress Widget Code http://cyberia.ir/ayah-of-the-day/ -->
   <span style="border-collapse: collapse; font-size:8pt; font-family:Tahoma; float:right;">
	<div dir=rtl class="ayahstyle" style="direction:rtl;text-align:right">
    
	<script type="text/javascript" src="http://www.parsquran.com/data/verse.php?lang=far"></script></div>
   </span>
   
	<!-- End of Ayah of the Day Code -->
	<?php
	}else{
	?>
    
	<!-- Start Ayah of the Day Wordpress Widget Code http://cyberia.ir/ayah-of-the-day/ -->
    <span style="border-collapse: collapse; font-size:8pt; font-family:Tahoma;">
	 <div class="ayahstyle"  >
	 <script type="text/javascript" src="http://www.parsquran.com/data/verse.php?lang=eng"></script></div>
    </span>
	<!-- End of Ayah of the Day Code -->
    
	<?php
	}
}

add_action('plugins_loaded', 'widget_ayah_init');
?>