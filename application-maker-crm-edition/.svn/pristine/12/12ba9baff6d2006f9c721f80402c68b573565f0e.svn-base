
/* JS EXTENSION
 * setAddRelated.js
 */


jQuery(document).ready(function(){
    flg_apm.setAddRelated.init();
    flg_apm.setAddRelated.initClicks();
    f=$('#do_sending_test');
//$(f).val('');
});


flg_apm.setAddRelated=new flg_apm.setField('setAddRelated','.c_setAddRelated');


flg_apm.setAddRelated.during_create=function(fi,obj){

    s=$(obj).parents('.controls').find('.c_setAddRelated');
    var imgpath=$(s).attr("data-imgpath");
    var child_second_parent=$(s).attr("data-child_second_parent");
    post_title=$(s).attr("data-post_title");
    current_post_type=$(s).attr("data-current_post_type");
    post_id=$(s).attr("data-post_id");
    var icons=$(s).attr("data-icons");
    icons=icons.split(',');
    var names=$(s).attr("data-names");
    names=names.split(',');
    var posttypes=$(s).attr("data-posttypes");
    posttypes=posttypes.split(',');
    var strli=my_extensions_views['setAddRelatedli'].tpl;
    var strlis='';
    $.each(icons,function(i,o){
        strlirep=strli;
        strlirep=strlirep.replace(/{{name}}/g,names[i]);
        strlirep=strlirep.replace(/{{iconsrc}}/g,imgpath+'/'+icons[i]);
        strlirep=strlirep.replace(/{{posttype}}/g,posttypes[i]);

        var href = "post-new.php?";
        if(child_second_parent!==''){
            second_parent_post_type=$(s).attr("data-second_parent_post_type");
            second_parent_id=$(s).attr("data-second_parent_id");
            second_parent_post_type=$(s).attr("data-second_parent_post_type");
            href+="post_type=" + posttypes[i]+ "&parent_id=" +post_id + "&second_parent_id=" +second_parent_id+ "&second_parent_post_type=" +second_parent_post_type+ "&parent_title=" +post_title+ "&parent_post_type=" +current_post_type+ "&apm_do=set_select";

        }else{
            href+="post_type=" + posttypes[i]+  "&parent_id=" +post_id + "&parent_title="+post_title+ "&parent_post_type=" +current_post_type+  "&apm_do=set_select";

        }
        strlirep=strlirep.replace(/{{href}}/g,href);
        strlis+=strlirep;
    });
    fi.str=fi.str.replace(/{{lis}}/g,strlis);
    if(my_extensions_views['setAddRelatedPro']==undefined){
        // alert('NOGO pro quick add also');
        //QuickAddPro
        fi.str=fi.str.replace(/{{QuickAddPro}}/g,'');
    }else{
        fi.str=fi.str.replace(/{{QuickAddPro}}/g,my_extensions_views['setAddRelatedPro'].tpl);

        var strli=my_extensions_views['setAddRelatedliPro'].tpl;
        var strlis='';
        $.each(icons,function(i,o){
            strlirep=strli;
            strlirep=strlirep.replace(/{{name}}/g,names[i]);
            strlirep=strlirep.replace(/{{iconsrc}}/g,imgpath+'/'+icons[i]);
            strlirep=strlirep.replace(/{{posttype}}/g,posttypes[i]);
            strlis+=strlirep;
        });
        fi.str=fi.str.replace(/{{lispro}}/g,strlis);
    // alert('go pro quick add also');
    };
    return fi;
}
flg_apm.setAddRelated.postcreate=function(fi,obj){

    return fi;
}


flg_apm.setAddRelated.initClicks=function(){


    }
