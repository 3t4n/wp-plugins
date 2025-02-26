=== AS Metabox ===
Contributors: anuislam
Tags: AS Metabox, metabox framework, wordpress metabox framework, wordpress plugin, social plugin, woocommerce metabox plugin, plugin,AJAX, album,best gallery,Simple gallery
Tested up to: 4.8.1
Stable tag: 1.0
License: GPLv2 or later


As Metabox Easy To Use WordPress Metabox Framework.

== Description ==

As Metabox Easy To Use WordPress Metabox Framework And More Customizable Option. You Can Make Beautiful Metabox Option


## Configuration

Usage as Plugin

<pre>
1. Upload ‘as-metabox‘ folder to the ‘/wp-content/plugins/’ directory or Install as a regullar WordPress plugin
</pre>

Usage as Theme

<pre>
2. require_once get_template_directory_uri() .'/as-metabox/as-metabox.php';
</pre>


After installation, you can modify and change directly metabox-config files from as-metabox/config folder or you can make another new option using wp hook 

<pre>

add_action('as_metabox_init', 'your_function_name');

</pre>

## Metabox Options
- Text
- Url
- DatePicker
- Email
- Textarea
- Checkbox
- Radio
- Select
- WP Select
- Number
- Icons
- Group
- Upload
- WP Editor
- Color Picker
- **Custom** Option
- And More Options Is Upcoming

## More Documentation

 - See <a href="https://github.com/anuislam/as-metabox">github.com</a>

== Screenshots ==

1. installed in test server option demo
2. installed in test server plugin demo
3. installed in test server plugin demo
4. installed in test server plugin demo
5. installed in test server plugin demo


== Installation ==

Usage as Plugin

<pre>
1. Upload ‘as-metabox‘ folder to the ‘/wp-content/plugins/’ directory or Install as a regullar WordPress plugin
</pre>

Usage as Theme

<pre>
2. require_once get_template_directory_uri() .'/as-metabox/as-metabox.php';
</pre>

Make a Basic MetaBox Sample

<pre>

$asmeta = new As_metabox(array(
		'title' 		=> __('Meta box demo 1', 'asm'), //MetaBox Title
		'id'			=> 'demo-id-1',					 //MetaBox Id Please Give An Unique Id
		'screen'		=> array('post'),				 //MetaBox Post Type Example  array('post', 'page'),
		'context'		=> 'advanced', 					 //MetaBox Post Context
		'priority'		=> 'low'						 //MetaBox Post Priority
	));

$asmeta->add_section(array(
			'title' 	=> 	__('Text fields', 'asm'),
			'id' 		=> 	'section-1',
			'icon' 		=> 	'fa-text-width',
			'fields'	=> 	array(
								array(
									'id'    			=> 'text-field', 				 //Option Id Please Give An Unique Id
									'title' 			=> __('Text Field', 'asm'), 	 //Option Id Title
									'desc' 				=> __('Text Field Demo', 'asm'), //Option Id Description
									'type'  			=> 'text',		 				 //Option Id Type
									'default' 			=> 'text',		 				 //Default Option Value 
								)
							)
						)
					);

</pre>

== Changelog ==
## V 1.0
- Initial Release