//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//var begin

var ws_3721up_textar_id = 'ws_3721up_callback_code' ;
var ws_3721up_api_obj ={};
var ws_3721up_latest_flag = false;
var ws_3721up_ajax_tip = '';
var ws_3721up_db_json = {};
var ws_3721up_tip_api_err ='\u5bf9\u4e0d\u8d77\uff0c\u4e0a\u4f20\u53d8\u91cf\u65e0\u6548\uff0c\u8bf7\u8054\u7cfb\u7ba1\u7406\u5458\u5e76\u6838\u5bf9 API \u4ee3\u7801!';
var ws_3721up_tip_common = '\u70b9\u51fb\u9009\u62e9\u6587\u4ef6\u5f00\u59cb\u4e0a\u4f20 <span style="font-style:italic">Powered By</span> 1000eb.com & <a href="http://waisir.com" target="_blank">\u6b6a\u4e16\u754c</a>';	
var ws_3721up_tip_ie = '\u60a8\u6b63\u5728\u4f7f\u7528ie\u6d4f\u89c8\u5668\2c\u8bf7\u70b9\u51fb\u4e0a\u4f20\u6309\u94ae\u7684\u4e0a\u65b9\u8fb9\u7f18\u533a\u57df\u5373\u53ef\u5f39\u51fa\u6587\u4ef6\u9009\u62e9\u5bf9\u8bdd\u6846';
var ws_3721up_tip_mozilla = '\u60a8\u4f7f\u7528\u7684\u662f\u706b\u72d0\u6d4f\u89c8\u5668';
//var end
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//jQuery begin
var $ = jQuery.noConflict();
$(function(){

var ws_3721up_post_id = $('#ws_3721up_post_id').val();

//attach the wordpress ui
ws_3721up_attach_wp_ui('#ws_3721up :button','button-secondary');
//reset 3721up css style
//ws_3721up_checkDiv('com3721upDialog-body');
//hook the callback strings
ws_3721up_getlink();
//some different tips go diffenent from browers
ws_3721up_checktip();
//setup ajax
ws_3721up_ajax_setup();
//get json form server
ws_3721up_get_json_ajax();
//3721UP api init
ws_3721up_api_init();
//register some listener of button click
register_ws_3721up_file_click();

function ws_3721up_attach_wp_ui(selector,cls){
	$(selector).addClass(cls);
}
function ws_3721up_api_init(){
	$.ajax({
		data:{'action':'get','ws_3721up_api_setting':''},
		success:function(data){
			if(data['ws_3721up_api_setting']==''){$('#ws_3721up_uploader').
			html('未检测到API代码    <a href="options-general.php?page=ws_3721up_plugin_id" target="_blank">设置</a>')}
			ws_o = JSON.parse(data['ws_3721up_api_setting'])
			var d = ws_o.globalVarName
			ws_3721up_init(d,ws_o);
		}	
	})		
}

function ws_3721up_ajax_setup(){
	$.ajaxSetup({
		url:'../wp-content/plugins/1000eb/includes/loader.php',
		type:'POST',
		dataType:'JSON'		
	});
	//some ajax listeners
	//$('#ws_3721up_ajax_loading').css('display','inline');
	$('#ws_3721up_ajax_loading').bind({
		'ajaxSend':function(){$(this).css('display','inline');},
		'ajaxComplete':function(){$(this).hide()}	
	});

	$('#ws_3721up_ajax_msg').bind({
		'ajaxSend':function(){
			$(this).css('display','inline');
			$(this).attr('class','ws_3721up_black');
			$(this).text(ws_3721up_ajax_tip);
		},
		'ajaxComplete':function(){
			$(this).text(ws_3721up_ajax_tip);
		}
	});
}

//get json from the server
function ws_3721up_get_json_ajax(){
	
	$.ajax({
		data:{'ws_3721up_file_list':'','action':'get'},
		beforeSend:function(){
			ws_3721up_ajax_tip = '\u6b63\u5728\u52a0\u8f7d\u6570\u636e'+'.....';
			//$('#ws_3721up_ajax_msg').text('\u6b63\u5728\u52a0\u8f7d\u6570\u636e'+'...');
		},
		success:function(data, status){
			
			ws_3721up_ajax_tip = '\u6570\u636e\u52a0\u8f7d\u5b8c\u6bd5!';
			//get the callback data to reset ws_3721up_db_json JSON obj
			//JSON.parse .pay much attention to this statement,the key sentence
			//data['ws_3721up_file_list'] is just a string, there will be a double quote around the string 	       		//without parsing it to a JSON
			//just this really condition, anymore methods depend on the difference
			if(data['ws_3721up_file_list']==''){data['ws_3721up_file_list']='{}'}
			ws_3721up_db_json = JSON.parse(data['ws_3721up_file_list']);
			//alert('msg:'+ws_3721up_db_json[ws_3721up_post_id]['id']);
				if (!!ws_3721up_db_json[ws_3721up_post_id]){
					ws_3721up_json_to_form(ws_3721up_post_id);
				}
		},	
	});
}		

//such a necessary function
function ws_3721up_get_latest_data(){
	$.ajax({
		data:{'ws_3721up_file_list':'','action':'get'},
		beforeSend:function(){
			ws_3721up_ajax_tip = '\u6570\u636e\u83b7\u53d6\u4e2d' + '......';
		},
		success:function(data, status){
			//get the callback data to reset ws_3721up_db_json JSON obj
			if(data['ws_3721up_file_list']==''){data['ws_3721up_file_list']='{}'}
			ws_3721up_db_json = JSON.parse(data['ws_3721up_file_list']);
			ws_3721up_latest_flag = true;
			ws_3721up_set_json_ajax();	
		},	
	});
}
//update json to server ,the sub
function ws_3721up_set_json_ajax(){
	//such a necessary conditional statement
	//the myJSONText should be the latest before update or here the bug is! let's do for it!	
	if(!!!ws_3721up_latest_flag){ws_3721up_get_latest_data();return;}
	else{ws_3721up_latest_flag = false;}
	
	
	$.ajax({
		data:{"ws_3721up_file_list":ws_3721up_form_to_json(ws_3721up_post_id),'action':'set'},
		beforeSend:function(){
			ws_3721up_ajax_tip = '\u66f4\u65b0\u4e2d' + '.....';
			
		},
		success:function(data, status){
			if (data !== ''){
				$('#ws_3721up_ajax_msg').attr('class','ws_3721up_green');
				ws_3721up_ajax_tip ='\u66f4\u65b0\u6210\u529f!';
			}else{
				$('#ws_3721up_ajax_msg').attr('class','ws_3721up_red');
				ws_3721up_ajax_tip ='\u670d\u52a1\u5668\u65e0\u6cd5\u8fde\u63a5';
			}
			
		},	
	});
}

//put the json to my form
function ws_3721up_json_to_form(postid){
	//alert(ws_3721up_db_json[postid].length);
	var ws_item =  ws_3721up_db_json[postid];
	for( var i = ws_item.length -1 ; i>= 0; i--){
		ws_3721up_addli();
		var ws_html = '\u6587\u4ef6\u540d\uff1a'+ws_item[i].name+'<br />\u6587\u4ef6\u5927\u5c0f\uff1a'+ws_item[i].size+'KB<br />\u4e0b\u8f7d\u5730\u5740\uff1a<a href="http://1000eb.com/'+ws_item[i].code+'" target="_blank">http://1000eb.com/'+ws_item[i].code+'</a>';
		$('#ws_3721up_filelist_ul .ws_3721up_filecode:first').val(ws_item[i].code);
		$('#ws_3721up_filelist_ul .ws_3721up_filesize:first').val(ws_item[i].size);
		$('#ws_3721up_filelist_ul .ws_3721up_fileurl:first') .val('http://1000eb.com/' + ws_item[i].code);
		$('#ws_3721up_filelist_ul .ws_3721up_filename:first').val(ws_item[i].name);
		$('#ws_3721up_filelist_ul .ws_3721up_filehtml:first').val(ws_html);
	}	
	
}

//update on client(generate)
function ws_3721up_form_to_json(id){
	var ws_3721up_db_json_temp = [];
	$('#ws_3721up_filelist_ul li').each(function(i,e){
		ws_3721up_db_json_temp[i] = {	'id'   : i+1,
										'code' : $(e).find('.ws_3721up_filecode').val(),
										'size' : $(e).find('.ws_3721up_filesize').val(),
										'name' : $(e).find('.ws_3721up_filename').val()};
	});
	//exchange the JSON ws_3721up_db_json to string 
	var myJSONText = JSON.stringify(ws_3721up_db_json,function(k,v){
		if (k==id){v = ws_3721up_db_json_temp;}
		return v;	
	});
	
	//excute while the files exits
	if(ws_3721up_db_json_temp.length !== 0 ){
		//add a key if the one is not exited
		if (!!!ws_3721up_db_json[id]){
			myJSONText = myJSONText.replace(/\}$/,function($,$1){//open the last curly brackets

				if(myJSONText=='{}'){
					return '\"' + id + '\":' +  JSON.stringify(ws_3721up_db_json_temp) + '}';
				}else{
					return ',\"' + id + '\":' +  JSON.stringify(ws_3721up_db_json_temp) + '}';	
				}
			});
		}	
		
	}
	return myJSONText;
}


function ws_3721up_checktip(){
	ws_3721up_tip_ie = ws_3721up_tip_mozilla = ws_3721up_tip_common;
	if ($('.up_tip').length == 0){
		setTimeout(function(){ws_3721up_checktip();},1);
	}else{
		if($.browser.msie) {
			$('.up_tip').html(ws_3721up_tip_ie);
		}else if($.browser.mozilla){
			$('.up_tip').html(ws_3721up_tip_mozilla);
		
		}
	}
	
}
function ws_3721up_checkDiv(div){
	if ($('.' + div).length == 0){
		setTimeout(function(){ws_3721up_checkDiv(div);},1);
	}else{
		ws_3721up_resetCss();
	}
}


//complete to getlink info
function ws_3721up_getlink(){
	
	if($('#' + ws_3721up_textar_id).val() !== ''){
		
		ws_3721up_addli();
		
		var callbackstr = $('#' + ws_3721up_textar_id ).val();
		
		//var reg =/http:\/\/1000eb.com\/+([\w?=]*)/i;
		var reg =/http:\/\/1000eb.com\/+([\w\d]*)/i;
		var reg_name = /\u6587\u4ef6\u540d\uff1a(.*?)</i;
		var reg_size = /\u6587\u4ef6\u5927\u5c0f\uff1a(.*?)</i;
		var filecode = callbackstr.match(reg)[1];
		
		var filename = callbackstr.match(reg_name)[1];
		var filesize= callbackstr.match(reg_size)[1];
		$('#ws_3721up_filelist_ul .ws_3721up_filecode:first').val(filecode);
		$('#ws_3721up_filelist_ul .ws_3721up_filesize:first').val(filesize);
		$('#ws_3721up_filelist_ul .ws_3721up_fileurl:first') .val('http://1000eb.com/' + filecode);
		$('#ws_3721up_filelist_ul .ws_3721up_filename:first').val(filename);
		$('#ws_3721up_filelist_ul .ws_3721up_filehtml:first').val($('#' + ws_3721up_textar_id ).val());
		$('#' + ws_3721up_textar_id ).val('');
		ws_3721up_set_json_ajax();
		/////////////////////////////////////////////////////////////////////////////////////

　　		var isIE=!!document.all,ieRange=false,editor,win,doc;
　　

　		
	　　function SaveRange(){//IE下保存Range对象
			if( isIE&&!ieRange ){//是否IE并且判断是否保存过Range对象
				var sel = doc.selection;
				ieRange = sel.createRange();
				if(sel.type!='Control'){//选择的不是对象
					var p=ieRange.parentElement();//判断是否在编辑器内
					if(p.tagName=="INPUT"||p==document.body)ieRange=false;
				}
		　　  }
	　　}

		function insert(v){
			if( v=='' ) return false;
			if(ieRange){
		　　    ieRange.pasteHTML(v); ieRange.select(); ieRange=false;//清空下range对象
			}else{//焦点不在html编辑器内容时
		　　     win.focus();
		　　     if(isIE){
					doc.body.innerHTML += v;//IE插入在最后
				}else{//Firefox
					var sel = win.getSelection(), 
					rng = sel.getRangeAt(0),
					frg = rng.createContextualFragment(v);
					rng.insertNode(frg);
		　　     }
		　　  }
		}

		var editor = getUserSetting("editor");
		
		if( editor == 'tinymce' ){
			editor = document.getElementById('content_ifr');
			win    = editor.contentWindow;
			doc    = win.document;
			doc.designMode = 'On';//可编辑
			win.focus();
			insert(callbackstr)	;
			
		}else if( editor == 'html'){
			//#editorcontainer
			var htmlEditor = $("#content");

			if( htmlEditor.length !== 0 ){
				var htmlEditorHtml  = htmlEditor.html();
				htmlEditorHtml += '\n' + callbackstr;
				htmlEditor.html( htmlEditorHtml);
			}

		}
			
		/////////////////////////////////////////////////////////////////////////////////////
			
	}	
	setTimeout(function(){ws_3721up_getlink();},1);
}

function ws_3721up_addli(){
		
		var ws_li_temp=$('#ws_3721up_filelist_ul_hide li:first').clone();
		$('#ws_3721up_filelist_ul').prepend(ws_li_temp);	
		$('#ws_3721up_filelist_ul li:first').hide();
		$('#ws_3721up_filelist_ul li:first').fadeIn(2000);
		//register_ws_3721up_file_click();
}

function ws_3721up_resetCss(){
	
	$('#com3721upDialog').css({
		'width':0,'min-height':0,'height':0,'padding':0,'border':0,'display':'block'
	});
	
	$('.com3721upDialog-info').remove();
	$('#com3721upDialog').find(':contains(Power)').remove();
	$('#com3721upDialog').find('a').remove();
	
	$('#ws_3721up_uploader').html($('#com3721upDialog').html());
	$('#com3721upDialog').html('');

}
	
//button bind

$('.ws_3721up_fileselect_h').click(function(){
	
	$('#ws_3721up_filelist_ul input[type=checkbox]')
	.attr('checked',$('.ws_3721up_fileselect_h').is(':checked'));
});

$('#ws_3721up_ctl_apply').click(function(){
	switch ($('#ws_3721up_ctl_select').val()){
		case '1':
			$('#ws_3721up_filelist_ul input:checked').parent().fadeOut(1000,function(){
				$('#ws_3721up_filelist_ul input:checked').parent().remove();	
				ws_3721up_set_json_ajax();
			});
			
			break;	
	}	
});

$('#ws_3721up_ctl_manage').click(function(){
	 window.open('http://1000eb.com/user/controlpanel/recylefromoutdoor.aspx');
});

function register_ws_3721up_file_click(){
	ws_3721up_fileurl_click();
	ws_3721up_filehtml_click();
	ws_3721up_remove_click();
	ws_3721up_file_goto_click();
	
	function  ws_3721up_file_goto_click(){
		$('#ws_3721up_filelist_ul .ws_3721up_file_goto').live('click',function(){
		window.open($(this).parent().find('.ws_3721up_fileurl').val());
		})
	}
	function ws_3721up_remove_click(){
		$('#ws_3721up_filelist_ul .ws_3721up_file_delete').live('click',function(){
			$(this).parent().fadeOut(500,function(){
				$(this).remove();
				ws_3721up_set_json_ajax();
			});
		});
	}
	function ws_3721up_save_click(){
		$('#ws_3721up_filelist_ul .ws_3721up_file_delete').live('click',function(){
			ws_3721up_form_to_json(ws_3721up_post_id);
		});
	}
	
	function ws_3721up_fileurl_click(){
		$('#ws_3721up_filelist_ul .ws_3721up_file_delete').live('click',function(){
			$(this).select();
		});
	}
	
	function ws_3721up_filehtml_click(){
		$('#ws_3721up_filelist_ul .ws_3721up_file_delete').live('click',function(){
			$(this).select();
		});
	}
	
		
	$('#ws_3721up_file_add').click(function(){
	
		var mathrand = Math.floor(Math.random()*8999+1000);
		var callbackstr = '文件名：'+mathrand+'.gif<br />文件大小：2.72KB<br />下载地址：<a href="http://1000eb.com/'+mathrand+'" target="_blank">http://1000eb.com/'+mathrand+'</a>'
		$('#' + ws_3721up_textar_id).val(callbackstr);
		
	
	});
	
	$('#ws_3721up_diy_act').click(function(){

		
		
		//alert(ws_3721up_root_url);
		//alert(ws_3721up_form_to_json(ws_3721up_post_id));
		//alert($('#ws_3721up').html());
		//alert(ws_3721up_form_to_json(ws_3721up_post_id));
		//alert();
		//ws_3721up_set_json_ajax();
		//$.post(ws_3721up_root_url,{"data":ws_3721up_form_to_json(ws_3721up_post_id)});
	});
	
	$('#ws_3721up_ctl_update').click(function(){
		ws_3721up_set_json_ajax();
		
	});
	
}//end of button click register

function ws_3721up_init(d,a_o){
		var a = d + "Class",
		b = window[a];
		if (!b) {
			var c = a_o;
			if (!c) {
				alert(ws_3721up_tip_api_err);
				return
			}
			window[a] = b = new (fnCom3721upUploadApi())(c)
		}
		b.open();
}


});//end of jQuery ready

//jQuery end
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
