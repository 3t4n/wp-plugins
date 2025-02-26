/**
* Author URI:  https://3dwebsitebuilder.com/
* Author : Keivan Kamali
*/

wb3d_read_delete_list_objects(-1);

jQuery('#file_import').css('display','none');
jQuery('#file_import').removeClass('wb3d_displaynone');

jQuery('#addslider').click(function(){
      jQuery('#ves_waiting').css('display','');
      var date = new Date ( ) ;
      id_ves=date. getTime ( ).toString();
      var ajaxurl=wb3d.wb3d_ADMIN_URL+'admin-ajax.php';
      var data2 = {
            'action': 'wb3d_new',
            'id_ves':1,
            'id_ves_new':id_ves,
            'name':'new_wb3d',
            'wb3d_nonce':wb3d.wb3d_nonce,
      };
      jQuery.post(ajaxurl, data2, function(response) {
            jQuery('#ves_waiting').css('display','none');
            wb3d_copy_wb3d (response);
      });
});





function wb3d_append_wb3d(data,j){
      var href= wb3d.wb3d_ADMIN_URL+'admin.php?page=wb3d_main&id='+data[j].id_ves+'&name='+data[j].name;
      var txt='<div id="wb3dindex_'+j+'" style="    display: block;float: left; text-align: left;position:relative;margin:10px;width: 294px;height: 185px;background-color:#ccc;border-radius:10px;box-shadow:0px 0px 20px 8px rgba(0,0,0,0.53)">';
      txt+='<lable style="position:absolute;top: 8px;left: 97px;"> Id='+data[j].id_ves+'</lable>';
      txt+='<input title="name" id="inputwb3d_'+j+'"   style="background-color:#ccc; border-radius:5px;position:absolute;top: 32px;left: 71px;width: 155px;height: 30px;" type="text" value="'+data[j].name+'">';
      txt+='<div id="labelwb3d_'+j+'" style="position:absolute;text-align:center;top: 76px;left: 10px;width: 272px;">[wb3d_object alias="'+data[j].name+'"]</div>';
      txt+='<img title="Rename & Save" class="wb3d_pointer" id="renamewb3d_'+j+'" src="'+wb3d.wb3d_plagin_images_URL+'pen.png" style="width: 15px;height: 15px;top: 18px;left: 66px;position:absolute;">';
      txt+='<img class="wb3d_pointer" id="wb3d_thumbnail_'+j+'" src="'+(data[j].thumbnail)+'" style="border-radius:5px;top: 103px;left: 10px;;width:100px;height:70px;position:absolute">';
      txt+='<a id="wb3d_name_'+j+'"  target="_blank"  href="'+href+'">';
      txt+='<img src="'+wb3d.wb3d_plagin_images_URL+'set.png" style="top: 116px;left: 112px;;width:45px;height:45px;border-radius:20%; position:absolute">';
      txt+='</a>';
      txt+='<img class="wb3d_pointer" id="copywb3d_'+j+'"  src="'+wb3d.wb3d_plagin_images_URL+'copy.jpg" style="top: 118px;left: 160px;;width:40px;height:40px;border-radius:50%;position:absolute">';
      txt+='<img class="wb3d_pointer" id="exportwb3d_'+j+'"  src="'+wb3d.wb3d_plagin_images_URL+'export.png" style="top: 118px;left: 203px;;width:40px;height:40px;border-radius:50%;position:absolute">';
      txt+='<img class="wb3d_pointer" id="deletewb3d_'+j+'" src="'+wb3d.wb3d_plagin_images_URL+'close3.png" style="top: 119px;left: 245px;;width:40px;height:40px;border-radius:50%;position:absolute">';
      txt+=' <div style="width:100px;height40px;background-color:#aaa;"></div></div> ';
      jQuery('#wb3d_objects_sub').append(txt);

      jQuery('#inputwb3d_'+j).on('input', function(key) {
            jQuery(this).val(jQuery(this).val().replace(/[^a-z0-9_]/gi, ''));
      });
}

jQuery('#file_import').on('change', function(evt) {
      var replace_ves;
      var files = evt.target.files;
      var image1 = jQuery('#file_import')[0].files[0];
      if (jQuery('#replace_ves').is(':checked')){
            replace_ves='1';
      }
      else{
            replace_ves='0';
      }

      var datar = new FormData();
      datar.append('action', 'wb3d_import_file');
      datar.append('file', image1);
      datar.append('replace_ves', replace_ves);
      datar.append('wb3d_nonce', wb3d.wb3d_nonce);
      var flag=0;
      for(var i=10;i>0;i--){
            if(files[0].name.split('.')[i]!=undefined){
                  flag=1;
                  break;
            }
      }

      if(files[0].name.split('.')[i]!='zip'){
            alert(jQuery('#alert_listObj1').text());
      }
      else{

            jQuery('#ves_waiting').css('display','');
            jQuery.ajax({
                  url :  wb3d.wb3d_ADMIN_URL+'admin-ajax.php',
                  type: 'POST',
                  data: datar,
                  contentType: false,
                  processData: false,

                  xhr: function () {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener('progress', function (evt) {
                              if (evt.lengthComputable) {
                                    var percentComplete = evt.loaded / evt.total;
                                    percentComplete = parseInt(percentComplete * 100);
                              }
                        }, false);
                        return xhr;
                  },

                  success: function(datax) {

                        jQuery('#ves_waiting').css('display','none');
                        if(datax==-1){
                              alert(jQuery('#alert_listObj2').text());
                        }
                        else if(datax==2){
                              alert(jQuery('#alert_listObj3').text());
                        }
                        else if(datax==0){
                              alert(jQuery('#alert_importerror').text());
                        }
                        else{
                              alert(jQuery('#alert_listObj4').text());
                              jQuery('#wb3d_objects_sub').empty();
                              wb3d_read_data_demo(datax,1);
                        }
                        jQuery('#file_import').val('');


                  },    
                  error: function() {
                        alert(jQuery('#alert_listObj5').text());
                  }
            });
      }        
});



jQuery('#import_slider').click(function(){
      jQuery('#file_import').click();
});
function wb3d_read_data_demo(data,i){

      data=JSON.parse((data));
      wb3d_data_s=data;
      wb3d_data=data;

      document.addEventListener('mouseup', function(e){
            for(var j=0;j<wb3d_data_s.length;j++){
                  if(data[j]==undefined){
                        return;
                  }
                  jQuery('#inputwb3d_'+j).css('background-color','#ccc');
                  if(data[j].name!=jQuery('#inputwb3d_'+j).val()){
                        jQuery('#inputwb3d_'+j).val(data[j].name);
                  }
            }
      });
      for(var j=0;j<=wb3d_data_s.length-1;j++){
            wb3d_append_wb3d(data,j);
            wb3d_set_click_wb3d_copy(j,data);
            wb3d_set_click_wb3d_delete(j);
            wb3d_set_click_wb3d_input(j,data);
            wb3d_set_click_wb3d_rename(j,data);
            wb3d_set_click_wb3d_change_thumbnail(j,data);
      }
}


function wb3d_copy_wb3d(data2){
      data2=jQuery.parseJSON(data2);
      wb3d_data_s[wb3d_data_s.length]=data2;
      wb3d_append_wb3d(wb3d_data_s,wb3d_data_s.length-1,0);
      wb3d_set_click_wb3d_copy((wb3d_data_s.length-1));
      wb3d_set_click_wb3d_delete((wb3d_data_s.length-1));
      wb3d_set_click_wb3d_input((wb3d_data_s.length-1),wb3d_data_s);
      wb3d_set_click_wb3d_rename((wb3d_data_s.length-1),wb3d_data_s);
      wb3d_set_click_wb3d_change_thumbnail((wb3d_data_s.length-1),wb3d_data_s);
}


function wb3d_set_click_wb3d_delete(j){
      jQuery('#deletewb3d_'+j).click(function(){
            var result = confirm(jQuery('#alert_listObj7').text());
            if (result) {
                  var j=this.id.split('_')[1];
                  jQuery('#ves_waiting').css('display','');
                  wb3d_read_delete_list_objects(j);
            }
      });
}


function wb3d_read_delete_list_objects(j){
      jQuery('#ves_waiting').css('display','');
      var data;
      if(j==-1){
            data=-1;
      }
      else{
            data=wb3d_data[j].id_ves;
      }
      var ajaxurl=wb3d.wb3d_ADMIN_URL+'admin-ajax.php';
      var data2 = {
            'action': 'wb3d_delete',
            'wb3d_nonce':wb3d.wb3d_nonce,
            'id_ves':data,
      };
      jQuery.post(ajaxurl, data2, function(response) {
            jQuery('#ves_waiting').css('display','none');
            jQuery('#wb3d_objects_sub').empty();
            wb3d_read_data_demo(response,1);
      });
}

function wb3d_set_click_wb3d_input(j,data_s){
      jQuery('#inputwb3d_'+j).click(function(e){
      var b=this.id.split('_')[1];
      for(var j=0;j<=data_s.length-1;j++){
            if(j!=b){
                  jQuery('#inputwb3d_'+j).css('background-color','#ccc');
                  if(data_s[j].name!=jQuery('#inputwb3d_'+j).val()){
                        jQuery('#inputwb3d_'+j).val(data_s[j].name);
                  }
            }
      }

      jQuery('#inputwb3d_'+b).css('background-color','#fff');
            e.stopPropagation();
      });
      document.getElementById('inputwb3d_'+j).addEventListener('mouseup', function(e){
            e.stopPropagation();
      });
}


function wb3d_set_click_wb3d_copy(j){

      jQuery('#exportwb3d_'+j).click(function(){
            jQuery('#ves_waiting').css('display','');
            var j=this.id.split('_')[1];
            var id=wb3d_data[j].id_ves;
            var ajaxurl=wb3d.wb3d_ADMIN_URL+'admin-ajax.php';
            var data2 = {
                  'action': 'wb3d_export',
                  'wb3d_nonce':wb3d.wb3d_nonce,
                  'id_ves':id,
                  'name':wb3d_data[j].name,
                  'url':wb3d.wb3d_BASE_URL,
            };
            jQuery.post(ajaxurl, data2, function(response) {
                  jQuery('#ves_waiting').css('display','none');
                  location.href = wb3d.wb3d_plagin_URL+'backup/'+id+'.zip';
            });
      });//export


      jQuery('#copywb3d_'+j).click(function(){
            var j=this.id.split('_')[1];
            jQuery('#ves_waiting').css('display','');
            var date = new Date ( ) ;
            var id_ves=date. getTime().toString();
            var ajaxurl=wb3d.wb3d_ADMIN_URL+'admin-ajax.php';
            var data2 = {
                  'action': 'wb3d_copy',
                  'wb3d_nonce':wb3d.wb3d_nonce,
                  'id_ves':wb3d_data[j].id_ves,
                  'name':wb3d_data[j].name,
                  'id_ves_new':id_ves,
            };
            jQuery.post(ajaxurl, data2, function(response) {
                  
                  jQuery('#ves_waiting').css('display','none');
                  wb3d_copy_wb3d (response);
            });

      });

}


function wb3d_set_click_wb3d_change_thumbnail(j){

      jQuery('#wb3d_thumbnail_'+j).click(function(){

            var id=this.id.split('wb3d_thumbnail_')[1];
            event.preventDefault();
            var frame;

            // Create a new media frame
            frame = wp.media({
                  title: 'Select or Upload Media Of Your Chosen Persuasion',
                  button: {
                  text: 'Use this media'
                  },
                  library: { 
                  type: 'image' 
                  },
                  multiple: false
            });

            frame.on( 'select', function() {
                  var attachment = frame.state().get('selection').first().toJSON();
                  var imgurl =attachment.url;

                  jQuery('#ves_waiting').css('display','');

                  var ajaxurl=wb3d.wb3d_ADMIN_URL+'admin-ajax.php';
                  var data2 = {
                        'action': 'wb3d_change_thumbnail',
                        'wb3d_nonce':wb3d.wb3d_nonce,
                        'id_ves':wb3d_data[id].id_ves,
                        'thumbnail':imgurl,
                  };
                  jQuery.post(ajaxurl, data2, function(response) {
                        jQuery('#ves_waiting').css('display','none');
                        jQuery('#wb3d_thumbnail_'+id).attr('src',imgurl);
                  });
            });

            if ( frame ) {
                  frame.open();
                  return;
            }
      });
}

function wb3d_set_click_wb3d_rename(j,data){

      jQuery('#renamewb3d_'+j).mouseup(function(e){

            e.stopPropagation();
      });
      jQuery('#renamewb3d_'+j).click(function(e){
            var j=this.id.split('_')[1];
            jQuery('#ves_waiting').css('display','');

            if(data[j].name==jQuery('#inputwb3d_'+j).val()){
                  jQuery('#ves_waiting').css('display','none');
                  jQuery('#inputwb3d_'+j).css('background-color','#ccc');
            }

            else{
                  jQuery('#inputwb3d_'+j).prop('disabled', true);

                  var data2 = {
                        'action': 'wb3d_rename',
                        'wb3d_nonce':wb3d.wb3d_nonce,
                        'id_ves':wb3d_data[j].id_ves,
                        'name':jQuery('#inputwb3d_'+j).val(),
                  };
                  var ajaxurl=wb3d.wb3d_ADMIN_URL+'admin-ajax.php';
                  jQuery.post(ajaxurl, data2, function(response) {
                        jQuery('#ves_waiting').css('display','none');
                        if(response==0){        
                              data[j].name=jQuery('#inputwb3d_'+j).val();
                              jQuery('#labelwb3d_'+j).text('[wb3d_object alias="'+data[j].name+'"]');
                        }
                        else{
                              alert(jQuery('#alert_listObj6').text());
                              jQuery('#inputwb3d_'+j).val(data[j].name);
                        }
                        jQuery('#inputwb3d_'+j).css('background-color','#ccc');
                        jQuery('#inputwb3d_'+j).prop('disabled', false);

                        var href= wb3d.wb3d_ADMIN_URL+'admin.php?page=wb3d_main&id='+data[j].id_ves+'&name='+data[j].name;
                        jQuery('#wb3d_name_'+j).attr('href',href);
                  });
            }

            e.stopPropagation();
      });
}
