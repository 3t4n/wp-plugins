;(function () {
	/**
	 * Run function when customizer is ready.
	 */

	 
	wp.customize.bind('ready', function () {

		wp.customize.control('arrowlogin_theme_selection', function (control) {
			console.log("asd:"+wp.customize.control('arrowlogin_theme_selection').setting.get());
			control.setting.bind(function (value) {
			
				if(value=="one"){
					wp.customize.section('arrowlogin_field_style').activate();
					wp.customize.section('arrowlogin_button_section').activate();
					wp.customize.section('arrowlogin_form_bg_section').activate();
					wp.customize.section('arrowlogin_label_section').activate();
						
				}else{
					wp.customize.section('arrowlogin_field_style').deactivate();
					wp.customize.section('arrowlogin_button_section').deactivate();
					wp.customize.section('arrowlogin_form_bg_section').deactivate();
					wp.customize.section('arrowlogin_label_section').deactivate();

					}		

			});
		});

		wp.customize.control('arrowlogin_logo_enable', function (control) {
			/**
			 * Run function on setting change of control.
			 */

			control.setting.bind(function (value) {
				console.log("that sucks");
			
					if(value=="1"){		
						wp.customize.control('arrowlogin_logo').activate();
						wp.customize.control('arrowlogin_logo_height').activate();
						wp.customize.control('arrowlogin_logo_width').activate();
							
					}
					else{
						wp.customize.control('arrowlogin_logo').deactivate();
						wp.customize.control('arrowlogin_logo_height').deactivate();
						wp.customize.control('arrowlogin_logo_width').deactivate();
					
					}
				
			});
		});
	});
})();
