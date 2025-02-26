
/* JS EXTENSION
 * setRelatedUser.js
 */


jQuery(document).ready(function(){
    flg_apm.setRelatedUser.init();
    flg_apm.setRelatedUser.initClicks();
    f=$('#do_sending_test');
//$(f).val('');
});


flg_apm.setRelatedUser=new flg_apm.setField('setRelatedUser','.c_setRelatedUser');


flg_apm.setRelatedUser.during_create=function(fi,obj){//
    if(flg_apm.related_user_id==0){
        fi.str=fi.str.replace(/{{relatedusername}}/g, 'No user related yet');
        fi.str=fi.str.replace(/{{userid}}/g, 0);
        fi.str=fi.str.replace(/{{toolt}}/g, 'Once a user will be related to this record you will be able to click here to open the user profile');
		fi.str=fi.str.replace(/{{hide}}/g, 'hide');
    }else{
        fi.str=fi.str.replace(/{{relatedusername}}/g, flg_apm.related_username);
        fi.str=fi.str.replace(/{{userid}}/g, flg_apm.related_user_id);
        fi.str=fi.str.replace(/{{toolt}}/g, 'Click to open the user profile');
        fi.str=fi.str.replace(/{{hide}}/g, '');

    }    //fi.str=fi.str.replace(/{{toolt}}/g, 'Click to open this user profile');

    return fi;
}
flg_apm.setRelatedUser.postcreate=function(fi,obj){
	flg_apm.setRelatedUser.initClicks();
	return fi;
    }


flg_apm.setRelatedUser.initClicks=function(){

	$('.highlight_userrelated').off('click').on('click',function(){
		window.location.href = '/wp-admin/user-edit.php?user_id='+$(this).attr('data-userid');
	});
	
	$('.do_delete_relationship').off('click').on('click',function(){
		console.debug('here');
		flg_apm.setAlertPanel.addAlert('Removing relationship','Removing relationship, please wait','',3000);
		var field = '&post_id='+post_id+'&userID='+flg_apm.related_user_id;	
		$.ajax({
			url: ajaxurl ,
			type: "POST",
			data: "subaction=deleteRelationshipLeadToUser&action=apm_extensions&entity=actionRelatedUserCls"+field,
			error: function(data){
				flg_apm.setAlertPanel.addAlert('Loading Issue','An error appeared while loading...','error',5000);
			},
			success: function(data){
				data_array = $.parseJSON(data);
				if(data_array.status){
					flg_apm.setAlertPanel.addAlert('Removing relationship','Removing relationship successfully','ok',3000);
					
					flg_apm.related_user_id=0;
					flg_apm.related_username='No user related yet';
					
					$('.c_setRelatedUser .highlight_userrelated').attr('data-userid',flg_apm.related_user_id);
					
					$('.c_setRelatedUser .highlight_userrelated').attr('data-title','Once a user will be related to this record you will be able to click here to open the user profile');
					
					$('.c_setRelatedUser .highlight_userrelated').text(flg_apm.related_username);
					
					$('.do_delete_relationship').addClass('hide');
					
				}else{
					flg_apm.setAlertPanel.addAlert('Related Issue',data_array.msg,'error',5000);
				}
				// gloWin.modal('hide');
			}
		});
	});

}
