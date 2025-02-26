/**
* Author URI:  https://3dwebsitebuilder.com/
* Author : Keivan Kamali
*/
jQuery(document).ready(function($) {

	if(typeof tinymce !== 'undefined') {
		tinymce.create('tinymce.plugins.wb3d_plugin', {
			init : function(ed, url) {
				ed.addCommand('wb3d_insert_shortcode', function() {
					wb3d_read_list_first();
				});

				// Register buttons - trigger above command when clicked
				ed.addButton('wb3d_button', {title : 'Insert shortcode', cmd : 'wb3d_insert_shortcode', image: url + '/wb3d.png' });
			},   
		});
		tinymce.PluginManager.add('wb3d_button', tinymce.plugins.wb3d_plugin);
	}
});


 wb3d_read_list_first=function(){

	var txt='<div id="wb3d_start_sliders_page" style="width: 100%; height:700px;background-color: #bbaaff;text-align: center;position: fixed;top: 0px;left: 0px;z-index: 9999998;">';
	txt+='<label id="wb3d_shortcode_note" style="position:absolute;color:rgb(177,12,12);font-weight: bold;top:30px;margin:auto">Only one shortcode is executed per page</label>';  
	txt+='<div id="wb3d_start_sliders_sub" style="top:10%; position: absolute;left: 10%; width: 80%;height:80%;background-color: #a6abbc;border-radius: 30px;box-shadow: inset 0px 1px 20px 9px rgba(0,0,0,0.53);overflow: auto;">';
	txt+='<div id="wb3d_obj_list" style="top:120px; position: absolute;left:0px; width: 100%;height:auto;"></div>';
	txt+='</div></div>';


	if(jQuery('#wb3d_start_sliders_sub').length===0){
		jQuery('body').append(txt);
	}
	var w=(Number((jQuery('#wb3d_shortcode_note').css("width")).split('px')[0]))/2;
	var left= (window.innerWidth/2)-w;
	jQuery('#wb3d_shortcode_note').css("left",left+'px');
	var ajaxurl='admin-ajax.php';
	var data2 = {
		'action': 'wb3d_read_first_data',
		'wb3d_nonce': wb3d_tinymce.wb3d_nonce,
	};
	jQuery.post(ajaxurl, data2, function(response) {
		response= jQuery.parseJSON(response);
		jQuery('#wb3d_start_sliders_sub').empty();
		wb3d_read_data(response[0]);
	});
};




wb3d_read_data=function(data,i){
	for(var j=data.length-1;j>=0;j--){
		var b=data.length-j-1;
		wb3d_append_html(data,j,b);
		jQuery('#wb3dindex_'+j ).show();
	}
};

wb3d_append_html=function(data,j,b){

	var txt='<div id="wb3dindex_'+j+'" style="    display: block;float: left; text-align: left;position:relative;margin:10px;width: 294px;height: 185px;background-color:#ccc;border-radius:10px;box-shadow:0px 0px 20px 8px rgba(0,0,0,0.53)">';
	txt+='<lable style="position:absolute;top: 15px;left: 97px;"> Id='+data[j].id_ves+'</lable>';
	txt+='<div id="labelwb3d_'+j+'" style="position:absolute;text-align:center;top: 38px;left: 10px;width: 272px;">[wb3d_object alias="'+data[j].name+'"]</div>';
	txt+='<img id="wb3d_thumbnail_'+j+'" src="'+(data[j].thumbnail)+'" style="border-radius:5px;top:69px;left: 25px;;width:240px;height:107px;position:absolute">';
	txt+=' <div style="width:100px;height40px;background-color:#aaa;"></div></div> ';
	jQuery('#wb3d_start_sliders_sub').append(txt);

	jQuery('#wb3dindex_'+j).click(function(){
		var j=this.id.split('_')[1];
		tinymce.execCommand('mceInsertContent', false, '[wb3d_object alias="'+data[j].name+'"][/wb3d_object]');
		jQuery('#wb3d_start_sliders_page').empty();
		jQuery('#wb3d_start_sliders_page').remove();
	});
};
