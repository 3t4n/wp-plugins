<?php


//If it's the customizer then hook into the previewer, otherwise just run the func as normal

global $wp_customize;
if ( isset( $wp_customize ) ) {
	add_action('customize_preview_init', 'j7hft_insert_custom_header_locator');
	add_action('customize_preview_init', 'j7hft_custom_header_styling');

} else{
	j7hft_insert_custom_header_locator();
	j7hft_custom_header_styling();
}



// Function to determine which location to insert it into based on user settings.

function j7hft_insert_custom_header_locator(){
	global $element_header;
	$element_header = 'header';
	$settings =  FLCustomizer::get_mods();

	if ( true == isset($settings['bbp_hftcustom_header_location'])){
		$location = $settings['bbp_hftcustom_header_location'];
	} else {
		$location = "0";
	}

	if ($location == false OR $location == "0" || $location == "header_none" ){
		return false;
	} elseif ($location == "header_above_page"){
		$element_header = "header";
		$location = 'fl_body_open';
		add_action( $location , 'j7hft_insert_custom_header_template' );
	} elseif ($location == "header_above_top_bar"){
		$element_header = "header";
		$location = 'fl_before_top_bar';
		add_action( $location , 'j7hft_insert_custom_header_template' );

	} elseif ($location == "header_above_default_header"){
		$element_header = "header";
		$location = 'fl_before_header';
		add_action( $location , 'j7hft_insert_custom_header_template' );

	} elseif ($location == "header_above_content"){
		$element_header = "header";
		$location = 'fl_before_content';
		add_action( $location , 'j7hft_insert_custom_header_template' );
	}

}


// This function checks the page is suitable and then inserts it into where specified.

function j7hft_insert_custom_header_template() {

	if (get_page_template_slug() !== 'tpl-no-header-footer.php' )
	{
		$settings =  FLCustomizer::get_mods();
		if ($settings['bbp_hftcustom_header_absolute'] == 'insert_all' ||
			$settings['bbp_hftcustom_header_absolute'] == 'overlay_all' ||
			$settings['bbp_hftcustom_header_absolute'] == 'fixed_all' ||
			$settings['bbp_hftcustom_header_absolute'] == 'overlay_homepage_insertrest' ||
			$settings['bbp_hftcustom_header_absolute'] == 'fixed_homepage_insertrest')
		{
			global $element_header;
			$template = $settings['bbp_hftcustom_header_template'];
			if ($template !== '' )
			{
				echo '<'. $element_header .' id="djcustom-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">' . do_shortcode('[fl_builder_insert_layout id="'.$template.'"]') . '</'. $element_header . '>';
			}

		}
		else if( is_front_page())
		{
			global $element_header;
			$template = $settings['bbp_hftcustom_header_template'];
			if ($template !== '' )
			{
				echo '<'. $element_header .' id="djcustom-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">' . do_shortcode('[fl_builder_insert_layout id="'.$template.'"]') . '</'. $element_header . '>';
			}
		}
	}

}


function j7hft_custom_header_styling()
{
	$settings =  FLCustomizer::get_mods();
	add_action( 'wp_head', 'j7hft_header_styling');
	if ( isset($settings['bbp_hftcustom_header_opacity']) && $settings['bbp_hftcustom_header_opacity'] !== 'false')
	{
		add_action( 'wp_head', 'j7hft_header_opacity_styling');
	}

	// if ( $settings['j7hft_header_onslide_styling'] !== 'false')
	// {
	// 	add_action( 'wp_head', 'j7hft_header_onslide_styling');
	// }
}



function j7hft_header_styling()
{
	$settings =  FLCustomizer::get_mods();

	$inserthomespacer = '';
	if ($settings['bbp_hftcustom_header_absolute'] == 'overlay_homepage' ||
		$settings['bbp_hftcustom_header_absolute'] == 'fixed_homepage' ||
		$settings['bbp_hftcustom_header_absolute'] == 'insert_homepage' ||
		$settings['bbp_hftcustom_header_absolute'] == 'overlay_homepage_insertrest' ||
		$settings['bbp_hftcustom_header_absolute'] == 'fixed_homepage_insertrest')
	{
		$inserthomespacer = '.home';
	}


	$csspositiontype = '';
	if ($settings['bbp_hftcustom_header_absolute'] == 'fixed_homepage' ||
		$settings['bbp_hftcustom_header_absolute'] == 'fixed_all' ||
		$settings['bbp_hftcustom_header_absolute'] == 'fixed_homepage_insertrest')
	{
		$csspositiontype = 'fixed';

	}
	else if ($settings['bbp_hftcustom_header_absolute'] == 'overlay_homepage' ||
		$settings['bbp_hftcustom_header_absolute'] == 'overlay_all' ||
		$settings['bbp_hftcustom_header_absolute'] == 'overlay_homepage_insertrest')
	{
		$csspositiontype = 'absolute';
	}
	else if ($settings['bbp_hftcustom_header_absolute'] == 'insert_homepage' ||
		$settings['bbp_hftcustom_header_absolute'] == 'insert_all')
	{
		$csspositiontype = 'relative';
	}

	if ( is_archive() || is_author() || is_category() || is_tag() || 'post' == get_post_type())
	{
		$csspositiontype = 'relative';
	}



	$admin_bb_bars_css = '';
	if ($settings['bbp_hftcustom_header_absolute'] == 'fixed_homepage' ||
		$settings['bbp_hftcustom_header_absolute'] == 'fixed_all' ||
		$settings['bbp_hftcustom_header_absolute'] == 'fixed_homepage_insertrest')
	{
		//set the adminbar
		$admin_bb_bars_css .= $inserthomespacer.'.admin-bar #djcustom-header{
			top: 32px;
			z-index: 99999;}';

		// version is greater than alpha
		if ( version_compare( FL_BUILDER_VERSION, '2.00-alpha.1', '>' ) )
		{
			$admin_bb_bars_css .= '.fl-builder-edit '.$inserthomespacer.' #djcustom-header{
			top:48px;}';
		}
		else
		{
			$admin_bb_bars_css .= '.fl-builder-edit '.$inserthomespacer.' #djcustom-header{
			top:43px;}';
		}

		$admin_bb_bars_css .= $inserthomespacer.' #djcustom-header{
			z-index: 99999;}';

	}


	//override for bbuilder editor
	$admin_bb_bars_css .= '.fl-builder-edit #djcustom-header{
		z-index: 100007;}';

//override for bbuilder
		$admin_bb_bars_css .= '.fl-builder-edit #djcustom-header:hover:before{
			content: "Click Here to Disable Header Overlay Effects In Editor";
			font-size: 12px;
			position: absolute;
			text-decoration: underline;
			z-index: 10;
			pointer-events: none;
		}';

//override changes in editor
		echo "<script>
		jQuery(document).ready(function(){
			jQuery('#djcustom-header').click(function(){
				jQuery('.fl-builder-edit #djcustom-header').css('position','relative').css('top','0').css('z-index','0');
			});
		});
	</script>";





		echo '<style type="text/css">
				#djcustom-header{
		position: relative;
		width: 100%;
		top: 0;
		left: 0;
		z-index: 30;
	}
	'.$inserthomespacer.' #djcustom-header
	{
		position: '.$csspositiontype.';
	}
	'.$admin_bb_bars_css.'
	</style>';

}



function j7hft_header_opacity_styling()
{
	$settings =  FLCustomizer::get_mods();

	if ( is_archive() || is_author() || is_category() || is_tag() || 'post' == get_post_type())
	{
		return;
	}

	if ($settings['bbp_hftcustom_header_opacity'] == 'homepage')
	{
		echo '<script>
		jQuery(document).ready(function(){

			var colour = jQuery(".home #djcustom-header .fl-row-content-wrap").css("backgroundColor");

			if (typeof colour != "undefined")
			{
				colour = rgbtorgba(colour);
			}

			if (typeof colour != "undefined")
			{
				var new_rgba_str = "rgba(" + colour.substring(colour.lastIndexOf("(")+1,colour.lastIndexOf(",")) + ", '.$settings["bbp_hftcustom_header_opacity_alpha"].')";
				jQuery(".home #djcustom-header .fl-row-content-wrap").css("backgroundColor",new_rgba_str);
			}

			function rgbtorgba(bg){
				if(bg.indexOf("a") == -1)
				{
					var result = bg.replace(")", ", '.$settings["bbp_hftcustom_header_opacity_alpha"].')").replace("rgb", "rgba");
					return result;
				}
				else
				{
					return bg;
				}
			}
		});
	</script>';
	}
	else //all pages
	{

		echo '<script>
		jQuery(document).ready(function(){

			var colour = jQuery("#djcustom-header .fl-row-content-wrap").css("backgroundColor");

			if (typeof colour != "undefined")
			{
				colour = rgbtorgba(colour);
			}

			if (typeof colour != "undefined")
			{
				var new_rgba_str = "rgba(" + colour.substring(colour.lastIndexOf("(")+1,colour.lastIndexOf(",")) + ", '.$settings["bbp_hftcustom_header_opacity_alpha"].')";
				jQuery("#djcustom-header .fl-row-content-wrap").css("backgroundColor",new_rgba_str);
			}

			function rgbtorgba(bg){
				if(bg.indexOf("a") == -1)
				{
					var result = bg.replace(")", ", '.$settings["bbp_hftcustom_header_opacity_alpha"].')").replace("rgb", "rgba");
					return result;
				}
				else
				{
					return bg;
				}
			}
		});
	</script>';
	}

}












// function j7hft_header_onslide_styling()
// {
// 	$settings =  FLCustomizer::get_mods();

// 	if ( is_archive() || is_author() || is_category() || is_tag() || 'post' == get_post_type())
// 	{
// 		return;
// 	}

// 		echo '<script>
// 			setInterval(function(){
// 			hasScrolled();
// 			},500);



// 			function hasScrolled() {

// 			if (jQuery(window).scrollTop() > 0 ){
// 			jQuery("#djcustom-header").animate({maxHeight: "0px"}, 400);
// 			}
// 			else
// 			{
// 			jQuery("#djcustom-header").animate({maxHeight: "200px"}, 400);
// 			}


// 			}
// 	</script>';


// echo '<style>

// #djcustom-header
// {
//   -webkit-transition: -webkit-transform 1s cubic-bezier(0.86, 0, 0.07, 1);
//   -moz-transition: -moz-transform 1s cubic-bezier(0.86, 0, 0.07, 1);
//   transition: transform 1s cubic-bezier(0.86, 0, 0.07, 1);
//   transition: top 0.2s ease-in-out;
//   overflow: hidden;
// }

// #djcustom-header.djhidden
//   {
//   }



// </style>';

// }