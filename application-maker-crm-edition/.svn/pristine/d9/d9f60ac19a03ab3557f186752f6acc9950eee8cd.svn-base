
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
