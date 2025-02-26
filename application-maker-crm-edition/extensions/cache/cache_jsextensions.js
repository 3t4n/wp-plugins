flg_apm.siteurl="http://localhost/blue_origami_FREE_FOR_WP";
                        flg_apm.pluginurl="http://localhost/blue_origami_FREE_FOR_WP/wp-content/plugins/application-maker-crm-edition";

/* JS EXTENSION
 * setGlobalFieldsItems.js
 */

var addslashes=function  (s, preserveCR) {
    // return (str + '').replace(/[\\"']/g, '\\$&').replace(/\u0000/g, '\\0');
    preserveCR = preserveCR ? '&#13;' : '\n';
    s = ('' + s) /* Forces the conversion to string. */
    .replace(/&/g, '&amp;') /* This MUST be the 1st replacement. */
    .replace(/'/g, '&apos;') /* The 4 other predefined entities, required. */
    .replace(/"/g, '&quot;')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    /*
        You may add other replacements here for HTML only
        (but it's not necessary).
        Or for XML, only if the named entities are defined in its DTD.
     */
    .replace(/\r\n/g, preserveCR) /* Must be before the next replacement. */
    .replace(/[\r\n]/g, preserveCR);
    ;
    return s;
}

jQuery(document).ready(function(){
    flg_apm.c_GlobalFieldsItemsInit();
});

flg_apm.c_GlobalFieldsItemsInit=function(){
    flg_apm.c_autocompleteInit();
};

flg_apm.setUIObject=function(objname,classobj){
    this.objname=objname;
    this.classobj=classobj;

    this.preinit=function(objname){

    }

    this.launch_create=function(){//Based to be overwritten in  each field declaration

        classobj=$(this.classobj);
        var oThis=this;
        $.each(classobj, function(i,obj){
            obj=$(obj);
            fi=oThis.create(obj);
            oThis.postcreate(fi,obj);
        });
    }
    this.during_create=function(fi,obj){//Based to be overwritten in  each field declaration
        return fi;
    }
    this.end_create=function(fi,obj){//Based to be overwritten in  each field declaration
        return fi;
    }
    this.postcreate=function(fi,obj){//Based to be overwritten in  each field declaration

    }
    this.procLang=function(str,arrlang,arrstr){//Based to be overwritten in  each field declaration
        //
        var str=str,arrlang=arrlang;
        $.each(arrstr,function(ik,io){
            str=str.split('{{'+ik+'}}').join(io);
        });
        return str;
    }
    this.ifScope=function(objscope){//checki class presence in the page
        if($('.'+objscope).length>0){
            return true;
        }
        return false;
    }

    this.setFullWidthHeight=function(type,widthcase){//Based to be overwritten in  each field declaration
        win=$(window);
        h=win.height();
        w=win.width();
        clobj=$(this.classobj);
        clobj=$(clobj);
        switch(type){
            case 'window_topobj':
                clobj.css('height',(h-clobj.position().top-15)+'px');
                break;

        }
        switch(widthcase){
            case 'wpbody':
                clobj.css('width',($('#wpbody').width()-50)+'px');
                break;

        }
    };

    this.setMainTpl=function(fi,obj){//Based to be overwritten in  each field declaration

        classobj=$(this.classobj);
        var str=my_extensions_views[this.objname].tpl;//
        str=this.doTplPreTreatment(str);
        this.tplIsSet=true;
        classobj.html(str);
    }

    this.doTplPreTreatment=function(str){//Based to be overwritten in  each field declaration
        //{{siteurl}}

        str=this.doTplPrePreTreatment(str);
        return str;
    }

    this.doTplPrePreTreatment=function(str){//Based to be overwritten in  each field declaration
        //{{siteurl}}
        str=str.replace('{{siteurl}}',flg_apm.siteurl);
        str=str.replace(/{{pluginurl}}/g,flg_apm.pluginurl);
        return str;
    }

    this.initClicks=function(){//Based to be overwritten in  each field declaration

    }

    this.init=function(){
        this.launch_create();
        this.initClicks();
    }

    this.preinit(objname);

    this.init();
    return this;
}

flg_apm.setField=function(objname,classobj){
    this.objname=objname;
    this.classobj=classobj;

    this.preinit=function(objname){
    }

    this.test=function(objname){
    //alert('test '+this.objname);
    }
    this.init=function(){

        this.launch_create();
        this.initClicks();
    }

    this.initClicks=function(){//Based to be overwritten in  each field declaration

    }
    this.launch_create=function(){//Based to be overwritten in  each field declaration

        classobj=$(this.classobj);
        var oThis=this;
        $.each(classobj, function(i,obj){
            obj=$(obj);
            fi=oThis.create(obj);
            oThis.postcreate(fi,obj);
        });
    }
    this.create=function(obj){//Based to be overwritten in  each field declaration
        fi={};
        fi.field_type=obj.attr('data-field_type');
        fi.category=obj.attr('data-category');
        fi.value=obj.attr('data-value');
        fi.postid=obj.attr('data-postid');
        fi.field=obj.attr('data-field');
        fi.val_ar=fi.value.split(' - ');
        fi.label=obj.attr('data-label');
        fi.valuename=obj.attr('data-valuename');
        fi.str=flg_apm.parseValueDefaultsStr(obj);
        fi=this.during_create(fi,obj);
        fi=this.end_create(fi);

        // console.log("this.create fieldlabel "+fi.str);
        obj.html(fi.str);
        return fi;
    }
    this.during_create=function(fi,obj){//Based to be overwritten in  each field declaration
        return fi;
    }
    this.end_create=function(fi,obj){//Based to be overwritten in  each field declaration
        return fi;
    }
    this.postcreate=function(fi,obj){//Based to be overwritten in  each field declaration

    }
    this.preinit(objname);
    return this;
}

/////MODAL
flg_apm.c_create_globalModalWin=function(){
    gloWin=$('#myModalGlobalWin');
    if(gloWin.html()==undefined){
        $('body').append(my_extensions_views['setGlobalFieldsItems_modalWindow'].tpl);
    }
    gloWin=$('#myModalGlobalWin');
    return $(gloWin);
};
flg_apm.c_init_globalModalWin=function(gloWin,args){
    modal_action_btn=$('.modal_action_btn',gloWin);
    model_close_btn=$('.model_close_btn',gloWin);

    //alert(args.actionTitle);
    if(args.actionTitle==""){
        $(modal_action_btn).hide();
    }else{
        $(modal_action_btn).show();
        $(modal_action_btn).html(args.actionTitle);
        $(modal_action_btn).attr('class','btn btn-primary modal_action_btn '+args.actionClass);
    }
    if(args.closeTitle==undefined){
        $(model_close_btn).html('Close');
    }else{
        $(model_close_btn).html(args.closeTitle);
    }
    console.log(args.closeTitle);
    w=650;
    if(args.width!==undefined){
        w=args.width;
    }
    bw=$(window).width();
    $('.modal_title',gloWin).html(args.title);
    $('.modal-body',gloWin).html(args.content);
    $('.modal_global_alert',gloWin).html('');

    $('.modal').css('width',w+'px');
    $('.modal').css('margin','0px 0px 0px -'+(w/2)+'px ');
};
//////END MODAL


////CATEGORY

flg_apm.c_init_saveAjaxCategForm=function(win){
    var win=win;
    var name=$('input.addcateg_name',win);
    var tagcateg=$('input.tagcateg',win);
    var parent=$('select',win);
    var apm_fieldsource=$('input.apm_fieldsource',win);
    descript=$('textarea',win);
    if($(name).val()==""){
        flg_apm.setAlertPanel.addAlert('An error occured','The name cannot be empty......','error',3000);
        return false;
    }
    $('.modal_global_alert',win).html('Submitting... ');
    $.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "name="+$(name).val()+"&parent="+$(parent).val()+"&description="+$(descript).val()+"&tagcateg="+$(tagcateg).val()+"&action=apm_add_category",
        //context: document.body,
        error: function(data){
            $('.modal_global_alert',win).html('<span style="color:red">Sorry, an error occured.</span> ');
            flg_apm.setAlertPanel.addAlert('An error occured','Sorry, an error occured,  ...','error',3000);
        },
        success: function(data){
            $('.modal_global_alert',win).html('');
            name=$(name).val();
            parent=$(parent).val();
            tagcateg=$(tagcateg).val();
            apm_fieldsource=$(apm_fieldsource).val();
            if(apm_fieldsource!==undefined && apm_fieldsource!=="" && apm_fieldsource!==null){
                //sour=('#'+apm_fieldsource+"_select");
                flg_apm.c_apm_load_categ(tagcateg,apm_fieldsource);
            // $(sour).html($(parent).html());
            }
            //alert(tagcateg);
            win.modal('hide');
        }
    });
//win.modal('hide');
};
////END CATEGORY

////AUTOCOMPLETE///

flg_apm.c_autocompleteInit=function(){
    apm_autocomplete_container=$('.apm_autocomplete_container');

    $.each(apm_autocomplete_container, function(){


        });
    apm_autocomplete_fields=$('.apm_autocomplete_field');
    $(apm_autocomplete_fields).off('keyup').on('keyup',function(){
        var inp=$(this);
        nbchar=Number(inp.attr('data-nbchar'));
        nblimax=inp.attr('data-nblimax');
        entity=inp.attr('data-entity');
        if(nblimax==undefined){
            nblimax=5;
        } else{
            nblimax=Number(nblimax);
        }
        flg_apm.nbsent=inp.attr('nbsent');
        if(flg_apm.nbsent==undefined){
            flg_apm.nbsent=0;
        }
        flg_apm.nbsent=Number(flg_apm.nbsent)+1;
        inp.attr('nbsent',flg_apm.nbsent);
        inp.attr('sel_id','0');
        inp.attr('sel_name','0');
        str=inp.val();
        cont=inp.parents('.apm_autocomplete_container');
        cont=$(cont);
        offset=inp.offset();
        $('.apm_autocomplete_list').remove();
        if(str.length>=nbchar){
            imgLoad=flg_apm.getAdminUrl()+'images/loading.gif';
            inp.css('background','url('+imgLoad+') '+(inp.width()-10)+'px 4px no-repeat');
            $.ajax({
                url: ajaxurl ,
                type: "POST",
                data: "subaction=get_suggest&action=apm_extensions&str="+str+"&nbsent="+flg_apm.nbsent+"&entity="+entity,
                //context: document.body,
                error: function(data){
                },
                success: function(data){
                    datas=$.JSON.decode(data);
                    if(datas.nbsent==flg_apm.nbsent){
                        inp.removeAttr('style');
                        if(Number(datas.count)>0){
                            var retstr="";
                            $.each(datas.result, function(key, res){
                                retstr+="<li data-id='"+res.id+"' >"+res.name+"</li>";
                            });
                            $('body').append("<div class='apm_autocomplete_list' ><ul >"+retstr+"</ul></div>")
                            var uldiv=$('.apm_autocomplete_list');
                            $(uldiv).css('width',inp.width()+10);//
                            lih=$('ul li',uldiv).height()+4;

                            $(uldiv).height( lih*nblimax );
                            if( $(uldiv).height() > $('ul',uldiv).height() ){
                                $(uldiv).height( $('ul',uldiv).height() );
                            }
                            $(uldiv).css('top',offset.top+25);//offset.top
                            $(uldiv).css('left',offset.left);
                            lis=$('li',uldiv);
                            $(lis).off('click').on('click',function(){
                                s=$(this).html();
                                s=s.replace("'","\\'");
                                s=s.replace('"','\\"');
                                inp.attr('sel_id',$(this).attr('data-id'));
                                inp.attr('sel_name',s);
                                inp.val($(this).html());
                                $(uldiv).remove();
                            });
                        }
                    }
                //

                }
            });

        }
    });
};


flg_apm.getElementPosition=function(id){
    var offsetTrail = document.getElementById(id);
    var offsetLeft = 0;
    var offsetTop = 0;
    while (offsetTrail) {
        offsetLeft += offsetTrail.offsetLeft;
        offsetTop += offsetTrail.offsetTop;
        offsetTrail = offsetTrail.offsetParent;
    };
    return {
        left: offsetLeft,
        top: offsetTop
    };
}
//////END AUTOCOMPLETE


////HELPERS

flg_apm.showSuccessAlert=function(obj,par,str,dura){
    /*if(dura==undefined){
        dura=2500;
    }
   pan=$(obj).parents(par).find(".alertPanel");
   $(pan).removeClass('alert-info');
   if($(pan).hasClass('alert-success')){
   }else {
    $(pan).addClass('alert-success');
   }
   $(pan).html(str);
   if($(pan).is(":visible")){
        $(pan).delay(dura).hide(150);
   }else {
        $(pan).show(150).delay(dura).hide(150);
   }*/
    }


flg_apm.showInfoAlert=function(obj,par,str,dura){
    if(dura==undefined){
        dura=2500;
    }
    pan=$(obj).parents(par).find(".alertPanel");
    $(pan).removeClass('alert-success');
    if($(pan).hasClass('alert-info')){
    }else {
        $(pan).addClass('alert-info');
    }
    $(pan).html(str);
    if($(pan).is(":visible")){
        $(pan).delay(dura).hide(150);
    }else {
        $(pan).show(150).delay(dura).hide(150);
    }
}

flg_apm.showErrorAlert=function(obj,par,str,dura){
    if(dura==undefined){
        dura=2500;
    }
    pan=$(obj).parents(par).find(".alertPanel");
    $(pan).removeClass('alert-success');
    $(pan).removeClass('alert-info');
    if($(pan).hasClass('alert-error')){
    }else {
        $(pan).addClass('alert-error');
    }
    $(pan).html(str);
    if($(pan).is(":visible")){
        $(pan).delay(dura).hide(150);
    }else {
        $(pan).show(150).delay(dura).hide(150);
    }
}

flg_apm.parVieSplStr=function(args,str){
    var str=str;
    $.each(args,function(i,o){
        sa=str.split('[['+o[0]+']]');
        str=sa.join(my_extensions_views[o[1]].tpl);
    });
    return str;
}
flg_apm.parVieObj=function(objarg,view,doaddslash_arr){
    var view=view;
    $.each(objarg,function(i,o){
        sa=view.split('[['+i+']]');
        //alert(i+"-"+o+"//////////"+sa[0]+"-----------------------"+sa[1]);
        if(doaddslash_arr!==undefined){
            if($.inArray(i,doaddslash_arr)> -1 ){
                view=sa.join(addslashes(o));
            }else{
                view=sa.join(o);
            }
        }else{
            view=sa.join(o);
        }
    });
    return view;
}
flg_apm.parSplStr=function(args,str){
    var str=str;
    $.each(args,function(i,o){
        sa=str.split('[['+o[0]+']]');
        str=sa.join(o[1]);
    });
    return str;
}

flg_apm.parseValueChkStr=function(value,args,str){
    var str=str;
    var value=value;
    var val_ar=value.split(' - ');
    $.each(args,function(i,o){
        sa=str.split('[['+o.s+']]');
        ch="";
        if(val_ar[o.p]=='on'){
            ch=" checked='checked' ";
        }
        if(o.precheck && document.location.href.indexOf('post-new.php')>-1){
            ch=" checked='checked' ";
        }
        str=sa.join(ch);
    });
    return str;
}
flg_apm.parseValSpl=function(obj,str,cutstr){
    s=obj.attr('data-'+cutstr);
    if(s==undefined){
        s="";
    }
    sa=str.split('[['+cutstr+']]');
    console.log(cutstr+" - "+s);
    str=sa.join(s);
    return str;
}
flg_apm.parseValSplArr=function(obj,str,arr){
    var str=str;
    var obj=obj;
    $.each(arr,function(i,o){
        str= flg_apm.parseValSpl(obj,str,o);

    });
    return str;
}

flg_apm.parseValueDefaultsStr=function(obj){
    field_type=obj.attr('data-field_type');
    var str=String(my_extensions_views[field_type].tpl);
    info=obj.attr('data-info');
    sa=str.split('[[info]]');
    str=sa.join(info);

    str=flg_apm.parseValSplArr(obj,str,['field_type','field','value','valuename','meta_marker','fwidthCls','category','postid','label']);

    return str;
}
/////END HELPERS




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
/* JS EXTENSION
 * setAddRelated.js
 */


jQuery(document).ready(function(){
    flg_apm.setAddRelated.init();
    flg_apm.setAddRelated.initClicks();
    f=$('#do_sending_test');
//$(f).val('');
});


flg_apm.setAddRelated=new flg_apm.setField('setAddRelated','.c_setAddRelated');


flg_apm.setAddRelated.during_create=function(fi,obj){

    s=$(obj).parents('.controls').find('.c_setAddRelated');
    var imgpath=$(s).attr("data-imgpath");
    var child_second_parent=$(s).attr("data-child_second_parent");
    post_title=$(s).attr("data-post_title");
    current_post_type=$(s).attr("data-current_post_type");
    post_id=$(s).attr("data-post_id");
    var icons=$(s).attr("data-icons");
    icons=icons.split(',');
    var names=$(s).attr("data-names");
    names=names.split(',');
    var posttypes=$(s).attr("data-posttypes");
    posttypes=posttypes.split(',');
    var strli=my_extensions_views['setAddRelatedli'].tpl;
    var strlis='';
    $.each(icons,function(i,o){
        strlirep=strli;
        strlirep=strlirep.replace(/{{name}}/g,names[i]);
        strlirep=strlirep.replace(/{{iconsrc}}/g,imgpath+'/'+icons[i]);
        strlirep=strlirep.replace(/{{posttype}}/g,posttypes[i]);

        var href = "post-new.php?";
        if(child_second_parent!==''){
            second_parent_post_type=$(s).attr("data-second_parent_post_type");
            second_parent_id=$(s).attr("data-second_parent_id");
            second_parent_post_type=$(s).attr("data-second_parent_post_type");
            href+="post_type=" + posttypes[i]+ "&parent_id=" +post_id + "&second_parent_id=" +second_parent_id+ "&second_parent_post_type=" +second_parent_post_type+ "&parent_title=" +post_title+ "&parent_post_type=" +current_post_type+ "&apm_do=set_select";

        }else{
            href+="post_type=" + posttypes[i]+  "&parent_id=" +post_id + "&parent_title="+post_title+ "&parent_post_type=" +current_post_type+  "&apm_do=set_select";

        }
        strlirep=strlirep.replace(/{{href}}/g,href);
        strlis+=strlirep;
    });
    fi.str=fi.str.replace(/{{lis}}/g,strlis);
    if(my_extensions_views['setAddRelatedPro']==undefined){
        // alert('NOGO pro quick add also');
        //QuickAddPro
        fi.str=fi.str.replace(/{{QuickAddPro}}/g,'');
    }else{
        fi.str=fi.str.replace(/{{QuickAddPro}}/g,my_extensions_views['setAddRelatedPro'].tpl);

        var strli=my_extensions_views['setAddRelatedliPro'].tpl;
        var strlis='';
        $.each(icons,function(i,o){
            strlirep=strli;
            strlirep=strlirep.replace(/{{name}}/g,names[i]);
            strlirep=strlirep.replace(/{{iconsrc}}/g,imgpath+'/'+icons[i]);
            strlirep=strlirep.replace(/{{posttype}}/g,posttypes[i]);
            strlis+=strlirep;
        });
        fi.str=fi.str.replace(/{{lispro}}/g,strlis);
    // alert('go pro quick add also');
    };
    return fi;
}
flg_apm.setAddRelated.postcreate=function(fi,obj){

    return fi;
}


flg_apm.setAddRelated.initClicks=function(){


    }

/* JS EXTENSION
 * setDevTpl.js
 */



jQuery(document).ready(function(){
    flg_apm.setDevTpl.init();
    flg_apm.setDevTpl.initClicks();
    f=$('#do_sending_test');
//$(f).val('');
});


flg_apm.setDevTpl=new flg_apm.setField('setDevTpl','.c_setDevTpl');


flg_apm.setDevTpl.during_create=function(fi,obj){

    return fi;
}
flg_apm.setDevTpl.postcreate=function(fi,obj){
}


flg_apm.setDevTpl.initClicks=function(){


    }

/* JS EXTENSION
 * setForcePrivacy.js
 */


jQuery(document).ready(function(){
    flg_apm.setForcePrivacy.init();
    flg_apm.setForcePrivacy.initClicks();
    f=$('#do_sending_test');
//$(f).val('');
});


flg_apm.setForcePrivacy=new flg_apm.setField('setForcePrivacy','.c_setForcePrivacy');


flg_apm.setForcePrivacy.during_create=function(fi,obj){

    return fi;
}
flg_apm.setForcePrivacy.postcreate=function(fi,obj){
    p=$('.c_setForcePrivacy').parents('.span2');
   // $(p).css('display','none');
    pri=$('#set_privacy_select').parents('.row-fluid');
    prisel=$('#set_privacy_select');
    $(prisel).val('1');
   $(pri).css('display','none');
}


flg_apm.setForcePrivacy.initClicks=function(){


    }
/*
 * setInBodyCategorySelect.js
 */

jQuery(document).ready(function(){
    flg_apm.setInBodyCategorySelect.init();
});


flg_apm.setInBodyCategorySelect=new flg_apm.setField('setInBodyCategorySelect','.c_InBodyCategorySelect');


flg_apm.setInBodyCategorySelect.during_create=function(fi,obj){

    s=$(obj).parents('.controls').find('.c_InBodyCategorySelect');
    lbl=$(s).attr("data-label");
    category=$(s).attr("data-category");
    field=$(s).attr("data-field");
    isadmin=Number(flg_apm.userProfile.isadmin);
    btns='';
    if(isadmin==1){
        btns=my_extensions_views['setInBodyCategorySelectBtns'].tpl;
        btns=btns.replace(/{{label}}/g,lbl);
        btns=btns.replace(/{{category}}/g,category);
        btns=btns.replace(/{{field}}/g,field);
    }else{
        btns=my_extensions_views['setInBodyCategorySelectinfo'].tpl;
    }
    str=fi.str;
    str=str.replace(/{{btns}}/g,btns);
    fi.str=str;

    return fi;
}
flg_apm.setInBodyCategorySelect.postcreate=function(fi,obj){

    flg_apm.c_apm_load_categ(fi.category,fi.field);
}

flg_apm.setInBodyCategorySelect.initClicks=function(){
    //alert();
    apm_categ_inbody_manage=$('.apm_categ_inbody_manage');
    $(apm_categ_inbody_manage).off('click').on('click', function(){
        category=$(this).attr('category');
        downloadWindow = window.open('edit-tags.php?taxonomy='+category);

    });

    apm_categ_inbody_add=$('.apm_categ_inbody_add');
    u=flg_apm.getAdminUrl

    $(apm_categ_inbody_add).off('click').on('click', function(){
        category=$(this).attr('category');
        field=$(this).attr('field');
        s=$(this).parents('.controls').find('select');
        if($(s).attr('disabled')!==undefined){
            // alert('Sorry you need to wait the data to load.');
            flg_apm.setAlertPanel.addAlert('Please wait','Sorry you need to wait the data to load....','error',3000);
            return;
        }
        var gloWin= flg_apm.c_create_globalModalWin();
        lbl=$(s).parent().parent().attr("data-label");
        strcon=my_extensions_views['setInBodyCategoryWinAddForm'].tpl;

        strconarr=strcon.split('[[categname]]') ;
        strcon= strconarr.join(category);
        strconarr=strcon.split('[[apm_field]]') ;
        strcon= strconarr.join(field);
        strconarr=strcon.split('[[label]]') ;
        strcon= strconarr.join(lbl);
        flg_apm.c_init_globalModalWin(gloWin,{
            title:'Add New '+lbl,
            actionTitle:'Add',
            content:strcon,
            actionClass:'apm_save_body_categ'
        });

        $('select',gloWin).html($(s).html());
        gloWin.modal('show');//
        $('.apm_save_body_categ',gloWin).off('click').on('click',function(){
            flg_apm.c_init_saveAjaxCategForm(gloWin);
        });
        $('.apm_do_reset_categ',gloWin).off('click').on('click',function(){
            var category=$(this).attr('category');
            b=confirm('Are you sure? This will reset this category values to the intial values');
            if(b){
                $('.modal_global_alert',gloWin).html('<span style="color:green">Reseting....</span> ');
                $.ajax({
                    url: ajaxurl ,
                    type: "POST",
                    data: "subaction=reset_check_fill_category&action=apm_extensions&category="+category,
                    error: function(data){
                        $('.modal_global_alert',gloWin).html('<span style="color:red">Sorry, an error occured.</span> ');
                    },
                    success: function(data){
                        $('.modal_global_alert',gloWin).html('<span >The category has been reset to initial values....</span> ');

                        apm_fieldsource=$('input.apm_fieldsource',gloWin);
                        if(apm_fieldsource!==undefined && apm_fieldsource!=="" && apm_fieldsource!==null){
                            flg_apm.c_apm_load_categ(category,apm_fieldsource);
                        }
                        gloWin.modal('hide');
                    }
                });
            }
        });
    });
}



flg_apm.c_apm_set_categ=function(categ_data){
    sel=$('#'+categ_data.field+'_select');
    selected_value=$(sel).attr('selected_value');
    var str="<option value=''>--None--</option>";
    //alert(categ_data.field+'/  +'+categ_data.data.length);
    $.each(categ_data.data,function(k,cat){
        selec="";
        if(selected_value==cat.id){
            selec=" selected='selected' "
        }
        lev='';
        for(i=0;i<cat.depth;i++){
            lev+='--';
        }
        str+="<option value='"+cat.id+"' "+selec+" cat-txt='"+cat.name+"'>"+lev+cat.name+"</option>";// ("+cat.count+")
    });
    $(sel).html(str)
    $(sel).removeAttr('disabled');
}

flg_apm.c_apm_load_categ=function(categ,field){
    apm_load_categ=$('.apm_load_categ');
    var categ=categ;
    var field=field;
    $.each(apm_load_categ, function(i,obj){
        var obj=$(obj);
        category=obj.attr('category');
        if(category==categ){
            flg_apm.getCategData('category',category,'flg_apm.c_apm_set_categ();',field)


        }
    });
}
flg_apm.getCategData=function(type,name,callback,field){
    var callback=callback;
    var field=field;
    $.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "subaction=getCategoriesList&action=apm_extensions&name="+name+"&field="+field+"&type="+type,
        //data: "name="+name+"&field="+field+"&type="+type+"&action=apm_extensions_data",
        //context: document.body,
        success: function(data){
            c_extension_data=$.JSON.decode(data);
            flg_apm.c_apm_set_categ(c_extension_data);
        },
        error: function(data){
            flg_apm.setAlertPanel.addAlert('Error while loading','Sorry,the loading of the categories data was interrupted or wrong.<rb>If you just try to load a new page then go on. If you stay and this page and the category loadng has been rejected then please try to reload the page','warning',5000);
        // alert('An error happend in the loading of the data, sorry.. please reload the page...')
        }
    });
}
//


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
/*
 * setTeamField.js
 */


jQuery(document).ready(function(){
    flg_apm.setTeamField.init();
});



flg_apm.setTeamField=new flg_apm.setField('setTeamField','.c_setTeamField');



flg_apm.setTeamField.during_create=function(fi,obj){
    fi.str=flg_apm.parSplStr([['team',fi.val_ar[0]]],fi.str);
    args=[
        {s:'me_check',p:1,precheck:true},
        {s:'assi_check',p:2,precheck:true},
        {s:'casca_check',p:3},
        {s:'force_check',p:4},
        {s:'notifall_check',p:5,precheck:true},
        {s:'notifallcomment_check',p:6,precheck:true},
        {s:'notifme_check',p:7,precheck:true},
        {s:'notifassignee_check',p:8,precheck:true},
    ]
    fi.str=flg_apm.parseValueChkStr(fi.value,args,fi.str);
    return fi;
}

flg_apm.setTeamField.postcreate=function(fi,obj){
        if(fi.val_ar[3]=='on'){
            team_detail=$(obj).find('.team_detail');
            $(team_detail).hide();
        }
        if(fi.val_ar[0]!==""){
            user_lis=$(obj).find('.apm_team_user_list');
            usar=fi.val_ar[0].split(',');
            valuename_ar=fi.valuename.split(',');
            for(i=0;i<usar.length;i++){
                if(usar[i]!==""){
                    flg_apm.add_us_badg(user_lis,usar[i],valuename_ar[i]);
                }
            }
            co_te_us=$(obj).find('.count_team_users');
            $(co_te_us).html(usar.length);
            $(user_lis).show();
        } else {
            if(document.location.href.indexOf('post-new.php')>-1){
                 apm_team_me=$('.apm_team_me');
                    flg_apm.cnt_tm_us($(apm_team_me).parent().parent().parent());
            }
        }
        flg_apm.c_autocompleteInit();
}

flg_apm.setTeamField.initClicks=function(){

    apm_team_me=$('.apm_team_me');
    $(apm_team_me).off('click').on('click',function(){
        flg_apm.cnt_tm_us($(this).parent().parent().parent());
    });

    apm_team_assignee=$('.apm_team_assignee');
    $(apm_team_assignee).off('click').on('click',function(){
        flg_apm.cnt_tm_us($(this).parent().parent());
    });

    apm_team_cascade_par=$('.apm_team_cascade_par');
    $(apm_team_cascade_par).off('click').on('click',function(){
        parpar=$(this).parent().parent();
        if($(this).attr('checked')=='checked'){
            $('.team_detail',parpar).hide();
        }else {
            $('.team_detail',parpar).show();
        }
    });

    apm_del_user_team=$('.apm_del_user_team');
    $(apm_del_user_team).off('click').on('click',function(){
        parpar=$(this).parent().parent().parent();
        id=$(this).attr('sel_id');
        $(this).parent().remove();
        user_lis=$(parpar).find('.apm_team_user_list');

        var re=flg_apm.get_chec_vals(user_lis);
        if(Number(id)==Number(re.me)){
            $('.apm_team_me',parpar).removeAttr('checked');
        }
        if(Number(id)==Number(re.assign)){
            $('.apm_team_assignee',parpar).removeAttr('checked');
        }
        flg_apm.cnt_tm_us(parpar);
    });

    apm_add_user_team=$('.apm_add_user_team');
    $(apm_add_user_team).off('click').on('click',function(){
        t=$(this);
        p=t.parent();
        inp=$('input',p);
        inp=$(inp);
        var sel_id=inp.attr('sel_id');
        if(sel_id!==undefined && sel_id!=="0"){
            sel_name=inp.attr('sel_name');
            inp.attr('sel_name','0');
            inp.attr('sel_id','0');
            inp.val('');
            sel_name=sel_name.replace("\\'","'");
            sel_name=sel_name.replace('\\"','"');
            user_lis=$(p).parent().find('.apm_team_user_list');
            user_lis_it=$(".apm_del_user_team",user_lis);
            var exist=false;
            var id_ar=[];
            $.each($(user_lis_it), function(i,obj){
                o_selid=$(this).attr('sel_id');
                id_ar.push(o_selid);
                if(o_selid==sel_id){
                    exist=true
                }
            });
            if(exist==false){
                id_ar.push(sel_id);

                flg_apm.add_us_badg(user_lis,sel_id,sel_name);
                flg_apm.add_checks($(p).parent());
                flg_apm.cnt_tm_us($(p).parent());
            }
            $(user_lis).show();
            $('.apm_team_inp',$(p).parent()).val(id_ar.join(','));
            flg_apm.c_createInitClicks();

        }
    })
}







///HELPERS

flg_apm.set_team_inp=function(user_lis){
    var id_ar=[];
    user_lis_it=$(".apm_del_user_team",user_lis);
    $.each($(user_lis_it), function(i,obj){
        o_selid=$(this).attr('sel_id');
        id_ar.push(o_selid);
    });
    var mother=$(user_lis).parents('.c_setTeamField');
    inp=$('.apm_team_inp',mother);
    $(inp).val(id_ar.join(','));

}
flg_apm.chec_add_us_badg=function(user_lis,id,name){
    id_ar=flg_apm.get_user_li(user_lis);
    var ok=true;
    $.each($(id_ar), function(i,obj){
        if(Number(obj)==Number(id)){
            ok=false;
        }
    });
    if(ok){
        flg_apm.add_us_badg(user_lis,id,name);
    }
    id_ar=flg_apm.get_user_li(user_lis);
    return id_ar.length;
}

flg_apm.get_user_li=function(user_lis){
    user_lis_it=$(".apm_del_user_team",user_lis);
    var id_ar=[];
    $.each($(user_lis_it), function(i,obj){
        o_selid=Number($(obj).attr('sel_id'));
        id_ar.push(o_selid);
    });
    return id_ar;
}

flg_apm.add_checks=function(par){
    user_lis=$(par).find('.apm_team_user_list');
    id_ar=flg_apm.get_user_li(user_lis);
    var re=flg_apm.get_chec_vals(user_lis);
    $.each(id_ar, function(i,obj){
        if(Number(obj)==Number(re.me)){
            $('.apm_team_me',par).attr('checked','checked');
        }
        if(Number(obj)==Number(re.assign)){
            $('.apm_team_assignee',par).attr('checked','checked');
        }
    });
}
flg_apm.get_chec_vals=function(user_lis){
    re={};
    re.mother=$(user_lis).parents('.c_setTeamField');
    re.assign_gr=re.mother.attr('data-assign');
    re.assign_ar=re.assign_gr.split(',');
    re.assign=Number(re.assign_ar[0]);
    re.me_gr=re.mother.attr('data-me');
    re.me_ar=re.me_gr.split(',');
    re.me=Number(re.me_ar[0]);
    return re;
}
flg_apm.cnt_tm_us=function(par){
    user_lis=$(par).find('.apm_team_user_list');
    id_ar=flg_apm.get_user_li(user_lis);
    c=$('.count_team_users',par);
    re=flg_apm.get_chec_vals(user_lis);
    cnt=id_ar.length;
    if($('.apm_team_me',par).attr('checked')=='checked'){
        coun=flg_apm.chec_add_us_badg(user_lis,re.me,re.me_ar[1]);
        cnt=coun;
    } else {
        coun=flg_apm.rem_us_badg(user_lis,re.me,re.me_ar[1]);
        cnt=coun;
    }
    if($('.apm_team_assignee',par).attr('checked')=='checked'){
        if(re.assign!==0){
            coun=flg_apm.chec_add_us_badg(user_lis,re.assign,re.assign_ar[1]);
            cnt=coun;
        } else {
            ass_f=$('#autocomplete_data_assign_to');
            if($(ass_f).val()!==''){
                ass_fnam=$('#autocomplete_assign_to');
                coun=flg_apm.chec_add_us_badg(user_lis,$(ass_f).val(),$(ass_fnam).val());
                mother=$(user_lis).parents('.c_setTeamField');
                $(mother).attr('data-assign',$(ass_f).val()+','+$(ass_fnam).val());

                cnt=coun;
            } else {
                //$('.apm_team_assignee',par).removeAttr('checked');
                //alert('Sorry, nobody is assigned yet');
            }
        }
    } else {
        coun=flg_apm.rem_us_badg(user_lis,re.assign,re.assign_ar[1]);
        cnt=coun;
    }
     flg_apm.set_team_inp(user_lis);
    $(c).html(cnt);
}


flg_apm.rem_us_badg=function(user_lis,id,name){
    id_ar=flg_apm.get_user_li(user_lis);
    var mother=$(user_lis).parents('.c_setTeamField');
    $.each($(id_ar), function(i,obj){
        if(Number(obj)==Number(id)){
            l=$(mother).find('.label_us_'+id);
            $(l).remove();
        }
    });
    id_ar=flg_apm.get_user_li(user_lis);
    return id_ar.length;
}

flg_apm.add_us_badg=function(user_lis,id,name){

    $(user_lis).append('<span class="label label-info label_us_'+id+'">'+name+' <a sel_id="'+id+'" class="hasTooltip apm_del_user_team" rel="tooltip" title="Remove"><i class="icon-remove icon-white"></i></a></span>');
    $(user_lis).show();

    flg_apm.setTeamField.initClicks();
}
////END HELPERS


/* JS EXTENSION
 * setUploadAndGrid.js
 */


jQuery(document).ready(function(){
    flg_apm.setUploadAndGrid.init();
});


flg_apm.setUploadAndGrid=new flg_apm.setField('setUploadAndGrid','.c_setUploadAndGrid');
flg_apm.setUploadAndGrid.during_create=function(fi,obj){

    return fi;
}

flg_apm.setUploadAndGrid.postcreate=function(fi,obj){

};
flg_apm.setUploadAndGrid.checkBtnUpladall=function(tds){
}

flg_apm.setUploadAndGrid.initClicks=function(){

}

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
/* JS EXTENSION
 * setAlertPanel.js
 */


jQuery(document).ready(function(){
    flg_apm.setAlertPanel.initClicks();
});


flg_apm.setAlertPanel=new flg_apm.setUIObject('setAlertPanel','');



flg_apm.setAlertPanel.alerts=[];
flg_apm.setAlertPanel.init=function(){


    }

var posAlertY;
var posAlertYBase=30;
var posAlertNb=0;
var oriAlertHideDelay=7000;
var oriAlertIsAnim=false;
var oriAlertTimeOut;
flg_apm.setAlertPanel.addDisplay=function(){
    posAlertY=posAlertYBase;
    $.each(flg_apm.setAlertPanel.alerts,function(i,al){
        if(al.status=='new'){
            posAlertNb++;
            flg_apm.setAlertPanel.alerts[i].nb=posAlertNb;
            flg_apm.setAlertPanel.alerts[i].timest=new Date().getTime();
            // console.log('add posAlertNb ' +posAlertNb);
            str=my_extensions_views['setAlertPanel'].tpl;
            str=str.replace(/{{title}}/g,al.title);
            str=str.replace(/{{type}}/g,al.type);
            str=str.replace(/{{txt}}/g,al.txt);
            str=str.replace(/{{nb}}/g,posAlertNb);
            $('body').append(str);
            flg_apm.setAlertPanel.alerts[i].status='shown';
            pan=$('#AlertPanel'+posAlertNb);
            $(pan).css('opacity','0');
            $(pan).css('top',(posAlertY-40)+'px');
            oriAlertIsAnim=true;
            $(pan).animate({
                top:posAlertY+'px',
                opacity:'1'
            },500, function() {
                oriAlertIsAnim=false;
            });

        }else{
            pan=$('#AlertPanel'+flg_apm.setAlertPanel.alerts[i].nb);
        }
        flg_apm.setAlertPanel.alerts[i].height=$(pan).height()+10;
        posAlertY+=$(pan).height()+10;
    })
    flg_apm.setAlertPanel.initClicks();
    if(flg_apm.setAlertPanel.alerts.length==1){
        flg_apm.setAlertPanel.loopCheckRemove();
    }
}

flg_apm.setAlertPanel.loopCheckRemove=function(){
    oriAlertTimeOut=setTimeout(function(){
        if(flg_apm.setAlertPanel.alerts.length>0){
            //console.log(' loopCheckRemove ' +flg_apm.setAlertPanel.alerts.length);
            var timest=new Date().getTime();
            $.each(flg_apm.setAlertPanel.alerts,function(i,al){
                if(timest-al.timest>al.hideDelay){
                    // console.log(' need clear ' +al.nb);
                    var p=$('#AlertPanel'+al.nb);
                    flg_apm.setAlertPanel.removeAlert(p);
                }
            });
            flg_apm.setAlertPanel.loopCheckRemove();
        };
    },1000);

}
flg_apm.setAlertPanel.addAlert=function(title,txt,type,hideDelay){

    }
flg_apm.setAlertPanel.addAlertBase=function(title,txt,type,hideDelay){
    if(hideDelay==undefined || hideDelay==0){
        hideDelay=oriAlertHideDelay;
    }
    flg_apm.setAlertPanel.alerts.push({
        title:title,
        txt:txt,
        type:type,
        status:'new',
        hideDelay:hideDelay
    });
    flg_apm.setAlertPanel.addDisplay();
}
flg_apm.setAlertPanel.addAlert=function(title,txt,type,hideDelay){
    if(hideDelay==undefined || hideDelay==0){
        hideDelay=oriAlertHideDelay;
    }
    posAlertYBase = $(window).scrollTop() + 30
    flg_apm.setAlertPanel.addAlertBase(title,txt,type,hideDelay);
}

flg_apm.setAlertPanel.addAlert_posAlertYBase=function(title,txt,type,hideDelay,new_posAlertYBase){
    if(hideDelay==undefined || hideDelay==0){
        hideDelay=oriAlertHideDelay;
    }
    posAlertYBase = new_posAlertYBase
    flg_apm.setAlertPanel.addAlertBase(title,txt,type,hideDelay);
}

flg_apm.setAlertPanel.removeAlert=function(p){
    var locnb=Number($(p).attr('data-nb'));
    $(p).fadeOut(200,function(){
        $(p).remove();
    });
    var arr=[];
    $.each(flg_apm.setAlertPanel.alerts,function(i,al){
        if(al.nb!==locnb){
            arr.push(al);
        }
    });
    flg_apm.setAlertPanel.alerts=arr;
    //console.log('alerts.length ' +flg_apm.setAlertPanel.alerts.length);
    if(flg_apm.setAlertPanel.alerts.length>0){
        posAlertY=posAlertYBase;
        $.each(flg_apm.setAlertPanel.alerts,function(i,al){
            //console.log('al.nb ' +al.nb);
            pan=$('#AlertPanel'+al.nb);
            $(pan).animate({
                top:posAlertY+'px'
            },500, function() {
                });
            posAlertY+=flg_apm.setAlertPanel.alerts[i].height;
        });
    }
}
flg_apm.setAlertPanel.initClicks=function(){
    $('.doCloseAlert').off('click').on('click',function(){
        if(oriAlertIsAnim==false){
            var p=$(this).parents('.AlertPanel');
            flg_apm.setAlertPanel.removeAlert(p);
        }
    });
}
/* JS EXTENSION
 * setModuleGrid.js
 */


jQuery(document).ready(function(){
    b=flg_apm.setModuleGrid.ifScope('apmdatagrid_new_container');
    if(b===false){
        return false;
    }
    flg_apm.setModuleGrid.setFullWidthHeight('window_topobj','wpbody');
    flg_apm.setModuleGrid.initWidth();
    flg_apm.setModuleGridBody.setHeight();
    flg_apm.setModuleGrid.initClicks();
//$(f).val('');
});


flg_apm.setModuleGrid=new flg_apm.setUIObject('setModuleGrid','.apmdatagrid_new_container');


flg_apm.appendAlert=function(args){
    obj=$(args.obj);
    obj.html('<div class="alert alert-'+args.type+'"><button type="button" class="close" data-dismiss="alert">×</button>'+args.text+'</div>');
}

flg_apm.killAlert=function(args){
    obj=$(args.obj);
    obj.html('');
}

flg_apm.setModuleGrid.loadData=function(){
    flg_apm.setDataGridStatus('Loading Data','In Connection...');
    flg_apm.setModuleGridBody.doLoad();
}

flg_apm.setModuleGrid.initWidth=function(){
    //#apmdatagrid_new_gridbody
    w=$('#apmdatagrid_new_gridbody').width();
    lpw=$('#apmdatagrid_new_leftpan').width();
    flg_apm.setModuleGridBody.newwidth=(w-lpw+20);
    $('#apmdatagrid_new_gridbody').css('width',(w-lpw+17)+'px');
    $('#apmdatagrid_new_header').css('width',(w-lpw+15)+'px');
    $('#apmdatagrid_new_gridfooter').css('width',(w-lpw+15)+'px');
}

flg_apm.setModuleGrid.initClicks=function(){


    }

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

/* JS EXTENSION
 * setModuleGridLeftPan.js
 */


jQuery(document).ready(function(){
    flg_apm.setModuleGridLeftPan.obj=$('#apmdatagrid_new_leftpan');
    flg_apm.setModuleGridLeftPan.setMainTpl();
    flg_apm.setModuleGridLeftPan.initClicks();
//$(f).val('');
});


flg_apm.setModuleGridLeftPan=new flg_apm.setUIObject('setModuleGridLeftPan','.ext_new_leftpan');



flg_apm.setModuleGridLeftPan.doTplPreTreatment=function(str){//Based to be overwritten in  each field declaration
    //{{siteurl}}
    if(my_extensions_views['setModuleGridLeftPanPro']==undefined){
        str=str.replace(/{{ProFilters}}/g,'');
        str=str.replace(/{{FreeAds}}/g,my_extensions_views['setModuleGridLeftPanAds'].tpl);
    }else{
        str=str.replace(/{{ProFilters}}/g,my_extensions_views['setModuleGridLeftPanPro'].tpl);
        str=str.replace(/{{FreeAds}}/g,'');
    }
    lets='a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,0-9';
    var strlet=my_extensions_views['setModGridLfLetBtn'].tpl;
    var strfiltlet='';
    lets=lets.split(',');
    $.each(lets,function(i,o){
        s=strlet.replace(/{{letter}}/g,o.toUpperCase());
        s=s.replace(/{{letterbase}}/g,o);
        strfiltlet+=s;
    });
    //setModGridLfLetBtn
    str=str.replace(/{{filterletters}}/g,strfiltlet);

    str=this.doTplPrePreTreatment(str);
    return str;
}

/*flg_apm.setModuleGridLeftPan.init=function(){


    }*/
flg_apm.setModuleGridLeftPan.filters={
    letter:false,
    post_status:false,
    freesearch:false
};
flg_apm.setModuleGridLeftPan.getStatusStr=function(val){
    switch(val){
        case 'pending':
            val='Pending';
            break;
        case 'publish':
            val='Published';
            break;
        case 'draft':
            val='Draft';
            break;
        case 'trash':
            val='Trash';
            break;
    }
    return val;
}
flg_apm.setModuleGridLeftPan.doFilter=function(val,type){
    //leftpan_filtered
    // console.log(val+'-'+type);

    flg_apm.setModuleGridLeftPan.filters[type]=val;
    var str='';
    if(flg_apm.setModuleGridLeftPan.filters.letter!==false){
        str+='<li><i class="icon-font"></i> A-Z: <em>'+flg_apm.setModuleGridLeftPan.filters.letter.toUpperCase()+'</em></li>';
    }
    if(flg_apm.setModuleGridLeftPan.filters.post_status!==false){
        str+='<li><i class="icon-ok-circle"></i> STATUS: <em>'+flg_apm.setModuleGridLeftPan.getStatusStr(flg_apm.setModuleGridLeftPan.filters.post_status)+'</em></li>';
    }
    if(flg_apm.setModuleGridLeftPan.filters.freesearch!==false){
        str+='<li>FREE SEARCH on title: <em>'+flg_apm.setModuleGridLeftPan.filters.freesearch+'</em></li>';
    }//fievals
    if(flg_apm.setModuleGridLeftPan.filters.fievals!==undefined){
        if(flg_apm.setModuleGridLeftPan.filters.fievals!==false && flg_apm.setModuleGridLeftPan.filters.fievals.length>0 ){
            str+='<li>Adv. Search: <em>';
            $.each(flg_apm.setModuleGridLeftPan.filters.fievals, function(i,f){
                if(i>0){
                    str+=' / ';
                }
                str+=f.label+': '+f.vstr;
            });
            str+='</em></li>';
        }
    }
    if(str==''){
        str+='<li><em>NONE</em></li>';
        $('.removfilters').addClass('hiddenbtn');
    }else{
        $('.removfilters').removeClass('hiddenbtn');
    // str+='<li class="btn btn-mini ori_doremovefilters"><i class="icon-remove"></i> Remove all filters</li>';
    }
    $('#leftpan_filtered ul').html(str);
    flg_apm.setModuleGridLeftPan.initClicks();
    flg_apm.setModuleGridBody.loadingArgs.filters=flg_apm.setModuleGridLeftPan.filters;
    flg_apm.setModuleGridBody.doLoad();
    flg_apm.setModuleGridLeftPan.setAdvHei();
}
flg_apm.setModuleGridLeftPan.doSearch=function(obj){

    v=$('.apm-grid-leftsearch .search-query').val();
    if(v==''){
        b=$(obj).parents('.apm-grid-leftsearch').find('.alert-container');
        flg_apm.appendAlert({
            obj:b,
            type:'error',
            text:' Please input a search string.'
        });
        $('.apm-grid-leftsearch .search-query').focus();
    }else{
        b=$(obj).parents('.apm-grid-leftsearch').find('.alert-container');
        flg_apm.killAlert({
            obj:b
        })
        a=$(obj);
        b=$('.apm_cancel_gridfreesearch');
        b=$(b);
        a.parent().addClass('hidden');
        b.parent().removeClass('hidden');
        flg_apm.setModuleGridLeftPan.doFilter(v,'freesearch');

        flg_apm.setAlertPanel.addAlert('Filters','Filtering by Free Search on title '+v,'default',2000);
    }

}
flg_apm.setModuleGridLeftPan.cancelFreeSearch=function(){
    ob=$('.apm_cancel_gridfreesearch');
    a=$('.apm_do_gridfreesearch');
    a=$(a);
    b=$(ob);
    b.parent().addClass('hidden');
    a.parent().removeClass('hidden');
    $('.search-query').val('');
    flg_apm.setModuleGridLeftPan.setAdvHei();
}
flg_apm.setModuleGridLeftPan.setSeaSel=function(args){
    sel=$('#idsearch_'+args.field);
    $(sel).attr('data-loaded','loaded');
    $(sel).removeClass('disabled');
    $(sel).find('option').remove();
    $(sel).append('<option value="0">-None-</option>');
    $.each(args.data,function(i,row){
        $(sel).append('<option value="'+row.id+'">'+row.name+'</option>');
    });
}
flg_apm.setModuleGridLeftPan.setAdvSearchItems=function(fields){
    var listr='';
    $.each(fields,function(fk,fi){
        switch(fi.field_type){
            case 'post_date':
                strfi=my_extensions_views['setModSeaFi_date'].tpl;
                fi.label='Date';
                break;
            case 'date':
                strfi=my_extensions_views['setModSeaFi_date'].tpl;
                break;
            case 'checkbox':
                strfi=my_extensions_views['setModSeaFi_chk'].tpl;
                break;
            case 'datefield':
                strfi=my_extensions_views['setModSeaFi_date'].tpl;
                break;
            case 'setInBodyCategorySelect':
                strfi=my_extensions_views['setModSeaFi_catsel'].tpl;
                break;
            case 'assignee':
                strfi=my_extensions_views['setModSeaFi_assignee'].tpl;
                break;
            case 'autocomplete':
                strfi=my_extensions_views['setModSeaFi_autocom'].tpl;
                break;
            case 'select':
                boltest=false;
                if(fi.field_config!==undefined){
                    if(fi.field_config.use_values!==undefined){
                        if(fi.field_config.use_values==true){
                            boltest=true;
                        }
                    }
                }
                if(boltest){
                    strfi=my_extensions_views['setModSeaFi_selectvalues'].tpl;
                }else{
                    strfi=my_extensions_views['setModSeaFi_select'].tpl;
                }
                break;
            default:
                strfi=my_extensions_views['setModSeaFi_default'].tpl;
                break;
        }
        if(fi.label==undefined){
            fi.label='';
        }
        strfi=strfi.replace(/{{name}}/g,'search_'+fk);
        strfi=strfi.replace(/{{fname}}/g,fk);
        strfi=strfi.replace(/{{id}}/g,'idsearch_'+fk);
        fi.label=fi.label.replace(/'/g, "\\'");
        fi.label=fi.label.replace(/"'"/g, '\\"');
        strfi=strfi.replace(/{{label}}/g,fi.label);
        if(fi.field_config!==undefined){
            strfi=strfi.replace(/{{post_type}}/g,fi.field_config.post_type);
            strfi=strfi.replace(/{{category}}/g,fi.field_config.category);
        }
        if(fi.options!==undefined){
            var stroptions='';
            $.each(fi.options,function(i,o){
                stroptions+= '<option value="'+o+'">'+o+'</option>';
            })
            strfi=strfi.replace(/{{optionslist}}/g,stroptions);
        }
        if(fi.optionsvalues!==undefined){
            var stroptions='';
            $.each(fi.optionsvalues,function(i,o){
                stroptions+= '<option value="'+i+'">'+o+'</option>';
            })
            strfi=strfi.replace(/{{optionslist}}/g,stroptions);
        }
        //optionslist
        listr+='<li>'+strfi+'</li>';
    });

    var formstr= my_extensions_views['setModuleGridLeftPanadvfor'].tpl;
    formstr=formstr.replace(/{{list}}/g,listr);
    b=$('.adv_sear_inner');
    b=$(b);

    flg_apm.setModuleGridLeftPan.setAdvHei();
    b.html(formstr);
    flg_apm.setModuleGridLeftPan.initClicks();
    flg_apm.initGlobalClick();
}
flg_apm.setModuleGridLeftPan.getAdvSearchItems=function(fields){
    flg_apm.setAlertPanel.addAlert('Loading','Loading Advanced Search data, please wait...','',4000);
    $.ajax({
        url: ajaxurl ,
        type: "POST",
        data: "subaction=getSearchFields&action=apm_extensions&args="+$.JSON.encode({
            module:flg_apm.setModuleGrid.module_config.modulekey,
            fields:fields
        }),
        error: function(data){
            flg_apm.setDataGridStatus('Loading error','An error appeared while Loading...');
            flg_apm.setAlertPanel.addAlert('Loading Issue','An error appeared while Loading...','error',4000);
        },
        success: function(data){
            if(data!==''){
                var data_ar=$.JSON.decode(data);
                flg_apm.setModuleGridLeftPan.setAdvSearchItems(data_ar);
            }
        }
    });
}

flg_apm.setModuleGridLeftPan.setAdvHei=function(){

    c=$('.adv_sear_inner');
    c=$(c);
    hp=$('#apmdatagrid_new_leftpan').height();
    by=c.position().top;
    c.css('height',(hp-by-55)+'px');
}

flg_apm.setModuleGridLeftPan.initGlobalClicks=function(){

    $('.do_sea_sel').off('click').on('click',function(){
        if($(this).attr('data-loaded')=='false'){
            $(this).attr('data-loaded','loading');
            $(this).addClass('disabled');
            $(this).find('option').html('Loading...');
            flg_apm.setAlertPanel.addAlert('Loading','Loading Combo Select box data','',2000);
            $.ajax({
                url: ajaxurl ,
                type: "POST",
                data: "name="+$(this).attr('category')+"&type=category&field="+$(this).attr('name')+"&action=apm_extensions_data",
                error: function(data){
                    flg_apm.setDataGridStatus('Loading error','An error appeared while Loading...');
                    flg_apm.setAlertPanel.addAlert('Loading Issue','An error appeared while Loading...','error',4000);
                },
                success: function(data){
                    if(data!==''){
                        var data_ar=$.JSON.decode(data);
                        flg_apm.setAlertPanel.addAlert('Loaded','Combo Select box data loaded','ok',2000);
                        flg_apm.setModuleGridLeftPan.setSeaSel(data_ar);
                    }
                }
            });

        }
    });
}
flg_apm.setModuleGridLeftPan.initClicks=function(){
    //ori_doremovefilters set_datesearch
    flg_apm.setModuleGridLeftPan.initGlobalClicks();

    var picker =$(".set_datesearch").datepicker({
        format: flg_apm.config.dateFormat
    }).on("show", function(ev){
        datepicker=$('.datepicker');
        if($(this).position().top+$(datepicker).height()>$(window).height()-40){
            $(datepicker).css('top',($(window).height()-20-$(datepicker).height())+'px');
        }
        $(datepicker).css('left',(Number($(this).position().left)+200)+'px');
    }).on("changeDate", function(ev){
        theDate = new Date(ev.date);
        da=$(this).data("date");
        // da=ev.date.toString();
        t=$(this).parent().find('.date_target');
        $(t).val(da);
        $(t).data("date",da);
        $(this).datepicker("hide");
    });


    $('.do_advsear_search').off('click').on('click',function(){

        inps=$('.ori_advsearform').find('input[type=text], input[type=hidden], textarea, select');
        var b=false;
        var arrSea=[];
        $.each(inps,function(i,inp){
            v='';
            if($(inp).attr('data-loaded')!==undefined){
                if($(inp).attr('data-loaded')=='loaded'){
                    v=$(inp).val();
                }
            }else{
                v=$(inp).val();
            }
            if(v!==''){
                if($(inp).hasClass('is_displayval')==false){
                    b=true;
                    if(v!==0 && v!=='0'){
                        vstr='';
                        switch($(inp).attr('data-fieldtype')){
                            case 'date':
                                vstr=v;
                                break;
                            case 'datefield':
                                vstr=v;
                                break;
                            case 'checkbox':
                                if(v=='no'){
                                    vstr=0;
                                    v=0;
                                }else if(v=='yes'){
                                    vstr=1;
                                    v=1;
                                }else{
                                    vstr=null;
                                    v=null;
                                }
                                break;
                            case 'default':
                                vstr=v;
                                break;
                            case 'categsel':
                                vstr=$(inp).find('option:selected').text();
                                break;
                            case 'assignee':
                                inpdispl=$('.ori_advsearform input[name='+$(inp).attr('name')+'_displayvalue]');
                                vstr=$(inpdispl).val();
                                break;
                            case 'autocomplete':
                                inpdispl=$('#autocomplete_'+$(inp).attr('name'));
                                vstr=$(inpdispl).val();
                                break;
                        }
                        if(v!==null){
                            arrSea.push({
                                val:v,
                                vstr:vstr,
                                field:$(inp).attr('name'),
                                label:$(inp).attr('data-label')
                            });
                        }
                    }
                }
            }
        })
        flg_apm.setModuleGridLeftPan.doFilter(arrSea,'fievals');
    });

    $('.do_advsear_clear').off('click').on('click',function(){
        inps=$('.ori_advsearform').find('input[type=text], input[type=hidden], textarea, select');
        $.each(inps,function(i,inp){
            $(inp).val('');
        })

        flg_apm.setModuleGridLeftPan.doFilter(false,'fievals');
    /* flg_apm.setModuleGridLeftPan.filters.fievals=false;
        flg_apm.setModuleGridBody.loadingArgs.filters=flg_apm.setModuleGridLeftPan.filters;
        flg_apm.setModuleGridBody.doLoad();*/
    });
    $('.ori_doremovefilters').off('click').on('click',function(){
        flg_apm.setModuleGridLeftPan.filters={
            letter:false,
            post_status:false,
            freesearch:false
        };
        flg_apm.setModuleGridLeftPan.doFilter(false,'freesearch');
        $('.filtstatus li').removeClass('active');
        $('.dofiltletter').removeClass('active');
        flg_apm.setModuleGridLeftPan.cancelFreeSearch();
        flg_apm.setAlertPanel.addAlert('Filters','Removing all filters','default',2000);
    });

    $('.filtstatus li').off('click').on('click',function(){
        if($(this).hasClass('active')){
            $('.filtstatus li').removeClass('active');
            flg_apm.setModuleGridLeftPan.doFilter(false,'post_status');
        }else{
            $('.filtstatus li').removeClass('active');
            $(this).addClass('active');
            v=$(this).attr('data-stat');
            flg_apm.setModuleGridLeftPan.doFilter(v,'post_status');
            flg_apm.setAlertPanel.addAlert('Filters','Filtering by Status: '+flg_apm.setModuleGridLeftPan.getStatusStr(v),'default',2000);
        }
    });
    $('.dofiltletter').off('click').on('click',function(){
        if($(this).hasClass('active')){
            $('.dofiltletter').removeClass('active');
            flg_apm.setModuleGridLeftPan.doFilter(false,'letter');
        }else{
            $('.dofiltletter').removeClass('active');
            $(this).addClass('active');
            v=$(this).attr('data-va');
            flg_apm.setModuleGridLeftPan.doFilter(v,'letter');
            flg_apm.setAlertPanel.addAlert('Filters','Filtering by A-Z: '+v.toUpperCase(),'default',2000);
        }
    });
    //SEARCH FORM
    $('.apm-grid-leftsearch .search-query').off('keydown').on('keydown',function(event){
        b=$(this).parents('.apm-grid-leftsearch').find('.alert-container');
        flg_apm.killAlert({
            obj:b
        });
        if(event.which==13){
            event.preventDefault();
            console.log('keydown');
            flg_apm.setModuleGridLeftPan.doSearch($('.apm_do_gridfreesearch'));
            return false;
        }
    });
    $('.apm_do_gridfreesearch').off('click').on('click',function(){
        flg_apm.setModuleGridLeftPan.doSearch(this);

    });
    $('.apm_cancel_gridfreesearch').off('click').on('click',function(){
        flg_apm.setModuleGridLeftPan.cancelFreeSearch();
        $('.apm-grid-leftsearch .search-query').focus();
        flg_apm.setModuleGridLeftPan.doFilter(false,'freesearch');
    });

    $('.apm_openadvancedsearch').off('click').on('click',function(){
        p=$('#leftpan_sub_inner');
        p=$(p);
        a=$('.apm_openadvancedsearch');
        a=$(a);
        c=$('.adv_sear_inner');
        c=$(c);
        if(a.attr('data-set')==undefined){
            a.attr('data-set',true);
            str=my_extensions_views['setModuleGridLeftPanLoadAdv'].tpl.split('*//*');
            c.html(str[0]);
            filters=flg_apm.setModuleGrid.module_datagrid.filters.split(',');
            flg_apm.setModuleGridLeftPan.getAdvSearchItems(filters);

        }
        flg_apm.setModuleGridLeftPan.setAdvHei();
        var b=$('.apm_closeadvancedsearch');
        b=$(b);
        p.animate({
            marginLeft:'-197px'
        },500, function() {
            //p.attr('data-status','collapsed');
            })
        a.fadeOut(250,function() {
            b.fadeIn(250);
        });

    });
    $('.apm_closeadvancedsearch').off('click').on('click',function(){
        p=$('#leftpan_sub_inner');
        p=$(p);
        var a=$('.apm_openadvancedsearch');
        a=$(a);
        var b=$('.apm_closeadvancedsearch');
        b=$(b);
        p.animate({
            marginLeft:'0'
        },500, function() {
            //p.attr('data-status','collapsed');
            })
        b.fadeOut(250,function() {
            a.fadeIn(250);
        });
    });
    //EXPAND COLLAPSE LEFT PAN
    $('.modgrid_do_expcoll_leftpan').off('click').on('click',function(){
        p=$('#apmdatagrid_new_leftpan');
        p=$(p);
        a=$('#apmdatagrid_new_header');
        a=$(a);
        b=$('#apmdatagrid_new_gridhead');
        var b=$(b);
        b2=$('.ori_tableheader');
        var b2=$(b2);
        c=$('#apmdatagrid_new_gridbody');
        c=$(c);
        d=$('.modgrid_do_expcoll_leftpan');
        d=$(d);
        st=p.attr('data-status');
        if(st=='animated'){
            return false;
        }
        if(st=='expanded'){
            p.attr('data-status','animated');
            p.animate({
                left:'-180px'
            },500, function() {
                p.attr('data-status','collapsed');
            });
            a.animate({
                paddingLeft:'0',
                width:(flg_apm.setModuleGridBody.newwidth+175)+'px'
            },500, function() {
                });
            b.css('max-width','150%');
            b.css('max-width',(flg_apm.setModuleGridBody.newwidth+550)+'px');
            b.animate({
                paddingLeft:'0',
                width:(flg_apm.setModuleGridBody.newwidth+185)+'px'
            },500, function() {
                t=setTimeout(function(){
                    flg_apm.setModuleGridTableHeader.setThW();
                },300);
            });

            $('.ori_tableheader').css('width',$('#TabModuleGridBody tr').width());


            c.animate({
                paddingLeft:'0',
                width:(flg_apm.setModuleGridBody.newwidth+180)+'px'
            },500, function() {
                });

            d.animate({
                marginRight:'-10px'
            },500, function() {
                });
        }else{
            p.attr('data-status','animated');
            p.animate({
                left:'0px'
            },500, function() {
                p.attr('data-status','expanded');
            })
            a.animate({
                paddingLeft:'180px',
                width:(flg_apm.setModuleGridBody.newwidth-5)+'px'
            },500, function() {
                })

            b.css('max-width','150%');
            b.css('max-width',(flg_apm.setModuleGridBody.newwidth+550)+'px');
            b.animate({
                paddingLeft:'180px',
                width:flg_apm.setModuleGridBody.newwidth+'px'
            },500, function() {

                t=setTimeout(function(){
                    flg_apm.setModuleGridTableHeader.setThW();
                },300);
            })

            $('.ori_tableheader').css('width',$('#TabModuleGridBody tr').width());

            c.animate({
                paddingLeft:'180px',
                width:(flg_apm.setModuleGridBody.newwidth-4)+'px'
            },500, function() {
                })
            d.animate({
                marginRight:'0px'
            },500, function() {
                })
        //
        }
    })

}

/* JS EXTENSION
 * setModuleGridRightPan.js
 */


jQuery(document).ready(function(){
    flg_apm.setModuleGridRightPan.obj=$('#apmdatagrid_new_rightpan');
    flg_apm.setModuleGridRightPan.setMainTpl();
    flg_apm.setModuleGridRightPan.init();
    flg_apm.setModuleGridRightPan.initClicks();
//$(f).val('');
});


flg_apm.setModuleGridRightPan=new flg_apm.setUIObject('setModuleGridRightPan','.ext_new_rightpan');



flg_apm.setModuleGridRightPan.doTplPreTreatment=function(str){//Based to be overwritten in  each field declaration
    //{{siteurl}}
    if(my_extensions_views['setModuleGridHeaderProCog']==undefined){
        str=str.replace(/{{cog}}/g,'');
        str=str.replace(/{{contclns}}/g,'');
    }else{
        str=str.replace(/{{cog}}/g,my_extensions_views['setModuleGridHeaderProCog'].tpl);
        str=str.replace(/{{contclns}}/g,my_extensions_views['setModuleGridRightPanProCogPan'].tpl);
    }
    if(my_extensions_views['setModuleGridHeaderProGroup']==undefined){
        str=str.replace(/{{groupby}}/g,'');
    }else{
        str=str.replace(/{{groupby}}/g,my_extensions_views['setModuleGridHeaderProGroup'].tpl);
    }

    if(my_extensions_views['setModuleGridHeaderProSend']==undefined){
        str=str.replace(/{{mass_send}}/g,'');
        str=str.replace(/{{contsnd}}/g,'');
    }else{
        str=str.replace(/{{mass_send}}/g,my_extensions_views['setModuleGridHeaderProSend'].tpl);
        str=str.replace(/{{contsnd}}/g,my_extensions_views['setModuleGridRightPanProSendPan'].tpl);
    }
    if(my_extensions_views['setModuleGridHeaderProMass']==undefined){
        str=str.replace(/{{mass_update}}/g,'');
        str=str.replace(/{{contmass}}/g,'');
    }else{
        str=str.replace(/{{mass_update}}/g,my_extensions_views['setModuleGridHeaderProMass'].tpl);
        str=str.replace(/{{contmass}}/g,my_extensions_views['setModuleGridRightPanProMassPan'].tpl);
    }
    //
    if(my_extensions_views['setModuleGridRightPanProQuickaddPan']==undefined){
        str=str.replace(/{{contquick}}/g,'');
    }else{

        tpl=my_extensions_views['setModuleGridRightPanProQuickaddPan'].tpl;

        str=str.replace(/{{contquick}}/g,tpl);
    }
    str= flg_apm.setModuleGridRightPan.procLang(str,[],olan.rp);
    str= flg_apm.setModuleGridRightPan.procLang(str,[],olan.gf);
    return str;
};

flg_apm.setModuleGridRightPan.doExpand=function(){
    p=$('#apmdatagrid_new_rightpan');
    var p=$(p);

    p.animate({
        right:'-3px'
    },500, function() {
        p.attr('data-status','expanded');
    })
}
flg_apm.setModuleGridRightPan.doCollapse=function(){
    p=$('#apmdatagrid_new_rightpan');
    var p=$(p);

    p.animate({
        right:'-780px'
    },500, function() {
        p.attr('data-status','collapsed');
    })
}
flg_apm.setModuleGridRightPan.init=function(){
    p=$('#apmdatagrid_new_rightpan');
    var p=$(p);
    pos='-705px';
    p.attr('data-status','collapsed');
    $('.rightpancontmss').css({
        opacity:0,
        right:pos
    });
    $('.rightpancontquick').css({
        opacity:0,
        right:pos
    });
    $('.rightpancontcog').css({
        opacity:0,
        right:pos
    });
    $('.rightpancontsnd').css({
        opacity:0,
        right:pos
    });
    $('#rightpancontwrap').css({
        height:($('#rightpancont').height()-$('#rightpanhead').height()-40)+'px'
    });


}

flg_apm.setModuleGridRightPan.initClicks=function(){
    $('.do_mass_update').off('click').on('click',function(){
        pos='-705px';
        $('#rightpanhead h5.title .titsp').html(olan.gf.mss);
        $('.rightpancontquick').animate({
            opacity:0,
            right:pos
        },500, function() {
            })
        $('.rightpancontmss').animate({
            opacity:1,
            right:'-37px'
        },500, function() {
            })
        $('.rightpancontcog').animate({
            opacity:0,
            right:pos
        },500, function() {
            })
        $('.rightpancontsnd').animate({
            opacity:0,
            right:pos
        },500, function() {
            })
        flg_apm.setModuleGridRightPan.doExpand();
    });
    $('.do_mass_sendemail').off('click').on('click',function(){
        pos='-705px';
        $('#rightpanhead h5.title .titsp').html(olan.gf.snd);

        $('.rightpancontmss').animate({
            opacity:0,
            right:pos
        },500, function() {
            })
        $('.rightpancontcog').animate({
            opacity:0,
            right:pos
        },500, function() {
            })
        $('.rightpancontquick').animate({
            opacity:0,
            right:pos
        },500, function() {
            })
        $('.rightpancontsnd').animate({
            opacity:1,
            right:'-37px'
        },500, function() {
            })
        flg_apm.setModuleGridRightPan.doExpand();
    });

    $('.do_conf_gridcols').off('click').on('click',function(){
        $('#rightpanhead h5.title .titsp').html(olan.gf.clns);
        pos='-705px';

        $('.rightpancontquick').animate({
            opacity:0,
            right:pos
        },500, function() {
            })
        $('.rightpancontmss').animate({
            opacity:0,
            right:pos
        },500, function() {
            })
        $('.rightpancontcog').animate({
            opacity:1,
            right:'-37px'
        },500, function() {
            })
        $('.rightpancontsnd').animate({
            opacity:0,
            right:pos
        },500, function() {
            })
        flg_apm.setModuleGridRightPan.doExpand();
    });
    $('.doCollapseRightpan').off('click').on('click',function(){
        flg_apm.setModuleGridRightPan.doCollapse();
    });
}

/* JS EXTENSION
 * setModuleGridStatusFooter.js
 */


jQuery(document).ready(function(){
    flg_apm.setModuleGridStatusFooter.obj=$('#apmdatagrid_new_statusfooter');
    flg_apm.setModuleGridStatusFooter.setMainTpl();
    flg_apm.setModuleGridStatusFooter.initClicks();
    flg_apm.setModuleGridBody.setHeight();
//$(f).val('');
});


flg_apm.setModuleGridStatusFooter=new flg_apm.setUIObject('setModuleGridStatusFooter','.ext_new_statusfooter');


flg_apm.setDataGridStatus=function(status, statstr,connecstr){
    //alert($('#gridstatusbar').html());
    if(statstr!==false){
        str='';
        if(status=='error'){
            str=my_extensions_views['StatusFooterError'].tpl
        }
        if(status=='ok' || status==''){
            str=my_extensions_views['StatusFooterOk'].tpl
        }
        if(status=='loading' || status==''){
            str=my_extensions_views['StatusFooterLoading'].tpl
        }
        if(status=='warning' || status==''){
            str=my_extensions_views['StatusFooterWarning'].tpl
        }
        statstr=str.replace(/{{text}}/g,statstr);
        $('#gridstatusbar .stattxt').html(statstr);
    }
    if(connecstr!==false && connecstr!==undefined){
        $('#gridstatusbar .conntxt').html(connecstr);
    }

};

/*flg_apm.setModuleGridStatusFooter.init=function(){


    }*/

flg_apm.setModuleGridStatusFooter.initClicks=function(){


    };

/* JS EXTENSION
 * setModuleGridTableFooter.js
 */


jQuery(document).ready(function(){
    flg_apm.setModuleGridTableFooter.obj=$('#apmdatagrid_new_gridfooter');
    flg_apm.setModuleGridTableFooter.setMainTpl();
    flg_apm.setModuleGridTableFooter.initClicks();
    flg_apm.setModuleGridBody.setHeight();
//alert(flg_apm.setModuleGridTableFooter.tplIsSet);
//$(f).val('');
});


flg_apm.setModuleGridTableFooter=new flg_apm.setUIObject('setModuleGridTableFooter','.ext_new_gridfooter');
if(flg_apm.setUtil==undefined){
    flg_apm.setUtil={};
}
flg_apm.setUtil.getPageLi=function(i,page){
    pageli=my_extensions_views['setModuleGridTableFooterPagLi'].tpl;
    s=pageli.replace(/{{page}}/g,i);
    if(i==page){
        s=s.replace(/{{class}}/g,'active');
    }else{
        s=s.replace(/{{class}}/g,'');
    }
    return s
}

flg_apm.setModuleGridTableFooter.setUpData=function(nbItems,total,page,fulltotal){
    str=my_extensions_views['tableFooterNb'].tpl
    str=str.replace(/{{nbrows}}/g,nbItems);
    str=str.replace(/{{total}}/g,total);
    str=str.replace(/{{fulltotal}}/g,fulltotal);
    $('.footertalabitems').html(str);
    str=my_extensions_views['setModuleGridTableFooterPaging'].tpl;
    pageli=my_extensions_views['setModuleGridTableFooterPagLi'].tpl;
    nbpages=Math.ceil(total/flg_apm.setModuleGridBody.nbByPage);
    flg_apm.setModuleGridBody.nbpages=nbpages;
    //nbpages=3898;
    //page=558;
    paging='';
    if( nbpages<10 ){
        for(i=1;i<=nbpages;i++){
            paging+=flg_apm.setUtil.getPageLi(i,page);
        }
    } else if (nbpages>=10 && nbpages<100){
        n=5;
        if(nbpages>50){
            n=3;
        }
        for(i=1;i<=n;i++){
            paging+=flg_apm.setUtil.getPageLi(i,page);
        }
        if(page>5 && page<10){
            paging+=flg_apm.setUtil.getPageLi(page,page);
        }
        for(i=10;i<=nbpages;i+=10){
            paging+=flg_apm.setUtil.getPageLi(i,page);
            if(page>i && page<i+10 && page<(Math.floor(nbpages/10)*10)){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
        }
        if(nbpages>(Math.floor(nbpages/10)*10)){
            if(page>(Math.floor(nbpages/10)*10) && page< nbpages){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
            i=nbpages;
            paging+=flg_apm.setUtil.getPageLi(i,page);
        }
    } else  if(nbpages<500){
        paging+=flg_apm.setUtil.getPageLi(1,page);
        if(page<10){
            paging+=flg_apm.setUtil.getPageLi(page,page);
        }
        for(i=10;i<30;i+=10){
            paging+=flg_apm.setUtil.getPageLi(i,page);
            if(page>i && page<i+10 && page<(Math.floor(nbpages/10)*10)){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
        }
        for(i=50;i<nbpages;i+=50){
            paging+=flg_apm.setUtil.getPageLi(i,page);
            if(page>i && page<i+50 && page<(Math.floor(nbpages/50)*50)){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
        }
        if(nbpages>(Math.floor(nbpages/50)*50)){
            if(page>(Math.floor(nbpages/50)*50) && page< nbpages){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
            i=nbpages;
            paging+=flg_apm.setUtil.getPageLi(i,page);
        }
    }else  if(nbpages<1000){
        paging+=flg_apm.setUtil.getPageLi(1,page);
        if(page<50){
            paging+=flg_apm.setUtil.getPageLi(page,page);
        }
        for(i=50;i<100;i+=50){
            paging+=flg_apm.setUtil.getPageLi(i,page);
            if(page>i && page<i+50 && page<(Math.floor(nbpages/50)*50)){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
        }
        for(i=100;i<300;i+=100){
            paging+=flg_apm.setUtil.getPageLi(i,page);
            if(page>i && page<i+100 && page<(Math.floor(nbpages/100)*100)){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
        }
        for(i=300;i<nbpages;i+=200){
            paging+=flg_apm.setUtil.getPageLi(i,page);
            if(page>i && page<i+200 && page<(Math.floor(nbpages/200)*200)){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
        }
        if(nbpages>(Math.floor(nbpages/200)*200)){
            if(page>(Math.floor(nbpages/200)*200) && page< nbpages){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
            i=nbpages;
            paging+=flg_apm.setUtil.getPageLi(i,page);
        }
    } else if(nbpages<5000) {
        paging+=flg_apm.setUtil.getPageLi(1,page);
        for(i=100;i<=200;i+=100){
            paging+=flg_apm.setUtil.getPageLi(i,page);
            if(page>i && page<i+100 && page<(Math.floor(nbpages/100)*100)){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
        }
        if(page>200 && page<500){
            paging+=flg_apm.setUtil.getPageLi(page,page);
        }

        paging+=flg_apm.setUtil.getPageLi(500,page);
        if(page>500 && page<1000){
            paging+=flg_apm.setUtil.getPageLi(page,page);
        }
        for(i=1000;i<nbpages;i+=1000){
            paging+=flg_apm.setUtil.getPageLi(i,page);
            if(page>i && page<i+1000 && page<(Math.floor(nbpages/1000)*1000)){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
        }
        if(nbpages>(Math.floor(nbpages/1000)*1000)){
            if(page>(Math.floor(nbpages/1000)*1000) && page< nbpages){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
            i=nbpages;
            paging+=flg_apm.setUtil.getPageLi(i,page);
        }
    }else  {
        paging+=flg_apm.setUtil.getPageLi(1,page);
        if(page>1 && page<1000){
            paging+=flg_apm.setUtil.getPageLi(page,page);
        }
        for(i=1000;i<=2000;i+=1000){
            paging+=flg_apm.setUtil.getPageLi(i,page);
            if(page>i && page<i+1000 && page<(Math.floor(nbpages/1000)*1000)){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
        }
        if(page>2000 && page<5000){
            paging+=flg_apm.setUtil.getPageLi(page,page);
        }
        for(i=5000;i<nbpages;i+=1000){
            paging+=flg_apm.setUtil.getPageLi(i,page);
            if(page>i && page<i+1000 && page<(Math.floor(nbpages/1000)*1000)){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
        }
        if(nbpages>(Math.floor(nbpages/1000)*1000)){
            if(page>(Math.floor(nbpages/1000)*1000) && page< nbpages){
                paging+=flg_apm.setUtil.getPageLi(page,page);
            }
            i=nbpages;
            paging+=flg_apm.setUtil.getPageLi(i,page);
        }
    }
    str=str.replace(/{{paging}}/g,paging);
    $('.ori_footerpaging').html(str);
    if(page==1){
        $('.oripag_fir').addClass('disabled');
        $('.oripag_prev').addClass('disabled');
    }else{
        $('.oripag_fir').removeClass('disabled');
        $('.oripag_prev').removeClass('disabled');
    }
    if(page==nbpages){
        $('.oripag_nex').addClass('disabled');
        $('.oripag_las').addClass('disabled');
    }else{
        $('.oripag_nex').removeClass('disabled');
        $('.oripag_las').removeClass('disabled');
    }
    flg_apm.setModuleGridTableFooter.initClicks();
}


flg_apm.setModuleGridTableFooter.setUpPageNb=function(){
    pagnbs=$('.ori_nbofpages').find('span');
    $.each(pagnbs,function(i,o){
        if(Number($(o).attr('data-value'))==Number(flg_apm.setModuleGridBody.nbByPage)){
            $(o).addClass('active');
        }else{
            $(o).removeClass('active');
        }
    });
}
/*flg_apm.setModuleGridTableFooter.init=function(){


    }*/

flg_apm.setModuleGridTableFooter.initClicks=function(){


    $('.ori_nbofpages').find('span').off('click').on('click',function(){
        flg_apm.setModuleGridBody.page=1;
        flg_apm.setModuleGridBody.nbByPage=Number($(this).attr('data-value'));
        flg_apm.setAlertPanel.addAlert('Paging','Reloading with '+flg_apm.setModuleGridBody.nbByPage+' records by page ','',2000);
        flg_apm.setModuleGridBody.doLoad();
    });
    $('.ori_page_li').off('click').on('click',function(){
        flg_apm.setModuleGridBody.page=Number($(this).attr('data-page'));
        flg_apm.setAlertPanel.addAlert('Loading','Loading Page '+flg_apm.setModuleGridBody.page,'',2000);
        flg_apm.setModuleGridBody.doLoad();
    });
    $('.oripag_fir').off('click').on('click',function(){
        if(flg_apm.setModuleGridBody.page>1){
            flg_apm.setModuleGridBody.page=1;
            flg_apm.setAlertPanel.addAlert('Loading','Loading First Page','',2000);
            flg_apm.setModuleGridBody.doLoad();
        }
    });
    $('.oripag_prev').off('click').on('click',function(){
        if(flg_apm.setModuleGridBody.page>1){
            flg_apm.setAlertPanel.addAlert('Loading','Loading Previous Page','',2000);
            flg_apm.setModuleGridBody.page--;
            flg_apm.setModuleGridBody.doLoad();
        }
    });
    $('.oripag_las').off('click').on('click',function(){
        if(flg_apm.setModuleGridBody.page<flg_apm.setModuleGridBody.nbpages){
            flg_apm.setModuleGridBody.page=flg_apm.setModuleGridBody.nbpages;
            flg_apm.setAlertPanel.addAlert('Loading','Loading Last Page','',2000);
            flg_apm.setModuleGridBody.doLoad();
        }
    });
    $('.oripag_nex').off('click').on('click',function(){
        if(flg_apm.setModuleGridBody.page<flg_apm.setModuleGridBody.nbpages){
            flg_apm.setAlertPanel.addAlert('Loading','Loading Next Page','',2000);
            flg_apm.setModuleGridBody.page++;
            flg_apm.setModuleGridBody.doLoad();
        }
    });
//
}


/* JS EXTENSION
 * setModuleGridTableHeader.js
 */


jQuery(document).ready(function(){
    flg_apm.setModuleGridTableHeader.obj=$('#apmdatagrid_new_gridhead');
    flg_apm.setModuleGridTableHeader.setMainTpl();
    flg_apm.setModuleGridTableHeader.initClicks();
    flg_apm.setModuleGridBody.setHeight();
//$(f).val('');
});


flg_apm.setModuleGridTableHeader=new flg_apm.setUIObject('setModuleGridTableHeader','.ext_new_gridhead');



flg_apm.setModuleGridTableHeader.doTplPreTreatment=function(str){//Based to be overwritten in  each field declaration

    if(flg_apm.setModuleGrid.module_datagrid == undefined){
        return str;
    }
    var strTh=my_extensions_views['setModuleGridTableHeaderTh'].tpl;
    columns_initial_list=flg_apm.setModuleGrid.module_datagrid.columns_initial_list.split(',');
    var strresul='';
    $.each(columns_initial_list,function(i,ob){
        column_label=flg_apm.setModuleGrid.module_datagrid.columns_definition[ob].column_label;
        column_special_label=flg_apm.setModuleGrid.module_datagrid.columns_definition[ob].column_special_label;
        label=flg_apm.setModuleGrid.module_datagrid.columns_definition[ob].label;
        special_label=flg_apm.setModuleGrid.module_datagrid.columns_definition[ob].special_label;
        if(column_special_label!==undefined){
            column_label=column_special_label;
            label=special_label;
        }
        s=strTh.replace(/{{column_label}}/g,column_label);
        s=s.replace(/{{label}}/g,label);
        s=s.replace(/{{thfield}}/g,ob);
        s=s.replace(/{{modulename}}/g,flg_apm.setModuleGrid.module_config.singular_name);
        strresul+=s;
    });
    str=str.replace(/{{ths}}/g,strresul);
    str=this.doTplPrePreTreatment(str);
    return str;
}

/*flg_apm.setModuleGridTableHeader.init=function(){


    }*/

flg_apm.setModuleGridTableHeader.setThW=function(){
    var bodytrs=$('#TabModuleGridBody tr');
    var bodytds=$('td',bodytrs[0]);
    var headerths=$('.ori_tableheader th');
    $('.ori_tableheader').css('width',$('#TabModuleGridBody tr').width());
    var wtot=0;
    $.each(bodytds,function(i,ob){
        //alert(i);
        // if(i>0){
        w=$(ob).width();
        w2=$(headerths[i]).width();
        wp=$(ob).css('padding');
        $(headerths[i]).css('width',w);
        wtot+=w;
    });

    $('.ori_tableheader').css('width',$('#TabModuleGridBody tr').width());
// alert(wtot+'---'+$('#TabModuleGridBody tr').width()+'-----'+$('#TabModuleGridBody').width());
}
flg_apm.setModuleGridTableHeader.initClicks=function(){


    }

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
/* JS EXTENSION
 * setCategoryManage.js
 */


jQuery(document).ready(function(){
    flg_apm.setCategoryManage.init();
    flg_apm.setCategoryManage.initClicks();
    f=$('#do_sending_test');
//$(f).val('');
});


flg_apm.setCategoryManage=new flg_apm.setField('setCategoryManage','.c_setCategoryManage');


flg_apm.setCategoryManage.during_create=function(fi,obj){

    return fi;
}

flg_apm.setCategoryManage.postcreate=function(fi,obj){
	flg_apm.setCategoryManage.loadDataGrid();
}

flg_apm.setCategoryManage.loadDataGrid=function(){
	var post_ID = $('#post_ID').val();
	var tabbody = $('[data-field="managecatfield"] .apm_tablebody');
	$(tabbody).html(my_extensions_views['setCategoryManage_loading'].tpl);
	flg_apm.setAlertPanel.addAlert('Loading','Loading categories, please wait','',2000);
	$.ajax({
		url: ajaxurl ,
		type: "POST",
		data: "subaction=getCategoryManageData&action=apm_extensions&entity=setCategoryManageCls&post_ID="+post_ID,
		error: function(data){
			flg_apm.setAlertPanel.addAlert('Loading Issue','An error appeared while loading...','error',5000);
		},
		success: function(data){
			data_array = $.parseJSON(data);
			$(tabbody).html('');
			if(data_array.status){
				if(data_array.data_count > 0){
					flg_apm.setCategoryManage.showRowCategory(tabbody,data_array.data_arr, 0);
					flg_apm.setAlertPanel.addAlert('Loaded successfully','Loaded '+data_array.data_count+' categories loaded','ok',3000);
				}else{
					$(tabbody).html(my_extensions_views['setCategoryManage_nocategories'].tpl);
					flg_apm.setAlertPanel.addAlert('Loaded successfully','0 categories loaded','ok',3000);
				}

				flg_apm.setCategoryManage.initClicks();
			}else{
				flg_apm.setAlertPanel.addAlert('Loading Issue',data_array.data_arr,'error',5000);
			}
		}
	});
}

flg_apm.setCategoryManage.showSelectCategory = function (tmpSelect, lv , tmp_selParent){
	tmp_option = '';
	$.each(tmpSelect,function(i,o){
		if(tmp_selParent == o.name)
			selected = 'selected';
		else
			selected = '';
		if(lv == 0)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>'+o.name+'</option>';
		if(lv == 1)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>--'+o.name+'</option>';
		if(lv == 2)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>----'+o.name+'</option>';
		if(lv == 3)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>------'+o.name+'</option>';
		if(lv == 4)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>--------'+o.name+'</option>';
		if(lv == 5)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>--------'+o.name+'</option>';
		if(lv == 6)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>----------'+o.name+'</option>';
		if(lv == 7)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>------------'+o.name+'</option>';
		if(lv == 8)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>--------------'+o.name+'</option>';
		if(lv == 9)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>----------------'+o.name+'</option>';
		if(lv >= 10)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>------------------'+o.name+'</option>';

		if(o.childs != undefined)
			tmp_option += flg_apm.setCategoryManage.showSelectCategory(o.childs , lv+1 , tmp_selParent);
	});
	return tmp_option;
}

flg_apm.setCategoryManage.showRowCategory = function(tabbody,tmpSelect, lv){
	$.each(tmpSelect,function(i,o){
		var basestr=my_extensions_views['setCategoryManage_row'].tpl;
		rowstr=basestr;
		rowarr=rowstr.split('[[id_category]]');
		rowstr=rowarr.join(o.term_id);

		rowarr=rowstr.split('[[name_category_top]]');
		rowstr=rowarr.join(o.name);

		rowarr=rowstr.split('[[name_category]]');
		//rowstr=rowarr.join(o.name);
		if(lv == 0)
			rowstr=rowarr.join(o.name);
		if(lv == 1)
			rowstr=rowarr.join('--'+o.name);
		if(lv == 2)
			rowstr=rowarr.join('----'+o.name);
		if(lv == 3)
			rowstr=rowarr.join('------'+o.name);
		if(lv == 4)
			rowstr=rowarr.join('--------'+o.name);
		if(lv == 5)
			rowstr=rowarr.join('----------'+o.name);
		if(lv == 6)
			rowstr=rowarr.join('------------'+o.name);
		if(lv == 7)
			rowstr=rowarr.join('--------------'+o.name);
		if(lv == 8)
			rowstr=rowarr.join('----------------'+o.name);
		if(lv == 9)
			rowstr=rowarr.join('------------------'+o.name);
		if(lv >= 10)
			rowstr=rowarr.join('--------------------'+o.name);


		rowarr=rowstr.split('[[description_category]]');
		rowstr=rowarr.join(o.description);

		rowarr=rowstr.split('[[parent_category]]');
		parent_category = $('[data-field="managecatfield"] [data-row_id="'+o.parent+'"]').find('a').text();
		if(parent_category == '')
			parent_category = '-';
		else{
			if(parent_category.indexOf('------') == 0)
				parent_category = parent_category.substring(6,parent_category.length);
			if(parent_category.indexOf('----') == 0)
				parent_category = parent_category.substring(4,parent_category.length);
			if(parent_category.indexOf('--') == 0)
				parent_category = parent_category.substring(2,parent_category.length);
		}
		rowstr=rowarr.join(parent_category);

		$(tabbody).append(rowstr);

		if(o.childs != undefined)
			flg_apm.setCategoryManage.showRowCategory(tabbody,o.childs , lv+1);
	});
}

flg_apm.setCategoryManage.initClicks=function(){

    $('.add_mailcateg').off('click').on('click',function(){
        gloWin= flg_apm.c_create_globalModalWin();
        var cont=my_extensions_views['setCategoryManage_add'].tpl;
        cont=cont.replace(/{{value}}/g, '');
        cont=cont.replace(/{{description}}/g, '');
        flg_apm.c_init_globalModalWin(gloWin,{
            title:"Add an email category",
            actionTitle:'Add',
            content:cont,
            actionClass:'do_add_mailcateg'
        });

        gloWin.modal('show');

		var post_ID = $('#post_ID').val();
		$.ajax({
			url: ajaxurl ,
			type: "POST",
			data: "subaction=getCategoryManageData&action=apm_extensions&entity=setCategoryManageCls&post_ID="+post_ID,
			error: function(data){
				flg_apm.setAlertPanel.addAlert('Loading Issue','An error appeared while loading...','error',5000);
			},
			success: function(data){
				data_array = $.parseJSON(data);
				if(data_array.status){
					var tmp_option = '<option value="0">--None--</option>';

					tmp_option += flg_apm.setCategoryManage.showSelectCategory(data_array.data_arr , 0 , '');

					$('.parentcateg',gloWin).html(tmp_option);
				}else{
					flg_apm.setAlertPanel.addAlert('Loading Issue',data_array.data_arr,'error',5000);
				}
			}
		});
		flg_apm.setCategoryManage.initClicks();
    });

    $('.do_add_mailcateg').off('click').on('click',function(){
		// /*
		var addcateg_name = $('.addcateg_name').val();
		var tagcateg = $('.tagcateg').val();
		var parentcateg = $('.parentcateg').val();
		var descriptcateg = $('.descriptcateg').val();
		var post_ID = $('#post_ID').val();

		if(addcateg_name == ""){
			flg_apm.setAlertPanel.addAlert('Error','Please fill the required category name','error',2000);
			return false;
		}
		$('.modal_global_alert').html('Submitting... ');
		$.ajax({
			url: ajaxurl ,
			type: "POST",
			data: "subaction=addCategorymail&action=apm_extensions&entity=setCategoryManageCls&post_ID="+post_ID+"&addcateg_name="+addcateg_name+"&tagcateg="+tagcateg+"&parentcateg="+parentcateg+"&descriptcateg="+descriptcateg,
			error: function(data){
				console.log(data);
			},
			success: function(data){
				data_array = $.parseJSON(data);
				$('.modal_global_alert').html('');
				if(data_array.status){
					flg_apm.setCategoryManage.loadDataGrid();
					gloWin.modal('hide');
					flg_apm.setAlertPanel.addAlert('Add category','Add category success','ok',2000);
				}else
					flg_apm.setAlertPanel.addAlert('Error',data_array.data_arr,'error',2000);
			}
		});
		// */
		// flg_apm.c_init_saveAjaxCategForm(gloWin);
    });

    $('.edit_mailcateg').off('click').on('click',function(){
        gloWin= flg_apm.c_create_globalModalWin();
        var cont=my_extensions_views['setCategoryManage_add'].tpl;

        var tmp_name = $(this).html();
		if(tmp_name.indexOf('----') == 0)
			tmp_name = tmp_name.substring(4,tmp_name.length);
		if(tmp_name.indexOf('--') == 0)
			tmp_name = tmp_name.substring(2,tmp_name.length);

		cont=cont.replace(/{{value}}/g, tmp_name);
        cont=cont.replace(/{{description}}/g, $(this).parent().next().html());
        cont=cont.replace(/{{categoryMailID}}/g, $(this).parent().parent().attr('data-row_id'));
        flg_apm.c_init_globalModalWin(gloWin,{
            title:"Edit an email category",
            actionTitle:'Save',
            content:cont,
            actionClass:'do_save_mailcateg'
        });

        gloWin.modal('show');
		var post_ID = $('#post_ID').val();
		var tmp_selParent = $(this).parent().next().next().text();
		// console.debug(tmp_selParent);
		$.ajax({
			url: ajaxurl ,
			type: "POST",
			data: "subaction=getCategoryManageData&action=apm_extensions&entity=setCategoryManageCls&post_ID="+post_ID,
			error: function(data){
				flg_apm.setAlertPanel.addAlert('Loading Issue','An error appeared while loading...','error',5000);
			},
			success: function(data){
				data_array = $.parseJSON(data);
				if(data_array.status){
					var tmp_option = '<option value="0">--None--</option>';

					tmp_option += flg_apm.setCategoryManage.showSelectCategory(data_array.data_arr , 0 , tmp_selParent);

					$('.parentcateg',gloWin).html(tmp_option);
				}else{
					flg_apm.setAlertPanel.addAlert('Loading Issue',data_array.data_arr,'error',5000);
				}
			}
		});
		flg_apm.setCategoryManage.initClicks();
    });

    $('.do_save_mailcateg').off('click').on('click',function(){
		// /*
		var addcateg_name = $('.addcateg_name').val();
		var tagcateg = $('.tagcateg').val();
		var parentcateg = $('.parentcateg').val();
		var descriptcateg = $('.descriptcateg').val();
		var categoryMailID = $('.categoryMailID').val();
		var post_ID = $('#post_ID').val();

		if(addcateg_name == ""){
			flg_apm.setAlertPanel.addAlert('Error','Please fill the required category name','error',2000);
			return false;
		}
		$('.modal_global_alert').html('Submitting... ');
		$.ajax({
			url: ajaxurl ,
			type: "POST",
			data: "subaction=updateCategorymail&action=apm_extensions&entity=setCategoryManageCls&post_ID="+post_ID+"&addcateg_name="+addcateg_name+"&tagcateg="+tagcateg+"&parentcateg="+parentcateg+"&descriptcateg="+descriptcateg+"&categoryMailID="+categoryMailID,
			error: function(data){
				console.log(data);
			},
			success: function(data){
				console.debug(data);
				data_array = $.parseJSON(data);
				$('.modal_global_alert').html('');
				if(data_array.status){
					flg_apm.setCategoryManage.loadDataGrid();
					gloWin.modal('hide');
					flg_apm.setAlertPanel.addAlert('Add category','Add category success','ok',2000);
				}else
					flg_apm.setAlertPanel.addAlert('Error',data_array.data_arr,'error',2000);
			}
		});
		// */
    });

    $('.sel_mailcateg').off('click').on('click',function(){
		var status = $(this).attr('data-status');
		if(status == undefined){
			$('[data-field="managecatfield"] .apm_tablebody input').each(function(){
				$(this).attr('checked','checked');
			});
			$(this).attr('data-status', 'check');
		}else{
			$('[data-field="managecatfield"] .apm_tablebody input').each(function(){
				$(this).removeAttr('checked');
			});
			$(this).removeAttr('data-status');
		}
    });

    $('.del_mailcateg').off('click').on('click',function(){
		$('.chk_category:checked');
		if($('input.chk_category:checked').length == 0){
			flg_apm.setAlertPanel.addAlert('Selection empty','Please select at least one category.','warning');
		}else{
			num_category_select = $('input.chk_category:checked').length;
			strconf = 'Do you really want to delete '+num_category_select+' category(s)?';
			if(confirm(strconf)){
				var id_category_check = '';
				var arr_id_category_check = new Array();
				var arr_name_category_check = new Array();
				$('input.chk_category:checked').each(function(key,value){
					id_mail = $(value).parent().parent().parent().attr('data-row_id');
					id_category_check += id_mail + ',';
					arr_id_category_check.push(id_mail);
					arr_name_category_check.push($(value).parent().parent().parent().attr('data-row_name'));
				});
				id_category_check = id_category_check.substring(0 , id_category_check.length - 1);

				var tabbody = $('[data-field="managecatfield"] .apm_tablebody');
				$(tabbody).html(my_extensions_views['setCategoryManage_loading'].tpl);
				var post_ID = $('#post_ID').val();
				$.ajax({
					url: ajaxurl ,
					type: "POST",
					data: "subaction=deleteCategorymail&action=apm_extensions&entity=setCategoryManageCls&post_ID="+post_ID+"&categoryMailID="+id_category_check,
					error: function(data){
						flg_apm.setAlertPanel.addAlert('Loading Issue','An error appeared while loading...','error',5000);
					},
					success: function(data){
						flg_apm.setCategoryManage.loadDataGrid();
						data_array = $.parseJSON(data);
						if(!data_array.status){
							flg_apm.setAlertPanel.addAlert('Delete Category Issue','An error appeared while delete category...','error',5000);
						}else{
							$.each(arr_name_category_check , function(i,e){
								$('.c_setMailingBox table tr td:nth-child(4)').each(function(){
									if($(this).find('strong').html() == e){
										$(this).find('strong').html('-');
										$(this).find('a').attr('data-catid' , 0);
									}
								});
							});

						}
					}
				});
			}
		}
    });

    $('.refresh_mailcateg').off('click').on('click',function(){
		flg_apm.setCategoryManage.loadDataGrid();
    });
}

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

/* JS EXTENSION
 * setRelatedUser.js
 */


jQuery(document).ready(function(){
    flg_apm.setRelatedUser.init();
    flg_apm.setRelatedUser.initClicks();
    f=$('#do_sending_test');
//$(f).val('');
});


flg_apm.setRelatedUser=new flg_apm.setField('setRelatedUser','.c_setRelatedUser');


flg_apm.setRelatedUser.during_create=function(fi,obj){//
    if(flg_apm.related_user_id==0){
        fi.str=fi.str.replace(/{{relatedusername}}/g, 'No user related yet');
        fi.str=fi.str.replace(/{{userid}}/g, 0);
        fi.str=fi.str.replace(/{{toolt}}/g, 'Once a user will be related to this record you will be able to click here to open the user profile');
		fi.str=fi.str.replace(/{{hide}}/g, 'hide');
    }else{
        fi.str=fi.str.replace(/{{relatedusername}}/g, flg_apm.related_username);
        fi.str=fi.str.replace(/{{userid}}/g, flg_apm.related_user_id);
        fi.str=fi.str.replace(/{{toolt}}/g, 'Click to open the user profile');
        fi.str=fi.str.replace(/{{hide}}/g, '');

    }    //fi.str=fi.str.replace(/{{toolt}}/g, 'Click to open this user profile');

    return fi;
}
flg_apm.setRelatedUser.postcreate=function(fi,obj){
	flg_apm.setRelatedUser.initClicks();
	return fi;
    }


flg_apm.setRelatedUser.initClicks=function(){

	$('.highlight_userrelated').off('click').on('click',function(){
		window.location.href = '/wp-admin/user-edit.php?user_id='+$(this).attr('data-userid');
	});

	$('.do_delete_relationship').off('click').on('click',function(){
		console.debug('here');
		flg_apm.setAlertPanel.addAlert('Removing relationship','Removing relationship, please wait','',3000);
		var field = '&post_id='+post_id+'&userID='+flg_apm.related_user_id;
		$.ajax({
			url: ajaxurl ,
			type: "POST",
			data: "subaction=deleteRelationshipLeadToUser&action=apm_extensions&entity=actionRelatedUserCls"+field,
			error: function(data){
				flg_apm.setAlertPanel.addAlert('Loading Issue','An error appeared while loading...','error',5000);
			},
			success: function(data){
				data_array = $.parseJSON(data);
				if(data_array.status){
					flg_apm.setAlertPanel.addAlert('Removing relationship','Removing relationship successfully','ok',3000);

					flg_apm.related_user_id=0;
					flg_apm.related_username='No user related yet';

					$('.c_setRelatedUser .highlight_userrelated').attr('data-userid',flg_apm.related_user_id);

					$('.c_setRelatedUser .highlight_userrelated').attr('data-title','Once a user will be related to this record you will be able to click here to open the user profile');

					$('.c_setRelatedUser .highlight_userrelated').text(flg_apm.related_username);

					$('.do_delete_relationship').addClass('hide');

				}else{
					flg_apm.setAlertPanel.addAlert('Related Issue',data_array.msg,'error',5000);
				}
				// gloWin.modal('hide');
			}
		});
	});

}
