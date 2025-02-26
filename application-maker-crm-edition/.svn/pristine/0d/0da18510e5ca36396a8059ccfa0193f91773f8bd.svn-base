
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
