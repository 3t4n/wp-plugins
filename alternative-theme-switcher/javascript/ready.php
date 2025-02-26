<?php require(realpath(dirname(__FILE__).'/../../../../').'/wp-load.php');?>
jQuery(function($){
	var themeLink = $("link[href$=style.css]");
	var alternativeLink = $("link.alternative");
	
	function setStyle(path){
		$.cookies.set("ats_theme", path);
		if (/altThemes/.test(path)){
			themeLink.attr("href" , "<?php echo get_bloginfo('wpurl');?>/wp-content/themes/"+path.match(/^([^\/]+)\/altThemes.*$/)[1]+"/style.css");
			alternativeLink.attr("href", "<?php echo get_bloginfo('wpurl');?>/wp-content/themes/"+path)
		} else{
			themeLink.attr("href" , "<?php echo get_bloginfo('wpurl');?>/wp-content/themes/"+path);
			alternativeLink.removeAttr("href");
		}
	}
	
	var defaultStyle = "<?php echo get_option('ats_default');?>";
	var themeStyle = $.cookies.get("ats_theme");	
	if (themeStyle)
		setStyle(themeStyle);
	if (!themeStyle && defaultStyle != "")
		setStyle(defaultStyle);

	
	$("#ats-widget").click(function(evt){
		var elt = $(evt.target).closest(".item");
		if (elt.length){
			var path = elt.attr("rel");
			setStyle(path);
		}
	});
});