<?php
if(!class_exists("SuperCatListerCreateListElements")) {

class SuperCatListerCreateListElements {

function SuperCatListerCreateListElements(
 $keyValuesPairsArray
) {
//print_r ($keyValuesPairsArray['keyValuePairsArray']);

$this->keyValuesPairsArray = $keyValuesPairsArray;

$this->createKeyValues();
$this->createWPCustomPostDisplay();
}//end function superCatListerCreateListElements

function createKeyValues() {
if (is_array($this->keyValuesPairsArray)) {
extract($this->keyValuesPairsArray);
}//end if (is_array($parsed['keyValuePairsArray']))
$this->cat = $cat;//$this->trimVariables($cat,'cat'); 
$this->include_content = $include_content;
$this->entry_style = $entry_style;

$this->include_post_title = $include_post_title;
$this->post_title_a_link = $post_title_a_link;
$this->title_style = $title_style;
$this->content_style = $content_style;
$this->bullet = $bullet;
//echo 'Here is bullet: '.$this->bullet;

$this->bullet_style = $bullet_style;
//echo 'Bullet STyle: '.$this->bullet_style;

$this->include_bullet = $include_bullet;
$this->include_date = $include_date;
$this->include_time = $include_time;
$this->include_author = $include_author;

$this->date_style = $date_style;
$this->time_style = $time_style;
$this->author_style = $author_style;

$this->date_php_format = $date_php_format;
$this->time_php_format = $time_php_format;

$this->date_prefix = $date_prefix;
$this->time_prefix = $time_prefix;
$this->author_prefix = $author_prefix;

$this->child_indent = $child_indent;

}// end createKeyValues

function createWPCustomPostDisplay() {
$loopOrObject = 'object';
$this->wpCustomPostDisplay = new WPCustomPostDisplay($loopOrObject);
}//end function createWPCustomPostDisplay

function getElement($postNow) {
$this->postNow = $postNow;
$this->wpCustomPostDisplay->setPost($postNow);
$this->createListElement();
return $this->listElement;
}//end function getElement

function createListElement() {
$this->listElement = NULL;
$this->assembleParts();
}//end function createListElement




function assembleParts() {
$this->listElement = 
 $this->add_depth()
.$this->entry_style
//.$this->listElement
.$this->addBullet()
.$this->addPostTitle()
.$this->addTimeStamp()
.$this->addAuthor()
.$this->addContent()
.'</div>' 
.$this->depthClose;
;

}//end function assembleParts


function add_depth() {
$depth=$this->postNow->depth;
$depthMultipler = $this->child_indent;
$pixelDepth = $depth * $depthMultipler;
$depthString = '
<div style="padding:0px;margin:0px;padding-left:'.$pixelDepth.'px;">
';
$this->depthClose = "</div>";
if($pixelDepth == 0) {
$depthString = NULL;
$this->depthClose = NULL;
}//end if ($pixelDepth == 0) 
return $depthString;
}//end function add_depth

function addBullet() {
$bulletNow = NULL;
if($this->include_bullet) {
$bulletNow = $this->wpCustomPostDisplay->getbullet($this->bullet,$this->bullet_style);
}//end if($this->include_bullet)
return $bulletNow;
}//end function addBullet

function addPostTitle() {
if($this->post_title_a_link) {
$this->permaLink = $this->wpCustomPostDisplay->getPermaLink($this->title_style);
}//end if($post_title_a_link)
if(!$this->post_title_a_link) {
$this->permaLink = $this->wpCustomPostDisplay->getTitle($this->title_style);
}//end if(!$post_title_a_link)

if(!$this->include_post_title) {$this->permaLink = NULL;}
return $this->permaLink;
}//end function addPostTitle



function addContent() {
if($this->include_content) {
$this->content = $this->wpCustomPostDisplay->getContent();
return
 $this->content_style
.$this->content
.'</div>';
}//end if ($this->include_content)
}//end function addContent

function addAuthor() {

/*
$comma = ', ';
if(!$this->include_post_title && !$this->include_time && !$this->include_date) {
$comma = NULL;
}
*/

$author_prefix = $this->author_prefix;

if($this->include_author) {
$this->author = $comma.$this->author_style.$author_prefix.$this->wpCustomPostDisplay->getAuthor().'</span>';
} else {
$this->author = NULL;
}//end if($this->include_author)
return $this->author;
}//end function addAuthor


function addTimeStamp() {
/*
$comma = ', ';
if(!$this->include_post_title) {$comma = NULL;}

$this->timeStamp = NULL;
if($this->include_date && !$this->include_time) {
$this->timeStamp = 
 $comma.$this->date_style.$this->wpCustomPostDisplay->getDay($this->date_php_format).'</span>';
}//end if($this->include_date && !$this->include_time)
if(!$this->include_date && $this->include_time) {
$this->timeStamp = 
 $comma.$this->time_style.$this->wpCustomPostDisplay->getTime($this->time_php_format).'</span>';
}//end if($this->include_date && !$this->include_time)
if($this->include_date && $this->include_time) {
$comma2 = ', ';
$this->timeStamp =
 $comma.$this->date_style.$this->wpCustomPostDisplay->getDay($this->date_php_format).'</span>'
.$comma2.$this->time_style.'at '.$this->wpCustomPostDisplay->getTime($this->time_php_format).'</span>';
}//end if($this->include_date && !$this->include_time)

*/
$this->createDate();
$this->createTime();
$this->timeStamp = $this->date . $this->time;
return $this->timeStamp;
}//end function addTimeStamp

function createDate() {
$this->date = NULL;
if($this->include_date) {
$dateStyleOpen = NULL;
$dateStyleClose = NULL;
if($this->date_style) {
$dateStyleOpen = $this->date_style;
$dateStyleClose = '</span>';
}//end if($this->date_style
$dateNow = $this->wpCustomPostDisplay->getDay($this->date_php_format);
$this->date = 
 $dateStyleOpen
.$this->date_prefix
.$dateNow
.$dateStyleClose
;
}//end if($this->include_date

}//end function createDate()

function createTime() {
$this->time = NULL;
if($this->include_time) {
$timeStyleOpen = NULL;
$timeStyleClose = NULL;
if($this->time_style) {
$timeStyleOpen = $this->time_style;
$timeStyleClose = '</span>';
}//end if($this->time_style
$timeNow = $this->wpCustomPostDisplay->getTime($this->time_php_format);
$this->time = 
 $timeStyleOpen
.$this->time_prefix
.$timeNow
.$timeStyleClose
;
}//end if($this->include_time)
}//end function createTime()


} //end class SuperCatListerCreateListElements
} //end if (!class_exists("SuperCatListerCreateListElements"))
?>