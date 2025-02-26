<?php
/*
Plugin Name: NS Countdown
Plugin URI: http://www.michelecumer.com/es/wordpress/plugins/ns-countdown-cuenta-atras
Description: This plugin displays a countdown. EXAMPLE USE: [ns-countdown date="2011-05-18 00:00:00" text="Testo del Countdown" end_text="Il contest è terminato!"]
Version: 1.0
Author: Net Solutions
Author URI: http://www.net-solutions.es
License: GPLv3
*/
/*
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
*/
?><?

function ns_countdown( $atts ) {
    extract( shortcode_atts( array(
    'date' => '',
    'text' => '',
    'end_text' => ''
    ), $atts ) );


    $hash = rand(1,100);
    $hash = md5($hash . time());
    
    ob_start();
?>

<div id="countdown_<?= $hash ?>" class="nscountdown"></div>

<script type="text/javascript">


//change the text below to reflect your own,
var before_<?= $hash ?> ="before!";
var current_<?= $hash ?> ="current!"
var montharray=new Array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec")

function setCountDown_<?= $hash ?>(text){
    elem = document.getElementById('countdown_<?= $hash ?>');
    elem.innerHTML = text;
    return;

}

function countdown2_<?= $hash ?>(yr,m,d,h,i,s){
    
    theyear_<?= $hash ?>=yr;
    themonth_<?= $hash ?>=m;
    theday_<?= $hash ?>=d;
    thehour_<?= $hash ?>=h;
    theminut_<?= $hash ?>=i;
    thesecond_<?= $hash ?>=s;

    
 
    var today=new Date()

    

    var todayy=today.getYear()
    if (todayy < 1000)
        todayy+=1900
    var todaym=today.getMonth()
    var todayd=today.getDate()
    var todayh=today.getHours()
    var todaymin=today.getMinutes()
    var todaysec=today.getSeconds()
    var todaystring_<?= $hash ?>=montharray[todaym]+" "+todayd+", "+todayy+" "+todayh+":"+todaymin+":"+todaysec

    futurestring_<?= $hash ?>=montharray[m-1]+" "+d+", "+yr+" "+h+":"+i+":"+s


     
    var dd=Date.parse(futurestring_<?= $hash ?>)-Date.parse(todaystring_<?= $hash ?>)

    //document.write(futurestring +" " + todaystring + " " +  Date.parse(futurestring) + " "  + Date.parse(todaystring));
 
    if (dd > 0){
        dday=Math.floor(dd/(60*60*1000*24)*1)   //cuantos dias de diferencia
       
        dhour=Math.floor((dd%(60*60*1000*24))/(60*60*1000)*1)
        dmin=Math.floor(((dd%(60*60*1000*24))%(60*60*1000))/(60*1000)*1)
        dsec=Math.floor((((dd%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1)
    }
    else {
        dday=0;   //cuantos dias de diferencia
       
        dhour=0;
        dmin=0;
        dsec=0;
    }
    
    //Normalize Numbers!!!
    
    if (dday < 10){
        dday = "0" + dday;
    }
    if (dhour < 10){
        dhour = "0" + dhour;
    }
    if (dmin < 10){
        dmin = "0" + dmin;
    }
    if (dsec < 10){
        dsec = "0" + dsec;
    }
    
    
    
    text="<table><thead><tr>";
    
        text+="<td>"+dday+"</td><td> "+dhour+"</td><td>"+dmin+"</td><td>"+dsec+"</td>";  
        text+="</tr></thead><tbody><tr>";
        text+="<td>Giorni</td><td>Ore</td><td>Minuti</td><td>Secondi</td>"; 
        
        text+="</tr></tbody>";
        if (dd > 0){
        <? if ($text != ""): ?>
            text+="<tfoot><tr><td colspan=4>"+"<?=$text?>"+"</td></tr></tfoot>";
        <? endif;?>
        }
        else {
        <? if ($end_text != ""): ?>        
            text+="<tfoot><tr><td colspan=4>"+"<?=$end_text?>"+"</td></tr></tfoot>"; 
        <? endif;?> 
        }
        text+="</table>";
        setCountDown_<?= $hash ?>(text);
    
    if (dd > 0){ 
        setTimeout("countdown2_<?= $hash ?>(theyear_<?= $hash ?>,themonth_<?= $hash ?>,theday_<?= $hash ?>,thehour_<?= $hash ?>,theminut_<?= $hash ?>,thesecond_<?= $hash ?>)",1000);
    }
}

countdown2_<?= $hash ?>(<?=  date("Y",strtotime($date))?> , <?= date("m",strtotime($date))?> , <?= date("d",strtotime($date))?> ,<?=date("H",strtotime($date))?> , <?=date("i",strtotime($date))?> ,<?= date("s",strtotime($date))?>);



</script>

<?
    
    $ret=  ob_get_contents();
    ob_end_clean();
    return $ret;
}
add_shortcode( 'ns-countdown', 'ns_countdown' );
wp_enqueue_style( "countdown-style", plugins_url( 'countdown.css' , __FILE__ ) );

?>
