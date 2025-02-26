/*
    Version:1.0.0
*/
if(typeof awsa_dropdown_tabs_link === "undefined"){
    function awsa_dropdown_tabs_link(e,animate = true){
        var link = e.currentTarget;
        var p = jQuery(this).parents('.aw-dropdown-tabs');
        p = p.length > 0 ? jQuery(p[0]) : jQuery(p);
        var target = jQuery(this).attr("href");
        if(typeof(target) == 'undefined' || target.length == 0){
            target = "#"+jQuery(this).data('target');
        }
        var links_p = jQuery(link,p);
        if(p.find(" > "+target).hasClass("active")){
            p.find(" > "+target).fadeOut(0);
            links_p.removeClass('aw-i-minus');
            links_p.addClass('aw-i-plus');                           
        }else{
            if(p.hasClass('only-1-active')){
                p.find(" > .aw-dd-tab").fadeOut(0);
                p.find(" > .aw-dd-tab.active").removeClass('active');
                p.find(" > a.active").removeClass('active');
            }
            p.find(" > "+target).fadeIn(500);
            links_p.removeClass('aw-i-plus');
            links_p.addClass('aw-i-minus');
        }            
        var top = jQuery(e.currentTarget).offset().top ;
        links_p.toggleClass('active');
        p.find(" > "+target).toggleClass('active');
        if(animate){
            jQuery('html, body').animate({scrollTop:top-100}, 500);
        }           
        
        return false;
    }
}

if(typeof awsa_dropdown_tabs === "undefined"){
    var dropdown_tabs_init = false;
    function awsa_dropdown_tabs(){
        if(dropdown_tabs_init){
            return;
        }else{
            dropdown_tabs_init = true;
        }
        jQuery('.aw-dropdown-tabs > .aw-n').on('click',awsa_dropdown_tabs_link);
        jQuery('.aw-dropdown-tabs > .aw-n').addClass('aw-i-plus');
        jQuery('.aw-dropdown-tabs.open > .aw-n').trigger('click',false);            
    }
}
/* dropdown tabs script end */


jQuery(document).ready(function($){
    /* dropdown tabs script start */
    awsa_dropdown_tabs();
    /* dropdown tabs script end */
});
