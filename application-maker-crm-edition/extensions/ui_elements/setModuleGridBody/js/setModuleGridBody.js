
/* JS EXTENSION
 * setModuleGridBody.js
 */


jQuery(document).ready(function(){
    if(flg_apm.setModuleGrid.module_config!==undefined){
        flg_apm.setModuleGridBody.loadingArgs={
            entity:flg_apm.setModuleGrid.module_config.modulekey,
            sortBy:false,
            sortDir:false,
            filters:false,
            page:1,
            nbByPage:false
        }
    }
    flg_apm.setModuleGridBody.obj=$('#apmdatagrid_new_gridbody');
    flg_apm.setModuleGridBody.setMainTpl();
    flg_apm.setModuleGridBody.initClicks();
//$(f).val('');
});


flg_apm.setModuleGridBody=new flg_apm.setUIObject('setModuleGridBody','.ext_new_gridbody');


flg_apm.setModuleGridBody.isLoading=false;

flg_apm.setModuleGridBody.doTplPreTreatment=function(str){//Based to be overwritten in  each field declaration

    return str;
}


/*flg_apm.setModuleGridBody.init=function(){


    }*/

flg_apm.setModuleGridBody.doLoad=function(){
    if(flg_apm.setModuleGrid.module_datagrid !== undefined){
        flg_apm.setModuleGridBody.isLoading=true;
        var tdLoad=my_extensions_views['setModuleGridBodyLoading'].tpl;
        cil=flg_apm.setModuleGrid.module_datagrid.columns_initial_list.split(',');
        tdLoad=tdLoad.replace(/{{colspan}}/g,cil.length+3);
        $('#TabModuleGridBody tbody').html(tdLoad);
        $('.blockonload').removeClass("isblockedonload");
        $('.blockonload').removeClass("disabled");
        $('.blockonload').addClass("disabled");
        $('.blockonload').addClass("isblockedonload");
        $('.isblockedonload').off('click').on("click",function(){
            if(flg_apm.setModuleGridBody.isLoading==true){
                flg_apm.setAlertPanel.addAlert('Loading','Please wait while loading...','warning',3000);
            }
        });
        flg_apm.setModuleGridBody.doLoadData();
    }

}
flg_apm.setModuleGridBody.nbByPage=false;
flg_apm.setModuleGridBody.nbByPagedefault=10;
flg_apm.setModuleGridBody.sortBy=false;
flg_apm.setModuleGridBody.sortDir=false;
flg_apm.setModuleGridBody.getNbByPage=function(){
    if(flg_apm.setModuleGridBody.nbByPage==false){
        flg_apm.setModuleGridBody.nbByPage=flg_apm.setModuleGridBody.nbByPagedefault;
        if(flg_apm.setModuleGrid.module_datagrid !== undefined){
            if(flg_apm.setModuleGrid.module_datagrid.config !== undefined){
                if(flg_apm.setModuleGrid.module_datagrid.config.default_nb_by_page !== undefined){
                    flg_apm.setModuleGridBody.nbByPage=flg_apm.setModuleGrid.module_datagrid.config.default_nb_by_page;
                }
            }
        }
        modkey=flg_apm.setModuleGrid.module_config.modulekey;
        if(CookieHelper.get('nbbypage_'+modkey) != undefined ){
            flg_apm.setModuleGridBody.nbByPage=Number(CookieHelper.get('nbbypage_'+modkey)) ;
        }
    }
    CookieHelper.set('nbbypage_'+modkey, flg_apm.setModuleGridBody.nbByPage, 1);
    //
    flg_apm.setModuleGridTableFooter.setUpPageNb();
    return flg_apm.setModuleGridBody.nbByPage;
}
//
flg_apm.setModuleGridBody.doLoadData=function(){
    nb=flg_apm.setModuleGridBody.getNbByPage();
    //alert(nb);
    if(flg_apm.setModuleGridBody.page==undefined){
        flg_apm.setModuleGridBody.page=1;
    }
    flg_apm.setModuleGridBody.loadingArgs.sortDir=flg_apm.setModuleGridBody.sortDir;
    flg_apm.setModuleGridBody.loadingArgs.page=flg_apm.setModuleGridBody.page;
    flg_apm.setModuleGridBody.loadingArgs.nbByPage=nb;
    //flg_apm.setModuleGrid.module_datagrid.sortby
    modkey=flg_apm.setModuleGrid.module_config.modulekey;
    if(flg_apm.setModuleGridBody.sortBy==false){

        if(CookieHelper.get('sortby_'+modkey) != undefined ){
            flg_apm.setModuleGridBody.sortBy=CookieHelper.get('sortby_'+modkey) ;
        }else if(flg_apm.setModuleGrid.module_datagrid.sortby!==undefined){
            sortby=flg_apm.setModuleGrid.module_datagrid.sortby;
            if(sortby!==''){
                if(sortby.indexOf(','>-1)){
                    sortbyArr=flg_apm.setModuleGrid.module_datagrid.sortby.split(',');
                }else{
                    sortbyArr=[sortby];
                }
                flg_apm.setModuleGridBody.sortBy=sortbyArr[0];
            }
        }
    }
    if(flg_apm.setModuleGridBody.sortDir==false){
        if(CookieHelper.get('sortdir_'+modkey) != undefined ){
            flg_apm.setModuleGridBody.sortDir=CookieHelper.get('sortdir_'+modkey) ;
        }else if(flg_apm.setModuleGrid.module_datagrid.sortDir!==undefined){
            sortDir=flg_apm.setModuleGrid.module_datagrid.sortDir;
            if(sortDir!==''){
                flg_apm.setModuleGridBody.sortDir=sortDir;
            }
        }else{
            sortDir='ASC';
        }
    }
    $('.ori_selSortBy').val(flg_apm.setModuleGridBody.sortBy);
    if(flg_apm.setModuleGridBody.sortDir=='DESC'){
        $('.ori_sortasc').removeClass('active');
        $('.ori_sortdesc').addClass('active');
    }else{
        $('.ori_sortasc').addClass('active');
        $('.ori_sortdesc').removeClass('active');
    }
    //alert(CookieHelper.get('sortdir_'+modkey)+'-'+flg_apm.setModuleGridBody.sortDir);
    flg_apm.setModuleGridBody.loadingArgs.sortDir=flg_apm.setModuleGridBody.sortDir;
    flg_apm.setModuleGridBody.loadingArgs.sortBy=flg_apm.setModuleGridBody.sortBy;
    flg_apm.setDataGridStatus('loading','Loading, please wait...');
    $.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "subaction=getGlobalGridData&action=apm_extensions&entity=setModuleGridBody&args="+$.JSON.encode(flg_apm.setModuleGridBody.loadingArgs),
        error: function(data){
            flg_apm.setDataGridStatus('error','An error appeared while loading...');
            flg_apm.setAlertPanel.addAlert('Loading Issue','An error appeared while loading...','error');
        },
        success: function(data){
            flg_apm.setModuleGridBody.manageLoadedData(data);
        }
    });

}
flg_apm.setModuleGridBody.getJsonData=function(DaO,fo){
    da=DaO[fo];
    if(da.meta!==undefined){
        strcont=da.meta;
    }else if(da.txt!==undefined){
        strcont=da.txt;
    }else{
        strcont=da;
    }
    return strcont;
};

flg_apm.setModuleGridBody.getJsonLink=function(str,col,Obj,ID,link_type){
    switch(link_type){
        case 'edit_post':
            linstr=my_extensions_views['setModuleGridBodyLinkPost'].tpl;
            linstr=linstr.replace(/{{content}}/,str);
            str=linstr.replace(/{{ID}}/,ID);
            break;
        case 'edit_other_post':
            linstr=my_extensions_views['setModuleGridBodyLinkPost'].tpl;
            linstr=linstr.replace(/{{content}}/,str);
            str=linstr.replace(/{{ID}}/,Obj[col].ID);
            break;
        case 'user_profile':
            linstr=my_extensions_views['setModuleGridBodyLinkUser'].tpl;
            linstr=linstr.replace(/{{content}}/,str);
            str=linstr.replace(/{{ID}}/,Obj[col].ID);
            break;
        default:
            break;
    }
    return str;
};

//CREATE THE GIRD ROWS FROm DATA ARRAY
//
flg_apm.setModuleGridBody.dataRows=[];
flg_apm.setModuleGridBody.createRows=function(){
    var bodyStr='';
    var DataLoadedStr;
    var colsstr;

    var TdTpl=my_extensions_views['setModuleGridBodyTd'].tpl;
    var DataLoaded=my_extensions_views['setModuleGridBodyRow'].tpl;

    //
    //SET COLS WIDTHS in PX from %
    var widthArrPerc=[];
    var widthPercTotal=0;
    $.each(columns_initial_list,function(fi,fo){
        col=flg_apm.setModuleGrid.module_datagrid.columns_definition[fo];

        if(col.width!==undefined && col.width!==false){
            wi=col.width.replace(/%/, "");
        }else{
            wi='5';
        }
        wi=Number(wi);
        widthPercTotal+=wi;
    });
    var  widthPercRap=100/widthPercTotal;
    var  widthGridFull=$('.tableModuleGridBody').width();
    var  widthGridColsflex=widthGridFull-20-20-60;
    var widthOnePercPixbase=widthGridColsflex/widthPercTotal;
    $.each(columns_initial_list,function(fi,fo){
        col=flg_apm.setModuleGrid.module_datagrid.columns_definition[fo];

        if(col.width!==undefined && col.width!==false){
            wi=col.width.replace(/%/, "");
        }else{
            wi='5';
        }
        wi=Number(wi)*widthOnePercPixbase;
        widthArrPerc.push(wi);
    });

    $.each(flg_apm.setModuleGridBody.dataRows,function(i,o){
        var DaO=o;
        var columns_initial_list=flg_apm.setModuleGrid.module_datagrid.columns_initial_list.split(',');
        var fields_to_load=flg_apm.setModuleGrid.module_datagrid.fields_to_load.split(',');
        var DataLoadedStr=DataLoaded;
        var ID=DaO['ID'];
        colsstr='';
        var post_status=DaO['post_status'];
        $.each(columns_initial_list,function(fi,fo){
            Td=TdTpl;
            col=flg_apm.setModuleGrid.module_datagrid.columns_definition[fo];
            cont=flg_apm.setModuleGridBody.getJsonData(DaO,fo);
            contorig=cont;
            var colschema=col.schema;
            if(colschema!==undefined && colschema!==false){
                if(colschema.indexOf('[ifnotemptystart]')>-1){
                    schcutarr=colschema.split('[ifnotemptystart]');
                    var schcuta=schcutarr[0];
                    schcutarr2=schcutarr[1].split('[ifnotemptyend]');
                    var schcutb=schcutarr2[0];
                    var schcutc=schcutarr2[1];
                    var test=false;
                    if(cont=='' && schcutb.indexOf('{{field}}')>-1){
                        test=true;
                    }
                    $.each(fields_to_load,function(flip,flop){
                        if(schcutb.indexOf('{{'+flop+'}}')>-1){
                            ss=flg_apm.setModuleGridBody.getJsonData(DaO,flop);
                            if(ss==''){
                                test=true;
                            }
                        }
                    });
                    if(test){
                        colschema=schcuta+schcutc;
                    }else{
                        colschema=schcuta+schcutb+schcutc;
                    }
                }
                if(colschema.indexOf('[linkstart]')>-1){
                    schcutarr=colschema.split('[linkstart]');
                    schcuta=schcutarr[0];
                    schcutarr2=schcutarr[1].split('[linkend]');
                    schcutb=schcutarr2[0];
                    schcutc=schcutarr2[1];
                    schcutb_linked= flg_apm.setModuleGridBody.getJsonLink(schcutb,fo,DaO,ID,col.link_type);
                    colschema=schcuta+schcutb_linked+schcutc;
                }else{
                    if(col.use_link!==undefined && col.use_link==true){
                        cont=  flg_apm.setModuleGridBody.getJsonLink(cont,fo,DaO,ID,col.link_type);
                    }
                }
                var strda=colschema.replace(/{{field}}/g,cont);
                $.each(fields_to_load,function(fli,flo){
                    s=flg_apm.setModuleGridBody.getJsonData(DaO,flo);
                    strda=strda.split('{{'+flo+'}}').join(s);
                });
                cont=strda;
            }else{
                if(col.use_link!==undefined && col.use_link==true){
                    cont=  flg_apm.setModuleGridBody.getJsonLink(cont,fo,DaO,ID,col.link_type);
                }
            } ;
            if(cont==null){
                cont='';
            }
            if(cont==true){
                cont='Yes';
            }
            if(cont==false && cont!==''  && cont!==null){
                cont='No';
            }
            if(cont==''){
                cont='--';
            }
            cont=cont.replace(/{{currency}}/g,apm_settings.configs.default_currency);

            Td=Td.replace(/{{content}}/,cont);
            Td= Td.replace(/{{width}}/, "width:"+widthArrPerc[fi]+"px;");
            colsstr+=Td;
        });

        DataLoadedStr=DataLoadedStr.replace(/{{cols}}/g,colsstr);
        DataLoadedStr=DataLoadedStr.replace(/{{ID}}/g,ID);

        if(post_status=='publish'){
            DataLoadedStr=DataLoadedStr.replace(/{{pubunpub}}/g,my_extensions_views['setModuleGridBodyBtnPub'].tpl);
            DataLoadedStr=DataLoadedStr.replace(/{{actpubunpub}}/g,my_extensions_views['setModuleGridBodyActUnPub'].tpl);
        }else if(post_status=='draft'){
            DataLoadedStr=DataLoadedStr.replace(/{{pubunpub}}/g,my_extensions_views['setModuleGridBodyBtnDraft'].tpl);
            DataLoadedStr=DataLoadedStr.replace(/{{actpubunpub}}/g,my_extensions_views['setModuleGridBodyActPub'].tpl);
        }else if(post_status=='trash'){
            DataLoadedStr=DataLoadedStr.replace(/{{pubunpub}}/g,my_extensions_views['setModuleGridBodyBtnTrash'].tpl);
            DataLoadedStr=DataLoadedStr.replace(/{{actpubunpub}}/g,my_extensions_views['setModuleGridBodyActPub'].tpl);
        }else{
            DataLoadedStr=DataLoadedStr.replace(/{{pubunpub}}/g,my_extensions_views['setModuleGridBodyBtnUnPub'].tpl);
            DataLoadedStr=DataLoadedStr.replace(/{{actpubunpub}}/g,my_extensions_views['setModuleGridBodyActPub'].tpl);
        }
        bodyStr+=DataLoadedStr;
    });
    $('#TabModuleGridBody tbody').html(bodyStr);

    flg_apm.initMainRollover();
    flg_apm.setModuleGridBody.initClicks();
    flg_apm.setModuleGridHeader.initClicks();
    flg_apm.setModuleGridTableHeader.setThW();
}
//CALLED AFTER LOADING
flg_apm.setModuleGridBody.manageLoadedData=function(data){
    var data_ar=$.JSON.decode(data);
    flg_apm.setAlertPanel.addAlert('Loaded Successfully',data_ar.rows.length+' row(s) loaded','default',2000);
    flg_apm.setDataGridStatus('ok','Data loaded.');
    flg_apm.setModuleGridTableFooter.setUpData(data_ar.rows.length,data_ar.total,data_ar.page,data_ar.fulltotal);
    $('.isblockedonload').off('click');
    $('.blockonload').removeClass("isblockedonload");
    $('.blockonload').removeClass("disabled");
    flg_apm.setModuleGridBody.dataRows=data_ar.rows;

    flg_apm.setModuleGridBody.createRows();
}

flg_apm.setModuleGridBody.getRowId=function(obj,own){
    if(own==true){
        id=$(obj).attr('data-ID');
    }else{
        id=$(obj).parents('tr').attr('data-ID');
    }
    return id;
}
flg_apm.setModuleGridBody.getTrsIds=function(sel){
    var ids=[];
    $.each(sel,function(i,o){
        id=flg_apm.setModuleGridBody.getRowId(o,true);
        ids.push(id);
    });
    return ids;
}
flg_apm.setModuleGridBody.initClicks=function(){
    $(".dropdown-toggle").off("click").on("click",  function() {
        o=$(this).parent();
        postop=$(o).position().top;
        dropd=$(o).find('.dropdown-menu');
        if(postop+$(dropd).height()>$(window).height()-170){
            $(dropd).addClass('margless160');
        }else{

            $(dropd).removeClass('margless160');
        }

    });

    $('.ori_do_publish').off('click').on('click',function(){
        id=flg_apm.setModuleGridBody.getRowId(this);
        flg_apm.setModuleGridBody.do_pub([id],this)
    });
    $('.ori_do_unpublish').off('click').on('click',function(){
        id=flg_apm.setModuleGridBody.getRowId(this);
        flg_apm.setModuleGridBody.do_unpub([id],this)

    });
    $('.ori_do_draft').off('click').on('click',function(){

        id=flg_apm.setModuleGridBody.getRowId(this);
        flg_apm.setModuleGridBody.do_draft([id],this);

    });
    $('.ori_do_trash').off('click').on('click',function(){
        id=flg_apm.setModuleGridBody.getRowId(this);
        flg_apm.setModuleGridBody.do_trash([id],this);

    });
    $('.ori_do_del').off('click').on('click',function(){
        id=flg_apm.setModuleGridBody.getRowId(this);
        id=Number(id);
        idar=[id];
        flg_apm.setModuleGridBody.do_del(idar,this,'inrow');
    });
    $('.ori_do_edit').off('click').on('click',function(){
        id=flg_apm.setModuleGridBody.getRowId(this);
        flg_apm.setModuleGridBody.do_edit(id,'current')

    });
    $('.pencilori_do_editnew').off('click').on('click',function(){
        id=flg_apm.setModuleGridBody.getRowId(this);
        flg_apm.setModuleGridBody.do_edit(id,'blank')

    });
}
flg_apm.setModuleGridBody.do_edit=function(id,targ){
    document.location.href='post.php?post='+id+'&action=edit';
}

flg_apm.setModuleGridBody.convertIdsArrayToNum=function(ids){
    ar=[];
    $.each(ids,function(i,id){
        ar.push(Number(id));
    });
    return ar;
}
flg_apm.setModuleGridBody.inArray=function(needle,haystack,testString){
    var b=false;
    var needle=needle;
    var testString=testString;
    $.each(haystack,function(i,o){
        if(testString!==undefined){
            if(String(o)==String(needle)){
                b=true;
            }
        }else{
            if(Number(o)==Number(needle)){
                b=true;
            }
        }
    });
    return b;
}
flg_apm.setModuleGridBody.do_chkRows=function(ids){
    if(ids.length>0){
        $.each(ids,function(i,id){
            r=$('#row_id_'+id);
            $(r).find(".oriselchk").attr('checked','checked');
        });
    }
}

flg_apm.setModuleGridBody.do_updateRows=function(args){
    var args=args;
    //args.ids=flg_apm.setModuleGridBody.convertIdsArrayToNum(args.ids);
    $.each(flg_apm.setModuleGridBody.dataRows,function(i,row){
        var i=i;
        if(flg_apm.setModuleGridBody.inArray( row.ID,args.ids)){
            $.each(args.fields,function(ke,ob){
                //alert(flg_apm.setModuleGridBody.dataRows[i][ob.fi]);
                flg_apm.setModuleGridBody.dataRows[i][ob.fi]=ob.va;
            // alert(i+' - '+ob.fi+' - '+ob.va);
            //alert(flg_apm.setModuleGridBody.dataRows[i][ob.fi]);
            });
        }
    });
    /* flg_apm.setModuleGridBody.dataRows=[];*/
    flg_apm.setModuleGridBody.createRows();
    flg_apm.setModuleGridBody.do_chkRows(args.ids);
}

flg_apm.setModuleGridBody.do_updateStatus=function(status,ids){
    var status=status;
    var ids=ids;
    $.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "subaction=setPostsStatus&action=apm_extensions&args="+$.JSON.encode({
            status:status,
            ids:ids
        }),
        error: function(data){
            flg_apm.setDataGridStatus('error','An error appeared while updating...');
            flg_apm.setAlertPanel.addAlert('Updating Issue','An error appeared while updating...','error',4000);
        },
        success: function(data){
            if(data!==''){
                var data_ar=$.JSON.decode(data);

                switch(data_ar.success){
                    case'ok':
                        switch(status){
                            case'DRAFT':
                                status='Set to DRAFT';
                                statusfield='draft';
                                break;
                            case'PUBLISHED':
                                statusfield='publish';
                                break;
                            case'UNPUBLISHED':
                                statusfield='pending';
                                break;
                            case'TRASHED':
                                statusfield='trash';
                                break;
                        }
                        flg_apm.setModuleGridBody.do_updateRows({
                            fields:[{
                                fi:'post_status',
                                va:statusfield
                            }],
                            ids:data_ar.idsupdated.split(',')
                        });
                        flg_apm.setDataGridStatus('ok',status+' '+ids.length+' rows...');
                        flg_apm.setAlertPanel.addAlert('Success',status+' '+ids.length+' rows...','ok',2000);
                        break;
                    case'error':
                        flg_apm.setDataGridStatus('error','An error appeared while updating...');
                        flg_apm.setAlertPanel.addAlert('Updating Issue','An error appeared while updating...','error',4000);
                        break;
                    case'partial':
                        flg_apm.setDataGridStatus('warning',data_ar.txt);
                        flg_apm.setAlertPanel.addAlert('Issue while deleting',data_ar.issue,'warning');

                        flg_apm.setModuleGridBody.do_updateRows({
                            fields:[{
                                fi:'post_status',
                                va:statusfield
                            }],
                            ids:data_ar.idsupdated.split(',')
                        });
                        break;
                }
            }else{
                flg_apm.setDataGridStatus('error','An error appeared while updating...');
                flg_apm.setAlertPanel.addAlert('Updating Issue','An error appeared while updating...','error',4000);
            }
        }
    });
}


flg_apm.setModuleGridBody.do_pub=function(ids,obj){
    var Obj=obj;
    flg_apm.setDataGridStatus('loading','PUBLISHING '+ids.length+' rows...');
    flg_apm.setAlertPanel.addAlert('Sending','PUBLISHING '+ids.length+' rows...','default',2000);
    flg_apm.setModuleGridBody.do_updateStatus('PUBLISHED',ids);

}
flg_apm.setModuleGridBody.do_trash=function(ids,obj){
    var Obj=obj;
    b=confirm('Do you really want to TRASH '+ids.length+' row(s)');
    if(b){
        flg_apm.setDataGridStatus('loading','TRASHING '+ids.length+' rows...');
        flg_apm.setAlertPanel.addAlert('Sending','TRASHING '+ids.length+' rows...','default',2000);
        flg_apm.setModuleGridBody.do_updateStatus('TRASHED',ids);
    }
}
flg_apm.setModuleGridBody.do_unpub=function(ids,obj){
    var Obj=obj;
    b=confirm('Do you really want to UNPUBLISH '+ids.length+' row(s)');
    if(b){
        flg_apm.setDataGridStatus('loading','UNPUBLISHING '+ids.length+' rows...');
        flg_apm.setAlertPanel.addAlert('Sending','UNPUBLISHING '+ids.length+' rows...','default',2000);
        flg_apm.setModuleGridBody.do_updateStatus('UNPUBLISHED',ids);
    }
}
flg_apm.setModuleGridBody.do_draft=function(ids,obj){
    var Obj=obj;
    b=confirm('Do you really want to set to DRAFT '+ids.length+' row(s)');
    if(b){
        flg_apm.setDataGridStatus('loading','Setting to DRAFT '+ids.length+' rows...');
        flg_apm.setAlertPanel.addAlert('Sending','Setting to DRAFT '+ids.length+' rows...','default',2000);
        flg_apm.setModuleGridBody.do_updateStatus('DRAFT',ids);
    }
}
flg_apm.setModuleGridBody.do_del=function(ids,obj,type){
    var Obj=obj;
    var TypeDel=type;
    b=confirm('Do you really want to DELETE '+ids.length+' row(s)');
    if(b){
        flg_apm.setDataGridStatus('loading','DELETING '+ids.length+' rows...');
        flg_apm.setAlertPanel.addAlert('Sending','DELETING '+ids.length+' rows...','default',2000);
        $.ajax({
            url: ajaxurl ,
            type: "POST",
            data: "subaction=oriGridDeleteRows&action=apm_extensions&args="+ids.join(','),
            error: function(data){
                flg_apm.setDataGridStatus('error','An error appeared while deleting...');
            },
            success: function(data){
                var data_ar=$.JSON.decode(data);
                if(data_ar.idsdeleted.indexOf(',')>-1){
                    ar=data_ar.idsdeleted.split(',');
                }else{
                    ar=[data_ar.idsdeleted];
                }
                switch(data_ar.success){
                    case'ok':
                        flg_apm.setDataGridStatus('ok',data_ar.txt);
                        flg_apm.setModuleGridBody.do_removeFromGrid(ar,Obj,TypeDel);
                        break;
                    case'error':
                        flg_apm.setDataGridStatus('error',data_ar.txt);
                        flg_apm.setAlertPanel.addAlert('Issue while deleting',data_ar.issue,'error');
                        break;
                    case'partial':
                        flg_apm.setDataGridStatus('warning',data_ar.txt);
                        flg_apm.setAlertPanel.addAlert('Issue while deleting',data_ar.issue,'warning');
                        flg_apm.setModuleGridBody.do_removeFromGrid(ar,Obj,TypeDel);
                        break;
                }
            //
            }
        });

    }
}
flg_apm.setModuleGridBody.do_removeFromGrid=function(ids,obj,TypeDel){
    if(TypeDel=='inrow'){
        trs=flg_apm.setModuleGridHeader.getridTrs(obj);
        $.each(trs.trs,function(i,obb){
            id=flg_apm.setModuleGridBody.getRowId(obb,true);
            if(Number(id)==ids[0]){
                $(obb).fadeOut(500,function(){
                    $(obb).remove();
                });
            }
        });

    } else {
        sel=flg_apm.setModuleGridHeader.checkRowSelReturnTr(obj);
        var ids=ids;
        $.each(sel,function(i,obb){
            id=flg_apm.setModuleGridBody.getRowId(obb,true);
            id=Number(id);
            if(jQuery.inArray( id,ids)){
                $(obb).fadeOut(500,function(){
                    $(obb).remove();
                });
            }
        });
    }
}



flg_apm.setModuleGridBody.setHeight=function(){
    if(flg_apm.setModuleGridBody.isSetHeigt!==true  && flg_apm.setModuleGridStatusFooter.tplIsSet==true && flg_apm.setModuleGridTableFooter.tplIsSet==true && flg_apm.setModuleGridHeader.tplIsSet==true && flg_apm.setModuleGridTableHeader.tplIsSet==true){

        this.obj=$('#apmdatagrid_new_gridbody');
        obj=$(this.obj);
        h=$('#apmdatagrid_new_container').height()-4-$('#apmdatagrid_new_gridfooter').height()-$('#apmdatagrid_new_header').height()-$('#apmdatagrid_new_gridhead').height()-$('#apmdatagrid_new_statusfooter').height();
        $(obj).css('height',h+'px');
        flg_apm.setModuleGridBody.isSetHeigt=true;
        flg_apm.setModuleGridTableHeader.setThW();
        flg_apm.setModuleGrid.loadData();
    }
}
