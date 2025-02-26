
/* JS EXTENSION
 * setModalTips.js
 */



jQuery(document).ready(function(){
    flg_apm.setModalTips.init();
    flg_apm.setModalTips.initClicks();
    f=$('#do_sending_test');
//$(f).val('');
});


flg_apm.setModalTips=new flg_apm.setField('setModalTips','.c_setModalTips');


flg_apm.setModalTips.during_create=function(fi,obj){

    return fi;
}
flg_apm.setModalTips.postcreate=function(fi,obj){
    flg_apm.setModalTips.initClicks();
    return fi;
}

flg_apm.setModalTips.createPopup=function(formTpl, title, content, actionTitle, actionClass, modal_width){
    gloWin= flg_apm.c_create_globalModalWin();
    var cont=my_extensions_views[formTpl].tpl;

    if(content !== null){
        for(var i=0; i<content.length; i++){
            cont=cont.replace(content[i][0], content[i][1]);
        }
    }

    var width = 0;
    if(modal_width === null){
        width = 650;
    }
    else{
        width = modal_width;
    }
      
    
    flg_apm.c_init_globalModalWin(gloWin,{
        title:title,
        actionTitle:actionTitle,
        content:cont,
        actionClass:actionClass,
        width:width
    });

    gloWin.modal('show');
    
    flg_apm.setModalTips.initClicks();
}

flg_apm.setModalTips.actionPostTip=function(admin){
    flg_apm.setAlertPanel.addAlert('Posting','Currenlty post this Tip, please wait...','',3000);
    
    var value_title, value_information, value_type, value_widget, value_status, value_url, value_video;
    if(!admin){
        value_title = $('.form_addtips input[name="tip_title"]').val();
        value_information = $('.form_addtips textarea[name="tip_information"]').val();
        value_type = $('.form_addtips input[name="tip_type"]').val();
        value_widget = $('.form_addtips input[name="tip_widget"]').val();
        value_status= 'pending';
    }
    else{
        value_title = $('.form_admin_addtips input[name="tip_title"]').val();
        value_information = $('.form_admin_addtips textarea[name="tip_information"]').val();
        value_type = $('.form_admin_addtips select[name="tip_type"]').val();
        value_widget = $('.form_admin_addtips select[name="tip_widget"]').val();
        value_url = $('.form_admin_addtips input[name="tip_url"]').val();
        value_video = $('.form_admin_addtips input[name="tip_video"]').val();
        value_status= 'publish';
    }
    
    var field = '&tip_title='+value_title+'&tip_information='+value_information+'&tip_type='+value_type+'&tip_widget='+value_widget+'&tip_status='+value_status+'&tip_url='+value_url+'&tip_video='+value_video;
    $.ajax({
            url: ajaxurl ,
            type: "POST",
            data: "subaction=postNewTip&action=apm_extensions&entity=setModalTipsCls"+field,
            error: function(data){
                    flg_apm.setAlertPanel.addAlert('Loading Issue','An error appeared while loading...','error',5000);
            },
            success: function(data){
                    data_array = $.parseJSON(data);
                    if(data_array.status){
                            flg_apm.setAlertPanel.addAlert('Posted','This Tip was successfully posted','ok',3000);
                    }else{
                            flg_apm.setAlertPanel.addAlert('Post Issue',data_array.msg,'error',5000);
                    }
                    gloWin.modal('hide');
            }
    });
}

flg_apm.setModalTips.initClicks=function(){
    
    $('.apm_tip_more').off('click').on('click',function(){
        var data_id = $(this).attr('data-id');
        var field = '&data_id='+data_id;
        
        var alert = flg_apm.setAlertPanel.addAlert('Loading','Currenlty load this Tip, please wait...','',2000);
        
        $.ajax({
            url: ajaxurl,
            type: "POST",
            data: "subaction=getTipDesc&action=apm_extensions&entity=setModalTipsCls"+field,
            error: function(data){
                    flg_apm.setAlertPanel.addAlert('Loading Issue','An error appeared while loading...','error',5000);
            },
            success: function(data){
                data_array = $.parseJSON(data);
                var sub_content = new Array(/{{value_content}}/g, data_array['tip_desc']);
                var content = new Array(sub_content);
                flg_apm.setModalTips.createPopup('setModalTips', 'Tip Explanation', content, '', null, null);
                flg_apm.setAlertPanel.removeAlert(alert);
            }
        });
    });
    
    $('.apm_tip_video').off('click').on('click',function(){
        var value_content = $(this).attr('data-videocode');
        var value_content = '<iframe \n\
                            width="560" height="315" \n\
                            src="//www.youtube-nocookie.com/embed/'+value_content+'?rel=0" \n\
                            frameborder="0" allowfullscreen>\n\
                         </iframe>';
        var sub_content = new Array(/{{value_content}}/g, value_content);
        var content = new Array(sub_content);
        
        flg_apm.setAlertPanel.addAlert('Loading','Currenlty load the video, please wait...','',3000);
        
        flg_apm.setModalTips.createPopup('setModalTips', 'Tip Video', content, '', null, null);
    });
    
    $('.apm_post_tip_form').off('click').on('click',function(){
        var sub_content1 = new Array(/{{value_type}}/g,$(this).attr('type-widget'));
        var sub_content2 = new Array(/{{value_tip}}/g,$(this).attr('tip-widget'));
        var sub_content3 = new Array(/{{value_widget_title}}/g,$(this).attr('widget-title'));
        var content = new Array(sub_content1, sub_content2, sub_content3);
        flg_apm.setModalTips.createPopup('setModalTips_form', 'Propose a Tip', content, 'Post', 'apm_post_tip', null);
    });
    
    $('.apm_post_tip').off('click').on('click',function(){
        flg_apm.setModalTips.actionPostTip(false);
    });
    
    $('.apm_post_tip_admin').off('click').on('click',function(){
        flg_apm.setModalTips.actionPostTip(true);
    });
    
    $('.apm_admin_post_tip').off('click').on('click',function(){
        flg_apm.setModalTips.createPopup('setModalTips_form_admin', 'Add New Tip', null, 'Post', 'apm_post_tip_admin', 800);
    });
}
