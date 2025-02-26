
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
