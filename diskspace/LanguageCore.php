<?php

/*
=== LanguageCore.php ===
=== Free  PHP language loader ===
=== Copyright © 2013 Lukas Berger ===
=== http://lukasberger.at.tf/ ===
*/

class Language {

function Language($LangPath, $LangCode) {

define("_LANGPATH_", $LangPath);
define("_LANGCODE_", $LangCode);

$files = scandir( dirname(__FILE__) . "/" .  "LanguageCoreExtensions");

foreach($files as &$ext) {
if($ext != "." && $ext != ".." && $ext != "") {
include_once("LanguageCoreExtensions/" . $ext);
}

}

}

function _le($ToTranslate) {

$found = false;
if(is_file(dirname(__FILE__) . "/" . _LANGPATH_ . "/" . _LANGCODE_ . ".lng")) {
$langFileCnt = file(dirname(__FILE__) . "/" . _LANGPATH_ . "/" . _LANGCODE_ . ".lng");
}
else {
$langFileCnt = file(dirname(__FILE__) . "/" . _LANGPATH_ . "/en-US.lng");
}

foreach($langFileCnt as $lang) {
$lang = str_replace("\n", "", $lang);
if(strpos($lang, "#$ToTranslate: ") === false) {
}
else {
$found = true;
echo str_replace("#$ToTranslate: ", "", $lang);
}

}

if($found == false) echo "$ToTranslate";

}

function _lr($ToTranslate) {

$found = false;
if(is_file(dirname(__FILE__) . "/" . _LANGPATH_ . "/" . _LANGCODE_ . ".lng")) {
$langFileCnt = file(dirname(__FILE__) . "/" . _LANGPATH_ . "/" . _LANGCODE_ . ".lng");
}
else {
$langFileCnt = file(dirname(__FILE__) . "/" . _LANGPATH_ . "/en-US.lng");
}

foreach($langFileCnt as $lang) {

if(strpos($lang, "#$ToTranslate: ") === false) {
}
else {
$found = true;
return str_replace("#$ToTranslate: ", "", $lang);
}

}

if($found == false) return $ToTranslate;

}

}

?>