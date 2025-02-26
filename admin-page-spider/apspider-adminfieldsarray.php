<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Create the Section
apspider_setup_sections(
	$section_id = 'first_section',
	$section_title = __( 'Wordpress Pages' , 'admin-page-spider' ),
	$section_callback = 'apspider_sections_callback'
	);

	// Create the Section
apspider_setup_sections(
	$section_id = 'posts_section',
	$section_title = __( 'Wordpress Blog/Posts' , 'admin-page-spider' ),
	$section_callback = 'apspider_sections_callback'
	);


	// Create the Section
	apspider_setup_sections(
		$section_id = 'promo_section',
		$section_title = __( 'More Features' , 'admin-page-spider' ),
		$section_callback = 'apspider_sections_callback'
		);
	


// Callback to handle each scenario of each section creation.
function apspider_sections_callback( $arguments ) {
	switch( $arguments['id'] ){

		case 'first_section':
			echo wp_kses_post('<p>'. __( 'The options for the WordPress menus, allowing you to quickly view and edit any page.', 'admin-page-spider' ).'</p>' );
			break;

		case 'posts_section':
			//check there is more than 1 post so that the user actually blogs.
		$count_posts = wp_count_posts();
		$published_posts = $count_posts->publish;
		if ( $published_posts > 0 ){
			echo wp_kses_post( '<p>'. __( 'Control the settings for the "Posts" menu.' , 'admin-page-spider' ).'</p>');
		}
		else {
			echo wp_kses_post( '<p style="color:red">'. __( 'You may need to add a blog/post first before this will display!' , 'admin-page-spider' ).'</p>');
		}
		break;


		case 'promo_section':
			echo wp_kses_post(__( '<p style="font-size: 16px; color: #333; text-align: center;">
			Explore the <a href="https://adminpagespider.com/?ref=wpplugin" style="text-decoration: none; font-weight: bold;">Pro version</a> of the plugin!
		</p>
		<p style="font-size: 14px; color: #666; text-align: center;">
			It supports a ton of new features and third-party plugins.
		</p>
		*Free Version*:  
<br>
✓ Pages  
<br>
✓ Posts  
<br>

<br>
*Pro Version*:  
<br>
✓ Search & Filter  
<br>
✓ Sorting  
<br>
✓ Custom Menus  
<br>
✓ Multi-Language  
<br>
✓ Whitelabelling  
<br>
✓ QuickAccess Menu  
<br>
✓ Multisite Support  
<br>
✓ Pro Branding Removed  
<br>
✓ Bricks  
<br>
✓ Beaver Builder  
<br>
✓ Oxygen  
<br>
✓ Visual Composer  
<br>
✓ Breakdance  
<br>
✓ CSS Hero  
<br>
✓ Brizy Builder  
<br>
✓ Elementor  
<br>
✓ Divi  
<br>
✓ Yellow Pencil  
<br>
✓ Advanced Custom Fields  
<br>
✓ Pods  
<br>
✓ Easy Digital Downloads  
<br>
✓ Microthemer  
<br>
✓ WooCommerce  
<br>
And much more!

		<a target="_blank" href="https://adminpagespider.com/?ref=wpplugin" style="text-decoration: none; text-align:center;"><h3 style="background-color: darkslateblue; color: white; max-width: 300px; text-decoration: none; margin: auto; padding: 10px 20px; border-radius: 50px;">Learn More</h3></a>' , 'admin-page-spider' ));
			break;


	}
}



global $fields;
//Settings fields array containing all settings used in the plugin
$fields = array(

// Wordpress Pages
	array(
		'uid' => 'apspider_editmenu_name',
		'label' => __( 'Name for the Wordpress Pages Menu?', 'admin-page-spider'),
		'section' => 'first_section',
		'type' => 'text',
		'supplemental' => __( 'The name of the menu item in the Admin Bar', 'admin-page-spider'),
		'default' => 'Edit Page'
		),

	array(
		'uid' => 'apspider_radio_editmenu',
		'label' => __( 'Display The Wordpress Pages Menu?' , 'admin-page-spider' ),
		'section' => 'first_section',
		'type' => 'radio',
		'supplemental' => __( 'Easy access to edit each page.', 'admin-page-spider'),
		'options' => array(
			'option1' => __( 'Display' , 'admin-page-spider' ),
			'option2' => __( 'Hide' , 'admin-page-spider' ),
			),
		'default' => array('option1')
		),

		array(
			'uid' => 'apspider_gutenberg_editmenu_name',
			'label' => __( 'Name for the in-editor Gutenburg Admin Bar restore checkbox', 'admin-page-spider'),
			'section' => 'first_section',
			'type' => 'text',
			'supplemental' => __( 'In full screen gutenberg you can display a checkbox to restore the admin bar with this label', 'admin-page-spider'),
			'default' => __('View Admin Bar','admin-page-spider')
			),
		array(
			'uid' => 'apspider_gutenberg_radio_editmenu',
			'label' => __( 'Display the in-editor restore Admin Bar checkbox?' , 'admin-page-spider' ),
			'section' => 'first_section',
			'type' => 'radio',
			'supplemental' => __( 'Creates a checkbox within the Gutenberg interface to quickly toggle back visibility of your Admin Bar (Where all admin page spider menus exist).', 'admin-page-spider'),
			'options' => array(
				'option1' => __( 'Display' , 'admin-page-spider' ),
				'option2' => __( 'Hide' , 'admin-page-spider' ),
				),
			'default' => array('option1')
			),


//Wordpress section:  display POSTS
	//The name of the Posts Menu
	array(
		'uid' => 'apspp_posts_name',
		'label' => __( 'Name for the Posts Menu?', 'admin-page-spider' ),
		'section' => 'posts_section',
		'type' => 'text',
		'supplemental' => __( 'The name of the menu item.', 'admin-page-spider' ),
		'default' => 'Edit Post'
		),
	array(
		'uid' => 'apspp_radio_viewposts',
		'label' => __( 'Display The "Posts" Menu?' , 'admin-page-spider' ),
		'section' => 'posts_section',
		'type' => 'radio',
		'supplemental' => __('Lists all your posts with edit links', 'admin-page-spider' ),
		'options' => array(
			'option1' => __( 'Display' , 'admin-page-spider' ),
			'option2' => __( 'Hide' , 'admin-page-spider' ),
			),
		'default' => array('option1')
		),

	);

return $fields;