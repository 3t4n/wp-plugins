<?php
class DDSOO_data{
	public $default=["name"=>"", "title"=>"", "Active"=>false, "mandatory"=>false, "publish"=>false, "json"=>false, "type"=>"input", "subtype"=>"", "options"=>[]];
	public function __construct(){
		
	}
	public function properties(){
	    $description = array(
	        'businessId'  => "This ensures that your Storefront button links to the correct business. Copy your Business ID from your Storefront page and paste it here.",
            'buttonText'  => "This text will be displayed on your button. We suggest something actionable like \"Order Online.\"",
            'position' => "Choose where you want your button to be positioned in the context of your webpage. Your button will float above your page content.",
            'buttonBackgroundColor' => "Customize the color of your button.",
            'floatingBar' => "Add a background behind your button to make it stand out more (Optional). This is recommended if you have lots of imagery on your website.",
            'backgroundColor' => "Change the color of this background. We recommend choosing a color that contrasts with your button so it can stand out more.",
        );
	    $info_description_html =  array (
            'businessId'      => '<div class="-settings-title-info"><span class="-settings-tooltip-wrapper"><img class="-settings-img-info" src="'.DDSOO_IMG.'info_icon.png"/><span class="-tooltip-description">'.$description['businessId'].'</span></span><span class="-title-tag">Business ID</span></div>',
            'buttonText'      => '<div class="-settings-title-info"><span class="-settings-tooltip-wrapper"><img class="-settings-img-info" src="'.DDSOO_IMG.'info_icon.png"/><span class="-tooltip-description">'.$description['buttonText'].'</span></span><span class="-title-tag">Button Text</span></div>',
            'position'      => '<div class="-settings-title-info"><span class="-settings-tooltip-wrapper"><img class="-settings-img-info" src="'.DDSOO_IMG.'info_icon.png"/><span class="-tooltip-description">'.$description['position'].'</span></span><span class="-title-tag">Button Position</span></div>',
            'buttonBackgroundColor'      => '<div class="-settings-title-info"><span class="-settings-tooltip-wrapper"><img class="-settings-img-info" src="'.DDSOO_IMG.'info_icon.png"/><span class="-tooltip-description">'.$description['buttonBackgroundColor'].'</span></span><span class="-title-tag">Button Color</span></span></div>',
            'floatingBar'      => '<div class="-settings-title-info"><span class="-settings-tooltip-wrapper"><img class="-settings-img-info" src="'.DDSOO_IMG.'info_icon.png"/><span class="-tooltip-description">'.$description['floatingBar'].'</span></span><span class="-title-tag">Add Background Behind Button</span></div>',
            'backgroundColor'      => '<div class="-settings-title-info"><span class="-settings-tooltip-wrapper"><img class="-settings-img-info" src="'.DDSOO_IMG.'info_icon.png"/><span class="-tooltip-description">'.$description['backgroundColor'].'</span></span><span class="-title-tag">Background Color</span></div>',
        );
		$o=[
			["name"=>"businessId",
				"title"=>$info_description_html['businessId'], "mandatory"=>true, "required"=>true,  "type"=>"input", "subtype"=>"number",				
			],
			/*["name"=>"storeId", 
				"title"=>"Anchor store ID", "mandatory"=>true, "required"=>true, "type"=>"input", "subtype"=>"number",	
			],
			["name"=>"businessSlug", 
				"title"=>"Business Slug", "mandatory"=>true, "required"=>true, "type"=>"input", "subtype"=>"text",	
			],*/ 
			["name"=>"buttonText", 
				"title"=>$info_description_html['buttonText'], "mandatory"=>true, "publish"=>false, "default_value"=>"Order Online", "type"=>"input", "subtype"=>"text"			
			],	
			/*["name"=>"subDomain", 
				"title"=>"Sub Domain", "publish"=>false, "advanced"=>true, "type"=>"input", "subtype"=>"text",	
			],*/
			["name"=>"position", 
				"title"=>$info_description_html['position'], "publish"=>false, "advanced"=>true,"type"=>"select", "subtype"=>"text",	
				"options"=>[
					["text"=>"Select position", "value"=>""],
					["text"=>"Top Left", "value"=>"top_left"],
					["text"=>"Top Center", "value"=>"top_center"],
					["text"=>"Top Right", "value"=>"top_right"],
                    ["text"=>"Bottom Left", "value"=>"bottom_left"],
					["text"=>"Bottom Center", "value"=>"bottom_center"],
					["text"=>"Bottom Right", "value"=>"bottom_right"],
				]
			],
			["name"=>"buttonBackgroundColor", 
				"title"=>$info_description_html['buttonBackgroundColor'], "publish"=>false, "advanced"=>true, "default_value"=>"#ff0000", "type"=>"input", "subtype"=>"text", "color"=>true,
			],
			/*["name"=>"buttonTextColor", 
				"title"=>"Button text color", "publish"=>false, "advanced"=>true,"default_value"=>"#ffffff", "type"=>"input", "subtype"=>"text", "color"=>true,
			],*/
			/*["name"=>"generateStoreUrl", 
				"title"=>"Generate store Url", "publish"=>false, "type"=>"select", "subtype"=>"text",	
				"options"=>[
					["text"=>"True", "value"=>1],
					["text"=>"False", "value"=>0],
				]
			],*/
			/*["name"=>"buttonAlignment", 
				"title"=>"Button alignment", "publish"=>false, "advanced"=>true, "type"=>"select", "subtype"=>"text",	
				"options"=>[
					["text"=>"Select alignment", "value"=>""],
					["text"=>"Left", "value"=>"left"],
					["text"=>"Center", "value"=>"center"],
					["text"=>"Right", "value"=>"right"],				
				]
			],*/
			/*["name"=>"buttonWidth", 
				"title"=>"Button Width", "publish"=>false, "type"=>"input", "subtype"=>"text",				
			],	*/
			
			/*["name"=>"urlParams", 
				"title"=>"Url Params", "publish"=>false, "type"=>"textarea", "subtype"=>"text",	"json"=>true			
			],*/
			/*floating Bar
			floatingBar - false - Makes it to render floating bar - true/false
			barHeight -72px - 
			backgroundColor - '#ffffff' (white color) - Background color for the floating bar,use ('transparent' for a transparentbackground) - any valid css color value
			borderColor - '#E7E7E7' (light grey) - The top/bottom border for bar use 'transparent' for no border - any valid css color
			zIndex - 1000 - If the site has many floating items, what display priority this bar has - an positive integer value
			*/
			["name"=>"floatingBar", 
				"title"=>$info_description_html['floatingBar'], "publish"=>false, "advanced"=>true, "type"=>"select", "subtype"=>"text",	
				"options"=>[
					["text"=>"Select", "value"=>""],
					["text"=>"No", "value"=>0],
					["text"=>"Yes", "value"=>1],
				]
			],	
			["name"=>"backgroundColor", 
				"title"=>$info_description_html['backgroundColor'], "publish"=>false, "advanced"=>true, "default_value"=>"#ffffff", "type"=>"input", "subtype"=>"text", "color"=>true,
			],
			/*["name"=>"barHeight", 
				"title"=>"Bar Height", "publish"=>false, "type"=>"input", "subtype"=>"text",				
			],			
			["name"=>"borderColor", 
				"title"=>"Border Color", "publish"=>false, "type"=>"input", "subtype"=>"text",	"color"=>true,			
			],	
			["name"=>"Z-Index", 
				"title"=>"zIndex", "publish"=>false, "type"=>"input", "subtype"=>"text",				
			],*/

			/*Advanced Opions
			topOffset - ‘0px’ - Distance from top edge if position is 'top' - Any valid css dimension value e.g. ‘20px', '20%’ etc.
			bottomOffset - ‘0px’ - Distance from bottom edge if position is 'bottom' - Any valid css dimension value e.g. ‘20px', '20%’ etc.
			rightOffset - ‘0px’ - Distance from right edge, if buttonAlignment is 'right' - Any valid css dimension value e.g. ‘20px', '20%’ etc.
			leftOffset - ‘0px’ - Distance from left edge, if buttonAlignment is 'left' - Any valid css dimension value e.g. ‘20px', '20%’ etc.
			suppressMobileOptimization - false - Adds a meta tag to auto zoom website on mobile, otherwise buttons might start looking really tiny in mobile browsers, disable it if you are seeing problems with it true|false
			buttonTextHoverColor - none - text color of the button when cursor is above it - any valid color value
			buttonShadow - true(for floating button)- Set it to false if you want to suppress shadow - true/false
			buttonRadius - '1000px' - Radius of the round button edges, reduce its value or set it to 0 for a rectangular button - any css dimension
			*/
			/*["name"=>"topOffset", 
				"title"=>"Top Offset", "publish"=>false, "type"=>"input", "subtype"=>"text",				
			],	
			["name"=>"bottomOffset", 
				"title"=>"Bottom Offset", "publish"=>false, "type"=>"input", "subtype"=>"text",				
			],	
			["name"=>"rightOffset", 
				"title"=>"Right Offset", "publish"=>false, "type"=>"input", "subtype"=>"text",				
			],
			["name"=>"leftOffset", 
				"title"=>"Left Offset", "publish"=>false, "type"=>"input", "subtype"=>"text",				
			],
			["name"=>"suppressMobileOptimization", 
				"title"=>"Suppress Mobile Optimization", "publish"=>false, "type"=>"select", "subtype"=>"text",	
				"options"=>[
					["text"=>"True", "value"=>1],
					["text"=>"False", "value"=>0],
				]	
			],
			["name"=>"buttonTextHoverColor", 
				"title"=>"Button Text Hover Color", "publish"=>false, "type"=>"input", "subtype"=>"text", "color"=>true,			
			],
			["name"=>"buttonShadow", 
				"title"=>"Button Shadow", "publish"=>false, "type"=>"select", "subtype"=>"text",	
				"options"=>[
					["text"=>"True", "value"=>1],
					["text"=>"False", "value"=>0],
				]		
			],
			["name"=>"buttonRadius", 
				"title"=>"Button Radius", "publish"=>false, "type"=>"input", "subtype"=>"text",				
			],*/	
		];
		return $o;
	}
}
/*

Basic Options - By default it creates a floating button snapped to the bottom of screen, but we can modify this behavior using configuration options listed below
-------------
businessId - Required - Merchants business Id - any valid business Id
businessSlug - Required - Slug prepended in the URL generated for button - an alphanumeric string, you can use dashes(-) or underscores(_), avoid using special characters
storeId - Required - Store Id for which the link would be generated - valid store id
(if you would want a specific store url to be generated, remove businessId or set generateStoreUrl to true)
urlParams - Optional - A json object for query parameters you would want to be added in link url
{"hideModal": true,"delivery":true}
generateStoreUrl - false - Forces it to generate store specific url rather than business Url - true|false
position - bottom - Position of the floating bar - 'top' or 'bottom'
buttonAlignment - ‘center’ - snapping position for button in bar - ‘left' | 'right' | 'center’
buttonBackgroundColor - '#BD8800' - Color for button - any valid color value
buttonTextColor - White - Text color for button - any valid color value
buttonWidth - 'auto' - Width of the button - any valid css dimension value e.g. '350px' ,'20em')
buttonText - “Order Online“ - Text to be displayed on button - Any valid string. Be mindful of the available space, try to use simpler and lesser words




floatingBar - false - Makes it to render floating bar - true/false
barHeight -72px - 
backgroundColor - '#ffffff' (white color) - Background color for the floating bar,use ('transparent' for a transparentbackground) - any valid css color value
borderColor - '#E7E7E7' (light grey) - The top/bottom border for bar use 'transparent' for no border - any valid css color
zIndex - 1000 - If the site has many floating items, what display priority this bar has - an positive integer value

Advanced Options - In most of the cases options listed above should be sufficient, in case you would want to customize things further, here are some advanced options.
----------------

topOffset - ‘0px’ - Distance from top edge if position is 'top' - Any valid css dimension value e.g. ‘20px', '20%’ etc.
bottomOffset - ‘0px’ - Distance from bottom edge if position is 'bottom' - Any valid css dimension value e.g. ‘20px', '20%’ etc.
rightOffset - ‘0px’ - Distance from right edge, if buttonAlignment is 'right' - Any valid css dimension value e.g. ‘20px', '20%’ etc.
leftOffset - ‘0px’ - Distance from left edge, if buttonAlignment is 'left' - Any valid css dimension value e.g. ‘20px', '20%’ etc.
suppressMobileOptimization - false - Adds a meta tag to auto zoom website on mobile, otherwise buttons might start looking really tiny in mobile browsers, disable it if you are seeing problems with it true|false
buttonTextHoverColor - none - text color of the button when cursor is above it - any valid color value
buttonShadow - true(for floating button)- Set it to false if you want to suppress shadow - true/false
buttonRadius - '1000px' - Radius of the round button edges, reduce its value or set it to 0 for a rectangular button - any css dimension

*/