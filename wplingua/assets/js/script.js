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
jQuery(document).ready(function(s){function t(){let o=s(window).height()/2;s(".wplng-switcher.style-dropdown").each(function(t){var n,e;s(this).offset().top-s(window).scrollTop()<o?s(this).hasClass("open-bottom")||(s(this).addClass("open-bottom"),s(this).removeClass("open-top"),e=s(".wplng-languages",this).prop("outerHTML"),n=s(".wplng-language-current",this).prop("outerHTML"),s(".switcher-content",this).html(n+e)):s(this).hasClass("open-top")||(s(this).addClass("open-top"),s(this).removeClass("open-bottom"),n=s(".wplng-languages",this).prop("outerHTML"),e=s(".wplng-language-current",this).prop("outerHTML"),s(".switcher-content",this).html(n+e))})}function n(){var t=parseInt(s("#wplng-in-progress-percent").html());t<100&&(t++,s("#wplng-in-progress-percent").html(t),s("#wplng-progress-bar-value").attr("style","width: "+t.toString()+"%"))}s("a[data-wplng-flag]").each(function(){var t=(t="<img ")+('src="'+s(this).attr("data-wplng-flag")+'" ')+'class="wplng-menu-flag"> ';s(this).html(t+s(this).html())}),s(window).scroll(function(){t()}),s("#wplng_style").on("input",function(){t()}),t(),s("#wplng-in-progress-iframe").on("load",function(){var t=s("#wplng-in-progress-container").attr("wplng-reload");window.location.href=t}),n(),s("#wplng-in-progress-percent").length&&setInterval(n,2e3),s("#wpadminbar").length&&s("#wplng-in-progress-container").length&&s("#wpadminbar").hide()});//# sourceMappingURL=script.js.map
