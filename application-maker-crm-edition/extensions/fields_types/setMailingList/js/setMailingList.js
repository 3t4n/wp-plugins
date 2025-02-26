
/* JS EXTENSION
 * setMailingList.js
 */


jQuery(document).ready(function(){
    flg_apm.setMailingList.init();
});


flg_apm.setMailingList=new flg_apm.setField('setMailingList','.c_setMailingList');
flg_apm.setMailingList.during_create=function(fi,obj){
    return fi;
}

flg_apm.setMailingList.postcreate=function(fi,obj){
    par=$(obj).find('.apm_childtable');
    var tabbody=$(par).find('.apm_tablebody');
    var field_mailinglist=$(par).find('.field_mailinglist');
    var va=$(field_mailinglist).val();
    if(va.indexOf(',')>-1){
        valar=va.split(',');
    }else if(va!==""){
        valar=[va];
    }else{
        valar=[];
    }
    var str=my_extensions_views['mailinglist_row'].tpl;//
    if(valar.length>0){
        $(tabbody).html(' <tr data-row_id="noitem"><td colspan="3">Loading....</td></tr>');
        $.ajax({
            url: ajaxurl ,
            type: "POST",
            data: "subaction=loadMailingList&action=apm_extensions&ids="+va,
            error: function(data){
                flg_apm.setAlertPanel.addAlert('An error occured','Sorry, an error occured in the loading of the mailing list...','error',3000);
            // alert('Sorry, an error occured in the loading of the mailing list.');
            },
            success: function(data){
                $(tabbody).html('');
                filesdatas=$.JSON.decode(data);

                if(Number(filesdatas.total)>0){
                    $.each(filesdatas.items,function(i,o){
                        /*strn=str;
                        stra=strn.split('[[id]]');
                        strn=stra.join(o.id);
                        stra=strn.split('[[name]]');
                        strn=stra.join(o.name);
                        stra=strn.split('[[type]]');
                        strn=stra.join(o.type);
                        stra=strn.split('[[email]]');
                        strn=stra.join(o.email);
                        stra=strn.split('[[url]]');
                        strn=stra.join("post.php?post="+o.id+"&action=edit");*/
                        strn=str;
                        strn=strn.replace(/{{id}}/g,o.id);
                        name=o.name;
                        email=o.email;
                        if(email.indexOf('**')>-1){
                            ar=email.split('**');
                            email=ar[0];
                            name=ar[1];
                        }
                        strn=strn.replace(/{{name}}/g,name);
                        strn=strn.replace(/{{type}}/g,o.type);
                        strn=strn.replace(/{{email}}/g,email);
                        if(o.type!=='Free email'){
                            strn=strn.replace(/{{url}}/g,"post.php?post="+o.id+"&action=edit");
                        }else{
                            strn=strn.replace(/{{url}}/g,"#");
                        }
                        $(tabbody).prepend(strn);
                    });
                    $(par).find('.do_selectrow_list').removeClass('disabled');
                    flg_apm.setMailingList.initClicks();
                }else{
                // $(tabbody).html(my_extensions_views['uploadGrid_row_nofiles'].tpl);
                }
            }
        });


    }

    flg_apm.initGlobalClick();
};
flg_apm.setMailingList.countAdded=0;
flg_apm.setMailingList.addToList=function(obj,val,type,name){
    var v=val;
    par=$(obj).parents('.apm_childtable');
    tabbody=$(par).find('.apm_tablebody');
    field_mailinglist=$(par).find('.field_mailinglist');
    rows=$(par).find('tr');
    test=true;
    noitem=false;
    if(rows.length>0){
        $.each(rows,function(i,ob){
            id=$(ob).attr("data-row_id");
            if(id==v){
                //alert('This item is already in the list');
                flg_apm.setAlertPanel.addAlert('Already listed','Sorry, this item is already in the list...','error',3000);
                test=false;
            };
            if(id=="noitem"){
                noitem=true;
            }
        }) ;
    }
    if(test){
        if(noitem){
            $(tabbody).html('');
        }
        flg_apm.setMailingList.countAdded++;
        str=my_extensions_views['mailinglist_row'].tpl;//
        email='<span class="emailloading_'+flg_apm.setMailingList.countAdded+'">Loading....</span>';
        if(type=='Free email'){
            if(name=='No'){
                name='-None-';
            }
            v='ran_'+(999999+Math.ceil(Math.random()*999999999999));
            email=val;
        }
        /*  stra=str.split('[[id]]');
        str=stra.join(v);
        stra=str.split('[[name]]');
        str=stra.join(name);
        stra=str.split('[[type]]');
        str=stra.join(type);
        stra=str.split('[[email]]');
        str=stra.join(email);
        stra=str.split('[[url]]');
        str=stra.join("post.php?post="+v+"&action=edit");*/

        str=str.replace(/{{id}}/g,v);
        str=str.replace(/{{name}}/g,name);
        str=str.replace(/{{type}}/g,type);
        str=str.replace(/{{email}}/g,email);
        if(type!=='Free email'){
            str=str.replace(/{{url}}/g,"post.php?post="+v+"&action=edit");
        }else{
            str=str.replace(/{{url}}/g,"#");
        }
        str=str.replace(/{{url}}/g,"post.php?post="+v+"&action=edit");
        $(tabbody).prepend(str);
        va=$(field_mailinglist).val();
        if(va.indexOf(',')>-1){
            valar=va.split(',');
        }else if(va!==""){
            valar=[va];
        }else{
            valar=[];
        }
        if(type=='Free email'){
            valar.push(email+'**'+addslashes(name));
        }else{
            valar.push(v);
        }
        $(field_mailinglist).val(valar.join(','));

        flg_apm.setMailingList.initClicks();
        if(type=='Free email'){
            spa=$('.emailloading_'+flg_apm.setMailingList.countAdded);
            $(spa).html(v);
        }else{
            $.ajax({
                url: ajaxurl ,
                type: "POST",
                data: "subaction=loadEntityEmail&action=apm_extensions&id="+v+"&countAdded="+flg_apm.setMailingList.countAdded,
                error: function(data){
                    // alert('Sorry, an error occured in the loading of the email address.');
                    flg_apm.setAlertPanel.addAlert('An error occured','Sorry, an error occured in the loading of the email address...','error',3000);
                },
                success: function(data){
                    da=$.JSON.decode(data);
                    spa=$('.emailloading_'+da.countAdded);
                    $(spa).html(da.email);

                }
            });
        }
    }
};
flg_apm.setMailingList.initClicks=function(){
    $('.add_freeemail').off('click').on('click',function(e){
        freeemeail=$('#freeemeail');
        v=$(freeemeail).val();
        if(v==''){
            // alert('Please select a Contact in the field "Contact"');
            flg_apm.setAlertPanel.addAlert('Empty','Please input an email...','error',3000);
        }else {
            if(v.indexOf('@')>-1 && v.indexOf('.')>-1){
                na=$('#freeemeailname').val();
                if(na==''){
                    na='No';
                }
                flg_apm.setMailingList.addToList(this,v,'Free email',na);
            }else{
                flg_apm.setAlertPanel.addAlert('Wrong format','Please input a correct email format...','error',3000);
            }
        }
    });
    $('.add_contact_list').off('click').on('click',function(e){
        contact_parent=$('#autocomplete_data_contact_parent');
        contact_parentname=$('#autocomplete_contact_parent');
        v=$(contact_parent).val();
        name=$(contact_parentname).val();
        if(v==''){
            // alert('Please select a Contact in the field "Contact"');
            flg_apm.setAlertPanel.addAlert('Missing selection','Please select a Contact in the field "Contact"...','error',3000);
        }else {
            flg_apm.setMailingList.addToList(this,v,'Contact',name);
        }
    });

    $('.add_account_list').off('click').on('click',function(e){
        account_parent=$('#autocomplete_data_account_parent');
        account_parentname=$('#autocomplete_account_parent');
        var v=$(account_parent).val();
        name=$(account_parentname).val();
        if(v==''){
            // alert('Please select an Account in the field "Parent Account"');
            flg_apm.setAlertPanel.addAlert('Missing selection','Please select an Account in the field "Parent Account"...','error',3000);
        }else {
            flg_apm.setMailingList.addToList(this,v,'Account',name);

        }
    });

    $('.add_lead_list').off('click').on('click',function(e){
        lead_parent=$('#autocomplete_data_lead_parent');
        lead_parentname=$('#autocomplete_lead_parent');
        v=$(lead_parent).val();
        name=$(lead_parentname).val();
        if(v==''){
            // alert('Please select an Lead in the field "Lead"');
            flg_apm.setAlertPanel.addAlert('Missing selection','Please select an Lead in the field "Lead"...','error',3000);
        }else {
            flg_apm.setMailingList.addToList(this,v,'Lead',name);
        }
    });

    $('.do_deleterow_list').off('click').on('click',function(e){
        if($(this).hasClass('disabled')){
            return false;
        }
        b=confirm("Are you sure that you want to delete those rows?");
        if(b!==true){
            return false;
        }
        var par=$(this).parents('.apm_childtable');
        $trs=$(par).find('tr');
        var ischk=false;
        var idsar=[];
        var idsarkeep=[];
        $.each($trs,function(i,ob) {
            chk=$(ob).find('.is_chk');
            id=$(ob).attr('data-row_id');
            email=$(ob).attr('data-row_email');
            name=$(ob).attr('data-row_name');
            if($(chk).attr('checked')=='checked'){
                ischk='checked';
                idsar.push(id);
                $(ob).fadeOut(500, function(){
                    $(this).remove();
                });
            }else{
                if(id!==undefined){
                    if(id.indexOf('ran')>-1){
                        idsarkeep.push(email+'**'+addslashes(name));
                    }else{
                        idsarkeep.push(id);
                    }
                }
            };

        });
        idsstr=idsar.join(',');
        idskeepstr=idsarkeep.join(',');
        $(par).find('.field_mailinglist').val(idskeepstr);
    });

    $('.apm_tablebody .is_chk').off('change').on('change',function(e){
        var par=$(this).parents('.apm_childtable');
        $trs=$(par).find('tr');
        var ischk=false;
        $.each($trs,function(i,ob) {
            chk=$(ob).find('.is_chk');
            if($(chk).attr('checked')=='checked'){
                ischk='checked';
            };

        });
        delbtn=$(par).find('.do_deleterow_list');
        $(delbtn).removeClass('disabled');
        if(ischk!=='checked'){
            $(delbtn).addClass('disabled');
        }
    });


    $('.do_selectrow_list').off('click').on('click',function(e){
        if($(this).hasClass('disabled')){
            return false;
        }
        var par=$(this).parents('.apm_childtable');
        tabbody=$(par).find('.apm_tablebody');
        $trs=$(tabbody).find('tr');
        if($trs.length>0){
            var ischk=false;
            $.each($trs,function(i,ob) {
                if(i==0){
                    chk=$(ob).find('.is_chk');
                    ischk=  $(chk).attr('checked');
                }
            });

            $.each($trs,function(i,ob) {
                chk=$(ob).find('.is_chk');
                if(ischk!=='checked'){
                    $(chk).attr('checked','checked');
                } else {
                    $(chk).removeAttr('checked');
                }
            });
            delbtn=$(par).find('.do_deleterow_list');
            $(delbtn).removeClass('disabled');
            if(ischk=='checked'){
                $(delbtn).addClass('disabled');
            }
        }
    });
}

