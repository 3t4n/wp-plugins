
/* JS EXTENSION
 * setCategoryManage.js
 */


jQuery(document).ready(function(){
    flg_apm.setCategoryManage.init();
    flg_apm.setCategoryManage.initClicks();
    f=$('#do_sending_test');
//$(f).val('');
});


flg_apm.setCategoryManage=new flg_apm.setField('setCategoryManage','.c_setCategoryManage');


flg_apm.setCategoryManage.during_create=function(fi,obj){
	
    return fi;
}

flg_apm.setCategoryManage.postcreate=function(fi,obj){
	flg_apm.setCategoryManage.loadDataGrid();
}

flg_apm.setCategoryManage.loadDataGrid=function(){
	var post_ID = $('#post_ID').val();
	var tabbody = $('[data-field="managecatfield"] .apm_tablebody');
	$(tabbody).html(my_extensions_views['setCategoryManage_loading'].tpl);
	flg_apm.setAlertPanel.addAlert('Loading','Loading categories, please wait','',2000);
	$.ajax({
		url: ajaxurl ,
		type: "POST",
		data: "subaction=getCategoryManageData&action=apm_extensions&entity=setCategoryManageCls&post_ID="+post_ID,
		error: function(data){
			flg_apm.setAlertPanel.addAlert('Loading Issue','An error appeared while loading...','error',5000);
		},
		success: function(data){
			data_array = $.parseJSON(data);
			$(tabbody).html('');
			if(data_array.status){
				if(data_array.data_count > 0){
					flg_apm.setCategoryManage.showRowCategory(tabbody,data_array.data_arr, 0);
					flg_apm.setAlertPanel.addAlert('Loaded successfully','Loaded '+data_array.data_count+' categories loaded','ok',3000);
				}else{
					$(tabbody).html(my_extensions_views['setCategoryManage_nocategories'].tpl);
					flg_apm.setAlertPanel.addAlert('Loaded successfully','0 categories loaded','ok',3000);
				}
				
				flg_apm.setCategoryManage.initClicks();
			}else{
				flg_apm.setAlertPanel.addAlert('Loading Issue',data_array.data_arr,'error',5000);
			}
		}
	});
}

flg_apm.setCategoryManage.showSelectCategory = function (tmpSelect, lv , tmp_selParent){
	tmp_option = '';
	$.each(tmpSelect,function(i,o){
		if(tmp_selParent == o.name)
			selected = 'selected';
		else
			selected = '';
		if(lv == 0)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>'+o.name+'</option>';
		if(lv == 1)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>--'+o.name+'</option>';
		if(lv == 2)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>----'+o.name+'</option>';
		if(lv == 3)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>------'+o.name+'</option>';
		if(lv == 4)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>--------'+o.name+'</option>';
		if(lv == 5)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>--------'+o.name+'</option>';
		if(lv == 6)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>----------'+o.name+'</option>';
		if(lv == 7)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>------------'+o.name+'</option>';
		if(lv == 8)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>--------------'+o.name+'</option>';
		if(lv == 9)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>----------------'+o.name+'</option>';
		if(lv >= 10)
			tmp_option += '<option value="'+o.term_id+'" '+selected+'>------------------'+o.name+'</option>';
		
		if(o.childs != undefined)
			tmp_option += flg_apm.setCategoryManage.showSelectCategory(o.childs , lv+1 , tmp_selParent);
	});
	return tmp_option;
}

flg_apm.setCategoryManage.showRowCategory = function(tabbody,tmpSelect, lv){
	$.each(tmpSelect,function(i,o){		
		var basestr=my_extensions_views['setCategoryManage_row'].tpl;
		rowstr=basestr;
		rowarr=rowstr.split('[[id_category]]');
		rowstr=rowarr.join(o.term_id);
		
		rowarr=rowstr.split('[[name_category_top]]');
		rowstr=rowarr.join(o.name);
		
		rowarr=rowstr.split('[[name_category]]');
		//rowstr=rowarr.join(o.name);
		if(lv == 0)
			rowstr=rowarr.join(o.name);
		if(lv == 1)
			rowstr=rowarr.join('--'+o.name);
		if(lv == 2)
			rowstr=rowarr.join('----'+o.name);
		if(lv == 3)
			rowstr=rowarr.join('------'+o.name);		
		if(lv == 4)
			rowstr=rowarr.join('--------'+o.name);
		if(lv == 5)
			rowstr=rowarr.join('----------'+o.name);
		if(lv == 6)
			rowstr=rowarr.join('------------'+o.name);
		if(lv == 7)
			rowstr=rowarr.join('--------------'+o.name);
		if(lv == 8)
			rowstr=rowarr.join('----------------'+o.name);
		if(lv == 9)
			rowstr=rowarr.join('------------------'+o.name);
		if(lv >= 10)
			rowstr=rowarr.join('--------------------'+o.name);
		
		
		rowarr=rowstr.split('[[description_category]]');
		rowstr=rowarr.join(o.description);
		
		rowarr=rowstr.split('[[parent_category]]');
		parent_category = $('[data-field="managecatfield"] [data-row_id="'+o.parent+'"]').find('a').text();
		if(parent_category == '')
			parent_category = '-';
		else{
			if(parent_category.indexOf('------') == 0)
				parent_category = parent_category.substring(6,parent_category.length);
			if(parent_category.indexOf('----') == 0)
				parent_category = parent_category.substring(4,parent_category.length);
			if(parent_category.indexOf('--') == 0)
				parent_category = parent_category.substring(2,parent_category.length);
		}
		rowstr=rowarr.join(parent_category);
		
		$(tabbody).append(rowstr);
		
		if(o.childs != undefined)
			flg_apm.setCategoryManage.showRowCategory(tabbody,o.childs , lv+1);
	});
}

flg_apm.setCategoryManage.initClicks=function(){

    $('.add_mailcateg').off('click').on('click',function(){
        gloWin= flg_apm.c_create_globalModalWin();
        var cont=my_extensions_views['setCategoryManage_add'].tpl;
        cont=cont.replace(/{{value}}/g, '');
        cont=cont.replace(/{{description}}/g, '');
        flg_apm.c_init_globalModalWin(gloWin,{
            title:"Add an email category",
            actionTitle:'Add',
            content:cont,
            actionClass:'do_add_mailcateg'
        });

        gloWin.modal('show');
		
		var post_ID = $('#post_ID').val();
		$.ajax({
			url: ajaxurl ,
			type: "POST",
			data: "subaction=getCategoryManageData&action=apm_extensions&entity=setCategoryManageCls&post_ID="+post_ID,
			error: function(data){
				flg_apm.setAlertPanel.addAlert('Loading Issue','An error appeared while loading...','error',5000);
			},
			success: function(data){
				data_array = $.parseJSON(data);
				if(data_array.status){
					var tmp_option = '<option value="0">--None--</option>';
					
					tmp_option += flg_apm.setCategoryManage.showSelectCategory(data_array.data_arr , 0 , '');
					
					$('.parentcateg',gloWin).html(tmp_option);
				}else{
					flg_apm.setAlertPanel.addAlert('Loading Issue',data_array.data_arr,'error',5000);
				}
			}
		});
		flg_apm.setCategoryManage.initClicks();
    });
	
    $('.do_add_mailcateg').off('click').on('click',function(){
		// /*
		var addcateg_name = $('.addcateg_name').val();
		var tagcateg = $('.tagcateg').val();
		var parentcateg = $('.parentcateg').val();
		var descriptcateg = $('.descriptcateg').val();
		var post_ID = $('#post_ID').val();
		
		if(addcateg_name == ""){
			flg_apm.setAlertPanel.addAlert('Error','Please fill the required category name','error',2000);
			return false;
		}
		$('.modal_global_alert').html('Submitting... ');
		$.ajax({
			url: ajaxurl ,
			type: "POST",
			data: "subaction=addCategorymail&action=apm_extensions&entity=setCategoryManageCls&post_ID="+post_ID+"&addcateg_name="+addcateg_name+"&tagcateg="+tagcateg+"&parentcateg="+parentcateg+"&descriptcateg="+descriptcateg,
			error: function(data){
				console.log(data);
			},
			success: function(data){
				data_array = $.parseJSON(data);
				$('.modal_global_alert').html('');
				if(data_array.status){
					flg_apm.setCategoryManage.loadDataGrid();
					gloWin.modal('hide');
					flg_apm.setAlertPanel.addAlert('Add category','Add category success','ok',2000);
				}else
					flg_apm.setAlertPanel.addAlert('Error',data_array.data_arr,'error',2000);
			}
		});
		// */
		// flg_apm.c_init_saveAjaxCategForm(gloWin);
    });
	
    $('.edit_mailcateg').off('click').on('click',function(){
        gloWin= flg_apm.c_create_globalModalWin();
        var cont=my_extensions_views['setCategoryManage_add'].tpl;
		
        var tmp_name = $(this).html();
		if(tmp_name.indexOf('----') == 0)
			tmp_name = tmp_name.substring(4,tmp_name.length);
		if(tmp_name.indexOf('--') == 0)
			tmp_name = tmp_name.substring(2,tmp_name.length);
			
		cont=cont.replace(/{{value}}/g, tmp_name);
        cont=cont.replace(/{{description}}/g, $(this).parent().next().html());
        cont=cont.replace(/{{categoryMailID}}/g, $(this).parent().parent().attr('data-row_id'));
        flg_apm.c_init_globalModalWin(gloWin,{
            title:"Edit an email category",
            actionTitle:'Save',
            content:cont,
            actionClass:'do_save_mailcateg'
        });

        gloWin.modal('show');
		var post_ID = $('#post_ID').val();
		var tmp_selParent = $(this).parent().next().next().text();
		// console.debug(tmp_selParent);
		$.ajax({
			url: ajaxurl ,
			type: "POST",
			data: "subaction=getCategoryManageData&action=apm_extensions&entity=setCategoryManageCls&post_ID="+post_ID,
			error: function(data){
				flg_apm.setAlertPanel.addAlert('Loading Issue','An error appeared while loading...','error',5000);
			},
			success: function(data){
				data_array = $.parseJSON(data);
				if(data_array.status){
					var tmp_option = '<option value="0">--None--</option>';					
					
					tmp_option += flg_apm.setCategoryManage.showSelectCategory(data_array.data_arr , 0 , tmp_selParent);
					
					$('.parentcateg',gloWin).html(tmp_option);
				}else{
					flg_apm.setAlertPanel.addAlert('Loading Issue',data_array.data_arr,'error',5000);
				}
			}
		});
		flg_apm.setCategoryManage.initClicks();
    });
	
    $('.do_save_mailcateg').off('click').on('click',function(){
		// /*
		var addcateg_name = $('.addcateg_name').val();
		var tagcateg = $('.tagcateg').val();
		var parentcateg = $('.parentcateg').val();
		var descriptcateg = $('.descriptcateg').val();
		var categoryMailID = $('.categoryMailID').val();
		var post_ID = $('#post_ID').val();
		
		if(addcateg_name == ""){
			flg_apm.setAlertPanel.addAlert('Error','Please fill the required category name','error',2000);
			return false;
		}
		$('.modal_global_alert').html('Submitting... ');
		$.ajax({
			url: ajaxurl ,
			type: "POST",
			data: "subaction=updateCategorymail&action=apm_extensions&entity=setCategoryManageCls&post_ID="+post_ID+"&addcateg_name="+addcateg_name+"&tagcateg="+tagcateg+"&parentcateg="+parentcateg+"&descriptcateg="+descriptcateg+"&categoryMailID="+categoryMailID,
			error: function(data){
				console.log(data);
			},
			success: function(data){
				console.debug(data);
				data_array = $.parseJSON(data);
				$('.modal_global_alert').html('');
				if(data_array.status){
					flg_apm.setCategoryManage.loadDataGrid();
					gloWin.modal('hide');
					flg_apm.setAlertPanel.addAlert('Add category','Add category success','ok',2000);
				}else
					flg_apm.setAlertPanel.addAlert('Error',data_array.data_arr,'error',2000);
			}
		});
		// */
    });
		
    $('.sel_mailcateg').off('click').on('click',function(){
		var status = $(this).attr('data-status');
		if(status == undefined){
			$('[data-field="managecatfield"] .apm_tablebody input').each(function(){
				$(this).attr('checked','checked');
			});
			$(this).attr('data-status', 'check');
		}else{
			$('[data-field="managecatfield"] .apm_tablebody input').each(function(){
				$(this).removeAttr('checked');
			});
			$(this).removeAttr('data-status');
		}
    });
		
    $('.del_mailcateg').off('click').on('click',function(){
		$('.chk_category:checked');
		if($('input.chk_category:checked').length == 0){
			flg_apm.setAlertPanel.addAlert('Selection empty','Please select at least one category.','warning');
		}else{
			num_category_select = $('input.chk_category:checked').length;
			strconf = 'Do you really want to delete '+num_category_select+' category(s)?';
			if(confirm(strconf)){
				var id_category_check = '';
				var arr_id_category_check = new Array();
				var arr_name_category_check = new Array();
				$('input.chk_category:checked').each(function(key,value){
					id_mail = $(value).parent().parent().parent().attr('data-row_id');
					id_category_check += id_mail + ',';
					arr_id_category_check.push(id_mail);
					arr_name_category_check.push($(value).parent().parent().parent().attr('data-row_name'));
				});
				id_category_check = id_category_check.substring(0 , id_category_check.length - 1);
				
				var tabbody = $('[data-field="managecatfield"] .apm_tablebody');
				$(tabbody).html(my_extensions_views['setCategoryManage_loading'].tpl);
				var post_ID = $('#post_ID').val();
				$.ajax({
					url: ajaxurl ,
					type: "POST",
					data: "subaction=deleteCategorymail&action=apm_extensions&entity=setCategoryManageCls&post_ID="+post_ID+"&categoryMailID="+id_category_check,
					error: function(data){
						flg_apm.setAlertPanel.addAlert('Loading Issue','An error appeared while loading...','error',5000);
					},
					success: function(data){
						flg_apm.setCategoryManage.loadDataGrid();
						data_array = $.parseJSON(data);
						if(!data_array.status){
							flg_apm.setAlertPanel.addAlert('Delete Category Issue','An error appeared while delete category...','error',5000);
						}else{
							$.each(arr_name_category_check , function(i,e){
								$('.c_setMailingBox table tr td:nth-child(4)').each(function(){
									if($(this).find('strong').html() == e){
										$(this).find('strong').html('-');
										$(this).find('a').attr('data-catid' , 0);
									}
								});
							});
							
						}
					}
				});
			}
		}
    });
		
    $('.refresh_mailcateg').off('click').on('click',function(){
		flg_apm.setCategoryManage.loadDataGrid();
    });
}
