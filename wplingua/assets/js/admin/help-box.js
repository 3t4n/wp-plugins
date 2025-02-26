/*!*
 **                 _     _                         
 ** __      ___ __ | |   (_)_ __   __ _ _   _  __ _ 
 ** \ \ /\ / / '_ \| |   | | '_ \ / _` | | | |/ _` |
 **  \ V  V /| |_) | |___| | | | | (_| | |_| | (_| |
 **   \_/\_/ | .__/|_____|_|_| |_|\__, |\__,_|\__,_|
 **          |_|                  |___/             
 **
 **        -- wpLingua | WordPress plugin --
 **   Translate and make your website multilingual
 **
 **     https://github.com/julien-jacob/wplingua
 **      https://wordpress.org/plugins/wplingua/
 **              https://wplingua.com/
 **
 **/
jQuery(document).ready(function(l){l("[wplng-help-box], [wplng-help-box-right]").click(function(){let t=l(this).attr("wplng-help-box");null==t&&(t=l(this).attr("wplng-help-box-right")),l(t).slideToggle(),"1"==l(this).attr("wplng-help-box-open")?(l(this).attr("wplng-help-box-open","0"),l(this).attr("style","")):(l(this).attr("wplng-help-box-open","1"),l(this).css("color","#69a8bb"),l(this).css("opacity","1"))})});//# sourceMappingURL=help-box.js.map
