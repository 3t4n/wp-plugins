<?php 

define('AR_SIMPLE_SS_PLUGIN_URL', plugins_url());

$options = array(

	/*

     * 

     * General Settings Section

     * 

     */

	

    array(

        "type" => "section",

        "icon" => "acera-icon-home",

        "title" => "General Settings",

        "id" => "general",

        "expanded" => "true"

    ),

    

	    array(

	        "section" => "general",

	        "type" => "heading",

	        "title" => "Select Icons",

	        "id" => "general-visual"

	    ),

	    	array(

	        "under_section" => "general-visual",

	        "type" => "text",

	        "name" => "Title",

	        "display_checkbox_id" => "ar_title_show",

	        "default" => "Share on Social Networks",

	        "id" => "ar_title_id",

	        "desc" => "Put the title here.",),



			array(

		        "under_section" => "general-visual",

		        "type" => "select",

		        "name" => "Title Font",

		        "display_checkbox_id" => "ar_title_font_check",

		        "options" => array("Great Vibes", "PT Sans", "EB Garamond", "Alegreya Sans SC", "Coming Soon", "Other(Use another Google Font)"), //Required

		        "default" => "Great Vibes",

		        "id" => "ar_title_font",

		        "desc" => "Select Font for Title",),



			array(

		    "under_section" => "general-visual",

			"type" => "checkbox",

			"name" => "<strong>Use Another Google Font</strong>",

			"id" => array( "ar_custom_font" ),				

			"options" => array("Use Another Google Font."),

		        "desc" => "Please select other in the previous option, check this one & put the font name in next text input.",

			"default" => array("not")),

		    

		    array(

		        "type" => "toggle_div_start",

		        "display_checkbox_id" => "ar_custom_font",

		        "under_section" => "general-visual",

		    ), 



		    	array(

	        "under_section" => "general-visual",

	        "type" => "text",

	        "name" => "Font Name",

	        //"display_checkbox_id" => "ar_custom_font_name",

	        "default" => "Custom font name",

	        "id" => "ar_font_name",

	        "desc" => "Go to http://www.google.com/fonts/ -> Choose the font & put full name of font here.",),



		   array(

		        "type" => "toggle_div_end",

		        "under_section" => "general-visual",

		    ),  	

		    array(

		    "under_section" => "general-visual", //Required

		    "type" => "checkbox_image", //Required

		    "name" => "Icons", //Required

		    "show_labels" => "false",

		    "display_checkbox_id" => "toggle_checkbox_id",

		    "image_src" => array(

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/facebook.png",

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/twitter.png",

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/pinterest.png",

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/google_plus.png",

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/reddit.png",

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/stumbleupon.png",

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/digg.png",

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/tumblr.png",

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/linkedin.png",

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/blogger.png",

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/delicious.png"

		    		),

		    "image_size" => array("32"),

		    "id" => array("show_facebook", "show_twitter", "show_pinterest", "show_google_plus", "show_reddit", "show_stumbleupon", "show_digg", "show_tumblr", "show_linkedin", "show_blogger", "show_delicious"), //Required

		    "options" => array("Facebook", "Twitter", "Pinterest", "Google Plus", "Reddit", "StumbleUpon", "Digg", "Tumblr", "Linkedin", "Blogger", "Delicious"), //Required

		    "desc" => "Select icons that you want to appear on Sharing popup. <br />Default : All Selected",

		    "default" => array("checked", "checked", "checked", "checked", "checked", "checked", "checked", "checked", "checked", "checked", "checked")),


			array(

	        "under_section" => "general-visual",

	        "type" => "text",

	        "name" => "Facebook Title",

	        //"display_checkbox_id" => "ar_custom_font_name",

	        "default" => "Share on Facebook",

	        "id" => "ar_fb_title",

	        "desc" => "Change Share on facebook text.",),

	        array(

	        "under_section" => "general-visual",

	        "type" => "text",

	        "name" => "Twitter Title",

	        //"display_checkbox_id" => "ar_custom_font_name",

	        "default" => "Share on Twitter",

	        "id" => "ar_twitter_title",

	        "desc" => "Change Share on twitter text.",),


	        array(

	        "under_section" => "general-visual",

	        "type" => "text",

	        "name" => "Pinterest Title",

	        //"display_checkbox_id" => "ar_custom_font_name",

	        "default" => "Share on Pinterest",

	        "id" => "ar_pinterest_title",

	        "desc" => "Change Share on pinterest text.",),

	        array(

	        "under_section" => "general-visual",

	        "type" => "text",

	        "name" => "Google Plus Title",

	        //"display_checkbox_id" => "ar_custom_font_name",

	        "default" => "Share on Google Plus",

	        "id" => "ar_google_plus_title",

	        "desc" => "Change Share on Google Plus text.",),

	        array(

	        "under_section" => "general-visual",

	        "type" => "text",

	        "name" => "Reddit Title",

	        //"display_checkbox_id" => "ar_custom_font_name",

	        "default" => "Share on Reddit",

	        "id" => "ar_reddit_title",

	        "desc" => "Change Share on Reddit text.",),


	        array(

	        "under_section" => "general-visual",

	        "type" => "text",

	        "name" => "Stumbleupon Title",

	        //"display_checkbox_id" => "ar_custom_font_name",

	        "default" => "Share on Stumbleupon",

	        "id" => "ar_stumbleupon_title",

	        "desc" => "Change Share on stumbleupon text.",),

	        array(

	        "under_section" => "general-visual",

	        "type" => "text",

	        "name" => "Digg Title",

	        //"display_checkbox_id" => "ar_custom_font_name",

	        "default" => "Share on Digg",

	        "id" => "ar_digg_title",

	        "desc" => "Change Share on Digg text.",),

	        array(

	        "under_section" => "general-visual",

	        "type" => "text",

	        "name" => "Tumblr Title",

	        //"display_checkbox_id" => "ar_custom_font_name",

	        "default" => "Share on Tumblr",

	        "id" => "ar_tumblr_title",

	        "desc" => "Change Share on Tumblr text.",),

	        array(

	        "under_section" => "general-visual",

	        "type" => "text",

	        "name" => "Linkedin Title",

	        //"display_checkbox_id" => "ar_custom_font_name",

	        "default" => "Share on Linkedin",

	        "id" => "ar_linkedin_title",

	        "desc" => "Change Share on linkedin text.",),

	        array(

	        "under_section" => "general-visual",

	        "type" => "text",

	        "name" => "Blogger Title",

	        //"display_checkbox_id" => "ar_custom_font_name",

	        "default" => "Share on Blogger",

	        "id" => "ar_blogger_title",

	        "desc" => "Change Share on Blogger text.",),

	        array(

	        "under_section" => "general-visual",

	        "type" => "text",

	        "name" => "Delicious Title",

	        //"display_checkbox_id" => "ar_custom_font_name",

	        "default" => "Share on Delicious",

	        "id" => "ar_delicious_title",

	        "desc" => "Change Share on delicious text.",),


	    array(

	        "section" => "general",

	        "type" => "heading",

	        "title" => "Select Style",

	        "id" => "general-style"

	    ),	



			array(

		    "under_section" => "general-style", //Required

		    "type" => "radio_image", //Required

		    "name" => "Select Style", //Required

		    "show_labels" => "false",

		    "display_checkbox_id" => "toggle_checkbox_id",

		    "image_src" => array(

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/style-1.png",

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/style-2.png",

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/style-3.png",

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/style-4.png",

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/style-5.png",

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/style-6.png",

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/style-7.png",

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/style-8.png",

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/style-9.png",

		    		AR_SIMPLE_SS_PLUGIN_URL . "/ar-simple-social-share/images/style-10.png"

		    		),

		    "image_size" => array("32"),

		    "id" => "s-style", //Required

		    "options" => array("1", "2", "3", "4", "5", "6", "7", "8", "9", "10"), //Required

		    "desc" => "Select icons that you want to appear on Sharing popup. <br />Default : Style 1",

		    "default" => "1"),





	    array(

	        "section" => "general",

	        "type" => "heading",

	        "title" => "Visiblity",

	        "id" => "general-general"

	    ),

	    

		    array(

			     "under_section" => "general-general",

				"type" => "checkbox",

				"name" => "<strong>Show Social Sharing On</strong>",

				"id" => array( "to_excerpt", "to_single", "to_page"),				

				"options" => array("Automatically show after Excerpt", "Automatically show after Content (Post)", "Automatically show after Content (Page)"),

			        "desc" => "Choose if you want the sharing option to show automatically after excerpt & content.",

				"default" => array("checked", "checked", "checked",)),


		    array(
			    "under_section" => "general-general", //Required
			    "type" => "radio", //Required
			    "name" => "Effect", //Required
			    "id" => "effect", //Required
			    "display_checkbox_id" => "toggle_checkbox_id",
			    "options" => array("Hover", "Direct"), //Required
			    "desc" => "Select how you want the social sharing icons to appear. Direct: Icons will be displayed without any effect. 
			    Hover: Icons will appear whebn mouseover the Social Share text/Title",
			    "default" => "Hover"),

		    

	    

	    array(

	        "section" => "general",

	        "type" => "heading",

	        "title" => "Credits",

	        "id" => "general-credit"

	    ),

	    

	    array(

		    "under_section" => "general-credit",

			"type" => "checkbox",

			"name" => "",

			"id" => array(),				

			"options" => array(),

		        "desc" => "<h3>Ar Simple Social Share</h3>

		        <p><strong>This plugin is brought to you by AR WP Themes.</strong><br />We are working on Developing

		        more WordPress Themes & Plugins. Stay in touch :) <br /> Don't forget to visit our website

	    		Join our mailing list.<br />

	    		Website: <a href='http://arwpthemes.com'>www.arwpthemes.com</a><br />

	    		<br />

	    		We send occassional updates on many wordpress issues & also about our new products. You can 

	    		also subscribe to the list. We never spam.<br />

	    		<strong><a href='http://eepurl.com/EthR9' target='_blank'>Subscribe to our Newsletter.</a></strong>

		        </p>

		        <h2>Next Update!</h2><br />

		        <p>We will add more social networks in later versions. You can suggest some popular sites.

		        Simply send an email to mamb2b.awal@gmail.com</p>

		        <br />

		        <h1>Thank You <br /><br />

		        Ar WP Themes</h1>

		        ",

			"default" => array()),

    /*

     * 

     *  = General Settings Section

     * 

     */
    );
?>