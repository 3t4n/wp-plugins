
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
