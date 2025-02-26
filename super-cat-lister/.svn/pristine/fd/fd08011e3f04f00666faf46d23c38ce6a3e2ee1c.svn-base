<?php
//Converts between category names and IDs (we could also use 'slugs' if we want
if(!class_exists("WPCategoryExpander")) {
class WPCategoryExpander {
function WPCategoryExpander() {
}//end function WPCategoryExpander

function getCatIdFromName($cat_name) {
$catArray = get_term_by( 'name', $cat_name,'category');
$catNumber = $catArray->term_id;
return $catNumber;
}//end function getCatID

function getCategoryNameFromID($cat_ID) {
$catArray = get_term_by( 'id', $cat_id,'category');
$catName = $catArray->name;
return $CatName;
}//end function getCatNameFromID

} //end class WPCategoryExpander
} //end if (!class_exists("WPCategoryExpander"))
?>