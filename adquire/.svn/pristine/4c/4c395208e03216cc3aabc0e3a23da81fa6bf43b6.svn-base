var AdQuireCapture = function(adqConfigs) {
	var version = '1.0';
	var release = '2015-07-08';
	var Configs = {};
	var Map = {};
	var Form = false;
	var Fields = [
		'address1',
		'address2',
		'city',
		'dob',
		'dob_day',
		'dob_month',
		'dob_year',
		'email',
		'first_name',
		'gender',
		'last_name',
		'phone',
		'phone1',
		'phone2',
		'phone3',
		'state',
		'zipcode'
	];
	var JSON = function(){function f(n){return n<10?'0'+n:n}Date.prototype.PD_toJSON=function(key){return this.getUTCFullYear()+'-'+f(this.getUTCMonth()+1)+'-'+f(this.getUTCDate())+'T'+f(this.getUTCHours())+':'+f(this.getUTCMinutes())+':'+f(this.getUTCSeconds())+'Z'};String.prototype.PD_toJSON=Number.prototype.PD_toJSON=Boolean.prototype.PD_toJSON=function(key){return this.valueOf()};var cx=/[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,escapeable=/[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,gap,indent,meta={'\b':'\\b','\t':'\\t','\n':'\\n','\f':'\\f','\r':'\\r','"':'\\"','\\':'\\\\'},rep;function quote(string){escapeable.lastIndex=0;return escapeable.test(string)?'"'+string.replace(escapeable,function(a){var c=meta[a];if(typeof c==='string'){return c}return'\\u'+('0000'+(+(a.charCodeAt(0))).toString(16)).slice(-4)})+'"':'"'+string+'"'}function str(key,holder){var i,k,v,length,mind=gap,partial,value=holder[key];if(value&&typeof value==='object'&&typeof value.PD_toJSON==='function'){value=value.PD_toJSON(key)}if(typeof rep==='function'){value=rep.call(holder,key,value)}switch(typeof value){case'string':return quote(value);case'number':return isFinite(value)?String(value):'null';case'boolean':case'null':return String(value);case'object':if(!value){return'null'}gap+=indent;partial=[];if(typeof value.length==='number'&&!(value.propertyIsEnumerable('length'))){length=value.length;for(i=0;i<length;i+=1){partial[i]=str(i,value)||'null'}v=partial.length===0?'[]':gap?'[\n'+gap+partial.join(',\n'+gap)+'\n'+mind+']':'['+partial.join(',')+']';gap=mind;return v}if(rep&&typeof rep==='object'){length=rep.length;for(i=0;i<length;i+=1){k=rep[i];if(typeof k==='string'){v=str(k,value);if(v){partial.push(quote(k)+(gap?': ':':')+v)}}}}else{for(k in value){if(Object.hasOwnProperty.call(value,k)){v=str(k,value);if(v){partial.push(quote(k)+(gap?': ':':')+v)}}}}v=partial.length===0?'{}':gap?'{\n'+gap+partial.join(',\n'+gap)+'\n'+mind+'}':'{'+partial.join(',')+'}';gap=mind;return v}}return{stringify:function(value,replacer,space){var i;gap='';indent='';if(typeof space==='number'){for(i=0;i<space;i+=1){indent+=' '}}else if(typeof space==='string'){indent=space}rep=replacer;if(replacer&&typeof replacer!=='function'&&(typeof replacer!=='object'||typeof replacer.length!=='number')){throw new Error('PD_JSON.stringify');}return str('',{'':value})},parse:function(text,reviver){var j;function walk(holder,key){var k,v,value=holder[key];if(value&&typeof value==='object'){for(k in value){if(Object.hasOwnProperty.call(value,k)){v=walk(value,k);if(v!==undefined){value[k]=v}else{delete value[k]}}}}return reviver.call(holder,key,value)}cx.lastIndex=0;if(cx.test(text)){text=text.replace(cx,function(a){return'\\u'+('0000'+(+(a.charCodeAt(0))).toString(16)).slice(-4)})}if(/^[\],:{}\s]*$/.test(text.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g,'@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g,']').replace(/(?:^|:|,)(?:\s*\[)+/g,''))){j=eval('('+text+')');return typeof reviver==='function'?walk({'':j},''):j}throw new SyntaxError('PD_JSON.parse');}}}();

	log('AdQ-Capture v' + version + ' (' + release + ')');

	if (typeof adqConfigs === 'object') {
		Configs = adqConfigs;
		Form = jQuery(Configs.form).get(0);
	}

	/**
	 * Log
	 *
	 * @param {mixed} Multiple parameters
	 */
	function log() {
		try {
			if (typeof window.console === 'object') {
				for (var n = 0; n < arguments.length; n++) {
					window.console.log(arguments[n]);
				}
			}
		} catch(oErr) {

		}
	}

	/**
	 * Initialization
	 * Loop through AdQuire Fields, split Configs into array,
	 * pass AdQuire Fields into Map if they exist
	 */
	function init() {
		for (var nField = 0; nField < Fields.length; nField++) {
			if (Configs.hasOwnProperty(Fields[nField])) {
				var aFormFields = Configs[Fields[nField]].split(',');
				for (var i = 0; i < aFormFields.length; i++) {
					if (aFormFields[i] !== '') {
						Map[aFormFields[i]] = Fields[nField];
					}
				}
			}
		}
		log(Map);

		// Save to cookie whenever something in form is changed or submitted
		if (Form) {
			Form.addEventListener('change', save, true);
			Form.addEventListener('submit', save, true);
			log('AdQ-Capture: Form attached to: ' + Configs.form);
		} else {
			log('AdQ-Capture: Error, cannot attach form');
		}
	}

	/**
	 * Save
	 * Try and save mapped data into session storage
	 *
	 * @return {boolean} Always returns true
	 */
	function save() {
		var oRegData = {};
		try {
			if (window.sessionStorage) {
				for (var sField in Map) if (Map.hasOwnProperty(sField)) {
					if (Form && Form.tagName === 'FORM') {
						if (Form.elements[sField]) {
							// Takes form data values and stuffs them into oMap object
							// then saving it into oRegData object
							oRegData[Map[sField]] = Form[sField].value;
						}
					} else {
						var id = jQuery('#' + sField);
						oRegData[Map[sField]] = id.val();
					}
				}
				// Saving data in session storage
				window.sessionStorage.setItem('PD_RegData', JSON.stringify(oRegData));
				log('AdQ-Capture: Saved');
			}
		} catch (oErr) {
			log('AdQ-Capture: Error at grabValues', oErr);
		}
		return true;
	}

	return {
		version: version,
		release: release,
		form: Form,
		fields: Fields,
		map: Map,
		configs: Configs,
		init: init
	};
};
