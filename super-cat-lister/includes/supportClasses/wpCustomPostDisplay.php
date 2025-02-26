<?php
//Create the customPostDisplay Class
if(!class_exists("WPCustomPostDisplay")) {
class WPCustomPostDisplay {

//This can be used to get post data either from the within the loop, or from an object pulled from the arrays created by 'get_post' or get_page'.  To pull data from an object, set 'loopOrObject' to 'object'.  To pull from the loop, set it to anything else.
function WPCustomPostDisplay($loopOrObject = 'object') {
$this->type = $loopOrObject;
}//end function WPCustomPostDisplay

function setPost($postNow) {
$this->postNow = $postNow;
}//end setPost($postNow)

function getBullet($bullet = '-',$bullet_style = NULL) {
$bullet = $this->createBullet($bullet,$bullet_style);
return $bullet;
}//end function getBullet

function displayBullet($bullet = '-',$bulletStyle = NULL) {

}//end function displayBullet

function getPermaLink($titleStyle=NULL) {
$this->permaLink = $this->createPermaLink($titleStyle);
return $this->permaLink;
} //end function getPermaLink

function displayPermaLink($titleStyle=NULL) {
$this->permaLink = $this->createPermaLink($titleStyle);
echo $this->permaLink;
} //end function displayPermaLink

function getTitle($titleStyle=NULL) {
$this->title = $this->createTitle($titleStyle); 
return $this->title;
}//end function setTitle

function displayTitle($titleStyle=NULL) {
$this->title = $this->createTitle($titleStyle); 
echo $this->title;
}//end function displayTitle

function getContent() {
$this->createContent();
return $this->content;
}//end function getContent

function displayContent() {
$this->createContent();
echo $this->content;
}//end function displayContent

function getAuthor() {
$this->createAuthor();
return $this->author;
}//end getAuthor

function displayAuthor() {
$this->createAuthor();
echo $this->author;
}//end displayAuthor

function getDay($dayFormat = ' F jS, Y') {//Make the format passable here!!!
$this->createDay($dayFormat);
return $this->dateNowDay;
}//end getDate

function displayDay($dayFormat = 'F jS, Y') {
$this->createDay($dayFormat);
echo $this->dateNowDay;
}//end displayDate

function getDayAndTime($dayFormat = 'F jS, Y',$timeFormat = 'g:i A') {//Make the format passable here!!!
$this->createDayAndTime($dayFormat,$timeFormat);
return $this->dayAndTime;
}//end function getDay

function displayDayAndTime($dayFormat = 'F jS, Y',$timeFormat = 'g:i A') {
$this->createDayAndTime($dayFormat,$timeFormat);
echo $this->dayAndTime;
}//end function displayDay

function getTime($timeFormat = 'g:i A') {
$this->createTime($timeFormat);
return $this->dateNowTime;
}//end function getTime

function displayTime($timeFormat = 'g:i A') {
$this->createTime($timeFormat);
echo $this->dateNowTime;
}//end function displayTime

function createBullet($bullet,$bullet_style) {
$bulletStyleOpen = NULL;
$bulletStyleClose = NULL;
if ($bullet_style) {


$bulletStyleOpen = 
 '<span style="'
.$bullet_style
.'">';

$bulletStyleClose = '</span>';


}//end if($bulletStyle)
$fullBullet = 
 $bulletStyleOpen
.$bullet
.$bulletStyleClose;
return $fullBullet;
}//end function createBullet($bullet,$bulleStyle)


function createAuthor() {
if ($this->type !=="object") {
$this->author = get_the_author($id = $post->ID);
} else {
$authorNow = get_userdata($this->postNow->post_author);
$nickName = $authorNow->user_login;
$lastName = $authorNow->last_name;
$firstName = $authorNow->first_name;
$this->author = $nickName;
}//end if ($this->type !=="object") 
}//end function createAuthor

function createDayAndTime($dayFormat,$timeFormat) {
$this->createDay($dayFormat);
$this->createTime($timeFormat);

$this->dayAndTime = 
 $this->dateNowDay
//.' at '
.$this->dateNowTime; 
}//end function createDayAndTime

function createDay($dayFormat) {
if ($this->type !=="object") {
$this->dateNowDay = get_the_time($dayFormat,$id = $post->ID);
} else {
$rawTime = $this->postNow->post_date;
$this->dateNowDay = mysql2date($dayFormat, $rawTime);
}//end if ($this->type !=="object") 
}//end function createDay

function createTime($timeFormat) {
if ($this->type !=="object") {
$this->dateNowTime = get_the_time($timeFormat,$id = $post->ID);
} else {
$rawTime = $this->postNow->post_date;
$this->dateNowTime = mysql2date($timeFormat, $rawTime);
}//end if ($this->type !=="object")

}//end function createTime

function createPermaLink($titleStyle) {
if($titleStyle) {
$titleStyle = ' style="'.$titleStyle.'"';
}//end if ($titleStyle)

$this->createPermalinkElements();
$linkNow = $this->linkNow;
$titleNow = $this->titleNow;

$this->permaLink = 
 '<a href="'
.$linkNow
.'"'
.$titleStyle
.'>'

.$titleNow
.'</a>'
;
return $this->permaLink;
}//end function createPermaLink

function createTitle($titleStyle) {
$titleStyleOpen = NULL;
$titleStyleClose = NULL;
if($titleStyle) {
$titleStyleOpen = '<span style="'
.$titleStyle
.'">';
$titleStyleClose = '</span>';
}//end if ($titleStyle)

$this->createPermalinkElements();
$linkNow = $this->linkNow;
$titleNow = $this->titleNow;

$this->title = 
$titleStyleOpen
.$titleNow
.$titleStyleClose
;
return $this->title;
}//end function createTitle

function createPermalinkElements() {
if ($this->type !=="object") {
$linkNow = get_permalink($id = $post->ID);
$titleNow = the_title_attribute('echo=0');
} else {
$linkNow = get_permalink($this->postNow->ID);
$titleNow = $this->postNow->post_title;
}//end if ($this->type !=="object")
$this->linkNow = $linkNow;
$this->titleNow = $titleNow;
}//end function createPermalinkElements()



function createContent() {
$more_link_text = null; 
$stripteaser = 0; 
$more_file = '';

if ($this->type !=="object") {
$content = get_the_content($more_link_text, $stripteaser, $more_file);
} else {
$content = $this->postNow->post_content;
}//end if ($this->type !=="object")

$content = str_replace(']]>', ']]&gt;', $content);
$this->content = $content;
$this->filtersForContent();
}//end function createContent

function filtersForContent() {
$content = $this->content;
$content = wptexturize($content);
$content = convert_smilies($content);
$content = convert_chars($content);
$content = wpautop($content);
$content = prepend_attachment($content);
$this->content = $content;
}//end function filtersForContent

} //end class WPCustomPostDisplay
} //end if (!class_exists("WPCustomPostDisplay"))
?>