
/* JS EXTENSION
 * setUploadPanel.js
 */


jQuery(document).ready(function(){
    flg_apm.setUploadPanel.init();
	flg_apm.setUploadPanel.createFormUpload();
});


flg_apm.setUploadPanel=new flg_apm.setField('setUploadPanel','.c_setUploadPanel');
flg_apm.setUploadPanel.during_create=function(fi,obj){
    o=$('.c_setUploadPanel');
    o=o[0];
    s=$(o).attr('data-maxmultfil');
    st='filenbr_tpl';
    if(s=="0"){
        st='filenbrunli_tpl';
    }
    s=$(o).attr('data-filtypes');
    st2='filetypes_tpl';
    if(s==""){
        st2='filetypesemp_tpl';
    }
    fi.str=flg_apm.parVieSplStr([['Filetypes',st2],['FileNbr',st]],fi.str);
    fi.str=flg_apm.parseValSplArr($(o),fi.str,['filtypes','nbfiles','maxmultfil']);

    stra=fi.str.split('[[nbfilesupl]]');
    fi.str=stra.join(0);
    stra=fi.str.split('[[nbfilesuploaded]]');
    fi.str=stra.join(0);
    return fi;
}

flg_apm.setUploadPanel.postcreate=function(fi,obj){
    $('.btntool2').tooltip('tooltipdelfil') ;
    $('.btntool').tooltip('tooltipeditfil') ;
    $('.do_uploadall').hide() ;//250
    $.each($('.do_hide_addfile',obj),function(){
        //$(this).removeClass('hiddenbtn');
        p=$(this).parents('.upload_gridandpanel');
        $(p).find(".do_hide_addfile").removeClass('hiddenbtn');
    });

// $(obj).hide() ;//250
	
};

flg_apm.setUploadPanel.uploadImage=function(form){
console.debug('here uploadImage');
		count_iframes++;
        iframeUpload[count_iframes]=document.createElement('iframe');
        $(iframeUpload[count_iframes]).css('display','hidden');
        $(iframeUpload[count_iframes]).css('height','0px');
        $(iframeUpload[count_iframes]).attr('src','#');

        $(iframeUpload[count_iframes]).attr('name','iframeTarget_'+count_iframes);
        $(iframeUpload[count_iframes]).attr('count_iframes',count_iframes);

        $(iframeUpload[count_iframes]).off('load').on('load',function(){
			
            f=this.contentDocument.getElementById('filename');
            postid=this.contentDocument.getElementById('postid');
            error=this.contentDocument.getElementById('error');
            error=error.innerHTML;
            res_status=this.contentDocument.getElementById('res_status');
            res_status=res_status.innerHTML;
            newfilename=this.contentDocument.getElementById('newfilename');
            newfilename=newfilename.innerHTML;
            newid=this.contentDocument.getElementById('newid');
            newid=newid.innerHTML;
            filenb=this.contentDocument.getElementById('filenb');
            pare=$(this).parents('.apm_addfiles');
            //alert(res_status+"-"+newfilename+"-"+newid);
            if(res_status=="ok"){
               // alert("pas error");

                co=$(pare).find('.files_count');
                c=Number($(co).html())-1;
                $(co).html(c);
                co=$(pare).find('.files_count_uploaded');
                c=Number($(co).html())+1;
                $(co).html(c);
                tr=$(pare).find('.uplo_td_'+filenb.innerHTML).parents('tr');
                //alert(loccount_iframes+"-"+filenb.innerHTML+"-"+f.innerHTML);
                str=my_extensions_views['fileupload_row'].tpl;//
                stra=str.split('[[filename]]');
                str=stra.join(newfilename);
                stra=str.split('[[filedid]]');
                str=stra.join(newid);
                $(tr).html(str);
                vals=$(pare).find('.frm_filelist').val();
                //console.log(newid);
               /* valsar=vals.split('*****');
                // console.log(valsar);
                if($.inArray(newid,valsar)==-1){
                    valsar.push(newid);
                }*/
                // console.log(valsar);
               // $(pare).find('.frm_filelist').val(valsar.join('*****'));
                //upload_gridandpanel
                mainpar=$(pare).parents('.upload_gridandpanel');
                if($(mainpar).html()!==undefined){
                    posttitle=this.contentDocument.getElementById('posttitle');
                    posttitle=posttitle.innerHTML;
                    date=this.contentDocument.getElementById('date');
                    date=date.innerHTML;
                    url=this.contentDocument.getElementById('url');
                    url=url.innerHTML;
                    type=this.contentDocument.getElementById('type');
                    type=type.innerHTML;
                    size=this.contentDocument.getElementById('size');
                    size=size.innerHTML;
                    thumb=this.contentDocument.getElementById('thumb');
                    thumb=thumb.innerHTML;
                    //alert("thumb "+thumb);
                    filegridtable=$(".filegridtable",mainpar);
                    tabbody=$(filegridtable).find('.apm_tablebody');
                    basestr=my_extensions_views['uploadGrid_row'].tpl;
                    o={
                        name:posttitle,
                        filename:newfilename,
                        ID:newid,
                        date:date,
                        url:url,
                        size:size,
                        thumb:thumb,
                        type:type
                    };
                    flg_apm.setUploadGrid.setRow(basestr,tabbody,o);
                    curnbobj=$(mainpar).find('.filegridnbfieldhead .nb');
                    curnb=Number($(curnbobj).html());
                    nbstr=my_extensions_views['uploadgrid_nbhead_tpl'].tpl;
                    nbstrar=nbstr.split('[[nbtotal]]');
                    nbstr=nbstrar.join((curnb+1));
                    $(mainpar).find('.filegridnbfieldhead').html(nbstr);
                    flg_apm.setUploadGrid.initClicks();
                }
            }else {
                flg_apm.showErrorAlert(this,'.apm_addfiles','Sorry, an error happend: '+error);
            }
            //frm_filelist
            flg_apm.setUploadPanel.initClicks();
        })

        $(form).parents('.apm_addfiles').append(iframeUpload[count_iframes]);

        $(form).attr('target','iframeTarget_'+count_iframes);
		
}

flg_apm.setUploadPanel.checkBtnUpladall=function(tds){
    var c=0;
    $.each(tds,function(){
        ty=$(this).attr("data-rowtype");
        if(ty=="selected_row"){
            c++;
        }
    });
    if(c==1){
        $('.do_uploadall').hide(250) ;
    }
}

flg_apm.setUploadPanel.createFormUpload=function(){
	
	par=$('.apm_addfiles');
	
	frmstr=my_extensions_views['formupload_tpl'].tpl;
	frmstra=frmstr.split('[[count]]');
	frmstr=frmstra.join(count_totalUploads);
	frmstra=frmstr.split('[[postid]]');
	frmstr=frmstra.join($(par).attr('data-postid'));
	frmstra=frmstr.split('[[field]]');
	frmstr=frmstra.join($(par).attr('data-field'));
	$(par).find('.inputs_holder').append(frmstr);
     
	flg_apm.setUploadPanel.initClicks();
}

var iframeUpload=[];
var count_iframes=0;
var count_totalUploads=0;
flg_apm.setUploadPanel.initClicks=function(){
    //upload_gridandpanel

    $('.do_del_fileuprow').off('click').on('click',function(e){
        var filedid=$(this).parents('.filuprow').attr('data-filedid');
        pare=$(this).parents('.apm_addfiles');
        flili=$(pare).find('.frm_filelist');
        vals=$(flili).val();
        //console.log(newid);
        valsar=vals.split('*****');
        var newar=[];
        $.each(valsar,function(i,o){
            if(String(o)!==String(filedid)){
                newar.push(o);
            }
        });
        $(flili).val(newar.join('*****'));
        $(this).parents('.uploadgrid_tr').hide(800,function() {
            $(this).remove();
        });
    //alert(filedid);
    });

    $('.do_edit_filuprow').off('click').on('click',function(){
        filedid=$(this).parents('.filuprow').attr('data-filedid');
    // alert(filedid);

    });

    $('.do_hide_addfile').off('click').on('click',function(){
        p=$(this).parents('.apm_addfiles');
        $(p).hide(400);
        $(this).addClass('hiddenbtn');
        p=$(this).parents('.upload_gridandpanel');
        $(p).find(".do_show_addpanel").removeClass('hiddenbtn');
        $(p).find(".filegrid").removeClass('span8');
        $(p).find(".filegrid").addClass('span12');
    });


    $('.apm_upload_form').off('submit').on('submit',function(){
        console.debug('here bind submit');
		count_iframes++;
        iframeUpload[count_iframes]=document.createElement('iframe');
        $(iframeUpload[count_iframes]).css('display','hidden');
        $(iframeUpload[count_iframes]).css('height','0px');
        $(iframeUpload[count_iframes]).attr('src','#');

        $(iframeUpload[count_iframes]).attr('name','iframeTarget_'+count_iframes);
        $(iframeUpload[count_iframes]).attr('count_iframes',count_iframes);

        $(iframeUpload[count_iframes]).off('load').on('load',function(){
			
            f=this.contentDocument.getElementById('filename');
            postid=this.contentDocument.getElementById('postid');
            error=this.contentDocument.getElementById('error');
            error=error.innerHTML;
            res_status=this.contentDocument.getElementById('res_status');
            res_status=res_status.innerHTML;
            newfilename=this.contentDocument.getElementById('newfilename');
            newfilename=newfilename.innerHTML;
            newid=this.contentDocument.getElementById('newid');
            newid=newid.innerHTML;
            filenb=this.contentDocument.getElementById('filenb');
            pare=$(this).parents('.apm_addfiles');
            //alert(res_status+"-"+newfilename+"-"+newid);
            if(res_status=="ok"){
               // alert("pas error");

                co=$(pare).find('.files_count');
                c=Number($(co).html())-1;
                $(co).html(c);
                co=$(pare).find('.files_count_uploaded');
                c=Number($(co).html())+1;
                $(co).html(c);
                tr=$(pare).find('.uplo_td_'+filenb.innerHTML).parents('tr');
                //alert(loccount_iframes+"-"+filenb.innerHTML+"-"+f.innerHTML);
                str=my_extensions_views['fileupload_row'].tpl;//
                stra=str.split('[[filename]]');
                str=stra.join(newfilename);
                stra=str.split('[[filedid]]');
                str=stra.join(newid);
                $(tr).html(str);
                vals=$(pare).find('.frm_filelist').val();
                //console.log(newid);
               /* valsar=vals.split('*****');
                // console.log(valsar);
                if($.inArray(newid,valsar)==-1){
                    valsar.push(newid);
                }*/
                // console.log(valsar);
               // $(pare).find('.frm_filelist').val(valsar.join('*****'));
                //upload_gridandpanel
                mainpar=$(pare).parents('.upload_gridandpanel');
                if($(mainpar).html()!==undefined){
                    posttitle=this.contentDocument.getElementById('posttitle');
                    posttitle=posttitle.innerHTML;
                    date=this.contentDocument.getElementById('date');
                    date=date.innerHTML;
                    url=this.contentDocument.getElementById('url');
                    url=url.innerHTML;
                    type=this.contentDocument.getElementById('type');
                    type=type.innerHTML;
                    size=this.contentDocument.getElementById('size');
                    size=size.innerHTML;
                    thumb=this.contentDocument.getElementById('thumb');
                    thumb=thumb.innerHTML;
                    //alert("thumb "+thumb);
                    filegridtable=$(".filegridtable",mainpar);
                    tabbody=$(filegridtable).find('.apm_tablebody');
                    basestr=my_extensions_views['uploadGrid_row'].tpl;
                    o={
                        name:posttitle,
                        filename:newfilename,
                        ID:newid,
                        date:date,
                        url:url,
                        size:size,
                        thumb:thumb,
                        type:type
                    };
                    flg_apm.setUploadGrid.setRow(basestr,tabbody,o);
                    curnbobj=$(mainpar).find('.filegridnbfieldhead .nb');
                    curnb=Number($(curnbobj).html());
                    nbstr=my_extensions_views['uploadgrid_nbhead_tpl'].tpl;
                    nbstrar=nbstr.split('[[nbtotal]]');
                    nbstr=nbstrar.join((curnb+1));
                    $(mainpar).find('.filegridnbfieldhead').html(nbstr);
                    flg_apm.setUploadGrid.initClicks();
                }
            }else {
                flg_apm.showErrorAlert(this,'.apm_addfiles','Sorry, an error happend: '+error);
            }
            //frm_filelist
            flg_apm.setUploadPanel.initClicks();
        })

        $(this).parents('.apm_addfiles').append(iframeUpload[count_iframes]);

        $(this).attr('target','iframeTarget_'+count_iframes);
		return;
    });


    $('.do_start_selectfile').off('click').on('click',function(){
        // inpup=$(this).parents('.apm_addfiles').find('.apm_uploadf');
        inpup=$(this).parents('.apm_addfiles').find('.apm_uploadf_'+count_totalUploads);
        $(inpup).trigger('click');
    });

    $('.do_showeditinfo_upload').off('click').on('click',function(){
        o=$(this).parents('.uploadgrid_tr').find('.filerow_detailinfos');
        $(o).fadeIn(300);
    });


    $('.do_start_upload').off('click').on('click',function(){
		
        //flg_apm.showInfoAlert(this,'.apm_addfiles','Uploading started... Please wait.');
        pare=$(this).parents('.apm_addfiles');
        uploadgrid_tr=$(this).parents('.uploadgrid_tr');
        data_td=$('.data_td',uploadgrid_tr);
        datacount=$(data_td).attr("data-count");
        fln=$(uploadgrid_tr).find('.apm_upl_filename');
        filenamesou=$(fln).html();
        tds=$('.filegrid td',$(pare));
        var test=false;
        $.each(tds,function(){
            ty=$(this).attr("data-rowtype");
            if(ty=="upload_row"){
                flname=$(this).attr("data-filename");
                if(filenamesou==flname){
                    // alert("Sorry, this file is already uploaded.");
                    flg_apm.setAlertPanel.addAlert('Already uploaded','Sorry, this file is already uploaded...','error',3000);
                    test=true;
                }
            }
        });
        //
        if(test==true){
            return false;
        }

        co=$(pare).find('.files_count');
        c=Number($(co).html())+1;
        $(co).html(c);
        cou=$(pare).find('.filesupl_count');
        cu=Number($(cou).html())-1;
        if(cu<0){
            cu=0;
        }
        $(cou).html(cu);
		
        str=my_extensions_views['fileupload_row_upload'].tpl;
        stra=str.split('[[filename]]');
        str=stra.join(filenamesou);
        stra=str.split('[[nb]]');
        str=stra.join(c);

		
        frm=$(pare).find('.uploadfrm_'+datacount);
		
        frm=$(frm);
        uptr=$(this).parents('.uploadgrid_tr');
        uptr=$(uptr);
        $('.frm_filenb',frm).val(c);
        $('.frm_title',frm).val($('.uploadfield_title',uptr).val());
        $('.frm_capt',frm).val($('.uploadfield_caption',uptr).val());
        $('.frm_desc',frm).val($('.uploadfield_description',uptr).val());
        $('.frm_filename',frm).val(filenamesou);

		
        tds=$(this).parents('.filegrid').find(".data_td");
        flg_apm.setUploadPanel.checkBtnUpladall(tds);
		
        uptr.html(str);
        
		flg_apm.setUploadPanel.initClicks();
		
        // $(frm).bind('submit',flg_apm.setUploadPanel.uploadImage);
        $(frm).submit();

    });


    $('.do_uploadall').off('click').on('click',function(){

        par=$(this).parents('.uploadgrid_tr');
        tds=$(this).parents('.filegrid').find(".data_td");
        $.each(tds,function(){
            ty=$(this).attr("data-rowtype");
            if(ty=="selected_row"){
                btn=$(this).parents('tr').find('.do_start_upload');
                $(btn).trigger('click');
            }
        });

    });


    $('.do_cancel_upload').off('click').on('click',function(){
        par=$(this).parents('.uploadgrid_tr');

        tds=$(this).parents('.filegrid').find(".data_td");
        flg_apm.setUploadPanel.checkBtnUpladall(tds);
        cou=$(par).parents(".apm_addfiles").find('.filesupl_count');
        cu=Number($(cou).html())-1;
        if(cu<0){
            cu=0;
        }
        $(cou).html(cu);

        $(par).remove();
    });


    $('.apm_upload_form .apm_uploadf').off('change').on('change',function(){
        par=$(this).parents('.apm_addfiles');
        //$(par).find('.apm_upload_form').submit();

        
        str=my_extensions_views['fileupload_row_new'].tpl;
        stra=str.split('[[filename]]');
        str=stra.join($(this).val());
        cou=$(par).find('.filesupl_count');
        cu=Number($(cou).html())+1;
        $(cou).html(cu);
        stra=str.split('[[count]]');
        str=stra.join(count_totalUploads);
        //flg_apm.showInfoAlert(this,'.apm_addfiles','One file added. Upload it now or add more.');
        $('.do_uploadall').show(250);

        $(par).find('.filegrid tbody').prepend(str);
        $(par).find('.uploadgrid_tr').show(350);
		
		count_totalUploads++;
		
        frmstr=my_extensions_views['formupload_tpl'].tpl;
        frmstra=frmstr.split('[[count]]');
        frmstr=frmstra.join(count_totalUploads);
        frmstra=frmstr.split('[[postid]]');
        frmstr=frmstra.join($(par).attr('data-postid'));
        frmstra=frmstr.split('[[field]]');
        frmstr=frmstra.join($(par).attr('data-field'));
        $(par).find('.inputs_holder').append(frmstr);
        
		

        flg_apm.setUploadPanel.initClicks();

    });
}

/*
flg_apm.showModalZoom=function(img,fieldname,filename,fileid,filetitle){

}


flg_apm.showModalEditFile=function(fieldname,title,fileid,filetitle){

}*/