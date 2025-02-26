function loginCheck() {
	WBSAPP.init({        
		name: 'wbsappname'
	})
	WBSAPP.login(function() {
		jQuery.post(ajaxurl, {
			token: WBSAPP.result.token,
			action: 'wbs_post_login'
		}, function(response) {
			if (response == '{res:1}') {
				showInstallMsg(freeFormsAndCrmJSLangInst.loggedInWelcome, 's');
				try {
					var wbsnotice = document.getElementById('wbs-login-notice');
					wbsnotice.style.display = 'none';
				}
				catch(e){}
				try {
					window.tb_remove();
				}
				catch(e){}
			}
			else {
				showInstallMsg(freeFormsAndCrmJSLangInst.wordpressError, 'e');
			}
		});
	}, function() {
		try{
			var wbsnotice = document.getElementById('wbs-login-notice');
			wbsnotice.style.display = '';
		}
		catch(e){}
		showInstallMsg(freeFormsAndCrmJSLangInst.notLoggedIn, 'e');
		return false;
	});
	WBSAPP.clear();
	return false;
}

function loginCheckStatus() {
	WBSAPP.loginStatus(function() {
		jQuery.post(ajaxurl, {
			token: WBSAPP.result.token,
			action: 'wbs_post_login'
		}, function(response) {
			if (response == '{res:1}') {
				showInstallMsg(freeFormsAndCrmJSLangInst.loggedInWelcome, 's');
				try {
					var wbsnotice = document.getElementById('wbs-login-notice');
					wbsnotice.style.display = 'none';
				}
				catch(e){}
				try {
					window.tb_remove();
				}
				catch(e){}
			}
			else {
				showInstallMsg(freeFormsAndCrmJSLangInst.wordpressError, 'e');
			}
		});
	}, function() {
		showInstallMsg(freeFormsAndCrmJSLangInst.notLoggedIn, 'e');
	});
	WBSAPP.clear();
}

function showInstallMsg(msg, type){
	//console.log(type + ' ' + msg)
}

function updateFormInfo($param) {
	alert($param);
}

jQuery(document).ready(function($) {
	loginCheckStatus();
});	
