/*Plugin: All-in-One-Gallery*/
/*Content: Jquery for the Exclude images from a category */
/*Author: Thomas Michalak aka TM*/
/*Author URI: http://www.fuck-dance-lets-art.com*/
 
 
 //var j$ = jQuery.noConflict();


j$(document).ready(function(){
     //Exclude Images option
    j$("#saveExcludeInput").click(function(e){
        e.preventDefault();
        //Get cat name
        var catHtmlId = j$(".wrapper").attr("id");
        var catName = "#exlu_cat_style #"+catHtmlId;
        
        console.log(j$(catName).length);
        //Add hidden div if it doesn't exist
        if(j$(catName).length == 0){
            j$("#exlu_cat_style").prepend("<div id=\""+catHtmlId+"\" class=\"hidden\"></div>");
        }
        //if it exist, empty it
        else{
            j$(catName).empty();    
        }
        //Add checked inputs to that div
        j$.each(j$(".wrapper input:checked"), function(){
            j$(this).prependTo(j$(catName));
        });
        //close window
        j$("#TB_closeWindowButton").click();
    });
    
});


