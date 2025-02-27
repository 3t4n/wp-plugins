function klaroTranslations () {
 
 var klarotranslations =  {
		
		en: {
			consentModal: {
                description: consentModalDescription,
				title: consentModalTitle,
				privacyPolicy: { 
					text: consentModalPrivacyPolicyText,
					name: consentModalPrivacyPolicyName,
				},
            },
			consentNotice: {
				changeDescription: consentNoticechangeDescription,
				description: consentNoticeDescription,
				learnMore: consentNoticelearnMore,
            },
            
			poweredBy: klaroPoweredBy,
			ok: klaroOK,
			decline: klaroDecline,
			save: klaroSave,
			close: klaroClose,
			app: {
				purpose: appPurpose,
				disableAll: {
					title: appDisableAllTitle,
					description: appDisableAllDescription,
					},
				 optOut: {
                    title: appOptOut,
                    description: appOptOutDescription,
                },
                required: {
                    title: appRequired,
                    description: appRequiredDescription,
                },
                purposes: appPurposes,
				},
			
            purposes: {
                analytics: purposesAnalytics,
                security: purposesSecurity,
                advertising: purposesAdvertising,
                styling: purposesStyling,
				statistics: purposesStatistics,
				functionality: purposesFunctionality,
				other: purposesOther,
            },

        },	
		
    }
	
	return klarotranslations;
};

var klaroID = option.klaroID,
	klaroPrivacyLink = option.klaroPrivacyLink
	klaroCookieExpires = option.klaroCookieExpires,
	allAppsJson = option.allAppsJson,
	mustConsent = option.mustConsent,
    consentNoticeDescription = option.consentNoticeDescription,
	consentNoticelearnMore = option.consentNoticelearnMore,
	consentNoticechangeDescription = option.consentNoticechangeDescription
	consentModalDescription = option.consentModalDescription,
	consentModalTitle = option.consentModalTitle,
	consentModalPrivacyPolicyText = option.consentModalPrivacyPolicyText,
	consentModalPrivacyPolicyName = option.consentModalPrivacyPolicyName,
	klaroPoweredBy = option.klaroPoweredBy,
	klaroOK = option.klaroOK,
	klaroDecline = option.klaroDecline,
	klaroSave = option.klaroSave,
	klaroClose = option.klaroClose,
	appPurpose = option.appPurpose,
	appPurposes = option.appPurposes,
	appDisableAllTitle = option.appDisableAllTitle,
	appDisableAllDescription = option.appDisableAllDescription,
	appOptOut = option.appOptOut,
	appOptOutDescription = option.appOptOutDescription,
	appRequired = option.appRequired,
	appRequiredDescription = option.appRequiredDescription,
	purposesAnalytics = option.purposesAnalytics,
	purposesSecurity = option.purposesSecurity,
	purposesAdvertising = option.purposesAdvertising,
	purposesStyling = option.purposesStyling,
	purposesStatistics = option.purposesStatistics;
	purposesFunctionality = option.purposesFunctionality,
	purposesOther = option.purposesOther;
	

var klaroConfig = {
	
    elementID: klaroID,
    cookieName: klaroID,
    cookieExpiresAfterDays: klaroCookieExpires,
	// DEFINE LANG AS EN SO LET IT ALLWAYS THINKS ITS ENGLISH, TRANSLATION IS ALREADY SERVED ANYWAY USING PLUGIN PO AND MO FILES
	lang: 'en', 
    privacyPolicy: klaroPrivacyLink,
    mustConsent: mustConsent,
    translations: klaroTranslations (),  
  	apps : allAppsJson,
	 
}

function deleteACookie () {
    var cookies = document.cookie.split("; ");
    for (var c = 0; c < cookies.length; c++) {
        var d = window.location.hostname.split(".");
        while (d.length > 0) {
            var cookieBase = encodeURIComponent(cookies[c].split(";")[0].split("=")[0]) + '=; expires=Thu, 01-Jan-1970 00:00:01 GMT; domain=' + d.join('.') + ' ;path=';
            var p = location.pathname.split('/');
            document.cookie = cookieBase + '/';
            while (p.length > 0) {
                document.cookie = cookieBase + p.join('/');
                p.pop();
            };
            d.shift();
        }
    }
};