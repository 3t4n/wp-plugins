
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
