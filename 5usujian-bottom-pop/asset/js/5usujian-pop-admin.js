var wysjPopAdmin = {
	view: function(json, time, id){
		var viewbox = jQuery("#wysj-btpop-view");
		var overlay = jQuery("#wysj-btpop-view-overlay");
		var jsonobj = json;
		var html = "";
		viewbox.show();
		overlay.show();
		jQuery("#wysj-btpop-view-time").text(time);
		jQuery.each(jsonobj, function(index, val) {
			 html += "<tr>";
			 html += 	"<th>"+index+"</th>";
			 html += 	"<td>"+val+"</td>";
			 html += "<tr>";
		});
		jQuery("#wysj-btpop-view-tbody").empty().append(html);
		jQuery("#wysj-btpop-view-id").val(id);
	},
	del: function(ids, obj){
		if (confirm('确定要删除吗？')) {
			this.loading.show()
			var that = this
			jQuery.ajax({
				url: wysjAdminPopBase.ajaxurl,
				type: 'POST',
				data: {
					action: 'wysj_bt_pop_delitem',
					id: ids
				},
				success: function(data){
					if (data > 0) {
						alert("删除成功");
						jQuery(obj).parent().parent().remove();
					}
					that.loading.hide()
				}
			});
		}	
	},
	deleteMulti: function(){
		var checked = jQuery(".bp-item-check:checked");
		if (checked.length == 0) {
			alert("请先选择留言")
			return
		};
		if (confirm('确定要删除吗？')) {
			var id = '';
			jQuery.each(checked, function(index, val) {
				 id += jQuery(val).val() + ',';
			});
			id = id.substring(0, id.length-1)
			this.loading.show()
			var that = this
			jQuery.ajax({
				url: wysjAdminPopBase.ajaxurl,
				type: 'POST',
				data: {
					action: 'wysj_bt_pop_delitem',
					id: id
				},
				success: function(data){
					that.loading.hide()
					if (data > 0) {
						alert("删除成功");
						window.location.reload();
					}
				}
			});
		}
	},
	delForm: function(me){
		jQuery(me).parent().parent().remove();
	},
	viewRead: function(){
		var id = jQuery("#wysj-btpop-view-id").val();
		this.read(id);
	},
	viewDel: function(){
		var id = jQuery("#wysj-btpop-view-id").val();
		if (confirm('确定要删除吗？')) {
			this.loading.show()
			var that = this
			jQuery.ajax({
				url: wysjAdminPopBase.ajaxurl,
				type: 'POST',
				data: {
					action: 'wysj_bt_pop_delitem',
					id: id
				},
				success: function(data){
					that.loading.hide()
					if (data > 0) {
						alert("删除成功");
						window.location.reload();
					}
				}
			});
		}
	},
	setCookie:function (c_name,value,expiredays,path){
        var exdate=new Date();
        exdate.setDate(exdate.getDate()+expiredays);
        document.cookie= c_name+ "=" +escape(value)+((expiredays==null) ? "" : ";expires="+exdate.toGMTString())+((path==null) ? "" : ";path="+path);
    },
    getCookie:function(c_name){
        if (document.cookie.length>0){
            c_start=document.cookie.indexOf(c_name + "=");
            if (c_start!=-1){ 
                c_start=c_start + c_name.length+1;
                c_end=document.cookie.indexOf(";",c_start);
                if (c_end==-1) 
                    c_end=document.cookie.length;
                    return unescape(document.cookie.substring(c_start,c_end));
            } 
        }
        return "";
    },
	loading: {
		show: function(){ 
			jQuery('body').append('<div id="wysj-bp-loading"><div class="wysj-bp-loading-icon"></div></div>')
		},
		hide: function(){
			jQuery("#wysj-bp-loading").hide('slow', jQuery("#wysj-bp-loading").remove())
		}
	},
	editable: function(){
		jQuery("#check-btpopkey").attr('disabled', false)
		this.setCookie('wysj-btpop-checked', '', -1, '/')
	},
	export: function(){
		jQuery.ajax({
			url: wysjAdminPopBase.ajaxurl,
			type: 'POST',
			data: {
				action: 'wysj_bt_pop_export'
			},
			success: function(msg){
				console.log(msg)
			}
		})
	}
}
jQuery(function() {
	//根据情况显示隐藏表单
	var popType = jQuery("#wysj_btpop_type").val()
	if(popType == "pop"){
		jQuery(".wysj-type-pop").show()
		jQuery(".wysj-type-inside").hide()
	}else{
		jQuery(".wysj-type-pop").hide()
		jQuery(".wysj-type-inside").show()
	}
	jQuery("#wysj_btpop_type").on("change", function(){
		var popType = jQuery("#wysj_btpop_type").val()
		if(popType == "pop"){
			jQuery(".wysj-type-pop").show()
			jQuery(".wysj-type-inside").hide()
		}else{
			jQuery(".wysj-type-pop").hide()
			jQuery(".wysj-type-inside").show()
		}
	})
	var tabItem = jQuery('.wy-tab-item a');
	var tabCon = jQuery('.wy-tab-content .wy-con-item');
	//选项卡切换
	tabItem.on('click',  function(event) {
		tabItem.removeClass('active');
		tabCon.removeClass('active');
		jQuery(this).addClass('active');
		tabCon.eq(jQuery(this).attr('index')).addClass('active');
	});
	//表单增删
	jQuery('.wy-pop-addForm').on('click', function(event) {
		var html = ''
		var time = Date.parse(new Date()) / 1000
		html += '<tr>'
		html += 	'<td><span class="wysj_btpop_draggable" title="拖动排序"></span></td>'
		html += 	'<td><label>表单标签：</label><input type="text" name="wysj_btpop_formLabel[]" value=""></td>'
		html += 	'<td>'
		html += 		'<label>表单类型：</label>'
		html += 		'<select name="wysj_btpop_formType[]">'
		html += 			'<option value="text">单行文本</option>'
		html += 			'<option value="textarea">多行文本</option>'
		html += 			'<option value="select">单选下拉菜单</option>'
		html += 			'<option disabled value="multiselect">多选下拉菜单(需升级完整版)</option>'
		html += 			'<option disabled value="radio">单选按钮(需升级完整版)</option>'
		html += 			'<option disabled value="date">日期(需升级完整版)</option>'
		html += 			'<option disabled value="datetime">日期加时间(需升级完整版)</option>'
		html += 			'<option disabled value="city">城市选择器(需升级完整版)</option>'
		html += 		'</select>'
		html += 		'<input type="hidden" name="wysj_btpop_formName[]" value="wysj_btpop_'+time+'">'
		html += 	'</td>'
		html += 	'<td><label>默认内容：</label><input type="text" name="wysj_btpop_formContent[]" value=""></td>'
		html += 	'<td>'
		html += 		'<label>表单宽度：</label>'
		html += 		'<select name="wysj_btpop_formWidth[]">'
		html += 			'<option value="one">1行</option>'
		html += 			'<option value="two">1/2行</option>'
		html += 			'<option disabled value="three">1/3行(需升级完整版)</option>'
		html += 			'<option disabled value="threeTwo">2/3行(需升级完整版)</option>'
		html += 			'<option disabled value="four">1/4行(需升级完整版)</option>'
		html += 		'</select>'
		html += 	'</td>'
		html += 	'<td>'
		html += 		'<label>是否必填：</label>'
		html += 		'<select name="wysj_btpop_required[]">'
		html += 			'<option value="required">必填项</option>'
		html += 			'<option value="unrequired">非必填</option>'
		html += 		'</select>'
		html += 	'</td>'
		html += 	'<td><button class="button-primary wy-pop-delForm" onclick="wysjPopAdmin.delForm(this)">删除表单</button></td>'
		html += '</tr>'
		jQuery('#wysj-btpop-form-list').append(html);
	});
	jQuery(".wysj-btpop-view-close").on('click', function(event) {
		jQuery("#wysj-btpop-view, #wysj-btpop-view-overlay").hide();
	});
	//表单排序
	jQuery("#wysj-btpop-form-list").sortable({
		placeholder: "ui-state-highlight",
		handle: ".wysj_btpop_draggable"
	});
	jQuery('#wysj-btpop-adimg-btn').on('click',function(event){
		var wysj_upload_frame;
        event.preventDefault();
        if( wysj_upload_frame ){   
            wysj_upload_frame.open();   
            return;   
        }
        wysj_upload_frame = wp.media({   
            title: '插入图片',   
            button: {   
                text: '插入',   
            },   
            multiple: false   
        });
        wysj_upload_frame.on('select',function(){   
            var attachment = wysj_upload_frame.state().get('selection').first().toJSON();
            jQuery('#wysj-btpop-adimg-input').val(attachment.url);
            jQuery('#wysj-btpop-adimg-img').attr("src", attachment.url);
        });    
        wysj_upload_frame.open();   
    });
    jQuery('#wysj-btpop-closeimg-btn').on('click',function(event){
		var wysj_upload_frame;
        event.preventDefault();
        if( wysj_upload_frame ){   
            wysj_upload_frame.open();   
            return;   
        }
        wysj_upload_frame = wp.media({   
            title: '插入图片',   
            button: {   
                text: '插入',   
            },   
            multiple: false   
        });
        wysj_upload_frame.on('select',function(){   
            var attachment = wysj_upload_frame.state().get('selection').first().toJSON();
            jQuery('#wysj-btpop-closeimg-input').val(attachment.url);
            jQuery('#wysj-btpop-closeimg-img').attr("src", attachment.url);
        });    
        wysj_upload_frame.open();   
	});
	
	//提交表单
	jQuery(".wysj-pop-save").on('click', function(event) {
		event.preventDefault();
		jQuery("input[name=wysj_btpop_cssVer]").val(new Date().getTime());
		jQuery.ajax({
			url: '',
			type: 'POST',
			data: jQuery('#wy-pop-form').serialize(),
			beforeSend: function(){
				jQuery(".wysj-pop-save").attr('disabled', true);
				jQuery("#wysj-dialog").addClass('show').children('.wysj-dialog-content').html('正在保存，请稍候...');
			},
			success: function(data) {
               	jQuery("#wysj-dialog").children('.wysj-dialog-content').html('保存成功！');
               	var timer = setTimeout(function(){jQuery("#wysj-dialog").removeClass('show')},1000);
            },
            error: function(){

            },
            complete: function(){
            	jQuery(".wysj-pop-save").attr('disabled', false);
            }
		});
		
	});
	
});