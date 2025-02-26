/*
 * setInBodyCategorySelect.js
 */

jQuery(document).ready(function(){
    flg_apm.setInBodyCategorySelect.init();
});


flg_apm.setInBodyCategorySelect=new flg_apm.setField('setInBodyCategorySelect','.c_InBodyCategorySelect');


flg_apm.setInBodyCategorySelect.during_create=function(fi,obj){

    s=$(obj).parents('.controls').find('.c_InBodyCategorySelect');
    lbl=$(s).attr("data-label");
    category=$(s).attr("data-category");
    field=$(s).attr("data-field");
    isadmin=Number(flg_apm.userProfile.isadmin);
    btns='';
    if(isadmin==1){
        btns=my_extensions_views['setInBodyCategorySelectBtns'].tpl;
        btns=btns.replace(/{{label}}/g,lbl);
        btns=btns.replace(/{{category}}/g,category);
        btns=btns.replace(/{{field}}/g,field);
    }else{
        btns=my_extensions_views['setInBodyCategorySelectinfo'].tpl;
    }
    str=fi.str;
    str=str.replace(/{{btns}}/g,btns);
    fi.str=str;

    return fi;
}
flg_apm.setInBodyCategorySelect.postcreate=function(fi,obj){

    flg_apm.c_apm_load_categ(fi.category,fi.field);
}

flg_apm.setInBodyCategorySelect.initClicks=function(){
    //alert();
    apm_categ_inbody_manage=$('.apm_categ_inbody_manage');
    $(apm_categ_inbody_manage).off('click').on('click', function(){
        category=$(this).attr('category');
        downloadWindow = window.open('edit-tags.php?taxonomy='+category);

    });

    apm_categ_inbody_add=$('.apm_categ_inbody_add');
    u=flg_apm.getAdminUrl

    $(apm_categ_inbody_add).off('click').on('click', function(){
        category=$(this).attr('category');
        field=$(this).attr('field');
        s=$(this).parents('.controls').find('select');
        if($(s).attr('disabled')!==undefined){
            // alert('Sorry you need to wait the data to load.');
            flg_apm.setAlertPanel.addAlert('Please wait','Sorry you need to wait the data to load....','error',3000);
            return;
        }
        var gloWin= flg_apm.c_create_globalModalWin();
        lbl=$(s).parent().parent().attr("data-label");
        strcon=my_extensions_views['setInBodyCategoryWinAddForm'].tpl;

        strconarr=strcon.split('[[categname]]') ;
        strcon= strconarr.join(category);
        strconarr=strcon.split('[[apm_field]]') ;
        strcon= strconarr.join(field);
        strconarr=strcon.split('[[label]]') ;
        strcon= strconarr.join(lbl);
        flg_apm.c_init_globalModalWin(gloWin,{
            title:'Add New '+lbl,
            actionTitle:'Add',
            content:strcon,
            actionClass:'apm_save_body_categ'
        });

        $('select',gloWin).html($(s).html());
        gloWin.modal('show');//
        $('.apm_save_body_categ',gloWin).off('click').on('click',function(){
            flg_apm.c_init_saveAjaxCategForm(gloWin);
        });
        $('.apm_do_reset_categ',gloWin).off('click').on('click',function(){
            var category=$(this).attr('category');
            b=confirm('Are you sure? This will reset this category values to the intial values');
            if(b){
                $('.modal_global_alert',gloWin).html('<span style="color:green">Reseting....</span> ');
                $.ajax({
                    url: ajaxurl ,
                    type: "POST",
                    data: "subaction=reset_check_fill_category&action=apm_extensions&category="+category,
                    error: function(data){
                        $('.modal_global_alert',gloWin).html('<span style="color:red">Sorry, an error occured.</span> ');
                    },
                    success: function(data){
                        $('.modal_global_alert',gloWin).html('<span >The category has been reset to initial values....</span> ');

                        apm_fieldsource=$('input.apm_fieldsource',gloWin);
                        if(apm_fieldsource!==undefined && apm_fieldsource!=="" && apm_fieldsource!==null){
                            flg_apm.c_apm_load_categ(category,apm_fieldsource);
                        }
                        gloWin.modal('hide');
                    }
                });
            }
        });
    });
}



flg_apm.c_apm_set_categ=function(categ_data){
    sel=$('#'+categ_data.field+'_select');
    selected_value=$(sel).attr('selected_value');
    var str="<option value=''>--None--</option>";
    //alert(categ_data.field+'/  +'+categ_data.data.length);
    $.each(categ_data.data,function(k,cat){
        selec="";
        if(selected_value==cat.id){
            selec=" selected='selected' "
        }
        lev='';
        for(i=0;i<cat.depth;i++){
            lev+='--';
        }
        str+="<option value='"+cat.id+"' "+selec+" cat-txt='"+cat.name+"'>"+lev+cat.name+"</option>";// ("+cat.count+")
    });
    $(sel).html(str)
    $(sel).removeAttr('disabled');
}

flg_apm.c_apm_load_categ=function(categ,field){
    apm_load_categ=$('.apm_load_categ');
    var categ=categ;
    var field=field;
    $.each(apm_load_categ, function(i,obj){
        var obj=$(obj);
        category=obj.attr('category');
        if(category==categ){
            flg_apm.getCategData('category',category,'flg_apm.c_apm_set_categ();',field)


        }
    });
}
flg_apm.getCategData=function(type,name,callback,field){
    var callback=callback;
    var field=field;
    $.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "subaction=getCategoriesList&action=apm_extensions&name="+name+"&field="+field+"&type="+type,
        //data: "name="+name+"&field="+field+"&type="+type+"&action=apm_extensions_data",
        //context: document.body,
        success: function(data){
            c_extension_data=$.JSON.decode(data);
            flg_apm.c_apm_set_categ(c_extension_data);
        },
        error: function(data){
            flg_apm.setAlertPanel.addAlert('Error while loading','Sorry,the loading of the categories data was interrupted or wrong.<rb>If you just try to load a new page then go on. If you stay and this page and the category loadng has been rejected then please try to reload the page','warning',5000);
        // alert('An error happend in the loading of the data, sorry.. please reload the page...')
        }
    });
}
//

