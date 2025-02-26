
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
