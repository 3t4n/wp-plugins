
/* JS EXTENSION
 * actionRelatedUser.js
 */




flg_apm.actionRelatedUser=new flg_apm.setField('actionRelatedUser','.c_actionRelatedUser');

var gloWin;
var detailUser = '';

flg_apm.actionRelatedUser.during_create=function(fi,obj){//
    console.debug(flg_apm.actionRelatedUser.fieldsvalues);
    fi.str=fi.str.replace(/{{lis}}/g, flg_apm.actionRelatedUser.fieldsvalues.custom_listAction);
    return fi;
}
flg_apm.actionRelatedUser.postcreate=function(fi,obj){
   // flg_apm.setConverTaxOffice.initClicks();
    return fi;
}

flg_apm.actionRelatedUser.createPopup=function(class_action){
    gloWin= flg_apm.c_create_globalModalWin();


    var value_fristname = $('#contact_fistname').val();
    var value_lastname = $('#contact_lastname').val();
    var value_emailpro = $('#email').val();
    var value_phone = $('#phone').val();
    var value_street = $('#street').val();
    var value_zip = $('#zipcode').val();
    var value_company_name_office = $('#company').val();

    value_tmp = $('#parent_city_select').val();
    var value_city = '';
    if(value_tmp != '')
        value_city = $('#parent_city_select option[value="'+value_tmp+'"]').text();

    value_tmp = $('#parent_country_select').val();
    var value_country = '';
    if(value_tmp != '')
        value_country = $('#parent_country_select option[value="'+value_tmp+'"]').text();

    value_tmp = $('#contact_gender_select').val();
    var value_gender = '';
    if(value_tmp != '')
        value_gender = $('#contact_gender_select option[value="'+value_tmp+'"]').text();




    var cont = '';

    if(class_action == 'apm_convert_lead_user'){
        cont=my_extensions_views['actionRelatedUser_convert_lead_user'].tpl;
        cont=cont.replace(/{{value_fristname}}/g, value_fristname);
        cont=cont.replace(/{{value_lastname}}/g, value_lastname);
        cont=cont.replace(/{{value_emailpro}}/g, value_emailpro);
        cont=cont.replace(/{{value_phone}}/g, value_phone);
        cont=cont.replace(/{{value_street}}/g, value_street);
        cont=cont.replace(/{{value_zip}}/g, value_zip);
        cont=cont.replace(/{{value_city}}/g, value_city);

        cont=cont.replace(/{{value_company_name_office}}/g, value_company_name_office);
        cont=cont.replace(/{{value_gender}}/g, value_gender);
        cont=cont.replace(/{{value_country}}/g, value_country);

        flg_apm.c_init_globalModalWin(gloWin,{
            title:"Convert this lead to a user",
            actionTitle:'Create User',
            content:cont,
            actionClass:'actionconvertleaduser'
        });
    }

    if(class_action == 'apm_import_user_lead_1'){
        cont=my_extensions_views['actionRelatedUser_import_user_lead_1'].tpl;
        flg_apm.actionRelatedUser.getUserList();
        flg_apm.c_init_globalModalWin(gloWin,{
            title:"Step 1 - Pick a user",
            actionTitle:'Next step',
            content:cont,
            actionClass:'selectImportUserLead'
        });
    }

    if(class_action == 'apm_import_user_lead_2'){
        cont=my_extensions_views['actionRelatedUser_import_user_lead_2'].tpl;

        cont=cont.replace(/{{value_fristname}}/g, detailUser.first_nameagent);
        cont=cont.replace(/{{value_lastname}}/g, detailUser.contact_lastname);
        cont=cont.replace(/{{value_emailpro}}/g, detailUser.user_email);
        cont=cont.replace(/{{value_phone}}/g, detailUser.user_phone);
        cont=cont.replace(/{{value_street}}/g, detailUser.user_street);
        cont=cont.replace(/{{value_zip}}/g, detailUser.zipcode);
        cont=cont.replace(/{{value_city}}/g, detailUser.user_city);
        cont=cont.replace(/{{value_company_name_office}}/g, detailUser.user_company);
        cont=cont.replace(/{{value_gender}}/g, detailUser.user_gender);
        cont=cont.replace(/{{value_country}}/g, detailUser.user_country);

        flg_apm.c_init_globalModalWin(gloWin,{
            title:"Step 2 - Select the fields to import in this lead",
            actionTitle:'Import in this lead',
            content:cont,
            actionClass:'actionImportUserLead'
        });
    }


    if(class_action == 'apm_relate_lead_user'){
        cont=my_extensions_views['actionRelatedUser_import_user_lead_1'].tpl;
        flg_apm.actionRelatedUser.getUserList();
        flg_apm.c_init_globalModalWin(gloWin,{
            title:"Pick a user to relate with this lead",
            actionTitle:'Relate user',
            content:cont,
            actionClass:'relateLeadUser'
        });
    }

    if(cont != ''){
        gloWin.modal('show');
        flg_apm.actionRelatedUser.initClicks();
    }
}

flg_apm.actionRelatedUser.getUserList=function(){

    $.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "subaction=getUserList&action=apm_extensions&entity=actionRelatedUserCls",
        error: function(data){
            flg_apm.setAlertPanel.addAlert('Loading Issue','An error appeared while loading...','error',5000);
        },
        success: function(data){
            data_array = $.parseJSON(data);
            if(data_array.status){
                $('.form_import_user_lead_1 #select_import_user_lead').removeAttr('disabled');
                $('.form_import_user_lead_1 #select_import_user_lead').html(data_array.listuser);
            }else{
                flg_apm.setAlertPanel.addAlert('Load User List Issue',data_array.msg,'error',5000);
            }
        }
    });
}

flg_apm.actionRelatedUser.getDetailUser=function(userID){

    $.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "subaction=getDetailUser&action=apm_extensions&entity=actionRelatedUserCls&userID="+userID,
        error: function(data){
            flg_apm.setAlertPanel.addAlert('Loading Issue','An error appeared while loading...','error',5000);
        },
        success: function(data){
            data_array = $.parseJSON(data);
            if(data_array.status){
                // console.debug(data_array.userdata);
                detailUser = data_array.userdata;
                flg_apm.actionRelatedUser.createPopup('apm_import_user_lead_2');
            }else{
                flg_apm.setAlertPanel.addAlert('Load User List Issue',data_array.msg,'error',5000);
            }
        }
    });
}

flg_apm.actionRelatedUser.ImportUserData=function(){

    $('#contact_fistname').val(detailUser.first_nameagent);
    $('#contact_lastname').val(detailUser.contact_lastname);
    $('#email').val(detailUser.user_email);
    $('#phone').val(detailUser.user_phone);
    $('#street').val(detailUser.user_street);
    $('#zipcode').val(detailUser.zipcode);
    $('#company').val(detailUser.user_company);


    $('#parent_city_select option').each(function(){
        if($(this).text() == detailUser.user_city)
            $(this).attr('selected',"selected");
    });

    $('#contact_gender_select option').each(function(){
        if($(this).text() == detailUser.user_gender)
            $(this).attr('selected',"selected");
    });

    $('#parent_country_select option').each(function(){
        if($(this).text() == detailUser.user_country)
            $(this).attr('selected',"selected");
    });

// detailUser.user_city
// detailUser.user_gender;
// detailUser.user_country;
}


flg_apm.actionRelatedUser.actionRelateLeadUser=function(userID){

    var value_fristname = $('#contact_fistname').val();
    var value_lastname = $('#contact_lastname').val();
    var value_emailpro = $('#email').val();
    var value_phone = $('#phone').val();
    var value_street = $('#street').val();
    var value_zip = $('#zipcode').val();

    value_tmp = $('#parent_city_select').val();
    var value_city = $('#parent_city_select option[value="'+value_tmp+'"]').text();

    value_tmp = $('#parent_country_select').val();
    var value_country = $('#parent_country_select option[value="'+value_tmp+'"]').text();

    value_tmp = $('#contact_gender_select').val();
    var value_gender = $('#contact_gender_select option[value="'+value_tmp+'"]').text();

    var value_company_name = $('#company').val();

    var field = '&post_id='+post_id+'&userID='+userID+'&first_nameagent='+value_fristname+'&email_agent='+value_emailpro;
    field = field + '&contact_lastname=' + value_lastname;
    field = field + '&value_phone=' + value_phone;
    field = field + '&value_street=' + escape(value_street);
    field = field + '&zipcode=' + value_zip;
    field = field + '&value_city=' + value_city;
    field = field + '&value_company_name=' + value_company_name;
    field = field + '&value_country=' + value_country;
    field = field + '&value_gender=' + value_gender;

    $.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "subaction=relateLeadToUser&action=apm_extensions&entity=actionRelatedUserCls"+field,
        error: function(data){
            flg_apm.setAlertPanel.addAlert('Loading Issue','An error appeared while loading...','error',5000);
        },
        success: function(data){
            data_array = $.parseJSON(data);
            if(data_array.status){
                flg_apm.setAlertPanel.addAlert('Related','This Lead was successfully relate to a user','ok',3000);
                flg_apm.related_user_id=data_array.userID;
                flg_apm.related_username=data_array.userName;
                $('.c_setRelatedUser .highlight_userrelated').attr('data-userid',data_array.userID);
                $('.c_setRelatedUser .highlight_userrelated').text(data_array.userName);

                if($('.do_delete_relationship').hasClass('hide'))
                    $('.do_delete_relationship').removeClass('hide');

            }else{
                flg_apm.setAlertPanel.addAlert('Related Issue',data_array.msg,'error',5000);
            }
        // gloWin.modal('hide');
        }
    });
}


flg_apm.actionRelatedUser.actionconvertleaduser=function(){

    var value_fristname = $('.form_converleaduser input[name="first_nameagent"]').val();
    var value_lastname = $('.form_converleaduser input[name="contact_lastname"]').val();
    var value_emailpro = $('.form_converleaduser input[name="email_agent"]').val();
    var value_phone = $('.form_converleaduser input[name="value_phone"]').val();
    var value_street = $('.form_converleaduser input[name="value_street"]').val();
    var value_zip = $('.form_converleaduser input[name="zipcode"]').val();
    var value_city = $('.form_converleaduser input[name="value_city"]').val();

    var value_gender = $('.form_converleaduser input[name="value_gender"]').val();
    var value_country = $('.form_converleaduser input[name="value_country"]').val();
    var company_name_office = $('.form_converleaduser input[name="company_name_office"]').val();

    var field = '&post_id='+post_id+'&first_nameagent='+value_fristname+'&email_agent='+value_emailpro;

    if($('input[name="cb_lastname"]').is(':checked'))
        field = field + '&contact_lastname=' + value_lastname;

    if($('input[name="cb_phone"]').is(':checked'))
        field = field + '&value_phone=' + value_phone;

    if($('input[name="cb_street"]').is(':checked'))
        field = field + '&value_street=' + escape(value_street);

    if($('input[name="cb_zip"]').is(':checked'))
        field = field + '&zipcode=' + value_zip;

    if($('input[name="cb_city"]').is(':checked'))
        field = field + '&value_city=' + value_city;

    if($('input[name="cb_country"]').is(':checked'))
        field = field + '&value_country=' + value_country;

    if($('input[name="cb_gender"]').is(':checked'))
        field = field + '&value_gender=' + value_gender;

    if($('input[name="cb_company"]').is(':checked'))
        field = field + '&value_company_name=' + company_name_office;

    $.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "subaction=converLeadToUser&action=apm_extensions&entity=actionRelatedUserCls"+field,
        error: function(data){
            flg_apm.setAlertPanel.addAlert('Loading Issue','An error appeared while loading...','error',5000);
        },
        success: function(data){
            data_array = $.parseJSON(data);
            if(data_array.status){
                flg_apm.setAlertPanel.addAlert('Converted','This Lead was successfully converted to a User','ok',3000);
                setTimeout(function(){
                    window.location.href = flg_apm.siteurl+'/wp-admin/user-edit.php?user_id='+data_array.userID;
                },2500);
            }else{
                flg_apm.setAlertPanel.addAlert('Convert Issue',data_array.msg,'error',5000);
            }
        // gloWin.modal('hide');
        }
    });
}
flg_apm.actionRelatedUser.initClicks=function(){

    $('.apm_convert_lead_user').off('click').on('click',function(){
        flg_apm.actionRelatedUser.createPopup('apm_convert_lead_user');
    });

    $('.actionconvertleaduser').off('click').on('click',function(){
        var value_fristname = $('.form_converleaduser input[name="first_nameagent"]').val();
        var value_emailpro = $('.form_converleaduser input[name="email_agent"]').val();
        if(value_fristname != '' && value_emailpro != ''){
            gloWin.modal('hide');
            flg_apm.setAlertPanel.addAlert('Converting','Currenlty converting this lead, please wait...','',3000);
            flg_apm.actionRelatedUser.actionconvertleaduser();
        }else{
            alert('First name and Email Pro not empty');
        }
    });

    $('.apm_import_user_lead').off('click').on('click',function(){
        flg_apm.actionRelatedUser.createPopup('apm_import_user_lead_1');
    });

    $('.selectImportUserLead').off('click').on('click',function(){
        detailUser = '';
        var user_id_s = $('.form_import_user_lead_1 #select_import_user_lead').val();
        var user_id_t = $('.form_import_user_lead_1 .search_user_id').val();
        if(user_id_s != ''){
            flg_apm.actionRelatedUser.getDetailUser(user_id_s);
        // flg_apm.actionRelatedUser.createPopup('apm_import_user_lead_2');
        }else{
            alert('Please select a user.');
        }
    });

    $('.actionImportUserLead').off('click').on('click',function(){
        if(confirm('Are you sure that you really want to import this user in this lead form? It will overwrite eventual existing data')){
            flg_apm.actionRelatedUser.ImportUserData();
        }
        gloWin.modal('hide');
    });

    $('.apm_relate_lead_user').off('click').on('click',function(){
        flg_apm.actionRelatedUser.createPopup('apm_relate_lead_user');
        $('.modal_global_alert',gloWin).html('After validating this form, you will need to save to store the data');
    });

    $('.relateLeadUser').off('click').on('click',function(){
        detailUser = '';
        var user_id_s = $('.form_import_user_lead_1 #select_import_user_lead').val();
        var user_id_t = $('.form_import_user_lead_1 input[name="sel_user_id"]').val();
        flg_apm.setAlertPanel.addAlert('Relating','Currenlty relating, please wait...','',3000);
        if(user_id_s != ''){
            flg_apm.actionRelatedUser.actionRelateLeadUser(user_id_s);
            gloWin.modal('hide');
        }else{
            if(user_id_t != ''){
                flg_apm.actionRelatedUser.actionRelateLeadUser(user_id_t);
                gloWin.modal('hide');
            }else
                alert('Please select a user.');
        }
    });

    $('.form_import_user_lead_1 .apm_childtable_dosearch').off('click').on('click',function(){
        var query_str = $('.form_import_user_lead_1 .search_user').val();
        $.ajax({
            url: ajaxurl ,
            type: "POST",
            data: "subaction=getUserList&action=apm_extensions&entity=actionRelatedUserCls&query_str="+query_str,
            error: function(data){
                flg_apm.setAlertPanel.addAlert('Loading Issue','An error appeared while loading...','error',5000);
            },
            success: function(data){
                data_array = $.parseJSON(data);
                if(data_array.status){
                    $('.form_import_user_lead_1 .showUserListSearch ul').html(data_array.listuser);
                }else{
                    flg_apm.setAlertPanel.addAlert('Load User List Issue',data_array.msg,'error',5000);
                }
            }
        });
    });
}

jQuery(document).ready(function(){
    flg_apm.actionRelatedUser.init();
    flg_apm.actionRelatedUser.initClicks();
    f=$('#do_sending_test');
//$(f).val('');
});