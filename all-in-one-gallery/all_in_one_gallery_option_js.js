var j$ = jQuery.noConflict();


j$(document).ready(function(){
    
    j$("#categoriesSwitch li input").click(function(){
        if( j$(this).attr("value") == "On"){
            jQuery.each( j$("#exlu_cat_style li"), function(){
                if( j$(this).hasClass("IAmEmpty") ){
                    j$(this).find("input").attr({checked: "true"});
                    j$(this).addClass("selected");
                }
            });
        }
        if( j$(this).attr("value") == "Off"){
            jQuery.each( j$("#exlu_cat_style li"), function(){
                if( j$(this).hasClass("IAmEmpty") ){
                    j$(this).find("input").removeAttr("checked");
                    j$(this).removeClass("selected");
                }
            });
        }
        if( j$(this).attr("value") == "Clear All"){
            j$("#exlu_cat_style li input").removeAttr("checked");
            j$("#exlu_cat_style li").removeClass("selected");
        }
    });
    
    
    
    j$("#exlu_cat_style li input").click(function(){
        if( j$(this).parent().hasClass("selected") ) j$(this).parent().removeClass("selected");
        else j$(this).parent().addClass("selected");
    });
    
    j$("#exlu_cat_style li a.noImages").click(function(e){
            e.preventDefault();
    });
    
    
});

/*
function myAjax(id){
    
    var data = {
	action: 'my_special_action',
	catID: id
    };

    // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
    jQuery.post('admin-ajax.php', data, function(response) {
	alert('Got this from the server: ' + response);
    });
    
}
*/
