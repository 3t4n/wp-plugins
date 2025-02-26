setTimeout(function(){document.getElementById("submit").addEventListener("click", function(){ ScriptData();console.log("scriptdata");})},3000);

function ScriptData(){
//optout Data


var DataOptOut =(function(){if(document.getElementById("AnOptOut").value == "Ja"){
 return 'var gaProperty = \''+document.getElementById("gaId").value+'\';var disableStr = \'ga-disable-\' @ gaProperty;if (document.cookie.indexOf(disableStr @\'=true\') > -1) {window[disableStr] = true;}function gaOptout() {document.cookie = disableStr @ \'=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/\';window[disableStr] = true;}';
}else {return ""}})();
// nur Analytics
var DataGA = (function(){
    switch(document.getElementById("Aktivieren").value ){
     case "Ja":
        return 'window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag(\'js\', new Date());gtag(\'config\', \''+document.getElementById("gaId").value+'\''+document.getElementById("AnIpAnno").value+');';
     break;
     case "Banner":
       return 'window.dataLayer = window.dataLayer || [];function getCookie(cname) {var name = cname @ "=";var decodedCookie = decodeURIComponent(document.cookie);var ca = decodedCookie.split(";");for(var i = 0; i <ca.length; i@@) {var c = ca[i];while (c.charAt(0) == " ") {c = c.substring(1);}if (c.indexOf(name) == 0) {return c.substring(name.length, c.length);}}return "";}var ana = getCookie("cc_analytics");var so = getCookie("cc_social");var ad = getCookie("cc_advertising");var DisplayAnAus = (function() {if (ad == "yes"){return true}if(ad == "no"){return fals}})();function gtag(){dataLayer.push(arguments);}gtag(\'js\', new Date());if (ana != "no"){gtag(\'config\', \''+document.getElementById("gaId").value+'\', { \'anonymize_ip\': true, \'allow_display_features\': DisplayAnAus });};var date = Math.floor((Math.random() * 1000000)  @1);(function() {var scriptNames = ["/wp-content/plugins/analytics-gtag/sourcces/cookieconsent.js?q="@date];var linkNames = ["/wp-content/plugins/analytics-gtag/sourcces/cookieconsent.css"];for (var i = 0; i < linkNames.length; i@@) {var link = document.createElement(\'link\');link.rel = \'stylesheet\';link.type = \'text/css\';link.href = linkNames[i];link.async = false;document.head.appendChild(link);}for (var i = 0; i < scriptNames.length; i@@) {var script = document.createElement(\'script\');script.src = scriptNames[i];script.async = false;document.head.appendChild(script);}})(); document.querySelector(\'script[src="/wp-content/plugins/analytics-gtag/sourcces/cookieconsent.js?q=\'@date@\'"]\').onload = function() {loadJS()};function loadJS() {cc.initialise({container: document.getElementById("cc-notification"),strings: {notificationTitleImplicit: \''+document.getElementsByClassName("ccText")[1].value+'\',necessaryDefaultTitle: "Funktionelle Cookies",socialDefaultTitle: "Social media",analyticsDefaultTitle: "Analytics",advertisingDefaultTitle: "Werbung",necessaryDefaultDescription: \''+document.getElementsByClassName("ccText")[2].value+'\', socialDefaultDescription: \''+document.getElementsByClassName("ccText")[3].value+'\',analyticsDefaultDescription: \''+document.getElementsByClassName("ccText")[4].value+'\',advertisingDefaultDescription: \''+document.getElementsByClassName("ccText")[5].value+'\',privacyPolicy: "Datenschutzeinstellungen",privacyPolicyLink: \''+document.getElementsByClassName("ccText")[0].value+'\',},cookies: {social: {},analytics: {},advertising: {},necessary: {}},settings: {bannerPosition: \''+document.getElementsByClassName("ccselect")[1].value+'\',style: \''+document.getElementsByClassName("ccselect")[0].value+'\',consenttype: "implicit"}})};'; 
      break;  
      case "BannerFacebook":
            return 'window.dataLayer = window.dataLayer || [];function getCookie(cname) {var name = cname @ "=";var decodedCookie = decodeURIComponent(document.cookie);var ca = decodedCookie.split(";");for(var i = 0; i <ca.length; i@@) {var c = ca[i];while (c.charAt(0) == " ") {c = c.substring(1);}if (c.indexOf(name) == 0) {return c.substring(name.length, c.length);}}return "";}var ana = getCookie("cc_analytics");var so = getCookie("cc_social");var ad = getCookie("cc_advertising");var DisplayAnAus = (function() {if (ad == "yes"){return true}if(ad == "no"){return fals}})();function gtag(){dataLayer.push(arguments);}gtag(\'js\', new Date());if (ana != "no"){gtag(\'config\', \''+document.getElementById("gaId").value+'\', { \'anonymize_ip\': true, \'allow_display_features\': DisplayAnAus });};!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version=\'2.0\';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window, document,\'script\',\'https://connect.facebook.net/en_US/fbevents.js\');fbq(\'init\', \''+document.getElementById("fbId").value+'\');fbq(\'track\', \'PageView\');var date = Math.floor((Math.random() * 1000000)  @1);(function() {var scriptNames = ["/wp-content/plugins/analytics-gtag/sourcces/cookieconsent.js?q="@date];var linkNames = ["/wp-content/plugins/analytics-gtag/sourcces/cookieconsent.css"];for (var i = 0; i < linkNames.length; i@@) {var link = document.createElement(\'link\');link.rel = \'stylesheet\';link.type = \'text/css\';link.href = linkNames[i];link.async = false;document.head.appendChild(link);}for (var i = 0; i < scriptNames.length; i@@) {var script = document.createElement(\'script\');script.src = scriptNames[i];script.async = false;document.head.appendChild(script);}})(); document.querySelector(\'script[src="/wp-content/plugins/analytics-gtag/sourcces/cookieconsent.js?q=\'@date@\'"]\').onload = function() {loadJS()};function loadJS() {cc.initialise({container: document.getElementById("cc-notification"),strings: {notificationTitleImplicit: \''+document.getElementsByClassName("ccText")[1].value+'\',necessaryDefaultTitle: "Funktionelle Cookies",socialDefaultTitle: "Social media",analyticsDefaultTitle: "Analytics",advertisingDefaultTitle: "Werbung",necessaryDefaultDescription: \''+document.getElementsByClassName("ccText")[2].value+'\', socialDefaultDescription: \''+document.getElementsByClassName("ccText")[3].value+'\',analyticsDefaultDescription: \''+document.getElementsByClassName("ccText")[4].value+'\',advertisingDefaultDescription: \''+document.getElementsByClassName("ccText")[5].value+'\',privacyPolicy: "Datenschutzeinstellungen",privacyPolicyLink: \''+document.getElementsByClassName("ccText")[0].value+'\',},cookies: {social: {},analytics: {},advertising: {},necessary: {}},settings: {bannerPosition: \''+document.getElementsByClassName("ccselect")[1].value+'\',style: \''+document.getElementsByClassName("ccselect")[0].value+'\',consenttype: "implicit"}})};';
      break;
            
      case "nurBanner":
          return 'var date = Math.floor((Math.random() * 1000000)  @1);(function() {var scriptNames = ["/wp-content/plugins/analytics-gtag/sourcces/cookieconsent.js?q="@date];var linkNames = ["/wp-content/plugins/analytics-gtag/sourcces/cookieconsent.css"];for (var i = 0; i < linkNames.length; i@@) {var link = document.createElement(\'link\');link.rel = \'stylesheet\';link.type = \'text/css\';link.href = linkNames[i];link.async = false;document.head.appendChild(link);}for (var i = 0; i < scriptNames.length; i@@) {var script = document.createElement(\'script\');script.src = scriptNames[i];script.async = false;document.head.appendChild(script);}})(); document.querySelector(\'script[src="/wp-content/plugins/analytics-gtag/sourcces/cookieconsent.js?q=\'@date@\'"]\').onload = function() {loadJS()};function loadJS() {cc.initialise({container: document.getElementById("cc-notification"),strings: {notificationTitleImplicit: \''+document.getElementsByClassName("ccText")[1].value+'\',necessaryDefaultTitle: "Funktionelle Cookies",socialDefaultTitle: "Social media",analyticsDefaultTitle: "Analytics",advertisingDefaultTitle: "Werbung",necessaryDefaultDescription: \''+document.getElementsByClassName("ccText")[2].value+'\', socialDefaultDescription: \''+document.getElementsByClassName("ccText")[3].value+'\',analyticsDefaultDescription: \''+document.getElementsByClassName("ccText")[4].value+'\',advertisingDefaultDescription: \''+document.getElementsByClassName("ccText")[5].value+'\',privacyPolicy: "Datenschutzeinstellungen",privacyPolicyLink: \''+document.getElementsByClassName("ccText")[0].value+'\',},cookies: {social: {},analytics: {},advertising: {},necessary: {}},settings: {bannerPosition: \''+document.getElementsByClassName("ccselect")[1].value+'\',style: \''+document.getElementsByClassName("ccselect")[0].value+'\',consenttype: "implicit"}})};';
     default:
     return "";
}})();


 //EVENTS
var Scriptload1 =[];
var eventsja = false;
var form7 = (function(){if(document.getElementById("gaForm7").value =="Ja"){eventsja = true; return 'document.addEventListener( \'wpcf7mailsent\', function( event ) {gtag(\'event\', \'gesendet\', {\'event_category\': \'Kontaktformular\'});});';}})();
if(eventsja === true){Scriptload1.push('"'+"/wp-content/plugins/analytics-gtag/AGevents.js"+'"')}


//SCRIPTLOADER

var ScriptyouTube = (function(){if(document.getElementById("gaYouTube").value == "Ja"){Scriptload1.push('"'+"/wp-content/plugins/analytics-gtag/sourcces/youtubetrack.js"+'"')}})();
var ScriptScroll = (function(){if(document.getElementById("ScrollT").value == "Ja"){Scriptload1.push('"'+"/wp-content/plugins/analytics-gtag/sourcces/scroll.js"+'"')}})();
var ScriptScrollA = (function(){if(document.getElementById("ScrollT").value == "AdvSt"){Scriptload1.push('"'+"/wp-content/plugins/analytics-gtag/sourcces/scrollA.js"+'"')}})();

var ScriptLoad ='(function() {var scriptNames = ['+Scriptload1+'];for (var i = 0; i < scriptNames.length; i@@) {var script = document.createElement(\'script\');script.src = scriptNames[i];script.async = true;document.head.appendChild(script);}})();';

/*
 var img = document.createElement('img');
      img.src = "/wp-content/plugins/analytics-gtag/creator.php?param1=" + DataOptOut +
              "&param2=" + DataGA +
              "&param3=" + ScriptLoad +
              "&param4=" + form7;
           
   document.getElementById('London').appendChild(img);   
    */
//Json PD
var AG_data ={
"DataOptOut": DataOptOut,
"DataGA": DataGA,
"ScriptLoad": ScriptLoad,
"form7": form7	
}
var AG_str_json = JSON.stringify(AG_data);
request= new XMLHttpRequest()
request.open("POST", "/wp-content/plugins/analytics-gtag/creator.php", true)
request.setRequestHeader("Content-type", "application/json")
request.send(AG_str_json)
	
}
