<?php

/*
   Plugin Name: AdsByCB 
   Plugin URI: http://adsbycb.com
   Description: Use this to display clickbank product ads on your blog just like adsanse.
   Version: 1.0
   Author: AdsByCB
   Author URI: http://adsbycb.com
*/
function myplugin_register_widgets() {
   register_sidebar_widget('Ads By CB', 'myplugin_widget');
}
if (get_option("myplugin_title")) {
   $myplugin_title = get_option("myplugin_title");
}
else {
   $myplugin_title = "";
}
$cbafid = get_option(cbid);
$adkey = get_option(keyword);
$adkey = str_replace(" ","88",$adkey);
$adtype = get_option(adtype);
$adsn = get_option(adsnum);
$adtc = get_option(titlec);
$adtc = str_replace("#","",$adtc);
$adtxc = get_option(textc);
$adtxc = str_replace("#","",$adtxc);
$adbc = get_option(backc);
$adbc = str_replace("#","",$adbc);
$adcat = get_option(adscat);
$wq = get_option(wq);

function myplugin_widget($args) {
   global $myplugin_title,$adkey,$adtype,$adsn,$adtc,$adtxc,$adbc,$cbafid,$adcat,$wq;
   extract($args);
     
   echo $before_widget;
   echo $before_title . $myplugin_title . $after_title;
include ("http://adsbycb.com/ads/getads.php?cbid=".$cbafid."&keyword=".$adkey."&adtype=".$adtype."&adsnum=".$adsn."&titlec=".$adtc."&textc=".$adtxc."&backc=".$adbc."&adscat=".$adcat."&wq=".$qw);
 

   echo $after_widget;
}

if (!function_exists('is_vector')) {
   function is_vector( &$array ) {
      if ( !is_array($array) || empty($array) ) {
         return -1;
      }
      $next = 0;
      foreach ( $array as $k => $v ) {
         if ( $k !== $next ) return false;
         $next++;
      }
      return true;
   }
}



function myplugin_menu_setup() {
   add_options_page('Ads By CB', 'Ads By CB', 10, __FILE__, 'myplugin_menu');
}

// Actual function that handles the settings sub-page
function myplugin_menu() {
   ?>
   <div class="wrap">
<script src="<?php echo bloginfo('url'); echo '/wp-content/plugins/cb-ads/302pop.js'; ?>" type="text/javascript"></script>
      <h2>Clickbank ads Plugin</h2>

      <center><h1>Easiest Way to display clickbank ads on your blog ever!!!</h1></center>

    
<form method="post" action="options.php">
      <?php wp_nonce_field('update-options'); ?>
      <input type="hidden" name="action" value="update" />
      
      <input type="hidden" name="page_options" value="myplugin_var1,wq,keyword,titlec,textc,backc,adtype,adsnum,cbid,adscat" />
      <h3>Clickbank Affiliate ID</h3><p>Enter your Clickbank Affiliate ID 
     <br> <?php myplugin_textbox("cbid"); ?></p>
      <h3>Keyword</h3><p>ads displayed will be relevant to this keyword 
     <br> <?php myplugin_textbox("keyword"); ?></p>
<h3>Search In:</h3>
      
<p><?php 
myplugin_dropdown("wq", array("1" => "In Title", "2" => "In Description"), 
"1"); 
 ?> 
<br></p>      
<h3>Clickbank Category:</h3>
      
<p><?php 
myplugin_dropdown("adscat", array("1" => "Business to Business", "2" => "Health &amp; Fitness", "3" => "Home &amp; Family", "4" => "Computing &amp; Internet", "5" => "Money &amp; Employment", "6" => "Marketing &amp; Ads", "7" => "Fun &amp; Entertainment", "8" => "Sports &amp; Recreation", "9" => "Society &amp; Culture"),"1"); 
 ?> 
<br></p>
<h3>Ad Type:</h3>
      
<p><?php 
myplugin_dropdown("adtype", array("to" => "Title links", "td" => "Title and Description links"), 
"td"); 
 ?> 
<br></p>
  <h3>Number Of Links/Products:</h3>
     <p><?php 
myplugin_dropdown("adsnum", array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10"), 
"2");  ?> </p><br>
     <h3>Ad Style: <br></h3>
<table border="1">
  <tr>
     <td><p>Title <?php myplugin_ctextbox("titlec"); ?></p>
  <tr>
     <td><p>Text <?php myplugin_ctextbox("textc"); ?></p>
   <tr>
     <td><p>Background <?php myplugin_ctextbox("backc"); ?></p>
</table>
<h3>Ad Preview</h3>
<p>click "save changes" to update.<p>
<?php myplugin_p4("adsnum");?>

<br><br>
     <p><input type="submit" class="button" value="Save Changes" /></p>
   </div>
   <?php
}

function myplugin_textarea($name, $value="") {
   if (get_option($name)) { $value = get_option($name); }
   ?>
   <textarea name="<?php echo $name ?>" cols="20" rows="3"><?php echo $value ?></textarea>
   <?php
}
function myplugin_textbox($name, $value="") {
   if (get_option($name)) { $value = get_option($name); }

   ?>
   <input type="text" name="<?php echo $name ?>" size="15" value="<?php echo $value ?>" />
   <?php
}
function myplugin_ctextbox($name, $value="") {
   if (get_option($name)) { $value = get_option($name); }

   ?>
	Color: </td><td><input type="text" name="<?php echo $name ?>" ID="<?php echo $name ?>" size="9" value="<?php echo $value ?>"></td><td><input type="text" name="<?php echo $name; echo "1"; ?>" ID="<?php echo $name; echo "1"; ?>" size="1" value="" style="background-color:<?php echo $value ?>"></td><td> <input type="button" onclick="pickerPopup302('<?php echo $name ?>','<?php echo $name; echo "1"; ?>');" value="..."></td></tr>

   <?php
}
 
function myplugin_dropdown($name, $data, $option="") { 
   if (get_option($name)) { $option = get_option($name); } 
 
   ?> 
   <select name="<?php echo $name ?>"> 
   <?php 
 
   // If the array is a vector (0, 1, 2...) 
   if (is_vector($data)) { 
      foreach ($data as $item) { 
         if ($item == $option) { 
            echo '<option selected="selected">' . $item . "</option>\n"; 
         } 
         else { 
            echo "<option>$item</option>\n"; 
         } 
      } 
   } 
 
   // If the array contains name-value pairs 
   else { 
      foreach ($data as $value => $text) { 
         if ($value == $option) { 
            echo '<option value="' . $value . '" selected="selected">' . $text . "</option>\n"; 
         } 
         else { 
            echo '<option value="' . $value . '">' . "$text</option>\n"; 
         } 
      } 
   } 
 
   ?> 
   </select>
   <?php 
} 
   function myplugin_p1($name, $value="") {
   if (get_option($name)) { $value = get_option($name); }
   ?>
   <div>
   <table bgcolor="<?php echo $value ?>" border="3"><tr><td style="background-color:<?php echo $value ?>; width:120">
   <?php
}
   function myplugin_p2($name, $value="") {
   if (get_option($name)) { $value = get_option($name); }
   ?>
   <font color="<?php echo $value ?>"><b><a style="color:<?php echo $value ?>" href="http://ADSBYCB.COM">AdsByCB</a></b></font><br>
   <?php
}
   function myplugin_p3($name, $value="") {
   if (get_option($name)) { $value = get_option($name); }
   ?>
   <font size="2" color="<?php echo $value ?>">Web Automation Pros.</font><br><br>
   <?php
}
function myplugin_p4($name, $value="") {
   if (get_option($name)) { $value = get_option($name); }
   myplugin_p1("backc");
if (get_option(adtype)=="to")
{
for($i=0; $i<=$value; $i=$i+1)
	{
 myplugin_p2("titlec");
echo "<br>";
}}
else
{
for($i=0; $i<=$value; $i=$i+1)
	{
 myplugin_p2("titlec");
 myplugin_p3("textc");
 	}}
?>
<center>Ads By <font color=#"<?php echo $adtc ?>"><b><a style="color:#<?php echo $adtc ?>" href="http://www.ADSBYCB.COM" target="_top">AdsByCB</a></b></font></center></td></tr></table>
<?php
}


// Create a settings menu 
add_action('admin_menu', 'myplugin_menu_setup');
if (function_exists('add_action')) {
   add_action('plugins_loaded', 'myplugin_register_widgets');
}
?>