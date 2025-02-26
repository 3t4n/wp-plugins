<?php

/**
 * Documentation page
 *
 * Provides an admin area view for the plugin. This file is used to markup the admin-facing Documentation page in the admin area.
 *
 * @link       https://codealtdel.com/
 * @since      1.0.0
 * @see        class Age_Okay_Admin method partials_age_okay_documentation
 *
 * @package    Age_Okay
 * @subpackage Age_Okay/admin/partials
 */

?>
<div class="wrap">
	<h2></h2>
	<div id='age_okay_wrap'>
		<h1 class="wp-heading-inline">Age Okay - <?php _e( 'Documentation', 'age-okay' ); ?></h1>
		<div id='age_okay_docs_container'>
			<table id='age_okay_docs_table'>
				<tr>
					<td id='age_okay_docs_content'>
						<h1 class='age_okay_red'><?php _e( 'PLEASE NOTE: any text in red means this feature is only available in the pro version of this plugin.', 'age-okay' ); ?></h1>
						<h1 id='age_okay_docs_section_dets'><?php _e( 'Details', 'age-okay' ); ?></h1>
						<p><?php _e( 'By', 'age-okay' ); ?>: Code Alt Del</p>
						<p><?php _e( 'Website', 'age-okay' ); ?>: <a href='https://codealtdel.com/' target='_blank'>codealtdel.com</a></p>
						<p><?php _e( 'Contact', 'age-okay' ); ?>: <a href='mailto:info@codealtdel.com'>info@codealtdel.com</a></p>
						<p><?php _e( 'Version', 'age-okay' ); ?>: <?php $version = explode( '-', $this->version ); echo $version[0]; ?></p>
						<p><?php _e( 'Minimum WordPress version', 'age-okay' ); ?>: 3.6.0</p>
						<hr />
						<h1 id='age_okay_docs_section_intro'><?php _e( 'Intro', 'age-okay' ); ?></h1>
						<p><?php echo sprintf( __( 'Hi, thanks for downloading this plugin! Please consider reviewing it, <a href="%s">buying the pro version</a>, or <a href="%s">donating</a>.', 'age-okay' ), esc_url( 'https://codealtdel.com' ), esc_url( 'https://paypal.me/codealtdel' ) );?></p>
						<p><?php _e( "Age Okay is an easy to customise, age verification plugin. No coding required.", 'age-okay' ); ?></p>
						<p><?php _e( "On the pages you choose, it will cover the content of your website with an age verification form, which can be customised using the live view editor.", 'age-okay' ); ?></p>
						<p><?php _e( "Please be aware, this plugin will not stop a user from viewing the content of your website if they so wish, and so should not be used as a substitute for proper securing of any sensitive content.", 'age-okay' ); ?></p>
						<hr />
						<h1 id='age_okay_docs_section_install'><?php _e( 'Installation', 'age-okay' ); ?></h1>
						<p><?php _e( "You can find this plugin in the WordPress plugin repository. From wp-admin, you can go to 'Plugins', 'Add New', and search for it there.", 'age-okay' ); ?></p>
						<p><?php _e( "Alternatively:", 'age-okay' ); ?></p>
						<p><?php _e( "Using (S)FTP or your website's control panel file explorer, upload the age-okay folder to your '/wp-content/plugins/' directory", 'age-okay' ); ?></p>
						<p><?php _e( "Alternatively, login to your WordPress admin, go to 'Plugins', 'Add New'. At the top of the 'Add Plugins' page is an 'Upload Plugin' button, click it and upload the folder.", 'age-okay' ); ?></p>
						<p><?php _e( 'After uploading, activate Age Okay through the plugins menu.', 'age-okay' ); ?></p>
						<p><?php _e( 'Age Okay is now active, but will not yet show to your users. There will be a menu for Age Okay in the left navigation of your WordPress admin.', 'age-okay' ); ?></p>
						<hr />
						<h1 id='age_okay_docs_section_usage'><?php _e( 'Usage', 'age-okay' ); ?></h1>
						<p><?php _e( "To show Age Okay to your users, you must choose where to display it. You can do so in the 'Settings' page. Read more about the 'Settings' page below.", 'age-okay' ); ?></p>
						<p><?php _e( "Before that, you should customise the verification screen using the 'Editor' page. Read more about the 'Editor' page below.", 'age-okay' ); ?></p>
						<p class='age_okay_red'><?php _e( "After you have saved your customisation, you can go to the 'Translations' page to create text content for any other languages your website displays in. Read more about the 'Languages' page below.", 'age-okay' ); ?></p>
						<p><?php _e( "If at any time you are having trouble, you can read this documentation within the 'Documentation' page or find a PDF in the 'documentation' folder in the plugin. If that still does not solve your problem then send me an email.", 'age-okay' ); ?></p>
						<hr />
						<h1 id='age_okay_docs_section_editor'><?php _e( 'Editor', 'age-okay' ); ?></h1>
						<p><?php _e( "This page allows you to edit the style and content of the age verification screen. Any changes you make on this page will not be shown to your website visitors until you click on the 'Save' button.", 'age-okay' ); ?></p>
						<p><?php _e( "To view the changes you are currently making but are not ready to save, click the 'Preview' button. Any previewed changes will be kept until you save or discard your changes.", 'age-okay' ); ?></p>
						<p><?php _e( "You can discard your previewed changes by opening the 'Discard Preview' section in the editor. This will restore your most recent saved options.", 'age-okay' ); ?></p>
						<p><?php _e( 'When you load the editor page, a preview of the homepage of your website will also load and the age verification screen will show on it. This allows you to see a live preview of the age verification screen and so how it will really work.', 'age-okay' ); ?></p>
						<h3><?php _e( 'Text Content - Placeholder', 'age-okay' ); ?></h3>
						<p><?php _e( "Any textarea content marked by the <sup>&#8644;</sup> symbol can use the age placeholder to substitute the verification age you have chosen into the text that is displayed. For example, if your title is 'Hi, you must be %ao-age% to enter' and your verification age is 18, what will be displayed to users is 'Hi, you must be 18 to enter'. This can be useful when using a different verification age for other languages.", 'age-okay' ); ?></p>
						<h3><?php _e( 'Load Style', 'age-okay' ); ?></h3>
						<p class='age_okay_red'><?php _e( 'Age Okay uses three different load types depending on your needs. If you are using a cache plugin, you will need to use one of the two cache load styles.', 'age-okay' ); ?></p>
						<p><b><?php _e( 'Cache', 'age-okay' ); ?></b>: <?php _e( 'The age verification screen is loaded after the page has finished loading using AJAX/Javascript to bypass the caching of the page. There may be a slight delay in the age verification screen showing because of this.', 'age-okay' ); ?></p>
						<p class='age_okay_red'><b><?php _e( 'Cache Preload', 'age-okay' ); ?></b>: <?php _e( 'Because there is a delay with the Cache Load Style, you may want the content of your pages to be hidden until the verification screen loads. This style blurs the content of the page almost immediately, the downside is the blurring will occur on pages even if the verification screen is set to not show on them (no blur in IE).', 'age-okay' ); ?></p>
						<p class='age_okay_red'><b><?php _e( 'Live', 'age-okay' ); ?></b>: <?php _e( 'If you are not using a cache plugin then you should use this style, which will create the age verification screen during page load and will show immediately, rather than using AJAX/Javascript.', 'age-okay' ); ?></p>
						<h3><?php _e( 'Background Type', 'age-okay' ); ?></h3>
						<p><b><?php _e( 'Clear', 'age-okay' ); ?></b>: <?php _e( 'This will show your website as it is, it is recommended to use this option along with the overlay style to create a modal/pop-out type look.', 'age-okay' ); ?></p>
						<p><b><?php _e( 'Colour', 'age-okay' ); ?></b>: <?php _e( 'Your website is covered by a solid colour, you can choose to make it more or less transparent.', 'age-okay' ); ?></p>
						<p><b><?php _e( 'Gradient', 'age-okay' ); ?></b>: <?php _e( 'Similar to the solid colour option, but you choose three colours and a direction, and your background changes from each colour in that direction.', 'age-okay' ); ?></p>
						<p><b><?php _e( 'Pattern', 'age-okay' ); ?></b>: <?php _e( "You can choose a small image to repeat across the screen. You can cover this with a transparent colour by using the 'Overlay Style' tab.", 'age-okay' ); ?></p>
						<p><b><?php _e( 'Image', 'age-okay' ); ?></b>: <?php _e( "Choose a large image that will cover the whole screen. You can cover this with a transparent colour by using the 'Overlay Style' tab.", 'age-okay' ); ?></p>
						<h3><?php _e( 'Overlay Style', 'age-okay' ); ?></h3>
						<p><?php _e( "The overlay style tab only shows when you have chosen the 'Pattern' or 'Image' 'Background Type'. It will show a transparent colour on top of your pattern or image, changing the colour. If you do not want an additional colour, make the 'Overlay Opacity' completely transparent using the slider.", 'age-okay' ); ?></p>
						<h3><?php _e( 'Container Style', 'age-okay' ); ?></h3>
						<p><?php _e( "You can set a colour for the container of your age verification content, which creates a box around it on top of the 'Background Type' you have chosen. Combined with the 'Clear' 'Background Type' you can create a modal/pop-out type look.", 'age-okay' ); ?></p>
						<h3><?php _e( 'Buttons', 'age-okay' ); ?></h3>
						<p><?php _e( 'You can set the colour of your verification screen button(s), and the hover colour when you move your mouse over the button. You can also choose to have an exit button if the user decides not to complete the verification.', 'age-okay' ); ?></p>
						<p><?php _e( "You can make the colour of the exit button different to the submit button by checking the 'Exit button different styling' checkbox. If this is unchecked then it will use the submit button colours.", 'age-okay' ); ?></p>
						<p><?php _e( 'There are three actions for the exit button:', 'age-okay' ); ?></p>
						<p><b><?php _e( 'Previous Page', 'age-okay' ); ?></b>: <?php _e( 'This will redirect the user to the page they were on before the current page.', 'age-okay' ); ?></p>
						<p><b><?php _e( 'Webpage', 'age-okay' ); ?></b>: <?php _e( 'Redirects the user to a specific page.', 'age-okay' ); ?></p>
						<p><b><?php _e( 'Output Text', 'age-okay' ); ?></b>: <?php _e( 'Replace the verification screen content with text explaining that the user cannot enter the site.', 'age-okay' ); ?></p>
						<hr />
						<h1 id='age_okay_docs_section_setts'><?php _e( 'Settings', 'age-okay' ); ?></h1>
						<p><?php _e( "This page allows you to set where the age verification screen should be shown. It will only be shown to a user until they confirm their age.", 'age-okay' ); ?></p>
						<p><b><?php _e( 'Disabled', 'age-okay' ); ?></b>: <?php _e( 'Default option. Verification screen will never be shown, even when using the shortcode (but shortcodes will be hidden).', 'age-okay' ); ?></p>
						<p><b><?php _e( 'Sitewide', 'age-okay' ); ?></b>: <?php _e( 'Show everywhere.', 'age-okay' ); ?></p>
						<p><b><?php _e( 'Show only on', 'age-okay' ); ?></b>: <?php _e( 'The age verification will not be shown until the user goes on one of the pages/posts/etc. you have selected.', 'age-okay' ); ?></p>
						<p><b><?php _e( 'All except', 'age-okay' ); ?></b>: <?php _e( 'The age verification will always show unless the user is on a page/post/etc. you have selected.', 'age-okay' ); ?></p>
						<h3><?php _e( 'By Type', 'age-okay' ); ?></h3>
						<p><?php _e( 'The homepage, and all public post and custom post types are listed here. Check the checkbox of the type of content you want the age verification screen to show on. The age verification screen will show on both the archive and singular pages of a post type.', 'age-okay' ); ?></p>
						<h3><?php _e( 'By Posts/By Pages, ...', 'age-okay' ); ?></h3>
						<p><?php _e( 'This section will list all of the public post types available on your website, giving a dropdown where you can choose specific singular pages/posts/etc.', 'age-okay' ); ?></p>
						<h3 class='age_okay_red'><?php _e( 'By ID', 'age-okay' ); ?></h3>
						<p class='age_okay_red'><?php _e( 'If you want the age verification screen to show on post content that does not have a dropdown menu available as above, you can add its specific ID here. After typing in a number, you must click enter to add it to your list.', 'age-okay' ); ?></p>
						<h3 class='age_okay_red'><?php _e( 'By URL', 'age-okay' ); ?></h3>
						<p class='age_okay_red'><?php _e( 'You can use this section to add URLs to match to. The domain of your website is not included. The URL being matched against will always start with ^/ and end with /$. For example, the page www.website.com/custom_post_type1/post_id_100 will have the matching URL of ^/custom_post_type1/post_id_100/$. If you want to match all custom_post_type1s; you can add the text /custom_post_type1/ , or ^/custom_post_type1/ if it should be the first part of the URL after the domain, or /custom_post_type1/$ if it should be the last part of the URL.', 'age-okay' ); ?></p>
						<p class='age_okay_red'><?php _e( 'Any query string/$_GET variables will be added to the end of the above described URL. An example would be ^/custom_post_type1/post_id_100/$?var1=val1&var2=val2', 'age-okay' ); ?></p>
						<hr />
						<h1 id='age_okay_docs_section_langs' class='age_okay_red'><?php _e( 'Translations', 'age-okay' ); ?></h1>
						<p class='age_okay_red'><?php _e( 'If you are using a manual translation plugin, here you can add the text for other languages for the age verification screen. You cannot change the default content here, you can do that in the Editor page.', 'age-okay' ); ?></p>
						<p class='age_okay_red'><?php _e( 'The language used is based off the <a href="https://codex.wordpress.org/Function_Reference/get_locale">get_locale()</a> WordPress function. This is usually based on the locale of the page a user is on, e.g. www.example.com/my_page would load the default age verification content whilst www.example.com/fr/my_page would load the French content.', 'age-okay' ); ?></p>
						<p class='age_okay_red'><?php _e( "At the top of the page you will have a locale selection dropdown. This dropdown is populated by the available locales on your website, which are usually added through a language plugin. You can also go into 'Settings' -> 'General' -> 'Site Language'. If you choose a new language here and then save the page, the new language will be added to your WordPress admin and the locale will become available in the dropdown.", 'age-okay' ); ?></p>
						<p class='age_okay_red'><?php _e( 'The default content for your verification screen will be loaded in on the left side of the page, this includes every text content option whether you are currently using it or not, so that you can preemptively put in your translations. Choose the locale you want to translate by changing the value of the locale dropdown, and text fields will be loaded in on the right side of the page.', 'age-okay' ); ?></p>
						<p class='age_okay_red'><?php _e( 'All values, when left blank, will inherit the value of the default content. Add some content to overwrite the default content.', 'age-okay' ); ?></p>
						<p class='age_okay_red'><?php _e( 'The verification age is special, because it is also the value for the %ao-age% placeholder. If you leave the verification age blank then the placeholder will be substituted with the default verification age, and if you give the locale its own verification age this will be used instead.', 'age-okay' ); ?></p>
						<p class='age_okay_red'><?php _e( 'Save your new translation and that is it. When the user goes to a page on your website that uses a different locale, this will be loaded in instead. If you decide you want to use the default content instead, just delete your translations by loading in your locale, scrolling down, and clicking on the red delete button.', 'age-okay' ); ?></p>
						<hr />
						<h1 id='age_okay_docs_section_hooks'><?php _e( 'Loading, Filters, Shortcodes', 'age-okay' ); ?></h1>
						<p><?php _e( 'The aim of this plugin is to make it as customisable as possible without needing to be able to write code, so all of the customisation of the content and styling can be done from within the editor page.', 'age-okay' ); ?></p>
						<p><?php _e( 'If you want to fully change the structure of the verification screen itself, you can do so from the age-okay-public-verify.php file in the plugins/age_okay/public/partials folder. However, be aware that updating the plugin would overwrite your changes. If you want to change any of the styling, it is recommended to do so within an external CSS stylesheet.', 'age-okay' ); ?></p>
						<h3><?php _e( 'Loading Logic', 'age-okay' ); ?></h3>
						<p><?php _e( 'The way this plugin decides which page/post to show the age verification screen is based on the following order', 'age-okay' ); ?>:</p>
						<p class='age_okay_red'><?php _e( '1. Any shortcodes in the page/post content', 'age-okay' ); ?></p>
						<p class='age_okay_red'><?php _e( '2. The age_okay_filter filter', 'age-okay' ); ?></p>
						<p><?php _e( '3. The settings page', 'age-okay' ); ?></p>
						<h3 class='age_okay_red'><?php _e( 'Shortcodes', 'age-okay' ); ?></h3>
						<p class='age_okay_red'><b>[age_okay]</b></p>
						<p class='age_okay_red'><?php _e( 'If you place this in the content of a post or page then the age verification will show on it, ignoring any filters or settings in the settings page.', 'age-okay' ); ?></p>
						<p class='age_okay_red'><b>[age_okay hide=true]</b></p>
						<p class='age_okay_red'><?php _e( 'If you place this in the content of a post or page then the age verification will never show on it, ignoring any filters or settings in the settings page.', 'age-okay' ); ?></p>
						<p class='age_okay_red'><?php _e( 'If you choose the disabled option in the settings page, the verification screen will never show, however, the shortcode will be hidden so it does not need to be removed from the content.', 'age-okay' ); ?></p>
						<h3 class='age_okay_red'><?php _e( 'Filters', 'age-okay' ); ?></h3>
						<p class='age_okay_red'><b>age_okay_filter</b></p>
						<p class='age_okay_red'><?php _e( 'Usage', 'age-okay' ); ?>: <b>add_filter( 'age_okay_filter', function(){ return null;} );</b></p>
						<p class='age_okay_red'><?php _e( 'Return values', 'age-okay' ); ?>:</p>
						<p class='age_okay_red'><b><?php _e( '(bool) true', 'age-okay' ); ?></b> - <?php _e( 'show the verification screen', 'age-okay' ); ?></p>
						<p class='age_okay_red'><b><?php _e( '(bool) false', 'age-okay' ); ?></b> - <?php _e( 'do not show the verification screen', 'age-okay' ); ?></p>
						<p class='age_okay_red'><b><?php _e( '(NULL) null', 'age-okay' ); ?></b> - <?php _e( 'use the settings page to decide whether to show or not', 'age-okay' ); ?></p>
						<p class='age_okay_red'><?php _e( 'This filter allows a developer to specify their own checks for what pages/posts the age verification screen should show on. If the return value is the boolean true or false, then it will ignore the settings of the settings page. It will, however, be ignored by any pages/posts that have a shortcode placed on them.', 'age-okay' ); ?></p>
						<p class='age_okay_red'><?php _e( 'Example', 'age-okay' ); ?>: <b>add_filter( 'age_okay_filter', function(){ if( is_home() ) { return false;} } );</b></p>
						<p class='age_okay_red'><?php _e( 'In the example above, the age verification screen will not show on the homepage because the function is returning boolean false.', 'age-okay' ); ?></p>
						<hr />
						<h1 id='age_okay_docs_section_files'><?php _e( 'Files', 'age-okay' ); ?></h1>
						<p><?php _e( "It is not recommended to change any files in the age-okay plugin folder, because an update to the plugin will overwrite these. If you need to make any style changes, it is recommended to do so in an external stylesheet.", 'age-okay' ); ?></p>
						<div>
							<p><b>age-okay.php</b> - <?php _e( "Initiates the plugin and holds the plugin information.", 'age-okay' ); ?></p>
							<h3>admin</h3>
							<p><b>class-age-okay-admin.php</b> - <?php _e( "Contains admin-specific functionality of the plugin.", 'age-okay' ); ?></p>
							<h3>admin/css</h3>
							<p><b>age-okay-admin.css</b> - <?php _e( "Contains styling for the WordPress admin pages.", 'age-okay' ); ?></p>
							<p><b>age-okay-admin-min.css</b> - <?php _e( "A minified version of age-okay-admin.css", 'age-okay' ); ?></p>
							<h3>admin/js</h3>
							<p><b>age-okay-admin.js</b> - <?php _e( "Contains all javascript functionality for the WordPress admin pages.", 'age-okay' ); ?></p>
							<p><b>age-okay-admin-min.js</b> - <?php _e( "A minified version of age-okay-admin.js", 'age-okay' ); ?></p>
							<h3>admin/partials</h3>
							<p><b>age-okay-admin-docs.php</b> - <?php _e( "Template for Documentation page in the admin area.", 'age-okay' ); ?></p>
							<p><b>age-okay-admin-editor.php</b> - <?php _e( "Template for Editor page in the admin area.", 'age-okay' ); ?></p>
							<p><b>age-okay-admin-langs.php</b> - <?php _e( "Template for Translations page in the admin area.", 'age-okay' ); ?></p>
							<p><b>age-okay-admin-settings.php</b> - <?php _e( "Template for Settings page in the admin area.", 'age-okay' ); ?></p>
							<h3>docs</h3>
							<p><b>Documentation - Age Okay.pdf</b> - <?php _e( "A PDF version of the Documentation page.", 'age-okay' ); ?></p>
							<h3>includes</h3>
							<p><b>class-age-okay.php</b> - <?php _e( "Defines the core plugin class, loads dependencies.", 'age-okay' ); ?></p>
							<p><b>class-age-okay-i18n.php</b> - <?php _e( "Defines internationalization functionality.", 'age-okay' ); ?></p>
							<p><b>class-age-okay-loader.php</b> - <?php _e( "Orchestrates the hooks of the plugin.", 'age-okay' ); ?></p>
							<p><b>class-age-okay-shared.php</b> - <?php _e( "Defines all shared properties and methods for both admin and public functionality.", 'age-okay' ); ?></p>
							<h3>languages</h3>
							<p><?php _e( "This folder holds all of the po and mo files for multilingual translation of any static text within the admin pages and verification screen.", 'age-okay' ); ?></p>
							<h3>public</h3>
							<p><b>class-age-okay-public.php</b> - <?php _e( "Contains the public-facing functionality of the plugin.", 'age-okay' ); ?></p>
							<h3>public/css</h3>
							<p><b>age-okay-public.css</b> - <?php _e( "Contains all of the static styling for the age verification screen", 'age-okay' ); ?></p>
							<p><b>age-okay-public-ie9.css</b> - <?php _e( "Contains a small amount of additional styling for Internet Explorer 9, due to an incompatibility with placeholders in input elements. Will only be loaded on IE9.", 'age-okay' ); ?></p>
							<p><b>age-okay-public-ie9-min.css</b> - <?php _e( "A minified version of age-okay-public-ie9.css", 'age-okay' ); ?></p>
							<p><b>age-okay-public-min.css</b> - <?php _e( "A minified version of age-okay-public.css", 'age-okay' ); ?></p>
							<h3>public/js</h3>
							<p><b>age-okay-public.js</b> - <?php _e( "Contains all javascript functionality for the verification screen.", 'age-okay' ); ?></p>
							<p><b>age-okay-public-min.js</b> - <?php _e( "A minified version of age-okay-public.js", 'age-okay' ); ?></p>
							<h3>public/partials</h3>
							<p><b>age-okay-public-verify.php</b> - <?php _e( "Template for verification screen displayed to users. Generates inline dynamic style set in Editor admin page.", 'age-okay' ); ?></p>
						</div>
					</td>
					<td id='age_okay_docs_nav'>
						<div class='age_okay_docs_nav_box'>
							<p><?php _e( 'Content', 'age-okay' ); ?>:</p>
							<a href='#age_okay_docs_section_dets'><?php _e( 'Details', 'age-okay' ); ?></a>
							<a href='#age_okay_docs_section_intro'><?php _e( 'Intro', 'age-okay' ); ?></a>
							<a href='#age_okay_docs_section_install'><?php _e( 'Installation', 'age-okay' ); ?></a>
							<a href='#age_okay_docs_section_usage'><?php _e( 'Usage', 'age-okay' ); ?></a>
							<a href='#age_okay_docs_section_editor'><?php _e( 'Editor', 'age-okay' ); ?></a>
							<a href='#age_okay_docs_section_setts'><?php _e( 'Settings', 'age-okay' ); ?></a>
							<a href='#age_okay_docs_section_langs'><?php _e( 'Translations', 'age-okay' ); ?></a>
							<a href='#age_okay_docs_section_hooks'><?php _e( 'Loading, Filters, Shortcodes', 'age-okay' ); ?></a>
							<a href='#age_okay_docs_section_files'><?php _e( 'Files', 'age-okay' ); ?></a>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
