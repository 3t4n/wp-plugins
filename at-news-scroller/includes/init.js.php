/*!
 * liScroll 1.0
 * Examples and documentation at: 
 * http://www.gcmingati.net/wordpress/wp-content/lab/jquery/newsticker/jq-liscroll/scrollanimate.html
 * 2007-2010 Gian Carlo Mingati
 * Version: 1.0.2.1 (22-APRIL-2011)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 * Requires:
 * jQuery v1.2.x or later
 * 
 */
var AtScrollSpeed = "<?php echo $data['opt-speed']; ?>";
var AtScrollText = "<?php echo $data['opt-text']; ?>";
var $ = jQuery.noConflict();

jQuery.fn.liScroll = function(settings) {
        settings = jQuery.extend({
        travelocity: 0.07
        }, settings);       
        return this.each(function(){
                var $strip = jQuery(this);
                $strip.addClass("newsticker")
                var chkWidth = <?php echo $data['scroll-gap']; ?>;
                if (chkWidth < 40) {
                    chkWidth = <?php echo $data['scroll-gap']; ?>+50;
                }
                var stripWidth = 1;
                $strip.find("li").each(function(i){
                stripWidth += jQuery(this, i).outerWidth(true)+<?php echo $data['scroll-gap']; ?>+chkWidth; // thanks to Michael Haszprunar and Fabien Volpi
                });
                var $mask = $strip.wrap("<div class='mask'></div>");
                var $tickercontainer = $strip.parent().wrap("<div class='tickercontainer'></div>");                             
                var containerWidth = $strip.parent().parent().width();  //a.k.a. 'mask' width   
                $strip.width(stripWidth);           
                var totalTravel = stripWidth+containerWidth;
                var defTiming = totalTravel/settings.travelocity;   // thanks to Scott Waye     
                function scrollnews(spazio, tempo){
                $strip.animate({left: '-='+ spazio}, tempo, "linear", function(){$strip.css("left", containerWidth); scrollnews(totalTravel, defTiming);});
                }
                scrollnews(totalTravel, defTiming);             
                $strip.hover(function(){
                jQuery(this).stop();
                },
                function(){
                var offset = jQuery(this).offset();
                var residualSpace = offset.left + stripWidth;
                var residualTime = residualSpace/settings.travelocity;
                scrollnews(residualSpace, residualTime);
                });         
        }); 
}; 

    
    $(function(){
    $("ul#at_ticker").liScroll({travelocity: AtScrollSpeed});
    });


    // Change Text
    document.getElementById("at_scroll_text").innerHTML = AtScrollText; 
