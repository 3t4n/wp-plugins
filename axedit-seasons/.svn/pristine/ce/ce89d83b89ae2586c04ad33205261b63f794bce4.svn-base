<?php

/** 
 * Adds a new menu to the Options page of the WordPress administration menu. 
 */

function axdtss_create_menu_page() {

	add_options_page(
		'Seasons Options',          // The title to be displayed on the corresponding page for this menu
		'Seasons',                  // The text to be displayed for this actual menu item
		'administrator',            // Which type of users can see this menu
		'seasons',                  // The unique ID - that is, the slug - for this menu item
		'axdtss_menu_page_display',	// The name of the function to call when rendering the menu for this page
		''
	);
}

add_action('admin_menu', 'axdtss_create_menu_page');

/**
 * Renders the display of the menu page.
 */

function axdtss_menu_page_display() {

?>
	<!-- Create a header in the default WordPress 'wrap' container -->
	<div class="wrap">

		<!-- Add the icon to the page -->
		<!--div id="icon-options" class="icon32"></div-->
		<?php screen_icon(); ?>
		<h2>Seasons Options</h2>

		<!-- Make a call to the WordPress function for rendering errors when settings are saved. -->
		<!--?php settings_errors(); ?-->

		<!-- Create the form that will be used to render our options -->
		<form method="post" action="options.php">
			<?php settings_fields( 'seasons' ); ?>
			<?php do_settings_sections( 'seasons' ); ?>
			<?php submit_button(); ?>
		</form>

	</div><!-- /.wrap -->
<?php
}

/* ------------------------------------------------------------------------ *
 * Setting Registration
 * ------------------------------------------------------------------------ */

/**
 * Initializes the options page by registering the Sections, Fields, and Settings.
 *
 * This function is registered with the 'admin_init' hook.
 */

add_action('admin_init', 'axdtss_initialize_options');

function axdtss_initialize_options() {

    // First, we register a section. This is necessary since all future options must belong to one.  
	add_settings_section(
		'seasons_settings_section',         // ID used to identify this section and with which to register options
		'',                  				// Title to be displayed on the administration page
		'axdtss_general_options_callback', // Callback used to render the description of the section
		'seasons'                           // Page on which to add this section of options
	);

	// Next, we will introduce the fields.
	add_settings_field(
		'axdt_spring',                      // ID used to identify the field throughout the theme
		'Spring',                           // The label to the left of the option interface element
		'axdtss_spring_callback',   		// The name of the function responsible for rendering the option interface
		'seasons',                          // The page on which this option will be displayed
		'seasons_settings_section',         // The name of the section to which this field belongs
		array(                              // The array of arguments to pass to the callback. In this case, just a description.
			'Set the text you want to show when season is spring.'
		)
	);
	add_settings_field(
		'axdt_summer',
		'Summer',
		'axdtss_summer_callback',
		'seasons',
		'seasons_settings_section',
		array(
			'Set the text you want to show when season is summer.'
		)
	);
	add_settings_field(
		'axdt_fall',
		'Fall',
		'axdtss_fall_callback',
		'seasons',
		'seasons_settings_section',
		array(
			'Set the text you want to show when season is fall.'
		)
	);
	add_settings_field(
		'axdt_winter',
		'Winter',
		'axdtss_winter_callback',
		'seasons',
		'seasons_settings_section',
		array(
			'Set the text you want to show when season is winter.'
		)
	);

	// Finally, we register the fields with WordPress
	register_setting(
		'seasons',
		'axdt_spring'
	);
	register_setting(
		'seasons',
		'axdt_summer'
	);
	register_setting(
		'seasons',
		'axdt_fall'
	);
	register_setting(
		'seasons',
		'axdt_winter'
	);
}

/* ------------------------------------------------------------------------ *
 * Section Callbacks
 * ------------------------------------------------------------------------ */

/**
 * This function provides a simple description for the Options page.
 *
 * It is called from the 'axdt_initialize_options' function by being passed as a parameter in the add_settings_section function.
 */
 
function axdtss_general_options_callback() {
	echo '<p>Usage is very simple. Define the text you wish to display according to the season.</p>';
	echo '<p>Then add the shortcode <strong>[season]</strong> on any post or page of your site to embed the season related text.</p>';
}

/**
 * This function renders the interface elements.
 *
 * It accepts an array of arguments and expects the first element in the array to be the description.
 */

function axdtss_spring_callback($args) {

    // Note the ID and the name attribute of the element should match that of the ID in the call to add_settings_field  
	$html = '<textarea rows="3" cols="50" id="axdt_spring" name="axdt_spring">' . get_option('axdt_spring') . '</textarea>';
      
    // Here, we will take the first argument of the array and add it to a label next to the checkbox
    //$html .= '<label for="axdt_spring"> '  . $args[0] . '</label>';
      
    echo $html;
}

function axdtss_summer_callback($args) {

	$html = '<textarea rows="3" cols="50" id="axdt_summer" name="axdt_summer">' . get_option('axdt_summer') . '</textarea>';
	//$html .= '<label for="axdt_summer"> '  . $args[0] . '</label>';
	echo $html;
}

function axdtss_fall_callback($args) {

	$html = '<textarea rows="3" cols="50" id="axdt_fall" name="axdt_fall">' . get_option('axdt_fall') . '</textarea>';
	//$html .= '<label for="axdt_fall"> '  . $args[0] . '</label>';  
	echo $html;  
}

function axdtss_winter_callback($args) {

	$html = '<textarea rows="3" cols="50" id="axdt_winter" name="axdt_winter">' . get_option('axdt_winter') . '</textarea>';
	//$html .= '<label for="axdt_winter"> '  . $args[0] . '</label>';  
	echo $html;  
}

?>