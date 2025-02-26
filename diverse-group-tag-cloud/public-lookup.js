/*
 * This file is included as part of the WordPress Diverse Group Tag Cloud plugin
 * The plugin is Copyright (C) 2008-2009 Corey Wallis <techxplorer@gmail.com>
 * The plugin is covered by the GPL. 
 */
 
function dgtc_lookup(tag) {

	// get the jquery class
	var $j = jQuery;
	
	$j.get("/wp-content/plugins/diverse-group-tag-cloud/tag-lookup.php?tag=" + tag, function(html){
		$j("#dgtc_lookup").empty(); // empty div
		$j("#dgtc_lookup").append(html); // add html of the form to div
	});
}
