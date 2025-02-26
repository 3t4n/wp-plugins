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

