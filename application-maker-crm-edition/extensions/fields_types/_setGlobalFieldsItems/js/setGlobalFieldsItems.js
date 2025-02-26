
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



