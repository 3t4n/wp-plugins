
/* JS EXTENSION
 * setMailAttachment.js
 */


jQuery(document).ready(function(){
    flg_apm.setMailAttachment.init();
    flg_apm.setMailAttachment.initClicks();
    f=$('#do_sending_test');
//$(f).val('');
});


flg_apm.setMailAttachment=new flg_apm.setField('setMailAttachment','.c_setMailAttachment');

var count_eleUpload = 0;

var iframeUploadAtt=[];
var count_iframes=0;

flg_apm.setMailAttachment.during_create=function(fi,obj){
    count_eleUpload = 0;
    return fi;
}
flg_apm.setMailAttachment.postcreate=function(fi,obj){

    $('.apm_groupblocks2cols').hide();

    frmstr=my_extensions_views['formuploadattchment_tpl'].tpl;
    frmstra=frmstr.split('[[count]]');
    frmstr=frmstra.join(0);
    frmstra=frmstr.split('[[postid]]');
    frmstr=frmstra.join($('#post_ID').val());
    frmstra=frmstr.split('[[field]]');
    frmstr=frmstra.join('files_upload');
    frmstra=frmstr.split('[[count_eleUpload]]');
    frmstr=frmstra.join(0);
    $('.place_uploadfile').append(frmstr);
}


flg_apm.setMailAttachment.initClicks=function(){
    $('.open_attachblock').off('click').on('click',function(){
        if($(this).attr('data-statu') != 'open'){
            $(this).attr('data-statu','open');
            $('.apm_groupblocks2cols').fadeIn(700);
        }else{
            $(this).removeAttr('data-statu');
            $('.apm_groupblocks2cols').hide();
        }
    });

    $('.btn_pickuploadfma').off('click').on('click',function(){
        var tmp_count_eleUpload = count_eleUpload;
        $('.apm_uploadfma'+ tmp_count_eleUpload).trigger('click');

    });

    $('.apm_uploadfma').off('change').on('change',function(){
        // filenameloc = $(this)[0].files;
        // for (var i = 0; i < filenameloc.length; i++)
        // alert(filenameloc[i].name);

        var tmp_count_eleUpload = count_eleUpload;
        var filenameloc_file = $(this)[0].files;

        flg_apm.setAlertPanel.addAlert_posAlertYBase('Uploading','Uploading your file '+filenameloc_file[0].name+', please wait','',2000,$(window).scrollTop() + 30);
        /*
		// add element input file upload
		nbstr=my_extensions_views['addEleUploadMailAttachment'].tpl;
		nbstrar=nbstr.split('[[count_eleUpload]]');
		nbstr=nbstrar.join((tmp_count_eleUpload+1));
		$('.place_uploadfile').append(nbstr);


		// add name file upload in data gridview
		nbstr=my_extensions_views['addNameUploadMailAttachment'].tpl;
		nbstrar=nbstr.split('[[count_eleUpload]]');
		nbstr=nbstrar.join((tmp_count_eleUpload));
		nbstrar=nbstr.split('[[nameFile]]');
		// nbstr=nbstrar.join(($(this).val()));
		nbstr=nbstrar.join(filenameloc_file[0].name);
		$('.place_uploadfile_name').append(nbstr);
// */
        // add name from file upload
        frmstr=my_extensions_views['formuploadattchment_tpl'].tpl;
        frmstra=frmstr.split('[[count]]');
        frmstr=frmstra.join(tmp_count_eleUpload+1);
        frmstra=frmstr.split('[[postid]]');
        frmstr=frmstra.join($('#post_ID').val());
        frmstra=frmstr.split('[[field]]');
        frmstr=frmstra.join('files_upload');
        frmstra=frmstr.split('[[count_eleUpload]]');
        frmstr=frmstra.join((tmp_count_eleUpload+1));
        $('.place_uploadfile').append(frmstr);

        // submit frm
        $('.uploadfrm_'+tmp_count_eleUpload).submit();

        count_eleUpload = tmp_count_eleUpload+1;

    // flg_apm.setMailAttachment.initClicks();

    });

    $('.apm_upload_form_attachment').off('submit').on('submit',function(){
        count_iframes++;
        iframeUploadAtt[count_iframes]=document.createElement('iframe');
        $(iframeUploadAtt[count_iframes]).css('display','hidden');
        $(iframeUploadAtt[count_iframes]).css('height','0px');
        $(iframeUploadAtt[count_iframes]).attr('src','#');
        $(iframeUploadAtt[count_iframes]).attr('name','iframeTarget_'+count_iframes);
        $(iframeUploadAtt[count_iframes]).attr('count_iframes',count_iframes);

        // return false;

        $(iframeUploadAtt[count_iframes]).off('load').on('load',function(){
            // loccount_iframes=$(this).attr('count_iframes');
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
            url=this.contentDocument.getElementById('url');
            url=url.innerHTML;

            if(res_status=="ok"){

                flg_apm.setAlertPanel.addAlert_posAlertYBase('Uploaded','Uploaded your file '+newfilename,'ok',3000,$(window).scrollTop() + 30);

                // add name file upload in data gridview
                nbstr=my_extensions_views['addNameUploadMailAttachment'].tpl;
                nbstrar=nbstr.split('[[newid]]');
                nbstr=nbstrar.join((newid));
                nbstrar=nbstr.split('[[nameFile]]');
                nbstr=nbstrar.join(newfilename);
                nbstrar=nbstr.split('[[url]]');
                nbstr=nbstrar.join(url);
                $('.place_uploadfile_name').append(nbstr);

                flg_apm.setMailAttachment.initClicks();

            }else {
                flg_apm.setAlertPanel.addAlert_posAlertYBase('Loading Issue','Sorry, an error happend: '+error,'error',5000,$(window).scrollTop() + 30);
            }
        //frm_filelist
        // flg_apm.setUploadPanel.initClicks();
        });

        $('.place_apm_addfiles').append(iframeUploadAtt[count_iframes]);

        $(this).attr('target','iframeTarget_'+count_iframes);
    });

    $('.place_uploadfile_name a').off('click').on('click',function(){
        $(this).parent().remove();
        filename = $(this).parent().text();
        flg_apm.setAlertPanel.addAlert_posAlertYBase('Removed','Removed your file '+filename,'ok',3000,$(window).scrollTop() + 30);
    });

    $('.btn-reset-compose').off('click').on('click',function(){
        flg_apm.setSelectMailTpl.resetAllCompose();
    });

    $('.btn-add-signature').off('click').on('click',function(){
        flg_apm.setAlertPanel.addAlert_posAlertYBase('Loading ...','Loading signature','',3000,$(window).scrollTop() + 30);
        $.ajax({
            url: ajaxurl ,
            type: "POST",
            data: "subaction=getConfigSignature&action=apm_extensions&entity=setSelectMailTplCls&post_ID="+$('#post_ID').val()+"",
            error: function(data){
                console.log(data);
            },
            success: function(data){
                data_array = $.parseJSON(data);
                if(data_array.status){
                    flg_apm.setAlertPanel.addAlert_posAlertYBase('Signature added','We have added your signature to the email content','ok',2000,$(window).scrollTop() + 30);
                    signature_content = $("#3module_information #mail_compose_rte_rte").wysiwyg("getContent");
                    signature_content += '<br/><hr>' + data_array.signature_content;
                    $("#3module_information #mail_compose_rte_rte").wysiwyg("setContent", signature_content);
                    $("#3module_information #mail_compose_rte_rte").wysiwyg('focus');
                }
            }
        });
    });

    // file drop
    $('#filedrag').off('dragover').on('dragover',FileDragHover);
    $('#filedrag').off('dragleave').on('dragleave',FileDragHover);
    $('#filedrag').off('drop').on('drop',FileSelectHandler);

    // file drag hover
    function FileDragHover(e) {
        e.stopPropagation();
        e.preventDefault();

        e.target.className = (e.type == "dragover" ? "span12 apm_file_dragdropzone hover" : "span12 apm_file_dragdropzone");
    }

    // file selection
    function FileSelectHandler(e) {

        // cancel event and hover styling
        FileDragHover(e);

        // fetch FileList object
        // var files = e.target.files || e.dataTransfer.files;
        var dt = e.dataTransfer || (e.originalEvent && e.originalEvent.dataTransfer);
        var files = e.target.files || (dt && dt.files);

        console.debug(files);
        // process all File objects
        for (var i = 0, f; f = files[i]; i++) {
            UploadFile(f);
        }

    }

    // upload files
    function UploadFile(file) {

        // following line is not necessary: prevents running on SitePoint servers
        if (location.host.indexOf("sitepointstatic") >= 0) return

        var xhr = new XMLHttpRequest();
        if (xhr.upload) {

            flg_apm.setAlertPanel.addAlert_posAlertYBase('Uploading','Uploading your file '+file.name+', please wait','',2000,$(window).scrollTop() + 30);

            // file received/failed
            xhr.onreadystatechange = function(e) {
                if (xhr.readyState == 4) {
                    var response = $(xhr.response);

                    $.each(response,function(i,o){
                        if(o.id == 'error')
                            error = o.innerHTML;
                        if(o.id == 'res_status')
                            res_status = o.innerHTML;
                        if(o.id == 'newfilename')
                            newfilename = o.innerHTML;
                        if(o.id == 'newid')
                            newid = o.innerHTML;
                        if(o.id == 'url')
                            url = o.innerHTML;
                    });

                    if(xhr.status == 200 && res_status=="ok"){

                        flg_apm.setAlertPanel.addAlert_posAlertYBase('Uploaded','Uploaded your file '+newfilename,'ok',3000,$(window).scrollTop() + 30);

                        nbstr=my_extensions_views['addNameUploadMailAttachment'].tpl;
                        nbstrar=nbstr.split('[[newid]]');
                        nbstr=nbstrar.join((newid));
                        nbstrar=nbstr.split('[[nameFile]]');
                        nbstr=nbstrar.join(newfilename);
                        nbstrar=nbstr.split('[[url]]');
                        nbstr=nbstrar.join(url);
                        $('.place_uploadfile_name').append(nbstr);
                    }else {
                        flg_apm.setAlertPanel.addAlert_posAlertYBase('Loading Issue','Sorry, an error happend: '+error,'error',5000,$(window).scrollTop() + 30);
                    }
                    flg_apm.setMailAttachment.initClicks();
                }
            }

            // start upload
            var fd = new FormData();
            xhr.open("POST", 'admin-ajax.php?action=apm_extensions&subaction=UploadFile', true);
            fd.append("apm_fileupload", file);
            fd.append("postid", $('#post_ID').val());
            fd.append("key", 'files_upload');
            fd.append("filenb", '');
            fd.append("title", '');
            fd.append("capt", '');
            fd.append("desc", '');
            fd.append("filename", '');
            xhr.send(fd);

        }

    }






}
