<?php
if(!class_exists("EI_WP_AdminPanel")) {
class EI_WP_AdminPanel {

function EI_WP_AdminPanel($defaults) {
$this->createArrayToObject();
$this->createDefaults($defaults);
$this->databaseOptionsName = $this->adminGlobals->databaseOptionsName;

}//end function EI_WP_AdminPanel

function adminPanel() {
$this->getOptions(); //First get options from the database and update them if needed
$this->displayScreen(); //Now display the admin screen
}//end function adminPanel

function createDefaults($defaults) {
//$defaults = new SuperCatListerDefaults();
//$this->adminOpts is an array that contains all the data to build the admin screen
$this->adminGlobals = $defaults->getGlobals();
$this->adminOpts = $defaults->getOpts();
//$this->dbOptsArray will contain the options to be stored in the WP database
$this->updateName = $this->adminGlobals->updateName;
$this->dbOptsArray = array();
//now fill $this->dbOptsArray with the default values from $this->adminOpts
$this->loopOptions('addToDBOptsArray');
}//end function createDefaults

function createArrayToObject() {
$this->arrayToObject = new EIArrayToObject();
} //end function createArrayToObject()

function loopOptions($type) {
foreach ($this->adminOpts as $a) {
if($a['adminMenuType'] !=='text') {
$a['postUpdate'] = $this->updateName.'_'.$a['shortcode'];
if($type == 'addToDBOptsArray') {$this->addToDBOptsArray($a);}
if($type == 'checkOptions') {$this->checkOptions($a);}
}//end if($a['adminMenuType'] !=='text')
if($type== 'displayOptions') {$this->displayOption($a);}
}//end foreach ($this->adminOpts as $a) {
}//end function loopOptions($type)

function addToDBOptsArray($a) {
$this->dbOptsArray[$a['shortcode']] = $a['shortcode'];
}//end function addToDBOptsArray

function getOptions() {
$this->initialUpdate();
$this->loopOptions('checkOptions');
$this->displayUpdatedMessageIfNeeded();
}//end function getOptions()

function doUpdateDB() {
$this->opts = $this->arrayToObject->convertArrayToObject($this->dbOptsArray,$this->opts);

//Now we have to update options in the WP database
$updateFromDataBase = false;
$this->updateOptions($updateFromDataBase);
$this->displayUpdatedMessage = true;
} // end function doUpdateDB()

function updateOptions($updateFromDataBase) {
//$this->opts = $this->arrayToObject->convertArrayToObject($optsArray,$this->opts);
$optionSetter = new EIOptionsSetter(
 $this->databaseOptionsName
,$this->opts
,$updateFromDataBase //set this to true if you want the options to be filled with the values in the wp database, set it to false otherwise
,$this->adminOpts
);
$this->opts = $optionSetter->getOpts();
$this->optsArray = $this->arrayToObject->convertObjectToArray($this->opts);
}//end function updateOptions

function settingsUpdatedMessage() {
?>
<?php 

//echo '<div class="updated"><p><strong>';


echo '<div style="

font-size: 13px;

border-width: 1px;
	border-style: solid;
	padding: 0 0.6em;
	-moz-border-radius: 3px;
	-khtml-border-radius: 3px;
	-webkit-border-radius: 3px;
	border-radius: 3px;
	line-height: 1;
	padding: 2px;
	background-color: #ffffe0;
	border-color: #e6db55;	
	margin: 5px 0;

"><strong> ';

?>
<?php _e("Settings Updated.","SuperCatLister"); ?>
</strong></div>
<?php
}//end function settingsUpdatedMessage()

function initialUpdate() {
$this->displayUpdatedMessage = false;
$updateFromDataBase = true;
$this->updateOptions($updateFromDataBase);
}//end function initialUpdate()

function displayUpdatedMessageIfNeeded() {
if($this->displayUpdatedMessage) {$this->settingsUpdatedMessage();}
}//end function displayUpdatedMessageIfNeeded()




//the following functions control create and display the admin screen

function displayScreen(){
$this->adminHeader();
$this->loopOptions('displayOptions');
$this->adminFooter();
}//end function displayScreen(){

function adminHeader() {
?>


<div class=wrap >


<form method="post" action"<?php echo $_SERVER["REQUEST_URI"];?>">
<h1><?php 
_e($this->adminGlobals->adminHeaderText,$this->adminGlobals->pluginName);
?></h1>
<?php
}//end function admin Header

function adminFooter() {
?>
</form>
</div><!-- End <div class=wrap>  -->
<?php
$this->displayCopyRight(); 
}//end function adminFooter()

function displayCopyRight() {
echo $this->adminGlobals->adminFooterText;
}//end function displayCopyRight()

function displayOption($a) {
if($a['adminMenuType'] !=='text') {

?>
<h3 style="padding:0px;margin:0px;padding-top:10px;">
<?php $this->displayOptionHeadline($a);?>
</h3>

<p style="margin:0px;padding:0px;pdding-bottom:2px;">
<?php $this->displayShortcode($a);?>
</p>

<p style="padding:0px;margin:0px;padding-bottom: 5px;">
<?php $this->explanatoryText($a);?>
</p>

<p style="margin:0px;padding:0px;overflow:hidden;">
<?php $this->chooseOptionType($a); ?>
</p>

<div class = "submit" style="padding:0px;margin:0px;">
<?php $this->restoreDefaultButton($a); ?>

<?php $this->submitButton($a); ?>
</div>

<?php
}//end if($a['adminMenuType'] !=='text')

if($a['adminMenuType'] =='text') {
$this->displayTextOnly($a);
}//end if($a['adminMenuType'] !=='text')


}//end function displayOption($a)

function displayOptionHeadline($a) {
 echo $a["optHeadline"];
}//end function displayOptionHeadline($a)

function displayShortcode($a) {
 echo 'Shortcode for this option: <strong>'.$a['shortcode'].'</strong>';
}

function chooseOptionType($a) {
$a = $this->setEntryDefaults($a);

$this->setTextAreaString($a);
if($a['adminMenuType'] =='boolean') {
$this->booleanOption($a);} 
if($a['adminMenuType'] =='dropdown') {
$this->dropdownOption($a);} 
if ($a['adminMenuType'] =='standard'){$this->standardOption($a);}
}//end function chooseOptionType($a)

function setTextAreaString($a) {
$this->textAreaString =
 ' name="'.$a['shortcode'].'"'
.' style="'
.'width: '.$a['width'].'px; '
.'height: '.$a['height'].'px;'
.'font-size:12px;'
.'padding:0px;'
.'margin:0px;'
.'overflow:hidden'
.'"';
}//end funciton setTextAreaString($a)

function setEntryDefaults($a) {
if(!$a['adminMenuType']) {$a['adminMenuType'] = $this->adminGlobals->adminMenuTypeDefault;}
if(!$a['height']) {$a['height'] = $this->adminGlobals->adminTextBoxDefaultHeight;}
if(!$a['width']) {$a['width'] = $this->adminGlobals->adminTextBoxDefaultWidth;}
return $a;
}//end function setTextBoxDimensions($a) 

function booleanOption($a) {
//determine which option is currently selected
if($this->optsArray[$a['shortcode']]=='TRUE') {
$selectedTrueText = 'selected';
$selectedFalseText = NULL;
} else {
$selectedTrueText = NULL;
$selectedFalseText = 'selected';
}//end if($this->optsArray[$a['shortcode']]) 
?>
<select style="width:75px;padding:0px;margin:0px;"
<?php
echo $this->textAreaString;
?>>
<option value="TRUE" <?Php echo $selectedTrueText;?>>True</option>
<option value="FALSE" <?Php echo $selectedFalseText;?>>False</option>
</select>
<?php
}//end function booleanOption($a)

function dropdownOption($a) {
$dropdown = $a['dropdown'];
$currentlySelected = $this->optsArray[$a['shortcode']];
?>
<select style="width:<?php echo $a['width'];?>px;padding:0px;margin:0px;"
<?php
echo $this->textAreaString;
?>>
<?php
foreach ($dropdown as $d) {
$selectedNow = NULL;
if($d['opt'] == $currentlySelected) { $selectedNow = 'selected';}

echo 
 '<option value="'.$d['opt'].'" '.$selectedNow.'>'.$d['text'].'</option>';

}//end foreach ($dropdown as $d)
?>
</select>
<?php
}//end function dropdownOption

function standardOption($a) {
?>
<textarea <?php 
echo $this->textAreaString;
?>>
<?php echo $this->optsArray[$a['shortcode']]?>
</textarea>
<?php
}//end function standardOption

function submitButton($a) {
?>
<input type="submit" style="overflow:visible; width:auto" name="<?php echo $a['postUpdate'];?>" 
value="<?php 
_e($a['buttonText'],'SuperCatLister')
?>" 
/>
<?php
}//end function submitButton

function restoreDefaultButton($a) {
?>
<input type="submit" style="overflow:visible; width:auto" name="<?php echo $a['postUpdate'].'RestoreDefault';?>" 
value="<?php 
_e('Restore Default','SuperCatLister')
?>" 
/>
<?php
}//end function restoreDefaultButton

function checkOptions($a) {
if(isset($_POST[$a['shortcode']])){
	$this->dbOptsArray[$a['shortcode']] = $_POST[$a['shortcode']];
$this->doUpdateDB();
}//end if(isset($_POST[$a['shortcode']])){

$d = $a['postUpdate'].'RestoreDefault';
if(isset($_POST[$d])){
	$this->dbOptsArray[$a['shortcode']] = $a['default'];
$this->doUpdateDB();
}//end if(isset($_POST[$a['shortcode']])){

}//end function checkOptions($a)

function explanatoryText($a) {
echo $a['explanation'];
}//end function explanatoryText

function displayTextOnly($a) {
echo $a['text'];
}//end function displayTextOnly($a)

}//end class EI_WP_AdminPanel

}//if(!class_exists("EI_AdminPanel")) {
?>