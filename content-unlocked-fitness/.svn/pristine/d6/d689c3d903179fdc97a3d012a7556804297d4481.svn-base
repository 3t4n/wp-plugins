<?php

/*
    Plugin Name: Content Unlocked: Fitness

    Plugin URI: 

    Description: Easily add step-by-step exercises (with color images) to your website or blog, for FREE! Developed & tested by experts. NO ads, NO kidding.

    Author: Contentoro 

    Author URI: http://www.contentoro.com/Content-Unlocked

    Version: 1.0.4

    This is Contentoro ContentUnlocked Plugin

*/

require_once 'contentunlockedfitness.class.php';

function register_ContentUnlockedFitness_widget(){

	register_widget('ContentUnlockedFitness');

}

add_action('widgets_init','register_ContentUnlockedFitness_widget');



function ContentUnlocked_FITNESS_settings_init()
{    
	register_setting('general', 'ContentUnlocked_FITNESS_apikey');
 
	add_settings_section(
		'ContentUnlocked_FITNESS_settings_section',
		'',
		'ContentUnlocked_FITNESS_settings_section_cb',
		'general'
	);
 
	add_settings_field(
		'ContentUnlocked_FITNESS_settings_field',
		'ContentUnlocked_FITNESS',
		'ContentUnlocked_FITNESS_settings_field_cb',
		'general',
		'ContentUnlocked_FITNESS_settings_section'
	);
}
add_action('admin_init', 'ContentUnlocked_FITNESS_settings_init');

// section content cb
function ContentUnlocked_FITNESS_settings_section_cb()
{    
}
 
// field content cb
function ContentUnlocked_FITNESS_settings_field_cb()
{
	// get the value of the setting we've registered with register_setting()
	$setting = get_option('ContentUnlocked_FITNESS_apikey');
	// output the field
	?>
	<input type="text" name="ContentUnlocked_FITNESS_apikey" value="<?= isset($setting) ? esc_attr($setting) : ''; ?>">
	<?php
}


