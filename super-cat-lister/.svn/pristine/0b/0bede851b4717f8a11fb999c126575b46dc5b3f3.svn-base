<?php
if(!class_exists("SuperCatListerSetOptions")) {

//The purpose of this class is to select the appropriate values for each option/value pair and then add styles and any other additional info to each pair
class SuperCatListerSetOptions{

function SuperCatListerSetOptions(){
$this->createArrayToObject(); //arrayToObject is a tool that converts arrays to objects and vice-versa
}//end function SuperCatListerSetOptions


function activationTest(){
echo '<h1>Jason has activated the plugin!</h1>';
}

//init is called from the plugin function
function init($shortCodeAtts) {
//$shortCodeAtts contains things set in the post body, from the shortcodes

$this->createInitialDefaults(); //This gets initial defaults for all options - These are values set by the program, before anything else.  They can be overridden by using the admin screen to set new values and write them to the database.

$this->setFromDatabase(); //now create $this->databaseOpts, which will contain default values stored in the database.  If a value has been set in the shortcode, it will override the value set in the database

$this->shortCodePairs = $shortCodeAtts; //This gets the shortcodes from the post, which has been passed by the plugin function.  Values from shortcodes override values from database

$this->setFullFields(); //This applies styles and any other needed processing to all options
}//end function init

function getStyledPairs() {
return $this->styledPairs;  //This returns the variable pairs with all neccesary styling and other adjustments
}//end function getStyledPairs

function createArrayToObject() {
//arrayToObject is a tool that converts arrays to objects and vice-versa
$this->arrayToObject = new EIArrayToObject();
} //end function createArrayToObject()

function createInitialDefaults() {
//This gets defaults for all options
//These are values set by the program, before anything else.  They can be overridden by using the admin screen to set new values and write them to the database.
$defaults = new SuperCatListerDefaults();
$this->defaultOpts = $defaults->getOpts();
$this->globals = $defaults->getGlobals();
}//end function createInitialDefaults() {

function setFromDatabase() {
//This gets the values for all options currently stored in the database
//Values stored in the database can be set in the admin screen.  They always override initial defaults, but will be overridden by values set by the shortcodes
$this->databaseOptionsName = $this->globals->databaseOptionsName;
$updateFromDataBase = true;
$this->updateOptions($updateFromDataBase);
}//end function setFromDatabase

function updateOptions($updateFromDataBase) {
//EIOtionSetter is a standard tool that updates values by pulling them from the Wordpress database
$optionSetter = new EIOptionsSetter(
 $this->databaseOptionsName
,NULL
,$updateFromDataBase //set this to true if you want the options to be filled with the values in the wp database, set it to false otherwise
,$this->defaultOpts
);

//now pull the values and provide them to this class as both an object and an array
$this->databaseOpts = $optionSetter->getOpts();
$this->databaseOptsArray = $this->arrayToObject->convertObjectToArray($this->databaseOpts);
}//end function updateOptions

function setFullFields() {
//This applies styles and any other needed processing to all options
//It loops through all options.  It then sends the option values both from the shortcode (if assinged) and from the database.  If the shortcode value has been assigned, this is used.  Otherwise, the database default is used

$pairs = $this->shortCodePairs; //This contains values for any option that has been set by the shortcodes.

//$this->defaultOpts is set above by createInitialDefaults().  It is an array that lists all shortcodes and their default properties.
foreach ($this->defaultOpts as $a) {

if($a['adminMenuType'] !== 'text') {

$optionName = $a['shortcode'];  //this is the name of the option

$type = $a['type']; //This tells it the type of variable, which will determine what type of style is applied

$default = $this->databaseOptsArray[$optionName]; //This provides the value of the option that has been set by in the database, either from the initial defaults, or by an override from the admin screen.  It will be used if a value has not been provided by the shortcode.

//Now we apply the appropriate styling, determined by the option type
if($type == 'div') {
$pairs[$optionName] = $this->setDiv($pairs[$optionName],$default);
}//if($a['type'] == 'div')

if($type == 'span') {
$pairs[$optionName] = $this->setSpan($pairs[$optionName],$default);
}//if($a['type'] == 'span')

if($type == 'style') {
$pairs[$optionName] = $this->setStyle($pairs[$optionName],$default);
}//if($a['type'] == 'style')

if($type == 'standard') {
$pairs[$optionName] = $this->setStandard($pairs[$optionName],$default);
}//if($a['type'] == 'standard')



if($type == 'boolean') {
$pairs[$optionName] = $this->setBooleanValue($pairs[$optionName],$default);
}//if($a['type'] == 'boolean')

}//end if($a['adminMenuType'] !== 'text')

}//end foreach ($this->databaseOptsArray as $a)
$this->styledPairs = $pairs;
}//end function setFullFields


//The following are funtions that set the styles, and other info, for each of the option types.

function setStandard($current,$default) {
if(!$current  ) {
$v = $default;
} else {
$v = $current;
}//end if(!$current)
if(strtolower($current)=='no') {
$v = NULL;
}//end if(strtolower($current)=='no')
return $v;
}//end function setStandard

function setDiv($style,$styleDefault=NULL) {
if(!$style && $styleDefault) {
$style = $styleDefault;
}//end if(!$style && $styleDefault)

if(!style) {
$full = '<div>';
} else {
$full = 
 '<div style="'
.$style
.';">';
}//end if(!style) {
return $full;
}//end function setDiv

function setSpan($style,$styleDefault=NULL) {
if(!$style && $styleDefault) {
$style = $styleDefault;
}//end if(!$style && $styleDefault)

if(!style) {
$full = '<span>';
} else {
$full = 
 '<span style="'
.$style
.';">';
}//end if(!style) {
return $full;
}//end function setSpan

function setStyle($style,$styleDefault=NULL) {
if(!$style && $styleDefault) {
$style = $styleDefault;
}//end if(!$style && $styleDefault)

if(!style) {
$full = NULL;
} else {
$full = 
 $style
;
}//end if(!style) {
return $full;
}//end function styleCreator

function setBooleanValue($v,$default=NULL) {
if(!$v and $default) {$v = $default;}

$v = strtolower($v);
$v = trim($v);
$firstFour = substr($v,0,4);
$firstThree = substr($v,0,3);

if(
$firstFour == 'true' or 
$v == 1 or
$v == '1' or
$firstThree == 'yes' or
$firstThree == 'y'
) {
$v = true;
} else {
$v = false;
}
return $v;
}//end setBooleanValue


} //end class SuperCatListerSetOptions
} //end if (!class_exists("SuperCatListerSetOptions"))
?>