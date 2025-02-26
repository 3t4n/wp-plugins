var isJQuery = (typeof jQuery != "undefined")?true:false;
if(isJQuery) {
    jQuery(document).ready(function(){
        var racine = "http://www.fan-de-cinema.com";
        var rel = 0;
        jQuery(".fdcSortiesCine .fdcImage").each(function() {
            var lnk=jQuery(this).attr("rel");
            jQuery(this).children("img").wrap('<a target="_blank" href="'+racine+'/films/'+lnk+'.html"></a>');
            jQuery(this).parent().append('<a class="more" target="_blank" href="'+racine+'/seances/'+lnk+'.html">Horaire des seances</a>');
        });
        jQuery(".fdcSortiesCine .fdcImage input").bind("click",function() {
            if(rel!=jQuery(this).attr("rel")){
                jQuery(".fdcSortiesCine iframe").remove();
                rel=jQuery(this).attr("rel");jQuery(this).attr("value","Stop");
                jQuery(this).parent().parent().prepend('<iframe src="'+racine+'/embed-'+rel+'.html?auto=true" width="100%" height="288"></iframe>');} else {jQuery(this).attr("value","Bande Annonce");jQuery(".fdcSortiesCine iframe").remove();rel=0;
            }
        }).css("cursor","pointer");
    });
}
