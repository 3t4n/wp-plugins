/*!
 * This script contains general helper functions.
 * components menu of the back end is selected.
 *
 * @copyright    Copyright (C) 2014 - 2019 SecSign Technologies Inc. All rights reserved.
 * @license      GNU General Public License version 2 or later; see LICENSE.txt.
 */
jQuery.noConflict();

//enable SecSign Login forms if JS is enabled
jQuery("#secsignidplugin").css("display", "block");

jQuery(document).ready(function () {
    jQuery('#secsignidplugin').css('display', 'block');

    //disable PW login button
    jQuery('#secsignidplugin').find('#wp-submit').prop('disabled', true);

    //jump to registration
    if (jQuery("#secsignid-page-pww").length) {
        window.scrollTo(0, jQuery("#secsignidplugincontainer").offset().top);
    }

});

function switchToPasswordScreen()
{
	jQuery("#secsignid-page-pw").fadeIn(function(){
		//enable PW field because of changes in user-profile.js in Wordpress 5.3
		jQuery('#secsignidplugin').find('#user_pass').prop('disabled', false);
	});
}

//empty username & password check
jQuery('#secsignidplugin').find('#user_login').on('input', function () {
    if (jQuery(this).val().length > 0 && jQuery('#secsignidplugin').find('#user_pass').val().length > 0) {
        jQuery('#secsignidplugin').find('#wp-submit').prop('disabled', false);
    } else {
        jQuery('#secsignidplugin').find('#wp-submit').prop('disabled', true);
    }
});
jQuery('#secsignidplugin').find('#user_pass').on('input', function () {
    if (jQuery(this).val().length > 0 && jQuery('#secsignidplugin').find('#user_login').val().length > 0) {
        jQuery('#secsignidplugin').find('#wp-submit').prop('disabled', false);
    } else {
        jQuery('#secsignidplugin').find('#wp-submit').prop('disabled', true);
    }
});

//responsive layout
window.onload = function () {
    var secsignidplugin = document.getElementById("secsignidplugin");
    if (secsignidplugin != null) {
        responsive(secsignidplugin.offsetWidth);
    }
    frameOption(frameoption, backend);
};

window.addEventListener('resize', function () {
    var secsignidplugin = document.getElementById("secsignidplugin");
    if (secsignidplugin != null) {
        responsive(secsignidplugin.offsetWidth);
    }
});

function responsive(width) {
    // console.log('check responsive layout');
    if (width >= 250) {
        jQuery("#secsignidplugin").removeClass("miniview");
        jQuery("#secsignid-accesspass-container").removeClass("miniview");
        jQuery("#secsignid-accesspass-img").removeClass("miniview");
        jQuery("#secsignidplugin").css("padding", "30px");
    } else {
        jQuery("#secsignidplugin").addClass("miniview");
        jQuery("#secsignid-accesspass-container").addClass("miniview");
        jQuery("#secsignid-accesspass-img").addClass("miniview");
        jQuery("#secsignidplugin").css("padding", "15px");

    }
    frameOption(frameoption, backend);
}

function frameOption(frame, backend) {
    if (frame != 'frame' && !backend) {
        jQuery("#secsignidplugin").css("padding", "0").css("box-shadow", "none");
    }
}

//helper for clearing all input fields
function clearSecSignForm() {
    // reset old values in hidden fields
    jQuery("#secsignid-accesspass-form > input[name='secsigniduserid']").val("");
    jQuery("#secsignid-accesspass-form > input[name='secsignidrequestid']").val("");
    jQuery("#secsignid-accesspass-form > input[name='secsignidauthsessionid']").val("");

    // reset access path back to preload animated gif
    jQuery("#secsignid-accesspass-img").attr('src', secsignPluginPath + 'images/preload.gif');

    // reset all visible input fields
    jQuery("#secsignidplugin").find("input[type='text']").val("");
    jQuery("#secsignid-error").html("").css('display', 'none');

    //get Rememberme Cookie
    secsignid = docCookies.getItem('secsignRememberMe');
    if (secsignid) {
        jQuery("input[name='secsigniduserid']").val(secsignid);
    }
}

// shows an error message at the login page
function showErrorOnLoginform(errormessage, slide) {
    jQuery("#secsignid-page-accesspass").fadeOut(200, function(){
	    	jQuery("#secloginbtn").prop("disabled", false);
			jQuery("#secsignid-page-login").fadeIn();
			            
			var errorField = jQuery("#secsignid-error").text(errormessage);
			if(slide){
				errorField.slideDown();
			} else {
				errorField.fadeIn();
			}
    });
}

// Cookie handling for remember me checkbox and secsign/password login
var docCookies = {
    getItem: function (sKey) {
        if (!sKey) {
            return null;
        }
        return decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*([^;]*).*$)|^.*$"), "$1")) || null;
    },
    setItem: function (sKey, sValue, vEnd, sPath, sDomain, bSecure) {
        if (!sKey || /^(?:expires|max\-age|path|domain|secure)$/i.test(sKey)) {
            return false;
        }
        var sExpires = "";
        if (vEnd) {
            switch (vEnd.constructor) {
                case Number:
                    sExpires = vEnd === Infinity ? "; expires=Fri, 31 Dec 9999 23:59:59 GMT" : "; max-age=" + vEnd;
                    break;
                case String:
                    sExpires = "; expires=" + vEnd;
                    break;
                case Date:
                    sExpires = "; expires=" + vEnd.toUTCString();
                    break;
            }
        }
        document.cookie = encodeURIComponent(sKey) + "=" + encodeURIComponent(sValue) + sExpires + (sDomain ? "; domain=" + sDomain : "") + (sPath ? "; path=" + sPath : "") + (bSecure ? "; secure" : "");
        return true;
    },
    removeItem: function (sKey, sPath, sDomain) {
        if (!this.hasItem(sKey)) {
            return false;
        }
        document.cookie = encodeURIComponent(sKey) + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT" + (sDomain ? "; domain=" + sDomain : "") + (sPath ? "; path=" + sPath : "");
        return true;
    },
    hasItem: function (sKey) {
        if (!sKey) {
            return false;
        }
        return (new RegExp("(?:^|;\\s*)" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=")).test(document.cookie);
    },
    keys: function () {
        var aKeys = document.cookie.replace(/((?:^|\s*;)[^\=]+)(?=;|$)|^\s*|\s*(?:\=[^;]*)?(?:\1|$)/g, "").split(/\s*(?:\=[^;]*)?;\s*/);
        for (var nLen = aKeys.length, nIdx = 0; nIdx < nLen; nIdx++) {
            aKeys[nIdx] = decodeURIComponent(aKeys[nIdx]);
        }
        return aKeys;
    }
};

//Load SecSignID API
jQuery.getScript(secsignPluginPath + "jsApi/SecSignIDApi.js", function () {

    //Polling
    var timeUntilAuthSessionCheck = 3700;
    var checkSessionStateTimerId = -1;
    var cancelPressedBeforeAuthSessionRetrieved = false;

    function checkSecSignIdAuthSessionState() {
		new SecSignIDApi({posturl: apiurl}).getAuthSessionState({
            'secsignid' : jQuery("input[name='secsigniduserid']").val(),
            'requestid' : jQuery("input[name='secsignidrequestid']").val(),
            'authsessionid' : jQuery("input[name='secsignidauthsessionid']").val(),
            'callbackFunction' : function(responseMap) {
                if (responseMap) {
                    // check if response map contains error message or if authentication state could not be fetched from server.
                    if ("errormsg" in responseMap) {
                        //enable buttons
                        jQuery("#secloginbtn").prop("disabled", false);
                        return;
                    } else if (!("authsessionstate" in responseMap)) {
                        return;
                    }
                    if (responseMap["authsessionstate"] == undefined || responseMap["authsessionstate"].length < 1) {
                        // got answer without an auth session state. this is not parsable and will throw the error UNKNOWN
                        return;
                    }

                    // everything okay. authentication state can be checked...
                    var authSessionStatus = parseInt(responseMap["authsessionstate"]);
                    var SESSION_STATE_NOSTATE = 0;
                    var SESSION_STATE_PENDING = 1;
                    var SESSION_STATE_EXPIRED = 2;
                    var SESSION_STATE_AUTHENTICATED = 3;
                    var SESSION_STATE_DENIED = 4;
                    var SESSION_STATE_SUSPENDED = 5;
                    var SESSION_STATE_CANCELED = 6;
                    var SESSION_STATE_FETCHED = 7;
                    var SESSION_STATE_INVALID = 8;

                    // 3 Login, 24568 show error, 017 do nothing
                    if (authSessionStatus == SESSION_STATE_AUTHENTICATED) {
                        //
                        //Log In
                        //
                        jQuery("#secsignid-accesspass-form").submit();

                    } else if (authSessionStatus == SESSION_STATE_PENDING || authSessionStatus == SESSION_STATE_FETCHED) {
                        //
                        // user did not authenticate nor denied the session. so we need to check again the authentication session state
                        //
                        checkSessionStateTimerId = window.setTimeout(checkSecSignIdAuthSessionState, timeUntilAuthSessionCheck);

                    } else if ((authSessionStatus == SESSION_STATE_DENIED) || (authSessionStatus == SESSION_STATE_EXPIRED) ||
                        (authSessionStatus == SESSION_STATE_SUSPENDED) || (authSessionStatus == SESSION_STATE_INVALID) ||
                        (authSessionStatus == SESSION_STATE_CANCELED)) {

                        //Show Error
                        jQuery("#secsignid-page-accesspass").fadeOut(
                            function () {
                                var secsignid = jQuery("input[name='secsigniduserid']").val();
                                var requestId = jQuery("input[name = 'secsignidrequestid']").val();
                                var authsessionId = jQuery("input[name = 'secsignidauthsessionid']").val();

                                //error message
                                var errormsg = "";
                                if (authSessionStatus == SESSION_STATE_DENIED) {
                                    errormsg = "SecSign ID session denied.";
                                } else if (authSessionStatus == SESSION_STATE_EXPIRED) {
                                    errormsg = "SecSign ID session expired.";
                                } else if (authSessionStatus == SESSION_STATE_SUSPENDED) {
                                    errormsg = "SecSign ID session suspended.";
                                } else if (authSessionStatus == SESSION_STATE_INVALID) {
                                    errormsg = "SecSign ID session invalid.";
                                } else if (authSessionStatus == SESSION_STATE_CANCELED) {
                                    errormsg = "SecSign ID session canceled.";
                                }

                                // check if response map contains message.
                                if ("message" in responseMap) {
                                    errormsg = responseMap["message"];
                                }

                                clearSecSignForm();
                                jQuery("#secsignid-page-login").fadeIn();
                                jQuery("#secloginbtn").prop("disabled", false);
                                jQuery("#secsignid-error").html(errormsg).fadeIn();

                                // actually no need to cancel an already invalid session
                                // new SecSignIDApi({posturl: apiurl}).cancelAuthSession({'secsignid' : secsignid, 'requestid' : requestId, 'authsessionid' : authsessionId});
                            }
                        );
                    }
                }
            }
        }); // end of api function getAuthSessionState
    }; // end of function checkSecSignIdAuthSessionState

    //Polling timeout
    for (var timerId = 1; timerId < 5000; timerId++) {
        clearTimeout(timerId);
    }
    jQuery(document).ready(function (event) {

        clearSecSignForm();

        /* Button & page logic*/
        jQuery("#secsignid-pw").click(function (event) {
            event.preventDefault();
            jQuery("#secsignid-page-login").fadeOut(
                function () {
                    docCookies.setItem('secsignLoginPw', 'true', 2592000);
                    switchToPasswordScreen();
                }
            );
        });

        jQuery("#secsignid-login-secsignid").click(function (event) {
            event.preventDefault();
            jQuery("#secsignid-page-pw").fadeOut(
                function () {
                    docCookies.setItem('secsignLoginPw', false, 2592000);
                    jQuery("#secsignid-page-login").fadeIn();
                }
            );
        });

        jQuery("#secsignid-infobutton").click(function (event) {
            event.preventDefault();
            jQuery("#secsignid-page-login").fadeOut(
                function () {
                    jQuery("#secsignid-page-info").fadeIn();
                }
            );
        });

        jQuery("#secsignid-info-secsignid").click(function (event) {
            event.preventDefault();
            jQuery("#secsignid-page-info").fadeOut(
                function () {
                    jQuery("#secsignid-page-login").fadeIn();
                }
            );
        });

        jQuery("#secsignid-questionbutton").click(function (event) {
            event.preventDefault();
            jQuery("#secsignid-page-accesspass").fadeOut(
                function () {
                    jQuery("#secsignid-page-question").fadeIn();
                }
            );
        });

        jQuery("#secsignid-question-secsignid").click(function (event) {
            event.preventDefault();
            jQuery("#secsignid-page-question").fadeOut(
                function () {
                    jQuery("#secsignid-page-accesspass").fadeIn();
                }
            );
        });

        /* Cancel Session */
        jQuery("#secsignid-cancelbutton").click(function (event) {
            event.preventDefault();
            jQuery("#secsignid-page-accesspass").fadeOut(
                function () {
                    var secsignid = jQuery("input[name='secsigniduserid']").val();
                    var requestId = jQuery("input[name = 'secsignidrequestid']").val();
                    var authsessionId = jQuery("input[name = 'secsignidauthsessionid']").val();

                    clearSecSignForm();
                    jQuery("#secsignid-page-login").fadeIn();
                    jQuery("#secloginbtn").prop("disabled", false);

                    if (!requestId) {
                        cancelPressedBeforeAuthSessionRetrieved = true;

                        // we cannot cancel a session because we dont have any request id.
                        // this will be handled in callback function of requestAuthSession where 'cancelPressedBeforeAuthSessionRetrieved' is checked.
                        return;
                    }

                    new SecSignIDApi({posturl: apiurl}).cancelAuthSession({'secsignid' : secsignid, 
											      'requestid' : requestId, 
											      'authsessionid' : authsessionId,
											      'callbackFunction' : function(responseMap) {
																		// clear timeout
																		window.clearTimeout(checkSessionStateTimerId);
                    								}
                    });
                }
            );
        });

        /* Accesspass */
        jQuery("#secsignid-loginform").submit(function (event) {

                //disable button to prevent frozen state
                jQuery("#secloginbtn").prop("disabled", true);

                //load Accesspass with preloader
                event.preventDefault();
                var secsignid = jQuery("input[name='secsigniduserid']").val();
                cancelPressedBeforeAuthSessionRetrieved = false;

                if (secsignid == "") {
                    // error - back to login screen
                    showErrorOnLoginform(nosecsignid, true);
                } else if(!SecSignIDApi.checkSecSignId(secsignid)){
                    showErrorOnLoginform(novalidsecsignid, true);
                } else {

                    // if remember me is clicked, set cookie otherwise delete
                    if (jQuery('#rememberme').is(':checked')) {
                        docCookies.setItem('secsignRememberMe', secsignid, 2592000);
                    } else {
                        docCookies.removeItem('secsignRememberMe');
                    }

                    // first off all, reset access pass page
                    jQuery("#secsignid-accesspass-img").attr('src', secsignPluginPath + 'images/preload.gif');

                    // fade out login and show access pass page
                    jQuery("#secsignid-page-login").fadeOut(
                        function () {
                            jQuery("#secsignid-page-accesspass").fadeIn();
                            jQuery("#accesspass-secsignid").text(secsignid);
                        }
                    );

                    // request auth session
                    // to debug class object: alert(JSON.stringify(secSignIDApi));
                    new SecSignIDApi({posturl: apiurl, pluginname: "wordpress"}).requestAuthSession({
                    	'secsignid' : secsignid, 
                    	'servicename' : title, 
                    	'serviceaddress' : url,
                    	'callbackFunction' : function(responseMap) {
                    	
								if ("errormsg" in responseMap) {
									// error - back to login screen
									showErrorOnLoginform(responseMap["errormsg"])
								} else {
									if ("authsessionicondata" in responseMap && responseMap["authsessionicondata"] != '') {
										// check whether cancel was pressed to fast?
										if (cancelPressedBeforeAuthSessionRetrieved) {
											// cancel this session straight away
											// other possibility could be: switch back to access path view...
											new SecSignIDApi({posturl: apiurl}).cancelAuthSession({'secsignid' : responseMap["secsignid"], 
																								   'requestid' : responseMap["requestid"], 
																								   'authsessionid' : responseMap["authsessionid"]});
											cancelPressedBeforeAuthSessionRetrieved = false;
											return;
										}

										// no error so far.
										// and the user did not cancel the session to fast

										//fill hidden form
										jQuery("input[name='secsigniduserid']").val(responseMap["secsignid"]);
										jQuery("input[name='secsignidauthsessionid']").val(responseMap["authsessionid"]);
										jQuery("input[name='secsignidrequestid']").val(responseMap["requestid"]);
										jQuery("input[name='secsignidserviceaddress']").val(responseMap["serviceaddress"]);
										jQuery("input[name='secsignidservicename']").val(responseMap["servicename"]);

										//show Accesspass
										jQuery("#secsignid-accesspass-img").fadeOut(
											function () {
												jQuery("#secsignid-accesspass-img").attr('src', 'data:image/png;base64,' + responseMap["authsessionicondata"]).fadeIn();
											}
										);

										// activate polling.
										checkSessionStateTimerId = window.setTimeout(checkSecSignIdAuthSessionState, timeUntilAuthSessionCheck);

									} else {
										// no response from server
										showErrorOnLoginform(noresponse + " " + JSON.stringify(responseMap));
									}
								}
							} // end of callback function
                    });
                }
            }
        );

        //change screens when cookie available
        if (docCookies.getItem('secsignLoginPw') == 'true') {
            jQuery("#secsignid-page-login").fadeOut(
                function () {
                    switchToPasswordScreen();
                }
            );
        }
    });
});