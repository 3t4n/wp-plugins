var $ = jQuery.noConflict();
$(function(){
	
var api_src, config_url, global_name;
$('#ws_3721up_textarea_main').val($('#ws_3721up_textarea_main').text());
$('#ws_3721up_textarea_main_r').val($('#ws_3721up_textarea_main_r').text());
//alert($('#ws_3721up_main_wrap_r').html());


$('#ws_3721up_diy_ctl').click(function(){
	alert(ws_3721up_get_info());	
});


$('#ws_3721up_ajax_loading').bind({
	'ajaxSend':function(){$(this).css('display','inline');},
	'ajaxComplete':function(){$(this).hide()}	
});

$('#ws_3721up_setting_update').bind('click',function(){
	//if(!ws_3721up_get_info()){return};
	//alert($('#ws_3721up_textarea_main').val());
	$.ajax({
		url:'../wp-content/plugins/1000eb/includes/loader.php',
		type:'POST',
		data:{  'action':'set',
				'ws_3721up_api_setting':ws_3721up_get_info(),
				'ws_3721up_api_setting_ori':$('#ws_3721up_textarea_main').val(),
				'ws_3721up_api_setting_api_src':api_src,
				'ws_3721up_api_setting_global_name':global_name,
			 },
		//data:{'action':'set','ws_3721up_api_setting':$('#ws_3721up_textarea_main').val()},
		dataType:'JSON',
		success:function(data,status){
			alert('更新成功!');	
		}
		
	});
	
});

function ws_3721up_get_info(){
	//alert('inter');
	var err_flag
	var info = $('#ws_3721up_textarea_main').val();
	
	var reg_api      = /src=\"(.*?)\"/;
	var reg_config   = /(http:\/\/1000eb.net\/apiloader.aspx.*?)\"/;
	var reg_name     = /globalVarName[ :]*"(.*?)"/;
	


	if(info==''){alert('请输入API代码');return ''}
	try{api_src = info.match(reg_api)[1];}
	catch(e){alert('API设置错误:未检测到API的javascript源');return ''}

	try{config_url = info.match(reg_config)[1];}
	catch(e){if(e= 'config_url'){alert('API设置错误:未检测到API的getUploadConfigUrl');return ''}}
	
	try{global_name = info.match(reg_name)[1];}
	catch(e){if(e= 'globalVarName'){alert('API设置错误:未检测到APglobalVarName');return ''}}


	
	var ws_ori='';
	ws_ori += '{"applyTo" : "other",';
	ws_ori += '"receiveType" : "html",';
	ws_ori += '"receiver" : "ws_3721up_callback_code",';
	ws_ori += '"getUploadConfigUrl" : "'+config_url+'",';
	ws_ori += '"globalVarName" : "'+global_name+'"';
	ws_ori += '}';

	return ws_ori;	
	
}
	

	



});