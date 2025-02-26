<?php 
/*
Plugin URI: http://www.spep.nl/
Version: 1.20
Author: <a href="http://www.spep.nl/">Peter Braun</a>
Description: A AMBER Alert Europe rss alerts plugin.
*/


// made it idioot proof && if no setup found :)
$Alert_Europe0 = get_option('Alert_Europe0_option'); if ($Alert_Europe0 == true) { $Alert_Europe0 = "yes";} else { $Alert_Europe0 = "no";}/// promote me ( yes - no )
$Alert_Europe1 = get_option('Alert_Europe1_option'); /// number ( 1 - 15 )	
$Alert_Europe2 = get_option('Alert_Europe2_option'); if ($Alert_Europe2 == true) { $Alert_Europe2 = "yes";} else { $Alert_Europe2 = "no";}/// photo ( yes - no )
$Alert_Europe3 = get_option('Alert_Europe3_option'); if ($Alert_Europe3 == true) { $Alert_Europe3 = "yes";} else { $Alert_Europe3 = "no";}/// corts ( yes - no )
$Alert_Europe4 = get_option('Alert_Europe4_option'); if ($Alert_Europe4 == true) { $Alert_Europe4 = "yes";} else { $Alert_Europe4 = "no";}/// chache ( yes - no )
$Alert_Europe5 = get_option('Alert_Europe5_option'); /// chache time  ( 3600 sec )

$Alert_Europetest_option = get_option('Alert_Europetest_option'); if ($Alert_Europetest_option == true) { echo "test = on<br>"; }

$laadstekeer = get_option('Alert_Europe_chachetime');

$tel = "0";
$txt = "";


if (is_int($Alert_Europe1) && $Alert_Europe1 > 0 && $Alert_Europe1 < 15) {$Alert_Europe1 = "3" ;} else {}
if (is_int($Alert_Europe5) && $Alert_Europe5 > 1 ) {$Alert_Europe5 = "3600" ;} else {}


// simpel chache
if ( $Alert_Europe4 == "yes" ){
$tijdnu = time();
$uitkomst = $tijdnu - $laadstekeer ;
//echo " $uitkomst = $tijdnu - $laadstekeer > $Alert_Europe5 ";
if ( $uitkomst > $Alert_Europe5 ) { $updaten = "ja"; }
if (get_option('Alert_Europe_chachetext') == "leeg" ){ $updaten = "ja";}  // als de opties zijn veranderd
if ($Alert_Europetest_option == true) { $buffer = "ja";}

} else { $updaten = "ja";}  /// geen chache dus wel lezen// einde chache

////

if ($updaten == "ja") { 
//echo "ff updaten";

// bit of style img

$txt = $txt . "<!-- www.spep.nl --><style>
.Alert_Europe {
margin: 5px;
clear: left;
}
</style>
";




$xml=("http://feed.amberalert.eu/rssext.xml");	// feed
$xmlString = file_get_contents($xml); 
$xmlString = str_replace("np:media","foto",$xmlString);
$xmlString = str_replace("/np:media","/foto",$xmlString);
$xmlString = str_replace("np:","xxx",$xmlString);				///// i hate np:  ( quick and dirty but working solution )
$xml = new SimpleXMLElement($xmlString);

$items = $xml->xpath('channel/item');
foreach($items as $item) {   									// begin loooop
$foto = $item->foto;
$item_title = $item->title;
$description = $item->description;
$link = $item->link;
$lat = $item->xxxgeometry->xxxlocation->xxxlat;
$lng = $item->xxxgeometry->xxxlocation->xxxlng;
$dat = $item->xxxPublishedDate;
$msgid = $item->xxxmsgid;

// simple layout :)
$txt = $txt . "<div class = \"Alert_Europe\">";
 if ($Alert_Europe2 == "yes") { 
$txt = $txt . "<img width=\"100\" STYLE=\"vertical-align: top;float: left;margin: 5px; \" src=\"".$foto."\" border=\"0\">"; } 
$txt = $txt . "\n\n\n<b>" .$item_title . "</b><br>";
$txt = $txt . $description  . "<br><a href=\"$link\" target=\"_new\" title=\"more info\">more info</a><br>";

if ($Alert_Europe3 == "yes") { $txt = $txt . "<a href=\"https://maps.google.nl/?q=" .$lat . " " . $lng . "\" target= \"_spep\" title=\"coordinates\">coordinates</a><br>"; } 
$txt = $txt . "</div>";

$tel=$tel +1 ; if ($tel == $Alert_Europe1 ){ echo "";break; }
} //einde loooop


// chache ddd


if ($buffer == "ja"){
if ($Alert_Europetest_option == true) { echo "buffer"; }
update_option('Alert_Europe_chachetime', $tijdnu);
update_option('Alert_Europe_chachetext', $txt);
}

} else { echo "chache"; $txt = $txt .get_option('Alert_Europe_chachetext');  }

if ($Alert_Europe3 == "yes") { $txt = $txt . "<a href=\"www.spep.nl\" target= \"_spep\" title=\"spep.nl\">spep.nl</a><br>"; } 

//echo $txt;
?>