
/* JS EXTENSION
 * setModuleGridHeader.js
 */


jQuery(document).ready(function(){
    flg_apm.setModuleGridHeader.obj=$('#apmdatagrid_new_header');
    flg_apm.setModuleGridHeader.setMainTpl();
    flg_apm.setModuleGridHeader.initClicks();
    flg_apm.setModuleGridBody.setHeight();
//$(f).val('');
});


flg_apm.setModuleGridHeader=new flg_apm.setUIObject('setModuleGridHeader','.ext_new_header');



flg_apm.setModuleGridHeader.doTplPreTreatment=function(str){//Based to be overwritten in  each field declaration
    //{{siteurl}}

    if(flg_apm.setModuleGrid.module_datagrid == undefined){
        return str;
    }

    /* if(my_extensions_views['setModuleGridHeaderProGroup']==undefined){
        str=str.replace(/{{groupby}}/g,'');
    }else{
        str=str.replace(/{{groupby}}/g,my_extensions_views['setModuleGridHeaderProGroup'].tpl);
    }*/
    if(my_extensions_views['setModuleGridHeaderProQuickadd']==undefined){
        str=str.replace(/{{quickadd}}/g,'');
    }else{

        if(flg_apm.setModuleGrid.module_datagrid.fields_quickadd!==undefined){
            str=str.replace(/{{quickadd}}/g,my_extensions_views['setModuleGridHeaderProQuickadd'].tpl);
        }else{
            str=str.replace(/{{quickadd}}/g,'');
        }
    }


    str=str.replace(/{{addRecord}}/g,'post-new.php?post_type='+flg_apm.setModuleGrid.module_config.modulekey);
    str=str.replace(/{{modkeysingCap}}/g,flg_apm.setModuleGrid.module_config.singular_name.toUpperCase());
    str=str.replace(/{{modkeyCap}}/g,flg_apm.setModuleGrid.module_config.name.toUpperCase());
    //
    sortby=flg_apm.setModuleGrid.module_datagrid.sortby.split(',');

    var strOpt=my_extensions_views['setModuleGridHeaderOpt'].tpl;
    var strresul='';
    $.each(sortby,function(i,ob){
        if(flg_apm.setModuleGrid.module_datagrid.columns_definition[ob]==undefined){
            flg_apm.setAlertPanel.addAlert('Columns config issue','The column '+ob+' is not defined yet...','warning',4000);
        } else {
            label=flg_apm.setModuleGrid.module_datagrid.columns_definition[ob].label;
            s=strOpt.replace(/{{label}}/g,label);
            s=s.replace(/{{field}}/g,ob);
            s=s.replace(/{{modulename}}/g,flg_apm.setModuleGrid.module_config.singular_name);
            strresul+=s;
        }
    });
    str=str.replace(/{{sortoptions}}/g,strresul);
    str= flg_apm.setModuleGridHeader.procLang(str,[],olan.gf);
    str=this.doTplPrePreTreatment(str);
    return str;
}

/*flg_apm.setModuleGridHeader.init=function(){


    }*/
flg_apm.setModuleGridHeader.getridTrs=function(obj){
    par=$(obj).parents('.apmdatagrid_new_container').find('.tableModuleGridBody');
    chbxs=$(par).find('.oriselchk');
    trs=$(par).find('tr');
    return {
        chkbxs:chbxs,
        trs:trs
    };
}
flg_apm.setModuleGridHeader.checkRowSelReturnTr=function(obj,returnFirst){
    trs=flg_apm.setModuleGridHeader.getridTrs(obj);
    chbxs=trs.chkbxs;
    trs=trs.trs;
    var chksel=[];
    $.each(chbxs,function(i,o){
        if($(o).attr('checked')=='checked'){
            chksel.push(trs[i]);
        }
    });
    if(trs.length==0){
        flg_apm.setAlertPanel.addAlert('No data','There is no data in the grid...','warning',4000);
        return false;
    } else if(chksel.length==0){
        flg_apm.setAlertPanel.addAlert('Selection missing','Please select at least one row...','warning',4000);
        return false;
    } else {
        if(returnFirst==true){
            return chksel[0];
        }else{
            return chksel;
        }

    }
}
flg_apm.setModuleGridHeader.initClicks=function(){
    //    //

    $('.do_ori_exportcsv').off('click').on('click',function(){
        f=flg_apm.setModuleGrid.module_datagrid.exportfields;
        if(f==undefined){
            flg_apm.setAlertPanel.addAlert('Missing export fields list','Sorry but this module is missing a list of fiels to be exported in the csv. PLease contact your admin...','warning',4000);
            return false;
        }
        ak='do_export';
        sortby_ajax=flg_apm.setModuleGridBody.sortBy;
        filters_str=$.JSON.encode(flg_apm.setModuleGridBody.loadingArgs.filters);
        sort_dir=flg_apm.setModuleGridBody.sortDir;
        modulekey=flg_apm.setModuleGrid.module_config.modulekey;
        console.log(ajaxurl+"/?modulekey="+modulekey+"&action=apm_manage_grid_data&todo=get_file_csv&filters="+filters_str+"&sortby_ajax="+sortby_ajax+"&sort_dir="+sort_dir+"&fields="+f+"&action_key="+ak);
        jQuery.fileDownload(ajaxurl+"/?modulekey="+modulekey+"&action=apm_manage_grid_data&todo=get_file_csv&filters="+filters_str+"&sortby_ajax="+sortby_ajax+"&sort_dir="+sort_dir+"&fields="+f+"&action_key="+ak, {
            successCallback: function (url) {
                // alert('You just got a file download dialog or ribbon for this URL :' + url);
                flg_apm.setAlertPanel.addAlert('Success','You just got a file download dialog or ribbon for this URL :' + url,'ok',3000);
            },
            failCallback: function (html, url) {
                /*  alert('Your file download just failed for this URL:' + url + '\r\n' +
                    'Here was the resulting error HTML: \r\n' + html
                    );)*/

                flg_apm.setAlertPanel.addAlert('Error','Your file download just failed for this URL:' + url + '\r\n' +
                    'Here was the resulting error HTML: \r\n' + html,'error',9000);
                console.log(html);
            }
        });
    });

    $('.ori_sortasc').off('click').on('click',function(){
        flg_apm.setModuleGridBody.sortDir='ASC';
        CookieHelper.set('sortdir_'+flg_apm.setModuleGrid.module_config.modulekey, 'ASC', 1);
        flg_apm.setModuleGridHeader.initClicks();
        flg_apm.setModuleGridBody.doLoad();
    });
    $('.ori_sortdesc').off('click').on('click',function(){
        flg_apm.setModuleGridBody.sortDir='DESC';
        CookieHelper.set('sortdir_'+flg_apm.setModuleGrid.module_config.modulekey, 'DESC', 1);
        flg_apm.setModuleGridHeader.initClicks();
        flg_apm.setModuleGridBody.doLoad();
    });
    $('.ori_selSortBy').off('change').on('change',function(){
        //alert($(this).find(":selected").val());
        flg_apm.setModuleGridBody.sortBy=$(this).find(":selected").val();
        CookieHelper.set('sortby_'+flg_apm.setModuleGrid.module_config.modulekey, $(this).find(":selected").val(), 1);
        flg_apm.setAlertPanel.addAlert('Sorting data','Sorting data by '+$(this).find(":selected").text(),'',2000);
        flg_apm.setModuleGridBody.doLoad();
    });
    $('.do_refresh_newgrid').off('click').on('click',function(){
        flg_apm.setModuleGridBody.doLoad();
    });
    $('.do_pubrow_newgrid').off('click').on('click',function(){
        sel=flg_apm.setModuleGridHeader.checkRowSelReturnTr(this);
        if(sel!==false){
            idsarr=flg_apm.setModuleGridBody.getTrsIds(sel);
            flg_apm.setModuleGridBody.do_pub(idsarr,this);
        }
    });
    $('.do_unpubrow_newgrid').off('click').on('click',function(){
        sel=flg_apm.setModuleGridHeader.checkRowSelReturnTr(this);
        if(sel!==false){
            idsarr=flg_apm.setModuleGridBody.getTrsIds(sel);
            flg_apm.setModuleGridBody.do_unpub(idsarr,this);
        }
    });
    $('.do_draftrow_newgrid').off('click').on('click',function(){
        sel=flg_apm.setModuleGridHeader.checkRowSelReturnTr(this);
        if(sel!==false){
            idsarr=flg_apm.setModuleGridBody.getTrsIds(sel);
            flg_apm.setModuleGridBody.do_draft(idsarr,this);
        }
    });
    $('.do_trashrow_newgrid').off('click').on('click',function(){
        sel=flg_apm.setModuleGridHeader.checkRowSelReturnTr(this);
        if(sel!==false){
            idsarr=flg_apm.setModuleGridBody.getTrsIds(sel);
            flg_apm.setModuleGridBody.do_trash(idsarr,this);
        }
    });
    $('.do_editrow_newgrid').off('click').on('click',function(){
        sel=flg_apm.setModuleGridHeader.checkRowSelReturnTr(this,true);
        if(sel!==false){
            id=flg_apm.setModuleGridBody.getRowId(sel,true);
            flg_apm.setModuleGridBody.do_edit(id);
        }
    });
    $('.do_deleterow_newgridmod').off('click').on('click',function(){
        sel=flg_apm.setModuleGridHeader.checkRowSelReturnTr(this);
        if(sel!==false){
            idsarr=flg_apm.setModuleGridBody.getTrsIds(sel);
            flg_apm.setModuleGridBody.do_del(idsarr,this);
        }
    });
    $('.do_selectrow_newgrid').off('click').on('click',function(){
        chbxs=flg_apm.setModuleGridHeader.getridTrs(this);
        chbxs=chbxs.chkbxs;
        var docheck=true;
        if($(chbxs[0]).attr('checked')=='checked'){
            docheck=false;
        }
        $.each(chbxs,function(i,o){
            if(docheck){
                $(o).attr('checked','checked');
            }else{
                $(o).removeAttr('checked');
            }
        });

    });

}
