<?php
function cat_lister_func($shortCodeAtts,$some=NULL){

//Pull values for all options from the shortcodes.  Values set in shortcodes take precedence over values pulled from the database (which are set in the admin screen)
extract(shortcode_atts(array(
         'cat'=>''
		,'cat_name'=>''
        ), $shortCodeAtts));

//Add styles and whatever else is needed to all value pairs	
$setOptions = new SuperCatListerSetOptions();
$setOptions->init($shortCodeAtts);		
$pairs = $setOptions->getStyledPairs();

//This is the content to be inserted into the post.  We start by making sure it's blank
$newContent = NULL; 

//This builds the new content, using the value pairs and styles set above
if($cat || $cat_name) {
$assembler = new SuperCatLister_Assembler($pairs);
$newContent = $assembler->getList();
}//end if ($cat || $cat_name)

return $newContent;

}//end function cat_lister_func($atts)

?>