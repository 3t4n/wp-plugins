jQuery(function($) {

    $(document).on("click","#newtablistdropdown li",function(){
        var selected_id = $(this).find("a:first").attr("href");
        /*$("#newtablistdropdown li").removeClass("active");
        $(this).addClass("active");
        $("#newtablistdrop button:first").html($(this).find("a:first").html()+'<span class="caret"></span>');*/
        $("#newtablist li a[href='"+selected_id+"']").trigger("click");
        //$("#newtablistdrop").dropdown('toggle');
        //return false;
        
    });
    
    
    $(document).on("click","ul#newtablist li",function(){
        /*var selected_id = $(this).find("a:first").attr("href");
        $(".new-tab-content div.content-block").removeClass("active");
        $(".new-tab-content div"+selected_id).addClass("active");
        
        $("#newtablist li").removeClass("active");
        $(this).addClass("active");
        return false;*/
        var selected_id = $(this).find("a:first").attr("href");
        var dropdowndiv = $("#newtablistdrop");
        var dropdown = $("#newtablistdropdown");
        dropdowndiv.find("button:first").html($(this).find("a:first").html()+'<span class="caret"></span>');
        
        $("#newtablistdropdown li").removeClass("active");
        $("#newtablistdropdown li a[href='"+selected_id+"'").closest("li").addClass("active");
        return false;
    });
    
});