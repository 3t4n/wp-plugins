var isJQuery = (typeof jQuery != "undefined")?true:false;
if(isJQuery) {
    jQuery(document).ready(function(){
        var racine = "http://www.fan-de-cinema.com";
        var rel = 0;
        jQuery(".fdcSortiesCineGal .fdcImage").each(function() {
            var lnk=jQuery(this).attr("rel");
            jQuery(this).children("img").wrap('<a target="_blank" href="'+racine+'/films/'+lnk+'.html"></a>');
        });
        jQuery(".fdcSortiesCineGal .fdcnext").bind("click",function() {
            jQuery(".fdcSortiesCineGal .fdcBlock").each(function(index) {
            if(index==0) {jQuery(this).appendTo(".fdcSortiesCineGal .fdcInner");}
            });
        });
        jQuery(".fdcSortiesCineGal .fdcprev").bind("click",function() {
            var last;jQuery(".fdcSortiesCineGal .fdcBlock").each(function() {last=jQuery(this);});
            last.prependTo(".fdcSortiesCineGal .fdcInner");
        });
        jQuery(".fdcSortiesCineGal .fdcImage input").bind("click",function() {
            if(rel!=jQuery(this).attr("rel")){
                jQuery(".fdcSortiesCineGal iframe").remove();
                rel=jQuery(this).attr("rel");
                jQuery(this).attr("value","Stop");
                jQuery(this).parent().parent().parent().parent().append('<iframe src="'+racine+'/embed-'+rel+'.html?auto=true" width="100%" height="288"></iframe>');
            } else {
                jQuery(this).attr("value","Bande Annonce");jQuery(".fdcSortiesCineGal iframe").remove();
                rel=0;
            }
        }).css("cursor","pointer");
    });
}
