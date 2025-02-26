<?php
/*
Plugin Name: Runive HTML-Box
Plugin URI: http://bit.ly/rnvhtmlbox
Description: The plugin is saved as a widget on your Wordpress blog for inserting external HMTL codes. Thanks to this feature, you can add it to your blog via drag and drop in any theme. 
Author: Runive
Version: 1.0.1
Author URI: http://bit.ly/rnvhtmlbox
*/

// Runive HTML Box default values
$RnvHTMLBoxDefaultTitle = 'What`s title?';
$RnvHTMLBoxDefaultContent = 'Please put your html code to here';

// Save Runive HTML Box 1 options
if($_POST['RnvHTMLBox1Uninst']==1){
	delete_option('RnvHTMLBoxTitle');
	delete_option('RnvHTMLBoxContent');
} else {
	if($_POST['RnvHTMLBoxContent']||$_POST['RnvHTMLBoxTitle']){
		if($_POST['RnvHTMLBoxContent']){
			add_option('RnvHTMLBoxContent', $RnvHTMLBoxContent, '', 'no');
			update_option('RnvHTMLBoxContent', $_POST['RnvHTMLBoxContent']);
		}
		if($_POST['RnvHTMLBoxTitle']){
			add_option('RnvHTMLBoxTitle', $RnvHTMLBoxTitle, '', 'no');
			update_option('RnvHTMLBoxTitle', $_POST['RnvHTMLBoxTitle']);
		}
	}
}
// Save Runive HTML Box 2 options
if($_POST['RnvHTMLBox2Uninst']==1){
	delete_option('RnvHTMLBoxTitle2');
	delete_option('RnvHTMLBoxContent2');
} else {
	if($_POST['RnvHTMLBoxContent2']||$_POST['RnvHTMLBoxTitle2']){
		if($_POST['RnvHTMLBoxContent2']){
			add_option('RnvHTMLBoxContent2', $RnvHTMLBoxContent2, '', 'no');
			update_option('RnvHTMLBoxContent2', $_POST['RnvHTMLBoxContent2']);
		}
		if($_POST['RnvHTMLBoxTitle2']){
			add_option('RnvHTMLBoxTitle2', $RnvHTMLBoxTitle2, '', 'no');
			update_option('RnvHTMLBoxTitle2', $_POST['RnvHTMLBoxTitle2']);
		}
	}
}
// Get saved values from wp database
$RnvHTMLBoxTitle = get_option('RnvHTMLBoxTitle');
$RnvHTMLBoxContent = get_option('RnvHTMLBoxContent');
$RnvHTMLBoxTitle2 = get_option('RnvHTMLBoxTitle2');
$RnvHTMLBoxContent2 = get_option('RnvHTMLBoxContent2');

// Initialize to default value if not catched
if(!$RnvHTMLBoxTitle) $RnvHTMLBoxTitle=$RnvHTMLBoxDefaultTitle;
if(!$RnvHTMLBoxContent) $RnvHTMLBoxContent=$RnvHTMLBoxDefaultContent;
if(!$RnvHTMLBoxTitle2) $RnvHTMLBoxTitle2=$RnvHTMLBoxDefaultTitle;
if(!$RnvHTMLBoxContent2) $RnvHTMLBoxContent2=$RnvHTMLBoxDefaultContent;

$prefix="rnv_";

// Runive HTML Box 1 widget and side bar functions
function widget_rnvhb1($args) {
	global $prefix,$RnvHTMLBoxContent,$RnvHTMLBoxTitle;
	echo($args["before_widget"]);
	if (!empty($RnvHTMLBoxTitle)) {
		echo($args["before_title"].$RnvHTMLBoxTitle.$args["after_title"]);
	}
	echo("<div class='RnvHB1'>".str_replace('\\','',$RnvHTMLBoxContent)."</div>");
	echo($args["after_widget"]);
}

function widget_rnvhb1_control() {
	global $RnvHTMLBoxTitle,$RnvHTMLBoxContent;
	if($_POST['RnvHTMLBox1Uninst']==1){
		echo('<strong style="color:#F00">Widget options (Box 1) removed from the database.</strong><br />');
	}
?>
	
    Title 
    <input type="text" name="RnvHTMLBoxTitle" id="RnvHTMLBoxTitle" size="23" value="<?php echo $RnvHTMLBoxTitle;?>"><br/>
    Code<br/>
    <textarea name="RnvHTMLBoxContent" id="RnvHTMLBoxContent" rows="15" style="width: 90%;"><?php echo $RnvHTMLBoxContent;?></textarea><br/>
    <a href="http://bit.ly/rnvhtmlbox" target="_blank">Buy me a book!</a><br />
	Check this if you want to remove settings from the database. <br />
    <input type="checkbox" name="RnvHTMLBox1Uninst" id="RnvHTMLBox1Uninst" value="1"><strong style="color:#F00">(Think twice)</strong><br />
<?php 
}

// Runive HTML Box 2 widget and side bar functions
function widget_rnvhb2($args) {
	global $prefix,$RnvHTMLBoxContent2,$RnvHTMLBoxTitle2;
	echo($args["before_widget"]);
	if (!empty($RnvHTMLBoxTitle2)) {
		echo($args["before_title"].$RnvHTMLBoxTitle2.$args["after_title"]);
	}
	echo("<div class='RnvHB2'>".str_replace('\\','',$RnvHTMLBoxContent2)."</div>");
	echo($args["after_widget"]);
}

function widget_rnvhb2_control() {
	global $RnvHTMLBoxTitle2,$RnvHTMLBoxContent2;
	if($_POST['RnvHTMLBox2Uninst']==1){
		echo('<strong style="color:#F00">Widget options (Box 2) removed from the database.</strong><br />');
	}
?>
    Title 
    <input type="text" name="RnvHTMLBoxTitle2" id="RnvHTMLBoxTitle2" size="23" value="<?php echo $RnvHTMLBoxTitle2;?>"><br/>
    Code<br/>
    <textarea name="RnvHTMLBoxContent2" id="RnvHTMLBoxContent2" rows="15" style="width: 90%;"><?php echo $RnvHTMLBoxContent2;?>
    </textarea><br/>
    <a href="http://bit.ly/rnvhtmlbox" target="_blank">Buy me a book!</a><br />
	Check this if you want to remove settings from the database.<br />
    <input type="checkbox" name="RnvHTMLBox2Uninst" id="RnvHTMLBox2Uninst" value="1"><strong style="color:#F00">(Think twice)</strong><br />
<?php 
}

// Initialize plug-in
function widget_rnvadsense_init() {
	register_sidebar_widget("Runive HTMLBox-1", "widget_rnvhb1");
	register_widget_control("Runive HTMLBox-1", "widget_rnvhb1_control");
	register_sidebar_widget("Runive HTMLBox-2", "widget_rnvhb2");
	register_widget_control("Runive HTMLBox-2", "widget_rnvhb2_control");
}
add_action("plugins_loaded", "widget_rnvadsense_init");
?>