<?php
global $wpdb;

function logbook_search_form(){
    echo "
    <script type=\"text/javascript\" language=\"javascript\">
       jQuery(document).ready(function(){
           jQuery(\"#logbook_poplight\").dialog({
           width: 'auto', 
           modal: true
           });
        $('.dialog').dialog('destroy').remove();   
       });
      </script>
    <form id=\"searchform\" method=\"post\" action=\"".$_SERVER['REQUEST_URI']."\">
    <div>
    <input id=\"s\" type=\"text\" name=\"call\" onblur=\"if (this.value == '') {this.value = 'callsign';}\" onfocus=\"if (this.value == 'callsign') {this.value = '';}\" value=\"callsign\">
    <input id=\"searchsubmit\" type=\"submit\" value=\"Go\">
    </div>
    </form>
    
    ";
}

if ($_REQUEST['call'])
{
echo $call;
    $query = "SELECT t1.id,
    t1.MyCallsign,
    date_format(t1.Date, \"%d.%m.%Y\") AS Date,
    t1.Time,
    t1.Time_off,
    t1.Callsign,
    t1.Band,
    t1.Frequency,
    t1.Mode,
    t1.RSTS,
    t1.RSTR,
    t1.QSLS,
    t1.QSLR,
    t1.refid,
    t1.booksid,
    t1.Prop_Mode,
    ".$wpdb->prefix."logbookRef.*
    FROM ".$wpdb->prefix."logbook AS t1
    INNER JOIN ".$wpdb->prefix."logbookRef
    ON t1.refid = ".$wpdb->prefix."logbookRef.id
    WHERE t1.Callsign = '".$_REQUEST['call']."'
    ORDER BY Date
    ";
                        
    if ($wpdb->get_results($query))
    {
        $call = strtoupper($call);
        $results = $wpdb->get_results($query);
        $num_rows = $wpdb -> num_rows;            

echo "
      <div id=\"logbook_poplight\" class=\"logbook_poplight\" title=\"$num_rows QSO's with ".$_REQUEST['call']."\">";
echo "<table>";
echo " <tr>";
if (get_option( 'logbook_showMyCallsign' ) == "true") echo "<th>Call sign used</th>";
if (get_option( 'logbook_showDate' ) == "true") echo "<th>Date</th>";
if (get_option( 'logbook_showTime' ) == "true") echo "<th>Time on</th>";
if (get_option( 'logbook_showTime_off' ) == "true") echo "<th>Time off</th>";
if (get_option( 'logbook_showCall' ) == "true") echo "<th>Callsign</th>";
if (get_option( 'logbook_showBand' ) == "true") echo "<th>Band</th>";
if (get_option( 'logbook_showFreq' ) == "true") echo "<th>Frequency</th>";
if (get_option( 'logbook_showMode' ) == "true") echo "<th>Mode</th>";
if (get_option( 'logbook_showProp_Mode' ) == "true") echo "<th>Propagation Mode</th>";
if (get_option( 'logbook_showRSTS' ) == "true") echo "<th>RSTs</th>";
if (get_option( 'logbook_showRSTR' ) == "true") echo "<th>RSTr</th>";
if (get_option( 'logbook_showQSLS' ) == "true") echo "<th>QSLs</th>";
if (get_option( 'logbook_showQSLR' ) == "true") echo "<th>QSLr</th>";
if (get_option( 'logbook_showRefNO' ) == "true") echo "<th>Reference</th>";
if (get_option( 'logbook_showRefDesc' ) == "true") echo "<th>Reference Description</th>";
echo " </tr>";
foreach ($results as $result){
  echo "<tr>";
  if (get_option( 'logbook_showMyCallsign' ) == "true") echo "<td>".$result->MyCallsign."</td>";
  if (get_option( 'logbook_showDate' ) == "true") echo "<td>".$result->Date."</td>";
  if (get_option( 'logbook_showTime' ) == "true") echo "<td>".$result->Time."</td>";
  if (get_option( 'logbook_showTime_off' ) == "true") echo "<td>".$result->Time_off."</td>";
  if (get_option( 'logbook_showCall' ) == "true") echo "<td>".$result->Callsign."</td>";
  if (get_option( 'logbook_showBand' ) == "true") echo "<td>".$result->Band."</td>";
  if (get_option( 'logbook_showFreq' ) == "true") echo "<td>".$result->Frequency."</td>";
  if (get_option( 'logbook_showMode' ) == "true") echo "<td>".$result->Mode."</td>";
  if (get_option( 'logbook_showProp_Mode' ) == "true") echo "<td>".$result->Prop_Mode."</td>";
  if (get_option( 'logbook_showRSTS' ) == "true") echo "<td>".$result->RSTS."</td>";
  if (get_option( 'logbook_showRSTR' ) == "true") echo "<td>".$result->RSTR."</td>";
  if (get_option( 'logbook_showQSLS' ) == "true") echo "<td>".$result->QSLS."</td>";
  if (get_option( 'logbook_showQSLR' ) == "true") echo "<td>".$result->QSLR."</td>";  
  if (get_option( 'logbook_showRefNO' ) == "true") echo "<td>".$result->refnumber."</td>";            
  if (get_option( 'logbook_showRefDesc' ) == "true") echo "<td>".$result->refdescription."</td>";            
  echo "</tr>";            
  }
echo "</table>";
echo "<p><small><a href=\"http://dh9sb.dx-info.de/2011/wordpress-adif-search-widget/\" target=\"_blank\">WordPress ADIF Log Search Widget</a></small></p>";
echo "</div>";
logbook_search_form();
    }
    else{
        echo "

              <div id=\"logbook_poplight\" class=\"logbook_poplight\" title=\"No QSO's with ".$_REQUEST['call']."\">
              Sorry, nothing found in the logbook!
              </div>
              ";
              logbook_search_form();
    }	
}
else
{
logbook_search_form();
}
?>