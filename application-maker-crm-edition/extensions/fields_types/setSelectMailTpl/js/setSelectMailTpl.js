
/* JS EXTENSION
 * setSelectMailTpl.js
 */


jQuery(document).ready(function(){
    flg_apm.setSelectMailTpl.init();
    flg_apm.setSelectMailTpl.initClicks();
    f=$('#do_sending_test');
//$(f).val('');
});


flg_apm.setSelectMailTpl=new flg_apm.setField('setSelectMailTpl','.c_setSelectMailTpl');


flg_apm.setSelectMailTpl.during_create=function(fi,obj){
    $.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "subaction=getMailTpl&action=apm_extensions&entity=setSelectMailTpl",
        error: function(data){
            console.log(data);
        },
        success: function(data){
            flg_apm.setSelectMailTpl.ShowSelectMailTpl($.JSON.decode(data));
        }
    });
    return fi;
}
flg_apm.setSelectMailTpl.ShowSelectMailTpl = function(data){
    sel=$('#mail_compose_selecttpl_select');
    selected_value=$(sel).attr('selected_value');
    var str="<option value=''>--None--</option>";
    $.each(data,function(k,tpl){
        selec="";
        if(selected_value==tpl.ID){
            selec=" selected='selected' "
        }
        str+="<option value='"+tpl.ID+"' "+selec+" tpl-txt='"+tpl.post_name+"'>"+tpl.post_title+"</option>";
    });
    $(sel).html(str)
    $(sel).removeAttr('disabled');
}

flg_apm.setSelectMailTpl.postcreate=function(fi,obj){

    }

flg_apm.setSelectMailTpl.replyMail=function(detailMail,action){
    // /*
    $.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "subaction=getConfigSignature&action=apm_extensions&entity=setSelectMailTplCls&post_ID="+$('#post_ID').val()+"",
        error: function(data){
            console.log(data);
        },
        success: function(data){
            data_array = $.parseJSON(data);
            var signature_content = '<br >';
            if(data_array.status){
                signature_content += '<hr>' + data_array.signature_content;
            }
            var titleMail = detailMail.data_Mail.subject;
            var detail_bodyMail = detailMail.data_Mail.textPlain;
            var detail_bodyMail_html = detailMail.data_Mail.textHtml;
            var bodyMail_sub_header = '<br/>=============REPLY ABOVE THIS LINE=================='+
            '<br/>The '+detailMail.data_Mail.date+', '+detailMail.data_Mail.fromName+' has written:<br/><br/> >';
            var regex = /\n/g;
            var bodyMail_sub_re = detail_bodyMail.replace(regex, "<br> > ");
            bodyMail_sub_re = bodyMail_sub_re.substr(0,bodyMail_sub_re.length - 1);
            // bodyMail_sub_re = detail_bodyMail;

            switch(action){
                case 'reply':
                    bodyMail = bodyMail_sub_header+bodyMail_sub_re+signature_content;
                    var to_mail = detailMail.data_Mail.fromName + ' <' + detailMail.data_Mail.fromAddress +'>';
                    // var to_mail = detailMail.data_Mail.fromAddress;
                    $('[data-field="mail_compose_to"] .row-adddestinee:first-child input').val(to_mail);
                    break;
                case 'reply_all':
                    bodyMail = bodyMail_sub_header+bodyMail_sub_re+signature_content;
                    var to_mail = detailMail.data_Mail.fromName + ' <' + detailMail.data_Mail.fromAddress +'>';
                    // var to_mail = detailMail.data_Mail.fromAddress;
                    $('[data-field="mail_compose_to"] .row-adddestinee:first-child input').val(to_mail);
                    var tmp_cc = 2;
                    var mail_me = $('#mailaccount_username').val();
                    if(detailMail.data_Mail.to != ''){
                        for(var value in detailMail.data_Mail.to){
                            if(tmp_cc >= $('[data-field="mail_compose_to"] .row-adddestinee input').length)
                                $('.btn_add_destinee_row').trigger('click');
                            if(value != mail_me && value != detailMail.data_Mail.fromAddress){
                                $('[data-field="mail_compose_to"] .row-adddestinee:nth-child('+tmp_cc+') select').val('to');
                                $('[data-field="mail_compose_to"] .row-adddestinee:nth-child('+tmp_cc+') input').val(value);
                                tmp_cc = tmp_cc + 1;
                            }
                        }

                    }

                    if(detailMail.data_Mail.cc != ''){
                        for(var value in detailMail.data_Mail.cc){
                            if(tmp_cc >= $('[data-field="mail_compose_to"] .row-adddestinee input').length)
                                $('.btn_add_destinee_row').trigger('click');
                            $('[data-field="mail_compose_to"] .row-adddestinee:nth-child('+tmp_cc+') select').val('cc');
                            $('[data-field="mail_compose_to"] .row-adddestinee:nth-child('+tmp_cc+') input').val(value);
                            tmp_cc = tmp_cc + 1;
                        }

                    }

                    break;
                case 'forward':
                    bodyMail = detail_bodyMail_html+signature_content;
                    // var to_mail = detailMail.data_Mail.fromAddress + ' <' + detailMail.data_Mail.fromName +'>';
                    // $('[data-field="mail_compose_to"] .row-adddestinee:first-child input').val(to_mail);
                    break;

            }
            $('#3module_information input#mailboxemail_subject').val(titleMail);
            $("#3module_information #mail_compose_rte_rte").wysiwyg("setContent", bodyMail);
            $("#3module_information #mail_compose_rte_rte").wysiwyg('focus');
        }
    });
// */
}

flg_apm.setSelectMailTpl.initClicks=function(){

    $('.c_setSelectMailTpl button.select_tplMail').off('click').on('click',function(){
        var id_tplMail = $('.c_setSelectMailTpl #mail_compose_selecttpl_select').val();
        // flg_apm.setAlertPanel.addAlert_posAlertYBase('Loading','Loading the Email Template' ,'default',2000,595);
        flg_apm.setAlertPanel.addAlert_posAlertYBase('Loading','Loading the Email Template' ,'default',2000,$(window).scrollTop() + 30);
        $.ajax({
            url: ajaxurl ,
            type: "POST",
            data: "subaction=getMailTplDetail&action=apm_extensions&entity=setSelectMailTpl&ID_tplMail="+id_tplMail,
            error: function(data){
                console.log(data);
            },
            success: function(data){
                if(data){
                    data = $.JSON.decode(data);
                    if(data){
                        $('#3module_information input#mailboxemail_subject').val(data[0].email_subject);
                        $("#3module_information #mail_compose_rte_rte").wysiwyg("setContent", data[0].email_body);
                    }
                }
            }
        });
    });

    $('.c_setSelectMailTpl button.manager_tplMail').off('click').on('click',function(){
        window.location = '/wp-admin/admin.php?page=15MAIL-ff_email_template';
    });

    $('#tabblock_module_information li:nth-child(3) a').live('click',function(){
        });



}
flg_apm.setSelectMailTpl.resetAllCompose=function(){
    $('[data-field="mail_compose_to"] .row-adddestinee input').val('');
    $('#3module_information input#mailboxemail_subject').val('');
    $("#3module_information #mail_compose_rte_rte").wysiwyg("setContent", '');
}
