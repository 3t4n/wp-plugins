<?php
/*
Plugin Name: AK Vorrat Österreich Online Demo
Version: 1.0
Plugin URI: http://wiki.akvorrat.at/doku.php?id=onlinedemo
Description: BITTE NICHT VERGESSEN, EINEN EINTRAG IN DER LISTE DER TEILNEHMENDEN WEBSEITEN HINZUZUF&Uuml;GEN (PLEASE DONT FORGET TO ADD YOUR SITE TO THE DIRECTORY OF PARTICIPATING WEBSITES!!! <a href="http://wiki.akvorrat.at/doku.php?id=onlinedemo" target="_blank">http://wiki.akvorrat.at/doku.php?id=onlinedemo</a><br />F&uuml;gt den Pagepeel f&uuml;r die Online-Demo &quot;<a href="http://www.zeichnemit.at" target="_blank">www.zeichnemit.at</a>" in das Wordpress-Blog ein. Angepasst von <a href="http://www.socialhack.eu">Thomas Lohninger</a> 
(basierend auf Original VDS Page Peel des AK Vorrat Deutschland)
Author: Simon Repp, Andreas Demmelbauer, Thomas Lohninger
Author URI: http://zeichnemit.at/
*/

### Function: Page Peel CSS
add_action('wp_head', 'pagepeel_css');

function pagepeel_css() {
global $sonder;
  echo <<<EOH
  <!-- AKVS head start v1.6 -->
 <style type="text/css">
  div#akct {
  position: absolute; top:0px; right: 0px; z-index: 2342; width:113px; height:88px;
  background-image: url(https://zeichnemit.at/images/vds_corner.gif);
  background-repeat: no-repeat;
  background-position: right top;
  border:none;
  padding:0;
  margin:0;
  text-align: right;
  }
 div#akct img {
  border:none;
  padding:0;
  margin:0;
  background: none;
  }
 div#akct a#akpeel img {
  width: 113px;
  height: 88px;
  }
 div#akct a, div#akct a:hover {
  text-decoration: none;
  border:none;
  padding:0;
  margin:0;
  display: block;
  background: none;
  }
 div#akct a#akpeel:hover {
  position: absolute; top:0px; right: 0px; z-index: 4223; width:500px; height:500px;
  display: block;
  background-image: url(https://zeichnemit.at/images/vds_extended.png);
  background-repeat: no-repeat;
  background-position: right top;
  }
 div#akct a#akpreload {
  background-image: url(https://zeichnemit.at/images/vds_extended.png);
  background-repeat: no-repeat;
  background-position: 234px 0px;
  }
  </style>
  <!--[if gte IE 5.5]>
  <![if lt IE 7]>
  <style type="text/css">
  div#akct a#akpeel:hover {
  right: -1px;
  }
  </style>
  <![endif]>
  <![endif]-->
  <!-- AKVS head end --> 
EOH;
}

add_action('wp_footer', 'pagepeel_body');
function pagepeel_body() {
  echo <<<EOB
  <!-- AKVS body start v1.6 -->
  <div id="akct">
  <a id="akpeel" href="https://zeichnemit.at" target="_blank">
  <img src="https://zeichnemit.at/images/vds_blank.gif" alt="Stoppt die Vorratsdatenspeicherung! Jetzt klicken &amp;handeln!" />
  </a>

  <a id="akpreload" href="https://zeichnemit.at/pagepeel/" target="_blank" title="Willst du auch an der Aktion teilnehmen? Hier findest du alle relevanten Infos und Materialien">
  <img src="https://zeichnemit.at/images/vds_info.gif" alt="Willst du auch an der Aktion teilnehmen? Hier findest du alle relevanten Infos und Materialien" />
  </a>
  </div>
  <!-- AKVS body end -->   
EOB;
}

?>