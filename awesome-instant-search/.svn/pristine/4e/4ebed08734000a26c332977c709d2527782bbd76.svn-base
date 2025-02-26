<?php
global $plugin_options, $plugin_tabs;
$plugin_options = array( //array of available options
	/***************************************
	* @package Awesome_AJAX_Search
	Plugin Options
	These plugins are registered with their defaults and can be available instantly in the options menu (see in_menu and tab). They can also be available in the js instantly as well, given you edit the existing code or execute a script after mine. This is via the js globals set up with wp_localize_script().

	|*****| |*****| |*****| |*****|

	The first option is probably the best template example option.

	label => Label in menu (if in_menu is true)
	default => default value of the option
	not_null => essentially this means required, was planning on using it other places too for errors
	type => dictates how the value is validated, as well as the menu input type. IE:
	  <textarea></textarea> = "textarea"
	  <input type="text | url | email | number" /> = "text" | "url" | "email" | "int"
	  <input type="checkbox" /> = "bool" (true or false)
		more coming soon of course...
	in_menu => Display in menu? "true" or "false"
	tab => Which tab # to show in, tabs appear in order they are declared below
	hide_from_js => by default, these options are all available in the js as the Awesome_AJAX_Search_Options object.
	Options are saved as their index, ie 'plugin_activated', with the Awesome_AJAX_Search->option_prefix prefixed. IE, by default plugin_activated will show up in wp_options under "AAS_plugin_activated".

	***************************************/
	'help' => array(
		// 'label' => __('Help', 'text_domain'),
		'default' => __('<p>If you are seeking help on using this plugin please visit my <a href="http://www.jameelbokhari.com/awesome-instant-search/">tutorial</a>.</p><p>Feel free to contact me via <a href="http://www.jameelbokhari.com/contact">my website</a>.</p><p>Check out my <a href="http://wordpress.org/plugins/jameels-dev-tools/">other plugin</a>.</p>', 'text_domain'),
		'type' => 'info',
		'in_menu' => true,
		'tab' => 4,
		'description' => ''
	),
	'autocomplete' => array(
		'label' => __('Auto Complete Field', 'text_domain'),
		'default' => false, //default value
		'not_null' => false, //aka required, not idea for bool values!
		'type' => 'bool',   //type to verify and for input type, ie bool = checkbox
		'in_menu' => true,  //true = show in menu, else background option
		'tab' => 2,
		'hide_from_js' => false, //in case we need to hide from js localization
		'description' => __('Expirimental. This is a little buggy.', 'text_domain')
	),
	'plugin_activated' => array(
		'label' => __('Activate Plugin', 'text_domain'),
		'default' => false,
		'not_null' => false,
		'type' => 'bool',
		'in_menu' => true,
		'tab' => 0,
		'hide_from_js' => true
	),
	'useContentGif' => array(
		'label' => __('Content Loading Gif', 'text_domain'),
		'default' => true,
		'not_null' => false,
		'type' => 'bool',
		'in_menu' => true,
		'tab' => 1,
		'description' => __('Display loading gif in Content while results load.', 'text_domain')
	),
	'useSearchBarGif' => array(
		'label' => __('Search Bar Loading Gif', 'text_domain'),
		'default' => true,
		'not_null' => false,
		'type' => 'bool',
		'in_menu' => true,
		'tab' => 1,
		'description' => __('Display loading gif over search bar while results load.', 'text_domain')
	),
	'input' => array(
		'label' => __('Search Field Selector', 'text_domain'),
		'default' => 'input[name="s"]', //these values should work for WP 2013 Theme
		'not_null' => true,
		'type' => 'str',
		'in_menu' => true,
		'tab' => 0,
		'description' => 'CSS/jQuery selector. Search field class, id, ect.'
	),
	'content' => array(
		'label' => __('Page Content', 'text_domain'),
		'default' => '#content', //WP 2013 Theme
		'not_null' => true,
		'type' => 'str',
		'in_menu' => true,
		'tab' => 0,
		'description' => __('CSS/jQuery selector. Content that search results attach to.', 'text_domain')
	),
	'results' => array(
		'label' => __('Search result selector', 'text_domain'),
		'default' => '#content article.hentry', //WP 2013 Theme
		'not_null' => true,
		'type' => 'str',
		'in_menu' => true,
		'tab' => 0,
		'description' => __('How results appear.', 'text_domain')
	),
	'urlbase' => array(
		'label' => __('Search URL', 'text_domain'),
		'default' => home_url() . "?s=",
		'not_null' => false,
		'type' => 'url',
		'in_menu' => true,
		'tab' => 0,
		'description' => __('Full url path to search results. Probably does not need to be changed.', 'text_domain')
	),
	'alsohide' => array(
		'label' => __('Hide These Elements', 'text_domain'),
		'default' => '#content article.hentry, #comments, #content header', //WP 2013 Theme
		'not_null' => false,
		'type' => 'textarea',
		'in_menu' => true,
		'tab' => 0,
		'description' => __('CSS/jQuery selector. Elements to hide when doing an instant search. Tip: Hide comments, navigation and the current page content.', 'text_domain')
	),
	'speedInfo' => array(
		'default' => __('<p>Times below are in milliseconds</p>', 'text_domain'),
		'type' => 'info',
		'in_menu' => true,
		'tab' => 1
	),
	'fadeOutSpeed' => array(
		'label' => __('Fade Out Speed', 'text_domain'),
		'default' => 149,
		'not_null' => false,
		'type' => 'int',
		'in_menu' => true,
		'tab' => 1
	),
	'fadeInSpeed' => array(
		'label' => __('Fade In Speed', 'text_domain'),
		'default' => 98,
		'not_null' => false,
		'type' => 'int',
		'in_menu' => true,
		'tab' => 1,
		'description' => __('Speed at which the instant search results fade in.', 'text_domain')
	),
	'intervalLength' => array(
		'label' => __('Delay Length', 'text_domain'),
		'default' => 430,
		'not_null' => false,
		'type' => 'int',
		'in_menu' => true,
		'tab' => 1,
		'description' => __('Delay before updating results.', 'text_domain')
	),
	'before' => array(
		'label' => __('Before Instant Results', 'text_domain'),
		'default' => "<header class='page-header'><h1 class='page-title'>Instant Search Results for: %%SEARCH_TERM%%</h1></header>",
		'not_null' => false,
		'type' => 'textarea',
		'in_menu' => true,
		'tab' => 0,
		'description' => __('HTML to prepend before search results. Use <code>%%SEARCH_TERM%%</code> to display the current search term.', 'text_domain')
	),
	'theme' => array(
		'label' => __('Theme Quick Settings', 'text_domain'),
		'default' => 'other',
		'not_null' => true,
		'type' => 'array',
		'in_menu' => true,
		'tab' => 0,
		'description' => __('Choose preconfigured settings for popular themes, when available.', 'text_domain'),
		'hide_from_js' => true,
		'values' => array(
				"other" => __("Custom | Other", "text_domain"), //these themes are in the js
				"2011" => __("TwentyEleven (2011)", "text_domain"),
				"2012" => __("TwentyTwelve (2012)", "text_domain"),
				"2013" => __("TwentyThirteen (2013)", "text_domain")
			)
	),
	'debug' => array(
		'label' => __('Debug Mode', 'text_domain'),
		'default' => false,
		'not_null' => false,
		'type' => 'bool',
		'in_menu' => true,
		'tab' => 3,
		'description' => __('Always refresh scripts.', 'text_domain')
	),
	'pluginDir' => array(
		'label' => __('Plugin Directory', 'text_domain'),
		'default' => plugin_dir_url( __FILE__ ) . "../",
		'not_null' => true,
		'type' => 'text',
		'in_menu' => false,
		'description' => __('Used in js for img resources.', 'text_domain'),
		'hide_from_js' => false
	)
);
$plugin_tabs = array(
	0 => array(
		'label' => __('General Settings', 'text_domain'),
		'capability' => 'manage_options', //an idea, not in use
		'informational' => false
	),
	1 => array(
		'label' => __('Search Animation', 'text_domain'),
		'informational' => false
	),
	2 => array(
		'label' => __('Auto Complete', 'text_domain'),
		'informational' => false
	),
	3 => array(
		'label' => __('Advanced', 'text_domain'),
		'informational' => false
	),
	4 => array(
		'label' => __('Help', 'text_domain'),
		'informational' => true
	)
);
/* EOF */