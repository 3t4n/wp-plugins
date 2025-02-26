<?php
/*
Plugin Name: Ayar Unicode Toolbar
Plugin URI: http://www.ayarunicodegroup.com/
Description: Ayar Unicode Toolbar is included most useful tools for ayar user to get one click. Included Automatic unicode font converter for ayar and zawgyi font for burmese language. Automatic translation for digits, time and date to burmese base on locale setting. Can work on multilingual sites. New English Calendar Design with images in calendar Header bar.Substitute text with appropiate image for calendar week days.Representation of week days and images are Sunday=Galon Bird,Monday=Tiger,Tuesday=Lion,Wednesday=Elephant,Thusday=Rat,Friday=Guinea-pig,Saturday=Dragon. Burmese Calendar Widget. And every single digits translate into burmese automatically.  <a href="http://www.ayarunicodegroup.com/">Documentation</a>.
Author: Sithu Thwin
Author URI: http://www.http://www.ayarunicodegroup.com/
Version: 0.0.2
Tested up to: 3.9.2
*/
if(defined('a2zt_VERSION')) return;
define('a2zt_VERSION', '3.0-beta_2');
define('a2zt_PLUGIN_PATH', dirname(__FILE__));
define('a2zt_PLUGIN_FOLDER', basename(A2Z_PLUGIN_PATH));

function a2zt_head(){
	?>
<style type='text/css'>
#pageshare {position:fixed; bottom:52%; right:10px; float:left; border: 1px solid black; border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;background-color:#eff3fa;padding:0 0 2px 0;z-index:10;}  
  
#pageshare .sbutton {float:left;clear:both;margin:5px 5px 0 5px;}  
  
#bm {  
-moz-border-radius-bottomleft:10px;  
-moz-border-radius-bottomright:10px;  
background-color:#ff0000;  
font-size:12px;  
margin-right:10px;  
right: 0px;  
padding:2px 10px;  
position:absolute;  
top:0;  
}  
.otf .selected {  
 text-decoration: underline;  
  
}  
.otf a, #bm a {  
 text-decoration: none;  
 color:white;  
 font-family: ''Michroma', Ayar, Ayar Takhu, Ayar Wazo, AyarKasone, Ayar Juno, Trebuchet MS, Helvetica, sans-serif;  
 font-weight: bold;  
}  
#bm a {  
 font-weight: normal;  
}  
#bm a:link {  
 text-decoration: underline;  
}  
</style>
<script type='text/javascript'>
//<![CDATA[
eval(function(m,c,h){function z(i){return(i< 62?'':z(parseInt(i/62)))+((i=i%62)>35?String.fromCharCode(i+29):i.toString(36))}for(var i=0;i< m.length;i++)h[z(i)]=m[i];function d(w){return h[w]?h[w]:w;};return c.replace(/\b\w+\b/g,d);}('||var||convertAyarToZawgyi|function|u1004|u103A|u1039|u1036|u108D||u102D|u108C|u108B|u1064||u1018|u1093|u101C|u1085|u1012||u1019|return|String|fromCharCode|charCodeAt|99|u1011|u1074|u1010|u1072|u100A|u106B|u1009||||||||||||||u106A|u1008|u1069|u1007|u1068|u1006|u1067|u1005|u1065|u1000|u1003|96|u103B|u107D|u1037|u1095|u100B|u100C|u1092|u100F|u100D|u1091|u106D|u106C|u108E|u103D|u103E|u108A|u1030|u1089|u102F|u1088|u1087|u103F|u1086|u103C|u107E|u106E|u102B|u105A|u104E|u1038|u1033|for|length|replace|u1021|u1034|u1001|u1002|u1013|u1017|u101D|u102E|u1032|u1080|u107F|u1014|u1075|u108F|convertTextNodes|if|typeof|string|document|getElementById|else|body|parentElement|parentNode|false|fontFamily|childNodes|split|style|indexOf|nodeType|nodeValue|match|true|defaultView|getComputedStyle|null|toZ|Zawgyi|one|Myanmar3|Padauk|Parabaik'.split('|'),'2 4=5 (A){2 B=[[/\\6\\7\\8\\9/g,\'\\a\'],[/\\6\\7\\8\\c/g,\'\\d\'],[/\\6\\7\\8\\c/g,\'\\e\'],[/\\6\\7\\8/g,\'\\f\'],[/\\8\\h/g,\'\\i\'],[/\\8\\j/g,\'\\k\'],[/\\8([\\l-\\n])/g,5 (m,b){o p.q(b.r(0)+s);}],[/\\8\\t/g,\'\\u\'],[/\\8\\v/g,\'\\w\'],[/\\8\\x/g,\'\\y\'],[/\\8\\8\\z/g,\'\\N\'],[/\\8\\O/g,\'\\P\'],[/\\8\\Q/g,\'\\R\'],[/\\8\\S/g,\'\\T\'],[/\\8\\U/g,\'\\V\'],[/\\8([\\W-\\X])/g,5 (m,b){o p.q(b.r(0)+Y);}],[/\\Z/g,\'\\10\'],[/\\11/g,\'\\12\'],[/\\13\\8\\14/g,\'\\15\'],[/\\16\\8\\17/g,\'\\18\'],[/\\8\\14/g,\'\\19\'],[/\\8\\13/g,\'\\1a\'],[/\\c\\9/g,\'\\1b\'],[/\\1c\\1d/g,\'\\1e\'],[/\\1d\\1f/g,\'\\1g\'],[/\\1d\\1h/g,\'\\1i\'],[/\\1d/g,\'\\1j\'],[/\\1k/g,\'\\1l\'],[/\\1m/g,\'\\1n\'],[/\\17\\8\\17/g,\'\\1o\'],[/\\1p\\7/g,\'\\1q\'],[/\\1r\\6\\7\\1s/g,\'\\1r\'],[/[\\7-\\1d]/g,5 (m){o p.q(m.r(0)-1);}],[/\\1h/g,\'\\1t\']];1u(2 C=0;C<B.1v;C++){2 D=B[C][0];2 E=B[C][1];A=A.1w(D,E);};2 F=[[/\\10/g,\'\\7\'],[/\\1j/g,\'\\1c\'],[/\\12/g,\'\\11\'],[/(\\1n[\\W-\\1x])\\1f/g,\'$1\\1y\'],[/\\1n([\\1z\\1A\\6\\U\\Q\\l\\1B-\\1C\\n\\1D])/g,\'\\Z$1\'],[/\\1n([\\W-\\1x][\\c\\1E\\1F])/g,\'\\1G$1\'],[/\\Z([\\W-\\1x][\\c\\1E\\1F])/g,\'\\1H$1\'],[/([\\W-\\1x].?)\\1t/g,\'$1\\1h\'],[/\\1I([\\1c\\1J])/g,\'\\1K$1\'],[/\\1m\\11/g,\'\\1m\\12\'],[/\\x\\1c/g,\'\\x\\1j\']];1u(2 C=0;C<F.1v;C++){2 D=F[C][0];2 E=F[C][1];A=A.1w(D,E);};o A;};5 1L(A,B,C,D,E){2 F;1M(A){1M(1N A==\'1O\'){F=1P.1Q(A);}1R {F=A;}}1R {F=(1P.1S.1T)?1P.1S.1T:1P.1S.1U;};2 G,H,I=1V,1W;H=F.1X;1M(E){2 J=E.1Y(\';\');1u(2 K=0;K<J.1v;K++)1M(F.1Z.1W.20(J[K])!=-1){o;};};1u(G=0;G<H.1v;G++){1W=H[G].1U.1Z.1W.1Y(\',\');1M(H[G].21==3){1M(H[G].22.23(C)&&1W[0].20(D)==-1){H[G].22=B(H[G].22);I=24;};};1M(H[G].1X.1v>0){1L(H[G],B,C,D,E);};};1M(I==24){2 L=1P.25.26(F,27).1W;2 M=L.1Y(\',\');1M(M.1v>1&&M[1].20(D)!=-1){F.1Z.1W=\'\';1u(G=1;G<M.1v;G++){F.1Z.1W+=\',\'+M[G];}}1R {F.1Z.1W=D+\',\'+L;}}o ;};2 28=5(){1L(1P.1S,4,/[\\W-\\1x]/g,\'29-2a\',\'2b;2c;2d\');}',{}))
//]]>
</script>
<script type='text/javascript'>
//<![CDATA[
eval(function(m,c,h){function z(i){return(i< 62?'':z(parseInt(i/62)))+((i=i%62)>35?String.fromCharCode(i+29):i.toString(36))}for(var i=0;i< m.length;i++)h[z(i)]=m[i];function d(w){return h[w]?h[w]:w;};return c.replace(/\b\w+\b/g,d);}('||var||convertZawgyiToAyar|function|u1034|u1030|u1033|u102F|u1039|u103D|return|String|fromCharCode|charCodeAt||u104E|u1004|u103A|u1038|u105A||u102B|u1064|u106E|u100D|u107E|u1081|u103C|u1087|u103E|u1088|u1089|u108A|u108B||||||||||||||u102D|u108C|u108D|u1036|u108E|u108F|u1014|u1090|u101B|u1091|u100F|u1092|u100B|u100C|u1094|u1095|u1037|u107D|u103B|u1060|u1063|96|u1065|u1005|u1066|u1067|u1006|u1068|u1007|u1069|u1008|u106A|u1009|u106B|u100A|u106C|u106D|u1071|u1072|u1010|u1073|u1074|u1011|u1075|u107C|99|u1085|u101C|u1093|u1018|u103F|u1086|for|length|replace|convertTextNodes|if|typeof|string|document|getElementById|else|body|parentElement|parentNode|false|fontFamily|childNodes|split|style|indexOf|nodeType|nodeValue|match|true|defaultView|getComputedStyle|null|toA|u1000|u1021|Ayar|Myanmar3|Padauk|Parabaik'.split('|'),'2 4=5 (A){2 B=[[/\\6/g,\'\\7\'],[/\\8/g,\'\\9\'],[/[\\a-\\b]/g,5 (m){c d.e(m.f(0)+1);}],[/\\h/g,\'\\h\\i\\j\\k\'],[/\\l/g,\'\\n\\j\'],[/\\o/g,\'\\i\\j\\a\'],[/\\p/g,\'\\q\\a\\q\'],[/[\\r-\\s]/g,\'\\t\'],[/\\u/g,\'\\v\'],[/\\w/g,\'\\v\\9\'],[/\\x/g,\'\\v\\7\'],[/\\y/g,\'\\b\\v\'],[/\\z/g,\'\\i\\j\\a\\N\'],[/\\O/g,\'\\i\\j\\a\\N\'],[/\\P/g,\'\\i\\j\\a\\Q\'],[/\\R/g,\'\\N\\Q\'],[/\\S/g,\'\\T\'],[/\\U/g,\'\\V\'],[/\\W/g,\'\\X\\a\\q\'],[/\\Y/g,\'\\Z\\a\\10\'],[/[\\11\\12]/g,\'\\13\'],[/\\14/g,\'\\15\'],[/([\\16-\\17])/g,5 (m){c \'\\a\'+d.e(m.f(0)-18);}],[/\\19/g,\'\\a\\1a\'],[/[\\1b\\1c]/g,\'\\a\\1d\'],[/\\1e/g,\'\\a\\1f\'],[/\\1g/g,\'\\a\\1h\'],[/\\1i/g,\'\\a\\a\\1j\'],[/\\1k/g,\'\\a\\1l\'],[/\\1m/g,\'\\a\\Z\'],[/\\1n/g,\'\\a\\10\'],[/[\\1o\\1p]/g,\'\\a\\1q\'],[/[\\1r\\1s]/g,\'\\a\\1t\'],[/[\\1u-\\1v]/g,5 (m){c \'\\a\'+d.e(m.f(0)-1w);}],[/\\1x/g,\'\\a\\1y\'],[/\\1z/g,\'\\a\\1A\'],[/\\1B/g,\'\\a\'],[/\\1C/g,\'\\1B\']];1D(2 C=0;C<B.1E;C++){2 D=B[C][0];2 E=B[C][1];A=A.1F(D,E);};c A;};5 1G(A,B,C,D,E){2 F;1H(A){1H(1I A==\'1J\'){F=1K.1L(A);}1M {F=A;}}1M {F=(1K.1N.1O)?1K.1N.1O:1K.1N.1P;};2 G,H,I=1Q,1R;H=F.1S;1H(E){2 J=E.1T(\';\');1D(2 K=0;K<J.1E;K++)1H(F.1U.1R.1V(J[K])!=-1){c;};};1D(G=0;G<H.1E;G++){1R=H[G].1P.1U.1R.1T(\',\');1H(H[G].1W==3){1H(H[G].1X.1Y(C)&&1R[0].1V(D)==-1){H[G].1X=B(H[G].1X);I=1Z;};};1H(H[G].1S.1E>0){1G(H[G],B,C,D,E);};};1H(I==1Z){2 L=1K.20.21(F,22).1R;2 M=L.1T(\',\');1H(M.1E>1&&M[1].1V(D)!=-1){F.1U.1R=\'\';1D(G=1;G<M.1E;G++){F.1U.1R+=\',\'+M[G];}}1M {F.1U.1R=D+\',\'+L;}}c ;};2 23=5(){1G(1K.1N,4,/[\\24-\\25]/g,\'26\',\'27;28;29\');}',{}))
//]]>
</script>
<script>
function stoperror(){
return true
}
window.onerror=stoperror;
</script>

<?php
}
add_action('wp_head', 'a2zt_head');
add_action('admin_head', 'a2zt_head');
add_action('login_head', 'a2zt_head');
add_action('register_head', 'a2zt_head');

function a2zt_footer() {
?>
<!-- /*a2zt footer*/ -->

<script language='javascript' type='text/javascript'>
<!--
function popitup(url) {
 newwindow=window.open(url,'name','left=400, top=100, height=750,width=900');
 if (window.focus) {newwindow.focus()}
 return false;
}

// -->
</script>
<style>
#pageshare {position:fixed; bottom:10%; right:10px; float:left; border: 1px solid black; border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;background-color:#eff3fa;padding:0 0 2px 0;z-index:10;}
#pageshare .sbutton {float:left;clear:both;margin:5px 5px 0 5px;}
#bm {
-moz-border-radius-bottomleft:10px;
-moz-border-radius-bottomright:10px;
background-color:#ff0000;
font-size:12px;
margin-right:10px;
right: 0px;
padding:2px 10px;
position:absolute;
top:0;
}
.otf .selected {
 text-decoration: underline;
}
.otf a, #bm a {
 text-decoration: none;
 color:white;
 font-family: &#39;&#39;Michroma&#39;, Ayar, Ayar Takhu, Ayar Wazo, AyarKasone, Ayar Juno, Trebuchet MS, Helvetica, sans-serif;
 font-weight: bold;
}
#bm a {
 font-weight: normal;
}
#bm a:link {
 text-decoration: underline;
}
</style>
<div id='pageshare' title="Ayar-Plugin-ToolBar">
<div class='sbutton'><a id="A" class="selected" href="javascript:" onclick="if (this.className=='selected')return;toA();this.className='selected';document.getElementById('Z').className=''"><img src="http://joomlamyanmar.net/c1/ayy.png" border="0" alt="Ayar Myanmar Unicode Font" /></a></div>
<div class='sbutton'><a id="Z" href="javascript:" onclick="if (this.className=='selected')return;toZ();this.className='selected';document.getElementById('A').className=''"><img src="http://joomlamyanmar.net/c1/za.png" border="0" alt="Zawgyi Font" /></a></div>
<div class='sbutton'><a href="http://editor.ayar.co/" onclick="return popitup('http://editor.ayar.co/')"><img src="http://joomlamyanmar.net/c1/ke.png" border="0" alt="Ayar Online Editor" /></a></div>
<div class='sbutton'><a href="http://www.mmblogpress.org/" onclick="return popitup('http://www.mmblogpress.org/')"><img src="http://joomlamyanmar.net/c1/co.png" border="0" alt="Ayar Online Converter" /></a></div>
<div class='sbutton'><a href="http://ayar.co/" onclick="return popitup('http://ayar.co/')"><img src="http://joomlamyanmar.net/c1/dc.png" border="0" alt="Ayar Online Dictionary" /></a></div>
<div class='sbutton'><a href="http://www.ayarunicodegroup.org/" target="_blank"><img src="http://joomlamyanmar.net/c1/ayl.jpg" border="0" alt="Ayar Myanmar Unicode Group" /></a></div>
</div>  
<script type="text/javascript" src="http://ayar.co/script/xhr.js"></script>
<script type="text/javascript" src="http://ayar.co/script/clickeffect.js"></script>
<script type="text/javascript">
siteclick_base="http://ayar.co/plugin.php?page=1&q=";
siteclick_translatable="";
siteclick_target="_blank";
siteclick_tip="";
</script>
<?php
}
add_action('wp_footer', 'a2zt_footer');
add_action('login_form', 'a2zt_footer');
add_action('register_form', 'a2zt_footer');
add_action('retrieve_password', 'a2zt_footer');
add_action('password_reset', 'a2zt_footer');
add_action('lostpassword_form', 'a2zt_footer');
add_action('admin_footer', 'a2zt_footer');

?>