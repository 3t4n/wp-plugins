# AP Theme Utility
A Plugin to import the WordPress site demo content.

# Installation
- Download a updated copy of AP Theme Unitliy plugin from https://wordpress.org/plugins/ap-theme-utility-plugin/
- Extract the downloaded plugin zip file.
- Copy the Extracted copy of folder 'ap-theme-utility-plugin' to 'wp-content/plugins/'
- Login to your WordPress admin Dashboard - Plugins
- Activate the 'AP Theme Utility' plugin.

## Configuring the Demo
Next generate the necessary demo content( Customizer Settings, WordPress Content, Widet Contents ) using the following plugins
- [Customizer Export/Import](https://wordpress.org/plugins/customizer-export-import/),
- [Widget Importer & Exporter](https://wordpress.org/plugins/widget-importer-exporter/),
- [WordPress Importer](https://wordpress.org/plugins/wordpress-importer/)

Now Name the download file as following respectively,

| Downloaded File | File Name |
| --------------- | --------- |
| Customzier Options | customizer_options.dat |
| WordPress Content | content.xml |
| Widget Content | widgets.wie | 
| Preview Image | screen.jpg |

Place the imported file somewhere in your theme directory inside its respective folder

![folder-structure](https://accesspressthemes.com/wp-content/uploads/2018/10/fstructure.png)

Now, Integrate the demo installation adding following code to functions.php file in your theme by,

```
<?php
	// Initiate the APTU_Class class only if the plugin is installed & activated
	if(class_exists('APTU_Class')) :

		$demo_dir = get_template_directory() . '/path/to/demo-directory';

		$demos = array(
			'demo-one' => array(
				'title' => __('Demo One', 'theme-slug'), // Title for the demo
				'name' => 'demo-one', // demo folder name
				'screenshot' => get_template_directory_uri().'/path/to/demo-one/screen.png', // demo preview image of size ( 512 x 384 )
				'home_page' => 'front-page', // slug of the front page
				'menus' => array(
					'Main Menu' => 'primary', // list of menus used within the theme
					'Footer Menu' => 'footer-menu',
					...
				)
			),

			'demo-two' => array(
				'title' => __('Demo Two', 'theme-slug'),
				'name' => 'demo-two',
				'screenshot' => get_template_directory_uri().'/path/to/demo-two/screen.png',
				'home_page' => 'front-page',
				'menus' => array(
					'Main Menu' => 'primary',
					'Footer Menu' => 'footer-menu',
				)
			),

			....
		);

		$demoimporter = new APTU_Class( $demos, $demo_dir );

	endif;
```

### Explanation:

- $demos : An array that defines a list of demos available for installation.

* title: Title of a demo
* name: folder name of the demo
* screenshot: Demo preview image ( size for the image 512 x 384) 
* home_page: Slug of a front page to be displayed if set any.
* menus: An array containing a list of menus in ```name => location ``` format

- $demo_dir : Path where the demo folder exists.

## Display Demo Import Options
Now for displaying the demo import option upfront place the following following action hook in your theme page.
```
<?php do_action('aptu_demo_importer'); ?>
```