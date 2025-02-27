<?php
/**
 * *
 *  * @link https://www.uniconsent.com/
 *  * @copyright Copyright (c) 2018 - 2023 Transfon Ltd.
 *  * @license https://www.uniconsent.com/wordpress/
 *
 */

use UNIC\UNIC_Values;

class UNIC_Public {

	private $plugin_name;

	private $version;

	private $unic_default_language;

	private $unic_display_language;
	
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->unic_values = new UNIC_Values();

	}

	public function enqueue_styles() {

	}

	public function enqueue_scripts() {

		$unic_init = $this->get_unic_init_values();

$unic_template_v1 = <<<UNIC
window._unic_start = true;
window.__cmp = window.__cmp || function () {
	window.__cmp.commandQueue = window.__cmp.commandQueue || [];
	window.__cmp.commandQueue.push(arguments);
};
window.__cmp.commandQueue = window.__cmp.commandQueue || [];
window.__cmp.receiveMessage = function (event) {
	var data = event && event.data && event.data.__cmpCall;

	if (data) {
		var callId = data.callId,
		    command = data.command,
		    parameter = data.parameter;

		window.__cmp.commandQueue.push({
			callId: callId,
			command: command,
			parameter: parameter,
			event: event
		});
	}
};
var listen = window.attachEvent || window.addEventListener;
var eventMethod = window.attachEvent ? "onmessage" : "message";
listen(eventMethod, function (event) {
	window.__cmp.receiveMessage(event);
}, false);
function addLocatorFrame() {
	if (!window.frames['__cmpLocator']) {
		if (document.body) {
			var frame = document.createElement('iframe');
			frame.style.display = 'none';
			frame.name = '__cmpLocator';
			document.body.appendChild(frame);
		} else {
			setTimeout(addLocatorFrame, 5);
		}
	}
}
addLocatorFrame();
window.__uspapi = window.__uspapi || function() {
    window.__uspapi.commandQueue = window.__uspapi.commandQueue || [];
    window.__uspapi.commandQueue.push(arguments);
};

window.__uspapi.receiveMessage = function(event) {
    var data = event && event.data && event.data.__uspapiCall;

    if (data) {
        var callId = data.callId,
            command = data.command,
            parameter = data.parameter;

        window.__uspapi.commandQueue.push({
            callId: callId,
            command: command,
            parameter: parameter,
            event: event
        });
    }
};

if (window.attachEvent) {
    window.attachEvent("onmessage", function(event) {
        window.__uspapi.receiveMessage(event);
    }, false);
} else {
    window.addEventListener("message", function(event) {
        window.__uspapi.receiveMessage(event);
    }, false);
}

function addLocatorFrameUSP() {
    if (!window.frames['__uspapiLocator']) {
        if (document.body) {
            var frame = document.createElement('iframe');
            frame.style.display = 'none';
            frame.name = '__uspapiLocator';
            document.body.appendChild(frame);
        } else {
            setTimeout(addLocatorFrameUSP, 5);
        }
    }
}

addLocatorFrameUSP();
UNIC;

$unic_stub_v2 = <<<UNIC
<script type="text/javascript">
!function(){var i,r,o;i="__tcfapiLocator",r=[],(o=window.frames[i])||(function e(){var t=window.document,a=!!o;if(!a)if(t.body){var n=t.createElement("iframe");n.style.cssText="display:none",n.name=i,t.body.appendChild(n)}else setTimeout(e,50);return!a}(),window.__tcfapi=function(){for(var e,t=[],a=0;a<arguments.length;a++)t[a]=arguments[a];if(!t.length)return r;if("setGdprApplies"===t[0])3<t.length&&2===parseInt(t[1],10)&&"boolean"==typeof t[3]&&(e=t[3],"function"==typeof t[2]&&t[2]("set",!0));else if("ping"===t[0]){var n={gdprApplies:e,cmpLoaded:!1,cmpStatus:"stub"};"function"==typeof t[2]&&t[2](n,!0)}else r.push(t)},window.addEventListener("message",function(n){var i="string"==typeof n.data,e={};try{e=i?JSON.parse(n.data):n.data}catch(e){}var r=e.__tcfapiCall;r&&window.__tcfapi(r.command,r.version,function(e,t){var a={__tcfapiReturn:{returnValue:e,success:t,callId:r.callId}};i&&(a=JSON.stringify(a)),n.source.postMessage(a,"*")},r.parameter)},!1))}();
!function(){var i,n,s;i="__uspapiLocator",n=[],(s=window.frames[i])||(function a(){var e=window.document,n=!!s;if(!s)if(e.body){var t=e.createElement("iframe");t.style.cssText="display:none",t.name=i,e.body.appendChild(t)}else setTimeout(a,50);return!n}(),window.__uspapi=function(){for(var a=[],e=0;e<arguments.length;e++)a[e]=arguments[e];if(!a.length)return n;"ping"===a[0]?"function"==typeof a[2]&&a[2]({cmpLoaded:!1,cmpStatus:"stub"},!0):n.push(a)},window.addEventListener("message",function(t){var i="string"==typeof t.data,a={};try{a=i?JSON.parse(t.data):t.data}catch(a){}var s=a.__uspapiCall;s&&window.__uspapi(s.command,s.version,function(a,e){var n={__uspapiReturn:{returnValue:a,success:e,callId:s.callId}};i&&(n=JSON.stringify(n)),t.source.postMessage(n,"*")},s.parameter)},!1))}();
window.__gpp_addFrame=function(e){if(!window.frames[e])if(document.body){var t=document.createElement("iframe");t.style.cssText="display:none",t.name=e,document.body.appendChild(t)}else window.setTimeout(window.__gpp_addFrame,50,e)},window.__gpp_stub=function(){var e=arguments;if(__gpp.queue=__gpp.queue||[],__gpp.events=__gpp.events||[],!e.length||1==e.length&&"queue"==e[0])return __gpp.queue;if(1==e.length&&"events"==e[0])return __gpp.events;var t=e[0],p=1<e.length?e[1]:null,s=2<e.length?e[2]:null;if("ping"===t)p&&p({gppVersion:"1.1",cmpStatus:"stub",cmpDisplayStatus:"hidden",signalStatus:"not ready",supportedAPIs:["2:tcfeuv2","5:tcfcav1","6:uspv1","7:usnatv1","8:uscav1","9:usvav1","10:uscov1","11:usutv1","12:usctv1"],cmpId:0,sectionList:[],applicableSections:[-1],gppString:"",parsedSections:{}},!0);else if("addEventListener"===t){"lastId"in __gpp||(__gpp.lastId=0),__gpp.lastId++;var n=__gpp.lastId;__gpp.events.push({id:n,callback:p,parameter:s}),p({eventName:"listenerRegistered",listenerId:n,data:!0,pingData:{gppVersion:"1.1",cmpStatus:"stub",cmpDisplayStatus:"hidden",signalStatus:"not ready",supportedAPIs:["2:tcfeuv2","5:tcfcav1","6:uspv1","7:usnatv1","8:uscav1","9:usvav1","10:uscov1","11:usutv1","12:usctv1"],cmpId:0,sectionList:[],applicableSections:[-1],gppString:"",parsedSections:{}}},!0)}else if("removeEventListener"===t){for(var a=!1,i=0;i<__gpp.events.length;i++)if(__gpp.events[i].id==s){__gpp.events.splice(i,1),a=!0;break}p({eventName:"listenerRemoved",listenerId:s,data:a,pingData:{gppVersion:"1.1",cmpStatus:"stub",cmpDisplayStatus:"hidden",signalStatus:"not ready",supportedAPIs:["2:tcfeuv2","5:tcfcav1","6:uspv1","7:usnatv1","8:uscav1","9:usvav1","10:uscov1","11:usutv1","12:usctv1"],cmpId:0,sectionList:[],applicableSections:[-1],gppString:"",parsedSections:{}}},!0)}else"hasSection"===t?p(!1,!0):"getSection"===t||"getField"===t?p(null,!0):__gpp.queue.push([].slice.apply(e))},window.__gpp_msghandler=function(s){var n="string"==typeof s.data;try{var t=n?JSON.parse(s.data):s.data}catch(e){t=null}if("object"==typeof t&&null!==t&&"__gppCall"in t){var a=t.__gppCall;window.__gpp(a.command,function(e,t){var p={__gppReturn:{returnValue:e,success:t,callId:a.callId}};s.source.postMessage(n?JSON.stringify(p):p,"*")},"parameter"in a?a.parameter:null,"version"in a?a.version:"1.1")}},"__gpp"in window&&"function"==typeof window.__gpp||(window.__gpp=window.__gpp_stub,window.addEventListener("message",window.__gpp_msghandler,!1),window.__gpp_addFrame("__gppLocator"));
window.gtag||(window.dataLayer=window.dataLayer||[],window.gtag=function(){window.dataLayer.push(arguments)}),window.gtag("set","developer_id.dZTcxZD",!0),window.gtag("consent","default",{ad_storage:"denied",functionality_storage:"denied",personalization_storage:"denied",analytics_storage:"denied",ad_user_data:"denied",ad_personalization:"denied",security_storage:"granted",wait_for_update:3e3}),window.gtag("set","ads_data_redaction",!0),window.gtag("set","url_passthrough",!1);
</script>
UNIC;
		

		$unic_license = esc_attr(get_option( 'unic_license' ));
		$unic_enable_iab = esc_attr(get_option( 'unic_enable_iab' ));
		if(strpos($unic_license, 'license-') > -1) {
			$unic_license = str_replace('license-', '', $unic_license);
			$unic_license = substr($unic_license,0,10);
			echo $unic_stub_v2."\n";
			echo "<script async data-cfasync='false' src='https://cmp.uniconsent.com/v2/".$unic_license."/cmp.js'></script>\n";

		} else if(strpos($unic_license, 'key-') > -1) {
			$unic_license = str_replace('key-', '', $unic_license);
			$unic_license = substr($unic_license,0,10);
			echo "<script>\n";
			echo $unic_template_v1."\n";
			echo "</script>\n";
			echo "<script async data-cfasync='false' src='https://cmp.uniconsent.com/t/".$unic_license.".cmp.js'></script>\n";

		} else if($unic_enable_iab == 'v2') {
			$unic_license = '85d3bd683e';
			echo "<script>\n";
			echo "window.__unic_config_v2 = ".$unic_init.";\n";
			echo "</script>\n";
			echo $unic_stub_v2."\n";
			echo "<script async data-cfasync='false' src='https://cmp.uniconsent.com/v2/".$unic_license."/cmp.js'></script>\n";

		} else {
			$unic_license = '69a3449348';
			echo "<script>\n";
			echo "window.__unic_config = window.__unic_config || {}; window.__unic_config = ".$unic_init.";\n";
			echo $unic_template_v1."\n";
			echo "</script>\n";
			echo "<script async data-cfasync='false' src='https://cmp.uniconsent.com/t/".$unic_license.".cmp.js'></script>\n";
		}
		
	}

	public function get_unic_init_values() {

		$unic_init_vals = array();

		$unic_license = esc_attr(get_option( 'unic_license' ));
		if(strpos($unic_license, 'key-') > -1) {
			$unic_init_vals['unic_license'] = str_replace('key-', '', $unic_license);
			$unic_init_vals['unic_license'] = substr($unic_license,0,10);
			$unic_init_vals['version'] = 1;
		} else if(strpos($unic_license, 'license-') > -1) {
			$unic_init_vals['unic_license'] = str_replace('license-', '', $unic_license);
			$unic_init_vals['unic_license'] = substr($unic_license,0,10);
			$unic_init_vals['version'] = 2;
		} else {

			$unic_enable_iab = esc_attr(get_option( 'unic_enable_iab' ));
			if(!$unic_enable_iab) {
				$unic_enable_iab = 'no';
			}
			$unic_init_vals['unic_enable_iab'] = $unic_enable_iab;

			$unic_region = esc_attr(get_option( 'unic_region' ));
			if(!$unic_region) {
				$unic_region = 'worldwide';
			}
			$unic_init_vals['unic_region'] = $unic_region;

			$unic_language = esc_attr(get_option( 'unic_language' ));
			if(!$unic_language) {
				$unic_language = 'en';
			}
			if($unic_enable_iab == 'v2') {
				$unic_language = strtoupper($unic_language);
			} else {
				$unic_language = strtolower($unic_language);
			}
			$unic_init_vals['unic_language'] = $unic_language;

			$unic_company = esc_attr(get_option( 'unic_company' ));
			if(!$unic_company) {
				$unic_company = 'Current website';
			}
			$unic_init_vals['unic_company'] = $unic_company;

			$unic_logo = esc_url(get_option( 'unic_logo' ));
			if(!$unic_logo) {
				$unic_logo = '';
			}
			$unic_init_vals['unic_logo'] = $unic_logo;

			$unic_policy_url = esc_url(get_option( 'unic_policy_url' ));
			if(!$unic_policy_url) {
				$unic_policy_url = '';
			}
			$unic_init_vals['unic_policy_url'] = $unic_policy_url;

			$unic_type = esc_attr(get_option( 'unic_type' ));
			if(!$unic_type) {
				$unic_type = 'popup';
			}
			$unic_init_vals['unic_type'] = $unic_type;

			$unic_enable_gdpr = esc_attr(get_option( 'unic_enable_gdpr' ));
			if(!$unic_enable_gdpr) {
				$unic_enable_gdpr = 'yes';
			}
			$unic_init_vals['unic_enable_gdpr'] = $unic_enable_gdpr;

			$unic_enable_ccpa = esc_attr(get_option( 'unic_enable_ccpa' ));
			if(!$unic_enable_ccpa) {
				$unic_enable_ccpa = 'yes';
			}
			$unic_init_vals['unic_enable_ccpa'] = $unic_enable_ccpa;
			$unic_init_vals['publisherCountryCode'] = 'DE';
		}
		
		return json_encode( $unic_init_vals );

	}
}
