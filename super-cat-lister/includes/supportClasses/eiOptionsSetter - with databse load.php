<?php
if(!class_exists("EIOptionsSetter")) {
class EIOptionsSetter {
//This class requires that the class ArrayToObject be available.  I keep it in supportClasses/ArrayToObject.php

function EIOptionsSetter(
 $databaseOptionsName
,$opts = NULL
,$updateFromDataBase
,$defaultOpts = NULL
) {
$this->databaseOptionsName = $databaseOptionsName;  //This is the name of the field that stores the options in the wordpress options table
$this->opts = $opts; //This contains all options for the current plugin
$this->updateFromDataBase = $updateFromDataBase; //if this is set to true, all options will be overwritten with those from the wp database
$this->defaultOpts = $defaultOpts;

$this->init();
}// end function EIOptionsSetter

function getOpts() {//report the updated options to the world
return $this->opts;
} //end function getOptionsNow()

function init() {

//print_r($this->defaultOpts); echo 'Hi Jason';

$this->createArrayToObjectConverter();
$this->getAdminOptions();
$this->reloadOptions();
}//end function init()

function createArrayToObjectConverter() {
//easily switch between arrays and objects
$this->arrayToObject = new EIArrayToObject();
} //end function createArrayToObjectConverter()

function getAdminOptions() {



//Check if database exists
if(get_option($this->databaseOptionsName)) {
echo '<h1>database found!</h1>';
$this->optsNow = $this->opts;
} else {
echo '<h1>NO database found!</h1>';
//$optsNow = $this->defaultOpts;

$optsNow = array();
foreach ($this->defaultOpts as $opt) {
echo '<br>shortcode: '.$opt['shortcode'];
echo '<br>value: '.$opt['default'];
echo '<br>';
$optsNow[$opt['shortcode']] = $opt['default'];

}//end foreach ($this->defaultOpts as $opt)

update_option($this->databaseOptionsName,$optsNow);
$this->firstTime = TRUE;
//$this->updateFromDatabase = FALSE;
}//end if(get_option($this->databaseOptionsName))
//print_r($this->optsNow);
//$optionsNow = $this->arrayToObject->convertObjectToArray($this->opts);

if(!$this->firstTime) {
$optionsNow = $this->arrayToObject->convertObjectToArray($this->optsNow);
}//if(!$this->firstTime)

//Set the initial defaults as an array
//get the options from the WP database
if($this->updateFromDataBase) {
$previousOptions = get_option($this->databaseOptionsName);
	if(!empty($previousOptions)) {
		foreach($previousOptions as $key => $option) {
			$optionsNow[$key] = $option;
		}
	}//end if(!empty($commentsOptions))
}//end if($this->updateFromDatabase

//Store the options in the WP database (useful if this is the first time the plugin is run)	
update_option($this->databaseOptionsName,$optionsNow);

//Make the variable accessible to other functions in the class
$this->optionsNow = $optionsNow;
}//end function getAdminOptions

function reloadOptions() {//This loads the variables from the options object into a more easily accessible form
$this->opts = new stdClass();
$this->arrayToObject->convertArrayToObject($this->optionsNow,$this->opts);
}// end function reloadOptions

}//end class EIOptionsSetter
}//end if(!class_exists("EIOtptionsSetter")) {
?>