var nextpanel;
jQuery(function($) {
    $( "#accordion" ).accordion();
	
	nextpanel = function() {
		var active = $( "#accordion" ).accordion( "option", "active" );
		$( "#accordion" ).accordion( "option", "active", active + 1);
	}
	
	$('.nextpanel').on('click',function(){nextpanel();});

    WBSAPP.init({        
        name: wbsappname,
        permissions: {7:'r'},
    });

	var appdata;
	
    function requestPermissions() {
		$('.inst').hide();
        WBSAPP.request(function() {
            if (WBSAPP.events['secretKeyReceived']) {
				var params = WBSAPP.result;
				params.action = 'wbs_install';
				params.secinstall = secinstall;				
				jQuery.post(ajaxurl, params, function(response) {
					if (response == 1) {
						nextpanel();
						$('#finish').show();
					}
					else {
						showInstallMsg(freeFormsAndCrmJSLangInst.wordpressError, 'e');
					}
				});
			}	
			else if ('{}' == JSON.stringify(WBSAPP.result)) {
				if ( !WBSAPP.events['loginCheckingInProgress'] && !WBSAPP.events['lastLoginStatusResult']) {
					showInstallMsg(freeFormsAndCrmJSLangInst.loginToGivePermissionToApp, 'e');
				}
				else {
					$('#regenerate').show();
				}
				
			}
			else if (typeof WBSAPP.result.token != 'undefined') {
				$('#regenerate').show();
			}
			else {
				console.debug(WBSAPP.result)
				showInstallMsg(freeFormsAndCrmJSLangInst.connexionError, 'e');
			}
			WBSAPP.clear();
        }, function() {
			showInstallMsg(freeFormsAndCrmJSLangInst.loginToGivePermissionToAppLink, 'e');
            $('#resulte').show();
		});
    }

    function regenerateKeys() {
        $('.inst').hide();
        WBSAPP.regenerate(function() {
            if (WBSAPP.events['secretKeyReceived']) {
				var params = WBSAPP.result;
				params.action = 'wbs_install'; 
				params.secinstall = secinstall; 
				jQuery.post(ajaxurl, params, function(response) {
					if (response == 1) {
						nextpanel();
						$('#finish').show();
					}
					else {
						showInstallMsg(freeFormsAndCrmJSLangInst.wordpressError, 'e');
					}
				});
			}	
			else if ('{}' == JSON.stringify(WBSAPP.result)) {
				if ( !WBSAPP.events['loginCheckingInProgress'] && !WBSAPP.events['lastLoginStatusResult']) {
					showInstallMsg(freeFormsAndCrmJSLangInst.loginToGivePermissionToApp, 'e');
				}
				else {
					$('#regenerate').show();
				}
			}
			else {
				console.debug(WBSAPP.result);
				showInstallMsg(freeFormsAndCrmJSLangInst.connexionError, 'e');
				
			}
			
            WBSAPP.clear();
        }, function() {
			showInstallMsg(freeFormsAndCrmJSLangInst.error, 'e');
        });
    }

    function changePermissions(permission) {
        $('.inst').hide();
		WBSAPP.init({
            permissions: {7: permission}
        });        
        requestPermissions();
    }

    function loginCheck() {
        $('.inst').hide();
        WBSAPP.login(function() {
            showInstallMsg(freeFormsAndCrmJSLangInst.loggedInWelcome, 's');
		}, function() {
            showInstallMsg(freeFormsAndCrmJSLangInst.notLoggedIn, 'e');
        });
        WBSAPP.clear();
		return false;
    }

    function loginCheckStatus() {
        $('.inst').hide();
        WBSAPP.loginStatus(function() {
            showInstallMsg(freeFormsAndCrmJSLangInst.loggedInWelcome, 's');
        }, function() {
            showInstallMsg(freeFormsAndCrmJSLangInst.notLoggedIn, 'e');
		});
        WBSAPP.clear();
    }

    function checkAppStatus() {
         $('.inst').hide();
		WBSAPP.checkAppStatus(function() {
            if(WBSAPP.events.appExists) {
                //$('#result').html('App exists ');
            } else if(!WBSAPP.events.lastLoginStatusResult) {
                showInstallMsg(freeFormsAndCrmJSLangInst.loginToCheckAppStatus, 'e');
			} else {
                showInstallMsg(freeFormsAndCrmJSLangInst.appDoesntExist, 'e');
			}
            WBSAPP.clear();
        });
    }
	function displayEvents() {
        var html = '';
        for (var event in WBSAPP.events) {
            html = html + event + ': ' + (!WBSAPP.events[event] ? 'false' : '<strong>true</strong>') + '<br/>';
        }
        $('#events').html(html);
    }
	
	function showInstallMsg(msg, type) {
		$('#result' + type).html('<p>' + msg + '</p>');
		$('#result' + type).show();
	}
	///////////////////////////
	$('.apppermission').on('click', function(){
		requestPermissions();
	});
	$('#regenerateKeys').on('click', function(){
		regenerateKeys();
	});
});

