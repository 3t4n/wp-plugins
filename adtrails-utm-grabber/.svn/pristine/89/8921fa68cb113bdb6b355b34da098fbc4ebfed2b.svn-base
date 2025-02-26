 /*
 * 
 * utmv grabber frontend Javascript
 * 
 * @since 1.0.0
 * 
 */
var UtmvGrabber;
(function ($) {
    var $this;
	var utmUrlVarConfig = UtmvGrabber_localize.utm_fields; // set utm url variables 
    UtmvGrabber = {
        settings: {
            
        },
        initilaize: function () {
            $this = UtmvGrabber;
            $(document).ready(function () {
                $this.onInitMethods();
            });
        },
        onInitMethods: function () {
			$this.setCookiesVars(utmUrlVarConfig);
        },
		setCookiesVars: function (utmUrlVar) {
			var urlVars = $this.getUrlVariable();
			$.each(utmUrlVar, function( i,v ) {
				var cookie_field = $this.GetUtmVariables(v,urlVars)
				if ( cookie_field != '' )
				Cookies.set(v, cookie_field, { expires: 30 });
				var curval = Cookies.get(v);
				if (curval != undefined) {
					curval = decodeURIComponent(curval);					
					jQuery('input[name=\"'+v+'\"]').val(curval);
					jQuery('input#'+v).val(curval);
					jQuery('input.'+v).val(curval);
				}
			});
		},
		getUrlVariable: function () {
			var variables = {};
			var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
				variables[key] = value;
			});
			return variables;
		},
		GetUtmVariables: function (v,urlvars){
			if (urlvars[v] != undefined) {
				return urlvars[v]
			}
			return ''
		}
    };
    UtmvGrabber.initilaize();
})(jQuery);