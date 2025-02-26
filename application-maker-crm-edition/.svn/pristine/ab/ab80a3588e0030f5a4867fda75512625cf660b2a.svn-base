
/* JS EXTENSION
 * setUploadGrid.js
 */


jQuery(document).ready(function(){
    flg_apm.setUploadGrid.init();
});


flg_apm.setUploadGrid=new flg_apm.setField('setUploadGrid','.c_setUploadGrid');
flg_apm.setUploadGrid.during_create=function(fi,obj){
    return fi;
}

flg_apm.setUploadGrid.postcreate=function(fi,obj){
    var filegrid=$(obj).find('.filegrid');
    flg_apm.setUploadGrid.loadGrid(filegrid);
};

flg_apm.setUploadGrid.setRow=function(basestr,tabbody,o){
    rowstr=basestr;
    filegrid=$(tabbody).parents('.filegrid');
    field=$(filegrid).attr('data-field');
    rowarr=rowstr.split('[[name]]');
    rowstr=rowarr.join(o.name);
    rowarr=rowstr.split('[[filename]]');
    rowstr=rowarr.join(o.filename);
    rowarr=rowstr.split('[[field]]');
    rowstr=rowarr.join(field);
    rowarr=rowstr.split('[[filenameaddslash]]');
    rowstr=rowarr.join(addslashes(o.filename));
    rowarr=rowstr.split('[[type]]');
    //uploadrow_thumb_tpl
    th=my_extensions_views['uploadrow_thumb_tpl'].tpl;
    switch(o.type){
        default :
            type='other';
            thumb="";
            break;
        case 'text/plain':
            type='.txt';
            thumb="";
            break;
        case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document':
            type='.docx';
            thumb="";
            break;
        case 'application/pdf':
            type='.pdf';
            thumb="";
            break;
        case 'image/jpeg':
            type='.jpg';
            thumbar=th.split('[[src]]');
            thumb=thumbar.join(o.thumb);
            break;
        case 'image/png':
            type='.png';
            thumbar=th.split('[[src]]');
            thumb=thumbar.join(o.thumb);
            break;
        case 'image/gif':
            type='.gif';
            thumbar=th.split('[[src]]');
            thumb=thumbar.join(o.thumb);
            break;
    }
    //alert(o.thumb);
    rowstr=rowarr.join(type);
    rowarr=rowstr.split('[[thumb]]');
    rowstr=rowarr.join(thumb);
    rowarr=rowstr.split('[[size]]');
    rowstr=rowarr.join(o.size);
    rowarr=rowstr.split('[[url]]');
    rowstr=rowarr.join(o.url);
    rowarr=rowstr.split('[[ID]]');
    rowstr=rowarr.join(o.ID);
    rowarr=rowstr.split('[[date]]');
    rowstr=rowarr.join(o.date);
    $(tabbody).append(rowstr);

};

flg_apm.setUploadGrid.loadGrid=function(filegrid){
    var filegrid=filegrid;
    var tabbody=$(filegrid).find('.apm_tablebody');
    $(tabbody).html(my_extensions_views['uploadGrid_loadingrow'].tpl);

    postid=$(filegrid).attr("data-postid");
    field=$(filegrid).attr("data-field");
    var basestr=my_extensions_views['uploadGrid_row'].tpl;
    $.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "subaction=loadFilesGrid&action=apm_extensions&postid="+postid+"&field="+field,
        error: function(data){
            $('.modal_global_alert',gloWin).html('<span style="color:red">Sorry, an error occured.</span> ');
        },
        success: function(data){
            $(tabbody).html('');
            filesdatas=$.JSON.decode(data);
            if(filesdatas.success=="ok" ){//
                if(Number(filesdatas.total)>0){
                    $.each(filesdatas.files,function(i,o){
                        flg_apm.setUploadGrid.setRow(basestr,tabbody,o);
                    });
                    $(filegrid).find('.do_selectrow_newgrid').removeClass('disabled');
                }else{
                    $(tabbody).html(my_extensions_views['uploadGrid_row_nofiles'].tpl);
                }
                nbstr=my_extensions_views['uploadgrid_nbhead_tpl'].tpl;
                nbstrar=nbstr.split('[[nbtotal]]');
                nbstr=nbstrar.join(filesdatas.total);
                $(filegrid).find('.filegridnbfieldhead').html(nbstr);
                //
                flg_apm.setUploadGrid.initClicks();
            }
        }
    });
//}else{

// $(tabbody).html(my_extensions_views['uploadGrid_row_nofiles'].tpl);
//}
}

flg_apm.setUploadGrid.enabledisableDeleteBtn=function(thecase,filegrid){
    btndel=$(filegrid).find('.do_deleterow_newgrid');
    if(thecase){
        $(btndel).removeClass('disabled');
    }else {
        if($(btndel).hasClass('disabled')==false){
            $(btndel).addClass('disabled');
        }
    }
}

flg_apm.setUploadGrid.checkBtnUpladall=function(tds){
    }

flg_apm.setUploadGrid.doDeleteRow=function(obj){
    partr=$(obj).parents('tr');

    mainpar=$(obj).parents('.upload_gridandpanel');

    curnbobj=$(mainpar).find('.filegridnbfieldhead .nb');
    curnb=Number($(curnbobj).html());
    nbstr=my_extensions_views['uploadgrid_nbhead_tpl'].tpl;
    nbstrar=nbstr.split('[[nbtotal]]');
    nbstr=nbstrar.join((curnb-1));
    $(mainpar).find('.filegridnbfieldhead').html(nbstr);

    $(partr).fadeOut(1000,function() {
        $(this).remove();
    });
}

/*
 * Create by LEHUNG
 * new function
 */
/*flg_apm.setUploadGrid.doDeleteRowAjax=function(Ids){
    var Ids=Ids;
	for(var i=0;i<Ids.length;i++){
		$.ajax({
			url: ajaxurl ,
			type: "POST",
			data: "subaction=deleteRowGrid&action=apm_extensions&postid="+Ids[i],
			error: function(data){
				flg_apm.setAlertPanel.addAlert('An error occured','Sorry, an error occured...','error',3000);
			},
			success: function(data){
			//filesdatas=$.JSON.decode(data);
			// alert(data);
			}
		});
	}
}*/

/*
 * Comment by LEHUNG
 * old function
 **/
flg_apm.setUploadGrid.doDeleteRowAjax=function(obj,Ids){
    filegrid=$(obj).parents('.filegrid');
    var Ids=Ids;
    alert(Ids);
    postid=$(filegrid).attr("data-postid");
    field=$(filegrid).attr("data-field");
    $.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "subaction=deleteFilesGrid&action=apm_extensions&postid="+postid+"&field="+field+"&ids="+Ids.join(','),
        error: function(data){
            // $('.modal_global_alert',gloWin).html('<span style="color:red">Sorry, an error occured.</span> ');
            flg_apm.setAlertPanel.addAlert('An error occured','Sorry, an error occured...','error',3000);
        },
        success: function(data){
        //filesdatas=$.JSON.decode(data);
        // alert(data);
        }
    });
}


flg_apm.setUploadGrid.doEditRow=function(obj,Ids){

    var gloWin= flg_apm.c_create_globalModalWin();
    var strcon=my_extensions_views['setModalEditFileForm'].tpl;
    var strconload=my_extensions_views['setModalLoadingForm'].tpl;
    flg_apm.c_init_globalModalWin(gloWin,{
        title:"Edit file",
        actionTitle:'Save',
        content:strconload,
        actionClass:'do_save_editfile_form'
    });
    partr=$(obj).parents('tr');
    filedid=$(partr).attr('data-fileid');
    field=$(partr).attr('data-field');
    gloWin.modal('show');
    $.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "subaction=GetFileInfos&action=apm_extensions&postid="+filedid+"&field="+field,
        error: function(data){
            $('.modal_global_alert',gloWin).html('<span style="color:red">Sorry, an error occured.</span> ');
        },
        success: function(data){
            filesdatas=$.JSON.decode(data);
            strcon=flg_apm.parVieObj(filesdatas,strcon,['post_title']);
            flg_apm.c_init_globalModalWin(gloWin,{
                title:"Edit file",
                actionTitle:'Save',
                content:strcon,
                actionClass:'do_save_editfile_form'
            });
            flg_apm.setUploadGrid.initClicks();
        }
    });
}

flg_apm.setUploadGrid.doViewRow=function(obj,Ids){
    var gloWin= flg_apm.c_create_globalModalWin();
    var strcon=my_extensions_views['setModalViewFileForm'].tpl;
    var strconload=my_extensions_views['setModalLoadingForm'].tpl;
    flg_apm.c_init_globalModalWin(gloWin,{
        title:"File's info",
        actionTitle:'',
        content:strconload,
        actionClass:''
    });
    partr=$(obj).parents('tr');
    filedid=$(partr).attr('data-fileid');
    field=$(partr).attr('data-field');
    gloWin.modal('show');
    $.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "subaction=GetFileInfos&action=apm_extensions&postid="+filedid+"&field="+field,
        error: function(data){
            $('.modal_global_alert',gloWin).html('<span style="color:red">Sorry, an error occured.</span> ');
        },
        success: function(data){
            filesdatas=$.JSON.decode(data);
            strcon=flg_apm.parVieObj(filesdatas,strcon);
            flg_apm.c_init_globalModalWin(gloWin,{
                title:"File's info",
                actionTitle:'',
                content:strcon,
                actionClass:''
            });
        }
    });

}

flg_apm.setUploadGrid.doZoomRow=function(obj,Ids){
    //
    var gloWin= flg_apm.c_create_globalModalWin();
    var strcon=my_extensions_views['setModalViewZoomFile'].tpl;
    var strconload=my_extensions_views['setModalLoadingForm'].tpl;
    flg_apm.c_init_globalModalWin(gloWin,{
        title:"Zoom image",
        actionTitle:'',
        content:strconload,
        actionClass:''
    });
    partr=$(obj).parents('tr');
    filedid=$(partr).attr('data-fileid');
    field=$(partr).attr('data-field');
    gloWin.modal('show');
    $.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "subaction=GetFileInfos&action=apm_extensions&postid="+filedid+"&field="+field,
        error: function(data){
            $('.modal_global_alert',gloWin).html('<span style="color:red">Sorry, an error occured.</span> ');
        },
        success: function(data){
            filesdatas=$.JSON.decode(data);
            strcon=flg_apm.parVieObj(filesdatas,strcon);
            flg_apm.c_init_globalModalWin(gloWin,{
                title:"Zoom image",
                actionTitle:'',
                content:strcon,
                actionClass:''
            });
        }
    });
};

flg_apm.setUploadGrid.initClicks=function(){
    //do_show_addpanel grid_action_hide
    //f do_delete_file_row

    $('.do_save_editfile_form').off('click').on('click',function(e){
        //alert('save');
        gloWin=$('#myModalGlobalWin');
        gloWin=$(gloWin);
        frm=$('.apm_edit_form_modal',gloWin);
        frm=$(frm);
        filedid=$('.inpid',frm).val();
        tit=$('.inptitle',frm).val();
        capt=$('.area_medium',frm).val();
        desc=$('.area_medbig',frm).val();
        $.ajax({
            url: ajaxurl ,
            type: "POST",
            data: "subaction=UpdateFileInfos&action=apm_extensions&postid="+filedid+"&title="+tit+"&capt="+capt+"&desc="+desc,
            error: function(data){
                $('.modal_global_alert',gloWin).html('<span style="color:red">Sorry, an error occured.</span> ');
            },
            success: function(data){
            }
        });
    });

    $('.apm_filegrid_zoom').off('click').on('click',function(e){
        partr=$(this).parents('tr');
        filedid=$(partr).attr('data-fileid');
        fileidar=[filedid];
        flg_apm.setUploadGrid.doZoomRow(this,fileidar);
    });

    $('.do_edit_file_row').off('click').on('click',function(e){
        partr=$(this).parents('tr');
        filedid=$(partr).attr('data-fileid');
        fileidar=[filedid];
        flg_apm.setUploadGrid.doEditRow(this,fileidar);
    });

    $('.do_view_file_row').off('click').on('click',function(e){
        partr=$(this).parents('tr');
        filedid=$(partr).attr('data-fileid');
        fileidar=[filedid];
        flg_apm.setUploadGrid.doViewRow(this,fileidar);
    });

    $('.do_delete_file_row').off('click').on('click',function(e){
        b=confirm("Are you sure that you want to delete the selected row?");
        if(b){
            partr=$(this).parents('tr');
            filedid=$(partr).attr('data-fileid');
            flg_apm.setUploadGrid.doDeleteRow(this);
            fileidar=[filedid];
            flg_apm.setUploadGrid.doDeleteRowAjax(this,fileidar);
        }
    });

    /*
	 * Create by LEHUNG
	 * new function

    $('.do_deleterow_newgrid').die('click').live('click',function(e){
        par=$(this).parents('.apmdatagrid_new_container');
        tabbody=$(par).find('.ext_new_gridbody');
        tr_checks=$(tabbody).find('.oriselchk');
        var do_del=false;
        var delete_list_ar=[];
        $.each($(tr_checks),function(i,o){
            // alert(i+"-"+$(o).attr('checked'));
            if($(o).attr('checked')=='checked'){
                do_del=true;
                partr=$(this).parents('tr');
                delete_list_ar.push($(partr).attr('data-id'));
            }
        });
        if(do_del){
            b=confirm("Are you sure that you want to delete the selected rows?");
            if(b){
                $.each($(tr_checks),function(i,o){
                    if($(o).attr('checked')=='checked'){
                        flg_apm.setUploadGrid.doDeleteRow(this);
                    }
                });
                flg_apm.setUploadGrid.doDeleteRowAjax(delete_list_ar);
            }
        } else {
            //alert('Please select at least one row');
            flg_apm.setAlertPanel.addAlert('Missing selection','Please select at least one row...','error',3000);
        }

    });*/


    /*
	 * Comment by LEHUNG
	 * old function
	 **/

    $('.do_deleterow_newgrid').off('click').on('click',function(e){
        par=$(this).parents('.filegrid');
        tabbody=$(par).find('.apm_tablebody');
        tr_checks=$(tabbody).find('.is_chk');
        var do_del=false;
        var delete_list_ar=[];

        $.each($(tr_checks),function(i,o){
            // alert(i+"-"+$(o).attr('checked'));

            if($(o).attr('checked')=='checked'){
                do_del=true;
                partr=$(this).parents('tr');
                delete_list_ar.push($(partr).attr('data-fileid'));
            }
        });
        if(do_del){
            b=confirm("Are you sure that you want to delete the selected rows?");
            if(b){

                $.each($(tr_checks),function(i,o){
                    if($(o).attr('checked')=='checked'){
                        flg_apm.setUploadGrid.doDeleteRow(this);
                    }
                });
                flg_apm.setUploadGrid.doDeleteRowAjax(this,delete_list_ar);
            }
        } else {
            //alert('Please select at least one row');
            flg_apm.setAlertPanel.addAlert('Missing selection','Please select at least one row...','error',3000);
        }

    });

    $('.do_refresh_newgrid').off('click').on('click',function(e){
        filegrid=$(this).parents('.filegrid');
        flg_apm.setUploadGrid.loadGrid(filegrid);
    });
    $('.is_chk').off('change').on('change',function(e){

        filegrid=$(this).parents('.filegrid');
        tr_checks=$(filegrid).find('.is_chk');
        var is_check=false;
        $.each($(tr_checks),function(i,o){
            if($(o).attr('checked')=='checked'){
                is_check=true;
            }
        });
        flg_apm.setUploadGrid.enabledisableDeleteBtn(is_check,filegrid);
    });


    $('.do_selectrow_newgrid').off('click').on('click',function(e){

        par=$(this).parents('.filegrid');
        tabbody=$(par).find('.apm_tablebody');
        tr_checks=$(tabbody).find('.is_chk');
        var do_check=true;
        $.each($(tr_checks),function(i,o){
            // alert(i+"-"+$(o).attr('checked'));
            if(i==0 && $(o).attr('checked')=='checked'){
                do_check=false;
            }
            if(do_check==true){
                $(o).attr('checked','checked');
            }else{
                $(o).removeAttr('checked');
            }
        });
        flg_apm.setUploadGrid.enabledisableDeleteBtn(do_check,par);
    });

    $('.do_show_addpanel').off('click').on('click',function(e){
        p=$(this).parents('.upload_gridandpanel');//apm_addfiles
        $(p).find(".filegrid").removeClass('span12');
        $(p).find(".filegrid").addClass('span8');
        $(p).find(".do_show_addpanel").addClass('hiddenbtn');

        $(p).find(".apm_addfiles").show(400);
        $(p).find(".do_hide_addfile").removeClass('hiddenbtn');

    });

    $('.filegrid .filegridtable tr').off('mouseover').on('mouseover',function(e){
        btns=$(this).find('.grid_action_hide');
        $(btns).removeClass('hidden');

    });
    $('.filegrid .filegridtable tr').off('mouseout').on('mouseout',function(e){
        btns=$(this).find('.grid_action_hide');
        $(btns).addClass('hidden');

    });
}


flg_apm.showModalZoom=function(img,fieldname,filename,fileid,filetitle){

    }


flg_apm.showModalEditFile=function(fieldname,title,fileid,filetitle){

    }