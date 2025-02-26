<?php

global $wpdb;

function logbook_optionpage () {
    echo "
    <div class=\"wrap\">
    <h2>Logbook options</h2>";
    if ($_REQUEST['submit']) {
      update_logbook_options();
    }
    logbook_option_form ();
    echo "</div>";
}

function update_logbook_options(){
$OK = flase;
    if ($_REQUEST['logbook_defaultMyCallsign']){
      update_option('logbook_defaultMyCallsign',$_REQUEST['logbook_defaultMyCallsign']);
      $OK = true;
      }
    if ($_REQUEST['logbook_showMyCallsign']){
      update_option('logbook_showMyCallsign',$_REQUEST['logbook_showMyCallsign']);
      $OK = true;
      }
    if ($_REQUEST['logbook_showDate']){
      update_option('logbook_showDate',$_REQUEST['logbook_showDate']);
      $OK = true;
      }
    if ($_REQUEST['logbook_showTime']){
      update_option('logbook_showTime',$_REQUEST['logbook_showTime']);
      $OK = true;
      }
    if ($_REQUEST['logbook_showTime_off']){
      update_option('logbook_showTime_off',$_REQUEST['logbook_showTime_off']);
      $OK = true;
      }  
    if ($_REQUEST['logbook_showCall']){
      update_option('logbook_showCall',$_REQUEST['logbook_showCall']);
      $OK = true;
      }      
    if ($_REQUEST['logbook_showBand']){
      update_option('logbook_showBand',$_REQUEST['logbook_showBand']);
      $OK = true;
      }
    if ($_REQUEST['logbook_showFreq']){
      update_option('logbook_showFreq',$_REQUEST['logbook_showFreq']);
      $OK = true;
      }  
    if ($_REQUEST['logbook_showMode']){
      update_option('logbook_showMode',$_REQUEST['logbook_showMode']);
      $OK = true;
      }
    if ($_REQUEST['logbook_showProp_Mode']){
      update_option('logbook_showProp_Mode',$_REQUEST['logbook_showProp_Mode']);
      $OK = true;
      } 
    if ($_REQUEST['logbook_showRSTS']){
      update_option('logbook_showRSTS',$_REQUEST['logbook_showRSTS']);
      $OK = true;
      }
    if ($_REQUEST['logbook_showRSTR']){
      update_option('logbook_showRSTR',$_REQUEST['logbook_showRSTR']);
      $OK = true;
      } 
    if ($_REQUEST['logbook_showQSLS']){
      update_option('logbook_showQSLS',$_REQUEST['logbook_showQSLS']);
      $OK = true;
      }
    if ($_REQUEST['logbook_showQSLR']){
      update_option('logbook_showQSLR',$_REQUEST['logbook_showQSLR']);
      $OK = true;
      }
    if ($_REQUEST['logbook_showRefNO']){
      update_option('logbook_showRefNO',$_REQUEST['logbook_showRefNO']);
      $OK = true;
      } 
    if ($_REQUEST['logbook_showRefDesc']){
      update_option('logbook_showRefDesc',$_REQUEST['logbook_showRefDesc']);
      $OK = true;
      }                                    
    if ($OK){
      echo "<p>Options seved!</p>";
    }
    else {
      echo "<p>Failed to save options!</p>";
    }   
}

function logbook_option_form (){
echo "
<form action=\"".$_SERVER['REQUEST_URI']."\" enctype=\"multipart/form-data\" method=\"post\">
<table class=\"form-table\">
<tr valign=\"top\">
<th scope=\"row\"><label for=\"logbook_defaultMyCallsign\">Default My Callsign</label></th>
<td><input id=\"logbook_defaultMyCallsign\" class=\"regular-text\" name=\"logbook_defaultMyCallsign\" type=\"text\" value=\"".get_option( 'logbook_defaultMyCallsign' )."\"></td>
</tr>
<tr valign=\"top\">
<th scope=\"row\"><label for=\"logbook_showMyCallsign\">Show My Callsign</label></th>
<td>
<input name=\"logbook_showMyCallsign\" type=\"radio\" value=\"true\" ".checked(get_option( 'logbook_showMyCallsign' ), 'true', false)."/>Yes
<input name=\"logbook_showMyCallsign\" type=\"radio\" value=\"false\" ".checked(get_option( 'logbook_showMyCallsign' ), 'false', false)."/>No
</td>
</tr>
<tr valign=\"top\">
<th scope=\"row\"><label for=\"logbook_showDate\">Show Date</label></th>
<td>
<input name=\"logbook_showDate\" type=\"radio\" value=\"true\" ".checked(get_option( 'logbook_showDate' ), 'true', false)."/>Yes
<input name=\"logbook_showDate\" type=\"radio\" value=\"false\" ".checked(get_option( 'logbook_showDate' ), 'false', false)."/>No
</td>
</tr>
<tr valign=\"top\">
<th scope=\"row\"><label for=\"logbook_showTime\">Show Time</label></th>
<td>
<input name=\"logbook_showTime\" type=\"radio\" value=\"true\" ".checked(get_option( 'logbook_showTime' ), 'true', false)."/>Yes
<input name=\"logbook_showTime\" type=\"radio\" value=\"false\" ".checked(get_option( 'logbook_showTime' ), 'false', false)."/>No
</td>
</tr>
<tr valign=\"top\">
<th scope=\"row\"><label for=\"logbook_showTime_off\">Show Time off</label></th>
<td>
<input name=\"logbook_showTime_off\" type=\"radio\" value=\"true\" ".checked(get_option( 'logbook_showTime_off' ), 'true', false)."/>Yes
<input name=\"logbook_showTime_off\" type=\"radio\" value=\"false\" ".checked(get_option( 'logbook_showTime_off' ), 'false', false)."/>No
</td>
</tr>
<tr valign=\"top\">
<th scope=\"row\"><label for=\"logbook_showCall\">Show Call</label></th>
<td>
<input name=\"logbook_showCall\" type=\"radio\" value=\"true\" ".checked(get_option( 'logbook_showCall' ), 'true', false)."/>Yes
<input name=\"logbook_showCall\" type=\"radio\" value=\"false\" ".checked(get_option( 'logbook_showCall' ), 'false', false)."/>No
</td>
</tr>
<tr valign=\"top\">
<th scope=\"row\"><label for=\"logbook_showBand\">Show Band</label></th>
<td>
<input name=\"logbook_showBand\" type=\"radio\" value=\"true\" ".checked(get_option( 'logbook_showBand' ), 'true', false)."/>Yes
<input name=\"logbook_showBand\" type=\"radio\" value=\"false\" ".checked(get_option( 'logbook_showBand' ), 'false', false)."/>No
</td>
</tr>
<tr valign=\"top\">
<th scope=\"row\"><label for=\"logbook_showFreq\">Show Frequency</label></th>
<td>
<input name=\"logbook_showFreq\" type=\"radio\" value=\"true\" ".checked(get_option( 'logbook_showFreq' ), 'true', false)."/>Yes
<input name=\"logbook_showFreq\" type=\"radio\" value=\"false\" ".checked(get_option( 'logbook_showFreq' ), 'false', false)."/>No
</td>
</tr>
<tr valign=\"top\">
<th scope=\"row\"><label for=\"logbook_showMode\">Show Mode</label></th>
<td>
<input name=\"logbook_showMode\" type=\"radio\" value=\"true\" ".checked(get_option( 'logbook_showMode' ), 'true', false)."/>Yes
<input name=\"logbook_showMode\" type=\"radio\" value=\"false\" ".checked(get_option( 'logbook_showMode' ), 'false', false)."/>No
</td>
</tr>
<tr valign=\"top\">
<th scope=\"row\"><label for=\"logbook_showProp_Mode\">Show Propagation Mode</label></th>
<td>
<input name=\"logbook_showProp_Mode\" type=\"radio\" value=\"true\" ".checked(get_option( 'logbook_showProp_Mode' ), 'true', false)."/>Yes
<input name=\"logbook_showProp_Mode\" type=\"radio\" value=\"false\" ".checked(get_option( 'logbook_showProp_Mode' ), 'false', false)."/>No
</td>
</tr>
<tr valign=\"top\">
<th scope=\"row\"><label for=\"logbook_showRSTS\">Show RST sent</label></th>
<td>
<input name=\"logbook_showRSTS\" type=\"radio\" value=\"true\" ".checked(get_option( 'logbook_showRSTS' ), 'true', false)."/>Yes
<input name=\"logbook_showRSTS\" type=\"radio\" value=\"false\" ".checked(get_option( 'logbook_showRSTS' ), 'false', false)."/>No
</td>
</tr>
<tr valign=\"top\">
<th scope=\"row\"><label for=\"logbook_showRSTR\">Show RST received</label></th>
<td>
<input name=\"logbook_showRSTR\" type=\"radio\" value=\"true\" ".checked(get_option( 'logbook_showRSTR' ), 'true', false)."/>Yes
<input name=\"logbook_showRSTR\" type=\"radio\" value=\"false\" ".checked(get_option( 'logbook_showRSTR' ), 'false', false)."/>No
</td>
</tr>
<tr valign=\"top\">
<th scope=\"row\"><label for=\"logbook_showQSLS\">Show QSL sent</label></th>
<td>
<input name=\"logbook_showQSLS\" type=\"radio\" value=\"true\" ".checked(get_option( 'logbook_showQSLS' ), 'true', false)."/>Yes
<input name=\"logbook_showQSLS\" type=\"radio\" value=\"false\" ".checked(get_option( 'logbook_showQSLS' ), 'false', false)."/>No
</td>
</tr>
<tr valign=\"top\">
<th scope=\"row\"><label for=\"logbook_showQSLR\">Show QSL received</label></th>
<td>
<input name=\"logbook_showQSLR\" type=\"radio\" value=\"true\" ".checked(get_option( 'logbook_showQSLR' ), 'true', false)."/>Yes
<input name=\"logbook_showQSLR\" type=\"radio\" value=\"false\" ".checked(get_option( 'logbook_showQSLR' ), 'false', false)."/>No
</td>
</tr>
<tr valign=\"top\">
<th scope=\"row\"><label for=\"logbook_showRefNO\">Show Reference Number</label></th>
<td>
<input name=\"logbook_showRefNO\" type=\"radio\" value=\"true\" ".checked(get_option( 'logbook_showRefNO' ), 'true', false)."/>Yes
<input name=\"logbook_showRefNO\" type=\"radio\" value=\"false\" ".checked(get_option( 'logbook_showRefNO' ), 'false', false)."/>No
</td>
</tr>
<tr valign=\"top\">
<th scope=\"row\"><label for=\"logbook_showRefDesc\">Show Reference Description</label></th>
<td>
<input name=\"logbook_showRefDesc\" type=\"radio\" value=\"true\" ".checked(get_option( 'logbook_showRefDesc' ), 'true', false)."/>Yes
<input name=\"logbook_showRefDesc\" type=\"radio\" value=\"false\" ".checked(get_option( 'logbook_showRefDesc' ), 'false', false)."/>No
</td>
</tr>
</table>
<p class=\"submit\">
<input class=\"button-primary\" type=\"submit\" name=\"submit\" value=\"Submit\">
</p>
</form>
";
}

echo logbook_optionpage ();
?>
