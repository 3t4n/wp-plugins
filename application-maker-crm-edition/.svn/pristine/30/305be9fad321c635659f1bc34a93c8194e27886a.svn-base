
/* JS EXTENSION
 * sendNewsletter.js
 */


jQuery(document).ready(function(){
    flg_apm.sendNewsletter.initClicks();
    f=$('#do_sending_test');
//$(f).val('');
});


flg_apm.sendNewsletter=function(){
    }


flg_apm.sendNewsletter.sendnext=function(){
    console.log(flg_apm.sendNewsletter.sendcount);
    console.log(flg_apm.sendNewsletter.sendobjs.length);
    if(flg_apm.sendNewsletter.sendcount<flg_apm.sendNewsletter.sendobjs.length){
        obj=flg_apm.sendNewsletter.sendobjs[flg_apm.sendNewsletter.sendcount];
        // alert('send to id '+obj.id);
        var statd=$('.rowid_'+obj.id+" .statusrow");
        if($(statd).hasClass('statusrow_tosend')){
            $(statd).html('Sending');
            $(statd).removeClass('statusrow_tosend');
            $(statd).removeClass('statusrow_sent');
            $(statd).addClass('statusrow_sending');

            $.ajax({
                url: ajaxurl ,
                type: "POST",
                data: "subaction=sendingNewsletter&action=apm_extensions&id="+obj.id+"&email="+obj.email+"&email_template="+flg_apm.sendNewsletter.emailtpl_id+"&emailspesubj="+flg_apm.sendNewsletter.emailspesubj,
                error: function(data){
                    //alert('Sorry, an error occured in the loading of the users list.');
                    $(statd).html('Issue, not sent');
                    $(statd).removeClass('statusrow_sending');
                    $(statd).addClass('.statusrow_issue');
                    flg_apm.sendNewsletter.sendissues++;
                    flg_apm.sendNewsletter.sendcount++;
                    $('.rowid_'+obj.id+' input[name="obj_statusrow"]').attr('checked',false);
                    flg_apm.sendNewsletter.sendnext();
                },
                success: function(data){
                    datas=$.JSON.decode(data);
                    if(datas.success=='ok'){
                        $(statd).html('Sent');
                        $(statd).removeClass('statusrow_sending');
                        $(statd).addClass('statusrow_sent');
                        flg_apm.sendNewsletter.sendsuccess++;
                    }else{
                        $(statd).html('Issue, not sent');
                        $(statd).removeClass('statusrow_sending');
                        $(statd).addClass('statusrow_issue');
                        flg_apm.sendNewsletter.sendissues++;
                    }
                    flg_apm.sendNewsletter.sendcount++;
                    $('.rowid_'+obj.id+' input[name="obj_statusrow"]').attr('checked',false);
                    flg_apm.sendNewsletter.sendnext();
                }
            });
        }else {
            flg_apm.sendNewsletter.sendcount++;
            flg_apm.sendNewsletter.sendnext();
        }
    }else {
        $('.mailinglistsendingtable .result_ok').css('display','block');
        resstr='All has been sent';
        if(flg_apm.sendNewsletter.sendissues==0){
            resstr+=" with success!" ;
        }else{
            resstr+=" with "+flg_apm.sendNewsletter.sendsuccess+" success and "+flg_apm.sendNewsletter.sendissues+" issues." ;
        }
        $('.mailinglistsendingtable .result_ok').html(resstr);
        flg_apm.sendNewsletter.sendcount=0;
        flg_apm.sendNewsletter.sendissues=0;
        flg_apm.sendNewsletter.sendsuccess=0;
    //alert('finish');
    }
}

flg_apm.sendNewsletter.saveMainInfos=function(postid){
    infos_json={};
    infos_json.emailtpl=$('#email_template_select').val();
    infos_json.emailspesubj=$('#newsletter_special_subject').val();
    infos_json=$.JSON.encode(infos_json);
    $.ajax({
        url: ajaxurl ,
        type: "POST",
        data: {//
            subaction:"NewsletSaveMainInfos",
            action:"apm_extensions",
            status:$('#newsletter_status_select').val(),
            comments:$('#comments').val(),
            date_sent:$('#emails_date_sent').val(),
            time_sent:$('#emails_time_sent').val(),
            emailtpl:$('#email_template_select').val(),
            emailspesubj:$('#newsletter_special_subject').val(),
            account:$('#autocomplete_data_account_parent').val(),
            contact:$('#autocomplete_data_contact_parent').val(),
            lead:$('#autocomplete_data_lead_parent').val(),
            mailing_list:$('#mailing_list_to_use_select').val(),
            post_id: postid

        },//"subaction=NewsletSaveMainInfos&action=apm_extensions&infos_json="+infos_json,
        error: function(data){
            //alert('Sorry, an error occured when saving the post data.');
            flg_apm.setAlertPanel.addAlert('An error occured','Sorry, an error occured when saving the post data...','error',3000);
        },
        success: function(data){
            datas=$.JSON.decode(data);
        }
    });


}

flg_apm.sendNewsletter.send=function(post_id){
    f=$('#do_sending_test');
    $(f).val('send');

    var gloWin= flg_apm.c_create_globalModalWin();
    var strnewslist=my_extensions_views['sendNewsletter'].tpl;
    flg_apm.c_init_globalModalWin(gloWin,{
        title:"Sending newsletter",
        actionTitle:'Send',
        content:strnewslist,
        actionClass:'actionSendnext'
    });
    //autocomplete_data_contact_parent  autocomplete_data_lead_parent autocomplete_data_account_parent  mailing_list_to_use_select
    ids=[];
    v=$('#autocomplete_data_contact_parent').val();
    if(v!==""){
        ids.push(v);
    }
    v=$('#autocomplete_data_lead_parent').val();
    if(v!==""){
        ids.push(v);
    }
    v=$('#autocomplete_data_account_parent').val();
    if(v!==""){
        ids.push(v);
    }
    maillist=$('#mailing_list_to_use_select').val();
    if(ids.length==0 && maillist=="none"){
        $('#sending_newsletter_list').html("Please select at least a Contact, a Lead, an Account or a Mailing list.");
        gloWin.modal('show');
        return false;
    }
    $('#sending_newsletter_list').html("Loading the users list...");
    gloWin.modal('show');
    flg_apm.sendNewsletter.saveMainInfos(post_id);
    $.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "subaction=loadUserList&action=apm_extensions&ids="+ids.join(',')+"&maillist="+maillist,
        error: function(data){
            //alert('Sorry, an error occured in the loading of the users list.');

            flg_apm.setAlertPanel.addAlert('An error occured','Sorry, an error occured in the loading of the users list...','error',3000);
        },
        success: function(data){
            datas=$.JSON.decode(data);
            if(datas.total=="0"){
                $('#sending_newsletter_list').html("Sorry but this list was empty....");
            }else {
                var listrows=my_extensions_views['sendNewsletter_sendgridrow'].tpl;
                var listgrid=my_extensions_views['sendNewsletter_sendgrid'].tpl;
                $('#sending_newsletter_list').html(listgrid);
                var str="";
                $.each(datas.results,function(i,ob){
                    rowstr=listrows;

                    rowstrar=rowstr.split('[[email]]');
                    rowstr=rowstrar.join(ob.email);
                    rowstrar=rowstr.split('[[status]]');
                    if(ob.email==""){
                        rowstr=rowstrar.join('Missing email');
                    }else {
                        rowstr=rowstrar.join('To send');
                    }
                    //
                    rowstrar=rowstr.split('[[statusclass]]');
                    if(ob.email==""){
                        rowstr=rowstrar.join('statusrow_issue');
                    }else {
                        rowstr=rowstrar.join('statusrow_tosend');
                    }
                    rowstrar=rowstr.split('[[name]]');
                    rowstr=rowstrar.join(ob.name);
                    rowstrar=rowstr.split('[[type]]');
                    rowstr=rowstrar.join(ob.type);
                    rowstrar=rowstr.split('[[id]]');
                    rowstr=rowstrar.join(ob.id);
                    rowstrar=rowstr.split('[[checked]]');
                    if(ob.email==""){
                        rowstr=rowstrar.join('');
                    }else {
                        rowstr=rowstrar.join('checked');
                    }
                    str+=rowstr;
                });
                $('#sending_newsletter_list .apm_sendlisttablebody').html(str);
                flg_apm.sendNewsletter.sendcount=0;
                flg_apm.sendNewsletter.sendissues=0;
                flg_apm.sendNewsletter.sendsuccess=0;
                flg_apm.sendNewsletter.emailtpl_id=$('#email_template_select').val();
                flg_apm.sendNewsletter.emailspesubj=$('#newsletter_special_subject').val();
                flg_apm.sendNewsletter.sendobjs=datas.results;
                flg_apm.sendNewsletter.post_id=post_id;
            //flg_apm.sendNewsletter.sendnext();
            }
        }
    });
}


flg_apm.sendNewsletter.initClicks=function(){


    }

// edit by huypham--13-05-2013--
$('.actionSendnext').live('click',function(){
    if($('.statusrow_tosend').length > 0){
        $('.mailinglistsendingtable .result_ok').css('display','none');
        flg_apm.sendNewsletter.sendnext();
    }

});
$('input[name="obj_statusrow"]').live('click',function(){
    tmp_statusrow = $(this).parent().parent().find('.statusrow');
    if($(this).is(':checked')){
        if(!tmp_statusrow.hasClass('statusrow_issue'))
            tmp_statusrow.addClass('statusrow_tosend');
    // else
    // $(this).attr('checked',false)
    }else{
        if(tmp_statusrow.hasClass('statusrow_tosend'))
            tmp_statusrow.removeClass('statusrow_tosend');
    }
});
$('input[name="parent_obj_statusrow"]').live('click',function(){
    tmp_statusrows = $(this).parents('table').find('.statusrow');
    console.log(tmp_statusrows);
    for(i = 0 ; i < tmp_statusrows.length ; i++){
        tmp_statusrow = $(tmp_statusrows[i]);
        if($(this).is(':checked')){
            if(!tmp_statusrow.hasClass('statusrow_issue')){
                tmp_statusrow.addClass('statusrow_tosend');
                tmp_statusrow.parent().find('input[name="obj_statusrow"]').attr('checked',true);
            }
        }else{
            if(tmp_statusrow.hasClass('statusrow_tosend')){
                tmp_statusrow.removeClass('statusrow_tosend');
                tmp_statusrow.parent().find('input[name="obj_statusrow"]').attr('checked',false);
            }
        }
    }
});