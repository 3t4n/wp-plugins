<?php

function page_lister_func($shortCodeAtts){

//Pull values for all options from the shortcodes.  Values set in shortcodes take precedence over values pulled from the database (which are set in the admin screen)
extract(shortcode_atts(array(), $shortCodeAtts));

//Add styles and whatever else is needed to all value pairs	
$setOptions = new SuperCatListerSetOptions();		
$setOptions->init($shortCodeAtts);
$pairs = $setOptions->getStyledPairs();

//This is the content to be inserted into the post.  We start by making sure it's blank
$newContent = NULL; 

//This tells $assembler we are dealing with pages, not cats
$pageFlag=TRUE; 

//This builds the new content, using the value pairs and styles set above
$assembler = new SuperCatLister_Assembler($pairs,$pageFlag);
$newContent = $assembler->getList();

return $newContent;
}//end function page_lister_func($atts)



?>