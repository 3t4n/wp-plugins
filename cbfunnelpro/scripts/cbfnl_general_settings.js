
//listen for changes in general settings form
const cbf_settings_form = document.getElementById("cbfunnel_setting_form");
			cbf_settings_form.addEventListener('change', function() {
				document.getElementById("cbfunnel_setting_save").className="button-red";
			});
