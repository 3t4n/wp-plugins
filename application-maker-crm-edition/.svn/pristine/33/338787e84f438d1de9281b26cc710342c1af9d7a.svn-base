
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
