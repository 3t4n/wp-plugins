/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

flg_apm.c_init=function(){
    flg_apm.js_path="js/admin/fields_types/";
    flg_apm.tpl_path="views/fields_types/";
    flg_apm.adminUrl= flg_apm.getAdminUrl();
}
flg_apm.c_createFields=function(){
   /* c_field_containers=$('.c_field_container');
    $.each(c_field_containers, function(i,obj){
           obj=$(obj);
           field_type=obj.attr('data-field_type');
           //alert(my_extensions_views[field_type].tpl);
           obj.html(my_extensions_views[field_type].tpl)
         /*  field_type=obj.attr('data-field_type');
           flg_apm.c_get_tpl(obj,field_type);
           flg_apm.c_get_js(obj,field_type);
    });*/
}
/***************** HELPERS */
var c_extension_data;
flg_apm.c_get_extension_data=function(type,name,callback,field){
    var callback=callback;
    var field=field;
    $.ajax({
              url: ajaxurl ,
             type: "POST",
             data: "name="+name+"&field="+field+"&type="+type+"&action=apm_extensions_data",
              //context: document.body,
              success: function(data){
                  c_extension_data=$.JSON.decode(data);
                  eval(callback);
              },
              error: function(data){
                flg_apm.setAlertPanel.addAlert('Error','An error happend in the loading of the data, sorry.. please reload the page...','error',3000);
                 // alert('An error happend in the loading of the data, sorry.. please reload the page...')
              }
    });
}

flg_apm.c_get_tpl=function(obj,tpl){
    filename=flg_apm.tpl_path+""+tpl+".html";
    flg_apm.c_get_file(obj,filename,tpl);
}

flg_apm.c_get_js=function(obj,tpl){
    filename=flg_apm.js_path+""+tpl+".js";
    flg_apm.c_get_file(obj,filename,tpl);
}
flg_apm.c_get_file=function(obj,filename, varname, callback){
   // alert(filename);

}

flg_apm.c_init();
jQuery(document).ready(function(){
    flg_apm.c_createFields();
});