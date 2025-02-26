<?php
//SuperCatListerDefaults
if(!class_exists("SuperCatListerDefaults")) {

class SuperCatListerDefaults{

function SuperCatListerDefaults(){
$this->init();
}//end function SuperCatListerDefaults

function getOpts(){
return $this->opts;
}//end function getOpts()

function getGlobals() {
return $this->globals;
}//end function getGlobals

function init() {
$this->createAdminGlobals();
$this->createOpts();
}//end function init

function createAdminGlobals() {
$g->pluginName = 'SuperCatLister';
$g->databaseOptionsName = 'SuperCatListerOptions';
$g->updateName = 'updateSuperCatListerOptions';
$g->adminMenuTypeDefault = 'standard';
$g->adminTextBoxDefaultHeight = 30;
$g->adminTextBoxDefaultWidth = 500;

$g->adminHeaderText = 'Super Cat Lister Admin Panel!';
$g->adminFooterText = '<div style="padding:0xp;margin:0px;padding-top:20px;">
Super Cat Lister Plug-In (c) 2009 By <a href = "http://www.ecosystemI.com">Jason Pomerantz</a>.</div>';

$this->globals = $g;
}//end function createAdminGlobals()


function createOpts(){

$backToContents = '
<p style="padding-top:5px;padding-bottom:0px;">
<a href="#contents">Back to contents</a>
</p>
';

$a = array();

//options will appear in the admin screen in the order in which they are set here

//fields
//'shortcode' is the name of the variable
//'default' is the default value of the variable
//'type' is used by superCatLister_defaults to process the variables
//   opts: 	div
//			style
//			standard
//			boolean
//			bullet
//'optHeadline' is the headline for the option in the admin screen
//'buttonText' is the text that prints on the option's button in the admin screen
//'explanation' is the text explanation for the option in the admin screen
//'adminMenuType' is the type of interface the variable has in the admin screen.
//	opts: 	standard (this is the default) - a text box
//			boolean - a True/False box
//			dropdown - a dropdown menu.  Options for the dropdown menu are set by the $dropdown array, which should be set for this option
//			text - everything else will be ignored, and the admin panel will display the text stored in 'text' => 'x'
//'dropdown' - set this to this options dropdown array, if needed
//'width' available for text fields.  Overrides default.
//'height' available for text fields.  Overrides default.

$a[] = array(
 'adminMenuType'=>'text'
,'text' => '
<h3>Welcome to Supercatlister!</h3>
<p>Set defaults for all posts here.</p.>
'
);



$a[] = array(
 'adminMenuType'=>'text'
,'text' => '
<a name="contents">
<h2>Contents</h2>
</a>
<h3><a href="#directions">Directions</a></h3>
<p>
<a href="#sortControls">Sort Controls</a><br />
<a href="#globalStyleControls">Global Style Controls</a><br />
<a href="#bulletControls">Bullet Controls</a><br />
<a href="#titleControls">Title Controls</a><br />
<a href="#dateAndTimeControls">Date and Time Controls</a><br />
<a href="#authorControls">Author Controls</a><br />
<a href="#entryContentControls">Entry Content Controls</a><br />
<a href="#pageListControls">Page List Controls</a><br />
</p.>
'
);


$a[] = array(
 'adminMenuType'=>'text'
,'text' => '
<a name="sortControls">
<h2>Sort Controls</h2>
</a>
<p>The following options control what posts are selected and how they are sorted</p.>
'
);



$a[] = array(
 'shortcode' => 'numberposts'
,'type' =>'standard' 
,'optHeadline' => 'Number of Posts'
,'buttonText' => 'Set numberposts'
,'default' => -1
,'explanation' => 'The number of posts to list. -1 means list all posts. <br />(Note: This does not work for pageLister.)'
,'width' => 60
);

//$dropdown is the array options for this adminoptions
$dropdown = array();
$dropdown[] = array('text'=>'Author', 'opt'=> 'author');
$dropdown[] = array('text'=>'Date', 'opt'=> 'date');
$dropdown[] = array('text'=>'Title', 'opt'=> 'title');
$dropdown[] = array('text'=>'Modified', 'opt'=> 'modified');
$dropdown[] = array('text'=>'Menu Order', 'opt'=> 'menu_order');
$dropdown[] = array('text'=>'Parent', 'opt'=> 'parent');
$dropdown[] = array('text'=>'ID', 'opt'=> 'ID');
$dropdown[] = array('text'=>'Random', 'opt'=> 'rand');
$dropdown[] = array('text'=>'Meta Value', 'opt'=> 'meta_value');

$a[] = array(
 'shortcode' => 'orderby'
,'type' =>'standard' 
,'optHeadline' => 'What are posted sorted by?'
,'buttonText' => 'Set what posts are sorted by'
,'default' => 'date'
,'explanation' => 'How the posts are sorted.'
,'adminMenuType' => 'dropdown'
,'dropdown' => $dropdown
,'width' => 150
);


$a[] = array(
 'shortcode' => 'meta_key'
,'type' =>'standard' 
,'optHeadline' => 'Meta Key for Sort'
,'buttonText' => 'Set Meta Key Name'
,'default' => NULL
,'explanation' => 'The meta key to sort by.  (This is only used if "orderby" is set to "meta_value".'
);


//$dropdown is the array options for this adminoptions
$dropdown = array();
$dropdown[] = array('text'=>'asc - First to Last', 'opt'=> 'asc');
$dropdown [] = array('text' =>'desc - Last to First', 'opt'=> 'desc');

$a[] = array(
 'shortcode' => 'order'
,'type' =>'standard' 
,'optHeadline' => 'Post Order'
,'buttonText' => 'Set Post Order'
,'default' => 'desc'
,'explanation' => 'The order in which posts appear.  Set to "asc" for First-To-Last or "desc" for Last-To-First.'
,'adminMenuType' => 'dropdown'
,'dropdown' => $dropdown
,'width' => 150
);


$a[] = array(
 'shortcode' => 'include_self'
,'type' =>'boolean' 
,'adminMenuType' => 'boolean'
,'optHeadline' => 'Include current post?'
,'buttonText' => 'Set include_self'
,'default' => FALSE
,'explanation' => 'Do we include the current post in the post lists?'
);

$a[] = array(
 'adminMenuType'=>'text'
,'text' => 
$backToContents.'
<a name="globalStyleControls">
<h2>Global Style Controls</h2>
</a>
<p>The following options apply to the entire list generated by Supercatlister.
'
);

$a[] = array(
 'shortcode' => 'container_style'
,'type' =>'div' 
,'optHeadline' => 'Container Style'
,'buttonText' => 'Set Container Style'
,'default' => NULL
,'explanation' => 'The CSS style for the Div holding the entire list of entries.<br />This can be used, for instance, to set a background color for the whole list.</p.>'
);

$a[] = array(
 'shortcode' => 'entry_style'
,'type' =>'div' 
,'optHeadline' => 'Entry Style'
,'buttonText' => 'Set Entry Style'
,'default' => "padding-bottom:5px;"
,'explanation' => 'The CSS style for the Div holding each entry in the list of posts.<br />Styles set here apply to complete entries in the list, including titles and content.'
);

$a[] = array(
 'adminMenuType'=>'text'
,'text' => $backToContents.'
<a name="bulletControls">
<h2>Bullet Controls</h2>
</a>
<p>The following options control how the bullet for each post is displayed.'
);

$a[] = array(
 'shortcode' => 'include_bullet'
,'type' =>'boolean' 
,'adminMenuType' => 'boolean'
,'optHeadline' => 'Include bullet?'
,'buttonText' => 'Set include_bullet'
,'default' => TRUE
,'explanation' => 'Do we include a bullet before each post in the list?'
);

$a[] = array(
 'shortcode' => 'bullet'
,'type' =>'standard'
,'optHeadline' => 'Bullet'
,'buttonText' => 'Set Bullet'
,'default' => '&#8226;'
,'explanation' => 'The bullet before each entry.'
);

$a[] = array(
 'shortcode' => 'bullet_style'
,'type' =>'standard' 
,'optHeadline' => 'Bullet Style'
,'buttonText' => 'Set bullet_style'
,'default' => NULL
,'explanation' => 'The CSS style for the bullet.'
);



$a[] = array(
 'adminMenuType'=>'text'
,'text' => $backToContents.'
<a name="titleControls">
<h2>Title Controls</h2>
</a>
<p>The following options control how the titles of included posts look and behave.</p.>
'
);

$a[] = array(
 'shortcode' => 'include_post_title'
,'type' =>'boolean' 
,'adminMenuType' => 'boolean'
,'optHeadline' => 'Include link to each post title?'
,'buttonText' => 'Set include_post_title'
,'default' => TRUE
,'explanation' => 'Do we include the post title lines in the post lists? <br>(You might perfer to just include the post content). '
);

$a[] = array(
 'shortcode' => 'post_title_a_link'
,'type' =>'boolean' 
,'adminMenuType' => 'boolean'
,'optHeadline' => 'Is the title of each post a link?'
,'buttonText' => 'Set post_title_a_link'
,'default' => TRUE
,'explanation' => 'Do we make the post title lines links to the posts? <br>(You might perfer to just make them text). '
);

$a[] = array(
 'shortcode' => 'title_style'
,'type' =>'style'
,'optHeadline' => 'Title Style'
,'buttonText' => 'Set title_style'
,'default' => NULL//'font-size:xx-large;'
,'explanation' => 'The CSS style for each post or page title listed.'
);

$a[] = array(
 'adminMenuType'=>'text'
,'text' => $backToContents.'
<a name="dateAndTimeControls">
<h2>Date and Time Controls</h2>
</a>
<p>The following options control how the date and time of each post is displayed.'
);

$a[] = array(
 'shortcode' => 'include_date'
,'type' =>'boolean' 
,'adminMenuType' => 'boolean'
,'optHeadline' => 'Include date?'
,'buttonText' => 'Set include_date'
,'default' => FALSE
,'explanation' => 'Do we include the date posted in the post lists?'
);

$a[] = array(
 'shortcode' => 'date_style'
,'type' =>'span' 
,'optHeadline' => 'Date Style'
,'buttonText' => 'Set date_style'
,'default' => NULL
,'explanation' => 'The CSS style for the date.'
);

$a[] = array(
 'shortcode' => 'date_prefix'
,'type' =>'standard' 
,'optHeadline' => 'Date Prefix'
,'buttonText' => 'Set date_prefix'
,'default' => ', '
,'explanation' => 'Text that appears before the date.'
);

$a[] = array(
 'shortcode' => 'date_php_format'
,'type' =>'standard' 
,'optHeadline' => 'Date PHP Format'
,'buttonText' => 'Set date_php_format'
,'default' => 'F jS, Y'
,'explanation' => 'The PHP format for the date.<br />This is explained <a href = "http://us3.php.net/manual/en/function.date.php">here</a>, under "Parameters".'
);

$a[] = array(
 'shortcode' => 'include_time'
,'type' =>'boolean' 
,'adminMenuType' => 'boolean'
,'optHeadline' => 'Include time?'
,'buttonText' => 'Set include_time'
,'default' => FALSE
,'explanation' => 'Do we include the time posted in the post lists?'
);

$a[] = array(
 'shortcode' => 'time_style'
,'type' =>'span' 
,'optHeadline' => 'Time style'
,'buttonText' => 'Set time_style'
,'default' => NULL
,'explanation' => 'The CSS style for the time.'
);

$a[] = array(
 'shortcode' => 'time_prefix'
,'type' =>'standard' 
,'optHeadline' => 'Time Prefix'
,'buttonText' => 'Set time_prefix'
,'default' => ', '
,'explanation' => 'Text that appears before the time.'
);

$a[] = array(
 'shortcode' => 'time_php_format'
,'type' =>'standard' 
,'optHeadline' => 'Time PHP Format'
,'buttonText' => 'Set time_php_format'
,'default' => 'g:i A'
,'explanation' => 'The PHP format for the time.<br />This is explained <a href = "http://us3.php.net/manual/en/function.date.php">here</a>, under "Parameters".'
);

$a[] = array(
 'adminMenuType'=>'text'
,'text' => $backToContents.'
<a name="authorControls">
<h2>Author Controls</h2>
</a>
<p>The following options control how the author of each post is displayed.'
);

$a[] = array(
 'shortcode' => 'include_author'
,'type' =>'boolean' 
,'adminMenuType' => 'boolean'
,'optHeadline' => 'Include author?'
,'buttonText' => 'Set include_author'
,'default' => FALSE
,'explanation' => 'Do we include the author in the post lists?'
);

$a[] = array(
 'shortcode' => 'author_style'
,'type' =>'span' 
,'optHeadline' => 'Author Style'
,'buttonText' => 'Set author_style'
,'default' => NULL
,'explanation' => 'The CSS style for the author.'
);

$a[] = array(
 'shortcode' => 'author_prefix'
,'type' =>'standard' 
,'optHeadline' => 'Author Prefix'
,'buttonText' => 'Set Author Prefix'
,'default' => ', by '
,'explanation' => 'The prefix written before post author name.'
);

$a[] = array(
 'adminMenuType'=>'text'
,'text' => $backToContents.'
<a name="entryContentControls">
<h2>Entry Content Controls</h2>
</a>
<p>The following options controls the content of included entries.</p.>
'
);

$a[] = array(
 'shortcode' => 'include_content'
,'type' =>'boolean' 
,'adminMenuType' => 'boolean'
,'optHeadline' => 'Include Content?'
,'buttonText' => 'Set Include Content'
,'default' => FALSE
,'explanation' => 'Do we include content of posts?'
);




$a[] = array(
 'shortcode' => 'content_style'
,'type' =>'div' 
,'optHeadline' => 'Content Style'
,'buttonText' => 'Set Content Style'
,'default' => NULL
,'explanation' => 'The CSS style for the Div holding the content of posts (if they are included).'
);

$a[] = array(
 'adminMenuType'=>'text'
,'text' => $backToContents.'
<a name="pageListControls">
<h2>Page List Controls</h2>
</a>
<p>The following options apply to page lists, not category lists.</p.>
'
);

$a[] = array(
 'shortcode' => 'child_indent'
,'type' =>'standard' 
,'optHeadline' => 'Indent For Child Pages'
,'buttonText' => 'Set child_indent'
,'default' => 20
,'explanation' => 'Pixels count for left indent for child pages. (This applies to pages only, not categories.)'
);

//Still need to make 'depth_default' work.  This will control the depth of child pages listed (not cats).

include 'superCatLister_DocText.php';

$a[] = array(
 'adminMenuType'=>'text'
,'text' => $backToContents.'
<a name="directions">
<h2>Directions</h2>
</a>
<div style="width:50%">'

.$docText

.'</div>
'
);

$a[] = array(
 'adminMenuType'=>'text'
,'text' => $backToContents
);









$this->opts=$a;

}//end funtion createOpts(){



} //end class SuperCatListerDefaults
} //end if (!class_exists("SuperCatListerDefaults"))
?>